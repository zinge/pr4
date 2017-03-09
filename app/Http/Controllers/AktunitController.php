<?php

namespace App\Http\Controllers;

use App\Akt;
use App\Aktunit;
use App\Cost;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AktunitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function replCommas($decimalValue)
    {
        $pattern='/(^\d{1,10}),(\d{2}$)/';

        if (preg_match($pattern, $decimalValue)) {
            return preg_replace($pattern, '$1.$2', $decimalValue);
        } else {
            return $decimalValue;
        };
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('aktunit.index')
          ->with('aktunits', Aktunit::get())
          ->with('costs', Cost::get())
          ->with('akts', Akt::get());
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
          'akt_id' => 'required|numeric',
          'cost_id' => 'required|numeric',
          'aktunit_amount' => 'required|numeric',
          'aktunit_total_price' => array('required', 'regex:/^\d{1,10}(,|.)\d{2}$/'),
        ]);

        if ($request->user()->hasRole(['akt_rw', 'root'])) {
            Aktunit::create([
            'akt_id' => $request->akt_id,
            'cost_id' => $request->cost_id,
            'aktunit_amount' => $request->aktunit_amount,
            'aktunit_total_price' => $this->replCommas($request->aktunit_total_price),
          ]);
        };

        return redirect('/aktunit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aktunit  $aktunit
     * @return \Illuminate\Http\Response
     */
    public function show(Aktunit $aktunit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aktunit  $aktunit
     * @return \Illuminate\Http\Response
     */
    public function edit(Aktunit $aktunit)
    {
        //
        return view('aktunit.edit')
          ->with('aktunit', $aktunit)
          ->with('costs', Cost::get())
          ->with('akts', Akt::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aktunit  $aktunit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aktunit $aktunit)
    {
        //
        $this->validate($request, [
          'akt_id' => 'required|numeric',
          'cost_id' => 'required|numeric',
          'aktunit_amount' => 'required|numeric',
          'aktunit_total_price' => array('required', 'regex:/^\d{1,10}(,|.)\d{2}$/'),
        ]);

        if ($request->user()->hasRole(['akt_rw', 'root'])) {
            $aktunit->update([
            'akt_id' => $request->akt_id,
            'cost_id' => $request->cost_id,
            'aktunit_amount' => $request->aktunit_amount,
            'aktunit_total_price' => $this->replCommas($request->aktunit_total_price),
          ]);
        };

        return redirect('/aktunit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aktunit  $aktunit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Aktunit $aktunit)
    {
        //
        if ($request->user()->hasRole(['akt_rw', 'root'])) {
            $aktunit->delete();
        };

        return redirect('/aktunit');
    }
}
