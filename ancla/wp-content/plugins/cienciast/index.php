<?php
/**
 * @package Cienciast
 * @version 1.0
 */
/*
Plugin Name: Cienciast
Plugin URI: http://di99.com
Description: Esta es una prueba de un plugin para Wordpress, la idea es hacer pruebas para incorporar funciones especiales de manejo de base de datos y personalización de pantallas. Se trata de probar funciones adicionales en las entradas (posts), opciones para la creación de Widgets y opciones de administración en el menu lateral que tiene el sistema.
Author: Arturo Gudiño Chong
Version: 1.0
Author URI: http://eci.mx/
*/

function cienciast_dos()
{
	echo 'Calificación de parques<br />';
	echo '<iframe src="http://di99.com/parques/tabla.php" width="580" height="800"></iframe>';
}

function cienciast_tres()
{
echo'<strong>"Esta es la solicitud para el apoyo de planos para parques  por parte de la  Escuela Ciencias de la Tierra".</strong>

<strong>Favor de dar click al enlace que se encuentra abajo(instalar adobe reader para poder ver el documento).</strong>

<span style="color: #339966;"><strong><a href="http://parquesalegres.org/wp-content/uploads/2011/10/forma.pdf"><span style="color: #339966;">Solicitud para la realización del plano a tu parque    </span></a> </strong></span>         &lt;&lt;&lt;&lt;&lt;-------- El enlace.
&nbsp;
&nbsp;<span style="color: #339966;"><strong><a href="http://adobe-reader.softonic.com/"><span style="color: #339966;">Descargar adobe reader</span></a></strong></span> 

&nbsp;
&nbsp;

<p>Si tu parque aun no cuenta con plano, te invitamos a que lo obtengas , es muy facil. Solo necesitas imprimir la solicitud , que sea firmada por el comite y entregarla al área de servicio social.</p>
<p>Una vez obtenido el plano topografico , deberás acudir a la facultad de arquitectura para que te elaboren tu diseño y paisajismo, animate!!!</p>

</ul><br>Listado de Proveedores.<br />';
 echo'<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;" width="544">';
 $sql="SELECT *FROM `wp_ciencias_tierra`";
		$db='parques_wrdp1';
	 $res=mysql_db_query("$db",$sql);
	 while($row=mysql_fetch_array($res)){
	
		echo'<tr><th>contacto</th><td align="center">'.$row['contacto'].'</td></tr>';	
		echo'<tr><th>telefono</th><td align="center">'.$row['telefono'].'</td></tr>';
		echo'<tr><th>direccion</th><td align="center">'.$row['direccion'].'</td></tr>';
		echo'<tr><th>email</th><td align="center">'.$row['email'].'</td></tr>';	
		echo'<tr><th>horario</th><td align="center">'.$row['horario'].'</td></tr>';	
		echo'<tr><th>costo</th><td align="center">'.$row['costo'].'</td></tr>';	
		echo'<tr><th>beneficio</th><td align="center">'.$row['beneficio'].'</td></tr>';
		echo'<tr><th>corresponsabilidad</th><td align="center">'.$row['corresponsabilidad'].'</td></tr>';
		echo'<tr><th>observaciones</th><td align="center">'.$row['observaciones'].'</td></tr>';
		 }
		echo'</table>';

	
	

    


	//echo'<div id="visualization"></div>';

}

function cienciast_uno()
{
add_submenu_page( 'tools.php', __( "Arturo GC", "arturo" ), __( "Arturo GC", "arturo" ), 'export', 'arturo', 'cienciast_dos' );
}

add_action('admin_menu', 'cienciast_uno');
add_shortcode('cienciast', 'cienciast_dos');
add_shortcode('cienciast3', 'cienciast_tres');

?>