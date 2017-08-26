<?php
/**
 * @package PA Promedio de ultimas visitas de parques
 * @version 1.0
 */
/*
Plugin Name: PA Promedio de ultimas visitas de parques
Plugin URI: http://di99.com
Description: Esta es una prueba de un plugin para Wordpress, la idea es hacer pruebas para incorporar funciones especiales de manejo de base de datos y personalización de pantallas. Se trata de probar funciones adicionales en las entradas (posts), opciones para la creación de Widgets y opciones de administración en el menu lateral que tiene el sistema.
Author: Brenda Gudiño Lopez
Version: 1.0
Author URI: http://eci.mx/
*/
//Aqui esta el codigo para que aparezca el menu votacion del lado izquiero
//add_action('admin_menu', 'my_plugin_menu10');

function my_plugin_menu10() {
        add_menu_page( 'Promedio de ultimas visitas de parques', 'Promedio ultimas visitas', 'edit_posts', 'Indicadores', 'indicadores_tres' );
}

function indicadores_tres()
{
echo'<h2>Promedio de ultima visita de cada parque</h2></br>';
echo'<form name="forma" method="post">';
	
echo'<table border=1>';
//echo'<tr>';
//echo'<td colspan="2">Seleccione fecha:';
//echo'<td colspan="2">Selecciona un asesor:';
//echo'</td>';
//echo'</tr>';
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
echo '<tr><th>Asesor</th><td><select name="asesor">
<option value="">Seleccione asesor</option>';
$sqlas="SELECT a.ID as idasesor, a.user_login as nombre_login,a.display_name FROM `wp_users` as a, wp_usermeta as b where a.ID=b.user_id and b.meta_key='wp_user_level' and b.meta_value=2";

$resas=mysql_query($sqlas);

while($rowas=mysql_fetch_array($resas)){
  echo'<option value="'.$rowas['idasesor'].'">'.$rowas['nombre_login'].'</option>';
  }
echo'</select></td></tr></table>';
echo '<input type="submit" value="Buscar"></form>';
	
$filtro='1';

if ($_POST['asesor']!='') $filtro.=" and b.ID LIKE '%".$_POST['asesor']."%' ";

$asesor=$_POST['asesor'];
$sql="SELECT a.ID as parq,a.post_title as parque,b.display_name as asesor FROM wp_posts as a,wp_users as b where $filtro and a.post_author=b.ID and post_status='publish' AND a.post_type='parque' ";
$sql2="SELECT user_login as asesor2 from wp_users where ID=$asesor ";

$res2=mysql_query($sql2);
$row2=@mysql_fetch_array($res2);
echo'</br>Nombre del asesor: ';
echo$row2['asesor2'];


$c=0;
$res=mysql_query($sql);
echo'<table border="1">
<tr><td>Num.</td><td>Nombre del parque</td><td>Promedio de la ultima visita</td></tr>';
$tot_parques=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
$c++;
echo'<tr><td>'.$c.'</td>';
echo'<td>'.$row['parque'].'</td>';
$parq=$row['parq'];
 $fecha1=$_POST['fecha1'];
$filtro2='1';

/*if ($_POST['fecha1']) $filtro2.=" and fec <=  '$fecha1 23:59:59'";*/
if ($_POST['fecha1'] && !$_POST['fecha2']) $filtro2.=" and fec <=  '$fecha1 23:59:59'";
if ($_POST['fecha2'] && !$_POST['fecha1']) $filtro2.="  and fec <=  '$fecha2 23:59:59'";
if (($_POST['fecha1']) && ($_POST['fecha2'])) $filtro2.=" and fec between '$fecha1 00:00:00' and '$fecha2 23:59:59' ";

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE  $filtro2 and cve_parque =$parq ORDER BY fec, cve DESC limit 0,1";
//echo$sqla1;
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
	$visita=mysql_num_rows($resa1);

        if($visita<1){
           $promea=0;
        }else{
            		$puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
$promeaa=0;
$puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo']+$rowa1['vespacio'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];//+$rowa1['mancomunado']
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
             if($rowa1['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
			//echo'entra';
	     }else{
	
		  if($rowa1['averdes']<50){
			if($rowa1['averdes']==0){
			$averdes=0;		
			}else{
		  $averdes=0;
		  $averdes=$averdes+34;
		  }
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa1['averdes'];
		  }
	     }
		$pune=$pune+$averdes+$rowa1['estaver'];
		$punf=$punf+$rowa1['gente'];
                //+$rowa11['diario']
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
		$promea=round($proma);
$promgen=$promgen+$promea;
        }
echo'<td>'.$promea.'</td>';
echo'</tr>';
}
echo'</table>';
if(empty($promgen) || empty($tot_parques)) {
    $prom_asesor = 0; 
}else{ 
//    $total_paginas = ceil($total/$por_pagina);  
$prom_asesor=$promgen/$tot_parques;
}
//echo$promgen;
echo'<br>Promedio general de la ultima visita de los parques: <b>';
$promedio=round($prom_asesor);
echo$promedio;
//echo$promgen;
echo'</b>';

echo'</form>';
}

/*function altaparametros_uno()
{
//add_menu_page( 'Administración parques', 'Administración parques', 'edit_posts', 'parques', 'parques');
add_submenu_page( 'edit.php?post_type=parque', "Alta parámetros", "ParquesAlegres", "Alta parámetros", "ParquesAlegres", 'edit_posts', 'ParquesAlegres', 'agregacomentarios_tres' );
}*/
function indicadores_uno()
{
add_submenu_page( 'reportes', __( "Promedio ultimas visitas", "indicadores" ), __( "Promedio ultimas visitas", "indicadores" ), 'edit_posts', 'indicadores', 'indicadores_tres' );
}

add_action('admin_menu', 'indicadores_uno');
add_shortcode('indicadores', 'indicadores_dos');
add_shortcode('indicadores3', 'indicadores_tres');

?>