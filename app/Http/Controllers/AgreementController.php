<?php

namespace App\Http\Controllers;

use App\Agreement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AgreementController extends Controller
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
        return view('agreement.index')
          ->with('agreements', Agreement::get());
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
          'agreement_name' => 'required|max:30',
          'agreement_start' => 'required|date',
          'agreement_vector' => 'required|max:30',
          'agreement_desc' => 'required|max:255',
        ]);

        if($request->user()->hasRole(['dogovor_rw', 'root'])){
          Agreement::create([
            'agreement_name' => $request->agreement_name,
            'agreement_vector' => $request->agreement_vector,
            'agreement_start' => $request->agreement_start,
            'agreement_desc' => $request->agreement_desc,
          ]);
        };

        return redirect('/agreement');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function show(Agreement $agreement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function edit(Agreement $agreement)
    {
        //
        return view('agreement.edit')
          ->with('agreement', $agreement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agreement $agreement)
    {
        //
        $this->validate($request, [
          'agreement_name' => 'required|max:30',
          'agreement_start' => 'required|date',
          'agreement_vector' => 'required|max:30',
          'agreement_desc' => 'required|max:255',
        ]);

        if ($request->user()->hasRole(['dogovor_rw', 'root'])) {
          $agreement->update([
            'agreement_name' => $request->agreement_name,
            'agreement_start' => $request->agreement_start,
            'agreement_vector' => $request->agreement_vector,
            'agreement_desc' => $request->agreement_desc,
          ]);
        };

        return redirect('/agreement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agreement  $agreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Agreement $agreement)
    {
        //
        if ($request->user()->hasRole(['dogovor_rw', 'root'])) {
          $agreement->delete();
        };

        return redirect('/agreement');
    }
}
