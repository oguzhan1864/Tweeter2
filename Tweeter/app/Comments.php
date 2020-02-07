<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';

    function User() {
        return $this->belongsTo('App\Users');
    }

    function Tweets() {
        return $this->belongsTo('App\Tweets');
    }

}
