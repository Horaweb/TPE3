-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 23:33:58
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
-- Base de datos: `simhor_automotores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concesionarias`
--

CREATE TABLE `concesionarias` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `lugar` text NOT NULL,
  `direccion` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `concesionarias`
--

INSERT INTO `concesionarias` (`id`, `nombre`, `lugar`, `direccion`, `email`) VALUES
(1, 'Simhor', 'Tandil', 'Avellaneda 550', 'automotoresPrTan@gmail.com'),
(2, 'hascar', 'Belgrano', 'Cordoba 490', 'automotoresPrBel@gmail.com'),
(3, 'Prehor', 'Mar Del Plata', 'Colon 1760', 'automotoresPrMdq@gmail.com'),
(4, 'h Automotores\r\n', 'Pilar', 'Salceda 343', 'hascarAutomotores@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`) VALUES
(1, 'webadmin', '$2y$10$/TAPXtdY.d1P6laOMQPvXO5RC7XC32ruoL9dKO2aQNmVcqUH12iz6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` text NOT NULL,
  `modelo` text NOT NULL,
  `tipo` text NOT NULL,
  `año` int(11) NOT NULL,
  `precio` int(30) NOT NULL,
  `id_concesionaria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `marca`, `modelo`, `tipo`, `año`, `precio`, `id_concesionaria`) VALUES
(2, 'Volkswagen', 'Vento', 'Auto', 2014, 15000, 4),
(5, 'Toyota', 'Hillux', 'Camioneta', 2015, 22000, 3),
(6, 'Audi', 'S3', 'Auto', 2009, 20000, 1),
(10, 'Mercedes Benz', 'Glc300', 'Suv', 2022, 71000, 3),
(11, 'Chevrolet', 'S10', 'Camioneta', 2012, 14500, 2),
(12, 'Toyota', 'Rav4', 'Suv', 2024, 35000, 4),
(14, 'Volkswagen', 'Amarok', 'Camioneta', 2018, 34000, 1),
(15, 'Toyota', 'Yaris', 'Auto', 2023, 19000, 2),
(16, 'Nissan', 'Frontier', 'Camioneta', 2022, 28000, 3),
(17, 'Nissan', '370Z', 'Auto', 2012, 37000, 4),
(22, 'Volkswagen', 'tiguan', 'Suv', 2016, 0, 2),
(23, 'Toyota', 'Corolla', 'Auto', 2023, 28000, 1),
(24, 'Renualt', 'Clio', 'Auto', 2013, 6500, 4),
(25, 'Bmw', '330I', 'Auto', 3453, 34535, 4),
(26, 'Ford', 'Ranger', 'Camioneta', 2023, 38000, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `concesionarias`
--
ALTER TABLE `concesionarias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`id_concesionaria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `concesionarias`
--
ALTER TABLE `concesionarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`id_concesionaria`) REFERENCES `concesionarias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
