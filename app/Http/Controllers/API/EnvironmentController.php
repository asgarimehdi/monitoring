<?php

namespace App\Http\Controllers\API;

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
    public function valueList()
    {
        //
        return    Environment_value::with(['environment_item','region_point','user'])->paginate(20);
    }
    public function addValue(Request $request)
    {
        //
        $this->validate($request,[
            'value' => 'required|numeric|max:100000',
            'environment_item_id'=> 'required|numeric|max:100',
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
            'environment_item_id' => $request['environment_item_id'],
            'user_id' => Auth::user()->id,
            'point_id' => Auth::user()->region_point->id,
            'status' => $status,
        ]);
    }
    public function updateValue(Request $request, $id)
    {
        $point = Environment_value::findOrFail($id);
        $this->validate($request,[
            'value' => 'required|numeric|max:100000',
            'environment_item_id'=> 'required|numeric|max:100',
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

}
