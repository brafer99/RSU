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

CREATE TABLE areas(
    sql_areas_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sql_areas_nombre VARCHAR(500) NOT NULL,
    sql_areas_sigla VARCHAR(50) NOT NULL
);

/*tablas de Brafer*/


/*tablas de Piero*/


/*tablas de Walter*/



/*-------------SECCION DE REGISTROS-------------*/

/*registros Publicos*/
INSERT INTO areas(sql_areas_nombre,sql_areas_sigla) VALUES
    ('Área de Extensión y Proyeción Cultural','AEP'),
    ('Área de Programas de Voluntariado Basadrino y Vinculación con Grupos de Interés','AVO'),
    ('Área de Extensión Univesitaria, Proyección Social y Servicio Social','AES'),
    ('Área de Coordinación de la RSU en la Investigación y Formación Continua','ACI');

/*registros de Brafer*/


/*registros de Piero*/


/*registros de Walter*/