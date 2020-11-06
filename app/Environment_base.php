<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment_base extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','point_id','user_id','piping','covered'
    ];
}
