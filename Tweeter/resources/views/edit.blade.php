@extends('layouts.app')

@section('title')
Edit Tweet
@endsection

@section('content')

@foreach ($tweets as $tweet)
    <p>{{$tweet->tweet}}</p>
    <p>{{$tweet->users_name}}</p>

    <form action="/edit/{{$tweet->id}}" method="post">
        @csrf
        <input type="hidden" name="author" value="{{ Auth::user()->name }}">
        <textarea name="content" value="Content" style="width: 30vw; height: 20vh; display: block; resize: none;"></textarea>
        <input type="submit" value="Edit Tweet">
</form>

@endforeach

@endsection
