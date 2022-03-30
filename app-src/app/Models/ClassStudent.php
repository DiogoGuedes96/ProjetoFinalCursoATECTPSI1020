<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    use HasFactory;

    protected $table = 'class_student';
    protected $primaryKey = ['student_id','class_id'];

    public function group_composition()
    {
        return $this->belongsToMany(User::class,'group_composition','group_id','class_students_id');
    }
}
