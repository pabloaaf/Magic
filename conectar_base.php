<!DOCTYPE html>
<html>
	<head></head>
	
	<body>
	
	<h1><?php echo leerLogin();?> </h1>
	
	</body>
</html>


<?php
	function leerLogin() {
			
			$hostname = 'localhost';
			$database = 'MagicMirror';
			$username = 'phpmyadmin';
			$password = 'culodeadriana';
			
			$conexion = new mysqli($hostname, $username, $password, $database);
			
			if (!$conexion) {
				die("Falló la conexión a MySQL: " . mysql_error());
			}
			
			$query = "SELECT ID FROM `login` WHERE 1";
			$resultado = $conexion->query($query);
			mysqli_close($conexion);
			
			$resultado = $resultado->fetch_array(); 
			return $resultado[0];
	}
?>