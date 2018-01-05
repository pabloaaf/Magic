<!DOCTYPE html>

<html>

	<head>
	<style>
		div{
			color: white;
			width: 50%;
			margin-left: 25%;
			height: 45%;
			margin-top: 10%;
			align-content: center;
			font-size: 24px;
		}
	</style>
	</head>

	<body bgcolor="black">
		
		<div>
			<p> Accede a esta dirección en un navegador web para personalizar el espejo: </p>
			<h1> <?php $shell = shell_exec("hostname -I");
					echo $shell?> </h1>
			
			<p> Esta es tu clave de usuario. ¡Irá cambiando cada vez que accedas! </p>
			<h1> <?php 
					$conexion = new mysqli('localhost', 'root', '', 'smartmirror');
	
					if ($conexion->connect_error) { 
						die('Error de Conexión'. $conexion->connect_error);
					}
					
					$resultado = compararExistentes($conexion);
					$lista = $resultado->fetch_array();
					$random == $lista['Codigo_temporal'];
					
					echo $random; ?>
					
	</body>

</html>


<?php 

function conseguirRandom($conexion, $idUser) {
			
	$query = "SELECT * FROM usuarios WHERE ID_";
	$resultado = $conexion->query($query);
	
	return $resultado;
}
