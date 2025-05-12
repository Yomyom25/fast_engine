-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2025 a las 22:04:57
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_cliente` int(11) NOT NULL,
  `Nombre_cliente` varchar(50) NOT NULL,
  `Empresa` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `ID_empleado` int(11) NOT NULL,
  `Nombre_empleado` varchar(50) NOT NULL,
  `Apellido_empleado` varchar(50) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID_empleado`, `Nombre_empleado`, `Apellido_empleado`, `FechaNacimiento`, `Sexo`) VALUES
(1, '1', '1', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `ID_Reporte` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Actividades` text NOT NULL,
  `Costo` float NOT NULL,
  `Empleados` int(11) NOT NULL,
  `Servicios` int(11) NOT NULL,
  `Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `ID_servicio` int(11) NOT NULL,
  `Nombre_servicio` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID_empleado`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`ID_Reporte`),
  ADD KEY `fk_empleados` (`Empleados`),
  ADD KEY `fk_servicios` (`Servicios`),
  ADD KEY `fk_clientes` (`Cliente`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ID_servicio`);

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

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`Servicios`) REFERENCES `servicios` (`ID_servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`Cliente`) REFERENCES `clientes` (`ID_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reportes_ibfk_3` FOREIGN KEY (`Empleados`) REFERENCES `empleados` (`ID_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
