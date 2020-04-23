<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region_point extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function device()
    {
        return $this->belongsTo('App\Device','device_id','id');
    }
    public function region_center()
    {
        return $this->belongsTo('App\Region_center','center_id','id');
    }
    public function environment_values()
    {
        return $this->hasMany('App\Environment_value');
    }
    public function cd_corona()
    {
        return $this->hasMany('App\Cd_corona');
    }
    public function develop()
    {
        return $this->hasOne('App\Develop', 'point_id');
    }
    protected $fillable = [
        'name', 'id','center_id','lat','lng','device_id','type_id'
    ];
}
