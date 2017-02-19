<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhoneController extends Controller
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
        return view('phone.index')
          ->with('phones', Phone::get());
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
        /*        */

        $this->validate($request, [
            'num' => 'required|numeric|max:21474836470',
          //  'macaddr' => 'max:16',
        ]);

        $ats = false;

        if ($request->has('ats')){
            $ats = true;
        };

        if ($request->user()->hasRole('phone_rw','root')) {
          Phone::create([
              'num' => $request->num,
              'ats' => $ats,
              'macaddr' => $request->macaddr,
          ]);
        };

        return redirect('/phone');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
        return view('phone.edit')
          ->with('phone', $phone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        /**/
        $this->validate($request, [
            'num' => 'required|numeric|max:21474836470',
          //  'macaddr' => 'max:16',
        ]);

        $ats = false;

        if ($request->has('ats')){
            $ats = true;
        };

        if ($request->user()->hasRole('phone_rw','root')) {
          $phone->update([
              'num' => $request->num,
              'ats' => $ats,
              'macaddr' => $request->macaddr,
          ]);
        };

        return redirect('/phone');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Phone $phone)
    {
        //
        if ($request->user()->hasRole('phone_rw','root')) {
          $phone->delete();
        };
        return redirect('/phone');
    }
}
