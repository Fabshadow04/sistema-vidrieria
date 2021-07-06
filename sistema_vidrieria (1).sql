-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-04-2020 a las 21:18:21
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_vidrieria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `pass` int(11) NOT NULL,
  `user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`pass`, `user`) VALUES
(12345, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `url_image` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `titulo`, `descripcion`, `url_image`, `estado`, `orden`) VALUES
(5, 'cristal en negro', 'Este cristal es polarizado y aqui una muestra de como se ve instalado ', '4.jpg', 1, 1),
(3, 'cristal con decorados', 'Este cristal tiene bordes que dan un aspecto mas bonito, recomendado para poner en ventanas modelo: c24 ', '8.jpg', 1, 1),
(2, 'Vidrios para casas', 'vidrios amplios para poner como puertas, modelo: c23 ', '2.jpg', 1, 1),
(1, 'cristal', 'colores en gris y tranparante, modelo: c23  ', '1.jpg', 1, 1),
(7, 'cristal con dibujos', 'Este cristal tiene acabos con dibujos', 'vidrio.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `nombre` text NOT NULL,
  `producto` text NOT NULL,
  `modelo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `comentario` text NOT NULL,
  `id` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `producto`, `modelo`, `cantidad`, `direccion`, `comentario`, `id`) VALUES
('flor', 'Cristales', 'css', 12, 'la cima', 'hola :3', '1234'),
('Arturo', 'vidrio para ventana', 'c23', 1, 'loma bonita manzana 23 lote 24', 'mas rapido posible', 'qwert'),
('Diana', 'puerta de cristal', 'c23', 2, 'las anclas manzana 34 lote 24 cerca del acabus ', 'me haces un descuento ', '16320111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`nombre`, `email`, `mensaje`) VALUES
('Fabrizio Martínez', 'fabimartiz123@gmail.com', 'prueba'),
('Fabrizio Martínez', 'fabimartiz123@gmail.com', 'prueba 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

DROP TABLE IF EXISTS `vendedor`;
CREATE TABLE IF NOT EXISTS `vendedor` (
  `vendedorn` text NOT NULL,
  `nombre` text NOT NULL,
  `producto` text NOT NULL,
  `modelo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `comentario` text NOT NULL,
  `id` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`vendedorn`, `nombre`, `producto`, `modelo`, `cantidad`, `direccion`, `comentario`, `id`) VALUES
('fabru', 'Vane', 'vidrio para ventana', 'c23', 1, 'las anclas', 'rapido por favor', '123'),
('Mario', 'Ana baltuano', 'puerta de cristal', 'c34', 1, 'las anclas manzana 34 lote 24 cerca del acabus', 'verde', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
