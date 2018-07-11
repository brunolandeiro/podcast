<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertInicial extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:InsertInicial';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insere primeiro usuario e feeds permanentes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try{
            $usuario['name'] = "Bruno Landeiro";
            $usuario['email'] = "landeiro.b@gmail.com";
            $usuario['password'] = "$2y$10$2Z4cTsWfSNFFTPhuHA7Fke9XukV.CtsHUNoeD2zjzh7s8SnkJUonq";
            \App\User::firstOrCreate($usuario);
            printf("\nUsuario criado com sucesso\n");
        }catch(\Exception $e){
            printf("\nERRO ao inserir usuario:\n");
            printf("    ".$e->getMessage());
        }

        try{
            $destaque['nome'] = "#OPodcastÉDelas";
            \App\Destaques::firstOrCreate($destaque);
            $destaque['nome'] = "Podcasts em destaque";
            \App\Destaques::firstOrCreate($destaque);
            printf("\nDestaques criados com sucesso\n");
        }catch(\Exception $e){
            printf("\nERRO ao inserir destaques:\n");
            printf("    ".$e->getMessage());
        }

        try {
            $feed[0] = ['http://feeds.feedburner.com/mamilos?format=xml', 'Mamilos', 'O Mamilos - Jornalismo de peito aberto, é um podcast semanal que busca nas redes sociais os temas mais debatidos (polêmicos) e traz para mesa um aprofundamento do assunto com empatia, respeito, bom humor e tolerância. Apresentamos os diversos argumentos e visões para que os ouvintes formem opinião com mais embasamento. \n\nNosso programa vai ao ar todas as sextas final do dia. Confira em: www.mamilos.b9.com.br', 'http://i1.sndcdn.com/avatars-000165271095-pr5z0v-original.png', 1];

            $feed[1] = ['https://jovemnerd.com.br/feed-nerdcast/', 'NerdCast', 'O mundo vira piada no Jovem Nerd', 'https://jovemnerd.com.br/wp-content/themes/jovemnerd/assets/images/nc-feed.jpg',2];

            $feed[2] = ['http://feeds.soundcloud.com/users/soundcloud:users:2604591/sounds.rss', 'Braincast', 'Braincast é o podcast do B9.com.br, que debate a intersecção entre a criatividade, tecnologia, cultura digital, inovação e negócios.', 'http://i1.sndcdn.com/avatars-000165274025-nkgb63-original.jpg',2];

            $feed[3] = ['http://feeds.feedburner.com/mupoca?format=xml', 'Mupoca', 'O espírito livre da Família B9 discute "semanalmente" comportamento, tecnologia, atualidades e variedades como se estivéssemos todos numa grande mesa de boteco. Uma verdadeira busca pelo conhecimento para responder a maior questão da humanidade: o que é Mupoca?', 'http://i1.sndcdn.com/avatars-000395607525-egr3h8-original.jpg',0];

            $feed[4] = ['https://www.naosalvo.com.br/podcast/feed.xml', 'Não Ouvo', 'O podcast do Não Salvo!!!', 'http://i.imgur.com/d85kORW.jpg',2];

            $feed[5] = ['https://www.naosalvo.com.br/podcast/rebobinando/feed.xml', 'Rebobinando | Não Salvo', 'O podcast de Cultura Pop da família Não Salvo!', 'https://is4-ssl.mzstatic.com/image/thumb/Music128/v4/48/89/57/48895792-6e10-9ab8-3382-2a0a1e4f0276/source/600x600bb.jpg',0];

            $feed[6] = ['http://www.spreaker.com/show/2929970/episodes/feed', 'Papo Torto', 'Muito infotenimento, discussões sobre cultura pop e a vida moderna com PC Siqueira e Gus Lanzetta.\r\n\r\n--\r\n\r\nPC Siqueira e Gus Lanzeta em conversas que passam da filosofia a memórias sobre brinquedos antigos sem esforço algum. Com irreverência e um módico de substância os dois comentam desde acontecimentos recentes, filmes, jogos e músicas como ideologias, questões existencias e respondem dúvidas dos ouvintes.\r\n\r\nSiga o PC: @pecesiqueira\r\nSiga o Gus: @GusLanzeta\r\n\r\nProduzido, gravado e editado por:\r\nGomidia.net // Danilo Santana (@dansantanasilva)', 'http://d3wo5wojvuv7l.cloudfront.net/t_rss_itunes_square_1400/images.spreaker.com/original/f61b149569faf57fd623c73f9e4cce98.jpg',2];

            $feed[7] = ['https://hipsters.tech/feed/podcast/', 'Hipsters Ponto Tech', 'Discussões acaloradas sobre startups, programação, ux, gadgets e as últimas tendências em tecnologia.', 'https://hipsters.tech/wp-content/uploads/2016/07/hipsters-logo.png',0];

            $feed[8] = ['http://feeds.feedburner.com/anticastdesign?format=xml', 'AntiCast', 'Podcast sobre política, história, artes e qualquer outra forma de subversão. ', 'http://i1.sndcdn.com/avatars-000368640926-hoi3nl-original.jpg',0];

            $feed[9] = ['http://feeds.feedburner.com/naruhodopodcast?format=xml', 'Naruhodo', 'Naruhodo! é o podcast pra quem tem fome de aprender. Ciência, senso comum, curiosidades e muito mais. Com o leigo curioso, Ken Fujioka, e o cientista PhD, Altay de Souza.', 'http://i1.sndcdn.com/avatars-000251495151-39b1a2-original.jpg',0];

            $feed[10] = ['https://feeds.soundcloud.com/users/soundcloud:users:159815029/sounds.rss', 'Caixa de Histórias', 'O Caixa de histórias é um podcast literário que pretende lhe dar uma experiência diferenciada na apreciação dos livros.\nSempre um trecho da obra é narrado e comentado buscando apresentar novas obras pras novos leitores, e mostrando uma nova forma de consumir o conteúdo escrito.\n\nManda um recado pra gente:\ncaixadehistorias@b9.com.br\n\nAssine nosso feed:\nhttp://feeds.soundcloud.com/users/soundcloud:users:159815029/sounds.rss', 'http://i1.sndcdn.com/avatars-000230175388-d8b0tb-original.jpg',0];

            $feed[11] = ['https://www.naosalvo.com.br/podcast/seeufossevoce/feed.xml', 'Se Eu Fosse Você | Não Salvo', 'Se Eu Fosse Você | Não Salvo', 'https://naosalvo.com.br/podcast/seeufossevoce/logosefvc.jpg',0];

            $feed[12] = ['https://feeds.soundcloud.com/users/soundcloud:users:444996678/sounds.rss', 'Histórias de Ninar para Garotas Rebeldes', 'Um podcast de contos de fadas sobre as mulheres extraordinárias que nos inspiram. Em parceria com Bradesco, “Histórias de Ninar para Garotas Rebeldes” é baseado no best-seller escrito por Elena Favilli e Francesca Cavallo, inspirando milhões de garotas a sonhar grande, mirar distante e lutar com bravura. \n\nCopyright © 2018 Timbuktu Labs, Inc.', 'http://i1.sndcdn.com/avatars-000442119222-fcuxtv-original.jpg', 1];
            $feed[13] = ['http://feeds.feedburner.com/feitoporelaspodcast?format=xml', 'Feito por Elas', 'Podcast by AntiCast', 'http://i1.sndcdn.com/avatars-000242760603-sfblsu-original.jpg', 1];
            $feed[14] = ['http://hodorcavalo.com.br/feed/', 'Hodor Cavalo', 'Podcast sobre As Crônicas de Gelo & Fogo', 'http://hodorcavalo.com.br/wp-content/uploads/2018/07/hodor-capa.jpg', 1];
            foreach($feed as $f){
                $feed_array['url'] = $f[0];
                $feed_array['title'] = $f[1];
                $feed_array['description'] = $f[2];
                $feed_array['image'] = $f[3];
                $feed_array['destaque'] = $f[4];
                \App\feed::firstOrCreate($feed_array);
            }
            printf("\nFeeds cadastrados com sucesso\n");
        } catch (\Exception $e) {
            printf("\nERRO ao cadastrar feeds\n");
            printf("    ".$e->getMessage());
        }

    }
}
