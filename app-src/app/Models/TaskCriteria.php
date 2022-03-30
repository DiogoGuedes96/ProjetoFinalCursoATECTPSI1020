<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCriteria extends Model
{
    use HasFactory;

    protected $table = 'task_criteria';
    protected $primaryKey = 'task_criteria_id';

    public function criteria_scale(){
        return $this->belongsTo(Criteria_scale::class, 'task_criteria_scale_type','scale_id');
    }

    public function task(){
        return $this->belongsTo(Task::class,'task_id','task_id');
    }

    public function criteria_evaluation(){
        return $this->hasMany(Task::class,'task_criteria_id','task_criteria_id');
    }
}
