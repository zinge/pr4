<?php

namespace App\Http\Controllers;

use App\Mvz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MvzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('mvzs.index')->with('mvzs',
        Mvz::get());
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
        Mvz::create([
            'mvz_cod' => $request->mvz_cod,
            'mvz_desc' => $request->mvz_desc,
        ]);
        return redirect('/mvzs');

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
        return view('mvzs.edit')->with('mvz',
        $mvz);
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
        $mvz->update([
            'mvz_cod'=>$request->mvz_cod,
            'mvz_desc'=>$request->mvz_desc,
            ]);
        return redirect('/mvzs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mvz  $mvz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mvz $mvz)
    {
        //
        $mvz->delete();

        return redirect('/mvzs');
    }
}
