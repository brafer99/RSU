<?php include("./drsu_template/header.php");?>

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

include("../config/db.php");

switch($var_accion){

    case "Modificar":
        

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

            //ACTUALIZAMOS LOS NUEVOS PARAMETROS
            $sentencia_sql = $conexion->prepare("UPDATE drsu_autoridad SET sql_autoridad_imagen=:param_autoridad_imagen  WHERE sql_autoridad_id=:param_autoridad_id;");
            //IGUAL QUE EN agregar, utilizamos la varibale modificada $nombre_archivo...
            $sentencia_sql->bindParam(':param_autoridad_imagen',$nombre_archivo);
            $sentencia_sql->bindParam(':param_autoridad_id',$var_autoridad_id);
            $sentencia_sql->execute();
            
        }
        
        //fin modificacion imagen

        header("Location:autoridad.php");    
        break;


    case "Borrar":

        //Borrado de imagenes de /img...
        $sentencia_sql = $conexion->prepare("SELECT sql_autoridad_imagen FROM drsu_autoridad WHERE sql_autoridad_id=:param_autoridad_id;");
        $sentencia_sql->bindParam(':param_autoridad_id',$var_autoridad_id);
        $sentencia_sql->execute();
        $autoridad = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        if(isset($autoridad["sql_autoridad_imagen"]) && ($autoridad["sql_autoridad_imagen"]!="imagen.jpg")){
            if(file_exists("../assets/img/autoridades/".$autoridad["sql_autoridad_imagen"])){
                unlink("../assets/img/autoridades/".$autoridad["sql_autoridad_imagen"]);
            }

        }
        //FIN borrado de imagen...

        //Borrado de datos en BD mediante DELETE y id:
        $sentencia_sql = $conexion->prepare("DELETE FROM drsu_autoridad WHERE sql_autoridad_id=:param_autoridad_id;");
        $sentencia_sql->bindParam(':param_autoridad_id',$var_autoridad_id);
        $sentencia_sql->execute();
        //echo "Presionado Boton Borrar";
        //header("Location:productos.php");
        header("Location:autoridad.php");
        break;


    case "Seleccionar":

        //Seleccionamos informacion mediante INNER JOIN:
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


        //FETCH_LAZY CARGA LOS DATOS UNO A UNO:
        $autoridad = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        //rellenamos los imputs
        $var_autoridad_nombre=$autoridad['sql_autoridad_nombre'];
        $var_autoridad_imagen=$autoridad['sql_autoridad_imagen'];
        $var_autoridad_email=$autoridad['sql_autoridad_email'];

    
        //boton select de area:
        $var_autoridad_area_id_2=$autoridad['sql_autoridad_area_id'];
        $var_area_nombre=$autoridad['sql_area_nombre'];
        
        break;
    case "Cancelar":
         header("Location:autoridad.php");

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

    <!-- ======= Team Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Adiministrar Autoridades</h2>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box2"> 
                                <h3>Modificar Autoridad</h3>
                                <form method="POST" enctype="multipart/form-data" role="form">
                                <div class = "form-group">
                                    <input type="hidden" required readonly class="form-control"  value="<?php echo $var_autoridad_id; ?>" name="autoridad_id" id="autoridad_id"  placeholder="ID">
                                </div>

                                <div class = "form-group">
                                    <label for="nombre">Área:</label>
                                    <textarea readonly class="form-control" name="autoridad_area_id" rows="2" ><?php 
                                    if(isset($var_autoridad_area_id_2)) {
                                        echo $var_area_nombre;
                                    }                                  
                                    ?></textarea>
                                </div>

                                <div class = "form-group">
                                    <label for="nombre">Nombre:</label>
                                    <textarea class="form-control" name="autoridad_nombre" rows="2" placeholder="Ingrese aquí el nombre de Autoridad"
                                    required><?php echo $var_autoridad_nombre; ?></textarea>
                                </div>

                                


                                <!-- Imagenes: -->
                                <div class = "form-group">
                                    <label for="autoridad_imagen">Imagen:</label><br/> 
                                    <?php if($var_autoridad_imagen!=""){ ?>
                                        <img class="img-thumbnail rounded" src="../assets/img/autoridades/<?php echo $var_autoridad_imagen;?>" width="200" alt="">    
                                    <?php } ?>
                                    <input type="file" class="form-control" name="autoridad_imagen" id="autoridad_imagen" placeholder="ID">
                                </div>

                                <br/>          

                                <div class="row">
                                    <div class="col form-group">
                                        <label for="autoridad_email">Email: (opcional) </label>
                                        <input type="email" class="form-control" value="<?php echo $var_autoridad_email; ?>" name="autoridad_email" id="autoridad_email"  placeholder="Email">
                                    </div>  
                                </div>                             
 

                                <div class="btn-group" role="group" aria-label="">
                                    
                                    <button type="submit" name="accion" <?php echo ($var_accion!="Seleccionar")? "disabled":""?> value= "Modificar" class="btn btn-warning">Modificar</button>
                                    <a href="autoridad.php"><button type="button" class="btn btn-info">Cancelar</button></a>
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
                                <h3>Lista de Autoridades</h3>
                                <br/>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Área</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($lista_autoridades as $auto) { ?>
                                    <tr>
                                        <td><?php echo $auto['sql_autoridad_nombre'] ?></td>
                                        <td><?php echo $auto['sql_area_nombre'] ?></td>
                                    <td>
                                        <form method="post">
                                            <div class = "form-group">
                                                <div class="cambio_boton">
                                                <input type="hidden" name="autoridad_id" id="autoridad_id" value="<?php echo $auto['sql_autoridad_id'] ?>"/>
                                                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>                                                                                            
                                            </div>                                            
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
require("./drsu_template/footer.php");
?>