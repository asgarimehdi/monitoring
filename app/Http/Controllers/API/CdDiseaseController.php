<?php

namespace App\Http\Controllers\API;

use App\Cd_disease;
use App\Cd_disease_type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CdDiseaseController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addDisease(Request $request)
    {
        //
        $this->validate($request,[


            'full_name'=> 'required|string',

            'sex'=> 'required|numeric',
            'national_code'=> 'required|numeric',


            'birth_at'=> 'required|date',

            'point_id'=> 'required|numeric',
            'disease_id'=> 'required|numeric',
            'status_id'=> 'required|numeric',
            'result_id'=> 'required|numeric',
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'diagnosis_at' => 'required|date',


        ]);

        $request->merge(['user_id' => Auth::user()->id]);

        return Cd_disease::create($request->all());
    }
    public function updateDisease(Request $request, $id)
    {
        $corona = Cd_disease::findOrFail($id);
        $this->validate($request,[

            'full_name'=> 'required|string',

            'sex'=> 'required|numeric',
            'national_code'=> 'required|numeric',


            'birth_at'=> 'required|date',

            'point_id'=> 'required|numeric',
            'disease_id'=> 'required|numeric',
            'status_id'=> 'required|numeric',
            'result_id'=> 'required|numeric',
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'diagnosis_at' => 'required|date',

        ]);
        $request->merge(['user_id' => Auth::user()->id]);
        $corona->update($request->all());
        return ['message' => 'Updated the value info'];
    }
    public function deleteValue($id)
    {
        //$this->authorize('isAdmin');

        $county = Cd_disease::findOrFail($id);


        $county->delete();

        return ['message' => 'Value Deleted'];
    }

    public function disease()
    {       //
        return  Cd_disease::with(
            [
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'cd_disease_type'

            ])
            // ->where('expose', '=', NULL)
            ->get();
    }

    public function diseaseByCounty($county_id)
    {
        // return    Cd_corona::get();
        $user_point_type_id=Auth::user()->region_point->type_id;
        $user_point_id=Auth::user()->point_id;
        $user_center_id=Auth::user()->region_point->center_id;
        if($user_point_type_id==5 or $user_point_type_id==6) {
            $items=   Cd_disease::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'cd_disease_type'
            ])
                ->where('point_id','=',$user_point_id)
                ->get();
        }
        elseif($user_point_type_id==2 or $user_point_type_id==3 or $user_point_type_id==4) {
            $items=   Cd_disease::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'cd_disease_type'
            ])
                ->whereHas('Region_point', function($q) use($user_center_id) {
                    // Query the name field in status table
                    $q->where('center_id', '=', $user_center_id); // '=' is optional
                })->get();
        }
        else{
            $items=   Cd_disease::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'cd_disease_type'
            ])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->get();
        }

        return   $items;
    }
    public function paginateByCounty()
    {
        $county_id=Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')){
            return   $us = Cd_disease::with('region_point.region_center.region_county')->paginate(10);
        }
        else{
            return    Cd_disease::with(['region_point.region_center.region_county'])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->paginate(10);
        }
    }
    public function search(){
        $county_id=Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')){
            if ($search = \Request::get('q')) {
                $us = Cd_disease::with('region_point.region_center.region_county')
                    ->where(function($query) use ($search){
                        $query->where('full_name','LIKE',"%$search%")
                            ->orWhere('national_code','LIKE',"%$search%")
                            ->orWhere('disease_id','=',"$search");
                    })->paginate(20);

            }else{
                $us = Cd_disease::with('region_point.region_center.region_county')->latest()->paginate(10);

                return $us;
            }
        }
        else{
            if ($search = \Request::get('q')) {
                $us = Cd_disease::with('region_point.region_center.region_county')
                    ->whereHas('Region_point.Region_center', function ($qe) use ($county_id) {
                        // Query the name field in status table
                        $qe->where('county_id', '=', $county_id); // '=' is optional
                    })->where(function($query) use ($search){
                        $query->where('full_name','LIKE',"%$search%")
                            ->orWhere('national_code','LIKE',"%$search%")
                            ->orWhere('disease_id','=',"$search");
                    })->paginate(20);


            }else{
                return Cd_disease::with('region_point.region_center.region_county')
                    ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                        // Query the name field in status table
                        $q->where('county_id', '=', $county_id); // '=' is optional
                    })
                    ->paginate(20);
            }
        }
        return $us;
    }
    public function diseaseType()
    {       //
        return  Cd_disease_type::get();
    }
}
