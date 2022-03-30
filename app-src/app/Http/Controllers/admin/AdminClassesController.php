<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Turma;
use App\Models\User;
use App\Models\User_Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminClassesController extends Controller
{
    public function all(){
        $classes = Turma::all(['class_id', 'class_name', 'course_id','class_startdate','class_enddate','class_school', 'class_coordinator']);
        $courses = Course::all(['course_id','course_name']);
        return view('admin.classes.all',['classes'=>$classes, 'courses'=>$courses]);
    }

    public function listClassesByCourse(Request $request)
    {
        //Não é permitido acesso pelo browser
        if (!$request->ajax())
            return abort(404);

        //Caso a validação falhe
        if ($request->course == 0) {
            $classes = Turma::all();
        }else{
            $classes = Course::find($request->course)->course_classes;
        }
        $coordinators  = [];
        foreach ($classes as $key => $class) {
            $coordinators[$key] = $class->coordinator;
        }
        return response()->json(['classes' => $classes, 'coordinators' => $coordinators]);
    }


    public function new(){
        $courses = Course::all(['course_id','course_name']);
        //$coordinators = User::whereHas('user_profiles', function($q){$q->where('profile_type', 'Coordenador');})->get(['user_name', 'user_id']);
        $coordinators = User_Profile::find(3)->users;
        return view('admin.classes.create',['courses'=>$courses, 'coordinators'=>$coordinators]);
    }

    public function save(Request $request){
        $request->validate([
            'course_id'=>'required|size:1',
            'course_startMonth'=>'required|max:2',
            'course_startYear'=>'required|size:4',
            'course_endMonth'=>'required|max:2',
            'course_endYear'=>'required|size:4',
            'class_school'=>'required',
            'class_coordinator'=>'required'
        ]);  
 
        $t = new Turma();

        switch ($request->class_school){
            case 'Palmela':
                $schoolSlug = 'PL';
                break;
            case 'Cascais':
                $schoolSlug = 'CAS';
            break;    
            case 'Matosinhos':
                $schoolSlug = 'MT';
            break; 
            case 'Carregado':
                $schoolSlug = 'CR';
            break;     
            case 'São João da Madeira':
                $schoolSlug = 'SJM';
            break;  
        }

        $course = Course::find($request->course_id);

        //Criar class name [ sliga do curso + start date + school (TPSI 1020 PL) ]
        $className = $course->course_slug.$schoolSlug .$request->course_startMonth.substr($request->course_startYear, -2);
        $startDate = $request->course_startMonth.'/'.$request->course_startYear;
        $endDate = $request->course_endMonth.'/'.$request->course_endYear;

        $t->course_id = $request->course_id;
        $t->class_school = $request->class_school;
        $t->class_coordinator = $request->class_coordinator;
        $t->class_startdate = $startDate;
        $t->class_enddate = $endDate;
        $t->class_name = $className;
        $t->save();

        return redirect()->route('adminClassesAll')->with('sucesso','Turma criada com sucesso');
    }
    public function edit(Turma $class){
        $courses = Course::all(['course_id','course_name']);
        $coordinators = User::all(['user_id','user_name']); 
        return view('admin.classes.edit',['class'=>$class, 'courses'=>$courses, 'coordinators'=>$coordinators]);
    }

    public function update(Request $request, Turma $class){
        $request->validate([
            'course_startMonth'=>'required|max:2',
            'course_startYear'=>'required|size:4',
            'course_endMonth'=>'required|max:2',
            'course_endYear'=>'required|size:4',
            'class_school'=>'required',
            'class_coordinator'=>'required'
        ]);

        switch ($request->class_school){
            case 'Palmela':
                $schoolSlug = 'PL';
                break;
            case 'Cascais':
                $schoolSlug = 'CL';
            break;    
            case 'Matosinhos':
                $schoolSlug = 'MT';
            break; 
            case 'Carregado':
                $schoolSlug = 'CR';
            break;     
            case 'São João da Madeira':
                $schoolSlug = 'SJM';
            break;  
        }

        $course = Course::find($request->course_id);

        //Criar class name [ sliga do curso + start date + school (TPSI 1020 PL) ]
        $className = $course->course_slug.$schoolSlug .$request->course_startMonth.substr($request->course_startYear, -2);
        $startDate = $request->course_startMonth.'/'.$request->course_startYear;
        $endDate = $request->course_endMonth.'/'.$request->course_endYear;
        
        $class->course_id = $request->course_id;
        $class->class_school = $request->class_school;
        $class->class_coordinator = $request->class_coordinator;
        $class->class_startdate = $startDate;
        $class->class_enddate = $endDate;
        $class->class_name = $className;
        $class->update();   

        return redirect()->route('adminClassesAll')->with('sucesso','Turma Editada com sucesso');
    }

    public function delete(Turma $class){
        $class->delete();
        return redirect()->route('adminClassesAll')->with('sucesso','Turma eliminada com sucesso');
    }
}
