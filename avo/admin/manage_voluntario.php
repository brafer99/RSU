<?php
require('top.inc.php');

$id_escuela = 'NULL';
$nombres = '';
$apellidos = '';
$dni = '';
$fecha_nac = '';
$codigo = '';
$celular = '';
$email = '';
$tipo = '';

$msg = '';

if (isset($_GET['id']) && $_GET['id'] != '') {

	$id = get_safe_value($con, $_GET['id']);
	$res = mysqli_query($con, "select * from avo_voluntarios where id='$id'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		$row = mysqli_fetch_assoc($res);
		$id_escuela = $row['id_escuela'];
		$nombres = $row['nombres'];
		$apellidos = $row['apellidos'];
		$dni = $row['dni'];
		$fecha_nac = $row['fecha_nac'];
		$codigo = $row['codigo'];
		$celular = $row['celular'];
		$email = $row['email'];
		$tipo = $row['tipo'];
	} else {
		header('location:voluntarios.php');
		die();
	}
}

if (isset($_POST['submit'])) {
	$id_escuela = get_safe_value($con, $_POST['id_escuela']);
	$nombres = get_safe_value($con, $_POST['nombres']);
	$apellidos = get_safe_value($con, $_POST['apellidos']);
	$dni = get_safe_value($con, $_POST['dni']);
	$fecha_nac = get_safe_value($con, $_POST['fecha_nac']);
	$codigo = get_safe_value($con, $_POST['codigo']);
	$celular = get_safe_value($con, $_POST['celular']);
	$email = get_safe_value($con, $_POST['email']);
	$tipo = get_safe_value($con, $_POST['tipo']);

	$res = mysqli_query($con, "SELECT * FROM avo_voluntarios WHERE dni='$dni'");
	$check = mysqli_num_rows($res);
	if ($check > 0) {
		if (isset($_GET['id']) && $_GET['id'] != '') {
			$getData = mysqli_fetch_assoc($res);
			if ($id == $getData['id']) {
				$msg = '';
			} else {
				$msg = "Voluntario ya registrado";
			}
		} else {
			$msg = "Voluntario ya registrado";
		}
	}
		if ($msg == '') {
			if (isset($_GET['id']) && $_GET['id'] != '') {
				$update_sql = "UPDATE avo_voluntarios SET id_escuela='$id_escuela',nombres='$nombres',apellidos='$apellidos',
				dni='$dni',fecha_nac='$fecha_nac',celular='$celular',email='$email',tipo='$tipo' WHERE id='$id'";
				mysqli_query($con, $update_sql);
			} else {
				mysqli_query($con, "INSERT INTO avo_voluntarios(id_escuela,nombres,apellidos,dni,fecha_nac,celular,email,tipo) 
				VALUES('$id_escuela','$nombres','$apellidos','$dni','$fecha_nac','$celular','$email','$tipo')");					
			}	
			?>
			<script>
				window.location.href = "voluntarios.php";
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
					<div class="card-header"><strong>DATOS DEL VOLUNTARIO</strong></div>
					<form method="post" enctype="multipart/form-data">
						<div class="card-body card-block">
							<div class="form-group">
								<label for="categories" class=" form-control-label">Escuela Profesional</label>
								<select class="form-control" name="id_escuela">
									<option>Seleccione Escuela Profesional</option>
									<?php
									$res = mysqli_query($con, "select id,e_nombre,e_siglas from avo_escuela order by e_nombre asc");
									while ($row = mysqli_fetch_assoc($res)) {
										if ($row['id'] == $id_escuela) {
											echo "<option selected value=" . $row['id'] . ">" . $row['e_nombre'] . "</option>";
										} else {
											echo "<option value=" . $row['id'] . ">" . "[".$row['e_siglas'] . "] ". $row['e_nombre'] . "</option>";
										}
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="categories" class=" form-control-label">Tipo de Voluntario</label>
								<select class="form-control" name="tipo">
									<option>Seleccione tipo de voluntario</option>
									<?php
									$res = mysqli_query($con, "select id,t_nombre from avo_tipo_voluntario order by t_nombre asc");
									while ($row = mysqli_fetch_assoc($res)) {
										if ($row['id'] == $tipo) {
											echo "<option selected value=" . $row['id'] . ">" . $row['t_nombre'] . "</option>";
										} else {
											echo "<option value=" . $row['id'] . ">" . $row['t_nombre'] . "</option>";
										}
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="categories" class=" form-control-label">Nombres</label>
								<input type="text" name="nombres" placeholder="Ingrese nombres del voluntario" class="form-control" required value="<?php echo $nombres ?>">
							</div>

							<div class="form-group">
								<label for="categories" class=" form-control-label">Apellidos</label>
								<input type="text" name="apellidos" placeholder="Ingrese apellidos del voluntario" class="form-control" required value="<?php echo $apellidos ?>">
							</div>

							<div class="form-group">
								<label for="categories" class=" form-control-label">DNI</label>
								<input type="number" min="0" step="1" name="dni" placeholder="Ingrese DNI del voluntario" class="form-control" required value="<?php echo $dni ?>">
							</div>

							<div class="form-group">
								<label for="categories" class=" form-control-label">Fecha de Nacimiento</label>
								<input type="date" name="fecha_nac" min="1900-01-01" max="2020-12-31" class="form-control" required value="<?php echo $fecha_nac ?>">
							</div>

							<div class="form-group">
								<label for="categories" class=" form-control-label">Celular</label>
								<input type="number" name="celular" min="0" max="999999999" step="1" placeholder="Ingrese celular del voluntario" class="form-control" required value="<?php echo $celular ?>">
							</div>

							<div class="form-group">
								<label for="categories" class=" form-control-label">E-mail</label>
								<input type="email" name="email" placeholder="Ingrese email del voluntario" class="form-control" required value="<?php echo $email ?>">
							</div>

							<button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
								<span id="payment-button-amount">Registrar</span>
							</button>
							<div class="field_error"><?php echo $msg ?></div>
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