<?
require_once("cnx_db.php");
$db='parques_wrdp1';
?>
<html> 
<head> 
<title>Agregar parque nuevo</title> 
<style> 
.estilo_formulario{width:300px; margin:auto;} /*estilos css */ 
.estilo_divs{margin:auto; padding:3px;}clase de estilos css /*estilos css*/ 
</style> 
</head> 

<body> 
<?php 
echo '<form name="forma" method="post" action="parquenuevo.php" enctype="multipart/form-data">';
echo'<center>';
$parque=$_POST['parque'];
$res=mysql_db_query("$db","select * from wp_arturo_parque where cve=$parque");
if ($parque){ $f="Registro: <b>$parque</b><br>"; }else{ $f='<b>Nuevo Registro</b><br>';}
echo $f;
echo'</center>';
$row=@mysql_fetch_array($res);

?> 

<div> 
<fieldset><legend>Agregar nuevo parque:</legend> <!-- los tag <fieldset> y <legend> son con fines decorativos hacen un recuadro con titulo alrededor del form--> 
<form method="POST" action="parquenuevo.php"> 
<?
//global $current_user;
  //    get_currentuserinfo();
 //echo 'Username: ' . $current_user->user_login . '<br />';
   // echo 'User email: ' . $current_user->user_email . '<br />';
   // echo 'User first name: ' . $current_user->user_firstname . '<br />';
   // echo 'User last name: ' . $current_user->user_lastname . '<br />';
   // echo 'User display name: ' . $current_user->display_name . '<br />';
   // echo 'User ID: ' . $current_user->ID . '<br />';
    
    //<? echo $parque.' - '.$row['nom'];
echo'<table border=1>';
echo'<tr>';
echo'<td colspan="2">Ingrese los datos del parque';
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
//echo'<tr>';
//echo'<td>Calificaci&oacute;n:';
//echo'</td>';
//echo'<td><input type="text" name="calificacion">';
//echo'</td>';
//echo'</tr>';
echo'</table>';

		?>
<div><input type="submit" value="Guardar Parque" name="boton_enviar"></div> 
<?
if($_POST['cmd']==1){
    if($_POST['parque']){
        $sSQL="Update `wp_arturo_parque` set where `nom`='$nombre', `col`='$colonia', `cont`='$contacto', `ubic`='$ubicacion', `sec`='$sector', `ciudad`='$ciudad', `estado`='$estado', `tipo`='$tipo', `sup`='$superficie', `calif`='$calificacion' cve=$parque";
       // $sSQL="INSERT INTO `wp_arturo_parque`(`nom`, `col`, `cont`, `ubic`, `sec`, `ciudad`, `estado`, `tipo`, `sup`, `calif`) VALUES ('$nombre','$colonia','$contacto','$ubicacion','$sector','$ciudad','$estado','$tipo','$superficie','$calificacion')";

		//mysql_db_query("$db",$sSQL);
		echo$sSQL;
                echo'<p align="center">';
		echo'Parque editado con exito<input type="button" value="Cerrar" onClick="window.close()">';
		echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
    }else{
        $sSQL="INSERT INTO `wp_arturo_parque`(`nom`, `col`, `cont`, `ubic`, `sec`, `ciudad`, `estado`, `tipo`, `sup`, `calif`) VALUES ('$nombre','$colonia','$contacto','$ubicacion','$sector','$ciudad','$estado','$tipo','$superficie','$calificacion')";
//$sSQL="INSERT INTO `wp_arturo_parques`(, `opera`, `formaliza`, `organiza`, `reunion`, `proyecto`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `eventos`, `eventosr`, `averdes`, `estaver`, `riego`, `gente`, `diario`, `semana`, `finsem`, `limpieza`, `orden`, `respint`) VALUES ('$parque','$opera','$formaliza','$organiza','$reunion','$proyecto','$instalaciones','$estado','$ingresop','$ingresadop','$eventos','$eventosr','$averdes','$estaver','$riego','$gente','$diario','$semana','$finsem','$limpieza','$orden','$respint')";
		//mysql_db_query("$db",$sSQL);
		echo$sSQL;


                $_sql3=mysql_db_query("$db","select * from wp_arturo_parques order by cve desc");
	$row3 = mysql_fetch_array($_sql3);

	$_sql=mysql_db_query("$db","select * from pec_libros where cve='$cve_libro'");
	$row = mysql_fetch_array($_sql);
	
			$cuerpob = "El usuario: " . $row["usuario"] . "\n<br>";
			$cuerpob .= "Ha dado de alta un parque con el ID: " . $row3["cve"] . "\n<br>";
			$cuerpob .= "Nombre del parque: " . $row3["nom"] . "\n<br>";
			$cuerpob .= "Fecha y Hora de edici&oacute;n: " .date('d-m-Y : H:i:s'). "\n";
			$fromb = "From: contacto@parquesalegres.org\r\nContent-type: text/html\r\n";

			$res2=mail("yuki.gudi@gmail.com","Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			
		
			if($res2){
	
	
                echo'<p align="center">';
		echo'Parque guardado con exito<input type="button" value="Cerrar" onClick="window.close()">';
		echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
                        }
    }
}
echo '<input type=hidden name="parque" value="'.$_POST['parque'].'">';
echo '<input type=hidden name="cmd" value="1">';
?>
</form> 
</fieldset> 
</div> 

</body> 
</html>