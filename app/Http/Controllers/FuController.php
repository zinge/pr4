<?php

namespace App\Http\Controllers;

use App\Fu;
use Illuminate\Http\Request;

use Storage;

use Symphony\Component\HttpFundantion\File\UplodedFile;

class FuController extends Controller
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
        return view('fu.index')
          ->with('files', Fu::get());
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
        $file = $request->file('fu_item');
        $fileExt = $file->getClientOriginalExtension();

        Storage::disk('local')->put(
            'files/'.$file->getFilename().'.'.$fileExt,
            file_get_contents($file->getRealPath())
        );

        Fu::create([
            'mime_type' => $file->getClientMimeType(),
            'original_filename' => $file->getClientOriginalName(),
            'file_name' => 'files/'.$file->getFilename().'.'.$fileExt,
        ]);

        return redirect('/fu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fu  $fu
     * @return \Illuminate\Http\Response
     */
    public function show(Fu $fu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fu  $fu
     * @return \Illuminate\Http\Response
     */
    public function edit(Fu $fu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fu  $fu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fu $fu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fu  $fu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fu $fu)
    {
        //
    }
}
