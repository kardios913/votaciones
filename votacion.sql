-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2018 a las 20:36:14
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidato`
--

CREATE TABLE `candidato` (
  `idJornada` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `codigo` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `candidato`
--

INSERT INTO `candidato` (`idJornada`, `cedula`, `descripcion`, `estado`, `codigo`) VALUES
(51, '2222', 'hola', 'Aprobado', 2222),
(52, '1111', 'Jose Perez', 'Aprobado', 1111),
(52, '2222', 'Maria del Carmen', 'Aprobado', 2222),
(52, '3333', 'Pedro Del Carmen', 'Aprobado', 3333),
(53, '1111', 'Jose Perez #53', 'Aprobado', 1111),
(55, '2222', 'hola', 'Sin Revisar', 2222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `codigo` int(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `telefono` int(7) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `correoInstitucional` varchar(50) NOT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `nombreCarrera` varchar(30) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`codigo`, `nombre`, `contrasena`, `telefono`, `correo`, `correoInstitucional`, `fechaIngreso`, `estado`, `nombreCarrera`, `cedula`, `foto`) VALUES
(1111, 'Jose Perez', '1111', 5756677, 'joseperezufps@gmail.com', 'joseperezufps@gmail.com', '2012-02-13', 'activo', 'Ingenieria de sistemas', '1111', '../imagen/avatar5.png'),
(2222, 'Maria del Carmen', '2222', 121312, 'mariadecarmenufps@gmail.com', 'mariadecarmenufps@gmail.com', '2012-02-13', 'Activo', 'Tecn. obras civiles', '2222', '../imagen/avatar2.png'),
(3333, 'Pedro Lazaro', '3333', 121312, 'pedrolazaroufps@gmail.com', 'pedrolazaroufps@gmail.com', '2012-02-13', 'Activo', 'Tecn. obras civiles', '3333', '../imagen/avatar.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotocandidato`
--

CREATE TABLE `fotocandidato` (
  `ruta` varchar(200) DEFAULT NULL,
  `idJornada` int(11) NOT NULL,
  `codigo` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotocandidato`
--

INSERT INTO `fotocandidato` (`ruta`, `idJornada`, `codigo`) VALUES
('../ImagenCandidatos/imagesokerfondo.jpg', 51, 2222),
('../ImagenCandidatos/avatar5.png', 52, 1111),
('../ImagenCandidatos/avatar2.png', 52, 2222),
('../ImagenCandidatos/avatar04.png', 52, 3333),
('../ImagenCandidatos/avatar5.png', 53, 1111),
('../ImagenCandidatos/imagesokerfondo.jpg', 55, 2222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `id` int(11) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `tipojornada` varchar(25) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `InicioCandidato` date NOT NULL,
  `FinCandidato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id`, `fechainicio`, `fechafin`, `tipojornada`, `Estado`, `usuario`, `InicioCandidato`, `FinCandidato`) VALUES
(51, '2018-06-30', '2018-06-30', 'Representante de consejo ', 'Activo', 'secregeneralufps@gmail.com', '2018-06-01', '2018-06-22'),
(52, '2018-06-30', '2018-06-30', 'Comite curricular', 'Culminado', 'secregeneralufps@gmail.com', '2018-06-08', '2018-06-28'),
(53, '2018-07-31', '2018-07-31', 'Comite de admisiones', 'Proceso', 'secregeneralufps@gmail.com', '2018-06-19', '2018-06-30'),
(54, '2018-06-20', '2018-06-20', 'Comite curricular', 'Activo', 'secregeneralufps@gmail.com', '2018-06-20', '2018-06-20'),
(55, '2018-07-21', '2018-06-20', 'Representante de Bienesta', 'Activo', 'secregeneralufps@gmail.com', '2018-07-14', '2018-06-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(30) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `contrasena`, `foto`) VALUES
('secregeneralufps@gmail.com', 'votaciones', '../imagen/avatar3.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE `voto` (
  `cedula` varchar(10) NOT NULL,
  `Hash` varchar(36) NOT NULL,
  `idJornada` int(11) NOT NULL,
  `VotoBlanco` tinyint(1) DEFAULT NULL,
  `idCandidato` int(11) DEFAULT NULL,
  `fechaVoto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `voto`
--

INSERT INTO `voto` (`cedula`, `Hash`, `idJornada`, `VotoBlanco`, `idCandidato`, `fechaVoto`) VALUES
('1111', ' 2113109e4b2f22d81a83aa1a1ac7b172', 52, 1, NULL, '2018-06-20 04:24:12'),
('2222', ' 829e529e8b7db860bdf1506869c656b5', 52, NULL, 2222, '2018-06-20 04:23:27'),
('3333', ' ebed8ebfc4459f393819e57a781644cf', 52, NULL, 3333, '2018-06-20 04:22:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`idJornada`,`cedula`),
  ADD KEY `foraneaCedula` (`cedula`),
  ADD KEY `idJornada` (`idJornada`,`codigo`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `fotocandidato`
--
ALTER TABLE `fotocandidato`
  ADD PRIMARY KEY (`idJornada`,`codigo`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreaneaUsuario` (`usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`cedula`,`idJornada`),
  ADD KEY `foraneajornada` (`idJornada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `candidato`
--
ALTER TABLE `candidato`
  ADD CONSTRAINT `candidato_ibfk_1` FOREIGN KEY (`idJornada`,`codigo`) REFERENCES `fotocandidato` (`idJornada`, `codigo`),
  ADD CONSTRAINT `foraneaCedula` FOREIGN KEY (`cedula`) REFERENCES `estudiante` (`cedula`),
  ADD CONSTRAINT `foraneajorn` FOREIGN KEY (`idJornada`) REFERENCES `jornada` (`id`);

--
-- Filtros para la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD CONSTRAINT `foreaneaUsuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`correo`);

--
-- Filtros para la tabla `voto`
--
ALTER TABLE `voto`
  ADD CONSTRAINT `cedulafr` FOREIGN KEY (`cedula`) REFERENCES `estudiante` (`cedula`),
  ADD CONSTRAINT `foraneajornada` FOREIGN KEY (`idJornada`) REFERENCES `jornada` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
