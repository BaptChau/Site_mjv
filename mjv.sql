-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 22 jan. 2020 à 15:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mjv`
--

-- --------------------------------------------------------

--
-- Structure de la table `calepin`
--

DROP TABLE IF EXISTS `calepin`;
CREATE TABLE IF NOT EXISTS `calepin` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(64) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(64) NOT NULL,
  `adminValid` tinyint(1) NOT NULL DEFAULT '0',
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `calepin`
--

INSERT INTO `calepin` (`id_article`, `titre`, `contenu`, `auteur`, `adminValid`, `reported`) VALUES
(1, 'Match du week-end', 'Venez nombreux soutenir nos équipes ce week-end !!\r\n\r\nElles ont besoin de vous', 'Baptiste Chaudron', 1, 0),
(22, 'Coquille', 'Quelqu\'un a une coquille à me prêter ce mercredi ?', 'Halbin Louis', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

DROP TABLE IF EXISTS `entrainement`;
CREATE TABLE IF NOT EXISTS `entrainement` (
  `id_entrmnt` int(11) NOT NULL AUTO_INCREMENT,
  `coach` varchar(64) NOT NULL,
  `equipe` varchar(64) NOT NULL,
  `horraire` varchar(64) NOT NULL,
  PRIMARY KEY (`id_entrmnt`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`id_entrmnt`, `coach`, `equipe`, `horraire`) VALUES
(1, 'Aude Beguinet', 'Baby Hand', 'Mercredi : 16h30 - 17h15'),
(2, 'Vivien Raulet', '-7/-9 ans', 'Mercredi 16h30 - 17h30'),
(4, 'Jérôme Lorrain', '-11 ans', 'Mardi : 18h - 19h30'),
(5, 'Vincent Varinot', '-15 F', 'Jeudi : 18h - 19h30'),
(6, 'Louis Zanon / Gaetant Mathieu', '-15 G', 'Mercredi : 19h - 20h30'),
(7, 'Nicolas Jacquot / Fabien Denis', '-18 G', 'Mercredi / Vendredi : 19h30 - 21h'),
(8, 'Olivier LeNormand', 'Senior F', 'Vendredi : 19h45 - 21h15'),
(9, 'Luc Chaudron', 'Senior M', 'Vendredi : 21h15 - 22h45');

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `libelle` varchar(64) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`libelle`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `link`
--

INSERT INTO `link` (`libelle`, `link`) VALUES
('u18m', 'https://www.ffhandball.fr/fr/competition/15343#poule-75172'),
('sm1', 'https://www.ffhandball.fr/fr/competition/13479#poule-67262'),
('sf', 'https://www.ffhandball.fr/fr/competition/13654#poule-65585'),
('u11', 'https://www.ffhandball.fr/fr/competition/13487#poule-69198'),
('u15m', 'https://www.ffhandball.fr/fr/competition/13483#poule-68586'),
('u15f', 'https://www.ffhandball.fr/fr/competition/13484#poule-68587'),
('sm2', 'https://www.ffhandball.fr/fr/competition/13479#poule-67262');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(64) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_news`),
  KEY `fk_user` (`auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id_news`, `titre`, `contenu`, `auteur`) VALUES
(1, 'Pack saison 2019-20', 'Les packs sont disponible ! Venez les chercher au gymnase', 23),
(6, 'Match du week-end', 'Venez nombreux soutenir nos équipes à domicile et à l\'extérieur !', 24),
(7, 'Gymnase Fermé', 'pas d\'entrainement vcette semaine inondation du gymnsae ', 24),
(8, 'Test article', 'test', NULL),
(9, 'Test wamp', 'Test depuis wamp et serveur appache', 24);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `identite` varchar(64) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `identite`) VALUES
(23, 'jacquotj', '$2y$10$bX5DH5IFFxLg86IN1EUGGOT9vgJuL24XBsyAQwr.SBlUsoECTV0N.', 'Julien Jacquot'),
(24, 'chaudronb', '$2y$10$ZP8eIGMphDQF8gnMiGO8vupnHGcLhdRdi7ioO7Cki9OIl6iPsSvnS', 'Baptiste Chaudron');

-- --------------------------------------------------------

--
-- Structure de la table `week_end_results`
--

DROP TABLE IF EXISTS `week_end_results`;
CREATE TABLE IF NOT EXISTS `week_end_results` (
  `id_results` int(11) NOT NULL AUTO_INCREMENT,
  `weekend` date NOT NULL,
  `results` text NOT NULL,
  PRIMARY KEY (`id_results`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `week_end_results`
--

INSERT INTO `week_end_results` (`id_results`, `weekend`, `results`) VALUES
(9, '2019-12-28', 'test ddecembre 3'),
(10, '2019-12-14', 'ghdtg,;');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`auteur`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
