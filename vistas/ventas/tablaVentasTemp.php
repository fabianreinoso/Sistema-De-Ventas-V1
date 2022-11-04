<?php

session_start();
//print_r($_SESSION['tablaComprasTemp']);
?>

<h4>Realizar venta</h4>
<h4><strong>
		<div id="nombreclienteVenta"></div>
	</strong></h4>
<table class="table table-bordered table-hover table-condensed" style="text-align: center;">
	<caption>
		<span class="btn btn-success" onclick="crearVenta()"><i class="bi bi-hand-index-thumb-fill"></i> Generar venta
			<span class="glyphicon glyphicon-usd"></span>
		</span>
	</caption>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Quitar</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$total = 0; //esta variable tendra el total de la compra en dinero
		$cliente = ""; //en esta se guarda el nombre del cliente
		if (isset($_SESSION['tablaComprasTemp'])) :
			$i = 0;
			foreach (@$_SESSION['tablaComprasTemp'] as $key) {

				$d = explode("||", @$key);
		?>

				<tr>
					<td><?php echo $d[1] ?></td>
					<td><?php echo $d[2] ?></td>
					<td><?php echo $d[3] ?></td>
					<td><?php echo 1; ?></td>
					<td>
						<span class="btn text-danger btn-xs" onclick="quitarP('<?php echo $i; ?>')">
							<i class="bi bi-trash"></i>
						</span>
					</td>
				</tr>

		<?php
				$total = $total + $d[3];
				$i++;
				$cliente = $d[4];
			}
		endif;
		?>

		<tr>
			<td>Total de venta: <?php echo "$" . $total; ?></td>
		</tr>
	</tbody>
</table>


<script type="text/javascript">
	$(document).ready(function() {
		nombre = "<?php echo @$cliente ?>";
		$('#nombreclienteVenta').text("Nombre de cliente: " + nombre);
	});
</script>