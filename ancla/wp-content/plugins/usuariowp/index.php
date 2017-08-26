<?php
/**
 * @package Mike
 * @version 1.0
 */
/*
Plugin Name: Formulario para la edicion de parques
Plugin URI: http://di99.com
Description: Plugin para editar o dar de alta parques
Author: Mike Valenzuela
Version: 1.0
Author URI: http://eci.mx/
*/
//Aqui esta el codigo para que aparezca el menu votacion del lado izquiero
add_action('admin_menu', 'my_plugin_menu1');
 
function my_plugin_menu1() {
        add_menu_page( 'Alta parques', 'Alta parques', 'read', 'alta parques', 'mike_tres' );
}


function mike_tres()
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
$parque=$_GET['parque'];


$sql="select * from wp_arturo_parque where cve=$parque";
	$res=mysql_query($sql);


if ($parque){ $f="Registro: <b>$parque</b><br>"; }else{ $f='<b>Nuevo Registro</b><br>';}
echo $f;
echo'</center>';
$row=@mysql_fetch_array($res);

echo'<fieldset><legend>Agregar datos:</legend> <!-- los tag <fieldset> y <legend> son con fines decorativos hacen un recuadro con titulo alrededor del form--> 
    
<table>';
echo'<tr>';
echo'<td colspan="2" align="center">Ingrese los datos del parque';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Nombre:';
echo'</td>';
echo'<td><input type="text" size="50" name="nombre" value="'.$row["nom"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Ubicaci&oacute;n:';
echo'</td>';
echo'<td><input type="text" size="50" name="ubicacion" value="'.$row["ubic"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Colonia:';
echo'</td>';
echo'<td><input type="text" size="50" name="colonia" value="'.$row["col"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Superficie:';
echo'</td>';
echo'<td><input type="text" size="50" name="superficie" value="'.$row["sup"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Sector:';
echo'</td>';
echo'<td><input type="text" size="50" name="sector" value="'.$row["sec"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tipo:';
echo'</td>';
echo'<td><input type="text" size="50" name="tipo" value="'.$row["tipo"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Contacto:';
echo'</td>';
echo'<td><input type="text" size="50" name="contacto" value="'.$row["cont"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Ciudad:';
echo'</td>';
echo'<td><input type="text" size="50" name="ciudad" value="'.$row["ciudad"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Estado:';
echo'</td>';
echo'<td><input type="text" size="50" name="estado" value="'.$row["estado"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>GoogleMaps:';
echo'</td>';
$b = html_entity_decode($row["maps"]);
echo'<td><textarea style="width:300px;height:300px;" name="maps">'.$b.'</textarea>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td colspan="2">'.$b;
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>galeria de fotos:';
echo'</td>';
echo'<td>http://parquesalegres.org/?p=<input type="text" size="50" name="galeria" value="'.$row["cve_wp"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Experiencia exitosa:';
echo'</td>';
echo'<td>http://parquesalegres.org/?p=<input type="text" size="50" name="experiencia" value="'.$row["cve_exp"].'">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td colspan="2">Plano:';
echo'</td></tr>';
echo'<tr><td colspan="2">';
$nombre_fichero='../planos/'.$row["cve"].'.jpg';
		if (file_exists($nombre_fichero)) {
echo'<img width="500px" height="500px" src="http://parquesalegres.org/planos/'.$row["cve"].'.jpg">';
echo'</td></tr>';
echo '<tr><th>Cambiar plano: </th><td><input type="file" name="archivo" size=50></td></tr>';
		}else{
		echo '<tr><th>Imagen de plano: </th><td>No existe imagen actualmente</td></tr>';
		echo '<tr><th>Agregar imagen de plano: </th><td><input type="file" name="archivo" size=50></td></tr>';
		}

echo'</table>';

		
echo'<div><input type="button" value="Guardar Parque" name="boton_enviar" onclick="forma.submit()"></div> ';

if($_POST['cmd']==1){
    if($_POST['parque']){
//-------------------------empieza

if(!$_FILES["archivo"]["name"]){

}else{
$archivo_nombre= $_FILES["archivo"]["name"]; //aca se obtiene el nombre del archivo 
$archivo_tamaÒo = $_FILES["archivo"]["size"]; //tamaÒo del archivo 
$archivo_temporal = $_FILES["archivo"]["tmp_name"]; //direccion temporal en la que el servidor guarda el archivo antes de copiarlo 
$tipo_archivo = $_FILES['archivo']['type'];//identifica la extencion del archivo que se esta subiendo.
$img_info = getimagesize($_FILES['archivo'] ['tmp_name']); // se obtiene las proporciones de la imagen (tamaÒo: ancho y alto)
$ancho=$img_info[0];
$alto=$img_info[1];
$destino = '../planos'; //aca se define la direccion en la que quieres que se guarden los archivos cuando los subes al servidor 
if (!(strpos($tipo_archivo, "jpeg")) && (($ancho==800) || ($alto==600))) {
	echo "La extension o el tama&ntilde;o de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .jpg unicamente<br><li>se permiten archivos de 140 de alto x 106 de ancho.</td></tr></table>";
	echo'ancho'.$ancho.'alto'.$alto.'extension'.$tipo_archivo;
}else{
$nuevo_nombre=$_POST[parque];
$nombre_fichero = ''.$destino.'/'.$nuevo_nombre.'.jpg';
$nombre_fichero2 = ''.$destino.'/'.$nuevo_nombre.'.jpg';
$nombre_fichero_renom = ''.$destino.'/'.$nuevo_nombre.'_ant.jpg';
if (file_exists($nombre_fichero)) {
rename ($nombre_fichero, $nombre_fichero_renom);
copy($_FILES['archivo']['tmp_name'],$nombre_fichero2);	
} else {
copy($_FILES['archivo']['tmp_name'],$nombre_fichero2);
}
}
}
//-------------------------termina

		$bar = $_POST[nombre];
 $bar2=htmlentities($bar, ENT_QUOTES,'UTF-8');
$bar3 = $_POST[maps];
 $bar4=htmlentities($bar3, ENT_QUOTES,'UTF-8');

        $sSQL="Update `wp_arturo_parque` set `cve_wp`='$_POST[galeria]',`cve_exp`='$_POST[experiencia]',`maps`='$bar4',`nom`='$bar2', `col`='$_POST[colonia]', `cont`='$_POST[contacto]', `ubic`='$_POST[ubicacion]', `sec`='$_POST[sector]', `ciudad`='$_POST[ciudad]', `estado`='$_POST[estado]', `tipo`='$_POST[tipo]', `sup`='$_POST[superficie]', `calif`='$_POST[calificacion]' where cve=$_POST[parque]";
		mysql_db_query("parquesa_wrdp1",$sSQL);
		//echo$sSQL;
                echo'<p align="center">';
		echo'Parque editado con exito<input type="button" value="Cerrar" onClick="window.close()">';
		echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
    }else{
$bar = $_POST[nombre];
 $bar2=htmlentities($bar, ENT_QUOTES,'UTF-8');
$bar3 = $_POST[maps];
 $bar4=htmlentities($bar3, ENT_QUOTES,'UTF-8');
        $sSQL="INSERT INTO `wp_arturo_parque`(`cve_wp`,`cve_exp`,`maps`,`nom`, `col`, `cont`, `ubic`, `sec`, `ciudad`, `estado`, `tipo`, `sup`, `calif`) VALUES ('$_POST[galeria]','$_POST[experiencia]','$bar4','$bar2','$_POST[colonia]','$_POST[contacto]','$_POST[ubicacion]','$_POST[sector]','$_POST[ciudad]','$_POST[estado]','$_POST[tipo]','$_POST[superficie]','$_POST[calificacion]')";

		mysql_db_query("parquesa_wrdp1",$sSQL);
		//echo$sSQL;
//-----------------------empieza

if(!$_FILES["archivo"]["name"]){

}else{
	$archivo_nombre= $_FILES["archivo"]["name"]; //aca se obtiene el nombre del archivo 
$archivo_tamaÒo = $_FILES["archivo"]["size"]; //tamaÒo del archivo 
$archivo_temporal = $_FILES["archivo"]["tmp_name"]; //direccion temporal en la que el servidor guarda el archivo antes de copiarlo 
$tipo_archivo = $_FILES['archivo']['type'];//identifica la extencion del archivo que se esta subiendo.
$img_info = getimagesize($_FILES['archivo'] ['tmp_name']); // se obtiene las proporciones de la imagen (tamaÒo: ancho y alto)
$ancho=$img_info[0];
$alto=$img_info[1];
$destino = '../planos'; //aca se define la direccion en la que quieres que se guarden los archivos cuando los subes al servidor 

	
		
				$_sql5=mysql_db_query("parquesa_wrdp1","select * from wp_arturo_parque order by cve desc limit 1");
	$row5 = mysql_fetch_array($_sql5);
		$nuevo_nombre=$row5["cve"];
$nombre_fichero = ''.$destino.'/'.$nuevo_nombre.'.jpg';
$nombre_fichero_renom = ''.$destino.'/'.$nuevo_nombre.'_ant.jpg';
	//se hace el query para seleccionar el ultimo registro insertado mas 1 y se guarda el archivo con ese nombre y se verifica que no exista un fichero con ese nombre en el servidor.
if (file_exists($nombre_fichero)) {
//se renombra archivo existente
rename ($nombre_fichero, $nombre_fichero_renom);
//se guara el nuevo archivo en el servidor
copy($_FILES['archivo']['tmp_name'],$nombre_fichero);
  
	
} else {

copy($_FILES['archivo']['tmp_name'],$nombre_fichero);
  
	
}
}

//-----------------------termina
$sql="select * from wp_arturo_parque order by cve desc limit 0,1";
	$res=mysql_query($sql);
               
	$row3 = mysql_fetch_array($res);
	
			$cuerpob = "El usuario: " . $current_user->user_email . "\n<br>";
			$cuerpob .= "Ha dado de alta un parque con el ID: " . $row3["cve"] . "\n<br>";
			$cuerpob .= "Nombre del parque: " . $row3["nom"] . "\n<br>";
			$cuerpob .= "Colonia: " . $row3["col"] . "\n<br>";
			$cuerpob .= "Contacto: " . $row3["cont"] . "\n<br>";
			$cuerpob .= "Ubicacion: " . $row3["ubic"] . "\n<br>";
			$cuerpob .= "Sector: " . $row3["sec"] . "\n<br>";
			$cuerpob .= "Ciudad: " . $row3["ciudad"] . "\n<br>";
			$cuerpob .= "Estado: " . $row3["estado"] . "\n<br>";
			$cuerpob .= "Tipo: " . $row3["tipo"] . "\n<br>";
			$cuerpob .= "Superficie: " . $row3["sup"] . "\n<br>";
			$cuerpob .= "Fecha y Hora de edici&oacute;n: " .date('d-m-Y : H:i:s'). "\n";
			$fromb = "From: contacto@parquesalegres.org\r\nContent-type: text/html\r\n";

			$res2=mail($current_user->user_email,"Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			$res2=mail("mikee.vale@gmail.com","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			$res2=mail("contacto@parquesalegres.org","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			//$res2=mail("albertocoppel@gmail.com","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			
		
			if($res2){
                echo'<p align="center">';
		echo'Parque guardado con exito<input type="button" value="Cerrar" onClick="window.close()">';
		echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
                        }
    }
}
echo '<input type=hidden name="cmd" value="1">';
echo '<input type=hidden name="parque" value="'.$parque.'">';
echo'</form> </fieldset>';

}

function mike_uno()
{
add_submenu_page( 'tools.php', __( "Mike GC", "mike" ), __( "Mike GC", "mike" ), 'export', 'mike', 'mike_dos' );
}

add_action('admin_menu', 'mike_uno');
add_shortcode('mike', 'mike_dos');
add_shortcode('mike3', 'mike_tres');

?>