<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Registrado</title>
		<style type="text/css">
		h1 {
			position: absolute;
			bottom: 0;
			margin-left: 15%;
			margin-right: 15%;
			text-align: center;
		}
		</style>
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
					$(document).ready(function(){
			$("#frase").delay(7000).animate({
       			 opacity: '0.3'
    }, 4000);
		});
		</script>
	</head>

	<body bgcolor="black" style="color:white" onload=readTextFile('file.txt')>
		<?php
			$codigo= $_REQUEST['codigo'];
 			include("conexion.php");
        		$sql_consulta="SELECT * FROM Usuario WHERE Codigo_temporal='".$codigo."'";
        $resultados=$conex->query($sql_consulta);

	$userID=0;

        $reloj_booleano=0;
        $reloj_tipo=0;
        $reloj_tamano=0;
        $tiempo_booleano=0;
        $tiempo_tipo=0;
        $tiempo_tamano=0;
        $calendario_booleano=0;
        while($fila=$resultados->fetch_array()){
                $userID=$fila['ID_Usuario'];
        }
	$sql_consulta2="SELECT * FROM Personalizaciones WHERE idUser='".$userID."'";
	$resultados2=$conex->query($sql_consulta2);
	while($fila=$resultados2->fetch_array()){
                $reloj_booleano=$fila['reloj_booleano'];
                $reloj_tipo=$fila['reloj_tipo'];
                $reloj_tamano=$fila['reloj_tamano'];
                $tiempo_booleano=$fila['tiempo_booleano'];
                $tiempo_tamano=$fila['tiempo_tamano'];
                $tiempo_tipo=$fila['tiempo_tipo'];
                $calendario_booleano=$fila['calendario_booleano'];
        }?>
			<table align="left">
			 	<caption>Fecha y hora<hr></caption>
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
								$string_reloj=' src="http://free.timeanddate.com/clock/i61z30i3/n141/tles4/fn2/fs26/tcccc/bas2/bat5/bacfff/pl0/th2" frameborder="0" width="179" height="43"></iframe>';
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
						}
						?>
			    		</td>
				</tr>

			  	<tr>
			  		<td>
			  			<?php
							if ($calendario_booleano == 1) {
					  			echo '<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0&amp;mode=WEEK&amp;height=500&amp;wkst=2&amp;bgcolor=%23000000&amp;src=h8kdhu20vbv8dcvgo7upjh8r08%40group.calendar.google.com&amp;color=%238D6F47&amp;src=chdh0q41r0197rjfjv3ffmv01c%40group.calendar.google.com&amp;color=%238D6F47&amp;src=4t1limbadq5nkc4dp10l1tnnsg%40group.calendar.google.com&amp;color=%23865A5A&amp;src=8ik4pa8muh7rdrbhnl2o8sv0sk%40group.calendar.google.com&amp;color=%23AB8B00&amp;src=g6suss31cdrlnuiud2gloqfhrg%40group.calendar.google.com&amp;color=%2342104A&amp;src=d799happoqcm463oj82h0923rs%40group.calendar.google.com&amp;color=%23333333&amp;src=i9933rf9ad8p4g5dbp28kunb0s%40group.calendar.google.com&amp;color=%23182C57&amp;src=njthr6mdlq6gvf7djibomu3evo%40group.calendar.google.com&amp;color=%232F6309&amp;src=2iop0k15tc3uil7hphonshop20%40group.calendar.google.com&amp;color=%23333333&amp;src=37aspgsa4qn7dqm15al1vbvc2g%40group.calendar.google.com&amp;color=%230F4B38&amp;src=td7p8m9aojlg48fijgp4rsocvk%40group.calendar.google.com&amp;color=%232F6309&amp;src=936aioqrpu99uln7purrgmcdng%40group.calendar.google.com&amp;color=%23691426&amp;src=calendario.lectivo.ule%40gmail.com&amp;color=%23691426&amp;ctz=Europe%2FMadrid" style="border-width:0" width="400" height="500" frameborder="0" scrolling="no"></iframe>';
					  		}
				  		?>
			  		</td>
			  	</tr>
			</table>
			<table align="right">
			 	<caption>Tiempo<hr></caption>
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
			<h1 id="frase"></h1>
			<table style="position: absolute;bottom: 0; right: 0;" border="1">
				<tr>
					<td>
						<?php $shell = exec("hostname -I");
					echo $shell;?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $_REQUEST['codigo'];?>
					</td>
				</tr>
			</table>
	</body>
</html>
