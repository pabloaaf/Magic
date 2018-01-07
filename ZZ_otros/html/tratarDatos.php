<?php

	session_start()
	$idUser = $_SESSION["idUser"];
	
	$nombre = $_REQUEST["nombre"];

	$reloj_booleano = $_REQUEST["reloj_booleano"];
	$reloj_tamano = $_REQUEST["reloj_tamano"];
	$reloj_tipo = $_REQUEST["reloj_tipo"];
	
	$tiempo_booleano = $_REQUEST["tiempo_booleano"];
	$tiempo_tamano = $_REQUEST["tiempo_tamano"];
	$tiempo_tipo = $_REQUEST["tiempo_tipo"];

	$calendario_booleano = $_REQUEST["calendario_booleano"];
	
	
	$conexion = new mysqli('localhost', 'root', '', 'MagicMirror');
	
	if ($conexion->connect_error) { 
		die('Error de Conexión'. $conexion->connect_error);
	}
	
	$query = "UPDATE personalizaciones SET reloj = $reloj_booleano, reloj_size = $reloj_tamano, reloj_type = $reloj_tipo, weather = $tiempo_booleano,
	weather_size = $tiempo_tamano, weather_size = $tiempo_tipo, calendario_booleano = $calendario_booleano WHERE idUser = $idUser";
	$resultado = $conexion->query($query);

?>