<?php require_once("header.php");?> 
<?php require_once("header.php");?>

<?php include ("../config/db.php"); 
$sentencia_sql= $conexion->prepare("SELECT 
    drsu_autoridad.sql_autoridad_id, 
    drsu_autoridad.sql_autoridad_nombre, 
    drsu_autoridad.sql_autoridad_imagen, 
    drsu_autoridad.sql_autoridad_email, 

    drsu_autoridad.sql_autoridad_area_id,
    drsu_area.sql_area_nombre,
    drsu_area.sql_area_sigla    

    FROM drsu_autoridad 
    JOIN drsu_area ON drsu_autoridad.sql_autoridad_area_id=drsu_area.sql_area_id 
 
    ORDER BY drsu_autoridad.sql_autoridad_id ASC;");

$sentencia_sql->execute();
$lista_autoridades=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Nuestras Autoridades</h2>

            </div>

            <div class="row">

                <?php foreach($lista_autoridades as $auto) { ?>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="../drsu/assets/img/autoridades/<?php echo $auto['sql_autoridad_imagen'] ?>" class="img-fluid img-thumbnail" alt="">
                        
                            
                          <div class="social">
                                <p><?php echo $auto['sql_autoridad_email'] ?></p>
                            </div>

                        </div>
                        <div class="member-info">
                            <div class="div-tam">
                            <h4><?php echo $auto['sql_autoridad_nombre'] ?></h4>
                            <span><?php echo $auto['sql_area_nombre']." (".$auto['sql_area_sigla'].")";?>  </span>

                            </div>
                    
                        </div>
                        
                    </div>
                </div>
                <?php  } ?>
         
            </div>

            </br></br>


            <div class="section-title">
                <h2>Nuestro Organigrama</h2>
            </div>

            <div class="row">
                <div class="imgg">
                    <img id="img-center" src="../assets/img/organigrama2.jpg" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->


<?php
require("logos.php");
require("footer.php");
?>