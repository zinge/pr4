<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coworker extends Model
{
    //
    protected $fillable = ['name', 'secname', 'thirdname',
      'address_id', 'mvz_id'];
}
