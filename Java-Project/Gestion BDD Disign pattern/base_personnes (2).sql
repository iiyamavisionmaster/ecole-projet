-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 juil. 2018 à 05:30
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `base_personnes`
--

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `coms` text,
  `personneId` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `coms`, `personneId`) VALUES
(0, 'groupe1', 'test1', 'ayoub2,Test2,belkadi2'),
(1, 'groupe2', 'test2', 'ayoub2,Test2,belkadi2'),
(2, 'groupe3', 'test3', 'ayoub2,Test2,');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `IdPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `Prenom` varchar(100) DEFAULT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Poids` double DEFAULT NULL,
  `Taille` double DEFAULT NULL,
  `Rue` varchar(100) DEFAULT NULL,
  `Ville` varchar(100) DEFAULT NULL,
  `CodePostal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`IdPersonne`, `Prenom`, `Nom`, `Poids`, `Taille`, `Rue`, `Ville`, `CodePostal`) VALUES
(0, 'belkadi2', 'Test2', 100, 93, '11 rue dalésia', 'Paris', '75014'),
(1, 'Test2', 'test1', 100, 93, '11 rue dalésia', 'Paris', '75014'),
(2, 'Test3', 'belkadi2', 100, 93, '11 rue dalésia', 'Paris', '75014'),
(3, 'ayoub', 'belkadi2', 100, 93, '11 rue dalésia', 'Paris', '75014'),
(4, 'belkadi2', 'ayoub2', 100, 93, '11 rue dalésia', 'Paris', '75014'),
(5, 'testayoub', 'a', 15, 16, 'd', 'e', 'f'),
(6, 'Belkadi', 'Ayoub', 10, 10, 'Alesia', 'Paris', '75014');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `coms` text,
  `groupId` varchar(255) DEFAULT NULL,
  `tacheId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `name`, `coms`, `groupId`, `tacheId`) VALUES
(0, 'projet1', 'test1', '', 'tache1,tache2,'),
(1, 'projet2', 'test2', 'groupe1,groupe2,', 'tache1,tache2,'),
(2, 'tache3', 'test3', 'groupe1,groupe2,', 'tache1,tache2,'),
(3, 'tache4', 'test4', 'groupe1,groupe2,', 'tache1,tache2,'),
(4, 'projet6', 'test6', 'groupe1,groupe2,', '');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `coms` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `coms`, `start`, `end`) VALUES
(0, 'tache1', 'test1', '2018-08-01', '2018-09-02'),
(1, 'tache2', 'test2', '2018-11-17', '2018-11-22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
