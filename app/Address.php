<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Coworker;

class Address extends Model
{
    //
    protected $fillable = ['city','streethouse'];

    public function coworkers()
    {
        return $this->hasMany(Coworker::class);
    }
}
