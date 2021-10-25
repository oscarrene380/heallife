-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2021 a las 20:04:24
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heallife`
--
CREATE DATABASE IF NOT EXISTS `heallife` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `heallife`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE IF NOT EXISTS `especialidades` (
  `id_espe` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(24) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_espe`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_espe`, `descripcion`, `id_estado`) VALUES
(1, 'general', 1),
(2, 'ginecologia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(24) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE IF NOT EXISTS `generos` (
  `id_gen` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(24) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_gen`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_gen`, `descripcion`, `id_estado`) VALUES
(1, 'masculino', 1),
(2, 'femenino', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `horainicio` varchar(8) NOT NULL,
  `horafin` varchar(8) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `horainicio`, `horafin`, `id_estado`) VALUES
(1, '05:00 AM', '07:00 PM', 1),
(2, '08:00 AM', '12:00 PM', 1),
(3, '03:15 PM', '06:15 PM', 2),
(13, '03:45 PM', '04:00 PM', 2),
(14, '06:00 AM', '12:00 PM', 2),
(15, '11:45 AM', '08:45 PM', 1),
(16, '08:45 PM', '08:45 PM', 2),
(17, '09:00 PM', '09:00 PM', 2),
(18, '09:00 PM', '09:15 PM', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE IF NOT EXISTS `horas` (
  `id_hora` int(11) NOT NULL AUTO_INCREMENT,
  `hora` varchar(8) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_hora`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id_hora`, `hora`, `id_estado`) VALUES
(1, '08:00 AM', 1),
(2, '09:00 AM', 2),
(3, '08:00 PM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
  `id_med` int(11) NOT NULL AUTO_INCREMENT,
  `id_usu` int(11) NOT NULL,
  `id_espe` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_med`),
  KEY `id_estado` (`id_estado`),
  KEY `id_usu` (`id_usu`),
  KEY `id_espe` (`id_espe`),
  KEY `id_horario` (`id_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_med`, `id_usu`, `id_espe`, `id_horario`, `id_estado`) VALUES
(1, 2, 1, 1, 1),
(2, 8, 2, 14, 1),
(4, 9, 2, 1, 2),
(5, 7, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `id_usu` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_hora` int(11) NOT NULL,
  `id_espe` int(11) NOT NULL,
  `id_med` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_res`),
  KEY `id_usu` (`id_usu`),
  KEY `id_hora` (`id_hora`),
  KEY `id_espe` (`id_espe`),
  KEY `id_med` (`id_med`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_res`, `id_usu`, `fecha`, `id_hora`, `id_espe`, `id_med`, `id_estado`) VALUES
(1, 5, '2021-06-01', 2, 1, 1, 1),
(2, 2, '2021-03-01', 2, 1, 1, 2),
(3, 1, '2021-09-08', 2, 2, 2, 1),
(4, 9, '2021-05-01', 2, 2, 2, 2),
(5, 3, '2021-10-01', 1, 1, 1, 1),
(6, 3, '2021-04-01', 2, 1, 1, 2),
(7, 1, '2021-01-01', 1, 1, 1, 2),
(8, 5, '2021-07-08', 1, 1, 1, 1),
(9, 1, '2021-02-01', 1, 1, 1, 2),
(10, 2, '2021-09-09', 3, 1, 1, 1),
(11, 9, '2021-09-10', 3, 1, 1, 1),
(12, 1, '2021-12-22', 1, 1, 1, 1),
(13, 1, '2021-09-15', 2, 1, 1, 1),
(14, 1, '2021-09-14', 1, 1, 1, 1),
(15, 1, '2021-11-01', 1, 1, 1, 1),
(16, 1, '2021-11-02', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(24) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `descripcion`, `id_estado`) VALUES
(1, 'admin', 1),
(2, 'medico', 1),
(3, 'user', 1),
(4, 'Cliente', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(24) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `dui` varchar(10) NOT NULL,
  `nombre` varchar(24) NOT NULL,
  `segundonombre` varchar(24) NOT NULL,
  `apellidos` varchar(24) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `id_gen` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_usu`),
  KEY `id_estado` (`id_estado`),
  KEY `id_rol` (`id_rol`),
  KEY `id_gen` (`id_gen`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `dui`, `nombre`, `segundonombre`, `apellidos`, `clave`, `id_gen`, `direccion`, `id_rol`, `correo`, `id_estado`) VALUES
(1, '057311622', 'Kevin', 'Alexander', 'Coreas', '123', 1, 'San Salvador, Calle Arce y 19 ave. norte', 1, 'kevincoreas2011ramirez@outlook.com', 1),
(2, '057311623', 'xioma', 'yamileth', 'ramirez', '123', 2, 'ninguna', 2, 'xiorami@gmail.com', 1),
(3, '057311624', 'David', 'Hector', 'Ramirez', '123', 1, 'La Libertad, San Diego', 3, 'dahecto2021@gmail.com', 1),
(5, '000000000', 'Maria', 'Jose', 'Hernandez', '123', 2, 'Brisas de Candelaria', 3, 'majo@gmail.com', 2),
(7, '00326522', 'Ada', 'Dolores', 'Arevalos', '123', 2, 'ninguna', 2, 'majo@gmail.com', 1),
(8, '100000009', 'Jose', 'Roberto', 'Sanchez', '1234', 1, 'San Salvador, Mejicanos', 2, 'joseroberto@gmail.com', 2),
(9, '200', 'Alex', 'Lopez', 'Lopez', '123', 1, 'san salvador', 2, 'alexlopez@gmail.com', 1),
(10, '1', 'ke', 'Kevin', 'Ramirez', 'delao', 2, 'Brisas de Candelaria', 3, 'majo@gmail.com', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD CONSTRAINT `especialidades_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `generos`
--
ALTER TABLE `generos`
  ADD CONSTRAINT `generos_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `horas`
--
ALTER TABLE `horas`
  ADD CONSTRAINT `horas_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `medicos_ibfk_2` FOREIGN KEY (`id_espe`) REFERENCES `especialidades` (`id_espe`),
  ADD CONSTRAINT `medicos_ibfk_3` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`),
  ADD CONSTRAINT `medicos_ibfk_4` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`);

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `reservaciones_ibfk_2` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`),
  ADD CONSTRAINT `reservaciones_ibfk_3` FOREIGN KEY (`id_hora`) REFERENCES `horas` (`id_hora`),
  ADD CONSTRAINT `reservaciones_ibfk_4` FOREIGN KEY (`id_espe`) REFERENCES `especialidades` (`id_espe`),
  ADD CONSTRAINT `reservaciones_ibfk_5` FOREIGN KEY (`id_med`) REFERENCES `medicos` (`id_med`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD CONSTRAINT `tipousuario_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_gen`) REFERENCES `generos` (`id_gen`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
