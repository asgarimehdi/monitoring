<?php

namespace App\Http\Controllers\API;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Environment_item;
use App\Environment_value;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class EnvironmentController extends Controller
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

    }
    public function itemList()
    {
        //
        return    Environment_item::all();
    }
    public function paginateByCounty()
    {
        $user_point_type_id=Auth::user()->region_point->type_id;
        $user_point_id=Auth::user()->point_id;
        $user_center_id=Auth::user()->region_point->center_id;
        $county_id=Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')){
            return   $us = Environment_value::with('environment_item','region_point.region_center.region_county','user')
                ->orderBy('id', 'DESC')
                ->paginate(20);
        }

        elseif($user_point_type_id==5 or $user_point_type_id==6) {
            return    Environment_value::with(['environment_item','region_point.region_center.region_county','user'])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->where('point_id','=',$user_point_id)
                ->orderBy('id', 'DESC')
                ->paginate(20);
        }
        elseif($user_point_type_id==2 or $user_point_type_id==3 or $user_point_type_id==4) {
            return    Environment_value::with(['environment_item','region_point.region_center.region_county','user'])
                ->whereHas('Region_point', function($q) use($user_center_id) {
                    // Query the name field in status table
                    $q->where('center_id', '=', $user_center_id); // '=' is optional
                })
                ->orderBy('id', 'DESC')
                ->paginate(20);
        }
        else{
            return    Environment_value::with(['environment_item','region_point.region_center.region_county','user'])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
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
        $this->validate($request,[
            'value' => 'required|numeric|max:100000',
            'environment_item_id'=> 'required|numeric|max:100',
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'created_at' => 'required|date',
        ]);
        $item=Environment_item::findOrFail($request['environment_item_id']);
        if($request['value']>$item->high){
            $status=2;
        }
        elseif($request['value']<$item->low){
            $status=0;
        }
        else{
            $status=1;
        }

        return Environment_value::create([
            'value' => $request['value'],
            'lat' => $request['lat'],
            'lng' => $request['lng'],
            'environment_item_id' => $request['environment_item_id'],
            'user_id' => Auth::user()->id,
            'point_id' => $request['point_id'],
            'created_at' => $request['created_at'],
            'status' => $status,
        ]);
    }
    public function updateValue(Request $request, $id)
    {
        $point = Environment_value::findOrFail($id);
        $this->validate($request,[
            'value' => 'required|numeric|max:100000',
            'environment_item_id'=> 'required|numeric|max:100',
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'created_at' => 'required|date',
        ]);
        $item=Environment_item::findOrFail($request['environment_item_id']);
        if($request['value']>$item->high){
            $status=2;
        }
        elseif($request['value']<$item->low){
            $status=0;
        }
        else{
            $status=1;
        }
        $request->merge(['status' => $status]);
        $request->merge(['user_id' => Auth::user()->id]);
        $point->update($request->all());
        return ['message' => 'Updated the value info'];
    }
    public function deleteValue($id)
    {
        //$this->authorize('isAdmin');

        $county = Environment_value::findOrFail($id);
        // delete the County

        $county->delete();

        return ['message' => 'Value Deleted'];
    }
    public function environment($date_from,$date_to)
    {       //

        return  Environment_value::with(
            [
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'environment_item',
                'user'
            ])
             ->whereBetween('created_at', [$date_from, $date_to])
            // ->whereBetween('created_at',[(new Carbon)->subDays(2)->toDateString(),(new Carbon)->now()->toDateString()] )
            ->get();
    }
    public function environmentByCounty($county_id,$date_from,$date_to)
    {
        $user_point_type_id=Auth::user()->region_point->type_id;
        $user_point_id=Auth::user()->point_id;
        $user_center_id=Auth::user()->region_point->center_id;
        if($user_point_type_id==5 or $user_point_type_id==6) {
            $items=   Environment_value::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'environment_item',
                'user'
            ])
                ->where('point_id','=',$user_point_id)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->get();
        }
        elseif($user_point_type_id==2 or $user_point_type_id==3 or $user_point_type_id==4) {
            $items=   Environment_value::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'environment_item',
                'user'
            ])
                ->whereHas('Region_point', function($q) use($user_center_id) {
                    // Query the name field in status table
                    $q->where('center_id', '=', $user_center_id); // '=' is optional
                })
                ->whereBetween('created_at', [$date_from, $date_to])
                ->get();
        }
        else{
            $items=   Environment_value::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name',
                'environment_item',
                'user'
            ])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->whereBetween('created_at', [$date_from, $date_to])
                ->get();
        }

        return   $items;
    }
    public function report($county_id){

        $collection= Environment_value::with(
            [
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])->select("point_id","status", \DB::raw('count(status) as count'))
            //->whereDate('diagnosis_at', '<=', date('Y-m-d'))
            ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
            ->groupBy("point_id","status")->paginate(50);

        foreach($collection as $item) {

            if($item['status']==1){
                $item->ok = $item['count'];
            }
            else{
                $item->Nok = $item['count'];
            }
            unset($item->count);
            unset($item->status);

        }
        $collection1=$collection;
        foreach($collection as $key =>$item) {

            if($item['ok']){
                $NokKey=$collection->where('point_id',$item['point_id'])->where('Nok')->keys()->last();
                if($NokKey){
                    $nok=$collection[$NokKey]['Nok'];
                    $item->Nok = $nok;
                    //unset($collection1[$NokKey]);
                }
            }
            else{
                $okKey=$collection->where('point_id',$item['point_id'])->where('ok')->keys()->last();
                if($okKey){
                    $ok=$collection[$okKey]['ok'];
                    $item->ok = $ok;
                }
            }
            if(($item['ok'])AND($item['Nok'])){
                unset($collection1[$okKey]);
            }

        }



        return $collection1;
        //return $collection->where('point_id',2)->where('ok')->keys()->last();
        //  return $collection->groupBy('point_id');
        // return $collection->where('status',1);
    }
}
