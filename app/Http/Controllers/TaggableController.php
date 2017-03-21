<?php

namespace App\Http\Controllers;

use App\Taggable;
use App\Tag;
use App\Ludi;
use App\Tele;
use Illuminate\Http\Request;

class TaggableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*
        return view('taggable.index')
          ->with('taggables', Taggable::get())
          ->with('tags', Tag::get())
          ->with('teles', Tele::get())
          ->with('ludis', Ludi::get());
              */
          /*
          $tag = Tag::find(3);
          return dd($tag->teles);
          */
          
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
        /*$this->validate($request, [
            'name' => 'required',
        ]);
        */

        $tag = Tag::find($request->tag_id);

        if ($request->user()->hasRole(['root'])) {
            Taggable::create([
              'tag_id' => $tag->id,
              'taggable_id' => $request->taggable_id,
              'taggable_type' => $tag->name,
              'nado' => 'nado',
          ]);
        };
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
