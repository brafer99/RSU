<?php 
require_once("header.php");
?>
<?php include ("../config/db.php"); 
$sentencia_sql= $conexion->prepare("SELECT 
drsu_noticia.sql_noticia_id, 
drsu_noticia.sql_noticia_titulo, 
drsu_noticia.sql_noticia_imagen, 
drsu_noticia.sql_noticia_fecha, 
drsu_noticia.sql_noticia_hora, 
drsu_noticia.sql_noticia_enlace, 
drsu_noticia.sql_noticia_area_id,
drsu_area.sql_area_sigla,  
drsu_area.sql_area_nombre,
drsu_noticia.sql_noticia_descripcion,
drsu_noticia.sql_noticia_lugar,   
drsu_noticia.sql_noticia_estado_id, 
drsu_estado.sql_estado_nombre 

FROM drsu_noticia 
JOIN drsu_area ON drsu_noticia.sql_noticia_area_id=drsu_area.sql_area_id 
JOIN drsu_estado ON drsu_noticia.sql_noticia_estado_id=drsu_estado.sql_estado_id 
ORDER BY drsu_noticia.sql_noticia_id DESC;");

$sentencia_sql->execute();
$lista_noticias=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
?>


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Noticias y Contenidos</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <!--INICIO CODIGO PHP -->

            <?php
            //lee los libros uno por uno con el for
            foreach($lista_noticias as $noticia){
            ?>



            <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="../assets/img/noticias/<?php echo $noticia['sql_noticia_imagen']; ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">                                                 
                        <div class="portfolio-links">
                            <a href="../assets/img/noticias/<?php echo $noticia['sql_noticia_imagen']; ?>" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 portfolio-item filter-web">
                        <p>
                        <b><?php echo $noticia['sql_area_nombre']; ?></b> </br></br> <b>Fecha: </b> <?php echo $noticia['sql_noticia_fecha']; ?> </br><b>Hora: </b> <?php echo $noticia['sql_noticia_hora']; ?> </br>
                        <b>Estado de Evento: </b> <?php echo $noticia['sql_estado_nombre']; ?> </br> 

                        <?php if($noticia['sql_noticia_enlace']!="") {?>
                        <b>Enlace de transmisión: </b> <a href="
                        <?php 
                            $url = $noticia['sql_noticia_enlace'];
                            $array = explode('/',$url);
                            $primer = $array[0];

                            if($primer=="https:" or $primer=="http:")
                            {
                                echo $noticia['sql_noticia_enlace'];   
                            }else
                                {echo "https://".$noticia['sql_noticia_enlace'];}
                            
                        ?>" target="_blank"">Click aquí</a> </br> 
                        <?php }?>
                       
                       <?php if($noticia['sql_noticia_descripcion']!=""){ ?>
                       <b>Descripcion: </b> <?php echo $noticia['sql_noticia_descripcion']; ?> </br> 
                       <?php }?>
                        
                       <?php if($noticia['sql_noticia_lugar']!="") {?>    
                       <b>Lugar: </b> <?php echo $noticia['sql_noticia_lugar']; ?> </br> 
                        <?php }?>
                        </p>
                        <div class="portfolio-wrap">
                        <!--<img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">-->
                    </div>
                </div>

            <?php } ?>
            <!-- FIN CODIGO PHP-->
            </div>
        </div>
    </section><!-- End Portfolio Section -->

<?php
require("logos.php");
require("footer.php");
?>