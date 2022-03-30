<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLogs extends Model
{
    use HasFactory;
    protected $table = 'Login_Logs';
    protected $primaryKey = 'log_id';
}
