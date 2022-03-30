<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('student');//Verificar atraves do middleware se o user logado student
    }
    
    //nome, email, imagem, id
    public function detailed(){
        return view('perfil');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
