<?php

namespace App\Http\Controllers;

use App\Equip;
use App\Mvz;
use App\Equiptype;
use App\Coworker;

use Illuminate\Http\Request;

class EquipController extends Controller
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
        return view('equip.index')
          ->with('mvzs', Mvz::get())
          ->with('coworkers', Coworker::get())
          ->with('equips', Equip::get())
          ->with('equiptypes', Equiptype::get());
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
            'invnumber' => 'required|max:20',
            'equipname' => 'required|max:128',
            'equipvendor' => 'required|max:20',
            'coworker_id' => 'required|max:10',
            'equiptype_id' => 'required|max:10',
        ]);

        $owned = false;

        if ($request->has('owned')){
            $owned = true;
        };

        Equip::create([
            'invnumber' => $request->invnumber,
            'equipname' => $request->equipname,
            'equipvendor' => $request->equipvendor,
            'owned' => $owned,
            'coworker_id' => $request->coworker_id,
            'equiptype_id' => $request->equiptype_id,
        ]);
        return redirect('/equip');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function show(Equip $equip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function edit(Equip $equip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equip $equip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equip $equip)
    {
        //
    }
}
