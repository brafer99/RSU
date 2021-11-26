<?php
include('dbconect.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $nombre = "";
                if(isset($Row[0])) {
                    $nombre = mysqli_real_escape_string($con,$Row[0]);
                }
                
                $apellido = "";
                if(isset($Row[1])) {
                    $apellido = mysqli_real_escape_string($con,$Row[1]);
                }
				
                $codigo = "";
                if(isset($Row[2])) {
                    $codigo = mysqli_real_escape_string($con,$Row[2]);
                }
				
                $edad = "";
                if(isset($Row[3])) {
                    $edad = mysqli_real_escape_string($con,$Row[3]);
                }

                $cedula = "";
                if(isset($Row[4])) {
                    $cedula = mysqli_real_escape_string($con,$Row[4]);
                }
                
                $telefono = "";
                if(isset($Row[5])) {
                    $telefono = mysqli_real_escape_string($con,$Row[5]);
                }
				
                $correo = "";
                if(isset($Row[6])) {
                    $correo = mysqli_real_escape_string($con,$Row[6]);
                }
				
                $facultad = "";
                if(isset($Row[7])) {
                    $facultad = mysqli_real_escape_string($con,$Row[7]);
                }

                $escuela = "";
                if(isset($Row[8])) {
                    $escuela = mysqli_real_escape_string($con,$Row[8]);
                }
                
                $fecha_nac = "";
                if(isset($Row[9])) {
                    $fecha_nac = mysqli_real_escape_string($con,$Row[9]);
                }
				
                $observaciones = "";
                if(isset($Row[10])) {
                    $observaciones = mysqli_real_escape_string($con,$Row[10]);
                }
                
                if (!empty($nombre) || !empty($apellido) || !empty($codigo) || !empty($edad) || !empty($cedula) || !empty($telefono) || !empty($correo) || !empty($facultad) || !empty($escuela) || !empty($fecha_nac) || !empty($observaciones)) {
                    $query = "insert into alumnos(nombre,apellido, codigo, edad,cedula,telefono,correo,facultad,escuela,fecha_nac,observaciones) values('".$nombre."','".$apellido."','".$codigo."','".$edad."','".$cedula."','".$telefono."','".$correo."','".$facultad."','".$escuela."','".$fecha_nac."','".$observaciones."')";
                    $resultados = mysqli_query($con, $query);
                
                    if (! empty($resultados)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                    } else {
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">
<title>Importar archivo de Excel</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="assets/style.css" rel="stylesheet">

</head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">Inportar Excel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Importar archivo de Excel</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Elija Archivo Excel</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Importar Registros</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "SELECT * FROM alumnos";
    $result = mysqli_query($con, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Codigo</th>
                <th>Nota o puntaje</th>
                <th>DNI</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Facultad</th>
                <th>Escuela</th>
                <th>Año</th>
                <th>Observaciones</th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
            <td><?php  echo $row['nombre']; ?></td>
            <td><?php  echo $row['apellido']; ?></td>
            <td><?php  echo $row['codigo']; ?></td>
            <td><?php  echo $row['edad']; ?></td>
            <td><?php  echo $row['cedula']; ?></td>
            <td><?php  echo $row['telefono']; ?></td>
            <td><?php  echo $row['correo']; ?></td>
            <td><?php  echo $row['facultad']; ?></td>
            <td><?php  echo $row['escuela']; ?></td>
            <td><?php  echo $row['fecha_nac']; ?></td>
            <td><?php  echo $row['observaciones']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p><a href="#" target="_blank"></a></p>
    </span> </div>
</footer>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>