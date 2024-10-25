-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 12 juin 2024 à 20:20
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id22100779_momo`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `identifiant` text NOT NULL,
  `password` text NOT NULL,
  `nom` text NOT NULL,
  `solde` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `identifiant`, `password`, `nom`, `solde`) VALUES
(1, '788226607', '29072000', 'Bamba mohamed', '248 500'),
(12, '0788226607', '0788226607', 'devs17', '1.209.000'),
(13, '0788226607', 'momo11794591', 'momo', '1.209.000'),
(15, '0747389', '0747', 'SYLVIE FEREIRA', '1.209.000');

-- --------------------------------------------------------

--
-- Structure de la table `virement`
--

CREATE TABLE `virement` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `iban` text NOT NULL,
  `code_swift` text NOT NULL,
  `code_banque` text NOT NULL,
  `montant` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `virement`
--

INSERT INTO `virement` (`id`, `nom`, `prenom`, `iban`, `code_swift`, `code_banque`, `montant`, `mail`) VALUES
(65, 'mohamed', 'yve', '123654', '456987', '555', '555', 'bambahamed262@gmail.com'),
(66, 'Jojo', 'Makiss', 'Fr739383930373838383903', '73838', '84949', '10000', 'Pekinceline358@gmail.com'),
(67, 'Yacouba', 'DOLLARTIER ', 'Fr9383836494940499', '748', '748', '800', 'Hamidousankara83@gmail.com'),
(68, 'Dollartier ', 'Yacouba', 'FR93738473938393939', '73839', '73838', '1000000', 'Ericmichelmutonga@gmail.com'),
(69, 'Big ', 'Boss ', 'Fr7393639938383739908', '67399', '63739', '1000', 'Christophegrosset65@gmail.com'),
(70, 'Boss', 'Boss', 'Fr377383938383839', '03838', '73737', '1000', 'christophefrederic65@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `virement`
--
ALTER TABLE `virement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `virement`
--
ALTER TABLE `virement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
