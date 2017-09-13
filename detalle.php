<?
require_once("cnx_db.php");
echo'parque=';
echo $parque;
echo'<html><head><title>Parques Alegres</title>
<script src="http://jquery.com/src/jquery.js"></script>
	<script>
	$(document).ready(function(){
		$("dd").hide();
		$("dt a").click(function(){
			$("dd:visible").slideUp("slow");
			$(this).parent().next().slideDown("slow");
			return false;
		});
	});
	</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){

        $(".slidingDiv").hide();
        $(".show_hide").show();

	$(".show_hide").click(function(){
	$(".slidingDiv").slideToggle();
	});

});

</script>

	<style>
	body { font-family: Arial; font-size: 16px; }
	dl { width: 300px; }
	dl,dd { margin: 0; }
	dt { background: #cede53; font-size: 18px; padding: 5px; margin: 2px; }
	dt a { color: #000000; }
	dd a { color: #000; }
	ul { list-style: none; padding: 5px; }
	
.slidingDiv {
	height:300px;
	padding:20px;
	margin-top:10px;
}

.show_hide {
	display:none;
}

	</style>
</head><body>';

$db='parques_wrdp1';
echo'<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;" width="620">
<tr>
<th bgcolor="#cede53" colspan="4">Datos del Parque</th>
</tr>
';

$sql="SELECT * , wp_arturo_parque.estado AS est FROM `wp_arturo_parque` left JOIN wp_comites_parques ON wp_arturo_parque.cve = wp_comites_parques.cve_parque WHERE wp_arturo_parque.cve=$parque";
echo $sql;
		$res=mysql_db_query("$db",$sql);
	 $c=0;
	 while($row=mysql_fetch_array($res)){
	
	
	
$c++;	
	//<tr><th>Lugar:</th><td align="center">'.$row['lugar'].'</td></tr>
	//<tr><th colspan=4 >Ubicaci&oacute;n del parque:</th></tr>
	echo '
		<tr><td align="center" colspan=2 rowspan="15">'.$row['maps'].'</td></tr>
		<tr><th bgcolor="#cede53" >Nombre de parque</th><td align="center">'.$row['nom'].'</td></tr>
		<tr><th bgcolor="#cede53" >Ubicaci&oacute;n</th><td align="center">'.$row['ubic'].'</td></tr>
		<tr><th bgcolor="#cede53" >Colonia</th><td align="center">'.$row['col'].'</td></tr>
		<tr><th bgcolor="#cede53" >Sector</th><td align="center">'.$row['sec'].'</td></tr>
		<tr><th bgcolor="#cede53" >Superficie</th><td align="center">'.$row['sup'].'</td></tr>
		<tr><th bgcolor="#cede53" >Tipo</th><td align="center">'.$row['tipo'].'</td></tr>
		<tr><th bgcolor="#cede53" >Contacto de comit&eacute;</th><td align="center">'.$row['cont'].'</td></tr>
		<tr><th bgcolor="#cede53" >Ciudad</th><td align="center">'.$row['ciudad'].'</td></tr>
		<tr><th bgcolor="#cede53" >Estado</th><td align="center">'.$row['est'].'</td></tr>
		<tr><th bgcolor="#cede53" >Fotos del parque</th><td align="center">';
		if($row['cve_wp']>0){
		echo'<a href="http://parquesalegres.org/?p='.$row['cve_wp'].'" target="_blank">ver fotos</a>';
		}echo'</td></tr>
		<tr><th bgcolor="#cede53" >Definici&oacute;n de parametros</th><td align="center"><a href="http://www.parquesalegres.org/propuesta" target="_blank">Ver definici&oacute;n de parametros</a></td></tr>
		<tr><th bgcolor="#cede53" >Historial del Parque</th><td align="center"><a href="#" class="show_hide">Ver Historial</a></td></tr>';
		if (file_exists('http://www.parquesalegres.org/planos/'.$row['cve'].'.jpg')) {
		echo'<tr><th bgcolor="#cede53" >Ver plano</th><td align="center"><a href="http://www.parquesalegres.org/planos/'.$row['cve'].'.jpg" target="_blank"></a></td></tr>';
		}else{
		echo'<tr><th bgcolor="#cede53" >Ver plano</th><td align="center">Sin plano</td></tr>';
		}
		
		
		echo'
		
		<tr><th bgcolor="#cede53" >Calificaci&oacute;n</th><td align="center"><font 
		'; if($row['calif']>=80){ echo'color="green">';}elseif($row['calif']<=59){ echo'color="orange">';}else{echo'color="black">';}echo'
		
		'.$row['calif'].'</font></td></tr>';
		
		
		
		
		echo'</table>';
		
		$pun=$row['opera']+$row['formaliza']+$row['organiza']+$row['reunion']+$row['proyecto'];
		$pun2=$row['instalaciones']+$row['estado'];
		$pun3=$row['ingresop']+$row['ingresadop'];
		$pun4=$row['eventos']+$row['eventosr'];
		$pun5=$row['averdes']+$row['estaver']+$row['riego'];
		$pun6=$row['gente']+$row['diario'];
		$pun7=$row['limpieza']+$row['orden']+$row['respint'];
		$prom=($pun+$pun2+$pun3+$pun4+$pun5+$pun6+$pun7)/7;
		$prome=round($prom);
	
		echo'<div class="slidingDiv"><br><br><b>Historial del Parque</b><br><br>Promedio del parque: <b>'.$prome.'</b><br><br>';

		echo'<br><br><table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
		<tr><th bgcolor="#cede53" align="center">No. visita</th><th colspan="6"  bgcolor="#cede53" align="center">Comit&eacute; (20)</th><th colspan="3"  bgcolor="#cede53" align="center">Instalaciones (50)</th><th colspan="3"  bgcolor="#cede53" align="center">Ingresos (50)</th><th colspan="3"  bgcolor="#cede53" align="center">Eventos (50)</th><th colspan="4"  bgcolor="#cede53" align="center">&Aacute;reas verdes (33)</th><th colspan="5"  bgcolor="#cede53" align="center">Afluencia (50)</th><th colspan="4"  bgcolor="#cede53" align="center">Orden (33)</th><th  bgcolor="#cede53" align="center" rowspan="2">Promedio del parque</th></tr>
		<tr><td align="center" rowspan="2">'.$c.'</td>
		<th>OPERA CON 3 PERSONAS O MAS</th>
		<th>ESTA FORMALIZADO COMO A.C. / IAP/ OFICIO AYUNTAMIENTO</th>
		<th>CUENTA CON BUENA ORGANIZACIÓN (CON ORDEN - FORMALIDAD)</th>
		<th>EXISTEN REUNIONES CON REGULARIDAD</th>
		<th>TIENEN PROYECTOS EN PROCESO</th>
		<th>PUNTOS</th>
		<th>HAY INSTALACIONES EN LA MAYORIA DEL ESPACIO,CANCHAS, AREAS VERDES,BANQUETAS,ETC)</th>
		<th>ESTAN EN BUEN ESTADO LO QUE EXISTE</th>
		<th>PUNTOS</th>
		<th>TIENEN FUENTES DE INGRESOS PERMANENTES</th>
		<th>ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</th>
		<th>PUNTOS</th>
		<th> LLEVAN A CABO EVENTOS CON UN CALENDARIO ANUAL</th>
		<th>HAY EVENTOS CON REGULARIDAD</th>
		<th>PUNTOS</th>
		<th>HAY JARDINES, PASTOS, ARBOLES, ETC</th>
		<th>ESTAN EN BUEN ESTADO</th>
		<th>TIENEN RIEGO CONSTANTE</th>
		<th>PUNTOS</th>
		<th>VA SUFICIENTE GENTE</th>
		<th>DIARIO </th>
		<th>( + ) ENTRE SEMANA</th>
		<th>( + ) FIN DE SEMANA</th>
		<th>PUNTOS</th>
		<th>SE MANTIENE LIMPIO</th>
		<th>OPERA CON ORDEN</th>
		<th>LAS INSTALACIONES SE RESPETAN</th>
		<th>PUNTOS</th>
		</tr>
		<tr>
		
		<td align="center">'.$row['opera'].'</td>
		<td align="center">'.$row['formaliza'].'</td>
		<td align="center">'.$row['organiza'].'</td>
		<td align="center">'.$row['reunion'].'</td>
		<td align="center">'.$row['proyecto'].'</td>
		<td align="center">'.$pun.'</td>';
		echo'
		<td align="center">'.$row['instalaciones'].'</td>
		<td align="center">'.$row['estado'].'</td>
		<td align="center">'.$pun2.'</td>';
		echo'
		<td align="center">'.$row['ingresop'].'</td>
		<td align="center">'.$row['ingresadop'].'</td>
		<td align="center">'.$pun3.'</td>';
		echo'
		<td align="center">'.$row['eventos'].'</td>
		<td align="center">'.$row['eventosr'].'</td>
		<td align="center">'.$pun4.'</td>';
		echo'
		<td align="center">'.$row['averdes'].'</td>
		<td align="center">'.$row['estaver'].'</td>
		<td align="center">'.$row['riego'].'</td>
		<td align="center">'.$pun5.'</td>';
		echo'
		<td align="center">'.$row['gente'].'</td>
		<td align="center">'.$row['diario'].'</td>
		<td align="center">'.$row['semana'].'</td>
		<td align="center">'.$row['finsem'].'</td>
		<td align="center">'.$pun6.'</td>';
		echo'
		<td align="center">'.$row['limpieza'].'</td>
		<td align="center">'.$row['orden'].'</td>
		<td align="center">'.$row['respint'].'</td>
		<td align="center">'.$pun7.'</td>';
		echo'
		<th colspan="4" align="center">'.$prome.'</th></tr></table>';
		
		if($prome==0){
		echo'<a href="http://parquesalegres.org/agendar-visita/">Agenda Visita</a>';
		}
	}

echo'
</div>
<br><br><br>
<center><input type="button" value="Cerrar" onClick="window.close()"></center>
</body>
';

?>