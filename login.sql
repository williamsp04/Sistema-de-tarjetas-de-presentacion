-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2024 a las 21:09:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_seguridad`
--

CREATE TABLE `pregunta_seguridad` (
  `id` int(10) UNSIGNED NOT NULL,
  `pregunta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pregunta_seguridad`
--

INSERT INTO `pregunta_seguridad` (`id`, `pregunta`) VALUES
(1, '¿Tu mejor amigo?'),
(2, '¿Fruta favorita?'),
(3, '¿lugar donde naciste?'),
(4, '¿Comida favorita?'),
(5, '¿Nombre de tu primera escuela?'),
(6, '¿Ocupacion de tu madre?'),
(7, '¿Tu primera maestra de infancia?'),
(8, '¿Comiquita favorita?'),
(9, '¿Cual es tu hobbies?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `id` int(20) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `coloruser` varchar(20) NOT NULL,
  `colorprofe` varchar(20) NOT NULL,
  `colorfon` varchar(20) NOT NULL,
  `colorpie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `username`, `avatar`, `coloruser`, `colorprofe`, `colorfon`, `colorpie`) VALUES
(61, 'priscila', 'avatar_9.png', '#fd866b', '#915e9a', '#5ef9a0', '#b69c69'),
(62, 'paul', 'avatar_13.png', '#e37887', '#4ab9c2', '#610d32', '#fae8e8'),
(63, 'juan', 'avatar_4.png', '#f52c2b', '#a33b5c', '#85f26a', '#be456b'),
(64, 'luciano', 'avatar_11.png', '#6bbf09', '#341a83', '#b1779b', '#f9024f'),
(65, 'CAROLINA', 'avatar_15.png', '#613ece', '#ae557d', '#83c1bb', '#d56d07'),
(66, 'jesus', 'avatar_7.png', '#2a2182', '#de4850', '#caf859', '#c6320e'),
(67, 'williboper', 'avatar_1.png', '#7137fd', '#cd3867', '#dcbc6b', '#c5ed73');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `profesion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pregunta1` varchar(50) NOT NULL,
  `respuesta1` varchar(50) NOT NULL,
  `pregunta2` varchar(50) NOT NULL,
  `respuesta2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `profesion`, `fecha`, `email`, `telefono`, `url`, `pregunta1`, `respuesta1`, `pregunta2`, `respuesta2`) VALUES
(3, 'priscila', '1', 'estudiante', '2024-09-02', 'priscila@gmail.com', '222-222-2222', 'https://www.priscila.com', '¿Tu primera maestra de infancia?', 'ivan', '¿Tu mejor amigo?', 'fredy'),
(33, 'juan', '12', 'diseñador grafico', '2024-09-10', 'juan@gmail.com', '666-666-6666', 'https://www.juan.com', '¿Fruta favorita?', 'melon', '¿Tu mejor amigo?', 'keruen'),
(36, 'luciano', '123', 'trabajador PDVSA', '2024-09-12', 'luciano@luciano.com', '262-292-9292', 'https://www.luciano.com', '¿Tu mejor amigo?', 'luis', '¿Cual es tu hobbies?', 'ver netflix'),
(38, 'carolina', '589', 'independiente', '2024-09-12', 'carolina@gmail.com', '595-959-9599', 'https://www.carolina.com', '¿lugar donde naciste?', 'petare', '¿Cual es tu hobbies?', 'guarimbear'),
(41, 'jesus', '698', 'soporte tecnico', '2024-10-04', 'jesus@gmail.com', '959-595-9595', 'https://www.jesus.com', '¿Cual es tu hobbies?', 'enamorar a luis', '¿Tu mejor amigo?', 'luis'),
(50, 'paul', '1236', 'banquero', '2024-10-17', 'paul@paul.com', '424-123-4567', 'http://www.paul.com', '¿Tu mejor amigo?', 'luis', '¿Fruta favorita?', 'mamon'),
(51, 'williboper', '1234', 'Programador web', '2024-10-10', 'williboper@williboper.com', '599-595-5959', 'https://www.williboper.com', '¿Cual es tu hobbies?', 'ver el techo todo el dia', '¿Comiquita favorita?', 'dragon ball z');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pregunta_seguridad`
--
ALTER TABLE `pregunta_seguridad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `usuario` (`username`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pregunta_seguridad`
--
ALTER TABLE `pregunta_seguridad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
