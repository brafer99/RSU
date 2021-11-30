<?php require('../drsu_template/header.php');?>

<?php 
$sentencia_sql= $conexion->prepare("SELECT 
    drsu_noticia.sql_noticia_id, 
    drsu_noticia.sql_noticia_titulo, 
    drsu_noticia.sql_noticia_imagen, 
    drsu_noticia.sql_noticia_fecha, 
    drsu_noticia.sql_noticia_hora, 
    drsu_noticia.sql_noticia_enlace,
    drsu_noticia.sql_noticia_descripcion,
    drsu_noticia.sql_noticia_lugar,
    drsu_noticia.sql_noticia_area_id,
    drsu_area.sql_area_sigla,  
    drsu_noticia.sql_noticia_estado_id, 
    drsu_estado.sql_estado_nombre 
    FROM drsu_noticia 
    JOIN drsu_area ON drsu_noticia.sql_noticia_area_id=drsu_area.sql_area_id 
    JOIN drsu_estado ON drsu_noticia.sql_noticia_estado_id=drsu_estado.sql_estado_id 
    ORDER BY drsu_noticia.sql_noticia_id DESC;");
$sentencia_sql->execute();
$lista_noticias=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);

$sentencia_sql_2= $conexion->prepare("SELECT * FROM drsu_area WHERE sql_area_jefatura=1");
$sentencia_sql_2->execute();
$lista_areas=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);

$sentencia_sql_3= $conexion->prepare("SELECT * FROM drsu_estado");
$sentencia_sql_3->execute();
$lista_estados=$sentencia_sql_3->fetchAll(PDO::FETCH_ASSOC);  
?>
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <br/><br/>
                <h2>Adiministrar Noticias</h2>
                <br/>
                
                 <a href="agregar.php"><button type="button"class="btn btn-success btn-lg">AGREGAR NUEVA NOTICIA</button></a>

                           
            </div>       
            <div class="row">
                <center>                                              
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                      
                               
                                <br/>
                                
                                <div class="table-responsive">
                                <table class="table  table-hover ">
                                    <thead class="thead-light " >
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Título</th>
                                            <th>Área</th>
                                            <th>Estado</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($lista_noticias as $noti) { ?>
                                    <tr>
                                        <td><img class="img-thumbnail rounded" src="../../assets/img/noticias/<?php echo $noti['sql_noticia_imagen'];?>" width="150px" alt=""></td>
                                        <td><h5><?php echo "<br/>".$noti['sql_noticia_titulo']?></h5></td>

                                        <td><h6><?php echo "<br/>".$noti['sql_area_sigla']?></h6></td>
                                        <td><h6><?php echo "<br/>".$noti['sql_estado_nombre']?></h6></td>
                                    <td>
                                        <br/>
                                        <form action="selec.php" method="post">
                                            <div class="cambio_boton">
                                            <input type="hidden" name="noticia_id" id="noticia_id" value="<?php echo $noti['sql_noticia_id'] ?>"/>
                                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>                                              
                                            </div>
                                        </form>
                                                                           
                                          <form action="eliminar.php" method="post">
                                            <div class="cambio_boton">
                                            <input type="hidden" name="noticia_id" id="noticia_id" value="<?php echo $noti['sql_noticia_id'] ?>"/>
                                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>                                                
                                            </div>
                                        </form>                                                                                                               
                                    </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                                 </div>

                            </div>
                        </div>
                    </div>
                </div>
                </center> 
            </div>
        </div>
    </section><!-- End Contact Section -->
<?php
require('../drsu_template/footer.php');
?>