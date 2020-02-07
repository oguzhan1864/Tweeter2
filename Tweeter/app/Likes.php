<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes';

    function User() {
        return $this->belongsTo('App\Users');
    }

    function Tweets() {
        return $this->belongsTo('App\Tweets');
    }

}
