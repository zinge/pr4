<?php

namespace App\Http\Controllers;

use App\Equiptype;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EquiptypeController extends Controller
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
        /**/
        return view('equiptype.index')
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
            'equiptype_desc' => 'required|max:56',
        ]);
        if ($request->user()->hasRole(['equiptype_rw','root'])) {
            Equiptype::create([
              'equiptype_desc' => $request->equiptype_desc,
          ]);
        };
        return redirect('/equiptype');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equiptype  $equiptype
     * @return \Illuminate\Http\Response
     */
    public function show(Equiptype $equiptype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equiptype  $equiptype
     * @return \Illuminate\Http\Response
     */
    public function edit(Equiptype $equiptype)
    {
        //
        return view('equiptype.edit')
          ->with('equiptype', $equiptype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equiptype  $equiptype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equiptype $equiptype)
    {
        //
        $this->validate($request, [
            'equiptype_desc' => 'required|max:56',
        ]);
        if ($request->user()->hasRole(['equiptype_rw','root'])) {
            $equiptype->update([
              'equiptype_desc' => $request->equiptype_desc,
          ]);
        };
        return redirect('/equiptype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equiptype  $equiptype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Equiptype $equiptype)
    {
        //
        if ($request->user()->hasRole(['equiptype_rw','root'])) {
            $equiptype->delete();
        };
        return redirect('/equiptype');
    }
}
