-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 04 Février 2016 à 14:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mcqcm`
--
CREATE DATABASE IF NOT EXISTS `mcqcm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mcqcm`;

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `question_id` bigint(20) unsigned NOT NULL,
  `choices` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `answer_unique` (`session_id`,`user_id`,`question_id`),
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=21 ;

--
-- Contenu de la table `answers`
--

INSERT INTO `answers` (`id`, `session_id`, `user_id`, `question_id`, `choices`) VALUES
(1, 1, 1, 45, 'a:4:{i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;}'),
(2, 1, 1, 46, 'a:7:{i:5;i:1;i:14;i:1;i:15;i:1;i:16;i:0;i:37;i:1;i:38;i:1;i:39;i:0;}'),
(3, 1, 1, 47, 'a:7:{i:6;i:1;i:17;i:1;i:18;i:1;i:19;i:0;i:40;i:1;i:41;i:1;i:42;i:0;}'),
(4, 1, 1, 48, 'a:7:{i:7;i:1;i:20;i:0;i:21;i:0;i:22;i:0;i:43;i:0;i:44;i:0;i:45;i:0;}'),
(5, 1, 1, 49, 'a:7:{i:8;i:1;i:23;i:0;i:24;i:0;i:25;i:0;i:46;i:0;i:47;i:0;i:48;i:0;}'),
(6, 1, 1, 50, 'a:7:{i:9;i:0;i:26;i:0;i:27;i:1;i:28;i:0;i:49;i:0;i:50;i:0;i:51;i:0;}'),
(7, 1, 1, 51, 'a:7:{i:10;i:1;i:29;i:0;i:30;i:0;i:31;i:0;i:52;i:0;i:53;i:0;i:54;i:0;}'),
(8, 1, 1, 52, 'a:7:{i:11;i:0;i:32;i:0;i:33;i:0;i:34;i:0;i:55;i:0;i:56;i:1;i:57;i:0;}'),
(9, 1, 1, 53, 'a:6:{i:12;i:1;i:35;i:0;i:36;i:0;i:58;i:0;i:59;i:0;i:60;i:0;}'),
(10, 1, 1, 54, 'a:4:{i:13;i:1;i:61;i:0;i:62;i:0;i:63;i:0;}'),
(11, 1, 2, 45, 'a:4:{i:1;i:1;i:2;i:0;i:3;i:0;i:4;i:0;}'),
(12, 1, 2, 46, 'a:7:{i:5;i:1;i:14;i:1;i:15;i:1;i:16;i:0;i:37;i:1;i:38;i:1;i:39;i:0;}'),
(13, 1, 2, 47, 'a:7:{i:6;i:1;i:17;i:1;i:18;i:1;i:19;i:0;i:40;i:1;i:41;i:1;i:42;i:0;}'),
(14, 1, 2, 48, 'a:7:{i:7;i:0;i:20;i:0;i:21;i:0;i:22;i:1;i:43;i:0;i:44;i:0;i:45;i:0;}'),
(15, 1, 2, 49, 'a:7:{i:8;i:1;i:23;i:0;i:24;i:0;i:25;i:0;i:46;i:0;i:47;i:0;i:48;i:0;}'),
(16, 1, 2, 50, 'a:7:{i:9;i:0;i:26;i:0;i:27;i:1;i:28;i:0;i:49;i:0;i:50;i:0;i:51;i:0;}'),
(17, 1, 2, 51, 'a:7:{i:10;i:1;i:29;i:0;i:30;i:0;i:31;i:0;i:52;i:0;i:53;i:0;i:54;i:0;}'),
(18, 1, 2, 52, 'a:7:{i:11;i:1;i:32;i:0;i:33;i:0;i:34;i:0;i:55;i:0;i:56;i:0;i:57;i:0;}'),
(19, 1, 2, 53, 'a:6:{i:12;i:1;i:35;i:0;i:36;i:0;i:58;i:0;i:59;i:0;i:60;i:0;}'),
(20, 1, 2, 54, 'a:4:{i:13;i:1;i:61;i:0;i:62;i:0;i:63;i:0;}');

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_true` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=64 ;

--
-- Contenu de la table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `title`, `is_true`, `is_active`) VALUES
(1, 45, 'Number. ', 1, 1),
(2, 45, 'Integer et Float. ', 0, 1),
(3, 45, 'Number et Double. ', 0, 1),
(4, 45, 'Number et Integer.', 0, 1),
(5, 46, 'Asynchronous JavaScript and XML.  ', 1, 1),
(6, 47, 'node.firstChild.nextSibling  ', 1, 1),
(7, 48, 'window.onload = init; ', 1, 1),
(8, 49, 'Quand l''arbre DOM a été construit et toutes les ressources chargées (images, ...). ', 1, 1),
(9, 50, 'C''est un attribut qui n''est pas spécifié dans le DOM, mais qui est plutôt bien supporté par les navigateurs modernes. ', 1, 1),
(10, 51, 'Oui, avec Node.COMMENT_NODE ', 1, 1),
(11, 52, 'C''est une boucle infinie qu''on peut arrêter avec une condition. ', 1, 1),
(12, 53, 'alert(Math.floor(2.9)); ', 1, 1),
(13, 54, 'Oui, à condition d''avoir initialisé les variables en amont ', 1, 1),
(14, 46, 'Advanced JavaScript with XMLHttpRequest.  ', 0, 1),
(15, 46, 'JavaScript extensible.  ', 0, 1),
(16, 46, 'Rien, c’est juste une suite de lettres sans aucune signification. ', 0, 1),
(17, 47, 'node.firstChild  ', 0, 1),
(18, 47, 'node.previousSibling.parentNode   ', 0, 1),
(19, 47, 'node.lastChild.previousSibling ', 0, 1),
(20, 48, 'window.onload = init(); ', 0, 1),
(21, 48, 'window.onload() = init; ', 0, 1),
(22, 48, 'window.onload() = init(); ', 0, 1),
(23, 49, 'Dès que le navigateur commence à recevoir le code HTML. ', 0, 1),
(24, 49, 'Quand le code HTML a fini d''être chargé. ', 0, 1),
(25, 49, 'Quand l''arbre DOM a été construit. ', 0, 1),
(26, 50, 'C''est un attribut spécifié dans le DOM. ', 0, 1),
(27, 50, 'C''est un attribut qui n''est supporté que par Internet Explorer. ', 0, 1),
(28, 50, 'C''est un attribut qui ne fonctionne pas le vendredi. ', 0, 1),
(29, 51, 'Non, ce n''est pas possible  ', 0, 1),
(30, 51, 'Oui, avec document.body.commentaries  ', 0, 1),
(31, 51, 'Oui, avec node.nodeType évalué à 7 ', 0, 1),
(32, 52, 'On obtient la valeur undefined ', 0, 1),
(33, 52, 'On obtient la valeur null ', 0, 1),
(34, 52, 'Il ne se passe rien ! Mais j''ai triché pour répondre : J''ai essayé de le faire ! ', 0, 1),
(35, 53, 'alert(Math.max(-4, 3)); ', 0, 1),
(36, 53, 'var i = 3; alert(i++); ', 0, 1),
(37, 46, 'Advanced JavaScript with XMLHttpRequest.  ', 0, 1),
(38, 46, 'JavaScript extensible.  ', 0, 1),
(39, 46, 'Rien, c’est juste une suite de lettres sans aucune signification. ', 0, 1),
(40, 47, 'node.firstChild  ', 0, 1),
(41, 47, 'node.previousSibling.parentNode   ', 0, 1),
(42, 47, 'node.lastChild.previousSibling ', 0, 1),
(43, 48, 'window.onload = init(); ', 0, 1),
(44, 48, 'window.onload() = init; ', 0, 1),
(45, 48, 'window.onload() = init(); ', 0, 1),
(46, 49, 'Dès que le navigateur commence à recevoir le code HTML. ', 0, 1),
(47, 49, 'Quand le code HTML a fini d''être chargé. ', 0, 1),
(48, 49, 'Quand l''arbre DOM a été construit. ', 0, 1),
(49, 50, 'C''est un attribut spécifié dans le DOM. ', 0, 1),
(50, 50, 'C''est un attribut qui n''est supporté que par Internet Explorer. ', 0, 1),
(51, 50, 'C''est un attribut qui ne fonctionne pas le vendredi. ', 0, 1),
(52, 51, 'Non, ce n''est pas possible  ', 0, 1),
(53, 51, 'Oui, avec document.body.commentaries  ', 0, 1),
(54, 51, 'Oui, avec node.nodeType évalué à 7 ', 0, 1),
(55, 52, 'On obtient la valeur undefined ', 0, 1),
(56, 52, 'On obtient la valeur null ', 0, 1),
(57, 52, 'Il ne se passe rien ! Mais j''ai triché pour répondre : J''ai essayé de le faire ! ', 0, 1),
(58, 53, 'alert(Math.max(-4, 3)); ', 0, 1),
(59, 53, 'var i = 3; alert(i++); ', 0, 1),
(60, 53, 'alert(parseInt(''3'')); ', 0, 1),
(61, 54, 'Non, la boucle n''est pas initialisée ', 0, 1),
(62, 54, 'Oui, sans problème ', 0, 1),
(63, 54, 'Non, on ne peut pas se servir de deux compteurs à la fois ', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `creator_id` bigint(20) unsigned NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`creator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=55 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `creator_id`, `title`) VALUES
(1, 1, 'Comment peut-on sélectionner les images d''une largeur de 300 pixels ?'),
(2, 1, 'Comment peut-on sélectionner les deux premiers titres <h3> d''une page ?  '),
(3, 1, 'Comment peut-on empêcher l''exécution d''un lien cliqué ?'),
(4, 1, 'Comment peut-on ajouter la classe .actif sur un élément <li> si celle-ci n''est pas présente ?'),
(5, 1, 'Comment peut-on modifier la couleur de fond de la page dynamiquement en jaune doré ?'),
(6, 1, 'Comment peut-on fixer la largeur d''un paragraphe à la moitié de sa largeur initiale (bloc occupant toute la place disponible) ?'),
(7, 1, 'Quelle est la meilleure façon de modifier le texte d''un bouton de validation de formulaire ?  '),
(8, 1, 'Comment peut-on faire disparaître un élément de façon animée et rapide ?  '),
(9, 1, 'Comment peut-on déployer verticalement un paragraphe, puis une seconde après réduire son opacité de moitié ?'),
(10, 1, 'Comment peut-on parcourir uniquement les éléments <div> contenant un titre   <h2> ?  '),
(11, 1, 'Comment peut-on définir un même gestionnaire d''événement au clic et au focus sur une image ?'),
(12, 1, 'Quelle est la meilleure façon de dupliquer sur la page l''élément portant l''id #test ?  '),
(13, 1, 'Comment peut-on copier l''alternative texte des images de la page dans leur attribut titre ? (Pratique déconseillée en terme d''accessibilité)'),
(14, 1, 'Comment peut-on cocher le premier bouton radio d''un formulaire ?'),
(15, 1, 'Comment peut-on ajouter un texte en bas de document avant la fin de l''élément <body> ?'),
(16, 1, 'A partir d''un jeu d''éléments, comment peut-on sélectionner uniquement ceux qui ne sont pas de type <span> ?  '),
(17, 1, 'Comment peut-on déclarer un nouveau plug-in pour jQuery ?'),
(18, 1, 'Comment peut-on charger dans un élément portant l''id #cible présent sur la page, l''élément #liste d''une page externe ''resultats.html''  ?'),
(19, 1, 'Comment peut-on effectuer une requête Ajax de type XML sur un script PHP ?  '),
(20, 1, 'Comment affiche-t-on dans la console le retour texte d''un appel Ajax s''étant bien déroulé ?  '),
(21, 1, 'Quels éléments sont obligatoires dans un document XHTML ?'),
(22, 1, 'Quelle balise n''a jamais existé (ni en HTML, ni en XHTML) ?'),
(23, 1, 'Quel attribut doit obligatoirement posséder la balise <map> ?'),
(24, 1, 'Quels sont les différents doctypes valides XHTML 1.0 ?'),
(25, 1, 'Dans quels cas, Internet Explorer 6 ne va-t-il pas passer en mode Quirks ?'),
(26, 1, 'Quelle écriture est recommandée en XHTML ?'),
(27, 1, 'Quelle balise n''est pas auto-fermante ?'),
(28, 1, 'Quelles versions de Internet Explorer interprêteront le code suivant ? <!--[if gte IE 5.5000]> <div>code pour IE</div> <![endif]-->'),
(29, 1, 'Comment spécifier correctement la langue d''un élément en XHTML 1.0 ?'),
(30, 1, 'Comment déclarer un code JavaScript de façon valide en XHTML ?'),
(31, 1, 'Quel est le rapport entre Java et JavaScript ?'),
(32, 1, 'Laquelle de ces syntaxes est correcte ?'),
(33, 1, 'Quel attribut des noeuds de l''arbre DOM correspond à l''attribut (X)HTML class ?'),
(34, 1, 'Dans un fichier JavaScript externe (.js), il faut :'),
(35, 1, 'Lequel de ces types d''événements n''existe pas ?'),
(36, 1, 'Quelle méthode n''existe pas dans le DOM ?'),
(37, 1, 'Laquelle de ces propositions est un nom de variable valide en JavaScript ?'),
(38, 1, 'Dans une boucle, l''instruction continue permet de :'),
(39, 1, 'var iNum = 12; iNum %= 2; A la suite de cette expression, combien vaut iNum ?'),
(40, 1, 'Quelle méthode permet de comparer deux chaînes texte ?'),
(41, 1, 'Quels sont les types de nombres définis en JavaScript ?'),
(42, 1, 'Que signifie l''acronyme AJAX ?'),
(43, 1, 'Quel est l''équivalent pour un noeud de l''arbre DOM de  node.childNodes[1] (en supposant que le noeud demandé existe) ?'),
(44, 1, 'Quelle syntaxe est correcte pour que la fonction init soit appelée au chargement de la page ?'),
(45, 1, 'Quels sont les types de nombres définis en JavaScript ?'),
(46, 1, 'Que signifie l''acronyme AJAX ?'),
(47, 1, 'Quel est l''équivalent pour un noeud de l''arbre DOM de  node.childNodes[1] (en supposant que le noeud demandé existe) ?'),
(48, 1, 'Quelle syntaxe est correcte pour que la fonction init soit appelée au chargement de la page ?'),
(49, 1, 'Quand l''événement ''load'' se déclenche-t-il pour une page ?'),
(50, 1, 'Que peut-on dire de l''attribut innerHTML ?'),
(51, 1, 'Peut-on accéder aux commentaires d''un document (X)HTML ?'),
(52, 1, 'for(; ; ) { ... } Que se passe-t-il avec cette instruction ?'),
(53, 1, 'Lequel de ces codes n’affichera pas 3 ?'),
(54, 1, 'for(; iI < iJ; iI++, iJ--) { ... } Est-il possible d''écrire une boucle de cette forme ?');

-- --------------------------------------------------------

--
-- Structure de la table `quizs`
--

CREATE TABLE IF NOT EXISTS `quizs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `creator_id` bigint(20) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`creator_id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `quizs`
--

INSERT INTO `quizs` (`id`, `creator_id`, `date_created`, `title`, `description`, `slug`, `is_active`) VALUES
(1, 1, '2016-02-08 00:00:00', 'jQuery débutant', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio doloremque esse minima, autem facere, ullam nesciunt voluptatem molestiae earum inventore perferendis porro explicabo hic nisi! Ad veniam, itaque inventore!', '', 1),
(2, 1, '2016-02-08 00:00:00', 'jQuery moyen', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio doloremque esse minima, autem facere, ullam nesciunt voluptatem molestiae earum inventore perferendis porro explicabo hic nisi! Ad veniam, itaque inventore!', '', 1),
(3, 1, '2016-02-08 00:00:00', 'XHTML difficile', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio doloremque esse minima, autem facere, ullam nesciunt voluptatem molestiae earum inventore perferendis porro explicabo hic nisi! Ad veniam, itaque inventore!', '', 1),
(4, 1, '2016-02-08 00:00:00', 'JavaScript / DOM débutant', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio doloremque esse minima, autem facere, ullam nesciunt voluptatem molestiae earum inventore perferendis porro explicabo hic nisi! Ad veniam, itaque inventore!', '', 1),
(5, 1, '2016-02-08 00:00:00', 'CSS3 moyen', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio doloremque esse minima, autem facere, ullam nesciunt voluptatem molestiae earum inventore perferendis porro explicabo hic nisi! Ad veniam, itaque inventore!', '', 1),
(6, 1, '2016-02-08 00:00:00', 'Web Mobile', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio doloremque esse minima, autem facere, ullam nesciunt voluptatem molestiae earum inventore perferendis porro explicabo hic nisi! Ad veniam, itaque inventore!', '', 1),
(7, 1, '2016-02-08 00:00:00', 'JavaScript / DOM moyen', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio doloremque esse minima, autem facere, ullam nesciunt voluptatem molestiae earum inventore perferendis porro explicabo hic nisi! Ad veniam, itaque inventore!', '', 1),
(8, 1, '2016-02-08 00:00:00', 'JavaScript / DOM difficile', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat odio doloremque esse minima, autem facere, ullam nesciunt voluptatem molestiae earum inventore perferendis porro explicabo hic nisi! Ad veniam, itaque inventore!', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quizskills`
--

CREATE TABLE IF NOT EXISTS `quizskills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` bigint(20) unsigned NOT NULL,
  `skill_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `quizs__questions`
--

CREATE TABLE IF NOT EXISTS `quizs__questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quiz_id` bigint(20) unsigned NOT NULL,
  `question_id` bigint(20) unsigned NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `quiz_question_unique` (`quiz_id`,`question_id`),
  KEY `quiz_id` (`quiz_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=21 ;

--
-- Contenu de la table `quizs__questions`
--

INSERT INTO `quizs__questions` (`id`, `quiz_id`, `question_id`, `is_active`) VALUES
(1, 7, 45, 1),
(2, 7, 46, 1),
(3, 7, 47, 1),
(4, 7, 48, 1),
(5, 7, 49, 1),
(6, 7, 50, 1),
(7, 7, 51, 1),
(8, 7, 52, 1),
(9, 7, 53, 1),
(10, 7, 54, 1),
(11, 1, 1, 1),
(12, 1, 2, 1),
(13, 1, 3, 1),
(14, 1, 4, 1),
(15, 1, 5, 1),
(16, 1, 6, 1),
(17, 1, 7, 1),
(18, 1, 8, 1),
(19, 1, 9, 1),
(20, 1, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `quiz_id` bigint(20) unsigned NOT NULL,
  `date_start` datetime NOT NULL,
  `date_stop` datetime DEFAULT NULL,
  `score` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `quiz_id`, `date_start`, `date_stop`, `score`) VALUES
(1, 1, 7, '2016-02-03 00:00:00', '2016-02-04 00:00:00', 60),
(2, 1, 7, '2016-02-02 00:00:00', '2016-02-03 00:00:00', 77),
(3, 2, 7, '2016-02-01 00:00:00', '2016-02-02 00:00:00', 44),
(4, 2, 1, '2016-02-02 00:00:00', '2016-02-03 00:00:00', 37),
(5, 3, 7, '2016-02-01 00:00:00', '2016-02-02 00:00:00', 88);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag` (`tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `tag`) VALUES
(12, 'css'),
(11, 'html'),
(13, 'javascript'),
(14, 'jquery'),
(15, 'php'),
(1, 'tag1'),
(10, 'tag10'),
(2, 'tag2'),
(3, 'tag3'),
(4, 'tag4'),
(5, 'tag5'),
(6, 'tag6'),
(7, 'tag7'),
(8, 'tag8'),
(9, 'tag9'),
(16, 'xhtml');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_time` datetime NOT NULL,
  `cookie` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=104 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `date_created`, `email`, `username`, `first_name`, `last_name`, `password`, `role`, `is_active`, `token`, `token_time`, `cookie`) VALUES
(1, '2002-07-11 18:46:59', 'test@test.dev', 'Laurence89', 'Marianne', 'Merle', '$2y$10$p91gpCVj1HSco2nB5LUJxePmctjMjVzZOwFjYQpkz15I1lNaGZPKi', '', 1, '', '0000-00-00 00:00:00', ''),
(2, '2001-12-14 01:24:44', 'Adele83@yahoo.fr', 'Nicolas.Alexandrie', 'Jean', 'Leblanc', '$2y$10$7KdVl7wXOnPR6OaR3zl4EuHA.CC0Ilq7X/jPaHkLFIv2RnyE2de3m', '', 1, '', '0000-00-00 00:00:00', ''),
(3, '1982-04-01 14:39:00', 'Neveu.Pierre@dbmail.com', 'Caroline.Roy', 'François', 'Laurent', '$2y$10$OeYGFqEI3o0qCwGBiuEGguCstrtdm5YixRoWZO5OGcuCaPcHsuGyO', '', 1, '', '0000-00-00 00:00:00', ''),
(4, '1991-07-17 05:14:45', 'Josephine39@voila.fr', 'Bernard.Adelaide', 'Gilbert', 'Meunier', '$2y$10$ClmsUMhb44b9hLWfrqnymuTq95YcLK6pkDA75ujYjFZ2mmlWyFFfO', '', 1, '', '0000-00-00 00:00:00', ''),
(5, '1979-08-18 12:13:06', 'Clerc.Lucie@voila.fr', 'Pons.Renee', 'Noël', 'Petitjean', '$2y$10$EBZEdqOpRvCkA9.RbgWVMetqTFyYi8EeBSWrhhjnNmeZ.yM85Crn.', '', 1, '', '0000-00-00 00:00:00', ''),
(6, '2011-02-15 19:45:00', 'fGuillon@orange.fr', 'jMichel', 'Olivier', 'Cohen', '$2y$10$7dIha/.FURcgche0DJfD.O7Yz.Zc72eRCcLzDWECAatrDRHocOgci', '', 1, '', '0000-00-00 00:00:00', ''),
(7, '1995-11-25 04:16:17', 'aRodrigues@orange.fr', 'Pauline.Ollivier', 'Bernard', 'Lecomte', '$2y$10$RuqQKTYMetmAbbRNmne1../frqQrRx5XnNAOTf6.rNZ3qOvIrW8mm', '', 1, '', '0000-00-00 00:00:00', ''),
(8, '2009-11-18 02:07:26', 'Ledoux.Arthur@dbmail.com', 'Mary.Pauline', 'David', 'Fouquet', '$2y$10$I.yAmmxob6QzcPBUouM01ub.ZD4vS.dKMnmV.M.holEOyCZUc1z5K', '', 1, '', '0000-00-00 00:00:00', ''),
(9, '2007-12-22 14:05:20', 'hLecomte@hotmail.fr', 'Anastasie69', 'Joseph', 'Fournier', '$2y$10$wKJT9JY6xczvnDOndoahZOX.F07YdwGp9bSpjzO4CKSLzgeKfMk2u', '', 1, '', '0000-00-00 00:00:00', ''),
(10, '1986-07-31 12:59:32', 'dLegros@wanadoo.fr', 'Colas.Gabriel', 'Daniel', 'Chauvet', '$2y$10$RudIE/cEQVwgM5u4srD5eO66nZIOEFrEq1dNuL0yzHf5gTfjfFQdS', '', 1, '', '0000-00-00 00:00:00', ''),
(11, '2006-12-28 18:07:13', 'Isaac.Marques@hotmail.fr', 'Francois.Julien', 'Claudine', 'Michaud', '$2y$10$0J1GU7GSQSJI7EV69KCaIuBZ0lNrVkG6fvBZpOrrJctP/qbTKAMpO', '', 1, '', '0000-00-00 00:00:00', ''),
(12, '2005-04-12 20:56:07', 'Diallo.Danielle@live.com', 'xRenard', 'Adélaïde', 'Le Gall', '$2y$10$nXNsKpiyrAUvD2VIVLHDTOLe1VEamrsjZvRVmav4U9aFJp6tJq1QW', '', 1, '', '0000-00-00 00:00:00', ''),
(13, '1971-04-05 11:15:09', 'Charles56@sfr.fr', 'Ines94', 'Capucine', 'Masse', '$2y$10$.AJmqFVEFTz5PXi/90awb.kzLe52K.LmJ8MdOdDODeowQkBoJoWZu', '', 1, '', '0000-00-00 00:00:00', ''),
(14, '1978-06-02 21:47:44', 'Becker.Christelle@free.fr', 'Riou.Francois', 'Brigitte', 'Perrier', '$2y$10$OS5.NGUnID5.jE9LzTw5v.viNB1wA4aSqf6aYaasAsVh5q2OE34vW', '', 1, '', '0000-00-00 00:00:00', ''),
(15, '1974-07-28 14:59:02', 'iBonnin@sfr.fr', 'fFabre', 'Lucas', 'Lecoq', '$2y$10$Lo0rPDs9eXhEVn0w8fOKWuKePc2cUAlqlyd5amr9pb7N8WfyLeFrS', '', 1, '', '0000-00-00 00:00:00', ''),
(16, '1983-05-19 09:24:25', 'Paul.Tessier@sfr.fr', 'Marc17', 'Rémy', 'Etienne', '$2y$10$hY84IoA0Fie9CRb2HlVQruwYFKl6BQO5aOwPdF3DaxhG28ptLQRLC', '', 1, '', '0000-00-00 00:00:00', ''),
(17, '1992-04-15 01:42:54', 'Victor.Godard@sfr.fr', 'fFontaine', 'Honoré', 'Poirier', '$2y$10$3Efkiz/aPg8dslH.olWJjuWWBoED0yZPQ7bGeGPsSi0ZKtcErBkfO', '', 1, '', '0000-00-00 00:00:00', ''),
(18, '2009-06-21 01:20:50', 'Guichard.Frederic@free.fr', 'Andre.Jacqueline', 'Arthur', 'Guillot', '$2y$10$0PUE4RrJ7NFKm7mhE8L4v.WhhSyfrE6w38b62ql.mVvIvYuN9jxMu', '', 1, '', '0000-00-00 00:00:00', ''),
(19, '1978-09-25 23:24:29', 'vGuillot@noos.fr', 'Mace.Etienne', 'Hélène', 'Guillot', '$2y$10$h71JyT9ZQoCWg.ipzZfx1uCBfmNlZTLahU66ZWbZ6teaI7IFusLE6', '', 1, '', '0000-00-00 00:00:00', ''),
(20, '1995-01-10 00:27:39', 'Lucas66@laposte.net', 'cLecomte', 'Louise', 'Neveu', '$2y$10$6F1JRWdspqyezUqAv/eiueKKMoRke/UIPFbOfyAu0Alzq6.FSEJJu', '', 1, '', '0000-00-00 00:00:00', ''),
(21, '1994-12-17 16:46:53', 'Adelaide99@hotmail.fr', 'xCarlier', 'Denise', 'Moulin', '$2y$10$WV7jOGfIiF87ZL0hT8RuF.0nujFix7l1c5cC1VlyN7qlBHEiuRtLC', '', 1, '', '0000-00-00 00:00:00', ''),
(22, '2002-08-10 17:10:50', 'Chauveau.Zoe@sfr.fr', 'Marie.Baron', 'Henri', 'Vasseur', '$2y$10$fdG9/ePWRrgdIRhqmTvzAuj9epVCnYaNGkurexIsdvJPUIHjTX4j.', '', 1, '', '0000-00-00 00:00:00', ''),
(23, '2015-11-09 07:42:13', 'eHerve@live.com', 'Gilles76', 'Christophe', 'Lecoq', '$2y$10$tIy75woQdE7K/EC/tTg.d.oeK2Oaj6S9zupqXVWZFego/HeG6Q.Ca', '', 1, '', '0000-00-00 00:00:00', ''),
(24, '2007-12-15 22:45:52', 'Marcel.Antoine@orange.fr', 'Charles.Millet', 'Hortense', 'Hamel', '$2y$10$BF.7jtemoHwTTB2YgkNRl.Mu5lZ91uBC5BatqAjcE0M.rb.MXzCt.', '', 1, '', '0000-00-00 00:00:00', ''),
(25, '2015-03-07 14:21:07', 'Charles62@noos.fr', 'Imbert.Charlotte', 'Jeannine', 'Herve', '$2y$10$K0bAfKGz/qI.8wI9Fmz3H.ynm0m/MjYejgJstF.N/QVr9UHZszIya', '', 1, '', '0000-00-00 00:00:00', ''),
(26, '2006-08-09 15:03:45', 'Charles51@sfr.fr', 'Anouk.Maillet', 'Nathalie', 'Leclerc', '$2y$10$CaWx12D04X5fM.MuAYn7Tu5iDGwk3JHjr6io223Q77LJ5kUS.km2m', '', 1, '', '0000-00-00 00:00:00', ''),
(27, '1983-07-10 10:08:54', 'rFernandes@voila.fr', 'hChretien', 'Philippine', 'Gauthier', '$2y$10$g8OncEVzm4HxBP07hKcYpemKmjVd9t7VoSmc0crAZnww8JD/Kwv/m', '', 1, '', '0000-00-00 00:00:00', ''),
(28, '2008-07-04 02:20:15', 'Pineau.Eugene@live.com', 'Timothee04', 'Alexandre', 'Moreno', '$2y$10$b5jgVMCBfVLYf/HND3N4YOrd3t.Lxm9AdJD5wg5Sw15nmf4/p7cv2', '', 1, '', '0000-00-00 00:00:00', ''),
(29, '2006-08-29 19:57:38', 'Sylvie71@sfr.fr', 'Lucy36', 'Inès', 'Baudry', '$2y$10$sdx6iF74Wi0mN2wxYoJDburHcBfzJHBU1codthPs6fSCIbfcCY9We', '', 1, '', '0000-00-00 00:00:00', ''),
(30, '1991-12-06 19:46:43', 'Luc73@wanadoo.fr', 'nGirard', 'Théophile', 'Duval', '$2y$10$G8h6sTY2rmYjidjTh8G6keTbDjnPJxD0DNTAvczMFuHJ2xuSkyRaO', '', 1, '', '0000-00-00 00:00:00', ''),
(31, '1995-08-17 06:53:19', 'bJulien@yahoo.fr', 'aChauveau', 'Bernard', 'Cordier', '$2y$10$DTDTLp8w2LKLDNcZSoGiUuR3Gq8fUoqzRlDtIVcsv477azKFdPUnm', '', 1, '', '0000-00-00 00:00:00', ''),
(32, '2001-01-12 18:42:12', 'Constance16@sfr.fr', 'Julien69', 'Valentine', 'Coulon', '$2y$10$V7enCoWCWa.5cvQZAU6ttuiP/R3ODRScEnL1KTPPni4F25OQoy8xS', '', 1, '', '0000-00-00 00:00:00', ''),
(33, '1994-01-15 19:17:56', 'Munoz.Aimee@club-internet.fr', 'Adelaide.Leleu', 'Édouard', 'Lacombe', '$2y$10$ff9u/.hwLkis9nGXiWcvc.O92kD9s7YFxqNOZe7oDm7Ro.6OcEc6y', '', 1, '', '0000-00-00 00:00:00', ''),
(34, '1985-06-16 07:00:28', 'gDupre@voila.fr', 'Lacombe.Benjamin', 'Christiane', 'Roger', '$2y$10$lbbh4gJULdXCMRIZAQSdMeu3xaYR6./hspRsZV5oGWigdx.ODN8qy', '', 1, '', '0000-00-00 00:00:00', ''),
(35, '1998-06-10 22:17:27', 'Mahe.Roger@dbmail.com', 'Aurelie.Chevalier', 'Julien', 'Caron', '$2y$10$/0oAg1J0JUM6YefaZ6nGY.J1BJEjtOpsdltRrsDL/aJzL9dmWPH.C', '', 1, '', '0000-00-00 00:00:00', ''),
(36, '2004-01-09 07:30:43', 'Renee70@sfr.fr', 'Victor76', 'Pauline', 'Mace', '$2y$10$oUzK/zSpsnb2KRq9RlRB.u9yXo0x5XHTiLqBH6E.34wFNh9C0Mbau', '', 1, '', '0000-00-00 00:00:00', ''),
(37, '2011-06-09 23:03:42', 'hDumont@gmail.com', 'Zacharie.Picard', 'Christelle', 'Marechal', '$2y$10$9bi/gxYzrXZYLPPkMTqzVus/q.4Q9Gk3SCzpCygiyUBVkASSXjr36', '', 1, '', '0000-00-00 00:00:00', ''),
(38, '1973-05-26 04:13:40', 'Alexandre81@tele2.fr', 'cBoyer', 'Valérie', 'Fleury', '$2y$10$IyC4HfQm2A.sRqqO1aqS.OOkgn2YtNOj5WJ3iz7cpLYM7OPDo8z32', '', 1, '', '0000-00-00 00:00:00', ''),
(39, '2006-04-09 09:55:20', 'Philippine.Renard@tiscali.fr', 'Emile.Peltier', 'Éric', 'Bousquet', '$2y$10$TXxu6NqkIS40I6a678P41uLOzpN0eBMVkaoJzwSQc2qH1hcnZFMgu', '', 1, '', '0000-00-00 00:00:00', ''),
(40, '2013-06-27 20:21:51', 'Lemoine.Zacharie@hotmail.fr', 'Patrick98', 'Jacqueline', 'Legros', '$2y$10$BsvGU/3NA1D/HGmn7vSyvet9uKAFNKFsi8/QOaP.rUxJQ0aIfqFR6', '', 1, '', '0000-00-00 00:00:00', ''),
(41, '1991-12-03 05:06:15', 'Alexandre.Meunier@wanadoo.fr', 'Ledoux.Georges', 'Tristan', 'Evrard', '$2y$10$UvIrQXXrwe8b8f4uCxKHe.rHwoFr52rggLwVRIQCTDKgfGf83rGvi', '', 1, '', '0000-00-00 00:00:00', ''),
(42, '2015-11-21 08:50:31', 'Andree.Leveque@hotmail.fr', 'Alix.Godard', 'Nathalie', 'Maillard', '$2y$10$.8wYfwuPVZNKjnAJYoVoCemNMUl5fRQ6FTsqUavJp4LRB4br6gs9S', '', 1, '', '0000-00-00 00:00:00', ''),
(43, '1984-09-25 12:48:33', 'Suzanne.Boucher@noos.fr', 'Anais59', 'Lucy', 'Gonzalez', '$2y$10$NZWx2B7CpmMcKuVRg6jhHOoPdJUIATbW4oG44zVWQFzBf7NBjjdeC', '', 1, '', '0000-00-00 00:00:00', ''),
(44, '2015-12-17 01:04:59', 'zMillet@yahoo.fr', 'Elise74', 'René', 'Legrand', '$2y$10$ON3rrrAO6EfSV1MT91RHc.0ZCSUbh1IxpPJLCwjSgaKPh9g4jSkDG', '', 1, '', '0000-00-00 00:00:00', ''),
(45, '1992-11-22 07:59:42', 'Louise24@live.com', 'nLeblanc', 'Élisabeth', 'Riviere', '$2y$10$GppsqMfM2GmjADSMuSkIiOu0c21wR2txXKiJ3n/r4sTQIsvOH88EG', '', 1, '', '0000-00-00 00:00:00', ''),
(46, '1993-02-15 00:11:09', 'Jerome.Traore@club-internet.fr', 'fBerthelot', 'Thierry', 'Allain', '$2y$10$e4DrKPep7q/SaMfy3Xi0zeGHYOYM79zuJDgTg7mIKhjf2sxzGrg96', '', 1, '', '0000-00-00 00:00:00', ''),
(47, '1973-08-27 17:35:52', 'nMarchand@dbmail.com', 'Gilles.Maillet', 'Paulette', 'Pierre', '$2y$10$Pk1EKzoIoUJdYr.YJhPYceiIyKVOeRCGWJ2ZajBFzkfQjwcUwywbu', '', 1, '', '0000-00-00 00:00:00', ''),
(48, '1972-01-16 06:31:21', 'nBoutin@sfr.fr', 'aRamos', 'Aimé', 'Delahaye', '$2y$10$Npdo6NmT8uOe9PFNqqkzaOcSCrm2r9CUAd.TtBRzhtEc/mw7Fcx6i', '', 1, '', '0000-00-00 00:00:00', ''),
(49, '1972-04-05 07:50:02', 'Xavier.Maillot@live.com', 'Claudine47', 'Théodore', 'Charles', '$2y$10$2wfWdtcd9qwhRhKHDieXAO9o3DnO/8ux4sKcKYasuwuln2FAE4.Gi', '', 1, '', '0000-00-00 00:00:00', ''),
(50, '1987-03-23 10:32:25', 'Odette23@hotmail.fr', 'Theophile.Boulay', 'Tristan', 'Picard', '$2y$10$PZNI5exFJS9Ei7qiTfJ42Ogj9sT4O21Iye0WctGZCKRhEISU6OdZS', '', 1, '', '0000-00-00 00:00:00', ''),
(51, '2014-02-11 04:51:45', 'Martin.Germain@bouygtel.fr', 'Nath.Guillon', 'Bernadette', 'Letellier', '$2y$10$fPsvmGHl/LUq2pBq9g6z8uOz12Z4TAS6gjkO/JuG.ENcpNnwR5C7u', '', 1, '', '0000-00-00 00:00:00', ''),
(52, '2010-02-12 16:07:17', 'Blanc.Roger@laposte.net', 'Celina09', 'Aurore', 'Lacroix', '$2y$10$fmPXROFqI2FDw2uHeBjuter0X3U2ZIhB2xDnKZq4NwdBpc3LSl/KK', '', 1, '', '0000-00-00 00:00:00', ''),
(53, '1975-04-14 00:39:52', 'lDurand@dbmail.com', 'Zacharie.Pelletier', 'Corinne', 'Brun', '$2y$10$ByftxFCDQ56jQEMlU9MJ/uy70PzUFpEH94QuztzB0CVZJjkC7HsUS', '', 1, '', '0000-00-00 00:00:00', ''),
(54, '2005-12-14 21:14:19', 'mRobin@sfr.fr', 'Michele.Hoarau', 'Tristan', 'Lebon', '$2y$10$mzGM6piJ8GIyEDCCxT1bYOpbZ46A.4pgyf0PN8goIoh6m4a9DynvS', '', 1, '', '0000-00-00 00:00:00', ''),
(55, '2013-02-19 21:03:45', 'cDelmas@wanadoo.fr', 'Salmon.Tristan', 'Gilbert', 'Sanchez', '$2y$10$tjEMW9HtRv5qXMij7mSJreWmvFqVjepY3Pp/2NFe6Q8S8B52nErmi', '', 1, '', '0000-00-00 00:00:00', ''),
(56, '1990-10-02 08:37:55', 'Agnes.Dupuis@orange.fr', 'Emmanuelle99', 'Agathe', 'Bourdon', '$2y$10$88cB.Dld3asr.rnSlbrcvu0Xf7DsDpSXrGGLBT/eNRqBtJTtZy27e', '', 1, '', '0000-00-00 00:00:00', ''),
(57, '2012-03-19 09:40:02', 'cLaine@tiscali.fr', 'xDupre', 'Benjamin', 'Riviere', '$2y$10$SvY8Ay.PrFzc0dwv6moUiON669itF9ESu2oAIdnyIV8urPwh3RmOu', '', 1, '', '0000-00-00 00:00:00', ''),
(58, '1983-12-10 09:39:03', 'aCohen@club-internet.fr', 'vJoly', 'Eugène', 'Dias', '$2y$10$ZCzbrvbyf6EpfKv4DIAct.VE9H99ljgCqtdqgQv22aamaWVT0uNQW', '', 1, '', '0000-00-00 00:00:00', ''),
(59, '1978-12-21 03:23:13', 'uRoger@hotmail.fr', 'Elodie.Hoarau', 'Michelle', 'Renard', '$2y$10$u3vVl2.btF9dIpgRvs4Wl.xP1lkfCu.PzDxuVlw03V/0y4KEb2NxG', '', 1, '', '0000-00-00 00:00:00', ''),
(60, '2013-04-11 02:48:30', 'Costa.Bernadette@free.fr', 'Maurice.Eugene', 'Charlotte', 'Gonzalez', '$2y$10$v8/KCT4y/8.xgl0iFz3rLe1ldZAvIMpaA9tUiVxx.3l/gn0RHn49W', '', 1, '', '0000-00-00 00:00:00', ''),
(61, '2003-07-16 16:38:22', 'sMichel@noos.fr', 'yHubert', 'Hélène', 'Renard', '$2y$10$OPxBquoI3DGFxBJRgRoBkO5Vkxw9xLKpFCOQh.Q7Ds1Fuek7vGSQi', '', 1, '', '0000-00-00 00:00:00', ''),
(62, '1991-05-15 20:57:45', 'Jacqueline.Bonnet@dbmail.com', 'Suzanne.Rey', 'Éric', 'Clerc', '$2y$10$nEfIgWfy.rTz68Bds4tIFOtTQ7jE53MPO6HcMENEtG724/FB.m3A6', '', 1, '', '0000-00-00 00:00:00', ''),
(63, '2001-10-04 05:22:52', 'Emmanuel.Marty@laposte.net', 'Emile.Blanc', 'Caroline', 'Caron', '$2y$10$n/CJ2roW/q2Zr9.kNICP4OjZhkafIPoa56BTsqLNklOqUIHsOZvFi', '', 1, '', '0000-00-00 00:00:00', ''),
(64, '1974-01-08 12:14:02', 'Guichard.Philippe@orange.fr', 'Lucas.Dupont', 'Adélaïde', 'Bourdon', '$2y$10$BA4PRB050hE6P3iZYVArkeb/aXfovBux1tjcZiiZyCtSPk4leIVZK', '', 1, '', '0000-00-00 00:00:00', ''),
(65, '1972-05-07 13:09:59', 'David.Marcel@laposte.net', 'Chartier.Nicole', 'Anne', 'Breton', '$2y$10$IuCUYLsLJClxRVd80/joO.j6VCDf58.lLIo7YfgQPoUDVIHxD6Jy2', '', 1, '', '0000-00-00 00:00:00', ''),
(66, '2003-10-07 16:05:15', 'hCarlier@free.fr', 'Pauline.Tanguy', 'Susanne', 'Coste', '$2y$10$pmSOpXQDU20IVatOmEYSL./2K08tgTheXB2xmMRpU//zoEyjxkrlW', '', 1, '', '0000-00-00 00:00:00', ''),
(67, '2014-06-24 16:22:49', 'Edouard.Legendre@live.com', 'Michelle.Valette', 'Daniel', 'Lelievre', '$2y$10$fBSTNEVHiUnhB676Uffa/uu3sDO8X7/2nBxBQt22r3eyqpiyfsr3G', '', 1, '', '0000-00-00 00:00:00', ''),
(68, '1983-04-03 12:12:02', 'Maurice.Louis@tiscali.fr', 'Marine.Arnaud', 'Lucas', 'Roussel', '$2y$10$Y1.0KAouHR.RaMgNXUOZfuGLLaRCV/vSOZiZ8Lr74M3z6vwaX92Zu', '', 1, '', '0000-00-00 00:00:00', ''),
(69, '1994-10-20 04:49:53', 'Michelle21@dbmail.com', 'Emmanuel.Lemaitre', 'René', 'Ruiz', '$2y$10$O1BQXhAaVwo2nu7NSfKM.ejmJv4VwSIHmRFAjE2K8.AgwKb/5wtqi', '', 1, '', '0000-00-00 00:00:00', ''),
(70, '2004-03-31 15:17:26', 'xLeveque@sfr.fr', 'Susan.Garnier', 'Alex', 'Torres', '$2y$10$fDHLxwY00cMj0s3ZxE5RiOiVI9lRSgMl00jjwY9trdHsGXADflX22', '', 1, '', '0000-00-00 00:00:00', ''),
(71, '1976-12-11 19:19:58', 'Charles.Laurent@noos.fr', 'Audrey.Legros', 'Pierre', 'Marion', '$2y$10$Y88jUyETSthDPzd.yGN4T.zBRbQ5fjbzSscuYSmmJL5TRmTRW95lK', '', 1, '', '0000-00-00 00:00:00', ''),
(72, '2007-05-25 15:32:25', 'Martineau.Suzanne@tiscali.fr', 'Capucine.Mendes', 'Amélie', 'Lecomte', '$2y$10$rBezwe//mGTxza8ENrrd2.q.1E0xfEm7G4p0MbTCLw0agxSmHjKuy', '', 1, '', '0000-00-00 00:00:00', ''),
(73, '1998-06-05 19:47:51', 'Blanchard.Elisabeth@gmail.com', 'Robert96', 'Robert', 'Lemoine', '$2y$10$tzZC4xmsB3RoWS1oQ38OGe9V/FVQ3u/1.ntlwHblGORwwpNgV5s4O', '', 1, '', '0000-00-00 00:00:00', ''),
(74, '2009-12-22 17:55:40', 'Marc.Bourgeois@laposte.net', 'Brigitte63', 'Vincent', 'Neveu', '$2y$10$6Yg0pGpgZqqUMHrR05WVk.4LCerfRTLKVhowJi.O0A62yhhB9t7sC', '', 1, '', '0000-00-00 00:00:00', ''),
(75, '1985-08-17 01:48:07', 'qMorin@ifrance.com', 'Nicolas.Klein', 'Isabelle', 'Lopes', '$2y$10$FMFCoMEWkZtpBoDAfl62PujRnRCGriyBw5eqqXJOIOXTm01DsWLcu', '', 1, '', '0000-00-00 00:00:00', ''),
(76, '1997-11-30 00:51:22', 'Julien.LeGoff@ifrance.com', 'Andre.Fabre', 'Jeanne', 'Gaillard', '$2y$10$PDuXRXNLJBH79/7WzCK4b.JFtchVtPFaXsQbMhX7RviA4ztPLRG72', '', 1, '', '0000-00-00 00:00:00', ''),
(77, '1986-05-30 21:40:28', 'oPhilippe@club-internet.fr', 'bDelahaye', 'Gilbert', 'Prevost', '$2y$10$DpmWc/CXQOhCwZUc6Qk8GubFjfdDSoIoUVtm.TaX17hlx7kIa1Q2m', '', 1, '', '0000-00-00 00:00:00', ''),
(78, '1995-01-27 18:53:44', 'Mendes.Anne@club-internet.fr', 'Stephanie.Andre', 'Marthe', 'Delmas', '$2y$10$DiVcLe.2LoXoEWFoahEUMuE7go9dGXMTOQMSJUN7c/nNteKc81fSW', '', 1, '', '0000-00-00 00:00:00', ''),
(79, '2014-06-05 09:38:42', 'Marechal.Diane@wanadoo.fr', 'uGosselin', 'Caroline', 'Martineau', '$2y$10$WYcGtoXd3hyKAosEUFEg1uR4TjjXqiN.DkDLRhzwhdbfLtVSXI.sq', '', 1, '', '0000-00-00 00:00:00', ''),
(80, '2000-07-09 01:35:45', 'zHebert@dbmail.com', 'Zacharie06', 'Alice', 'Pruvost', '$2y$10$T79GOV41TmbxKIOXfcS3IOzWTWr/BpzY.tss/6d4gzuWXXsvCmdRW', '', 1, '', '0000-00-00 00:00:00', ''),
(81, '2004-09-30 20:19:42', 'pJacquet@noos.fr', 'dBertin', 'Olivier', 'Philippe', '$2y$10$Tk76oRhi18cQH/F6uw.mAOgefna8fhMVFXOyd0XycsudX9NYbLSEu', '', 1, '', '0000-00-00 00:00:00', ''),
(82, '1997-06-29 23:24:33', 'zMoreno@laposte.net', 'Cecile00', 'Colette', 'Roger', '$2y$10$tKKTBKeghLwNQ6IXOeaJ0ug6zYu/07J0/6K9LBv35csO2ZuuxcsS2', '', 1, '', '0000-00-00 00:00:00', ''),
(83, '2001-07-30 21:20:58', 'Noel.Jacquot@voila.fr', 'Martine.Mace', 'Éléonore', 'Costa', '$2y$10$5Rn9hManPI3pQhSFqb3wM.X/AiMPo0o8DkkOPUW9jTRGKSjwqbcRa', '', 1, '', '0000-00-00 00:00:00', ''),
(84, '1998-10-03 14:44:20', 'Hugues.Pons@voila.fr', 'aMonnier', 'Rémy', 'Pruvost', '$2y$10$9h82XirjG2Bp5fZSJWxv6ORhvxp3vGpB76y3Xv0R0w8XZneXCml3e', '', 1, '', '0000-00-00 00:00:00', ''),
(85, '1993-01-26 22:38:21', 'Arthur47@gmail.com', 'xAlbert', 'Thomas', 'Pierre', '$2y$10$BIyCe3hCACZDVAUVq5GfReB5TO9JsfqrZsK3i/fZd9RQpD0ihCv7O', '', 1, '', '0000-00-00 00:00:00', ''),
(86, '1974-05-14 16:11:11', 'Remy.Jeannine@dbmail.com', 'nRousset', 'Denise', 'Bousquet', '$2y$10$sKWGV42p96lyZx/LT92BCOs2Dan.iyjobILL2jGz.dtrP4Kc0T6HS', '', 1, '', '0000-00-00 00:00:00', ''),
(87, '1983-03-23 02:48:37', 'Gaillard.Henri@club-internet.fr', 'Matthieu86', 'Margaux', 'Faure', '$2y$10$kmOFe7ULK3drN87BALBCLOblC5hMiBmmsRAeWRUVlg/C7M1PZVa7y', '', 1, '', '0000-00-00 00:00:00', ''),
(88, '2014-08-25 12:22:18', 'Gallet.Emile@free.fr', 'Dumont.Etienne', 'Margot', 'Bigot', '$2y$10$I.YB9d1zxGLF95CDGcMJJ.ykGWqPV6hD97NCyyCwfJOICsiCt3CoC', '', 1, '', '0000-00-00 00:00:00', ''),
(89, '1986-04-23 01:09:34', 'Robert94@ifrance.com', 'pWagner', 'Vincent', 'Gillet', '$2y$10$kI3ZC0/LflcFegrNrLfsvO8J2FkTirzRP3i7G50HNsmWAiV4lje0e', '', 1, '', '0000-00-00 00:00:00', ''),
(90, '1992-11-01 19:20:10', 'Marcelle47@club-internet.fr', 'qMaillet', 'Dominique', 'Guerin', '$2y$10$p4/6EAkIRpkHunGXbXotcesiHBarxrMiGI4ckDx58DiDS5Y2YrGMC', '', 1, '', '0000-00-00 00:00:00', ''),
(91, '2004-08-04 09:32:58', 'Guy98@tiscali.fr', 'Paul35', 'David', 'Faure', '$2y$10$TYUZJuDP/Gs7vun0vswah.pVtMwp8bwqTdqTxHU0KCWWE6Wit7ki2', '', 1, '', '0000-00-00 00:00:00', ''),
(92, '1989-01-05 17:08:48', 'Nathalie.Lesage@hotmail.fr', 'oRenard', 'Léon', 'Picard', '$2y$10$Jzsrfnl.W7zExMatrc37FO7xe3LCfrn7Oq/vkLGPidlvM47qQ1YJm', '', 1, '', '0000-00-00 00:00:00', ''),
(93, '1982-04-08 14:00:38', 'Normand.Marianne@club-internet.fr', 'Stephane.Roche', 'Stéphane', 'Roux', '$2y$10$CcMOh3p6/TzyvAgRV/vg2e0X8nKU2RlhhSyuwTcRAGIA1DZzRvIZ6', '', 1, '', '0000-00-00 00:00:00', ''),
(94, '2008-11-28 09:49:57', 'Marcelle.Pereira@yahoo.fr', 'Chantal22', 'Jeanne', 'Charpentier', '$2y$10$OUvbwo3yYzfCwIBVl9xbnOJ3vt0x4ZVHYF7P7FcACjMJeu8b6hvP.', '', 1, '', '0000-00-00 00:00:00', ''),
(95, '2006-07-04 01:22:06', 'pVallee@bouygtel.fr', 'tCharpentier', 'Mathilde', 'Hamon', '$2y$10$9pk.xN4m/EveTFk.v7.Tp.urDo3uzITKFrL.0mZHrZUkGi8uvaE2G', '', 1, '', '0000-00-00 00:00:00', ''),
(96, '1989-02-16 07:06:03', 'cLegendre@bouygtel.fr', 'Boucher.Arthur', 'Laetitia', 'De Sousa', '$2y$10$W02JdYGqkem1kk18/ZMakucPYnUgeSp8DaJUXXDIdx2fUxZHez3Fe', '', 1, '', '0000-00-00 00:00:00', ''),
(97, '1975-06-16 02:23:40', 'Francois27@voila.fr', 'Mathilde74', 'Nicolas', 'Valentin', '$2y$10$ttl7oywJZiQs3w27cTAhUepk226TaSpIXWQ3bsQYyQJpdmg7fWq7u', '', 1, '', '0000-00-00 00:00:00', ''),
(98, '1977-01-03 18:47:39', 'Michaud.Yves@dbmail.com', 'Dupre.Emile', 'Victor', 'Marchand', '$2y$10$vjaR7l/QRdtlD8wZ0/RLDerIRa0E3CdJAOBevq/ZFeAcanbYRmi5a', '', 1, '', '0000-00-00 00:00:00', ''),
(99, '1979-09-22 21:58:02', 'rLemoine@club-internet.fr', 'cBrun', 'Arthur', 'Lagarde', '$2y$10$wxxUibnZsUPj/1iXAGx29uXoELqRY1OnOZsfGN.rIBJt3ANyKWjlK', '', 1, '', '0000-00-00 00:00:00', ''),
(100, '2002-06-24 16:28:35', 'Dumas.Aime@dbmail.com', 'Elisabeth.DaSilva', 'Valérie', 'Gonzalez', '$2y$10$bFv7Xdpq51gunGiB3oi1juU58LSWC0MAAXXuxemXFcSfa5bZ8tKOa', '', 1, '', '0000-00-00 00:00:00', ''),
(101, '2016-02-04 10:48:55', 'philip@gmail.com', '', 'Philip', 'Dang', '$2y$10$RLIklWTVeqTFtzig02PFbePNP8Q4kTwMgmLhlNi7JI5Mu1XGHbopi', 'student', 1, '', '0000-00-00 00:00:00', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Contraintes pour la table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `quizs`
--
ALTER TABLE `quizs`
  ADD CONSTRAINT `quizs_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `quizskills`
--
ALTER TABLE `quizskills`
  ADD CONSTRAINT `quizskills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `quizskills_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizs` (`id`);

--
-- Contraintes pour la table `quizs__questions`
--
ALTER TABLE `quizs__questions`
  ADD CONSTRAINT `quizs__questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizs` (`id`),
  ADD CONSTRAINT `quizs__questions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Contraintes pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
