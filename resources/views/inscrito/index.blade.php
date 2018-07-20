@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Episodios</h5>
                    <hr>
                    @foreach($rss->chunk(6) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $item)
                        <div class="col-md-2">
                            <a href="#" data-toggle="modal" data-target="#{{$item->title}}">
                                <div class="card">
                                    <img class="card-img-top " src="{{$item->image}}" alt="{{$item->title}}">
                                </div>
                                <p>{{$item->title}}</p>
                            </a>
                        </div>
                        <!-- The Modal -->
                        <div class="modal" id="{{$item->title}}">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$item->title}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <audio controls preload="metadata">
                                            <source src="{{$item->audio}}" type="{{$item->type}}">
                                        </audio>
                                        <div class="container" style="font-size: 16px;">
                                            <br>
                                            <?php echo $item->description  ?>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach

                </div>
                <div class="card-footer">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="{{route('inscricoes',['page'=>$page_previous])}}"><</a></li>
                        @foreach($pages_links as $p)
                        @if($page == $p)
                        <li class="page-item active"><a class="page-link" href="{{route('inscricoes',['page'=>$p])}}">{{$p}}</a></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{route('inscricoes',['page'=>$p])}}">{{$p}}</a></li>
                        @endif
                        @endforeach
                        <li class="page-item"><a class="page-link" href="">...</a></li>
                        @if($page == $page_final)
                        <li class="page-item active"><a class="page-link" href="{{route('inscricoes',['page'=>$page_final])}}">{{$page_final}}</a></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{route('inscricoes',['page'=>$page_final])}}">{{$page_final}}</a></li>
                        @endif
                        <li class="page-item"><a class="page-link" href="{{route('inscricoes',['page'=>$page_next])}}">></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/hover.js') }}"></script>
@endsection
