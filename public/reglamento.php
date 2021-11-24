 <?php include ("../config/db.php"); 
$sentencia_sql= $conexion->prepare("SELECT 
    drsu_nosotros.sql_nosotros_pdf
    FROM drsu_nosotros
    WHERE sql_nosotros_categoria_id=4;");
$sentencia_sql->execute();
$nosotros = $sentencia_sql->fetch(PDO::FETCH_LAZY);
$var_nosotros_pdf=$nosotros['sql_nosotros_pdf'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reglamento DRSU</title>
    <link href="../assets/css/customstyle.css" rel="stylesheet">
</head>

<body>

    <center>
        <IFrame src="../assets/pdfs/<?php echo $var_nosotros_pdf;?>"></IFrame>
    </center>

</body>

</html>