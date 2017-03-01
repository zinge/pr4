<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Coworker;
use App\Phone;

class Phoneowner extends Model
{
    //
    protected $fillable = ['phone_id', 'coworker_id'];

    public function coworker()
    {
      return $this->belongsTo(Coworker::class);
    }

    public function phone()
    {
      return $this->belongsTo(Phone::class);
    }

}
