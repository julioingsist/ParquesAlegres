<?
require_once("cnx_db.php");
$db='parques_wrdp1';
?>
<html> 
<head> 
<title>Subir proyecto de parque</title> 
<style> 
.estilo_formulario{width:300px; margin:auto;} /*estilos css */ 
.estilo_divs{margin:auto; padding:3px;}clase de estilos css /*estilos css*/ 
</style> 
</head> 

<body> 
<?php 

if (isset($_POST['boton_enviar'])){ //aca validamos si se ha enviado un archivo desde el formulario 
$archivo_nombre= $_FILES["archivo"]["name"]; //aca se obtiene el nombre del archivo 
$archivo_tamano = $_FILES["archivo"]["size"]; //tamaño del archivo 
$archivo_temporal = $_FILES["archivo"]["tmp_name"]; //direccion temporal en la que el servidor guarda el archivo antes de copiarlo 
$img_info = getimagesize($_FILES['archivo'] ['tmp_name']); //
$ancho=$img_info[0];
$alto=$img_info[1];
echo "<div><b>Nombre del archivo: </b>".$archivo_nombre."</div>"; 
echo "<div><b>Tamaño: </b>".$archivo_tamano." bytes </div>"; 
echo "<div><b>Direcci&oacute;n temporal: </b>".$archivo_temporal."</div>"; 
/* echo "<div><b>Informaci&oacute;n de la imagen: </b>"; */
/* $ancho_original = imagesx($archivo_temporal); 
$alto_original = imagesy($archivo_temporal); */
/* echo "<div><b>ancho de la imagen: </b>".$ancho."</div>"; 
echo "<div><b>alto de la imagen: </b>".$alto."</div>";  */
echo"</div>"; 

$destino = 'proyectos' ; //aca se define la direccion en la que quieres que se guarden los archivos cuando los subes al servidor 
$nuevo_nombre=$parque;
	$nombre_fichero = ''.$destino.'/'.$nuevo_nombre.'.pdf';
	$nombre_fichero2 = ''.$destino.'/'.$nuevo_nombre.'.pdf';
	$nombre_fichero_renom = ''.$destino.'/'.$nuevo_nombre.'_ant.pdf';
	if (file_exists($nombre_fichero)) {
	//se renombra archivo existente
	rename ($nombre_fichero, $nombre_fichero_renom);
	//se guara el nuevo archivo en el servidor
	copy($_FILES['archivo']['tmp_name'],$nombre_fichero2);
	} else {
	echo'no se realizaron cambios';
	//se guarda el archivo en el servidor sin problemas
	copy($_FILES['archivo']['tmp_name'],$nombre_fichero2);
	}
copy($_FILES['archivo']['tmp_name'],$destino.'/'. $_FILES['archivo']['name']); //esta instruccion es la que copia el archivo de la carpeta temporal a su destino en el servidor 
} 
$sql="SELECT * FROM  `wp_arturo_parque` WHERE cve=$parque";
$res=mysql_db_query("$db",$sql);
$row=mysql_fetch_array($res);
echo '<div><b>Nombre del parque:</b>'.$parque.' - '.$row['nom'].'</div><br>'; 
?> 

<div > 
<fieldset><legend>Subir proyectos del parque:</legend> <!-- los tag <fieldset> y <legend> son con fines decorativos hacen un recuadro con titulo alrededor del form--> 
<form method="POST" action="subirproyecto.php" enctype="multipart/form-data"> 
<?
if (file_exists('proyectos/'.$parque.'.pdf')) {
		echo '<div class="estilo_divs">proyecto: </th><td><a target="_blank" href="http://parquesalegres.org/proyectos/'.$parque.'.pdf">Ver proyecto</a></div>';
		echo '<div class="estilo_divs">Cambiar proyecto: </th><td><input type="file" name="archivo" size=50></div>';
		}else{
		echo '<div class="estilo_divs">proyecto: </th><td>No existe proyecto actualmente</td></tr>';
		echo '<div class="estilo_divs">Agregar proyecto: </th><td><input type="file" name="archivo" size=50></div>';
		}
		?>
<div><input type="submit" value="Subir" name="boton_enviar"></div> 
<?
echo '<input type=hidden name="parque" value="'.$parque.'">';
?>
</form> 
</fieldset> 
</div> 

</body> 
</html>