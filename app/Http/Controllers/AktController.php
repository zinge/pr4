<?php

namespace App\Http\Controllers;

use App\Akt;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AktController extends Controller
{
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
        return view('akt.index')
          ->with('akts', Akt::get());
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
          'akt_name' => 'required|max:30',
          'akt_month' => 'required|date',
          'akt_desc' => 'required|max:128'
        ]);

        if ($request->user()->hasRole(['akt_rw', 'root'])) {
          Akt::create([
            'akt_name' => $request->akt_name,
            'akt_month' => $request->akt_month,
            'akt_desc' => $request->akt_desc,
          ]);
        };

        return redirect('/akt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Akt  $akt
     * @return \Illuminate\Http\Response
     */
    public function show(Akt $akt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Akt  $akt
     * @return \Illuminate\Http\Response
     */
    public function edit(Akt $akt)
    {
        //
        return view('akt.edit')
          ->with('akt', $akt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Akt  $akt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akt $akt)
    {
        //
        $this->validate($request, [
          'akt_name' => 'required|max:30',
          'akt_month' => 'required|date',
          'akt_desc' => 'required|max:128'
        ]);

        if ($request->user()->hasRole(['akt_rw', 'root'])) {
          $akt->update([
            'akt_name' => $request->akt_name,
            'akt_month' => $request->akt_month,
            'akt_desc' => $request->akt_desc,
          ]);
        };

        return redirect('/akt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Akt  $akt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Akt $akt)
    {
        //
        if ($request->user()->hasRole(['akt_rw', 'root'])) {
          $akt->delete();
        };

        return redirect('/akt');
    }
}
