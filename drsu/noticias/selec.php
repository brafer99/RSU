<?php require('../drsu_template/header.php');?>
<?php 
$var_noticia_id = (isset($_POST['noticia_id']))?$_POST['noticia_id']:"";
$var_noticia_titulo = (isset($_POST['noticia_titulo']))?$_POST['noticia_titulo']:"";
$var_noticia_imagen = (isset($_FILES['noticia_imagen']['name'])) ? $_FILES['noticia_imagen']['name'] :"";
$var_noticia_fecha = (isset($_POST['noticia_fecha']))?$_POST['noticia_fecha']:"";
$var_noticia_hora = (isset($_POST['noticia_hora']))?$_POST['noticia_hora']:"";
$var_noticia_enlace = (isset($_POST['noticia_enlace']))?$_POST['noticia_enlace']:"";
$var_noticia_graba = (isset($_POST['noticia_graba']))?$_POST['noticia_graba']:"";
$var_noticia_lugar = (isset($_POST['noticia_lugar']))?$_POST['noticia_lugar']:"";
$var_noticia_descripcion = (isset($_POST['noticia_descripcion']))?$_POST['noticia_descripcion']:"";
$var_noticia_area_id = (isset($_POST['noticia_area_id']))?$_POST['noticia_area_id']:"";
$var_noticia_estado_id = (isset($_POST['noticia_estado_id']))?$_POST['noticia_estado_id']:"";
$var_accion = (isset($_POST['accion']))?$_POST['accion']:"";

    if($var_accion=="Seleccionar"){
        $sentencia_sql= $conexion->prepare("SELECT 
        drsu_noticia.sql_noticia_id, 
        drsu_noticia.sql_noticia_titulo, 
        drsu_noticia.sql_noticia_imagen, 
        drsu_noticia.sql_noticia_fecha, 
        drsu_noticia.sql_noticia_hora, 
        drsu_noticia.sql_noticia_enlace,
        drsu_noticia.sql_noticia_graba,
        drsu_noticia.sql_noticia_descripcion, 
        drsu_noticia.sql_noticia_lugar,
        drsu_noticia.sql_noticia_area_id,
        drsu_area.sql_area_sigla,  
        drsu_noticia.sql_noticia_estado_id, 
        drsu_estado.sql_estado_nombre 
        FROM drsu_noticia 
        JOIN drsu_area ON drsu_noticia.sql_noticia_area_id=drsu_area.sql_area_id 
        JOIN drsu_estado ON drsu_noticia.sql_noticia_estado_id=drsu_estado.sql_estado_id 
        WHERE sql_noticia_id=:param_noticia_id;");
        
        $sentencia_sql->bindParam(':param_noticia_id',$var_noticia_id);
        $sentencia_sql->execute();

        $noticia = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        $var_noticia_titulo=$noticia['sql_noticia_titulo'];
        $var_noticia_imagen=$noticia['sql_noticia_imagen'];
        $var_noticia_fecha=$noticia['sql_noticia_fecha'];
        $var_noticia_hora=$noticia['sql_noticia_hora'];
        $var_noticia_enlace=$noticia['sql_noticia_enlace'];
        $var_noticia_graba=$noticia['sql_noticia_graba'];

        $var_noticia_descripcion=$noticia['sql_noticia_descripcion'];
        $var_noticia_lugar=$noticia['sql_noticia_lugar'];
    
        $var_noticia_area_id_2=$noticia['sql_noticia_area_id'];
        $var_area_sigla=$noticia['sql_area_sigla'];
        
        $var_noticia_estado_id_2=$noticia['sql_noticia_estado_id'];
        $var_estado_nombre=$noticia['sql_estado_nombre']; 
    }
$sentencia_sql= $conexion->prepare("SELECT 
    drsu_noticia.sql_noticia_id, 
    drsu_noticia.sql_noticia_titulo, 
    drsu_noticia.sql_noticia_imagen, 
    drsu_noticia.sql_noticia_fecha, 
    drsu_noticia.sql_noticia_hora, 
    drsu_noticia.sql_noticia_enlace,
    drsu_noticia.sql_noticia_graba,
    drsu_noticia.sql_noticia_descripcion,
    drsu_noticia.sql_noticia_lugar,
    drsu_noticia.sql_noticia_area_id,
    drsu_area.sql_area_sigla,  
    drsu_noticia.sql_noticia_estado_id, 
    drsu_estado.sql_estado_nombre 
    FROM drsu_noticia 
    JOIN drsu_area ON drsu_noticia.sql_noticia_area_id=drsu_area.sql_area_id 
    JOIN drsu_estado ON drsu_noticia.sql_noticia_estado_id=drsu_estado.sql_estado_id 
    ORDER BY drsu_noticia.sql_noticia_id DESC;");

$sentencia_sql->execute();
$lista_noticias=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);

if(isset($var_noticia_area_id_2)){
    $sentencia_sql_2= $conexion->prepare("SELECT * FROM drsu_area
    WHERE sql_area_jefatura=1 AND sql_area_id NOT IN ( 
    SELECT sql_area_id FROM drsu_area
    WHERE sql_area_id=:param_area_id)");
    $sentencia_sql_2->bindParam(':param_area_id',$var_noticia_area_id_2);
    $sentencia_sql_2->execute();
    $lista_areas=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);
}else{
    $sentencia_sql_2= $conexion->prepare("SELECT * FROM drsu_area WHERE sql_area_jefatura=1");
    $sentencia_sql_2->execute();
    $lista_areas=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);
}

if(isset($var_noticia_estado_id_2)){
    $sentencia_sql_3= $conexion->prepare("SELECT * FROM drsu_estado
    WHERE sql_estado_id NOT IN ( 
    SELECT sql_estado_id FROM drsu_estado
    WHERE sql_estado_id=:param_estado_id)");
    $sentencia_sql_3->bindParam(':param_estado_id',$var_noticia_estado_id_2);
    $sentencia_sql_3->execute();
    $lista_estados=$sentencia_sql_3->fetchAll(PDO::FETCH_ASSOC);
}else{
    $sentencia_sql_3= $conexion->prepare("SELECT * FROM drsu_estado");
    $sentencia_sql_3->execute();
    $lista_estados=$sentencia_sql_3->fetchAll(PDO::FETCH_ASSOC);  
} 
?>
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <br/><br/>
                <h2>Modificar Noticia</h2>
            </div>
            <?php require('formulario.php');?>
        </div>
    </section>
<?php
require('../drsu_template/footer.php');
?>