<?php

namespace App\Http\Controllers\Api;

use App\Environment_item;
use App\Environment_sameh;
use App\Environment_value;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EnvironmentSamehController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        //
    }
    public function paginateByCounty()
    {
        $user_point_type_id = Auth::user()->region_point->type_id;
        $user_point_id = Auth::user()->point_id;
        $user_center_id = Auth::user()->region_point->center_id;
        $county_id = Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')) {
            return $us = Environment_sameh::with( 'region_point.region_center.region_county', 'user')
                ->orderBy('id', 'DESC')
                ->paginate(20);
        } elseif ($user_point_type_id == 5 or $user_point_type_id == 6) {
            return Environment_sameh::with([ 'region_point.region_center.region_county', 'user'])
                ->whereHas('Region_point.Region_center', function ($q) use ($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->where('point_id', '=', $user_point_id)
                ->orderBy('id', 'DESC')
                ->paginate(20);
        } elseif ($user_point_type_id == 2 or $user_point_type_id == 3 or $user_point_type_id == 4) {
            return Environment_sameh::with(['region_point.region_center.region_county', 'user'])
                ->whereHas('Region_point', function ($q) use ($user_center_id) {
                    // Query the name field in status table
                    $q->where('center_id', '=', $user_center_id); // '=' is optional
                })
                ->orderBy('id', 'DESC')
                ->paginate(20);
        } else {
            return Environment_sameh::with([ 'region_point.region_center.region_county', 'user'])
                ->whereHas('Region_point.Region_center', function ($q) use ($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->orderBy('id', 'DESC')
                ->paginate(20);
        }
        //

    }
    public function addValue(Request $request)
    {
        //
        $this->validate($request, [
            'value' => 'required|numeric|max:100000',
            'created_at' => 'required|date',
        ]);



        return Environment_sameh::create([
            'value' => $request['value'],

            'user_id' => Auth::user()->id,
            'point_id' => $request['point_id'],
            'created_at' => $request['created_at'],

        ]);
    }
    public function updateValue(Request $request, $id)
    {
        $point = Environment_sameh::findOrFail($id);
        $this->validate($request, [
            'value' => 'required|numeric|max:100000',
            'created_at' => 'required|date',
        ]);

        $request->merge(['user_id' => Auth::user()->id]);
        $point->update($request->all());
        return ['message' => 'Updated the value info'];
    }

    public function deleteValue($id)
    {
        //$this->authorize('isAdmin');

        $county = Environment_sameh::findOrFail($id);
        // delete the County

        $county->delete();

        return ['message' => 'Value Deleted'];
    }
}
