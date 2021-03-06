<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>AEP</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logoAEP.png" rel="icon">
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
            <h1 class="logo me-auto"><a href="../index.php"><img src="../assets/img/logoAEP.png" alt="logo">  AEP</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <?php 
                    $urli = $_SERVER['PHP_SELF'];
                    $array = explode('/',$urli);
                    $ultimo = end($array);
                    $url1="";$url3="";$url4="";$url5="";
                    switch($ultimo){
                        case "index.php":
                            $url1="active";
                            break;
                        case "noticias.php":
                            $url3="active";
                            break;
                        case "contacto.php":
                            $url4="active";
                            break;
                        case "autoridades.php":
                            $url5="active";
                            break;
                    }
                    echo '
                    <li><a class="nav-link scrollto '.$url1.'" href="../index.php">Inicio</a></li>
                    <li><a class="nav-link scrollto '.$url5.'" href="autoridades.php">Autoridades</a></li>
                    <li><a class="nav-link scrollto '.$url3.'" href="noticias.php">Noticias</a></li>
                    <li><a class="nav-link scrollto '.$url4.'" href="contacto.php">Cont??ctanos</a></li>
                    ';?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="../aep" class="get-started-btn scrollto">Iniciar Sesi??n</a>
            <a href="../../index.php" class="get-started-btn scrollto">Regresar a DRSU</a>
        </div>
    </header><!-- End Header -->
    </br></br>

  