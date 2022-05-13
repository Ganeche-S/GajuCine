-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 13 avr. 2022 à 17:58
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
-- Base de données : `gajucine_bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) DEFAULT NULL,
  `prenom` varchar(32) DEFAULT NULL,
  `mdp` varchar(32) DEFAULT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `telephone` int(32) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `mdp`, `sexe`, `dateNaissance`, `email`, `telephone`) VALUES
(11, 'azerty', 'azerty', 'azerty', 'M', '2019-07-01', 'azerty@gmail.com', 651757252);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
