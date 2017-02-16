<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Role;
use App\User;

class Rolemember extends Model
{
    //
    protected $fillable = ['user_id', 'role_id'];

}
