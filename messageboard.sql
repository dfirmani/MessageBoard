-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2016 a las 15:09:52
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `messageboard`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorie`
--

CREATE TABLE `categorie` (
  `caId` int(11) NOT NULL,
  `caName` varchar(50) DEFAULT NULL,
  `usId` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorie`
--

INSERT INTO `categorie` (`caId`, `caName`, `usId`) VALUES
(2, 'Music', 'nadine@groupm7.com'),
(4, 'Car', 'nadine@groupm7.com'),
(5, 'Movies', 'genie@yahoo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `poId` int(11) NOT NULL,
  `poComment` varchar(757) DEFAULT NULL,
  `poDate` date DEFAULT NULL,
  `usId` varchar(50) DEFAULT NULL,
  `thId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`poId`, `poComment`, `poDate`, `usId`, `thId`) VALUES
(15, 'Fuel Filter so expensive', '0000-00-00', 'nadine@groupm7.com', 3),
(18, 'I like choirs with instruments', '0000-00-00', 'nadine@groupm7.com', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thread`
--

CREATE TABLE `thread` (
  `thId` int(11) NOT NULL,
  `thName` varchar(50) DEFAULT NULL,
  `caId` int(11) DEFAULT NULL,
  `usId` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `thread`
--

INSERT INTO `thread` (`thId`, `thName`, `caId`, `usId`) VALUES
(3, 'Chevrolet', 4, 'genie@yahoo.com'),
(4, 'Nissan', 4, 'nadine@groupm7.com'),
(6, 'Choir', 2, 'nadine@groupm7.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `usId` varchar(50) NOT NULL,
  `usName` varchar(40) DEFAULT NULL,
  `usLastName` varchar(40) DEFAULT NULL,
  `usPassword` varchar(40) DEFAULT NULL,
  `usAdminFlag` tinyint(1) DEFAULT NULL,
  `usReadOnly` tinyint(1) DEFAULT NULL,
  `usProfile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`usId`, `usName`, `usLastName`, `usPassword`, `usAdminFlag`, `usReadOnly`, `usProfile`) VALUES
('genie@yahoo.com', 'genie', 'sherling', '1', 0, 0, 'Standard'),
('nadine@groupm7.com', 'Nadine', 'Antunez', '1', 1, 0, 'Admin'),
('roy@chapman.com', 'Roy', 'Chapman', '1', 0, 1, 'ReadOnly');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`caId`),
  ADD KEY `caFK1` (`usId`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`poId`),
  ADD KEY `poFK1` (`usId`),
  ADD KEY `poFK2` (`thId`);

--
-- Indices de la tabla `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thId`),
  ADD KEY `thFK1` (`usId`),
  ADD KEY `thFK2` (`caId`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorie`
--
ALTER TABLE `categorie`
  MODIFY `caId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `poId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `thread`
--
ALTER TABLE `thread`
  MODIFY `thId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `caFK1` FOREIGN KEY (`usId`) REFERENCES `user` (`usId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `poFK1` FOREIGN KEY (`usId`) REFERENCES `user` (`usId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poFK2` FOREIGN KEY (`thId`) REFERENCES `thread` (`thId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thFK1` FOREIGN KEY (`usId`) REFERENCES `user` (`usId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thFK2` FOREIGN KEY (`caId`) REFERENCES `categorie` (`caId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
