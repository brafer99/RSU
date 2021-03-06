<?php require('../drsu_template/header.php');?>


<?php 

//variables obteniendo varlor POST de formulario:

//datos de tabla
$var_usuario_id = (isset($_POST['usuario_id']))?$_POST['usuario_id']:"";
$var_usuario_email = (isset($_POST['usuario_email']))?$_POST['usuario_email']:"";
$var_usuario_pass = (isset($_POST['usuario_pass']))?$_POST['usuario_pass']:"";
$var_usuario_rol_id = (isset($_POST['usuario_rol_id']))?$_POST['usuario_rol_id']:"";

$validacion_2=true;
$validacion=true;

//opciones de tabla
$var_accion = (isset($_POST['accion']))?$_POST['accion']:"";


switch($var_accion){
    case "Agregar":
        
        //Preparamos la sentencia sql con INSERT INTO y datos de la base de datos:

        $sentencia_sql= $conexion->prepare("SELECT * FROM drsu_usuario");
        $sentencia_sql->execute();
        $lista_validaciones=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
        $validacion=true;
        foreach($lista_validaciones as $vali){
            if($var_usuario_email==$vali['sql_usuario_email']){
                $validacion=false;
                $validacion_2=false;
            }

        }

        if($validacion==true){

        $sentencia_sql= $conexion->prepare("INSERT INTO drsu_usuario (
            sql_usuario_email,
            sql_usuario_pass,
            sql_usuario_rol_id) 
            VALUES (
            :param_usuario_email,
            :param_usuario_pass,
            :param_usuario_rol_id );");

        //Mediante bindParam relacionamos los parametros y las variables con contenido POST:
        
        $contra_hash = password_hash($var_usuario_pass,PASSWORD_DEFAULT,['cost'=>10]);

        $sentencia_sql->bindParam(':param_usuario_email',$var_usuario_email);
        $sentencia_sql->bindParam(':param_usuario_pass',$contra_hash);
        $sentencia_sql->bindParam(':param_usuario_rol_id',$var_usuario_rol_id);
        $sentencia_sql->execute();

        echo "<script>location.href='usuario.php';</script>";
        }

        break;

    case "Modificar":

        //validacion en la modificacion de email:
        //Actualizacion mediante UPDATE y datos de la base de datos:
        $sentencia_sql= $conexion->prepare("UPDATE drsu_usuario SET

            sql_usuario_email=:param_usuario_email,
            sql_usuario_pass=:param_usuario_pass,
            sql_usuario_rol_id=:param_usuario_rol_id

            WHERE 
            sql_usuario_id=:param_usuario_id;"); 

        $contra_hash = password_hash($var_usuario_pass,PASSWORD_DEFAULT,['cost'=>10]);
        $sentencia_sql->bindParam(':param_usuario_id',$var_usuario_id);
        $sentencia_sql->bindParam(':param_usuario_email',$var_usuario_email);
        $sentencia_sql->bindParam(':param_usuario_pass',$contra_hash);
        $sentencia_sql->bindParam(':param_usuario_rol_id',$var_usuario_rol_id);
        $sentencia_sql->execute();
        echo "<script>location.href='usuario.php';</script>";   
        break;


    case "Borrar":

        //que pasa si un usuario borra todos los usuarios...
        $sentencia_sql= $conexion->prepare("SELECT * FROM drsu_usuario");
        $sentencia_sql->execute();
        $lista_usuarios=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC); 
        $cantidad_usuario=count($lista_usuarios);

        $validacion_borrar=true;
        
        if($cantidad_usuario==2){
            $validacion_borrar=false;
        }

        if($validacion_borrar==true){
        //Borrado de datos en BD mediante DELETE y id:
        $sentencia_sql = $conexion->prepare("DELETE FROM drsu_usuario WHERE sql_usuario_id=:param_usuario_id;");
        $sentencia_sql->bindParam(':param_usuario_id',$var_usuario_id);
        $sentencia_sql->execute();
        //echo "Presionado Boton Borrar";
        //header("Location:productos.php");
        echo "<script>location.href='usuario.php';</script>";
        } 
        break;

    case "Seleccionar":



        //Seleccionamos informacion mediante INNER JOIN:
        $sentencia_sql= $conexion->prepare("SELECT 
        drsu_usuario.sql_usuario_id, 
        drsu_usuario.sql_usuario_email, 
        drsu_usuario.sql_usuario_pass, 
        drsu_usuario.sql_usuario_rol_id,
        drsu_rol.sql_rol_nombre

        FROM drsu_usuario
        JOIN drsu_rol ON drsu_usuario.sql_usuario_rol_id=drsu_rol.sql_rol_id 

        WHERE sql_usuario_id=:param_usuario_id;");
        
        $sentencia_sql->bindParam(':param_usuario_id',$var_usuario_id);
        $sentencia_sql->execute();
        //FETCH_LAZY CARGA LOS DATOS UNO A UNO:
        $usuario = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        //rellenamos los imputs
        $var_usuario_email=$usuario['sql_usuario_email'];
        $var_usuario_pass=$usuario['sql_usuario_pass'];

        //boton select de rol:
        $var_usuario_rol_id_2=$usuario['sql_usuario_rol_id'];
        $var_rol_nombre=$usuario['sql_rol_nombre'];
        
        break;
    case "Cancelar":
        echo "<script>location.href='usuario.php';</script>";


}

$sentencia_sql= $conexion->prepare("SELECT 
    drsu_usuario.sql_usuario_id, 
    drsu_usuario.sql_usuario_email, 
    drsu_usuario.sql_usuario_pass,
    drsu_usuario.sql_usuario_rol_id,
    drsu_rol.sql_rol_nombre

    FROM drsu_usuario 
    JOIN drsu_rol ON drsu_usuario.sql_usuario_rol_id=drsu_rol.sql_rol_id 
    where drsu_usuario.sql_usuario_email<>'modulodrsumaster@gmail.com'
    ORDER BY drsu_usuario.sql_usuario_id asc;");

    $sentencia_sql->execute();
    $lista_usuarios=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);

if(isset($var_usuario_rol_id_2)){

    $sentencia_sql_2= $conexion->prepare("SELECT * FROM drsu_rol
    WHERE sql_rol_id NOT IN ( 
    SELECT sql_rol_id FROM drsu_rol
    WHERE sql_rol_id=:param_rol_id)");
    $sentencia_sql_2->bindParam(':param_rol_id',$var_usuario_rol_id_2);
    $sentencia_sql_2->execute();
    $lista_roles=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);

}else{
    $sentencia_sql_2= $conexion->prepare("SELECT * FROM drsu_rol");
    $sentencia_sql_2->execute();
    $lista_roles=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);    
}

?>
<script type="text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm("??Seguro que deseas ELIMINAR?");
        if(respuesta==true){
            return true;
        }else{
            return false;
        }
    }
</script>

<section id="contact" class="contact ">
<div class="container">

<div class="section-title">
    <br/>
    <br/>
    <h2>Adiministrar Usuarios</h2>
    
</div>
<div class="row">
    <div class="col-lg-5">
        <div class="row">
            <div class="col-md-12">
                <div class="info-box2"> 

                    <h3>Agregar nuevo Usuario</h3>
                    <br/>
                <form method="POST" enctype="multipart/form-data"> <!-- propiedad enctype para recibir archivos en el formulario-->

                    <!-- datos generales del formulario -->
                    <div class = "form-group">
                        <input type="hidden" required readonly class="form-control"  value="<?php echo $var_usuario_id; ?>" name="usuario_id" id="usuario_id"  placeholder="ID">
                    </div>

                    <?php if(isset($validacion)){
                        if($validacion==false){
                         ?>
                        <div class="alert alert-danger">
                        <strong>Email existente, digite un nuevo Email</strong>
                        </div>
                   <?php }} ?>

                    <div class = "form-group">
                        <label for="usuario_email"><b>??mail:</b></label>
                        <input <?php if($var_usuario_email!="" && $validacion==true){$readonly="readonly"; echo $readonly;}?>
                        type="email" required class="form-control" value="<?php echo $var_usuario_email; ?>" name="usuario_email" id="usuario_email"  placeholder="Email">
                    </div>
                    <br/>

                            
                                       
                    <?php 
                    if($var_usuario_email!="" && $validacion_2==true) {             
                    ?>
                    <div class = "form-group">
                            <div class="form-group">
                                <label for="usuario_pass"><b>Contrase??a:</b></label>
                                <button class="btn btn-primary btn-sm" type="submit" id="boton" value="cambio_contra" name="cambio_contra">Cambiar Contrase??a</button>                          
                                <div class="juntar">
                                <input hidden required class="form-control" value="<?php echo $var_usuario_pass; ?>" type="password" name="usuario_pass" id="contrase??a2" placeholder="Nueva contrase??a">
                                <span class="boton_ver"><button hidden class="btn btn-primary" type="button" id="boton2">ver</button></span> 
                            
                                </div>
                            </div>
                            <script type="text/javascript">
                                var boton = document.getElementById('boton');
                                var ver = document.getElementById('boton2');
                                boton.addEventListener('click',mostrarInput);
                                function mostrarInput(){
                                    document.getElementById("contrase??a2").hidden = false;
                                    document.getElementById("contrase??a2").value = "";
                                    document.getElementById("boton2").hidden = false;
                                    document.getElementById("boton").hidden = true;                                                                      
                                }
                                ver.addEventListener('click',mostrarContrase??a);
                                function mostrarContrase??a(){
                                    if(document.getElementById("contrase??a2").type == "password"){
                                        document.getElementById("contrase??a2").type = "text";
                                    }else{
                                        document.getElementById("contrase??a2").type = "password";
                                    }
                                }
                            </script>  
                        
                    </div>
                    <?php } if (($var_usuario_email=="" && $validacion_2==true) ||($var_usuario_email!="" && $validacion_2==false)) {  ?>
                    <div class = "form-group">
                        <label for="usuario_pass"><b>Contrase??a:</b></label>
                        <div class="juntar">
                        <input required class="form-control" value="<?php echo $var_usuario_pass; ?>" type="password" name="usuario_pass" id="contrase??a" placeholder="Contrase??a">
                        <span class="boton_ver"><button class="btn btn-primary" type="button" id="boton3">ver</button></span> 
                            <script type="text/javascript">
                                var ver = document.getElementById('boton3');
                                ver.addEventListener('click',mostrarContrase??a);
                                function mostrarContrase??a(){
                                    if(document.getElementById("contrase??a").type == "password"){
                                        document.getElementById("contrase??a").type = "text";
                                    }else{
                                        document.getElementById("contrase??a").type = "password";
                                    }
                                }
                            </script> 
                        </div>
                    </div>
                    <?php } ?>
                     <br/>
                     <!-- Lista con areas: -->
                    <div class = "form-group">
                        <label for="roles"><b>Asignar rol:</b></label>
                        <select name="usuario_rol_id" id="usuario_rol_id" required>
                            <?php if(isset($var_usuario_rol_id_2)) { ?>
                                <option selected="" value="<?php echo $var_usuario_rol_id_2; ?>" ><?php echo $var_rol_nombre; ?></option> 
                            <?php } else{?>
                                <option value="" selected disabled hidden>Selecciona una opci??n</option> 
                            <?php }?>
                            <?php foreach($lista_roles as $rol){ ?>
                                <option value="<?php echo $rol['sql_rol_id']; ?>"> <?php echo $rol['sql_rol_nombre']; ?></option> 
                            <?php } ?>
                        </select>
                    </div>


                    <div class="btn-group" role="group" aria-label=""><button type="submit" name="accion" <?php if($var_accion=="Seleccionar"){echo "disabled";}?>
                        value= "Agregar" class="btn btn-success">Agregar</button>
                        
                        <button type="submit" name="accion"<?php if($var_accion!="Seleccionar"){echo "disabled";}?> value= "Modificar" class="btn btn-warning">Modificar</button>

                         <a href="usuario.php"><button type="button" class="btn btn-info" ">Cancelar</button></a>
                    </div>
                    <!-- cambiar tipo de boton, sacarlo del form -->  
                </form> 
                </div>
                </div>
                        </div> 
                    </div>
                


                <div class="col-lg-7">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="info-box">          
                                <h3>Lista de Usuarios</h3>
                                <br/>
        <div class="table-responsive">
        <table class="table table-hover">
            
            <?php if(isset($validacion_borrar)){
                if($validacion_borrar==false){ ?>
                <div class="alert alert-danger">
                        <strong>No se puede borrar mas usuarios</strong>
                        </div>    

                
            <?php }} ?>

            <thead class="thead-light " >
                <tr>
                    
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>

            <?php foreach($lista_usuarios as $usu) { ?>
                <tr>

                    <td><?php echo $usu['sql_usuario_email'] ?> </td>
                    <td><?php echo $usu['sql_rol_nombre'] ?></td>
                   
                    <td>
                    <div class="botones_drsu">

                    <div class="boton_drsu">                           
                    <form method="post">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usu['sql_usuario_id'] ?>"/>   
                     <button type="submit" name="accion" value= "Seleccionar" class="btn btn-warning btn-sm"><img src="../../assets/img/icons/editar.png"></button>  

                    </form> 
                     </div>  
                     <div class="boton_drsu">                        
                    <form method="post">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $usu['sql_usuario_id'] ?>"/>   

                    <button type="submit" name="accion" value= "Borrar" class="btn btn-danger btn-sm" onclick="return ConfirmDelete()"><img src="../../assets/img/icons/eliminar.png"></button> 
                    </form>
                    </div>
                    </div>                     
                    
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
            </div>

        </div>
    </section><!-- End Contact Section -->
<?php include('../drsu_template/footer.php');?>