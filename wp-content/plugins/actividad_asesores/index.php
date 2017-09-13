<?php
/**
 * @package PA Actividad Asesores
 * @version 1.0
 */
/*
Plugin Name: PA Actividad Asesores
Plugin URI: http://di99.com
Description: Esta es una prueba de un plugin para Wordpress, la idea es hacer pruebas para incorporar funciones especiales de manejo de base de datos y personalización de pantallas. Se trata de probar funciones adicionales en las entradas (posts), opciones para la creación de Widgets y opciones de administración en el menu lateral que tiene el sistema.
Author: Brenda Gudiño Lopez
Version: 1.0
Author URI: http://eci.mx/
*/
//Aqui esta el codigo para que aparezca el menu votacion del lado izquiero
//add_action('admin_menu', 'my_plugin_menu11');

function my_plugin_menu11() {
        add_menu_page( 'Actividad Asesores', 'Actividad Asesores', 'edit_posts', 'Actividad Asesores', 'actividad_tres' );
}

function actividad_tres()
{
echo'<form name="forma" method="post">';
	
echo'<br><br>Seleccione rango de fechas para ver la cantidad de par&aacute;metros capturados por asesor:<br><br>';	
	
	
echo'<table border=1>';
/*echo'<tr>';
echo'<td colspan="2">Selecciona un asesor:';
echo'</td>';
echo'</tr>';*/
echo'<tr><td colspan="2">Seleccione el rango de fechas:</tr>';
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
echo '<tr><th>Fecha</th><td><input type="text" id="datepicker" name="fecha1"/></td></tr>';
echo '<tr><th>Fecha</th><td><input type="text" id="datepicker2" name="fecha2"/></td></tr>';
echo'</table>';
echo '<input type="submit" value="Filtrar"></form><br>';

$filtro='1';
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

$manana=date( "Y-m-d", strtotime( "$fecha1 +1 day" ) );
$manana2=date( "Y-m-d", strtotime( "$fecha2 +1 day" ) );

if ($_POST['fecha1'] && !$_POST['fecha2']) $filtro.=" and a.fec>='$fecha1' and a.fec<'$manana'";
if ($_POST['fecha2'] && !$_POST['fecha1']) $filtro.=" and a.fec>='$fecha2' and a.fec<'$manana2'";
if (($_POST['fecha1']) && ($_POST['fecha2'])) $filtro.=" and a.fec between '$fecha1' and '$fecha2' ";

$sql="SELECT count(b.post_author) as visitas,c.display_name as asesor FROM `wp_comites_parques` as a,wp_posts as b,wp_users as c where $filtro and a.cve_parque=b.ID and b.post_author=c.ID group by b.post_author ORDER BY `visitas` ASC";

echo'Visitas del ';echo$_POST['fecha1']; echo' al ';
echo$_POST['fecha2'];
$c=0;
$res=mysql_query($sql);

$tot_parques=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
	echo'<table border=1>';
echo'<tr><th>Asesor</th><th>Num. Visitas</th><th>Caracteres capturados</th></tr><tr>';
echo'<th>'.$row['asesor'].'</th>';
echo'<td>'.$row['visitas'].'</td>';
$asesor=$row['asesor'];
$sql2="SELECT SUM( LENGTH( a.opera ) ) + SUM( LENGTH( a.formaliza ) ) + SUM( LENGTH( a.organiza ) ) + SUM( LENGTH( a.reunion ) ) + SUM( LENGTH( a.proyecto ) ) + SUM( LENGTH( a.disenio ) ) + SUM( LENGTH( a.ejecutivo ) ) + SUM( LENGTH( a.vespacio ) ) + SUM( LENGTH( a.instalaciones ) ) + SUM( LENGTH( a.estado ) ) + SUM( LENGTH( a.ingresop ) ) + SUM( LENGTH( a.ingresadop ) ) + SUM( LENGTH( a.mancomunado ) ) + SUM( LENGTH( a.eventos ) ) + SUM( LENGTH( a.eventosr ) ) + SUM( LENGTH( a.averdes ) ) + SUM( LENGTH( a.estaver ) ) + SUM( LENGTH( a.riego ) ) + SUM( LENGTH( a.gente ) ) + SUM( LENGTH( a.respint ) ) + SUM( LENGTH( a.orden ) ) + SUM( LENGTH( a.limpieza ) ) AS caracteres FROM  `wp_comites_parques` AS a, wp_posts AS b, wp_users AS c WHERE $filtro AND a.cve_parque = b.ID AND b.post_author = c.ID AND c.display_name LIKE '%$asesor%'";
$res2=mysql_query($sql2);
$row2=mysql_fetch_array($res2);
echo'<td>'.$row2['caracteres'].'</td>';
echo'</tr>';
echo'</table>';
echo'<br>';
$sql3="SELECT COUNT( b.post_author ) AS  visitas, b.post_title AS parque FROM  `wp_comites_parques` AS a, wp_posts AS b, wp_users AS c WHERE $filtro AND a.cve_parque = b.ID AND b.post_author = c.ID AND c.display_name LIKE  '%$asesor%' GROUP BY b.post_title ORDER BY  visitas ASC";
//echo$sql3;
$res3=mysql_query($sql3);
echo'<table border=1>';
echo'<tr><th></th><th>Parque</th><th>Num. Visitas</th></tr><tr>';
$tot_parques=mysql_num_rows($res3);
$c=0;
while($row3=mysql_fetch_array($res3)){
$c++;
echo'<td>'.$c.'</td>';
echo'<th>'.$row3['parque'].'</th>';
echo'<td>'.$row3['visitas'].'</td>';
echo'</tr>';
}
echo'</table><br><br><hr style="height:1px;border:none;color:#333;background-color:#333;" /><br><br>';
}


echo'</form>';
}

/*function altaparametros_uno()
{
//add_menu_page( 'Administración parques', 'Administración parques', 'edit_posts', 'parques', 'parques');
add_submenu_page( 'edit.php?post_type=parque', "Alta parámetros", "ParquesAlegres", "Alta parámetros", "ParquesAlegres", 'edit_posts', 'ParquesAlegres', 'agregacomentarios_tres' );
}*/
function actividad_uno()
{
add_submenu_page( 'reportes', __( "Actividad Asesores", "actividad" ), __( "Actividad Asesores", "actividad" ), 'edit_posts', 'actividad', 'actividad_tres' );
}

add_action('admin_menu', 'actividad_uno');
add_shortcode('actividad', 'actividad_dos');
add_shortcode('actividad3', 'actividad_tres');

?>