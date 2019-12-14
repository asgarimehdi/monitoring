<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devices_log extends Model
{
    //
    protected $fillable = [
        'device_id','point_id','temp','power','sensor','ip'
    ];
}
