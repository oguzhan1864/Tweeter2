@extends('layouts.app')

@section('title')
Tweets
@endsection

@section('content')

@foreach ($tweets as $tweet)
    <p>{{$tweet->tweet}}</p>
    <p>{{$tweet->users_name}}</p>
    <div style="width: 75vw;">
        <p style="word-break: break-all;">{{$tweet->content}}</p>
    </div>
    <p>{{ $tweet->created_at }}</p>
    <form action="/deleteTweet/{{$tweet->id}}" method="get">
        @csrf
        <button name="id" type="submit" value="{{ $tweets }}">Delete Tweet</button>
    </form>
    <form action="/edit/{{$tweet->id}}" method="get">
        @csrf
        <button name="id" type="submit">Edit Tweet</button>
    </form>
    <br>
@endforeach

<form action="/addTweet" method="post">
    @csrf
    <input type="text" name="author" value='author'>
    <input type="text" name="content" value='tweet'>
    <input type="submit" value="Create Tweet">
</form>
@endsection
