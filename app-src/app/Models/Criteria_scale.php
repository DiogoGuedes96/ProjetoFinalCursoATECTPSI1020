<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria_scale extends Model
{
    use HasFactory;

    protected $table = 'criteria_scale';
    protected $primaryKey = 'scale_id';

    public function admin_general_criterias(){
        return $this->hasMany(Admin_criteria_general::class, 'admin_criteria_scale_type','scale_id');
    }

    public function admin_course_criterias(){
        return $this->hasMany(Admin_criteria_course::class, 'admin_criteria_scale_type', 'scale_id');
    }

    public function coordinator_criterias(){
        return $this->hasMany(Coordinator_criteria::class, 'coordinator_criteria_scale_type', 'scale_id');
    }

    public function task_criterias(){
        return $this->hasMany(TaskCriteria::class, 'task_criteria_scale_type','scale_id');
    }
}
