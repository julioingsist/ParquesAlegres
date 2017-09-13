<?
echo'<html><head><title>Parques Alegres</title>
<script type="text/javascript" src="jquery.idTabs.min.js"></script>
<script src="http://jquery.com/src/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
	<script src="jquery-1.2.3.min.js"></script>
	<script>
	$(document).ready(function(){
		$("dd").hide();
		$("dt a").click(function(){
			$("dd:visible").slideUp("slow");
			$(this).parent().next().slideDown("slow");
			return false;
		});
	});
	</script>
	
<script type="text/javascript">

$(document).ready(function(){

        $(".slidingDiv").hide();
        $(".show_hide").show();

	$(".show_hide").click(function(){
	$(".slidingDiv").slideToggle();
	});

});

</script>
<script>
	  // When the document loads do everything inside here ...
	  $(document).ready(function(){
		
		// When a link is clicked
		$("a.tab").click(function () {
			
			
			// switch all tabs off
			$(".active").removeClass("active");
			
			// switch this tab on
			$(this).addClass("active");
			
			// slide all content up
			$(".content").slideUp("slow");
			
			// slide this content up
			var content_show = $(this).attr("title");
			$("#"+content_show).slideDown("slow");
		  
		});
	
	  });
  </script>

	<style>
	body { font-family: Arial; font-size: 16px; margin:40px;}
	/* ul { list-style: none; padding: 5px; } */
	
.slidingDiv {
	height:300px;
	padding:20px;
	margin-top:10px;
}

.show_hide {
	display:none;
}
 #tabbed_box_1 {
	/* margin: 0px auto 0px auto; 
	width:600px;*/
} 
.tabbed_box h4 {
	/* font-family:Arial, Helvetica, sans-serif;
	font-size:23px; */
	color:#ffffff;
	letter-spacing:-1px;
	margin-bottom:10px;
}
.tabbed_box h4 small {
	color:#e3e9ec;
	font-weight:normal;
	font-size:9px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	text-transform:uppercase;
	position:relative;
	top:-4px;
	left:6px;
	letter-spacing:0px;
}
.tabbed_area {
	/* border:1px solid #494e52;
	background-color:#636d76; */
	padding:8px;	
}
 .idTabs {
	/* border:1px solid #494e52;*/
	/* background-color:#636d76; */
	padding:8px;	
} 

ul.tabs {
	list-style-type: none;
	text-align: center;
	margin:0px; padding:0px; 
	margin-top:5px;
	margin-bottom:6px;
}
ul.tabs li {
	list-style:none;
	display:inline;
	text-align: center;
	margin: 0 10px 0 0; 
}
ul.tabs li a {
	background-color:#cede53;
	font-weight:bold;
	/* color:#ffebb5; */
	padding:8px 14px 8px 14px; 
	text-decoration:none;
	/* font-size:9px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	text-transform:uppercase; 
	border:1px solid #464c54;
	 background-image:url(images/tab_off.jpg);
	background-repeat:repeat-x;	 
	background-position:bottom; */
}
/* ul.tabs li a:hover {
	background-color:#2f343a;
	border-color:#2f343a;
} */
ul.tabs li a.active {
	/* background-color:#ffffff;
	color:#282e32; */
	 border:1px solid #464c54; 
	/* border-bottom: 1px solid #ffffff;
	background-image:url(images/tab_on.jpg);
	background-repeat:repeat-x;
	background-position:top; */	 
}
.content {
	background-color:#ffffff;
	padding:10px;
	/* border:1px solid #464c54; 	
	font-family:Arial, Helvetica, sans-serif;
	background-image:url(images/content_bottom.jpg);
	background-repeat:repeat-x;	 
	background-position:bottom;	 */
}
#content_2, #content_3, #content_4, #content_5, #content_6, #content_7 { display:none; }

.content ul {
	margin:0px;
	padding:0px 20px 0px 20px;
}
.content ul li {
	list-style:none;
	border-bottom:1px solid #d6dde0;
	padding-top:15px;
	padding-bottom:15px;
	/* font-size:13px; */
}
.content ul li:last-child {
	border-bottom:none;
}
.content ul li a {
	text-decoration:none;
	 color:#3e4346; 
}
.content ul li a small {
	color:#8b959c;
	font-size:9px;
	text-transform:uppercase;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	position:relative;
	left:4px;
	top:0px;
}
/* .content ul li a:hover {
	color:#a59c83;
}
.content ul li a:hover small {
	color:#baae8e;
} */
	</style>
</head><body>';
require_once("cnx_db.php");
$db='parques_wrdp1';
//$db->query("SET NAMES 'utf8'");

echo'<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;" width="620">
<tr>
<th bgcolor="#cede53" colspan="4">Datos del Parque</th>
</tr>
';
$sql="SELECT * , wp_arturo_parque.cve AS cvepar, wp_arturo_parque.estado AS est FROM  `wp_arturo_parque` LEFT JOIN wp_comites_parques ON wp_arturo_parque.cve = wp_comites_parques.cve_parque WHERE wp_arturo_parque.cve=$parque";
		
$res=mysql_db_query("$db",$sql);
$row=mysql_fetch_array($res);
	 
	
	//<tr><th>Lugar:</th><td align="center">'.$row['lugar'].'</td></tr>
	//<tr><th colspan=4 >Ubicaci&oacute;n del parque:</th></tr>
	echo '
		<tr><td align="center" colspan=2 rowspan="15">'.$row['maps'].'</td></tr>
		<tr><th bgcolor="#cede53" >Nombre de parque</th><td align="center">'.$row['nom'].'</td></tr>
		<tr><th bgcolor="#cede53" >Ubicaci&oacute;n</th><td align="center">'.$row['ubic'].'</td></tr>
		<tr><th bgcolor="#cede53" >Colonia</th><td align="center">'.$row['col'].'</td></tr>
		<tr><th bgcolor="#cede53" >Superficie</th><td align="center">'.$row['sup'].'</td></tr>
		<tr><th bgcolor="#cede53" >Sector</th><td align="center">'.$row['sec'].'</td></tr>
		<tr><th bgcolor="#cede53" >Tipo</th><td align="center">'.$row['tipo'].'</td></tr>
		<tr><th bgcolor="#cede53" >Contacto de comit&eacute;</th><td align="center">'.$row['cont'].'</td></tr>
		<tr><th bgcolor="#cede53" >Ciudad</th><td align="center">'.$row['ciudad'].'</td></tr>
		<tr><th bgcolor="#cede53" >Estado</th><td align="center">'.$row['est'].'</td></tr>
		<tr><th bgcolor="#cede53" >Fotos del parque</th><td align="center">';
		if($row['cve_wp']>0){
		echo'<a href="http://parquesalegres.org/?p='.$row['cve_wp'].'">ver fotos</a>';
		}echo'</td></tr>
		<tr><th bgcolor="#cede53" >Definici&oacute;n de parametros</th><td align="center"><a href="http://www.parquesalegres.org/propuesta" target="_blank">Ver definici&oacute;n de parametros</a></td></tr>
		<tr><th bgcolor="#cede53" >Historial del Parque</th><td align="center"><a href="#" class="show_hide">Ver Historial</a></td></tr>';
		$nombre_fichero = 'planos/'.$row['cve'].'.jpg';
		//echo$nombre_fichero;
		if (file_exists($nombre_fichero)) {
		echo'<tr><th bgcolor="#cede53" >Plano</th><td align="center"><a href="planos/'.$row['cve_parque'].'.jpg" target="_blank">Ver PLANO</a></td></tr>';
		}else{
		echo'<tr><th bgcolor="#cede53" >Plano</th><td align="center">Sin plano</td></tr>';
		}
		echo'
		
		<tr><th bgcolor="#cede53" >Calificaci&oacute;n</th><td align="center"><font 
		'; if($row['calif']>=80){ echo'color="green">';}elseif($row['calif']<=59){ echo'color="orange">';}else{echo'color="black">';}echo'
		
		'.$row['calif'].'</font></td></tr>';
		
		
		
		
		echo'</table>';
		
		$pun=$row['opera']+$row['formaliza']+$row['organiza']+$row['reunion']+$row['proyecto'];
		$pun2=$row['instalaciones']+$row['estado'];
		$pun3=$row['ingresop']+$row['ingresadop'];
		$pun4=$row['eventos']+$row['eventosr'];
		$pun5=$row['averdes']+$row['estaver']+$row['riego'];
		$pun6=$row['gente']+$row['diario'];
		$pun7=$row['limpieza']+$row['orden']+$row['respint'];
		$prom=($pun+$pun2+$pun3+$pun4+$pun5+$pun6+$pun7)/7;
		$prome=round($prom);
	
		echo'<div class="slidingDiv"><b>Historial del Parque</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Promedio del parque: <b>'.$prome.'</b><br><br>';
		/*echo'<div id="tabbed_box_1" class="tabbed_box">
  ';
 echo'  <div class="tabbed_area"><ul class="tabs"> 
<li><a href="#" title="content_1" class="tab active">Comit&eacute; (20)</a></li> 
<li><a href="#" title="content_2" class="tab">Instalaciones (50)</a></li> 
<li><a href="#" title="content_3" class="tab">Ingresos (50)</a></li> 
<li><a href="#" title="content_4" class="tab">Eventos (50)</a></li> 
<li><a href="#" title="content_5" class="tab">&Aacute;reas verdes (33)</a></li> 
<li><a href="#" title="content_6" class="tab">Afluencia (50)</a></li> 
<li><a href="#" title="content_7" class="tab">Orden (33)</a></li> 
</ul>';
echo'<div id="content_1" class="content">';

	echo'
		<table><tr>
		<th bgcolor="#cede53">VISITA</th>
		<th bgcolor="#cede53">OPERA CON 3 PERSONAS O MAS</th>
		<th bgcolor="#cede53">ESTA FORMALIZADO COMO A.C. / IAP/ OFICIO AYUNTAMIENTO</th>
		<th bgcolor="#cede53">CUENTA CON BUENA ORGANIZACIÓN (CON ORDEN - FORMALIDAD)</th>
		<th bgcolor="#cede53">EXISTEN REUNIONES CON REGULARIDAD</th>
		<th bgcolor="#cede53">TIENEN PROYECTOS EN PROCESO</th>
		<th bgcolor="#cede53">PUNTOS</th></tr>'; */
		
		echo'<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
		<tr><th bgcolor="#cede53" align="center">No. visita</th><th colspan="6"  bgcolor="#cede53" align="center">Comit&eacute; (20)</th><th colspan="3"  bgcolor="#cede53" align="center">Instalaciones (50)</th><th colspan="3"  bgcolor="#cede53" align="center">Ingresos (50)</th><th colspan="3"  bgcolor="#cede53" align="center">Eventos (50)</th><th colspan="4"  bgcolor="#cede53" align="center">&Aacute;reas verdes (33)</th><th colspan="5"  bgcolor="#cede53" align="center">Afluencia (50)</th><th colspan="4"  bgcolor="#cede53" align="center">Orden (33)</th><th  bgcolor="#cede53" align="center" rowspan="2">Promedio del parque</th></tr>
		<tr>
		<th>&nbsp;</th>
		<th>OPERA CON 3 PERSONAS O MAS</th>
		<th>ESTA FORMALIZADO COMO A.C. / IAP/ OFICIO AYUNTAMIENTO</th>
		<th>CUENTA CON BUENA ORGANIZACIÓN (CON ORDEN - FORMALIDAD)</th>
		<th>EXISTEN REUNIONES CON REGULARIDAD</th>
		<th>TIENEN PROYECTOS EN PROCESO</th>
		<th>PUNTOS</th>
		<th>HAY INSTALACIONES EN LA MAYORIA DEL ESPACIO,CANCHAS, AREAS VERDES,BANQUETAS,ETC)</th>
		<th>ESTAN EN BUEN ESTADO LO QUE EXISTE</th>
		<th>PUNTOS</th>
		<th>TIENEN FUENTES DE INGRESOS PERMANENTES</th>
		<th>ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</th>
		<th>PUNTOS</th>
		<th> LLEVAN A CABO EVENTOS CON UN CALENDARIO ANUAL</th>
		<th>HAY EVENTOS CON REGULARIDAD</th>
		<th>PUNTOS</th>
		<th>HAY JARDINES, PASTOS, ARBOLES, ETC</th>
		<th>ESTAN EN BUEN ESTADO</th>
		<th>TIENEN RIEGO CONSTANTE</th>
		<th>PUNTOS</th>
		<th>VA SUFICIENTE GENTE</th>
		<th>DIARIO </th>
		<th>( + ) ENTRE SEMANA</th>
		<th>( + ) FIN DE SEMANA</th>
		<th>PUNTOS</th>
		<th>SE MANTIENE LIMPIO</th>
		<th>OPERA CON ORDEN</th>
		<th>LAS INSTALACIONES SE RESPETAN</th>
		<th>PUNTOS</th>
		</tr>';
		
		$sql2="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
		
	$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
	echo'
		<tr>
		<td align="center">'.$c.'</td>
		<td align="center">'.$row2['opera'].'</td>
		<td align="center">'.$row2['formaliza'].'</td>
		<td align="center">'.$row2['organiza'].'</td>
		<td align="center">'.$row2['reunion'].'</td>
		<td align="center">'.$row2['proyecto'].'</td>
		<td align="center">'.$pun.'</td>
		<td align="center">'.$row2['instalaciones'].'</td>
		<td align="center">'.$row2['estado'].'</td>
		<td align="center">'.$pun2.'</td>
		<td align="center">'.$row2['ingresop'].'</td>
		<td align="center">'.$row2['ingresadop'].'</td>
		<td align="center">'.$pun3.'</td>
		<td align="center">'.$row2['eventos'].'</td>
		<td align="center">'.$row2['eventosr'].'</td>
		<td align="center">'.$pun4.'</td>
		<td align="center">'.$row2['averdes'].'</td>
		<td align="center">'.$row2['estaver'].'</td>
		<td align="center">'.$row2['riego'].'</td>
		<td align="center">'.$pun5.'</td>
		<td align="center">'.$row2['gente'].'</td>
		<td align="center">'.$row2['diario'].'</td>
		<td align="center">'.$row2['semana'].'</td>
		<td align="center">'.$row2['finsem'].'</td>
		<td align="center">'.$pun6.'</td>
		<td align="center">'.$row2['limpieza'].'</td>
		<td align="center">'.$row2['orden'].'</td>
		<td align="center">'.$row2['respint'].'</td>
		<td align="center">'.$pun7.'</td>
		<td align="center">'.$prome.'</td>
		</tr>
		';
		}
		//echo'</table>';
//echo'</div>';

/* echo'<div id="content_2" class="content">';

echo'<table><tr>
		<th bgcolor="#cede53">VISITA</th>
		<th bgcolor="#cede53">HAY INSTALACIONES EN LA MAYORIA DEL ESPACIO,CANCHAS, AREAS VERDES,BANQUETAS,ETC)</th>
		<th bgcolor="#cede53">ESTAN EN BUEN ESTADO LO QUE EXISTE</th>
		<th bgcolor="#cede53">PUNTOS</th>
		</tr>';*/
		/* $res2=mysql_db_query("$db",$sql2);
		$c=0;
		while($row2=mysql_fetch_array($res2)){	
		$c++;
		//echo'<tr>';
		//<td align="center">'.$c.'</td>
		echo'<td align="center">'.$row2['instalaciones'].'</td>
		<td align="center">'.$row2['estado'].'</td>
		<td align="center">'.$pun2.'</td>';
		//</tr>'; */
		// }
		//echo'</table>';

//echo'</div>';

/* echo'<div id="content_3" class="content">';

echo'<table><tr> echo'<th bgcolor="#cede53">VISITA</th>
		
		echo'<th bgcolor="#cede53">TIENEN FUENTES DE INGRESOS PERMANENTES</th>
		<th bgcolor="#cede53">ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</th>
		<th bgcolor="#cede53">PUNTOS</th>';*/
		// </tr>';
		/* $res2=mysql_db_query("$db",$sql2);
		$c=0;
		while($row2=mysql_fetch_array($res2)){
$c++; */
		/* echo'<tr><td align="center">'.$c.'</td> */
	/* echo'	<td align="center">'.$row2['ingresop'].'</td>
		<td align="center">'.$row2['ingresadop'].'</td>
		<td align="center">'.$pun3.'</td>';
		// </tr>';
		} */
	// echo'	</table>';

/* echo'</div>';
echo'<div id="content_4" class="content">'; 

// echo'<table><tr>
		echo'<th bgcolor="#cede53">VISITA</th>
		<th bgcolor="#cede53"> LLEVAN A CABO EVENTOS CON UN CALENDARIO ANUAL</th>
		<th bgcolor="#cede53">HAY EVENTOS CON REGULARIDAD</th>
		<th bgcolor="#cede53">PUNTOS</th>
		</tr>';*/
		/* $res2=mysql_db_query("$db",$sql2);
		$c=0;
		while($row2=mysql_fetch_array($res2)){
$c++;
		//echo'<tr><td align="center">'.$c.'</td>
		echo'<td align="center">'.$row2['eventos'].'</td>
		<td align="center">'.$row2['eventosr'].'</td>
		<td align="center">'.$pun4.'</td>';
		// </tr>';
		} */
		// echo'</table>';

// echo'</div>';
// echo'<div id="content_5" class="content">';

// echo'<table><tr>
		// <th bgcolor="#cede53">VISITA</th>
		// <th bgcolor="#cede53">HAY JARDINES, PASTOS, ARBOLES, ETC</th>
		// <th bgcolor="#cede53">ESTAN EN BUEN ESTADO</th>
		// <th bgcolor="#cede53">TIENEN RIEGO CONSTANTE</th>
		// <th bgcolor="#cede53">PUNTOS</th>
		// </tr>';
		/* $res2=mysql_db_query("$db",$sql2);
		$c=0;
		while($row2=mysql_fetch_array($res2)){
$c++;
	// echo'	<tr>
		// <td align="center">'.$c.'</td>
		echo'<td align="center">'.$row2['averdes'].'</td>
		<td align="center">'.$row2['estaver'].'</td>
		<td align="center">'.$row2['riego'].'</td>
		<td align="center">'.$pun5.'</td>
		</tr>';
		} */
		/* echo'</table>';

echo'</div>';

echo'<div id="content_6" class="content">';

echo'<table><tr>
		<th bgcolor="#cede53">VISITA</th>
		<th bgcolor="#cede53">VA SUFICIENTE GENTE</th>
		<th bgcolor="#cede53">DIARIO </th>
		<th bgcolor="#cede53">( + ) ENTRE SEMANA</th>
		<th bgcolor="#cede53">( + ) FIN DE SEMANA</th>
		<th bgcolor="#cede53">PUNTOS</th>
		</tr>'; */
		/* $res2=mysql_db_query("$db",$sql2);
		$c=0;
		while($row2=mysql_fetch_array($res2)){
$c++;
		/* echo'<tr>
		<td align="center">'.$c.'</td> */
		/* echo'<td align="center">'.$row2['gente'].'</td>
		<td align="center">'.$row2['diario'].'</td>
		<td align="center">'.$row2['semana'].'</td>
		<td align="center">'.$row2['finsem'].'</td>
		<td align="center">'.$pun6.'</td>';
		//</tr>';
		} */ 
		/* echo'</table>';

echo'</div>';

echo'<div id="content_7" class="content">';

echo'<table><tr>
		<th bgcolor="#cede53">VISITA</th>
		<th bgcolor="#cede53">SE MANTIENE LIMPIO</th>
		<th bgcolor="#cede53">OPERA CON ORDEN</th>
		<th bgcolor="#cede53">LAS INSTALACIONES SE RESPETAN</th>
		<th bgcolor="#cede53">PUNTOS</th>
		</tr> 
		';*/
		/* $res2=mysql_db_query("$db",$sql2);
		$c=0;
		while($row2=mysql_fetch_array($res2)){
$c++;
		//echo'<tr><td align="center">'.$c.'</td>
		echo'<td align="center">'.$row2['limpieza'].'</td>
		<td align="center">'.$row2['orden'].'</td>
		<td align="center">'.$row2['respint'].'</td>
		<td align="center">'.$pun7.'</td>
		</tr>';
		} */
		echo'</table>';

/*echo'</div></div>*/
echo'</div>'; 
		if($prome==0){
		echo'<a href="http://parquesalegres.org/agendar-visita/">Agenda Visita</a>';
		}	
echo'
<br><br><br>
<center><input type="button" value="Cerrar" onClick="window.close()"></center>
</body>
';

?>