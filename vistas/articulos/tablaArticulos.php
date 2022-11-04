<?php
require_once "../../clases/Conexion.php";
$c = new conectar();
$conexion = $c->conexion();
$sql = "SELECT art.nombre,
					art.descripcion,
					art.cantidad,
					art.precio,
					img.ruta,
					cat.nombreCategoria,
					art.id_producto
		  from articulos as art 
		  inner join imagenes as img
		  on art.id_imagen=img.id_imagen
		  inner join categorias as cat
		  on art.id_categoria=cat.id_categoria";
$result = mysqli_query($conexion, $sql);

?>
<div class="card">
	<div class="card-header">
		Articulos:
	</div>
	<table class="table table-bordered " style="text-align: center;">
		<thead>
			<tr>
				<th scope="col">Nombres</th>
				<th scope="col">Descripcion</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Precio</th>
				<th scope="col">Imagen</th>
				<th scope="col">Categoria</th>
				<th scope="col" colspan="2">Opciones</th>
			</tr>
		</thead>
		<tbody>

			<?php while ($ver = mysqli_fetch_row($result)) : ?>

				<tr>
					<td><?php echo $ver[0]; ?></td>
					<td><?php echo $ver[1]; ?></td>
					<td><?php echo $ver[2]; ?></td>
					<td><?php echo $ver[3]; ?></td>
					<td>
						<?php
						$imgVer = explode("/", $ver[4]);
						$imgruta = $imgVer[1] . "/" . $imgVer[2] . "/" . $imgVer[3];
						?>
						<img width="80" height="80" src="<?php echo $imgruta ?>">
					</td>
					<td><?php echo $ver[5]; ?></td>

					<td>
						<span data-toggle="modal" data-target="#abremodalUpdateArticulo" class="btn text-success btn-xs" onclick="agregaDatosArticulo('<?php echo $ver[6] ?>')">
							<i class="bi bi-pencil-square"></i>
						</span>
					</td>
					<td>
						<span class="btn text-danger btn-xs" onclick="eliminaArticulo('<?php echo $ver[6] ?>')">
							<i class="bi bi-trash"></i>
						</span>
					</td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>