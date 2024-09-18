-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2024 a las 18:44:30
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
-- Base de datos: `proyecto_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(500) NOT NULL,
  `Tipo` varchar(500) NOT NULL,
  `Musculo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id`, `Nombre`, `Tipo`, `Musculo`) VALUES
(62, 'r', 'r', 'r'),
(63, 'e', 'e', 'e'),
(64, 'e', 'e', 'e'),
(65, 'asjhasgasgas', 'asdhasdhashdashd', 'asdgasgdgadsgdas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gimnasios`
--

CREATE TABLE `gimnasios` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(500) NOT NULL,
  `Ubicacion` varchar(500) NOT NULL,
  `Valoracion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gimnasios`
--

INSERT INTO `gimnasios` (`id`, `Nombre`, `Ubicacion`, `Valoracion`) VALUES
(2, 'eeee', 'eeee', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(500) NOT NULL,
  `Tipo` varchar(500) NOT NULL,
  `Descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id`, `Nombre`, `Tipo`, `Descripcion`) VALUES
(5, 'a', 'a', 'a'),
(6, 'e', 'e', 'e'),
(7, 'e', 'e', 'e'),
(8, 'asa', 'asa', 'asa'),
(9, 'aaaa', 'aaaaaaa', 'aaaaaaaaaaaa'),
(10, 'aaaasasas', 'assss', 'ssss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suplementacion`
--

CREATE TABLE `suplementacion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(500) NOT NULL,
  `Marca` varchar(500) NOT NULL,
  `Descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suplementacion`
--

INSERT INTO `suplementacion` (`id`, `Nombre`, `Marca`, `Descripcion`) VALUES
(7, 'e', 'e', 'e'),
(8, 'asasa', 'asasas', 'asasss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `provincia` varchar(500) NOT NULL,
  `localidad` varchar(500) NOT NULL,
  `idioma` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `password`, `provincia`, `localidad`, `idioma`) VALUES
(1, 'alberto', 'alberto@gmail.com', '4bdbc215d8dc3c571e802a69bced0c3071cc4a1f129ad97e15b357018aac6cd4', 'Cantabria', 'Cabezón de la Sal', 'esp'),
(2, 'pepe', 'pepe@gmail.com', '7c9e7c1494b2684ab7c19d6aff737e460fa9e98d5a234da1310c97ddf5691834', 'Santa Cruz de Tenerife', 'Adeje', 'esp'),
(3, 'juan', 'juan@gmail.com', 'ed08c290d7e22f7bb324b15cbadce35b0b348564fd2d5f95752388d86d71bcca', 'Santa Cruz de Tenerife', 'Victoria de Acentejo, La', 'esp'),
(4, 'loco', 'loco@loco.com', '4a630b8e79a0cd2fbae3f58e751abb28d0f4918f76af188d8996f13fabe08af8', 'Burgos', 'Abajas', 'eng'),
(5, 'pedro', 'pedro@gmail.com', 'ee5cd7d5d96c8874117891b2c92a036f96918e66c102bc698ae77542c186f981', 'Teruel', 'Allepuz', 'eng'),
(6, 'lucas', 'lucas@gmail.com', '7cadab457ad8d811f134612436daaa5e5914b20dc2502865f714035b0f267680', 'Cantabria', 'Campoo de Yuso', 'eng'),
(7, 'joselitoo', 'josele@gmail.com', 'bcb19a48feba2f4b0efedd7a8b8acdf6434151f045565300a63664597416ff8e', 'Cantabria', 'Alfoz de Lloredo', 'eng');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gimnasios`
--
ALTER TABLE `gimnasios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suplementacion`
--
ALTER TABLE `suplementacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `gimnasios`
--
ALTER TABLE `gimnasios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `suplementacion`
--
ALTER TABLE `suplementacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
