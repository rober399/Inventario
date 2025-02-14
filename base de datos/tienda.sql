-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2025 a las 16:30:40
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`) VALUES
(1, 'Nachos', '15'),
(2, 'toztecas', '0.25'),
(3, 'Alborotos', '0.15'),
(4, 'Galletas Diana', '0.15'),
(5, 'Galletas Can Can', '0.25'),
(6, 'Pan Concha', '0.30'),
(7, 'Pan Margarita', '0.15'),
(8, 'Quesadillas', '0.30'),
(9, 'Maruchan', '1.10'),
(10, 'Maruchan Preparada', '1.25'),
(11, 'Laky', '0.90'),
(12, 'Laky preparada', '1.25'),
(13, 'Bombones', '0.15'),
(14, 'Coca cola en lata', '0.75'),
(15, 'Cerveza lata pequeña', '1.25'),
(16, 'Cerveza lata grande', '1.60'),
(17, 'Cerveza vidrio pequeña', '1.25'),
(18, 'Cerveza vidrio grande', '2.25'),
(19, 'zibas', '0.35'),
(20, 'palomitas', '0.35'),
(21, 'Aceite Orisol', '2.25'),
(22, 'Aceite Mazola', '2.25'),
(23, '1 libra de friol', '1.75'),
(24, '2 libras de frijol', '3.50'),
(25, 'libra de arroz', '0.85'),
(26, 'bolsa de cafe toro', '0.30'),
(27, 'cafe listo', '0.15'),
(28, 'salchichas', '1.75'),
(29, 'Bolsa de medallon pequeña', '1.40'),
(30, 'caja de medallon grande', '2.00'),
(31, 'caja de alitas pequeña', '2.50'),
(32, 'caja de alitas grande', '3.75'),
(33, 'coca cola de vidrio', '0.60');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
