<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'Course';
    protected $primaryKey = 'course_id';

    public function admin_course_criterias(){
        return $this->hasMany(Admin_criteria_course::class,'admin_criteria_course','course_id');
    }

    public function course_turmas(){
        return $this->hasMany(Turma::class,'course_id','course_id');
    }

    public function course_curriculum(){
        return $this->belongsTo(Curriculum::class,'curriculum_id','curriculum_id');
    }

    public function course_classes()
    {
        return $this->hasMany(Turma::class, 'course_id', 'course_id');
    }
}
