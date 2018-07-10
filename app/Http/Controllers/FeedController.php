<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedController extends Controller
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
        return view('feed.index');
    }

    public function cadastrar(Request $request)
    {
        try {
            $feed  = file_get_contents($request->url);
            $rss = simplexml_load_string($feed);
            if($rss===FALSE){
                return redirect('feed')->with('status', 'url Invalida');
            }else{
                $img = $rss->channel->image->url ? $rss->channel->image->url : "https://static.wixstatic.com/media/18ee34_c8eb233909b74e40a388607b20047e9d~mv2_d_1250_1250_s_2.png";
                $data['url'] = $request->url;
                $data['title'] = $rss->channel->title;
                $data['description'] = $rss->channel->description;
                $data['image'] = $img;
                \App\Feed::create($data);
                return redirect('feed')->with('status', 'Feed cadastrado com sucesso!');
            }
        }
        catch (\Exception $e) {
            return redirect('feed')->with('status', $e->getMessage());
        }
    }
}
