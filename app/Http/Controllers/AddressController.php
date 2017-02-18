<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class AddressController extends Controller
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
        return view('addresses.index')
          ->with('addresses', Address::get());
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
            'city' => 'required|max:128',
            'streethouse' => 'required|max:128',
        ]);
        if ($request->user()->hasRole('address_rw','root')) {
          Address::create([
              'city' => $request->city,
              'streethouse' => $request->streethouse,
          ]);
        };
        return redirect('/addresses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
        return view('addresses.edit')
          ->with('address', $address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
        $this->validate($request, [
          'city' => 'required|max:128',
          'streethouse' => 'required|max:128',
        ]);
        if ($request->user()->hasRole('address_rw','root')) {
          $address->update([
            'city' => $request->city,
            'streethouse' => $request->streethouse,
          ]);
        };
        return redirect('/addresses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Address $address)
    {
        //
        if ($request->user()->hasRole('address_rw','root')) {
          $address->delete();
        };
        return redirect('/addresses');
    }
}
