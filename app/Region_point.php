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
    protected $fillable = [
        'name', 'id','center_id','lat','lng','device_id'
    ];
}
