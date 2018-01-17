-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2018 a las 17:29:50
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ascensor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `layer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `layer`) VALUES
(1, 'ceilings', 'ceilings', 1),
(2, 'floor', 'floor', 1),
(3, 'rails', 'rails', 2),
(4, 'raised bottom panel', 'raised bottom panel', 1),
(5, 'raised middle panel', 'raised middle panel', 1),
(6, 'walls bottom', 'walls bottom', 1),
(7, 'walls top', 'walls top', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elevator`
--

CREATE TABLE `elevator` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `fileName` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `elevator`
--

INSERT INTO `elevator` (`id`, `name`, `path`, `fileName`, `description`, `category`) VALUES
(1, 'techo1', 'imgs/ceilings/', '1.png', 'Aluminio y Luces Led Circulares con contorno en acabado Cromo', 1),
(2, 'floor', 'imgs/floor/', '1.png', 'floor', 2),
(3, 'rails', 'imgs/rails/', '1.png', 'rails', 3),
(4, 'raisedbottompanel', 'imgs/raisedbottompanel/', '1.png', 'raised bottom panel', 4),
(5, 'raisedmiddlepanel', 'imgs/raisedmiddlepanel/', '1.png', 'raised bottom panel', 5),
(6, 'walls', 'imgs/walls/', '1.png', 'walls', 6),
(7, 'walls2', 'imgs/walls2/', '1.png', 'walls2', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `elevator`
--
ALTER TABLE `elevator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_elevator_categories` (`category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `elevator`
--
ALTER TABLE `elevator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `elevator`
--
ALTER TABLE `elevator`
  ADD CONSTRAINT `fk_elevator_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
