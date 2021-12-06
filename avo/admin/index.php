<?php
require('top.inc.php');
?>
<div class="content pb-0">
	<div class="orders">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<h4 class="box-title">SELECCIONE AÑO ANTES DE CONTINUAR </h4>
					</div>
				</div>
				<div class="card-body--">

				<form action="voluntarios.php" method="post">
					<div class="form-group">
						<label for="categories" class=" form-control-label">Año</label>
						<select class="form-control" name="anio">
							<option>Seleccione año actual</option>
							<?php
							$res2 = mysqli_query($con, "select * from avo_anio order by anio asc");
							while ($row = mysqli_fetch_assoc($res2)) {
									echo "<option value = " . $row['anio'] . ">"  . $row['anio'] . "</option>";
							}
							?>
						</select>
					</div>
					<button id="anio_submit" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
								<span id="payment-button-amount">Continuar</span>
					</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require('footer.inc.php');
?>