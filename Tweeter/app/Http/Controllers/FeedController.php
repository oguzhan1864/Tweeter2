<?php

namespace App\Http\Controllers;

use App\Tweets;
use Illuminate\Http\Request;
use Auth;
use DB;

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
            return redirect('/feed');
    }

    public function deleteTweet($id)
    {
        $tweet = \App\Tweets::find($id);
        $tweet->delete();

        $result = \App\Tweets::all();
            return redirect('/feed');
    }

    public function editTweet(Request $request, $id)
    {
        $tweet = \App\Tweets::find($id);
        $tweet->content = $request->content;
        $tweet->save();

        $result = \App\Tweets::find($id);
            return redirect('/edit');
    }

}
