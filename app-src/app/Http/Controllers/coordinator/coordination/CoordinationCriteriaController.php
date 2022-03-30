<?php

namespace App\Http\Controllers\coordinator\coordination;

use App\Http\Controllers\Controller;
use App\Models\Coordinator_criteria;
use App\Models\Criteria_scale;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoordinationCriteriaController extends Controller
{
    public function __construct(){
        //$this->middleware('coordinator');//Verificar atraves do middleware se o user logado coordinator
    }

    public function all(Turma $turma)
    {
        $criterios = Turma::find($turma->class_id)->class_criteria;
        return view('coordinator.criteria.all',[
            'criterios'=>$criterios,
            'class'=>$turma
        ]);
    }

    public function add(Turma $turma)
    {
        $criteriaScaleNames = Criteria_scale::all(['scale_id','scale_name']);
        return view('coordinator.criteria.create',[
            'criteriaScaleNames'=>$criteriaScaleNames,
            'class'=>$turma
        ]);
    }

    public function edit(Turma $turma, Coordinator_criteria $criteria)
    {
        $coordinator = auth()->user();
        $criteriaScaleNames = Criteria_scale::all(['scale_id','scale_name']);
        return view('coordinator.criteria.edit',[
            'criteria'=>$criteria,
            'criteriaScaleNames'=>$criteriaScaleNames,
            'class'=>$turma,
            'coordinator'=>$coordinator,
        ]);
    }

    public function save(Request $request){
        $request->validate([
            'coordinator_criteria_name'=>'required|min:4',
            'coordinator_criteria_text'=>'required|min:4',
            'coordinator_criteria_scale_type' => 'required|min:1',
            'class_id' => 'required'
        ]);

        $cg = new Coordinator_criteria();
        $cg->coordinator_criteria_name = $request->coordinator_criteria_name;
        $cg->coordinator_criteria_text = $request->coordinator_criteria_text;
        $cg->coordinator_criteria_scale_type = $request->coordinator_criteria_scale_type;
        $cg->coordinator_criteria_class = $request->class_id;
        $cg->save();

        return redirect()->route('coordinatorCriteria', $request->class_id)->with('sucesso','Criterio criado com sucesso');
    }

    public function update(Request $request, Coordinator_criteria $criteria){

        $request->validate([
            'coordinator_criteria_name'=>'required|min:4',
            'coordinator_criteria_text'=>'required|min:4',
            'coordinator_criteria_scale_type' => 'required|min:1',
            'coordinator_criteria_class' => 'required'
        ]);


        $criteria->coordinator_criteria_name = $request->coordinator_criteria_name;
        $criteria->coordinator_criteria_text = $request->coordinator_criteria_text;
        $criteria->coordinator_criteria_scale_type = $request->coordinator_criteria_scale_type;
        $criteria->coordinator_criteria_class = $request->coordinator_criteria_class;
        $criteria->update();

        return redirect()->route('coordinatorCriteria', $request->coordinator_criteria_class)->with('sucesso','Criterio editado com sucesso');
    }

    public function delete(Turma $turma, Coordinator_criteria $criteria)
    {
        $criteria->delete();
        return redirect()->route('coordinatorCriteria', $turma->class_id)->with('sucesso','Criterio eliminado com sucesso');
    }


}
