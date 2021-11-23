<?php include("./drsu_template/header.php");?>
<?php 

//variables obteniendo varlor POST de formulario:
//datos de tabla
$var_nosotros_id = (isset($_POST['nosotros_id']))?$_POST['nosotros_id']:"";
$var_nosotros_titulo = (isset($_POST['nosotros_titulo']))?$_POST['nosotros_titulo']:"";
$var_nosotros_descripcion = (isset($_POST['nosotros_descripcion']))?$_POST['nosotros_descripcion']:"";
$var_nosotros_imagen = (isset($_FILES['nosotros_imagen']['name'])) ? $_FILES['nosotros_imagen']['name'] :"";
$var_nosotros_titulo2 = (isset($_POST['nosotros_titulo2']))?$_POST['nosotros_titulo2']:"";
$var_nosotros_descripcion2 = (isset($_POST['nosotros_descripcion2']))?$_POST['nosotros_descripcion2']:"";
$var_nosotros_categoria_id = (isset($_POST['nosotros_categoria_id']))?$_POST['nosotros_categoria_id']:"";


//opciones de tabla
$var_accion = (isset($_POST['accion']))?$_POST['accion']:"";

include("../config/db.php");

switch($var_accion){

    case "Modificar":
        

        //Actualizacion mediante UPDATE y datos de la base de datos:
        $sentencia_sql= $conexion->prepare("UPDATE drsu_nosotros SET

        sql_nosotros_titulo=:param_nosotros_titulo,
        sql_nosotros_descripcion=:param_nosotros_descripcion,
        sql_nosotros_titulo2=:param_nosotros_titulo2,
        sql_nosotros_descripcion2=:param_nosotros_descripcion2
            

        WHERE sql_nosotros_id=:param_nosotros_id;"); 

        $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
        $sentencia_sql->bindParam(':param_nosotros_titulo',$var_nosotros_titulo);
        $sentencia_sql->bindParam(':param_nosotros_descripcion',$var_nosotros_descripcion);
        $sentencia_sql->bindParam(':param_nosotros_titulo2',$var_nosotros_titulo2);
        $sentencia_sql->bindParam(':param_nosotros_descripcion2',$var_nosotros_descripcion2);    
        $sentencia_sql->execute();
        //Modificacion imagen
        if ($var_nosotros_imagen!=""){

            //AÑADIMOS EL NUEVO ARCHIVO CON (similar a agregar)
            $fecha=new DateTime();
            $nombre_archivo=($var_nosotros_imagen!="") ? $fecha->getTimestamp()."_".$_FILES["nosotros_imagen"]['name'] :"imagen.jpg";           
            $temporal_imagen = $_FILES["nosotros_imagen"]["tmp_name"];
            move_uploaded_file($temporal_imagen,"../assets/img/nosotros/".$nombre_archivo); 
            
            //ahora eliminamos el FILE (similar a DELETE)
            $sentencia_sql = $conexion->prepare("SELECT sql_nosotros_imagen FROM drsu_nosotros WHERE sql_nosotros_id=:param_nosotros_id;");
            $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
            $sentencia_sql->execute();
            $nosotros = $sentencia_sql->fetch(PDO::FETCH_LAZY);

            if(isset($nosotros["sql_nosotros_imagen"]) && ($nosotros["sql_nosotros_imagen"]!="imagen.jpg")){
                if(file_exists("../assets/img/nosotros/".$nosotros["sql_nosotros_imagen"])){
                    unlink("../assets/img/nosotros/".$nosotros["sql_nosotros_imagen"]);
                }
            }        

            //ACTUALIZAMOS LOS NUEVOS PARAMETROS
            $sentencia_sql = $conexion->prepare("UPDATE drsu_nosotros SET sql_nosotros_imagen=:param_nosotros_imagen  WHERE sql_nosotros_id=:param_nosotros_id;");
            //IGUAL QUE EN agregar, utilizamos la varibale modificada $nombre_archivo...
            $sentencia_sql->bindParam(':param_nosotros_imagen',$nombre_archivo);
            $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
            $sentencia_sql->execute();
            
        }
        
        //fin modificacion imagen

        header("Location:nosotros.php");    
        break;


    case "Borrar":

        //Borrado de imagenes de /img...
        $sentencia_sql = $conexion->prepare("SELECT sql_nosotros_imagen FROM drsu_nosotros WHERE sql_nosotros_id=:param_nosotros_id;");
        $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
        $sentencia_sql->execute();
        $nosotros = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        if(isset($nosotros["sql_nosotros_imagen"]) && ($nosotros["sql_nosotros_imagen"]!="imagen.jpg")){
            if(file_exists("../assets/img/nosotros/".$nosotros["sql_nosotros_imagen"])){
                unlink("../assets/img/nosotros/".$nosotros["sql_nosotros_imagen"]);
            }

        }
        //FIN borrado de imagen...

        //Borrado de datos en BD mediante DELETE y id:
        $sentencia_sql = $conexion->prepare("DELETE FROM drsu_nosotros WHERE sql_nosotros_id=:param_nosotros_id;");
        $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
        $sentencia_sql->execute();
        //echo "Presionado Boton Borrar";
        //header("Location:productos.php");
        header("Location:nosotros.php");
        break;


    case "Seleccionar":

        //Seleccionamos informacion mediante INNER JOIN:
        $sentencia_sql= $conexion->prepare("SELECT 
        drsu_nosotros.sql_nosotros_titulo,
        drsu_nosotros.sql_nosotros_descripcion,
        drsu_nosotros.sql_nosotros_imagen,
        drsu_nosotros.sql_nosotros_titulo2,
        drsu_nosotros.sql_nosotros_descripcion2,
        drsu_nosotros.sql_nosotros_categoria_id,
        drsu_categoria.sql_categoria_id,
        drsu_categoria.sql_categoria_nombre

        FROM drsu_nosotros 
        JOIN drsu_categoria ON drsu_nosotros.sql_nosotros_categoria_id=drsu_categoria.sql_categoria_id 
        WHERE sql_nosotros_id=:param_nosotros_id;");

        $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
        $sentencia_sql->execute();


        //FETCH_LAZY CARGA LOS DATOS UNO A UNO:
        $nosotros = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        //rellenamos los imputs
        $var_nosotros_titulo=$nosotros['sql_nosotros_titulo'];
        $var_nosotros_descripcion=$nosotros['sql_nosotros_descripcion'];
        $var_nosotros_imagen=$nosotros['sql_nosotros_imagen'];
        $var_nosotros_titulo2=$nosotros['sql_nosotros_titulo2'];
        $var_nosotros_descripcion2=$nosotros['sql_nosotros_descripcion2'];

        //boton select de area:
        $var_nosotros_categoria_id_2=$nosotros['sql_nosotros_categoria_id'];
        $var_categoria_nombre=$nosotros['sql_categoria_nombre'];
        
        break;
    case "Cancelar":
         header("Location:nosotros.php");

}
$sentencia_sql= $conexion->prepare("SELECT 
    drsu_nosotros.sql_nosotros_id,
    drsu_nosotros.sql_nosotros_titulo, 
    drsu_nosotros.sql_nosotros_descripcion, 
    drsu_nosotros.sql_nosotros_imagen, 
    drsu_nosotros.sql_nosotros_titulo2, 
    drsu_nosotros.sql_nosotros_descripcion2,
    drsu_categoria.sql_categoria_nombre
    FROM drsu_nosotros
    JOIN drsu_categoria ON drsu_nosotros.sql_nosotros_categoria_id=drsu_categoria.sql_categoria_id 
    ORDER BY drsu_nosotros.sql_nosotros_id ASC;");
$sentencia_sql->execute();
$lista_nosotros=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
$sentencia_sql_2= $conexion->prepare("SELECT * FROM drsu_categoria");
$sentencia_sql_2->execute();
$lista_categorias=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);
?>

    <!-- ======= Team Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Adiministrar Nosotros</h2>
            </div>
            <div class="row">



                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box2"> 

                                <h3>Modificar Nosotros</h3>


                                <form method="POST" enctype="multipart/form-data" role="form">
                                <div class = "form-group">
                                    <input type="hidden" required readonly class="form-control"  value="<?php echo $var_nosotros_id; ?>" name="nosotros_id" id="nosotros_id"  placeholder="ID">
                                </div>



                                <div class = "form-group">
                                    <label for="titulo">Título:</label>
                                    <textarea class="form-control" name="nosotros_titulo" rows="2" placeholder="Ingrese aquí el Título"
                                    required><?php echo $var_nosotros_titulo; ?></textarea>
                                </div>
                                
                                <div class = "form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="form-control" name="nosotros_descripcion" rows="2" placeholder="Ingrese aquí la descripción"
                                    required><?php echo $var_nosotros_descripcion; ?></textarea>
                                </div>


                                <div class="row">
                                    <div class="col form-group">
                                        <label for="nosotros_categoria_id">Categoría:</label>
                                        <input readonly type="text" class="form-control" value="<?php 
                                        if(isset($var_nosotros_categoria_id_2)) {
                                            echo $var_categoria_nombre;
                                        }?>" 
                                        name="nosotros_categoria_id" id="nosotros_categoria_id">
                                    </div>  
                                </div> 

                                <!-- Imagenes: -->
                                <div class = "form-group">
                                    <label for="nosotros_imagen">Imagen:</label><br/> 
                                    <?php if($var_nosotros_imagen!=""){ ?>
                                        <img class="img-thumbnail rounded" src="../assets/img/nosotros/<?php echo $var_nosotros_imagen;?>" width="200" alt="">    
                                    <?php } ?>
                                    <input type="file" class="form-control" name="nosotros_imagen" id="nosotros_imagen" placeholder="ID">
                                </div><br/>    

                                <div class = "form-group">
                                    <label for="titulo2">Título 2 (Opcional):</label>
                                    <textarea class="form-control" name="nosotros_titulo2" rows="2" placeholder="Ingrese aquí la descripción"
                                    required><?php echo $var_nosotros_titulo2; ?></textarea>
                                </div>

                                <div class = "form-group">
                                    <label for="descripcion2">Descripción 2 (Opcional):</label>
                                    <textarea class="form-control" name="nosotros_descripcion2" rows="2" placeholder="Ingrese aquí la descripción"
                                    required><?php echo $var_nosotros_descripcion2; ?></textarea>
                                </div>

                                <div class="btn-group" role="group" aria-label="">                                 
                                    <button type="submit" name="accion" <?php echo ($var_accion!="Seleccionar")? "disabled":""?> value= "Modificar" class="btn btn-warning">Modificar</button>
                                    <a href="nosotros.php"><button type="button" class="btn btn-info">Cancelar</button></a>
                                </div>                    
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>


                <!-- TABLA -->                              
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">          
                                <h3>Lista de Nosotros</h3>
                                <br/>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Categoría</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($lista_nosotros as $noso) { ?>
                                    <tr>                                      
                                        <td><?php echo $noso['sql_categoria_nombre'] ?></td>
                                    <td>
                                        <form method="post">
                                            <div class = "form-group">
                                                <div class="cambio_boton">
                                                <input type="hidden" name="nosotros_id" id="nosotros_id" value="<?php echo $noso['sql_nosotros_id'] ?>"/>
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