<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User365 extends Model
{
    use HasFactory;
    protected $table = 'user_365';
    protected $primaryKey = 'user';
}
