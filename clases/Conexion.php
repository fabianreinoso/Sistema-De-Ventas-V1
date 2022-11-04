<?php 
	class conectar{
		private $servidor="bdmysql.testing-apps.com";
		private $usuario="grupo7";
		private $password="h%7E5qM^Bh8!";
		private $bd="grupo7";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									$this->usuario,
									$this->password,
									$this->bd);
			return $conexion;
		}
	}
 ?>