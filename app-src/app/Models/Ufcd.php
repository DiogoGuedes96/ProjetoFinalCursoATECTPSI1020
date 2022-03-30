<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ufcd extends Model
{
    use HasFactory;

    protected $table = 'ufcd';
    protected $primaryKey = 'ufcd_number';
    protected $hidden = ['pivot'];

    //Funcao que indica que uma UFCD pertence pelo menos a um curriculo
    public function curriculums(){
        return $this->belongsToMany(Curriculum::class, 'curriculum_ufcd','ufcd_number','curriculum_id');
    }

    //Uma ufcd pode estar em muitas turmas
    public function ufcd_classes(){
        return $this->belongsToMany(Turma::class,'class_ufcd', 'ufcd_id','class_id')->withPivot('teacher_id');
    }

    //Uma UFCD pode ser lecionada por vários professores
    public function ufcd_teacheres(){
        return $this->belongsToMany(User::class,'class_ufcd','ufcd_id','teacher_id')->withPivot('class_id');
    }

    //Uma ufcd pode estar em vairas tasks
    public function tasks(){
        return $this->hasMany(Task::class, 'task_ufcd','ufcd_number');
    }
}
