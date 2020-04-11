-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 11 Avril 2020 à 15:25
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `traineeship`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnementclient`
--

CREATE TABLE `abonnementclient` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recu` varchar(255) NOT NULL,
  `valider` int(11) NOT NULL,
  `date_db` date NOT NULL,
  `date_fin` date NOT NULL,
  `archived` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `abonnementclient`
--

INSERT INTO `abonnementclient` (`id`, `client_id`, `date`, `recu`, `valider`, `date_db`, `date_fin`, `archived`) VALUES
(1, 1, '2020-04-08 11:15:13', 'uploads/1586340913.jpg', 1, '2020-04-09', '2021-04-09', 1),
(2, 2, '2020-04-08 11:15:13', 'uploads/1586340913.jpg', 1, '2020-04-09', '2021-04-09', 0),
(3, 3, '2020-04-08 11:15:13', 'uploads/1586340913.jpg', 0, '2020-04-08', '2021-04-08', 0),
(4, 1, '2020-04-09 11:04:00', 'uploads/1586426640.pdf', 0, '0000-00-00', '0000-00-00', 0),
(5, 1, '2020-04-09 11:06:00', 'uploads/1586426760.exe', 0, '0000-00-00', '0000-00-00', 0),
(6, 1, '2020-04-09 11:07:54', 'uploads/1586426874.exe', 0, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `abonnemententreprise`
--

CREATE TABLE `abonnemententreprise` (
  `id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recu` varchar(255) NOT NULL,
  `valider` int(11) NOT NULL,
  `date_db` date NOT NULL,
  `date_fin` date NOT NULL,
  `archived` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `abonnemententreprise`
--

INSERT INTO `abonnemententreprise` (`id`, `entreprise_id`, `date`, `recu`, `valider`, `date_db`, `date_fin`, `archived`) VALUES
(1, 1, '2020-04-08 11:38:35', 'uploads/1586342315.jpg', 1, '2020-03-08', '2020-04-08', 1),
(2, 1, '2020-04-09 11:28:52', 'uploads/1586428132.sql', 1, '2020-04-09', '2020-05-09', 0),
(3, 1, '2020-04-09 11:31:34', 'uploads/1586428294.psd', 0, '0000-00-00', '0000-00-00', 0),
(4, 1, '2020-04-09 11:35:48', 'uploads/1586428548.exe', 1, '2020-04-09', '2020-05-09', 1),
(5, 1, '2020-04-09 11:36:15', 'uploads/1586428575.jpg', 0, '0000-00-00', '0000-00-00', 0);

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
  `isEmailConfirmed` int(11) NOT NULL DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `sexe`, `firstname`, `lastname`, `n_cni`, `adr`, `phone`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(1, 'Homme', 'admin', '01', 123, 'mascara', 123, 'admin01@gmail.com', '202cb962ac59075b964b07152d234b70', '1GOP9RVH5S', 1, 0, '2020-04-06 18:26:35'),
(2, 'Homme', 'admin', '02', 123, 'mascara', 123, 'admin02@gmail.com', '202cb962ac59075b964b07152d234b70', '1GbP9RVH5S', 1, 1, '2020-04-06 18:26:35'),
(3, 'Homme', 'admin', '01', 123, 'mascara', 123, 'admin03@gmail.com', '202cb962ac59075b964b07152d234b70', '1GbP9RVH5g', 1, 1, '2020-04-06 18:26:35'),
(4, 'Homme', 'test', 'test', 123, 'mascara', 123, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'yfJ$K4)m5HjapQPBIGNeAsLZzb(2hv', 1, 0, '2020-04-09 07:45:26');

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
  `isEmailConfirmed` int(11) DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `firstname`, `lastname`, `sexe`, `dn`, `n_cni`, `eta`, `adr`, `nv_etd`, `Specialite`, `phone`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(1, 'Mokdad', 'BENALI', 'Homme', '1111-11-01', 11111, '1111', '1111', '111', 's1', 11111, 'benalimok1dad1655@gmail.com', '202cb962ac59075b964b07152d234b70', 'BmU$EcywW1T', 1, 1, '2020-04-08 11:11:10'),
(2, 'Mokdad', 'BENALI', 'Homme', '1111-11-01', 11111, '1111', '1111', '111', 's1', 11111, 'benalimokdad1655@gmail.com', '202cb962ac59075b964b07152d234b70', 'BmU$EcywWT11', 1, 0, '2020-04-08 11:11:10'),
(3, 'Mokdad', 'BENALI', 'Homme', '1111-11-01', 11111, '1111', '1111', '111', 's1', 11111, 'benalimokdad1111655@gmail.com', '202cb962ac59075b964b07152d234b70', 'BmU$Ecy11wWT', 1, 0, '2020-04-08 11:11:10');

-- --------------------------------------------------------

--
-- Structure de la table `demandeoffre`
--

CREATE TABLE `demandeoffre` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `lettre` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accept` int(11) NOT NULL
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
  `isEmailConfirmed` int(11) NOT NULL DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `n_serie`, `denomination`, `nom_dirigeant`, `phone`, `siege_social`, `description`, `secteur_act`, `type`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(1, '11', 'sdfdsfsdfsd', '11', 11, '11', '11', '11', 'Grande ou Moyenne Entreprise', 'mokdaddido1655@gmail.com', '202cb962ac59075b964b07152d234b70', 'D8Jufn!9jv', 1, 0, '2020-04-08 11:30:19'),
(2, '11', 'gfdgdfgdgd', '11', 11, '11', '11', '11', 'Grande ou Moyenne Entreprise', 'mokdaddidgfo1655@gmail.com', '202cb962ac59075b964b07152d234b70', 'D8Jufgfn!9jv', 1, 0, '2020-04-08 11:30:19');

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
  `archived` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`id`, `id_entreprise`, `title`, `dt`, `n_places`, `nature_offre`, `Specialite`, `img`, `archived`, `date`) VALUES
(2, 1, 'fdsfsdfsdfsfd', 'sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf', 121, 'sdfsdfs fsdfsdf ', 's1', 'uploads/1586424421.jpg', 0, '2020-04-09 00:00:00'),
(3, 2, 'fdsfsdfsdfsfd', 'sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf', 121, 'sdfsdfs fsdfsdf ', 's1', 'uploads/1586424421.jpg', 0, '2020-04-09 00:00:00'),
(4, 1, 'fdsfsdfsdfsfd', 'sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf', 121, 'sdfsdfs fsdfsdf ', 's1', 'uploads/1586424421.jpg', 0, '2020-04-09 00:00:00'),
(5, 1, 'fdsfsdfsdfsfd', 'sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf sdfsdfs fsdfsdf', 121, 'sdfsdfs fsdfsdf ', 's1', 'uploads/1586424421.jpg', 0, '2020-04-09 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnementclient`
--
ALTER TABLE `abonnementclient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `abonnemententreprise`
--
ALTER TABLE `abonnemententreprise`
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
-- Index pour la table `demandeoffre`
--
ALTER TABLE `demandeoffre`
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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnementclient`
--
ALTER TABLE `abonnementclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `abonnemententreprise`
--
ALTER TABLE `abonnemententreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `demandeoffre`
--
ALTER TABLE `demandeoffre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
