<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    function User() {
        return $this->belongsTo('App\Users');
    }

}
