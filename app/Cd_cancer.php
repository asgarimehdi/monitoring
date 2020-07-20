<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd_cancer extends Model
{
    //
    protected $fillable = [
        'id','full_name','sex','job','type_id','detection_type','birth_at','point_id','user_id','lat','lng','diagnosis_at'
    ];
    public function Region_point()
    {
        return $this->belongsTo('App\Region_point','point_id','id');
    }
    public function cd_cancer_type()
    {
        return $this->belongsTo('App\Cd_cancer_type','type_id','id');
    }
}
