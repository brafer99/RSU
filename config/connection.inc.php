<?php
session_start();
//AQUÍ CAMBIAR DATOS DE SERVIDOR////

$host="localhost";
$base_datos="drsu";
$usuario="root";
$contrasenia="";

//////////////////////////////

$con = mysqli_connect($host,$usuario,$contrasenia,$base_datos);
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT']);
define('SITE_PATH','http://drsu.unjbg.edu.pe');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'/avo/source/media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'/avo/source/media/product/');
?>
