<?php

namespace App\Http\Controllers\API;


use App\Environment_value;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Cd_corona;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class CdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth:api');
    }
    public function index()
    {

    }
    public function itemList()
    {

        //return    Cd_corona::all();
    }

    public function addCorona(Request $request)
    {
        //
        $this->validate($request,[

            'national_code' => 'required|string|max:10|min:10|unique:cd_coronas',
            'first_name'=> 'required|string',
            'last_name'=> 'required|string',
            'sex'=> 'required|string',
            'birth'=> 'required|numeric|max:1400|min:1280',
            'occupation'=> 'required|string',
            'hospitalization'=> 'required|numeric',
            'situation'=> 'required|numeric',
            'diagnosis'=> 'required|numeric',
            'status'=> 'required|numeric',

            'expose'=> 'regex:/^((\d{10})[,;])*(\d{10})$/|nullable',
            'point_id'=> 'required|numeric',

            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'diagnosis_at' => 'required|date',
            'status_at' => 'required_if:status,2,3|date|nullable',

        ]);

        $request->merge(['user_id' => Auth::user()->id]);

        return Cd_corona::create($request->all());
    }
    public function updateCorona(Request $request, $id)
    {
        $corona = Cd_corona::findOrFail($id);
        $this->validate($request,[
            'national_code' => 'required|string|max:10|min:10|unique:cd_coronas,national_code,'.$corona->id,
            'first_name'=> 'required|string',
            'last_name'=> 'required|string',
            'sex'=> 'required|string',
            'birth'=> 'required|numeric|max:1400|min:1280',
            'occupation'=> 'required|string',
            'hospitalization'=> 'required|numeric',
            'situation'=> 'required|numeric',
            'diagnosis'=> 'required|numeric',
            'status'=> 'required|numeric',
            'expose'=> 'regex:/^((\d{10})[,;])*(\d{10})$/|nullable',
            'point_id'=> 'required|numeric',
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',
            'diagnosis_at' => 'required|date',
            'status_at' => 'required_if:status,2,3|date|nullable',
        ]);
        $request->merge(['user_id' => Auth::user()->id]);
        $corona->update($request->all());
        return ['message' => 'Updated the value info'];
    }
    public function deleteValue($id)
    {
        //$this->authorize('isAdmin');

        $county = Cd_corona::findOrFail($id);
        // delete the County

        $county->delete();

        return ['message' => 'Value Deleted'];
    }

    public function coronaByCounty($date_from, $date_to,$county_id,$related)
    {

        // return    Cd_corona::get();
        $user_point_type_id=Auth::user()->region_point->type_id;
        $user_point_id=Auth::user()->point_id;
        $user_center_id=Auth::user()->region_point->center_id;
        if($county_id=='all')
        {       //
            $items=   Cd_corona::with(
                [
                    'region_point:id,name,center_id',
                    'region_point.region_center:id,name,type_id,county_id',
                    'region_point.region_center.region_county:id,name'
                ])
                 //->where('expose', '!=', NULL)
                /*->where('status','!=',3)
                ->where('diagnosis','=',1)*/
                ->whereBetween('created_at', [$date_from, $date_to])
                ->get();
            if ($related=='true') {
                foreach($items as $item) {
                if ($item['expose']) {

                    $national_code = $item['national_code'];
                    $exp = Cd_corona::select('lat', 'lng')->where('expose', 'like', "%$national_code%")->get();
                    if ($exp->count() > 0) {
                        $x = new class
                        {
                        };
                        $x->lat = $item['lat'];
                        $x->lng = $item['lng'];
                        $exp->push($x);
                    }
                    $item->exp = $exp;
                }
                }
            }
            return   $items;

        }
        elseif($user_point_type_id==5 or $user_point_type_id==6) {
            $items=   Cd_corona::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])
                ->where('point_id','=',$user_point_id)
                ->whereBetween('created_at', [$date_from, $date_to])
                ->get();
        }
        elseif($user_point_type_id==2 or $user_point_type_id==3 or $user_point_type_id==4) {
            $items=   Cd_corona::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])
                ->whereHas('Region_point', function($q) use($user_center_id) {
                    // Query the name field in status table
                    $q->where('center_id', '=', $user_center_id); // '=' is optional
                })
                ->whereBetween('created_at', [$date_from, $date_to])
                ->get();
        }
        else{
            $items=   Cd_corona::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->whereBetween('created_at', [$date_from, $date_to])
                ->get();
        }
        if ($related=='true') {
        foreach($items as $item){
            if ($item['expose']) {
                $national_code = $item['national_code'];
                $exp = Cd_corona::select('lat', 'lng')->where('expose', 'like', "%$national_code%")->get();
                if ($exp->count() > 0) {
                    $x = new class
                    {
                    };
                    $x->lat = $item['lat'];
                    $x->lng = $item['lng'];
                    $exp->push($x);
                }
                $item->exp = $exp;
            }
        }}

        return   $items;
    }
    public function coronaByCountyLite($county_id)
    {
        // return    Cd_corona::get();
        $user_point_type_id=Auth::user()->region_point->type_id;
        $user_point_id=Auth::user()->point_id;
        $user_center_id=Auth::user()->region_point->center_id;
        if($user_point_type_id==5 or $user_point_type_id==6) {
            $items=   Cd_corona::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])
                ->where('point_id','=',$user_point_id)
                ->get();
        }
        elseif($user_point_type_id==2 or $user_point_type_id==3 or $user_point_type_id==4) {
            $items=   Cd_corona::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])
                ->whereHas('Region_point', function($q) use($user_center_id) {
                    // Query the name field in status table
                    $q->where('center_id', '=', $user_center_id); // '=' is optional
                })->get();
        }
        else{
            $items=   Cd_corona::with([
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->get();
        }

        return   $items;
    }

    public function coronaLite()
    {       //
        $items=   Cd_corona::with(
            [
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])
            ->where('status','!=',3)
            ->where('diagnosis','=',1)
            ->get();

        return   $items;

    }

    public function paginateByCounty()
    {
        $county_id=Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')){
            return   $us = Cd_corona::with('region_point.region_center.region_county')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }
        else{
            return    Cd_corona::with(['region_point.region_center.region_county'])
                ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }
    }
    public function stat()
    {
        $county_id=Auth::user()->region_point->region_center->county_id;
        $user_point_type_id=Auth::user()->region_point->type_id;
        $user_point_id=Auth::user()->point_id;
        $user_center_id=Auth::user()->region_point->center_id;
        if (Gate::allows('isOstan')){
            $count_all=   Cd_corona::count();
            $count=   Cd_corona::where('diagnosis','1')->count();
            $count_mashkok=   Cd_corona::where('diagnosis','0')->count();
            $count_men=   Cd_corona::where('diagnosis','1')->where('sex','مرد')->count();
            $count_women=   Cd_corona::where('diagnosis','1')->where('sex','زن')->count();
            $count_death=   Cd_corona::where('status','2')->where('diagnosis','1')->count();
            $count_death_mashkok=   Cd_corona::where('status','2')->where('diagnosis','=','0')->count();
            $count_recover=   Cd_corona::where('diagnosis','1')->where('status','3')->count();
            $age=   Cd_corona::where('diagnosis','1')->avg('birth');
        }
        elseif ($user_point_type_id==5 or $user_point_type_id==6){
            $count_all=   Cd_corona::where('point_id','=',$user_point_id)->count();
            $count=   Cd_corona::where('point_id','=',$user_point_id)->where('diagnosis','1')->count();
            $count_mashkok=   Cd_corona::where('point_id','=',$user_point_id)->where('diagnosis','0')->count();
            $count_men=   Cd_corona::where('point_id','=',$user_point_id)->where('diagnosis','1')->where('sex','مرد')->count();
            $count_women=   Cd_corona::where('point_id','=',$user_point_id)->where('diagnosis','1')->where('sex','زن')->count();
            $count_death=   Cd_corona::where('point_id','=',$user_point_id)->where('status','2')->where('diagnosis','1')->count();
            $count_death_mashkok=   Cd_corona::where('point_id','=',$user_point_id)->where('status','2')->where('diagnosis','=','0')->count();
            $count_recover=   Cd_corona::where('point_id','=',$user_point_id)->where('diagnosis','1')->where('status','3')->count();
            $age=   Cd_corona::where('point_id','=',$user_point_id)->where('diagnosis','1')->avg('birth');
        }
        elseif ($user_point_type_id==2 or $user_point_type_id==3 or $user_point_type_id==4){
            $count_all=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->count();
            $count=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->where('diagnosis','1')->count();
            $count_mashkok=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->where('diagnosis','0')->count();
            $count_men=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->where('diagnosis','1')->where('sex','مرد')->count();
            $count_women=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->where('diagnosis','1')->where('sex','زن')->count();
            $count_death=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->where('status','2')->where('diagnosis','1')->count();
            $count_death_mashkok=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->where('status','2')->where('diagnosis','=','0')->count();
            $count_recover=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->where('diagnosis','1')->where('status','3')->count();
            $age=   Cd_corona::whereHas('Region_point', function($q) use($user_center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $user_center_id); // '=' is optional
            })->where('diagnosis','1')->avg('birth');
        }
        else{
            $count_all=Cd_corona::whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->count();
            $count=Cd_corona::where('diagnosis','1')->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->count();
            $count_mashkok=Cd_corona::where('diagnosis','0')->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->count();
            $count_men=    Cd_corona::where('diagnosis','1')->where('sex','مرد')->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->count();
            $count_women=    Cd_corona::where('diagnosis','1')->where('sex','زن')->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->count();
            $count_death=    Cd_corona::where('status','2')->where('diagnosis','1')->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->count();
            $count_death_mashkok=    Cd_corona::where('status','2')->where('diagnosis','!=','1')->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->count();
            $count_recover=    Cd_corona::where('diagnosis','1')->where('status','3')->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->count();
            $age=    Cd_corona::where('diagnosis','1')->whereHas('Region_point.Region_center', function($q) use($county_id) {
                // Query the name field in status table
                $q->where('county_id', '=', $county_id); // '=' is optional
            })
                ->avg('birth');
        }
        $stat['count']=$count;
        $stat['count_men']=$count_men;
        $stat['count_women']=$count_women;
        $stat['count_death']=$count_death;
        $stat['count_death_mashkok']=$count_death_mashkok;
        $stat['count_recover']=$count_recover;
        $stat['age']=$age;
        $stat['count_all']=$count_all;
        $stat['count_mashkok']=$count_mashkok;
        return $stat;
    }
    public function statByCounty($county_id)
    {
        $count_all=Cd_corona::whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->count();
        $count=Cd_corona::where('diagnosis','1')->whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->count();
        $count_mashkok=Cd_corona::where('diagnosis','0')->whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->count();
        $count_men=    Cd_corona::where('diagnosis','1')->where('sex','مرد')->whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->count();
        $count_women=    Cd_corona::where('diagnosis','1')->where('sex','زن')->whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->count();
        $count_death=    Cd_corona::where('status','2')->where('diagnosis','1')->whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->count();
        $count_death_mashkok=    Cd_corona::where('status','2')->where('diagnosis','!=','1')->whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->count();
        $count_recover=    Cd_corona::where('diagnosis','1')->where('status','3')->whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->count();
        $age=Cd_corona::where('diagnosis','1')->whereHas('Region_point.Region_center', function($q) use($county_id) {
            // Query the name field in status table
            $q->where('county_id', '=', $county_id); // '=' is optional
        })
            ->avg('birth');

        $stat['count']=$count;
        $stat['count_men']=$count_men;
        $stat['count_women']=$count_women;
        $stat['count_death']=$count_death;
        $stat['count_death_mashkok']=$count_death_mashkok;
        $stat['count_recover']=$count_recover;
        $stat['age']=$age;
        $stat['count_all']=$count_all;
        $stat['count_mashkok']=$count_mashkok;
        return $stat;


    }
    public function statByPoint($point_id,$type_id,$center_id,$county2_id)
    {
        $county_id=Auth::user()->region_point->region_center->county_id;
        if ($type_id==5 or $type_id==6){
            $count_all=   Cd_corona::where('point_id','=',$point_id)->count();
            $count=   Cd_corona::where('point_id','=',$point_id)->where('diagnosis','1')->count();
            $count_mashkok=   Cd_corona::where('point_id','=',$point_id)->where('diagnosis','0')->count();
            $count_men=   Cd_corona::where('point_id','=',$point_id)->where('diagnosis','1')->where('sex','مرد')->count();
            $count_women=   Cd_corona::where('point_id','=',$point_id)->where('diagnosis','1')->where('sex','زن')->count();
            $count_death=   Cd_corona::where('point_id','=',$point_id)->where('status','2')->where('diagnosis','1')->count();
            $count_death_mashkok=   Cd_corona::where('point_id','=',$point_id)->where('status','2')->where('diagnosis','=','0')->count();
            $count_recover=   Cd_corona::where('point_id','=',$point_id)->where('diagnosis','1')->where('status','3')->count();
            $age=   Cd_corona::where('point_id','=',$point_id)->where('diagnosis','1')->avg('birth');
        }
        elseif ($type_id==2 or $type_id==3 or $type_id==4){
            $count_all=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->count();
            $count=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->where('diagnosis','1')->count();
            $count_mashkok=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->where('diagnosis','0')->count();
            $count_men=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->where('diagnosis','1')->where('sex','مرد')->count();
            $count_women=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->where('diagnosis','1')->where('sex','زن')->count();
            $count_death=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->where('status','2')->where('diagnosis','1')->count();
            $count_death_mashkok=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->where('status','2')->where('diagnosis','=','0')->count();
            $count_recover=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->where('diagnosis','1')->where('status','3')->count();
            $age=   Cd_corona::whereHas('Region_point', function($q) use($center_id) {
                // Query the name field in status table
                $q->where('center_id', '=', $center_id); // '=' is optional
            })->where('diagnosis','1')->avg('birth');
        }
        else return $this->statByCounty($county2_id);

        $stat['count']=$count;
        $stat['count_men']=$count_men;
        $stat['count_women']=$count_women;
        $stat['count_death']=$count_death;
        $stat['count_death_mashkok']=$count_death_mashkok;
        $stat['count_recover']=$count_recover;
        $stat['age']=$age;
        $stat['count_all']=$count_all;
        $stat['count_mashkok']=$count_mashkok;
        return $stat;
    }
    public function search(){
        $county_id=Auth::user()->region_point->region_center->county_id;
        if (Gate::allows('isOstan')){
            if ($search = \Request::get('q')) {
                $us = Cd_corona::with('region_point.region_center.region_county')
                    ->where(function($query) use ($search){
                        $query->where('first_name','LIKE',"%$search%")
                            ->orWhere('last_name','LIKE',"%$search%")
                            ->orWhere('occupation','LIKE',"%$search%")
                            ->orWhere('national_code','LIKE',"%$search%");
                    })
                    ->orderBy('id', 'DESC')
                    ->paginate(40);

            }else{
                $us = Cd_corona::with('region_point.region_center.region_county')->latest()
                    ->orderBy('id', 'DESC')
                    ->paginate(20);

                return $us;
            }
        }
        else{
            if ($search = \Request::get('q')) {
                $us = Cd_corona::with('region_point.region_center.region_county')
                    ->whereHas('Region_point.Region_center', function ($qe) use ($county_id) {
                        // Query the name field in status table
                        $qe->where('county_id', '=', $county_id); // '=' is optional
                    })->where(function($query) use ($search){
                        $query->where('first_name','LIKE',"%$search%")
                            ->orWhere('last_name','LIKE',"%$search%")
                            ->orWhere('occupation','LIKE',"%$search%")
                            ->orWhere('national_code','LIKE',"%$search%");
                    })
                    ->orderBy('id', 'DESC')
                    ->paginate(40);


            }else{
                return Cd_corona::with('region_point.region_center.region_county')
                    ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                        // Query the name field in status table
                        $q->where('county_id', '=', $county_id); // '=' is optional
                    })
                    ->orderBy('id', 'DESC')
                    ->paginate(20);
            }
        }
        return $us;
    }

    /*  public function chart(){
          return Cd_corona::with(['region_point.region_center.region_county'])->get();
      }*/
    /*   public function chart_NewCasePerDay(){
           //SELECT diagnosis_at,count(id) as count FROM `cd_coronas` GROUP BY `diagnosis_at`
           // return Cd_corona::select("diagnosis_at")->groupBy("diagnosis_at")->get();
           return $results =\ DB::select(
               \DB::raw("SELECT diagnosis_at,count(id) as count FROM `cd_coronas` GROUP BY `diagnosis_at`")
           );
       }*/
    public function chart_newCasePerDiagnosis($county_id){
        if($county_id==9){
            $data[0]=Cd_corona::select("diagnosis_at", \DB::raw('count(id) as count'))
                ->where("diagnosis",'=','1')
                ->whereDate('diagnosis_at', '<=', date('Y-m-d'))
                ->groupBy("diagnosis_at")->get();
            $data[1]=Cd_corona::select("diagnosis_at", \DB::raw('count(id) as count'))
                ->where("diagnosis",'=','1')
                ->where("hospitalization",'=','0')
                ->whereDate('diagnosis_at', '<=', date('Y-m-d'))
                ->groupBy("diagnosis_at")->get();
            $data[2]=Cd_corona::select("diagnosis_at", \DB::raw('count(id) as count'))
                ->where("diagnosis",'=','1')
                ->where("hospitalization",'=','1')
                ->whereDate('diagnosis_at', '<=', date('Y-m-d'))
                ->groupBy("diagnosis_at")->get();


        }else {
            $data[0]=Cd_corona::select("diagnosis_at", \DB::raw('count(id) as count'))
                ->where("diagnosis",'=','1')
                ->whereDate('diagnosis_at', '<=', date('Y-m-d'))
                ->whereHas('Region_point.Region_center', function ($q) use ($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->groupBy("diagnosis_at")->get();

            $data[1]=Cd_corona::select("diagnosis_at", \DB::raw('count(id) as count'))
                ->where("diagnosis",'=','1')
                ->where("hospitalization",'=','0')
                ->whereDate('diagnosis_at', '<=', date('Y-m-d'))
                ->whereHas('Region_point.Region_center', function ($q) use ($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->groupBy("diagnosis_at")->get();

            $data[2]=Cd_corona::select("diagnosis_at", \DB::raw('count(id) as count'))
                ->where("diagnosis",'=','1')
                ->where("hospitalization",'=','1')
                ->whereDate('diagnosis_at', '<=', date('Y-m-d'))
                ->whereHas('Region_point.Region_center', function ($q) use ($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                })
                ->groupBy("diagnosis_at")->get();
        }
        foreach ($data[0] as $item)
        {
            //  if (!array_search($item['diagnosis_at'], $data[1]->toArray())) {
            $x = new class{};
            $x->diagnosis_at = $item['diagnosis_at'];
            $x->count = 0;
            $data[1]->push($x);
            $data[2]->push($x);

        }
        //$data[0]=collect($data[0])->unique('diagnosis_at')->sortBy('diagnosis_at')->values();
        $data[1]=collect($data[1])->unique('diagnosis_at')->sortBy('diagnosis_at')->values();
        $data[2]=collect($data[2])->unique('diagnosis_at')->sortBy('diagnosis_at')->values();


        return $data;
        //SELECT diagnosis_at,count(id) as count FROM `cd_coronas` GROUP BY `diagnosis_at`
        /*        return \DB::table('cd_coronas')
                    ->select(\DB::raw('diagnosis_at,count(*) as count'))
                    ->whereHas('Region_point.Region_center', function($q) use($county_id) {
                        // Query the name field in status table
                        $q->where('county_id', '=', $county_id); // '=' is optional
                    })
                    ->groupBy('diagnosis_at')
                    ->get();*/
        // return $results =\ DB::select( \DB::raw("SELECT status_at,count(id) as count FROM `cd_coronas` where status=2 GROUP BY `status_at`") );
    }
    public function report($county_id,$date_from,$date_to,$date_from_diagnosis,$date_to_diagnosis,$date_from_status,$date_to_status,$date_from_birth,$date_to_birth,$point_type,$diagnosis,$situation,$hospitalization,$sex)
    {
        $user_point_type_id = Auth::user()->region_point->type_id;
        $user_point_id = Auth::user()->point_id;
        $user_center_id = Auth::user()->region_point->center_id;
        $user_county_id = Auth::user()->region_point->region_center->county_id;

        $collection = Cd_corona::with(
            [
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])->select("point_id", "status", \DB::raw('count(status) as count'))

            ->when(($county_id != 9), function ($query) use ($county_id) {
                return $query->whereHas('Region_point.Region_center', function ($q) use ($county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $county_id); // '=' is optional
                });
            })
            ->when(($point_type != 'all'), function ($query) use ($point_type) {
                return $query->whereHas('Region_point', function ($q) use ($point_type) {
                    $q->where('type_id', '=', $point_type);
                });
            })
            ->when(Gate::allows('isBehvarz'), function ($query) use ($user_point_id) {
                return $query->whereHas('Region_point', function ($q) use ($user_point_id) {
                    // Query the name field in status table
                    $q->where('point_id', '=', $user_point_id)->orWhere('id', '=', $user_point_id);
                });
            })
            ->when(Gate::allows('isMarkaz'), function ($query) use ($user_center_id) {
                return $query->whereHas('Region_point', function ($q) use ($user_center_id) {
                    // Query the name field in status table
                    $q->where('center_id', '=', $user_center_id);
                });
            })
            ->when(($diagnosis != 'all'), function ($query) use ($diagnosis) {
                return $query->where('diagnosis', '=', $diagnosis);
            })
            ->when(($situation != 'all'), function ($query) use ($situation) {
                return $query->where('situation', '=', $situation);
            })
            ->when(($hospitalization != 'all'), function ($query) use ($hospitalization) {
                return $query->where('hospitalization', '=', $hospitalization);
            })
            ->when(($sex != 'all'), function ($query) use ($sex) {
                return $query->where('sex', '=', $sex);
            })
            ->whereBetween('created_at', [$date_from, $date_to])
            ->whereBetween('diagnosis_at', [$date_from_diagnosis, $date_to_diagnosis])
            ->whereBetween('status_at', [$date_from_status, $date_to_status])
            ->whereBetween('birth', [$date_from_birth, $date_to_birth])

            ->groupBy("point_id", "status")->paginate(100);
        foreach ($collection as $item) {
           if ($item['status'] == 0) {
                $item->s_0 = $item['count'];
            } elseif ($item['status'] == 1) {
                $item->s_1 = $item['count'];
            } elseif ($item['status'] == 2) {
                $item->s_2 = $item['count'];
            } elseif ($item['status'] == 3) {
                $item->s_3 = $item['count'];
            } elseif ($item['status'] == 4) {
                $item->s_4 = $item['count'];
            } else {
                $item->s_5 = $item['count'];
            }
            unset($item->count);
            unset($item->status);
        }

        //$collection1 = collect($collection);
        foreach ($collection as $key => $item) {
            $s_0_Key = $collection->where('point_id', $item['point_id'])->where('s_0')->keys()->last();
            $s_1_Key = $collection->where('point_id', $item['point_id'])->where('s_1')->keys()->last();
            $s_2_Key = $collection->where('point_id', $item['point_id'])->where('s_2')->keys()->last();
            $s_3_Key = $collection->where('point_id', $item['point_id'])->where('s_3')->keys()->last();
            $s_4_Key = $collection->where('point_id', $item['point_id'])->where('s_4')->keys()->last();
            $s_5_Key = $collection->where('point_id', $item['point_id'])->where('s_5')->keys()->last();
            if ($item['s_0']) {
                if (($s_1_Key)and(!$collection[$s_1_Key]['main'])) {
                    $s1 = $collection[$s_1_Key]['s_1'];
                    $item->s_1 = $s1;
                    $item->main=true;

                    unset($collection[$s_1_Key]);
                }
                if (($s_2_Key)and(!$collection[$s_2_Key]['main'])) {
                    $s2 = $collection[$s_2_Key]['s_2'];
                    $item->s_2 = $s2;
                    $item->main=true;

                    unset($collection[$s_2_Key]);
                }
                if (($s_3_Key)and(!$collection[$s_3_Key]['main'])) {
                    $s3 = $collection[$s_3_Key]['s_3'];
                    $item->s_3 = $s3;
                    $item->main=true;

                    unset($collection[$s_3_Key]);
                }
                if (($s_4_Key)and(!$collection[$s_4_Key]['main'])) {
                    $s4 = $collection[$s_4_Key]['s_4'];
                    $item->s_4 = $s4;
                    $item->main=true;

                    unset($collection[$s_4_Key]);
                }
                if (($s_5_Key)and(!$collection[$s_5_Key]['main'])) {
                    $s5 = $collection[$s_5_Key]['s_5'];
                    $item->s_5 = $s5;
                    $item->main=true;

                    unset($collection[$s_5_Key]);
                }
            }
            elseif ($item['s_1']) {
                if ($s_0_Key) {
                    if(!$collection[$s_0_Key]['main']){
                    $s0 = $collection[$s_1_Key]['s_0'];
                    $item->s_0 = $s0;
                    $item->main=true;
                    unset($collection[$s_0_Key]);
                }
                }
                if (($s_2_Key)and(!$collection[$s_2_Key]['main'])) {
                    $s2 = $collection[$s_2_Key]['s_2'];
                    $item->s_2 = $s2;
                    $item->main=true;
                    unset($collection[$s_2_Key]);
                }
                if (($s_3_Key)and(!$collection[$s_3_Key]['main'])) {
                    $s3 = $collection[$s_3_Key]['s_3'];
                    $item->s_3 = $s3;
                    $item->main=true;
                    unset($collection[$s_3_Key]);
                }
                if (($s_4_Key)and(!$collection[$s_4_Key]['main'])) {
                    $s4 = $collection[$s_4_Key]['s_4'];
                    $item->s_4 = $s4;
                    $item->main=true;
                    unset($collection[$s_4_Key]);
                }
                if (($s_5_Key)and(!$collection[$s_5_Key]['main'])) {
                    $s5 = $collection[$s_5_Key]['s_5'];
                    $item->s_5 = $s5;
                    $item->main=true;
                    unset($collection[$s_5_Key]);
                }
            }
            elseif ($item['s_2']) {
                if (($s_0_Key)and(!$collection[$s_0_Key]['main'])) {
                    $s0 = $collection[$s_0_Key]['s_0'];
                    $item->s_0 = $s0;
                    $item->main=true;

                    unset($collection[$s_0_Key]);
                }
                if (($s_1_Key)and(!$collection[$s_1_Key]['main'])) {
                    $s1 = $collection[$s_1_Key]['s_1'];
                    $item->s_1 = $s1;
                    $item->main=true;

                    unset($collection[$s_1_Key]);
                }
                if (($s_3_Key)and(!$collection[$s_3_Key]['main'])) {
                    $s3 = $collection[$s_3_Key]['s_3'];
                    $item->s_3 = $s3;
                    $item->main=true;

                    unset($collection[$s_3_Key]);
                }
                if (($s_4_Key)and(!$collection[$s_4_Key]['main'])) {
                    $s4 = $collection[$s_4_Key]['s_4'];
                    $item->s_4 = $s4;
                    $item->main=true;

                    unset($collection[$s_4_Key]);
                }
                if (($s_5_Key)and(!$collection[$s_5_Key]['main'])) {
                    $s5 = $collection[$s_5_Key]['s_5'];
                    $item->s_5 = $s5;
                    $item->main=true;

                    unset($collection[$s_5_Key]);
                }
            }
            elseif ($item['s_3']) {
                if (($s_0_Key)and(!$collection[$s_0_Key]['main'])) {
                    $s0 = $collection[$s_1_Key]['s_0'];
                    $item->s_0 = $s0;
                    $item->main=true;

                    unset($collection[$s_0_Key]);
                }
                if (($s_1_Key)and(!$collection[$s_1_Key]['main'])) {
                    $s1 = $collection[$s_1_Key]['s_1'];
                    $item->s_1 = $s1;
                    $item->main=true;

                    unset($collection[$s_1_Key]);
                }
                if (($s_2_Key)and(!$collection[$s_2_Key]['main'])) {
                    $s2 = $collection[$s_2_Key]['s_2'];
                    $item->s_2 = $s2;
                    $item->main=true;

                    unset($collection[$s_2_Key]);
                }
                if (($s_4_Key)and(!$collection[$s_4_Key]['main'])) {
                    $s4 = $collection[$s_4_Key]['s_4'];
                    $item->s_4 = $s4;
                    $item->main=true;

                    unset($collection[$s_4_Key]);
                }
                if (($s_5_Key)and(!$collection[$s_5_Key]['main'])) {
                    $s5 = $collection[$s_5_Key]['s_5'];
                    $item->s_5 = $s5;
                    $item->main=true;

                    unset($collection[$s_5_Key]);
                }
            }
            elseif ($item['s_4']) {
                if (($s_2_Key)and(!$collection[$s_2_Key]['main'])) {
                    $s2 = $collection[$s_2_Key]['s_2'];
                    $item->s_2 = $s2;
                    $item->main=true;

                    unset($collection[$s_2_Key]);
                }
                if (($s_1_Key)and(!$collection[$s_1_Key]['main'])) {
                    $s1 = $collection[$s_1_Key]['s_1'];
                    $item->s_1 = $s1;
                    $item->main=true;

                    unset($collection[$s_1_Key]);
                }
                if (($s_0_Key)and(!$collection[$s_0_Key]['main'])) {
                    $s0 = $collection[$s_0_Key]['s_0'];
                    $item->s_0 = $s0;
                    $item->main=true;

                    unset($collection[$s_0_Key]);
                }
                if (($s_3_Key)and(!$collection[$s_3_Key]['main'])) {
                    $s3 = $collection[$s_3_Key]['s_3'];
                    $item->s_3 = $s3;
                    $item->main=true;

                    unset($collection[$s_3_Key]);
                }
                if (($s_5_Key)and(!$collection[$s_5_Key]['main'])) {
                    $s5 = $collection[$s_5_Key]['s_5'];
                    $item->s_5 = $s5;
                    $item->main=true;

                    unset($collection[$s_5_Key]);
                }
            }
            elseif ($item['s_5']) {
                if (($s_0_Key)and(!$collection[$s_0_Key]['main'])) {
                    $s0 = $collection[$s_0_Key]['s_0'];
                    $item->s_0 = $s0;
                    $item->main=true;

                    unset($collection[$s_0_Key]);
                }
                if (($s_2_Key)and(!$collection[$s_2_Key]['main'])) {
                    $s2 = $collection[$s_2_Key]['s_2'];
                    $item->s_2 = $s2;
                    $item->main=true;

                    unset($collection[$s_2_Key]);
                }
                if (($s_3_Key)and(!$collection[$s_3_Key]['main'])) {
                    $s3 = $collection[$s_3_Key]['s_3'];
                    $item->s_3 = $s3;
                    $item->main=true;

                    unset($collection[$s_3_Key]);
                }
                if (($s_4_Key)and(!$collection[$s_4_Key]['main'])) {
                    $s4 = $collection[$s_4_Key]['s_4'];
                    $item->s_4 = $s4;
                    $item->main=true;

                    unset($collection[$s_4_Key]);
                }
                if (($s_1_Key)and(!$collection[$s_1_Key]['main'])) {
                    $s1 = $collection[$s_1_Key]['s_1'];
                    $item->s_1 = $s1;
                    $item->main=true;

                    unset($collection[$s_1_Key]);
                }
            }
        }
       // $collection1 = collect($collection);
       // $collection1 = $collection1->unique($collection1);
        return $collection;
    }
}
