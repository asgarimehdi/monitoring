<?php

namespace App\Http\Controllers\API;

use App\Develop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class DevelopController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function develop($id)
    {

       return Develop::where('point_id',$id)->get();
    }
}
