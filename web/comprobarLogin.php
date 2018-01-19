<?php
	
	session_start();

	$codigoTemporal = $_REQUEST["codigoTemporal"];
	
	$conexion = new mysqli('localhost', 'phpmyadmin', 'culodeadriana', 'MagicMirror');
	
	if ($conexion->connect_error) { 
		die('Error de Conexión'. $conexion->connect_error);
	}
	
	$query = "SELECT * FROM Usuario WHERE Codigo_temporal = '$codigoTemporal'";
	$resultado = $conexion->query($query);
	
	if ($lista = $resultado->fetch_array()){
		echo "Código temporal válido.";
		$_SESSION["idUser"] = $lista['ID_Usuario'];
	}else
		echo "Código temporal no válido.";

?>
