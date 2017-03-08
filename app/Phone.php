<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Coworker;

class Phone extends Model
{
    //
    protected $fillable = ['num', 'ats', 'macaddr'];

    public function coworkers()
    {
        return $this->belongsToMany(Coworker::class, 'phoneowners');
    }
}
