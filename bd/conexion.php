<?php 
$contrasena = ""; //h%7E5qM^Bh8!
$usuario = "root"; // grupo7
$nombre_bd = "sistema_ventas"; //grupo7

try {
	$bd = new PDO (
		'mysql:host=bdmysql.testing-apps.com;
		dbname='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>