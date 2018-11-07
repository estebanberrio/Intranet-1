-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2018 a las 14:36:08
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
-- Base de datos: `ws`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardarantiguedadcxc`
--

CREATE TABLE `guardarantiguedadcxc` (
  `IdCompania` int(11) NOT NULL,
  `Nombrecliente` varchar(150) NOT NULL,
  `Moneda` int(11) NOT NULL,
  `CuentaCXC` varchar(20) NOT NULL,
  `DiasCredito` int(11) NOT NULL,
  `FechaDocumento` date NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `MontoOriginal` decimal(21,2) NOT NULL,
  `Sinvencer` decimal(21,2) NOT NULL,
  `De1a30` decimal(21,2) NOT NULL,
  `De31a60` decimal(21,2) NOT NULL,
  `Mas90` decimal(21,2) NOT NULL,
  `Tipo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardarbancos`
--

CREATE TABLE `guardarbancos` (
  `IdCompania` int(11) NOT NULL,
  `Banco` varchar(100) NOT NULL,
  `Moneda` int(11) NOT NULL,
  `CuentaCliente` varchar(50) NOT NULL,
  `NombreCuenta` varchar(100) NOT NULL,
  `Disponible` decimal(21,2) NOT NULL,
  `Tipo` varchar(150) NOT NULL,
  `FechaSaldo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardarimpuesto`
--

CREATE TABLE `guardarimpuesto` (
  `IdCompania` int(11) NOT NULL,
  `CuentaImpuesto` varchar(20) NOT NULL,
  `IdClasificacion` int(11) NOT NULL,
  `Monto` decimal(21,2) NOT NULL,
  `Descripcion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardarinventario`
--

CREATE TABLE `guardarinventario` (
  `IdCompania` int(11) NOT NULL,
  `Sector` varchar(100) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Familia` varchar(100) NOT NULL,
  `Cliente` varchar(100) NOT NULL,
  `Articulo` varchar(100) NOT NULL,
  `ArticuloDescripcion` varchar(100) NOT NULL,
  `Boleta` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Permanencia` int(11) NOT NULL,
  `Saldo` decimal(21,2) NOT NULL,
  `VentasAnuales` decimal(21,2) NOT NULL,
  `Peso` decimal(21,2) NOT NULL,
  `Costo` decimal(21,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardartipocambio`
--

CREATE TABLE `guardartipocambio` (
  `TipoCambioCompra` decimal(21,2) NOT NULL,
  `TipoCambioVenta` decimal(21,2) NOT NULL,
  `Moneda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `init`
--

CREATE TABLE `init` (
  `IdCompania` int(11) NOT NULL,
  `Usuario` varchar(150) NOT NULL,
  `Contraseña` varchar(150) NOT NULL,
  `TOKEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `init`
--

INSERT INTO `init` (`IdCompania`, `Usuario`, `Contraseña`, `TOKEN`) VALUES
(111, '*FINANZASGRUPO*', '*FINANZASGRUPO*', '52C6F396-2B9B-47D7-B590-F23ACA7A555D');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
