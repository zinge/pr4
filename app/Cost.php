<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Mvz;
use App\Agreement;
use App\Service;

class Cost extends Model
{
    //
    protected $fillable = ['agreement_id', 'service_id', 'mvz_id',
      'amount', 'worth', 'total_price'];

    public function agreement()
    {
        return $this->belongsTo(Agreement::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function mvz()
    {
        return $this->belongsTo(Mvz::class);
    }
}
