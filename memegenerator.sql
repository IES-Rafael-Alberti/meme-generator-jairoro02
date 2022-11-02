-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 02-11-2022 a las 22:15:29
-- Versión del servidor: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- Versión de PHP: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `memegenerator`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Meme`
--

CREATE TABLE `Meme` (
  `id` int(8) NOT NULL,
  `ruta` varchar(150) NOT NULL,
  `id_persona` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Meme`
--

INSERT INTO `Meme` (`id`, `ruta`, `id_persona`) VALUES
(2, 'memillos/Jairo.jpg', 3),
(3, 'memillos/Jairo021122095029.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE `Persona` (
  `id` int(8) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`id`, `nombre`, `pwd`) VALUES
(1, 'Luis', '12'),
(3, 'Jairo', '45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Meme`
--
ALTER TABLE `Meme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ids` (`id_persona`);

--
-- Indices de la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Meme`
--
ALTER TABLE `Meme`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Persona`
--
ALTER TABLE `Persona`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Meme`
--
ALTER TABLE `Meme`
  ADD CONSTRAINT `ids` FOREIGN KEY (`id_persona`) REFERENCES `Persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
