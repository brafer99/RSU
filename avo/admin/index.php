<?php
require('top.inc.php');

$sql="SELECT COUNT(avo_voluntarios.id) as cantidad, avo_anio.anio from avo_voluntarios INNER JOIN avo_anio ON avo_voluntarios.anio = avo_anio.anio
GROUP BY anio ASC";
$res=mysqli_query($con,$sql);

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-6">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">RESUMEN POR AÑOS &emsp;&emsp;&emsp;&emsp;&emsp; 	
					</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Año</th>
							   <th>Cantidad de Voluntarios</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['anio']?></td>
							   <td><?php echo $row['cantidad']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-edit'><a href='voluntarios.php?anio=".$row['anio']."&flag=1'>Seleccionar</a></span>&nbsp;";
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