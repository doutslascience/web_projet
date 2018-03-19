-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 19 mars 2018 à 14:47
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
-- Base de données :  `bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(50) NOT NULL,
  `mdp_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `mdp_admin`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `arbitre`
--

DROP TABLE IF EXISTS `arbitre`;
CREATE TABLE IF NOT EXISTS `arbitre` (
  `id_arbitre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_arbitre` varchar(30) NOT NULL,
  `prenom_arbitre` varchar(30) NOT NULL,
  `ddn_arbitre` date NOT NULL,
  `enum_poste` enum('central','assistant') NOT NULL,
  PRIMARY KEY (`id_arbitre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `arbitre`
--

INSERT INTO `arbitre` (`id_arbitre`, `nom_arbitre`, `prenom_arbitre`, `ddn_arbitre`, `enum_poste`) VALUES
(1, 'Turpin', 'Clement', '2018-03-14', 'central'),
(2, 'Seck', 'Cheikh', '2018-03-14', 'assistant'),
(3, 'Doe', 'John', '2018-03-13', 'assistant'),
(4, 'Ndiaye', 'Abdoulaye', '2018-03-29', 'assistant'),
(5, 'Martin', 'Jean', '2018-03-13', 'assistant');

-- --------------------------------------------------------

--
-- Structure de la table `entraineur`
--

DROP TABLE IF EXISTS `entraineur`;
CREATE TABLE IF NOT EXISTS `entraineur` (
  `id_entraineur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_entraineur` varchar(30) NOT NULL,
  `prénom_entraineur` varchar(30) NOT NULL,
  `ddn_entraineur` date NOT NULL,
  PRIMARY KEY (`id_entraineur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entraineur`
--

INSERT INTO `entraineur` (`id_entraineur`, `nom_entraineur`, `prénom_entraineur`, `ddn_entraineur`) VALUES
(1, 'Zinédine', 'Zidane', '1972-06-23'),
(2, 'Gattuso', 'Gennaro', '1978-01-09'),
(3, 'Simeone', 'Diego', '1970-04-28'),
(4, 'Valverde', 'Ernesto ', '1964-02-09'),
(5, 'Guardiola', 'Pep', '1971-01-18'),
(6, 'Mourinho', 'José', '1963-01-26'),
(7, 'Heynckes', 'Jupp', '1945-05-09'),
(8, 'Allegri', 'Massimiliano (juv)', '1967-08-11'),
(9, 'Pochettino', 'Mauricio', '1972-03-02'),
(10, 'Conte', 'Antonio', '1969-07-31'),
(11, 'Klopp', 'Jürgen', '1967-06-16'),
(12, 'Garcia', 'Rudi', '1964-02-20'),
(13, 'Wenger', 'Arsène', '1949-10-22'),
(14, 'Emery', 'Unai', '1971-11-03'),
(15, 'Génésio', 'Bruno', '1966-09-01'),
(16, 'Poyet', 'Gustavo', '1967-11-15');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_equipe` varchar(30) NOT NULL,
  `flag` varchar(32) DEFAULT NULL,
  `id_entraineur` int(11) NOT NULL,
  PRIMARY KEY (`id_equipe`),
  UNIQUE KEY `nom_equipe` (`nom_equipe`),
  KEY `fk_entraineur_equipe` (`id_entraineur`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom_equipe`, `flag`, `id_entraineur`) VALUES
(67, 'Real', 'real.png', 1),
(68, 'Milan Ac', 'milan.png', 2),
(69, 'Atletico de Madrid', 'atletico.png', 3),
(70, 'Barcelone Fc', 'barcelone.png', 4),
(71, 'Man city', 'city.png', 5),
(72, 'Manchester United', 'united.png', 6),
(73, 'Bayern', 'bayern.png', 7),
(74, 'Juventus', 'juventus.png', 8),
(75, 'Liverpool', 'liverpool.png', 11),
(76, 'PSG', 'psg.png', 13),
(77, 'TOTTHENAM', 'tottenhan.png', 9),
(78, 'CHELSEA', 'chealsea.png', 10);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('but','carton jaune','carton rouge','hors-jeu','faute','dribble','passe decisive','tacle') NOT NULL,
  `id_joueur` int(11) DEFAULT NULL,
  `id_entraineur` int(11) DEFAULT NULL,
  `id_equipe` int(11) DEFAULT NULL,
  `id_rencontre` int(11) NOT NULL,
  `minute` int(11) DEFAULT '90',
  PRIMARY KEY (`id_evenement`),
  KEY `fk_joueur_evenement` (`id_joueur`),
  KEY `fk_entraineur_evenement` (`id_entraineur`),
  KEY `fk_equipe_evenement` (`id_equipe`),
  KEY `fk_rencontre_evenement` (`id_rencontre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_evenement`, `type`, `id_joueur`, `id_entraineur`, `id_equipe`, `id_rencontre`, `minute`) VALUES
(1, 'but', 2, NULL, NULL, 2, 90),
(2, 'but', 3, NULL, NULL, 2, 90),
(3, 'but', 8, NULL, NULL, 2, 52),
(4, 'carton jaune', 2, NULL, NULL, 2, 90),
(5, 'carton rouge', 6, NULL, NULL, 2, 57),
(7, 'but', 2, NULL, NULL, 2, 15);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `id_joueur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_joueur` varchar(30) NOT NULL,
  `prenom_joueur` varchar(30) NOT NULL,
  `nationalite_joueur` varchar(30) NOT NULL,
  `ddn_joueur` date DEFAULT NULL,
  `id_equipe` int(11) NOT NULL,
  PRIMARY KEY (`id_joueur`),
  KEY `id_equipe` (`id_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`id_joueur`, `nom_joueur`, `prenom_joueur`, `nationalite_joueur`, `ddn_joueur`, `id_equipe`) VALUES
(2, 'Ronaldo ', 'Cristiano', 'RIEN', NULL, 67),
(3, 'Ramos', 'Sergio', 'RIEN', NULL, 67),
(4, 'Modric', 'Lucas', 'RIEN', NULL, 67),
(5, 'Benzema', 'Karim', 'RIEN', NULL, 67),
(6, 'Kross', 'Toni', 'RIEN', NULL, 67),
(7, 'ff', 'hh', 'hhh', NULL, 67),
(8, 'Bonucci', 'Leonardo', 'Italienne', NULL, 68);

-- --------------------------------------------------------

--
-- Structure de la table `phase`
--

DROP TABLE IF EXISTS `phase`;
CREATE TABLE IF NOT EXISTS `phase` (
  `id_phase` int(11) NOT NULL AUTO_INCREMENT,
  `enum_phase` enum('eliminatoires','huitieme_finale','quart_finale','demi_finale','finale') NOT NULL,
  `id_tournoi` int(11) NOT NULL,
  PRIMARY KEY (`id_phase`),
  KEY `fk_tournoi_phase` (`id_tournoi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `phase`
--

INSERT INTO `phase` (`id_phase`, `enum_phase`, `id_tournoi`) VALUES
(1, 'quart_finale', 1);

-- --------------------------------------------------------

--
-- Structure de la table `poule`
--

DROP TABLE IF EXISTS `poule`;
CREATE TABLE IF NOT EXISTS `poule` (
  `id_poule` int(11) NOT NULL AUTO_INCREMENT,
  `nom_poule` varchar(30) NOT NULL,
  `id_phase` int(11) NOT NULL,
  PRIMARY KEY (`id_poule`),
  KEY `fk_phase_poule` (`id_phase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rencontre`
--

DROP TABLE IF EXISTS `rencontre`;
CREATE TABLE IF NOT EXISTS `rencontre` (
  `id_rencontre` int(11) NOT NULL AUTO_INCREMENT,
  `date_rencontre` varchar(15) NOT NULL,
  `heure_rencontre` varchar(15) NOT NULL,
  `id_equipe1` int(11) NOT NULL,
  `id_equipe2` int(11) NOT NULL,
  `id_stade` int(11) NOT NULL,
  `id_phase` int(11) NOT NULL,
  `termine` enum('oui','non') NOT NULL DEFAULT 'non',
  PRIMARY KEY (`id_rencontre`),
  KEY `fk_equipe1_rencontre` (`id_equipe1`),
  KEY `fk_equipe2_rencontre` (`id_equipe2`),
  KEY `fk_stade_rencontre` (`id_stade`),
  KEY `fk_phase_rencontre` (`id_phase`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rencontre`
--

INSERT INTO `rencontre` (`id_rencontre`, `date_rencontre`, `heure_rencontre`, `id_equipe1`, `id_equipe2`, `id_stade`, `id_phase`, `termine`) VALUES
(2, '2018-03-13', '07:28:22', 67, 68, 1, 1, 'oui'),
(3, '2018-03-22', '07:37:39', 70, 71, 1, 1, 'oui'),
(4, '2018-12-17', '18:45:00', 78, 75, 4, 1, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `rencontre_arbitre`
--

DROP TABLE IF EXISTS `rencontre_arbitre`;
CREATE TABLE IF NOT EXISTS `rencontre_arbitre` (
  `id_rencontre` int(11) NOT NULL,
  `id_arbitre` int(11) NOT NULL,
  PRIMARY KEY (`id_rencontre`,`id_arbitre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rencontre_arbitre`
--

INSERT INTO `rencontre_arbitre` (`id_rencontre`, `id_arbitre`) VALUES
(2, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `stade`
--

DROP TABLE IF EXISTS `stade`;
CREATE TABLE IF NOT EXISTS `stade` (
  `id_stade` int(11) NOT NULL AUTO_INCREMENT,
  `nom_stade` varchar(30) DEFAULT NULL,
  `ville_stade` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_stade`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stade`
--

INSERT INTO `stade` (`id_stade`, `nom_stade`, `ville_stade`) VALUES
(1, 'LEOPOLD SEDAR SENGHOR', 'DAKAR'),
(2, 'iba mar diop', 'DAKAR'),
(3, 'AMADOU BARRY', 'DAKAR'),
(4, 'CAMPNOU', 'MADRID');

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

DROP TABLE IF EXISTS `tournoi`;
CREATE TABLE IF NOT EXISTS `tournoi` (
  `id_tournoi` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tournoi` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tournoi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tournoi`
--

INSERT INTO `tournoi` (`id_tournoi`, `nom_tournoi`) VALUES
(1, 'UEFA CHAMPIONS LEAGUE');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_entraineur_equipe` FOREIGN KEY (`id_entraineur`) REFERENCES `entraineur` (`id_entraineur`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `fk_entraineur_evenement` FOREIGN KEY (`id_entraineur`) REFERENCES `entraineur` (`id_entraineur`),
  ADD CONSTRAINT `fk_equipe_evenement` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `fk_joueur_evenement` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`),
  ADD CONSTRAINT `fk_rencontre_evenement` FOREIGN KEY (`id_rencontre`) REFERENCES `rencontre` (`id_rencontre`);

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`);

--
-- Contraintes pour la table `phase`
--
ALTER TABLE `phase`
  ADD CONSTRAINT `fk_tournoi_phase` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`id_tournoi`);

--
-- Contraintes pour la table `poule`
--
ALTER TABLE `poule`
  ADD CONSTRAINT `fk_phase_poule` FOREIGN KEY (`id_phase`) REFERENCES `phase` (`id_phase`);

--
-- Contraintes pour la table `rencontre`
--
ALTER TABLE `rencontre`
  ADD CONSTRAINT `fk_equipe1_rencontre` FOREIGN KEY (`id_equipe1`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `fk_equipe2_rencontre` FOREIGN KEY (`id_equipe2`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `fk_phase_rencontre` FOREIGN KEY (`id_phase`) REFERENCES `phase` (`id_phase`),
  ADD CONSTRAINT `fk_stade_rencontre` FOREIGN KEY (`id_stade`) REFERENCES `stade` (`id_stade`);

--
-- Contraintes pour la table `rencontre_arbitre`
--
ALTER TABLE `rencontre_arbitre`
  ADD CONSTRAINT `rencontre_arbitre_ibfk_1` FOREIGN KEY (`id_rencontre`) REFERENCES `rencontre` (`id_rencontre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
