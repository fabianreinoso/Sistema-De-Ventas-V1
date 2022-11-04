<?php

require_once "clases/Conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT * from usuarios where email='admin'";
$result = mysqli_query($conexion, $sql);
$validar = 0;
if (mysqli_num_rows($result) > 0) {
	$validar = 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="menu.css">
	<title>Inicio de Sessión</title>
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
	
</head>

<body style="background: linear-gradient(to top, rgba(0,0,0,0.5)50%, rgba(0,0,0,0.5)50%), url(img/fondo.jpg); background-position: center; background-size: cover;">
	<br><br><br>
	<div class="container rounded ">
		<div class="row align-stretch">
			<div class="col-sm-0"></div>
			<div class="col-sm-4">
				<div class="panel bg-white p-5 rounded">
					<div class="text-center bg-info fs-4">Sistema de ventas</div>
					<div class="panel panel-body">
						<p class="text-center">
							<img src="img/sistemaventas.JPG" height="148">
						</p>
						<form id="frmLogin">
							<label class="form-label">Usuario</label>
							<input type="text" class="form-control" name="usuario" id="usuario">
							<label class="form-label">Password</label>
							<input type="password" name="password" id="password" class="form-control">
							<p></p>
							<div class="d-grid">
								<span class="btn btn-success btn-sm" id="entrarSistema">Entrar</span>
								<?php if (!$validar): ?>
									<a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
								<?php endif; ?>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-8"></div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#entrarSistema').click(function() {

			vacios = validarFormVacio('frmLogin');

			if (vacios > 0) {
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos = $('#frmLogin').serialize();
			$.ajax({
				type: "POST",
				data: datos,
				url: "procesos/regLogin/login.php",
				success: function(r) {

					if (r == 1) {
						window.location = "vistas/inicio.php";
					} else {
						alert("No se pudo acceder");
					}
				}
			});
		});
	});
</script>