-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 27 Janvier 2016 à 20:29
-- Version du serveur :  10.0.17-MariaDB
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

--
-- Contenu de la table `answers`
--

INSERT INTO `answers` (`id`, `session_id`, `user_id`, `question_id`, `choices`) VALUES
(1, 1, 1, 1, 'a:5:{i:1;i:0;i:2;i:1;i:3;i:0;i:5;i:1;i:7;i:1;}'),
(2, 1, 1, 2, 'a:5:{i:10;i:1;i:12;i:0;i:13;i:1;i:14;i:0;i:16;i:0;}'),
(3, 1, 1, 3, 'a:5:{i:20;i:1;i:21;i:0;i:22;i:0;i:24;i:1;i:25;i:1;}'),
(4, 1, 1, 4, 'a:5:{i:30;i:1;i:31;i:1;i:33;i:0;i:34;i:1;i:36;i:1;}'),
(5, 1, 1, 5, 'a:5:{i:41;i:1;i:43;i:1;i:45;i:0;i:47;i:1;i:49;i:0;}'),
(6, 1, 1, 6, 'a:5:{i:50;i:1;i:52;i:1;i:53;i:0;i:55;i:0;i:57;i:1;}'),
(7, 1, 1, 7, 'a:5:{i:60;i:1;i:62;i:0;i:64;i:1;i:65;i:1;i:66;i:1;}'),
(8, 1, 1, 8, 'a:5:{i:71;i:1;i:72;i:0;i:73;i:0;i:74;i:1;i:76;i:1;}'),
(9, 1, 1, 9, 'a:5:{i:81;i:1;i:83;i:0;i:85;i:1;i:87;i:1;i:88;i:1;}'),
(10, 1, 1, 10, 'a:5:{i:90;i:1;i:91;i:1;i:93;i:1;i:94;i:0;i:96;i:1;}'),
(11, 1, 1, 11, 'a:5:{i:100;i:1;i:102;i:1;i:103;i:0;i:105;i:1;i:106;i:0;}'),
(12, 1, 1, 12, 'a:5:{i:110;i:1;i:111;i:0;i:113;i:1;i:115;i:0;i:117;i:0;}'),
(13, 1, 1, 13, 'a:5:{i:120;i:0;i:122;i:0;i:123;i:1;i:125;i:1;i:126;i:1;}'),
(14, 1, 1, 14, 'a:5:{i:130;i:1;i:132;i:0;i:133;i:0;i:135;i:1;i:137;i:0;}'),
(15, 1, 1, 15, 'a:5:{i:140;i:1;i:141;i:1;i:143;i:0;i:145;i:0;i:147;i:1;}'),
(16, 1, 1, 16, 'a:5:{i:151;i:0;i:153;i:0;i:154;i:0;i:155;i:1;i:157;i:1;}'),
(17, 1, 1, 17, 'a:5:{i:160;i:1;i:161;i:0;i:163;i:0;i:164;i:1;i:166;i:1;}'),
(18, 1, 1, 18, 'a:5:{i:171;i:0;i:173;i:0;i:175;i:1;i:177;i:0;i:179;i:0;}'),
(19, 1, 1, 19, 'a:5:{i:181;i:1;i:183;i:1;i:185;i:0;i:186;i:1;i:188;i:0;}'),
(20, 1, 1, 20, 'a:5:{i:190;i:0;i:192;i:1;i:194;i:1;i:196;i:1;i:197;i:0;}'),
(21, 1, 1, 21, 'a:5:{i:200;i:0;i:202;i:1;i:203;i:1;i:204;i:1;i:205;i:0;}'),
(22, 1, 1, 22, 'a:5:{i:211;i:1;i:213;i:0;i:214;i:1;i:216;i:0;i:218;i:0;}'),
(23, 1, 1, 23, 'a:5:{i:221;i:0;i:223;i:1;i:225;i:1;i:226;i:0;i:227;i:1;}'),
(24, 1, 1, 24, 'a:5:{i:230;i:1;i:231;i:0;i:232;i:0;i:234;i:0;i:235;i:1;}'),
(25, 1, 1, 25, 'a:5:{i:240;i:0;i:242;i:1;i:243;i:0;i:245;i:0;i:247;i:0;}'),
(26, 1, 1, 26, 'a:5:{i:251;i:1;i:252;i:0;i:254;i:1;i:256;i:0;i:257;i:1;}'),
(27, 1, 1, 27, 'a:5:{i:260;i:0;i:261;i:0;i:263;i:0;i:264;i:0;i:265;i:1;}'),
(28, 1, 1, 28, 'a:5:{i:270;i:1;i:272;i:0;i:274;i:1;i:276;i:1;i:277;i:0;}'),
(29, 1, 1, 29, 'a:5:{i:280;i:1;i:282;i:0;i:284;i:0;i:285;i:1;i:287;i:0;}'),
(30, 1, 1, 30, 'a:5:{i:290;i:1;i:292;i:1;i:293;i:1;i:295;i:1;i:297;i:0;}'),
(31, 1, 1, 31, 'a:5:{i:300;i:0;i:302;i:0;i:303;i:1;i:304;i:1;i:306;i:0;}'),
(32, 1, 1, 32, 'a:5:{i:311;i:1;i:313;i:1;i:314;i:0;i:316;i:1;i:317;i:1;}'),
(33, 1, 1, 33, 'a:5:{i:320;i:1;i:321;i:0;i:322;i:0;i:323;i:1;i:324;i:1;}'),
(34, 1, 1, 34, 'a:5:{i:331;i:1;i:333;i:1;i:335;i:1;i:336;i:0;i:337;i:1;}'),
(35, 1, 1, 35, 'a:5:{i:340;i:1;i:342;i:1;i:343;i:0;i:345;i:1;i:346;i:0;}'),
(36, 1, 1, 36, 'a:5:{i:350;i:0;i:351;i:0;i:352;i:1;i:353;i:1;i:354;i:1;}'),
(37, 1, 1, 37, 'a:5:{i:360;i:0;i:361;i:0;i:362;i:1;i:363;i:0;i:365;i:0;}'),
(38, 1, 1, 38, 'a:5:{i:371;i:1;i:372;i:1;i:373;i:0;i:375;i:1;i:377;i:0;}'),
(39, 1, 1, 39, 'a:5:{i:381;i:1;i:383;i:0;i:384;i:1;i:386;i:1;i:388;i:1;}'),
(40, 1, 1, 40, 'a:5:{i:390;i:1;i:392;i:0;i:393;i:1;i:394;i:0;i:396;i:1;}'),
(41, 1, 1, 41, 'a:5:{i:400;i:0;i:401;i:0;i:403;i:1;i:405;i:1;i:406;i:1;}'),
(42, 1, 1, 42, 'a:5:{i:410;i:1;i:411;i:1;i:413;i:1;i:415;i:1;i:416;i:0;}'),
(43, 1, 1, 43, 'a:5:{i:421;i:0;i:423;i:0;i:425;i:0;i:426;i:1;i:428;i:0;}'),
(44, 1, 1, 44, 'a:5:{i:430;i:1;i:431;i:0;i:433;i:0;i:434;i:1;i:436;i:0;}'),
(45, 1, 1, 45, 'a:5:{i:441;i:1;i:442;i:1;i:443;i:0;i:444;i:1;i:446;i:1;}'),
(46, 1, 1, 46, 'a:5:{i:451;i:0;i:452;i:0;i:453;i:1;i:454;i:0;i:455;i:0;}'),
(47, 1, 1, 47, 'a:5:{i:460;i:0;i:462;i:0;i:463;i:0;i:464;i:1;i:466;i:1;}'),
(48, 1, 1, 48, 'a:5:{i:471;i:1;i:472;i:1;i:474;i:1;i:475;i:1;i:476;i:1;}'),
(49, 1, 1, 49, 'a:5:{i:480;i:1;i:481;i:0;i:483;i:0;i:484;i:1;i:486;i:0;}'),
(50, 1, 1, 50, 'a:5:{i:491;i:0;i:493;i:0;i:495;i:1;i:496;i:1;i:498;i:1;}'),
(51, 1, 1, 51, 'a:5:{i:500;i:0;i:501;i:1;i:502;i:0;i:504;i:1;i:506;i:1;}'),
(52, 1, 1, 52, 'a:5:{i:511;i:1;i:513;i:0;i:514;i:0;i:516;i:0;i:517;i:0;}'),
(53, 1, 1, 53, 'a:5:{i:521;i:0;i:522;i:0;i:523;i:1;i:525;i:0;i:526;i:0;}'),
(54, 1, 1, 54, 'a:5:{i:530;i:0;i:531;i:0;i:533;i:1;i:535;i:1;i:537;i:0;}'),
(55, 1, 1, 55, 'a:5:{i:541;i:0;i:543;i:0;i:544;i:1;i:546;i:1;i:547;i:0;}'),
(56, 1, 1, 56, 'a:5:{i:551;i:1;i:552;i:0;i:553;i:1;i:555;i:0;i:556;i:1;}'),
(57, 1, 1, 57, 'a:5:{i:561;i:0;i:563;i:0;i:564;i:0;i:565;i:1;i:567;i:0;}'),
(58, 1, 1, 58, 'a:5:{i:570;i:1;i:572;i:0;i:573;i:1;i:574;i:0;i:575;i:1;}'),
(59, 1, 1, 59, 'a:5:{i:581;i:0;i:583;i:0;i:585;i:1;i:587;i:0;i:589;i:1;}'),
(60, 1, 1, 60, 'a:5:{i:590;i:1;i:592;i:1;i:593;i:1;i:594;i:1;i:596;i:0;}');

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
(1, 1, 'Texte ', 1, 1),
(2, 1, 'Texte ', 0, 1),
(3, 1, 'Texte ', 0, 1),
(5, 1, 'Texte ', 1, 1),
(7, 1, 'Texte ', 1, 1),
(10, 2, 'Texte ', 1, 1),
(12, 2, 'Texte ', 1, 1),
(13, 2, 'Texte ', 1, 1),
(14, 2, 'Texte ', 0, 1),
(16, 2, 'Texte ', 0, 1),
(20, 3, 'Texte ', 1, 1),
(21, 3, 'Texte ', 0, 1),
(22, 3, 'Texte ', 0, 1),
(24, 3, 'Texte ', 1, 1),
(25, 3, 'Texte ', 1, 1),
(30, 4, 'Texte ', 1, 1),
(31, 4, 'Texte ', 1, 1),
(33, 4, 'Texte ', 0, 1),
(34, 4, 'Texte ', 1, 1),
(36, 4, 'Texte ', 1, 1),
(41, 5, 'Texte ', 0, 1),
(43, 5, 'Texte ', 0, 1),
(45, 5, 'Texte ', 0, 1),
(47, 5, 'Texte ', 0, 1),
(49, 5, 'Texte ', 1, 1),
(50, 6, 'Texte ', 1, 1),
(52, 6, 'Texte ', 1, 1),
(53, 6, 'Texte ', 0, 1),
(55, 6, 'Texte ', 0, 1),
(57, 6, 'Texte ', 1, 1),
(60, 7, 'Texte ', 1, 1),
(62, 7, 'Texte ', 0, 1),
(64, 7, 'Texte ', 1, 1),
(65, 7, 'Texte ', 1, 1),
(66, 7, 'Texte ', 1, 1),
(71, 8, 'Texte ', 1, 1),
(72, 8, 'Texte ', 0, 1),
(73, 8, 'Texte ', 0, 1),
(74, 8, 'Texte ', 0, 1),
(76, 8, 'Texte ', 0, 1),
(81, 9, 'Texte ', 0, 1),
(83, 9, 'Texte ', 1, 1),
(85, 9, 'Texte ', 0, 1),
(87, 9, 'Texte ', 1, 1),
(88, 9, 'Texte ', 1, 1),
(90, 10, 'Texte ', 0, 1),
(91, 10, 'Texte ', 1, 1),
(93, 10, 'Texte ', 0, 1),
(94, 10, 'Texte ', 0, 1),
(96, 10, 'Texte ', 0, 1),
(100, 11, 'Texte ', 1, 1),
(102, 11, 'Texte ', 1, 1),
(103, 11, 'Texte ', 0, 1),
(105, 11, 'Texte ', 1, 1),
(106, 11, 'Texte ', 1, 1),
(110, 12, 'Texte ', 1, 1),
(111, 12, 'Texte ', 0, 1),
(113, 12, 'Texte ', 1, 1),
(115, 12, 'Texte ', 0, 1),
(117, 12, 'Texte ', 0, 1),
(120, 13, 'Texte ', 1, 1),
(122, 13, 'Texte ', 1, 1),
(123, 13, 'Texte ', 1, 1),
(125, 13, 'Texte ', 1, 1),
(126, 13, 'Texte ', 1, 1),
(130, 14, 'Texte ', 1, 1),
(132, 14, 'Texte ', 0, 1),
(133, 14, 'Texte ', 0, 1),
(135, 14, 'Texte ', 1, 1),
(137, 14, 'Texte ', 0, 1),
(140, 15, 'Texte ', 1, 1),
(141, 15, 'Texte ', 1, 1),
(143, 15, 'Texte ', 1, 1),
(145, 15, 'Texte ', 0, 1),
(147, 15, 'Texte ', 0, 1),
(151, 16, 'Texte ', 1, 1),
(153, 16, 'Texte ', 0, 1),
(154, 16, 'Texte ', 0, 1),
(155, 16, 'Texte ', 1, 1),
(157, 16, 'Texte ', 0, 1),
(160, 17, 'Texte ', 1, 1),
(161, 17, 'Texte ', 0, 1),
(163, 17, 'Texte ', 0, 1),
(164, 17, 'Texte ', 1, 1),
(166, 17, 'Texte ', 1, 1),
(171, 18, 'Texte ', 0, 1),
(173, 18, 'Texte ', 0, 1),
(175, 18, 'Texte ', 1, 1),
(177, 18, 'Texte ', 0, 1),
(179, 18, 'Texte ', 0, 1),
(181, 19, 'Texte ', 1, 1),
(183, 19, 'Texte ', 1, 1),
(185, 19, 'Texte ', 0, 1),
(186, 19, 'Texte ', 1, 1),
(188, 19, 'Texte ', 0, 1),
(190, 20, 'Texte ', 0, 1),
(192, 20, 'Texte ', 0, 1),
(194, 20, 'Texte ', 1, 1),
(196, 20, 'Texte ', 0, 1),
(197, 20, 'Texte ', 0, 1),
(200, 21, 'Texte ', 1, 1),
(202, 21, 'Texte ', 1, 1),
(203, 21, 'Texte ', 0, 1),
(204, 21, 'Texte ', 1, 1),
(205, 21, 'Texte ', 0, 1),
(211, 22, 'Texte ', 1, 1),
(213, 22, 'Texte ', 1, 1),
(214, 22, 'Texte ', 0, 1),
(216, 22, 'Texte ', 1, 1),
(218, 22, 'Texte ', 1, 1),
(221, 23, 'Texte ', 0, 1),
(223, 23, 'Texte ', 1, 1),
(225, 23, 'Texte ', 1, 1),
(226, 23, 'Texte ', 0, 1),
(227, 23, 'Texte ', 1, 1),
(230, 24, 'Texte ', 1, 1),
(231, 24, 'Texte ', 0, 1),
(232, 24, 'Texte ', 1, 1),
(234, 24, 'Texte ', 1, 1),
(235, 24, 'Texte ', 0, 1),
(240, 25, 'Texte ', 0, 1),
(242, 25, 'Texte ', 1, 1),
(243, 25, 'Texte ', 0, 1),
(245, 25, 'Texte ', 1, 1),
(247, 25, 'Texte ', 1, 1),
(251, 26, 'Texte ', 1, 1),
(252, 26, 'Texte ', 0, 1),
(254, 26, 'Texte ', 1, 1),
(256, 26, 'Texte ', 0, 1),
(257, 26, 'Texte ', 1, 1),
(260, 27, 'Texte ', 1, 1),
(261, 27, 'Texte ', 1, 1),
(263, 27, 'Texte ', 0, 1),
(264, 27, 'Texte ', 0, 1),
(265, 27, 'Texte ', 0, 1),
(270, 28, 'Texte ', 1, 1),
(272, 28, 'Texte ', 0, 1),
(274, 28, 'Texte ', 1, 1),
(276, 28, 'Texte ', 1, 1),
(277, 28, 'Texte ', 0, 1),
(280, 29, 'Texte ', 1, 1),
(282, 29, 'Texte ', 0, 1),
(284, 29, 'Texte ', 0, 1),
(285, 29, 'Texte ', 1, 1),
(287, 29, 'Texte ', 1, 1),
(290, 30, 'Texte ', 0, 1),
(292, 30, 'Texte ', 1, 1),
(293, 30, 'Texte ', 0, 1),
(295, 30, 'Texte ', 0, 1),
(297, 30, 'Texte ', 0, 1),
(300, 31, 'Texte ', 0, 1),
(302, 31, 'Texte ', 0, 1),
(303, 31, 'Texte ', 1, 1),
(304, 31, 'Texte ', 0, 1),
(306, 31, 'Texte ', 1, 1),
(311, 32, 'Texte ', 1, 1),
(313, 32, 'Texte ', 1, 1),
(314, 32, 'Texte ', 1, 1),
(316, 32, 'Texte ', 1, 1),
(317, 32, 'Texte ', 0, 1),
(320, 33, 'Texte ', 0, 1),
(321, 33, 'Texte ', 0, 1),
(322, 33, 'Texte ', 0, 1),
(323, 33, 'Texte ', 1, 1),
(324, 33, 'Texte ', 1, 1),
(331, 34, 'Texte ', 1, 1),
(333, 34, 'Texte ', 1, 1),
(335, 34, 'Texte ', 0, 1),
(336, 34, 'Texte ', 0, 1),
(337, 34, 'Texte ', 0, 1),
(340, 35, 'Texte ', 0, 1),
(342, 35, 'Texte ', 0, 1),
(343, 35, 'Texte ', 1, 1),
(345, 35, 'Texte ', 1, 1),
(346, 35, 'Texte ', 0, 1),
(350, 36, 'Texte ', 0, 1),
(351, 36, 'Texte ', 0, 1),
(352, 36, 'Texte ', 1, 1),
(353, 36, 'Texte ', 1, 1),
(354, 36, 'Texte ', 1, 1),
(360, 37, 'Texte ', 0, 1),
(361, 37, 'Texte ', 0, 1),
(362, 37, 'Texte ', 1, 1),
(363, 37, 'Texte ', 0, 1),
(365, 37, 'Texte ', 0, 1),
(371, 38, 'Texte ', 1, 1),
(372, 38, 'Texte ', 0, 1),
(373, 38, 'Texte ', 0, 1),
(375, 38, 'Texte ', 0, 1),
(377, 38, 'Texte ', 1, 1),
(381, 39, 'Texte ', 1, 1),
(383, 39, 'Texte ', 1, 1),
(384, 39, 'Texte ', 0, 1),
(386, 39, 'Texte ', 1, 1),
(388, 39, 'Texte ', 1, 1),
(390, 40, 'Texte ', 0, 1),
(392, 40, 'Texte ', 1, 1),
(393, 40, 'Texte ', 0, 1),
(394, 40, 'Texte ', 0, 1),
(396, 40, 'Texte ', 0, 1),
(400, 41, 'Texte ', 0, 1),
(401, 41, 'Texte ', 1, 1),
(403, 41, 'Texte ', 0, 1),
(405, 41, 'Texte ', 0, 1),
(406, 41, 'Texte ', 0, 1),
(410, 42, 'Texte ', 1, 1),
(411, 42, 'Texte ', 0, 1),
(413, 42, 'Texte ', 1, 1),
(415, 42, 'Texte ', 0, 1),
(416, 42, 'Texte ', 1, 1),
(421, 43, 'Texte ', 0, 1),
(423, 43, 'Texte ', 1, 1),
(425, 43, 'Texte ', 0, 1),
(426, 43, 'Texte ', 1, 1),
(428, 43, 'Texte ', 0, 1),
(430, 44, 'Texte ', 0, 1),
(431, 44, 'Texte ', 0, 1),
(433, 44, 'Texte ', 1, 1),
(434, 44, 'Texte ', 1, 1),
(436, 44, 'Texte ', 1, 1),
(441, 45, 'Texte ', 0, 1),
(442, 45, 'Texte ', 0, 1),
(443, 45, 'Texte ', 1, 1),
(444, 45, 'Texte ', 1, 1),
(446, 45, 'Texte ', 0, 1),
(451, 46, 'Texte ', 0, 1),
(452, 46, 'Texte ', 0, 1),
(453, 46, 'Texte ', 0, 1),
(454, 46, 'Texte ', 1, 1),
(455, 46, 'Texte ', 1, 1),
(460, 47, 'Texte ', 1, 1),
(462, 47, 'Texte ', 1, 1),
(463, 47, 'Texte ', 1, 1),
(464, 47, 'Texte ', 1, 1),
(466, 47, 'Texte ', 0, 1),
(471, 48, 'Texte ', 1, 1),
(472, 48, 'Texte ', 1, 1),
(474, 48, 'Texte ', 1, 1),
(475, 48, 'Texte ', 1, 1),
(476, 48, 'Texte ', 1, 1),
(480, 49, 'Texte ', 1, 1),
(481, 49, 'Texte ', 0, 1),
(483, 49, 'Texte ', 1, 1),
(484, 49, 'Texte ', 1, 1),
(486, 49, 'Texte ', 0, 1),
(491, 50, 'Texte ', 0, 1),
(493, 50, 'Texte ', 1, 1),
(495, 50, 'Texte ', 0, 1),
(496, 50, 'Texte ', 0, 1),
(498, 50, 'Texte ', 0, 1),
(500, 51, 'Texte ', 1, 1),
(501, 51, 'Texte ', 1, 1),
(502, 51, 'Texte ', 0, 1),
(504, 51, 'Texte ', 0, 1),
(506, 51, 'Texte ', 1, 1),
(511, 52, 'Texte ', 0, 1),
(513, 52, 'Texte ', 1, 1),
(514, 52, 'Texte ', 0, 1),
(516, 52, 'Texte ', 0, 1),
(517, 52, 'Texte ', 0, 1),
(521, 53, 'Texte ', 0, 1),
(522, 53, 'Texte ', 0, 1),
(523, 53, 'Texte ', 0, 1),
(525, 53, 'Texte ', 1, 1),
(526, 53, 'Texte ', 1, 1),
(530, 54, 'Texte ', 0, 1),
(531, 54, 'Texte ', 0, 1),
(533, 54, 'Texte ', 1, 1),
(535, 54, 'Texte ', 1, 1),
(537, 54, 'Texte ', 0, 1),
(541, 55, 'Texte ', 0, 1),
(543, 55, 'Texte ', 1, 1),
(544, 55, 'Texte ', 1, 1),
(546, 55, 'Texte ', 0, 1),
(547, 55, 'Texte ', 0, 1),
(551, 56, 'Texte ', 0, 1),
(552, 56, 'Texte ', 1, 1),
(553, 56, 'Texte ', 1, 1),
(555, 56, 'Texte ', 0, 1),
(556, 56, 'Texte ', 1, 1),
(561, 57, 'Texte ', 1, 1),
(563, 57, 'Texte ', 1, 1),
(564, 57, 'Texte ', 0, 1),
(565, 57, 'Texte ', 0, 1),
(567, 57, 'Texte ', 1, 1),
(570, 58, 'Texte ', 1, 1),
(572, 58, 'Texte ', 0, 1),
(573, 58, 'Texte ', 1, 1),
(574, 58, 'Texte ', 0, 1),
(575, 58, 'Texte ', 0, 1),
(581, 59, 'Texte ', 0, 1),
(583, 59, 'Texte ', 1, 1),
(585, 59, 'Texte ', 0, 1),
(587, 59, 'Texte ', 0, 1),
(589, 59, 'Texte ', 1, 1),
(590, 60, 'Texte ', 0, 1),
(592, 60, 'Texte ', 0, 1),
(593, 60, 'Texte ', 0, 1),
(594, 60, 'Texte ', 0, 1),
(596, 60, 'Texte ', 0, 1);

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
(1, 1, 'question 1'),
(2, 1, 'question 2'),
(3, 1, 'question 3'),
(4, 1, 'question 4'),
(5, 1, 'question 5'),
(6, 1, 'question 6'),
(7, 1, 'question 7'),
(8, 1, 'question 8'),
(9, 1, 'question 9'),
(10, 1, 'question 10'),
(11, 1, 'question 11'),
(12, 1, 'question 12'),
(13, 1, 'question 13'),
(14, 1, 'question 14'),
(15, 1, 'question 15'),
(16, 1, 'question 16'),
(17, 1, 'question 17'),
(18, 1, 'question 18'),
(19, 1, 'question 19'),
(20, 1, 'question 20'),
(21, 2, 'question 21'),
(22, 2, 'question 22'),
(23, 2, 'question 23'),
(24, 2, 'question 24'),
(25, 2, 'question 25'),
(26, 2, 'question 26'),
(27, 2, 'question 27'),
(28, 2, 'question 28'),
(29, 2, 'question 29'),
(30, 2, 'question 30'),
(31, 2, 'question 31'),
(32, 2, 'question 32'),
(33, 2, 'question 33'),
(34, 2, 'question 34'),
(35, 2, 'question 35'),
(36, 2, 'question 36'),
(37, 2, 'question 37'),
(38, 2, 'question 38'),
(39, 2, 'question 39'),
(40, 2, 'question 40'),
(41, 3, 'question 41'),
(42, 3, 'question 42'),
(43, 3, 'question 43'),
(44, 3, 'question 44'),
(45, 3, 'question 45'),
(46, 3, 'question 46'),
(47, 3, 'question 47'),
(48, 3, 'question 48'),
(49, 3, 'question 49'),
(50, 3, 'question 50'),
(51, 3, 'question 51'),
(52, 3, 'question 52'),
(53, 3, 'question 53'),
(54, 3, 'question 54'),
(55, 3, 'question 55'),
(56, 3, 'question 56'),
(57, 3, 'question 57'),
(58, 3, 'question 58'),
(59, 3, 'question 59'),
(60, 3, 'question 60'),
(61, 4, 'question 61'),
(62, 4, 'question 62'),
(63, 4, 'question 63'),
(64, 4, 'question 64'),
(65, 4, 'question 65'),
(66, 4, 'question 66'),
(67, 4, 'question 67'),
(68, 4, 'question 68'),
(69, 4, 'question 69'),
(70, 4, 'question 70'),
(71, 4, 'question 71'),
(72, 4, 'question 72'),
(73, 4, 'question 73'),
(74, 4, 'question 74'),
(75, 4, 'question 75'),
(76, 4, 'question 76'),
(77, 4, 'question 77'),
(78, 4, 'question 78'),
(79, 4, 'question 79'),
(80, 4, 'question 80'),
(81, 5, 'question 81'),
(82, 5, 'question 82'),
(83, 5, 'question 83'),
(84, 5, 'question 84'),
(85, 5, 'question 85'),
(86, 5, 'question 86'),
(87, 5, 'question 87'),
(88, 5, 'question 88'),
(89, 5, 'question 89'),
(90, 5, 'question 90'),
(91, 5, 'question 91'),
(92, 5, 'question 92'),
(93, 5, 'question 93'),
(94, 5, 'question 94'),
(95, 5, 'question 95'),
(96, 5, 'question 96'),
(97, 5, 'question 97'),
(98, 5, 'question 98'),
(99, 5, 'question 99'),
(100, 5, 'question 100');

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
(1, 1, '2016-01-27 19:29:48', 'quiz 1', '1description1', 'XXX', 1),
(2, 2, '2016-01-27 19:29:48', 'quiz 1', '2description1', 'XXX', 1),
(3, 3, '2016-01-27 19:29:48', 'quiz 1', '3description1', 'XXX', 1),
(4, 4, '2016-01-27 19:29:48', 'quiz 1', '4description1', 'XXX', 1),
(5, 5, '2016-01-27 19:29:48', 'quiz 1', '5description1', 'XXX', 1),
(6, 1, '2016-01-27 19:29:48', 'quiz 2', '1description2', 'XXX', 1),
(7, 2, '2016-01-27 19:29:48', 'quiz 2', '2description2', 'XXX', 1),
(8, 3, '2016-01-27 19:29:48', 'quiz 2', '3description2', 'XXX', 1),
(9, 4, '2016-01-27 19:29:48', 'quiz 2', '4description2', 'XXX', 1),
(10, 5, '2016-01-27 19:29:48', 'quiz 2', '5description2', 'XXX', 1),
(11, 1, '2016-01-27 19:29:48', 'quiz 3', '1description3', 'XXX', 1),
(12, 2, '2016-01-27 19:29:48', 'quiz 3', '2description3', 'XXX', 1),
(13, 3, '2016-01-27 19:29:48', 'quiz 3', '3description3', 'XXX', 1),
(14, 4, '2016-01-27 19:29:48', 'quiz 3', '4description3', 'XXX', 1),
(15, 5, '2016-01-27 19:29:48', 'quiz 3', '5description3', 'XXX', 1),
(16, 1, '2016-01-27 19:29:48', 'quiz 4', '1description4', 'XXX', 1),
(17, 2, '2016-01-27 19:29:48', 'quiz 4', '2description4', 'XXX', 1),
(18, 3, '2016-01-27 19:29:48', 'quiz 4', '3description4', 'XXX', 1),
(19, 4, '2016-01-27 19:29:48', 'quiz 4', '4description4', 'XXX', 1),
(20, 5, '2016-01-27 19:29:48', 'quiz 4', '5description4', 'XXX', 1),
(21, 1, '2016-01-27 19:29:48', 'quiz 5', '1description5', 'XXX', 1),
(22, 2, '2016-01-27 19:29:48', 'quiz 5', '2description5', 'XXX', 1),
(23, 3, '2016-01-27 19:29:48', 'quiz 5', '3description5', 'XXX', 1),
(24, 4, '2016-01-27 19:29:48', 'quiz 5', '4description5', 'XXX', 1),
(25, 5, '2016-01-27 19:29:48', 'quiz 5', '5description5', 'XXX', 1);

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
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 1, 16, 1),
(17, 1, 17, 1),
(18, 1, 18, 1),
(19, 1, 19, 1),
(20, 1, 20, 1),
(21, 2, 1, 1),
(22, 2, 2, 1),
(23, 2, 3, 1),
(24, 2, 4, 1),
(25, 2, 5, 1),
(26, 2, 6, 1),
(27, 2, 7, 1),
(28, 2, 8, 1),
(29, 2, 9, 1),
(30, 2, 10, 1),
(31, 2, 11, 1),
(32, 2, 12, 1),
(33, 2, 13, 1),
(34, 2, 14, 1),
(35, 2, 15, 1),
(36, 2, 16, 1),
(37, 2, 17, 1),
(38, 2, 18, 1),
(39, 2, 19, 1),
(40, 2, 20, 1),
(41, 3, 1, 1),
(42, 3, 2, 1),
(43, 3, 3, 1),
(44, 3, 4, 1),
(45, 3, 5, 1),
(46, 3, 6, 1),
(47, 3, 7, 1),
(48, 3, 8, 1),
(49, 3, 9, 1),
(50, 3, 10, 1),
(51, 3, 11, 1),
(52, 3, 12, 1),
(53, 3, 13, 1),
(54, 3, 14, 1),
(55, 3, 15, 1),
(56, 3, 16, 1),
(57, 3, 17, 1),
(58, 3, 18, 1),
(59, 3, 19, 1),
(60, 3, 20, 1),
(61, 4, 1, 1),
(62, 4, 2, 1),
(63, 4, 3, 1),
(64, 4, 4, 1),
(65, 4, 5, 1),
(66, 4, 6, 1),
(67, 4, 7, 1),
(68, 4, 8, 1),
(69, 4, 9, 1),
(70, 4, 10, 1),
(71, 4, 11, 1),
(72, 4, 12, 1),
(73, 4, 13, 1),
(74, 4, 14, 1),
(75, 4, 15, 1),
(76, 4, 16, 1),
(77, 4, 17, 1),
(78, 4, 18, 1),
(79, 4, 19, 1),
(80, 4, 20, 1),
(81, 5, 1, 1),
(82, 5, 2, 1),
(83, 5, 3, 1),
(84, 5, 4, 1),
(85, 5, 5, 1),
(86, 5, 6, 1),
(87, 5, 7, 1),
(88, 5, 8, 1),
(89, 5, 9, 1),
(90, 5, 10, 1),
(91, 5, 11, 1),
(92, 5, 12, 1),
(93, 5, 13, 1),
(94, 5, 14, 1),
(95, 5, 15, 1),
(96, 5, 16, 1),
(97, 5, 17, 1),
(98, 5, 18, 1),
(99, 5, 19, 1),
(100, 5, 20, 1),
(101, 6, 1, 1),
(102, 6, 2, 1),
(103, 6, 3, 1),
(104, 6, 4, 1),
(105, 6, 5, 1),
(106, 6, 6, 1),
(107, 6, 7, 1),
(108, 6, 8, 1),
(109, 6, 9, 1),
(110, 6, 10, 1),
(111, 6, 11, 1),
(112, 6, 12, 1),
(113, 6, 13, 1),
(114, 6, 14, 1),
(115, 6, 15, 1),
(116, 6, 16, 1),
(117, 6, 17, 1),
(118, 6, 18, 1),
(119, 6, 19, 1),
(120, 6, 20, 1),
(121, 7, 1, 1),
(122, 7, 2, 1),
(123, 7, 3, 1),
(124, 7, 4, 1),
(125, 7, 5, 1),
(126, 7, 6, 1),
(127, 7, 7, 1),
(128, 7, 8, 1),
(129, 7, 9, 1),
(130, 7, 10, 1),
(131, 7, 11, 1),
(132, 7, 12, 1),
(133, 7, 13, 1),
(134, 7, 14, 1),
(135, 7, 15, 1),
(136, 7, 16, 1),
(137, 7, 17, 1),
(138, 7, 18, 1),
(139, 7, 19, 1),
(140, 7, 20, 1),
(141, 8, 1, 1),
(142, 8, 2, 1),
(143, 8, 3, 1),
(144, 8, 4, 1),
(145, 8, 5, 1),
(146, 8, 6, 1),
(147, 8, 7, 1),
(148, 8, 8, 1),
(149, 8, 9, 1),
(150, 8, 10, 1),
(151, 8, 11, 1),
(152, 8, 12, 1),
(153, 8, 13, 1),
(154, 8, 14, 1),
(155, 8, 15, 1),
(156, 8, 16, 1),
(157, 8, 17, 1),
(158, 8, 18, 1),
(159, 8, 19, 1),
(160, 8, 20, 1),
(161, 9, 1, 1),
(162, 9, 2, 1),
(163, 9, 3, 1),
(164, 9, 4, 1),
(165, 9, 5, 1),
(166, 9, 6, 1),
(167, 9, 7, 1),
(168, 9, 8, 1),
(169, 9, 9, 1),
(170, 9, 10, 1),
(171, 9, 11, 1),
(172, 9, 12, 1),
(173, 9, 13, 1),
(174, 9, 14, 1),
(175, 9, 15, 1),
(176, 9, 16, 1),
(177, 9, 17, 1),
(178, 9, 18, 1),
(179, 9, 19, 1),
(180, 9, 20, 1),
(181, 10, 1, 1),
(182, 10, 2, 1),
(183, 10, 3, 1),
(184, 10, 4, 1),
(185, 10, 5, 1),
(186, 10, 6, 1),
(187, 10, 7, 1),
(188, 10, 8, 1),
(189, 10, 9, 1),
(190, 10, 10, 1),
(191, 10, 11, 1),
(192, 10, 12, 1),
(193, 10, 13, 1),
(194, 10, 14, 1),
(195, 10, 15, 1),
(196, 10, 16, 1),
(197, 10, 17, 1),
(198, 10, 18, 1),
(199, 10, 19, 1),
(200, 10, 20, 1);

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

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `quiz_id`, `date_start`, `date_stop`, `score`) VALUES
(1, 1, 1, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 97),
(2, 1, 2, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 7),
(3, 1, 3, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 15),
(4, 1, 4, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 11),
(5, 1, 5, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 23),
(6, 1, 6, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 63),
(7, 1, 7, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 74),
(8, 1, 8, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 11),
(9, 1, 9, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 2),
(10, 1, 10, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 2),
(11, 2, 1, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 7),
(12, 2, 2, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 51),
(13, 2, 3, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 19),
(14, 2, 4, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 22),
(15, 2, 5, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 77),
(16, 2, 6, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 1),
(17, 2, 7, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 5),
(18, 2, 8, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 71),
(19, 2, 9, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 90),
(20, 2, 10, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 85),
(21, 3, 1, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 48),
(22, 3, 2, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 44),
(23, 3, 3, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 7),
(24, 3, 4, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 72),
(25, 3, 5, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 80),
(26, 3, 6, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 89),
(27, 3, 7, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 37),
(28, 3, 8, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 86),
(29, 3, 9, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 86),
(30, 3, 10, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 1),
(31, 4, 1, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 40),
(32, 4, 2, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 98),
(33, 4, 3, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 100),
(34, 4, 4, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 30),
(35, 4, 5, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 24),
(36, 4, 6, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 29),
(37, 4, 7, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 6),
(38, 4, 8, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 72),
(39, 4, 9, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 50),
(40, 4, 10, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 54),
(41, 5, 1, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 41),
(42, 5, 2, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 72),
(43, 5, 3, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 26),
(44, 5, 4, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 92),
(45, 5, 5, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 87),
(46, 5, 6, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 28),
(47, 5, 7, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 12),
(48, 5, 8, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 15),
(49, 5, 9, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 78),
(50, 5, 10, '2016-01-27 20:04:40', '2016-01-27 20:04:40', 87);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `tag`) VALUES
(1, 'tag1'),
(10, 'tag10'),
(2, 'tag2'),
(3, 'tag3'),
(4, 'tag4'),
(5, 'tag5'),
(6, 'tag6'),
(7, 'tag7'),
(8, 'tag8'),
(9, 'tag9');

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
(1, '2016-01-27 19:29:48', 'user1@gmail.fr', 'pseudo1', 'user1', 'x1', 'pass1', 'student', 1),
(2, '2016-01-27 19:29:48', 'user2@gmail.fr', 'pseudo2', 'user2', 'x2', 'pass2', 'student', 1),
(3, '2016-01-27 19:29:48', 'user3@gmail.fr', 'pseudo3', 'user3', 'x3', 'pass3', 'student', 1),
(4, '2016-01-27 19:29:48', 'user4@gmail.fr', 'pseudo4', 'user4', 'x4', 'pass4', 'student', 1),
(5, '2016-01-27 19:29:48', 'user5@gmail.fr', 'pseudo5', 'user5', 'x5', 'pass5', 'student', 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT pour la table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=597;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `quizs__questions`
--
ALTER TABLE `quizs__questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
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
