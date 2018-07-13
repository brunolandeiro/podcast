@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Episodios</h5>
                    @foreach($rss->chunk(6) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $item)
                        <div class="col-md-2">
                            <a href="#" data-toggle="modal" data-target="#{{$item->title}}">
                                <div class="card">
                                    <img class="card-img-top " src="{{$item['image']}}" alt="{{$item->title}}">
                                </div>
                                <p>{{$item->title}}</p>
                            </a>
                        </div>
                        <!-- The Modal -->
                        <div class="modal" id="{{$item->title}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$item->title}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <audio controls preload="metadata">
                                            <source src="{{$item->enclosure['url']}}" type="{{$item->enclosure['type']}}">
                                        </audio>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/hover.js') }}"></script>
@endsection
