<?php

namespace App\Http\Controllers;

use App\Tweets;
use Illuminate\Http\Request;
use Auth;

class FeedController extends Controller
{
    function feed()
    {
        if (Auth::check()) {
            $result = \App\Tweets::all();
            return view('feed', ['tweets' => $result]);
        } else {
            return view('feed');
        }

    }

    function validateNewTweet(Request $request)
    {
        if (Auth::check()) {
            $tweet = new \App\Tweets;
            $tweet->author = $request->author;
            $tweet->content = $request->content;
            $tweet->save();

            $result = \App\Tweets::all();
            return view('feed', ['tweets' => $result]);
        } else {
            return view('feed');
        }
    }

    function addTweet(Request $request)
    {
        $tweet = new \App\Tweets;
        $tweet->users_id = Auth::user()->id;
        $tweet->content = $request->content;
        $tweet->save();

        $result = \App\Tweets::all();
            return redirect('/home');
    }

    function deleteTweet(Request $request)
    {
        $tweet = new \App\Tweets;
        $tweet->tweets_id = Auth::tweet()->id;
        $tweet->content = $request->content;
        $tweet->delete();

        $result = \App\Tweets::all();
            return redirect('/home');
    }


}
