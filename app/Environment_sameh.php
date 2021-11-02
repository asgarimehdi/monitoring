<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment_sameh extends Model
{
    public function Region_point()
    {
        return $this->hasOne('App\Region_point','id','point_id');
    }
    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    protected $fillable = [
        'id','value', 'point_id','user_id','created_at'
    ];
}
