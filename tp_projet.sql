-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mai 2024 à 20:34
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `Pseudo` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`Pseudo`, `Email`, `Password`) VALUES
('Adrien21', 'a.bonnand64@gmail.com', 'bf90ffb5baba15b0056924f9e3eeaf0ab0f57996f3f600418f15011e50393b7b'),
('Albertdu76', 'alb.smeets@free.fr', 'd51d1b205fcb1e7b6f6f36a091f9ad9592331b4d4e82ed620e17f7fedfe968b3'),
('Paul71Chalon', 'paul.lesbats@gmail.com', 'e5fe0be2cc977cfbfd3f876b50916820228e38ce9716ab05db5f05d05a73bd76');

-- --------------------------------------------------------

--
-- Structure de la table `grid`
--

CREATE TABLE `grid` (
  `id` int(16) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `grid`
--

INSERT INTO `grid` (`id`, `Name`) VALUES
(1, 'first'),
(2, 'second');

-- --------------------------------------------------------

--
-- Structure de la table `pixel`
--

CREATE TABLE `pixel` (
  `id` int(16) NOT NULL,
  `Color` varchar(7) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `IdGrid` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pixel`
--

INSERT INTO `pixel` (`id`, `Color`, `Pseudo`, `IdGrid`) VALUES
(1, '#FF5733', 'Adrien21', 1),
(66, '#000000', 'Adrien21', 1),
(67, '#000000', 'Adrien21', 1),
(71, '#000000', 'Adrien21', 1),
(72, '#000000', 'Adrien21', 1),
(78, '#000000', 'Adrien21', 1),
(81, '#000000', 'Adrien21', 1),
(82, '#000000', 'Adrien21', 1),
(86, '#000000', 'Adrien21', 1),
(87, '#000000', 'Adrien21', 1),
(95, '#000000', 'Adrien21', 1),
(98, '#000000', 'Adrien21', 1),
(100, '#000000', 'Adrien21', 1),
(103, '#000000', 'Adrien21', 1),
(107, '#000000', 'Adrien21', 1),
(110, '#000000', 'Adrien21', 1),
(113, '#000000', 'Adrien21', 1),
(115, '#000000', 'Adrien21', 1),
(118, '#000000', 'Adrien21', 1),
(127, '#000000', 'Adrien21', 1),
(130, '#000000', 'Adrien21', 1),
(133, '#000000', 'Adrien21', 1),
(137, '#000000', 'Adrien21', 1),
(142, '#000000', 'Adrien21', 1),
(145, '#000000', 'Adrien21', 1),
(148, '#000000', 'Adrien21', 1),
(156, '#000000', 'Adrien21', 1),
(160, '#000000', 'Adrien21', 1),
(163, '#000000', 'Adrien21', 1),
(166, '#000000', 'Adrien21', 1),
(171, '#000000', 'Adrien21', 1),
(175, '#000000', 'Adrien21', 1),
(178, '#000000', 'Adrien21', 1),
(185, '#000000', 'Adrien21', 1),
(190, '#000000', 'Adrien21', 1),
(193, '#000000', 'Adrien21', 1),
(196, '#000000', 'Adrien21', 1),
(200, '#000000', 'Adrien21', 1),
(205, '#000000', 'Adrien21', 1),
(208, '#000000', 'Adrien21', 1),
(215, '#000000', 'Adrien21', 1),
(216, '#000000', 'Adrien21', 1),
(217, '#000000', 'Adrien21', 1),
(218, '#000000', 'Adrien21', 1),
(221, '#000000', 'Adrien21', 1),
(222, '#000000', 'Adrien21', 1),
(225, '#000000', 'Adrien21', 1),
(230, '#000000', 'Adrien21', 1),
(231, '#000000', 'Adrien21', 1),
(232, '#000000', 'Adrien21', 1),
(233, '#000000', 'Adrien21', 1),
(236, '#000000', 'Adrien21', 1),
(237, '#000000', 'Adrien21', 1),
(308, '#000000', 'Adrien21', 1),
(309, '#000000', 'Adrien21', 1),
(312, '#000000', 'Adrien21', 1),
(318, '#000000', 'Adrien21', 1),
(320, '#000000', 'Adrien21', 1),
(321, '#000000', 'Adrien21', 1),
(322, '#000000', 'Adrien21', 1),
(337, '#000000', 'Adrien21', 1),
(340, '#000000', 'Adrien21', 1),
(342, '#000000', 'Adrien21', 1),
(348, '#000000', 'Adrien21', 1),
(350, '#000000', 'Adrien21', 1),
(353, '#000000', 'Adrien21', 1),
(367, '#000000', 'Adrien21', 1),
(373, '#000000', 'Adrien21', 1),
(377, '#000000', 'Adrien21', 1),
(380, '#000000', 'Adrien21', 1),
(383, '#000000', 'Adrien21', 1),
(398, '#000000', 'Adrien21', 1),
(399, '#000000', 'Adrien21', 1),
(403, '#000000', 'Adrien21', 1),
(407, '#000000', 'Adrien21', 1),
(410, '#000000', 'Adrien21', 1),
(411, '#000000', 'Adrien21', 1),
(412, '#000000', 'Adrien21', 1),
(430, '#000000', 'Adrien21', 1),
(434, '#000000', 'Adrien21', 1),
(436, '#000000', 'Adrien21', 1),
(440, '#000000', 'Adrien21', 1),
(457, '#000000', 'Adrien21', 1),
(460, '#000000', 'Adrien21', 1),
(464, '#000000', 'Adrien21', 1),
(466, '#000000', 'Adrien21', 1),
(470, '#000000', 'Adrien21', 1),
(488, '#000000', 'Adrien21', 1),
(489, '#000000', 'Adrien21', 1),
(495, '#000000', 'Adrien21', 1),
(500, '#000000', 'Adrien21', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Pseudo`);

--
-- Index pour la table `grid`
--
ALTER TABLE `grid`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pixel`
--
ALTER TABLE `pixel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pseudo` (`Pseudo`),
  ADD KEY `fk_idGrid` (`IdGrid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `grid`
--
ALTER TABLE `grid`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `pixel`
--
ALTER TABLE `pixel`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2702;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pixel`
--
ALTER TABLE `pixel`
  ADD CONSTRAINT `fk_idGrid` FOREIGN KEY (`IdGrid`) REFERENCES `grid` (`id`),
  ADD CONSTRAINT `fk_pseudo` FOREIGN KEY (`Pseudo`) REFERENCES `account` (`Pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
