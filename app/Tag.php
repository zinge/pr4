<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ludi;
use App\Tele;

class Tag extends Model
{
  //
  protected $fillable = [
    'name', 'nado'
  ];

  public function ludis()
  {
    return $this->morphedByMany(Ludi::class, 'taggable');
  }

  public function teles()
  {
    return $this->morphedByMany(Tele::class, 'taggable');
  }
}
