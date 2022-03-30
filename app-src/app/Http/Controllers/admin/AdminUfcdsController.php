<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\Ufcd;
use Illuminate\Http\Request;

class AdminUfcdsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');//Verificar atraves do middleware se o user logado admin
    }


    //Mostar todas as ufcds existentes
    public function all(){
        $ufcds = Ufcd::all(['ufcd_number', 'ufcd_name']);
        return view('admin.ufcds.all',['ufcds'=>$ufcds]);
    }

    public function new(){
        return view('admin.ufcds.new');
    }

    public function save(Request $request){
        $request->validate([
            'numero'=>'required|size:4|unique:ufcd,ufcd_number',
            'nome'=>'required|min:3'
        ]);
        //
        $u = new Ufcd();
        $u->ufcd_number = $request->numero;
        $u->ufcd_name = $request->nome;
        $u->save();

        return redirect()->route('adminUfcdAll')->with('sucesso','UFCD criada com sucesso');
    }

    public function edit(Ufcd $ufcd){
        return view('admin.ufcds.edit', ['ufcd'=>$ufcd]);
    }


    public function update(Request $request, Ufcd $ufcd){
        $request->validate([
            'nome'=>'required|min:3'
        ]);
        $ufcd->ufcd_name = $request->nome;
        $ufcd->update();
        return redirect()->route('adminUfcdAll')->with('sucesso','UFCD Editada com sucesso');
    }


    public function delete(Ufcd $ufcd){
        $ufcd->delete();
        return redirect()->route('adminUfcdAll')->with('sucesso','UFCD eliminada com sucesso');
    }
}
