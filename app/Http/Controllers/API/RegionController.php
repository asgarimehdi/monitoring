<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region_county;
use App\Region_type;
use App\Region_center;
use App\Region_point;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class RegionController extends Controller
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
       // return    Region_county::all();
    }
    public function county()
    {
        //
        $county_id=Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')){
            return    Region_county::all();
        }
        else{
            return    Region_county::where('id','=',$county_id)->get();
        }

    }
    public function type()
    {
        //
        return    Region_type::all();
    }
    public function center($county_id,$type_id)
    {
      //  $type_id=\Request::get('type_id');
/*        if($type_id==5){
            $type_id="4";
            $type_id2="3";
            return Region_center::where('type_id','=',$type_id)->where('county_id','=',$county_id)->orWhere('type_id','=',$type_id2)->get();
        }
        elseif($type_id==6){
            $type_id="4";
            $type_id2="2";
            return Region_center::where('type_id','=',$type_id)->where('county_id','=',$county_id)->orWhere('type_id','=',$type_id2)->get();
        }
        else*/
        return Region_center::where('type_id','=',$type_id)->where('county_id','=',$county_id)->get();

    }
    public function point($center_id)
    {
        //
        return    Region_point::where('center_id','=',$center_id)->get();
    }


    public function addCounty(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:region_counties',
            'lat' => 'required|string|max:13|min:5',
            'lng' => 'required|string|max:13|min:5',
        ]);

        return Region_county::create([
            'name' => $request['name'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],
        ]);
    }
    public function addType(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:region_types'
        ]);

        return Region_type::create([
            'name' => $request['name'],
        ]);
    }
    public function addCenter(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:region_centers'
        ]);

        return Region_center::create([
            'name' => $request['name'],
            'type_id' => $request['type_id'],
            'county_id' => $request['county_id'],
        ]);
    }
    public function addPoint(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:region_points',
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'device_id'=> 'nullable|numeric|max:50000',
        ]);

        return Region_point::create([
            'name' => $request['name'],
            'center_id' => $request['center_id'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],
            'device_id' => $request['device_id'],
        ]);
    }


    public function updateCounty(Request $request, $id)
    {
        $county = Region_county::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:region_counties,name,'.$county->id,
        ]);
        $county->update($request->all());
        return ['message' => 'Updated the county info'];
    }
    public function updateType(Request $request, $id)
    {
        $type = Region_type::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:region_counties,name,'.$type->id,
        ]);
        $type->update($request->all());
        return ['message' => 'Updated the type info'];
    }
    public function updateCenter(Request $request, $id)
    {
        $center = Region_center::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:region_centers,name,'.$center->id,
        ]);
        $center->update($request->all());
        return ['message' => 'Updated the center info'];
    }
    public function updatePoint(Request $request, $id)
    {
        $point = Region_point::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:region_points,name,'.$point->id,
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'device_id'=> 'nullable|numeric|max:50000',

        ]);
        $point->update($request->all());
        return ['message' => 'Updated the point info'];
    }
    public function countyById($county_id)
    {
        return  $county = Region_county::find($county_id);
    }
    public function typeById($type_id)
    {
        return  $type = Region_type::find($type_id);
    }
    public function centerById($center_id)
    {
        return  $type = Region_center::find($center_id);
    }
    public function pointById($point_id)
    {
        return  $point = Region_point::find($point_id);
    }


    public function deleteCounty($id)
    {
        //$this->authorize('isAdmin');

        $county = Region_county::findOrFail($id);
        // delete the user

        $county->delete();

        return ['message' => 'User Deleted'];
    }
    public function deleteType($id)
    {
        //$this->authorize('isAdmin');

        $type = Region_type::findOrFail($id);
        // delete the user

        $type->delete();

        return ['message' => 'type Deleted'];
    }
    public function deleteCenter($id)
    {
        //$this->authorize('isAdmin');

        $center = Region_center::findOrFail($id);
        // delete the user

        $center->delete();

        return ['message' => 'center Deleted'];
    }
    public function deletePoint($id)
    {
        //$this->authorize('isAdmin');
        $point = Region_point::findOrFail($id);
        $point->delete();
        return ['message' => 'center Deleted'];
    }

    public function centerByCountyId($county_id)
    {
        //  $type_id=\Request::get('type_id');
        return Region_center::where('county_id','=',$county_id)->get();

    }
    public function centerByTypeId($type_id)
    {
        return Region_center::where('type_id','=',$type_id)->get();
    }
    public function pointByCenterId($center_id)
    {
        return Region_point::where('center_id','=',$center_id)->get();
    }
}
