-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 mai 2023 à 12:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `role` int(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `role`, `id_user`) VALUES
(19, 1, 70);

-- --------------------------------------------------------

--
-- Structure de la table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `archive`
--

INSERT INTO `archive` (`id`, `nom`, `description`, `email`) VALUES
(4567947, 'hhh', 'dfhghjk', 'ranounouch.kh@gmail.com'),
(4567930, 'hhh', 'dfhghjk', 'ranounouch.kh@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `archived` varchar(20) NOT NULL DEFAULT 'not_archived'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `nom`, `description`, `email`, `archived`) VALUES
(4567961, 'hhh', 'dfcedfv', 'rannniakhedri@gmail.com', 'not_archived'),
(4567962, 'hhh', 'dfcedfv', 'rannniakhedri@gmail.com', 'not_archived'),
(4567963, 'vbnx', 'fghjk', 'rannniakhedri@gmail.com', 'not_archived'),
(4567964, 'achref', 'vbn', 'rannniakhedri@gmail.com', 'not_archived'),
(4567965, 'amir', 'cvbn,:;', 'rannniakhedri@gmail.com', 'not_archived'),
(4567966, 'amir', 'cvbn,:;', 'rannniakhedri@gmail.com', 'not_archived'),
(4567967, 'vbn,', 'xdgcfhjkl,', 'rannniakhedri@gmail.com', 'not_archived');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `id_reclamation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  `dateN` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `token` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `uname`, `email`, `pswd`, `dateN`, `image`, `token`) VALUES
(70, 'karim', 'rannniakhedri@gmail.com', '$2y$10$gcr2dXBz21ZLE63aI9zM2Oc4rFFkNnw.whJDgOPGxeb', '2001-07-16', 'Sans titre (34).jpg', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-username` (`id_user`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reclamation` (`id_reclamation`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4567968;

--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk-username` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`id_reclamation`) REFERENCES `reclamation` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
