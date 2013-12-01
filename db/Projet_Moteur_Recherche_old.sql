-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 26 Novembre 2013 à 14:06
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Projet_Moteur_Recherche`
--
CREATE DATABASE IF NOT EXISTS `Projet_Moteur_Recherche` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Projet_Moteur_Recherche`;

-- --------------------------------------------------------

--
-- Structure de la table `dist`
--

CREATE TABLE IF NOT EXISTS `dist` (
  `id_sign1` int(11) NOT NULL,
  `id_sign2` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `value` float DEFAULT NULL,
  PRIMARY KEY (`id_sign1`,`id_sign2`,`type`),
  KEY `id_sign2` (`id_sign2`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `id_key` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `df` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_key`),
  UNIQUE KEY `ind_nam` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id_meta` int(11) NOT NULL AUTO_INCREMENT,
  `media` enum('Image','Audio','Video') DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `file` longblob,
  `url` varchar(50) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `place` varchar(10) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `descr` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_meta`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `meta_key`
--

CREATE TABLE IF NOT EXISTS `meta_key` (
  `id_meta` int(11) NOT NULL,
  `id_key` int(11) NOT NULL,
  `tf` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  PRIMARY KEY (`id_meta`,`id_key`),
  KEY `id_key` (`id_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `meta_sign`
--

CREATE TABLE IF NOT EXISTS `meta_sign` (
  `id_meta` int(11) NOT NULL,
  `id_sign` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id_meta`,`id_sign`),
  KEY `id_sign` (`id_sign`),
  KEY `ind_typ` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sign`
--

CREATE TABLE IF NOT EXISTS `sign` (
  `id_sign` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `dim` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id_sign`),
  KEY `ind_typ` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `dist`
--
ALTER TABLE `dist`
  ADD CONSTRAINT `dist_ibfk_1` FOREIGN KEY (`id_sign1`) REFERENCES `sign` (`id_sign`) ON DELETE CASCADE,
  ADD CONSTRAINT `dist_ibfk_2` FOREIGN KEY (`id_sign2`) REFERENCES `sign` (`id_sign`) ON DELETE CASCADE,
  ADD CONSTRAINT `dist_ibfk_3` FOREIGN KEY (`type`) REFERENCES `sign` (`type`) ON DELETE CASCADE;

--
-- Contraintes pour la table `meta_key`
--
ALTER TABLE `meta_key`
  ADD CONSTRAINT `meta_key_ibfk_1` FOREIGN KEY (`id_meta`) REFERENCES `meta` (`id_meta`) ON DELETE CASCADE,
  ADD CONSTRAINT `meta_key_ibfk_2` FOREIGN KEY (`id_key`) REFERENCES `keywords` (`id_key`) ON DELETE CASCADE;

--
-- Contraintes pour la table `meta_sign`
--
ALTER TABLE `meta_sign`
  ADD CONSTRAINT `meta_sign_ibfk_1` FOREIGN KEY (`id_meta`) REFERENCES `meta` (`id_meta`) ON DELETE CASCADE,
  ADD CONSTRAINT `meta_sign_ibfk_2` FOREIGN KEY (`id_sign`) REFERENCES `sign` (`id_sign`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
