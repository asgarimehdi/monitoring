<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment_value extends Model
{
    //
    public function environment_item()
    {
        return $this->belongsTo('App\Environment_item','environment_item_id','id');
    }
    public function Region_point()
    {
        return $this->hasOne('App\Region_point','id','point_id');
    }
    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    protected $fillable = [
        'id','value', 'point_id','user_id','environment_item_id','status','lat','lng','created_at'
    ];
}
