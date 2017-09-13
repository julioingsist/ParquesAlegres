<?php
/**
 * @package Edicionparques
 * @version 1.0
 */
/*
Plugin Name: Tabla de parques para editar datos
Plugin URI: http://di99.com
Description: Esta es una prueba de un plugin para Wordpress, la idea es hacer pruebas para incorporar funciones especiales de manejo de base de datos y personalización de pantallas. Se trata de probar funciones adicionales en las entradas (posts), opciones para la creación de Widgets y opciones de administración en el menu lateral que tiene el sistema.
Author: Arturo Gudiño Chong
Version: 1.0
Author URI: http://eci.mx/
*/

//Aqui esta el codigo para que aparezca el menu votacion del lado izquiero
add_action('admin_menu', 'my_plugin_menu2');
 
function my_plugin_menu2() {
	add_menu_page( 'Parques', 'Parques', 'read', 'parques', 'edicionparques_tres');
       // add_menu_page( 'Parques', 'Parques', 'read', 'parques', 'edicionparques_tres' );
}

function edicionparques_dos()
{
	echo 'Calificación de parques<br />';
	echo '<iframe src="http://di99.com/parques/tabla.php" width="580" height="800"></iframe>';
}

function edicionparques_tres()
{

echo'<form name="forma" method="post">';
	echo 'Localiza el parque que quieras editar<br /><a href="http://parquesalegres.org/wp-admin/admin.php?page=alta%20parques"> o da click aquí para agregar un parque nuevo</a><br /><br />
Nombre del parque: <input type="text" name="fil"> <input type="submit" value="Buscar"></form>';

	
$filtro='1';

if ($_POST['fil']!='') $filtro.=" and nom LIKE '%".$_POST['fil']."%' ";
$sql="SELECT a.* FROM wp_arturo_parque as a, wp_comites_parques as b where $filtro and a.cve=b.cve_parque group by a.cve order by a.calif desc";

$c=0;
$res=mysql_query($sql);
echo'<table><tr><td>No.</td><td>Nombre del parque</td><td>Tipo</td><td>Superficie</td><td>Visitas</td></tr>';
while($row=mysql_fetch_array($res)){
$c++;
echo'<tr><td>'.$c.'</td>';
echo'<td><a href="http://parquesalegres.org/wp-admin/admin.php?page=alta%20parques&parque='.$row['cve'].'" target="_blank">'.$row['nom'].'</a></td>';
echo'<td>'.$row['tipo'].'</td>';
echo'<td>'.$row['sup'].'</td>';
$parque=$row['cve'];
$sqla="select count(*) as totalvisitas from wp_comites_parques where cve_parque=$parque";
$resa=mysql_query($sqla);
$rowa=mysql_fetch_array($resa);

echo'<td>'.$rowa['totalvisitas'].'</td></tr>';
}
echo'</table>';
echo'</form>';



}


function edicionparques_uno()
{
add_submenu_page( 'tools.php', __( "edita parques", "edicionparques" ), __( "edita parques", "edicionparques" ), 'export', 'edicionparques', 'edicionparques_tres' );
}

add_action('admin_menu', 'edicionparques_uno');
add_shortcode('edicionparques', 'edicionparques_dos');
add_shortcode('edicionparques3', 'edicionparques_tres');


?>