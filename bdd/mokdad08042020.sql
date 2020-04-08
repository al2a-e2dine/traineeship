-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 01:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traineeship`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonnementclient`
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

--
-- Dumping data for table `abonnementclient`
--

INSERT INTO `abonnementclient` (`id`, `client_id`, `date`, `recu`, `valider`, `date_db`, `date_fin`, `archived`) VALUES
(1, 1, '2020-04-08 11:15:13', 'uploads/1586340913.jpg', 0, '2020-04-08', '2021-04-08', 0),
(2, 2, '2020-04-08 11:15:13', 'uploads/1586340913.jpg', 0, '2020-04-08', '2021-04-08', 0),
(3, 3, '2020-04-08 11:15:13', 'uploads/1586340913.jpg', 0, '2020-04-08', '2021-04-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `abonnemententreprise`
--

CREATE TABLE `abonnemententreprise` (
  `id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `recu` varchar(255) NOT NULL,
  `valider` int(11) NOT NULL,
  `date_db` date NOT NULL,
  `date_fin` date NOT NULL,
  `archived` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abonnemententreprise`
--

INSERT INTO `abonnemententreprise` (`id`, `entreprise_id`, `date`, `recu`, `valider`, `date_db`, `date_fin`, `archived`) VALUES
(1, 1, '2020-04-08 11:38:35', 'uploads/1586342315.jpg', 1, '2020-03-08', '2020-04-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `sexe`, `firstname`, `lastname`, `n_cni`, `adr`, `phone`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(1, 'Homme', 'admin', '01', 123, 'mascara', 123, 'admin01@gmail.com', '202cb962ac59075b964b07152d234b70', '1GOP9RVH5S', 1, 0, '2020-04-06 18:26:35'),
(2, 'Homme', 'admin', '01', 123, 'mascara', 123, 'admin02@gmail.com', '202cb962ac59075b964b07152d234b70', '1GbP9RVH5S', 1, 0, '2020-04-06 18:26:35'),
(3, 'Homme', 'admin', '01', 123, 'mascara', 123, 'admin03@gmail.com', '202cb962ac59075b964b07152d234b70', '1GbP9RVH5g', 1, 0, '2020-04-06 18:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `client`
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

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstname`, `lastname`, `sexe`, `dn`, `n_cni`, `eta`, `adr`, `nv_etd`, `Specialite`, `phone`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(1, 'Mokdad', 'BENALI', 'Homme', '1111-11-01', 11111, '1111', '1111', '111', 's1', 11111, 'benalimok1dad1655@gmail.com', '202cb962ac59075b964b07152d234b70', 'BmU$EcywW1T', 1, 0, '2020-04-08 11:11:10'),
(2, 'Mokdad', 'BENALI', 'Homme', '1111-11-01', 11111, '1111', '1111', '111', 's1', 11111, 'benalimokdad1655@gmail.com', '202cb962ac59075b964b07152d234b70', 'BmU$EcywWT11', 1, 0, '2020-04-08 11:11:10'),
(3, 'Mokdad', 'BENALI', 'Homme', '1111-11-01', 11111, '1111', '1111', '111', 's1', 11111, 'benalimokdad1111655@gmail.com', '202cb962ac59075b964b07152d234b70', 'BmU$Ecy11wWT', 1, 0, '2020-04-08 11:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
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

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`id`, `n_serie`, `denomination`, `nom_dirigeant`, `phone`, `siege_social`, `description`, `secteur_act`, `type`, `email`, `password`, `token`, `isEmailConfirmed`, `archived`, `date`) VALUES
(1, '11', '11', '11', 11, '11', '11', '11', 'Grande ou Moyenne Entreprise', 'mokdaddido1655@gmail.com', '202cb962ac59075b964b07152d234b70', 'D8Jufn!9jv', 1, 0, '2020-04-08 11:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `offre`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnementclient`
--
ALTER TABLE `abonnementclient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abonnemententreprise`
--
ALTER TABLE `abonnemententreprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonnementclient`
--
ALTER TABLE `abonnementclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `abonnemententreprise`
--
ALTER TABLE `abonnemententreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
