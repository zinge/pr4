<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

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
}
