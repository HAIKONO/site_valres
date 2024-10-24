-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 24 oct. 2024 à 10:48
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
-- Base de données : `mdll`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie_salle`
--

CREATE TABLE `categorie_salle` (
  `id` int(2) NOT NULL,
  `libelle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categorie_salle`
--

INSERT INTO `categorie_salle` (`id`, `libelle`) VALUES
(1, 'Réunion'),
(2, 'avec équipements'),
(3, 'Amphi');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `nomLogin` varchar(32) DEFAULT NULL,
  `mdpLogin` varchar(32) DEFAULT NULL,
  `id_statut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `nomLogin`, `mdpLogin`, `id_statut`) VALUES
(1, 'BCLEMENT', 'mdp1', 2),
(2, 'BVERONIQUE', 'mdp2', 2),
(3, 'SGILLES', 'mdp3', 4),
(4, 'TPIERRE', 'mdp4', 3),
(5, 'PLEA', 'mdp5', 4),
(6, 'ZSTEPHANIE', 'mdp6', 2),
(7, 'LNATHAN', 'mdp7', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `salle_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `periode` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `salle_nom` varchar(32) NOT NULL,
  `categorie` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `salle_nom`, `categorie`) VALUES
(1, 'Daum', 1),
(2, 'Corbin', 1),
(3, 'Baccarat', 1),
(4, 'Longwy', 1),
(5, 'Multimédia', 2),
(6, 'Amphithéâtre', 3),
(7, 'Lamour', 1),
(8, 'Grüber', 1),
(9, 'Majorelle', 1),
(10, 'Salle de restauration', 2),
(11, 'Galerie', 1),
(12, 'Salle informatique', 2),
(13, 'Hall d\'accueil', 2),
(14, 'Gallé', 1);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id_statut` int(1) NOT NULL,
  `libelle_statut` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `libelle_statut`) VALUES
(1, 'Administrateur'),
(2, 'Secrétariat'),
(3, 'Responsable'),
(4, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `libelle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `structure`
--

INSERT INTO `structure` (`id`, `libelle`) VALUES
(1, 'Ligue'),
(2, 'Club sportif'),
(3, 'Comité départemental'),
(4, 'Association'),
(5, 'Lycée'),
(6, 'Collège'),
(7, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `structure_id` int(2) NOT NULL,
  `structure_nom` varchar(80) NOT NULL,
  `structure_adresse` varchar(80) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='utilisateurs ';

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `nom`, `prenom`, `structure_id`, `structure_nom`, `structure_adresse`, `mail`) VALUES
(1, 'BANDILELLA', 'CLEMENT', 1, 'Ligue Volley Ball Lorraine', '30, rue Widric 1er 54600 Villers lès Nancy', 'cbandilella@llgvolleyball.fr'),
(2, 'BIACQUEL', 'VERONIQUE', 1, 'Ligue d\'escrime Lorraine', '5, rue des trois épis 54600 Villers lès Nancy', 'biancquel.veronique23@llgescrime.fr'),
(3, 'SILBERT', 'GILLES', 2, 'Sporting Club Ennery', '48 Rue Marcel Decker, 57365 Ennery', 'sportingclubennery589@gmail.com'),
(4, 'TORTEMANN', 'PIERRE', 4, 'Association Sportive Nancy Lorraine (ASNL)', '30, rue Widric 1er 54600 Villers lès Nancy', 'contactASNL@laposte.fr'),
(5, 'PERNOT', 'LEA', 5, 'Lycée public Frederic Chopin', '39 rue du Sergent Blandan 54000 Nancy', 'lea.pernot@ac-lorraine.fr'),
(6, 'ZUEL', 'STEPHANIE', 7, 'Fives Nordon', '5 Pl. Aimé Morot 54000 Nancy', 'zuel.s@fivesnordon.ue'),
(7, 'LIEVIN', 'NATHAN', 3, 'FFT- COMITE DEPARTEMENTAL DE TENNIS DE MOSELLE', '42, rue de la commanderie 54840 Sexey les bois', 'lievinn@fft.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie_salle`
--
ALTER TABLE `categorie_salle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_statut` (`id_statut`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrainteUtilisateurId` (`utilisateur_id`),
  ADD KEY `contrainteSalleId` (`salle_id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrainteCategorieId` (`categorie`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id_statut`);

--
-- Index pour la table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`),
  ADD KEY `contrainteStructureId` (`structure_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id_statut` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `contrainteSalleId` FOREIGN KEY (`salle_id`) REFERENCES `salle` (`id`),
  ADD CONSTRAINT `contrainteUtilisateurId` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `contrainteCategorieId` FOREIGN KEY (`categorie`) REFERENCES `categorie_salle` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `contrainteStructureId` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `compte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
