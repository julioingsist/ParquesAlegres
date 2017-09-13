<?php
/**
 * @package Arturo
 * @version 1.0
 */
/*
Plugin Name: Formulario para agregar parametros a un parque
Plugin URI: http://di99.com
Description: Formulario para agregar parametros a un parque
Author: Mike Valenzuela
Version: 1.0
Author URI: http://eci.mx/
*/

//Aqui esta el codigo para que aparezca el menu votacion del lado izquiero
add_action('admin_menu', 'my_plugin_menu4');
 
function my_plugin_menu4() {
        add_menu_page( 'Alta Parámetros', 'Alta Parámetros', 'read', 'Alta Parámetros', 'altaparametros_tres' );
}
function altaparametros_dos()
{
	echo 'Calificación de parques<br />';
	echo '<iframe src="http://di99.com/parques/tabla.php" width="580" height="800"></iframe>';
}

function altaparametros_tres()
{

global $current_user;
      get_currentuserinfo();
 //echo 'Username: ' . $current_user->user_login . '<br />';
   // echo 'User email: ' . $current_user->user_email . '<br />';
   // echo 'User first name: ' . $current_user->user_firstname . '<br />';
   // echo 'User last name: ' . $current_user->user_lastname . '<br />';
    //echo 'User display name: ' . $current_user->display_name . '<br />';
    //echo 'User ID: ' . $current_user->ID . '<br />';
//echo'------------------------------------------------------------------------';
echo'<style> 
.estilo_formulario{width:300px; margin:auto;} /*estilos css */ 
.estilo_divs{margin:auto; padding:3px;}clase de estilos css /*estilos css*/ 
</style> ';
echo '<form name="forma" method="post">';
echo'<center>';
$visita=$_GET['visita'];
$parque=$_GET['parque'];


$sql="select * from wp_comites_parques where cve=$visita";
	$res=mysql_query($sql);
$sqli="select * from wp_arturo_parque where cve=$parque";
	$resi=mysql_query($sqli);
        $rowi=@mysql_fetch_array($resi);
$nombre_parque=$rowi['nom'];
if(!$parque){
echo'No ha seleccionado un parque, para seleccionar un parque de <a href="http://parquesalegres.org/wp-admin/admin.php?page=Par%C3%A1metros%20Parque">CLICK AQUI</a>';
}else{
if ($parque){ $f="Registro: <b>$visita</b> del parque $nombre_parque<br>";}else{ $f='<b>Nueva visita</b><br>';}
echo $f;
echo'</center>';
$row=@mysql_fetch_array($res);

echo'<fieldset><legend>Agregar datos:</legend> <!-- los tag <fieldset> y <legend> son con fines decorativos hacen un recuadro con titulo alrededor del form--> ';
echo $parque.' - '.$rowi['nom'];
echo'</legend> ';
echo'<form method="POST">'; 
echo'<table border=1>';
echo'<tr>';
echo'<td colspan="2">Ingrese los parametros del parque';
echo'</td>';
echo'</tr>';
echo'<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	  $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
  });
  </script>';
echo '<tr><th>Fecha de la visita</th><td><input type="text" id="datepicker" name="fecha_visita"/></td></tr>';
echo'<tr>';
echo'<th colspan="2">Comit&eacute;';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Opera con 3 personas o m&aacute;s:';
echo'</td>';
echo'<td><input type="text" name="opera" value="'.$row['opera'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Esta formalizado como AC / oficio Ayuntamiento:';
echo'</td>';
echo'<td><input type="text" name="formaliza" value="'.$row['formaliza'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con buena organizaci&oacute;n(con orden-formalidad):';
echo'</td>';
echo'<td><input type="text" name="organiza" value="'.$row['organiza'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Existen reuniones con regularidad:';
echo'</td>';
echo'<td><input type="text" name="reunion" value="'.$row['reunion'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen proyectos en proceso:';
echo'</td>';
echo'<td><input type="text" name="proyecto" value="'.$row['proyecto'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Instalaciones';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con Proyecto:';
echo'</td>';
echo'<td>';
if($row['disenio']==40){
echo'<input type="radio" value="40" name="disenio" checked>Dise&ntilde;o ';    
}else{
echo'<input type="radio" value="40" name="disenio">Dise&ntilde;o ';    
}
if($row['ejecutivo']==40){
echo'<input type="radio" value="40" name="ejecutivo" checked>Ejecutivo ';    
}else{
echo'<input type="radio" value="40" name="ejecutivo">Ejecutivo ';    
}
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Esta en buen estado lo que existe:';
echo'</td>';
echo'<td><input type="text" name="estado" value="'.$row['estado'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay instalaciones en la mayoria del espacio,cancha, andador, banquetas,etc:';
echo'</td>';
echo'<td><input type="text" name="instalaciones" value="'.$row['instalaciones'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Ingresos';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen fuente de ingresos permanentes:';
echo'</td>';
echo'<td><input type="text" name="ingresop" value="'.$row['ingresop'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Es suficiente lo ingresado para operar bien:';
echo'</td>';
echo'<td><input type="text" name="ingresadop" value="'.$row['ingresadop'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen cuenta mancomunada:';
echo'</td>';
echo'<td><input type="text" name="mancomunado" value="'.$row['mancomunado'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Eventos';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay eventos con regularidad:';
echo'</td>';
echo'<td><input type="text" name="eventosr" value="'.$row['eventosr'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuentan con un calendario anual de actividades:';
echo'</td>';
echo'<td><input type="text" name="eventos" value="'.$row['eventos'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">&Aacute;reas verdes';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con:';
echo'</td><td>';
if($row['averdes']==17){
echo'<input type="checkbox" name="averdes[]" value="1" checked>&aacute;rboles '; 
echo'<input type="checkbox" name="averdes[]" value="2" >c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3" >jard&iacute;n ';    
}else{
if($row['averdes']==34){
echo'<input type="checkbox" name="averdes[]" value="1" checked>&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2" checked>c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3" >jard&iacute;n ';    
}else{
if($row['averdes']==50){
echo'<input type="checkbox" name="averdes[]" value="1" checked>&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2" checked>c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3" checked>jard&iacute;n ';     
}else{
echo'<input type="checkbox" name="averdes[]" value="1">&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2">c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3">jard&iacute;n ';     
}
}
}
//echo'<td><input type="text" name="averdes">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se encuentra en buen estado:';
echo'</td>';
echo'<td><input type="text" name="estaver" value="'.$row['estaver'].'">';
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
echo'<td><input type="text" name="gente" value="'.$row['gente'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>porcentaje de afluencia contra lo posible:';
echo'</td>';
echo'<td><input type="text" name="diario" value="'.$row['diario'].'">';
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
echo'<td><input type="text" name="respint" value="'.$row['respint'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se cuenta con un reglamento de orden:';
echo'</td>';
echo'<td><input type="text" name="orden" value="'.$row['orden'].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se mantiene limpio:';
echo'</td>';
echo'<td><input type="text" name="limpieza" value="'.$row['limpieza'].'">';
echo'</td>';
echo'</tr>';



echo'</table>';

		
echo'<div><input type="button" value="Guardar Par&aacute;mentros" name="boton_enviar" onclick="forma.submit()"></div> ';

if($_POST['cmd']==1){
    if($_POST['parque']){
        if($_POST['visita']){
 $result = count($_POST[averdes]);
            
        if($result==1){
            $averdes1=17;
        }
         if($result==2){
            $averdes1=34;
        }
         if($result==3){
            $averdes1=50;
        }
            $sSQL="UPDATE `wp_comites_parques` set `fecha_visita`='$_POST[fecha_visita]',`opera`='$_POST[opera]', `formaliza`='$_POST[formaliza]', `organiza`='$_POST[organiza]', `reunion`='$_POST[reunion]', `proyecto`='$_POST[proyecto]',`disenio`='$_POST[disenio]',`ejecutivo`='$_POST[ejecutivo]', `instalaciones`='$_POST[instalaciones]', `estado`='$_POST[estado]', `ingresop`='$_POST[ingresop]', `ingresadop`='$_POST[ingresadop]', `mancomunado`='$_POST[mancomunado]', `eventos`='$_POST[eventos]', `eventosr`='$_POST[eventosr]', `averdes`='$averdes1', `estaver`='$_POST[estaver]',  `gente`='$_POST[gente]', `diario`='$_POST[diario]', `limpieza`='$_POST[limpieza]', `orden`='$_POST[orden]', `respint`='$_POST[respint]'   where cve_parque=$parque and cve=$_POST[visita]";
		mysql_db_query("parquesa_wrdp1",$sSQL);
//`semana`='$_POST[semana]', `finsem`,
		//echo$sSQL;
                echo'<p align="center">';
		echo'Parque editado con exito<input type="button" value="Cerrar" onClick="window.close()">';
		echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
        }else{
 $result = count($_POST[averdes]);
            
        if($result==1){
            $averdes1=17;
        }
         if($result==2){
            $averdes1=34;
        }
         if($result==3){
            $averdes1=50;
        }
           $sSQL="INSERT INTO `wp_comites_parques`(`cve_parque`, `fecha_visita`,`opera`, `formaliza`, `organiza`, `reunion`, `proyecto`,`disenio`,`ejecutivo`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `mancomunado`, `eventos`, `eventosr`, `averdes`, `estaver`,  `gente`, `diario`, `limpieza`, `orden`, `respint`) VALUES ('$parque','$_POST[fecha_visita]','$_POST[opera]','$_POST[formaliza]','$_POST[organiza]','$_POST[reunion]','$_POST[proyecto]','$_POST[disenio]','$_POST[ejecutivo]','$_POST[instalaciones]','$_POST[estado]','$_POST[ingresop]','$_POST[ingresadop]','$_POST[mancomunado]','$_POST[eventos]','$_POST[eventosr]','$averdes1','$_POST[estaver]','$_POST[gente]','$_POST[diario]','$_POST[limpieza]','$_POST[orden]','$_POST[respint]')";
//,'$_POST[semana]','$_POST[finsem]' `semana`, `finsem`,
		//`riego`,'$riego',
                //`gente`, `diario`,
                //'$gente','$diario',
               mysql_db_query("parquesa_wrdp1",$sSQL);
		//echo$sSQL;
      
       
		echo'<p align="center">';
		echo'Visita guardada';
		echo'da click en el boton para cerrar<input type="button" value="Cerrar" onClick="window.close()"> o';
                echo'Agregar comentarios a la visita <a href="comentarios_parametros.php?parque='.$parque.'">click aqui</a>';
		echo'</p>'; 
        }
    }else{
        echo'No ha seleccionado ningun parque';
    }
		
$sql="select * from wp_arturo_parque where cve=$parque";
	$res=mysql_query($sql);
               
	$row3 = mysql_fetch_array($res);
	
			$cuerpob = "El usuario: " . $current_user->user_email . "\n<br>";
			$cuerpob .= "Ha agregado una nueva visita al parque: " . $parque . "\n<br>";
			$cuerpob .= "Nombre del parque: " . $row3["nom"] . "\n<br>";
			$cuerpob .= "Fecha y Hora de edici&oacute;n: " .date('d-m-Y : H:i:s'). "\n";
			$fromb = "From: contacto@parquesalegres.org\r\nContent-type: text/html\r\n";

			//$res2=mail($current_user->user_email,"Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			$res2=mail("mikee.vale@gmail.com","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			//$res2=mail("contacto@parquesalegres.org","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			//$res2=mail("albertocoppel@gmail.com","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			
		
			if($res2){
                echo'<p align="center">';
		echo'Par&aacute;metros guardados con exito<input type="button" value="Cerrar" onClick="window.close()">';
		echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
                        }
    }

echo '<input type=hidden name="cmd" value="1">';
echo '<input type=hidden name="parque" value="'.$parque.'">';
echo '<input type=hidden name="visita" value="'.$visita.'">';
echo'</form> </fieldset>';
}
}

function altaparametros_uno()
{
//add_menu_page( 'Administración parques', 'Administración parques', 'read', 'parques', 'parques');
add_submenu_page( 'tools.php', __( "Alta parámetros", "Alta%20Parámetros" ), __( "Alta parámetros", "Alta%20Parámetros" ), 'read', 'Alta%20Parámetros', 'agregacomentarios_tres' );
}

add_action('admin_menu', 'altaparametros_uno');
add_shortcode('altaparametros', 'altaparametros_dos');
add_shortcode('altaparametros3', 'altaparametros_tres');

?>