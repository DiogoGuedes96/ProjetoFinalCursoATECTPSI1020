<?php

namespace App\Http\Controllers\coordinator\coordination;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\User;
use App\Models\User_Profile;
use Illuminate\Http\Request;

class CoordinatorStudentsController extends Controller
{
    public function __construct(){
        $this->middleware('coordinator');//Verificar atraves do middleware se o user logado coordinator
    }
    
    public function all(Turma $turma){
        $students = Turma::find($turma->class_id)->class_students;
        return view('coordinator.coordination.students.all', [
            'students'=>$students,
            'class'=>$turma
        ]);
    }
    
 
    public function add(Turma $turma){
        $coordinator = User::find(auth()->user()->user_id);
        $students = User_Profile::find(1)->users;

        $studentsInClass = Turma::find($turma->class_id)->class_students;
        return view('coordinator.coordination.students.add', [
            'coordinator' => $coordinator,
            'students' => $students,
            'class' => $turma,
            'studentsInClass' => $studentsInClass
        ]);
    }


    public function save(Request $request){
       
        $request->validate([
            'turma'=>'required',
            'students'=>'required|array'
        ]);

        $turma = Turma::find($request->turma);//Ver qual a turma para criar a relacao

        foreach($request->students as $student){ //por cada student
            $turma->class_students()->attach($student); //fazer as dependencias
        }
        return redirect()->route('coordinatorStudents', $request->turma)->with('sucesso','Alunos adicionados a turma com sucesso');
    }

    public function delete(User $student, Turma $class){
        $student->class_students()->detach($class);
    }
}
