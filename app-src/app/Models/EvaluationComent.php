<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationComent extends Model
{
    use HasFactory;

    protected $table = 'evaluation_comment';
    protected $primaryKey = 'evaluation_comment_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'evaluation_comment_id',
        'evaluation_comment_text',
    ];


    public function task(){
        return $this->belongsTo(Task::class,'task_id','task_id');
    }

    public function user_avaliado(){
        return $this->belongsTo(User::class,'evaluated_user_id','user_id');
    }

    public function user_avaliador(){
        return $this->belongsTo(User::class,'evaluator_user_id','user_id');
    }
}
