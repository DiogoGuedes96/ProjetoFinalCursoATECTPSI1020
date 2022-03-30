<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_date extends Model
{
    use HasFactory;

    protected $table = 'task_date';
    protected $primaryKey = 'task_date_id';


    public function task(){
        return $this->hasMany(Task::class,'task_date_id','task_date_id');
    }
}
