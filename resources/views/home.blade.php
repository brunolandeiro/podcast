@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if(session('status'))
              <p>{{session('status')}}</p>
          @endif
            <div class="card">
                <div class="card-body">
                  @foreach ($podcasts->chunk(6) as $chunk)
                      <div class="row">
                          @foreach ($chunk as $podcast)
                          <div class="col-md-2">
                            <a href="{{route('podcast', ['id' => $podcast->id])}}" >
                              <div class="card hover zoom">
                                <img class="card-img-top " src="{{$podcast->image}}" alt="{{$podcast->title}}">
                                <div class="card-img-overlay bg-dark escondido">
                                  <p class="card-text text-light block-with-text">{{$podcast->description}}</p>
                                </div>
                              </div>
                            </a>
                            <p><a href="{{route('podcast', ['id' => $podcast->id])}}" >{{$podcast->title}}</a></p>
                          </div>
                          @endforeach
                      </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$(".hover").mouseenter(function(){
    $(this).find('.card-img-overlay').fadeIn();
});

$(".hover").mouseleave(function(){
    $(this).find('.card-img-overlay').fadeOut();
});
});
</script>
@endsection
