<?php

	session_start()
	$idUser = $_SESSION["idUser"];

	$reloj_booleano = $_REQUEST["reloj_booleano"];
	$reloj_tamano = $_REQUEST["reloj_tamano"];
	$reloj_tipo = $_REQUEST["reloj_tipo"];
	
	$tiempo_booleano = $_REQUEST["tiempo_booleano"];
	$tiempo_tamano = $_REQUEST["tiempo_tamano"];
	$tiempo_tipo = $_REQUEST["tiempo_tipo"];

	$calendario_booleano = $_REQUEST["calendario_booleano"];
	
	
	$conexion = new mysqli('localhost', 'root', '', 'smartmirror');
	
	if ($conexion->connect_error) { 
		die('Error de Conexión'. $conexion->connect_error);
	}
	
	$query = "UPDATE widgets SET reloj_booleano = $reloj_booleano, reloj_tamano = $reloj_tamano, reloj_tipo = $reloj_tipo, tiempo_booleano = $tiempo_booleano,
	tiempo_tamano = $tiempo_tamano, tiempo_tipo = $tiempo_tipo, calendario_booleano = $calendario_booleano WHERE idUser = $idUser";
	$resultado = $conexion->query($query);

?>