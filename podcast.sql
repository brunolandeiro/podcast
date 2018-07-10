-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jul-2018 às 19:09
-- Versão do servidor: 5.7.14
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podcast`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `feed`
--

CREATE TABLE `feed` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `feed`
--

INSERT INTO `feed` (`id`, `url`, `title`, `description`, `image`) VALUES
(1, 'http://feeds.feedburner.com/mamilos?format=xml', 'Mamilos', 'O Mamilos - Jornalismo de peito aberto, é um podcast semanal que busca nas redes sociais os temas mais debatidos (polêmicos) e traz para mesa um aprofundamento do assunto com empatia, respeito, bom humor e tolerância. Apresentamos os diversos argumentos e visões para que os ouvintes formem opinião com mais embasamento. \n\nNosso programa vai ao ar todas as sextas final do dia. Confira em: www.mamilos.b9.com.br', 'http://i1.sndcdn.com/avatars-000165271095-pr5z0v-original.png'),
(2, 'https://jovemnerd.com.br/feed-nerdcast/', 'NerdCast', 'O mundo vira piada no Jovem Nerd', 'https://jovemnerd.com.br/wp-content/themes/jovemnerd/assets/images/nc-feed.jpg'),
(3, 'http://feeds.soundcloud.com/users/soundcloud:users:2604591/sounds.rss', 'Braincast', 'Braincast é o podcast do B9.com.br, que debate a intersecção entre a criatividade, tecnologia, cultura digital, inovação e negócios.', 'http://i1.sndcdn.com/avatars-000165274025-nkgb63-original.jpg'),
(4, 'http://feeds.feedburner.com/mupoca?format=xml', 'Mupoca', 'O espírito livre da Família B9 discute "semanalmente" comportamento, tecnologia, atualidades e variedades como se estivéssemos todos numa grande mesa de boteco. Uma verdadeira busca pelo conhecimento para responder a maior questão da humanidade: o que é Mupoca?', 'http://i1.sndcdn.com/avatars-000395607525-egr3h8-original.jpg'),
(5, 'https://www.naosalvo.com.br/podcast/feed.xml', 'Não Ouvo', 'O podcast do Não Salvo!!!', 'http://i.imgur.com/d85kORW.jpg'),
(6, 'https://www.naosalvo.com.br/podcast/rebobinando/feed.xml', 'Rebobinando | Não Salvo', 'O podcast de Cultura Pop da família Não Salvo!', 'https://is4-ssl.mzstatic.com/image/thumb/Music128/v4/48/89/57/48895792-6e10-9ab8-3382-2a0a1e4f0276/source/600x600bb.jpg'),
(7, 'http://www.spreaker.com/show/2929970/episodes/feed', 'Papo Torto', 'Muito infotenimento, discussões sobre cultura pop e a vida moderna com PC Siqueira e Gus Lanzetta.\r\n\r\n--\r\n\r\nPC Siqueira e Gus Lanzeta em conversas que passam da filosofia a memórias sobre brinquedos antigos sem esforço algum. Com irreverência e um módico de substância os dois comentam desde acontecimentos recentes, filmes, jogos e músicas como ideologias, questões existencias e respondem dúvidas dos ouvintes.\r\n\r\nSiga o PC: @pecesiqueira\r\nSiga o Gus: @GusLanzeta\r\n\r\nProduzido, gravado e editado por:\r\nGomidia.net // Danilo Santana (@dansantanasilva)', 'http://d3wo5wojvuv7l.cloudfront.net/t_rss_itunes_square_1400/images.spreaker.com/original/f61b149569faf57fd623c73f9e4cce98.jpg'),
(8, 'https://hipsters.tech/feed/podcast/', 'Hipsters Ponto Tech', 'Discussões acaloradas sobre startups, programação, ux, gadgets e as últimas tendências em tecnologia.', 'https://hipsters.tech/wp-content/uploads/2016/07/hipsters-logo.png'),
(9, 'http://feeds.feedburner.com/anticastdesign?format=xml', 'AntiCast', 'Podcast sobre política, história, artes e qualquer outra forma de subversão. ', 'http://i1.sndcdn.com/avatars-000368640926-hoi3nl-original.jpg'),
(10, 'http://feeds.feedburner.com/naruhodopodcast?format=xml', 'Naruhodo', 'Naruhodo! é o podcast pra quem tem fome de aprender. Ciência, senso comum, curiosidades e muito mais. Com o leigo curioso, Ken Fujioka, e o cientista PhD, Altay de Souza.', 'http://i1.sndcdn.com/avatars-000251495151-39b1a2-original.jpg'),
(11, 'https://feeds.soundcloud.com/users/soundcloud:users:159815029/sounds.rss', 'Caixa de Histórias', 'O Caixa de histórias é um podcast literário que pretende lhe dar uma experiência diferenciada na apreciação dos livros.\nSempre um trecho da obra é narrado e comentado buscando apresentar novas obras pras novos leitores, e mostrando uma nova forma de consumir o conteúdo escrito.\n\nManda um recado pra gente:\ncaixadehistorias@b9.com.br\n\nAssine nosso feed:\nhttp://feeds.soundcloud.com/users/soundcloud:users:159815029/sounds.rss', 'http://i1.sndcdn.com/avatars-000230175388-d8b0tb-original.jpg'),
(12, 'https://www.naosalvo.com.br/podcast/seeufossevoce/feed.xml', 'Se Eu Fosse Você | Não Salvo', 'Se Eu Fosse Você | Não Salvo', 'https://naosalvo.com.br/podcast/seeufossevoce/logosefvc.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2018_07_05_164852_create_feed_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bruno Landeiro', 'landeiro.b@gmail.com', '$2y$10$ZpJFFoDBvHaoAHIMg.QNg.ZylqgDq.zmQpdbz.pDDdE.vxFPZvCl6', NULL, '2018-07-10 19:23:07', '2018-07-10 19:23:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feed_url_unique` (`url`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
