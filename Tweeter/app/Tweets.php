<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    protected $table = 'tweets';

    function User() {
        return $this->belongsTo('App\Users');
    }

    function Comments() {
        return $this->hasMany('App\Comments');
    }

    function Likes() {
        return $this->hasMany('App\Likes');
    }
}
