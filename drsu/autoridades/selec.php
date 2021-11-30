<?php require('../drsu_template/header.php');?>
<?php 

//variables obteniendo varlor POST de formulario:
//datos de tabla
$var_autoridad_id = (isset($_POST['autoridad_id']))?$_POST['autoridad_id']:"";
$var_autoridad_nombre = (isset($_POST['autoridad_nombre']))?$_POST['autoridad_nombre']:"";
$var_autoridad_email = (isset($_POST['autoridad_email']))?$_POST['autoridad_email']:"";
$var_autoridad_imagen = (isset($_FILES['autoridad_imagen']['name'])) ? $_FILES['autoridad_imagen']['name'] :"";
$var_autoridad_area_id = (isset($_POST['autoridad_area_id']))?$_POST['autoridad_area_id']:"";


//opciones de tabla
$var_accion = (isset($_POST['accion']))?$_POST['accion']:"";

    if($var_accion=="Seleccionar"){
        $sentencia_sql= $conexion->prepare("SELECT 
        drsu_autoridad.sql_autoridad_id, 
        drsu_autoridad.sql_autoridad_nombre, 
        drsu_autoridad.sql_autoridad_email, 
        drsu_autoridad.sql_autoridad_imagen, 
        drsu_autoridad.sql_autoridad_area_id,
        drsu_area.sql_area_nombre
        FROM drsu_autoridad 
        JOIN drsu_area ON drsu_autoridad.sql_autoridad_area_id=drsu_area.sql_area_id 
        WHERE sql_autoridad_id=:param_autoridad_id;");

        $validacion=true;
        $sentencia_sql->bindParam(':param_autoridad_id',$var_autoridad_id);
        $sentencia_sql->execute();
        $autoridad = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        $var_autoridad_nombre=$autoridad['sql_autoridad_nombre'];
        $var_autoridad_imagen=$autoridad['sql_autoridad_imagen'];
        $var_autoridad_email=$autoridad['sql_autoridad_email'];
        $var_autoridad_area_id_2=$autoridad['sql_autoridad_area_id'];
        $var_area_nombre=$autoridad['sql_area_nombre'];  
    }
$sentencia_sql= $conexion->prepare("SELECT 
    drsu_autoridad.sql_autoridad_id, 
    drsu_autoridad.sql_autoridad_nombre, 
    drsu_autoridad.sql_autoridad_imagen, 
    drsu_autoridad.sql_autoridad_email, 
    drsu_autoridad.sql_autoridad_area_id,
    drsu_area.sql_area_nombre  
    FROM drsu_autoridad 
    JOIN drsu_area ON drsu_autoridad.sql_autoridad_area_id=drsu_area.sql_area_id 
    ORDER BY drsu_autoridad.sql_autoridad_id ASC;");

$sentencia_sql->execute();
$lista_autoridades=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
$sentencia_sql_2= $conexion->prepare("SELECT * FROM drsu_area");
$sentencia_sql_2->execute();
$lista_areas=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);

?> 
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <br/><br/>
                <h2>Modificar Autoridad</h2>
            </div>
            <?php require('formulario.php');?>
        </div>
    </section><!-- End Contact Section -->
<?php
require('../drsu_template/footer.php');
?>

