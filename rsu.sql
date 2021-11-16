/*NO TOCAR ESTAS 3 LÍNEAS DE CÓDIGO*/
DROP DATABASE IF EXISTS rsu;
CREATE DATABASE IF NOT EXISTS rsu;
USE rsu;
/*SE ELIMINA LA BASE DE DATOS Y SE ACTUALIZA CON LOS DATOS GUARDADOS EN ESTE ARCHIVO*/


/*---------------------------------------------*/
/*---------------------------------------------*/
/*APARTIR DE AQUÍ AÑADIR SUS TABLAS Y REGISTROS*/
/*---------------------------------------------*/
/*---------------------------------------------*/



/*--------------SECCION DE TABLAS--------------*/

/*tablas Publicas*/

/*tablas de Brafer*/

CREATE TABLE rol(
	sql_rol_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_rol_nombre VARCHAR(80) UNIQUE NOT NULL
);

CREATE TABLE usuario(
	sql_usuario_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_usuario_email VARCHAR(80) UNIQUE NOT NULL,
	sql_usuario_pass VARCHAR(100) NOT NULL,
    sql_usuario_rol_id INTEGER UNSIGNED NOT NULL,
	FOREIGN KEY (sql_usuario_rol_id) REFERENCES rol(sql_rol_id) 
		ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE area(
    sql_area_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_area_nombre VARCHAR(500) NOT NULL,
    sql_area_sigla VARCHAR(50) NOT NULL
);

CREATE TABLE estado(
    sql_estado_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_estado_nombre VARCHAR(500) NOT NULL
);

CREATE TABLE noticia(
	sql_noticia_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	sql_noticia_titulo VARCHAR(200) NOT NULL,
    sql_noticia_imagen VARCHAR(200) NOT NULL,
	sql_noticia_fecha VARCHAR(200) NOT NULL,
	sql_noticia_hora VARCHAR(200) NOT NULL,
    sql_noticia_enlace VARCHAR(500) NOT NULL,

	sql_noticia_area_id INTEGER UNSIGNED NOT NULL,
    sql_noticia_estado_id INTEGER UNSIGNED NOT NULL,

	FOREIGN KEY (sql_noticia_area_id) REFERENCES area(sql_area_id) 
		ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY (sql_noticia_estado_id) REFERENCES estado(sql_estado_id) 
		ON DELETE RESTRICT ON UPDATE CASCADE
);



/*tablas de Piero*/

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
(6, 1, 'CIENCIAS DE LA NATURALEZA Y PROMOCIÓN EDUCATIVA AMBIENTAL', 'NATA'),
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
(35, 8, 'ADMINISTRATIVOS', 'ADM');

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
  `id_escuela` int(2) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` int(8) NOT NULL,
  `fecha_nac` date NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `avo_voluntarios`
--

INSERT INTO `avo_voluntarios` (`id`, `id_escuela`, `nombres`, `apellidos`, `dni`, `fecha_nac`, `celular`, `email`, `tipo`) VALUES
(1, 35, 'Jose Luis', 'Copari Yupanqui', 41886073, '1983-07-15', '952527959', 'josecopari@hotmail.com', 3),
(2, 25, 'Dennys', 'Sihuayro Larico', 45775992, '1989-06-17', '901163722', 'dsihuayrol@unjbg.edu.pe', 2),
(3, 35, 'Carmen Noemí', 'Rios Adrianzen', 410407, '1960-04-02', '969726090', 'crios@unjbg.edu.pe', 3),
(4, 14, 'Jackeline Rosemary', 'Flores Flores', 493579, '1972-04-23', '952967131', 'jrflores@unjbg.edu.pe', 2),
(5, 35, 'Alberto Miguel', 'Palacios Morales', 484192, '1966-04-15', '952990302', 'hindualberto55@gmail.com', 3),
(6, 15, 'Manuel Enrique', 'Atahualpa Alarico', 41548577, '1982-06-15', '952915736', 'matahualpaa@unjbg.esu.pe', 2),
(7, 35, 'Yesica marlene', 'Machaca tarqui', 42626918, '1984-10-01', '999014153', 'marle_143@hotmail.com', 3),
(8, 35, 'Anacelly', 'Valera López', 33265759, '1976-10-17', '942417385', 'avaleral@unjbg.edu.pe', 3),
(9, 35, 'Betty Maribel', 'Mamani Huarcaya', 40118218, '1978-07-19', '952844797', 'bmamanih@unjbg.edu.pe', 3),
(10, 14, 'Marleni Mary', 'Ayma Jiménez', 521649, '1977-12-16', '981797835', 'maymaj@unjbg.edu.pe', 2),
(11, 29, 'Miguel Alexis', 'Piaggo Canivillo', 794759, '1975-12-04', '952304006', 'mpiaggoc@unjbg.edu.pe', 2),
(12, 3, 'Ruthy Merla', 'Pilco Velasquez', 499664, '1971-02-11', '952296679', 'rmpilcov@unjbg.edu', 2),
(13, 5, 'Lourdes Susana del Carmen', 'Fernández Barahona', 516609, '1978-03-27', '952396097', 'lfernandezb@unjbg.edu.pe', 2),
(14, 32, 'Sara America', 'Mercado Rodriguez', 23921334, '1971-10-12', '952710143', 'smercador@unjbg.edu.pe', 2),
(15, 33, 'Gloria Marina', 'Choque Machaca', 41031766, '1981-09-07', '951692897', 'gchoquem@unjbg.edu.pe', 2);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avo_escuela`
--
ALTER TABLE `avo_escuela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;


/*tablas de Walter*/



/*-------------SECCION DE REGISTROS-------------*/

/*registros Publicos*/

/*registros de Brafer*/
INSERT INTO rol(sql_rol_nombre) VALUES
    ('Administrador'),
    ('Usuario');

INSERT INTO usuario(sql_usuario_email,sql_usuario_pass,sql_usuario_rol_id) VALUES
    ('sistema@gmail.com','contraseña',1),
    ('usuario@gmail.com','contraseña',2);


INSERT INTO area(sql_area_nombre,sql_area_sigla) VALUES
    ('Dirección Académica de Responsabilidad Social Universitaria','DRSU'),
    ('Área de Extensión y Proyeción Cultural','AEP'),
    ('Área de Programas de Voluntariado Basadrino y Vinculación con Grupos de Interés','AVO'),
    ('Área de Extensión Univesitaria, Proyección Social y Servicio Social','AES'),
    ('Área de Coordinación de la RSU en la Investigación y Formación Continua','ACI');

INSERT INTO estado(sql_estado_nombre) VALUES
    ('En proceso'),
    ('Finalizado');

INSERT INTO noticia(sql_noticia_titulo,sql_noticia_imagen,sql_noticia_fecha,sql_noticia_hora,sql_noticia_enlace,sql_noticia_area_id,sql_noticia_estado_id) VALUES
    ('Estado Situacional del Covid en la region Tacna y vacunación','1636913727_noticia1.jpg','03 de Septiembre de 2021','19:00 horas','https://www.google.com/',2,2),
    ('La voz Basadrina','1636918900_noticia2.jpg','20 de Agosto de 2020','12:00 horas','https://www.youtube.com/',2,1),
    ('XX Juegos Florales Basadrinos 2021','1636918983_noticia3.png','07 y 08 de Octubre de 2020','15:00 horas','https://www.google.com/',3,1);

/*registros de Piero*/


/*registros de Walter*/