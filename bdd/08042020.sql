-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 08 avr. 2020 à 12:02
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `traineeship`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnementclient`
--

CREATE TABLE `abonnementclient` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `recu` varchar(255) NOT NULL,
  `valider` int(11) NOT NULL,
  `date_db` date NOT NULL,
  `date_fin` date NOT NULL,
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `n_cni` int(11) NOT NULL,
  `adr` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `isEmailConfirmed` int(11) NOT NULL DEFAULT 0,
  `archived` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `sexe`, `firstname`, `lastname`, `n_cni`, `adr`, `phone`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(1, 'Homme', 'admin', '01', 123, 'mascara', 123, 'admin01@gmail.com', '202cb962ac59075b964b07152d234b70', '1GOP9RVH5S', 1, 0, '2020-04-06 18:26:35'),
(2, 'Homme', 'admin', '01', 123, 'mascara', 123, 'admin02@gmail.com', '202cb962ac59075b964b07152d234b70', '1GbP9RVH5S', 1, 0, '2020-04-06 18:26:35'),
(3, 'Homme', 'admin', '01', 123, 'mascara', 123, 'admin03@gmail.com', '202cb962ac59075b964b07152d234b70', '1GbP9RVH5g', 1, 0, '2020-04-06 18:26:35');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `dn` date NOT NULL,
  `n_cni` int(11) NOT NULL,
  `eta` varchar(255) NOT NULL,
  `adr` varchar(255) NOT NULL,
  `nv_etd` varchar(255) NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `isEmailConfirmed` int(11) DEFAULT 0,
  `archived` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `n_serie` varchar(255) NOT NULL,
  `denomination` varchar(255) NOT NULL,
  `nom_dirigeant` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `siege_social` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `secteur_act` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `isEmailConfirmed` int(11) NOT NULL DEFAULT 0,
  `archived` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `dt` varchar(255) NOT NULL,
  `n_places` int(11) NOT NULL,
  `nature_offre` varchar(255) NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `archived` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnementclient`
--
ALTER TABLE `abonnementclient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnementclient`
--
ALTER TABLE `abonnementclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
