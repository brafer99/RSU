<?php require('./drsu_template/header.php');?>

<?php 

//variables obteniendo varlor POST de formulario:
//datos de tabla
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

//opciones de tabla
$var_accion = (isset($_POST['accion']))?$_POST['accion']:"";


switch($var_accion){
    case "Agregar":
        
        //Preparamos la sentencia sql con INSERT INTO y datos de la base de datos:
        $sentencia_sql= $conexion->prepare("INSERT INTO drsu_noticia (
            sql_noticia_titulo,
            sql_noticia_imagen,
            sql_noticia_fecha,
            sql_noticia_hora,
            sql_noticia_enlace,
            sql_noticia_descripcion,
            sql_noticia_lugar,
            sql_noticia_area_id,
            sql_noticia_estado_id) 
            VALUES (
            :param_noticia_titulo,
            :param_noticia_imagen,
            :param_noticia_fecha,
            :param_noticia_hora,
            :param_noticia_enlace,
            :param_noticia_descripcion,
            :param_noticia_lugar,
            :param_noticia_area_id,
            :param_noticia_estado_id );");

        //Mediante bindParam relacionamos los parametros y las variables con contenido POST:
        $sentencia_sql->bindParam(':param_noticia_titulo',$var_noticia_titulo);
        
        //TRATAMIENTO DE IMAGENES//
        $fecha=new DateTime();
        $nombre_archivo=($var_noticia_imagen!="") ? $fecha->getTimestamp()."_".$_FILES["noticia_imagen"]['name'] :"imagen.jpg";
        $temporal_imagen = $_FILES["noticia_imagen"]["tmp_name"];
        if($temporal_imagen!=""){move_uploaded_file($temporal_imagen,"../assets/img/noticias/".$nombre_archivo);}

        //Demas parametros:
        $sentencia_sql->bindParam(':param_noticia_imagen',$nombre_archivo);
        $sentencia_sql->bindParam(':param_noticia_fecha',$var_noticia_fecha);
        $sentencia_sql->bindParam(':param_noticia_hora',$var_noticia_hora);
        $sentencia_sql->bindParam(':param_noticia_enlace',$var_noticia_enlace);
        $sentencia_sql->bindParam(':param_noticia_descripcion',$var_noticia_descripcion);
        $sentencia_sql->bindParam(':param_noticia_lugar',$var_noticia_lugar);
        $sentencia_sql->bindParam(':param_noticia_area_id',$var_noticia_area_id);
        $sentencia_sql->bindParam(':param_noticia_estado_id',$var_noticia_estado_id);

        //Ejecutamos:
        $sentencia_sql->execute();


        header("Location:noticia.php");
        break;

    case "Modificar":

        //Actualizacion mediante UPDATE y datos de la base de datos:
        $sentencia_sql= $conexion->prepare("UPDATE drsu_noticia SET
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
            move_uploaded_file($temporal_imagen,"../assets/img/noticias/".$nombre_archivo); 
            
            //ahora eliminamos el FILE (similar a DELETE)
            $sentencia_sql = $conexion->prepare("SELECT sql_noticia_imagen FROM drsu_noticia WHERE sql_noticia_id=:param_noticia_id;");
            $sentencia_sql->bindParam(':param_noticia_id',$var_noticia_id);
            $sentencia_sql->execute();
            $noticia = $sentencia_sql->fetch(PDO::FETCH_LAZY);

            if(isset($noticia["sql_noticia_imagen"]) && ($noticia["sql_noticia_imagen"]!="imagen.jpg")){
                if(file_exists("../assets/img/noticias/".$noticia["sql_noticia_imagen"])){
                    unlink("../assets/img/noticias/".$noticia["sql_noticia_imagen"]);
                }
            }        

            //ACTUALIZAMOS LOS NUEVOS PARAMETROS
            $sentencia_sql = $conexion->prepare("UPDATE drsu_noticia SET sql_noticia_imagen=:param_noticia_imagen  WHERE sql_noticia_id=:param_noticia_id;");
            //IGUAL QUE EN agregar, utilizamos la varibale modificada $nombre_archivo...
            $sentencia_sql->bindParam(':param_noticia_imagen',$nombre_archivo);
            $sentencia_sql->bindParam(':param_noticia_id',$var_noticia_id);
            $sentencia_sql->execute();
        }
        //fin modificacion imagen

        header("Location:noticia.php");    
        break;


    case "Borrar":

        //Borrado de imagenes de /img...
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
        header("Location:noticia.php");
        break;

    case "Seleccionar":



        //Seleccionamos informacion mediante INNER JOIN:
        $sentencia_sql= $conexion->prepare("SELECT 
        drsu_noticia.sql_noticia_id, 
        drsu_noticia.sql_noticia_titulo, 
        drsu_noticia.sql_noticia_imagen, 
        drsu_noticia.sql_noticia_fecha, 
        drsu_noticia.sql_noticia_hora, 
        drsu_noticia.sql_noticia_enlace,

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


        //FETCH_LAZY CARGA LOS DATOS UNO A UNO:
        $noticia = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        //rellenamos los imputs
        $var_noticia_titulo=$noticia['sql_noticia_titulo'];
        $var_noticia_imagen=$noticia['sql_noticia_imagen'];
        $var_noticia_fecha=$noticia['sql_noticia_fecha'];
        $var_noticia_hora=$noticia['sql_noticia_hora'];
        $var_noticia_enlace=$noticia['sql_noticia_enlace'];

        $var_noticia_descripcion=$noticia['sql_noticia_descripcion'];
        $var_noticia_lugar=$noticia['sql_noticia_lugar'];
    
        //boton select de area:
        $var_noticia_area_id_2=$noticia['sql_noticia_area_id'];
        $var_area_sigla=$noticia['sql_area_sigla'];
        
        //boton select de estado
        $var_noticia_estado_id_2=$noticia['sql_noticia_estado_id'];
        $var_estado_nombre=$noticia['sql_estado_nombre'];

        break;
    case "Cancelar":
         header("Location:noticia.php");


}
$sentencia_sql= $conexion->prepare("SELECT 
    drsu_noticia.sql_noticia_id, 
    drsu_noticia.sql_noticia_titulo, 
    drsu_noticia.sql_noticia_imagen, 
    drsu_noticia.sql_noticia_fecha, 
    drsu_noticia.sql_noticia_hora, 
    drsu_noticia.sql_noticia_enlace,
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

    <!-- ======= Team Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Adiministrar Noticias</h2>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box2"> 

                                <h3>Agregar nueva Noticia</h3>


                                <form method="POST" enctype="multipart/form-data" role="form">
                                <div class = "form-group">
                                    <input type="hidden" required readonly class="form-control"  value="<?php echo $var_noticia_id; ?>" name="noticia_id" id="noticia_id"  placeholder="ID">
                                </div>



                                <div class = "form-group">
                                    <label for="titulo">Título:</label>
                                    <textarea class="form-control" name="noticia_titulo" rows="5" placeholder="Ingrese aquí el título"
                                    required><?php echo $var_noticia_titulo; ?></textarea>
                                </div>

                                <!-- Lista con areas: -->
                                <div class = "form-group">

                                </div>
                                <!-- Lista con estado: -->
                                <div class = "form-group">

                                </div>

                                <div class="row">

                                    <div class="col form-group">
                                    <label for="areas">Área:</label>
                                    <select name="noticia_area_id" id="noticia_area_id" required>
                                        <?php if(isset($var_noticia_area_id_2)) { ?>
                                            <option selected="" value="<?php echo $var_noticia_area_id_2; ?>" ><?php echo $var_area_sigla; ?></option> 
                                        <?php } else{?>
                                            <option value="" selected disabled hidden>Selecciona una opción</option> 
                                        <?php }?>
                                        <?php foreach($lista_areas as $area){ ?>
                                            <option value="<?php echo $area['sql_area_id']; ?>"> <?php echo $area['sql_area_sigla']; ?></option> 
                                        <?php } ?>
                                    </select>
                                    </div>                               

                                    <div class="col form-group">
                                    <label for="estado">Estado:</label>
                                    <select name="noticia_estado_id" id="noticia_estado_id" required>
                                        <?php if(isset($var_noticia_estado_id_2)) { ?>
                                            <option selected="" value="<?php echo $var_noticia_estado_id_2; ?>" ><?php echo $var_estado_nombre; ?></option> 
                                        <?php } else{?>
                                            <option value="" selected disabled hidden>Selecciona una opción</option> 
                                        <?php }?>
                                        <?php foreach($lista_estados as $estado){ ?>
                                            <option value="<?php echo $estado['sql_estado_id']; ?>"> <?php echo $estado['sql_estado_nombre']; ?></option> 
                                        <?php } ?>
                                    </select> 
                                    </div>



                                </div>
                                
                         

                                <!-- Imagenes: -->
                                <div class = "form-group">
                                    <label for="noticia_imagen">Imagen:</label><br/> 
                                    <?php if($var_noticia_imagen!=""){ ?>
                                        <img class="img-thumbnail rounded" src="../assets/img/noticias/<?php echo $var_noticia_imagen;?>" width="200" alt="">    
                                    <?php } ?>
                                    <input type="file" class="form-control" name="noticia_imagen" id="noticia_imagen" placeholder="ID">
                                </div>

                                <br/>
                                <h3>Campos Opcionales:</h3>            

                                <div class="row">
                                    <div class="col form-group">
                                        <label for="noticia_fecha">Fecha: (opcional) </label>
                                        <input type="text" class="form-control" value="<?php echo $var_noticia_fecha; ?>" name="noticia_fecha" id="noticia_fecha"  placeholder="Fecha">
                                    </div>

                                    <div class="col form-group">
                                        <label for="noticia_hora">Hora: (opcional)</label>
                                        <input type="text" class="form-control" value="<?php echo $var_noticia_hora; ?>" name="noticia_hora" id="noticia_hora"  placeholder="Hora">
                                    </div>
                                </div>                

                                <div class = "form-group">
                                    <label for="noticia_enlace">Enlace: (opcional)</label>
                                    <input type="text" class="form-control" value="<?php echo $var_noticia_enlace; ?>" name="noticia_enlace" id="noticia_enlace"  placeholder="Hora">
                                </div>

                                <div class = "form-group">
                                    <label for="noticia_lugar">Lugar: (opcional)</label>
                                    <input type="text" class="form-control" value="<?php echo $var_noticia_lugar; ?>" name="noticia_lugar" id="noticia_lugar"  placeholder="Lugar">
                                </div>

                                <div class = "form-group">
                                    <label for="descripcion">Descripción adicional: (opcional)</label>
                                    <textarea class="form-control" name="noticia_descripcion" rows="5" placeholder="Ingrese texto"
                                    ><?php echo $var_noticia_descripcion; ?></textarea>
                                </div>                                

 

                                <div class="btn-group" role="group" aria-label="">
                                    <button type="submit" name="accion" <?php echo ($var_accion=="Seleccionar")? "disabled":""?> value= "Agregar" class="btn btn-success">Agregar</button>
                                    <button type="submit" name="accion" <?php echo ($var_accion!="Seleccionar")? "disabled":""?> value= "Modificar" class="btn btn-warning">Modificar</button>
                                    <a href="noticia.php"><button type="button" class="btn btn-info" ">Cancelar</button></a>
                                </div>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
                <!-- TABLA -->                                    
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">          
                                <h3>Lista de Noticias</h3>
                                <br/>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Imagen</th>
                                            <th>Área</th>
                                            <th>Estado</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($lista_noticias as $noti) { ?>
                                    <tr>
                                        <td><?php echo $noti['sql_noticia_titulo'] ?> </td>
                                        <td><img class="img-thumbnail rounded" src="../assets/img/noticias/<?php echo $noti['sql_noticia_imagen'];?>" width="100" alt=""></td>
                                        <td><?php echo $noti['sql_area_sigla'] ?></td>
                                        <td><?php echo $noti['sql_estado_nombre'] ?></td>
    
                                    <td>
                                        <form method="post">
                                            <div class="cambio_boton">
                                            <input type="hidden" name="noticia_id" id="noticia_id" value="<?php echo $noti['sql_noticia_id'] ?>"/>
                                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>                                                
                                            </div>

                                        </form>
                                    </td>
                                    </tr>
                                    <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->


<?php
require('./drsu_template/footer.php');
?>