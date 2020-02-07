<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    protected $table = 'relations';

    function User() {
        return $this->belongsTo('App\Users');
    }

}
