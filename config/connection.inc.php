<?php
session_start();


//AQUÍ CAMBIAR DATOS DE SERVIDOR////

$host="localhost";
$base_datos="rsu";
$usuario="root";
$contrasenia="";

//////////////////////////////

$con = mysqli_connect($host,$usuario,$contrasenia,$base_datos);
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/DRSU/avo/');
define('SITE_PATH','http://127.0.0.1/DRSU/avo/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'./source/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'source/media/product/');
?>
