<?php
	include("conexion.php");
	$sql_consulta="SELECT * FROM widgets WHERE idUser='2'";
	$resultados=$conex->query($sql_consulta);
	
	$reloj_booleano=0;
	$reloj_tipo=0;
	$reloj_tamano=0;
	$tiempo_booleano=1;
	$tiempo_tipo=4;
	$tiempo_tamano=3;
	while($fila=$resultados->fetch_array()){
		$reloj_booleano=$fila['reloj_booleano'];
		$reloj_tipo=$fila['reloj_tipo'];
		$reloj_tamano=$fila['reloj_tamano'];
		$tiempo_booleano=$fila['tiempo_booleano'];
		$tiempo_tamano=$fila['tiempo_tamano'];
		$tiempo_tipo=$fila['tiempo_tipo'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Registrado</title>
	<link href="cssMonica.css" rel="stylesheet">
	<link href="styleCalendar.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<script>
		function readTextFile(file){
			var allText;
			var rawFile = new XMLHttpRequest();
			rawFile.open("GET", file, false);
			rawFile.onreadystatechange = function (){
				if(rawFile.readyState === 4){
					if(rawFile.status === 200 || rawFile.status == 0){
						allText = rawFile.responseText;
					}
				}
			}
			rawFile.send(null);
			var frases=allText.split(",-");
			var aleatorio = Math.floor(Math.random() * frases.length + 1);
			var fraseElegida=frases[aleatorio-1];
			document.getElementById("frase").innerHTML = fraseElegida;
		}
	</script>
</head>
<body onload=readTextFile('file.txt')>

	<table class="general">
		<tr>
		<td>

			<table class="izquierda">
			 	<tr>
			 		<td class="subparrafo">Fecha y agenda</td>
			 	</tr>

			 	<tr>
			    	<td class="reloj">
					<?php 
					if ($reloj_booleano == 1) {
						$string_reloj='';
						switch ($reloj_tipo) {
						case 1:
							$string_reloj=' src="http://free.timeanddate.com/clock/i61z30i3/n141/szw110/szh110/hocfff/hbw1/hfc099/cf100/hnc000/hcd72/fav0/fiv0/mqcff9/mqs1/mql16/mqw4/mqd100/mhcfff/mhs4/mhl23/mhw6/mhd100/mmv0/hhcff9/hhs3/hhb0/hhw8/hmcff9/hms3/hmw8" frameborder="0" width="110" height="110"></iframe>';
							break;
						case 2:
							$string_reloj=' src="http://free.timeanddate.com/clock/i61yyps9/n141/szw110/szh110/hoc000/hfc999/cf100/hnc000/fas28/facfff/fnu2/fdi78/mqc009" frameborder="0" width="110" height="110"></iframe>';

							break;
						case 3:
							$string_reloj=' src="http://free.timeanddate.com/clock/i61z30i3/n141/tles4/fn7/fs26/fcfff/tc000/ftb/th1" frameborder="0" width="120" height="39"></iframe>';
							break;
						case 4:
							$string_reloj=' src="http://free.timeanddate.com/clock/i61z30i3/n141/tles4/fn2/fs26/tcccc/bas2/bat5/bacfff/pl0/th2" frameborder="0" width="179" height="43"></iframe>
'; 
							break;

						}
						
							switch ($reloj_tamano) {
							    case 1:
								$string_reloj='<iframe class="reloj_1"'.$string_reloj;
								break;
							    case 2:
								$string_reloj='<iframe class="reloj_2"'.$string_reloj;
								break;
							    case 3:
								$string_reloj='<iframe class="reloj_3"'.$string_reloj;
								break;
							}
						
							
						echo $string_reloj;

					}
					?>
			    		
			    	</td>
				</tr>
				
				<tr>
					<td>
			    		<iframe class="fecha" src="http://free.timeanddate.com/clock/i61i5y1r/n141/tles4/fn13/fs20/fcfff/tc000/pc000/ftb/pl20/pr4/pt7/pb7/tt1" frameborder="0" width="350" height="25"></iframe>
			   		</td>
				</tr>
			
			  	<tr>
			  		<td>
			  			<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=WEEK&amp;height=500&amp;wkst=2&amp;bgcolor=%23ccccc0&amp;src=dennysmclaughlin%40gmail.com&amp;color=%231B887A&amp;src=calendario.lectivo.ule%40gmail.com&amp;color=%23691426&amp;src=%23contacts%40group.v.calendar.google.com&amp;color=%23125A12&amp;src=es.spain%23holiday%40group.v.calendar.google.com&amp;color=%230F4B38&amp;src=q0cpg6t5nt3saqp3aibosafvcc%40group.calendar.google.com&amp;color=%232F6309&amp;ctz=Europe%2FMadrid" style="border:solid 4px #669999" width="400" height="400" frameborder="0" scrolling="no"></iframe>
			  		</td>
			  	</tr>
			</table>
		</td>
		<td>
			<table class="derecha">
			 	<tr>
			 		<td class="subparrafo">Tiempo</td>
			 	</tr>

			 	<tr>
			    	<td>
			    		<?php 
					if ($tiempo_booleano == 1) {
						$string_tiempo='';
						switch ($tiempo_tamano) {
							    case 1:
								$string_tiempo=' class="tiempo_1" ';
								break;
							    case 2:
								$string_tiempo=' class="tiempo_2" ';
								break;
							    case 3:
								$string_tiempo=' class="tiempo_3" ';
								break;
							}
						switch ($tiempo_tipo) {
						case 1:
							$string_tiempo='<iframe'.$string_tiempo.'src="https://www.meteoblue.com/en/weather/widget/three/le%c3%b3n_spain_3118532?geoloc=fixed&nocurrent=0&noforecast=0&days=4&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&layout=dark"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups" style="width: 460px;height: 596px"; transform=scale(0.2)></iframe>';
							break;
						case 2:
							$string_tiempo=' <div'.$string_tiempo.'id="c_ff4c04dbe47205ecb2b6a9cde9149a44" class="normal"></div><script type="text/javascript" src="https://www.eltiempo.es/widget/widget_loader/ff4c04dbe47205ecb2b6a9cde9149a44"></script>';

							break;
						case 3:
							$string_tiempo=' <div'.$string_tiempo.'id="tiempo_58194e95824862ef5144d314f10ea58f"> <div></div><div> <img src="//www.tiempo.es/build/img/logo/tiempo133.png" width="80" height="18" alt="tiempo.es"> </div> <script type="text/javascript" src="//www.tiempo.es/widload/es/ver/300/339/110/es0le0082/58194e95824862ef5144d314f10ea58f.js"></script> </div>';
							break;
						case 4:
							$string_tiempo='<div'.$string_tiempo.'id="tyt_wdgt_1515116233050" style="overflow:hidden;width:500px;height:340px" data-options="color=negro&text=&content=1111100&temp_unit=c&wind_unit=kmh"><script src="http://tiempoytemperatura.es/widgets/js/biggest-6day/3118532/tyt_wdgt_1515116233050/?v=0"></script></div>'; 
							break;

						}
						
						echo $string_tiempo;

					}
					?>
			    		
			    	</td>
				</tr>

			</table>
		</td>
		</tr>
	</table>
	<footer class="Footer">
		<p class="frase" id="frase"></p>
  	</footer>	
</body>
</html>
