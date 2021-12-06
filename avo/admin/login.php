<?php
require('../../config/connection.inc.php');
require('functions.inc.php');
$msg = '';
if (isset($_POST['submit'])) {
   $username = get_safe_value($con, $_POST['username']);
   $password = get_safe_value($con, $_POST['password']);
   $sql = "SELECT * FROM avo_users where email = '$username'";
   $res = mysqli_query($con, $sql);
   $count = mysqli_num_rows($res);

   if ($count > 0) {
      $row = mysqli_fetch_assoc($res);
      $dbpassword = $row['password'];
      if (password_verify($password, $dbpassword)) {
         $_SESSION['ADMIN_LOGIN'] = 'yes';
         $_SESSION['ADMIN_LOGIN'] = 'admin';
         ?>
         <script>
               window.location.href = "index.php";
            </script>
         <?php
      }
   } else {
      $msg = "Por favor ingrese los detalles de inicio de sesión correctos";
   }
}
?>

<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Página de Inicio de Sesión</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="assets/css/normalize.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="assets/css/themify-icons.css">
   <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
   <link rel="stylesheet" href="assets/css/flag-icon.min.css">
   <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
   <link rel="stylesheet" href="assets/css/style.css">
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body class="bg-dark">
   <div class="sufee-login d-flex align-content-center flex-wrap">
      <div class="container">
         <div class="login-content">
            <div class="login-form mt-150">
               <form method="post">
                  <div class="form-group">
                     <label>E-MAIL</label>
                     <input type="text" name="username" class="form-control" placeholder="E-mail" required>
                  </div>
                  <div class="form-group">
                     <div class="passform">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" id="login_pass" required>
                        <span class="boton_ver"><button class="btn btn-primary" type="button" id="boton2">ver contraseña</button></span>
                     </div>
                  </div>
                  <script type="text/javascript">
                     var ver = document.getElementById('boton2');
                     ver.addEventListener('click', mostrarContraseña);

                     function mostrarContraseña() {
                        if (document.getElementById("login_pass").type == "password") {
                           document.getElementById("login_pass").type = "text";
                        } else {
                           document.getElementById("login_pass").type = "password";
                        }
                     }
                  </script>
                  <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Iniciar sesión</button>
               </form>
               <div class="field_error"><?php echo $msg ?></div>
            </div>
         </div>
         <center><a href="../index.php"><button type="button" class="btn btn-info">Volver a AVO</button></a></center>
      </div>
   </div>
   <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
   <script src="assets/js/popper.min.js" type="text/javascript"></script>
   <script src="assets/js/plugins.js" type="text/javascript"></script>
   <script src="assets/js/main.js" type="text/javascript"></script>
</body>

</html>