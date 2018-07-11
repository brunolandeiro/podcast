<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function novo(){
        return view('podcast.novo');
    }

    public function cadastrar(Request $request){
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
                $podcast = \App\Feed::firstOrCreate($data);
                return redirect()->action('PodcastController@feed',['id'=>$podcast->id]);
            }
        }
        catch (\Exception $e) {
            return redirect()->action('PodcastController@novo')->with('status', 'url Invalida');
        }
    }

    public function feed($id){
      try{
        $podcast = \App\Feed::find($id);
        $feed  = file_get_contents($podcast->url);
        $rss = simplexml_load_string($feed);
        return view('podcast.feed',[],[
          'podcast' => $podcast,
          'rss' => $rss
        ]);
      }catch(\Exception $e){
        return redirect('/')->with('status', $e);
      }
    }
}
