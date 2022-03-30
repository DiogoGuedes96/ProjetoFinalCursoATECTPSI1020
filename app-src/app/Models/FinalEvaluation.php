<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalEvaluation extends Model
{
    use HasFactory;

    protected $table = 'final_evaluation';
    protected $primaryKey = 'final_evaluation_id';

    public function groups(){
        return $this->belongsTo(Group::class,'group_id','group_id');
    }

    public function task(){
        return $this->belongsTo(Task::class,'task_id','task_id');
    }

    public function student(){
        return $this->belongsTo(Task::class,'student_id','user_id');
    }
}
