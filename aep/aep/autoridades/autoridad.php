<?php require('../drsu_template/header.php');?>
<?php 
$sentencia_sql= $conexion->prepare("SELECT 
    aep_autoridad.sql_autoridad_id, 
    aep_autoridad.sql_autoridad_nombre, 
    aep_autoridad.sql_autoridad_imagen, 
    aep_autoridad.sql_autoridad_email, 
    aep_autoridad.sql_autoridad_area_id,
    aep_area.sql_area_nombre, 
    aep_area.sql_area_sigla
    FROM aep_autoridad 
    JOIN aep_area ON aep_autoridad.sql_autoridad_area_id=aep_area.sql_area_id 
    ORDER BY aep_autoridad.sql_autoridad_id ASC;");

$sentencia_sql->execute();
$lista_autoridades=$sentencia_sql->fetchAll(PDO::FETCH_ASSOC);

$sentencia_sql_2= $conexion->prepare("SELECT * FROM aep_area");
$sentencia_sql_2->execute();
$lista_areas=$sentencia_sql_2->fetchAll(PDO::FETCH_ASSOC);
     
?>
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <br/><br/>
                <h2>Adiministrar Autoridades</h2>
            </div>
            <div class="row">
            <center>
                <!-- TABLA -->                              
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">          
                                <h3>Lista de Autoridades</h3>
                                <br/>
                                <table class="table table-hover">
                                   <thead class="thead-light " >
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Sigla</th>
                                            <th>Área</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($lista_autoridades as $auto) { ?>
                                    <tr>
                                        <td><?php echo $auto['sql_autoridad_nombre']; ?></td>
                                        <td><?php echo $auto['sql_area_sigla'];?></td>
                                        <td><?php echo $auto['sql_area_nombre'];?></td>                                                                                                                   
                                    <td>
                                        <form action="selec.php" method="post">
                                            <div class ="form-group">
                                                <div class="cambio_boton">
                                                <input type="hidden" name="autoridad_id" id="autoridad_id" value="<?php echo $auto['sql_autoridad_id']; ?>"/>
                                                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>                                                                                            
                                            </div>                                            
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