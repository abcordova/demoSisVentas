-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-05-2016 a las 00:06:46
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crudgestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detventa`
--

CREATE TABLE `detventa` (
  `idDetVenta` bigint(20) NOT NULL,
  `fkidventa` bigint(20) DEFAULT NULL,
  `fkidproducto` bigint(20) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valorTotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `identificacion` bigint(20) DEFAULT NULL,
  `nombresApellidos` varchar(100) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombresApellidos`, `genero`, `direccion`, `telefono`) VALUES
(1, 98082852980, 'Sergio Andres Guzman Rivera', 'M', 'calle 123', 123456789),
(3, 1031816123, 'Maria Fernanda Rivera', 'M', 'calle 23', 987654321),
(4, 5238835712, 'Mari Luz Rivera Jimenez', 'F', 'calle 140 C # 137 - 50', 5367871),
(5, 567865, 'Nicol Daniela Zea Castro', 'F', 'calle gaitana', 45675);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` bigint(20) NOT NULL,
  `descripcion` text,
  `valorUnitario` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `descripcion`, `valorUnitario`) VALUES
(1, 'Arroz de mi cuchas', 23),
(2, 'Mi productoy', 326),
(3, 'celucoooo', 20),
(4, 'pollo', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` bigint(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantTotal` int(11) DEFAULT NULL,
  `totalVenta` double DEFAULT NULL,
  `fkidpersona` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detventa`
--
ALTER TABLE `detventa`
  ADD PRIMARY KEY (`idDetVenta`),
  ADD KEY `fk_detVenta_venta` (`fkidventa`),
  ADD KEY `fk_detVenta_producto` (`fkidproducto`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_persona` (`fkidpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detventa`
--
ALTER TABLE `detventa`
  MODIFY `idDetVenta` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detventa`
--
ALTER TABLE `detventa`
  ADD CONSTRAINT `fk_detVenta_producto` FOREIGN KEY (`fkidproducto`) REFERENCES `producto` (`idproducto`),
  ADD CONSTRAINT `fk_detVenta_venta` FOREIGN KEY (`fkidventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_persona` FOREIGN KEY (`fkidpersona`) REFERENCES `persona` (`idpersona`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
