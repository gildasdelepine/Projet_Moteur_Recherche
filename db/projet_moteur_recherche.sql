-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 18 Décembre 2013 à 17:39
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet_moteur_recherche`
--
CREATE DATABASE IF NOT EXISTS `projet_moteur_recherche` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet_moteur_recherche`;

-- --------------------------------------------------------

--
-- Structure de la table `descriptor`
--

CREATE TABLE IF NOT EXISTS `descriptor` (
  `id_descr` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `dim` int(11) NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_descr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `descriptor`
--

INSERT INTO `descriptor` (`id_descr`, `type`, `dim`, `data`) VALUES
(1, 0, 0, ''),
(2, 0, 0, ''),
(3, 0, 0, ''),
(4, 0, 0, ''),
(5, 0, 0, ''),
(6, 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `descriptor_type`
--

CREATE TABLE IF NOT EXISTS `descriptor_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `distance`
--

CREATE TABLE IF NOT EXISTS `distance` (
  `id_descr1` int(11) NOT NULL,
  `id_descr2` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `value` float NOT NULL,
  PRIMARY KEY (`id_descr1`,`id_descr2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `distance`
--

INSERT INTO `distance` (`id_descr1`, `id_descr2`, `type`, `value`) VALUES
(1, 1, 0, 0),
(1, 2, 0, 0.598419),
(1, 3, 0, 0.428297),
(1, 4, 0, 0.573978),
(1, 5, 0, 0.345312),
(1, 6, 0, 0.499503),
(2, 1, 0, 0.598419),
(2, 2, 0, 0),
(2, 3, 0, 0.403524),
(2, 4, 0, 0.467688),
(2, 5, 0, 0.549566),
(2, 6, 0, 0.638881),
(3, 1, 0, 0.428297),
(3, 2, 0, 0.403524),
(3, 3, 0, 0),
(3, 4, 0, 0.222186),
(3, 5, 0, 0.341369),
(3, 6, 0, 0.497977),
(4, 1, 0, 0.573978),
(4, 2, 0, 0.467688),
(4, 3, 0, 0.222186),
(4, 4, 0, 0),
(4, 5, 0, 0.487115),
(4, 6, 0, 0.618488),
(5, 1, 0, 0.345312),
(5, 2, 0, 0.549566),
(5, 3, 0, 0.341369),
(5, 4, 0, 0.487115),
(5, 5, 0, 0),
(5, 6, 0, 0.437336),
(6, 1, 0, 0.499503),
(6, 2, 0, 0.638881),
(6, 3, 0, 0.497977),
(6, 4, 0, 0.618488),
(6, 5, 0, 0.437336),
(6, 6, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `distance_type`
--

CREATE TABLE IF NOT EXISTS `distance_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `id_keyword` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_keyword`),
  UNIQUE KEY `id_keyword` (`id_keyword`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Contenu de la table `keywords`
--

INSERT INTO `keywords` (`id_keyword`, `name`) VALUES
(11, ''),
(8, '1888'),
(19, '1889-1900'),
(1, '1890'),
(20, '1901-1910'),
(16, '1904-1906'),
(14, '1907-1909'),
(12, '1910-1919'),
(21, '1911-1920'),
(26, '1956'),
(23, '1963'),
(15, 'african'),
(35, 'anglaise'),
(3, 'anna'),
(25, 'beatlemania'),
(2, 'boch'),
(34, 'boxe'),
(7, 'cafe'),
(29, 'cover'),
(13, 'cubism'),
(36, 'desert'),
(28, 'front'),
(17, 'lists'),
(32, 'lonely'),
(5, 'moscow'),
(6, 'night'),
(37, 'palmier'),
(31, 'pepper'),
(24, 'phenomenon'),
(30, 'sgt'),
(4, 'sold'),
(38, 'surf'),
(10, 'university'),
(39, 'vague'),
(18, 'works'),
(9, 'yale');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `file` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id_media`),
  UNIQUE KEY `id_media` (`id_media`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `type`, `file`, `desc`, `date`) VALUES
(1, 0, '1890+boch+anna+sold+moscow+night+cafe+1888+yale+university+.jpg', NULL, 0),
(2, 0, '1910-1919+cubism+1907-1909+african+1904-1906+lists+works+1889-1900+1901-1910+1911-1920+.jpg', NULL, 0),
(3, 0, '1963+phenomenon+beatlemania+1956+phenomenon+front+cover+sgt+pepper+lonely+.jpg', NULL, 0),
(4, 0, 'boxe+anglaise.jpg', NULL, 0),
(5, 0, 'desert+palmier.jpg', NULL, 0),
(6, 0, 'surf+vague.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `media_descriptor`
--

CREATE TABLE IF NOT EXISTS `media_descriptor` (
  `id_media` int(11) NOT NULL,
  `id_descr` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_descr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `media_descriptor`
--

INSERT INTO `media_descriptor` (`id_media`, `id_descr`, `type`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `media_descriptor_type`
--

CREATE TABLE IF NOT EXISTS `media_descriptor_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `media_graphics`
--

CREATE TABLE IF NOT EXISTS `media_graphics` (
  `id_media` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `media_keywords`
--

CREATE TABLE IF NOT EXISTS `media_keywords` (
  `id_media` int(11) NOT NULL,
  `id_keyword` int(11) NOT NULL,
  `tf` int(11) NOT NULL,
  PRIMARY KEY (`id_media`,`id_keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `media_keywords`
--

INSERT INTO `media_keywords` (`id_media`, `id_keyword`, `tf`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(1, 8, 0),
(1, 9, 0),
(1, 10, 0),
(1, 11, 0),
(2, 11, 0),
(2, 12, 0),
(2, 13, 0),
(2, 14, 0),
(2, 15, 0),
(2, 16, 0),
(2, 17, 0),
(2, 18, 0),
(2, 19, 0),
(2, 20, 0),
(2, 21, 0),
(3, 11, 0),
(3, 23, 0),
(3, 24, 0),
(3, 25, 0),
(3, 26, 0),
(3, 28, 0),
(3, 29, 0),
(3, 30, 0),
(3, 31, 0),
(3, 32, 0),
(4, 34, 0),
(4, 35, 0),
(5, 36, 0),
(5, 37, 0),
(6, 38, 0),
(6, 39, 0);

-- --------------------------------------------------------

--
-- Structure de la table `media_type`
--

CREATE TABLE IF NOT EXISTS `media_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `email`, `login`, `password`) VALUES
(1, 'marc', 'lieutaud', '', 'marc', 'marc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
