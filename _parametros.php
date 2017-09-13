<?
require_once("cnx_db.php");
$db='parques_wrdp1';
?>
<html> 
<head> 
<title>Parametros de parques</title> 
<style> 
.estilo_formulario{width:300px; margin:auto;} /*estilos css */ 
.estilo_divs{margin:auto; padding:3px;}clase de estilos css /*estilos css*/ 
</style> 
</head> 

<body> 
<?php 

if (isset($_POST['boton_enviar'])){ //aca validamos si se ha enviado un archivo desde el formulario
    
              $result = count($averdes);
            
        if($result==1){
            $averdes1=17;
        }
         if($result==2){
            $averdes1=34;
        }
         if($result==3){
            $averdes1=50;
        }
$sSQL="INSERT INTO `wp_comites_parques`(`cve_parque`, `opera`, `formaliza`, `organiza`, `reunion`, `proyecto`,`disenio`,`ejecutivo`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `mancomunado`, `eventos`, `eventosr`, `averdes`, `estaver`,  `gente`, `diario`, `semana`, `finsem`, `limpieza`, `orden`, `respint`) VALUES ('$parque','$opera','$formaliza','$organiza','$reunion','$proyecto','$disenio','$ejecutivo','$instalaciones','$estado','$ingresop','$ingresadop','$mancomunado','$eventos','$eventosr','$averdes1','$estaver','$sexistente','$cposible','$semana','$finsem','$limpieza','$orden','$respint')";
		//`riego`,'$riego',
                //`gente`, `diario`,
                //'$gente','$diario',
                mysql_db_query("$db",$sSQL);
		//echo$sSQL;
      
       
		echo'<p align="center">';
		echo'Visita guardada';
		echo'da click en el boton para cerrar<input type="button" value="Cerrar" onClick="window.close()"> o';
                echo'Agregar comentarios a la visita <a href="comentarios_parametros.php?parque='.$parque.'">click aqui</a>';
		echo'</p>';
} 
$sql="SELECT * FROM  `wp_arturo_parque` WHERE cve=$parque";
$res=mysql_db_query("$db",$sql);
$row=mysql_fetch_array($res);
//echo '<div><b>Nombre del parque:</b>'$parque' - '$row['nom']'</div><br>'; 
?> 

<div > 
<fieldset><legend>Agregar parametros del parque:<? echo $parque.' - '.$row['nom'];?></legend> <!-- los tag <fieldset> y <legend> son con fines decorativos hacen un recuadro con titulo alrededor del form--> 
<form method="POST" action="parametros.php"> 
<?
echo'<table border=1>';
echo'<tr>';
echo'<td colspan="2">Ingrese los parametros del parque';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Comit&eacute;';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Opera con 3 personas o m&aacute;s:';
echo'</td>';
echo'<td><input type="text" name="opera">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Esta formalizado como AC / oficio Ayuntamiento:';
echo'</td>';
echo'<td><input type="text" name="formaliza">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con buena organizaci&oacute;n(con orden-formalidad):';
echo'</td>';
echo'<td><input type="text" name="organiza">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Existen reuniones con regularidad:';
echo'</td>';
echo'<td><input type="text" name="reunion">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen proyectos en proceso:';
echo'</td>';
echo'<td><input type="text" name="proyecto">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Instalaciones';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con Proyecto:';
echo'</td>';
echo'<td><input type="radio" value="40" name="disenio">Dise&ntilde;o';
echo'<input type="radio" value="40" name="ejecutivo">Ejecutivo';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Esta en buen estado lo que existe:';
echo'</td>';
echo'<td><input type="text" name="estado">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay instalaciones en la mayoria del espacio,cancha, andador, banquetas,etc:';
echo'</td>';
echo'<td><input type="text" name="instalaciones">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Ingresos';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen fuente de ingresos permanentes:';
echo'</td>';
echo'<td><input type="text" name="ingresop">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Es suficiente lo ingresado para operar bien:';
echo'</td>';
echo'<td><input type="text" name="ingresadop">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen cuenta mancomunada:';
echo'</td>';
echo'<td><input type="text" name="mancomunada">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Eventos';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay eventos con regularidad:';
echo'</td>';
echo'<td><input type="text" name="eventosr">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuentan con un calendario anual de actividades:';
echo'</td>';
echo'<td><input type="text" name="eventos">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">&Aacute;reas verdes';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con:';
echo'</td>';
echo'<td><input type="checkbox" name="averdes[]" value="1">arboles <input type="checkbox" name="averdes[]" value="2">c&eacute;sped <input type="checkbox" name="averdes[]" value="3">jard&iacute;n';
//echo'<td><input type="text" name="averdes">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se encuentra en buen estado:';
echo'</td>';
echo'<td><input type="text" name="estaver">';
echo'</td>';
echo'</tr>';
echo'<tr>';
//echo'<td>Tienen riego constante:';
//echo'</td>';
//echo'<td><input type="text" name="riego">';
//echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Afluencia';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>porcentaje de afluencia sobre lo existente:';
echo'</td>';
echo'<td><input type="text" name="sexistente">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>porcentaje de afluencia contra lo posible:';
echo'</td>';
echo'<td><input type="text" name="cposible">';
echo'</td>';
echo'</tr>';
//echo'<tr>';
//echo'<td>Va suficiente gente:';
//echo'</td>';
//echo'<td><input type="text" name="gente">';
//echo'</td>';
//echo'</tr>';
//echo'<tr>';
//echo'<td>Diario:';
//echo'</td>';
//echo'<td><input type="text" name="diario">';
//echo'</td>';
//echo'</tr>';
//echo'<tr>';
//echo'<td>Entre semana:';
//echo'</td>';
//echo'<td><input type="text" name="semana">';
//echo'</td>';
//echo'</tr>';
//echo'<tr>';
//echo'<td>Fin de semana:';
//echo'</td>';
//echo'<td><input type="text" name="finsem">';
//echo'</td>';
//echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Orden';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Las instalaciones se respetan:';
echo'</td>';
echo'<td><input type="text" name="respint">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se cuenta con un reglamento de orden:';
echo'</td>';
echo'<td><input type="text" name="orden">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se mantiene limpio:';
echo'</td>';
echo'<td><input type="text" name="limpieza">';
echo'</td>';
echo'</tr>';


echo'</table>';

		?>
<div><input type="submit" value="Guardar Visita" name="boton_enviar"></div> 
<?
echo '<input type=hidden name="parque" value="'.$parque.'">';
?>
</form> 
</fieldset> 
</div> 

</body> 
</html>