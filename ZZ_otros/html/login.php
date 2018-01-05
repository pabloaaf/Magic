<!DOCTYPE html>

<html>
	<head>
	
		<style>
		
		</style>
		
		<script>
			function login(){
				
				var codigoTemporal = document.getElementById('codigoTemporal').value;
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						alert(this.responseText);
						if (this.responseText.localeCompare("Código temporal válido.") == 0)
							load(personalizar.php);
					}
				};
				xmlhttp.open("GET", "comprobarLogin.php?codigoTemporal=" + codigoTemporal, true);
				xmlhttp.send();
			}
		</script>
	
	</head>
	
	<body>
	
		<p>Introduce el último código temporal que aparece en el espejo:</p>
		<input type="text" name="codigo_temporal" id="codigoTemporal">
		<button onclick="login()">Acceder</button>	
	
	</body>
</html>