<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCriteria extends Model
{
    use HasFactory;

    protected $table = 'teacher_criteria';
    protected $primaryKey = 'teacher_criteria_id';

    public function turma(){
        return $this->belongsTo(Turma::class, 'coordinator_criteria_class','class_id');
    }

    public function criteria_scale(){
        return $this->hasOne(Criteria_scale::class, 'scale_id','teacher_criteria_scale_type');
    }

    public function teacher(){
        return $this->belongsTo(User::class,'teacher_criteria_user','teacher_criteria_id');
    }
}
