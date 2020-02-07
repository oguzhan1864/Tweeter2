<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    function Profile() {
        return $this->hasOne('App\Profile');
    }

    function Tweets() {
        return $this->hasMany('App\Tweets');
    }

    function Likes() {
        return $this->hasMany('App\Likes');
    }

    function Comments() {
        return $this->hasMany('App\COmments');
    }

    function Relations() {
        return $this->hasMany('App\Relations');
    }

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
