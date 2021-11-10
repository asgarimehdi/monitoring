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
    public function report($county_id,$date_from,$date_to,$point_type,$environment_item_id,$covered,$piping)
    {
        $user_point_type_id = Auth::user()->region_point->type_id;
        $user_point_id = Auth::user()->point_id;
        $user_center_id = Auth::user()->region_point->center_id;
        $user_county_id = Auth::user()->region_point->region_center->county_id;


        $collection = Environment_value::with(
            [
                'region_point:id,name,center_id',
                'region_point.region_center:id,name,type_id,county_id',
                'region_point.region_center.region_county:id,name'
            ])->select("point_id", "status", \DB::raw('count(status) as count'))
            ->when($piping!='all', function ($query) use ($piping) {
                return $query->whereHas('Region_point.environment_base', function ($q) use ($piping) {
                    // Query the name field in status table
                    $q->where('piping', '=', $piping);
                });
            })
            ->when($covered!='all', function ($query) use ($covered) {
                return $query->whereHas('Region_point.environment_base', function ($q) use ($covered) {
                    // Query the name field in status table
                    $q->where('covered', '=', $covered);
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
            ->when(($environment_item_id != 'all'), function ($query) use ($environment_item_id) {
                return $query->where('environment_item_id', '=', $environment_item_id);
            })
            ->whereBetween('created_at', [$date_from, $date_to])
            ->groupBy("point_id", "status")->paginate(100);


        foreach ($collection as $item) {

            if ($item['status'] == 1) {
                $item->ok = $item['count'];
            } elseif ($item['status'] == 2) {
                $item->Mok = $item['count'];
            } else {
                $item->Nok = $item['count'];
            }
            unset($item->count);
            unset($item->status);

        }
        $collection1 = $collection;
        foreach ($collection as $key => $item) {

            if ($item['ok']) {
                $NokKey = $collection->where('point_id', $item['point_id'])->where('Nok')->keys()->last();
                if ($NokKey) {
                    $nok = $collection[$NokKey]['Nok'];
                    $item->Nok = $nok;
                    //unset($collection1[$NokKey]);
                }
            } elseif ($item['Mok']) {
                $NokKey = $collection->where('point_id', $item['point_id'])->where('Nok')->keys()->last();
                if ($NokKey) {
                    $collection[$NokKey]['Nok'];
                    $collection[$NokKey]['Nok'] += $item['Mok'];
                    //unset($collection1[$key]);
                }
                $okKey = $collection->where('point_id', $item['point_id'])->where('ok')->keys()->last();
                if ($okKey) {
                    $ok = $collection[$okKey]['ok'];
                    $item->ok = $ok;
                    unset($collection1[$key]);
                }
                if ((!($NokKey)) && (!($okKey))) {
                    $item->Nok = $item['Mok'];
                }
            } else {
                $okKey = $collection->where('point_id', $item['point_id'])->where('ok')->keys()->last();
                if ($okKey) {
                    $ok = $collection[$okKey]['ok'];
                    $item->ok = $ok;
                }
                $mokKey = $collection->where('point_id', $item['point_id'])->where('Mok')->keys()->last();

                if ($mokKey) {
                    $mok = $collection[$mokKey]['mok'];
                    $item->Nok = $mok + $item['Nok'];
                    unset($collection1[$mokKey]);
                }
            }
            if (($item['ok']) and ($item['Nok'])) {
                unset($collection1[$okKey]);
            }

        }


        return $collection1;
        //return $collection->where('point_id',2)->where('ok')->keys()->last();
        //  return $collection->groupBy('point_id');
        // return $collection->where('status',1);
    }
}
