-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 24 nov. 2019 à 20:57
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `niddou`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnes`
--

DROP TABLE IF EXISTS `abonnes`;
CREATE TABLE IF NOT EXISTS `abonnes` (
  `Id_abonne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_abonnement` date NOT NULL,
  PRIMARY KEY (`Id_abonne`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `Id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `Id_sous_categorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_categorie`),
  KEY `Id_sous_categorie` (`Id_sous_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`Id_categorie`, `name`, `Id_sous_categorie`) VALUES
(1, 'maman', NULL),
(2, 'bebe', NULL),
(6, 'tissus', NULL),
(5, 'maison', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `creas`
--

DROP TABLE IF EXISTS `creas`;
CREATE TABLE IF NOT EXISTS `creas` (
  `Id_crea` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `Id_categorie` int(11) NOT NULL,
  `Id_liste` int(11) DEFAULT NULL,
  `Id_admin` int(11) NOT NULL,
  PRIMARY KEY (`Id_crea`),
  KEY `Id_categorie` (`Id_categorie`),
  KEY `Id_liste` (`Id_liste`),
  KEY `Id_admin` (`Id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `envoyer_news`
--

DROP TABLE IF EXISTS `envoyer_news`;
CREATE TABLE IF NOT EXISTS `envoyer_news` (
  `Id_newsletter` int(11) NOT NULL,
  `Id_abonne` int(11) NOT NULL,
  PRIMARY KEY (`Id_newsletter`,`Id_abonne`),
  KEY `Id_abonne` (`Id_abonne`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `listes_cadeaux`
--

DROP TABLE IF EXISTS `listes_cadeaux`;
CREATE TABLE IF NOT EXISTS `listes_cadeaux` (
  `Id_liste` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_depot` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_crea` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_liste`),
  KEY `id_crea` (`id_crea`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `Id_newsletter` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `texte` text NOT NULL,
  `date_envoi` date NOT NULL,
  `Id_admin` int(11) NOT NULL,
  PRIMARY KEY (`Id_newsletter`),
  KEY `Id_admin` (`Id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

DROP TABLE IF EXISTS `sous_categories`;
CREATE TABLE IF NOT EXISTS `sous_categories` (
  `Id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `Id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`Id_sous_categorie`),
  KEY `Id_categorie` (`Id_categorie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
