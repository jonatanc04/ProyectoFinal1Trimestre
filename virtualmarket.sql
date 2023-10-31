-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-10-2023 a las 18:27:43
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtualmarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `dniCliente` varchar(9) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dniCliente` varchar(9) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `email` varchar(75) NOT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `administrador` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dniCliente`, `nombre`, `direccion`, `email`, `pwd`, `administrador`) VALUES
('1', 'Admin', 'Avda Correos 132', 'admin@midominio.es', 'Admin\r\n', 'true'),
('10', 'Victor', 'Avda Correos 132', 'victor@midominio.es', 'Victor', 'false'),
('15', 'Laura', 'C/ Admin', 'admin@gmail.com', 'Laura', 'false'),
('33', 'Fernando', '', 'fernando@alo.es', '33', NULL),
('44444444', 'Marta', 'C/ Valeras 4', 'marta@midominio.es', 'Marta', 'false'),
('55', 'Carlos', '', 'Carlos@sainz.es', '3', NULL),
('7777777', 'Miguel', 'C/Santoña15', 'manuel@midominio.es', 'Miguel', 'false');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaspedidos`
--

CREATE TABLE `lineaspedidos` (
  `idPedido` int(4) NOT NULL,
  `nlinea` int(2) NOT NULL,
  `idProducto` int(6) DEFAULT NULL,
  `cantidad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lineaspedidos`
--

INSERT INTO `lineaspedidos` (`idPedido`, `nlinea`, `idProducto`, `cantidad`) VALUES
(1, 1, 2, 5),
(1, 2, 1, 3),
(1, 3, 3, 3),
(1, 4, 4, 3),
(2, 1, 5, 10),
(2, 2, 7, 10),
(5, 1, 5, 3),
(5, 2, 5, 3),
(5, 3, 2, 4),
(5, 4, 9, 4),
(6, 1, 1, 3),
(6, 2, 7, 2),
(6, 3, 9, 2),
(6, 4, 6, 200),
(10, 1, 6, 2),
(10, 2, 1, 2),
(10, 3, 9, 4),
(10, 4, 4, 10),
(11, 1, 11, 200),
(12, 1, 2, 3),
(12, 2, 9, 2),
(12, 3, 5, 10),
(12, 4, 4, 1),
(13, 1, 8, 3),
(13, 2, 9, 3),
(13, 3, 1, 200),
(13, 4, 3, 4),
(13, 5, 4, 10),
(14, 1, 1, 1),
(14, 2, 7, 1),
(14, 3, 8, 4),
(15, 1, 3, 1),
(15, 2, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `dirEntrega` varchar(50) NOT NULL,
  `nTarjeta` varchar(50) DEFAULT NULL,
  `fechaCaducidad` date DEFAULT NULL,
  `matriculaRepartidor` varchar(8) DEFAULT NULL,
  `dniCliente` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `fecha`, `dirEntrega`, `nTarjeta`, `fechaCaducidad`, `matriculaRepartidor`, `dniCliente`) VALUES
(1, '1111-01-01', 'C/ Valeras, 22', '111111', '2020-02-02', 'pbf-1144', '10'),
(2, '2021-11-16', 'C/ Princesa, 15', '333333', '2020-02-02', 'bbc-2589', '10'),
(5, '2020-11-09', '', NULL, NULL, NULL, '10'),
(6, '1010-11-16', '', NULL, NULL, NULL, '10'),
(10, '2020-11-17', '', NULL, NULL, NULL, '15'),
(11, '2020-11-17', '', NULL, NULL, NULL, '32'),
(12, '2020-11-18', '', NULL, NULL, NULL, '15'),
(13, '2020-11-19', '', NULL, NULL, NULL, '10'),
(14, '2020-11-23', '', NULL, NULL, NULL, '10'),
(15, '2020-11-23', '', NULL, NULL, NULL, '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `origen` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `categoria` enum('frio','congelado','seco') DEFAULT NULL,
  `peso` int(3) NOT NULL,
  `unidades` int(5) NOT NULL,
  `volumen` int(4) DEFAULT NULL,
  `precio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `origen`, `foto`, `marca`, `categoria`, `peso`, `unidades`, `volumen`, `precio`) VALUES
(1, 'PlayStation 5 Controller', 'China', 'mandops5.png', 'sony', 'seco', 250, 100, 10, 80),
(2, 'Nintendo 64 Controller', 'Japon', 'n64.png', 'nintendo', 'seco', 250, 100, 10, 15),
(3, 'Switch Pro Controller', 'Japon', 'switch-pro.png', 'nintendo', 'seco', 250, 100, 10, 45),
(4, 'Itachi PS4 Controller', 'China', 'itachips4.png', 'sony', 'seco', 250, 100, 10, 100),
(5, 'SNES Controller', 'Japon', 'snes.png', 'nintendo', 'seco', 125, 100, 10, 40),
(6, 'Wii Pro Controller', 'Japon', 'wii-pro.png', 'nintendo', 'seco', 250, 100, 10, 40),
(7, 'XBOX One Controller', 'EEUU', 'xbox.png', 'microsoft', 'seco', 800, 100, 10, 65),
(8, 'XBOX Special Controller', 'EEUU', 'xbox-old.png', 'microsoft', 'seco', 150, 100, 10, 35),
(9, 'CODWWII PS4 Controller', 'China', 'ps4mod.png', 'sony', 'frio', 100, 100, 10, 55);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dniCliente`);

--
-- Indices de la tabla `lineaspedidos`
--
ALTER TABLE `lineaspedidos`
  ADD PRIMARY KEY (`idPedido`,`nlinea`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
