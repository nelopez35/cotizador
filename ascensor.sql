-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2018 a las 17:43:58
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(7, 'walls2', 'imgs/walls2/', '1.png', 'walls2', 7),
(8, 'techo1', 'imgs/ceilings/', '1.png', 'Aluminio y Luces Led Circulares con contorno en acabado Cromo', 1),
(9, 'floor', 'imgs/floor/', '1.png', 'floor', 2),
(10, 'rails', 'imgs/rails/', '1.png', 'rails', 3),
(11, 'raisedbottompanel', 'imgs/raisedbottompanel/', '1.png', 'raised bottom panel', 4),
(12, 'raisedmiddlepanel', 'imgs/raisedmiddlepanel/', '1.png', 'raised bottom panel', 5),
(13, 'walls', 'imgs/walls/', '1.png', 'walls', 6),
(14, 'walls2', 'imgs/walls2/', '1.png', 'walls2', 7),
(15, 'techo1', 'imgs/ceilings/', '1.png', 'Aluminio y Luces Led Circulares con contorno en acabado Cromo', 1),
(16, 'floor', 'imgs/floor/', '1.png', 'floor', 2),
(17, 'rails', 'imgs/rails/', '1.png', 'rails', 3),
(18, 'raisedbottompanel', 'imgs/raisedbottompanel/', '1.png', 'raised bottom panel', 4),
(19, 'raisedmiddlepanel', 'imgs/raisedmiddlepanel/', '1.png', 'raised bottom panel', 5),
(20, 'walls', 'imgs/walls/', '1.png', 'walls', 6),
(21, 'walls2', 'imgs/walls2/', '1.png', 'walls2', 7),
(22, 'techo1', 'imgs/ceilings/', '1.png', 'Aluminio y Luces Led Circulares con contorno en acabado Cromo', 1),
(23, 'floor', 'imgs/floor/', '1.png', 'floor', 2),
(24, 'rails', 'imgs/rails/', '1.png', 'rails', 3),
(25, 'raisedbottompanel', 'imgs/raisedbottompanel/', '1.png', 'raised bottom panel', 4),
(26, 'raisedmiddlepanel', 'imgs/raisedmiddlepanel/', '1.png', 'raised bottom panel', 5),
(27, 'walls', 'imgs/walls/', '1.png', 'walls', 6),
(28, 'walls2', 'imgs/walls2/', '1.png', 'walls2', 7),
(29, 'techo1', 'imgs/ceilings/', '1.png', 'Aluminio y Luces Led Circulares con contorno en acabado Cromo', 1),
(30, 'floor', 'imgs/floor/', '1.png', 'floor', 2),
(31, 'rails', 'imgs/rails/', '1.png', 'rails', 3),
(32, 'raisedbottompanel', 'imgs/raisedbottompanel/', '1.png', 'raised bottom panel', 4),
(33, 'raisedmiddlepanel', 'imgs/raisedmiddlepanel/', '1.png', 'raised bottom panel', 5),
(34, 'walls', 'imgs/walls/', '1.png', 'walls', 6),
(35, 'walls2', 'imgs/walls2/', '1.png', 'walls2', 7),
(36, 'techo1', 'imgs/ceilings/', '1.png', 'Aluminio y Luces Led Circulares con contorno en acabado Cromo', 1),
(37, 'floor', 'imgs/floor/', '1.png', 'floor', 2),
(38, 'rails', 'imgs/rails/', '1.png', 'rails', 3),
(39, 'raisedbottompanel', 'imgs/raisedbottompanel/', '1.png', 'raised bottom panel', 4),
(40, 'raisedmiddlepanel', 'imgs/raisedmiddlepanel/', '1.png', 'raised bottom panel', 5),
(41, 'walls', 'imgs/walls/', '1.png', 'walls', 6),
(42, 'walls2', 'imgs/walls2/', '1.png', 'walls2', 7),
(43, 'techo1', 'imgs/ceilings/', '1.png', 'Aluminio y Luces Led Circulares con contorno en acabado Cromo', 1),
(44, 'floor', 'imgs/floor/', '1.png', 'floor', 2),
(45, 'rails', 'imgs/rails/', '1.png', 'rails', 3),
(46, 'raisedbottompanel', 'imgs/raisedbottompanel/', '1.png', 'raised bottom panel', 4),
(47, 'raisedmiddlepanel', 'imgs/raisedmiddlepanel/', '1.png', 'raised bottom panel', 5),
(48, 'walls', 'imgs/walls/', '1.png', 'walls', 6),
(49, 'walls2', 'imgs/walls2/', '1.png', 'walls2', 7),
(50, 'techo1', 'imgs/ceilings/', '1.png', 'Aluminio y Luces Led Circulares con contorno en acabado Cromo', 1),
(51, 'floor', 'imgs/floor/', '1.png', 'floor', 2),
(52, 'rails', 'imgs/rails/', '1.png', 'rails', 3),
(53, 'raisedbottompanel', 'imgs/raisedbottompanel/', '1.png', 'raised bottom panel', 4);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `elevator`
--
ALTER TABLE `elevator`
  ADD CONSTRAINT `fk_elevator_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
