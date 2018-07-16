<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function novo(){
        return view('podcast.novo',[],[
            'active'=> activate('cadastrar_podcast')
        ]);
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
        if(Auth::user()){
            $ja_e_assinante = \App\FeedUser::where('user_id',Auth::id())
            ->where('feed_id',$id)
            ->first();
        }else{
            $ja_e_assinante = FALSE;
        }
        return view('podcast.feed',[],[
          'podcast' => $podcast,
          'rss' => $rss,
          'ja_e_assinante' => $ja_e_assinante,
          'active' => activate('nenhum')
        ]);
      }catch(\Exception $e){
        return redirect('/')->with('status', $e->getMessage());
      }
    }

    public function assinar($id){
        if(Auth::user()){
            $ja_e_assinante =\App\FeedUser::where('user_id',Auth::id())
            ->where('feed_id',$id)
            ->first();
            if(!$ja_e_assinante){
                $data['user_id'] = Auth::id();
                $data['feed_id'] = $id;
                \App\FeedUser::create($data);
            }else{
                $ja_e_assinante->delete();
            }
            return redirect()->action('PodcastController@feed',['id'=>$id]);
        }else{
            return redirect()->route('login');
        }
    }

    public function cadastrados(){
        $podcasts = \App\Feed::paginate(6);
        return view('podcast.cadastrados',['podcasts'=>$podcasts],['active' => activate('recentes')]);
    }

    public function resultado(Request $request){
        $title = "%".$request->title."%";
        $podcasts = DB::table('feed')
                ->where('title', 'like', $title)
                ->orWhere('description','like',$title)
                ->get();
        return view('podcast.resultado',[],['podcasts'=>$podcasts,'active' => activate('recentes')]);
    }

}
