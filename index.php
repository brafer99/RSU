<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DRSU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/rrsu.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!--UTILIZAR ESTE CSS PARA DAR ESTILOS PERSONALIZADOS-->
    <link href="assets/css/customstyle.css" rel="stylesheet">
    <!-- =======================================================

  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.php"><img src="assets/img/rsu2.png" alt="logo">  DRSU</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <?php 
                    $urli = $_SERVER['PHP_SELF'];
                    $array = explode('/',$urli);
                    $ultimo = end($array);
                    $url1="";$url2="";$url3="";$url4=""; $url5="";
                    switch($ultimo){
                        case "index.php":
                            $url1="active";
                            break;
                        case "nosotros.php":
                            $url2="active";
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
                    <li><a class="nav-link scrollto '.$url1.'" href="index.php">INICIO</a></li>
                    <li><a class="nav-link scrollto '.$url2.'" href="public/nosotros.php">NOSOTROS</a></li>
                    <li><a class="nav-link scrollto '.$url5.'" href="public/autoridades.php">AUTORIDADES</a></li>
                    <li><a class="nav-link scrollto '.$url3.'" href="public/noticias.php">NOTICIAS</a></li>
                    <li><a class="nav-link scrollto '.$url4.'" href="public/contacto.php">CONTÁCTANOS</a></li>
                    ';?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="public/areas.php" class="get-started-btn scrollto">DRSU</a>
        </div>
    </header><!-- End Header -->
    </br></br>

  
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-6">
        <h1>DIRECCIÓN ACADÉMICA DE RESPONSABILIDAD SOCIAL UNIVERSITARIA.</h1><span><h2>UNIVERSIDAD NACIONAL JORGE BASADRE GROHMANN.</h2></span>
        <a href="public/noticias.php" class="btn-get-started scrollto">Ver noticias</a>
      </div>
    </div>
  </div>

</section><!-- End Hero -->
    <main id="main">
<section id="clients" class="clients">
    <div class="container" data-aos="zoom-in">

        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><a href="http://www.unjbg.edu.pe"><img src="assets/img/oficinaslogo/oficina01.png" class="img-fluid" alt="UNJBG"></a>
                </div>
                <div class="swiper-slide"><a href="https://enlinea.sunedu.gob.pe/"><img src="assets/img/oficinaslogo/oficina02.png" class="img-fluid" alt="SUNEDU"></a>
                </div>
                <div class="swiper-slide"><a href="http://www.dasa.unjbg.edu.pe/"><img src="assets/img/oficinaslogo/oficina03.png" class="img-fluid" alt="DASA"></a>
                </div>
                <div class="swiper-slide"><a href="https://aula.unjbg.edu.pe/"><img src="assets/img/oficinaslogo/oficina04.png" class="img-fluid" alt="AULAVIRTUAL"></a>
                </div>
                <div class="swiper-slide"><a href="http://coel.unjbg.edu.pe/"><img src="assets/img/oficinaslogo/oficina05.png" class="img-fluid" alt="COEL"></a>
                </div>                       
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section><!-- End OFICINAS UNJBG ASOCIADAS -->
<!-- ======= PREGUNTAS FRECUENTES ======= -->
<section id="faq" class="faq">
  <div class="container" >
    <div class="section-title">
      <h2>PREGUNTAS FRECUENTES</h2>
    </div>

    <ul class="faq-list accordion" data-aos="fade-up">

      <li>
        <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">¿QUÉ ES LA RSU? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
          <p>
            Es una política de calidad ética del desempeño de la comunidad universitaria
            (estudiantes, docentes y
            personal
            administrativo) a través de la gestión responsable de los impactos educativos,
            cognitivos, laborales y
            ambientales que
            la Universidad genera, en un diálogo participativo con la sociedad para promover el
            Desarrollo Humano
            Sostenible.
          </p>
        </div>
      </li>
      <li>
        <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">¿QUÉ INCENTIVA LA RSU?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
          <p>
                 - Formar estudiantes agentes del Desarrollo Humano Sostenible de su país.
            <br> - Gestionar adecuadamente los impactos de la Universidad (laboral, ambiental, educativo, cognitivo y social)
            <br> - Producir conocimietnos socielamente útiles.
            <br> - Abrir la Universidad hacia la Sociedad y la Sociedad hacia la Universidad.
          </p>
        </div>
      </li>

      <li>
        <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">¿QUÉ ÁREAS INTEGRAN LA DRSU EN LA UNJBG?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
          <p>
                - Área de Extensión y Proyección Cultural (AEP)
            <br>- Área de Programas de Voluntariado Basadrino y Vinculación con Grupos de Interés. (AVO)
            <br>- Área de Extensión Universitaria, Proyección Social y Servicio Social. (AES)
            <br>- Área de Coordinación de la RSU en la Investigación y Formación Continua. (ACI)
          </p>
        </div>
      </li>

      

      <li>
        <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">¿DÓNDE SE ENCUENTRA LA DRSU EN LA UNJBG?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
          <p>
           Estamos ubicados en la Avenidad Miraflores S/N, Miraflores 23000 Tacna.
          </p>
        </div>
      </li>

      

    </ul>

  </div>
</section><!-- End PREGUNTAS FRECUENTES -->

</main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Contáctenos<span></span></h3>
                        <p>
                            Av. Miraflores S/N  <br>
                            Miraflores 23000<br>
                            Tacna, Perú <br><br>
                            <strong>Teléfono:</strong> (052) 544563<br>
                            <strong>Email:</strong> drsu@unjbg.edu.pe<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Enlaces de interés</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="index.php">Inicio</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="public/nosotros.php">Nosotros</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="public/autoridades.php">Autoridades</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="public/noticias.php">Noticias</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Nuestras Oficinas</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="public/areas.php">AVO</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="public/areas.php">AES</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="public/areas.php">ACI</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="public/areas.php">AEP</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>¿Necesita ayuda?</h4>
                        <p>Presione el botón para enviarnos un mensaje</p>
                        <a href="public/contacto.php" class="button-contact">Enviénos un mensaje</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>DRSU TEAM</span></strong>. Todos los derechos reservados.
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
                    Designed by <a href="index.php">DRSU TEAM</a>
                </div>
            </div>
            <div class="social-links text-center text-md-end pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
