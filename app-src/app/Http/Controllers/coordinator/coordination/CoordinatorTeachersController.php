<?php

namespace App\Http\Controllers\coordinator\coordination;

use App\Http\Controllers\Controller;
use App\Models\ClassUfcd;
use App\Models\Curriculum;
use App\Models\Turma;
use App\Models\Ufcd;
use App\Models\User;
use App\Models\User_Profile;
use Database\Seeders\turmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Builder\Class_;
use PhpParser\Builder\Use_;

class CoordinatorTeachersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('coordinator');//Verificar atraves do middleware se o user logado coordinator
    }

    public function all(Turma $turma)
    {
        $teachers = $turma->class_teachers;
        $teachers = $teachers->unique();
        $ufcds = [];
        foreach($teachers as $index => $teacher){
            $ufcds[$index] =  $this->getAssignedUfcdsTeacher($turma, $teacher);
        }
        
        return view('coordinator.coordination.teachers.all', [
            'allufcds'=>$ufcds,
            'teachers'=>$teachers
        ]);
    }



    
    public function add(Turma $turma)
    {
        $teachers = User_Profile::find(2)->users;
        $ufcds = Ufcd::all();
        $notassigned=$this->getNotAssignedUfcds($turma);
        return view('coordinator.coordination.teachers.add', [
            'teachers' => $teachers,
            'ufcds' => $ufcds,
            'class' => $turma,
            'notassigned'=>$notassigned
        ]);
    }

    public function delete($id)
    {
        echo ("A apagar o teacher com o ID=$id");
    }


    /**
     * Adiciona UFCD de uma turma ao professor  -  AJAX
     * * Rota para função
     * * * ??????????
     *
     * * Parâmetros JSON
     * * * int turma -> id da turma
     * * * int teacher -> id do User
     * * * string ufcd -> ufcd number
     *
     */
    public function addClassUFCDtoTeacher(Request $request)
    {
        //Não é permitido acesso pelo browser
        if (!$request->ajax())
            return abort(404);

        //Validação de Entrada. Obrigatório e turma e user têm que existir
        $val = Validator::make($request->all(), [
            'turma' => 'required|exists:class,class_id',
            'teacher' => 'required|exists:user,user_id',
            'ufcd' => 'required|exists:ufcd,ufcd_number'
        ]);
        //Caso a validação falhe
        if ($val->fails())
            return response()->json(['error' => $val->errors()->all()]);

        // efetua a ligação turma-professor-ufcd
        Turma::find($request->turma)->class_teachers()->attach($request->teacher, ['ufcd_id' => $request->ufcd]);
        $turma=Turma::find($request->turma);
        //Devolve lista ufcds por atribuir e lista de ufcd do professor
        $teacher = User::find($request->teacher);
        $assigned = $this->getAssignedUfcdsTeacher($turma, $teacher);
        $notassigned = $this->getNotAssignedUfcds($turma);

        $ufcd = Ufcd::find($request->ufcd);
        $msg = "Disciplina $ufcd->ufcd_name ($ufcd->ufcd_number), da turma $turma->class_name, adicionada com sucesso ao professor $teacher->user_name";
        return response()->json(['success' => $msg, 'assigned' => json_encode($assigned), 'notassigned' => json_encode($notassigned)]);
    }

    /**
     * Retira UFCD de uma turma ao professor - AJAX
     * * Rota para função - POST
     * * * ??????????
     *
     * * Parâmetros JSON
     * * * int turma -> id da turma
     * * * int teacher -> id do User
     * * * string ufcd -> ufcd number
     *
     */
    public function removeClassUFCDfromTeacher(Request $request)
    {
        //Não é permitido acesso pelo browser
        if (!$request->ajax())
            return abort(404);

        //Validação de Entrada. Obrigatório e turma e user têm que existir
        $val = Validator::make($request->all(), [
            'turma' => 'required|exists:class,class_id',
            'teacher' => 'required|exists:user,user_id',
            'ufcd' => 'required|exists:ufcd,ufcd_number'
        ]);

        //Caso a validação falhe
        if ($val->fails())
            return response()->json(['error' => $val->errors()->all()]);

        // Retira disciplina de determinada turma ao professor
        Turma::find($request->turma)->class_ufcds()->detach($request->ufcd);
        $turma=Turma::find($request->turma);

        //Devolve lista ufcds por atribuir e lista de ufcd do professor
        $teacher = User::find($request->teacher);
        $assigned = $this->getAssignedUfcdsTeacher($turma, $teacher);
        $notassigned = $this->getNotAssignedUfcds($turma);

        $ufcd = Ufcd::find($request->ufcd);
        $msg = "Disciplina $ufcd->ufcd_name ($ufcd->ufcd_number), da turma $turma->class_name, removida do professor $teacher->user_name";
        return response()->json(['success' => $msg, 'assigned' => json_encode($assigned), 'notassigned' => json_encode($notassigned)]);
    }


    /**
     *  Função para suportar chamada ajax para retornar todas as UFCDS
     *  da uma turma não atribuídas e as UFCD atribuídas a um professor
     *
     * * Rota para função
     * * * ??????????
     *
     * * Parâmetros JSON
     * * * int turma -> id da turma
     * * * int teacher -> id do User
     *
     * @return array <assigned> e <notassigned> UFCDS atribuídas a um professor e não atribuídas
     */
    public function getUFCDbyTeachersByClass(Request $request)
    {
        //Não é permitido acesso pelo browser
        if (!$request->ajax())
            return abort(404);

        //Validação de Entrada. Obrigatório e turma e user têm que existir
        $val = Validator::make($request->all(), [
            'turma' => 'required|exists:class,class_id',
            'teacher' => 'required|exists:user,user_id'
        ]);

        //Caso a validação falhe
        if ($val->fails())
            return response()->json(['error' => $val->errors()->all()]);

        $turma = Turma::find($request->turma);
        $teacher = User::find($request->teacher);
        $assigned = $this->getAssignedUfcdsTeacher($turma, $teacher);
        $notassigned = $this->getNotAssignedUfcds($turma);
        return response()->json(['assigned' => json_encode($assigned), 'notassigned' => json_encode($notassigned)]);
    }

    /**
     * Devolve array com ufcds da turma atribuídas a um determinado professor
     *
     * * Exemplo output
     * [
     *  {"ufcd_number":5098,"ufcd_name":"Disciplina 3","created_at":null,"updated_at":null},
     *  {"ufcd_number":6000,"ufcd_name":"Disciplina 4","created_at":null,"updated_at":null}
     * ]
     */
    private function getAssignedUfcdsTeacher(Turma $turma, User $teacher)
    {
        return $turma->class_ufcds()->where('teacher_id', $teacher->user_id)->get();
    }

    /**
     * Retorna Coleção de UFCDS que pertencem ao curriculo da Turma e que ainda
     * Não estão atribuídas a nenhum professor
     *
     * * Exemplo output
     * [
     *  {"ufcd_number":5098,"ufcd_name":"Disciplina 3","created_at":null,"updated_at":null},
     *  {"ufcd_number":6000,"ufcd_name":"Disciplina 4","created_at":null,"updated_at":null}
     * ]
     */
    private function getNotAssignedUfcds(Turma $turma)
    {
        return $turma->class_course->course_curriculum->ufcds()
            ->whereNotIn('ufcd.ufcd_number', $turma->class_ufcds->pluck('ufcd_number')->all())
            ->get();
    }

    public function testeQueries()
    {
        //return Turma::find(1)->class_ufcds()->where('teacher_id', 1)->get();
        return TURMA::find(1)->class_course->course_curriculum->ufcds;
    }
}
