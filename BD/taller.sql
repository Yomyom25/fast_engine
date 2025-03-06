-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 00:55:17
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
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre`, `apellido`, `email`, `contrasena`, `fecha_nacimiento`) VALUES
(1, 'Administrador', 'General', 'admin@admin.com', '$2y$10$OdVhu5S7UEnWlhXEb.yvQu5phEoceA3HI3XwxB9x4mlcLVfD1RycC', '2025-03-05'),
(3, 'Angel', 'Trinidad', 'cupid@gmail.com', '$2y$10$4Wk.dn2ZxTDboqeHu1O84.FxR1qfeTjxL6N9WHQltJdsDJtkA/rka', '2025-02-14'),
(4, 'Leslie', 'Sanches', 'leli23@gmail.com', '$2y$10$ApoX11.5Q4AJavPaE310DewyE3VFJDUMIFwhuVLK5mC4DXLtTzYSS', '2025-09-23'),
(5, 'Yomara', 'Euan', 'yomaeuanh@gmail.com', '', '2025-09-27'),
(7, 'pruebass', 'pruebass', 'prueba@gmail.com', '$2y$10$4hmoutgPPtWTcg0Vvd4uw.fz2ZgfDIzW6F5e0H1DZrfZVyZcZgU12', '2025-03-13'),
(8, 'dos', 'dos', 'yomyeh25@gmail.com', '$2y$10$XchXcewYwzp61EPmXXMFlOIP2sw6NCSFkm84WwIAY9.sLH4ZqZtXC', '2025-03-13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
