<?php

namespace App\Http\Controllers\API;

use App\Cd_corona;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function behbooder($minDate,$maxDate)
    {
        //UPDATE `cd_coronas` SET `status` = '3',status_at='2021-10-03',updated_at='2021-10-03 12:00:00' WHERE `diagnosis_at` < '2021-09-20' AND status!=3 AND status!=2
        $response=Cd_corona::where('diagnosis_at','<', $minDate)
            ->where('status','!=', '3')
            ->where('status','!=', '2')
            ->update(['status' => '3','status_at' => $maxDate]);
        return $response;
    }
}
