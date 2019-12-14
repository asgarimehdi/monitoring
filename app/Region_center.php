<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region_center extends Model
{
    public function region_points()
    {
        return $this->hasMany('App\Region_point');
    }
    public function region_county()
    {
        return $this->belongsTo('App\Region_county','county_id','id');
    }
    protected $fillable = [
        'name', 'id','type_id','county_id',
    ];
}
