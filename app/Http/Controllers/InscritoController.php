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
        $items_per_page = 18;
        $items = array();

        foreach($usuario->feeds as $podcast){
            $feed  = file_get_contents($podcast->url);
            $rss = simplexml_load_string($feed);
            foreach($rss->channel->item as $i){
                $item_model = new \App\Podcast;
                $item_model->url = $podcast->url;
                $item_model->title = $i->title;
                $item_model->description = mytheme_nl2p($i->description,FALSE);
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

        $pages_count = intdiv($items_sorted->count(),$items_per_page);
        $pages = array();
        for($i=1;$i<=$pages_count;$i++){
            array_push($pages, $i);
        }
        $page_final = $i;
        $pages = collect($pages);

        $page_link_i = $page-2;
        $page_link_f = $page+2;

        if($page_link_i <= 1){
            $page_link_i = 1;
            $page_link_f = 5;
        }
        if($page_link_f >= $page_final){
            $page_link_i = $page_final-4;
            $page_link_f = $page_final;
        }

        $pages_links = $pages->filter(function ($value, $key) use ($page_link_i,$page_link_f) {
            return  $value >= $page_link_i && $value <= $page_link_f;
        });

        $items_sorted = $items_sorted->forPage($page, $items_per_page);

        $page_next = ($page+1) <= $page_final? ($page+1) : $page;
        $page_previous = ($page-1) >= 1 ? ($page-1) : $page;
        return view('inscrito.index',[],[
            'usuario'=> $usuario,
            'rss' => $items_sorted,
            'pages' => $pages,
            'pages_links' => $pages_links,
            'page_final' => $page_final,
            'page' => $page,
            'page_previous' => $page_previous,
            'page_next' => $page_next,
            'active'=> activate('inscricoes')
        ]);
    }


}
