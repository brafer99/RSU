<?php include("./config/db.php");?>
<?php

session_start();

$var_login_id=(isset($_POST['login_id']))?$_POST['login_id']:"";
$var_login_email=(isset($_POST['login_email']))?$_POST['login_email']:"";
$var_login_pass=(isset($_POST['login_pass']))?$_POST['login_pass']:"";


if($_POST){

    if($var_login_email!='' && $var_login_pass!=''){

        $sentencia_sql= $conexion->prepare("SELECT * from drsu_usuario WHERE sql_usuario_email=:param_usuario_email");
        $sentencia_sql->bindParam(':param_usuario_email',$var_login_email);
        $sentencia_sql->execute();
        $usuario=$sentencia_sql->fetch(PDO::FETCH_LAZY);
        $hash = $usuario['sql_usuario_pass'];
        if(password_verify($var_login_pass,$hash)){
        $_SESSION['valida_usuario']="ok";
        $_SESSION['nombre_usuario']=$var_login_email;
         header('Location:usuario.php');
         }else{
        $mensaje="Error: El usuario ó contraseña son incorrectos";
        }

    }else{
        $mensaje2="No ingresó Datos";
    }

    //se usa esta forma, lo ideal seria hacer consulta a la base de datos
    
    //una vez validada la informacion le damos estos valores para que pueda usarse en otras plantilla
    }
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Administrador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        <?php if(isset($mensaje)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                        <?php } ?>
                        <?php if(isset($mensaje2)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje2; ?>
                        </div>
                        <?php } ?>
                        <form method="POST">

                        <div class = "form-group">
                            <label>Usuario</label>
                            <input required type="email" class="form-control" name="login_email" id="login_email" placeholder="Escribe tu email">
                        </div>
                        
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input required type="password" class="form-control" name="login_pass" id="login_pass" placeholder="Escribe tu contraseña">
                        </div>

                        <button type="submit" class="btn btn-primary">Entrar al Adiministrador</button>
                        </form>
                    </div>
                </div>
              </div>  
          </div>
      </div>
  </body>
</html>