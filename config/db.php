<?php
session_start();


//AQUÍ CAMBIAR DATOS DE SERVIDOR////

$host="localhost";
$base_datos="rsu";
$usuario="root";
$contrasenia="";

//////////////////////////////

try {
    $conexion=new PDO("mysql:host=$host;dbname=$base_datos",$usuario,$contrasenia);
    if($conexion){
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>