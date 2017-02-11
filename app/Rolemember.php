<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;

class Rolemember extends Model
{
    //
    protected $fillable = ['users_id', 'roles_id']; 
}
