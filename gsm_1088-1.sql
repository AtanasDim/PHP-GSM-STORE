-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gsm_1088-1`
--

-- --------------------------------------------------------

--
-- Структура на таблица `g_models`
--

CREATE TABLE IF NOT EXISTS `g_models` (
`id_models` int(10) NOT NULL,
  `make_gsm` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `g_models`
--

INSERT INTO `g_models` (`id_models`, `make_gsm`) VALUES
(1, 'Sony'),
(2, 'Samsung'),
(3, 'LG'),
(4, 'IPhone');

-- --------------------------------------------------------

--
-- Структура на таблица `g_users`
--

CREATE TABLE IF NOT EXISTS `g_users` (
`id_user` int(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `personname` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `usertype` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `g_users`
--

INSERT INTO `g_users` (`id_user`, `password`, `personname`, `username`, `usertype`) VALUES
(1, 'admin', 'Atanas', 'admin', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `mobile_p`
--

CREATE TABLE IF NOT EXISTS `mobile_p` (
`id_gsm` int(10) NOT NULL,
  `id_models` int(10) NOT NULL,
  `price` int(20) unsigned NOT NULL,
  `design` text NOT NULL,
  `display` text NOT NULL,
  `battery` text NOT NULL,
  `hardware` text NOT NULL,
  `camera` text NOT NULL,
  `moreinfo` text NOT NULL,
  `number` int(20) NOT NULL,
  `picture` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `mobile_p`
--

INSERT INTO `mobile_p` (`id_gsm`, `id_models`, `price`, `design`, `display`, `battery`, `hardware`, `camera`, `moreinfo`, `number`, `picture`) VALUES
(1, 4, 100, 'ИНФООО', 'ИНФООО', 'ИНФООО', 'ИНФООО', 'ИНФООО', '', 12, ''),
(11, 1, 200000, 'vsdsdvz', 'vds', 'vd', 'dvzs', 'sdv', '', 0, ''),
(22, 3, 200000, 'aeva', 'vea', 'v', 'asv', 'va', '', 15, 'Pic22.jpg'),
(23, 2, 234, 'ds s', ' ds ', 'sd ', 'sd ', 'sd', '', 317, 'Pic23.jpg'),
(24, 3, 1, 'asv', 'avs', 'asv', 'asv', 'avs', '', 229, 'Pic24.jpg'),
(25, 4, 234243, 'af', 'asf', 'asfa', 'fsasf', 'asf', '', 0, 'Pic25.jpg'),
(26, 4, 324, 'efs', 'fse', 'sfe', 'sef', 'sef', '', 32, 'Pic26.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `g_models`
--
ALTER TABLE `g_models`
 ADD PRIMARY KEY (`id_models`);

--
-- Indexes for table `g_users`
--
ALTER TABLE `g_users`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `mobile_p`
--
ALTER TABLE `mobile_p`
 ADD PRIMARY KEY (`id_gsm`), ADD KEY `id_models` (`id_models`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `g_models`
--
ALTER TABLE `g_models`
MODIFY `id_models` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `g_users`
--
ALTER TABLE `g_users`
MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mobile_p`
--
ALTER TABLE `mobile_p`
MODIFY `id_gsm` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `mobile_p`
--
ALTER TABLE `mobile_p`
ADD CONSTRAINT `mobile_p_ibfk_1` FOREIGN KEY (`id_models`) REFERENCES `g_models` (`id_models`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
