<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_criteria_course extends Model
{
    use HasFactory;

    protected $table = 'admin_criteria_course';
    protected $primaryKey = 'admin_criteria_id';

    public function criteria_scale(){
        return $this->belongsTo(Criteria_scale::class,'admin_criteria_scale_type','scale_id');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'admin_criteria_id', 'course_id');
    }
}
