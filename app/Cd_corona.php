<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd_corona extends Model
{
    //
    protected $fillable = [
        'id','national_code','first_name','last_name','sex','birth','occupation','hospitalization','situation','diagnosis','status','expose','point_id','user_id','lat','lng','diagnosis_at','status_at'
    ];
    protected $casts = [
        'expose' => 'array'
    ];
    public function Region_point()
    {
        return $this->belongsTo('App\Region_point','point_id','id');
    }

    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
