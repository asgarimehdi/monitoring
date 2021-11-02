<?php

namespace App\Http\Controllers\Api;

use App\Environment_item;
use App\Environment_sameh;
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
}
