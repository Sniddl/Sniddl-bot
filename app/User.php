<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Posts()
    {
        return $this->hasMany('App\Post');
    }

    /*public function Reposts()
    {
        return $this->hasMany('App\Repost');
    }*/

    public function Friends()
    {
        return $this->hasMany('App\Friend');
    }

    public function Reposts()
    {
        return $this->hasMany('App\Repost');
    }

}
