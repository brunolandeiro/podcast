@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <p>{{session('status')}}</p>
            @endif
            <div class="card">
                <div class="card-header">{{$podcast->title}}</div>
                <div class="card-body">
                <ul class="list-group">
                    <?php $cont = 0; ?>
                    @foreach($rss->channel->item as $item)
                    <li class="list-group-item">
                      <p>{{$item->title}}</p>
                      <audio controls>
                        <source src="{{$item->enclosure['url']}}" type="{{$item->enclosure['type']}}">
                          <source src="{{$item->enclosure['url']}}" type="{{$item->enclosure['type']}}">
                            Your browser does not support the audio element.
                          </audio>
                    </li>
                    <?php $cont++;
                      if($cont >= 5)
                        break
                    ?>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
