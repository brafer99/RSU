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

    if($var_accion=="Borrar"){
        //Preparamos la sentencia sql con INSERT INTO y datos de la base de datos:
        $sentencia_sql = $conexion->prepare("SELECT sql_noticia_imagen FROM drsu_noticia WHERE sql_noticia_id=:param_noticia_id;");
        $sentencia_sql->bindParam(':param_noticia_id',$var_noticia_id);
        $sentencia_sql->execute();
        $noticia = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        if(isset($noticia["sql_noticia_imagen"]) && ($noticia["sql_noticia_imagen"]!="imagen.jpg")){
            if(file_exists("../assets/img/noticias/".$noticia["sql_noticia_imagen"])){
                unlink("../assets/img/noticias/".$noticia["sql_noticia_imagen"]);
            }
        }
        //FIN borrado de imagen...

        //Borrado de datos en BD mediante DELETE y id:
        $sentencia_sql = $conexion->prepare("DELETE FROM drsu_noticia WHERE sql_noticia_id=:param_noticia_id;");
        $sentencia_sql->bindParam(':param_noticia_id',$var_noticia_id);
        $sentencia_sql->execute();
        //echo "Presionado Boton Borrar";
        //header("Location:productos.php");
        echo "<script>location.href='noticia.php';</script>";
    }
?>