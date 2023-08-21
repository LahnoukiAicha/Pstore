-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 août 2023 à 18:22
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `nomArticle` varchar(20) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prixUnitaire` int(11) NOT NULL,
  `dateFab` datetime NOT NULL,
  `dateExp` datetime NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `nomArticle`, `id_categorie`, `quantite`, `prixUnitaire`, `dateFab`, `dateExp`, `images`) VALUES
(16, 'momo', 3, 1050, 1, '2023-06-20 19:12:00', '2025-06-20 22:23:00', '../public/images/momo.jpg'),
(17, 'oreo', 3, 120, 3, '2023-02-10 19:19:00', '2023-09-10 19:19:00', '../public/images/oreo.jpg'),
(18, 'activia', 6, 200, 3, '2023-08-19 00:22:00', '2024-03-22 00:27:00', '../public/images/activia.jpg'),
(19, 'yawmi', 6, 320, 2, '2023-03-18 19:23:00', '2024-11-24 23:28:00', '../public/images/yawmi.jpg'),
(20, 'delice', 6, 115, 2, '2021-12-03 21:25:00', '2023-09-08 01:31:00', '../public/images/delice.jpg'),
(21, 'grekk', 6, 310, 3, '2023-08-03 19:26:00', '2026-08-23 19:26:00', '../public/images/grekk.jpg'),
(22, 'Centrale', 4, 620, 7, '2023-08-20 23:28:00', '2023-08-23 23:28:00', '../public/images/milkCentrale.jpg'),
(23, 'jibal', 4, 430, 8, '2023-08-30 00:29:00', '2023-09-03 03:29:00', '../public/images/milkjibal.jpg'),
(24, 'jaouda', 4, 323, 8, '2023-08-22 19:31:00', '2023-08-31 19:31:00', '../public/images/milkJawda.jpg'),
(25, 'Tonik', 3, 450, 1, '2022-08-11 19:33:00', '2023-09-10 19:33:00', '../public/images/tonik.jpg'),
(26, 'Merendina', 3, 310, 2, '2023-08-02 19:34:00', '2023-09-09 19:34:00', '../public/images/merendina.jpg'),
(27, 'tango', 3, 156, 2, '2023-08-04 19:36:00', '2024-04-07 00:36:00', '../public/images/tango.jpg'),
(28, 'Henry\'s', 3, 300, 3, '2023-08-15 19:36:00', '2024-09-28 20:36:00', '../public/images/henrys.jpg'),
(29, 'Linéa', 4, 90, 10, '2023-08-11 01:44:00', '2023-09-14 00:38:00', '../public/images/milklinéa.jpg'),
(30, 'Svelty', 4, 70, 9, '2023-09-10 19:39:00', '2024-03-13 23:43:00', '../public/images/svelty.jpg'),
(31, 'Kiri', 5, 320, 2, '2023-08-18 19:39:00', '2024-03-18 06:39:00', '../public/images/kiri.jpg'),
(32, 'Cœur de lait', 5, 200, 1, '2023-08-02 19:40:00', '2023-09-09 01:46:00', '../public/images/crdl.jpg'),
(33, 'la vache qui rit', 5, 250, 2, '2023-08-01 19:41:00', '2025-10-20 19:41:00', '../public/images/lavakirit.jpg'),
(34, 'jebli', 5, 510, 4, '2023-08-26 19:41:00', '2030-08-04 22:44:00', '../public/images/jebli.jpg'),
(35, 'Or blanc', 5, 154, 3, '2023-09-01 19:42:00', '2027-09-03 00:48:00', '../public/images/orblanc.jpg'),
(36, 'Granulé', 10, 60, 20, '2023-08-24 01:44:00', '2025-08-25 19:44:00', '../public/images/sanida.jpg'),
(37, 'pain de sucre', 10, 330, 25, '2023-08-18 19:45:00', '2030-08-19 10:45:00', '../public/images/painsucre.jpg'),
(38, 'Lingots', 10, 112, 18, '2023-08-30 19:46:00', '2030-08-31 09:25:00', '../public/images/tobsucre.jpg'),
(39, 'tagger', 3, 500, 2, '2023-09-01 19:47:00', '2026-08-04 21:47:00', '../public/images/tagger.jpg'),
(40, 'Fanta', 7, 460, 12, '2023-08-10 19:47:00', '2025-08-17 19:48:00', '../public/images/fanta.jpg'),
(41, 'Hawai', 7, 230, 13, '2023-09-01 19:50:00', '2024-06-29 00:50:00', '../public/images/hawai.jpg'),
(42, 'Coca Cola', 7, 330, 10, '2023-08-10 19:51:00', '2030-08-31 19:51:00', '../public/images/coca.jpg'),
(43, 'Pepsi', 7, 320, 12, '2023-08-30 19:51:00', '2024-05-05 00:51:00', '../public/images/pepsi.jpg'),
(44, 'Poms', 7, 150, 15, '2023-08-09 08:52:00', '2024-05-10 12:52:00', '../public/images/poms.jpg'),
(45, 'La Hollandaise', 5, 200, 3, '2020-07-31 19:52:00', '2023-10-26 01:53:00', '../public/images/hollandaise.jpg'),
(46, 'Spaghetti', 11, 200, 6, '2023-08-01 20:07:00', '2030-09-02 20:07:00', '../public/images/spaghetti.jpg'),
(47, 'couscous', 11, 520, 12, '2023-08-11 00:08:00', '2028-09-08 20:08:00', '../public/images/dari.jpg'),
(49, 'dur', 9, 267, 26, '2023-09-01 01:16:00', '2029-08-04 20:11:00', '../public/images/dur.jpg'),
(50, 'Raibi', 6, 150, 2, '2023-08-13 21:16:00', '2030-09-01 03:14:00', '../public/images/jamila.jpg'),
(51, 'lion 4011', 13, 300, 10, '2023-08-27 21:19:00', '2024-03-08 03:19:00', '../public/images/lion.jpg'),
(52, 'Sultane', 13, 110, 36, '2023-08-24 21:20:00', '2026-09-01 21:20:00', '../public/images/sultan.jpg'),
(53, 'Sinia', 13, 45, 63, '2023-08-25 21:21:00', '2030-08-12 23:21:00', '../public/images/sinia.jpg'),
(54, 'Tendre', 9, 75, 100, '2023-08-24 16:01:00', '2035-08-25 15:01:00', '../public/images/farine.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categoriearticle`
--

CREATE TABLE `categoriearticle` (
  `id` int(11) NOT NULL,
  `libelle` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categoriearticle`
--

INSERT INTO `categoriearticle` (`id`, `libelle`) VALUES
(3, 'BIMO'),
(4, 'LE LAIT'),
(5, 'FROMAGE'),
(6, 'YOGURT'),
(7, 'LIMONADE'),
(8, 'JUS'),
(9, 'BLE'),
(10, 'SUCRE'),
(11, 'PATES'),
(12, 'CAFE'),
(13, 'THé');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `adresse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `tele`, `adresse`) VALUES
(6, 'Lahnouki ', 'Mohammed', '063625451', 'Marrakech'),
(7, 'Hadeg ', 'Hiba', '0625113395', 'Casablanca'),
(8, 'Lotfy', 'Imane', '0745358412', 'Meknas'),
(9, 'Manadir', 'Ibtissam', '0623215466', 'Casablanca');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `dateCmde` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_article`, `id_fournisseur`, `quantite`, `prix`, `dateCmde`, `etat`) VALUES
(9, 16, 13, 1000, 1000, '2023-08-20 20:23:53', '1'),
(10, 26, 13, 200, 400, '2023-08-20 20:25:26', '1'),
(11, 22, 10, 120, 840, '2023-08-20 20:25:35', '1'),
(12, 31, 12, 200, 400, '2023-08-20 20:25:51', '1'),
(13, 49, 17, 200, 5200, '2023-08-20 20:26:13', '1'),
(14, 24, 11, 10, 80, '2023-08-21 13:37:25', '1'),
(15, 47, 15, 20, 240, '2023-08-21 13:37:54', '1'),
(16, 37, 20, 230, 5750, '2023-08-21 14:05:13', '1');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `tele` varchar(20) NOT NULL,
  `adresse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `prenom`, `tele`, `adresse`) VALUES
(10, 'Centrale', 'Laiterire', '+526485741', 'Casablanca'),
(11, 'Jaouda', 'Laiterire', '0524483612', 'Casablanca Nearshore Park Shor'),
(12, 'jibal', 'Laiterire', '+521486325', 'Casablanca Nearshore Park Shor'),
(13, 'BIMO', 'Biscuiteri', '0512456395', 'Casablanca'),
(14, 'Excelo', 'Biscuiteri', '+522964743', 'Zone industrielle du Sahel, lo'),
(15, 'Dari', 'Blé,pates.', '+536254712', 'Lot 42 quartier industriel ezz'),
(16, 'Al Itkane', 'Blé,pates.', '+526485755', 'Casablanca'),
(17, 'MayMouna', 'Blé,pates.', '+522365823', 'Siège Forafric Maroc  29, rue '),
(18, 'Tria', 'Blé,pates.', '0553252489', 'Casablanca'),
(19, 'Lion', 'Thé', '0523147855', 'Casablanca'),
(20, 'Cosumar', 'Sucrerie', '+522365936', '8 rue El Mouatamid Ibnou Abbad');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `dateVente` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `id_article`, `id_client`, `quantite`, `prix`, `dateVente`, `etat`) VALUES
(16, 16, 6, 50, 50, '2023-08-21 13:40:09', '1'),
(17, 29, 8, 20, 200, '2023-08-21 13:42:20', '1'),
(18, 42, 9, 120, 1200, '2023-08-21 13:42:30', '1'),
(19, 51, 7, 200, 2000, '2023-08-21 13:42:45', '1'),
(20, 52, 6, 10, 360, '2023-08-21 13:42:53', '1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`id_categorie`);

--
-- Index pour la table `categoriearticle`
--
ALTER TABLE `categoriearticle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_fournisseur` (`id_fournisseur`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `categoriearticle`
--
ALTER TABLE `categoriearticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `cmd1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `cmd2` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id`);

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `vente2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
