-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2021 a las 03:04:10
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
-- Base de datos: `rsu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aep_area`
--

CREATE TABLE `aep_area` (
  `sql_area_id` int(10) UNSIGNED NOT NULL,
  `sql_area_nombre` varchar(250) NOT NULL,
  `sql_area_sigla` varchar(40) NOT NULL,
  `sql_area_jefatura` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aep_area`
--

INSERT INTO `aep_area` (`sql_area_id`, `sql_area_nombre`, `sql_area_sigla`, `sql_area_jefatura`) VALUES
(1, 'Área de Extensión y Proyección Cultural', 'AEP', 1),
(2, 'Grupo de Danza', 'GD', 1),
(3, 'Grupo Folklórico', 'GF', 1),
(4, 'Grupo Criollo Afroperuano', 'GCA', 1),
(5, 'Grupo Tuna Universitaria', 'GTU', 1),
(6, 'Secretaria de Área de Extensión y Proyección Cultural', 'AEP', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aep_autoridad`
--

CREATE TABLE `aep_autoridad` (
  `sql_autoridad_id` int(10) UNSIGNED NOT NULL,
  `sql_autoridad_nombre` varchar(250) DEFAULT NULL,
  `sql_autoridad_email` varchar(250) DEFAULT NULL,
  `sql_autoridad_imagen` varchar(250) DEFAULT NULL,
  `sql_autoridad_area_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aep_autoridad`
--

INSERT INTO `aep_autoridad` (`sql_autoridad_id`, `sql_autoridad_nombre`, `sql_autoridad_email`, `sql_autoridad_imagen`, `sql_autoridad_area_id`) VALUES
(1, 'Dra. Karimen Jetzabel Mutter Cuellar', 'kmutterc@unjbg.edu.pe', '1638562035_1638041006_1.jpg', 1),
(2, 'Prof. Antonieta Maura Velarde Sánchez', 'avelardes@unjbg.edu.pe', '1638562043_1638041006_1.jpg', 2),
(3, 'Prof. Elías Pedro Cárdenas Velásquez', 'ecardenasv@unjbg.edu.pe', '1638562193_team-3.jpg', 3),
(4, 'Prof. James Armando Zea Galindo', 'jzeag@unjbg.edu.pe', '1638562202_team-3.jpg', 4),
(5, 'Prof. Paúl Terense Peláez Alférez', 'ppelaeza@unjbg.edu.pe', '1638562210_team-3.jpg', 5),
(6, 'María Elena Suárez Freitas', 'aepcultural@unjbg.edu.pe', '1638385887_1638041006_1.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aep_estado`
--

CREATE TABLE `aep_estado` (
  `sql_estado_id` int(10) UNSIGNED NOT NULL,
  `sql_estado_nombre` varchar(250) NOT NULL,
  `sql_estado_sigla` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aep_estado`
--

INSERT INTO `aep_estado` (`sql_estado_id`, `sql_estado_nombre`, `sql_estado_sigla`) VALUES
(1, 'En proceso', ''),
(2, 'Finalizado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aep_noticia`
--

CREATE TABLE `aep_noticia` (
  `sql_noticia_id` int(10) UNSIGNED NOT NULL,
  `sql_noticia_titulo` text NOT NULL,
  `sql_noticia_imagen` varchar(250) NOT NULL,
  `sql_noticia_descripcion` text DEFAULT NULL,
  `sql_noticia_fecha` varchar(200) DEFAULT NULL,
  `sql_noticia_hora` varchar(200) DEFAULT NULL,
  `sql_noticia_enlace` varchar(200) DEFAULT NULL,
  `sql_noticia_lugar` varchar(200) DEFAULT NULL,
  `sql_noticia_area_id` int(10) UNSIGNED NOT NULL,
  `sql_noticia_estado_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aep_noticia`
--

INSERT INTO `aep_noticia` (`sql_noticia_id`, `sql_noticia_titulo`, `sql_noticia_imagen`, `sql_noticia_descripcion`, `sql_noticia_fecha`, `sql_noticia_hora`, `sql_noticia_enlace`, `sql_noticia_lugar`, `sql_noticia_area_id`, `sql_noticia_estado_id`) VALUES
(2, 'La voz Basadrina', '1636918900_noticia2.jpg', '', '20 de Agosto de 2020', '12:00 horas', 'https://www.youtube.com/', '', 1, 2),
(3, 'XX Juegos Florales Basadrinos 2021', '1636918983_noticia3.png', '', '07 y 08 de Octubre de 2020', '15:00 horas', 'https://www.google.com/', '', 1, 2),
(4, 'II Semestre 2021- Cursos Cocurriculares', '1638387039_cursos cocurricular 3.png', '', '', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aep_rol`
--

CREATE TABLE `aep_rol` (
  `sql_rol_id` int(10) UNSIGNED NOT NULL,
  `sql_rol_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aep_rol`
--

INSERT INTO `aep_rol` (`sql_rol_id`, `sql_rol_nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aep_usuario`
--

CREATE TABLE `aep_usuario` (
  `sql_usuario_id` int(10) UNSIGNED NOT NULL,
  `sql_usuario_email` varchar(100) NOT NULL,
  `sql_usuario_pass` varchar(100) NOT NULL,
  `sql_usuario_rol_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aep_usuario`
--

INSERT INTO `aep_usuario` (`sql_usuario_id`, `sql_usuario_email`, `sql_usuario_pass`, `sql_usuario_rol_id`) VALUES
(1, 'aepcultural@unjbg.edu.pe', '$2y$10$RPem9D2XzFXYMSr.rG.arOy6Mo8qWxvX8c1pUaZ/2Zh3HRqXFGCAq', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avo_anio`
--

CREATE TABLE `avo_anio` (
  `id` int(4) NOT NULL,
  `anio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_anio`
--

INSERT INTO `avo_anio` (`id`, `anio`) VALUES
(1, 2021),
(2, 2022),
(3, 2023),
(4, 2024),
(5, 2025);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avo_escuela`
--

CREATE TABLE `avo_escuela` (
  `id` int(11) NOT NULL,
  `id_facultad` int(2) NOT NULL,
  `e_nombre` varchar(100) NOT NULL,
  `e_siglas` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_escuela`
--

INSERT INTO `avo_escuela` (`id`, `id_facultad`, `e_nombre`, `e_siglas`) VALUES
(1, 1, 'ESCUELA PROFESIONAL DE CIENCIAS DE LA COMUNICACIÓN', 'ESCC'),
(2, 1, 'ESCUELA PROFESIONAL DE HISTORIA', 'ESHI'),
(3, 1, 'IDIOMA EXTRANJERO', 'IDEX'),
(4, 1, 'LENGUA Y LITERATURA', 'LEGE'),
(5, 1, 'MATEMÁTICA, COMPUTACIÓN E INFORMÁTICA', 'MACI'),
(6, 1, 'CIENCIAS DE LA NATURALEZA Y PROMOCIÓN EDUCATIVA AMBIENTAL', 'CNEA'),
(7, 1, 'CIENCIAS SOCIALES Y PROMOCIÓN SOCIO CULTURAL', 'SPRO'),
(8, 2, 'ESCUELA PROFESIONAL DE BIOLOGÍA Y MICROBIOLOGÍA', 'ESBM'),
(9, 2, 'ESCUELA PROFESIONAL DE FÍSICA APLICADA', 'ESFI'),
(10, 2, 'ESCUELA PROFESIONAL DE MATEMÁTICA', 'ESMA'),
(11, 3, 'ESCUELA PROFESIONAL DE ENFERMERÍA', 'ESEN'),
(12, 3, 'ESCUELA PROFESIONAL DE FARMACIA Y BIOQUÍMICA', 'ESFB'),
(13, 3, 'ESCUELA PROFESIONAL DE MEDICINA HUMANA', 'ESMH'),
(14, 3, 'ESCUELA PROFESIONAL DE OBSTETRICIA', 'ESOB'),
(15, 3, 'ESCUELA PROFESIONAL DE ODONTOLOGÍA', 'ESOD'),
(16, 4, 'ESCUELA PROFESIONAL DE INGENIERÍA QUÍMICA', 'ESIQ'),
(17, 4, 'ESCUELA PROFESIONAL DE INGENIERÍA EN INFORMÁTICA Y SISTEMAS', 'ESIS'),
(18, 4, 'ESCUELA PROFESIONAL DE INGENIERÍA MECÁNICA', 'ESMC'),
(19, 4, 'ESCUELA PROFESIONAL DE INGENIERÍA METALÚRGICA', 'ESME'),
(20, 4, 'ESCUELA PROFESIONAL DE INGENIERÍA DE MINAS', 'ESMI'),
(21, 5, 'ESCUELA PROFESIONAL DE MEDICINA VETERINARIA Y ZOOTECNIA', 'EMVZ'),
(22, 5, 'ESCUELA PROFESIONAL DE AGRONOMÍA', 'ESAG'),
(23, 5, 'ESCUELA PROFESIONAL DE INGENIERÍA AMBIENTAL', 'ESAM'),
(24, 5, 'ESCUELA PROFESIONAL DE ECONOMÍA AGRARIA', 'ESEA'),
(25, 5, 'ESCUELA PROFESIONAL DE INGENIERÍA DE INDUSTRIAS ALIMENTARIAS', 'ESIA'),
(26, 5, 'ESCUELA PROFESIONAL DE INGENIERÍA PESQUERA', 'ESIP'),
(27, 6, 'ESCUELA PROFESIONAL DE CIENCIAS ADMINISTRATIVAS', 'ESAD'),
(28, 6, 'ESCUELA PROFESIONAL DE CIENCIAS CONTABLES Y FINANCIERAS', 'ESCF'),
(29, 6, 'ESCUELA PROFESIONAL DE INGENIERÍA COMERCIAL', 'ESCO'),
(30, 6, 'ESCUELA PROFESIONAL DE DERECHO Y CIENCIAS POLÍTICAS', 'ESDE'),
(31, 7, 'ESCUELA PROFESIONAL DE ARQUITECTURA', 'ESAQ'),
(32, 7, 'ESCUELA PROFESIONAL DE ARTES', 'ESAR'),
(33, 7, 'ESCUELA PROFESIONAL DE INGENIERÍA GEOLÓGICA - GEOTÉCNIA', 'ESGE'),
(34, 7, 'ESCUELA PROFESIONAL DE INGENIERÍA CIVIL', 'ESIC'),
(35, 8, 'ADMINISTRATIVOS', 'ADM'),
(36, 1, 'ESCUELA PROFESIONAL DE EDUCACIÓN', 'ESED');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avo_facultad`
--

CREATE TABLE `avo_facultad` (
  `id` int(11) NOT NULL,
  `f_nombre` varchar(100) NOT NULL,
  `f_siglas` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_facultad`
--

INSERT INTO `avo_facultad` (`id`, `f_nombre`, `f_siglas`) VALUES
(1, 'FACULTAD DE EDUCACIÓN, COMUNICACIÓN Y HUMANIDADES', 'FECH'),
(2, 'FACULTAD DE CIENCIAS', 'FACI'),
(3, 'FACULTAD DE CIENCIAS DE LA SALUD', 'FACS'),
(4, 'FACULTAD DE INGENIERÍA', 'FAIN'),
(5, 'FACULTAD DE CIENCIAS AGROPECUARIAS', 'FCAG'),
(6, 'FACULTAD DE CIENCIAS JURÍDICAS Y EMPRESARIALES', 'FCJE'),
(7, 'FACULTAD DE INGENIERIA CIVIL, ARQUITECTURA, GEOLOGÍA GEOTECNIA', 'FIAG'),
(8, 'ADMINISTRATIVOS', 'ADM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avo_publicacion`
--

CREATE TABLE `avo_publicacion` (
  `id` int(3) NOT NULL,
  `id_tipo` int(1) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(5000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_publicacion`
--

INSERT INTO `avo_publicacion` (`id`, `id_tipo`, `titulo`, `descripcion`, `image`, `fecha`) VALUES
(1, 2, 'Webinar: AUTOESTIMA, VALORES Y BIENESTAR SOCIO EMOCIONAL', 'Se hace llegar la invitación al Webinar: AUTOESTIMA, VALORES Y BIENESTAR SOCIO EMOCIONAL, que se realizará el viernes 05 de noviembre a las 18:00 horas. Esperamos su participación. Gracias.', '266626043_WEBINAR NOV.png', '2021-11-05'),
(2, 2, 'Charla Informativa: Plan Familiar de Emergencia', 'Charla Informativa: Plan Familiar de Emergencia, que se llevará a cabo este martes 17 de agosto a las 18:00 horas.', '333129307_FLYER-CHARLA_PLAN_DE_EMERGENCIA.png', '2021-08-17'),
(3, 2, 'WEBINAR: Estado situacional del COVID-19 en la región Tacna', 'WEBINAR: Estado situacional del COVID-19 en la región Tacna y la vacunación a cargo del director de DIRESA - Tacna', '880036372_FLYER-Webinar.png', '2021-09-03'),
(4, 2, 'Negocios 3D 4.0', 'Se hace llegar la invitación al evento', '829998176_VIERNES CIENTÍFICO (1).png', '2021-09-10'),
(5, 2, 'Folklore Tacneño', 'Se hace llegar la invitación al evento \"Folklore Tacneño\", que se realizará el día 17 de septiembre a las 19:00 horas. Esperamos su participación. Gracias.  Inscripciones: https://cutt.ly/folkloretacneno  Enlace de meet: https://meet.google.com/qmi-daoz-vxt  Enlace de transmisión en Facebook: https://fb.me/e/2PnA5slFU', '695548038_FOLKLORE TACNEÑO.png', '2021-09-17'),
(6, 2, 'Exposición y riesgo de COVID-19 en docentes universitarios', 'Se hace llegar la invitación al evento \"Exposición y riesgo de COVID-19 en docentes universitarios\", que se realizará el día 08 de octubre a las 19:00 horas. Esperamos su participación. Gracias.', '941665835_EXPOSICION COVID-19 DOCENTES.png', '2021-10-08'),
(7, 2, 'CULTURA DIGITAL ¿Cómo te ves en la red?', 'Se hace llegar la invitación a la ponencia: \"CULTURA DIGITAL ¿Cómo te ves en la red?\", que se realizará el día 15 de octubre a las 19:00 horas. Esperamos su participación.  Enlace de Inscripción: https://cutt.ly/culturadigital  Enlace de la ponencia: https://meet.google.com/qvz-vinn-adb  Enlace de la transmisión por Facebook: https://fb.me/e/18oCEzDXh', '568916372_CULTURA-DIGITAL.png', '2021-10-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avo_tipo_publicacion`
--

CREATE TABLE `avo_tipo_publicacion` (
  `id` int(2) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_tipo_publicacion`
--

INSERT INTO `avo_tipo_publicacion` (`id`, `nombre`) VALUES
(1, 'Noticia'),
(2, 'Evento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avo_tipo_voluntario`
--

CREATE TABLE `avo_tipo_voluntario` (
  `id` int(1) NOT NULL,
  `t_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_tipo_voluntario`
--

INSERT INTO `avo_tipo_voluntario` (`id`, `t_nombre`) VALUES
(1, 'Estudiante'),
(2, 'Docente'),
(3, 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avo_users`
--

CREATE TABLE `avo_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` char(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_users`
--

INSERT INTO `avo_users` (`id`, `name`, `password`, `email`, `added_on`) VALUES
(11, 'Voluntariado Basadrino', '$2y$10$/6m2bkIp97NnQdsw5oGbJ.Gdron5v2qxWVBS5SR.WNMPkoz4i/W9.', 'voluntariado@unjbg.edu.pe', '2021-11-13 03:53:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avo_voluntarios`
--

CREATE TABLE `avo_voluntarios` (
  `id` int(4) NOT NULL,
  `id_escuela` int(2) NOT NULL DEFAULT 3,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `fecha_nac` date NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `anio` int(11) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_voluntarios`
--

INSERT INTO `avo_voluntarios` (`id`, `id_escuela`, `nombres`, `apellidos`, `dni`, `fecha_nac`, `celular`, `email`, `anio`, `tipo`) VALUES
(1, 21, 'Flor Guadalupe', 'Acosta Suarez', '70365420', '1996-04-25', '917039792', 'fgacostas@unjbg.edu.pe', 2021, 1),
(2, 13, 'ROMINA SARAI', 'ARCE ANDAGUA', '77573978', '1996-08-24', '952658876', 'rarcea@unjbg.edu.pe', 2021, 1),
(3, 29, 'Wilmer Clemente', 'Limache Usacani', '71198685', '2002-05-05', '944349305', 'wlimacheu@gmail.com', 2021, 1),
(4, 23, 'Nicolle Sthefanny', 'Marce Gamboa', '76081513', '2003-06-24', '943537614', 'nsmarceg@unjbg.edu.pe', 2021, 1),
(5, 30, 'Vladimir Lautaro', 'Ticona Joaquin', '72856969', '1995-01-22', '952839768', 'vlticonaj@unjbg.edu.pe', 2021, 1),
(6, 2, 'Nila Luzvid', 'Hancco Ccallo', '73487199', '1999-12-09', '916876949', 'nhanccoc@unjbg.edu.pe', 2021, 1),
(7, 2, 'Juan Carlos', 'Anquise Huayhua', '46381346', '2001-06-30', '966886090', 'jcanquiseh@unjbg.edu.pe', 2021, 1),
(8, 24, 'Daniela Luz', 'Quispe Quispe', '72635661', '1997-01-15', '995121003', 'dquispeq@unjbg.edu.pe', 2021, 1),
(9, 23, 'Angel', 'Garcia Ninaja', '43797489', '1986-05-05', '952616886', 'doc.angelgarcia.147@gmail.com', 2021, 1),
(10, 32, 'Lesoie Jazmin', 'Quispe Rosas', '76954191', '2000-07-18', '953114353', 'leslieqr@unjbg.edu.pe', 2021, 1),
(11, 27, 'Maria Luz', 'Velazco Claros', '71064484', '2000-11-18', '934107438', 'mvelazcoc@unjbg.edu.pe', 2021, 1),
(12, 20, 'David', 'Canaza Calisaya', '71947099', '2010-12-15', '967663317', 'davyou9@gmail.com', 2021, 1),
(13, 22, 'Jhony Richard', 'Cutipa llaclla', '76265416', '2002-05-20', '949447760', 'jhonycl@unjbg.edu.pe', 2021, 1),
(14, 36, 'Noely Gabriela', 'Ore Yañez', '70849620', '2001-05-16', '923890824', 'norey@unjbg.edu.pe', 2021, 1),
(15, 20, 'FRAY MILENIO', 'CORONEL ALAVE', '75101366', '2000-01-23', '921333679', 'fcoronela@unjbg.edu.pe', 2021, 1),
(16, 25, 'Jimy Hernan', 'Polloyquire Flores', '71230194', '1997-10-25', '960730447', 'jimyhernanpolloyquire@gmail.com', 2021, 1),
(17, 27, 'Jhon Henry', 'Alave Quispe', '70832033', '2000-12-08', '995596370', 'jalaveq@unjbg.edu.pe', 2021, 1),
(18, 25, 'Mary Luz', 'Mamani Yapurasi', '76641929', '2002-07-18', '921755294', 'marymamani2002@gmail.com', 2021, 1),
(19, 11, 'KEVIN LUIGGI', 'RUIZ COAQUERA', '47032034', '1991-12-21', '930935020', 'kruizc@unjbg.edu.pe', 2021, 1),
(20, 15, 'Nichelle Diana', 'Yanqui Juarez', '71317991', '2000-05-12', '930685610', 'nyanquij@unjbg.edu.pe', 2021, 1),
(21, 29, 'Thalia Angela', 'Roque Ninaja', '74374615', '1999-05-05', '998047108', 'troquen@unjbg.edu.pe', 2021, 1),
(22, 33, 'Lubitza Yumira', 'Canahuire Fernandez', '72870265', '1998-01-21', '940394156', 'lcanahuiref@unjbg.edu.pe', 2021, 1),
(23, 7, 'Morayma Alexandra', 'Moriel Laime', '71525680', '1998-12-30', '960842614', 'mmoriell@unjbg.edu.pe', 2021, 1),
(24, 34, 'gladyz yheny', 'alvarado flores', '71589414', '1999-09-14', '953928690', 'gyalvaradof@unjbg.edu.pe', 2021, 1),
(25, 11, 'Nahyely Noelia', 'Beltran Catunta', '73907161', '2001-01-14', '920873161', 'nbeltranc@unjbg.edu.pe', 2021, 1),
(26, 36, 'Mariluz Nayeli', 'Clavitea Yufra', '71781756', '2001-06-24', '960646378', 'mclaviteay@unjbg.edu.pe', 2021, 1),
(27, 2, 'Juan Carlos', 'Yapurasi Mamani', '70836351', '1990-06-24', '976718640', 'jyapurasim@unjbg.edu.pe', 2021, 1),
(28, 1, 'LADDY DAYANIRA', 'ARAPA LUQUE', '75010819', '2003-01-02', '917786778', 'ldarapal@unjbg.edu.pe', 2021, 1),
(29, 19, 'Jean Paul Mauricio', 'Chili Gomez', '74572361', '2001-04-27', '952869462', 'jchilig@unjbg.edu.pe', 2021, 1),
(30, 1, 'jorge Luis', 'Chavez', '75220583', '1998-08-11', '922030935', 'jchavezs@unjbg.edu.pe', 2021, 1),
(31, 27, 'ERIKA MIREYA', 'NEYRA CATACORA', '46543590', '1992-07-06', '988506061', 'eneyrac@unjbg.edu.pe', 2021, 1),
(32, 21, 'Lucero Josie', 'Mejia Oviedo', '78013426', '1997-12-02', '933282858', 'lmejiao@unjbg.edu.pe', 2021, 1),
(33, 23, 'Priscila', 'Perez Paz', '71136037', '2003-10-20', '982635758', 'pjperezp@unjbg.edu.pe', 2021, 1),
(34, 29, 'Sandro Roly', 'Choquecota Serrano', '70916155', '1999-07-31', '917744081', 'sandrochoquecota@gmail.com', 2021, 1),
(35, 27, 'Gina Ines', 'Atencio Maquera', '75624136', '2001-02-16', '918423127', 'gatenciom@unjbg.edu.pe', 2021, 1),
(36, 20, 'Priscilla Aracelly', 'Chura Maquera', '76514192', '1999-03-25', '962893946', 'pchuram@unjbg.edu.pe', 2021, 1),
(37, 14, 'Yosselyn Rocio', 'Cama Apaza', '75250794', '2000-06-01', '927798919', 'yosselyncama891@gmail.com', 2021, 1),
(38, 11, 'Jennifer Maribel', 'Sarmiento Tesillo', '75927262', '2000-11-21', '900035276', 'sarmientojennifer967@gmail.com', 2021, 1),
(39, 28, 'Junior Dilip', 'Azcue Choquemorocco', '75774806', '1998-04-12', '941568341', 'jdazcuec@unjbg.edu.pe', 2021, 1),
(40, 34, 'Gloria Celeste', 'Espino Arias', '73034547', '2002-02-26', '997463935', 'gespinoa@unjbg.edu.pe', 2021, 1),
(41, 30, 'Victoria Sofia', 'Espino Arias', '73034548', '2000-08-14', '997733995', 'vespinoa@unjbg.edu.pe', 2021, 1),
(42, 2, 'Dayan Sol', 'Palomino Arcaya', '74815753', '2002-04-14', '953492404', 'dayan14palomino@gmail.com', 2021, 1),
(43, 1, 'Maria Alejandra', 'Zapana Huarachi', '70566295', '2000-02-20', '964489671', 'mzapanah@unjbg.edu.pe', 2021, 1),
(44, 23, 'Liseth Shumara', 'Calli Mamani', '75563434', '2001-01-28', '957664785', 'lcallim@unjbg.edu.pe', 2021, 1),
(45, 11, 'Carlos Jesus', 'Nieto Soto', '72949749', '2001-11-16', '950656068', 'cnietos@unjbg.edu.pe', 2021, 1),
(46, 17, 'Daniel Rodrigo', 'Chique Curmilluni', '77429660', '2000-02-16', '938544215', 'dchiquec@unjbg.edu.pe', 2021, 1),
(47, 29, 'Jean Marco', 'Maquera Contreras', '76074679', '2002-09-01', '910360519', 'jmmaquerac@unjbg.edu.pe', 2021, 1),
(48, 36, 'Walter', 'Arocutipa tonconi', '77053710', '2000-01-03', '900852313', 'w.arocutipa04@gmail.com', 2021, 1),
(49, 2, 'Alonso Anibal', 'Villanueva Quispe', '74598855', '1999-01-03', '925919551', 'avillanuevaq@unjbg.edu.pe', 2021, 1),
(50, 22, 'ANA YENNY', 'MAQUERA LIMA', '74415622', '2002-03-07', '928603970', 'aymaqueral@unjbg.edu.pe', 2021, 1),
(51, 30, 'Jhon Cristian', 'Cervantes Olivera', '71506027', '1998-04-04', '910067054', 'jhoncervantes040498@gmail.com', 2021, 1),
(52, 33, 'Manuel Javier', 'Pozo Castillo', '72225099', '1998-05-21', '954169454', 'mpozoc@unjbg.edu.pe', 2021, 1),
(53, 34, 'Gina Alejandra', 'Atencio Ancocallo', '75517327', '2002-06-27', '934043182', 'gatencioa@unjbg.edu.pe', 2021, 1),
(54, 20, 'JHUNIOR MITCHEL', 'LLANOS VILCA', '75998172', '2000-12-19', '927638169', 'jllanosv@unjbg.edu.pe', 2021, 1),
(55, 36, 'Alfredo Gabriel', 'Valdez Ramirez', '45878166', '1989-08-03', '930855903', 'a.gabrielvaldez@gmail.com', 2021, 1),
(56, 23, 'Angie Flavia', 'Olivera Sotomayor', '74622160', '2000-07-24', '932596220', 'aoliveras@unjbg.edu.pe', 2021, 1),
(57, 33, 'Joselyn Mirella', 'Perca Nina', '71077986', '2000-02-04', '928590416', 'jpercan@unjbg.edu.pe', 2021, 1),
(58, 36, 'Rosmery', 'Maquera Quispe', '74904526', '1998-03-19', '996692762', 'rmaqueraq@unjbg.edu.pe', 2021, 1),
(59, 36, 'Ronald', 'Uruchi Cauna', '45746948', '1991-04-23', '961463400', 'ruruchic@unjbg.edu.pe', 2021, 1),
(60, 15, 'Jesus', 'Maquera contreras', '46889726', '1991-03-28', '919007840', 'jesusmc@unjbg.edu.pe', 2021, 1),
(61, 36, 'Lizbeth Aracely', 'Limache Alanoca', '70926607', '1999-11-26', '921030437', 'llimachea@unjbg.edu.pe', 2021, 1),
(62, 34, 'VICTOR DANIEL', 'FLORES COAPAZA', '42793358', '1985-01-25', '952541177', 'vfloresc@unjbg.edu.pe', 2021, 1),
(63, 11, 'Izamar Cyntia', 'Choque Espejo', '71818766', '2001-09-12', '974438002', 'ichoquee@unjbg.edu.pe', 2021, 1),
(64, 34, 'Yoel Nereo', 'Chipana Vilca', '76979242', '1998-05-10', '901622281', 'ychipanav@unjbg.edu.pe', 2021, 1),
(65, 33, 'SHANTALL OSIRIS', 'CAHUANA PEREZ', '78289103', '2000-08-04', '942442420', 'scahuanap@unjbg.edu.pe', 2021, 1),
(66, 13, 'ADRIANA CAMILA NICOLL', 'GOMEZ PIMENTEL', '73957127', '1995-05-14', '950445444', 'agomezp@unjbg.edu.pe', 2021, 1),
(67, 25, 'Lizbeth Rosario', 'Armas Mamani', '76008214', '1998-11-18', '977860607', 'liz26arm@gmail.com', 2021, 1),
(68, 7, 'Yemelith Nicole', 'Limas Ticona', '74048957', '1999-12-29', '970221337', 'ylimast@unjbg.edu.pe', 2021, 1),
(69, 27, 'Veronica del Pilar', 'Soto Vigil', '75590100', '2001-04-14', '936245412', 'vsotov@unjbg.edu.pe', 2021, 1),
(70, 27, 'Carlos Jesus', 'Paca Paco', '71205399', '2001-07-22', '918434695', 'cjpacap@unjbg.edu.pe', 2021, 1),
(71, 27, 'Alejandro Frank', 'Vilchez Ccallo', '71308336', '2002-10-29', '942027903', 'afvilchezc@unjbg.edu.pe', 2021, 1),
(72, 34, 'Nestor Fernando', 'Peña Huanchi', '73934020', '2000-01-28', '917203598', 'npenah@unjbg.edu.pe', 2021, 1),
(73, 18, 'Edwin yuwer', 'Mamani Yapurasi', '70359169', '1997-01-04', '927590784', 'edwinmy@unjbg.edu.pe', 2021, 1),
(74, 7, 'CRISTIAN ALEXANDER', 'ARIAS LAYME', '71419904', '1998-10-13', '910937957', 'cristhianariaslayme@gmail.com', 2021, 1),
(75, 7, 'Alexandra', 'Poma Yabar', '70130216', '1997-06-04', '970891250', 'apomay@unjbg.edu.pe', 2021, 1),
(76, 8, 'Luz Erika', 'Canaza Mamani', '70264232', '2000-10-17', '910671178', 'lcanazam@unjbg.edu.pe', 2021, 1),
(77, 2, 'Alejandro Andre', 'Flores Romero', '72032656', '2001-01-10', '949067063', 'robert_alejandro_2013@hotmail.com', 2021, 1),
(78, 31, 'Estrella Fenix', 'Sihuayro Ochoa', '74822631', '2000-07-17', '930986186', 'esihuayroo@unjbg.edu.pe', 2021, 1),
(79, 14, 'Alejandra Nayely', 'Canque Gutierrez', '60959011', '2001-02-12', '927483693', 'acanqueq@unjbg.edu.pe', 2021, 1),
(80, 19, 'Juan erik', 'Cabrera Huayhua', '80296139', '1980-03-07', '986809419', 'juan.cabrera@unjbg.edu.pe', 2021, 1),
(81, 31, 'Fanny Helen', 'Arcaya Arhuata', '70830402', '1997-01-11', '954620911', 'farcayaa@unjbg.edu.pe', 2021, 1),
(82, 24, 'Ruth', 'Holgado Vera', '72077478', '2002-04-14', '924409091', 'rmholgadovera@unjbg.edu.pe', 2021, 1),
(83, 8, 'Nataly Sofia', 'Poma Perez', '70081463', '1998-10-17', '926068139', 'npomap@unjbg.edu.pe', 2021, 1),
(84, 23, 'Estela Virginia', 'Oscco Vizcarra', '77501173', '1999-11-26', '929319301', 'miavizcarra26@gmail.com', 2021, 1),
(85, 19, 'Katherine Lilette', 'Ccupa Tipo', '74288622', '2003-04-19', '929433830', 'kccupat@unjbg.edu.pe', 2021, 1),
(86, 27, 'Kelly Otilia', 'Calisaya Alave', '74033079', '2001-06-18', '935458445', 'kcalisayaa@unjbg.edu.pe', 2021, 1),
(87, 29, 'Yuri Lisbeth', 'Perez Choque', '71524751', '2001-03-23', '900249056', 'yperezc@unjbg.edu.pe', 2021, 1),
(88, 33, 'Jaqueline Gabriela', 'Coaquira Araca', '74569944', '2001-04-30', '916649954', 'jaquelineca@unjbg.edu.pe', 2021, 1),
(89, 27, 'Sonia Gladys', 'Alanoca Cutipa', '70370845', '1999-12-19', '951128164', 'salanocac@unjbg.edu.pe', 2021, 1),
(90, 30, 'Alexandra stefany', 'Mendoza Flores', '76039487', '1996-01-12', '935795657', 'amendozaf@unjbg.edu.com', 2021, 1),
(91, 27, 'Gladys Veronica', 'Sihuayro chachaque', '74535762', '2001-02-07', '910868387', 'gsihuayroc@unjbg.edu.pe', 2021, 1),
(92, 11, 'Marielena Massiel', 'Cacxi Huerta', '75778864', '2001-01-05', '925596218', 'mmcacxih@unjbg.edu.pe', 2021, 1),
(93, 28, 'Jenifer Luz', 'Chambe Cardenas', '74321857', '2003-05-11', '935491531', 'jlchambec@unjbg.edu.pe', 2021, 1),
(94, 30, 'Alberto', 'Saravia Fernandez', '45060263', '1988-02-28', '952232623', 'asaraviaf@unjbg.edu.pe', 2021, 1),
(95, 24, 'Maria Alejandra', 'Soto Rojas', '70658991', '2001-08-04', '917442523', 'msotor@unjbg.edu.pe', 2021, 1),
(96, 11, 'Angie Stefany', 'Huanacuni Cardoza', '71067748', '2000-06-23', '937535553', 'ahuanacunic@unjbg.edu.pe', 2021, 1),
(97, 3, 'Diana Carolina Marina', 'Salas Valdivia', '71213933', '2001-10-27', '962864520', 'dsalasv@unjbg.edu.pe', 2021, 1),
(98, 25, 'Jeaneth Lelys', 'Contreras Tacora', '75389010', '2001-01-09', '902661543', 'jcontrerast@unjbg.edu.pe', 2021, 1),
(99, 27, 'Jemima Irma', 'Tintaya Pari', '70839528', '1999-07-14', '966078080', 'jtintayap@unjbg.edu.pe', 2021, 1),
(100, 31, 'cynthia Maritza', 'mendoza quispe', '47668726', '1993-01-16', '940770821', 'cynthiamendozaq@gmail.com', 2021, 1),
(101, 33, 'Arnold Saul', 'Calisaya Sumi', '75544998', '2000-06-14', '942596949', 'acalisayas@unjbg.edu.pe', 2021, 1),
(102, 23, 'Jeny maribel', 'Calderon Garrido', '75245744', '2001-12-14', '939582075', 'jcalderong@unjbg.edu.pe', 2021, 1),
(103, 1, 'KHIARA ALIYAH BET', 'MORENO SALAZAR CALDERON', '43032056', '1985-04-29', '957564577', 'kmorenos@unjbg.edu.pe', 2021, 1),
(104, 33, 'Maria Fernanda', 'Panduro Leon', '76602090', '1997-07-27', '973674711', 'mpandurol@unjbg.edu.pe', 2021, 1),
(105, 30, 'Carla Andrea', 'Tuyo Ancco', '71542372', '2003-07-25', '926580662', 'ctuyoa@unjbg.edu.pe', 2021, 1),
(106, 27, 'Lizbeth Yesenia', 'Pari Callata', '71533268', '1998-05-27', '997948370', 'Lparic@unjbg.edu.pe', 2021, 1),
(107, 27, 'NAYELI SHEYLA', 'MAMANI RAMOS', '72101182', '2000-04-30', '900612594', 'nmamanir@unjbg.edu.pe', 2021, 1),
(108, 14, 'Gehovanna Noelia', 'Sarmiento Quenta', '76011609', '1995-08-25', '960572019', 'gsarmientoq@unjbg.edu.pe', 2021, 1),
(109, 11, 'Daniela Alexandra', 'Flores Aguilar', '75719752', '2000-03-18', '932346585', 'danielaafa@unjbg.edu.pe', 2021, 1),
(110, 26, 'NESTOR ALEJANDRO', 'VELAZCO SILVA', '70177373', '2001-06-14', '936306332', 'nvelazcos@unjbg.edu.pe', 2021, 1),
(111, 30, 'Lucero Milagros', 'Ortega Mamani', '70149403', '2001-02-21', '968282164', 'luceroom@unjbg.edu.pe', 2021, 1),
(112, 17, 'Rodrigo Freddy', 'Nina Quispe', '71879133', '1997-09-25', '997469562', 'rfninaq@unjbg.edu.pe', 2021, 1),
(113, 14, 'Esthefany Dariela', 'Mamani Chipana', '73141485', '1999-06-14', '967073325', 'edmamanic@unjbg.edu.pe', 2021, 1),
(114, 8, 'Dakia Mehilyn', 'Colque Flores', '78004999', '2003-07-18', '935343126', 'dcolquef@unjbg.edu.pe', 2021, 1),
(115, 3, 'Grace Betsy', 'Patiño Torres', '71882656', '1997-12-16', '923909874', 'gpatinot@unjbg.edu.pe', 2021, 1),
(116, 7, 'Antony Gabriel', 'Macedo Cayo', '70905260', '2003-04-09', '945400198', 'agmacedoc@unjbg.edu.pe', 2021, 1),
(117, 27, 'Rosmery', 'Pari Huayhua', '74393531', '2000-12-16', '925101869', 'rosmeryph@unjbg.edu.pe', 2021, 1),
(118, 17, 'Franz', 'Chanini  Mena', '74808802', '2000-10-14', '983269149', 'fchaninim@unjbg.edu.pe', 2021, 1),
(119, 22, 'Beatriz Yenyluz', 'Choque Choque', '70839543', '1997-06-15', '960630987', 'beatrizcc@unjbg.edu.pe', 2021, 1),
(120, 22, 'Gabriela Mariana', 'Herrera Velarde', '72212385', '2001-09-11', '938968407', 'gherrerav@unjbg.edu.pe', 2021, 1),
(121, 34, 'JOAO GIANCARLO', 'CONDORCHOA CLARES', '71205249', '1996-05-09', '991633370', 'jcondorchoac@unjbg.edu.pe', 2021, 1),
(122, 31, 'Beleza Jeanette', 'Condori Mancilla', '71715592', '1998-07-20', '946298728', 'bcondorim@unjbg.edu.pe', 2021, 1),
(123, 29, 'Yenifer Andrea', 'Huanacuni Chino', '72437720', '2000-01-14', '921086534', 'yeniferhc@unjbg.edu.pe', 2021, 1),
(124, 23, 'Nabila Marlene', 'Caceres Mamani', '73694661', '2001-02-01', '970870845', 'ncaceresm@unjbg.edu.pe', 2021, 1),
(125, 34, 'David Elvis', 'Flores Cusi', '80215219', '1979-11-05', '950677575', 'davidefc@unjbg.edu.pe', 2021, 1),
(126, 22, 'Marilu Mireya', 'Maquera Casquino', '71471905', '2001-05-28', '927368858', 'marilumc@unjbg.edu.pe', 2021, 1),
(127, 27, 'NAYELY JUDITH', 'QUISPE JALIRI', '71228552', '2001-08-02', '977760878', 'nquispej@unjbg.edu.pe', 2021, 1),
(128, 31, 'Guianella Maria', 'Mamani Chambilla', '77070359', '1999-06-04', '955844644', 'maria040699@hotmail.com', 2021, 1),
(129, 22, 'Andrea Stefany', 'Taipe Quispe', '75665988', '2000-09-14', '980701388', 'ataipeq@unjbg.edu.pe', 2021, 1),
(130, 27, 'Claudia Gisell', 'Gonzales Fora', '70566769', '2001-01-22', '960481418', 'cgonzalesf@unjbg.edu.pe', 2021, 1),
(131, 27, 'Diego Ubaldo', 'Clemencia Chambilla', '76238218', '2002-06-17', '958548418', 'duclemenciac@unjbg.edu.pe', 2021, 1),
(132, 2, 'RIKARDO STEPHANO', 'PORTILLA VALEGA', '70879986', '1999-06-29', '963737782', 'rportilla@unjbg.edu.pe', 2021, 1),
(133, 30, 'DEICY SOLEDAD', 'CONDORI MAMANI', '74872526', '1999-05-14', '952738003', 'deicycm@unjbg.edu.pe', 2021, 1),
(134, 16, 'Alexsandra Belen', 'Marca Ancachi', '63303194', '2000-08-07', '955654440', 'amarcaa@unjbg.edu.pe', 2021, 1),
(135, 14, 'Vivian Yury', 'Ramos Loza', '74908941', '2001-12-24', '969321914', 'vramosl@unjbg.edu.pe', 2021, 1),
(136, 33, 'Elmer duverly', 'Huariza rodriguez', '47486461', '1990-01-05', '952800517', 'elmerhr20@gmail.com', 2021, 1),
(137, 23, 'Yahaira Paola', 'Lira Chipana', '70926579', '2000-05-24', '952300363', 'lady24yahaira@gmail.com', 2021, 1),
(138, 28, 'HAYDEE DEL ROCIO', 'SANXHEZ PAURO', '77164671', '1998-09-08', '927346304', 'haydeesp@unjbg.edu.pe', 2021, 1),
(139, 17, 'Maria roxana', 'Saccatuma tintaya', '71767174', '2004-02-29', '924545177', 'mariasaccatuma@gmail.com', 2021, 1),
(140, 27, 'DIANA TERESA', 'ADRIANO MIÑOPE', '71499533', '1997-09-14', '918190097', 'dtadrianom@unjbg.edu.pe', 2021, 1),
(141, 11, 'ALEX ANDER', 'CAMA AQUINO', '70405834', '2000-05-20', '900017470', 'acamaa@unjbg.edu.pe', 2021, 1),
(142, 11, 'Aracely', 'jihuaña', '71394133', '2002-01-28', '927344616', 'ajihuanaq@unjbg.edu.pe', 2021, 1),
(143, 2, 'Flor de Maria', 'Conde', '44980449', '1989-10-15', '952971524', 'fconde@unjbg.edu.pe', 2021, 1),
(144, 27, 'MELISA MILEN', 'VASQUEZ ARCAYA', '72285873', '2002-09-16', '956861501', 'mmvasqueza@unjbg.edu.pe', 2021, 1),
(145, 25, 'PAOLA CAROLINA', 'HUANCA MARCA', '76405197', '2000-09-11', '970331367', 'phuancam@unjbg.edu.pe', 2021, 1),
(146, 22, 'Aracely Carolyne', 'De la Cruz Canchari', '75337525', '1997-09-04', '921816077', 'aracelycc@unjbg.edu.pe', 2021, 1),
(147, 15, 'Reyna Isabel', 'Escobar Espejo', '72513472', '2001-10-20', '935994255', 'rescobare@unjbg.edu.pe', 2021, 1),
(148, 24, 'Wily Pablo', 'Villalva Calizaya', '76773129', '1999-06-27', '952248962', 'wvillalvac@unjbg.edu.pe', 2021, 1),
(149, 29, 'Ana Cristina', 'Maquera Mendoza', '70452460', '2000-04-29', '921407164', 'acmaqueram@unjbg.edu.pe', 2021, 1),
(150, 1, 'Elizabeth Vanessa', 'Ticona Jamachi', '71249298', '1996-01-18', '921468723', 'eticonaj@unjbg.edu.pe', 2021, 1),
(151, 1, 'Karol Lucia ', 'Fernandez Cusi', '73001715', '2002-03-07', '953696421', 'karolluciafernandez@gmail.com', 2021, 1),
(152, 1, 'Yenny Maribel ', 'Huanacuni Ccamasacari ', '74568882', '2000-01-31', '995332086', 'yennyhc@unjbg.edu.pe', 2021, 1),
(153, 1, 'Ruth Katherin ', 'Chino Anahua', '61231527', '2002-12-22', '918391984', 'rkchinoa@unjbg.edu.pe', 2021, 1),
(154, 1, 'Gladys Elvira', 'Roque Inca', '75989973', '1996-01-03', '931251902', 'groquei@unjbg.edu.pe', 2021, 1),
(155, 1, 'Jhonatan', 'yucra cruz', '74281592', '1998-03-23', '942921165', 'jyucrac@unjbg.edu.pe', 2021, 1),
(156, 1, 'Katheryn Ximena', 'Gamero Huanca', '70372024', '1999-12-01', '940304284', 'kgameroh@unjbg.edu.pe', 2021, 1),
(157, 1, 'Ana Gabriela', 'Vilca Chumpisuca', '71218973', '2000-09-05', '965602038', 'agvilcac@unjbg.edu.pe', 2021, 1),
(158, 1, 'Nayomy Keyt', 'Mamani Padilla', '74295241', '2001-11-24', '910853882', 'nmamanip@unjbg.edu.pe', 2021, 1),
(159, 1, 'Luis Fernando ', 'Vargas Ale', '73004509', '1998-08-18', '946722860', 'lfvargasa@unjbg.edu.pe', 2021, 1),
(160, 1, 'Bryan Daniel', 'Campos Pacoricona', '70505744', '1994-12-21', '929006772', 'bdcamposp@unjbg.edu.pe', 2021, 1),
(161, 1, 'Daniela', 'Saravia Ticona', '71227401', '2000-06-21', '972904774', 'dsaraviat@unjbg.edu.pe', 2021, 1),
(162, 1, 'Sergio antonio', 'Apaza Ccallomamani', '76981992', '1999-02-21', '988784484', 'sergio988784484@gmail.com', 2021, 1),
(163, 1, 'Michelle Aracely', 'Coaquira Chata', '70411240', '2001-05-30', '912055675', 'mcoaquirac@unjbg.edu.pe', 2021, 1),
(164, 1, 'Mery ', 'Quispe Mamani', '74970486', '1999-12-17', '931831433', 'meryq@unjbg.edu.pe', 2021, 1),
(165, 1, 'Nikole Alexandra', 'Mayta Cachicatari', '72409829', '2001-10-12', '921645746', 'nikolemc@unjbg.edu.pe', 2021, 1),
(166, 1, 'Leslie Lizbeth ', 'Bonifacio Banegas ', '71220666', '2001-02-21', '939914828', 'lbonifaciob@unjbg.edu.pe', 2021, 1),
(167, 1, 'Ximena Kelly', 'Gonzales Tapia', '76660688', '1995-08-12', '912444340', 'xkgonzalest@unjbg.edu.pe', 2021, 1),
(168, 1, 'ARIANA FIORELA ', 'COLQUE SALLUCA', '71055424', '2002-07-20', '940529844', 'afcolques@unjbg.edu.pe', 2021, 1),
(169, 1, 'Luis Alfredo', 'Curasi Trujillano', '70359133', '1997-04-11', '963636655', 'lcurasit@unjbg.edu.pe', 2021, 1),
(170, 1, 'Walter Raul', 'Pacovilca Love', '45768890', '1989-05-05', '930498930', 'wpacovilcal@unjbg.edu.pe', 2021, 1),
(171, 1, 'Susana Maria', 'Molina Llaca', '72279669', '1997-08-24', '925129323', 'smolinal@unjbg.edu.pe', 2021, 1),
(172, 1, 'Christian Gerson', 'Lliclla Quispe', '78005785', '1996-09-21', '973773368', 'cllicllaq@unjbg.edu.pe', 2021, 1),
(173, 1, 'Ana Milagros ', 'Flores Mamani', '71070470', '2000-08-27', '988015790', 'amfloresm@unjbg.edu.pe', 2021, 1),
(174, 1, 'GIOVANA KELLY', 'MAMANI MAMANI', '71470171', '2000-08-21', '921205424', 'giovanamm@unjbg.edu.pe', 2021, 1),
(175, 1, 'Jessenia Lizet ', 'Sandoval Huaicani', '75902452', '2001-06-22', '945726984', 'jsandovalh@unjbg.edu.pe', 2021, 1),
(176, 1, 'Maribel Maritza', 'Condori Vilca', '74728685', '1995-10-05', '979965847', 'maribelcv@unjbg.edu.pe', 2021, 1),
(177, 1, 'Dayana', 'Machaca Luna', '72383620', '1999-01-20', '936627807', 'dimachacal@unjbg.edu.pe', 2021, 1),
(178, 1, 'Sergio Martin ', 'Cahuaya Mamani ', '74442857', '1994-11-15', '986100132', 'sergiocahuaya15@gmail.com', 2021, 1),
(179, 1, 'Laura', 'Quispe Paco', '77912088', '1998-08-22', '918601856', 'lauraqp@unjbg.edu.pe', 2021, 1),
(180, 1, 'Rodrigo', 'Chura Coaquira', '75883004', '1997-02-08', '964926089', 'rodrigo.ef97@gmail.com', 2021, 1),
(181, 1, 'Jeans Marco', 'Arocutipa Ticona', '47679448', '1991-12-13', '979200091', 'jeanaxeso@gmail.com', 2021, 1),
(182, 1, 'Ana Karen Shirley', 'Chino ilaquita', '71141217', '1997-06-01', '948898916', 'achinoi@unjbg.edu.pe', 2021, 1),
(183, 1, 'Eda Luz', 'Huanca Quispe', '74135346', '2001-03-20', '900002003', 'edaluz329@gmail.com', 2021, 1),
(184, 1, 'GUIDO OVER ', 'RAMIREZ PACOHUANACO ', '75782628', '1996-06-16', '974367705', 'goramirezp@unjbg.edu.pe', 2021, 1),
(185, 1, 'Javier Alex', 'Jimenez Mendoza', '48014922', '1993-11-24', '948588436', 'a_jjimenezm@unjbg.edu.pe', 2021, 1),
(186, 1, 'Claudia Alexandra', 'Ticona Chuquimamani', '70359873', '1998-10-11', '952569696', 'claudiatc@unjbg.edu.pe', 2021, 1),
(187, 1, 'Erika Maribel', 'Acho Huarino', '47395931', '1991-09-19', '932459058', 'eachoh@unjbg.edu.pe', 2021, 1),
(188, 1, 'Abel', 'Ccama Arias', '76283530', '2000-04-25', '912195585', 'abelca@unjbg.edu.pe', 2021, 1),
(189, 1, 'Cristian Raul ', 'Sosa Gallegos', '70205172', '1998-04-10', '973517312', 'csosag@unjbg.esu.pe', 2021, 1),
(190, 1, 'Ana Sofia', 'Copari Mamani', '73853534', '1999-03-11', '902646937', 'ascoparim@unjbg.edu.pe', 2021, 1),
(191, 1, 'Vanessa Miryan  ', 'Choque Elias ', '77037604', '2002-02-03', '957518448', 'vchoquee@unjbg.edu.pe', 2021, 1),
(192, 1, 'Pamela Melani ', 'Alave Villanueva ', '71772115', '2000-10-25', '950345456', 'palavev@unjbg.edu.pe', 2021, 1),
(193, 1, 'Yuly Danitza', 'Peñasco Encinas', '75826183', '2002-12-02', '918334210', 'ydpenascoe@unjbg.edu.pe', 2021, 1),
(194, 1, 'Luz Marina', 'Barreto Capaquira', '74561012', '2001-10-09', '934441462', 'lbarretoc@unjbg.edu.pe', 2021, 1),
(195, 1, 'Evelyn Rosario', 'Ramos Mamani', '74033606', '2003-09-20', '962139316', 'rr8835722@gmail.com', 2021, 1),
(196, 1, 'Luz Clarita ', 'Mamani rosa', '77231874', '2010-03-31', '900047431', 'lcmamanir@unjbg.edu.pe', 2021, 1),
(197, 1, 'Alexa Fernanda ', 'Vizcarra Maquera ', '76143233', '2003-01-30', '900248478', 'afvizcarram@unjbg.edu.pe', 2021, 1),
(198, 1, 'Yosilin Yeny  ', 'Maquera Flores', '71106421', '2001-06-08', '962353764', 'ymaqueraf@unjbg.edu.pe', 2021, 1),
(199, 1, 'Ronald Cristian', 'Navarro Salluca', '73609870', '2000-12-24', '931174727', 'rnavarros@unjbg.edu.pe', 2021, 1),
(200, 1, 'Luz Marina', 'Marca Apaza', '74970494', '2002-03-04', '900247415', 'lmarcaa@unjbg.edu.pe', 2021, 1),
(201, 1, 'Arleth Cristina ', 'Mendoza Chura ', '73973006', '2000-11-16', '981328360', 'amendoza.chura16@gmail.com', 2021, 1),
(202, 1, 'ANGIE ALEXANDRA ', 'ALVAREZ LIMA ', '74221681', '2000-06-29', '914783315', 'Aalvarezl@unjbg.edu.pe', 2021, 1),
(203, 1, 'Karen Lourdes ', 'Anahua Huisa ', '71220660', '1999-02-11', '923849358', 'kanahuah@unjbg.edu.pe', 2021, 1),
(204, 1, 'Nelia yeny', 'Condori velasquez', '74369035', '1997-06-18', '916915662', 'neliacv@unjbg.edu.pe', 2021, 1),
(205, 1, 'Patty Yaneth', 'Carrillo Choquegonza', '74536379', '1998-03-26', '931660981', 'pcarrilloc@unjbg.edu.pe', 2021, 1),
(206, 1, 'Gimena Stefany', 'Velasquez Sandoval', '76691372', '2002-04-09', '925620950', 'gvelasquezs@unjbg.edu.pe', 2021, 1),
(207, 1, 'Alejandra Yusbeli ', 'Araca Mamani ', '71388404', '1999-05-14', '934710437', 'aaracam@unjbg.edu.pe', 2021, 1),
(208, 1, 'Anel Angie ', 'Maquera Vargas', '71767165', '2003-11-27', '932961632', 'aamaquerav@unjbg.edu.pe', 2021, 1),
(209, 1, 'FIORELA KATHERINE', 'SANTI MAMANI', '74994393', '1996-04-27', '921863578', 'fsantim@unjbg.edu.pe', 2021, 1),
(210, 1, 'Stefany Maryoric', 'Cormilloni Quispe', '70574133', '2002-06-13', '946140287', 'smcormilloniq@unjbg.edu.pe', 2021, 1),
(211, 1, 'LUZ MARIA ', 'ONOFRE MAMANI', '76056154', '2002-04-04', '900376723', 'lonofrem@unjbg.edu.pe', 2021, 1),
(212, 1, 'Lizeth Luz Maria', 'Valdez Jahuana', '75084422', '2000-01-19', '933932412', 'lvaldezj@unjbg.edu.pe', 2021, 1),
(213, 1, 'JUAN CARLOS', 'CHURA COAQUIRA', '75883002', '2001-04-03', '983180748', 'juanccc@unjbg.edu.pe', 2021, 1),
(214, 1, 'Wilson Gustavo Junior', 'Yaja Condori', '71247901', '1998-10-22', '952282884', 'gustavoyc221098@gmail.com', 2021, 1),
(215, 1, 'Jhon Clements', 'Choque Chura', '75218415', '1999-03-01', '979060665', 'choquejohn99@gmail.com', 2021, 1),
(216, 1, 'Gianella Milagros', 'Muñoz Huanca', '71775005', '1998-04-27', '974858295', 'gmunozh@unjbg.edu.pe', 2021, 1),
(217, 1, 'VILMA ELIZABETH ', 'FELICIANO MARAZA', '70835702', '1996-10-07', '931135077', 'vfelicianom@unjbg.edu.pe', 2021, 1),
(218, 1, 'Josue Valerio', 'Yufra Gutierrez', '47197043', '1991-08-19', '955279553', 'jyufrag@unjbg.edu.pe', 2021, 1),
(219, 1, 'DANIELA  ISABEL ', 'ALFEREZ ESCOBAR ', '75583700', '2003-08-13', '974706122', 'daniela.982025324@gmail.com', 2021, 1),
(220, 1, 'Lenny Hector ', 'Ramos de la Cruz ', '73067246', '2001-02-02', '935331125', 'lennyrc@unjbg.edu.pe', 2021, 1),
(221, 1, 'Efrain Alex', 'Morales Caballero', '75883006', '1998-10-05', '921493360', 'emoralesc@unjbg.edu.pe', 2021, 1),
(222, 1, 'Bret', 'Luque', '42027860', '1983-07-20', '990323204', 'bret.luque@unjbg.edu.pe', 2021, 1),
(223, 1, 'ALEXANDER JOSUE', 'INCACOÑA TICONA', '75384226', '2001-11-03', '910574849', 'aincaconat@unjbg.edu.pe', 2021, 1),
(224, 1, 'Diana Maribel', 'Turpo Vilca', '70566852', '2003-08-25', '932705555', 'dmturpov@unjbg.edu.pe', 2021, 1),
(225, 1, 'NEBENKA SUJEY', 'COILA TENICELA', '72202054', '1997-08-29', '954484978', 'ncoilat@unjbg.edu.pe', 2021, 1),
(226, 1, 'Kelly Geraldine', 'Copaja Salcedo', '74652994', '1998-06-26', '940811599', 'kcopajas@unjbg.edu.pe', 2021, 1),
(227, 1, 'Danuska Geraldine', 'Flores Esquivel', '75814998', '1998-08-28', '993724852', 'dflorese@unjbg.edu.pe', 2021, 1),
(228, 1, 'Stefani', 'Gonzales Mendoza', '75260418', '2000-12-12', '991933694', 'sgonzalesm@unjbg.edu.pe', 2021, 1),
(229, 1, 'Lidia Isabel', 'Quispe Rodriguez', '75091797', '1997-08-03', '983356626', 'lidiaqr@unjbg.edu.pe', 2021, 1),
(230, 1, 'Jose Abrahan', 'Apaza Mamani', '44818646', '1988-01-21', '952528342', 'jaapazam@unjbg.edu.pe', 2021, 1),
(231, 1, 'Ruth Arminda', 'Chipana Jimenez ', '70567391', '1999-09-17', '914213298', 'rchipanaj@unjbg.edu.pe', 2021, 1),
(232, 1, 'Nataly Danitza', 'Hume Catunta', '76866996', '0000-00-00', '982168845', 'nataly.hume27@gmail.com', 2021, 1),
(233, 1, 'dario bryan ', 'chachaque larico', '60472702', '1998-10-17', '918628110', 'dario_bryan@outlook.com', 2021, 1),
(234, 1, 'Paola Jeanet ', 'Paredes Claros ', '71208081', '2002-01-28', '910220991', 'pparedesc@unjbg.edu.pe', 2021, 1),
(235, 1, 'Edgar Fernando ', 'Limachi Mamani ', '73009585', '2001-11-19', '940466779', 'eflimachim@unjbg.edu.pe', 2021, 1),
(236, 1, 'Luz Veronica', 'Flores Huallpa', '76368616', '1998-08-04', '938872758', 'luzf379@gmail.com', 2021, 1),
(237, 1, 'Melissa Oreana', 'Clavitea Del Carpio', '73929086', '2003-12-18', '973681681', 'moclavitead@unjbg.edu.pe', 2021, 1),
(238, 1, 'Paola Rossy', 'Salinas Flores', '71215360', '2002-04-07', '951360038', 'psalinasf@unjbg.edu.pe', 2021, 1),
(239, 1, 'Sergio Alvaro', 'Alave Jaliri', '48015256', '1993-11-26', '930691473', 'salavej@unjbg.edu.pe', 2021, 1),
(240, 1, 'Claudia Cecilia ', 'Mamani Tacora ', '74911148', '2002-12-25', '918600993', 'ccmamanit@unjbg.edu.pe', 2021, 1),
(241, 1, 'Yaritza Susana', 'Turpo Zapana', '72793769', '2002-12-23', '982117897', 'ysturpoz@unjbg.edu.pe', 2021, 1),
(242, 1, 'Rebeca ', 'Mamani Sosa ', '77161415', '1994-10-31', '934699147', 'rmamanis@unjbg.edu.pe', 2021, 1),
(243, 1, 'Angie April Gina ', 'Choque Pilco', '71219608', '1998-03-16', '952512136', 'achoquep@unjbg.edu.pe', 2021, 1),
(244, 1, 'Marco Daniel ', 'Calderon Estrada', '76814846', '2003-10-05', '997482010', 'mdcalderone@unjbg.edu.pe', 2021, 1),
(245, 1, 'Lordia Priscila ', 'Mamani Cruz ', '76040457', '1998-07-01', '913835787', 'lordiamc@unjbg.edu.pe', 2021, 1),
(246, 1, 'BRIGITTE ARACELI', 'VILLALOBOS ALAVARDO', '72463969', '1994-12-21', '982609021', 'bvillalobosa@unjbg.edu.pe', 2021, 1),
(247, 1, 'Meriam Maribel ', 'Llano Ordoño ', '77164663', '2002-02-28', '948987440', 'mllanoo@unjbg.edu.pe', 2021, 1),
(248, 1, 'Lizeth Brenda ', 'Mamani Velasquez ', '72437723', '1998-05-05', '926497978', 'lizeth.bmvb@gmail.com', 2021, 1),
(249, 1, 'JHON NELSON', 'MAMANI MAMANI', '71203973', '1996-03-07', '925602599', 'jnmamanim@unjbg.edu.pe', 2021, 1),
(250, 1, 'Joel Xavier ', 'Flores Salamanca', '73031010', '1998-03-27', '921935867', 'jfloress@unjbg.edu.pe', 2021, 1),
(251, 1, 'Cristhian Abel', 'Calderon Calizaya', '71584947', '1997-01-05', '997482557', 'cristhian3c1a@gmail.com', 2021, 1),
(252, 1, 'ROBERTO PAOLO', 'CONDORI LLAMOCCA', '70969061', '1998-05-21', '977553778', 'rcondoril@unjbg.edu.pe', 2021, 1),
(253, 1, 'Edith Paola', 'Maldonado Cañi', '75373931', '2000-07-10', '928559206', 'emaldonadoc@unjbg.edu.pe', 2021, 1),
(254, 1, 'MARIA DE LOS ANGELES ', 'YUFRA VIZCARRA', '73943164', '2004-05-08', '935808509', 'mariaprogreso100@gmail.com', 2021, 1),
(255, 1, 'Nicole Carolina Fatima', 'Salamanca Mamani', '70555504', '2002-04-24', '928923442', 'ncfsalamancam@unjbg.edu.pe', 2021, 1),
(256, 1, 'Flora Magna ', 'Mamani Vilca ', '75586406', '1998-11-12', '977853433', 'fmagna71@gmail.com', 2021, 1),
(257, 1, 'Yhakelyn Mariana ', 'Sosa Medina ', '76973905', '2002-09-19', '942448289', 'yhakelyns@gmail.com', 2021, 1),
(258, 1, 'Rayza Dayanne ', 'Rivera Miranda ', '72812344', '2000-08-18', '957017637', 'rriveram@unjbg.edu.pe', 2021, 1),
(259, 1, 'Samantha del Carmen ', 'Catacora Padovani ', '71314354', '2003-06-24', '958262075', 'samanthacatacora@gmail.com', 2021, 1),
(260, 1, 'Stefany Sujeyth ', 'Hilasaca Mamani ', '72162797', '2000-04-01', '940881937', 'shilasacam@unjbg.edu.pe', 2021, 1),
(261, 1, 'Lourdes', 'Quispe Usedo', '75882995', '1997-02-11', '924415226', 'lquispeu@unjbg.edu.pe', 2021, 1),
(262, 1, 'Bryan Hipolito', 'Salvador Laurente', '71372234', '1998-08-23', '948678501', 'bryan_lombin@hotmail.com', 2021, 1),
(263, 1, 'Yasmin Yomayra ', 'Escobar Vildoso', '76069675', '1997-08-02', '916740957', 'yescobarv@unjbg.edu.pe', 2021, 1),
(264, 1, 'Brigida Adelaida', 'Anahua Ccama', '75008596', '1999-05-10', '900465760', 'banahuac@unjbg.edu.pe', 2021, 1),
(265, 1, 'Patricia', 'Tapia Jamachi', '72936556', '2002-09-25', '954139849', 'ptapiaj@unjbg.edu.pe', 2021, 1),
(266, 1, 'Adlay Kleber', 'Camacutipa Maquera', '75333719', '2003-01-02', '922265838', 'akcamacutipam@unkbg.edu.pe', 2021, 1),
(267, 1, 'Juan Diego', 'Torres ', '73132506', '1999-11-06', '933885097', 'jtorresc@unjbg.edu.pe', 2021, 1),
(268, 1, 'Diana Carolina ', 'Chino Mamani ', '71107598', '1998-08-19', '936094211', 'dchinom@unjbg.edu.pe', 2021, 1),
(269, 1, 'kharen', 'mamani quenta', '76415999', '1995-03-06', '910400950', 'kharenm@unjgb.edu.pe', 2021, 1),
(270, 1, 'Milagros Alina', 'Llanqui Flores', '72177345', '1999-10-04', '944326181', 'mllanquif@unjbg.edu.pe', 2021, 1),
(271, 1, 'Naomi Summy', 'Caceres machaca', '72945079', '2002-11-19', '918971552', 'nscaceresm@unjbg.edu.pe', 2021, 1),
(272, 1, 'Daniela Ximena', 'Condori Quijo', '76618107', '2000-07-14', '975552158', 'dcondoriq@unjbg.edu.pe', 2021, 1),
(273, 1, 'Scheyla Mynhel', 'Duran Ascencio', '72969051', '2003-05-20', '937403208', 'smduran205@gmail.com', 2021, 1),
(274, 1, 'Abigail Araceli', 'Menendez Silvestre', '70933573', '2002-11-14', '934006172', 'aamenendezs@unjbg.edu.pe', 2021, 1),
(275, 1, 'yanet milagros', 'ccaso huanacuni', '73964462', '1995-03-25', '923485059', 'yanetmilagros11@gmail.com', 2021, 1),
(276, 1, 'Wilfredo Enrique', 'Lira Palza', '72803138', '1994-11-24', '981884038', 'Wlirap@unjbg.edu.pe', 2021, 1),
(277, 1, 'Victoria', 'Cueva Alanguia', '75080337', '2001-10-08', '900840582', 'vcuevaa@unjbg.edu.pe', 2021, 1),
(278, 1, 'Claudia ', 'Torres Arias', '75539110', '2001-05-15', '912645815', 'ctorresa@unjbg.edu.pe', 2021, 1),
(279, 1, 'Angel Eduardo', 'Mendoza Ventura ', '74393536', '2000-04-13', '988328871', 'amendozav@unjbg.edu.pe', 2021, 1),
(280, 1, 'Isabel Matilde', 'Sarmiento Aduviri', '73338572', '1999-12-24', '924116374', 'isarmientoa@unjbg.edu.pe', 2021, 1),
(281, 1, 'Xiomara Lourdes ', 'Chambilla Mori ', '71745112', '2003-10-10', '981374091', 'xlchambillam@unjbg.edu.pe', 2021, 1),
(282, 1, 'Yeni Josefina ', 'Quispe Quispe ', '77091571', '1999-05-27', '945458519', 'yeniqq@unjbg.edu.pe', 2021, 1),
(283, 1, 'Ronald Francisco', 'Paxi Chata', '76385017', '1998-12-09', '928981519', 'ronaldpaxi@outlook.es', 2021, 1),
(284, 1, 'Esmeralda Ruby ', 'Napa Huayne ', '73899312', '2000-08-03', '974541045', 'esmeraldarubynapahuayne@gmail.com', 2021, 1),
(285, 1, 'Fred Bruce', 'Capia Arenas ', '73311134', '2000-05-31', '951424922', 'rjfbcapiaa@unjbg.edu.pe', 2021, 1),
(286, 1, 'PAULO PATRICIO', 'PALACIOS CUENTAS', '70555525', '2001-05-24', '998105805', 'ppalaciosc@unjbg.edu.pe', 2021, 1),
(287, 1, 'ANGIE MAYURI', 'CAHUANA MAMANI', '75927274', '2021-07-12', '920866460', 'acahuanam@unjbg.edu.pe', 2021, 1),
(288, 1, 'alexander dariell', 'palli ururi', '71851672', '1999-05-22', '910789478', 'addpalliu@unjbg.edu.pe', 2021, 1),
(289, 1, 'Evelyn Fernanda', 'Esteban Coa', '71275590', '2001-02-14', '966988649', 'eestebanc@unjbg.edu.pe', 2021, 1),
(290, 1, 'Karina Olenka ', 'Charaja Huaynapata', '71067744', '2001-04-28', '930825944', 'kocharajah@unjbg.edu.pe', 2021, 1),
(291, 1, 'Thays Adriana', 'Chire QUISPE', '71218980', '1995-07-08', '913004029', 'tchireq@unjbg.edu.pe', 2021, 1),
(292, 1, 'ANNY MAYRA', 'VALENCIA ALANOCA', '71412445', '2001-09-28', '943425763', 'avalenciaa@unjbg.edu.pe', 2021, 1),
(293, 1, 'Jessica Soledad', 'Huanacuni Mamani', '71238022', '2004-02-27', '965159007', 'solemamani4567@gmail.com', 2021, 1),
(294, 1, 'Mayra Alexandra ', 'Castro Vargas', '71821439', '1992-08-08', '994401585', 'a_mcastrov@unjbg.edu.pe', 2021, 1),
(295, 1, 'Julyssa ', 'Duran Ucharico', '71888819', '2001-07-28', '973268963', 'jxduranu@unjbg.edu.pe', 2021, 1),
(296, 1, 'Alessandra Isabel', 'Morales Olivera', '74608024', '2002-03-03', '928559104', 'amoraleso@unjbg.edu.pe', 2021, 1),
(297, 1, 'Luciana', 'Carrera Leiva ', '71499111', '2002-05-30', '977376354', 'lcarreral@unjbg.edu.pe', 2021, 1),
(298, 1, 'Maria Fernanda ', 'Castro Vargas ', '71070481', '2000-06-23', '966856170', 'mariacv@unjbg.edu.pe', 2021, 1),
(299, 1, 'Jhosseline Raquel', 'Cutipa Llanos', '71567589', '2002-05-27', '980209119', 'jhosselinecl@unjbg.edu.pe', 2021, 1),
(300, 1, 'ROMEL', 'MAQUERA ENCINAS', '74353295', '2003-01-03', '929189806', 'rmaquerae@unjbg.edu.pe', 2021, 1),
(301, 1, 'Janeth Karina', 'Zapana Layme', '73989698', '2000-04-11', '949531124', 'jzapanal@unjbg.edu.pe', 2021, 1),
(302, 1, 'Denis Franklyn', 'Choque Iquiapaza ', '71003131', '1995-02-24', '983016997', 'dfchoquei@unjbg.edu.pe', 2021, 1),
(303, 1, 'Jackelinne Susanne', 'Ponce Paredes', '71041047', '2000-06-20', '951563732', 'jackelinnesusanne20@gmail.com', 2021, 1),
(304, 1, 'Vanessa Reyna', 'Castañon Valdivia', '71642996', '1997-08-30', '994130044', 'vcastanonv@unjbg.edu.pe', 2021, 1),
(305, 1, 'Charles Enrique Junior', 'Luyo Carpio', '72174272', '1998-02-02', '981843526', 'cluyoc@unjbg.edu.pe', 2021, 1),
(306, 1, 'Abelardo Maximo', 'Chura Barcena', '70601238', '1999-04-23', '952945536', 'abechb@gmail.com', 2021, 1),
(307, 1, 'Abigail Lisette', 'Robles Huanacuni', '71547817', '2000-02-03', '927408631', 'alroblesh@unjbg.edu.pe', 2021, 1),
(308, 1, 'FIORELLA DIANA', 'ROJAS RAFAEL', '71252702', '1998-03-01', '964520160', 'frojasr@unjbg.edu.pe', 2021, 1),
(309, 1, 'Yenifer Katherin ', 'Ara QQueso', '75389342', '2001-07-18', '977340445', 'yaraq@unjbg.edu.pe', 2021, 1),
(310, 1, 'Arlette Ninoska', 'Silva Borda', '71234038', '2001-03-01', '989382777', 'asilvab@unjbg.edu.pe', 2021, 1),
(311, 1, 'Jesus Edwin', 'Vasquez Pari', '71220727', '2000-06-19', '936293566', 'a_jvasquezp@unjbg.edu.pe', 2021, 1),
(312, 1, 'Ana Sarai', 'Ayala Quispe', '74535433', '1999-04-02', '946126339', 'saraiayalaq15@gmail.com', 2021, 1),
(313, 1, 'Alejandrina ', 'Turpo Quispe', '74945716', '1999-02-08', '912090334', 'aturpoq@unjbg.edu.pe', 2021, 1),
(314, 1, 'Oriana Janet', 'Hurtado Vilca ', '77126447', '1996-01-29', '921351637', 'ohurtadov@unjbg.edu.pe', 2021, 1),
(315, 1, 'Milagros Francisca', 'Mamani Tapia', '71313307', '2001-10-13', '958970865', 'milagrosmt@unjbg.edu.pe', 2021, 1),
(316, 1, 'Keyla Jazmy', 'Ccori Cosacani', '70832118', '1994-08-22', '910717313', 'kccoric@unjbg.edu.pe', 2021, 1),
(317, 1, 'Elizabeth', 'Gutierrez Limachi', '77125029', '2002-12-29', '931869371', 'egutierrez@unjbg.edu.pe', 2021, 1),
(318, 1, 'Alexis mark', 'Choquehuanca pinta', '71657867', '1998-05-04', '917917605', 'alexis04_maxx@hotmail.com', 2021, 1),
(319, 1, 'Fernanda Margarita ', 'Poma Flores', '77665646', '2001-06-21', '992020033', 'fpomaf@unjbg.edu.pe', 2021, 1),
(320, 1, 'Dora Jimena', 'Arias Choque', '76162871', '1998-04-20', '937041610', 'a_dariasc@unjbg.edu.pe', 2021, 1),
(321, 1, 'Yenifer Daleska', 'Vargas Condori', '71199060', '2001-07-31', '923826858', 'yvargasc@unjbg.edu.pe', 2021, 1),
(322, 1, 'ELMER HERNAN', 'CURO CURO', '41031778', '1985-12-08', '952857706', 'elmercc@unjbg.edu.pe', 2021, 1),
(323, 1, 'Miriam Estefani ', 'Condori Chacolli ', '76059900', '1996-01-20', '988335602', 'mecondoric@unjbg.edu.pe', 2021, 1),
(324, 1, 'Mery Yorssy', 'Rivera Chambilla', '72118770', '1997-11-30', '983345853', 'meryrc@unjbg.edu.pe', 2021, 1),
(325, 1, 'Yessica Soledad', 'Quispe Quispe', '77023828', '1995-05-17', '931995620', 'yessicaqq@unjbg.edu.pe', 2021, 1),
(326, 1, 'Brenda', 'Chacolli Quispe', '74501570', '1996-11-09', '992657605', 'zushikuu@gmail.com', 2021, 1),
(327, 1, 'Estephany Alisson', 'Alanguia Caceres', '74071407', '1999-09-13', '939579446', 'ealanguiac@unjbg.edu.pe', 2021, 1),
(328, 1, 'Monica Veronica', 'Alanoca Pacoticona', '75780464', '2002-10-09', '995227392', 'malanocap@unjbg.edu.pe', 2021, 1),
(329, 1, 'Luz Marina ', 'Roque Coronel', '71783333', '2000-02-04', '923884703', 'luzrc@unjbg.edu.pe', 2021, 1),
(330, 1, 'Brenda Isabel', 'Silva Choque', '72814687', '1997-08-06', '949270112', 'bsilvac@unjbg.edu.pe', 2021, 1),
(331, 1, 'Ruiz Antoni', 'Huerta Mamani', '77125024', '1999-01-02', '921505258', 'rhuertam@unjbg.com', 2021, 1),
(332, 1, 'Hilda', 'Ticona Maquera', '76925712', '2000-04-05', '929333872', 'hildatm@unjbg.edu.pe', 2021, 1),
(333, 1, 'Orlando Sergio', 'Guillermo Mamani', '71240510', '1996-06-25', '973208023', 'a_oguillermom@unjbg.edu.pe', 2021, 1),
(334, 1, 'Ricardo Angel ', 'Valeriano Acero', '71283718', '1997-06-19', '970249736', 'rvalerianoa@unjbg.edu.pe', 2021, 1),
(335, 1, 'Stephani Belinda ', 'Mamani Mamani ', '71387873', '2002-08-03', '950800090', 'sbmamanim@unjbg.edu.pe', 2021, 1),
(336, 1, 'Dorian Reynaldo', 'Cutipa Laqui', '71228010', '1999-10-03', '913925928', 'doriancl50@gmail.com', 2021, 1),
(337, 1, 'David', 'Laura Caballero', '71651218', '1998-02-26', '951681090', 'dlaurac@unjbg.edu.pe', 2021, 1),
(338, 1, 'Joseph Dennis', 'Mamani Colquehuanca', '76230474', '1996-02-21', '995520947', 'arkilyus@gmail.com', 2021, 1),
(339, 1, 'WILMER RODRIGO', 'OSCO CERVANTES', '75665983', '1998-01-10', '958748218', 'wilmeroc@unjbg.edu.pe', 2021, 1),
(340, 1, 'Julia Elena', 'Yapuchura villalva', '76385023', '2002-06-19', '936262513', 'jeyapuchurav@unjbg.edu.pe', 2021, 1),
(341, 1, 'YHONY FERNANDO', 'ANCALLA CALIZAYA', '76518719', '2021-06-15', '976491079', 'yhonyac0611@outlook.com', 2021, 1),
(342, 1, 'Miriam', 'Huallpa Laura', '73543531', '1999-08-03', '927496508', 'mhuallpal@unjbg.edu.pe', 2021, 1),
(343, 1, 'Yulisa Clotilde', 'Aguilar Curasi', '77498263', '2021-06-15', '937389172', 'ycaguilarc@unjbg.edu.pe', 2021, 1),
(344, 1, 'Erick Eder ', 'Vargas Ticona', '71273497', '1996-07-31', '929002013', 'eevargast@unjbg.edu.pe', 2021, 1),
(345, 1, 'Omar', 'Larico Colque', '47908157', '1993-09-11', '951490823', 'olaricoc@unjbg.edu.pe', 2021, 1),
(346, 1, 'Araceli Vanessa', 'Acero Ordoñez', '70907854', '2001-08-26', '998820230', 'araceli.acer26@gmail.com', 2021, 1),
(347, 1, 'Jhon Ever ', 'Calizaya Ichuta', '76610706', '2000-02-15', '950081230', 'jcalizayai@unjbg.edu.pe', 2021, 1),
(348, 1, 'BLANCA YUDHIT ', 'CHARA YUJRA', '73627950', '1998-08-14', '939741522', 'bcharay@unjbg.edu.pe', 2021, 1),
(349, 1, 'Veronica Pilar', 'Velasquez Nina', '70939598', '2001-04-16', '985413403', 'vvelasquezn@unjbg.edu.pe', 2021, 1),
(350, 1, 'Nicolle Alexandra', 'Condori Conza', '74815633', '2000-01-09', '900249904', 'aconza01@gmail.com', 2021, 1),
(351, 1, 'Alejandra Nayely', 'Canque Gutierrez', '60959011', '2001-02-12', '927483693', 'acanqueg@unjbg.edu.pe', 2021, 1),
(352, 1, 'Pamela Ines', 'Mamani Huanca', '70516662', '2001-05-30', '941750458', 'pamela.mamani321@gmail.com', 2021, 1),
(353, 1, 'Adelinne Yeli ', 'Ancachi Tarqui', '75514673', '1999-03-05', '997533779', 'ancachiadelinne12@gmail.com', 2021, 1),
(354, 1, 'Luz Marina', 'Quispe Pari', '70299948', '2000-04-10', '902180346', 'luzqp@unjbg.edu.pe', 2021, 1),
(355, 1, 'Melanny Arleth', 'Catachura Apaza', '75449301', '2000-03-02', '958987473', 'mcatachuraa@unjbg.edu.pe', 2021, 1),
(356, 1, 'Rodrigo Jeancarlo', 'Canahuire Ruelas', '70560429', '2003-02-21', '929985593', 'rcanahuireruelas@gmail.com', 2021, 1),
(357, 1, 'Lisbet Cintia ', 'Cordova Mamani', '71775053', '2021-10-23', '985774221', 'lisbetcordova12e@gmail.com', 2021, 1),
(358, 1, 'Diana Yakelyn', 'Canqui Santos', '76760273', '1998-10-02', '969249030', 'dcanquis@unjbg.edu.pe', 2021, 1),
(359, 1, 'Erika Odalis ', 'Manturano Rojas', '10415963', '1976-07-30', '913162167', 'emanturanor@unjbg.edu.pe', 2021, 1),
(360, 1, 'Nora', 'Mamani Vargas', '75386681', '1999-01-23', '952017508', 'noramv@unjbg.edu.pe', 2021, 1),
(361, 1, 'Patricia del Carmen', 'Flores Calizaya', '71784668', '1998-01-15', '918385294', 'pcfloresc@unjbg.edu.pe', 2021, 1),
(362, 1, 'Marylin Griselda ', 'Tipula Calisaya', '76654238', '2002-10-17', '945512911', 'mgtipulac@unjbg.edu.pe', 2021, 1),
(363, 1, 'Danny Marili ', 'Jacinto Atencio', '75875454', '1996-08-26', '954769184', 'djacintoa@unjbg.edu.pe', 2021, 1),
(364, 1, 'Maria de los Angeles ', 'Mamani Alanoca ', '71217590', '1997-01-27', '941077826', 'Mamamania@unjbg.edu.pe', 2021, 1),
(365, 1, 'Jose Fernando', 'Huaman Rimache', '77299643', '2000-06-06', '992830267', 'jhuamanr@unjbg.edu.pe', 2021, 1),
(366, 1, 'Alexis Yohan', 'Chata Tarqui', '71124635', '2002-10-03', '902207621', 'Aychatat@gmail.com', 2021, 1),
(367, 1, 'Renaldo Jose ', 'Rivera Ramirez ', '77276154', '1996-09-29', '943535847', 'rriverar@unjbg.edu.pe', 2021, 1),
(368, 1, 'Ana Paola', 'Flores Villacorta', '71110128', '1997-09-18', '981640692', 'afloresv@unjbg.edu.pe', 2021, 1),
(369, 1, 'Ney cristian', 'Chipana Gutierrez ', '73211853', '1999-01-09', '994567728', 'nchipanag@unjbg.edu.pe', 2021, 1),
(370, 1, 'lidit paola ', 'inquilla  choque', '71781745', '2003-10-06', '987064356', 'lpinquillac@unjbg.edu.pe', 2021, 1),
(371, 1, 'Ximena Valeria', 'Pinto Parillo', '70942245', '2001-11-22', '973930861', 'xvpintop@unjbg.edu.pe', 2021, 1),
(372, 1, 'Jorge Luis', 'Chacolli Romero', '72634190', '1994-04-30', '942966941', 'jchacollir@unjbg.edu.pe', 2021, 1),
(373, 1, 'EMILY MARNETH', 'CAMATICONA CAHUANA', '71799906', '1997-06-23', '935772207', 'ecamaticonac@unjbg.edu.pe', 2021, 1),
(374, 1, 'Krisnha Jennyfer ', 'Chicalla Centeno ', '76006168', '2002-06-13', '949926041', 'krisnhajcc@gmail.com', 2021, 1),
(375, 1, 'Sarai Marycielo ', 'Chijani Iscara', '76332981', '2001-08-04', '919044880', 'smchijanii@unjbg.edu.pe', 2021, 1),
(376, 1, 'Eva Nayeli ', 'Flores Ticona', '75917757', '1999-02-12', '932238318', 'evaft@unjbg.edu.pe', 2021, 1),
(377, 1, 'Ruth Miriam', 'Achata Tacora', '71345536', '2000-04-01', '927920326', 'rachatat@unjbg.edu.pe', 2021, 1),
(378, 1, 'Xiomara Esperanza', 'Zegarra Mamani', '70830406', '1998-04-24', '925576377', 'xzegarram@unjbg.edu.pe', 2021, 1),
(379, 1, 'Yanira Analhi', 'Velasquez Silva', '76427434', '2003-10-04', '955292660', 'yaniravelasquez61@gmail.com', 2021, 1),
(380, 1, 'Wendy Marjorie', 'Pino Auccapuri', '73224719', '2000-07-11', '921830809', 'wpinoa@unjbg.edu.pe', 2021, 1),
(381, 1, 'Cinthia Gladys', 'Ayala chambilla', '71726005', '1995-08-26', '910437445', 'cayalac@unjbg.edu.pe', 2021, 1),
(382, 1, 'Angelica Magdalena', 'Mamani Carpio', '74571326', '1999-10-05', '925809836', 'angelicamc@unjbg.edu.pe', 2021, 1),
(383, 1, 'Angie Tatiana', 'Condori Huancahuire', '75407943', '1999-05-06', '921437854', 'condorihuancahuireangietatiana@gmail.com', 2021, 1),
(384, 1, 'Josselin Jazmin', 'Zanga Quispe ', '75761821', '2001-07-27', '926066863', 'josselinzq@unjbg.edu.pe', 2021, 1),
(385, 1, 'BEATRIZ', 'JAHUIRA LOPE', '73989665', '2000-01-01', '928923995', 'bjahuiral@unjbg.edu.pe', 2021, 1),
(386, 1, 'Maria Fernanda', 'Ramos Galdos', '70285608', '1999-12-17', '957897808', 'mframosg@unjbg.edu.pe', 2021, 1),
(387, 1, 'LIZ ESTEFANI', 'CHURACUTIPA MARCA', '71524800', '2001-02-23', '919164597', 'lizcm@unjbg.edu.pe', 2021, 1),
(388, 1, 'Cinthia Karems ', 'Flores Pongo ', '71980721', '1999-08-24', '925408837', 'cfloresp@unjbg.edu.pe', 2021, 1),
(389, 1, 'Noemi Carla ', 'Arocutipa Mendoza', '76069686', '1998-12-15', '974591951', 'narocutipam@unjbg.edu.pe', 2021, 1),
(390, 1, 'Diego Renato', 'Vizcarra Gutierrez', '71255435', '1997-11-21', '920697273', 'dvizcarrag@unjbg.edu.pe', 2021, 1),
(391, 1, 'Jimena Isabel', 'Flores Llanos', '73605981', '1995-08-22', '982661026', 'jifloresl@unjbg.edu.pe', 2021, 1),
(392, 1, 'Emely Janeth', 'Choque Mamani', '75269000', '2000-02-24', '943466264', 'echoquem@gmail.com', 2021, 1),
(393, 1, 'Stephanie Milenka', 'Mendoza Calisaya', '70837416', '2001-11-18', '958322688', 'stephaniemc@unjbg.edu.pe', 2021, 1),
(394, 1, 'Marleny Magaly', 'Turpo Muñez', '75392217', '1999-11-10', '996379602', 'mturpom@unjbg.edu.pe', 2021, 1),
(395, 1, 'Diego Jose', 'Mayta Mamani ', '73451130', '1998-01-04', '962353764', 'dmaytam@unjbg.edu.pe', 2021, 1),
(396, 1, 'Yamile Sumi', 'Manchaco Cerron', '72970314', '2004-01-02', '916617423', 'yamilemanchaco@gmail.com', 2021, 1),
(397, 1, 'Elyana', 'Cruz Arocutipa', '71460223', '1996-05-22', '916687000', 'ecruza@unjbg.edu.pe', 2021, 1),
(398, 1, 'Syntia Noemi', 'Huisa Maquera', '73220732', '1999-11-06', '912262514', 'Shuisam@unjbg.edu.pe', 2021, 1),
(399, 1, 'Cristhian Edward', 'Atencio Maquera', '71460219', '2000-07-11', '910176686', 'edward.atencio.m@gmail.com', 2021, 1),
(400, 1, 'Diana Galeska', 'Farfan Pajuelo', '63144644', '1999-02-15', '970643402', 'dfarfanp@unjbg.edu.pe', 2021, 1),
(401, 1, 'Elmer ', 'Chipana Vilca', '74353383', '2021-06-16', '918869799', 'echipanav@unjbg.edu.pe', 2021, 1),
(402, 1, 'Ruth Melissa ', 'Mamani Vicente ', '70932011', '2000-06-05', '956982259', 'rmmamaniv@unjbg.edu.pe', 2021, 1),
(403, 1, 'Adrian Emmanuel', 'Mendoza Quille', '72662573', '2000-10-21', '985580502', 'adrianmq@unjbg.edu.pe', 2021, 1),
(404, 1, 'EVELYN PAMELA', 'TICONA APAZA', '74975663', '1999-03-25', '916265212', 'eticonaa@unjbg.edu.pe', 2021, 1),
(405, 1, 'David Eduardo', 'Pongo Bonifacio', '70554588', '1992-01-10', '952298538', 'dpongob@unjbg.edu.pe', 2021, 1),
(406, 1, 'Yurenma Milagros ', 'Perca Perca ', '70657096', '2003-08-14', '952829533', 'pyurenma@gmail.com', 2021, 1),
(407, 1, 'Nayeli Katerin ', 'Choque Tarqui ', '74884841', '2001-07-16', '902606020', 'nchoquet@unjbg.edu.pe', 2021, 1),
(408, 1, 'Ruth Roxana ', 'Mamani Ccalahuilli ', '70516657', '2001-07-26', '958593089', 'rrmamanic@unjbg.edu.pe', 2021, 1),
(409, 1, 'Jenina Katty', 'Urbina Pizarro', '70583366', '2000-09-17', '997945310', 'jurbinap@unjbg.edu.pe', 2021, 1),
(410, 1, 'Geraldine Yahaira', 'Ancco Choque', '74219672', '2000-08-20', '944080146', 'geraldineac@unjbg.edu.pe', 2021, 1),
(411, 1, 'Gian Carlos ', 'Ancco Choque', '74225784', '1999-02-25', '938760858', 'gianac@unjbg.edu.pe', 2021, 1),
(412, 1, 'Milagros Elizabeth', 'Marin Franco', '74323147', '2002-06-15', '928551685', 'milagroselizmarin@gmail.com', 2021, 1),
(413, 1, 'Shara Milagros ', 'Larico Huallpa', '75048302', '2000-10-17', '973925940', 'sharamilagros17@gmail.com', 2021, 1),
(414, 1, 'Liliana Carolina', 'Banegas Saavedra', '76452986', '1999-06-01', '912965434', 'lbanegass@unjbg.edu.pe', 2021, 1),
(415, 1, 'Jhon Alexander', 'Ale Mollinedo', '71230186', '1997-03-12', '910193891', 'jalem@unjbg.edu.pe', 2021, 1),
(416, 1, 'Diana Lizeth ', 'Yujra Lupaca', '74807940', '2001-05-25', '972965633', 'yujralupacadiana@gmail.com', 2021, 1),
(417, 1, 'David Samuel Josue', 'Colque Arce', '61519040', '1997-05-30', '935774573', 'dcolquea@unjbg.edu.pe', 2021, 1),
(418, 1, 'Andrea del Carmen ', 'Gambetta Galdos ', '72447952', '1999-05-25', '958746491', 'agambettag@unjbg.edu.pe', 2021, 1),
(419, 1, 'Tonantzin Melissa', 'Valdez Blaz', '70652544', '1999-06-05', '945245880', 'tvaldezb@unjbg.edu.pe', 2021, 1),
(420, 1, 'Kelly Lizeth ', 'Leyva Garcia ', '76852893', '1998-08-18', '924123048', 'kleyvag@unjbg.edu.pe', 2021, 1),
(421, 1, 'Julia Janeth', 'Gomez Cerezo', '76677305', '2000-01-25', '932730313', 'jjgomezc@unjbg.edu.pe', 2021, 1),
(422, 1, 'aleyda tania', 'ocsa mamani', '72228901', '2002-01-09', '985453064', 'aleyda.ocsa@gmail.com', 2021, 1),
(423, 1, 'Nereyda Nicolle', 'Puma Mamani', '60732473', '2004-05-23', '961111203', 'nereyda.nicolle23@outlook.com', 2021, 1),
(424, 1, 'Diana Milagros ', 'Choque Mamani', '71199074', '2001-12-07', '938525887', 'dmchoquem@unjbg.edu.pe', 2021, 1),
(425, 1, 'Jhoel Andree Ricardo', 'Sarmiento Rojas', '70942275', '2000-02-16', '963934595', 'jhoelandre29@gmail.com', 2021, 1),
(426, 1, 'Fabia Alejandra ', 'Quinteros Huacca', '70661570', '2003-03-12', '915197130', 'alejandra.qh.2626@gmail.com', 2021, 1);
INSERT INTO `avo_voluntarios` (`id`, `id_escuela`, `nombres`, `apellidos`, `dni`, `fecha_nac`, `celular`, `email`, `anio`, `tipo`) VALUES
(427, 1, 'Astrid Cielo', 'Mancilla Estrada', '71994069', '2003-03-02', '915956540', 'acmancillae@unjbg.edu.pe', 2021, 1),
(428, 1, 'Yobana', 'Aguilar Huarca', '70671425', '1997-01-13', '918352380', 'yaguilarh@unjbg.edu.pe', 2021, 1),
(429, 1, 'Marzia Coraly Marisol ', 'Avendaño Mireles ', '71414564', '2000-11-09', '935864386', 'mavendanom@unjbg.edu.pe', 2021, 1),
(430, 1, 'Nestor Hugo', 'Loma Flores', '71533267', '2000-04-20', '977523594', 'nlomaf@unjbg.edu.pe', 2021, 1),
(431, 1, 'Karolina Yeymy', 'Ramos Ventura', '73231050', '2004-03-06', '997398761', 'karolina.y.g2004@gmail.com', 2021, 1),
(432, 1, 'MELANY ESTHER', 'ALANGUIA CACERES ', '74071404', '2001-10-02', '945708706', 'mealanguiac@unjbg.edu.pe', 2021, 1),
(433, 1, 'Smith ', 'Flores Vilca', '75023108', '2003-06-28', '902541307', 'sbfloresv@unjbg.edu.pe', 2021, 1),
(434, 1, 'Alan Christian', 'Barreto Osnayo', '73982776', '1998-05-31', '926051895', 'abarreto@unjbg.edu.pe', 2021, 1),
(435, 1, 'Rossi Miriam', 'Centon Cruz', '74203679', '1999-02-08', '933496025', 'rcentonc@unjbg.edu.pe', 2021, 1),
(436, 1, 'Brajam Xavier', 'Parra Sandoval', '72631000', '1999-09-30', '902091008', 'bparras@unjbg.edu.pe', 2021, 1),
(437, 1, 'Elvis Marcelo', 'Choqueapaza Salamanca', '71391008', '1997-12-26', '917849818', 'elvis__1997@hotmail.com', 2021, 1),
(438, 1, 'Ruth Karina', 'Ramos Fora', '74397115', '2002-09-18', '949506664', 'rkramosf@unjbg.edu.pe', 2021, 1),
(439, 1, 'Nelly Leticia', 'Calderon Choque', '74728319', '1999-02-26', '963405037', 'nellycalderon.04@gmail.com', 2021, 1),
(440, 1, 'Miguel Angel', 'Mamani Aguilar', '73359025', '2003-04-05', '944545569', 'miguelama@unjbg.edu.pe', 2021, 1),
(441, 1, 'Raul Vicente', 'Huarahuara Toma ', '71421133', '1998-04-19', '921892826', 'raulhuarahuara@gmail.com', 2021, 1),
(442, 1, 'Zulema Cristina', 'Infantas Vela', '70616383', '2003-01-16', '922328366', 'zinfantasv@unjbg.edu.pe', 2021, 1),
(443, 1, 'Mark Antony', 'Carazas Mamani', '70453479', '1999-07-09', '994729012', 'mcarazasm@unjbg.edu.pe', 2021, 1),
(444, 1, 'Karina Raysa ', 'Contreras Velasco', '70411205', '1999-01-29', '948168030', 'kcontrerasv@unjbg.edu.pe', 2021, 1),
(445, 1, 'Sheila Yasmin', 'Mamani Soncco', '72371397', '2001-04-06', '910930874', 'smamanis@unjbg.edu.pe', 2021, 1),
(446, 1, 'Aracely Kimberly ', 'Pari Maque ', '70926616', '2000-01-09', '967902090', 'Berly-apm@hotmail.com', 2021, 1),
(447, 1, 'Dajhana', 'Quenta Caljaro ', '72936561', '2003-04-07', '967440810', 'dquenta@unjbg.edu.pe', 2021, 1),
(448, 1, 'Vilma Yudith', 'Ccama Mamani', '77341555', '2002-04-06', '918336722', 'vyccamam@unjbg.edu.pe', 2021, 1),
(449, 1, 'Mabel Xiomara ', 'Laque Condori ', '74908222', '2002-07-14', '927139887', 'mlaquec@unjbg.edu.pe', 2021, 1),
(450, 1, 'Cesar Arturo', 'Valencia Inchuña', '75089828', '1997-04-05', '962680823', 'arturovalenciacavi.60@gmail.com', 2021, 1),
(451, 1, 'Karina Raysa', 'Contreras Velasco', '70411205', '1999-01-29', '948168030', 'kcontrerasv@unjbg.edu.pe', 2021, 1),
(452, 1, 'OMAR SERGIO', 'SINGUÑA SONCCO', '70843034', '1998-09-04', '929694464', 'osingunas@unjbg.edu.pe', 2021, 1),
(453, 1, 'Luz Karina', 'Ventura Chata', '77132596', '2000-07-26', '920609996', 'luzvc@unjbg.edu.pe', 2021, 1),
(454, 1, 'Lucero Silvana', 'Serruto Salas', '70609602', '2002-02-04', '931698402', 'lserrutos@unjbg.edu.pe', 2021, 1),
(455, 1, 'Fatima Aracelli ', 'Ibañez Arcaya ', '70924903', '0000-00-00', '921601736', 'fibaneza@unjbg.edu.pe', 2021, 1),
(456, 1, 'Daisy Yenny', 'Illa Jilaja', '70846162', '2003-11-19', '923180835', 'dyillaj@unjbg.edu.pe', 2021, 1),
(457, 1, 'Diana yuly', 'illa jilaja', '70846163', '1998-06-19', '910215499', 'dyijilaja@unjbg.edu.pe', 2021, 1),
(458, 1, 'Eliane Miluzca', 'Illa Jilaja', '70846164', '2000-09-26', '960666387', 'eillaj@unjbg.edu.pe', 2021, 1),
(459, 1, 'erick alfredo', 'calderon acho', '74690433', '2000-07-28', '960282691', 'eacalderona@unjbg.edu.pe', 2021, 1),
(460, 1, 'Romina Jhoselin', 'Alberto Zegarra', '70416141', '1999-05-07', '936276423', 'ralbertoz@unjbg.edu.pe', 2021, 1),
(461, 1, 'Abel Fernando', 'Quispe Espinoza', '72462033', '1993-05-24', '924231127', 'aquispee@unjbg.edu.pe', 2021, 1),
(462, 1, 'Kimberly Anai ', 'Gutierrez Pantigoso', '72952588', '1999-11-01', '976637941', 'kgutierrezp@unjbg.edu.pe', 2021, 1),
(463, 1, 'Irina Reyna ', 'Larriega Cruz', '71070487', '2000-01-04', '965719973', 'ilarriegac@unjbg.edu.pe', 2021, 1),
(464, 1, 'Dayana Araceli', 'Condori Pacoricona', '71469665', '2002-07-31', '931518835', 'dayanacp@unjbg.edu.pe', 2021, 1),
(465, 1, 'Ninfa Yazmin', 'Quispe Quispe', '74815759', '2001-01-21', '931119046', 'ninfaqq@unjbg.edu.pe', 2021, 1),
(466, 1, 'Lissette Lucero', 'Pari Aycachi', '75091860', '2000-05-01', '927336520', 'lparia@unjbg.edu.pe', 2021, 1),
(467, 1, 'nury magnolia', 'sucso cordero', '72513467', '1999-10-26', '969717921', 'nsucsoc@unjbg.edu.pe', 2021, 1),
(468, 1, 'ELVIS HUBER', 'ANCACHI CHIPANA', '75514697', '1999-08-14', '918687942', 'eancachic@unjbg.edu.pe', 2021, 1),
(469, 1, 'JUAN CARLOS', 'MAMANI MENDOZA', '76611754', '1994-12-04', '974099982', 'juanm@unjbg.edu.pe', 2021, 1),
(470, 1, 'Jorge Manuel', 'Chambi Atencio', '75329464', '2021-06-17', '950360123', 'jchambia@unjbg.edu.pe', 2021, 1),
(471, 1, 'Lucy ', 'Loma Flores', '71533284', '1997-08-05', '990879138', 'llomaf@unjbg.edu.pe', 2021, 1),
(472, 1, 'Carlos Andres', 'Cordova Quispe', '71275017', '1998-12-30', '923824918', 'ccordovaq@unjbg.edu.pe', 2021, 1),
(473, 1, 'Ruth Zulma', 'Acho Huayta', '75081984', '1997-03-03', '916981606', 'rachoh@unjbg.edu.pe', 2021, 1),
(474, 1, 'Kiara Eliane ', 'Sarmiento Trujillo ', '72970161', '2002-03-23', '980300078', 'ksarmientot@unjbg.edu.pe', 2021, 1),
(475, 1, 'Anthony Alvaro', 'Velarde Quispe', '72470209', '2000-01-27', '900242393', 'avelardeq@unjbg.edu.com', 2021, 1),
(476, 1, 'Franz Yused', 'Sarmiento Chambi', '76764231', '1999-10-21', '960354514', 'fsarmientoc@unjbg.edu.pe', 2021, 1),
(477, 1, 'Brian Jesus', 'Ticona Calizaya', '71335229', '2001-09-18', '928598422', 'cbrianjesus@gmail.com', 2021, 1),
(478, 1, 'Luz Clara ', 'Capacuti Quispe ', '74295969', '1999-08-18', '910205573', 'lccapacutiq@unjbg.edu.pe', 2021, 1),
(479, 1, 'Janeth Maribel', 'Churaira Machaca ', '77071854', '1998-08-28', '983943318', 'jchurairam@unjbg.edu.pe', 2021, 1),
(480, 1, 'Maribel Lucinda', 'Araca Condori', '40888751', '1981-03-23', '952679376', 'maracac@unjbg.edu.pe', 2021, 1),
(481, 1, 'Almodena Abigail ', 'Menendez Tejada ', '72812345', '2000-01-29', '995478066', 'amenendezt@unjbg.edu.pe', 2021, 1),
(482, 35, 'Jose Luis', 'Copari Yupanqui', '41886073', '1983-07-15', '952527959', 'josecopari@hotmail.com', 2021, 3),
(483, 25, 'Dennys', 'Sihuayro Larico', '45775992', '1989-06-17', '901163722', 'dsihuayrol@unjbg.edu.pe', 2021, 2),
(484, 35, 'Carmen Noemí', 'Rios Adrianzen', '410407', '1960-04-02', '969726090', 'crios@unjbg.edu.pe', 2021, 3),
(485, 14, 'Jackeline Rosemary', 'Flores Flores', '493579', '1972-04-23', '952967131', 'jrflores@unjbg.edu.pe', 2021, 2),
(486, 35, 'Alberto Miguel', 'Palacios Morales', '484192', '1966-04-15', '952990302', 'hindualberto55@gmail.com', 2021, 3),
(487, 15, 'Manuel Enrique', 'Atahualpa Alarico', '41548577', '1982-06-15', '952915736', 'matahualpaa@unjbg.esu.pe', 2021, 2),
(488, 35, 'Yesica marlene', 'Machaca tarqui', '42626918', '1984-10-01', '999014153', 'marle_143@hotmail.com', 2021, 3),
(489, 35, 'Anacelly', 'Valera López', '33265759', '1976-10-17', '942417385', 'avaleral@unjbg.edu.pe', 2021, 3),
(490, 35, 'Betty Maribel', 'Mamani Huarcaya', '40118218', '1978-07-19', '952844797', 'bmamanih@unjbg.edu.pe', 2021, 3),
(491, 14, 'Marleni Mary', 'Ayma Jiménez', '521649', '1977-12-16', '981797835', 'maymaj@unjbg.edu.pe', 2021, 2),
(492, 29, 'Miguel Alexis', 'Piaggo Canivillo', '794759', '1975-12-04', '952304006', 'mpiaggoc@unjbg.edu.pe', 2021, 2),
(493, 3, 'Ruthy Merla', 'Pilco Velasquez', '499664', '1971-02-11', '952296679', 'rmpilcov@unjbg.edu', 2021, 2),
(494, 5, 'Lourdes Susana del Carmen', 'Fernández Barahona', '516609', '1978-03-27', '952396097', 'lfernandezb@unjbg.edu.pe', 2021, 2),
(495, 32, 'Sara America', 'Mercado Rodriguez', '23921334', '1971-10-12', '952710143', 'smercador@unjbg.edu.pe', 2021, 2),
(496, 33, 'Gloria Marina', 'Choque Machaca', '41031766', '1981-09-07', '951692897', 'gchoquem@unjbg.edu.pe', 2021, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drsu_area`
--

CREATE TABLE `drsu_area` (
  `sql_area_id` int(10) UNSIGNED NOT NULL,
  `sql_area_nombre` varchar(250) NOT NULL,
  `sql_area_sigla` varchar(20) NOT NULL,
  `sql_area_jefatura` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drsu_area`
--

INSERT INTO `drsu_area` (`sql_area_id`, `sql_area_nombre`, `sql_area_sigla`, `sql_area_jefatura`) VALUES
(1, 'Dirección Académica de Responsabilidad Social Universitaria', 'DRSU', 1),
(2, 'Área de Extensión y Proyeción Cultural', 'AEP', 1),
(3, 'Área de Programas de Voluntariado Basadrino y Vinculación con Grupos de Interés', 'AVO', 1),
(4, 'Área de Extensión Univesitaria, Proyección Social y Servicio Social', 'AES', 1),
(5, 'Área de Coordinación de la RSU en la Investigación y Formación Continua', 'ACI', 1),
(6, 'Secretaria de Dirección Académica de Responsabilidad Social Universitaria', 'DRSU', 0),
(7, 'Analista Administrativo de la Dirección Académica de Responsabilidad Social Universitaria', 'DRSU', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drsu_autoridad`
--

CREATE TABLE `drsu_autoridad` (
  `sql_autoridad_id` int(10) UNSIGNED NOT NULL,
  `sql_autoridad_nombre` varchar(250) DEFAULT NULL,
  `sql_autoridad_email` varchar(250) DEFAULT NULL,
  `sql_autoridad_imagen` varchar(250) DEFAULT NULL,
  `sql_autoridad_area_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drsu_autoridad`
--

INSERT INTO `drsu_autoridad` (`sql_autoridad_id`, `sql_autoridad_nombre`, `sql_autoridad_email`, `sql_autoridad_imagen`, `sql_autoridad_area_id`) VALUES
(1, 'Dra. Elizabeth Luisa Medina Soto', 'emedinas@unjbg.edu.pe', '1639104297_useer.jpg', 1),
(2, 'Dra. Karimen Jetsabel Mutter Cuellar', 'kmutterc@unjbg.edu.pe', '1638452126_user9.jpg', 2),
(3, 'Mgr. Gina Maribel Valle Castro', 'gvallec@unjbg.edu.pe', '1638452131_user9.jpg', 3),
(4, 'Mgr. Edgardo Javier Berrios Quina', 'eberriosq@unjbg.edu.pe', '1637634119_berrios.jpg', 4),
(5, 'Mgr. Milton Saúl Flor Rodriguez', 'mflorr@unjbg.edu.pe', '1638452139_user9.jpg', 5),
(6, 'SAP. Carmen Noemí Ríos Adrianzen', 'criosa@unjbg.edu.pe', '1637634195_carmenrios.jpg', 6),
(7, 'Lic. Sandra Monasterio Pazos', 'smonasteriop@unjbg.edu.pe', '1638452148_user9.jpg', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drsu_categoria`
--

CREATE TABLE `drsu_categoria` (
  `sql_categoria_id` int(10) UNSIGNED NOT NULL,
  `sql_categoria_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drsu_categoria`
--

INSERT INTO `drsu_categoria` (`sql_categoria_id`, `sql_categoria_nombre`) VALUES
(2, 'MISIÓN'),
(1, 'PRESENTACIÓN'),
(4, 'REGLAMENTO'),
(3, 'VISIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drsu_estado`
--

CREATE TABLE `drsu_estado` (
  `sql_estado_id` int(10) UNSIGNED NOT NULL,
  `sql_estado_nombre` varchar(250) NOT NULL,
  `sql_estado_sigla` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drsu_estado`
--

INSERT INTO `drsu_estado` (`sql_estado_id`, `sql_estado_nombre`, `sql_estado_sigla`) VALUES
(1, 'En proceso', ''),
(2, 'Finalizado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drsu_nosotros`
--

CREATE TABLE `drsu_nosotros` (
  `sql_nosotros_id` int(10) UNSIGNED NOT NULL,
  `sql_nosotros_titulo` varchar(250) DEFAULT NULL,
  `sql_nosotros_descripcion` text NOT NULL,
  `sql_nosotros_imagen` varchar(250) NOT NULL,
  `sql_nosotros_pdf` varchar(250) DEFAULT NULL,
  `sql_nosotros_categoria_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drsu_nosotros`
--

INSERT INTO `drsu_nosotros` (`sql_nosotros_id`, `sql_nosotros_titulo`, `sql_nosotros_descripcion`, `sql_nosotros_imagen`, `sql_nosotros_pdf`, `sql_nosotros_categoria_id`) VALUES
(1, 'LEY UNIVERSITARIA PERUANA Nº 30220 (2014)', 'Artículo 124. Responsabilidad social universitaria La responsabilidad social universitaria es la gestión ética y eficaz del impacto generado por la universidad en la sociedad debido al ejercicio de sus funciones: académica, de investigación y de servicios de extensión y participación en el desarrollo nacional en sus diferentes niveles y dimensiones; incluye la gestión del impacto producido por las relaciones entre los miembros de la comunidad universitaria, sobre el ambiente, y sobre otras organizaciones públicas y privadas que se constituyen en partes interesadas. La responsabilidad social universitaria es fundamento de la vida universitaria, contribuye al desarrollo sostenible y al bienestar de la sociedad. Compromete a toda la comunidad universitaria.', '1639104209_diario.jpg', '', 1),
(2, '', 'Direccionar la transversalización de la responsabilidad social universitaria en la gestión institucional y en la investigación y formación académica, guiando la participación y compromiso social de la universidad en la construcción de una comunidad sostenible.', '1637675515_mision.png', '', 2),
(3, '', 'Ser referentes de responsabilidad social universitaria a nivel nacional e internacional, mediante la gestión de políticas performativas y la articulación de acciones coherentes que fortalezcan el gobierno institucional, orienten la continua generación de conocimientos transdisciplinarios y dinamicen el desarrollo de competencias personales, profesionales y ciudadanas.', '1637675536_vision.png', '', 3),
(4, '', 'Para ingresar a nuestro reglamento.', '1637675545_reglamento.png', '1637677488_ReglamentoDRSU.pdf', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drsu_noticia`
--

CREATE TABLE `drsu_noticia` (
  `sql_noticia_id` int(10) UNSIGNED NOT NULL,
  `sql_noticia_titulo` text NOT NULL,
  `sql_noticia_imagen` varchar(250) NOT NULL,
  `sql_noticia_descripcion` text DEFAULT NULL,
  `sql_noticia_fecha` varchar(200) DEFAULT NULL,
  `sql_noticia_hora` varchar(200) DEFAULT NULL,
  `sql_noticia_enlace` varchar(200) DEFAULT NULL,
  `sql_noticia_lugar` varchar(200) DEFAULT NULL,
  `sql_noticia_area_id` int(10) UNSIGNED NOT NULL,
  `sql_noticia_estado_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drsu_noticia`
--

INSERT INTO `drsu_noticia` (`sql_noticia_id`, `sql_noticia_titulo`, `sql_noticia_imagen`, `sql_noticia_descripcion`, `sql_noticia_fecha`, `sql_noticia_hora`, `sql_noticia_enlace`, `sql_noticia_lugar`, `sql_noticia_area_id`, `sql_noticia_estado_id`) VALUES
(1, 'Estado Situacional del Covid en la region Tacna y vacunación', '1636913727_noticia1.jpg', NULL, '03 de Septiembre de 2021', '19:00 horas', 'https://www.google.com/', NULL, 2, 2),
(2, 'La voz Basadrina', '1636918900_noticia2.jpg', NULL, '20 de Agosto de 2020', '12:00 horas', 'https://www.youtube.com/', NULL, 2, 1),
(3, 'XX Juegos Florales Basadrinos 2021', '1636918983_noticia3.png', '', '07 y 08 de Octubre de 2020', '15:00 horas', 'https://www.google.com/', '', 1, 1),
(4, 'Capacitación a las escuelas: \"Documentación DRSU\"', '1638453028_logo_oficial.jpg', '', '', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drsu_rol`
--

CREATE TABLE `drsu_rol` (
  `sql_rol_id` int(10) UNSIGNED NOT NULL,
  `sql_rol_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drsu_rol`
--

INSERT INTO `drsu_rol` (`sql_rol_id`, `sql_rol_nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drsu_usuario`
--

CREATE TABLE `drsu_usuario` (
  `sql_usuario_id` int(10) UNSIGNED NOT NULL,
  `sql_usuario_email` varchar(100) NOT NULL,
  `sql_usuario_pass` varchar(100) NOT NULL,
  `sql_usuario_rol_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `drsu_usuario`
--

INSERT INTO `drsu_usuario` (`sql_usuario_id`, `sql_usuario_email`, `sql_usuario_pass`, `sql_usuario_rol_id`) VALUES
(1, 'modulodrsumaster@gmail.com', '$2y$10$R94xC.M/RM76/n5QBmI2w.2AMS9Z.RCTmhFS.oF1tU6DsqfHxduEK', 1),
(2, 'drsu@unjbg.edu.pe', '$2y$10$VOo2wYbbVdv6UUJ/AF43j.3TOgBaZviO9oNGG1OoYm/CL846O/xYO', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aep_area`
--
ALTER TABLE `aep_area`
  ADD PRIMARY KEY (`sql_area_id`);

--
-- Indices de la tabla `aep_autoridad`
--
ALTER TABLE `aep_autoridad`
  ADD PRIMARY KEY (`sql_autoridad_id`),
  ADD KEY `sql_autoridad_area_id` (`sql_autoridad_area_id`);

--
-- Indices de la tabla `aep_estado`
--
ALTER TABLE `aep_estado`
  ADD PRIMARY KEY (`sql_estado_id`);

--
-- Indices de la tabla `aep_noticia`
--
ALTER TABLE `aep_noticia`
  ADD PRIMARY KEY (`sql_noticia_id`),
  ADD KEY `sql_noticia_area_id` (`sql_noticia_area_id`),
  ADD KEY `sql_noticia_estado_id` (`sql_noticia_estado_id`);

--
-- Indices de la tabla `aep_rol`
--
ALTER TABLE `aep_rol`
  ADD PRIMARY KEY (`sql_rol_id`),
  ADD UNIQUE KEY `sql_rol_nombre` (`sql_rol_nombre`);

--
-- Indices de la tabla `aep_usuario`
--
ALTER TABLE `aep_usuario`
  ADD PRIMARY KEY (`sql_usuario_id`),
  ADD UNIQUE KEY `sql_usuario_email` (`sql_usuario_email`),
  ADD KEY `sql_usuario_rol_id` (`sql_usuario_rol_id`);

--
-- Indices de la tabla `avo_anio`
--
ALTER TABLE `avo_anio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avo_escuela`
--
ALTER TABLE `avo_escuela`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avo_facultad`
--
ALTER TABLE `avo_facultad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avo_publicacion`
--
ALTER TABLE `avo_publicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avo_tipo_publicacion`
--
ALTER TABLE `avo_tipo_publicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avo_tipo_voluntario`
--
ALTER TABLE `avo_tipo_voluntario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avo_users`
--
ALTER TABLE `avo_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `avo_voluntarios`
--
ALTER TABLE `avo_voluntarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `drsu_area`
--
ALTER TABLE `drsu_area`
  ADD PRIMARY KEY (`sql_area_id`);

--
-- Indices de la tabla `drsu_autoridad`
--
ALTER TABLE `drsu_autoridad`
  ADD PRIMARY KEY (`sql_autoridad_id`),
  ADD KEY `sql_autoridad_area_id` (`sql_autoridad_area_id`);

--
-- Indices de la tabla `drsu_categoria`
--
ALTER TABLE `drsu_categoria`
  ADD PRIMARY KEY (`sql_categoria_id`),
  ADD UNIQUE KEY `sql_categoria_nombre` (`sql_categoria_nombre`);

--
-- Indices de la tabla `drsu_estado`
--
ALTER TABLE `drsu_estado`
  ADD PRIMARY KEY (`sql_estado_id`);

--
-- Indices de la tabla `drsu_nosotros`
--
ALTER TABLE `drsu_nosotros`
  ADD PRIMARY KEY (`sql_nosotros_id`),
  ADD KEY `sql_nosotros_categoria_id` (`sql_nosotros_categoria_id`);

--
-- Indices de la tabla `drsu_noticia`
--
ALTER TABLE `drsu_noticia`
  ADD PRIMARY KEY (`sql_noticia_id`),
  ADD KEY `sql_noticia_area_id` (`sql_noticia_area_id`),
  ADD KEY `sql_noticia_estado_id` (`sql_noticia_estado_id`);

--
-- Indices de la tabla `drsu_rol`
--
ALTER TABLE `drsu_rol`
  ADD PRIMARY KEY (`sql_rol_id`),
  ADD UNIQUE KEY `sql_rol_nombre` (`sql_rol_nombre`);

--
-- Indices de la tabla `drsu_usuario`
--
ALTER TABLE `drsu_usuario`
  ADD PRIMARY KEY (`sql_usuario_id`),
  ADD UNIQUE KEY `sql_usuario_email` (`sql_usuario_email`),
  ADD KEY `sql_usuario_rol_id` (`sql_usuario_rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aep_area`
--
ALTER TABLE `aep_area`
  MODIFY `sql_area_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `aep_autoridad`
--
ALTER TABLE `aep_autoridad`
  MODIFY `sql_autoridad_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `aep_estado`
--
ALTER TABLE `aep_estado`
  MODIFY `sql_estado_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aep_noticia`
--
ALTER TABLE `aep_noticia`
  MODIFY `sql_noticia_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aep_rol`
--
ALTER TABLE `aep_rol`
  MODIFY `sql_rol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aep_usuario`
--
ALTER TABLE `aep_usuario`
  MODIFY `sql_usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `avo_anio`
--
ALTER TABLE `avo_anio`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `avo_escuela`
--
ALTER TABLE `avo_escuela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `avo_facultad`
--
ALTER TABLE `avo_facultad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `avo_publicacion`
--
ALTER TABLE `avo_publicacion`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `avo_tipo_publicacion`
--
ALTER TABLE `avo_tipo_publicacion`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `avo_tipo_voluntario`
--
ALTER TABLE `avo_tipo_voluntario`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `avo_users`
--
ALTER TABLE `avo_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `avo_voluntarios`
--
ALTER TABLE `avo_voluntarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=497;

--
-- AUTO_INCREMENT de la tabla `drsu_area`
--
ALTER TABLE `drsu_area`
  MODIFY `sql_area_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `drsu_autoridad`
--
ALTER TABLE `drsu_autoridad`
  MODIFY `sql_autoridad_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `drsu_categoria`
--
ALTER TABLE `drsu_categoria`
  MODIFY `sql_categoria_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `drsu_estado`
--
ALTER TABLE `drsu_estado`
  MODIFY `sql_estado_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `drsu_nosotros`
--
ALTER TABLE `drsu_nosotros`
  MODIFY `sql_nosotros_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `drsu_noticia`
--
ALTER TABLE `drsu_noticia`
  MODIFY `sql_noticia_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `drsu_rol`
--
ALTER TABLE `drsu_rol`
  MODIFY `sql_rol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `drsu_usuario`
--
ALTER TABLE `drsu_usuario`
  MODIFY `sql_usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `drsu_autoridad`
--
ALTER TABLE `drsu_autoridad`
  ADD CONSTRAINT `drsu_autoridad_ibfk_1` FOREIGN KEY (`sql_autoridad_area_id`) REFERENCES `drsu_area` (`sql_area_id`) ON UPDATE CASCADE;


--
-- Filtros para la tabla `drsu_nosotros`
--
ALTER TABLE `drsu_nosotros`
  ADD CONSTRAINT `drsu_nosotros_ibfk_1` FOREIGN KEY (`sql_nosotros_categoria_id`) REFERENCES `drsu_categoria` (`sql_categoria_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `drsu_noticia`
--
ALTER TABLE `drsu_noticia`
  ADD CONSTRAINT `drsu_noticia_ibfk_1` FOREIGN KEY (`sql_noticia_area_id`) REFERENCES `drsu_area` (`sql_area_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `drsu_noticia_ibfk_2` FOREIGN KEY (`sql_noticia_estado_id`) REFERENCES `drsu_estado` (`sql_estado_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `drsu_usuario`
--
ALTER TABLE `drsu_usuario`
  ADD CONSTRAINT `drsu_usuario_ibfk_1` FOREIGN KEY (`sql_usuario_rol_id`) REFERENCES `drsu_rol` (`sql_rol_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
