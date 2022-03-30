<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';
    protected $primaryKey = 'task_id';

    //Uma task pertence a uma turma
    public function class(){
        return $this->belongsTo(Turma::class, 'task_class','class_id');
    }

    //Uma ufcd esta associada a uma task
    public function ufcd(){
        return $this->belongsTo(Ufcd::class, 'task_ufcd','ufcd_number');
    }

    public function date(){
        return $this->belongsTo(task_date::class,'task_date_id','task_date_id');
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function coordinator(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    
    public function groups(){
        return $this->hasMany(Group::class,'task_id','task_id');
    }

    public function task_criterias(){
        return $this->hasMany(TaskCriteria::class,'task_id','task_id');
    }

    public function task_evaluations(){
        return $this->hasMany(CriteriaEvaluation::class,'task_id','task_id');
    }

    public function task_evaluation_comments()
    {
        return $this->hasMany(EvaluationComent::class, 'task_id', 'task_id');
    }

    public function final_evaluations(){
        return $this->hasMany(Task::class,'task_id','task_id');
    }
}
