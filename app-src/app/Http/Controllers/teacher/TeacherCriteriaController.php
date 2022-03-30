<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Criteria_scale;
use App\Models\TeacherCriteria;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TeacherCriteriaController extends Controller
{
    public function __construct(){
        $this->middleware('teacher');//Verificar atraves do middleware se o user logado teacher
    }

    public function all()
    {
        $criteria = TeacherCriteria::all();
        return view('teacher.criteria.all',['courseCriteria'=>$criteria]);
    }

    public function new()
    {
        $criteria_scale = Criteria_scale::all();
        return view('teacher.criteria.new',['criteriaScaleNames'=>$criteria_scale]);
    }

    public function save(Request $request)
    {
        //dd(auth()->user()->user_id);
        //dd($request->all());
        $validated = $request->validate([
            'teacher_criteria_name' => 'required',
            'teacher_criteria_scale_type' => 'required',
            'teacher_criteria_text' => 'required'
        ]);

        $criteria = new TeacherCriteria();
        $criteria->teacher_criteria_name = $request->input('teacher_criteria_name');
        $criteria->teacher_criteria_scale_type = $request->input('teacher_criteria_scale_type');
        $criteria->teacher_criteria_text = $request->input('teacher_criteria_text');
        $criteria->teacher_criteria_user = auth()->user()->user_id;
        $criteria->save();

        return redirect()->route('teacherCriteriaAll')->with('sucesso','Criterio criado com sucesso');
    }

    public function edit(TeacherCriteria $criteria)
    {
        $criteria_scale = Criteria_scale::all();
        return view('teacher.criteria.edit',['criteria'=>$criteria,'criteriaScaleNames'=>$criteria_scale]);
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'teacher_criteria_name' => 'required',
            'teacher_criteria_scale_type' => 'required',
            'teacher_criteria_text' => 'required'
        ]);

        try
        {
            $criteria = TeacherCriteria::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            //dd("O id Criterio não corresponde a base de dados");
            return redirect()->route('teacherCriteriaAll')->with('Erro','O id Criterio não corresponde a base de dados');
        }

        $criteria->teacher_criteria_name = $request->input('teacher_criteria_name');
        $criteria->teacher_criteria_scale_type = $request->input('teacher_criteria_scale_type');
        $criteria->teacher_criteria_text = $request->input('teacher_criteria_text');
        $criteria->teacher_criteria_user = auth()->user()->user_id;
        $criteria->save();

        return redirect()->route('teacherCriteriaAll')->with('sucesso','Criterio editado com sucesso');

    }

    public function delete($id)
    {
        try
        {
            $criteria = TeacherCriteria::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return redirect()->route('teacherCriteriaAll')->with('Erro','O id Criterio não corresponde a base de dados');
        }

        $criteria->delete();

        return redirect()->route('teacherCriteriaAll')->with('sucesso','Criterio apagado com sucesso');
    }


}
