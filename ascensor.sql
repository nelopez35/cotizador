-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2018 a las 14:59:47
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
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'ceilings', 'ceilings'),
(2, 'floor', 'floor'),
(3, 'rails', 'rails'),
(4, 'raised bottom panel', 'raised bottom panel'),
(5, 'raised middle panel', 'raised middle panel'),
(6, 'walls', 'walls'),
(7, 'walls 2', 'walls 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elevator`
--

CREATE TABLE `elevator` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `elevator`
--

INSERT INTO `elevator` (`id`, `name`, `path`, `description`, `category`) VALUES
(1, 'techo1', 'imgs/ceilings/1.png', 'techo 1', 1),
(2, 'floor', 'imgs/floor/1.png', 'floor', 2),
(3, 'rails', 'imgs/rails/1.png', 'rails', 3),
(4, 'raisedbottompanel', 'imgs/raisedbottompanel/1.png', 'raised bottom panel', 4),
(5, 'raisedmiddlepanel', 'imgs/raisedmiddlepanel/1.png', 'raised bottom panel', 5),
(6, 'walls', 'imgs/walls/1.png', 'walls', 6),
(7, 'walls2', 'imgs/walls2/1.png', 'walls2', 7);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
