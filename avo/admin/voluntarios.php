<?php
require('top.inc.php');

/*if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}*/

/*$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by categories.categories asc";*/
$sql = "SELECT voluntarios.id, voluntarios.nombres, voluntarios.apellidos, tipo_voluntario.t_nombre, facultad.f_siglas, escuela.e_siglas 
		FROM voluntarios, tipo_voluntario, escuela, facultad
 		WHERE (voluntarios.tipo = tipo_voluntario.id AND voluntarios.id_escuela = escuela.id AND escuela.id_facultad = facultad.id)";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Voluntarios </h4>
				   <h4 class="box-link"><button class="add-cat"><a href="manage_voluntario.php"> + Agregar</a> </h4></button>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Tipo</th>
							   <th>Nombres</th>
							   <th>Apellidos</th>
							   <th>Escuela</th>
							   <th>Facultad</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['t_nombre']?></td>
							   <td><?php echo $row['nombres']?></td>
							   <td><?php echo $row['apellidos']?></td>
							   <td><?php echo $row['e_siglas']?></td>
							   <td><?php echo $row['f_siglas']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='manage_voluntario.php?id=".$row['id']."'>Editar</a></span>&nbsp;";								
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