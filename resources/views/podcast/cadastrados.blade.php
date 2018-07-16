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
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="text-muted">Podcasts Cadastrados</h5>
                        </div>
                        <div class="col-md-3">
                            <form action="{{route('resultado')}}" method="post">
                                {{ csrf_field() }}
                                <div class="input-group mb-3">
                                    <input class="form-control" type="text" name="title" value="" placeholder="Buscar" required><br>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                  @foreach ($podcasts->chunk(6) as $chunk)
                      <div class="row">
                          @foreach ($chunk as $podcast)
                          <div class="col-md-2">
                            <a href="{{route('feed', ['id' => $podcast->id])}}" >
                              <div class="card hover zoom">
                                <img class="card-img-top " src="{{$podcast->image}}" alt="{{$podcast->title}}">
                                <div class="card-img-overlay bg-dark escondido">
                                  <p class="card-text text-light block-with-text">{{$podcast->description}}</p>
                                </div>
                              </div>
                            </a>
                            <p><a href="{{route('feed', ['id' => $podcast->id])}}" >{{$podcast->title}}</a></p>
                          </div>
                          @endforeach
                      </div>
                  @endforeach
                </div>
                <div class="card-footer">
                    {{$podcasts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/hover.js') }}"></script>
@endsection
