<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd_thyroid extends Model
{
    //
    protected $fillable = [
        'id','full_name','sex','birth_at','point_id','user_id','lat','lng','diagnosis_at','diagnosis','status'
    ];
    public function Region_point()
    {
        return $this->belongsTo('App\Region_point','point_id','id');
    }
}
