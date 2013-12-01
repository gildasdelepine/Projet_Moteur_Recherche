-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 28 Novembre 2013 à 14:30
-- Version du serveur: 5.5.27
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet_moteur_recherche`
--

-- --------------------------------------------------------

--
-- Structure de la table `descriptor`
--

CREATE TABLE IF NOT EXISTS `descriptor` (
  `id_descr` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `dim` int(11) NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_descr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id_keyword`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `keywords`
--

INSERT INTO `keywords` (`id_keyword`, `name`) VALUES
(1, 'aiguille'),
(2, 'pyramide'),
(3, 'poule'),
(4, 'oeuf'),
(8, 'bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `file` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `type`, `file`, `desc`, `date`) VALUES
(1, 3, 'toto.jpg', 'Tete de Toto', 2013),
(2, 3, 'tata.png', 'Tête de Tata', 2013);

-- --------------------------------------------------------

--
-- Structure de la table `media_descriptor`
--

CREATE TABLE IF NOT EXISTS `media_descriptor` (
  `id_media` int(11) NOT NULL,
  `id_descr` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id_media`,`id_descr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 1, 5),
(1, 2, 2),
(2, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `media_type`
--

CREATE TABLE IF NOT EXISTS `media_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `media_type`
--

INSERT INTO `media_type` (`id_type`, `name`) VALUES
(1, 'audio'),
(2, 'video'),
(3, 'picture');




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
