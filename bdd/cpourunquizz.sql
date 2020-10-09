-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 oct. 2020 à 12:54
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
-- Base de données : `cpourunquizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `Answers_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` text NOT NULL,
  `ID_extQuestions` int(11) NOT NULL,
  PRIMARY KEY (`Answers_ID`),
  KEY `ID_extQuestions` (`ID_extQuestions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `did`
--

DROP TABLE IF EXISTS `did`;
CREATE TABLE IF NOT EXISTS `did` (
  `ID_extPlayer` int(11) NOT NULL,
  `ID_extQuizz` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  PRIMARY KEY (`ID_extPlayer`,`ID_extQuizz`),
  KEY `ID_extQuizz` (`ID_extQuizz`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

DROP TABLE IF EXISTS `player`;
CREATE TABLE IF NOT EXISTS `player` (
  `Player_ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `Question_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Content` text NOT NULL,
  `ID_extQuizz` int(11) NOT NULL,
  PRIMARY KEY (`Question_ID`),
  KEY `ID_extQuizz` (`ID_extQuizz`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
CREATE TABLE IF NOT EXISTS `quizz` (
  `Quizz_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Theme` text NOT NULL,
  PRIMARY KEY (`Quizz_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
