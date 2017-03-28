<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Taggable;

class Tele extends Model
{
  //
  protected $fillable = [
    'name'
  ];

  public function tags()
  {
    return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
  }

  /*public function taggables()
  {
    return $this->morphMany(Taggable::class, 'taggable');
  }
  */

}
