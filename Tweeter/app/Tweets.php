<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Tweet extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    public function likes()
    {
        return $this->hasMany('App\Likes');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function getLikedByUserAttribute()
    {
        $id = Auth::id();
        $like = $this->likes->first(function ($row) use ($id) {
            return $row->user_id === $id;
        });

        if ($like) return true;
        return false;

    }

    public function attachment()
    {
        return $this->hasOne('App\Attachment');
    }

    public function path()
    {
        return '/tweets/' . $this->id;
    }
}
