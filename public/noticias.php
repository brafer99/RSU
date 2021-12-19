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

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>
                    <div class="section-title"><br/>
                        <h2>Noticias y Contenidos</h2>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista_noticias as $noticia){?>
            <tr>
                <td>
                    <div class="container"> 
                        <div class="row portfolio-container">

                            <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                    <img src="../drsu/assets/img/noticias/<?php echo $noticia['sql_noticia_imagen']; ?>" class="img-fluid img-thumbnail" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 portfolio-item filter-web">

                            <div class="card bg-light mb-3">
                                <div class="card-header text-center">
                                    <h2><?php echo $noticia['sql_noticia_titulo']?></h2>
                                </div>
                                <div class="card-body">
                                <p>
                                    <b><?php echo $noticia['sql_area_nombre']; ?></b></br></br> 
                                    <b>Estado de Evento: </b> <?php echo $noticia['sql_estado_nombre'];?></br> 
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
                                    if($primer=="https:" or $primer=="http:"){
                                    echo $noticia['sql_noticia_enlace'];   
                                    }else{
                                    echo "https://".$noticia['sql_noticia_enlace'];}
                                    ?>"target="_blank"">Click aquí</a> </br> 
                                    <?php }?>                                  
                                    <?php if($noticia['sql_noticia_descripcion']!=""){ ?>
                                    <b>Descripcion Adicional: </b> <?php echo $noticia['sql_noticia_descripcion']; ?> </br> 
                                    <?php }?>                
                                    <?php if($noticia['sql_noticia_lugar']!="") {?>    
                                    <b>Lugar: </b> <?php echo $noticia['sql_noticia_lugar']; ?> </br> 
                                    <?php }?>
                                </p>                                    
                                </div>
                            </div>                                       
                            </div>
                        </div>
                    </div>
                </td>                
            </tr>
            <?php } ?>            
        </tbody>
        
    </table> 
    </section>
<?php
require("logos.php");
require("footer.php");
?>