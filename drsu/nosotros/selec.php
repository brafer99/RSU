<?php require('../drsu_template/header.php');?>
<?php 

//variables obteniendo varlor POST de formulario:
//datos de tabla
$var_nosotros_id = (isset($_POST['nosotros_id']))?$_POST['nosotros_id']:"";
$var_nosotros_titulo = (isset($_POST['nosotros_titulo']))?$_POST['nosotros_titulo']:"";
$var_nosotros_descripcion = (isset($_POST['nosotros_descripcion']))?$_POST['nosotros_descripcion']:"";
$var_nosotros_imagen = (isset($_FILES['nosotros_imagen']['name'])) ? $_FILES['nosotros_imagen']['name'] :"";
$var_nosotros_pdf = (isset($_FILES['nosotros_pdf']['name'])) ? $_FILES['nosotros_pdf']['name'] :"";
$var_nosotros_categoria_id = (isset($_POST['nosotros_categoria_id']))?$_POST['nosotros_categoria_id']:"";
//opciones de tabla
$var_accion = (isset($_POST['accion']))?$_POST['accion']:"";

if($var_accion=="Seleccionar"){

        //Seleccionamos informacion mediante INNER JOIN:
        $sentencia_sql= $conexion->prepare("SELECT 
        drsu_nosotros.sql_nosotros_titulo,
        drsu_nosotros.sql_nosotros_descripcion,
        drsu_nosotros.sql_nosotros_imagen,
        drsu_nosotros.sql_nosotros_pdf,
        drsu_nosotros.sql_nosotros_categoria_id,
        drsu_categoria.sql_categoria_id,
        drsu_categoria.sql_categoria_nombre

        FROM drsu_nosotros 
        JOIN drsu_categoria ON drsu_nosotros.sql_nosotros_categoria_id=drsu_categoria.sql_categoria_id 
        WHERE sql_nosotros_id=:param_nosotros_id;");

        $sentencia_sql->bindParam(':param_nosotros_id',$var_nosotros_id);
        $sentencia_sql->execute();


        //FETCH_LAZY CARGA LOS DATOS UNO A UNO:
        $nosotros = $sentencia_sql->fetch(PDO::FETCH_LAZY);

        //rellenamos los imputs
        $var_nosotros_titulo=$nosotros['sql_nosotros_titulo'];
        $var_nosotros_descripcion=$nosotros['sql_nosotros_descripcion'];
        $var_nosotros_imagen=$nosotros['sql_nosotros_imagen'];
        $var_nosotros_pdf=$nosotros['sql_nosotros_pdf'];

        //boton select de area:
        $var_nosotros_categoria_id_2=$nosotros['sql_nosotros_categoria_id'];
        $var_categoria_nombre=$nosotros['sql_categoria_nombre'];
        
}

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
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <br/><br/>
                <h2>Adiministrar Nosotros</h2>
            </div>
             <?php require('formulario.php');?>
        </div>
    </section><!-- End Contact Section -->

<?php
require('../drsu_template/footer.php');
?>