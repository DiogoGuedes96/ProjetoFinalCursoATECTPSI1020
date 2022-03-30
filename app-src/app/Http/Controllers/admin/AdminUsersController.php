<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\User;
use App\Models\User_Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
 
class AdminUsersController extends Controller
{
    public function __construct(){
        //$this->middleware('admin');//Verificar atraves do middleware se o user logado admin
    } 

    /**
     * - Funcao que mostra todos os utilizadores existentes na bd;
     * - Nao recebe parametos;
     * - Retorna para uma view um array de obejtos  (Utilizadores e toda a sua informacao);
    */
    public function all(){
        $users = User::all(['user_id','user_name','email','profile_type']); //Retorna todos os utilizadores da BD
        return view('admin.users.all',['users'=>$users]);
    }

    /**
     * - Funcao que mostra a pagina de Criacao de um novo utilizador
     * - Nao recebe parametos;
     * - Nao retorna parametros
    */
    public function new(){
        return view('admin.users.create');
    }

    /**
     * - Funcao recolhe todos os parametros para a criacao de um utilizador e grava esse mesmo utilizador na BD
     * - Recebe do FrontEnd todas as informacoes de um utilizador a criar;
     * - Grava os parametros na BD
     * - Retorna uma mensagem de sucesso
    */
    public function save(Request $request){
        $request->validate([
            'user_name'=>'required|min:3|max:100',
            'email'=>'required|min:4|email|unique:user,email',
            'password'=>'required|min:4',
            'profiles' => 'required|min:1|max:4|array',
            //'user_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|'
        ]);

        $u = new User(); //"Instanciar um novo objeto (User)"
        //Atribuir os campos vindos do FronEnd ao User
        $u->user_name = $request->user_name;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $u->save();//Guardar o objeto User na BD
        $u->user_profiles()->attach($request->profiles); //Criar as dependencias nas tabela pivot -> user_has_profiles
        return redirect()->route('adminUsersAll')->with('sucesso','Utilizador criado com sucesso');
    }

    /**
     * - Funcao que mostra a pagina onde se edita as informacoes de um utilizador
     * - Recebe por url um id de utilizador determinado id (Selecionado no FrontEnd);
     * - Retorna um array de objetos (Utilizador)
    */
    public function edit(User $user){
        return view('admin.users.edit', ['user'=>$user]);//Retorna o user correspondente ao Id que passa por url
    }

    /**
     * - Funcao recolhe todos os parametros para a edicao de um prefil de um utilizador e grava na BD,
     * - Recebe os parametros a editar do front end,
     * - Recebe o id do utilizador a editar,
     * - Envia os parametros par a BD,
     * - Retorna uma mensagem de sucesso
     */
    public function update(Request $request, User $user){
        //Validar o array de roles que o utilizador pode ter

        $request->validate([
            'user_name'=>'required|min:3|max:100',
            'email'=>'required|min:4|email',
            'password'=>'required|min:4',
            'profiles' => 'required|min:1|max:4|array',
            //'user_image'=>'mimes:jpg,bmp,png'
        ]);


        //Atribuir os campos vindos do FronEnd ao User JA EXISTENTE
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->update(); //Fazer o Update na BD

        $user->user_profiles()->detach(); //Eliminar as dependencias das tabelas na BD
        $user->user_profiles()->attach($request->profiles); //Criar as novas dependencias na BD

        return redirect()->route('adminUsersAll')->with('sucesso','Utilizador editado com sucesso');
    }
    /**
     * - Funcao que elimina um utilizador da BD
     * - Recebe por url o id do utilizador a eliminar
     * - Recebe o id do utilizador a editar
     * - Retorna uma mensagem de sucesso
     */
    public function delete(User $user){
        $user->user_profiles()->detach();//Eliminar as dependencias das tabelas na BD (Processo realizado por prevencao) (A BD deve fazer autimaticamente com delete on cascade)
        $user->delete(); //Eliminar o user da BD
        return redirect()->route('adminUsersAll')->with('sucesso','Utilizador eliminado com sucesso');
    }
}
