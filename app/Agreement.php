<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    //
    protected $fillable = ['agreement_name', 'agreement_start', 'agreement_vector'];
}
