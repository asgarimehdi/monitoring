<?php

namespace App\Http\Controllers\API;

use App\Develop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class DevelopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }



    public function store(Request $request)
    {
        //
        $this->validate($request,[

            'population' => 'required|numeric',
            'point_id' => 'required|numeric|unique:develops',

        ]);
        $request->merge(['user_id' => Auth::user()->id]);

        return Develop::updateOrCreate(
            ['point_id' => $request->point_id],
            ['population' => $request->population, 'user_id'=>$request->user_id]
        );
    }


    public function updateDevelop(Request $request, $id)
    {
        $this->validate($request,[

            'population' => 'required|numeric',
              //'point_id' => 'required|numeric|unique:develops',

        ]);
        $request->merge(['user_id' => Auth::user()->id]);
        $develop = Develop::findOrFail($id);
        $develop->update($request->all());
        return ['message' => 'Updated the develop info'];
    }



    public function develop($id)
    {
       return Develop::where('point_id',$id)->get();
    }
}
