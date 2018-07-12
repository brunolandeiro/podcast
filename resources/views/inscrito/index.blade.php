@extends('layouts.app')
@section('content')
<div class="container">
    @foreach(auth::user()->feeds as $feed)
        <p>{{$feed->title}}</p>
    @endforeach
</div>

<div class="container">
    @foreach($rss as $r)
    <p>{{$r->pubDate}} - {{$r->title}}</p>
    @endforeach
</div>
@endsection
