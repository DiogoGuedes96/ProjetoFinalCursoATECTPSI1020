<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminClassesController;
use App\Http\Controllers\admin\AdminCoursesController;
use App\Http\Controllers\admin\AdminCriteriaController;
use App\Http\Controllers\admin\AdminCurriculumController;
use App\Http\Controllers\admin\AdminUfcdsController;
use App\Http\Controllers\admin\AdminUsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleChangerController;
use App\Http\Controllers\teacher\TeacherController;
use App\Http\Controllers\teacher\TeacherTaskController;
use App\Http\Controllers\teacher\TeacherNewTaskController;

use App\Http\Controllers\coordinator\CoordinatorController;
use App\Http\Controllers\coordinator\coordination\CoordinationCriteriaController;
use App\Http\Controllers\coordinator\coordination\CoordinatorClassesController;
use App\Http\Controllers\coordinator\coordination\CoordinatorStudentsController;
use App\Http\Controllers\coordinator\coordination\CoordinatorTeachersController;
use App\Http\Controllers\coordinator\coordination\TaskCoordinationController;
use App\Http\Controllers\coordinator\coordination\CriteriaCoordinationController;
use App\Http\Controllers\coordinator\CoordinatorNewTaskController;
use App\Http\Controllers\coordinator\CoordinatorTaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\student\StudentEvaluationsController;
use App\Http\Controllers\student\StudentTasksController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\teacher\TeacherCriteriaController;
use App\Http\Controllers\teacher\TeacherEvaluationController;
use App\Http\Controllers\user\UserController;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
########################################################
Paginas Gerais
Paginas acessiveis a todo o tipo de utilizador
########################################################
*/
//Paginas nao logadas

//Login
Auth::routes();

/*
########################################################
    Paginas de Admin
    Paginas acessiveis pelo Admin
########################################################
*/
//Landing Page
Route::get('/', [HomeController::class,'index'])->name('landingPage');

//#TODO Route temp para
Route::get('/role', [RoleChangerController::class, 'index'])->name('roles');
Route::post('/rolechange', [RoleChangerController::class, 'ChangeProfile'])->name('rolechange');

Route::get('/admin/profile', [AdminController::class,'profile'])->name('adminProfile');
Route::post('/admin/profile', [AdminController::class,'update'])->name('adminProfileEdit');
//Admin Dashboard
Route::get('/admin', [AdminController::class, 'home'])->name('dashboardAdmin');

/*
* Admin Users
*/
//Mostrar todos os users
Route::get('/admin/users', [AdminUsersController::class, 'all'])->name('adminUsersAll');
//Criar e Guardar um novo user
Route::get('/admin/users/create', [AdminUsersController::class, 'new'])->name('adminUsersCreate');
Route::post('/admin/users/save', [AdminUsersController::class, 'save'])->name('adminUsersSave');
//Editar e fazer o Update de um User
Route::get('/admin/users/edit/{user}', [AdminUsersController::class, 'edit'])->name('adminUsersEdit');
Route::post('/admin/users/update/{user}', [AdminUsersController::class, 'update'])->name('adminUsersUpdate');
//Eliminar um User
Route::get('/admin/users/delete/{user}', [AdminUsersController::class, 'delete'])->name('adminUsersDelete');

/*
* Admin Classes
*/
//Mostrar todos as turmas
Route::get('/admin/classes', [AdminClassesController::class, 'all'])->name('adminClassesAll');
Route::post('/admin/classes/listclass', [AdminClassesController::class, 'listClassesByCourse'])->name('adminClassesByCourse');
//Criar e Guardar uma nova Turma
Route::get('/admin/classes/create', [AdminClassesController::class, 'new'])->name('adminClassesCreate');
Route::post('/admin/classes/save', [AdminClassesController::class, 'save'])->name('adminClassesSave');
//Editar e fazer o Update de uma turma
Route::get('/admin/classes/edit/{class}', [AdminClassesController::class, 'edit'])->name('adminClassesEdit');
Route::post('/admin/classes/update/{class}', [AdminClassesController::class, 'update'])->name('adminClassesUpdate');
//Eliminar uma turma
Route::get('/admin/classes/delete/{class}', [AdminClassesController::class, 'delete'])->name('adminClassesDelete');

/*
* Admin Cursos
*/
//Mostrar todos os cursos
Route::get('/admin/courses', [AdminCoursesController::class, 'all'])->name('adminCoursesAll');
//Criar e Guardar um novo Curso
Route::get('/admin/courses/create', [AdminCoursesController::class, 'new'])->name('adminCoursesCreate');
Route::post('/admin/courses/save', [AdminCoursesController::class, 'save'])->name('adminCoursesSave');
//Editar e fazer o Update de um curso
Route::get('/admin/courses/edit/{course}', [AdminCoursesController::class, 'edit'])->name('adminCoursesEdit');
Route::post('/admin/courses/update/{course}', [AdminCoursesController::class, 'update'])->name('adminCoursesUpdate');
//Eliminar um curso
Route::get('/admin/courses/delete/{course}', [AdminCoursesController::class, 'delete'])->name('adminCoursesDelete');

/*
* Admin Ufcds
*/
//Mostrar todas as Ufcds
Route::get('/admin/ufcd/', [AdminUfcdsController::class, 'all'])->name('adminUfcdAll');
//Criar e Guardar uma nova Ufcd
Route::get('/admin/ufcd/new', [AdminUfcdsController::class, 'new'])->name('adminUfcdNew');
Route::post('/admin/ufcd/save', [AdminUfcdsController::class, 'save'])->name('adminUfcdSave');
//Editar e fazer o Update de uma Ufcd
Route::get('/admin/ufcd/edit/{ufcd}', [AdminUfcdsController::class, 'edit'])->name('adminUfcdEdit');
Route::post('/admin/ufcd/update/{ufcd}', [AdminUfcdsController::class, 'update'])->name('adminUfcdUpdate');
//Eliminar uma Ufcd
Route::get('/admin/ufcd/delete/{ufcd}', [AdminUfcdsController::class, 'delete'])->name('adminUfcdDelete');

/*
* Admin Curriculos
*/
//Mostrar todos os curriculos
Route::get('/admin/curriculum', [AdminCurriculumController::class, 'all'])->name('adminCurriculumAll');
//Criar e Guardar um novo Curriculo
Route::get('/admin/curriculum/new', [AdminCurriculumController::class, 'new'])->name('adminCurriculumNew');
Route::post('/admin/curriculum/save', [AdminCurriculumController::class, 'save'])->name('adminCurriculumSave');
//Editar e fazer o Update de um curriculo
Route::get('/admin/curriculum/edit/{curriculum}', [AdminCurriculumController::class, 'edit'])->name('adminCurriculumEdit');
Route::post('/admin/curriculum/update/{curriculum}', [AdminCurriculumController::class, 'update'])->name('adminCurriculumUpdate');
//Eliminar Curriculum
Route::get('/admin/curriculum/delete/{curriculum}', [AdminCurriculumController::class, 'delete'])->name('adminCurriculumDelete');

/*
* Admin Critérios GERAIS
*/
//Mostrar todos os Criterios gerais
Route::get('/admin/generalcriteria', [AdminCriteriaController::class, 'generalAll'])->name('adminGeneralCriteriaAll');
//Criar e Guardar um novo Criterios geral
Route::get('/admin/generalcriteria/new', [AdminCriteriaController::class, 'generalNew'])->name('adminGeneralCriteriaNew');
Route::post('/admin/generalcriteria/save', [AdminCriteriaController::class, 'generalSave'])->name('adminGeneralCriteriaSave');
//Editar e fazer o Update de um Criterios geral
Route::get('/admin/generalcriteria/edit/{admin_criteria_general}', [AdminCriteriaController::class, 'generalEdit'])->name('adminGeneralCriteriaEdit');
Route::post('/admin/generalcriteria/update/{admin_criteria_general}', [AdminCriteriaController::class, 'generalUpdate'])->name('adminGeneralCriteriaUpdate');
//Eliminar Criterios gerais
Route::get('/admin/generalcriteria/delete/{admin_criteria_general}', [AdminCriteriaController::class, 'generalDelete'])->name('adminGeneralCriteriaDelete');
/*
* Admin Critérios CURSO
*/
//Mostrar todos os Criterios de curso
Route::get('/admin/coursecriteria', [AdminCriteriaController::class, 'courseAll'])->name('adminCourseCriteriaAll');
//Criar e Guardar um novo Criterios de curso
Route::get('/admin/coursecriteria/new', [AdminCriteriaController::class, 'courseNew'])->name('adminCourseCriteriaNew');
Route::post('/admin/coursecriteria/save', [AdminCriteriaController::class, 'courseSave'])->name('adminCourseCriteriaSave');
//Editar e fazer o Update de um Criterios de curso
Route::get('/admin/coursecriteria/edit/{admin_criteria_course}', [AdminCriteriaController::class, 'courseEdit'])->name('adminCourseCriteriaEdit');
Route::post('/admin/coursecriteria/update/{admin_criteria_course}', [AdminCriteriaController::class, 'courseUpdate'])->name('adminCourseCriteriaUpdate');
//Eliminar Criterios de curso
Route::get('/admin/coursecriteria/delete/{admin_criteria_course}', [AdminCriteriaController::class, 'courseDelete'])->name('adminCourseCriteriaDelete');


/*
########################################################
    Paginas de Student
    Paginas acessiveis pelo Student
########################################################
*/
//Student profile
Route::get('/student/profile', [StudentController::class,'profile'])->name('studentProfile');
Route::post('/student/profile', [StudentController::class,'update'])->name('studentProfileEdit');

//Student Tasks
Route::get('/student', [StudentTasksController::class,'all'])->name('studentsDashboard');
Route::get('/student/tasks/detailed/{id}', [StudentTasksController::class,'detailed'])->name('studentsTaskDetailed');
Route::get('/student/tasks/detailed/{task}/download', [StudentTasksController::class,'download'])->name('studentsTaskDownload');
Route::get('/student/evaluations', [StudentEvaluationsController::class,'all'])->name('studentsEvaluations');
Route::post('student/evaluation/{task}/saveEval', [StudentEvaluationsController::class, 'save'])->name('studentsEvaluationsSave');
Route::get('/student/evaluation/{group}/comments', [StudentEvaluationsController::class, 'comments'])->name('studentsEvaluationsComments');
Route::post('/student/evaluation/{task}/commentsSave', [StudentEvaluationsController::class, 'saveComments'])->name('studentsEvaluationsCommentsSave');
Route::get('/student/evaluation/{group}', [StudentEvaluationsController::class,'individualEvaluation'])->name('studentEvaluatesStudent');
Route::post('/student/tasks/detailed/{group}/{task}', [StudentTasksController::class,'submitTask'])->name('StudentSubmit');

/*
########################################################
    Paginas de Formador
    Paginas acessiveis pelo Formador
########################################################
*/
//Landing page
Route::get('/teacher',[TeacherTaskController::class,'all'])->name('teacherDashboard');

//Teacher profile
Route::get('/teacher/profile', [TeacherController::class,'profile'])->name('teacherProfile');
Route::post('/teacher/profile', [TeacherController::class,'update'])->name('teacherProfileEdit');

Route::get('/teacher/task/library',[TeacherTaskController::class,'library'])->name('teacherLibrary');

//Teacher Tasks
Route::get('/teacher/task/show/{task}',[TeacherTaskController::class,'show'])->whereNumber('id')->name('teachersTask');
Route::get('/teacher/task/show/{task}/download',[TeacherTaskController::class,'download'])->name('teachersTaskDownload');
Route::get('/teacher/task/edit/{task}',[TeacherTaskController::class,'edit'])->whereNumber('id')->name('teachersTaskEdit');
Route::post('/teacher/task/update/{task}',[TeacherTaskController::class, 'update'])->name('teacherTaskUpdate');
Route::get('/teacher/task/delete/{task}',[TeacherTaskController::class,'delete'])->whereNumber('id')->name('teachersTaskDelete');

//Teacher remove a group element
Route::get('/teacher/task/group/delete/{group}/{user}',[TeacherTaskController::class,'deleteGroupElement'])->whereNumber('group_id')->whereNumber('user_id')->name('teacherGroupElementDelete');

//Teacher new Task
Route::get('/teacher/newtask/',[TeacherNewTaskController::class,'create'])->name('teachersNewTask');
Route::post('/teacher/newtask/save/{continue}', [TeacherNewTaskController::class, 'save'])->name('teachersNewTaskSave');
Route::get('/teacher/newtask/{task}/select_class', [TeacherNewTaskController::class, 'select_class'])->name('teacherNewTaskClass');
Route::get('/teacher/newtask/{turma}/{task}/{ufcd}/group',[TeacherNewTaskController::class,'group'])->name('teacherNewTaskGroup');
Route::post('/teacher/newtask/{turma}/{task}/group/save', [TeacherNewTaskController::class, 'group_save'])->name('teacherNewTaskGroupSave');
Route::get('/teacher/newtask/{turma}/{task}/criteria',[TeacherNewTaskController::class,'criteria'])->name('teacherNewTaskCriteria');
Route::post('/teacher/newtask/{task}/criteria/save',[TeacherNewTaskController::class,'criteria_save'])->name('teacherNewTaskCriteriaSave');
Route::get('/teacher/newtask/{task}/date',[TeacherNewTaskController::class,'date'])->name('teacherNewTaskDate');
Route::post('/teacher/newtask/{task}/date/save',[TeacherNewTaskController::class,'save_date'])->name('teacherNewTaskDateSave');

//Teacher task evaluation
Route::get('/teacher/task/{task}/evaluation', [TeacherEvaluationController::class, 'all'])->name('teacherTaskEvaluation');
Route::post('/teacher/task/{task}/evaluationSave', [TeacherEvaluationController::class, 'save'])->name('teacherTaskEvaluationSave');


/*
* Formador Gestao de criterios de formador
*/
Route::get('/teacher/criteria', [TeacherCriteriaController::class, 'all'])->name('teacherCriteriaAll');
//Criar e salvar um novo criterio
Route::get('/teacher/criteria/new', [TeacherCriteriaController::class, 'new'])->where('id', '[0-9]+')->name('teacherCriteriaNew');
Route::post('/teacher/criteria/save', [TeacherCriteriaController::class, 'save'])->where('id', '[0-9]+')->name('teacherCriteriaSave');
//Editar e update de um citerio
Route::get('/teacher/criteria/edit/{criteria}', [TeacherCriteriaController::class,'edit'])->where('id','[0-9]+')->name('teacherCriteriaEdit');
Route::post('/teacher/criteria/update/{criteria}', [TeacherCriteriaController::class,'update'])->where('id','[0-9]+')->name('teacherCriteriaUpdate');
//Eliminar um criterio
Route::get('/teacher/criteria/delete/{criteria}', [TeacherCriteriaController::class, 'delete'])->where('id', '[0-9]+')->name('teacherCriteriaDelete');



/*
########################################################
    Paginas de Coordinator
    Paginas acessiveis pelo Coordinator
########################################################
*/
//Coordinator Coordination Classes
//Landing Page
Route::get('/coordinator', [CoordinatorController::class,'all'])->name('coordinatorDashboard');

//Coordinator profile
Route::get('/coordinator/profile', [CoordinatorController::class,'profile'])->name('coordinatorProfile');
Route::post('/coordinator/profile', [CoordinatorController::class,'update'])->name('coordinatorProfileEdit');

/*
* Coordenador Gestao de alunos
*/
//Coordinator Coordination Students
Route::get('/coordinator/coordination/{turma}/students', [CoordinatorStudentsController::class,'all'])->name('coordinatorStudents');
Route::get('/coordinator/coordination/{turma}/students/add', [CoordinatorStudentsController::class,'add'])->name('coordinatorStudentsAdd');
Route::post('/coordinator/coordination/students/save', [CoordinatorStudentsController::class, 'save'])->name('coordinatorStudentsSave');
Route::get('/coordinator/coordination/students/delete/{id}', [CoordinatorStudentsController::class,'delete'])->where('id','[0-9]+')->name('coordinatorStudentsDelete');

/*
* Coordenador Gestao de Formadores
*/
Route::get('/coordinator/coordination/{turma}/teachers/all', [CoordinatorTeachersController::class,'all'])->name('coordinatorTeachers');
Route::get('/coordinator/coordination/{turma}/teachers/add', [CoordinatorTeachersController::class,'add'])->name('coordinatorTeachersAdd');
Route::post('/coordinator/coordination/teachers/listufcds', [CoordinatorTeachersController::class, 'getUFCDbyTeachersByClass'])->name('coordinatorGetUFCD');
Route::post('/coordinator/coordination/teachers/addufcd', [CoordinatorTeachersController::class, 'addClassUFCDtoTeacher'])->name('coordinatorAddUFCD');
Route::post('/coordinator/coordination/teachers/removeufcd', [CoordinatorTeachersController::class, 'removeClassUFCDfromTeacher'])->name('coordinatorRemoveUFCD');
Route::post('/coordinator/coordination/teachers/save', [CoordinatorTeachersController::class,'save'])->name('coordinatorTeachersSave');
Route::get('/coordinator/coordination/teachers/delete/{id}', [CoordinatorTeachersController::class,'delete'])->where('id','[0-9]+')->name('coordinatorTeachersDelete');

/*
* Coordenador Gestao de tarefas
*/
Route::get('/coordinator/task/library',[CoordinatorTaskController::class,'library'])->name('coordinatorLibrary');//biblioteca de tarefas
Route::get('/coordinator/tasks',[CoordinatorTaskController::class,'all'])->name('coordinatorTasks');//tarefas atrubidas e concluidas etc
Route::get('/coordinator/task/show/{task}',[CoordinatorTaskController::class,'show'])->whereNumber('id')->name('coordinatorTask');
Route::get('/coordinator/task/show/{task}/download',[CoordinatorTaskController::class,'download'])->name('coordinatorTaskDownload');
Route::get('/coordinator/task/edit/{task}',[CoordinatorTaskController::class,'edit'])->whereNumber('id')->name('coordinatorTaskEdit');
Route::post('/coordinator/task/update/{task}',[CoordinatorTaskController::class, 'update'])->name('coordinatorTaskUpdate');
Route::get('/coordinator/task/delete/{task}',[CoordinatorTaskController::class,'delete'])->whereNumber('id')->name('coordinatorTaskDelete');


/*
* Coordenador Gestao de novas tarefas
*/
Route::get('/coordinator/newtask/',[CoordinatorNewTaskController::class,'create'])->name('coordinatorNewTask');
Route::post('/coordinator/newtask/save/{continue}', [CoordinatorNewTaskController::class, 'save'])->name('coordinatorNewTaskSave');
Route::get('/coordinator/newtask/{task}/select_class', [CoordinatorNewTaskController::class, 'select_class'])->name('coordinatorNewTaskClass');
Route::get('/coordinator/newtask/{turma}/{task}/{ufcd}/group',[CoordinatorNewTaskController::class,'group'])->name('coordinatorNewTaskGroup');
Route::post('/coordinator/newtask/{turma}/{task}/group/save', [CoordinatorNewTaskController::class, 'group_save'])->name('coordinatorNewTaskGroupSave');
Route::get('/coordinator/newtask/{turma}/{task}/criteria',[CoordinatorNewTaskController::class,'criteria'])->name('coordinatorNewTaskCriteria');
Route::post('/coordinator/newtask/{task}/criteria/save',[CoordinatorNewTaskController::class,'criteria_save'])->name('coordinatorNewTaskCriteriaSave');
Route::get('/coordinator/newtask/{task}/date',[CoordinatorNewTaskController::class,'date'])->name('coordinatorNewTaskDate');
Route::post('/coordinator/newtask/{task}/date/save',[CoordinatorNewTaskController::class,'save_date'])->name('coordinatorNewTaskDateSave');

//Coordenador task evaluation
Route::get('/coordinator/task/{task}/evaluation', [CoordinatorEvaluationController::class, 'all'])->name('coordinatorTaskEvaluation');
Route::post('/coordinator/task/{task}/evaluationSave', [CoordinatorEvaluationController::class, 'save'])->name('coordinatorTaskEvaluationSave');


/*
* Coordenador Gestao de criterios de coordenador
*/
Route::get('/coordinator/{turma}/criteria', [CoordinationCriteriaController::class,'all'])->name('coordinatorCriteria');
//Criar e salvar um novo criterio
Route::get('/coordinator/{turma}/criteria/new', [CoordinationCriteriaController::class,'add'])->where('id','[0-9]+')->name('coordinatorCriteriaAdd');
Route::post('/coordinator/criteria/save', [CoordinationCriteriaController::class,'save'])->where('id','[0-9]+')->name('coordinatorCriteriaSave');
//Editar e update de um citerio
Route::get('/coordinator/criteria/{turma}/edit/{criteria}', [CoordinationCriteriaController::class,'edit'])->where('id','[0-9]+')->name('coordinatorCriteriaEdit');
Route::post('/coordinator/criteria/update/{criteria}', [CoordinationCriteriaController::class,'update'])->where('id','[0-9]+')->name('coordinatorCriteriaUpdate');
//Eliminar um criterio
Route::get('/coordinator/criteria/{turma}/delete/{criteria}', [CoordinationCriteriaController::class,'delete'])->name('coordinatorCriteriaDelete');

//Login - Aplicação
Auth::routes();
//Login 365
Route::get('/connect365',    [LoginController::class,'connect365'])   ->name('connect365');
Route::get('/callback365',   [LoginController::class,'callback365'])  ->name('callback365');
Route::get('/disconnect365', [LoginController::class,'disconnect365'])->name('disconnect365');
Route::post('/firstLogin',   [LoginController::class,'firstTime'])    ->name('firstLogin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/faq', [App\Http\Controllers\FaqController::class, 'faq'])->name('faq');


Route::get('/teste',[CoordinatorTeachersController::class,'testeQueries']);
