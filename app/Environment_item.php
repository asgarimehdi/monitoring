<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment_item extends Model
{
    //
    public function environment_values()
    {
        return $this->hasMany('App\Environment_value');
    }
    protected $fillable = [
        'id','high', 'low'
    ];
}
