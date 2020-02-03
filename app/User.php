<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * var array
     *
     */
    public function group()
    {
        return $this->belongsTo('App\Group','group_id','id');
    }
    public function role()
    {
        return $this->belongsTo('App\Role','role_id','id');
    }
    public function region_point()
    {
        return $this->belongsTo('App\Region_point','point_id','id');
    }

    protected $fillable = [
        'id','name', 'password','username','role_id','group_id','point_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'username_verified_at' => 'datetime',
    ];
}
