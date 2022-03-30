<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use App\Models\CriteriaEvaluation;
use App\Models\EvaluationComent;
use App\Models\FinalEvaluation;
use App\Models\Task;
use App\Models\TaskCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Finally_;
use SebastianBergmann\CodeUnit\FunctionUnit;

class StudentEvaluationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('student'); //Verificar atraves do middleware se o user logado student
    }

    public function all()
    {
        $student =  User::find(auth()->user()->user_id);
        $groups = $student->student_groups;
        $gruposAvaliados = $student->student_groups_avaliated;
        $gruposNaoAvaliados = $student->student_groups_not_avaliated;

        $tasks =  $student->criteria_evaluator();
        return view('student.evaluations.all', ['groups' => $groups,'gruposAvaliados'=>$gruposAvaliados, 'gruposNaoAvaliados'=>$gruposNaoAvaliados,'tasks'=>$tasks]);
    }

    public function detailed($id)
    {
        return view('student.tasks.detailed');
    }

    public function individualEvaluation(Group $group)
    {
        $task = $group->task;
        $task_criteria = $task->task_criterias;

        return view('student.evaluations.newEvaluation', ['group' => $group, 'criterios' => $task_criteria, 'task' => $task]);
    }

    public function comments(Group $group)
    {
        $task = $group->task;

        return view('student.evaluations.evaluation_comment', ['group' => $group, 'task' => $task]);
    }

    public function save(Request $request, Task $task)
    {
        if (!$request->ajax()){
            return abort(404);
        }

        foreach ($request->evals as $eval) {
            $ce = new CriteriaEvaluation();
            foreach ($eval as $key_eval => $eval_value) {
                if ($key_eval == "user_eval") {
                    $ce->criteria_evaluation_grade = $eval_value;
                } else if ($key_eval == "user_id") {
                    $user = User::find($eval_value);
                    $ce->user_avaliado()->associate($user);
                } else if ($key_eval == "criteria_id") {
                    $ce->taskCriterias()->associate($eval_value);
                    $tc = TaskCriteria::find($eval_value);
                    $ce->criteria_evaluation_weight = $tc->task_criteria_weight;
                }
            }
            $ce->criteria_scale_type = 1;
            $ce->task()->associate($task->task_id);
            $ce->user_avaliador()->associate(auth()->user());
            $ce->save();


            $user = User::find(auth()->user()->user_id);
            $group = $user->student_groups()->where('task_id', '=', $task->task_id )->first();
            $user->student_groups()->updateExistingPivot($group->group_id, [
                'status' => 'avaliada',
            ]);
        }

        if ($this->isStudentEvaluationOver($task)){ 
            $task->task_status = "Evaluated";
            //Calcular a avaliacao final para cada aluno
            $groups = $task->groups;
            //Calcular as medias de peer evaluation
            foreach($groups as $group){
                foreach($group->group_users as $student){
                    $soma = 0.0;
                    $pesos = 0.0;
                    foreach($student->criteria_evaluated as $grade){
                        $soma += $grade->criteria_evaluation_grade * $grade->criteria_evaluation_weight;
                        $pesos += $grade->criteria_evaluation_weight;
                    }
                    $nota = $soma/$pesos; //valor de 0 a 5
                    $notaPeerEval = $nota * 20.0 / 5.0; 
                    $fe = FinalEvaluation::all()
                        ->where('student_id','=', $student->user_id)
                        ->where('task_id', '=', $task->task_id)->first();
                    $fe->peer_grade = intval($notaPeerEval);
                    $fe->save();
                }
            }
            //atualizar o status da tarefa

            //testar se o professor ja avaliou
            if($task->task_teacher_status == "YES"){
                foreach ($task->groups as $group) {
                    foreach ($group->group_users as $student) {
                        $fe = FinalEvaluation::all()
                            ->where('student_id', '=', $student->user_id)
                            ->where('task_id', '=', $task->task_id)->first();
                        $notaPeer = $fe->peer_grade * 0.4;
                        $notaProf = $fe->teacher_grade * 0.6;
                        $notaFinal = $notaPeer  +  $notaProf;
                        $fe->final_grade = $notaFinal;
                        $fe->save();
                    }
                }
            }
        }
        $msg = "Avaliação concluída com sucesso!";
        return response()->json(['success' => $msg]);
    }

    public function saveComments(Request $request, Task $task)
    {
        if (!$request->ajax())
            return abort(404);

        foreach ($request->comments as $comment) {
            $ec = new EvaluationComent();
            foreach ($comment as $comment_key => $comment_value) {
                if ($comment_key == "user_comment") {
                    $ec->evaluation_comment_text = $comment_value;
                } elseif ($comment_key == "user_id") {
                    $user = User::find($comment_value);
                    $ec->user_avaliado()->associate($user);
                }
                $ec->user_avaliador()->associate(auth()->user());
                $ec->task()->associate($task);
            }
            $ec->save();
        }
        $msg = "Avaliação concluída com sucesso!";
        return response()->json(['success' => $msg]);
    }

    private function isStudentEvaluationOver(Task $task){
        $groups = $task->groups;

        foreach ($groups as $group) {
            if ($group->group_non_evaluated->count() > 0) {
                return false;
            }
        }
        return true;
    }
}
