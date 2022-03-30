<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupComposition extends Model
{
    use HasFactory;

    protected $table = 'group_composition';
    protected $primaryKey = ['group_id','user_id'];


}
