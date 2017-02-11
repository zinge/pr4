<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    //a

    protected $fillable = ['roles_desc', 'roles_name'];

    public function users(){
        return $this->belongsToMany('App\User', 'rolemembers');
    }
        
}
