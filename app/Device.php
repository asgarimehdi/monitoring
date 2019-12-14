<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function Region_point()
    {
        return $this->hasOne('App\Region_point');
    }
    protected $fillable = [
         'id','point_id','temp','power','sensor'
    ];
}
