<?php
require('top.inc.php');

if(isset($_POST['submit'])) {
	$anio = $_POST['anio'];
}else{
	if ($_GET['flag']==1){
		$anio = $_GET['anio'];
	}else{
		$anio=date('Y');
	}
}

$sql = "SELECT avo_voluntarios.id, avo_voluntarios.nombres, avo_voluntarios.apellidos, avo_tipo_voluntario.t_nombre, avo_facultad.f_siglas, avo_escuela.e_siglas 
		FROM avo_voluntarios, avo_tipo_voluntario, avo_escuela, avo_facultad, avo_anio
 		WHERE (avo_voluntarios.tipo = avo_tipo_voluntario.id AND avo_voluntarios.id_escuela = avo_escuela.id 
		AND avo_escuela.id_facultad = avo_facultad.id AND avo_voluntarios.anio = avo_anio.anio) AND (avo_voluntarios.anio = $anio)";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="box-title">Voluntarios <?php echo ($anio); ?></h4>
						<h4 class="box-link"><button class="add-cat"><a href="manage_voluntario.php"> + Agregar</a> </h4></button>
					</div>

					<div class="search-container">
						<form action="search.php" method="post">
							<input type="text" placeholder="Buscar..." name="search">
							<input type="hidden" name="anio" value="<?php echo $anio; ?>">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
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
									$i = 1;
									while ($row = mysqli_fetch_assoc($res)) { ?>
										<tr>
											<td class="serial"><?php echo $i ?></td>
											<td><?php echo $row['t_nombre'] ?></td>
											<td><?php echo $row['nombres'] ?></td>
											<td><?php echo $row['apellidos'] ?></td>
											<td><?php echo $row['e_siglas'] ?></td>
											<td><?php echo $row['f_siglas'] ?></td>
											<td>
												<?php
												echo "<span class='badge badge-edit'><a href='manage_voluntario.php?id=" . $row['id'] . "&anio=". $anio ."'>Editar</a></span>&nbsp;";
												echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>ELIMINAR</a></span>";
												?>
											</td>
										</tr>
									<?php $i = $i + 1;
									} ?>
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