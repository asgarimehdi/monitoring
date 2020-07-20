<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd_cancer_type extends Model
{
    //
    protected $fillable = [
        'id','name'
    ];
    public function cd_cancer()
    {
        return $this->hasMany('App\Cd_cancer');
    }
}
