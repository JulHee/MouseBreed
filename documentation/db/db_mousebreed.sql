-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Mrz 2015 um 15:58
-- Server Version: 5.6.11
-- PHP-Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `mousebreed`
--
CREATE DATABASE IF NOT EXISTS `mousebreed` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci;
USE `mousebreed`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aspiration`
--

CREATE TABLE IF NOT EXISTS `aspiration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_of_mouse` int(11) NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `breed`
--

CREATE TABLE IF NOT EXISTS `breed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `time_of_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `target` int(11) NOT NULL,
  `name` text COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `breed`
--

INSERT INTO `breed` (`id`, `user_id`, `time_of_creation`, `target`, `name`) VALUES
(1, 10, '2015-03-04 23:00:00', 4, 'Mousehattan'),
(2, 10, '2015-03-02 23:00:00', 3, 'Mousetown'),
(3, 10, '2015-03-19 23:00:00', 5, 'Wild Mouse West');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cage`
--

CREATE TABLE IF NOT EXISTS `cage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `max_number_of_mouses` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `breed_id` (`breed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `cage`
--

INSERT INTO `cage` (`id`, `max_number_of_mouses`, `breed_id`) VALUES
(1, 20, 1),
(2, 10, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mouse`
--

CREATE TABLE IF NOT EXISTS `mouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cage_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `genotyp` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `weight` double NOT NULL,
  `mother_id` int(11) DEFAULT NULL,
  `father_id` int(11) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `img_name` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cage_id` (`cage_id`),
  KEY `breed_id` (`breed_id`),
  KEY `user_id` (`user_id`),
  KEY `mother_id` (`mother_id`),
  KEY `father_id` (`father_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `mouse`
--

INSERT INTO `mouse` (`id`, `cage_id`, `breed_id`, `user_id`, `gender`, `name`, `genotyp`, `weight`, `mother_id`, `father_id`, `age`, `img_name`) VALUES
(1, 1, 1, 10, 0, 'Karl', 'AB', 200, 4, 4, 10, ''),
(2, 1, 1, 10, 0, 'Paul', 'BA', 100, 2, 2, 5, ''),
(3, 1, 1, 10, 1, 'Frauke', 'BB', 500, 2, 2, 5, ''),
(4, 1, 1, 10, 1, 'Klara', 'AA', 1200, 2, 2, 80, ''),
(5, 1, 1, 10, 0, 'Hans', 'AB', 500, 4, 4, 4, ''),
(6, 1, 1, 10, 1, 'Berta', 'BB', 4000, 3, 3, 50, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_general_mysql500_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`) VALUES
(10, 'MaxMuster', '$2y$11$95e06cac380d734b80c30OfCFLXB4PAax6/iv36jvDjoyx.RuyNb2', 'Max', 'Mustermann', 'Max.Muster@email.de');

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `breed`
--
ALTER TABLE `breed`
  ADD CONSTRAINT `breed_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `cage`
--
ALTER TABLE `cage`
  ADD CONSTRAINT `cage_ibfk_1` FOREIGN KEY (`breed_id`) REFERENCES `breed` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `mouse`
--
ALTER TABLE `mouse`
  ADD CONSTRAINT `mouse_ibfk_1` FOREIGN KEY (`cage_id`) REFERENCES `cage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mouse_ibfk_2` FOREIGN KEY (`breed_id`) REFERENCES `breed` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mouse_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mouse_ibfk_4` FOREIGN KEY (`mother_id`) REFERENCES `mouse` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mouse_ibfk_5` FOREIGN KEY (`father_id`) REFERENCES `mouse` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
