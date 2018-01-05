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
					var idUser = 1;		//OJO CUIDADO
					
					//Obtenemos todos los datos
					var tmp = document.getElementById("reloj_booleano");
					var reloj_booleano = tmp.options[tmp.selectIndex].value;
					tmp = document.getElementById("reloj_tamaño");
					var reloj_tamano = tmp.options[tmp.selectIndex].value;
					tmp = document.getElementById("reloj_tipo");
					var reloj_tipo = tmp.options[tmp.selectIndex].value;
					
					tmp = document.getElementById("tiempo_booleano");
					var tiempo_booleano = tmp.options[tmp.selectIndex].value;
					tmp = document.getElementById("tiempo_tamaño");
					var tiempo_tamano = tmp.options[tmp.selectIndex].value;
					tmp = document.getElementById("tiempo_tipo");
					var tiempo_tipo = tmp.options[tmp.selectIndex].value;
					
					tmp = document.getElementById("calendario_booleano");
					var calendario_booleano = tmp.options[tmp.selectIndex].value;
					
					
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							alert("Opciones cambiadas correctamente.");
						}
					};
					xmlhttp.open("GET", "tratarDatos.php?reloj_booleano=" + reloj_booleano + "&reloj_tamano=" + reloj_tamano + "&reloj_tipo=" + reloj_tipo +
					"&tiempo_booleano=" + tiempo_booleano + "&tiempo_tamano=" + tiempo_tamano + "&tiempo_tipo=" + tiempo_tipo + "&calendario_booleano=" + calendario_booleano, true);
					xmlhttp.send();
			}
		</script>
	</head>
	
	<body>
	
		<form>
		
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
		</form> 
	
	</body>
	
</html>