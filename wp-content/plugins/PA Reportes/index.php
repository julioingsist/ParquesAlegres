<?php
/**
 * @package Arturo
 * @version 1.0
 */
/*
Plugin Name: PA Reportes
Plugin URI: http://di99.com
Description: Reportes de parques
Author: Brenda Gudiño
Version: 1.0
Author URI: http://eci.mx/
*/
/** Step 2 (from text above). */
//add_action( 'admin_menu', 'my_plugin_menurep' );
/** Step 1. */
/*function my_plugin_menurep() {
	add_options_page( 'Reportes', 'Reportes', 'edit_posts', 'Reportes', 'my_plugin_options' );
	add_options_page( 'Datos de Parques de asesores', 'Datos de Parques de asesores', 'edit_posts', 'Datos de Parques de asesores', 'my_plugin_options1' );
	//add_menu_page( 'Calificación de parámetros', 'calificación de parámetros', 'edit_posts', 'Calificación de parámetros', 'reportes_tres' );
}*/

/** Step 3. */
function my_plugin_options() {
	 echo do_shortcode('[wpdatatable id=1]');
}
function reportes_uno()
{
	add_menu_page( 'Reportes', 'Reportes', 'edit_posts', 'reportes', 'my_plugin_options');
	add_submenu_page('reportes', 'Calificación de Parámetros', 'Calificación de Parámetros', 'edit_posts', 'reportes' );
}
add_action('admin_menu', 'reportes_uno');
//------
function my_plugin_options1() {
	 echo do_shortcode('[wpdatatable id=2]');
}
function my_plugin_options2() {
	 echo do_shortcode('[wpdatatable id=5]');
}
function lista2(){
	echo do_shortcode('[wpdatatable id=6]');
}
function lista3(){
	echo do_shortcode('[wpdatatable id=7]');
}
function lista4(){
	echo do_shortcode('[wpdatatable id=8]');
}
function lista5(){
	echo do_shortcode('[wpdatatable id=9]');
}
function lista() {
	$tipo=array(1=>"Instalaciones",2=>"Áreas de esparcimiento",3=>"Área deportiva",4=>"Área verde");
	$estado=array(1=>"Bueno",2=>"Regular",3=>"Malo");
	$sql="select * from checklist order by cve_parque,clasificacion,data";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)>0){
		echo '<table border=1><tr>
		<th>Parque</th><th>Tipo</th><th>Aditamento</th><th>Cantidad</th><th>Estado</th><th>Faltante</th></tr>';
		while($row=mysql_fetch_array($res)){
			$row['data'] = str_replace(' ', '', $row['data']);
			echo '<tr>
			<td>'.$row['cve_parque'].'</td>
			<td>'.$tipo[$row['clasificacion']].'</td>
			<td>'.$row['parametro'].'</td>';
			if($row['clasificacion']==1 && $row['parametro']=="canasta"){
				echo '<td> - </td>
				<td>'; if($row['data']==1){ echo 'Sí';} else{ echo 'No';}echo '</td>
				<td> - </td>';
				if($row['data']==1){
					$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Si","Faltante"=>" - ");
				}else{
					$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"No","Faltante"=>" - ");
				}
			}
			elseif($row['clasificacion']==1 && $row['parametro']=="cajones"){
				$data=split(',',$row['data']);
				echo '<td>'.$data[0].'</td>
				<td> - </td>
				<td>'.$data[1].'</td>';
				$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>" - ","Faltante"=>$data[1]);
			}
			elseif($row['clasificacion']==3 && $row['parametro']=="gimnasio"){
				echo '<td> - </td>
				<td>'; if($row['data']==1){ echo 'Sí';} else{ echo 'No';}echo '</td>
				<td> - </td>';
				if($row['data']==1){
					$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Si","Faltante"=>" - ");
				} else{
					$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"No","Faltante"=>" - ");
				}
				
			}
			elseif($row['clasificacion']==3 && $row['parametro']=="promotores"){
				echo '<td>'.$row['data'].'</td>
				<td> - </td>
				<td> - </td>';
				$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$row['data'],"Estado"=>" - ","Faltante"=>" - ");
			}
			elseif($row['clasificacion']==3 && $row['parametro']=="deportes"){
				echo '<td>'.$row['data'].'</td>
				<td> - </td>
				<td> - </td>';
				$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$row['data'],"Estado"=>" - ","Faltante"=>" - ");
			}
			elseif($row['clasificacion']==4){
				if($row['parametro']=="cesped"){
					echo '<td> - </td>
					<td>'; if($row['data']==1){ echo 'Área verde'; } elseif($row['data']==2){ echo 'Sintético'; } else{ echo 'Deportivo'; } echo '</td>
					<td> - </td>';
					if($row['data']==1){
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Area verde","Faltante"=>" - ");
					} elseif($row['data']==2){
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Sintetico","Faltante"=>" - ");
					} else{
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Deportivo","Faltante"=>" - ");
					}
				}
				elseif($row['parametro']=="arboles"){
					$data=split(',',$row['data']);
					echo '<td>'.$data[0].'</td>
					<td>'; if(($data[1])==1){ echo 'Chico'; } elseif($data[1]==2){ echo 'Mediano'; } else{ echo 'Grande'; } echo '</td>
					<td>'.$data[2].'</td>';
					if(($data[1])==1){
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>"Chico","Faltante"=>$data[2]);
					} elseif($data[1]==2){
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>"Mediano","Faltante"=>$data[2]);
					} else{
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>"Grande","Faltante"=>$data[2]);
					}
				}
				elseif($row['parametro']=="arbusto"){
					echo '<td> - </td>
					<td>'; if($row['data']==1){ echo 'Chico'; } else{ echo 'Grande'; } echo '</td>
					<td> - </td>';
					if($row['data']==1){
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Chico","Faltante"=>" - ");
					} else{
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Grande","Faltante"=>" - ");
					}
				}
				else{
					echo '<td> - </td>
					<td>'; if($row['data']==1){ echo 'Por goteo'; } else{ echo 'Automatizado'; } echo '</td>
					<td> - </td>';
					if($row['data']==1){
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Por goteo","Faltante"=>" - ");
					} else{
						$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Automatico","Faltante"=>" - ");
					}
				}
			}
			else{
				$data=split(',',$row['data']);
				echo '<td>'.$data[0].'</td>
				<td>'.$estado[$data[1]].'</td>
				<td>'.$data[2].'</td>';
				$return_array[]=array("Parque"=>$row['cve_parque'],"Tipo"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>$estado[$data[1]],"Faltante"=>$data[2]);
			}
			echo '</tr>';
		}
		echo '</tr><tr><td colspan="6">'.mysql_num_rows($res).'</td></table>';
	}
	else{
		echo 'No hay datos registrados bajo ese criterio';
	}
}

function reportes_uno1()
{
	//para submenu
	add_submenu_page( 'reportes', __( "Datos de Parques de asesores", "datosasesores" ), __( "Datos de Parques de asesores", "datosasesores" ), 'edit_posts', 'datosasesores', 'my_plugin_options1' );
	// para menu admin......add_menu_page( 'Datos de Parques de asesores', 'Datos de Parques de asesores', 'edit_posts', 'Datos de Parques de asesores', 'my_plugin_options1');
}
function reportes2()
{
	add_submenu_page( 'reportes', __( "Datos de Checklist", "checklist" ), __( "Datos de Checklist", "checklist" ), 'edit_posts', 'checklist', 'lista2' );
}
function reportes3()
{
	add_submenu_page( 'reportes', __( "Experiencias Exitosas", "experiencias" ), __( "Experiencias Exitosas", "experiencias" ), 'edit_posts', 'experiencias', 'lista3' );
}
function reportes4()
{
	add_submenu_page( 'reportes', __( "Visitas Reforzamiento", "reforzamiento" ), __( "Visitas Reforzamiento", "reforzamiento" ), 'edit_posts', 'reforzamiento', 'lista4' );
}
function reportes5()
{
	add_submenu_page( 'reportes', __( "Asistencia Comités", "asistencia" ), __( "Asistencia Comités", "asistencia" ), 'edit_posts', 'asistencia', 'lista5' );
}
add_action('admin_menu', 'reportes_uno1');
add_action('admin_menu', 'reportes2');
add_action('admin_menu', 'reportes3');
add_action('admin_menu', 'reportes4');
add_action('admin_menu', 'reportes5');
//------------------------------------
function actividad1()
{
add_submenu_page( 'reportes', __( "Datos de Comite de Parques", "comites" ), __( "Datos de Comite de Parques", "comites" ), 'edit_posts', 'comites', 'my_plugin_options2' );
}

add_action('admin_menu', 'actividad1');
add_action('admin_menu', 'reportes_uno');
add_action('admin_menu', 'reportes_uno1');
add_shortcode('reportes', 'my_plugin_options');
add_shortcode('reportes1', 'my_plugin_options1');
add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
 
    global $user_ID;
 
    if ( current_user_can( 'becario_exp' ) ) {
	remove_menu_page('edit.php'); // Posts
	remove_menu_page('edit.php?post_type=page'); // Pages
	remove_menu_page( 'edit.php?post_type=parque' );
	remove_menu_page( 'edit.php?post_type=sp_faq' );
	remove_menu_page( 'edit.php?post_type=proveedor' );
	remove_menu_page( 'edit.php?post_type=institution' );
	remove_menu_page('link-manager.php'); // Links
	remove_menu_page('edit-comments.php'); // Comments
	remove_menu_page('plugins.php'); // Plugins
	remove_menu_page('themes.php'); // Appearance
	remove_menu_page('users.php'); // Users
	remove_menu_page('tools.php'); // Tools
	remove_menu_page('options-general.php'); // Settings
	remove_menu_page('reportes');
	remove_menu_page('datosasesores');
	remove_menu_page('experiencias');
	remove_menu_page('reforzamiento');
	remove_menu_page('comites');
	remove_menu_page('actividad');
	remove_menu_page('indicadores');
	remove_menu_page('wpcf7');
    }
}
?>