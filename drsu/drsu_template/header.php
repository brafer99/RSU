<?php require("../config/db.php");?>
<?php
    if (isset($_SESSION['valida_usuario']) && $_SESSION['valida_usuario']!=''){
    }else{
        header('Location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DRSU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/rrsu.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!--UTILIZAR ESTE CSS PARA DAR ESTILOS PERSONALIZADOS-->
    <link href="../assets/css/customstyle.css" rel="stylesheet">
    <!-- =======================================================

  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="../index.php"><img src="../assets/img/rrsu.png" alt="logo">  DRSU</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <?php 
                    $urli = $_SERVER['PHP_SELF'];
                    $array = explode('/',$urli);
                    $ultimo = end($array);
                    $url1="";$url2="";$url3="";$url4="";$url5="";
                    switch($ultimo){
                        case "autoridad.php":
                            $url1="active";
                            break;
                        case "noticia.php":
                            $url2="active";
                            break;
                        case "usuario.php":
                            $url3="active";
                            break;
                        
                        case "nosotros.php":
                            $url4="active";
                            break;
                        /*
                        case "autoridades.php":
                            $url5="active";
                            break; */
                    }
                    echo '
                    
                    <li><a class="nav-link scrollto '.$url2.'" href="noticia.php">Administrar <br/> Noticias</a></li>
                    <li><a class="nav-link scrollto '.$url4.'" href="nosotros.php">Administrar <br/>Nosotros</a></li>
                    <li><a class="nav-link scrollto '.$url1.'" href="autoridad.php">Administrar <br/> Autoridades</a></li>';
                    
                    if($_SESSION['rol_usuario']==1){
                        echo '<li><a class="nav-link scrollto '.$url3.'" href="usuario.php">Administrar <br/>Usuarios</a></li>';
                    }
                    
                    
                    echo '
                    <li><a class="nav-link scrollto '.$url5.'" href="../index.php">Regresar a Sitio WEB</a></li>
                    ';           
                    ?>
                </ul>




                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="cerrar.php" class="get-started-btn scrollto">Cerrar Sesión</a>
        </div>
    </header><!-- End Header -->
    </br></br>






