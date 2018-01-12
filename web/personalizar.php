<!DOCTYPE html>

<html>

	<head>
		<style>
			select{
				width: 100px;
			}
		</style>
		
		<script>
			function tratarDatos() {
					
					//Obtenemos todos los datos
					var nombre = document.getElementById("nombre").value;
					if (nombre === ''){
						nombre = " ";
					}

					var reloj_booleano = document.getElementById("reloj_booleano").value;
					var reloj_tamano = document.getElementById("reloj_tamaño").value;
					var reloj_tipo = document.getElementById("reloj_tipo").value;
					
					var tiempo_booleano = document.getElementById("tiempo_booleano").value;
					var tiempo_tamano = document.getElementById("tiempo_tamaño").value;
					var tiempo_tipo = document.getElementById("tiempo_tipo").value;
					
					var calendario_booleano = document.getElementById("calendario_booleano").value;
					
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							alert("Opciones cambiadas correctamente.");
							window.open("index.php", "_self");
						}
					};
					xmlhttp.open("GET", "tratarDatos.php?nombre=" + nombre + "&reloj_booleano=" + reloj_booleano + "&reloj_tamano=" + reloj_tamano + "&reloj_tipo=" + reloj_tipo +
					"&tiempo_booleano=" + tiempo_booleano + "&tiempo_tamano=" + tiempo_tamano + "&tiempo_tipo=" + tiempo_tipo + "&calendario_booleano=" + calendario_booleano,true);
					xmlhttp.send();
			}
		</script>
	</head>
	
	<body>
	
		
			<!--NOMBRE-->
			
			<p>Cambia tu nombre de usuario si lo deseas:</p>
			<input type="text" name="nombre" id="nombre">
		
			<!--RELOJ-->
		
			<p>¿Quieres que aparezca un reloj en el espejo?</p>
			<select name="reloj_booleano" id="reloj_booleano">
				<option value="1">Sí</option>
				<option value="0">No</option>
			</select>
			
			<p>Selecciona un tamaño para el reloj</p>
			<select name="reloj_tamaño" id="reloj_tamaño">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
			
			<p>Selecciona un tipo de reloj</p>
			<select name="reloj_tipo" id="reloj_tipo">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			
			<!--TIEMPO-->
			
			<p>¿Quieres que aparezca el tiempo en el espejo?</p>
			<select name="tiempo_booleano" id="tiempo_booleano">
				<option value="1">Sí</option>
				<option value="0">No</option>
			</select>
			
			<p>Selecciona un tamaño para el tiempo</p>
			<select name="tiempo_tamaño" id="tiempo_tamaño">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>
			
			<p>Selecciona un tipo de tiempo</p>
			<select name="tiempo_tipo" id="tiempo_tipo">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			
			
			<!--CALENDARIO-->
			<p>¿Quieres que aparezca un calendario en el espejo?</p>
			<select name="calendario_booleano" id="calendario_booleano">
				<option value="1">Sí</option>
				<option value="0">No</option>
			</select>
			<br><br>
			<input type="submit" value="Cambiar apariencia" onclick="tratarDatos()"> 
	
	</body>
	
</html>
