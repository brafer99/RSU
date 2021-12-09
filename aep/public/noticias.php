<?php 
require_once("header.php");
?>
<?php include ("../../config/db.php"); 
$sentencia_sql= $conexion->prepare("SELECT 
aep_noticia.sql_noticia_id, 
aep_noticia.sql_noticia_titulo, 
aep_noticia.sql_noticia_imagen, 
aep_noticia.sql_noticia_fecha, 
aep_noticia.sql_noticia_hora, 
aep_noticia.sql_noticia_enlace, 
aep_noticia.sql_noticia_area_id,
aep_area.sql_area_sigla,  
aep_area.sql_area_nombre,
aep_noticia.sql_noticia_descripcion,
aep_noticia.sql_noticia_lugar,   
aep_noticia.sql_noticia_estado_id, 
aep_estado.sql_estado_nombre 

FROM aep_noticia 
JOIN aep_area ON aep_noticia.sql_noticia_area_id=aep_area.sql_area_id 
JOIN aep_estado ON aep_noticia.sql_noticia_estado_id=aep_estado.sql_estado_id 
ORDER BY aep_noticia.sql_noticia_id DESC;");

$sentencia_sql->execute();
$lista_noticias=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
?>


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <br/>
                <h2>Noticias y Contenidos</h2>
            </div>
            <br/>


            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <!--INICIO CODIGO PHP -->

            <?php
            //lee los libros uno por uno con el for
            foreach($lista_noticias as $noticia){
            ?>


                
            <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                <br/>

                <div class="portfolio-wrap">
                    <img src="../assets/img/noticias/<?php echo $noticia['sql_noticia_imagen']; ?>" class="img-fluid img-thumbnail" alt="">
                    <div class="portfolio-info">                                                 
                        <div class="portfolio-links">
                            <a href="../assets/img/noticias/<?php echo $noticia['sql_noticia_imagen'];?>" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title=""><i class="bx bx-plus"></i></a>                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 portfolio-item filter-web">
                <br/>

                        <h2><?php echo $noticia['sql_noticia_titulo']?></h2>
                        <br/>
                        <p>
                        <b><?php echo $noticia['sql_area_nombre']; ?></b> </br></br> 

                         <b>Estado de Evento: </b> <?php echo $noticia['sql_estado_nombre']; ?> </br> 


                       <?php if($noticia['sql_noticia_fecha']!=""){ ?>
                       <b>Fecha: </b> <?php echo $noticia['sql_noticia_fecha']; ?> </br>
                       <?php }?>

                        <?php if($noticia['sql_noticia_hora']!=""){ ?>
                     <b>Hora: </b> <?php echo $noticia['sql_noticia_hora']; ?> </br>
                       <?php }?>

                        
                       
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
                       <b>Descripcion Adicional: </b> <?php echo $noticia['sql_noticia_descripcion']; ?> </br> 
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
require("footer.php");
?>