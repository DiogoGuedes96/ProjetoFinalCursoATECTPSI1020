<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Profile extends Model
{
    use HasFactory;

    protected $table = 'user_profile';
    protected $primaryKey = 'profile_id';


    public function users(){
        return $this->BelongsToMany(User::class, 'user_has_profile','profile_id','user_id');
    }
}
