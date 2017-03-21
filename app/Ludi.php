<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Taggable;

class Ludi extends Model
{
  //
  protected $fillable = [
    'name'
  ];

  public function tags()
  {
    return $this->morphToMany(Tag::class, 'taggable');
  }

  public function taggables()
  {
    return $this->morphMany(Taggable::class, 'taggable');
  }
}
