<?php require_once("header.php");?>  
 <?php include ("../config/db.php"); 
$sentencia_sql= $conexion->prepare("SELECT 
    drsu_nosotros.sql_nosotros_id,
    drsu_nosotros.sql_nosotros_titulo, 
    drsu_nosotros.sql_nosotros_descripcion, 
    drsu_nosotros.sql_nosotros_imagen,
    drsu_categoria.sql_categoria_nombre
    FROM drsu_nosotros
    JOIN drsu_categoria ON drsu_nosotros.sql_nosotros_categoria_id=drsu_categoria.sql_categoria_id 
    WHERE drsu_nosotros.sql_nosotros_categoria_id=1;");
$sentencia_sql->execute();
$lista_presentacion=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);

$sentencia_sql= $conexion->prepare("SELECT 
    drsu_nosotros.sql_nosotros_id,
    drsu_nosotros.sql_nosotros_titulo, 
    drsu_nosotros.sql_nosotros_descripcion, 
    drsu_nosotros.sql_nosotros_imagen,
    drsu_categoria.sql_categoria_nombre
    FROM drsu_nosotros
    JOIN drsu_categoria ON drsu_nosotros.sql_nosotros_categoria_id=drsu_categoria.sql_categoria_id 
    WHERE drsu_nosotros.sql_nosotros_categoria_id=2;");
$sentencia_sql->execute();
$lista_mision=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);

$sentencia_sql= $conexion->prepare("SELECT 
    drsu_nosotros.sql_nosotros_id,
    drsu_nosotros.sql_nosotros_titulo, 
    drsu_nosotros.sql_nosotros_descripcion, 
    drsu_nosotros.sql_nosotros_imagen,
    drsu_categoria.sql_categoria_nombre
    FROM drsu_nosotros
    JOIN drsu_categoria ON drsu_nosotros.sql_nosotros_categoria_id=drsu_categoria.sql_categoria_id 
    WHERE drsu_nosotros.sql_nosotros_categoria_id=3;");
$sentencia_sql->execute();
$lista_vision=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);

$sentencia_sql= $conexion->prepare("SELECT 
    drsu_nosotros.sql_nosotros_id,
    drsu_nosotros.sql_nosotros_titulo, 
    drsu_nosotros.sql_nosotros_descripcion, 
    drsu_nosotros.sql_nosotros_imagen,
    drsu_categoria.sql_categoria_nombre
    FROM drsu_nosotros
    JOIN drsu_categoria ON drsu_nosotros.sql_nosotros_categoria_id=drsu_categoria.sql_categoria_id 
    WHERE drsu_nosotros.sql_nosotros_categoria_id=4;");
$sentencia_sql->execute();
$lista_reglamento=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
?>

    <section class="nosotros">
        <div class="presentacion">
            <h1>DIRECCIÓN ACADÉMICA DE RESPONSABILIDAD SOCIAL UNIVERSITARIA</h1>
        </div>
    </section>
    <section id="tabs" class="tabs">
        <div class="container" data-aos="fade-up">
            <ul class="nav nav-tabs row d-flex">
                <li class="nav-item col-3">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                        <i class="ri-gps-line"></i>
                        <h4 class="d-none d-lg-block">PRESENTACIÓN</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                        <i class="bi bi-graph-up"></i>
                        <h4 class="d-none d-lg-block">MISIÓN</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                        <i class="bi bi-eye-fill"></i>
                        <h4 class="d-none d-lg-block">VISIÓN</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                        <i class="bi bi-newspaper"></i>
                        <h4 class="d-none d-lg-block">REGLAMENTO</h4>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                    <div class="row">
                        <?php foreach($lista_presentacion as $presentacion) { ?>
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">                               
                            <h3><?php echo $presentacion['sql_categoria_nombre'] ?></h3>
                            <h5><?php echo $presentacion['sql_nosotros_titulo'] ?></h5>
                            <p><?php echo $presentacion['sql_nosotros_descripcion'] ?></p>
                            </br>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="../assets/img/nosotros/<?php echo $presentacion['sql_nosotros_imagen'] ?>" alt="" class="img-fluid">
                        </div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab-2">
                    <div class="row">
                        <?php foreach($lista_mision as $mision) { ?>
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">                               
                            <h3><?php echo $mision['sql_categoria_nombre'] ?></h3>
                            <h5><?php echo $mision['sql_nosotros_titulo'] ?></h5>
                            <p><?php echo $mision['sql_nosotros_descripcion'] ?></p>
                            </br>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="../assets/img/nosotros/<?php echo $mision['sql_nosotros_imagen'] ?>" alt="" class="img-fluid">
                        </div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab-3">
                    <div class="row">
                        <?php foreach($lista_vision as $vision) { ?>
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">                               
                            <h3><?php echo $vision['sql_categoria_nombre'] ?></h3>
                            <h5><?php echo $vision['sql_nosotros_titulo'] ?></h5>
                            <p><?php echo $vision['sql_nosotros_descripcion'] ?></p>
                            </br>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="../assets/img/nosotros/<?php echo $vision['sql_nosotros_imagen'] ?>" alt="" class="img-fluid">
                        </div>
                        <?php  } ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab-4">
                    <div class="row">
                        <?php foreach($lista_reglamento as $reglamento) { ?>
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">                               
                            <h3><?php echo $reglamento['sql_categoria_nombre'] ?></h3>
                            <h5><?php echo $reglamento['sql_nosotros_titulo'] ?></h5>
                            <p><?php echo $reglamento['sql_nosotros_descripcion'].' '?><a href="reglamento.php" target="_blank">Click aquí</a></p>
                            </br>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                            <img src="../assets/img/nosotros/<?php echo $reglamento['sql_nosotros_imagen'] ?>" alt="" class="img-fluid">
                        </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Tabs Section : PRESENTACION, MISION, VISION Y REGLAMENTO -->
<?php
require("logos.php");
require("footer.php");
?>
