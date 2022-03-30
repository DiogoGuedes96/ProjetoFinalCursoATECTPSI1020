<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin_criteria_general;
use App\Models\Admin_criteria_course;
use App\Models\Course;
use App\Models\Criteria_scale;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCriteriaController extends Controller
{

    public function __construct(){
        $this->middleware('admin');//Verificar atraves do middleware se o user logado admin
    }


    /**
     * Criterios Gerais
     */
        //Mostar todos os criterios Gerais
        public function generalAll(){
            $generalCriteria = Admin_criteria_general::all();
            return view('admin.criteria.geral.all',['generalCriteria'=>$generalCriteria]);
        }

        public function generalNew(){
            $criteriaScaleNames = Criteria_scale::all(['scale_id','scale_name']);
            return view('admin.criteria.geral.new',['criteriaScaleNames'=>$criteriaScaleNames]);
        }

        public function generalSave(Request $request){
            $request->validate([
                'admin_criteria_name'=>'required|min:4',
                'admin_criteria_text'=>'required|min:4',
                'admin_criteria_scale_type' => 'required|min:1',
            ]);

            $cg = new Admin_criteria_general();
            $cg->admin_criteria_name = $request->admin_criteria_name;
            $cg->admin_criteria_text = $request->admin_criteria_text;
            $cg->admin_criteria_scale_type = $request->admin_criteria_scale_type;
            $cg->save();

            return redirect()->route('adminGeneralCriteriaAll')->with('sucesso','Critério geral criado com sucesso');
        }

        public function generalEdit(Admin_criteria_general $admin_criteria_general){
            $criteriaScaleNames = Criteria_scale::all();
            return view('admin.criteria.geral.edit', compact('criteriaScaleNames', 'admin_criteria_general'));
        }


        public function generalUpdate(Request $request,Admin_criteria_general $admin_criteria_general){
            $request->validate([
                'admin_criteria_name'=>'required|min:4',
                'admin_criteria_text'=>'required|min:4',
                'admin_criteria_scale_type' => 'required|min:1',
            ]);

            $admin_criteria_general->admin_criteria_name = $request->admin_criteria_name;
            $admin_criteria_general->admin_criteria_text = $request->admin_criteria_text;
            $admin_criteria_general->admin_criteria_scale_type = $request->admin_criteria_scale_type;
            $admin_criteria_general->update();

            return redirect()->route('adminGeneralCriteriaAll')->with('sucesso','Critério geral editado com sucesso');
        }


        public function generalDelete(Admin_criteria_general $admin_criteria_general){
            $admin_criteria_general->delete();
            return redirect()->route('adminGeneralCriteriaAll')->with('sucesso','Critério geral eliminado com sucesso');
        }

        /**
         * Criterios de curso
         */
        //Mostar todos os criterios Gerais
        public function courseAll(){
            $courseCriteria = Admin_criteria_course::all();
            $courses = Course::all();
            return view('admin.criteria.course.all', compact('courses', 'courseCriteria'));
        }

        public function courseNew(){
            $criteriaScaleNames = Criteria_scale::all(['scale_id','scale_name']);
            $courses = Course::all();
            return view('admin.criteria.course.new',compact('criteriaScaleNames','courses'));
        }

        public function courseEdit(Admin_criteria_course $admin_criteria_course){
            $courses = Course::all();
            $criteriaScaleNames = Criteria_scale::all();
            return view('admin.criteria.course.edit',compact('admin_criteria_course','courses', 'criteriaScaleNames'));
        }

        public function courseSave(Request $request){
            $request->validate([
                'course_id'=>'required',
                'admin_criteria_name'=>'required|min:4',
                'admin_criteria_text'=>'required|min:4',
                'admin_criteria_scale_type' => 'required|min:1',
            ]);

            $cc = new Admin_criteria_course();
            $cc->admin_criteria_name = $request->admin_criteria_name;
            $cc->admin_criteria_text = $request->admin_criteria_text;
            $cc->admin_criteria_scale_type = $request->admin_criteria_scale_type;
            $cc->admin_criteria_course = $request->course_id;
            $cc->save();

            return redirect()->route('adminCourseCriteriaAll')->with('sucesso','Critério de curso criado com sucesso!');
        }

        public function courseUpdate(Request $request,Admin_criteria_course $admin_criteria_course){
            $request->validate([
                'course_id'=>'required',
                'admin_criteria_name'=>'required|min:4|',
                'admin_criteria_text'=>'required|min:4',
                'admin_criteria_scale_type' => 'required|min:1',
            ]);

            $admin_criteria_course->admin_criteria_name = $request->admin_criteria_name;
            $admin_criteria_course->admin_criteria_text = $request->admin_criteria_text;
            $admin_criteria_course->admin_criteria_scale_type = $request->admin_criteria_scale_type;
            $admin_criteria_course->admin_criteria_course = $request->course_id;
            $admin_criteria_course->update();

            return redirect()->route('adminCourseCriteriaAll')->with('sucesso','Critério de curso editado com sucesso');
        }


        public function courseDelete(Admin_criteria_course $admin_criteria_course){
            $admin_criteria_course->delete();
            return redirect()->route('adminCourseCriteriaAll')->with('sucesso','Critério de curso eliminado com sucesso');
        }
}
