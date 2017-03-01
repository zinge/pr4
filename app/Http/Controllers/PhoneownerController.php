<?php

namespace App\Http\Controllers;

use App\Phoneowner;
use App\Phone;
use App\Coworker;

use Illuminate\Http\Request;

class PhoneownerController extends Controller
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
        return view('phoneowner.index')
          ->with('phoneowners', Phoneowner::get())
          ->with('phones', Phone::get())
          ->with('coworkers', Coworker::get());

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
            'phone_id' => 'required|numeric',
            'coworker_id' => 'required|numeric',
        ]);

        if ($request->user()->hasRole(['phoneowner_rw','root'])) {
          Phoneowner::create([
              'phone_id' => $request->phone_id,
              'coworker_id' => $request->coworker_id,
          ]);
        };
        return redirect('/phoneowner');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phoneowner  $phoneowner
     * @return \Illuminate\Http\Response
     */
    public function show(Phoneowner $phoneowner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phoneowner  $phoneowner
     * @return \Illuminate\Http\Response
     */
    public function edit(Phoneowner $phoneowner)
    {
        //
        return view('phoneowner.edit')
          ->with('phoneowner', $phoneowner)
          ->with('phones', Phone::get())
          ->with('coworkers', Coworker::get());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phoneowner  $phoneowner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phoneowner $phoneowner)
    {
        //
        $this->validate($request, [
            'phone_id' => 'required|numeric',
            'coworker_id' => 'required|numeric',
        ]);
        if ($request->user()->hasRole(['phoneowner_rw','root'])) {
          $phoneowner->update([
              'phone_id' => $request->phone_id,
              'coworker_id' => $request->coworker_id,
          ]);
        };

        return redirect('/phoneowner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phoneowner  $phoneowner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Phoneowner $phoneowner)
    {
        //
        if ($request->user()->hasRole(['phoneowner_rw','root'])) {
          $phoneowner->delete();
        };

        return redirect('/phoneowner');
    }
}
