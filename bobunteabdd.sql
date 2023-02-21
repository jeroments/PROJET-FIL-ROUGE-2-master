-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 21 fév. 2023 à 15:44
-- Version du serveur : 5.7.40
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bobunteabdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id_inscription` int(11) NOT NULL AUTO_INCREMENT,
  `nom_inscription` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `prenom_inscription` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `mail_inscription` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `motdepass_inscription` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id_inscription`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_inscription`, `nom_inscription`, `prenom_inscription`, `mail_inscription`, `motdepass_inscription`) VALUES
(1, 'michel', 'martin', 'michelmartin@gmail.com', 'blablabla');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_nom` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `utilisateur_prenom` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `utilisateur_email` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `utilisateur_mdp` varchar(60) COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateur_id`, `utilisateur_nom`, `utilisateur_prenom`, `utilisateur_email`, `utilisateur_mdp`) VALUES
(1, 'ntsssss', 'jeje', 'nts.je@gmail.com', '$2y$10$aKOfBTzsNDvoEY8pikfjUeilo.5kfaUaRIi7bnLUfG/0/9si8gAzG'),
(2, 'azedzaazd', 'dzadadza', 'dazdza@gmail.com', '$2y$10$DxU3csXqPHnl3J40dkkEEOQJWBYHY1L7znXvysEoQBQbV6Ivy7Z2S'),
(3, 'azedzaazd', 'dzadadza', 'dazdza@gmail.com', '$2y$10$GAAFipUtlI.S/s1WhzhOfutnDg1/R2A6jsGdC.dloz9j0IBUxjO4S'),
(4, 'azedzaazd', 'dzadadza', 'dazdza@gmail.com', '$2y$10$VYgHD3331zswM10FAHvPleAJQXJlfY3rXGVlUfoopMJR.m6mOWOi6'),
(5, 'azedzaazd', 'dzadadza', 'dazdza@gmail.com', '$2y$10$4JsGQHSvR79XvkkxG67imemIQTFXGdSXYACQGUdhxUHByCgv/vRdK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
