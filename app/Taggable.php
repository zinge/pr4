<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Ludi;
//use App\Tele;



class Taggable extends Model
{
  //
  protected $fillable = [
    'tag_id', 'taggable_id', 'taggable_type', 'nado'
  ];

  public function taggable()
  {
    return $this->morphTo();
  }
}

//http://www.easylaravelbook.com/blog/2015/01/21/creating-polymorphic-relations-in-laravel-5/
