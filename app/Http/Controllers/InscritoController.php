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

    public function index()
    {
        $usuario = Auth::user();
        $items = array();
        foreach($usuario->feeds as $podcast){
            $feed  = file_get_contents($podcast->url);
            $rss = simplexml_load_string($feed);
            foreach($rss->channel->item as $i){
                array_push($items,$i);
            }
        }

        $items_sorted = order_by_pubDate($items);
        return view('inscrito.index',[],[
            'usuario'=> $usuario,
            'rss' => $items_sorted,
            'active'=> activate('inscricoes')
        ]);
    }


}
