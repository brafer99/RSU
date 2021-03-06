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
                                <div class="table-responsive">
                                    </br>
                                <table class="table  table-hover" id="example">
                                   
                                    <thead class="thead-light " >
                                    
                                        <tr>
                                            <th>Imagen</th>
                                            <th>T??tulo</th>
                                            <th>??rea</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($lista_noticias as $noti) { ?>
                                    <tr>
                                        <td><img class="img-thumbnail rounded" src="../assets/img/noticias/<?php echo $noti['sql_noticia_imagen'];?>" width="150px" alt=""></td>
                                        <td><h5><?php echo "<br/>".$noti['sql_noticia_titulo']?></h5></td>

                                        <td><h6><?php echo "<br/>".$noti['sql_area_sigla']?></h6></td>
                                        <td><h6><?php echo "<br/>".$noti['sql_estado_nombre']?></h6></td>
                                    <td>
                                        <div class="botones_drsu">

                                        <div class="boton_drsu">                           
                                            <form action="selec.php" method="post">
                                            <input type="hidden" name="noticia_id" id="noticia_id" value="<?php echo $noti['sql_noticia_id'] ?>"/>      
                                            <button type="submit" name="accion" value= "Seleccionar" class="btn btn-warning btn-sm"><img src="../../assets/img/icons/editar.png"></button>  
                                            </form>  
                                        </div>  
                                        <div class="boton_drsu">                        
                                            <form action="eliminar.php" method="post">
                                            <input type="hidden" name="noticia_id" id="noticia_id" value="<?php echo $noti['sql_noticia_id'] ?>"/>                                
                                            <button type="submit" name="accion" value= "Borrar" class="btn btn-danger btn-sm" onclick="return ConfirmDelete()"><img src="../../assets/img/icons/eliminar.png"></button>                       
                                            </form>
                                        </div>

                                        </div>                                                                                                               
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
<script>
    $(document).ready( function () {
$('#example').DataTable({
    ordering: false,
    bInfo: false,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],

                "language": {

                        "sProcessing": "Procesando ...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ning??n dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando ...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "??ltimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "botones": {
        "copiar": "Copiar",
        "colvis": "Visibilidad"
    }
                    
        }
    });
} );

</script>
<script>
    function ConfirmDelete(){
        var respuesta = confirm("??Seguro que deseas ELIMINAR?");
        if(respuesta==true){
            return true;
        }else{
            return false;
        }
    }
</script>
<?php
    if(isset($_GET['action'])){
    if($_GET['action']=="modificar"){
        echo "<script>alert('Se guardaron los datos!');</script>";
        echo "<script>location.href='noticia.php';</script>";
    }
    if($_GET['action']=="agregar"){
        echo "<script>alert('Se Agreg?? nueva noticia!');</script>"; 
        echo "<script>location.href='noticia.php';</script>";
    }}
?>