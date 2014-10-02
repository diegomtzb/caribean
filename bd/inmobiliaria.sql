-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2014 a las 10:54:41
-- Versión del servidor: 5.6.17-log
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `caribean`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmobiliaria`
--

CREATE TABLE IF NOT EXISTS `inmobiliaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` double NOT NULL,
  `tipoInmueble` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipoVenta` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipoUso` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `area` int(11) NOT NULL,
  `valor` double NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `numHabitaciones` int(11) NOT NULL,
  `imagenP` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `imagenes` varchar(10000) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `inmobiliaria`
--

INSERT INTO `inmobiliaria` (`id`, `codigo`, `tipoInmueble`, `tipoVenta`, `tipoUso`, `area`, `valor`, `ciudad`, `barrio`, `direccion`, `numHabitaciones`, `imagenP`, `imagenes`) VALUES
(1, 23989, 'APARTAMENTO', 'VENTA', 'NUEVO', 110, 120000000, 'CARTAGENA', 'MANGA', 'NO ME LA SE', 3, 'imgs/dumy.jpg', NULL),
(2, 2830, 'CASA', 'VENTA', 'USADO', 123, 150000000, 'CARTAGENA', 'MANGA', 'no se', 4, 'imgs/dumy.jpg', NULL),
(3, 293890, 'APARTAMENTO', 'VENTA', 'USADO', 200, 230000000, 'CARTAGENA', 'MANGA', 'no se', 4, 'imgs/dumy.jpg', NULL),
(4, 92839, 'CASA', 'VENTA', 'USADO', 127, 102000000, 'CARTAGENA', 'BOSQUE', 'no se', 3, 'imgs/dumy.jpg', NULL),
(5, 2338, 'CASA', 'ARRIENDO', 'USADO', 146, 215000000, 'CARTAGENA', 'PIE DE LA POPA', 'no se', 2, 'imgs/dumy.jpg', NULL),
(6, 82736, 'APARTAMENTO', 'ARRIENDO', 'NUEVO', 167, 167000000, 'CARTAGENA', 'chino', 'nada', 4, 'imgs/dumy.jpg', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
