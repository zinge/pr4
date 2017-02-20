<?php

namespace App\Http\Controllers;

use App\Address;
use App\Coworker;
use App\Mvz;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoworkerController extends Controller
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
        $coworkersQuery = Coworker::orderBy('id')
          ->join('mvzs', 'mvzs.id', '=', 'coworkers.mvz_id')
          ->join('addresses', 'addresses.id', '=', 'coworkers.address_id')
          ->select(
             'coworkers.*',
             'addresses.streethouse',
             'mvzs.mvz_desc')
          ->get();

        return view('coworker.index')
          ->with('coworkers', $coworkersQuery)
          ->with('addresses', Address::get())
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
          'name' => 'required|max:30',
          'secname' => 'required|max:30',
          'thirdname' => 'required|max:30',
          'mvz_id' => 'required|max:10',
          'address_id' => 'required|max:10',
        ]);
        if ($request->user()->hasRole(['coworker_rw','root'])) {
          Coworker::create([
            'name' => $request->name,
            'secname' => $request->secname,
            'thirdname' => $request->thirdname,
            'address_id' => $request->address_id,
            'mvz_id' => $request->mvz_id,
          ]);
        };
        return redirect('/coworker');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coworker  $coworker
     * @return \Illuminate\Http\Response
     */
    public function show(Coworker $coworker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coworker  $coworker
     * @return \Illuminate\Http\Response
     */
    public function edit(Coworker $coworker)
    {
        //
        return view('coworker.edit')
          ->with('coworker', $coworker)
          ->with('addresses', Address::get())
          ->with('mvzs', Mvz::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coworker  $coworker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coworker $coworker)
    {
        //
        $this->validate($request, [
          'name' => 'required|max:30',
          'secname' => 'required|max:30',
          'thirdname' => 'required|max:30',
          'mvz_id' => 'required|max:10',
          'address_id' => 'required|max:10',
        ]);
        if ($request->user()->hasRole(['coworker_rw','root'])) {
          $coworker->update([
            'name' => $request->name,
            'secname' => $request->secname,
            'thirdname' => $request->thirdname,
            'address_id' => $request->address_id,
            'mvz_id' => $request->mvz_id,
          ]);
        };
        return redirect('/coworker');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coworker  $coworker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Coworker $coworker)
    {
        //
        if ($request->user()->hasRole(['coworker_rw','root'])) {
          $coworker->delete();
        };

        return redirect('/coworker');
    }
}
