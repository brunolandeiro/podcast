<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $podcasts_destaques = \App\Feed::where('destaque',2)->get();
        $podcasts_delas = \App\Feed::where('destaque',1)->get();
        return view('home',[
            'podcasts' => $podcasts_destaques,
            'podcasts_delas' => $podcasts_delas
        ]);
    }
}
