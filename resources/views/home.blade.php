@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  @foreach ($podcasts->chunk(4) as $chunk)
                      <div class="row">
                          @foreach ($chunk as $podcast)
                          <div class="col-md-3">

                              <img class="img-thumbnail" src="{{$podcast->image}}" alt="{{$podcast->title}}" width="100%" >

                          </div>
                          @endforeach
                      </div>
                  @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
