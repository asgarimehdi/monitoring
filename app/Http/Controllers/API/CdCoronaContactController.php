<?php

namespace App\Http\Controllers\API;

use App\Cd_corona;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cd_corona_contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class CdCoronaContactController extends Controller
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
        //
    }
    public function paginateByCounty($corona_id)
    {

            return    Cd_corona_contact::where('corona_id','=',$corona_id)
                ->paginate(10);

    }
    public function add(Request $request)
    {
        //
        $this->validate($request,[
            'corona_id' => 'required|numeric',
            'national_code' => ['required','string','max:10','min:10', 'unique:cd_corona_contacts,national_code,NULL,id,corona_id,'.$request->input('corona_id')],
            'first_name'=> 'required|string',
            'last_name'=> 'required|string',
            'tel' => 'required|numeric|nullable|max:9999999999|regex:/(0)[0-9]{10}/',
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',


        ]);

        $request->merge(['user_id' => Auth::user()->id]);

        return Cd_corona_contact::create($request->all());
    }
    public function update(Request $request, $id)
    {
        $corona = Cd_corona_contact::findOrFail($id);
        $this->validate($request,[
            'corona_id' => 'required|numeric',
            'national_code' => ['required','string','max:10','min:10', 'unique:cd_corona_contacts,national_code,NULL,id,corona_id,'.$corona->id],
            'first_name'=> 'required|string',
            'last_name'=> 'required|string',
            'tel' => 'required|numeric|nullable|max:9999999999|regex:/(0)[0-9]{10}/',
            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',

        ]);
        $request->merge(['user_id' => Auth::user()->id]);
        $corona->update($request->all());
        return ['message' => 'Updated the value info'];
    }
    public function delete($id)
    {
        $county = Cd_corona_contact::findOrFail($id);
        $county->delete();
        return ['message' => 'Value Deleted'];
    }
    public function show($date_from, $date_to,$county_id)
    {
        $user_point_type_id=Auth::user()->region_point->type_id;
        $user_point_id=Auth::user()->point_id;
        $user_center_id=Auth::user()->region_point->center_id;

              //
            $items=   Cd_corona_contact::with([
                'Cd_corona:id,lat,lng',

            ])
                ->when(Gate::allows('isBehvarz'), function ($query) use ($user_point_id) {
                    return $query->whereHas('Cd_corona.Region_point', function ($q) use ($user_point_id) {
                        // Query the name field in status table
                        $q->where('point_id', '=', $user_point_id)->orWhere('id', '=', $user_point_id);
                    });
                })
                ->when(Gate::allows('isMarkaz'), function ($query) use ($user_center_id) {
                    return $query->whereHas('Cd_corona.Region_point', function ($q) use ($user_center_id) {
                        // Query the name field in status table
                        $q->where('center_id', '=', $user_center_id);
                    });
                })
                ->when(($county_id != 'all'), function ($query) use ($county_id) {
                    return $query->whereHas('Cd_corona.Region_point.Region_center', function ($q) use ($county_id) {
                        // Query the name field in status table
                        $q->where('county_id', '=', $county_id); // '=' is optional
                    });
                })

                ->whereHas('Cd_corona', function($q) use($date_from, $date_to) {
                    // Query the name field in status table
                    $q->whereBetween('created_at', [$date_from, $date_to]); // '=' is optional
                })
                ->get();

            return   $items;


    }
}
