-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 25 Janvier 2016 à 20:02
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mcqcm2`
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

--
-- Contenu de la table `answers`
--

INSERT INTO `answers` (`id`, `session_id`, `user_id`, `question_id`, `choices`) VALUES
(1, 1, 1, 1, 'a:5:{i:1;i:0;i:3;i:1;i:5;i:1;i:6;i:0;i:8;i:1;}'),
(2, 1, 1, 2, 'a:5:{i:10;i:1;i:12;i:1;i:13;i:1;i:14;i:1;i:15;i:1;}'),
(3, 1, 1, 3, 'a:5:{i:20;i:1;i:21;i:0;i:22;i:1;i:23;i:0;i:25;i:1;}'),
(4, 1, 1, 4, 'a:5:{i:30;i:1;i:32;i:1;i:34;i:1;i:35;i:0;i:37;i:0;}'),
(5, 1, 1, 5, 'a:5:{i:40;i:1;i:41;i:0;i:43;i:1;i:44;i:1;i:45;i:1;}'),
(6, 1, 1, 6, 'a:5:{i:51;i:0;i:53;i:1;i:54;i:1;i:55;i:1;i:56;i:1;}'),
(7, 1, 1, 7, 'a:5:{i:60;i:1;i:62;i:1;i:64;i:0;i:65;i:1;i:67;i:0;}'),
(8, 1, 1, 8, 'a:5:{i:70;i:0;i:71;i:0;i:73;i:1;i:74;i:1;i:75;i:1;}'),
(9, 1, 1, 9, 'a:5:{i:80;i:1;i:82;i:1;i:84;i:1;i:85;i:0;i:87;i:0;}'),
(10, 1, 1, 10, 'a:5:{i:91;i:0;i:92;i:0;i:93;i:0;i:94;i:1;i:95;i:1;}');

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
(1, 1, 'Texte ', 0, 1),
(3, 1, 'Texte ', 1, 1),
(5, 1, 'Texte ', 1, 1),
(6, 1, 'Texte ', 1, 1),
(8, 1, 'Texte ', 0, 1),
(10, 2, 'Texte ', 1, 1),
(12, 2, 'Texte ', 0, 1),
(13, 2, 'Texte ', 1, 1),
(14, 2, 'Texte ', 0, 1),
(15, 2, 'Texte ', 0, 1),
(20, 3, 'Texte ', 1, 1),
(21, 3, 'Texte ', 1, 1),
(22, 3, 'Texte ', 0, 1),
(23, 3, 'Texte ', 1, 1),
(25, 3, 'Texte ', 0, 1),
(30, 4, 'Texte ', 0, 1),
(32, 4, 'Texte ', 0, 1),
(34, 4, 'Texte ', 1, 1),
(35, 4, 'Texte ', 0, 1),
(37, 4, 'Texte ', 0, 1),
(40, 5, 'Texte ', 0, 1),
(41, 5, 'Texte ', 0, 1),
(43, 5, 'Texte ', 0, 1),
(44, 5, 'Texte ', 1, 1),
(45, 5, 'Texte ', 1, 1),
(51, 6, 'Texte ', 1, 1),
(53, 6, 'Texte ', 1, 1),
(54, 6, 'Texte ', 0, 1),
(55, 6, 'Texte ', 0, 1),
(56, 6, 'Texte ', 1, 1),
(60, 7, 'Texte ', 0, 1),
(62, 7, 'Texte ', 1, 1),
(64, 7, 'Texte ', 0, 1),
(65, 7, 'Texte ', 0, 1),
(67, 7, 'Texte ', 0, 1),
(70, 8, 'Texte ', 0, 1),
(71, 8, 'Texte ', 0, 1),
(73, 8, 'Texte ', 1, 1),
(74, 8, 'Texte ', 0, 1),
(75, 8, 'Texte ', 1, 1),
(80, 9, 'Texte ', 1, 1),
(82, 9, 'Texte ', 0, 1),
(84, 9, 'Texte ', 1, 1),
(85, 9, 'Texte ', 0, 1),
(87, 9, 'Texte ', 1, 1),
(91, 10, 'Texte ', 1, 1),
(92, 10, 'Texte ', 0, 1),
(93, 10, 'Texte ', 1, 1),
(94, 10, 'Texte ', 0, 1),
(95, 10, 'Texte ', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `title`) VALUES
(1, 1, 'question 1'),
(2, 1, 'question 2'),
(3, 1, 'question 3'),
(4, 1, 'question 4'),
(5, 1, 'question 5'),
(6, 1, 'question 6'),
(7, 1, 'question 7'),
(8, 1, 'question 8'),
(9, 1, 'question 9'),
(10, 1, 'question 10');

-- --------------------------------------------------------

--
-- Structure de la table `quizs`
--

CREATE TABLE `quizs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `quizs`
--

INSERT INTO `quizs` (`id`, `user_id`, `date_created`, `title`, `is_active`) VALUES
(1, 1, '2016-01-25 19:38:15', 'quiz 1', 1),
(2, 1, '2016-01-25 19:38:15', 'quiz 2', 1),
(3, 1, '2016-01-25 19:38:15', 'quiz 3', 1),
(4, 1, '2016-01-25 19:38:15', 'quiz 4', 1),
(5, 1, '2016-01-25 19:38:15', 'quiz 5', 1);

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
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 2, 1, 1),
(12, 2, 2, 1),
(13, 2, 3, 1),
(14, 2, 4, 1),
(15, 2, 5, 1),
(16, 2, 6, 1),
(17, 2, 7, 1),
(18, 2, 8, 1),
(19, 2, 9, 1),
(20, 2, 10, 1),
(21, 3, 1, 1),
(22, 3, 2, 1),
(23, 3, 3, 1),
(24, 3, 4, 1),
(25, 3, 5, 1),
(26, 3, 6, 1),
(27, 3, 7, 1),
(28, 3, 8, 1),
(29, 3, 9, 1),
(30, 3, 10, 1),
(31, 4, 1, 1),
(32, 4, 2, 1),
(33, 4, 3, 1),
(34, 4, 4, 1),
(35, 4, 5, 1),
(36, 4, 6, 1),
(37, 4, 7, 1),
(38, 4, 8, 1),
(39, 4, 9, 1),
(40, 4, 10, 1),
(41, 5, 1, 1),
(42, 5, 2, 1),
(43, 5, 3, 1),
(44, 5, 4, 1),
(45, 5, 5, 1),
(46, 5, 6, 1),
(47, 5, 7, 1),
(48, 5, 8, 1),
(49, 5, 9, 1),
(50, 5, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` datetime NOT NULL,
  `date_stop` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `quiz_id`, `date_start`, `date_stop`) VALUES
(1, 1, '2016-01-25 19:38:15', '2016-01-25 19:38:15'),
(2, 1, '2016-01-25 19:38:15', '2016-01-25 19:38:15'),
(3, 1, '2016-01-25 19:38:15', '2016-01-25 19:38:15'),
(4, 1, '2016-01-25 19:38:15', '2016-01-25 19:38:15'),
(5, 1, '2016-01-25 19:38:15', '2016-01-25 19:38:15');

-- --------------------------------------------------------

--
-- Structure de la table `sessions__users`
--

CREATE TABLE `sessions__users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `sessions__users`
--

INSERT INTO `sessions__users` (`id`, `session_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `date_created`, `email`, `first_name`, `last_name`, `password`, `role`, `is_active`) VALUES
(1, '2016-01-25 19:38:15', 'user1@gmail.fr', 'user1', 'x1', 'pass1', 'student', 1),
(2, '2016-01-25 19:38:15', 'user2@gmail.fr', 'user2', 'x2', 'pass2', 'student', 1),
(3, '2016-01-25 19:38:15', 'user3@gmail.fr', 'user3', 'x3', 'pass3', 'student', 1),
(4, '2016-01-25 19:38:15', 'user4@gmail.fr', 'user4', 'x4', 'pass4', 'student', 1),
(5, '2016-01-25 19:38:15', 'user5@gmail.fr', 'user5', 'x5', 'pass5', 'student', 1);

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
  ADD KEY `choice_id` (`question_id`);

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
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `quizs__questions`
--
ALTER TABLE `quizs__questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Index pour la table `sessions__users`
--
ALTER TABLE `sessions__users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `quizs__questions`
--
ALTER TABLE `quizs__questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `sessions__users`
--
ALTER TABLE `sessions__users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `quizs`
--
ALTER TABLE `quizs`
  ADD CONSTRAINT `quizs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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

--
-- Contraintes pour la table `sessions__users`
--
ALTER TABLE `sessions__users`
  ADD CONSTRAINT `sessions__users_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `sessions__users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
