<?php
	
	session_start();

	$codigoTemporal = $_REQUEST["codigoTemporal"];
	
	$conexion = new mysqli('localhost', 'root', '', 'smartmirror');
	
	if ($conexion->connect_error) { 
		die('Error de Conexión'. $conexion->connect_error);
	}
	
	$query = "SELECT * FROM usuarios WHERE Codigo_temporal = $codigoTemporal";
	$resultado = $conexion->query($query);
	
	if ($lista = $resultado->fetch_array()){
		echo "Código temporal válido.";
		$_SESSION["Codigo_temporal"] = $codigoTemporal;
	}else
		echo "Código temporal no válido.";

?>