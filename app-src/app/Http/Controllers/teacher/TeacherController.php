<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    
    public function __construct(){
        $this->middleware('teacher');//Verificar atraves do middleware se o user logado teacher
    }    

    public function profile(){
       return view('teacher.profile');
    } 

    public function update(Request $request){
        $request->validate([
            'user_name'=>'required|min:4',
            'email'=>'required|email',
            'user_password'=>'min:3',
            'confirmPassword'=>'required|min:3',
            'user_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]); 
        $user = auth()->user()->user_id;

        $extension = pathinfo($request->user_image, PATHINFO_EXTENSION);
        $target_dir = "public/img/profile_img/";
        $filename = auth()->user()->user_id;
        $path_filename_ext = $target_dir.$filename.".".$extension;

        if ($request->user_password !=  $request->confirmPassword) {
            return redirect()->route('teacherProfile')->with('error','Passwords têm que ser iguais');
        }

        $user = User::find($user);
        $user->user_name = $request->user_name;
        $user->password = bcrypt($request->user_password);
        if ($request->hasFile('user_image')) {
            $request->file('user_image')->store('image');
            $files = scandir('app-src/storage/app/image', SCANDIR_SORT_DESCENDING);
            $newest_file = basename($files[0]);
            $user->user_image = $newest_file;
        }
        $user->update();

        return redirect()->route('teacherProfile')->with('sucesso','Perfil editado com sucesso');
    }
}
