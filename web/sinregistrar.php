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
					$id = $lista['ID_Usuario'];


					echo $random;

					$query = "INSERT INTO Personalizaciones VALUES ($id, 1, 1, 1, 1, 1, 1, 1)";
					$conexion->query($query); ?>
			</h1>

			<h1>A partir de ahora siempre que pases tu tarjeta por el lector aparecerá tu espacio personal!! </h1>
			<h1>Cuando quieras personalizar tu espacio, tienes que entrar a la dirección del espejo que aparecee en la esquina inferior derecha. 
			Accede desde un dispositivo como tu teléfono u ordenador, y en el campo requerido introduce el código
			temporal que te haya mostrado el espejo</h1>
		</div>
					
	</body>

</html>
