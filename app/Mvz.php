<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Coworker;

class Mvz extends Model
{
    //
    protected $fillable = ['mvz_cod','mvz_desc'];

    public function coworkers()
    {
        return $this->hasMany(Coworker::class);
    }
}
