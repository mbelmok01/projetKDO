-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 31 Mars 2014 à 14:54
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `db_kdo`
--
CREATE DATABASE IF NOT EXISTS `db_kdo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_kdo`;

-- --------------------------------------------------------

--
-- Structure de la table `cadeaux`
--

CREATE TABLE IF NOT EXISTS `cadeaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  `prix` int(45) NOT NULL,
  `description` text NOT NULL,
  `etat_achat` varchar(20) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `membres_id` int(11) NOT NULL,
  `importance` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cadeaux_categories1_idx` (`categories_id`),
  KEY `fk_cadeaux_membres1_idx` (`membres_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cadeaux`
--

INSERT INTO `cadeaux` (`id`, `libelle`, `prix`, `description`, `etat_achat`, `categories_id`, `membres_id`, `importance`) VALUES
(1, 'nokia 3310', 100, 'Superbe téléphone portable', 'en-cours', 8, 2, ''),
(3, 'test', 123, 'ceci est un test', '', 3, 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle_UNIQUE` (`libelle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`) VALUES
(18, 'Alimentation'),
(15, 'Animalerie'),
(25, 'Auto'),
(16, 'Beauté'),
(12, 'Bébés'),
(22, 'Bijoux'),
(14, 'Bricolage'),
(20, 'Chaussures'),
(7, 'Consoles'),
(5, 'DVD / Blu-ray'),
(11, 'Enfants'),
(8, 'High-Tech'),
(9, 'Informatique'),
(6, 'Jeux vidéo'),
(10, 'Jouets'),
(3, 'Livres'),
(24, 'Loisirs'),
(13, 'Maison'),
(21, 'Montres'),
(26, 'Moto'),
(4, 'Musique'),
(17, 'Santé'),
(23, 'Sports'),
(19, 'Vêtements');

-- --------------------------------------------------------

--
-- Structure de la table `centres_interet`
--

CREATE TABLE IF NOT EXISTS `centres_interet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `centres_interet`
--

INSERT INTO `centres_interet` (`id`, `libelle`) VALUES
(1, 'Photo'),
(2, 'Musique'),
(3, 'Sport'),
(4, 'Cinema'),
(5, 'Théâtre'),
(6, 'Cuisine'),
(7, 'Jardinage'),
(8, 'Animaux'),
(9, 'Voyage');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `date_evenement` date NOT NULL,
  `etat_evenement` varchar(20) NOT NULL,
  `somme_recoltee` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `complement_adresse` varchar(45) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `initiateur_id` int(11) NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `cadeaux_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evenements_membres1_idx` (`initiateur_id`),
  KEY `fk_evenements_membres2_idx` (`destinataire_id`),
  KEY `fk_evenements_cadeaux1` (`cadeaux_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `nom`, `date_evenement`, `etat_evenement`, `somme_recoltee`, `adresse`, `complement_adresse`, `code_postal`, `ville`, `pays`, `initiateur_id`, `destinataire_id`, `cadeaux_id`) VALUES
(33, 'mariage', '2014-03-23', 'En Cours', '59', '55 rue de la scierie', ' ', 17000, 'la rochelle', 'france', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `complement_adresse` varchar(45) DEFAULT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `telephone` int(20) NOT NULL,
  `portable` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_naissance` datetime NOT NULL,
  `presentation` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `situation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_membre_situation1_idx` (`situation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `adresse`, `complement_adresse`, `code_postal`, `ville`, `pays`, `telephone`, `portable`, `email`, `date_naissance`, `presentation`, `photo`, `situation_id`) VALUES
(1, 'Clavet', 'Tabor', '51 rue Cazade', NULL, 28100, 'Dreux', 'France', 232130411, 732130411, 'tabor.clavet@gmail.com', '1932-06-05 00:00:00', '', NULL, 2),
(2, 'Aubin', 'Yvette', '89 Avenue des Prés', NULL, 78180, 'Montigny', 'France', 143498809, 743498809, 'yvette.aubin@gmail.com', '1992-12-02 00:00:00', '', NULL, 1),
(3, 'Miron', 'Astrid', '45 Chemin des Bateliers', NULL, 20090, 'Ajaccio', 'France', 460838431, 760838431, 'astrid.miron@gmail.com', '1982-11-23 00:00:00', '', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre_centres_interet`
--

CREATE TABLE IF NOT EXISTS `membre_centres_interet` (
  `membres_id` int(11) NOT NULL,
  `centres_interet_id` int(11) NOT NULL,
  KEY `fk_membre_centres_interet_membres1_idx` (`membres_id`),
  KEY `fk_membre_centres_interet_centres_interet1_idx` (`centres_interet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre_centres_interet`
--

INSERT INTO `membre_centres_interet` (`membres_id`, `centres_interet_id`) VALUES
(1, 2),
(1, 3),
(2, 2),
(2, 6),
(3, 5),
(3, 9);

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `membres_id` int(11) NOT NULL,
  `evenements_id` int(11) NOT NULL,
  KEY `fk_participants_membres1_idx` (`membres_id`),
  KEY `fk_participants_evenements1_idx` (`evenements_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participants`
--

INSERT INTO `participants` (`membres_id`, `evenements_id`) VALUES
(1, 33),
(2, 33),
(3, 33);

-- --------------------------------------------------------

--
-- Structure de la table `situations`
--

CREATE TABLE IF NOT EXISTS `situations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle_UNIQUE` (`libelle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `situations`
--

INSERT INTO `situations` (`id`, `libelle`) VALUES
(1, 'Célibataire'),
(2, 'Marié'),
(3, 'Pacsé');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_evenement`
--
CREATE TABLE IF NOT EXISTS `v_evenement` (
`nom_evenement` varchar(45)
,`date_evenement` date
,`etat_evenement` varchar(20)
,`somme_recoltee` varchar(45)
,`nom_cadeau` varchar(45)
,`prix_cadeau` int(45)
,`description_cadeau` text
,`etat_achat_cadeau` varchar(20)
,`destinataire_id` int(11)
,`initiateur_id` int(11)
,`cadeau_id` int(11)
,`nom_destinataire` varchar(45)
,`adresse` varchar(45)
,`complement_adresse` varchar(45)
,`code_postal` int(11)
,`ville` varchar(45)
,`pays` varchar(45)
,`id_evenement` int(11)
);
-- --------------------------------------------------------

--
-- Structure de la vue `v_evenement`
--
DROP TABLE IF EXISTS `v_evenement`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_evenement` AS select `evenements`.`nom` AS `nom_evenement`,`evenements`.`date_evenement` AS `date_evenement`,`evenements`.`etat_evenement` AS `etat_evenement`,`evenements`.`somme_recoltee` AS `somme_recoltee`,`cadeaux`.`libelle` AS `nom_cadeau`,`cadeaux`.`prix` AS `prix_cadeau`,`cadeaux`.`description` AS `description_cadeau`,`cadeaux`.`etat_achat` AS `etat_achat_cadeau`,`evenements`.`destinataire_id` AS `destinataire_id`,`evenements`.`initiateur_id` AS `initiateur_id`,`cadeaux`.`id` AS `cadeau_id`,`membres`.`nom` AS `nom_destinataire`,`evenements`.`adresse` AS `adresse`,`evenements`.`complement_adresse` AS `complement_adresse`,`evenements`.`code_postal` AS `code_postal`,`evenements`.`ville` AS `ville`,`evenements`.`pays` AS `pays`,`evenements`.`id` AS `id_evenement` from ((`evenements` join `cadeaux` on((`evenements`.`cadeaux_id` = `cadeaux`.`id`))) left join `membres` on((`evenements`.`initiateur_id` = `membres`.`id`)));

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cadeaux`
--
ALTER TABLE `cadeaux`
  ADD CONSTRAINT `fk_cadeaux_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cadeaux_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `fk_evenements_cadeaux1` FOREIGN KEY (`cadeaux_id`) REFERENCES `cadeaux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_membres1` FOREIGN KEY (`initiateur_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evenements_membres2` FOREIGN KEY (`destinataire_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `situation_id` FOREIGN KEY (`situation_id`) REFERENCES `situations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membre_centres_interet`
--
ALTER TABLE `membre_centres_interet`
  ADD CONSTRAINT `fk_membre_centres_interet_centres_interet1` FOREIGN KEY (`centres_interet_id`) REFERENCES `centres_interet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_membre_centres_interet_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `fk_participants_evenements1` FOREIGN KEY (`evenements_id`) REFERENCES `evenements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participants_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
