<?php require('../drsu_template/header.php');?>
<?php 
$var_noticia_id = (isset($_POST['noticia_id']))?$_POST['noticia_id']:"";
$var_noticia_titulo = (isset($_POST['noticia_titulo']))?$_POST['noticia_titulo']:"";
$var_noticia_imagen = (isset($_FILES['noticia_imagen']['name'])) ? $_FILES['noticia_imagen']['name'] :"";
$var_noticia_fecha = (isset($_POST['noticia_fecha']))?$_POST['noticia_fecha']:"";
$var_noticia_hora = (isset($_POST['noticia_hora']))?$_POST['noticia_hora']:"";
$var_noticia_enlace = (isset($_POST['noticia_enlace']))?$_POST['noticia_enlace']:"";
$var_noticia_lugar = (isset($_POST['noticia_lugar']))?$_POST['noticia_lugar']:"";
$var_noticia_descripcion = (isset($_POST['noticia_descripcion']))?$_POST['noticia_descripcion']:"";
$var_noticia_area_id = (isset($_POST['noticia_area_id']))?$_POST['noticia_area_id']:"";
$var_noticia_estado_id = (isset($_POST['noticia_estado_id']))?$_POST['noticia_estado_id']:"";

$var_accion = (isset($_POST['accion']))?$_POST['accion']:"";

    if($var_accion=="Modificar"){
        //Preparamos la sentencia sql con INSERT INTO y datos de la base de datos:
       //Actualizacion mediante UPDATE y datos de la base de datos:
        $sentencia_sql= $conexion->prepare("UPDATE aep_noticia SET
            sql_noticia_titulo=:param_noticia_titulo,
           
            sql_noticia_fecha=:param_noticia_fecha,
            sql_noticia_hora=:param_noticia_hora,
            sql_noticia_enlace=:param_noticia_enlace,
            sql_noticia_descripcion=:param_noticia_descripcion,
            sql_noticia_lugar=:param_noticia_lugar,
            sql_noticia_area_id=:param_noticia_area_id,
            sql_noticia_estado_id=:param_noticia_estado_id
            WHERE 
            sql_noticia_id=:param_noticia_id;"); 

        $sentencia_sql->bindParam(':param_noticia_id',$var_noticia_id);
        $sentencia_sql->bindParam(':param_noticia_titulo',$var_noticia_titulo);
        $sentencia_sql->bindParam(':param_noticia_fecha',$var_noticia_fecha);
        $sentencia_sql->bindParam(':param_noticia_hora',$var_noticia_hora);
        $sentencia_sql->bindParam(':param_noticia_enlace',$var_noticia_enlace);
        $sentencia_sql->bindParam(':param_noticia_descripcion',$var_noticia_descripcion);
        $sentencia_sql->bindParam(':param_noticia_lugar',$var_noticia_lugar);
        $sentencia_sql->bindParam(':param_noticia_area_id',$var_noticia_area_id);
        $sentencia_sql->bindParam(':param_noticia_estado_id',$var_noticia_estado_id);    
        $sentencia_sql->execute();

        //Modificacion imagen
        if ($var_noticia_imagen!=""){

            //AÑADIMOS EL NUEVO ARCHIVO CON (similar a agregar)
            $fecha=new DateTime();
            $nombre_archivo=($var_noticia_imagen!="") ? $fecha->getTimestamp()."_".$_FILES["noticia_imagen"]['name'] :"imagen.jpg";           
            $temporal_imagen = $_FILES["noticia_imagen"]["tmp_name"];
            move_uploaded_file($temporal_imagen,"../../assets/img/noticias/".$nombre_archivo); 
            
            //ahora eliminamos el FILE (similar a DELETE)
            $sentencia_sql = $conexion->prepare("SELECT sql_noticia_imagen FROM aep_noticia WHERE sql_noticia_id=:param_noticia_id;");
            $sentencia_sql->bindParam(':param_noticia_id',$var_noticia_id);
            $sentencia_sql->execute();
            $noticia = $sentencia_sql->fetch(PDO::FETCH_LAZY);

            if(isset($noticia["sql_noticia_imagen"]) && ($noticia["sql_noticia_imagen"]!="imagen.jpg")){
                if(file_exists("../../assets/img/noticias/".$noticia["sql_noticia_imagen"])){
                    unlink("../../assets/img/noticias/".$noticia["sql_noticia_imagen"]);
                }
            }        
            //ACTUALIZAMOS LOS NUEVOS PARAMETROS
            $sentencia_sql = $conexion->prepare("UPDATE aep_noticia SET sql_noticia_imagen=:param_noticia_imagen  WHERE sql_noticia_id=:param_noticia_id;");
            //IGUAL QUE EN agregar, utilizamos la varibale modificada $nombre_archivo...
            $sentencia_sql->bindParam(':param_noticia_imagen',$nombre_archivo);
            $sentencia_sql->bindParam(':param_noticia_id',$var_noticia_id);
            $sentencia_sql->execute();
        }
        //fin modificacion imagen

        header("Location:noticia.php");  
    }
?>