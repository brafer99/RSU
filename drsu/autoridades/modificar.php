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

    if($var_accion=="Modificar"){
        //Actualizacion mediante UPDATE y datos de la base de datos:
        $sentencia_sql= $conexion->prepare("UPDATE drsu_autoridad SET
            sql_autoridad_nombre=:param_autoridad_nombre,
            sql_autoridad_email=:param_autoridad_email 
            WHERE sql_autoridad_id=:param_autoridad_id;"); 

        $sentencia_sql->bindParam(':param_autoridad_id',$var_autoridad_id);
        $sentencia_sql->bindParam(':param_autoridad_nombre',$var_autoridad_nombre);
        $sentencia_sql->bindParam(':param_autoridad_email',$var_autoridad_email);
            
        $sentencia_sql->execute();
        //Modificacion imagen
        if ($var_autoridad_imagen!=""){

            //AÑADIMOS EL NUEVO ARCHIVO CON (similar a agregar)
            $fecha=new DateTime();
            $nombre_archivo=($var_autoridad_imagen!="") ? $fecha->getTimestamp()."_".$_FILES["autoridad_imagen"]['name'] :"imagen.jpg";           
            $temporal_imagen = $_FILES["autoridad_imagen"]["tmp_name"];
            move_uploaded_file($temporal_imagen,"../assets/img/autoridades/".$nombre_archivo); 
            
            //ahora eliminamos el FILE (similar a DELETE)
            $sentencia_sql = $conexion->prepare("SELECT sql_autoridad_imagen FROM drsu_autoridad WHERE sql_autoridad_id=:param_autoridad_id;");
            $sentencia_sql->bindParam(':param_autoridad_id',$var_autoridad_id);
            $sentencia_sql->execute();
            $autoridad = $sentencia_sql->fetch(PDO::FETCH_LAZY);

            if(isset($autoridad["sql_autoridad_imagen"]) && ($autoridad["sql_autoridad_imagen"]!="imagen.jpg")){
                if(file_exists("../assets/img/autoridades/".$autoridad["sql_autoridad_imagen"])){
                    unlink("../assets/img/autoridades/".$autoridad["sql_autoridad_imagen"]);
                }
            }        
            $sentencia_sql = $conexion->prepare("UPDATE drsu_autoridad SET sql_autoridad_imagen=:param_autoridad_imagen  WHERE sql_autoridad_id=:param_autoridad_id;");
            //IGUAL QUE EN agregar, utilizamos la varibale modificada $nombre_archivo...
            $sentencia_sql->bindParam(':param_autoridad_imagen',$nombre_archivo);
            $sentencia_sql->bindParam(':param_autoridad_id',$var_autoridad_id);
            $sentencia_sql->execute();

        }
        $var="modificar";
        echo "<script>location.href='autoridad.php?action=".$var."';</script>";   
    }
        
?>

