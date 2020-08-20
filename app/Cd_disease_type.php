<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd_disease_type extends Model
{
    //
    protected $fillable = [
        'id','name'
    ];
    public function cd_disease()
    {
        return $this->hasMany('App\Cd_disease');
    }
}
