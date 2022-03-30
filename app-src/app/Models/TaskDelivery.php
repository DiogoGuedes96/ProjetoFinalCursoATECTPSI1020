<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDelivery extends Model
{
    use HasFactory;

    protected $table = 'task_delivery';
    protected $primaryKey = 'delivery_id';
}
