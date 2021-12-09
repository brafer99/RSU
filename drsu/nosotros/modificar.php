<?php require('../drsu_template/header.php');?>
<?php 
$var_nosotros_id = (isset($_POST['nosotros_id']))?$_POST['nosotros_id']:"";
$var_nosotros_titulo = (isset($_POST['nosotros_titulo']))?$_POST['nosotros_titulo']:"";
$var_nosotros_descripcion = (isset($_POST['nosotros_descripcion']))?$_POST['nosotros_descripcion']:"";
$var_nosotros_imagen = (isset($_FILES['nosotros_imagen']['name'])) ? $_FILES['nosotros_imagen']['name'] :"";
$var_nosotros_pdf = (isset($_FILES['nosotros_pdf']['name'])) ? $_FILES['nosotros_pdf']['name'] :"";
$var_nosotros_categoria_id = (isset($_POST['nosotros_categoria_id']))?$_POST['nosotros_categoria_id']:"";
//opciones de tabla
$var_accion = (isset($_POST['accion']))?$_POST['accion']:"";

if($var_accion=="Modificar"){
        //Actualizacion mediante UPDATE y datos de la base de datos:
        $sentencia_sql= $conexion->prepare("UPDATE drsu_nosotros SET
        sql_nosotros_titulo=:param_nosotros_titulo,
        sql_nosotros_descripcion=:param_nosotros_descripcion
        WHERE sql_nosotros_id=:param_nosotros_id;"); 

        $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
        $sentencia_sql->bindParam(':param_nosotros_titulo',$var_nosotros_titulo);
        $sentencia_sql->bindParam(':param_nosotros_descripcion',$var_nosotros_descripcion);   
        $sentencia_sql->execute();
        //Modificacion imagen
        if ($var_nosotros_imagen!=""){

            //AÑADIMOS EL NUEVO ARCHIVO CON (similar a agregar)
            $fecha=new DateTime();
            $nombre_archivo=($var_nosotros_imagen!="") ? $fecha->getTimestamp()."_".$_FILES["nosotros_imagen"]['name'] :"imagen.jpg";           
            $temporal_imagen = $_FILES["nosotros_imagen"]["tmp_name"];
            move_uploaded_file($temporal_imagen,"../../assets/img/nosotros/".$nombre_archivo); 
            
            //ahora eliminamos el FILE (similar a DELETE)
            $sentencia_sql = $conexion->prepare("SELECT sql_nosotros_imagen FROM drsu_nosotros WHERE sql_nosotros_id=:param_nosotros_id;");
            $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
            $sentencia_sql->execute();
            $nosotros = $sentencia_sql->fetch(PDO::FETCH_LAZY);

            if(isset($nosotros["sql_nosotros_imagen"]) && ($nosotros["sql_nosotros_imagen"]!="imagen.jpg")){
                if(file_exists("../../assets/img/nosotros/".$nosotros["sql_nosotros_imagen"])){
                    unlink("../../assets/img/nosotros/".$nosotros["sql_nosotros_imagen"]);
                }
            }        

            //ACTUALIZAMOS LOS NUEVOS PARAMETROS
            $sentencia_sql = $conexion->prepare("UPDATE drsu_nosotros SET sql_nosotros_imagen=:param_nosotros_imagen  WHERE sql_nosotros_id=:param_nosotros_id;");
            //IGUAL QUE EN agregar, utilizamos la varibale modificada $nombre_archivo...
            $sentencia_sql->bindParam(':param_nosotros_imagen',$nombre_archivo);
            $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
            $sentencia_sql->execute();
            
        }

        if ($var_nosotros_pdf!=""){

            //AÑADIMOS EL NUEVO ARCHIVO CON (similar a agregar)
            $fecha=new DateTime();
            $nombre_pdf=($var_nosotros_pdf!="") ? $fecha->getTimestamp()."_".$_FILES["nosotros_pdf"]['name'] :"imagen.jpg";           
            $temporal_pdf = $_FILES["nosotros_pdf"]["tmp_name"];
            move_uploaded_file($temporal_pdf,"../../assets/pdfs/".$nombre_pdf); 
            
            //ahora eliminamos el FILE (similar a DELETE)
            $sentencia_sql = $conexion->prepare("SELECT sql_nosotros_pdf FROM drsu_nosotros WHERE sql_nosotros_id=:param_nosotros_id;");
            $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
            $sentencia_sql->execute();
            $nosotros = $sentencia_sql->fetch(PDO::FETCH_LAZY);

            if(isset($nosotros["sql_nosotros_pdf"]) && ($nosotros["sql_nosotros_pdf"]!="imagen.jpg")){
                if(file_exists("../../assets/pdfs/".$nosotros["sql_nosotros_pdf"])){
                    unlink("../../assets/pdfs/".$nosotros["sql_nosotros_pdf"]);
                }
            }        

            //ACTUALIZAMOS LOS NUEVOS PARAMETROS
            $sentencia_sql = $conexion->prepare("UPDATE drsu_nosotros SET sql_nosotros_pdf=:param_nosotros_pdf  WHERE sql_nosotros_id=:param_nosotros_id;");
            //IGUAL QUE EN agregar, utilizamos la varibale modificada $nombre_archivo...
            $sentencia_sql->bindParam(':param_nosotros_pdf',$nombre_pdf);
            $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
            $sentencia_sql->execute();  
        }  
}      
        $var="modificar";
        echo "<script>location.href='nosotros.php?action=".$var."';</script>";   

?>