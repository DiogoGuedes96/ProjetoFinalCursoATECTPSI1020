<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class AdminCoursesController extends Controller
{
    public function __construct(){
         $this->middleware('admin');//Verificar atraves do middleware se o user logado admin
     }

    public function all(){
        $courses = Course::all();
        return view('admin.courses.all',['courses'=>$courses]);
    }

    public function new(){
        $curriculums = Curriculum::all(['curriculum_name', 'curriculum_id']);
        return view('admin.courses.create', ['curriculums'=>$curriculums]);
    }


    public function save(Request $request){
        $request->validate([
            'course_name'=>'required',
            'course_slug'=>'required|min:4',
            'course_cet'=>'required|size:1',
            'curriculum_id'=>'required'
        ]);

        $c = new Course();
        $c->course_name = $request->course_name;
        $c->course_slug = $request->course_slug;
        $c->curriculum_id = $request->curriculum_id;
        $c->course_cet = $request->course_cet;
        $c->save();

        return redirect()->route('adminCoursesAll')->with('sucesso','Curso criado com sucesso');
    }

    public function edit(Course $course){
        $curriculums = curriculum::all(['curriculum_name', 'curriculum_id']);
        return view('admin.courses.edit', ['course'=>$course], ['curriculums'=>$curriculums]);
    }

    public function update(Request $request, Course $course){
        $request->validate([
            'curriculum_id'=>'required',
            'course_name'=>'required',
            'course_slug'=>'required|min:4',
            'course_cet'=>'required|size:1'
        ]);

        $course->curriculum_id = $request->curriculum_id;
        $course->course_name = $request->course_name;
        $course->course_slug = $request->course_slug;
        $course->course_cet = $request->course_cet;
        $course->update();
        return redirect()->route('adminCoursesAll')->with('sucesso','Curso editado com sucesso');
    }

    public function delete(Course $Course){
        $Course->delete();
        return redirect()->route('adminCoursesAll')->with('sucesso','Curso eliminado com sucesso');
    }
}
