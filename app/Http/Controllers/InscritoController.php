<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class InscritoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($page = 1)
    {
        $usuario = Auth::user();
        //$item_model = \App\Podcast::find(1);

        $items = array();
        foreach($usuario->feeds as $podcast){
            $feed  = file_get_contents($podcast->url);
            $rss = simplexml_load_string($feed);
            foreach($rss->channel->item as $i){
                $item_model = new \App\Podcast;
                $item_model->url = $podcast->url;
                $item_model->title = $i->title;
                $item_model->description = $i->description;
                $item_model->image = $podcast->image;
                $item_model->audio = $i->enclosure['url'];
                $item_model->type = $i->enclosure['type'];
                $item_model->pubDate = $i->pubDate;
                $i->addAttribute('image',$podcast->image);
                array_push($items,$item_model);
            }
        }

        $items_sorted = order_by_pubDate($items);
        $items_sorted = collect($items_sorted);
        return view('inscrito.index',[],[
            'usuario'=> $usuario,
            'rss' => $items_sorted->forPage($page, 18),
            'active'=> activate('inscricoes')
        ]);
    }


    // public function paginate($items, $perPage = 15, $page = null, $options = [])
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $items = $items instanceof Collection ? $items : Collection::make($items);
    //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    // }


}
