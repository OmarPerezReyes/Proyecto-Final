-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 20:52:44
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_register`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `correo_admin` int(11) NOT NULL,
  `contrasena_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre_carrera` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_grupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `cantidad_alumnos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_post`
--

CREATE TABLE `ingreso_post` (
  `id` int(11) NOT NULL,
  `id_ingreso_previo` int(11) NOT NULL,
  `proceso_ingreso` tinyint(1) NOT NULL,
  `medida_temperatura` tinyint(1) NOT NULL,
  `tunel_sanitizante` tinyint(1) NOT NULL,
  `gel_antibacterial` tinyint(1) NOT NULL,
  `desinfeccion_calzado` tinyint(1) NOT NULL,
  `cubrebocas` tinyint(1) NOT NULL,
  `distancia_social_alumno` tinyint(1) NOT NULL,
  `distancia_social_docentes` tinyint(1) NOT NULL,
  `agua_jabon` tinyint(1) NOT NULL,
  `medidas_implementadas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_previo`
--

CREATE TABLE `ingreso_previo` (
  `id` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `fiebre` tinyint(1) NOT NULL,
  `tos` tinyint(1) NOT NULL,
  `dolor_cabeza` tinyint(1) NOT NULL,
  `sintomas` text COLLATE utf8_spanish_ci NOT NULL,
  `lugares_publicos` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `visitas` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingreso_previo`
--

INSERT INTO `ingreso_previo` (`id`, `id_registro`, `fiebre`, `tos`, `dolor_cabeza`, `sintomas`, `lugares_publicos`, `visitas`, `productos`) VALUES
(2, 0, 0, 0, 0, 'dolorC', '3-', '5', 'spray'),
(6, 0, 0, 0, 0, 'Array', '1-2', '1-2', 'Array');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `confirmacion` tinyint(1) NOT NULL,
  `carta_compromiso` blob NOT NULL,
  `certificado_vacunacion` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numero_alumno_grupo` int(11) NOT NULL,
  `correo` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(2) NOT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `numero_alumno_grupo`, `correo`, `contrasena`, `edad`, `sexo`, `id_grupo`, `id_carrera`) VALUES
(1, 'Mario', 'Coyoy López', 10, '2130225@upv.edu.mx', '2130225', 18, 'Masculino', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso_post`
--
ALTER TABLE `ingreso_post`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso_previo`
--
ALTER TABLE `ingreso_previo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingreso_post`
--
ALTER TABLE `ingreso_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingreso_previo`
--
ALTER TABLE `ingreso_previo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`),
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id_grupo`);

--
-- Filtros para la tabla `ingreso_post`
--
ALTER TABLE `ingreso_post`
  ADD CONSTRAINT `ingreso_post_ibfk_1` FOREIGN KEY (`id_ingreso_previo`) REFERENCES `ingreso_previo` (`id`);

--
-- Filtros para la tabla `ingreso_previo`
--
ALTER TABLE `ingreso_previo`
  ADD CONSTRAINT `ingreso_previo_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
