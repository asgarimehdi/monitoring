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

    public function add(Request $request)
    {
        //
        $this->validate($request,[

            'national_code' => 'required|string|max:10|min:10',

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
            'national_code' => 'required|string|max:10|min:10',

            'lat' => 'required|numeric|max:60|min:5',
            'lng' => 'required|numeric|max:60|min:5',

        ]);
        $request->merge(['user_id' => Auth::user()->id]);
        $corona->update($request->all());
        return ['message' => 'Updated the value info'];
    }
    public function delete($id)
    {
        //$this->authorize('isAdmin');

        $county = Cd_corona_contact::findOrFail($id);
        // delete the County

        $county->delete();

        return ['message' => 'Value Deleted'];
    }
}
