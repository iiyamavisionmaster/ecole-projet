-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Juillet 2017 à 19:23
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_marmiton`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_modification` datetime DEFAULT NULL,
  `text` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `estimed_time_dish` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `image_id`, `date_creation`, `date_modification`, `text`, `title`, `user_id`, `estimed_time_dish`, `product_id`) VALUES
(1, 1, 1, '2017-07-17 01:49:38', '2017-07-17 01:49:38', '<p>les ommelette</p>', 'recette pompette', 2, '1', NULL),
(2, 2, 2, '2017-07-18 19:16:55', '2017-07-18 19:16:55', '<p>_stage_ preparez votre melange _/stage_</p>\n<p>_subStage_ ajouter - test1 - L _/subStage_</p>\n<p>_subStage_ saupoudrez - test2 - mL _/subStage_</p>\n<p>_textSubStage_ letape 1 est facile _/textSubStage_</p>\n<p>_stage_ cuir votre pate _/stage_</p>\n<', 'Pate feuilleté', 2, '1', NULL),
(3, 3, 3, '2017-07-19 00:49:22', '2017-07-19 00:49:22', '<div>_stage_ preparer les patate _/stage_</div>\n<div>_subStage_ couper - 65 g - test1 _/subStage_</div>\n<div>_subStage_ ajouter - 65 g - test2 _/subStage_</div>\n<div>_stage_ cuir _/stage_</div>\n<div>_textSubStage_ ajoutez les au four', 'Patate au four', 2, '1', NULL),
(4, 4, 4, '2017-07-19 20:13:32', '2017-07-19 20:13:32', '<div>Avec ou sans machine &agrave; pain (MAP, pour les initi&eacute;s), r&eacute;alisez &agrave; la maison des brioches moelleuses &agrave; souhait, gr&acirc;ce aux recettes de brioches faciles de nos lecteurs. Brioche tress&eacute;e, brioche au beurre, au chocolat ou petits brioches nomades&nbsp;: quelle que soit la recette choisie, cette viennoiserie &agrave; p&acirc;te lev&eacute;e vous r&eacute;galera au petit d&eacute;jeuner ou au go&ucirc;ter. Vous n\'avez pas le temps de patienter quelques heures avant d\'enfourner votre brioche&nbsp;? Optez pour une recette de brioche rapide&nbsp;: une seule pousse de la p&acirc;te &agrave; brioche est n&eacute;cessaire. Go&ucirc;tez &eacute;galement aux brioches des r&eacute;gions en confectionnant &agrave; la maison de savoureux kouglof, pogne, brioche nantaise ou encore g&acirc;che vend&eacute;enne.</div>', 'Brioches maison', 2, '1', NULL),
(5, 5, 5, '2017-07-19 20:21:21', '2017-07-19 20:21:21', '<div>&nbsp;</div>\r\n<div>_stage_ PR&Eacute;PARATION _/stage_</div>\r\n<div>_subStage_ Mettre la levure de boulanger et le sel dans une tasse. D&eacute;layer les 2 composants dans un peu d\'eau ti&egrave;de. - 239 g - farine _/subStage_</div>\r\n<div>_textSubStage_ Reprendre la p&acirc;te et la p&eacute;trir sur un plan farin&eacute;. Fa&ccedil;onner la p&acirc;te &agrave; pain et disposer le pain sur une planche farin&eacute;e allant au four. Recouvrir de nouveau le pain avec le linge et laisser reposer pendant environ 1 heure. _/textSubStage_</div>\r\n<div>_stage_ Pour finir _/stage_</div>\r\n<div>_subStage_ Pr&eacute;chauffer le four &agrave; 175&deg;C. Le pain aura de nouveau gonfl&eacute;. Avant de mettre au four, faire des entailles sur le pain. Laisser cuire pendant 40 minutes. Quand le pain est cuit, le retourner pour qu\'il ne soit pas humide en dessous. - 239 g - farine _/subStage_</div>', 'Pain : la meilleure recette', 2, '1', NULL),
(6, 6, 6, '2017-07-19 20:43:48', '2017-07-19 20:43:48', '<div>&eacute;couvrez la recette de Tortilla au poulet pan&eacute;.</div>', 'Tortilla au poulet pané', 2, '1', NULL),
(7, 7, 7, '2017-07-19 22:58:05', '2017-07-19 22:58:05', '<div>&nbsp;</div>\r\n<div>_stage_ tortillia test _/stage_</div>\r\n<div>_subStage_ il faut une tortilla - 272 g - four _/subStage_</div>\r\n<div>_textSubStage_ et c\'est presque fini _/textSubStage_</div>\r\n<div>_stage_ cuir tortilla test _/stage_</div>\r\n<div>_textSubStage_ cuir a 280 _/textSubStage_</div>', 'Je suis un test', 2, '1', NULL),
(8, 8, 8, '2017-07-19 22:58:55', '2017-07-19 22:58:55', '<div>test2</div>', 'Je suis un test 2', 2, '1', NULL),
(9, 9, 9, '2017-07-20 01:06:36', '2017-07-20 01:06:36', '<div>ajax</div>', 'post test reveiw', 2, '1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `article_comments`
--

CREATE TABLE `article_comments` (
  `article_id` int(11) NOT NULL,
  `comments_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_comments`
--

INSERT INTO `article_comments` (`article_id`, `comments_id`) VALUES
(1, 1),
(2, 2),
(2, 4),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `article_ratings`
--

CREATE TABLE `article_ratings` (
  `article_id` int(11) NOT NULL,
  `ratings_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_ratings`
--

INSERT INTO `article_ratings` (`article_id`, `ratings_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(7, 10),
(7, 11);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `tagName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `tagName`) VALUES
(1, 'divers,omelette'),
(2, 'pate,feuiletté'),
(3, 'patate,four'),
(4, 'brioche,farine,gache'),
(5, 'pain,pate'),
(6, 'tortilla'),
(7, 'divers'),
(8, 'divers'),
(9, 'divers,tortilla');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `text`) VALUES
(1, 2, '<p>cool</p>'),
(2, 2, '<p>tr&eacute;s cool comme pate</p>'),
(3, 2, '<div>cool</div>'),
(4, 2, '<div>Yannice est un gros con</div>');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `Name`) VALUES
(1, 'test1'),
(2, 'test2'),
(3, 'test1'),
(4, 'test2');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `picture`
--

INSERT INTO `picture` (`id`, `updated_at`, `name`, `path`) VALUES
(1, '2017-07-17 01:49:38', '314591_1118538608.jpg', '0101bb7a26a852e0348e451b5355b078e33e7f71.jpeg'),
(2, '2017-07-18 19:16:55', 'pate-feuilletee-inversee.jpg', '9c47f787d6af55d69654a68420a39b80b174611f.jpeg'),
(3, '2017-07-19 00:49:22', 'ob_10074d_dsc0118.jpg', 'be349953ca9d762baebedf92356a84671e7642aa.jpeg'),
(4, '2017-07-19 20:13:32', '10003540_1470181702.jpg', 'daf8afc6c69f1bc32eddf5110ce981fedb83d39a.jpeg'),
(5, '2017-07-19 20:21:21', '302862_1228190729.jpg', 'b581b3bfb430afd8372484819a50d5030b641572.jpeg'),
(6, '2017-07-19 20:43:48', '360741_7897023514.jpg', '43b3e5264f515e3d04637f8e9c2827ddf95a54ca.jpeg'),
(7, '2017-07-19 22:58:05', 'Fast_food_meal.jpg', 'fbf26bf3858b5939271deaf9cdc6c0d4808bfac4.jpeg'),
(8, '2017-07-19 22:58:55', 'healthy-fast-food-subway.jpg', '7e605bc49d31640ce1fee9b3089a2598c1d501c4.jpeg'),
(9, '2017-07-20 01:06:36', 'vos-amis-prennent-en-photo-leur-nourriture-ils-ont-peut-etre-un-probleme-psychologique1.jpg', 'bdc309b21adf2284778f9909329821d37713c512.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ratings`
--

INSERT INTO `ratings` (`id`, `rating`, `user_Id`) VALUES
(1, 5, 2),
(2, 4, 2),
(3, 3, 2),
(4, 1, 2),
(5, 2, 2),
(6, 3, 2),
(7, 4, 2),
(8, 4, 2),
(9, 1, 2),
(10, 4, 2),
(11, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `facebookId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebookAccessToken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `facebookId`, `facebookAccessToken`) VALUES
(1, 'ayoub.belkadi@gmail.com', 'ayoub.belkadi@gmail.com', 'ayoub.belkadi@gmail.com', 'ayoub.belkadi@gmail.com', 1, NULL, '1415124578573416', '2017-07-19 23:12:08', NULL, NULL, 'a:0:{}', '1415124578573416', 'EAAbLK4HSsWoBACOatfRvG2OokYYBdiuEsqArrFaJcLtZCgMNn0bYTDzcPSc7KjSVZAViuRRezXOdWZB73I4tleZAhzMDpGIWIkVcY9mAGbweABOD000eEU6Gfpi1ZChn4f0z8m0iQtVMZBZCi8FoW7g9CZArxKQHpZBEIQZCmcsOgrILP9GfXNUZALJ'),
(2, 'iiyamavision', 'iiyamavision', 'belkad_a@etna-alternance.net', 'belkad_a@etna-alternance.net', 1, 'WZs3IMTP4R1FE8hvCy24H8WEpbjE5p6TZXHGtpBlL3U', 'tUrg6JB9eZutGve6/ZWVaBzi3QzIicu9wnHTUNsBV5zhWQgqgsuVHm/0p6gdXsfujCY6O0LQliMP4JRaAkkDPQ==', '2017-07-20 19:09:57', NULL, NULL, 'a:0:{}', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BFDD316812469DE2` (`category_id`),
  ADD KEY `IDX_BFDD31683DA5256D` (`image_id`),
  ADD KEY `IDX_BFDD31684584665A` (`product_id`);

--
-- Index pour la table `article_comments`
--
ALTER TABLE `article_comments`
  ADD PRIMARY KEY (`article_id`,`comments_id`),
  ADD KEY `IDX_A7662417294869C` (`article_id`),
  ADD KEY `IDX_A76624163379586` (`comments_id`);

--
-- Index pour la table `article_ratings`
--
ALTER TABLE `article_ratings`
  ADD PRIMARY KEY (`article_id`,`ratings_id`),
  ADD KEY `IDX_2364437E7294869C` (`article_id`),
  ADD KEY `IDX_2364437E957CE84F` (`ratings_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_497B315E92FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_497B315EA0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_497B315EC05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_BFDD316812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_BFDD31683DA5256D` FOREIGN KEY (`image_id`) REFERENCES `picture` (`id`),
  ADD CONSTRAINT `FK_BFDD31684584665A` FOREIGN KEY (`product_id`) REFERENCES `ingredient` (`id`);

--
-- Contraintes pour la table `article_comments`
--
ALTER TABLE `article_comments`
  ADD CONSTRAINT `FK_A76624163379586` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A7662417294869C` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `article_ratings`
--
ALTER TABLE `article_ratings`
  ADD CONSTRAINT `FK_2364437E7294869C` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2364437E957CE84F` FOREIGN KEY (`ratings_id`) REFERENCES `ratings` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
