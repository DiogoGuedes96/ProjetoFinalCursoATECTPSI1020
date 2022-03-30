<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\FinalEvaluation;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherEvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('teacher'); //Verificar atraves do middleware se o user logado teacher
    }

    public function all(Task $task)
    {
        $groups = Task::find($task->task_id)->groups;
        return view('teacher.evaluation.all', ["groups" => $groups, "task" => $task]);
    }

    public function save(Request $request, Task $task)
    {
        $request->validate([ //Valida os dados que recebe do frontEnd
            'group' => 'required|array',
            'grades' => 'required|array'
        ]);

        $aux = 0;
        foreach ($request->group as $group_id) {
            $group = Group::find($group_id);
            foreach ($group->group_users as $student) {
                $nota = $request->grades[$aux];
                $fe = FinalEvaluation::all()
                    ->where('student_id', '=', $student->user_id)
                    ->where('task_id', '=', $task->task_id)->first();
                $fe->teacher_grade = $nota;
                $fe->update();
            }
            $aux++;
        }

        if ($this->isStudentEvaluationOver($task)) {
            //calcular a nota final
            $aux = 0;
            foreach ($request->group as $group_id) {
                $group = Group::find($group_id);
                foreach ($group->group_users as $student) {
                    $fe = FinalEvaluation::all()
                        ->where('student_id', '=', $student->user_id)
                        ->where('task_id', '=', $task->task_id)->first();
                    $notaPeer = $fe->peer_grade * 0.4;
                    $notaProf = $fe->teacher_grade * 0.6;
                    $notaFinal = $notaPeer  +  $notaProf;
                    $fe->final_grade = $notaFinal;
                    $fe->update();
                }
            }
        }

        //Fechar a avaliação da tarefa por parte do formador
        $task->task_teacher_status = "YES";
        $task->save();

        return redirect()->route('teacherDashboard')->with('success', 'Avaliação guardada com sucesso!');
    }


    private function isStudentEvaluationOver(Task $task)
    {
        $groups = $task->groups;

        foreach ($groups as $group) {
            if ($group->group_non_evaluated->count() > 0) {
                return false;
            }
        }
        return true;
    }
}
