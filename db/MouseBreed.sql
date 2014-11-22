-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 22. Nov 2014 um 14:32
-- Server Version: 5.6.20
-- PHP-Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `MouseBreed`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mousebreed_breed`
--

CREATE TABLE IF NOT EXISTS `mousebreed_breed` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_of_creation` date NOT NULL,
  `target` int(11) NOT NULL,
  `name` text COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mousebreed_cage`
--

CREATE TABLE IF NOT EXISTS `mousebreed_cage` (
`id` int(11) NOT NULL,
  `max_number_of_mouses` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mousebreed_mouse`
--

CREATE TABLE IF NOT EXISTS `mousebreed_mouse` (
`id` int(11) NOT NULL,
  `cage_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mousebreed_User`
--

CREATE TABLE IF NOT EXISTS `mousebreed_User` (
`id` int(11) NOT NULL,
  `user` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_general_mysql500_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mousebreed_Ziel`
--

CREATE TABLE IF NOT EXISTS `mousebreed_Ziel` (
`id` int(11) NOT NULL,
  `number_of_mouse` int(11) NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mousebreed_breed`
--
ALTER TABLE `mousebreed_breed`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`);

--
-- Indexes for table `mousebreed_cage`
--
ALTER TABLE `mousebreed_cage`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mousebreed_mouse`
--
ALTER TABLE `mousebreed_mouse`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mousebreed_User`
--
ALTER TABLE `mousebreed_User`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `mousebreed_Ziel`
--
ALTER TABLE `mousebreed_Ziel`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mousebreed_breed`
--
ALTER TABLE `mousebreed_breed`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mousebreed_cage`
--
ALTER TABLE `mousebreed_cage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mousebreed_mouse`
--
ALTER TABLE `mousebreed_mouse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mousebreed_User`
--
ALTER TABLE `mousebreed_User`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mousebreed_Ziel`
--
ALTER TABLE `mousebreed_Ziel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
