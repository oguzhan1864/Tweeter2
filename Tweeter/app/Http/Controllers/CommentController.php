<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Tweet;
use App\User;
use Auth;
use Mail;
use App\Mail\NewComment;
use App\Jobs\SendNewCommentEmail;

class CommentController extends Controller
{

    public function create($tweets_id)
    {
        $tweet = \App\Tweet::find($tweets_id);

        return view('comments/create', compact('tweets_id', 'tweets'));
    }

    public function store(Request $request, $tweets_id)
    {
        $data = $request->all();
        $data = $request->validate([
            'body' => 'required|max:400',
        ]);

        $comment = new \App\Comment;
        $comment->body = $request->body;
        $comment->gif = $request->gif;
        $comment->tweets_id = $tweets_id;
        $comment->users_id = Auth::id();

        if ($comment->save()) {
            return back();
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $comment = \App\Comment::find($id);

        return view('comments/edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = \App\Comment::find($id);
        $comment->body = $request->body;
        $comment->gif = $request->gif;

        if ($comment->save()) {
            return redirect('tweets');
        }
        return back();
    }

    public function destroy($id)
    {
        $delete = \App\Comment::destroy($id);

        if ($delete) {
            return redirect('tweets');
        }
        return back();
    }
}