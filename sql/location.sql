-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 06 nov. 2020 à 12:45
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `location`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_clients` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom_clients` varchar(255) DEFAULT NULL,
  `prenom_clients` varchar(255) DEFAULT NULL,
  `adresse_clients` varchar(255) DEFAULT NULL,
  `cp_clients` varchar(5) DEFAULT NULL,
  `ville_clients` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_clients`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_clients`, `nom_clients`, `prenom_clients`, `adresse_clients`, `cp_clients`, `ville_clients`) VALUES
(1, 'Barbone', 'Camille', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(2, 'Es sabbani', 'Nasser', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(3, 'Merucci', 'Alain', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(4, 'Decorce', 'Yann', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(5, 'Haas', 'Anaïs', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(6, 'Dauchy', 'Loïc', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(7, 'Dubief', 'Gianni', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(8, 'Henry ', 'Nzinga', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(9, 'Guyon', 'Johan', '2 route de Montaigu', '39000', 'Lons-Le-Saunier'),
(10, 'Cordier', 'Frédéric', '2 route de Montaigu', '39000', 'Lons-Le-Saunier');

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

DROP TABLE IF EXISTS `louer`;
CREATE TABLE IF NOT EXISTS `louer` (
  `id_louer` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voitures` bigint(20) NOT NULL,
  `id_clients` bigint(20) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_louer`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`id_louer`, `id_voitures`, `id_clients`, `date_debut`, `date_fin`) VALUES
(1, 1, 2, '2020-09-05', '2020-11-04'),
(2, 3, 1, '2020-10-26', '2020-12-15'),
(3, 5, 3, '2020-11-05', '2020-12-31'),
(4, 7, 4, '2020-08-05', '2020-10-31'),
(5, 8, 5, '2019-04-09', '2019-05-09'),
(6, 4, 6, '2020-11-03', '2020-12-25'),
(7, 6, 7, '2015-02-21', '2015-05-27'),
(8, 2, 8, '2020-08-15', '2020-09-15'),
(9, 6, 9, '2020-10-31', '2021-01-01'),
(10, 6, 10, '2020-11-01', '2021-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `retour`
--

DROP TABLE IF EXISTS `retour`;
CREATE TABLE IF NOT EXISTS `retour` (
  `id_retour` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_voitures` bigint(20) NOT NULL,
  `id_clients` bigint(20) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id_retour`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `retour`
--

INSERT INTO `retour` (`id_retour`, `id_voitures`, `id_clients`, `date_debut`, `date_fin`) VALUES
(1, 1, 2, '2020-09-05', '2020-11-04'),
(2, 3, 1, '2020-10-26', '2020-12-15'),
(3, 5, 3, '2020-11-05', '2020-12-31'),
(4, 7, 4, '2020-08-05', '2020-10-31'),
(6, 4, 6, '2020-11-03', '2020-12-25'),
(8, 2, 8, '2020-08-15', '2020-09-15'),
(9, 6, 9, '2020-10-31', '2021-01-01'),
(10, 6, 10, '2020-11-01', '2021-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `type`, `password`) VALUES
(4, 'admin', 'n.essabbani@codeur.online', 'user', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `id_voitures` bigint(20) NOT NULL AUTO_INCREMENT,
  `image_voitures` varchar(255) DEFAULT NULL,
  `nom_voitures` varchar(255) DEFAULT NULL,
  `marque_voitures` varchar(255) DEFAULT NULL,
  `description_voitures` varchar(255) DEFAULT NULL,
  `disponibilite` blob DEFAULT NULL,
  PRIMARY KEY (`id_voitures`)
) ENGINE=InnoDB AUTO_INCREMENT=897 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id_voitures`, `image_voitures`, `nom_voitures`, `marque_voitures`, `description_voitures`, `disponibilite`) VALUES
(1, 'voiture/clio.png', 'Renault', 'Clio', '5 portes, Diesel, 90cv', 0x696d6167652f76616c6964652e706e67),
(2, 'voiture/scenic.png', 'Renault', 'Scenic', '5 portes, Diesel, 95cv', 0x696d6167652f76616c6964652e706e67),
(3, 'voiture/mini.png', 'Mini', 'One', '3 portes, Diesel, 90cv', 0x696d6167652f76616c6964652e706e67),
(4, 'voiture/kangoo.png', 'Renault', 'Kangoo', '3 portes, Diesel, 90cv', 0x696d6167652f76616c6964652e706e67),
(5, 'voiture/ford.png', 'Ford', 'C-MAX', '5 portes, Diesel, 95cv', 0x696d6167652f76616c6964652e706e670d0a),
(6, 'voiture/zoe.png', 'Renault ', 'ZOE', '3 portes, Diesel, 85cv', 0x696d6167652f696e76616c6964652e706e67),
(7, 'voiture/megane.png', 'Renault ', 'Megane', '5 portes, Diesel, 110cv', 0x696d6167652f76616c6964652e706e67),
(8, 'voiture/corsa.png', 'Opel', 'Corsa', '3 portes, Diesel, 88cv', 0x696d6167652f76616c6964652e706e67);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
