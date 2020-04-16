<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tweet;
use App\Like;
use Storage;

class TweetController extends Controller
{
   
    public function index()
    {

        $tweets = \App\Tweet::latest()->paginate(20);
        $following = auth()->user()->following()->pluck('profile_user.profile_id')->toArray();

        return view('tweets.index', compact('tweets', 'following'));
    }

    public function list()
    {
        $tweets = \App\Tweet::latest()->get();
        return $tweets;
    }


    public function create()
    {
        return view('tweets.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data = $request->validate([
            'body'  => 'required|min:5|max:1000',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $tweet = new \App\Tweet;
        $tweet->body = $request->body;
        $tweet->image = $request->image;
        $tweet->user_id = Auth::id();
        $tweet->save();

            if ($tweet->save()) {
                return redirect($tweet->path());
            }
    }


    public function show($id)
    {
        $tweet = \App\Tweet::find($id);
        $following = $tweet->user->following->pluck('id')->toArray();

        return view('tweets.show', compact('tweet', 'following'));
    }


    public function edit($id)
    {
        $tweet = \App\Tweet::find($id);

        return view('tweets.edit', compact('tweet'));
    }

    public function update(Request $request, $id)
    {
        $tweet = \App\Tweet::find($id);
        $tweet->body = $request->body;

        if($tweet->save()) {
            return redirect('/tweets');
        }
            return back();
    }


    public function destroy($id)
    {
        $tweet = \App\Tweet::find($id)->delete();

        if($tweet){
            return redirect('/tweets');
        }
            return back();
    }

    public function tweetlist($id = 0)
    {
        $tweets = \App\Tweet::where('user_id', $id ? $id : Auth::id())->paginate(10);

        return view('user.tweetlist', compact('tweets'));
    }

    public function marketing()
    {
        return view('marketing.index');
    }

    public function like($id)
    {
        $like = new \App\like;
        $like->user_id = Auth::id();
        $like->tweet_id = $id;

        if ($like->save()) {
            return json_encode([
                'status' => 'success'
            ]);

        }
            return json_encode([
                'status' => 'failed'
            ]);
    }

    public function unLike($id)
    {
        $like = \App\Like::where('tweet_id' , $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($like->delete()) {
            return json_encode([
                'status' => 'success'
            ]);
        }
    }
}