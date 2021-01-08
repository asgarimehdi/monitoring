<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Cd_corona_contact extends Model
{
    protected $fillable = [
        'id','national_code','corona_id','user_id','lat','lng'
    ];
    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    public function Cd_corona()
    {
        return $this->belongsTo('App\Cd_corona','corona_id','id');
    }
}
