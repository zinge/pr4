<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Mvz;
use App\Agreement;
use App\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CostController extends Controller
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
        return view('cost.index')
          ->with('costs', Cost::get())
          ->with('mvzs', Mvz::get())
          ->with('services', Service::get())
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
          'agreement_id' => 'required|numeric',
          'service_id' => 'required|numeric',
          'mvz_id' => 'required|numeric',
          'amount' => 'required|numeric',
          'worth' => array('required', 'regex:/^\d{1,10}(,|.)\d{2}$/'),
          'total_price' => array('required', 'regex:/^\d{1,10}(,|.)\d{2}$/'),
        ]);

        if ($request->user()->hasRole(['dogovor_rw', 'root'])) {
            Cost::create([
            'agreement_id' => $request->agreement_id,
            'service_id' => $request->service_id,
            'mvz_id' => $request->mvz_id,
            'amount' => $request->amount,
            'worth' => $this->replCommas($request->worth),
            'total_price' => $this->replCommas($request->total_price),
          ]);
        };

        return redirect('/cost');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function show(Cost $cost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit(Cost $cost)
    {
        //
        return view('cost.edit')
        ->with('cost', $cost)
        ->with('mvzs', Mvz::get())
        ->with('services', Service::get())
        ->with('agreements', Agreement::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cost $cost)
    {
        //
        $this->validate($request, [
          'agreement_id' => 'required|numeric',
          'service_id' => 'required|numeric',
          'mvz_id' => 'required|numeric',
          'amount' => 'required|numeric',
          'worth' => array('required', 'regex:/^\d{1,10}(,|.)\d{2}$/'),
          'total_price' => array('required', 'regex:/^\d{1,10}(,|.)\d{2}$/'),
        ]);

        if ($request->user()->hasRole(['dogovor_rw', 'root'])) {
            $cost->update([
            'agreement_id' => $request->agreement_id,
            'service_id' => $request->service_id,
            'mvz_id' => $request->mvz_id,
            'amount' => $request->amount,
            'worth' => $this->replCommas($request->worth),
            'total_price' => $this->replCommas($request->total_price),
          ]);
        };

        return redirect('/cost');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cost $cost)
    {
        //
        if ($request->user()->hasRole(['dogovor_rw', 'root'])) {
            $cost->delete();
        };

        return redirect('/cost');
    }
}
