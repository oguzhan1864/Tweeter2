<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'users_id', 'tweets_id', 'gif'];

    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    public function tweet()
    {
        return $this->belongsTo('App\Tweets');
    }
}
