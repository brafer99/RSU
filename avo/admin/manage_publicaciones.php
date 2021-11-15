<?php
require('top.inc.php');
$id_tipo='';
$titulo='';
$descripcion='';
$image='';
$fecha	='';

$msg='';
$image_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"SELECT * FROM avo_publicacion WHERE id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$id_tipo=$row['id_tipo'];
		$titulo=$row['titulo'];
		$descripcion=$row['descripcion'];
		$fecha=$row['fecha'];
	}else{
		header('location:publicaciones.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$id_tipo=get_safe_value($con,$_POST['id_tipo']);
	$titulo=get_safe_value($con,$_POST['titulo']);
	$descripcion=get_safe_value($con,$_POST['descripcion']);
	$fecha=get_safe_value($con,$_POST['fecha']);
	
	$res=mysqli_query($con,"SELECT * FROM avo_publicacion WHERE titulo='$titulo'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
				$msg='';
			}else{
				$msg="Publicación ya existente";
			}
		}else{
			$msg="Publicación ya existente";
		}
	}
	
	
	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Seleccione sólo el formato de imagen: png, jpg y jpeg";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Seleccione sólo el formato de imagen: png, jpg y jpeg";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update avo_publicacion set id_tipo='$id_tipo', titulo='$titulo', descripcion='$descripcion',
							fecha='$fecha',image='$image' where id='$id'";
			}else{
				$update_sql="update avo_publicacion set id_tipo='$id_tipo', titulo='$titulo', descripcion='$descripcion',
							fecha='$fecha' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"INSERT INTO avo_publicacion(id_tipo,titulo,descripcion,image,fecha) 
						VALUES ('$id_tipo','$titulo','$descripcion','$image','$fecha')");
		}
		?>
		<script>
			window.location.href="publicaciones.php";
		</script>
		<?php
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>DATOS PUBLICACION</strong></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Tipo</label>
									<select class="form-control" name="id_tipo">
										<option>Seleccione tipo de publicación</option>
										<?php
										$res=mysqli_query($con,"SELECT id,nombre FROM avo_tipo_publicacion ORDER BY nombre DESC");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$id_tipo){
												echo "<option selected value=".$row['id'].">".$row['nombre']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['nombre']."</option>";
											}
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Título de la publicación</label>
									<input type="text" name="titulo" placeholder="Ingrese el título de la publicación" class="form-control" required value="<?php echo $titulo?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Descripción</label>
									<input type="text" name="descripcion" placeholder="Ingrese la descripción" class="form-control" required value="<?php echo $descripcion?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Imagen</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>
								
								<div class="form-group">
								<label for="categories" class=" form-control-label">Fecha del evento/noticia</label>
								<input type="date" name="fecha" min="2020-01-01" max="2030-12-31" class="form-control" required value="<?php echo $fecha ?>">
							</div>
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Registrar</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>