<?php
/**
 * @package Arturo
 * @version 1.0
 */
/*
Plugin Name: Tabla de parques para agregar parámetros
Plugin URI: http://di99.com
Description: Tabla de parques para agregar parámetros.
Author: Mike Valenzuela
Version: 1.0
Author URI: http://eci.mx/
*/
//Aqui esta el codigo para que aparezca el menu votacion del lado izquiero
add_action('admin_menu', 'my_plugin_menu3');
 
function my_plugin_menu3() {
        add_menu_page( 'Parámetros Parque', 'Parámetros Parque', 'read', 'Parámetros Parque', 'parametros_tres' );
}
function parametros_dos()
{
	echo 'Calificación de parques<br />';
	echo '<iframe src="http://di99.com/parques/tabla.php" width="580" height="800"></iframe>';
}

function parametros_tres()
{
echo'<form name="forma" method="post">';
if(!$_GET['parque']){
	echo 'Encuentra el parque, da click en su nombre para agregar o editar parámetros.<br /><br />
Nombre del parque: <input type="text" name="fil"> <input type="submit" value="Buscar"></form>';

	
$filtro='1';

$bar=$_POST['fil'];
//con esta funcion convierte acentos en html
$bar2=htmlentities($bar, ENT_QUOTES,'UTF-8');
if ($_POST['fil']!='') $filtro.=" and nom LIKE '%".$bar2."%' ";
$sql="SELECT * FROM wp_arturo_parque  where $filtro order by nom desc";
echo$_POST['fil'];
echo'-';
echo$bar2;
$c=0;
$res=mysql_query($sql);
echo'<table><tr><td>No.</td><td>Nombre del parque</td><td>Tipo</td><td>Superficie</td><td>Visitas</td></tr>';
while($row=mysql_fetch_array($res)){
$c++;
echo'<tr><td>'.$c.'</td>';

//http://parquesalegres.org/wp-admin/admin.php?page=Alta%20Par%C3%A1metros
echo'<td><a href="http://parquesalegres.org/wp-admin/admin.php?page=Par%C3%A1metros%20Parque&parque='.$row['cve'].'" target="_blank">'.$row['nom'].'</a></td>';
echo'<td>'.$row['tipo'].'</td>';
echo'<td>'.$row['sup'].'</td>';
$parque=$row['cve'];
$sqla="select count(*) as totalvisitas from wp_comites_parques where cve_parque=$parque";
$resa=mysql_query($sqla);
$rowa=mysql_fetch_array($resa);

echo'<td>'.$rowa['totalvisitas'].'</td></tr>';
}
echo'</table>';
}else{
$parque=$_GET['parque'];
echo'<br>';
echo'Seleccione el numero de visita para editar los par&aacute;metros o de <a href="http://parquesalegres.org/wp-admin/admin.php?page=Alta%20Par%C3%A1metros&parque='.$parque.'">CLICK AQU&Iacute;</a> para agregar una nueva visita';
echo'<br>';
echo'<br>';
$sqli="SELECT * FROM wp_arturo_parque  where cve=$parque";
//echo$sqli;
$resi=mysql_query($sqli);
$rowi = mysql_fetch_array($resi);
echo'Parque: ';
echo$rowi['nom'];
echo'<br><br>';
$sql="select * from wp_comites_parques where cve_parque=$parque order by cve";
$res=mysql_query($sql);
echo'<table  border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;" width="620px">';
echo'<tr><td bgcolor="#cede53" align="center">Visita</td><td colspan="5"  bgcolor="#cede53" align="center">Comit&eacute; (20)</th><td colspan="4"  bgcolor="#cede53" align="center">Instalaciones (50)</td><td colspan="3"  bgcolor="#cede53" align="center">Ingresos (50)</td><td colspan="2"  bgcolor="#cede53" align="center">Eventos (50)</td><td colspan="2"  bgcolor="#cede53" align="center">&Aacute;reas verdes (33)</td><td colspan="2"  bgcolor="#cede53" align="center">Afluencia (50)</td><td colspan="3"  bgcolor="#cede53" align="center">Orden (33)</td></tr>
		<tr>
		<td colspan="2">&nbsp;</td>
		<td>OPERA CON 3 PERSONAS O MAS</td>
		<td>ESTA FORMALIZADO COMO A.C. / OFICIO AYUNTAMIENTO</td>
		<td>CUENTA CON BUENA ORGANIZACI&Oacute;N (CON ORDEN - FORMALIDAD)</td>
		<td>EXISTEN REUNIONES CON REGULARIDAD</td>
		<td>TIENEN PROYECTOS EN PROCESO</td>
		<td>CUENTA CON PROYECTO DE DISE&Nacute;O</td>
		<td>CUENTA CON PROYECTO EJECUTIVO</td>
		<td>ESTAN EN BUEN ESTADO LO QUE EXISTE</td>
		<td>HAY INSTALACIONES EN LA MAYORIA DEL ESPACIO(CANCHAS, AREAS VERDES,BANQUETAS,ETC)</td>
		<td>TIENEN FUENTES DE INGRESOS PERMANENTES</td>
		<td>ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</td>
		<Td>TIENEN CUENTA MANCOMUNADA</Td>
		<td>HAY EVENTOS CON REGULARIDAD</td>
		<td>CUENTAN CON UN CALENDARIO ANUAL DE ACTIVIDADES</td>
		<td>CUENTA CON ARBOLES, CESPED Y JARDIN</td>
		<td>SE ENCUENTRAN EN BUEN ESTADO</td>
		<td>% DE AFLUENCIA SOBRE LO EXISTENTE</td>
		<td>% DE AFLUENCIA CONTRA LO POSIBLE</td>
		<td>LAS INSTALACIONES SE RESPETAN</td>		
		<td>SE CUENTA CON REGLAMENTO DE ORDEN</td>
		<td>SE MANTIENE LIMPIO</td>
		</tr>';
$c=0;
while($row=mysql_fetch_array($res)){
$c++;
echo'<tr><td><a href="http://parquesalegres.org/wp-admin/admin.php?page=Comentarios%20Par%C3%A1metros&parque='.$row['cve_parque'].'&visita='.$row['cve'].'" target="_blank">Agregar Comentarios</a></td><td><a href="http://parquesalegres.org/wp-admin/admin.php?page=Alta%20Par%C3%A1metros&parque='.$row['cve_parque'].'&visita='.$row['cve'].'" target="_blank">'.$c.'</a></td>';
echo'
		<td align="center">'.$row['opera'].'</td>
		<td align="center">'.$row['formaliza'].'</td>
		<td align="center">'.$row['organiza'].'</td>
		<td align="center">'.$row['reunion'].'</td>
		<td align="center">'.$row['proyecto'].'</td>
		<td align="center">'.$row['disenio'].'</td>
		<td align="center">'.$row['ejecutivo'].'</td>
		<td align="center">'.$row['estado'].'</td>
		<td align="center">'.$row['instalaciones'].'</td>
		<td align="center">'.$row['ingresop'].'</td>
		<td align="center">'.$row['ingresadop'].'</td>
		<td align="center">'.$row['mancomunado'].'</td>
		<td align="center">'.$row['eventosr'].'</td>
		<td align="center">'.$row['eventos'].'</td>
		<td align="center">'.$row['averdes'].'</td>
		<td align="center">'.$row['estaver'].'</td>
		<td align="center">'.$row['gente'].'</td>
		<td align="center">'.$row['diario'].'</td>
		<td align="center">'.$row['respint'].'</td>
		<td align="center">'.$row['orden'].'</td>		
		<td align="center">'.$row['limpieza'].'</td>
		</tr>
		';
	}
echo'</table>';
}

echo'</form>';


}

function parametros_uno()
{
add_submenu_page( 'tools.php', __( "Mike VL", "parametros" ), __( "Mike VL", "parametros" ), 'export', 'parametros', 'parametros_dos' );
}

add_action('admin_menu', 'parametros_uno');
add_shortcode('parametros', 'parametros_dos');
add_shortcode('parametros3', 'parametros_tres');

?>