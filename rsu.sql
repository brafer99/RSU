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

CREATE TABLE drsu_rol(
	sql_rol_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_rol_nombre VARCHAR(20) UNIQUE NOT NULL
);

CREATE TABLE drsu_usuario(
	sql_usuario_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_usuario_email VARCHAR(100) UNIQUE NOT NULL,
	sql_usuario_pass VARCHAR(100) NOT NULL,
    sql_usuario_rol_id INTEGER UNSIGNED NOT NULL,
	FOREIGN KEY (sql_usuario_rol_id) REFERENCES drsu_rol(sql_rol_id) 
		ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE drsu_area(
    sql_area_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_area_nombre VARCHAR(250) NOT NULL,
    sql_area_sigla VARCHAR(20) NOT NULL
);

CREATE TABLE drsu_estado(
    sql_estado_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_estado_nombre VARCHAR(250) NOT NULL,
    sql_estado_sigla VARCHAR(20) NOT NULL
);

CREATE TABLE drsu_noticia(
	sql_noticia_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	sql_noticia_titulo TEXT NOT NULL,
    sql_noticia_imagen VARCHAR(250) NOT NULL,
    sql_noticia_descripcion TEXT NULL,
	sql_noticia_fecha VARCHAR(200) NULL,
	sql_noticia_hora VARCHAR(200) NULL,
    sql_noticia_enlace VARCHAR(200) NULL,
    sql_noticia_lugar VARCHAR(200) NULL,
	sql_noticia_area_id INTEGER UNSIGNED NOT NULL,
    sql_noticia_estado_id INTEGER UNSIGNED NOT NULL,

	FOREIGN KEY (sql_noticia_area_id) REFERENCES drsu_area(sql_area_id) 
		ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY (sql_noticia_estado_id) REFERENCES drsu_estado(sql_estado_id) 
		ON DELETE RESTRICT ON UPDATE CASCADE
);



/*tablas de Piero*/


/*tablas de Walter*/



/*-------------SECCION DE REGISTROS-------------*/

/*registros Publicos*/

/*registros de Brafer*/
INSERT INTO drsu_rol(sql_rol_nombre) VALUES
    ('Administrador'),
    ('Usuario');

INSERT INTO drsu_usuario(sql_usuario_email,sql_usuario_pass,sql_usuario_rol_id) VALUES
    ('sistema@gmail.com','$2y$10$NY0eD.NBCsMzTKvRi3xTpOnk8kWrh4STjUhl6DzoVtUnJS1uoAHDS',1);



INSERT INTO drsu_area(sql_area_nombre,sql_area_sigla) VALUES
    ('Dirección Académica de Responsabilidad Social Universitaria','DRSU'),
    ('Área de Extensión y Proyeción Cultural','AEP'),
    ('Área de Programas de Voluntariado Basadrino y Vinculación con Grupos de Interés','AVO'),
    ('Área de Extensión Univesitaria, Proyección Social y Servicio Social','AES'),
    ('Área de Coordinación de la RSU en la Investigación y Formación Continua','ACI');

INSERT INTO drsu_estado(sql_estado_nombre) VALUES
    ('En proceso'),
    ('Finalizado');

INSERT INTO drsu_noticia(sql_noticia_titulo,sql_noticia_imagen,sql_noticia_fecha,sql_noticia_hora,sql_noticia_enlace,sql_noticia_area_id,sql_noticia_estado_id) VALUES
    ('Estado Situacional del Covid en la region Tacna y vacunación','1636913727_noticia1.jpg','03 de Septiembre de 2021','19:00 horas','https://www.google.com/',2,2),
    ('La voz Basadrina','1636918900_noticia2.jpg','20 de Agosto de 2020','12:00 horas','https://www.youtube.com/',2,1),
    ('XX Juegos Florales Basadrinos 2021','1636918983_noticia3.png','07 y 08 de Octubre de 2020','15:00 horas','https://www.google.com/',3,1);

/*registros de Piero*/


/*registros de Walter*/