<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaEvaluation extends Model
{
    use HasFactory;

    protected $table = 'criteria_evaluation';
    protected $primaryKey = 'criteria_evaluation_id';


    public function task(){
        return $this->belongsTo(Task::class,'task_id','task_id');
    }

    public function taskCriterias(){
        return $this->belongsTo(TaskCriteria::class,'task_criteria_id','task_criteria_id');
    }

    public function user_avaliado(){
        return $this->belongsTo(User::class,'evaluated_user_id','user_id');
    }

    public function user_avaliador(){
        return $this->belongsTo(User::class,'evaluator_user_id','user_id');
    }
}
