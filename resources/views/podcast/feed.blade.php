@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top " src="{{$podcast->image}}" alt="{{$podcast->title}}">
                <div class="card-body">
                    <h4 class="card-title">{{$podcast->title}}</h4>
                    @if($ja_e_assinante)
                        <a href="{{route('assinar',['id'=>$podcast->id])}}" class="btn btn-danger">Deixar de Assinar</a>
                    @else
                        <a href="{{route('assinar',['id'=>$podcast->id])}}" class="btn btn-primary">Assinar</a>
                    @endif
                    <br><br><p class="card-text"><?php echo description_decode($podcast->description)?></p>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            @if(session('status'))
            <p>{{session('status')}}</p>
            @endif
            <ul class="list-group">
                <div class="player">

                </div>
                @foreach($rss->channel->item as $item)
                <li class="list-group-item">
                    <button type="button" class="btn btn-outline-primary btn-circle play" data-audio="{{$item->enclosure['url']}}" data-type="{{$item->enclosure['type']}}" data-title="{{$item->title}}"><i class="fa fa-play"></i></button>
                    <span>{{$item->title}}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script src="{{ asset('js/player.js') }}"></script>
@endsection
