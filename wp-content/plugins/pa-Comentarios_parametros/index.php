<?php
/**
 * @package comentarios parametros
 * @version 1.0
 */
/*
Plugin Name: PA Tabla para agregar comentarios de Parametros a parques
Plugin URI: http://di99.com
Description: Plugin con el cual se muestra el listado de parques para agregar comentarios a los parametros de la ultima visita
Author: Arturo Gudiño Chong
Version: 1.0
Author URI: http://eci.mx/
*/

function parametrosparques_dos()
{
	echo 'Calificación de parques<br />';
	echo '<iframe src="http://di99.com/parques/tabla.php" width="580" height="800"></iframe>';
}

function parametrosparques_tres()
{

echo'<form name="forma" method="post" action="http://parquesalegres.org/comentarios-de-parametros/">';
	echo 'Localiza el parque que quieras editar<br /> da click en el nombre para agregar comentarios a los parametros de la ultima visita<br /><br />
Nombre del parque: <input type="text" name="fil"> <input type="submit" value="Buscar"></form>';


$filtro='1';

if ($_POST['fil']!='') $filtro.=" and post_title LIKE '%".$_POST['fil']."%' ";
$sql="SELECT id as cve, post_title as nom FROM  `wp_posts` WHERE $filtro and post_type='parque' AND post_status='publish' order by post_title desc";
//$sql="SELECT * FROM wp_arturo_parque  where $filtro order by calif desc";

$c=0;
$res=mysql_query($sql);
echo'<table><tr><td>No.</td><td>Nombre del parque</td><td>Tipo</td><td>Superficie</td><td>Visitas</td></tr>';
while($row=mysql_fetch_array($res)){
$c++;
echo'<tr><td>'.$c.'</td>';
echo'<td><a href="http://parquesalegres.org/editar-comentarios-parametros/?parque='.$row['cve'].'" target="_blank">'.$row['nom'].'</a></td>';
$sql3="SELECT * FROM  `wp_postmeta` WHERE post_id =$parque AND (meta_key =  '_parque_sup' OR meta_key =  '_parque_tipo')";
$res3=mysql_query($sql3);
while($row3=mysql_fetch_array($res3)){
echo'<td>1'.$row3['meta_value'].'</td>';
echo'<td>2'.$row3['meta_value'].'</td>';
}
$parque=$row['cve'];
$sqla="select count(*) as totalvisitas from wp_comites_parques where cve_parque=$parque";
$resa=mysql_query($sqla);
$rowa=mysql_fetch_array($resa);

echo'<td>q'.$rowa['totalvisitas'].'</td></tr>';
}
echo'</table>';
echo'</form>';

}

function parametrosparques_uno()
{
add_submenu_page( 'edit.php?post_type=parque', __( "Arturo GC", "parametrosparques" ), __( "Arturo GC", "parametrosparques" ), 'edit_posts', 'parametrosparques', 'parametrosparques_dos' );
}

//add_action('admin_menu', 'parametrosparques_uno');
add_shortcode('parametrosparques', 'parametrosparques_dos');
add_shortcode('parametrosparques3', 'parametrosparques_tres');

?>