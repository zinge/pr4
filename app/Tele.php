<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Tele extends Model
{
  //
  protected $fillable = [
    'name'
  ];

  public function tags()
  {
    return $this->morphToMany('App\Tag', 'taggable');
  }
}
