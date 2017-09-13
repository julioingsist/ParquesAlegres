<?php
/**
 * @package agrega comentarios de visitas
 * @version 1.0
 */
/*
Plugin Name: formulario comentarios de parametros
Plugin URI: http://di99.com
Description: Plugin para editar o dar de alta comentarios de las visitas de parques
Author: Mike Valenzuela
Version: 1.0
Author URI: http://eci.mx/
*/

add_action('admin_menu', 'my_plugin_menu5');
 
function my_plugin_menu5() {
        add_menu_page( 'Comentarios Parámetros', 'Comentarios Parámetros', 'read', 'Comentarios Parámetros', 'agregarcomentarios_tres' );
}
function agregarcomentarios_dos()
{
	echo 'Calificación de parques<br />';
	echo '<iframe src="http://di99.com/parques/tabla.php" width="580" height="800"></iframe>';
}

function agregarcomentarios_tres()
{
//global $current_user;
  //    get_currentuserinfo();

//echo'------------------------------------------------------------------------';
echo'<style> 
.estilo_formulario{width:300px; margin:auto;} /*estilos css */ 
.estilo_divs{margin:auto; padding:3px;}clase de estilos css /*estilos css*/ 
</style> ';
echo '<form name="forma" method="post">';
echo'<center>';
$parque=$_GET['parque'];
$visita=$_GET['visita'];
$sql="SELECT * FROM  `wp_arturo_parque` WHERE cve=$parque";
$res=mysql_db_query("parquesa_wrdp1",$sql);
$sql2="SELECT * FROM  `wp_comites_parques` WHERE cve_parque=$parque and cve=$visita";
$res2=mysql_db_query("parquesa_wrdp1",$sql2);
$row2=@mysql_fetch_array($res2);
$row=@mysql_fetch_array($res);
$sql3="SELECT * FROM  `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
$res3=mysql_db_query("parquesa_wrdp1",$sql3);
$row3=@mysql_fetch_array($res3);
//echo$sql2;
//$cve_visita=$row2['cve'];

if ($parque){ $f="Parque: <b>$parque</b><br>";echo$row['nom']; }else{ $f='<b>Debe seleccionar la palabra "comentarios" del listado de visitas del parque dando <a href="http://parquesalegres.org/wp-admin/admin.php?page=Par%C3%A1metros%20Parque">click aqui</a></b><br>';}
echo $f;
echo'</center>';
$row=@mysql_fetch_array($res);

//echo'<fieldset><legend>Agregar datos:</legend>';
    
echo'<table border="0">';
echo'<tr>';
echo'<td colspan="3">los comentarios de los parametros de la visita';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Comit&eacute;';
echo'</th>';
echo'<th colspan="1">visita';
echo'</th>';
echo'<th colspan="1">Comentarios';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Opera con 3 personas o m&aacute;s:';
echo'</td>';
echo'<td align="center">'.$row2['opera'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="opera">'.$row3['opera'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Esta formalizado con el H. Ayuntamiento:';
echo'</td>';
echo'<td align="center">'.$row2['formaliza'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="formaliza">'.$row3['formaliza'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con buena organizaci&oacute;n:';
echo'</td>';
echo'<td align="center">'.$row2['organiza'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="organiza">'.$row3['organiza'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Existen reuniones con regularidad:';
echo'</td>';
echo'<td align="center">'.$row2['reunion'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="reunion">'.$row3['reunion'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen proyectos en proceso:';
echo'</td>';
echo'<td align="center">'.$row2['proyecto'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="proyecto">'.$row3['proyecto'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Instalaciones';
echo'</th>';
echo'<th colspan="1">visita';
echo'</th>';
echo'<th colspan="1">Comentarios';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con Proyecto de dise&ntilde;o:';
echo'</td>';
echo'<td align="center">'.$row2['disenio'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="disenio">'.$row3['disenio'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<td>Cuenta con Proyecto ejecutivo:';
echo'</td>';
echo'<td align="center">'.$row2['ejecutivo'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="ejecutivo">'.$row3['ejecutivo'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Esta en buen estado lo que existe:';
echo'</td>';
echo'<td align="center">'.$row2['estado'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="estado">'.$row3['estado'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay instalaciones en la mayoria del espacio cancha, &aacute;reas verdes, banquetas:';
echo'</td>';
echo'<td align="center">'.$row2['instalaciones'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="instalaciones">'.$row3['instalaciones'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Ingresos';
echo'</th>';
echo'<th colspan="1">visita';
echo'</th>';
echo'<th colspan="1">Comentarios';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen fuente de ingresos permanentes:';
echo'</td>';
echo'<td align="center">'.$row2['ingresop'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="ingresop">'.$row3['ingresop'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Es suficiente lo ingresado para operar bien:';
echo'</td>';
echo'<td align="center">'.$row2['ingresadop'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="ingresadop">'.$row3['ingresadop'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen cuenta mancomunada:';
echo'</td>';
echo'<td align="center">'.$row2['mancomunado'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="mancomunado">'.$row3['mancomunado'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">Eventos';
echo'</th>';
echo'<th colspan="1">visita';
echo'</th>';
echo'<th colspan="1">Comentarios';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay eventos con regularidad:';
echo'</td>';
echo'<td align="center">'.$row2['eventosr'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="eventosr">'.$row3['eventosr'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuentan con un calendario anual de actividades:';
echo'</td>';
echo'<td align="center">'.$row2['eventos'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="eventos">'.$row3['eventos'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="1">&Aacute;reas verdes';
echo'</th>';
echo'<th colspan="1">visita';
echo'</th>';
echo'<th colspan="1">Comentarios';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con &aacute;reas verdes, c&eacute;sped y jard&iacute;n etc:';
echo'</td>';
echo'<td align="center">'.$row2['averdes'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="averdes">'.$row3['averdes'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se encuentra en buen estado:';
echo'</td>';
echo'<td align="center">'.$row2['estaver'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="estaver">'.$row3['estaver'].'</textarea>';
echo'</td>';
echo'</tr>';
/*echo'<tr>';
echo'<td>Tienen riego constante:';
echo'</td>';
echo'<td align="center">'.$row2['riego'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="riego">'.$row3['riego'].'</textarea>';
echo'</td>';
echo'</tr>';*/
echo'<tr>';
echo'<th colspan="1">Afluencia';
echo'</th>';
echo'<th colspan="1">visita';
echo'</th>';
echo'<th colspan="1">Comentarios';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Porcentaje de afluencia sobre lo existente:';
echo'</td>';
echo'<td align="center">'.$row2['gente'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="gente">'.$row3['gente'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Porcentaje de afluencia contra lo posible:';
echo'</td>';
echo'<td align="center">'.$row2['diario'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="diario">'.$row3['diario'].'</textarea>';
echo'</td>';
echo'</tr>';
/*echo'<tr>';
echo'<td>Entre semana:';
echo'</td>';
echo'<td align="center">'.$row2['semana'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="semana">'.$row3['semana'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Fin de semana:';
echo'</td>';
echo'<td align="center">'.$row2['finsem'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="finsem">'.$row3['finsem'].'</textarea>';
echo'</td>';
echo'</tr>';*/
echo'<tr>';
echo'<th colspan="1">Orden';
echo'</th>';
echo'<th colspan="1">visita';
echo'</th>';
echo'<th colspan="1">Comentarios';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Las instalaciones se respetan:';
echo'</td>';
echo'<td align="center">'.$row2['respint'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="respint">'.$row3['respint'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se cuenta con un reglamento de orden:';
echo'</td>';
echo'<td align="center">'.$row2['orden'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="orden">'.$row3['orden'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se mantiene limpio:';
echo'</td>';
echo'<td align="center">'.$row2['limpieza'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="limpieza">'.$row3['limpieza'].'</textarea>';
echo'</td>';
echo'</tr>';
echo '<tr><th>Tipo de visita</th><td><select name="tipo_visita">';
//echo'<option value="selecciona">---Selecciona Tipo---</option>';
$tipos_visita = array("---Selecciona Tipo---","Visita de reforzamiento","Visita de seguimiento","Visita de evento");
for($i=0; $i<=3; $i++){
echo'<option value="'.$i.'"';
if($row2["tipo_visita"]==$i){
echo'selected';
}
echo'>'.$tipos_visita[$i].'</option>';
}
echo'</select></td></tr>';


echo'<tr>';
echo'<td>Comentarios generales de la visita:';
echo'</td>';
echo'<td align="center">'.$row2['genvisita'].'</td>';
echo'<td><textarea style="width:300px;height:100px;" name="genvisita">'.$row3['genvisita'].'</textarea>';
echo'</td>';
echo'</tr>';
echo'</table>';

		
echo'<div><input type="submit" value="Guardar Comentarios" name="boton_enviar"></div> ';

if($_POST['cmd']==1){
$sql3="SELECT * FROM  `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$_POST[visita]";
$res3=mysql_db_query("parquesa_wrdp1",$sql3);
$row3=@mysql_fetch_array($res3);
$existe=mysql_num_rows($res3);
    if($existe==1){
     $sSQL="Update `wp_visitascom_parques` set `opera`='$_POST[opera]', `formaliza`='$_POST[formaliza]', `organiza`='$_POST[organiza]', `reunion`='$_POST[reunion]', `proyecto`='$_POST[proyecto]',`disenio`='$_POST[disenio]',`ejecutivo`='$_POST[ejecutivo]', `instalaciones`='$_POST[instalaciones]', `estado`='$_POST[estado]', `ingresop`='$_POST[ingresop]', `ingresadop`='$_POST[ingresadop]', `mancomunado`='$_POST[mancomunado]', `eventos`='$_POST[eventos]', `eventosr`='$_POST[eventosr]', `averdes`='$_POST[averdes]', `estaver`='$_POST[estaver]',  `gente`='$_POST[gente]', `diario`='$_POST[diario]', `limpieza`='$_POST[limpieza]', `orden`='$_POST[orden]', `respint`='$_POST[respint]', `genvisita`='$_POST[genvisita]', `tipo_visita`='$_POST[tipo_visita]' where cve_parque='$_POST[parque]' and cve_visita='$_POST[visita]'";
		mysql_db_query("parquesa_wrdp1",$sSQL);
		//echo$sSQL;
               echo'<p align="center">';
		echo'Comentarios editados con exito<input type="button" value="Cerrar" onClick="window.close()">';
//		echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
   }else{
       $sSQL="INSERT INTO `wp_visitascom_parques`(`cve_parque`,`cve_visita`, `opera`, `formaliza`, `organiza`, `reunion`, `proyecto`,`disenio`,`ejecutivo`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `mancomunado`, `eventos`, `eventosr`, `averdes`, `estaver`,  `gente`, `diario`, `limpieza`, `orden`, `respint`, `genvisita`, `tipo_visita`) VALUES ('$parque','$_POST[visita]','$_POST[opera]','$_POST[formaliza]','$_POST[organiza]','$_POST[reunion]','$_POST[proyecto]','$_POST[disenio]','$_POST[ejecutivo]','$_POST[instalaciones]','$_POST[estado]','$_POST[ingresop]','$_POST[ingresadop]','$_POST[mancomunado]','$_POST[eventos]','$_POST[eventosr]','$_POST[averdes]','$_POST[estaver]','$_POST[gente]','$_POST[diario]','$_POST[limpieza]','$_POST[orden]','$_POST[respint]','$_POST[genvisita]','$_POST[tipo_visita]')";
		mysql_db_query("parquesa_wrdp1",$sSQL);
		//echo$sSQL;
		echo'<p align="center">';
		echo'Comentarios de Visita guardados ';
		echo'da click en el boton para cerrar esta ventana<input type="button" value="Cerrar" onClick="window.close()">';
		echo'</p>';

		
		//echo$sSQL;
//
//$sql="select * from wp_arturo_parque order by cve desc limit 0,1";
//	$res=mysql_query($sql);
//               
//	$row3 = mysql_fetch_array($res);
//	
//			$cuerpob = "El usuario: " . $current_user->user_email . "\n<br>";
//			$cuerpob .= "Ha dado de alta un parque con el ID: " . $row3["cve"] . "\n<br>";
//			$cuerpob .= "Nombre del parque: " . $row3["nom"] . "\n<br>";
//			$cuerpob .= "Colonia: " . $row3["col"] . "\n<br>";
//			$cuerpob .= "Contacto: " . $row3["cont"] . "\n<br>";
//			$cuerpob .= "Ubicacion: " . $row3["ubic"] . "\n<br>";
//			$cuerpob .= "Sector: " . $row3["sec"] . "\n<br>";
//			$cuerpob .= "Ciudad: " . $row3["ciudad"] . "\n<br>";
//			$cuerpob .= "Estado: " . $row3["estado"] . "\n<br>";
//			$cuerpob .= "Tipo: " . $row3["tipo"] . "\n<br>";
//			$cuerpob .= "Superficie: " . $row3["sup"] . "\n<br>";
//			$cuerpob .= "Fecha y Hora de edici&oacute;n: " .date('d-m-Y : H:i:s'). "\n";
//			$fromb = "From: contacto@parquesalegres.org\r\nContent-type: text/html\r\n";
//
//			$res2=mail($current_user->user_email,"Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
//			//$res2=mail("yuki.gudi@gmail.com","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
//			
//		
//			if($res2){
                echo'<p align="center">';
		echo'comentarios guardados con exito<input type="button" value="Cerrar" onClick="window.close()">';
		echo'<A href="http://parquesalegres.org/comentarios-de-parametros/">Ir al listado de parques</a>';
                echo'</p>';
                        }
   // }
}
echo '<input type=hidden name="cmd" value="1">';
echo '<input type=hidden name="parque" value="'.$parque.'">';
echo '<input type=hidden name="visita" value="'.$visita.'">';
echo '<input type=hidden name="cve_visita" value="'.$cve_visita.'">';
echo'</form>';
//echo' </fieldset>';

}

function agregacomentarios_uno()
{
add_submenu_page( 'tools.php', __( "Mike GC", "agregacomentarios" ), __( "Mike GC", "agregacomentarios" ), 'export', 'agregacomentarios', 'agregacomentarios_dos' );
}

add_action('admin_menu', 'agregacomentarios_uno');
add_shortcode('agregacomentarios', 'agregacomentarios_dos');
add_shortcode('agregacomentarios3', 'agregacomentarios_tres');

?>