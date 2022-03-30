<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumUfcd;
use App\Models\Ufcd;
use Database\Seeders\curriculum as SeedersCurriculum;
use Database\Seeders\ufcd as SeedersUfcd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\b;

class AdminCurriculumController extends Controller
{

    public function __construct(){
        $this->middleware('admin');//Verificar atraves do middleware se o user logado admin
    }


    //Mostar todas os Curriculos existentes
    public function all(){
        $curriculums = Curriculum::all(); //Devolve todos os curriculos e por consequencia todas as ufcds associadas
        return view('admin.curriculum.all',['curriculums'=>$curriculums]);
    }

    public function new(){
        $ufcds = Ufcd::all(['ufcd_number', 'ufcd_name']); //Devolve todas as ufcds da Bd 
        return view('admin.curriculum.new',['ufcds'=>$ufcds]);
    }

    public function save(Request $request){
        $request->validate([ //Valida os dados que recebe do frontEnd
            'curriculum_name'=>'required',
            'ufcds'=>'required|array'
        ]);
        
        //Primeiramente criar o curriculo
        $c = new Curriculum();  //Cria uma instancia de um curriculo
        $c->curriculum_name = $request->curriculum_name;
        $c->save(); //Salvar o curriculo na BD

        //Dar attach das ufcds ao curriculo criado
        $c->ufcds()->attach($request->ufcds);
        
        return redirect()->route('adminCurriculumAll')->with('sucesso','Curriculo criado com sucesso');
    }

    public function edit(Curriculum $curriculum){
        $ufcds = Ufcd::all();
        return view('admin.curriculum.edit',['curriculum'=>$curriculum,'ufcds'=>$ufcds]);
    }

    public function update(Request $request, Curriculum $curriculum){
        $request->validate([
            'curriculum_name'=>'required|min:3',
            'ufcds'=>'required|array'

        ]); 

        $curriculum->curriculum_name = $request->curriculum_name;
        $curriculum->update();

        $curriculum->ufcds()->detach();
        $curriculum->ufcds()->attach($request->ufcds);

        return redirect()->route('adminCurriculumAll')->with('sucesso','Curriculo Editado com sucesso');
    }

    public function delete(Curriculum $curriculum){
        $curriculum->ufcds()->detach();
        $curriculum->delete();
        return redirect()->route('adminCurriculumAll')->with('sucesso','Curriculo eliminado com sucesso');
    } 
}
