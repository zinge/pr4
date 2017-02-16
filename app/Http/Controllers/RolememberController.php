<?php

namespace App\Http\Controllers;

use App\Role;
use App\Rolemember;
use App\User;

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
        $rolemembersQuery = Rolemember::orderBy('id')
          ->join('users', 'users.id', '=', 'rolemembers.user_id')
          ->join('roles', 'roles.id', '=', 'rolemembers.role_id')
          ->select(
             'rolemembers.*',
             'roles.role_name',
             'roles.role_desc',
             'users.name')
          ->get();

        return view('rolemembers.index')
          ->with('rolemembers', $rolemembersQuery)
          ->with('users', User::get())
          ->with('roles', Role::get());

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
            'user_id' => 'required|numeric',
            'role_id' => 'required|numeric',
        ]);
        if ($request->user()->hasRole('root')) {
          Rolemember::create([
              'user_id' => $request->user_id,
              'role_id' => $request->role_id,
          ]);
        };
        return redirect('/rolemembers');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rolemember  $rolemember
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rolemember $rolemember)
    {
        //
        if ($request->user()->hasRole('root')) {
          $rolemember->delete();
        };

        return redirect('/rolemembers');
    }
}
