-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-01-2019 a las 19:36:17
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laliebredb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `layer` varchar(40) NOT NULL,
  `img` text NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `Nombre`) VALUES
(1, 'Cereales'),
(5, 'Enlatados'),
(3, 'Frutas y Verduras'),
(2, 'Galletas'),
(7, 'Jabón de Tocador'),
(4, 'Jugos y Refrescos'),
(6, 'Mayonesas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `Nombre`, `Descripcion`, `imagen`, `idCategoria`, `precio`) VALUES
(1, 'Sprite 600ml', 'Con Sprite refrescas tus mejores momentos en familia', '738_sprite-lima-limon-600-ml-botella-pet_1.jpg', 4, 12.5),
(2, 'Cereal Cini Minis Nestle 400g', 'Cini minis delicioso sabor explosivo a canela', '0001600043089L1.jpg', 1, 59.9),
(3, 'Jumex Mango Tetra 1L', 'Nectar 100% natural con jugos Jumex', '0750101312203M.jpg', 4, 16.5),
(4, 'Jumex Manzana Clarificado Tetra 1L', 'Jugo 100% natural con jugos jumex.', '0750101312202L.jpg', 4, 16.5),
(5, 'Jumex Nectar Manzana Tetra 1L', 'Nectar 100% natural con Jumex', '0750101312219M.jpg', 4, 16.5),
(6, 'Saladitas Gamesa 137G', 'Saladitas Gamesa son las mejores acompañantes de tus comidas.', '0750100065840L.jpg', 2, 10.5),
(7, 'Principe Marinela 378G', 'Principes Marinela endulzando tu dia.', '0750103046741L.jpg', 2, 20.9),
(8, 'Corn Flakes Kelloggs 530G', 'Corn Flakes Kelloggs granos 100% naturales', '0750100802042L.jpg', 1, 33.9),
(9, 'Mayonesa Mccormick 390g', 'Con el toque de limón añade un gran sabor con mayonesa mccormick', '0750100334013L.jpg', 6, 27.9),
(10, 'Jabón Dove Original 135G', 'Jabón Dove te brinda una suavidad a tu piel que ningun otro jabón puede darte.', '0006723889119L2.jpg', 7, 13.9),
(11, 'Atún Dolores Aceite 140G', 'Nutre a tu familia con atún dolores.', '0750104540142L.jpg', 5, 14.9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usersys`
--

CREATE TABLE `usersys` (
  `id` int(3) NOT NULL,
  `nameU` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `prioridad` enum('user','admin','root') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usersys`
--
ALTER TABLE `usersys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usersys`
--
ALTER TABLE `usersys`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
