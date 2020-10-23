-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 21 oct. 2020 à 20:24
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cpourunquizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `Answers_ID` int NOT NULL AUTO_INCREMENT,
  `Answer` text NOT NULL,
  `ID_extQuestions` int NOT NULL,
  PRIMARY KEY (`Answers_ID`),
  KEY `ID_extQuestions` (`ID_extQuestions`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`Answers_ID`, `Answer`, `ID_extQuestions`) VALUES
(1, 'saucisse lentille', 14),
(2, 'et d\'épouser Aladin', 3),
(3, 'G-Zel', 7),
(4, 'Le PDC', 6),
(5, 'La pizza dégueulie', 5),
(6, 'Xavier Bolan', 12),
(7, 'Un petit écureuil', 2),
(8, 'Ouais', 11),
(9, 'Pour nous faire chier', 4),
(10, 'Sortez-vous les doigts du cul', 1),
(11, 'Pas de chatte', 8),
(12, 'stomäl', 20),
(13, 'à la fin ils sont plus amis pour la vie', 15),
(14, 'Des ringards mais des sacrés fêtards', 16),
(15, 'Les monos de ski', 18),
(16, 'Les petits gitans', 19),
(17, 'Le piment d’Espelette', 21),
(18, 'Pas de moulinette', 25),
(19, 'Sur Autoroute radio', 26),
(20, 'C\'est du pipi', 27),
(21, 'Ken', 28),
(22, 'Y\'a des bubulles', 29),
(23, 'A 1000', 30),
(24, 'et puis j\'vais tondre la pelouse', 24),
(25, 'Ton zizi', 22),
(26, 'Mais la mienne est décédée', 23),
(27, 'Grégoire Ludig', 9),
(28, 'David Marsais', 9),
(29, 'Jonathan Barré', 9),
(30, 'C\'était en hiver', 10),
(31, 'Aux alentours de 0 degrés Celsius', 10),
(32, 'Ils auraient mieux fait de porter des doudounes', 10),
(33, 'Des petits clous rouillés avec le tétanos', 13),
(34, 'Des fourmis rouge', 13),
(35, 'Des petites braises', 13),
(36, 'Denis', 17),
(37, 'Serge', 17),
(38, 'Lionel', 17);

-- --------------------------------------------------------

--
-- Structure de la table `did`
--

DROP TABLE IF EXISTS `did`;
CREATE TABLE IF NOT EXISTS `did` (
  `ID_extPlayer` int NOT NULL,
  `ID_extQuizz` int NOT NULL,
  `Score` int NOT NULL,
  PRIMARY KEY (`ID_extPlayer`,`ID_extQuizz`),
  KEY `ID_extQuizz` (`ID_extQuizz`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `Player_ID` int NOT NULL AUTO_INCREMENT,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Mail` text NOT NULL,
  PRIMARY KEY (`Player_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `Question_ID` int NOT NULL AUTO_INCREMENT,
  `Content` text NOT NULL,
  `ID_extQuizz` int NOT NULL,
  PRIMARY KEY (`Question_ID`),
  KEY `ID_extQuizz` (`ID_extQuizz`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`Question_ID`, `Content`, `ID_extQuizz`) VALUES
(1, 'Compléter les paroles :\r\n\r\nAllez l\'équipe de France on y croit, on vous fait confiance ! Foncez rien n\'est perdu mais ...', 1),
(2, 'Quelle est la fameuse comptine de notre enfance ?', 1),
(3, 'Compléter les paroles :\r\n\r\nLiberté, c\'est de me faire une couleur, d\'enfin écouter mon cœur ....', 1),
(4, 'Pourquoi les bureaux sont toujours fermés à la poste ?', 2),
(5, 'Comment  appelle-t-on la célèbre pizza montagnarde ?', 2),
(6, 'Quel est le plus compliqué dans le métier de sauveteur ?', 2),
(7, 'Quelle est la célèbre marque de vêtement de Sydney et Enzo ?', 2),
(8, 'Quelle est la nouvelle comédie familiale de l\'année ?', 3),
(9, 'Par qui a été créé Very Bad Blague ?\r\n(3 réponse attendues)', 3),
(10, 'Parle nous de la guerre froide ?', 3),
(11, 'Y\'a quelqu\'un là dedans ?', 3),
(12, 'Qui est le meilleur réalisateur ?', 3),
(13, 'Quelles sont les nouvelles règle de l\'épreuve des poteaux ?', 3),
(14, 'Que mangent les députés de l\'Assemblée nationale le lundi midi ?', 3),
(15, 'Compléter les paroles :\r\n\r\nRox et Rouky étaient amis pour la vie mais en fait ...', 1),
(16, 'Compléter les paroles :\r\n\r\nLui c\'est Gaspard et moi c\'est Balthazar, on n\'est pas ...', 1),
(17, 'Qui sont les rockstars du calendar ?', 1),
(18, 'Compléter ces paroles :\r\n\r\nHey ! tu sais c\'est qui ...', 1),
(19, 'Qui a volé les crayons de papier ?', 2),
(20, 'Comment s\'écrit le fameux modèle d\'Ikeo ?', 2),
(21, 'Quel est l\'aliment préféré de Yves Côtedeporc ?', 2),
(22, 'Compléter les paroles :\r\n\r\nTon sourire de soleil n\'a pas son pareil comme ...', 1),
(23, 'Trouver les paroles :\r\n\r\nCe weekend c\'est la fête des mères ...', 1),
(24, 'Trouver la suite des paroles :\r\n\r\nJe sais qu\'tu nous jalouses, dans ma piscine pépouze avec mes andalouses ...\r\n ', 1),
(25, 'Qu\'est-ce qu\'il n\'y a pas dans la pêche à la mouche ?', 2),
(26, 'Où peut on écouter le péage de\r\nsaint-arnoult ?', 3),
(27, 'Quelle est la sauce piquante de gromino\'s pizza ?', 3),
(28, 'Vous n\'aimez pas vos imperfections ? C\'est pas grave lui il a juste envie de ...', 2),
(29, 'Quelle est la particularité de l\'eau Zorana ?', 3),
(30, 'A combien passe le taux d\'alcoolémie dans le sang ?', 2);

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
CREATE TABLE IF NOT EXISTS `quizz` (
  `Quizz_ID` int NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Theme` text NOT NULL,
  PRIMARY KEY (`Quizz_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quizz`
--

INSERT INTO `quizz` (`Quizz_ID`, `Name`, `Theme`) VALUES
(1, 'Quizz 1', 'Chansons'),
(2, 'Quizz 2', 'Amateur'),
(3, 'Quizz 3', 'Expert');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`ID_extQuestions`) REFERENCES `questions` (`Question_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `did`
--
ALTER TABLE `did`
  ADD CONSTRAINT `did_ibfk_1` FOREIGN KEY (`ID_extPlayer`) REFERENCES `player` (`Player_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `did_ibfk_2` FOREIGN KEY (`ID_extQuizz`) REFERENCES `quizz` (`Quizz_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`ID_extQuizz`) REFERENCES `quizz` (`Quizz_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
