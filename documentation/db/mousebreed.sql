-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 10. Mrz 2015 um 14:08
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `mousebreed`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aspiration`
--

CREATE TABLE IF NOT EXISTS `aspiration` (
`id` int(11) NOT NULL,
  `number_of_mouse` int(11) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `breed`
--

CREATE TABLE IF NOT EXISTS `breed` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_of_creation` date NOT NULL,
  `target` int(11) NOT NULL,
  `name` text COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Daten für Tabelle `breed`
--

INSERT INTO `breed` (`id`, `user_id`, `time_of_creation`, `target`, `name`) VALUES
(1, 10, '2015-03-05', 4, 'Mousehattan'),
(2, 10, '2015-03-03', 3, 'Mousetown'),
(3, 10, '2015-03-20', 5, 'Wild Mouse West');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cage`
--

CREATE TABLE IF NOT EXISTS `cage` (
`id` int(11) NOT NULL,
  `max_number_of_mouses` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

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
`id` int(11) NOT NULL,
  `cage_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `genotyp` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `weight` double NOT NULL,
  `mother_id` int(11) NOT NULL,
  `father_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `img_name` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

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
`id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_general_mysql500_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`) VALUES
(10, 'MaxMuster', '$2y$11$95e06cac380d734b80c30OfCFLXB4PAax6/iv36jvDjoyx.RuyNb2', 'Max', 'Mustermann', 'Max.Muster@email.de');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aspiration`
--
ALTER TABLE `aspiration`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `breed`
--
ALTER TABLE `breed`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- Indizes für die Tabelle `cage`
--
ALTER TABLE `cage`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `mouse`
--
ALTER TABLE `mouse`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `aspiration`
--
ALTER TABLE `aspiration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `breed`
--
ALTER TABLE `breed`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `cage`
--
ALTER TABLE `cage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `mouse`
--
ALTER TABLE `mouse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
