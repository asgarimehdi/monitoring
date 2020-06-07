<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd_finil extends Model
{
    //
    protected $fillable = [
        'id','full_name','sex','type','birth_at','point_id','user_id','lat','lng','diagnosis_at'
    ];
    public function Region_point()
    {
        return $this->belongsTo('App\Region_point','point_id','id');
    }
}
