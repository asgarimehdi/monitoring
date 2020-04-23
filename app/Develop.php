<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Develop extends Model
{
    //
    protected $fillable = [
        'id','point_id','user_id','population'
    ];
}
