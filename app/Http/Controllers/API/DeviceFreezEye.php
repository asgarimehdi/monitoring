<?php

namespace App\Http\Controllers\API;

use App\Device;
use App\Devices_log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeviceFreezEye extends Controller
{

    public function index(Request $request)
    {

        $myObj=new \stdClass();
        $data=$request['data1'];
        $data=explode(':',$data);
        $data=$data[0];
        if(strlen($data)==103){

/////
            if($data[2]==0)
                $neg='-';
            else
                $neg='';
            $temp= ($neg.$data[4].$data[5].'.'.$data[6]);
/////
            $device_id=($data[-5].$data[-4].$data[-3].$data[-2]);
/////
            if($data[7]==0)
                $power='0';
            else
                $power='1';
/////
            if($data[2]=='X'){
                $sensor='0';
                $temp='0';
            }
            else
                $sensor='1';
/////
           // $myArr=array();
            $myObj->res = 'receive api ok';
            $myArr['temp']=$myObj->temp = $temp;
            $myArr['device_id']= $myObj->device_id = $device_id;
            $myArr['power']=$myObj->power = $power;
            $myArr['sensor']= $myObj->sensor = $sensor;
            $myArr['ip']= $myObj->ip = $request['ip'];
            $myObj->timestamp = time();
            $this->store($myArr);
            $this->update($myArr, $myArr['device_id']);
        }
        else{
            $myObj->res = 'data error';
            $myObj->city = 0;
            $myObj->ip = 0;
        }
        $myJSON = json_encode($myObj);

        echo $myJSON;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function store($request)
    {

        return Devices_log::create([
            'device_id' => $request['device_id'],
            'temp' => $request['temp'],
            'sensor' => $request['sensor'],
            'power' => $request['power'],
            'ip' => $request['ip'],
        ]);
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
    private function update($request, $id)
    {

        $device = Device::find($id);
        if($device){
            $device->temp = $request['temp'];
            $device->sensor = $request['sensor'];
            $device->power = $request['power'];
            $device->save();
        }
        else{
            Device::create([
                'id' => $request['device_id'],
                'temp' => $request['temp'],
                'sensor' => $request['sensor'],
                'power' => $request['power'],
            ]);
        }


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
}
