<?php

namespace App\Http\Controllers;

use App\Models\Aeroport;
use Illuminate\Http\Request;

class AeroportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getaeroport(Request $request)
    {
        $data = Aeroport::select('id','name','countryName')->get();
        return response()->json(['status' => 'success', 'data' => $data]);
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
     * @param  \App\Models\Aeroport  $aeroport
     * @return \Illuminate\Http\Response
     */
    public function show(Aeroport $aeroport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aeroport  $aeroport
     * @return \Illuminate\Http\Response
     */
    public function edit(Aeroport $aeroport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aeroport  $aeroport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aeroport $aeroport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aeroport  $aeroport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aeroport $aeroport)
    {
        //
    }
}
