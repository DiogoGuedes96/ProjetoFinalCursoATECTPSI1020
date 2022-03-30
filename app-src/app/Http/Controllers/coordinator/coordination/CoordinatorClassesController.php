<?php

namespace App\Http\Controllers\coordinator\coordination;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordinatorClassesController extends Controller
{
    public function __construct(){
        $this->middleware('coordinator');//Verificar atraves do middleware se o user logado coordinator
    }
    
    public function all(){
        $coordinator = User::find(auth()->user()->user_id);
        //$classes = Turma::all()->where('class_coordinator', '=' 'Auth::user('user_id')'); //Needs login
        return view('coordinator.coordination.classes.all',['coordinator'=>$coordinator]);
    }
}
