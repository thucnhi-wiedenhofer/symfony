-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 04 oct. 2021 à 09:34
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_9474526C4B89032C` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `author`, `content`, `date`) VALUES
(1, 1, '', 'Délicieux et rapides, que demander de plus!', '2021-09-13 12:00:00'),
(2, 2, '', 'Ces recettes nous font voyager', '2021-09-13 12:00:00'),
(3, 3, '', 'Ma grand mère faisait la même recette', '2021-09-13 12:00:00'),
(4, 1, 'dorian', 'Merci pour toutes ces idées gourmandes!', '2021-10-03 17:49:19'),
(5, 3, 'mimis', 'comme à la maison!', '2021-10-03 17:51:11');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `date`, `img`, `updated_at`) VALUES
(1, 'Recettes Express', 'Repas prêt en 30 minutes chrono', '2021-09-13 12:00:00', 'moules.jpg', NULL),
(2, 'Recettes exotiques', 'A la découverte des saveurs orientales', '2021-09-20 12:00:00', 'bol.jpg', NULL),
(3, 'Recettes traditionnelles', 'Redécouvrons les plats typiques de nos régions', '2021-09-15 12:00:00', 'plat.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `roles`) VALUES
(1, 'liliane', '$argon2id$v=19$m=65536,t=4,p=1$Z2FMc1BJUWljekVtcGJKeA$+H/1gJaP+qlVJlxpWx0G2p+cuILg+B36J1uSNQObYYQ', 'ROLE_USER'),
(2, 'noemie', '$argon2id$v=19$m=65536,t=4,p=1$NkRUV2dpVXc3ZU5OUDMvcQ$+oUSGBYk1lk6oFX4nCjCOYOsLQ9M+k6LWyuP44MdUYM', 'ROLE_ADMIN'),
(4, 'dorian', '$argon2id$v=19$m=65536,t=4,p=1$RkVXdTFSUGdON2h1dWltLg$Szm3awk1C5p0l4NgxUQH5FUCE0eBVTuTGT1DxV2fLIo', 'ROLE_USER');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C4B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
