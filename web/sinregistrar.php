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
			<h1> <?php echo shell_exec("hostname -I");?> </h1>
			
			<p> Esta es tu clave de usuario. ¡Apúntala! </p>
			<h1> <?php 
					//RELLENAR BASE DE DATOS
					$conexion = new mysqli('localhost', $username, 'culodeadriana', $database_name);
	
					if ($conexion->connect_error) { 
						die('Error de Conexión'. $conexion->connect_error);
					}
					
					$random = calcularRandom();
					$resultado = compararExistentes($conexion);
							
					while($lista = $resultado->fetch_array()){
						if ($random == $lista['random']){
							$random = calcularRandom();
							$resultado = compararExistentes($conexion);
						}
					}
					
					actualizarBBDD($conexion);
					
					echo $random; ?>
					
	</body>

</html>


<?php function calcularRandom() {
	return rand(1000, 9999);
}


function compararExistentes($conexion) {
			
	$query = "SELECT * FROM usuarios";
	$resultado = $conexion->query($query);
	
	return $resultado;
}


function actualizarBBDD ($conexion, $random) {
	
	$query = "UPDATE usuarios SET random = $random";		//Añadir where para que solo coja el adecuado
	$resultado = $conexion->query($query);
}
