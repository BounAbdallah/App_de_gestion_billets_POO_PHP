-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 07 avr. 2024 à 16:27
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservation_billets`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id_billet` int(11) NOT NULL AUTO_INCREMENT,
  `date_heure_depart` datetime DEFAULT NULL,
  `statut` enum('confirmée','en attente','annulée') DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_reservation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_billet`),
  KEY `id_client` (`id_client`),
  KEY `id_reservation` (`id_reservation`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id_billet`, `date_heure_depart`, `statut`, `id_client`, `id_reservation`) VALUES
(1, '2024-04-10 08:00:00', 'confirmée', 1, 1),
(2, '2024-04-12 10:30:00', 'en attente', 2, 2),
(3, '2024-04-15 15:45:00', 'confirmée', 3, 3),
(4, '2024-04-20 12:00:00', 'annulée', 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email`, `adresse`, `telephone`) VALUES
(1, 'Dramé', ' Bin Abdallah', 'abdallah.drame@gmail.com', 'parcelle_unité_26', '771862086'),
(2, 'Mendes', 'Francoise', 'Francoise.mendes@gmail.com', 'Thies_Mbour_3', '781016764'),
(3, 'Ndiaye', ' Amina', 'Amina.ndiaye@gmail.com', 'liberté_4', '778220413'),
(4, 'Fall', ' Oumy', 'Oumy.fall@gmail.com', 'Médina_rue_10', '770112022');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `date_heure_reservation` datetime DEFAULT NULL,
  `date_heure_depart` datetime DEFAULT NULL,
  `date_heure_arrivee` datetime DEFAULT NULL,
  `compagnie` varchar(100) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `statut` enum('disponible','non disponible') DEFAULT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_heure_reservation`, `date_heure_depart`, `date_heure_arrivee`, `compagnie`, `prix`, `statut`) VALUES
(1, '2024-04-09 10:00:00', '2024-04-10 08:00:00', '2024-04-10 12:00:00', 'CompagnieA', '150.00', 'disponible'),
(2, '2024-04-11 12:00:00', '2024-04-12 10:30:00', '2024-04-12 14:30:00', 'CompagnieB', '200.00', 'disponible'),
(3, '2024-04-14 09:30:00', '2024-04-15 15:45:00', '2024-04-15 18:00:00', 'CompagnieC', '180.00', 'disponible'),
(4, '2024-04-19 11:00:00', '2024-04-20 12:00:00', '2024-04-20 16:00:00', 'CompagnieD', '220.00', 'disponible');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
