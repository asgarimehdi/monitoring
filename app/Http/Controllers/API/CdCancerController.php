<?php

namespace App\Http\Controllers\API;

use App\Cd_cancer;
use App\Cd_cancer_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CdCancerController extends Controller
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
    public function addCancer(Request $request)
    {
        //
        $this->validate($request,[


            'full_name'=> 'required|string',

            'sex'=> 'required|numeric',
            'job'=> 'required|string',

            'birth_at'=> 'required|date',

            'point_id'=> 'required|numeric',
            'type_id'=> 'required|numeric',
            'detection_type'=> 'required|numeric',

            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'diagnosis_at' => 'required|date',


        ]);

        $request->merge(['user_id' => Auth::user()->id]);

        return Cd_cancer::create($request->all());
    }
    public function updateCancer(Request $request, $id)
    {
        $corona = Cd_cancer::findOrFail($id);
        $this->validate($request,[

            'full_name'=> 'required|string',

            'sex'=> 'required|numeric',
            'job'=> 'required|string',

            'birth_at'=> 'required|date',

            'point_id'=> 'required|numeric',
            'type_id'=> 'required|numeric',
            'detection_type'=> 'required|numeric',

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

        $county = Cd_cancer::findOrFail($id);


        $county->delete();

        return ['message' => 'Value Deleted'];
    }

    public function cancer()
    {       //
        return  Cd_cancer::with(
            [
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'cd_cancer_type'

            ])
            // ->where('expose', '=', NULL)
            ->get();
    }

    public function cancerByCounty($county_id)
    {
        // return    Cd_corona::get();
        $user_point_type_id=Auth::user()->region_point->type_id;
        $user_point_id=Auth::user()->point_id;
        $user_center_id=Auth::user()->region_point->center_id;
        if($user_point_type_id==5 or $user_point_type_id==6) {
            $items=   Cd_cancer::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'cd_cancer_type'
            ])
                ->where('point_id','=',$user_point_id)
                ->get();
        }
        elseif($user_point_type_id==2 or $user_point_type_id==3 or $user_point_type_id==4) {
            $items=   Cd_cancer::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'cd_cancer_type'
            ])
                ->whereHas('Region_point', function($q) use($user_center_id) {
                    // Query the name field in status table
                    $q->where('center_id', '=', $user_center_id); // '=' is optional
                })->get();
        }
        else{
            $items=   Cd_cancer::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'cd_cancer_type'
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
            return   $us = Cd_cancer::with('region_point.region_center.region_county')->paginate(10);
        }
        else{
            return    Cd_cancer::with(['region_point.region_center.region_county'])
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
                $us = Cd_cancer::with('region_point.region_center.region_county')
                    ->where(function($query) use ($search){
                        $query->where('full_name','LIKE',"%$search%")

                            ->orWhere('type_id','=',"$search");
                    })->paginate(10);

            }else{
                $us = Cd_cancer::with('region_point.region_center.region_county')->latest()->paginate(10);

                return $us;
            }
        }
        else{
            if ($search = \Request::get('q')) {
                $us = Cd_cancer::with('region_point.region_center.region_county')
                    ->whereHas('Region_point.Region_center', function ($qe) use ($county_id) {
                        // Query the name field in status table
                        $qe->where('county_id', '=', $county_id); // '=' is optional
                    })->where(function($query) use ($search){
                        $query->where('full_name','LIKE',"%$search%")
                            ->orWhere('type_id','=',"$search");
                    })->paginate(20);


            }else{
                return Cd_cancer::with('region_point.region_center.region_county')
                    ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                        // Query the name field in status table
                        $q->where('county_id', '=', $county_id); // '=' is optional
                    })
                    ->paginate(10);
            }
        }
        return $us;
    }
    public function cancerType()
    {       //
        return  Cd_cancer_type::get();
    }
}
