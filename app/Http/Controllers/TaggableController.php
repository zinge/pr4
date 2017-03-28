<?php

namespace App\Http\Controllers;

use App\Taggable;
use App\Tag;
use App\Ludi;
use App\Tele;
use Illuminate\Http\Request;

class TaggableController extends Controller
{


  private function setTagAndAttach($value)
  {
    $tag = Tag::find($value->tag_id);
    switch ($tag->name) {
      case 'Сотрудники':
      if (isset($value->ludi_id)) {
        return Ludi::find($value->ludi_id)->tags()->attach(
          $tag, ['nado' => 'nado']
        );
      }
      break;

      case 'Телефоны':
      if (isset($value->tele_id)) {
        return Tele::find($value->tele_id)->tags()->attach(
          $tag, ['nado' => 'nado']
        );
      }
      break;
    }
  }


  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
    ///*
    return view('taggable.index')
    ->with('taggables', Taggable::get())
    ->with('tags', Tag::get())
    ->with('teles', Tele::get())
    ->with('ludis', Ludi::get());
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
    $this->validate($request, [
      'tag_id' => 'required|numeric',
    ]);
    if (isset($request->ludi_id)) {
      $this->validate($request, [
        'ludi_id' => 'required|numeric'
      ]);
    }
    if (isset($request->tele_id)) {
      $this->validate($request, [
        'tele_id' => 'required|numeric'
      ]);
    }

    $this->setTagAndAttach($request);

    return redirect('/taggable');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Taggable  $taggable
  * @return \Illuminate\Http\Response
  */
  public function show(Taggable $taggable)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Taggable  $taggable
  * @return \Illuminate\Http\Response
  */
  public function edit(Taggable $taggable)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Taggable  $taggable
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Taggable $taggable)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Taggable  $taggable
  * @return \Illuminate\Http\Response
  */
  public function destroy(Request $request, Taggable $taggable)
  {
    //
    if ($request->user()->hasRole(['root'])) {
      $taggable->delete();
    };
    return redirect('/taggable');
  }
}
