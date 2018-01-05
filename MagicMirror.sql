-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2018 at 08:49 PM
-- Server version: 10.1.23-MariaDB-9+deb9u1
-- PHP Version: 7.0.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MagicMirror`
--
CREATE DATABASE IF NOT EXISTS `MagicMirror` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `MagicMirror`;

-- --------------------------------------------------------

--
-- Table structure for table `Personalizaciones`
--

DROP TABLE IF EXISTS `Personalizaciones`;
CREATE TABLE `Personalizaciones` (
  `reloj` tinyint(1) NOT NULL,
  `reloj_type` int(11) NOT NULL,
  `reloj_size` int(11) NOT NULL,
  `weather` tinyint(1) NOT NULL,
  `weather_type` int(11) NOT NULL,
  `weather_size` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `Personalizaciones`
--

TRUNCATE TABLE `Personalizaciones`;
-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE `Usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Codigo_RFID` bigint(20) NOT NULL,
  `Codigo_temporal` varchar(11) DEFAULT '1111111111'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `Usuario`
--

TRUNCATE TABLE `Usuario`;
--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`ID_Usuario`, `Nombre`, `Codigo_RFID`, `Codigo_temporal`) VALUES
(1, 'root', 1111111111, '1111111111'),
(2, 'unknown', 3545642, 'IhQmYN=amd'),
(3, 'unknown', 18121214263, 'g9Y+ElTemS'),
(4, 'unknown', 1636770222, 'uxi6hK6FSz'),
(5, 'unknown', 3814113724, 'FOkUV3fpjd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`ID_Usuario`),
  ADD UNIQUE KEY `RFID` (`Codigo_RFID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
