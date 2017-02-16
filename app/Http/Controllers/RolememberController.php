<?php

namespace App\Http\Controllers;

use App\Rolemember;
use Illuminate\Http\Request;

class RolememberController extends Controller
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
        $roleRules = ;
        dd($roleRules);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rolemember  $rolemember
     * @return \Illuminate\Http\Response
     */
    public function show(Rolemember $rolemember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rolemember  $rolemember
     * @return \Illuminate\Http\Response
     */
    public function edit(Rolemember $rolemember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rolemember  $rolemember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rolemember $rolemember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rolemember  $rolemember
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rolemember $rolemember)
    {
        //
    }
}
