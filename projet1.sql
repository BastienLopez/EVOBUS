-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 04 Janvier 2023 à 10:45
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet1`
--

-- --------------------------------------------------------

--
-- Structure de la table `bus`
--

CREATE TABLE `bus` (
  `cb_bus` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `date_heure` datetime NOT NULL,
  `num_idd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bus`
--

INSERT INTO `bus` (`cb_bus`, `date_debut`, `date_fin`, `date_heure`, `num_idd`) VALUES
(123456, '2022-02-03 14:01:26', '2022-02-03 14:01:27', '2022-01-04 13:04:16', 0),
(456789, '2022-02-03 14:01:26', '2022-02-03 14:01:27', '2022-02-02 17:00:00', 0),
(789123, '2022-02-03 14:01:26', '2022-02-03 14:01:27', '2022-02-02 17:02:00', 0),
(321654, '2022-02-03 14:01:26', '2022-02-03 14:01:27', '2022-02-04 17:11:49', 0),
(654987, '2022-02-03 14:01:26', '2022-02-03 14:01:27', '2022-02-04 17:20:26', 0),
(987654, '2022-02-03 14:01:26', '2022-02-03 14:01:27', '2022-02-08 14:35:27', 0),
(123951, '2022-02-03 14:01:26', '2022-02-03 14:01:27', '2022-06-09 07:13:22', 0),
(159357, '2022-02-03 14:01:26', '2022-02-03 14:01:27', '2022-06-09 07:13:28', 0),
(789789, '2022-02-03 14:01:27', '2022-02-03 14:01:27', '2022-01-04 13:04:16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_production`
--

CREATE TABLE `ligne_production` (
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

CREATE TABLE `mesure` (
  `temperature` int(11) NOT NULL,
  `humidite` int(11) NOT NULL,
  `date_heure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `mesure`
--

INSERT INTO `mesure` (`temperature`, `humidite`, `date_heure`) VALUES
(26, 56, '2022-01-04 13:04:16'),
(26, 59, '2022-02-02 17:00:00'),
(27, 45, '2022-02-02 17:02:00'),
(18, 35, '2022-02-04 17:11:49'),
(18, 35, '2022-02-04 17:20:26'),
(11, 44, '2022-02-08 14:35:27'),
(99, 50, '2022-06-09 07:13:22'),
(30, 20, '2022-06-09 07:13:28'),
(31, 21, '2022-06-09 07:13:29');

-- --------------------------------------------------------

--
-- Structure de la table `pare_brise`
--

CREATE TABLE `pare_brise` (
  `id_pare_brise` int(11) NOT NULL,
  `cb_parebrise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `pare_brise`
--

INSERT INTO `pare_brise` (`id_pare_brise`, `cb_parebrise`) VALUES
(1, '4561423'),
(4, '44444'),
(5, '12'),
(24, '56'),
(25, '65'),
(26, '50'),
(34, '12'),
(36, '12');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `num_idd` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `modele`, `num_idd`, `marque`) VALUES
(4, 'eCitato', '789456', 'Mercedes'),
(5, 'Citaro', '74125', 'Mercedes'),
(6, 'Conecto', '159159', 'Mercedes'),
(7, 'Tourismo RHD', '147147', 'Mercedes'),
(79, 'Citaro K', '321654', 'Mercedes'),
(80, 'Citaro L', '654987', 'Mercedes'),
(81, 'Citaro G', '987654', 'Mercedes'),
(82, 'Citaro LE', '123951', 'Mercedes'),
(83, 'Tourismo RHDR', '159357', 'Mercedes');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bus`
--
ALTER TABLE `bus`
  ADD KEY `date_heure` (`date_heure`);

--
-- Index pour la table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`date_heure`);

--
-- Index pour la table `pare_brise`
--
ALTER TABLE `pare_brise`
  ADD PRIMARY KEY (`id_pare_brise`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`),
  ADD KEY `num_idd` (`num_idd`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `pare_brise`
--
ALTER TABLE `pare_brise`
  MODIFY `id_pare_brise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`date_heure`) REFERENCES `mesure` (`date_heure`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
