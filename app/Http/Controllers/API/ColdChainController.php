<?php

namespace App\Http\Controllers\API;

use App\Region_point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Device;
class ColdChainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function temp()
    {       //
        return    Region_point::with('Device')->get();
    }
    public function tempByCounty($county_id)
    {       //

        return    Region_point::with(['Device','Region_center'])
            ->whereHas('Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
                $q->where('device_id', '!=', 'NULL'); // faghat jaei ke device dare
            })
        ->get();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
