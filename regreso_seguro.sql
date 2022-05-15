-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2022 a las 22:44:11
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `regreso_seguro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `correo_admin` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena_admin` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `correo_admin`, `contrasena_admin`) VALUES
(1, 'spolancom@upv.edu.mx', 'saidpolanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_matricula` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `codigo_qr` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_perfil` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_matricula`, `nombre`, `apellidos`, `correo`, `contrasena`, `edad`, `sexo`, `id_grupo`, `id_carrera`, `codigo_qr`, `imagen_perfil`, `estado`) VALUES
(2130010, 'Nuria Yaretzi', 'Rivera Zamarrón', '2130010@upv.edu.mx', '2130010', 18, 'Femenino', 1, 1, '../assets/files/codigo_qrNuria.png', '../assets/files/imagen_perfil/Nuria (1).png', 1),
(2130058, 'Adrián', 'Pérez Facundo', '2130058@upv.edu.mx', '2130058', 18, 'Masculino', 1, 2, '../assets/files/codigo_qrAdrian.png', '../assets/files/imagen_perfil/Adrian (1).png', 1),
(2130072, 'Juan Daniel', 'Torres Colorado', '2130072@upv.edu.mx', '2130072', 17, 'Masculino', 2, 1, '../assets/files/codigo_qrDaniel.png', '../assets/files/imagen_perfil/Daniel (1).png', 0),
(2130073, 'Omar Alejandro', 'Pérez Reyes', '2130073@upv.edu.mx', '2130073', 18, 'Masculino', 3, 1, '../assets/files/codigo_qrOmar.png', '../assets/files/imagen_perfil/Omar (1).png', 0),
(2130225, 'Mario', 'Coyoy López', '2130225@upv.edu.mx', '2130225', 18, 'Masculino', 1, 2, '../assets/files/codigo_qrMario.png', '../assets/files/imagen_perfil/Mario (1).png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre_carrera` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_grupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre_carrera`, `cantidad_grupos`) VALUES
(1, 'Ingeniería en Tecnologías de la Información', 3),
(2, 'Ingeniería Mecatrónica', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `nombre_grupo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_alumnos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `id_carrera`, `nombre_grupo`, `cantidad_alumnos`) VALUES
(1, 1, 'IMMER-1', 15),
(2, 1, 'IMMER-2', 15),
(3, 1, 'IMMER-3', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_post`
--

CREATE TABLE `ingreso_post` (
  `id` int(11) NOT NULL,
  `id_ingreso_previo` int(11) NOT NULL,
  `proceso_ingreso` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `medida_temperatura` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `tunel_sanitizante` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `gel_antibacterial` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `desinfeccion_calzado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `cubrebocas` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `distancia_social_alumnos` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `distancia_social_docentes` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `agua_jabon` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `medidas_implementadas` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingreso_post`
--

INSERT INTO `ingreso_post` (`id`, `id_ingreso_previo`, `proceso_ingreso`, `medida_temperatura`, `tunel_sanitizante`, `gel_antibacterial`, `desinfeccion_calzado`, `cubrebocas`, `distancia_social_alumnos`, `distancia_social_docentes`, `agua_jabon`, `medidas_implementadas`) VALUES
(2, 0, 'Si', 'No', 'Si', 'No', 'Si', 'Si', 'Si', 'No', 'Si', 'No'),
(3, 0, 'Si', 'No', 'No', 'Si', 'Si', 'No', 'Si', 'Si', 'No', 'Si'),
(4, 0, 'Si', 'Si', 'Si', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(5, 0, 'Si', 'No', 'Si', 'No', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(6, 0, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'No', 'No', 'Si'),
(7, 0, 'Si', 'Si', 'No', 'No', 'Si', 'No', 'Si', 'No', 'Si', 'No'),
(8, 0, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'No', 'Si', 'Si', 'Si'),
(9, 0, 'Si', 'No', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si'),
(10, 0, 'No', 'No', 'No', 'Si', 'Si', 'Si', 'No', 'Si', 'Si', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_previo`
--

CREATE TABLE `ingreso_previo` (
  `id` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `fiebre` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `tos` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `dolor_cabeza` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `sintomas` text COLLATE utf8_spanish_ci NOT NULL,
  `lugares_publicos` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `visitas_conocidos` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingreso_previo`
--

INSERT INTO `ingreso_previo` (`id`, `id_registro`, `fiebre`, `tos`, `dolor_cabeza`, `sintomas`, `lugares_publicos`, `visitas_conocidos`, `productos`) VALUES
(5, 0, 'No', 'No', 'No', 'cansancio, gustoOl, dolorG, dolorC, molestiasD, diarrea, erupcion, ojosR, disnea, perdidaM, dolorP', '5', '5', 'gel, cubrebocas, spray'),
(6, 0, 'Si', 'Si', 'Si', 'ninguno', '5', '3-4', 'gel, cubrebocas, spray'),
(7, 0, 'Si', 'Si', 'No', 'gustoOl, erupcion', '3-4', '3-4', 'gel, cubrebocas, spray'),
(8, 0, 'Si', 'Si', 'Si', 'ninguno', '1-2', '5', 'gel, cubrebocas, spray'),
(9, 0, 'Si', 'Si', 'Si', 'molestiasD', '3-4', '3-4', 'gel, cubrebocas, spray'),
(10, 0, 'Si', 'No', 'No', 'dolorP', '5', '5', 'ninguno'),
(11, 0, 'Si', 'Si', 'No', 'tosSeca', '1-2', '3-4', 'gel'),
(12, 0, 'Si', 'Si', 'Si', 'ninguno', '3-4', '5', 'gel'),
(13, 0, 'Si', 'Si', 'Si', 'ninguno', '3-4', '1-2', 'ninguno'),
(14, 0, 'No', 'No', 'No', 'ninguno', '1-2', '1-2', 'gel, cubrebocas, spray'),
(15, 0, 'Si', 'Si', 'Si', 'ninguno', '3-4', '3-4', 'ninguno'),
(16, 0, 'No', 'No', 'No', 'ninguno', '5', '5', 'spray'),
(17, 0, 'Si', 'No', 'No', 'ninguno', '1-2', '1-2', 'ninguno'),
(18, 0, 'Si', 'Si', 'Si', 'tosSeca', '1-2', '3-4', 'cubrebocas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `carta_compromiso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `certificado_vacunacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `confirmacion` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `id_alumno`, `carta_compromiso`, `certificado_vacunacion`, `confirmacion`) VALUES
(1, 0, '../files/SOLICITUD TRAMITE TITULO.pdf', '../files/1-s2.0-S0212656720301451-main.pdf', 'Si'),
(2, 0, '../files/PERO030803HTSRYMA1 (3).pdf', '../files/Reporte-1.pdf', 'Si'),
(3, 0, '../assets/filesPERO030803HTSRYMA1 (3).pdf', '../assets/filesReporte-1.pdf', 'Si'),
(4, 0, '../assets/filesPERO030803HTSRYMA1 (3).pdf', '../assets/filesReporte-1.pdf', 'Si'),
(5, 0, '../assets/filesDiagramaBaseDeDatosDelSistemaDeMoni', '../assets/filesCuestionario.pdf', 'Si'),
(6, 0, '../assets/files/pdf-formulario-calc-dif_compress.p', '../assets/files/Formulario_Calculo_Diferencial_e_I', 'Si'),
(7, 0, '../assets/files/Portafolio de evidencias. Geometrí', '../assets/files/18 de octubre de 2021 (1).pdf', 'No'),
(8, 0, '../assets/files/22 noviembre 2021.pdf', '../assets/files/Examen (1).pdf', 'Si'),
(9, 0, '../assets/files/DiagramaBaseDeDatosDelSistemaDeMon', '../assets/files/Reporte-1.pdf', 'Si'),
(10, 0, '../assets/files/DiagramaBaseDeDatosDelSistemaDeMon', '../assets/files/Cuestionario.pdf', 'No'),
(11, 0, '../assets/files/MapaMentalDeLecturas (15).pdf', '../assets/files/MapaMentalDeLecturas (13).pdf', 'No'),
(12, 0, '../assets/files/MapaMentalDeLecturas (15).pdf', '../assets/files/screencapture-127-0-0-1-SMC-admin-', 'Si'),
(13, 0, '../assets/files/screencapture-127-0-0-1-SMC-admin-', '../assets/files/screencapture-127-0-0-1-SMC-admin-', 'Si'),
(14, 0, '../assets/files/screencapture-127-0-0-1-SMC-admin-', '../assets/files/screencapture-127-0-0-1-SMC-admin-', 'Si'),
(15, 0, '../assets/files/screencapture-127-0-0-1-SMC-admin-', '../assets/files/screencapture-127-0-0-1-SMC-admin-', 'Si'),
(16, 0, '../assets/files/screencapture-127-0-0-1-SMC-admin-', '../assets/files/screencapture-127-0-0-1-SMC-admin-', 'Si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `id_carrera_fk` (`id_carrera`),
  ADD KEY `id_grupo_fk` (`id_grupo`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carrera_fk` (`id_carrera`);

--
-- Indices de la tabla `ingreso_post`
--
ALTER TABLE `ingreso_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_registro_fk` (`id_ingreso_previo`);

--
-- Indices de la tabla `ingreso_previo`
--
ALTER TABLE `ingreso_previo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_registro_fk` (`id_registro`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno_fk` (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingreso_post`
--
ALTER TABLE `ingreso_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ingreso_previo`
--
ALTER TABLE `ingreso_previo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
