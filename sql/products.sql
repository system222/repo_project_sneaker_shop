-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 18:38:30
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `products`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id_brand`, `description`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'New balance'),
(4, 'Lacoste'),
(5, 'Reebok'),
(6, 'Converce'),
(7, 'otras marcas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id_colors` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id_colors`, `descripcion`) VALUES
(1, 'verde'),
(2, 'fucsia'),
(3, 'naranja'),
(4, 'amarillo'),
(5, 'negro'),
(6, 'azul'),
(7, 'rojo'),
(8, 'magenta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sneakers`
--

CREATE TABLE `sneakers` (
  `id_sneakers` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `id_colors` int(11) NOT NULL,
  `id_brands` int(11) NOT NULL,
  `initial_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL,
  `observation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sneakers`
--

INSERT INTO `sneakers` (`id_sneakers`, `model`, `price`, `id_colors`, `id_brands`, `initial_date`, `image`, `observation`) VALUES
(34, 'converse', '5300.00', 7, 6, '2019-10-09 00:14:39', '../images/Converse_CTA_Street_High.jpg', 'nuevo'),
(36, 'rain', '4600.00', 7, 1, '2019-10-10 21:30:23', '../images/Nike_Air_Max_Advantage.jpg', 'nuevo'),
(37, 'nike', '2300.00', 5, 1, '2019-10-18 00:07:14', '../images/Nike_Md_Runner_2.jpg', 'Modelo Fer'),
(38, '342', '55666.00', 4, 6, '2019-10-22 21:41:19', '../images/Nike_Air_Max_Advantage.jpg', 'Fashionista'),
(39, 'pruebatest', '0.00', 2, 6, '2019-10-22 22:09:23', '../images/Fila_Revolution.jpg', 'pruebatest'),
(41, 'lacoste', '4566.00', 5, 4, '2019-10-22 22:11:25', '../images/Lacoste_Strideur_116.jpg', 'Nuevo'),
(42, 'nike', '4566.00', 5, 1, '2019-10-22 22:12:41', '../images/Nike_Md_Runner_2.jpg', 'Nuevo'),
(43, 'converse', '4344.00', 5, 6, '2019-10-22 22:17:06', '../images/Converse_Zakim.jpg', 'Modelo Gerard'),
(44, 'converse2', '10000.00', 4, 6, '2019-10-22 22:19:22', '../images/Converse_CTA_Street_High.jpg', '  pepe                                 ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id_colors`);

--
-- Indices de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`id_sneakers`),
  ADD KEY `colors_sneaker` (`id_colors`),
  ADD KEY `brands_sneaker` (`id_brands`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id_colors` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `id_sneakers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sneakers`
--
ALTER TABLE `sneakers`
  ADD CONSTRAINT `brands_sneaker` FOREIGN KEY (`id_brands`) REFERENCES `brands` (`id_brand`),
  ADD CONSTRAINT `colors_sneaker` FOREIGN KEY (`id_colors`) REFERENCES `colors` (`id_colors`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
