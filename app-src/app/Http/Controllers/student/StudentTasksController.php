<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TaskDelivery;
use App\Models\Group;
use App\Models\Task;
use Illuminate\Http\Request;

class StudentTasksController extends Controller
{
    public function __construct(){
        $this->middleware('student');//Verificar atraves do middleware se o user logado student
    }
    
    public function all(){
        $student =  User::find(auth()->user()->user_id);
        $gruposEntregues = $student->student_groups_not_avaliated;
        $gruposNaoEntregues = $student->student_groups_nao_entregues;
        return view('student.tasks.all',['gruposEntregues'=>$gruposEntregues, 'gruposNaoEntregues'=> $gruposNaoEntregues]);
    }

    public function download(Task $task)
    {  
        $file = public_path('documents/'. $task->task_file);
        return response()->download($file);
    }

    public function detailed($group_id){
        $group = Group::find($group_id);
        $task = $group->task;
        $users = $group->group_users;
       
        return view('student.tasks.detailed', ['task'=>$task,'users'=>$users,'group'=>$group_id]);

    }

    public function submitTask(Request $request,$group_id,$task_id){
        $user = User::find(auth()->user()->user_id);
        $username = auth()->user()->user_name;

        $t = new TaskDelivery();
        $t->task_id = $task_id;
        $t->group_id = $group_id;
        $t->delivery_date = date('Y-m-d H:i:s');
        $t->delivery_description = "Entrega da tarefa";
        $t->delivery_username = $username;
        $file  = $request->task_file;
        //dd($file);
        $name = time().'_'.$file->getClientOriginalName();
        $request->task_file->move('documents', $name);
        $t->delivery_file = $name;
        $t->save();

        /*$task = Task::find($task_id);
        $task->task_status = "Finished";
        $task->save();*/
        $group = Group::find($group_id);
        foreach ($group->group_users as $user) {
            $user->student_groups()->updateExistingPivot($group_id, [
                'status' => 'entregue',
            ]);
        }
        $task = Task::find($task_id);
        if ($this->isStudentTaskOver($task)) {
            $task->task_status = "Finished";
        }
        $task->save();
        return redirect()->route('studentsDashboard');
    }

    private function isStudentTaskOver(Task $task){
        $groups = $task->groups;

        foreach ($groups as $group) {
            if ($group->group_non_delivered->count() > 0) {
                return false;
            }
        }
        return true;
    }
}
