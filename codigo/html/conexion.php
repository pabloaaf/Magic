<?php
	$servidor="localhost";
	$dbusuario="root";
	$dbpass="";
	$dbnombre="smartmirror";

	$conex= new mysqli($servidor,$dbusuario,$dbpass, $dbnombre);
	if($conex->connect_errno>0){
		die("Imposible conectarse con la base de datos.".$conex->connect_errno);
	}
?>
