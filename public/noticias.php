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
drsu_noticia.sql_noticia_graba,
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

    <table class="table table-borderless" id="example">
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
                                
                                    <p class="text-center"><b><?php echo $noticia['sql_area_nombre']; ?></b></p></br>

                                    <p ><b>Estado: </b> <?php echo $noticia['sql_estado_nombre'].'.';?></p>

                                    <?php if($noticia['sql_noticia_fecha']!=""){ ?>
                                    <p><b>Fecha: </b> <?php echo $noticia['sql_noticia_fecha']; ?></p>
                                    <?php }?>
                                    <?php if($noticia['sql_noticia_hora']!=""){ ?>
                                    <p><b>Hora: </b> <?php echo $noticia['sql_noticia_hora']; ?></p>
                                    <?php }?>

                                    <?php if($noticia['sql_noticia_enlace']!="") {?>
                                    <p><b>Enlace de transmisión: </b> <a href="
                                    <?php 
                                    $url = $noticia['sql_noticia_enlace'];
                                    $array = explode('/',$url);
                                    $primer = $array[0];
                                    if($primer=="https:" or $primer=="http:"){
                                    echo $noticia['sql_noticia_enlace'];   
                                    }else{
                                    echo "https://".$noticia['sql_noticia_enlace'];}
                                    ?>"target="_blank"">Click aquí!</a></p> 
                                    <?php }?> 

                                    <?php if($noticia['sql_noticia_graba']!="") {?>
                                    <p><b>Grabación: </b> <a href="
                                    <?php 
                                    $url = $noticia['sql_noticia_graba'];
                                    $array = explode('/',$url);
                                    $primer = $array[0];
                                    if($primer=="https:" or $primer=="http:"){
                                    echo $noticia['sql_noticia_graba'];   
                                    }else{
                                    echo "https://".$noticia['sql_noticia_graba'];}
                                    ?>"target="_blank"">Click aquí!</a></p> 
                                    <?php }?> 
                                    <?php if($noticia['sql_noticia_lugar']!="") {?>    
                                    <p><b>Lugar: </b> <?php echo $noticia['sql_noticia_lugar']; ?></p> 
                                    <?php }?>
                                    <?php if($noticia['sql_noticia_descripcion']!=""){ ?>
                                    <p><b>Descripcion Adicional: </b> <?php echo $noticia['sql_noticia_descripcion']; ?></p> 
                                    <?php }?>                

                                                                    
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
<script>
    $(document).ready( function () {
$('#example').DataTable({
    ordering: false,
    "searching": false,
    bInfo: false,
    bLengthChange: false,
    
    
    
    
    
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],

                "language": {

                        "sProcessing": "Procesando ...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
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
        "sLast": "Último",
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