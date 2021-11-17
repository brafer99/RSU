-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 02:37:59
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `alumno_id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `codigo` varchar(15) DEFAULT NULL,
  `edad` int(5) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `facultad` varchar(255) DEFAULT NULL,
  `escuela` varchar(255) DEFAULT NULL,
  `fecha_nac` int(5) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT 'Sin observaciones',
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`alumno_id`, `nombre`, `apellido`, `codigo`, `edad`, `cedula`, `telefono`, `correo`, `facultad`, `escuela`, `fecha_nac`, `observaciones`, `estatus`) VALUES
(1, 'Ana Sara', 'Ramos Mamani', '2020-117015', 258, '72435804', 977608607, 'asramosm@unjbg.edu.pe', 'FACULTAD DE EDUCACION, COMUNICACION E HUMANIDADES', 'IDEX', 2021, 'Primer puesto, premio: 250 soles', 1),
(2, 'Leslie Ariana', 'Calizaya Rivera', '2017-123029', 248, '72953767', 934182212, 'lcalizayar@unjbg.edu.pe', 'Facultad de Ciencias de la Salud', 'ESMH', 2021, 'Segundo puesto, Premio: 150', 1),
(3, 'Rusbell Saul', 'Jarro Genix', '2021-178049', 229, '72101180', 961067154, 'rsjarroq@unjbg.edu.pe', 'Facultad de Ciencias Agropecuarias', 'Escuela Profesional de Ingeniería Ambiental', 2021, 'Tercer Puesto, Premio 100 soles', 1),
(4, 'David Joel', 'Diaz Gomez', '2019-1030331', 86, '74417906', 932590710, '-@unjbg.edu.pe', 'Facultad de Ingeniería', 'ESME', 2021, 'Primer puesto, premio: 200', 1),
(5, 'Wilbert Gustavo', 'Cori Acero', '113013', 78, '74579203', 961435924, '-@unjbg.edu.pe', 'FACULTAD DE EDUCACION, COMUNICACION E HUMANIDADES', 'Escuela Profesional de Ciencias Sociales', 2021, 'Segundo puesto, Premio: 150', 1),
(6, 'Frank Gionvanni', 'Mamani Torres', '2017-109028', 74, '70599993', 955572511, '-@unjbg.edu.pe', 'Facultad de Ciencias Agropecuarias', 'Escuela Profesional de Ingeniería Agraria', 2021, 'Tercer Puesto, Premio 100 soles', 1),
(7, 'OSCAR ROBERTO', 'LOAIZA TELLO', '2021-127018', 100, '71910732', 910851756, '-@unjbg.edu.pe', 'FACULTAD DE CIENCIAS JURÍDICAS Y EMPRESARIALES', 'ESCUELA PROFESIONAL DE DERECHO', 2021, 'DANZA NACIONAL: Primer puesto, premio: 300 soles, puntaje 100 --- BAILE MODERNO: Segundo puesto, premio: 200 soles, puntaje: 79.3', 1),
(8, 'FABRICIO', 'CONTRERAS MIRANDA', '2015-117006', 92, '70574430', 941018678, '-@unjbg.edu.pe', 'FACULTAD DE EDUCACIÓN COMUNICACIÓN Y HUMANIDADES', 'ESCUELA   PROFESIONAL DE EDUCACIÓN', 2021, 'Segundo puesto, Premio: 200', 1),
(40, 'NELSO RODRIGO ', 'HUARACHI FLORES', '2015-118002', 91, '77817382', 992489978, '-@unjbg.edu.pe', 'FACULTAD DE CIENCIAS', 'ESCUELA PROFESIONAL DE BIOLÓGIA Y MICROBIÓLOGIA', 2021, 'Tercer Puesto, Premio 100 soles', 1),
(41, 'NANCY VICTORIA', 'MAMANI QUISPE', '2018-114035', 225, '76560443', 948548378, 'nancymq@unjbg.edu.pe', 'FECH', 'EDUCACIÓN', 2021, 'Primer puesto, premio: 250 soles', 1),
(42, 'VICTOR GREGORY ', 'CCOPA ATOCCSA', '2020-104009', 216, '71079667', 983378563, 'vgccoppaa@unjbg.edu.pe', 'FAIN', 'MECÁNICA', 2021, 'Segundo puesto, Premio: 150', 1),
(43, 'VICTOR ALEJANDRO', 'GUERREROS QUISPE', '2020-113007', 215, '72271506', 985430297, 'vaguerrerosq@unjbg.edu.pe', 'FECH', 'ESDE - SPRO', 2021, 'Tercer Puesto, Premio 100 soles', 1),
(44, 'KATHERIN ESTEPHANY ', 'MAMANI AVENDAÑO', '2019-103053', 94, '70360484', 910851756, '-@unjbg.edu.pe', 'FACULTAD DE INGENIERÍA ', 'ESCUELA PROFESIONAL DE INGENIERÍA Y MATERIALES', 2021, 'Primer puesto, premio: 300 soles', 1),
(46, 'BRANDO EFRAIN', 'MARCA MACHACA', '2017-119063', 76, '71223848', 927227018, '-@unjbg.edu.pe', 'FACULTAD DE INGENIERÍA ', 'ESCUELA PROFESIONAL DE INGENIERÍA EN INFORMÁTICA Y SISTEMAS', 2021, 'Tercer Puesto, Premio 100 soles', 1),
(47, 'JOSE ENRIQUE ABRAHAM', 'QUENAYA GUANILO', '2016-128059', 265, '72033556', 923712349, 'jquenayag@unjbg.edu.pe', 'FACULTAD DE INGENIERÍA ARQUITECTURA Y GEOTECNIA', 'ESCUELA PROFESIONAL DE ARQUITECTURA', 2021, 'Primer puesto, premio: 250 soles', 1),
(48, 'JESÚS ALBERTO', 'SARMIENTO CHOQUE', '2018-113039', 237, '73248671', 969351043, 'jsarmientoc@unjbg.edu.pe', 'FACULTAD DE EDUCACIÓN, COMUNICACIÓN Y HUMANIDADES', 'ESCUELA PROFESIONAL DE EDUCACIÓN ESPECIALIDAD CIENCIAS SOCIALES Y PROMOCIÓN SOCIO CULTURAL', 2021, 'Segundo puesto, Premio: 150', 1),
(49, 'MARCELO JOAN ANDRE', 'HERRERA PILCO', '2017-118043', 219, '77497158', 999704173, 'mherrerap@unjbg.edu.pe', 'FACULTAD DE CIENCIAS ', 'ESCUELA DE BIOLOGÍA Y MICROBIOLOGÍA', 2021, 'Instrumentista solista: Tercer Puesto, Premio 100 soles -- Banda: SAPRÓFITOS, puntaje: 156, tercer puesto, premio: 100 soles ', 1),
(50, 'THALIA EVELYN', 'ALANIA QUISPE', '2018-108011', 249, '71230173', 923884374, 'talaniaq@unjbg.edu.pe', 'FACULTAD DE CIENCIAS AGROPECUARIAS', 'AGRONOMÍA', 2021, 'Primer puesto, premio: 200 soles', 1),
(51, 'GERALDINE DEL ROSARIO', 'NINA REYNA', '2016-119014', 245, '71077989', 930608145, 'gninar@unjbg.edu.pe', 'FACULTAD DE INGENIERÍA', 'ESCUELA PROFESIONAL DE INGENIERÍA EN INFORMÁTICA Y SISTEMAS', 2021, 'Segundo puesto, Premio: 150', 1),
(52, 'ISAC FERNANDO', 'ROQUE MAMANI', '2017-117026', 226, '70969071', 977461110, 'iroquem@unjbg.edu.pe', 'FACULTAD DE EDUCACIÓN, COMUNICACIÓN Y HUMANIDADES', 'ESED ESPECIALIDAD IDEX', 2021, 'Tercer Puesto, Premio 100 soles', 1),
(53, 'CARLOS DANIEL', 'MAMANI CHOQUECOTA', '2021-115011', 239, '71727827', 921905311, 'cmamanic@unjbg.edu.pe', 'FACULTAD DE EDUCACIÓN, COMUNICACIÓN Y HUMANIDADES', 'ESCUELA DE MATEMÁTICA COMPUTACIÓN E INFORMÁTICA', 2021, 'Primer puesto, premio: 250 soles', 1),
(54, 'CRISTALA ABIGAIL', 'ROJAS MASCO', '2016-125007', 221, '74634060', 963072674, 'crojasm@unjbg.edu.pe', 'FACULTAD DE CIENCIAS DE LA SALUD', 'ESCUELA DE FARMACIA Y BIOQUÍMICA', 2021, 'Canto Nacional: Segundo puesto, Premio: 150 -- Canto Inernacional: tercer puesto, premio: 100 soles, puntaje: 240', 1),
(55, 'LUSBENIA JEORGETH', 'CONDORI JORGE', '2021- 126046', 220, '75252027', 924436333, 'ljcondorij@unjbg.edu.pe', 'FACULTAD DE EDUCACIÓN, COMUNICACIÓN Y HUMANIDADES', 'ESCUELA DE CIENCIAS DE LA COMUNICACIÓN', 2021, 'Tercer Puesto, Premio 100 soles', 1),
(56, 'LUIS FERNANDO', 'BLAS ADUVIRI', '2019-129001', 244, '71046995', 963120557, 'lblasa@unjbg.edu.pe', 'FIAG', 'ESIC', 2021, 'Banda: POCHUTO`S ROCK - Primer puesto, premio: 300 soles', 1),
(57, 'JOE LUIS', 'CORTÉS MORI', '2019-110027', 230, '70555523', 935805627, 'jcortesm@unjbg.edu.pe', 'F.C.A.G', 'E.M.V.Z', 2021, 'Banda: ADAMANTIUM - Segundo puesto, Premio: 200', 1),
(58, 'IBETH MÓNICA', 'MACHACA CATACORA', '2019-178008', 267, '70575646', 955606677, 'imachacac@unjbg.edu.pe', 'FCAG', 'ESAM', 2021, 'Primer puesto, premio: 250 soles', 1),
(59, 'LEANDRA ', 'MAMANI ANCHAPURI', '2017-117006', 252, '73309014', 972012717, 'leandrama@unjbg.edu.pe', 'FECH', 'IDIOMA EXTRANJERO', 2021, 'Segundo puesto, Premio: 150', 1),
(60, 'Walter', 'Renato', '2016-11903', 20, '750918', 9964224, 'admin@web.com', 'FAIN', 'ESIS', 2021, 'Ninguna', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `aula_id` int(11) NOT NULL,
  `nombre_aula` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `curso_id` int(11) NOT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `profesor_id` int(11) DEFAULT NULL,
  `estatusC` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`curso_id`, `materia_id`, `profesor_id`, `estatusC`) VALUES
(1, 1, 3, 1),
(2, 7, 3, 1),
(3, 3, 2, 1),
(4, 5, 2, 1),
(5, 2, 2, 1),
(6, 8, 5, 1),
(7, 6, 5, 1),
(8, 10, 4, 1),
(9, 4, 4, 1),
(10, 9, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `inscripcion_id` int(11) NOT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `turno_id` int(11) NOT NULL,
  `observacion` varchar(255) DEFAULT 'Sin observaciones',
  `estatusI` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`inscripcion_id`, `alumno_id`, `curso_id`, `turno_id`, `observacion`, `estatusI`) VALUES
(1, 1, 1, 1, 'Primer puesto, premio: 250 soles', 1),
(2, 2, 1, 1, 'Segundo puesto, Premio: 150', 1),
(3, 3, 1, 1, 'Tercer Puesto, Premio 100 soles', 1),
(69, 4, 5, 1, 'Primer puesto, premio: 200', 1),
(70, 5, 5, 1, 'Segundo puesto, Premio: 150', 1),
(71, 6, 5, 1, 'Tercer Puesto, Premio 100 soles', 1),
(72, 7, 3, 1, 'Primer puesto, premio: 300 soles, puntaje 100', 1),
(73, 8, 3, 1, 'Segundo puesto, Premio: 200', 1),
(74, 40, 3, 1, 'Tercer Puesto, Premio 100 soles', 1),
(75, 41, 9, 1, 'Primer puesto, premio: 250 soles', 1),
(76, 42, 9, 1, 'Segundo puesto, Premio: 150', 1),
(77, 43, 9, 1, 'Tercer Puesto, Premio 100 soles', 1),
(78, 44, 4, 1, 'Primer puesto, premio: 300 soles	', 1),
(79, 7, 4, 1, 'Segundo puesto, premio: 200 soles, puntaje: 79.3', 1),
(80, 46, 4, 1, 'Tercer Puesto, Premio 100 soles', 1),
(81, 47, 7, 1, 'Primer puesto, premio: 250 soles', 1),
(82, 48, 7, 1, 'Segundo puesto, Premio: 150', 1),
(83, 49, 7, 1, 'Tercer Puesto, Premio 100 soles', 1),
(84, 50, 2, 1, 'Primer puesto, premio: 200 soles', 1),
(85, 51, 2, 1, 'Segundo puesto, Premio: 150', 1),
(86, 52, 2, 1, 'Tercer Puesto, Premio 100 soles', 1),
(87, 53, 6, 1, 'Primer puesto, premio: 250 soles', 1),
(88, 54, 6, 1, 'Segundo puesto, Premio: 150', 1),
(89, 55, 6, 1, 'Tercer Puesto, Premio 100 soles', 1),
(90, 56, 10, 1, 'Banda: POCHUTO`S ROCK - Primer puesto, premio: 300 soles', 1),
(91, 57, 10, 1, 'Banda: ADAMANTIUM - Segundo puesto, Premio: 200', 1),
(92, 49, 10, 1, 'Banda: SAPRÓFITOS, puntaje: 156, tercer puesto, premio: 100 soles', 1),
(93, 58, 8, 1, 'Primer puesto, premio: 250 soles', 1),
(94, 59, 8, 1, 'Segundo puesto, Premio: 150', 1),
(95, 54, 8, 1, 'Tercer puesto, premio: 100 soles, puntaje: 240', 1),
(96, 1, 7, 1, 'Ninguna', 0),
(97, 1, 7, 1, 'Ninguna', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `materia_id` int(11) NOT NULL,
  `nombre_materia` varchar(255) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`materia_id`, `nombre_materia`, `estatus`) VALUES
(1, 'PINTURA 2021 - JUEGOS FLORALES', 1),
(2, 'POESIA INEDITA DECLAMADA 2021 - JUEGOS FLORALES', 1),
(3, 'DANZA NACIONAL 2021 - JUEGOS FLORALES', 1),
(4, 'TEATRO MONOLOGO 2021 - JUEGOS FLORALES', 1),
(5, 'BAILE MODERNO 2021 - JUEGOS FLORALES', 1),
(6, 'INSTRUMENTISTA SOLISTA 2021 - JUEGOS FLORALES', 1),
(7, 'FONOMIMICA 2021 - JUEGOS FLORALES', 1),
(8, 'CANTO NACIONAL 2021 - JUEGOS FLORALES', 1),
(9, 'GRUPO MUSICAL 2021 - JUEGOS FLORALES', 1),
(10, 'CANTO INTERNACIONAL 2021 - JUEGOS FLORALES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `profesor_id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `nivel_est` text DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`profesor_id`, `nombre`, `apellido`, `direccion`, `cedula`, `telefono`, `correo`, `nivel_est`, `estatus`) VALUES
(1, 'Karimen', 'Mutter Cuellar', 'Jefa del Área de Extensión y Proyección Cultural', '123456', 948999893, 'kmutterc@unjbg.edu.pe', 'Sin Observaciones', 1),
(2, 'Antonieta Maura', 'Velarde Sanchez', 'Directora del taller de danza', '12345', 932248156, 'avelardes@unjbg.edu.pe', 'Ninguna', 1),
(3, 'Elías Pedro', 'Cárdenas Velásquez', 'Director del Grupo Folklorico', '1234', 952643004, 'ecardenasv@unjbg.edu.pe', 'Ninguna', 1),
(4, 'James Armando', 'Zea Galindo', 'Director del Grupo Criollo Afroperuano', '123', 978007008, 'jzeag@unjbg.edu.pe', 'Ninguna', 1),
(5, 'Paul Terense', 'Peláez Alférez', 'Director de la Tuna Universitaria', '12', 952027272, 'ppelaeza@unjbg.edu.pe', 'Ninguna', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `nombre_rol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Asistente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `turno_id` int(11) NOT NULL,
  `tipo_turno` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`turno_id`, `tipo_turno`) VALUES
(1, 'mañana'),
(2, 'tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `nombre`, `usuario`, `password`, `rol`, `estatus`) VALUES
(1, 'Walter', 'admin', '$2y$10$X9gTTF8kOh7gG17WCBUNgO3T1HXLiJyOGyhrMt1KHXyFr5HA39rTe', 1, 1),
(39, 'Renato', 'asistente', '$2y$10$NsEBbRsHic4YI1UzJgOEYuk3XpCu/70L4W2tKRIwV43bykawsAdYS', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`alumno_id`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`aula_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`curso_id`),
  ADD KEY `curso_ibfk_1` (`materia_id`),
  ADD KEY `curso_ibfk_2` (`profesor_id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`inscripcion_id`),
  ADD KEY `turno_id` (`turno_id`),
  ADD KEY `inscripcion_ibfk_1` (`curso_id`),
  ADD KEY `inscripcion_ibfk_2` (`alumno_id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`materia_id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`profesor_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`turno_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `alumno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `aula_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `inscripcion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `profesor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `turno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`materia_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`profesor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`curso_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`turno_id`) REFERENCES `turno` (`turno_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
