<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Mvz;
use App\Address;
use App\Phone;

class Coworker extends Model
{
    //
    protected $fillable = ['name', 'secname', 'thirdname',
      'address_id', 'mvz_id'];

    public function mvz()
    {
      return $this->belongsTo(Mvz::class);
    }

    public function address()
    {
      return $this->belongsTo(Address::class);
    }

    public function phones()
    {
      return $this->belongsToMany(Phone::class, 'phoneowners');
    }
}
