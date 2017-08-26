<?
require_once("cnx_db.php");
$db='parques_wrdp1';
?>
<html> 
<head> 
<title>Comentarios - parametros de parques</title> 
<style> 
.estilo_formulario{width:300px; margin:auto;} /*estilos css */ 
.estilo_divs{margin:auto; padding:3px;}clase de estilos css /*estilos css*/ 
</style> 
</head> 

<body> 
<?php 

if (isset($_POST['boton_enviar'])){ //aca validamos si se ha enviado un archivo desde el formulario 
$sSQL="INSERT INTO `wp_visitascom_parques`(`cve_parque`,`cve_visita`, `opera`, `formaliza`, `organiza`, `reunion`, `proyecto`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `eventos`, `eventosr`, `averdes`, `estaver`, `riego`, `gente`, `diario`, `semana`, `finsem`, `limpieza`, `orden`, `respint`) VALUES ('$parque','$cve_visita','$opera','$formaliza','$organiza','$reunion','$proyecto','$instalaciones','$estado','$ingresop','$ingresadop','$eventos','$eventosr','$averdes','$estaver','$riego','$gente','$diario','$semana','$finsem','$limpieza','$orden','$respint')";
		mysql_db_query("$db",$sSQL);
		//echo$sSQL;
		echo'<p align="center">';
		echo'Comentarios de Visita guardados ';
		echo'da click en el boton para cerrar esta ventana<input type="button" value="Cerrar" onClick="window.close()">';
		echo'</p>';
} 
$sql="SELECT * FROM  `wp_arturo_parque` WHERE cve=$parque";
$res=mysql_db_query("$db",$sql);
$sql2="SELECT * FROM  `wp_comites_parques` WHERE cve_parque=$parque order by cve desc limit 0,1";
$res2=mysql_db_query("$db",$sql2);
$row2=mysql_fetch_array($res2);
$row=mysql_fetch_array($res);
//echo$sql2;
$cve_visita=$row2['cve'];
//echo '<div><b>Nombre del parque:</b>'$parque' - '$row['nom']'</div><br>'; 
?> 

<div > 
<fieldset><legend>Agregar Comentarios a los parametros del parque:<? echo $parque.' - '.$row['nom'];?></legend> <!-- los tag <fieldset> y <legend> son con fines decorativos hacen un recuadro con titulo alrededor del form--> 
<form method="POST" action="comentarios_parametros.php"> 
<?
echo'<table border=1>';
echo'<tr>';
echo'<td colspan="2">Ingrese los parametros del parque';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Comit&eacute;';
echo'</th>';
echo'<th colspan="1">Paramentros de ultima visita';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Opera con 3 personas o m&aacute;s:';
echo'</td>';
echo'<td align="center">'.$row2['opera'].'</td>';
echo'<td><textarea rows="4" cols="50" name="opera"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Esta formalizado con el H. Ayuntamiento:';
echo'</td>';
echo'<td align="center">'.$row2['formaliza'].'</td>';
echo'<td><textarea rows="4" cols="50" name="formaliza"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con buena organizaci&oacute;n:';
echo'</td>';
echo'<td align="center">'.$row2['organiza'].'</td>';
echo'<td><textarea rows="4" cols="50" name="organiza"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Existen reuniones con regularidad:';
echo'</td>';
echo'<td align="center">'.$row2['reunion'].'</td>';
echo'<td><textarea rows="4" cols="50" name="reunion"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen proyectos en proceso:';
echo'</td>';
echo'<td align="center">'.$row2['proyecto'].'</td>';
echo'<td><textarea rows="4" cols="50" name="proyecto"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Instalaciones';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay instalaciones en la mayoria del espacio cancha, &aacute;reas verdes, banquetas:';
echo'</td>';
echo'<td align="center">'.$row2['instalaciones'].'</td>';
echo'<td><textarea rows="4" cols="50" name="instalaciones"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Esta en buen estado lo que existe:';
echo'</td>';
echo'<td align="center">'.$row2['estado'].'</td>';
echo'<td><textarea rows="4" cols="50" name="estado"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Ingresos';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen fuente de ingresos permanentes:';
echo'</td>';
echo'<td align="center">'.$row2['ingresop'].'</td>';
echo'<td><textarea rows="4" cols="50" name="ingresop"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Es suficiente lo ingresado para operar bien:';
echo'</td>';
echo'<td align="center">'.$row2['ingresadop'].'</td>';
echo'<td><textarea rows="4" cols="50" name="ingresadop"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Eventos';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Llevan acabo eventos con un calendario anual:';
echo'</td>';
echo'<td align="center">'.$row2['eventos'].'</td>';
echo'<td><textarea rows="4" cols="50" name="eventos"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay eventos con regularidad:';
echo'</td>';
echo'<td align="center">'.$row2['eventosr'].'</td>';
echo'<td><textarea rows="4" cols="50" name="eventosr"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">&Aacute;reas verdes';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay jardines, pastos, &aacute;reas verdes,etc:';
echo'</td>';
echo'<td align="center">'.$row2['averdes'].'</td>';
echo'<td><textarea rows="4" cols="50" name="averdes"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Estan en buen estado:';
echo'</td>';
echo'<td align="center">'.$row2['estaver'].'</td>';
echo'<td><textarea rows="4" cols="50" name="estaver"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen riego constante:';
echo'</td>';
echo'<td align="center">'.$row2['riego'].'</td>';
echo'<td><textarea rows="4" cols="50" name="riego"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Afluencia';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Va suficiente gente:';
echo'</td>';
echo'<td align="center">'.$row2['gente'].'</td>';
echo'<td><textarea rows="4" cols="50" name="gente"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Diario:';
echo'</td>';
echo'<td align="center">'.$row2['diario'].'</td>';
echo'<td><textarea rows="4" cols="50" name="diario"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Entre semana:';
echo'</td>';
echo'<td align="center">'.$row2['semana'].'</td>';
echo'<td><textarea rows="4" cols="50" name="semana"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Fin de semana:';
echo'</td>';
echo'<td align="center">'.$row2['finsem'].'</td>';
echo'<td><textarea rows="4" cols="50" name="finsem"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Orden';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Se mantiene limpio:';
echo'</td>';
echo'<td align="center">'.$row2['limpieza'].'</td>';
echo'<td><textarea rows="4" cols="50" name="limpieza"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Opera con orden:';
echo'</td>';
echo'<td align="center">'.$row2['orden'].'</td>';
echo'<td><textarea rows="4" cols="50" name="orden"></textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Las instalaciones se respetan:';
echo'</td>';
echo'<td align="center">'.$row2['respint'].'</td>';
echo'<td><textarea rows="4" cols="50" name="respint"></textarea>';
echo'</td>';
echo'</tr>';
echo'</table>';

		?>
<div><input type="submit" value="Guardar Comentarios" name="boton_enviar"></div> 
<?
echo '<input type=hidden name="parque" value="'.$parque.'">';
echo '<input type=hidden name="cve_visita" value="'.$cve_visita.'">';
?>
</form> 
</fieldset> 
</div> 

</body> 
</html>