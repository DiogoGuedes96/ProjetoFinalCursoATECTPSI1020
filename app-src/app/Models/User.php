<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'user_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    */
    public function user_profiles(){
        return $this->belongsToMany(User_Profile::class, 'user_has_profile','user_id','profile_id');
    }

    //Relacao de muitas turmas podem ter um unico coordenador
    public function coordinator_classes(){
        return $this->hasMany(Turma::class, 'class_coordinator','user_id');
    }

    //Um aluno pode pertencer a varias turmas
    //Uma turma pode ter vairos alunos
    public function student_classes(){
        return $this->BelongsToMany(Turma::class, 'class_student','user_id','class_id');
    }

    //Um Professor pode ter varias UFCDS
    public function teacher_ufcds(){
        return $this->belongsToMany(Ufcd::class,'class_ufcd', 'teacher_id','ufcd_id')->withPivot('class_id');
    }
    /*public function teacher_ufcdsByClass(int $id){
        return $this->belongsToMany(Ufcd::class,'class_ufcd', 'teacher_id','ufcd_id')->wherePivot('class_id',$id);
    }*/
    //Um Professor pode ter varias turmas
    public function teacher_classes(){
        return $this->belongsToMany(Turma::class,'class_ufcd', 'teacher_id','class_id')->withPivot('ufcd_id');
    }

    public function teacher_tasks(){
        return $this->hasMany(Task::class, 'user_id', 'user_id');
    }

    public function coordinator_tasks(){
        return $this->hasMany(Task::class, 'user_id', 'user_id');
    }

    public function student_groups(){
        return $this->belongsToMany(Group::class,'group_composition','user_id','group_id')->withPivot('status');
    }

    public function student_groups_nao_entregues(){
        return $this->belongsToMany(Group::class,'group_composition','user_id','group_id')->wherePivot('status','naoEntregue');
    }
    
    public function student_groups_avaliated(){
        return $this->belongsToMany(Group::class,'group_composition','user_id','group_id')->wherePivot('status','avaliada');
    }

    public function student_groups_not_avaliated(){
        return $this->belongsToMany(Group::class,'group_composition','user_id','group_id')->wherePivot('status','entregue');
    }

    public function teacher_criterias(){
        return $this->hasMany(TeacherCriteria::class,'teacher_criteria_user','user_id');
    }

    public function criteria_evaluator(){
        return $this->hasMany(CriteriaEvaluation::class,'evaluator_user_id','user_id');
    }

    public function criteria_evaluated(){
        return $this->hasMany(CriteriaEvaluation::class,'evaluated_user_id','user_id');
    }

    public function final_evaluations(){
        return $this->hasMany(FinalEvaluation::class,'student_id','user_id');
    }

    public function user_evaluator_comment(){
        return $this->hasMany(EvaluationComent::class,'evaluator_user_id','user_id');
    }

    public function user_evaluated_comment(){
        return $this->hasMany(EvaluationComent::class,'evaluated_user_id','user_id');
    }
}
