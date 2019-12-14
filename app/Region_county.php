<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region_county extends Model
{
    //
    public function region_centers()
    {
        return $this->hasMany('App\Region_center');
    }
    protected $fillable = [
        'name', 'id','lat','lng'
    ];
}
