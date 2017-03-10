<?php

namespace App\Http\Controllers;

use App\Finposition;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FinpositionController extends Controller
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
        return view('finposition.index')
          ->with('finpositions', Finposition::get());
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
            'finposition_cod' => 'required|numeric',
            'finposition_desc' => 'required|max:128',
        ]);
        if ($request->user()->hasRole(['finposition_rw','root'])) {
            Finposition::create([
              'finposition_cod' => $request->finposition_cod,
              'finposition_desc' => $request->finposition_desc,
          ]);
        };
        return redirect('/finposition');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finposition  $finposition
     * @return \Illuminate\Http\Response
     */
    public function show(Finposition $finposition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finposition  $finposition
     * @return \Illuminate\Http\Response
     */
    public function edit(Finposition $finposition)
    {
        //
        return view('finposition.edit')
          ->with('finposition', $finposition);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finposition  $finposition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finposition $finposition)
    {
        //
        $this->validate($request, [
            'finposition_cod' => 'required|numeric',
            'finposition_desc' => 'required|max:128',
        ]);
        if ($request->user()->hasRole(['finposition_rw','root'])) {
            $finposition->update([
              'finposition_cod' => $request->finposition_cod,
              'finposition_desc' => $request->finposition_desc,
          ]);
        };
        return redirect('/finposition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finposition  $finposition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Finposition $finposition)
    {
        //
        if ($request->user()->hasRole(['finposition_rw','root'])) {
            $finposition->delete();
        };
        return redirect('/finposition');
    }
}
