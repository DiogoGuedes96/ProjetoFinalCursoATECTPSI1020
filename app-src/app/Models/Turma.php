<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;
    protected $table = 'class';
    protected $primaryKey = 'class_id';
    //protected $hidden=['pivot'];


    //Relacao de muitas turmas podem ter um unico coordenador
    public function coordinator()
    {
        return $this->belongsTo(User::class, 'class_coordinator', 'user_id');
    }

    //Um aluno pode pertencer a varias turmas
    //Uma turma pode ter vairos alunos
    public function class_students()
    {
        return $this->BelongsToMany(User::class, 'class_student', 'class_id', 'user_id');
    }

    public function class_course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }


    /**
     * Relações através da tabela pivot class_ufcd
     *  * class_ufcd
     *  * * teacher_id
     *  * * class_id
     *  * * ufcd_id
     */
    //Uma turma pode ter muitas Ufcds
    public function class_ufcds()
    {
        return $this->BelongsToMany(Ufcd::class, 'class_ufcd', 'class_id', 'ufcd_id')->withPivot('teacher_id');
    }

    //Uma turma pode ter muitos professores
    public function class_teachers()
    {
        return $this->belongsToMany(User::class, 'class_ufcd', 'class_id', 'teacher_id')->withPivot('ufcd_id');
    }


    //Critérios da turma
    public function class_criteria()
    {
        //esta a mais
        return $this->hasMany(Coordinator_criteria::class, 'coordinator_criteria_class', 'class_id');
    }

    public function coordinator_criteria(){
        return $this->hasMany(Coordinator_criteria::class,'coordinator_criteria_class','class_id');
    }

    //Uma turma pode ter multiplas tasks
    public function tasks(){
        return $this->hasMany(Task::class, 'task_class', 'class_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class,'group_class','class_id',);
    }
}
