<?php
require_once "../../clases/Conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql = "SELECT id_categoria,nombreCategoria 
					FROM categorias";
$result = mysqli_query($conexion, $sql);
?>

<div class="card">
	<div class="card-header">
		Categorias:
	</div>
	<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
		<thead>
			<tr>
				<th scope="col" class="text-center">Categoria</th>
				<th scope="col" colspan="2" class="text-center">Opciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($ver = mysqli_fetch_row($result)) :
			?>
				<tr>
					<td><?php echo $ver[1] ?></td>
					<td><span class="btn text-success btn-xs" data-toggle="modal" data-target="#actualizaCategoria" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>')">
							<i class="bi bi-pencil-square"></i>
						</span>
					</td>
					<td>
						<span class="btn text-danger btn-xs" onclick="eliminaCategoria('<?php echo $ver[0] ?>')">
							<i class="bi bi-trash"></i>
						</span>
					</td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>