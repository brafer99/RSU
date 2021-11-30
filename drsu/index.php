<?php require('../config/db.php');?>
<?php
  if(isset($_SESSION['valida_usuario']) && $_SESSION['valida_usuario']=="ok"){
    header('Location:noticias/noticia.php');
  }
  else{ 
$var_login_id=(isset($_POST['login_id']))?$_POST['login_id']:"";
$var_login_email=(isset($_POST['login_email']))?$_POST['login_email']:"";
$var_login_pass=(isset($_POST['login_pass']))?$_POST['login_pass']:"";
$validacion_usuario=false;
$validacion_pas=false;

if($_POST){
    if($var_login_email!='' && $var_login_pass!=''){
        $sentencia_sql= $conexion->prepare("SELECT * from drsu_usuario");
        $sentencia_sql->execute();
        $lista_usuarios=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
        //$hash = $usuario['sql_usuario_pass'];
         $hash = "";
        foreach($lista_usuarios as $usuario) {
            if($usuario['sql_usuario_email']==$var_login_email){
                $validacion_usuario=true;
                $hash = $usuario['sql_usuario_pass'];
                $usuario_validado=$usuario['sql_usuario_email'];
                $usuario_rol=$usuario['sql_usuario_rol_id'];
            }
        }
        if($validacion_usuario==true){
            if(password_verify($var_login_pass,$hash)){
                $validacion_pas=true;
                $_SESSION['valida_usuario']="ok";
                $_SESSION['nombre_usuario']=$var_login_email;
                $_SESSION['rol_usuario']=$usuario_rol;
                header('Location:noticias/noticia.php');
            } else{
                $mensaje1="Contraseña Incorrecta";
            }
        } else{
            $mensaje2="Email incorrecto";
        }
    } else{
            $mensaje3="No ingresó Datos";
    }  //se usa esta forma, lo ideal seria hacer consulta a la base de datos  
}
}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
          <div class="row">
          <div class="col-md-4">
          </div>
              <div class="col-md-4"> 
                  <br/>
                  <h3><center>SISTEMA INTERNO DRSU</center></h3>
                  <br/>
                  <center><a href="../index.php"><button type="button" class="btn btn-info" ">Regresar a Página Web</button></a></center>
                  <br/>        
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <?php if(isset($mensaje1)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje1; ?>
                        </div>
                        <?php } ?>

                        <?php if(isset($mensaje2)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje2; ?>
                        </div>
                        <?php } ?>

                        <?php if(isset($mensaje3)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje3; ?>
                        </div>
                        <?php } ?>
                        <form method="POST">
                        <div class = "form-group">
                            <label>Usuario</label>
                            <input required type="email" class="form-control" name="login_email" id="login_email" placeholder="Escribe tu email">
                        </div>             
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <div class="juntar">                            
                                <input required type="password" class="form-control" name="login_pass" id="login_pass" placeholder="Escribe tu contraseña">
                                <span class="boton_ver"><button class="btn btn-primary" type="button" id="boton2">ver</button></span>  
                            </div>                        
                        </div>
                            <script type="text/javascript">

                                var ver = document.getElementById('boton2');
                                ver.addEventListener('click',mostrarContraseña);
                                function mostrarContraseña(){
                                    if(document.getElementById("login_pass").type == "password"){
                                        document.getElementById("login_pass").type = "text";
                                    }else{
                                        document.getElementById("login_pass").type = "password";
                                    }
                                }
                            </script>                         

                        <button type="submit" class="btn btn-primary">Entrar al Administrador</button>
                        </form>
                    </div>
                </div>
              </div>  
          </div>
      </div>
  </body>
</html>