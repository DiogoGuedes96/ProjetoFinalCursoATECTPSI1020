<?php

namespace App\Http\Controllers\coordinator;

use App\Http\Controllers\admin\AdminCriteriaController;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Admin_criteria_course;
use App\Models\Admin_criteria_general;
use App\Models\Coordinator_criteria;
use App\Models\Task;
use App\Models\TaskCriteria;
use App\Models\task_date;
use App\Models\CoordinatorCriteria;
use App\Models\FinalEvaluation;
use App\Models\Turma;
use App\Models\Ufcd;
use App\Models\User;
use CreateAdminCriteriaCourseTable;
use Database\Seeders\coordinator_criteria as SeedersCoordinator_criteria;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Nette\Utils\Strings;
use PhpParser\Node\Expr\Cast\String_;

class CoordinatorNewTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('coordinator'); //Verificar atraves do middleware se o user logado coordinator
    }

    public function create()
    {
        return view("coordinator.tasks.newtask.taskInfo");
    }

    public function save(Request $request, $continue)
    {
        $request->validate([
            'task_title' => 'required|min:3|max:100',
            'task_description' => 'required',
            'task_file' => 'file|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docm,doxc,dot,dotm,dotx,htm,html,mhtml,odt,rtf,xml,xps,odp,pot,potm,potx,ppa,ppam,pps,ppt,pptx|max:1024000',
        ]);

        //$ufcd = Ufcd::find($request->task_ufcd);
        //$class = Turma::find($request->task_class);
        $t = new Task();
        $t->task_teacher_status = 'no';
        $t->task_title = $request->task_title;
        $t->task_description =  htmlspecialchars($request->task_description);
        $file  = $request->task_file;
        if($file){
            $name = time().'_'.$file->getClientOriginalName();
            $request->task_file->move('documents', $name);
            $t->task_file = $name;
        }
        $t->task_status = 'Unassigned'; //Unassigned or started or finished
        $t->user_id = auth()->user()->user_id;
        $t->save();
        // $t->ufcd()->associate($ufcd);
        // $t->class()->associate($class);

        if ($continue == 'yes') {
            return redirect()->route('coordinatorNewTaskClass', ['task' => $t->task_id]);
        }
        return redirect()->route('coordinatorLibrary')->with('sucesso', 'Tarefa criada e guardada com sucesso');
    }

    public function select_class(Task $task){
        $classes = User::find(auth()->user()->user_id)->coordinator_classes->unique();
        return view('coordinator.tasks.newtask.taskClass', ['classes' => $classes, 'task' => $task]);
    }

    public function group(Turma $turma, Task $task, Ufcd $ufcd){
        $coordinator = auth()->user();

        $task->class()->associate($turma);
        $task->ufcd()->associate($ufcd);
        $task->save();
        //dd($turma->student_classes);
        //$user = User::find(6)->student_classes;
        //dd($turma->student_classes);
        return view('coordinator.tasks.newtask.taskGroups', ['coordinator' => $coordinator, 'turma' => $turma, 'task' => $task]);
    }

    public function group_save(Request $request, Turma $turma, Task $task){
        //dd($task->class);
        $groups = $request->groups;
        $users = $request->users;

        for ($i = 1; $i <= $request->num_groups; $i++) {
            $grp = new Group();
            $grp->group_name = 'Grupo ' . $i;
            $grp->task_id = $task->task_id;
            $grp->group_class = $turma->class_id;
            $grp->save();
            $students = Turma::find($turma->class_id)->class_students;
            $num_students=  $students->count();
            for ($j = 0; $j < $num_students; $j++) {
                
                if ($groups[$j] == $i) {
                    $student = User::find($users[$j]);
                    //Se sim vi buscar valor a users, cria objeto user e faz attach
                    $grp->group_users()->attach($student);
                    $fe = new FinalEvaluation(); //Instanciar uma nova tabela Final Evaluation
                    $fe->student()->associate($student); //Associar o aluno
                    $fe->task()->associate($task); // Associar a tarefa
                    $fe->groups()->associate($grp); //Associar o grupo
                    $fe->save();
                }
            }
        }
        return redirect()->route('coordinatorNewTaskCriteria', ['turma' => $turma->class_id, 'task' => $task->task_id]);

    }
    public function save_date( Request $request ,Task $task)
    {
        $request->validate([
            'task_date_start'=>'required',
            'task_date_start_time'=>'required',
            'task_date_due'=>'required',
            'task_date_due_time'=>'required',
            'task_date_due_avaliation'=>'required',
            'task_date_due_avaliation_time'=>'required',
        ]);


        $t = new task_date();
        $t->task_date_start = $request->task_date_start . " - ".$request->task_date_start_time ;
        $t->task_date_due =  $request->task_date_due. " - ".$request->task_date_due_time;
        $t->task_date_due_avaliation =  $request->task_date_due_avaliation. " - ".$request->task_date_due_avaliation_time;
        $t->save();

        $task->date()->associate($t);
        $task->task_status = "Started"; //Unassigned, Started, Finished, Evaluated 
        $t->task_teacher_status = "NO";
        $task->save();


        return redirect()->route('coordinatorTasks')->with('sucesso','Tarefa atribuida com sucesso');
    }

    public function criteria(Turma $turma, Task $task)
    {
        $criterios_coordinator = User::find(auth()->user()->user_id)->coordinator_criterias;
        $criterios_gerais = Admin_criteria_general::all();
        $criterios_turma = $turma->coordinator_criteria;
        $criterios_curso = $turma->class_course->admin_course_criterias;
        $id = 0;

        return view('coordinator.tasks.newtask.taskCriteria', [
            'criterios_gerais' => $criterios_gerais,
            'criterios_turma' => $criterios_turma,
            'criterios_curso' => $criterios_curso,
            'criterios_coordinator' => $criterios_coordinator,
            'turma' => $turma,
            'id' => $id,
            'task' => $task,
        ]);
    }

    public function date(Task $task)
    {
        return view('coordinator.tasks.newtask.taskDate', ['task'=>$task]);
    }

    public function criteria_save(Request $request, Task $task)
    {
        if ($request->criterios_gerais != null) {
            $c_gerais = $request->criterios_gerais;
            $w_gerais = $request->weight_gerais;
            $i = 0;
            foreach ($w_gerais as $wg) {
                if (!$wg)
                    continue;
                //Se existe vou buscar id do critério
                $criterio = $c_gerais[$i];
                $i++;
                $tc = new TaskCriteria();
                $tc->task()->associate($task);
                $acg = Admin_criteria_general::find($criterio); //chave da tabela
                $tc->task_criteria_name = $acg->admin_criteria_name;
                $tc->task_criteria_text = $acg->admin_criteria_text;
                $tc->task_criteria_weight = $wg;
                $tc->task_criteria_scale_dimension = 5;
                $tc->task_criteria_scale_type = $acg->criteria_scale->scale_id;
                $tc->task_criteria_type = "Geral";
                $tc->task_criteria_type_id = $criterio;
                $tc->save();
            }
        }

        if ($request->criterios_curso != null) {
            $c_curso = $request->criterios_curso;
            $w_curso = $request->weight_curso;
            $i = 0;
            foreach ($w_curso as $wc) {
                if (!$wc)
                    continue;
                //Se existe vou buscar id do critério
                $criterio = $c_curso[$i];
                $i++;
                $tc = new TaskCriteria();
                $tc->task()->associate($task);
                $acg = Admin_criteria_course::find($criterio); //chave da tabela
                $tc->task_criteria_name = $acg->admin_criteria_name;
                $tc->task_criteria_text = $acg->admin_criteria_text;
                $tc->task_criteria_weight = $wc;
                $tc->task_criteria_scale_dimension = 5;
                $tc->task_criteria_scale_type = $acg->criteria_scale->scale_id;
                $tc->task_criteria_type = "Curso";
                $tc->task_criteria_type_id = $criterio;
                $tc->save();
            }
        }

        if ($request->criterios_turma != null) {
            $c_turma = $request->criterios_turma;
            $w_turma = $request->weight_turma;
            $i = 0;
            foreach ($w_turma as $wt) {
                if (!$wt)
                    continue;
                $criterio = $c_turma[$i];
                $i++;
                $tc = new TaskCriteria();
                $tc->task()->associate($task);
                $acg = Coordinator_criteria::find($criterio); //chave da tabela
                $tc->task_criteria_name = $acg->coordinator_criteria_name;
                $tc->task_criteria_text = $acg->coordinator_criteria_text;
                $tc->task_criteria_weight = $wt;
                $tc->task_criteria_scale_dimension = 5;
                $tc->task_criteria_scale_type = $acg->criteria_scale->scale_id;
                $tc->task_criteria_type = "Turma";
                $tc->task_criteria_type_id = $criterio;
                $tc->save();
            }
        }

        return redirect()->route('coordinatorNewTaskDate', $task->task_id);
    }
}
