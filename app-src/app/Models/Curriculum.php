<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculum';
    protected $primaryKey = 'curriculum_id';
    //protected $hidden = ['pivot'];

    //Funcao que indica que um curriculo tem uma ou mais ufcds
    public function ufcds(){
        return $this->belongsToMany(Ufcd::class,'curriculum_ufcd','curriculum_id','ufcd_number')->orderBy('ufcd_number');
    }

}
