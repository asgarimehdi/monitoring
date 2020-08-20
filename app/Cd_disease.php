<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd_disease extends Model
{
    protected $fillable = [
        'id','full_name','national_code','sex','birth_at','diagnosis_at','result_id','type_id','status_id','point_id','user_id','lat','lng'
    ];
    public function Region_point()
    {
        return $this->belongsTo('App\Region_point','point_id','id');
    }
    public function cd_disease_type()
    {
        return $this->belongsTo('App\Cd_disease_type','type_id','id');
    }
}
