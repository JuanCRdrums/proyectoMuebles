-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2018 a las 01:24:38
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `muebles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE `abonos` (
  `Codigo` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Abono` int(11) DEFAULT NULL,
  `Saldo` int(11) DEFAULT NULL,
  `CodCobro` int(11) NOT NULL,
  `CodMueble` int(11) NOT NULL,
  `Empresa` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Empresa` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Codigo` varchar(20) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Empresa` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

CREATE TABLE `cobro` (
  `Numero` int(11) NOT NULL,
  `CodMueble` int(11) DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `CodCliente` varchar(20) DEFAULT NULL,
  `FormaPago` varchar(30) DEFAULT NULL,
  `Sena` int(11) DEFAULT NULL,
  `Vendedor` varchar(100) DEFAULT NULL,
  `Empresa` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preventa`
--

CREATE TABLE `preventa` (
  `Numero` int(11) NOT NULL,
  `ValorMueble` int(30) NOT NULL,
  `FechaEntrega` date NOT NULL,
  `Color` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Articulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CodCliente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Sena` int(11) NOT NULL,
  `FormaPago` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Vendedor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Empresa` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `empresa` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Codigo`,`Empresa`);

--
-- Indices de la tabla `cobro`
--
ALTER TABLE `cobro`
  ADD PRIMARY KEY (`Numero`),
  ADD KEY `CodMueble` (`CodMueble`),
  ADD KEY `CodCliente` (`CodCliente`);

--
-- Indices de la tabla `preventa`
--
ALTER TABLE `preventa`
  ADD PRIMARY KEY (`Numero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonos`
--
ALTER TABLE `abonos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cobro`
--
ALTER TABLE `cobro`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `preventa`
--
ALTER TABLE `preventa`
  MODIFY `Numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
