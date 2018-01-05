-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Host: localhost:3306
-- Generation Time: Jan 05, 2018 at 08:49 PM
-- Server version: 10.1.23-MariaDB-9+deb9u1
-- PHP Version: 7.0.19-1
=======
-- Servidor: localhost:3306
-- Tiempo de generación: 10-12-2017 a las 18:38:44
-- Versión del servidor: 10.1.23-MariaDB-9+deb9u1
-- Versión de PHP: 7.0.19-1
>>>>>>> 63ec90df36b1bbf534b8d00d005a3fb5993fbe2f

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
<<<<<<< HEAD
-- Database: `MagicMirror`
--
CREATE DATABASE IF NOT EXISTS `MagicMirror` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `MagicMirror`;
=======
-- Base de datos: `MagicMirror`
--
>>>>>>> 63ec90df36b1bbf534b8d00d005a3fb5993fbe2f

-- --------------------------------------------------------

--
<<<<<<< HEAD
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
=======
-- Estructura de tabla para la tabla `Login`
--

CREATE TABLE `Login` (
  `ID` int(11) NOT NULL,
  `Hora_entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Login`
--

INSERT INTO `Login` (`ID`, `Hora_entrada`) VALUES
(5, '2017-12-10 00:00:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`ID_usuario`, `Nombre`) VALUES
(4, 'Adriana Alonso Yogures'),
(2, 'Antonio Barral Cago (el P2)'),
(5, 'Er root'),
(3, 'Monica Alonso la Mateos'),
(1, 'Pablo Alvarez (Veronica <3)');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`ID`,`Hora_entrada`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Login`
--
ALTER TABLE `Login`
  ADD CONSTRAINT `Usuarios_Login` FOREIGN KEY (`ID`) REFERENCES `Usuarios` (`ID_usuario`);

>>>>>>> 63ec90df36b1bbf534b8d00d005a3fb5993fbe2f
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
