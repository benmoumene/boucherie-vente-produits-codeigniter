-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 08 sep. 2019 à 15:37
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ci_vente_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom_client` varchar(30) NOT NULL,
  `adresse_client` varchar(50) NOT NULL,
  `telephone_client` int(11) NOT NULL,
  `id_utilisateur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom_client`, `adresse_client`, `telephone_client`, `id_utilisateur`) VALUES
(11, 'jonathan Lukoji', 'Bel Kaleja', 975454545, 'jlk@quin2050'),
(13, 'gains', '', 0, 'gains@quin2050'),
(14, 'bernard', '', 0, 'bernard@quin2050'),
(15, 'fiston monga', '', 0, 'fiston@quin2050.cd'),
(16, 'jonathan jojo', 'BEL AIR KALEJA', 820050664, 'jlk@quin2050.cd'),
(17, 'elie mwez', '', 0, 'elie@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `nom_client` varchar(30) NOT NULL,
  `date_cmd` date NOT NULL,
  `statut` varchar(30) NOT NULL,
  `id_client` varchar(30) NOT NULL,
  `cmd_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `nom_client`, `date_cmd`, `statut`, `id_client`, `cmd_id`) VALUES
(12, 'jonathan Lukoji', '2018-09-16', 'Votre commande est acceptée', 'jlk@quin2050', '4LwCU1GMdy'),
(13, 'jonathan Lukoji', '2018-09-16', 'Votre commande est acceptée', 'jlk@quin2050', '7CobHDfCU4'),
(16, 'gains', '2018-09-16', 'Votre commande est acceptée', 'gains@quin2050', 'McaYiENobu'),
(17, 'gains', '2018-09-16', 'Votre commande est acceptée', 'gains@quin2050', 'FF6U4GRTvs'),
(18, 'gains', '2018-09-16', 'Votre commande est réfusée', 'gains@quin2050', 'NkHOQrjmVP'),
(19, 'bernard', '2018-09-18', 'Votre commande est acceptée', 'bernard@quin2050', 'X7BO1Hszvg'),
(20, 'bernard', '2018-09-18', 'Votre commande est réfusée', 'bernard@quin2050', 'htIZvSE3Ri'),
(21, 'bernard', '2018-09-18', 'Votre commande est acceptée', 'bernard@quin2050', 'TS487oaPTd'),
(22, 'jonathan jojo', '2018-09-25', 'Votre commande est en attente', 'jlk@quin2050.cd', 'NDEuGi0m9i'),
(23, 'elie mwez', '2019-09-07', 'Votre commande est acceptée', 'elie@gmail.com', 'gLyNod62xU');

-- --------------------------------------------------------

--
-- Structure de la table `lignes_commandes`
--

CREATE TABLE `lignes_commandes` (
  `id` int(11) NOT NULL,
  `date_cmd` date NOT NULL,
  `name` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_client` varchar(30) NOT NULL,
  `nom_client` varchar(30) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `cmd_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lignes_commandes`
--

INSERT INTO `lignes_commandes` (`id`, `date_cmd`, `name`, `qty`, `id_client`, `nom_client`, `subtotal`, `price`, `cmd_id`) VALUES
(9, '2018-09-16', 'planche', 45, 'jlk@quin2050', 'jonathan Lukoji', 450, 10, '4LwCU1GMdy'),
(10, '2018-09-16', 'planche', 56, 'jlk@quin2050', 'jonathan Lukoji', 560, 10, '7CobHDfCU4'),
(14, '2018-09-16', 'planche', 60, 'gains@quin2050', 'gains', 600, 10, 'McaYiENobu'),
(15, '2018-09-16', 'Tole', 5, 'gains@quin2050', 'gains', 60, 12, 'McaYiENobu'),
(16, '2018-09-16', 'bouton de fenetre', 50, 'gains@quin2050', 'gains', 700, 14, 'FF6U4GRTvs'),
(17, '2018-09-16', 'bouton de fenetre', 8, 'gains@quin2050', 'gains', 112, 14, 'NkHOQrjmVP'),
(18, '2018-09-18', 'Tole', 5, 'bernard@quin2050', 'bernard', 60, 12, 'X7BO1Hszvg'),
(19, '2018-09-18', 'planche', 13, 'bernard@quin2050', 'bernard', 130, 10, 'htIZvSE3Ri'),
(20, '2018-09-18', 'bouton de fenetre', 10, 'bernard@quin2050', 'bernard', 140, 14, 'htIZvSE3Ri'),
(21, '2018-09-18', 'cadenat S23', 10, 'bernard@quin2050', 'bernard', 60, 6, 'TS487oaPTd'),
(22, '2018-09-25', 'planche', 30, 'jlk@quin2050.cd', 'jonathan jojo', 300, 10, 'NDEuGi0m9i'),
(23, '2018-09-25', 'ferron', 5, 'jlk@quin2050.cd', 'jonathan jojo', 125, 25, 'NDEuGi0m9i'),
(24, '2019-09-07', 'ferron', 5, 'elie@gmail.com', 'elie mwez', 125, 25, 'gLyNod62xU'),
(25, '2019-09-07', 'planche', 8, 'elie@gmail.com', 'elie mwez', 80, 10, 'gLyNod62xU');

-- --------------------------------------------------------

--
-- Structure de la table `materiaux`
--

CREATE TABLE `materiaux` (
  `code_mat` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `qte_stock` int(11) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `desc_mat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiaux`
--

INSERT INTO `materiaux` (`code_mat`, `name`, `qte_stock`, `prix_unitaire`, `desc_mat`) VALUES
(12, 'planche', 2796, 10, NULL),
(13, 'bouton de fenetre', 711, 14, 'c\'est un materiel de bonne qualite importation belge'),
(15, 'Tole', 525, 12, 'Tole en provenance de la tanzanie'),
(16, 'ferron', 345, 25, 'ferron de bonne qualité ocasion d\'europe'),
(17, 'cadenat S23', -15, 6, 'jhghdgfjdkfhkdlfhkj');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom_ut` varchar(30) NOT NULL,
  `mot_pass` varchar(50) NOT NULL,
  `role_ut` varchar(15) NOT NULL,
  `date_creat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_ut`, `mot_pass`, `role_ut`, `date_creat`) VALUES
(17, 'Andre Tshibangu', '5b1b68a9abf4d2cd155c81a9225fd158', 'admin', '2018-09-13'),
(19, 'caisse1', '5b1b68a9abf4d2cd155c81a9225fd158', 'caissier', '2018-09-14'),
(20, 'facturier1', '5b1b68a9abf4d2cd155c81a9225fd158', 'facturier', '2018-09-14'),
(21, 'sc1', '5b1b68a9abf4d2cd155c81a9225fd158', 'service_client', '2018-09-14'),
(26, 'jlk@quin2050', '5b1b68a9abf4d2cd155c81a9225fd158', 'client', '2018-09-15'),
(28, 'gains@quin2050', '5b1b68a9abf4d2cd155c81a9225fd158', 'client', '2018-09-16'),
(29, 'bernard@quin2050', '5b1b68a9abf4d2cd155c81a9225fd158', 'client', '2018-09-18'),
(30, 'fiston@quin2050.cd', '5b1b68a9abf4d2cd155c81a9225fd158', 'client', '2017-09-20'),
(31, 'jlk@quin2050.cd', '5b1b68a9abf4d2cd155c81a9225fd158', 'client', '2018-09-25'),
(32, 'elie@gmail.com', '5b1b68a9abf4d2cd155c81a9225fd158', 'client', '2019-09-07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cmd_id` (`cmd_id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `lignes_commandes`
--
ALTER TABLE `lignes_commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_piece` (`name`),
  ADD KEY `id_client` (`id_client`) USING BTREE,
  ADD KEY `cmd_id` (`cmd_id`);

--
-- Index pour la table `materiaux`
--
ALTER TABLE `materiaux`
  ADD PRIMARY KEY (`code_mat`),
  ADD UNIQUE KEY `intitule_piece` (`name`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom_ut` (`nom_ut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `lignes_commandes`
--
ALTER TABLE `lignes_commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `materiaux`
--
ALTER TABLE `materiaux`
  MODIFY `code_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`nom_ut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `lignes_commandes`
--
ALTER TABLE `lignes_commandes`
  ADD CONSTRAINT `lignes_commandes_ibfk_2` FOREIGN KEY (`name`) REFERENCES `materiaux` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lignes_commandes_ibfk_3` FOREIGN KEY (`cmd_id`) REFERENCES `commandes` (`cmd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lignes_commandes_ibfk_4` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
