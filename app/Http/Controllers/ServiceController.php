<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ServiceController extends Controller
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
        return view('service.index')
          ->with('services', Service::get());
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
          'service_name' => 'required|max:30',
          'service_desc' => 'required|max:255',
        ]);

        if($request->user()->hasRole(['dogovor_rw', 'root'])){
          Service::create([
            'service_name' => $request->service_name,
            'service_desc' => $request->service_desc,
          ]);
        };

        return redirect('/service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('service.edit')
          ->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $this->validate($request, [
          'service_name' => 'required|max:30',
          'service_desc' => 'required|max:255',
        ]);

        if($request->user()->hasRole(['dogovor_rw', 'root'])){
          $service->update([
            'service_name' => $request->service_name,
            'service_desc' => $request->service_desc,
          ]);
        };

        return redirect('/service');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Service $service)
    {
        //
        if($request->user()->hasRole(['dogovor_rw', 'root'])){
          $service->delete();
        };

        return redirect('/service');

    }
}
