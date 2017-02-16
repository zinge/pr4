<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Role;
use App\User;

class Rolemember extends Model
{
    //
    protected $fillable = ['user_id', 'role_id'];

    public function rolemember_users(){
        return $this->belongsTo(User::class);
    }

    public function rolemember_roles(){
        return $this->hasMany(Role::class);
    }

}
