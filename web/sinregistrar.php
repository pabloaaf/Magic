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
			<h1> Bienvenido al espejo mágico </h1>
			<p> Accede a esta dirección en un navegador web para personalizar el espejo: </p>
			<h1> <?php $shell = exec("hostname -I");
					echo $shell;?> </h1>
			
			<p> Esta es tu clave de usuario. ¡Irá cambiando cada vez que accedas! </p>
			<h1> <?php 
					$conexion = new mysqli('localhost', 'phpmyadmin', 'culodeadriana', 'MagicMirror');
	
					if ($conexion->connect_error) { 
						die('Error de Conexión'. $conexion->connect_error);
					}
					
					$query = "SELECT * FROM `Usuario` ORDER BY ID_Usuario DESC";
					$resultado = $conexion->query($query);
					$lista = $resultado->fetch_array();
					$random = $lista['Codigo_temporal'];
					
					echo $random; ?>
			</h1>
		</div>
					
	</body>

</html>
