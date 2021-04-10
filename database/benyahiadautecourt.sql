-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 10 avr. 2021 à 12:22
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `benyahiadautecourt`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `auteur` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `qteStock` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `auteur`, `prix`, `qteStock`, `annee`) VALUES
(1, 'La Nuit étoilée', 'Van Gogh', 120.54, 10, 1888),
(2, 'La Colonne Brisée', 'Frida Kahlo', 150, 5, 1994),
(3, 'D\'sonoqua', 'Emily Carr', 189.5, 5, 1912),
(4, 'Mickey', 'Damien Hirst', 9, 2, 2012),
(5, 'Jeune fille devant un miroir', 'Picasso', 546, 3, 1932);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motdepasse` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `codepostal` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mail`, `nom`, `prenom`, `telephone`, `motdepasse`, `adresse`, `codepostal`, `ville`) VALUES
(1, 'ilies.benyahia@free.fr', 'BENYAHIA', 'Iliès', '0646701034', '15p2120268', '12 rue du Général Gouraud', '54000', 'NANCY'),
(2, 'amelpdm54@gmail.com', 'PORTEU', 'Amélie', 'jesaispas', '3265', '12 rue Général Gouraud', '54000', 'Nancy'),
(23, 'bijour', 'BENYAHIA', 'Iliès', '0646701034', 'klklj', '12 rue Général Gouraud', '54000', 'Nancy'),
(24, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test'),
(22, 'bonsoirrr', 'BENYAHIA', 'Iliès', '0646701034', 'rrrr', '12 rue Général Gouraud', '54000', 'Nancy'),
(21, 'ilies.benyahia@freezrazfr', 'BENYAHIA', 'Iliès', '0646701034', 'zrarzar', '12 rue Général Gouraud', '54000', 'Nancy'),
(25, 'retet', 'ertre', 'retert', 'retert', 'ertert', 'ertert', 'ertert', 'ertert'),
(26, 'rzerzer', 'erz', 'ezrze', 'zera', 'zae', 'rzerza', 'zerze', 'zerar');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
