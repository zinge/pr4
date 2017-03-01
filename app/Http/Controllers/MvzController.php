<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mvz;

class MvzController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('mvz.index')
          ->with('mvzs', Mvz::get());
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
            'mvz_cod' => 'required|numeric|max:21474836470',
            'mvz_desc' => 'required|max:128',
        ]);
        if ($request->user()->hasRole(['mvz_rw','root'])) {
          Mvz::create([
              'mvz_cod' => $request->mvz_cod,
              'mvz_desc' => $request->mvz_desc,
          ]);
        };
        return redirect('/mvz');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mvz  $mvz
     * @return \Illuminate\Http\Response
     */
    public function show(Mvz $mvz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mvz  $mvz
     * @return \Illuminate\Http\Response
     */
    public function edit(Mvz $mvz)
    {
        //
        return view('mvz.edit')
          ->with('mvz', $mvz);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mvz  $mvz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mvz $mvz)
    {
        //
        $this->validate($request, [
            'mvz_cod' => 'required|integer|max:2147483647',
            'mvz_desc' => 'required|max:128',
        ]);
        if ($request->user()->hasRole(['mvz_rw','root'])) {
          $mvz->update([
              'mvz_cod'=>$request->mvz_cod,
              'mvz_desc'=>$request->mvz_desc,
          ]);
        };
        return redirect('/mvz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mvz  $mvz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Mvz $mvz)
    {
        //
        if ($request->user()->hasRole(['mvz_rw','root'])) {
          $mvz->delete();
        };
        return redirect('/mvz');
    }
}
