<?php
require_once('../wp-config.php');

echo'<style>
.estilo_formulario{width:300px; margin:auto;} /*estilos css */
.estilo_divs{margin:auto; padding:3px;}clase de estilos css /*estilos css*/
</style> ';
echo '<form name="forma" method="post">';
//echo'<form method="POST">';
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
echo '<tr><th colspan="2">Parque: <input type="text" name="parque" value="Ejemplo" readonly></th></tr>';
echo '<tr><th>Fecha de la visita</th><td><input type="text" readonly id="datepicker" value="'.date("m/d/Y g:i a").'" name="fecha_visita"/></td></tr>';
echo '<tr><td>Tipo de vista:</td><td><select name="visita"><option value="" selected> -- Seleccione --</option>
<option value="prospectacion">Prospectacion</option>
<option value="formacion">Formacion de comit&eacute;</option>
<option value="seguimiento">Seguimiento</option>
<option value="reforzamiento">Reforzamiento</option>
</select></td></tr>';
echo '<tr><td>Primer contacto:</td><td><input type="checkbox" name="primercontacto" value="1"></td></tr>';
echo'<tr>';
echo'<th colspan="2">Comit&eacute;';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>El comit&eacute; opera con:';
echo'</td>';
echo'<td><select name="opera">
<option value="" selected> -- Selecciona --</option>
<option value=20>Tres o m&aacute;s personas</option>
<option value=14>Dos personas</option>
<option value=7>Una persona</option>
<option value=0>No hay comit&eacute;</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>C&oacutemo est&aacute; formalizado?';
echo'</td>';
//Falta de calcular, error al llamar el select con javascript - pendiente - interno 10 puntos el resto 20 puntos
echo'<td><select name="formaliza">
<option value="interno">Solo comit&eacute interno</option>
<option value="ayuntamiento">Solo registro en Ayuntamiento</option>
<option value="AC">Solo es una AC</option>
<option value="AC_ayuntamiento">AC con registro en Ayuntamiento</option>
<option value="" selected>Ninguna de las anteriores</option></select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con buena organizaci&oacute;n(con orden-formalidad):';
echo'</td>';
echo'<td><select name="organiza">
<option value="" selected> -- Selecciona -- </option>
<option value=20>Buena</option>
<option value=10>Regular</option>
<option value=0>Sin organizaci&oacute;n</option></select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Existen reuniones:';
echo'</td>';
echo'<td><select name="reunion">
<option value="" selected> -- Selecciona -- </option>
<option value=20>Frecuentemente</option>
<option value=10>Regularmente</option>
<option value=0>No hay reuniones</option></select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen proyectos en proceso:';
echo'</td>';
echo'<td><select name="proyecto">
<option value="" selected> -- Selecciona -- </option>
<option value=20>S&iacute;</option>
<option value=0>No</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Instalaciones';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con Proyecto:';
echo'</td>';
echo'<td><select name="tipo_proyecto">
<option value="" selected> -- Selecciona -- </option>
<option value=40>Visi&oacute;n de espacio</option>
<option value=40>Dise&ntilde;o</option>
<option value=40>Ejecutivo</option>
<option value=0>No</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Estado actual de las instalaciones:';
echo'</td>';
echo'<td><select name="estado">
<option value="" selected> -- Selecciona -- </option>
<option value=30>Excelente</option>
<option value=25>Muy bueno</option>
<option value=20>Bueno</option>
<option value=15>Regular</option>
<option value=10>Malo</option>
<option value=5>Muy malo</option>
<option value=0>P&eacute;simo</option></select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay instalaciones en la mayoria del espacio,cancha, andador, banquetas,etc:';
echo'</td>';
echo'<td><select name="instalaciones">
<option value="" selected> -- Selecciona -- </option>
<option value=30>100%</option>
<option value=25>80%</option>
<option value=20>64%</option>
<option value=15>48%</option>
<option value=10>32%</option>
<option value=5>16%</option>
<option value=0>0%</option></select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Ingresos';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen fuente de ingresos permanentes:';
echo'</td>';
echo'<td><select name="ingresop">
<option value="" selected> -- Seleccione -- </option>
<option value=30>S&iacute;</option>
<option value=0>No</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Es suficiente lo ingresado para operar bien:';
echo'</td>';
echo'<td><select name="ingresadop">
<option value="" selected> -- Seleccione -- </option>
<option value=30>S&iacute;</option>
<option value=20>Regular</option>
<option value=0>No</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Tienen cuenta mancomunada:';
echo'</td>';
echo'<td><select name="mancomunado">
<option value="" selected> -- Seleccione -- </option>
<option value=30>S&iacute;</option>
<option value=0>No</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">Eventos';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Hay eventos con regularidad:';
echo'</td>';
echo'<td><select name="eventosr">
<option value="" selected> -- Seleccione -- </option>
<option value=50>4 al a&ntilde;o o 1 cada 3 meses</option>
<option value=25>Menos de 4 al a&ntilde;o</option>
<option value=0>Ninguno</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuentan con un calendario anual de actividades:';
echo'</td>';
echo'<td><select name="eventos">
<option value="" selected> -- Seleccione -- </option>
<option value=50>S&iacute;</option>
<option value=0>No</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<th colspan="2">&Aacute;reas verdes';
echo'</th>';
echo'</tr>';
echo'<tr>';
echo'<td>Cuenta con:';
echo'</td><td>';
if($row['averdes']==0){
echo'<input type="checkbox" name="averdes[]" value="1">&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2">c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3">jard&iacute;n ';	
}
if($row['averdes']==17){
echo'<input type="checkbox" name="averdes[]" value="1" checked>&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2" >c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3" >jard&iacute;n ';
}
if($row['averdes']==34){
echo'<input type="checkbox" name="averdes[]" value="1" checked>&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2" checked>c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3" >jard&iacute;n ';
}
if($row['averdes']==35){
echo'<input type="checkbox" name="averdes[]" value="1" checked>&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2" >c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3" checked>jard&iacute;n ';
}
if($row['averdes']==36){
echo'<input type="checkbox" name="averdes[]" value="1" >&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2" checked>c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3" checked>jard&iacute;n ';
}
if($row['averdes']==50){
echo'<input type="checkbox" name="averdes[]" value="1" checked>&aacute;rboles ';
echo'<input type="checkbox" name="averdes[]" value="2" checked>c&eacute;sped ';
echo'<input type="checkbox" name="averdes[]" value="3" checked>jard&iacute;n ';
}


//echo'<td><input type="text" name="averdes">';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se encuentra en buen estado:';
echo'</td>';
echo'<td><select name="estaver">
<option value="" selected> -- Selecciona -- </option>
<option value=50>Excelente</option>
<option value=40>Muy bueno</option>
<option value=32>Bueno</option>
<option value=24>Regular</option>
<option value=16>Malo</option>
<option value=8>Muy malo</option>
<option value=0>P&eacute;simo</option></select>';
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
echo'<td>Porcentaje de afluencia sobre lo existente:';
echo'</td>';
echo'<td><select name="gente">
<option value="" selected> -- Selecciona -- </option>
<option value=100>100%</option>
<option value=90>90%</option>
<option value=80>80%</option>
<option value=70>70%</option>
<option value=60>60%</option>
<option value=50>50%</option>
<option value=40>40%</option>
<option value=30>30%</option>
<option value=20>20%</option>
<option value=10>10%</option>
<option value=0>0%</option></select>';
echo'</td>';
echo'</tr>';
//echo'<tr>';
//echo'<td>porcentaje de afluencia contra lo posible:';
//echo'</td>';
//echo'<td><input type="text" name="diario" value="'.$row['diario'].'">';
//echo'</td>';
//echo'</tr>';
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
echo'<td><select name="respint">
<option value="" selected> -- Seleccione -- </option>
<option value=40>S&iacute;</option>
<option value=20>Regular</option>
<option value=0>No</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se cuenta con un reglamento de orden:';
echo'</td>';
echo'<td><select name="orden">
<option value="" selected> -- Seleccione -- </option>
<option value=30>Instalado en el parque</option>
<option value=15>Solo compatido por escrito</option>
<option value=0>No</option>
</select>';
echo'</td>';
echo'</tr>';
echo'<tr>';
echo'<td>Se mantiene limpio:';
echo'</td>';
echo'<td><select name="limpieza">
<option value="" selected> -- Selecciona -- </option>
<option value=30>Excelente</option>
<option value=25>Muy bueno</option>
<option value=20>Bueno</option>
<option value=15>Regular</option>
<option value=10>Malo</option>
<option value=8>Muy malo</option>
<option value=0>P&eacute;simo</option></select>';
echo'</td>';
echo'</tr>';



echo'</table>';
echo '<div id="hola"></div>';

echo'<div><input type="button" value="Calcular Promedio" name="boton_calcular" onclick="calcular();">&nbsp;<input type="button" value="Guardar Par&aacute;mentros" name="boton_enviar" onclick="form.submit();"></div> ';
echo '<span id="total"></span>';
/*echo '<script>
function checainter(){
    document.getElementById(\'hola\').innerHTML = \'<img src="http://parquesalegres.org/wp-content/uploads/2015/02/logopa.png?\'+Math.random()+\'" style="display:none" onload="alert(&quot;hay internet&quot;)" onerror="alert(&quot;no hay internet&quot;)" />\';
}*/
echo '<script>
function calcular(){
var chk_arr =  document.getElementsByName("averdes[]");
var chklength = chk_arr.length;             
var c=0;
var valores = new Array();
var areasverdes=0;
var total=0;
for(k=0;k< chklength;k++)
{
    if(chk_arr[k].checked == true){
	valores.push(chk_arr[k].value);
	c++;
    }
} 
if(c==1){
	areasverdes=17;
}
if(c==2){
	if(valores[0]==1 && valores[1]==2){
		areasverdes=34;
	}
	if(valores[0]==1 && valores[1]==3){
		areasverdes=35;
	}
	if(valores[0]==2 && valores[1]==3){
		areasverdes=36;
	}
}
if(c==3){
	areasverdes=50;
}
var nombres = ["opera","organiza","reunion","proyecto","tipo_proyecto","estado","instalaciones","ingresop","ingresadop","mancomunado","eventosr","eventos","estaver","gente","respint","orden","limpieza"]
if(document.getElementsByName("formaliza")[0].value!=""){
    if(document.getElementsByName("formaliza")[0].value=="interno"){
        total= total+10;
    }
    else{
        total=total+20;
    }
}
for (index = 0; index < nombres.length; ++index) {
    if(document.getElementsByName(nombres[index])[0].value!=""){
        total= total + parseInt(document.getElementsByName(nombres[index])[0].value);
    }
}
if(parseInt(document.getElementsByName("eventosr")[0].value)+parseInt(document.getElementsByName("eventos")[0].value)>100){
	alert("El parametro de eventos excede el 100% por favor ingresa la cantidad correcta.");
	document.getElementsByName("eventosr")[0].value="";
	document.getElementsByName("eventos")[0].value="";
	return false;
}

total = (total+areasverdes)/7;
document.getElementById("total").innerHTML = "Promedio: "+Math.round(total);
}
</script>';
/*
if($_POST['cmd']==1){
    if($_POST['parque']){
        if($_POST['visita']){
 $result = count($_POST[averdes]);
 $coma=implode(',',$_POST[averdes]);
//echo$coma;
$averdes21= array(1,2);
$averdes22= array(1,3);
$averdes23= array(2,3);
        if($result==1){
            $averdes1=17;
        }
         if($result==2){
		//echo'entraaaaa 2';
		if($averdes21==$_POST[averdes]){
	   //if($coma=="1,2"){
		//echo'entraaaaa 34';
            $averdes1=34;
		}
	    if($averdes22==$_POST[averdes]){
		//echo'entraaaaa 35';
	    $averdes1=35;
	    }
	    if($averdes23==$_POST[averdes]){
		//echo'entraaaaa 36';
	    $averdes1=36;
	    }
        }
         if($result==3){
            $averdes1=50;
        }
        /*if($result==1){
            $averdes1=17;
        }
         if($result==2){
            $averdes1=34;
        }
         if($result==3){
            $averdes1=50;
        }*/
	/*
	$fec=''.date("Y-m-d H:i:s").'';
            $sSQL="UPDATE `wp_comites_parques` set `fec`='$fec',`fecha_visita`='$_POST[fecha_visita]',`opera`='$_POST[opera]', `formaliza`='$_POST[formaliza]', `organiza`='$_POST[organiza]', `reunion`='$_POST[reunion]', `proyecto`='$_POST[proyecto]',`disenio`='$_POST[disenio]',`ejecutivo`='$_POST[ejecutivo]',`vespacio`='$_POST[vespacio]', `instalaciones`='$_POST[instalaciones]', `estado`='$_POST[estado]', `ingresop`='$_POST[ingresop]', `ingresadop`='$_POST[ingresadop]', `mancomunado`='$_POST[mancomunado]', `eventos`='$_POST[eventos]', `eventosr`='$_POST[eventosr]', `averdes`='$averdes1', `estaver`='$_POST[estaver]',  `gente`='$_POST[gente]', `diario`='$_POST[diario]', `limpieza`='$_POST[limpieza]', `orden`='$_POST[orden]', `respint`='$_POST[respint]'   where cve_parque=$parque and cve=$_POST[visita]";
		mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);
//`semana`='$_POST[semana]', `finsem`,
		//echo$sSQL;
                echo'<p align="center">';
		echo'Parque editado con exito<input type="button" value="Cerrar" onClick="window.close()">';
		echo'<A href="http://parquesalegres.org/parques/evaluacion/">Ir al listado de parques</a>';
                echo'</p>';
        }else{
 $result = count($_POST[averdes]);
$coma=implode(',',$_POST[averdes]);
//echo$coma;
$averdes21= array(1,2);
$averdes22= array(1,3);
$averdes23= array(2,3);
     $averdes21= array(1,2);
$averdes22= array(1,3);
$averdes23= array(2,3);
        if($result==1){
            $averdes1=17;
        }
         if($result==2){
		//echo'entraaaaa 2';
		if($averdes21==$_POST[averdes]){
	   //if($coma=="1,2"){
		//echo'entraaaaa 34';
            $averdes1=34;
		}
	    if($averdes22==$_POST[averdes]){
		//echo'entraaaaa 35';
	    $averdes1=35;
	    }
	    if($averdes23==$_POST[averdes]){
		//echo'entraaaaa 36';
	    $averdes1=36;
	    }
        }
         if($result==3){
            $averdes1=50;
        }
	//date("Y-m-d H:i:s");
	$fec=''.date("Y-m-d H:i:s").'';
           $sSQL="INSERT INTO `wp_comites_parques`(`cve_parque`, `fec`,`fecha_visita`,`opera`, `formaliza`, `organiza`, `reunion`, `proyecto`,`disenio`,`ejecutivo`,`vespacio`, `instalaciones`, `estado`, `ingresop`, `ingresadop`, `mancomunado`, `eventos`, `eventosr`, `averdes`, `estaver`,  `gente`, `diario`, `limpieza`, `orden`, `respint`) VALUES ('$parque','$fec','$_POST[fecha_visita]','$_POST[opera]','$_POST[formaliza]','$_POST[organiza]','$_POST[reunion]','$_POST[proyecto]','$_POST[disenio]','$_POST[ejecutivo]','$_POST[vespacio]','$_POST[instalaciones]','$_POST[estado]','$_POST[ingresop]','$_POST[ingresadop]','$_POST[mancomunado]','$_POST[eventos]','$_POST[eventosr]','$averdes1','$_POST[estaver]','$_POST[gente]','$_POST[diario]','$_POST[limpieza]','$_POST[orden]','$_POST[respint]')";
//,'$_POST[semana]','$_POST[finsem]' `semana`, `finsem`,
		//`riego`,'$riego',
                //`gente`, `diario`,
                //'$gente','$diario',
               mysql_db_query("parquesa_ParquesAlegresWP",$sSQL);
		//echo$sSQL;


		echo'<p align="center">';
		echo'Visita guardada';
		echo'da click en el boton para cerrar<input type="button" value="Cerrar" onClick="window.close()"> o';
                //echo'Agregar comentarios a la visita <a href="admin.php?page=Comentarios%20Parámetros&parque='.$parque.'">click aqui</a>';
		//http://parquesalegres.org/wp-admin/admin.php?page=Alta%20Par%C3%A1metros
		echo'</p>';
        }
    }else{
        echo'No ha seleccionado ningun parque';
    }

$sql="select * from wp_posts where ID=$parque";
	$res=mysql_query($sql);

	$row3 = mysql_fetch_array($res);

			$cuerpob = "El usuario: " . $current_user->user_email . "\n<br>";
			$cuerpob .= "Ha agregado una nueva visita al parque: " . $parque . "\n<br>";
			$cuerpob .= "Nombre del parque: " . $row3["post_title"] . "\n<br>";
			$cuerpob .= "Fecha y Hora de edici&oacute;n: " .date('d-m-Y : H:i:s'). "\n";
			$fromb = "From: contacto@parquesalegres.org\r\nContent-type: text/html\r\n";

			//$res2=mail($current_user->user_email,"Parques Alegres(Parque nuevo)",$cuerpob,$fromb);
			$res2=mail("mikee.vale@gmail.com","Parques Alegres(Parametros nuevos)",$cuerpob,$fromb);
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
*/


?>