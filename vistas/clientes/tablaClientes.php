<?php
require_once "../../clases/Conexion.php";

$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT id_cliente, 
				nombre,
				apellido,
				direccion,
				email,
				telefono,
				rfc 
		from clientes";
$result = mysqli_query($conexion, $sql);
?>
<div class="card">
	<div class="card-header">
		Clientes:
	</div>
	<div class="table-responsive">
		<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Direccion</th>
					<th>Email</th>
					<th>Telefono</th>
					<th>RFC</th>
					<th colspan=3>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($ver = mysqli_fetch_row($result)) :
				?>

					<tr>
						<td><?php echo $ver[1]; ?></td>
						<td><?php echo $ver[2]; ?></td>
						<td><?php echo $ver[3]; ?></td>
						<td><?php echo $ver[4]; ?></td>
						<td><?php echo $ver[5]; ?></td>
						<td><?php echo $ver[6]; ?></td>
						<td>
							<span class="btn text-success btn-xs" data-toggle="modal" data-target="#abremodalClientesUpdate" onclick="agregaDatosCliente('<?php echo $ver[0]; ?>')">
								<i class="bi bi-pencil-square"></i>
							</span>
						</td>
						<td>
							<span class="btn text-danger btn-xs" onclick="eliminarCliente('<?php echo $ver[0]; ?>')">
								<i class="bi bi-trash"></i>
							</span>

						</td>
						<td><a class="btn text-primary btn-xs" href="agregarPromocion.php?codigo=<?php echo $ver[0]; ?>"><i class="bi bi-cursor"></i></a></td>

					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>