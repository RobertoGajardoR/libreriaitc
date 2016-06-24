<?php 
// Información de conexión a la base 
include("datos/conex.php");


try{ 
    $sql = “-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2016 a las 22:13:56
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idautor` int(11) NOT NULL,
  `nombrea` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoa` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidosa` char(25) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idautor`, `nombrea`, `apellidoa`, `apellidosa`) VALUES
(12, 'Carlo', 'urrutia', 'salazar'),
(13, 'pablo', 'palacios', 'morales'),
(14, 'roberto', 'gajardo', 'rodriguez'),
(15, 'antonio', 'labra', 'pinto'),
(16, 'juan', 'larrain', 'pedrero'),
(17, 'shafu', 'hernadez', 'castillo'),
(18, 'comomiro', 'melocreo', 'carrasco'),
(24, 'christian', 'torres', 'norambuena'),
(25, 'leon', 'carrasco', 'nazaret'),
(26, 'jesus', 'bachellet', 'azul'),
(27, 'arturo', 'perez', 'morales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idedicion` int(11) NOT NULL,
  `idprestamo` int(11) NOT NULL,
  `fechad` date NOT NULL,
  `fechar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `idedicion` int(11) NOT NULL,
  `ano` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idlibro` int(11) NOT NULL,
  `ideditorial` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`idedicion`, `ano`, `idlibro`, `ideditorial`, `cantidad`) VALUES
(15, '1998', 39, 17, 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `ideditorial` int(11) NOT NULL,
  `nombree` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`ideditorial`, `nombree`, `direccion`) VALUES
(15, 'sentillana', 'en ninguna parte'),
(16, 'uviÃ±adelmar', 'carretera de la muerte'),
(17, 'copihue', 'bagdat 666');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idgenero` int(11) NOT NULL,
  `genero` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idgenero`, `genero`) VALUES
(3, 'accion'),
(6, 'drama'),
(19, 'miedo'),
(4, 'romantica'),
(5, 'suspenso'),
(18, 'thriller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idlibro` int(11) NOT NULL,
  `idautor` int(11) NOT NULL,
  `nombrel` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idgenero` int(11) NOT NULL,
  `ano` int(10) NOT NULL,
  `ideditorial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idlibro`, `idautor`, `nombrel`, `idgenero`, `ano`, `ideditorial`) VALUES
(38, 12, 'al borde del abismo ', 6, 2014, 15),
(39, 13, 'mentiras mentirosas', 4, 2009, 16),
(40, 13, 'presos de sus sueÃ±os', 5, 2006, 15),
(41, 15, 'perros de paja', 6, 2004, 17),
(42, 12, 'knklmk', 6, 1903, 15),
(43, 15, 'todos los perritos se van al cielo', 4, 1913, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libroxautor`
--

CREATE TABLE `libroxautor` (
  `idautor` int(11) NOT NULL,
  `idlibro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `pasadmin` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `pasadmin`) VALUES
(1, 'roberto', '12345', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idprestamo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idlibro` int(11) NOT NULL,
  `idsocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`idprestamo`, `fecha`, `idlibro`, `idsocio`) VALUES
(40, '2016-06-23', 38, 92),
(41, '2016-08-13', 39, 91),
(42, '2016-06-30', 38, 94);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE `socio` (
  `idsocio` int(11) NOT NULL,
  `nombres` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` char(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoss` char(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`idsocio`, `nombres`, `apellidos`, `apellidoss`, `telefono`, `correo`) VALUES
(91, 'Roberto', 'Gajardo', 'Rodriguez', '45665465', 'roberto@gmail.com'),
(92, 'Andres', 'Garrido', 'Pinto rejas', '6484848', 'andres@gmail.com'),
(94, 'abarzua', 'castillo', 'negro', '4856484', 'abarzua@gmail.com'),
(136, 'Antonio', 'oyarsun', 'palacios', '546851', 'antonio@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idautor`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idedicion`,`idprestamo`),
  ADD KEY `Relationship18` (`idprestamo`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`idedicion`),
  ADD KEY `idlibro` (`idlibro`),
  ADD KEY `ideditorial` (`ideditorial`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`ideditorial`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`),
  ADD UNIQUE KEY `genero` (`genero`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idlibro`),
  ADD KEY `editorial` (`ideditorial`),
  ADD KEY `idautor` (`idautor`),
  ADD KEY `idgenero` (`idgenero`);

--
-- Indices de la tabla `libroxautor`
--
ALTER TABLE `libroxautor`
  ADD PRIMARY KEY (`idautor`,`idlibro`),
  ADD KEY `Relationship4` (`idlibro`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idprestamo`),
  ADD KEY `idlibro` (`idlibro`),
  ADD KEY `idsocio` (`idsocio`);

--
-- Indices de la tabla `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`idsocio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idautor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `idedicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `ideditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idlibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idprestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `socio`
--
ALTER TABLE `socio`
  MODIFY `idsocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `Relationship17` FOREIGN KEY (`idedicion`) REFERENCES `edicion` (`idedicion`),
  ADD CONSTRAINT `Relationship18` FOREIGN KEY (`idprestamo`) REFERENCES `prestamo` (`idprestamo`);

--
-- Filtros para la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD CONSTRAINT `edicion_ibfk_1` FOREIGN KEY (`ideditorial`) REFERENCES `editorial` (`ideditorial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `edicion_ibfk_2` FOREIGN KEY (`idlibro`) REFERENCES `libro` (`idlibro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`ideditorial`) REFERENCES `editorial` (`ideditorial`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`idautor`) REFERENCES `autor` (`idautor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`idgenero`) REFERENCES `genero` (`idgenero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libroxautor`
--
ALTER TABLE `libroxautor`
  ADD CONSTRAINT `Relationship3` FOREIGN KEY (`idautor`) REFERENCES `autor` (`idautor`),
  ADD CONSTRAINT `Relationship4` FOREIGN KEY (`idlibro`) REFERENCES `libro` (`idlibro`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idsocio`) REFERENCES `socio` (`idsocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`idlibro`) REFERENCES `libro` (`idlibro`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
”; 
    mysqli_query($db,$sql);
    echo “<h3>Table creada!</h3>”; 
} 
catch(Exception $e){ 
    die(print_r($e)); 
    echo “<h3>error alguna wea!</h3>”; 
} 
echo “<h3>Table creada!</h3>”; 
?>
