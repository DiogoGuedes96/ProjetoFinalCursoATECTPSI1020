<?php

namespace App\Http\Controllers\coordinator;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorTaskController extends Controller
{
    public function __construct(){
        $this->middleware('coordinator');//Verificar atraves do middleware se o user logado coordinator
    }

    public function all(){
        $coordinator = User::find(auth()->user()->user_id);
        return view("coordinator.tasks.all",['coordinator'=>$coordinator]);
    }
    public function download(Task $task)
    {  
        $file = public_path('documents/'. $task->task_file);
        return response()->download($file);
    }

    public function show(Task $task){
        $group = Task::find($task->task_id);
        return view("coordinator.tasks.detailed",['task'=>$task,  'groups' =>$group]);
    }

    public function edit(Task $task){
        return view("coordinator.tasks.edit", ['task'=>$task]);
    }

    public function update(Request $request,Task $task)
    {
        $request->validate([
            'task_title'=>'required|min:3|max:100',
            'task_description'=>'required',
            'task_file'=>'file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docm,doxc,dot,dotm,dotx,htm,html,mhtml,odt,rtf,xml,xps,odp,pot,potm,potx,ppa,ppam,pps,ppt,pptx|max:12228',
        ]);

        $task->task_title = $request->task_title;
        $task->task_description = htmlspecialchars($request->task_description);
        $file  = $request->task_file;
        if($file){
            $name = time().'_'.$file->getClientOriginalName();
            $request->task_file->move('documents', $name);
            $task->task_file = $name;
        }
        $task->update();

        return redirect()->route('coordinatorLibrary')->with('sucesso','Tarefa editada com sucesso');
    }

    public function delete(Task $task){
        $task->delete();
        return redirect()->route('coordinatorLibrary')->with('sucesso','Tarefa apagada com sucesso');
    }

    public function library(){
        $coordinator = User::find(auth()->user()->user_id);
        return view("coordinator.tasks.library" ,['coordinator'=>$coordinator]);
    }
}
