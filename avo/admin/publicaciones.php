<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="DELETE FROM avo_publicacion WHERE id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="SELECT avo_publicacion.*, avo_tipo_publicacion.nombre FROM avo_publicacion,avo_tipo_publicacion
		WHERE avo_publicacion.id_tipo=avo_tipo_publicacion.id order by avo_publicacion.fecha DESC";
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Publicaciones</h4>
				   <h4 class="box-link"><button class="add-cat"><a href="manage_publicaciones.php"> + Agregar</a> </h4></button>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Tipo</th>
							   <th>Título</th>
							   <th>Imagen</th>
							   <th>Fecha</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['nombre']?></td>
							   <td><?php echo $row['titulo']?></td>
							   <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><?php echo $row['fecha']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='manage_publicaciones.php?id=".$row['id']."'>Editar</a></span>&nbsp;";
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>ELIMINAR</a></span>";
								?>
							   </td>
							</tr>
							<?php $i=$i+1;} ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>