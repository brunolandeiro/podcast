@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <p>{{session('status')}}</p>
            @endif
            <div class="card">
                <div class="card-header">Entre com o Feed do podcast!</div>
                <div class="card-body">
                    <form action="{{route('cadastrar_feed')}}" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="url" value="" placeholder="https://meupodcast.com.br/feed/" required><br>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="button">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
