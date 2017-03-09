<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Akt;
use App\Cost;

class Aktunit extends Model
{
    //
    protected $fillable = ['akt_id', 'cost_id',
      'aktunit_amount', 'aktunit_total_price'];

    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }

    public function akt()
    {
        return $this->belongsTo(Akt::class);
    }

}
