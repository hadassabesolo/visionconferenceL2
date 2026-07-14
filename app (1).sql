-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 juil. 2026 à 10:48
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
-- Base de données : `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `consulter`
--

CREATE TABLE `consulter` (
  `id_patients` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `consulter`
--

INSERT INTO `consulter` (`id_patients`, `id_medecin`) VALUES
(2, 2),
(3, 2),
(4, 2),
(5, 4),
(7, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id_dep` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `id_hopital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id_dep`, `nom`, `id_hopital`) VALUES
(1, 'cardiologie', 1),
(2, 'cardiologie', 2),
(3, 'cardiologie', 3),
(4, 'cardiologie', 4),
(5, 'cardiologie', 5),
(6, 'cardiologie', 6),
(7, 'cardiologie', 7),
(8, 'cardiologie', 8),
(9, 'ophtamologie', 1),
(10, 'ophtamologie', 2),
(11, 'ophtamologie', 3),
(12, 'ophtamologie', 4),
(13, 'ophtamologie', 5),
(14, 'ophtamologie', 6),
(15, 'ophtamologie', 7),
(16, 'ophtamologie', 8),
(17, 'gynecologie', 1),
(18, 'gynecologie', 2),
(19, 'gynecologie', 3),
(20, 'gynecologie', 4),
(21, 'gynecologie', 5),
(22, 'gynecologie', 6),
(23, 'gynecologie', 7),
(24, 'gynecologie', 8),
(25, 'medecin general', 1),
(26, 'medecin general', 2),
(27, 'medecin general', 3),
(28, 'medecin general', 4),
(29, 'medecin general', 5),
(30, 'medecin general', 6),
(31, 'medecin general', 7),
(32, 'medecin general', 8);

-- --------------------------------------------------------

--
-- Structure de la table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `matricule` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gestionnaire`
--

INSERT INTO `gestionnaire` (`id`, `nom`, `prenom`, `matricule`) VALUES
(1, 'lokindola', 'josue', 'PR001'),
(2, 'bekindo', 'sarah', 'AI600');

-- --------------------------------------------------------

--
-- Structure de la table `hopital`
--

CREATE TABLE `hopital` (
  `id_hopital` int(11) NOT NULL,
  `noms` varchar(25) DEFAULT NULL,
  `adress` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hopital`
--

INSERT INTO `hopital` (`id_hopital`, `noms`, `adress`) VALUES
(1, 'clinique ngaliema', 'gombe'),
(2, 'cinquantenaire', 'commune de  kinshasa'),
(3, 'monkole', 'mongafula'),
(4, 'CUK', 'lemba'),
(5, 'mama yemo', 'gombe'),
(6, 'saint joseph', 'limete'),
(7, 'hj hospital', 'limet'),
(8, 'CMK', 'gombe');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id_medecin` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `specialisation` varchar(25) DEFAULT NULL,
  `nationalite` varchar(25) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `matricule` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id_medecin`, `nom`, `prenom`, `specialisation`, `nationalite`, `id_dep`, `matricule`) VALUES
(1, 'conde', 'dimitri', 'cardiologue', 'congolais', 1, 'CO001'),
(2, 'saul', 'rajab', 'ophtamologue', 'libanais', 9, 'SA002'),
(3, 'mena', 'malika', 'gynecologue', 'egyptienne', 17, 'ME003'),
(4, 'besolo', 'veronique', 'medecin', 'congolaise', 26, 'VE004');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id_patients` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `pays` varchar(25) DEFAULT NULL,
  `region` varchar(25) DEFAULT NULL,
  `motif` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `id_hopital` int(11) DEFAULT NULL,
  `mot_de_passe` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id_patients`, `nom`, `date_naiss`, `pays`, `region`, `motif`, `prenom`, `id_hopital`, `mot_de_passe`) VALUES
(1, 'besolo', '2006-06-28', 'RDC', 'kinshasa', 'fievre', 'esther', 2, 'bosniherzegovine'),
(2, 'besolo', '2006-06-28', 'RDC', 'kinshasa', 'fievre', 'fanny', 2, 'venise'),
(3, 'besolo', '2006-06-28', 'RDC', 'kinshasa', 'crise cardiaque', 'joyce', 2, 'SI03'),
(4, 'rita', '2002-07-30', 'Sénégal', 'dakar', 'catarat', 'ora', 3, 'aria20'),
(5, 'manyayi', '2006-05-17', 'RDC', 'kin', 'mal des yeux', 'aaron', 1, 'real'),
(6, 'dorothe', '1998-04-22', 'Maroc', 'rabat', 'maux de tete', 'samara', 6, 'avril'),
(7, 'maria', '2007-09-22', 'France', 'toulouse', 'toux', 'elisa', 4, 'zagreb'),
(8, 'lokindola', '1968-04-16', 'RDC', 'kinshasa', 'crise cardiaque', 'richard', 5, 'mercedes');

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE `payement` (
  `id_payement` int(11) NOT NULL,
  `montant` int(11) DEFAULT NULL,
  `mode_paiement` varchar(25) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `id_patients` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `payement`
--

INSERT INTO `payement` (`id_payement`, `montant`, `mode_paiement`, `date_paiement`, `id_patients`) VALUES
(1, 120000, 'airtel money', '2026-07-11', 0),
(2, 120000, 'M_pesa', '2026-07-11', 2),
(3, 120000, 'rawbanck', '2026-07-11', 3),
(4, 120000, 'illico cash', '2026-07-12', 4),
(5, 120000, 'M-pesa', '2026-07-12', 5),
(6, 120000, 'rawbanck', '2026-07-14', 7),
(7, 120000, 'M-pesa', '2026-07-14', 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consulter`
--
ALTER TABLE `consulter`
  ADD PRIMARY KEY (`id_patients`,`id_medecin`),
  ADD KEY `FK_consulter_id_medecin` (`id_medecin`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `FK_departements_id_hopital` (`id_hopital`);

--
-- Index pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hopital`
--
ALTER TABLE `hopital`
  ADD PRIMARY KEY (`id_hopital`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_medecin`),
  ADD KEY `FK_medecin_id_dep` (`id_dep`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patients`),
  ADD KEY `FK_patients_id_hopital` (`id_hopital`);

--
-- Index pour la table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id_payement`),
  ADD KEY `FK_payement_id_patients` (`id_patients`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `hopital`
--
ALTER TABLE `hopital`
  MODIFY `id_hopital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_medecin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `payement`
--
ALTER TABLE `payement`
  MODIFY `id_payement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consulter`
--
ALTER TABLE `consulter`
  ADD CONSTRAINT `FK_consulter_id_medecin` FOREIGN KEY (`id_medecin`) REFERENCES `medecin` (`id_medecin`),
  ADD CONSTRAINT `FK_consulter_id_patients` FOREIGN KEY (`id_patients`) REFERENCES `patients` (`id_patients`);

--
-- Contraintes pour la table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `FK_departements_id_hopital` FOREIGN KEY (`id_hopital`) REFERENCES `hopital` (`id_hopital`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `FK_medecin_id_dep` FOREIGN KEY (`id_dep`) REFERENCES `departements` (`id_dep`);

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `FK_patients_id_hopital` FOREIGN KEY (`id_hopital`) REFERENCES `hopital` (`id_hopital`);

--
-- Contraintes pour la table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `FK_payement_id_patients` FOREIGN KEY (`id_patients`) REFERENCES `patients` (`id_patients`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
