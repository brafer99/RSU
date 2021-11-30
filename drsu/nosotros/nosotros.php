<?php require('../drsu_template/header.php');?>
<?php 

$sentencia_sql= $conexion->prepare("SELECT 
    drsu_nosotros.sql_nosotros_id,
    drsu_nosotros.sql_nosotros_titulo, 
    drsu_nosotros.sql_nosotros_descripcion, 
    drsu_nosotros.sql_nosotros_imagen,
    drsu_nosotros.sql_nosotros_pdf, 
    drsu_categoria.sql_categoria_nombre
    FROM drsu_nosotros
    JOIN drsu_categoria ON drsu_nosotros.sql_nosotros_categoria_id=drsu_categoria.sql_categoria_id 
    ORDER BY drsu_nosotros.sql_nosotros_id ASC;");
$sentencia_sql->execute();
$lista_nosotros=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
$sentencia_sql_2= $conexion->prepare("SELECT * FROM drsu_categoria");
$sentencia_sql_2->execute();
$lista_categorias=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);
?>

    <!-- ======= Team Section ======= -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <br/><br/>
                <h2>Adiministrar Nosotros</h2>
            </div>

            <div class="row">
                <center>
                <!-- TABLA -->                              
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">          
                                <h3>Lista de Nosotros</h3>
                                <br/>
                                <table class="table table-hover">
                                    <thead class="thead-light " >
                                        <tr>
                                            <th>Título</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($lista_nosotros as $noso) { ?>
                                    <tr>                                      
                                        <td><?php echo $noso['sql_categoria_nombre'] ?></td>
                                    <td>
                                        <form action="selec.php" method="post">
                                            <div class = "form-group">
                                                
                                                <input type="hidden" name="nosotros_id" id="nosotros_id" value="<?php echo $noso['sql_nosotros_id'] ?>"/>
                                                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>                                                                                            
                                                                                        
                                            </div>                                 
                                        </form>
                                    </td>
                                    </tr>
                                    <?php  } ?>
                                    </tbody>

                                </table>
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