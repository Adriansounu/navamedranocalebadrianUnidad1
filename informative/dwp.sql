-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2024 a las 01:00:46
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
-- Base de datos: `dwp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`) VALUES
(1, 'Caleb Adrian', 'Nava Medrano', 'cnava.pkt@outlook.com', '$2y$10$HwwOgsoxUP91i3Ed.aNqEOzRHI.tGm1ygvrmFqZHbfQDCIdGrX8TW'),
(2, 'Caleb Adrian', 'Nava Medrano', 'cnaa.pkt@outlook.com', '$2y$10$ldcR.FBgiQzr.ScZyM3lyO2GoLelIE0tZQSef7LaukhmlfJ39RiRy'),
(3, 'Caleb Adrian', 'Nava Medrano', 'cnaad.pkt@outlook.com', '$2y$10$Upx3CSFI88LSah3WeJlb0.OaqQhy8SF1cQlmjyJHEcodU68gJS4MC'),
(4, 'Caleb Adrian', 'Nava Medrano', 'calebadri@hotmail.com', '$2y$10$fEs6u6J./7B9icGlT1MFTuexRjXjhYbSrejuG5.gV0CCbTJ72hPUq'),
(5, 'Caleb Adrian', 'Nava Medrano', 'c@outlook.com', '$2y$10$FwsREi3.Ce8pTLY7M6D0..THlkYanm0nd7BLhQh4iQQIiewD3Ng36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
