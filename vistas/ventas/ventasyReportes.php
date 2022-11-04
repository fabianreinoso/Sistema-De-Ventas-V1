<?php

require_once "../../clases/Conexion.php";
require_once "../../clases/Ventas.php";

$c = new conectar();
$conexion = $c->conexion();

$obj = new ventas();

$sql = "SELECT id_venta,
				fechaCompra,
				id_cliente 
			from ventas";
$result = mysqli_query($conexion, $sql);
?>

<h4>Reportes y ventas</h4>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
				<thead>
					<tr>
						<th>Folio</th>
						<th>Fecha</th>
						<th>Cliente</th>
						<th>Total de compra</th>

					</tr>
				</thead>
				<tbody>
					<?php while ($ver = mysqli_fetch_row($result)) : ?>
						<tr>
							<td><?php echo $ver[0] ?></td>
							<td><?php echo $ver[1] ?></td>
							<td>
								<?php
								if ($obj->nombreCliente($ver[2]) == " ") {
									echo "S/C";
								} else {
									echo $obj->nombreCliente($ver[2]);
								}
								?>
							</td>
							<td>
								<?php
								echo "$" . $obj->obtenerTotal($ver[0]);
								?>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>