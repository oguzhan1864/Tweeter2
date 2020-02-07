@extends('layouts.app')

@section('content')
    <div style="margin-left: 10vw" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tweeter</div>
                    @guest
                        <p>Please login!</p>

                        @else
                        <div style="margin-left: 5vw">
                            <p>Welcome {{ Auth::user()->name }} !</p>
                            <br>
                            <div>
                                <form action="/addTweet" method="post">
                                    @csrf
                                    <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                                    <textarea name="content" value="Content" style="width: 30vw; height: 20vh; display: block; resize: none;"></textarea>
                                    <input type="submit" value="Create Tweet">
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

@endsection
