<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator_criteria extends Model
{
    use HasFactory;

    protected $table = 'coordinator_criteria';
    protected $primaryKey = 'coordinator_criteria_id';

    public function turma(){
        return $this->belongsTo(Turma::class, 'coordinator_criteria_class','class_id');
    }

    public function criteria_scale(){
        return $this->belongsTo(Criteria_scale::class,'coordinator_criteria_scale_type','scale_id');
    }
}
