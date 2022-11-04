<?php
session_start();
if (isset($_SESSION['usuario'])) {

?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>inicio</title>
		<?php include "menu.php"; ?>
	</head>

	<body>
		<br><br><br>

		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="jumbotron">

						<br><br><br>
						<h2 class="text-primary text-center">Bienvenido al Sistema de Ventas de TECSUP</h2>
						<h2 class="text-info text-center">Ingreso de usuario con exito</h2>
					</div>
				</div>
				<div class="col-6">
					<img src="../img/inicio.jpg" alt="" width="450px" height="450px">
				</div>
			</div>
		</div>
	</body>

	</html>
<?php
} else {
	header("location:../index.php");
}
?>