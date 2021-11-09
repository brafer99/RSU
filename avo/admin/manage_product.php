<?php
require('top.inc.php');
$categories_id='';
$name='';
$price='';
$image='';
$short_description	='';
$description	='';
$preference = 0;

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$name=$row['name'];
		$price=$row['price'];
		$short_description=$row['short_description'];
		$description=$row['description'];
		$preference = $row['preference'];

	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$price=get_safe_value($con,$_POST['price']);
	$short_description=get_safe_value($con,$_POST['short_description']);
	$description=get_safe_value($con,$_POST['description']);
	$preference = get_safe_value($con,$_POST['preference']);
	
	$res=mysqli_query($con,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Producto ya existente";
			}
		}else{
			$msg="Producto ya existente";
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
				$update_sql="update product set categories_id='$categories_id',name='$name',price='$price',short_description='$short_description',description='$description',image='$image',preference='$preference' where id='$id'";
			}else{
				$update_sql="update product set categories_id='$categories_id',name='$name',price='$price',short_description='$short_description',description='$description',preference='$preference' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into product(categories_id,name,price,short_description,description,status,image,preference) values('$categories_id','$name','$price','$short_description','$description',1,'$image','$preference')");
		}
		?>
		<script>
			window.location.href="product.php";
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
                        <div class="card-header"><strong>AGREGAR PRODUCTO</strong></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categoría</label>
									<select class="form-control" name="categories_id">
										<option>Seleccione Categoría</option>
										<?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Nombre del producto</label>
									<input type="text" name="name" placeholder="Ingrese nombre del producto" class="form-control" required value="<?php echo $name?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Precio</label>
									<input type="text" name="price" placeholder="Ingrese precio del producto" class="form-control" required value="<?php echo $price?>">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Imagen</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Descripción corta</label>
									<textarea name="short_description" placeholder="Ingrese descripción corta del producto" class="form-control" required><?php echo $short_description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Descripción</label>
									<textarea name="description" placeholder="Ingrese descripción del producto" class="form-control" required><?php echo $description?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Recomendado por el Chef</label>
									<select class="form-control" name="preference">
										<option>Seleccione...</option>
										<option value="1">SI</option>
										<option value="0">NO</option>
									</select>
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