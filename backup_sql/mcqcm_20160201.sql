-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 01 Février 2016 à 17:23
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mcqcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `choices` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

CREATE TABLE `choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_true` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `title`, `is_true`, `is_active`) VALUES
(1, 1, 'cheval noir', 1, 1),
(2, 1, 'cheval blanc', 0, 1),
(3, 1, 'cheval blanc', 0, 1),
(64, 20, 'sdfdsf', 1, 1),
(65, 20, 'succes', 1, 1),
(66, 20, 'dsfds', 0, 1),
(67, 20, 'sdfsdf', 1, 1),
(68, 21, 'ppp', 0, 1),
(69, 21, 'ppp', 0, 1),
(70, 21, 'rtrtrt', 1, 1),
(71, 21, 'ppp', 0, 1),
(72, 22, 'ppp', 0, 1),
(73, 22, 'ppp', 0, 1),
(74, 22, 'rtrtrt', 1, 1),
(75, 22, 'ppp', 0, 1),
(76, 23, 'ppp', 0, 1),
(77, 23, 'ppp', 0, 1),
(78, 23, 'rtrtrt', 1, 1),
(79, 23, 'ppp', 0, 1),
(80, 24, 'ppp', 0, 1),
(81, 24, 'ppp', 0, 1),
(82, 24, 'rtrtrt', 1, 1),
(83, 24, 'ppp', 0, 1),
(84, 25, 'sdfdrg', 1, 1),
(85, 25, 'sdfs', 0, 1),
(86, 25, 'aa', 0, 1),
(87, 25, 'sdf', 0, 1),
(88, 26, 'sdfdrg', 1, 1),
(89, 26, 'dsfd', 0, 1),
(90, 26, 'aa', 1, 1),
(91, 26, 'sdf', 0, 1),
(92, 27, 'zerjkiu', 0, 1),
(93, 27, 'hhjk', 1, 1),
(94, 27, 'ylukj', 0, 1),
(95, 27, 'jlkl', 0, 1),
(96, 28, 'mmmmmmmm', 0, 1),
(97, 28, 'ggggg', 1, 1),
(98, 28, 'mmmmm', 0, 1),
(99, 28, 'mmmmmmm', 0, 1),
(100, 2, 'joker', 1, 1),
(101, 2, 'joker', 1, 1),
(102, 2, 'batman', 0, 1),
(103, 2, 'batman', 0, 1),
(104, 30, 'joker', 1, 1),
(105, 30, 'joker', 1, 1),
(106, 30, 'batman', 0, 1),
(107, 30, 'batman', 0, 1),
(108, 31, 'ironic', 0, 1),
(109, 31, 'sdfsdf', 0, 1),
(110, 31, 'sgkuoio', 0, 1),
(111, 31, 'ironic', 1, 1),
(112, 32, 'fausse réponse', 0, 1),
(113, 32, 'vrai reponse', 1, 1),
(114, 32, 'fausse réponse', 0, 1),
(115, 32, 'vrai reponse', 1, 1),
(116, 33, 'pour ajax', 1, 1),
(117, 33, 'pour ajax', 0, 1),
(118, 33, 'pour ajax', 0, 1),
(119, 33, 'pour ajax', 0, 1),
(120, 34, 'pour ajax', 1, 1),
(121, 34, 'pour ajax', 0, 1),
(122, 34, 'pour ajax', 0, 1),
(123, 34, 'pour ajax', 0, 1),
(124, 35, 'az', 1, 1),
(125, 35, 'az', 1, 1),
(126, 35, 'az', 0, 1),
(127, 35, 'az', 0, 1),
(128, 36, 'dsf', 0, 1),
(129, 36, 'ezrfze', 1, 1),
(130, 36, 'aztgzr', 0, 1),
(131, 36, 'aze', 0, 1),
(132, 37, 'zaeoi', 0, 1),
(133, 37, 'i', 1, 1),
(134, 37, 'op', 0, 1),
(135, 37, 'oip', 0, 1),
(136, 57, 'zaeoi', 0, 1),
(137, 57, 'i', 1, 1),
(138, 57, 'op', 0, 1),
(139, 57, 'oip', 0, 1),
(140, 58, 'zaeoi', 0, 1),
(141, 58, 'i', 1, 1),
(142, 58, 'op', 0, 1),
(143, 58, 'oip', 0, 1),
(144, 59, 'zaeoi', 0, 1),
(145, 59, 'i', 1, 1),
(146, 59, 'op', 0, 1),
(147, 59, 'oip', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `creator_id`, `title`) VALUES
(1, 1, 'question1'),
(2, 1, 'klapin blanc'),
(3, 1, 'klapin blanc'),
(4, 1, 'klapin blanc'),
(5, 1, 'tortue'),
(6, 1, 'tortue'),
(7, 1, 'tortue'),
(8, 1, 'blab'),
(9, 1, 'blab'),
(10, 1, 'blab'),
(11, 1, 'VV'),
(12, 1, 'sdfsdf'),
(13, 1, 'sdfsdf'),
(14, 1, 'sdfsdf'),
(15, 1, 'sdfsdf'),
(16, 1, 'sdfsdf'),
(17, 1, 'sdfsdf'),
(18, 1, 'qsfsfsf'),
(19, 1, 'qsfsfsf'),
(20, 1, 'succes'),
(21, 1, 'trtrtrt'),
(22, 1, 'trtrtrt'),
(23, 1, 'trtrtrt'),
(24, 1, 'trtrtrt'),
(25, 1, 'qsdqsdq'),
(26, 1, 'qsdqsdq'),
(27, 1, 'oskdfodskf'),
(28, 1, 'gggggggg'),
(29, 1, 'joker'),
(30, 1, 'joker'),
(31, 1, 'ironic'),
(32, 1, 'voici une brai question'),
(33, 1, 'abc'),
(34, 1, 'abcd'),
(35, 1, 'abcde oour ajx'),
(36, 1, 'pabcdefef'),
(37, 1, 'qbdef'),
(38, 1, 'boule1'),
(39, 1, 'je boule1'),
(40, 1, 'je coule1'),
(41, 1, 'je foule1'),
(42, 1, 'je goule1'),
(43, 1, 'jean goule1'),
(44, 1, 'jean moule1'),
(45, 1, 'jean poule1'),
(46, 1, 'jean roule1'),
(47, 1, 'jean soule1'),
(48, 1, 'je boule2'),
(49, 1, 'je coule2'),
(50, 1, 'je foule2'),
(51, 1, 'je goule2'),
(52, 1, 'jean goule2'),
(53, 1, 'jean moule2'),
(54, 1, 'jean poule2'),
(55, 1, 'jean roule2'),
(56, 1, 'jean soule2'),
(57, 1, 'qbdef'),
(58, 1, 'qbdef'),
(59, 1, 'qbdef');

-- --------------------------------------------------------

--
-- Structure de la table `quizs`
--

CREATE TABLE `quizs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills_id` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `quizs`
--

INSERT INTO `quizs` (`id`, `creator_id`, `date_created`, `title`, `description`, `skills_id`, `is_active`) VALUES
(1, 1, '2016-02-15 00:00:00', 'le quiz de test', 'wsrghthzruht ukr', '', 1),
(2, 1, '2016-02-16 00:00:00', 'deux 2 quiz deux 2', 'suepr descirptio', 'dsfdf', 1),
(3, 1, '2016-02-23 00:00:00', 'test trois testies', 'srgdrgderg', 'dsrfdgrtfdg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `quizs__questions`
--

CREATE TABLE `quizs__questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `quizs__questions`
--

INSERT INTO `quizs__questions` (`id`, `quiz_id`, `question_id`, `is_active`) VALUES
(1, 1, 25, 1),
(2, 1, 30, 1),
(3, 1, 31, 1),
(4, 1, 38, 1),
(7, 1, 39, 1),
(8, 1, 40, 1),
(9, 1, 41, 1),
(10, 1, 42, 1),
(11, 1, 43, 1),
(12, 1, 44, 1),
(13, 1, 45, 1),
(14, 1, 46, 1),
(15, 1, 47, 1),
(16, 2, 47, 1),
(17, 2, 48, 1),
(18, 2, 49, 1),
(19, 2, 50, 1),
(20, 2, 51, 1),
(21, 2, 52, 1),
(22, 2, 53, 1),
(23, 2, 54, 1),
(24, 2, 55, 1),
(25, 2, 56, 1),
(26, 1, 17, 1),
(29, 3, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` datetime NOT NULL,
  `date_stop` datetime NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `date_created`, `email`, `username`, `first_name`, `last_name`, `password`, `role`, `is_active`) VALUES
(1, '2016-02-22 00:00:00', 'salut@gmail.com', 'salut', 'salutfirst', 'salutlast', 'salutpassword', '', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answer_unique` (`session_id`,`user_id`,`question_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`creator_id`);

--
-- Index pour la table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`creator_id`);

--
-- Index pour la table `quizs__questions`
--
ALTER TABLE `quizs__questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `quiz_question_unique` (`quiz_id`,`question_id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT pour la table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `quizs__questions`
--
ALTER TABLE `quizs__questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
