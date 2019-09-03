-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-09-2019 a las 09:15:48
-- Versión del servidor: 10.1.38-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `semestre` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`codigo`, `nombre`, `semestre`, `estado`) VALUES
('11465', 'Cálculo I', 1, 'A'),
('307', 'Álgebra Lineal', 2, 'A'),
('311-1', 'Cálculo II', 2, 'A'),
('312-1', 'Mecánica', 2, 'A'),
('318-1', 'Laboratorio de Mecánica', 2, 'A'),
('EDP141', 'Lectura y escritura', 1, 'A'),
('EFISH1', 'Electiva Fish1', 1, 'A'),
('EFISH2', 'Electiva FISH-II', 2, 'A'),
('SIS0101', 'Introducción a la informática', 1, 'A'),
('SIS0102', 'Laboratorio de introducción a la informática', 1, 'A'),
('SIS0103', 'Introducción a la Ingeniería de Sistemas', 1, 'A'),
('SIS201', 'Programación Orientada a Objetos', 2, 'A'),
('SIS201-L', 'Lab. Programación OO', 2, 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
