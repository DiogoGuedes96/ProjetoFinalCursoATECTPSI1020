<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'group';
    protected $primaryKey = 'group_id';


    public function group_users(){
        return $this->belongsToMany(User::class,'group_composition','group_id','user_id')->withPivot('status');
    }
    
    public function group_non_evaluated()
    {
        return $this->belongsToMany(User::class,'group_composition','group_id','user_id')->wherePivot('status','entregue');
    }

    public function group_non_delivered()
    {
        return $this->belongsToMany(User::class,'group_composition','group_id','user_id')->wherePivot('status','naoEntregue');
    }

    public function task(){
        return $this->belongsTo(Task::class,'task_id','task_id');
    }

    public function turma(){
        return $this->belongsTo(Turma::class,'group_class','group_id');
    }

    public function final_evaluations(){
        return $this->hasMany(FinalEvaluation::class,'group_id','group_id');
    }
}
