<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Coworker;
use App\Equiptype;

class Equip extends Model
{
    //
    protected $fillable = ['invnumber', 'equipname', 'equipvendor', 'owned',
      'coworker_id', 'equiptype_id'];

    public function coworker()
    {
      return $this->belongsTo(Coworker::class);
    }

    public function equiptype()
    {
      return $this->belongsTo(Equiptype::class);
    }
}
