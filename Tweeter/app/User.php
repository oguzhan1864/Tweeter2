<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function tweets()
    {
        return $this->hasMany('App\Tweets');
    }


    public function likes()
    {
        return $this->hasMany('App\Likes');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function followers()
    {
        return $this->belongsToMany(Profile::class);
    }

}
