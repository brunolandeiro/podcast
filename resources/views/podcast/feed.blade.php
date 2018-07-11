@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top " src="{{$podcast->image}}" alt="{{$podcast->title}}">
                <div class="card-body">
                    <h4 class="card-title">{{$podcast->title}}</h4>
                    <p class="card-text">{{$podcast->description}}</p>
                    <a href="#" class="btn btn-primary">Assinar</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @if(session('status'))
            <p>{{session('status')}}</p>
            @endif
            <ul class="list-group">
                 @foreach($rss->channel->item as $item)
                 <li class="list-group-item">
                     <button type="button" class="btn btn-outline-primary btn-circle" data-audio="{{$item->enclosure['url']}}" data-type="{{$item->enclosure['type']}}"><i class="fa fa-play"></i></button>
                     {{$item->title}}
                 </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>




@endsection
