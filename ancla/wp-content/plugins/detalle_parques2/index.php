<?php
/**
 * @package detalleparque
 * @version 1.0
 */
/*
Plugin Name: detalle_parque
Plugin URI: http://di99.com
Description: Esta es una prueba, sustituye al archivo muestraphp y se integra con el frame de wp.
Author: Arturo Gudiño Chong
Version: 1.0
Author URI: http://eci.mx/
*/

function detalleparques_dos()
{
	echo 'Calificación de parques<br />';
	echo '<iframe src="http://di99.com/parques/tabla.php" width="580" height="800"></iframe>';
}

function detalleparques_tres()
{
$parque=$_GET['parque'];
echo'
	<style>
	
 #tabbed_box_1 {
	margin-left:-40px;
	width:700px;
} 
.tabbed_box h4 {
	
	color:#ffffff;
	letter-spacing:-1px;
	margin-bottom:10px;
}
.tabbed_box h4 small {
	color:#e3e9ec;
	font-weight:normal;
	
	font-family:Verdana, Arial, Helvetica, sans-serif;
	text-transform:uppercase;
	position:relative;
	top:-4px;
	left:6px;
	letter-spacing:0px;
}
.tabbed_area {

	padding:8px;	
}
 

 
ul.mytabs {
	list-style-type: none;
	text-align: center;
	width: 760px;
	margin-left:-60px; padding:0px; 
	margin-top:5px;
	margin-bottom:6px;
}
ul.mytabs li {
	list-style:none;
	display:inline;
	text-align: center;
	margin: 0 10px 0 0; 
}
ul.mytabs li a {
	background-color:#cede53;
	font-weight:bold;
	padding:8px 14px 8px 14px; 
	text-decoration:none;

}

ul.mytabs li a.active {
	
	 border:1px solid #464c54; 	 
}

.ul {
	margin:20px;
	margin-left:-70px;
}
.ul li {
	list-style:none;
	border-bottom:1px solid #d6dde0;
	padding-top:15px;
	padding-bottom:15px;
	
}
.ul li:last-child {
	border-bottom:none;
}
.ul li a {
	text-decoration:none;
	 color:#3e4346; 
}
.ul li a small {
	color:#8b959c;
	text-transform:uppercase;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	position:relative;
	left:4px;
	top:0px;
}

	</style>';
     echo' <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="/commenttooltip/js/excanvas/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="/commenttooltip/js/spinners/spinners.min.js"></script> <!-- optional -->
<script type="text/javascript" src="/commenttooltip/js/tipped/tipped.js"></script>

<link rel="stylesheet" type="text/css" href="/commenttooltip/css/tipped/tipped.css" />
<script type="text/javascript">
//By creating tooltips after DOM load we make sure that referenced elements are available.
jQuery(document).ready(function($) {
  /*
   * Demonstrations: Skins
   */
  Tipped.create("#demo_skins_dark");
  Tipped.create("#demo_skins_black", { skin: "black" });
  Tipped.create("#demo_skins_light", { skin: "light" });

  Tipped.create("#demo_skins_white", { skin: "white" });
  Tipped.create("#demo_skins_yellow", { skin: "yellow" });
  Tipped.create("#demo_skins_gray", { skin: "gray" });
  
  Tipped.create("#demo_skins_blue", "Skins are optimized to look good on any background", { skin: "blue" });
  Tipped.create("#demo_skins_red", "Great for error messages", { skin: "red" });
  Tipped.create("#demo_skins_green", "A nice green skin", { skin: "green" });
  
  Tipped.create("#demo_skins_tiny", "Small black tooltips are always useful", { skin: "tiny" });
});
</script>

<link rel="stylesheet" type="text/css" href="commenttooltip/css/style.css" />




';   



echo'';
echo'<table border="0"  style="margin-left:-10px;">
';
//cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"
/*<tr>
<th bgcolor="#cede53" colspan="4">Datos del Parque</th>
</tr>*/
$sql="SELECT * , wp_arturo_parque.cve AS cvepar, wp_arturo_parque.estado AS est FROM  `wp_arturo_parque` LEFT JOIN wp_comites_parques ON wp_arturo_parque.cve = wp_comites_parques.cve_parque WHERE wp_arturo_parque.cve=$parque ";
		
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
	 
	
	//<tr><th>Lugar:</th><td align="center">'.$row['lugar'].'</td></tr>
	//<tr><th colspan=4 >Ubicaci&oacute;n del parque:</th></tr>
        $b = html_entity_decode($row["maps"]);
	//rowspan="17"
	$bar = $row['nom'];
		$bar = ucwords($bar);             // HELLO WORLD!
		$bar = ucwords(strtolower($bar)); // Hello World!
	echo '<tr><th >Nombre de parque:</th><th align="center"> '.$bar.'</th></tr>
		<tr><th >Ubicaci&oacute;n</th><td align="center">'.$row['ubic'].'</td></tr>
		<tr><th >Colonia</th><td align="center">'.$row['col'].'</td></tr>
		<tr><th >Superficie</th><td align="center">'.$row['sup'].'</td></tr>
		<tr><td style="padding:0;" align="center" colspan=2 >'.$b.'</td></tr>';
		
		echo'
		<tr><th  >Sector</th><td align="center">'.$row['sec'].'</td></tr>
		<tr><th >Tipo</th><td align="center">'.$row['tipo'].'</td></tr>
		<tr><th  >Contacto de comit&eacute;</th><td align="center">'.$row['cont'].'</td></tr>
		<tr><th  >Ciudad</th><td align="center">'.$row['ciudad'].'</td></tr>
		<tr><th  >Estado</th><td align="center">'.$row['est'].'</td></tr>
		';
		if($row['cve_wp']>0){
		echo'<tr><th >Fotos del parque</th><td align="center"><a href="http://parquesalegres.org/?p='.$row['cve_wp'].'">ver fotos</a></td></tr>';
		}echo'';
		
		if($row['cve_exp']>0){
			echo'<tr><th  >Experiencia exitosa</th><td align="center">';
		echo'<a href="http://parquesalegres.org/?p='.$row['cve_exp'].'">Ver experiencia exitosa</a>';
		echo'</td></tr>';
		}
		echo'<tr><th  >Definici&oacute;n de parametros</th><td align="center"><a href="http://www.parquesalegres.org/propuesta" target="_blank">Ver definici&oacute;n de parametros</a></td></tr>';
		//echo'<tr><th  >Historial de Parque</th><td align="center">Ver Historial</td></tr>';
		$nombre_fichero = 'planos/'.$row['cvepar'].'.jpg';
		//echo$nombre_fichero;
		if (file_exists($nombre_fichero)) {
		echo'<tr><th  >Plano</th><td align="center"><a href="/planos/'.$row['cvepar'].'.jpg" target="_blank">Ver PLANO</a></td></tr>';
		}else{
		//echo'<tr><th  >Plano</th><td align="center">Sin plano</td></tr>';
		}
		$nombre_fichero1 = 'proyectos/'.$row['cvepar'].'.pdf';
		//echo$nombre_fichero;
		if (file_exists($nombre_fichero1)) {
		echo'<tr><th  >Invertido de SEDESOL</th><td align="center"><a href="/proyectos/'.$row['cvepar'].'.pdf" target="_blank">Ver PROYECTO</a></td></tr>';
		}else{
		//echo'<tr><th  >Invertido de SEDESOL</th><td align="center">Sin proyecto</td></tr>';
		}
		//echo'
		
		
		
		
		echo'</table>';
                $sql2="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
		$sql22="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
                $res22=mysql_query($sql22);
		 while($row22=mysql_fetch_array($res22)){
		$pun22=$pun22+$row22['opera']+$row22['formaliza']+$row22['organiza']+$row22['reunion']+$row22['proyecto'];
		$pun222=$pun222+$row22['instalaciones']+$row22['estado']+$row22['disenio']+$row22['ejecutivo'];
		$pun322=$pun322+$row22['ingresop']+$row22['ingresadop']+$row22['mancomunado'];
		$pun422=$pun422+$row22['eventos']+$row22['eventosr'];
		$pun522=$pun522+$row22['averdes']+$row22['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$pun622=$pun622+$row22['gente']+$row22['diario'];
		$pun722=$pun722+$row22['limpieza']+$row22['orden']+$row22['respint'];
	}
        //---------
        $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque";
               $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
             $promea=0;
        }else{
            $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
        ?>
<script type="text/javascript">
  jQuery(document).ready(function() {
    Tipped.create('.create-tooltip',
                  {
  skin: 'light',
  maxWidth: 200});
    });
</script>

<?
//<div class="slidingDiv">
		echo'<b>Historial del Parque</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Promedio del parque: <b>'.$promea.'</b><br><br>';
		
echo'<ul class="mytabs">
<li class="mytabs"><a href="#seccion1" class="mytabs">Comit&eacute; </a></li> 
<li class="mytabs"><a href="#seccion2" class="mytabs">Instalaciones </a></li> 
<li class="mytabs"><a href="#seccion3" class="mytabs">Ingresos </a></li> 
<li class="mytabs"><a href="#seccion4" class="mytabs">Eventos </a></li> 
<li class="mytabs"><a href="#seccion5" class="mytabs">&Aacute;reas verdes </a></li> 
<li class="mytabs"><a href="#seccion6" class="mytabs">Afluencia </a></li> 
<li class="mytabs"><a href="#seccion7" class="mytabs">Orden </a></li> 
</ul>';
//<li><a href="#" onclick="return false;" title="content_8" class="tab active">General</a></li>
//<p><a name="seccion1">Secci—n 1:</a> Este p‡rrafo contiene...</p>
$tipos_visita = array("---Selecciona Tipo---","Visita de reforzamiento","Visita de seguimiento","Visita de evento");

//----------------empieza

echo'';

	echo'<p>
		<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion1">Comit&eacute;</a></th></tr> 
<tr>
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_query($sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	      if($row3['tipo_visita']){
		echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	      }else{
		echo'<td align="center">'.$c.'</td>';
	      }
//echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">OPERA CON 3 PERSONAS O MAS</th>';
	$res2=mysql_query($sql2);
	$uno=0;
        $dos=0;
         while($row2=mysql_fetch_array($res2)){
	
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['opera']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['opera'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['opera'];
        $dos++;        
        //---------------------------------------
        if($row3['opera']){
           echo' <div class="create-tooltip" title="'.$row3['opera'].'" ><font '.$color.'>'.$row2['opera'].'</font></div>';
        }else{
           echo$row2['opera']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
	echo'	<tr><th bgcolor="#cede53">ESTA FORMALIZADO COMO A.C. / OFICIO AYUNTAMIENTO</th>';
	$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['formaliza']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['formaliza'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['formaliza'];
        $dos++;        
        //---------------------------------------
        if($row3['formaliza']){
           echo' <div class="create-tooltip" title="'.$row3['formaliza'].'" ><font '.$color.'>'.$row2['formaliza'].'</font></div>';
        }else{
           echo$row2['formaliza']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53">CUENTA CON BUENA ORGANIZACION (CON ORDEN - FORMALIDAD)</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['organiza']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['organiza'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['organiza'];
        $dos++;        
        //---------------------------------------
        if($row3['organiza']){
           echo' <div class="create-tooltip" title="'.$row3['organiza'].'" ><font '.$color.'>'.$row2['organiza'].'</font></div>';
        }else{
           echo$row2['organiza']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53">EXISTEN REUNIONES CON REGULARIDAD</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['reunion']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['reunion'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['reunion'];
        $dos++;        
        //---------------------------------------
        if($row3['reunion']){
           echo' <div class="create-tooltip" title="'.$row3['reunion'].'" ><font '.$color.'>'.$row2['reunion'].'</font></div>';
        }else{
           echo$row2['reunion']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53">TIENEN PROYECTOS EN PROCESO</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['proyecto']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['proyecto'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['proyecto'];
        $dos++;        
        //---------------------------------------
        if($row3['proyecto']){
           echo' <div class="create-tooltip" title="'.$row3['proyecto'].'" ><font '.$color.'>'.$row2['proyecto'].'</font></div>';
        }else{
           echo$row2['proyecto']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
             $pun=0;
            $pun=$pun+$row2['opera']+$row2['formaliza']+$row2['organiza']+$row2['reunion']+$row2['proyecto'];
	echo'<td align="center">'.$pun.'</td>';
	 }
		echo'</tr></table></p>';

echo'<br>';

echo'<p><table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion2">Instalaciones </a></th></tr> ';
		echo'<th bgcolor="#cede53">VISITA</th>';
			$res2=mysql_query($sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
if($row3['tipo_visita']){
		echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	      }else{
		echo'<td align="center">'.$c.'</td>';
	      }
	}echo'</tr>';
        echo'<tr><th bgcolor="#cede53">CUENTA CON PROYECTO DE DISE&Ntilde;O</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['disenio']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['disenio'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['disenio'];
        $dos++;        
        //---------------------------------------
        if($row3['disenio']){
           echo' <div class="create-tooltip" title="'.$row3['disenio'].'" ><font '.$color.'>'.$row2['disenio'].'</font></div>';
        }else{
           echo$row2['disenio']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
         echo'<tr><th bgcolor="#cede53">CUENTA CON PROYECTO EJECUTIVO</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['ejecutivo']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['ejecutivo'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['ejecutivo'];
        $dos++;        
        //---------------------------------------
        if($row3['ejecutivo']){
           echo' <div class="create-tooltip" title="'.$row3['ejecutivo'].'" ><font '.$color.'>'.$row2['ejecutivo'].'</font></div>';
        }else{
           echo$row2['ejecutivo']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
         echo'<tr><th bgcolor="#cede53">ESTAN EN BUEN ESTADO LO QUE EXISTE</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['estado']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['estado'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['estado'];
        $dos++;        
        //---------------------------------------
        if($row3['estado']){
           echo' <div class="create-tooltip" title="'.$row3['estado'].'" ><font '.$color.'>'.$row2['estado'].'</font></div>';
        }else{
           echo$row2['estado']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53">HAY INSTALACIONES EN LA MAYORIA DEL ESPACIO,CANCHAS, ANDADOR, BANQUETAS,ETC</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['instalaciones']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['instalaciones'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['instalaciones'];
        $dos++;        
        //---------------------------------------
        if($row3['instalaciones']){
           echo' <div class="create-tooltip" title="'.$row3['instalaciones'].'" ><font '.$color.'>'.$row2['instalaciones'].'</font></div>';
        }else{
           echo$row2['instalaciones']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
		
		echo'<tr><th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
             $pun2=0;
            $pun2=$pun2+$row2['instalaciones']+$row2['estado']+$row2['disenio']+$row2['ejecutivo'];
	echo' <td align="center">'.$pun2.'</td>';
	 }
		echo'</tr>';
		echo'</table>';

echo'</p>';

echo'<br>';

echo'<p><table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion3">Ingresos</a> </th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_query($sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
if($row3['tipo_visita']){
		echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	      }else{
		echo'<td align="center">'.$c.'</td>';
	      }
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">TIENEN FUENTES DE INGRESOS PERMANENTES</th>';
	$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['ingresop']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['ingresop'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['ingresop'];
        $dos++;        
        //---------------------------------------
        if($row3['ingresop']){
           echo' <div class="create-tooltip" title="'.$row3['ingresop'].'" ><font '.$color.'>'.$row2['ingresop'].'</font></div>';
        }else{
           echo$row2['ingresop']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
		echo'<th bgcolor="#cede53">ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['ingresadop']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['ingresadop'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['ingresadop'];
        $dos++;        
        //---------------------------------------
        if($row3['ingresadop']){
           echo' <div class="create-tooltip" title="'.$row3['ingresadop'].'" ><font '.$color.'>'.$row2['ingresadop'].'</font></div>';
        }else{
           echo$row2['ingresadop']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
         echo'<tr><th bgcolor="#cede53">TIENEN CUENTA MANCOMUNADA</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['mancomunado']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['mancomunado'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['mancomunado'];
        $dos++;        
        //---------------------------------------
        if($row3['mancomunado']){
           echo' <div class="create-tooltip" title="'.$row3['mancomunado'].'" ><font '.$color.'>'.$row2['mancomunado'].'</font></div>';
        }else{
           echo$row2['mancomunado']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
		echo'<th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
             $pun3=0;
            $pun3=$pun3+$row2['ingresop']+$row2['ingresadop']+$row2['mancomunado'];
	echo'<td align="center">'.$pun3.'</td>';
	 }echo'</tr>';
	echo'	</table>';

echo'</p>';
echo'<br>';

echo'<p><table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion4">Eventos </a></th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_query($sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
if($row3['tipo_visita']){
		echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	      }else{
		echo'<td align="center">'.$c.'</td>';
	      }
	}echo'</tr>';
	echo'	<tr><th bgcolor="#cede53">HAY EVENTOS CON REGULARIDAD</th>';
	$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['eventosr']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['eventosr'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['eventosr'];
        $dos++;        
        //---------------------------------------
        if($row3['eventosr']){
           echo' <div class="create-tooltip" title="'.$row3['eventosr'].'" ><font '.$color.'>'.$row2['eventosr'].'</font></div>';
        }else{
           echo$row2['eventosr']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
		echo'<th bgcolor="#cede53"> CUENTAN CON UN CALENDARIO ANUAL DE ACTIVIDADES</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['eventos']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['eventos'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['eventos'];
        $dos++;        
        //---------------------------------------
        if($row3['eventos']){
           echo' <div class="create-tooltip" title="'.$row3['eventos'].'" ><font '.$color.'>'.$row2['eventos'].'</font></div>';
        }else{
           echo$row2['eventos']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
		echo'<th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun4=0;
            $pun4=$pun4+$row2['eventos']+$row2['eventosr'];
	echo'<td align="center">'.$pun4.'</td>';
	 }echo'</tr>';
		echo'</table>';

echo'</p>';

echo'<br>';

echo'<p><table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion5">&Aacute;reas verdes</a> </th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_query($sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
if($row3['tipo_visita']){
		echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	      }else{
		echo'<td align="center">'.$c.'</td>';
	      }
	}echo'</tr>';
	
		echo'<tr><th bgcolor="#cede53">CUENTA CON ARBOLES, CESPED Y JARDIN</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['averdes']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['averdes'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['averdes'];
        $dos++;        
        //---------------------------------------
        if($row3['averdes']){
           echo' <div class="create-tooltip" title="'.$row3['averdes'].'" ><font '.$color.'>'.$row2['averdes'].'</font></div>';
        }else{
           echo$row2['averdes']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
		echo'<th bgcolor="#cede53">SE ENCUENTRA EN BUEN ESTADO</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['estaver']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['estaver'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['estaver'];
        $dos++;        
        //---------------------------------------
        if($row3['estaver']){
           echo' <div class="create-tooltip" title="'.$row3['estaver'].'" ><font '.$color.'>'.$row2['estaver'].'</font></div>';
        }else{
           echo$row2['estaver']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
	//	echo'<th bgcolor="#cede53">TIENEN RIEGO CONSTANTE</th>';
	//	$res2=mysql_query($sql2);
	// while($row2=mysql_fetch_array($res2)){
	//echo'<td align="center">'.$row2['riego'].'</td>';
	// }echo'</tr>';
		echo'<tr><th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun5=0;
            //$pun5=$pun5+$row2['averdes']+$row2['estaver']+$row2['riego'];
            $pun5=$pun5+$row2['averdes']+$row2['estaver'];
	echo'<td align="center">'.$pun5.'</td>';
	 }echo'</tr>';
		echo'</table>';

echo'</p>';

echo'<br><p>';
echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion6">Afluencia </a></th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_query($sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
if($row3['tipo_visita']){
		echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	      }else{
		echo'<td align="center">'.$c.'</td>';
	      }
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">PORCENTAJE DE AFLUENCIA SOBRE LO EXISTENTE</th>';
	$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['gente']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['gente'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['gente'];
        $dos++;        
        //---------------------------------------
        if($row3['gente']){
           echo' <div class="create-tooltip" title="'.$row3['gente'].'" ><font '.$color.'>'.$row2['gente'].'</font></div>';
        }else{
           echo$row2['gente']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
	echo'	<th bgcolor="#cede53">PORCENTAJE DE AFLUENCIA CONTRA LO POSIBLE </th>';
	$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['diario']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['diario'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['diario'];
        $dos++;        
        //---------------------------------------
        if($row3['diario']){
           echo' <div class="create-tooltip" title="'.$row3['diario'].'" ><font '.$color.'>'.$row2['diario'].'</font></div>';
        }else{
           echo$row2['diario']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
		echo'<th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun6=0;
            $pun6=$pun6+$row2['gente']+$row2['diario'];
	echo'<td align="center">'.$pun6.'</td>';
	 }echo'</tr>';
		echo'</table>';
echo'</p>';

echo'<br><p>';
echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion7">Orden </a></th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_query($sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
if($row3['tipo_visita']){
		echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	      }else{
		echo'<td align="center">'.$c.'</td>';
	      }
	}echo'</tr>';
	echo'<tr><th bgcolor="#cede53">LAS INSTALACIONES SE RESPETAN</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['respint']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['respint'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['respint'];
        $dos++;        
        //---------------------------------------
        if($row3['respint']){
           echo' <div class="create-tooltip" title="'.$row3['respint'].'" ><font '.$color.'>'.$row2['respint'].'</font></div>';
        }else{
           echo$row2['respint']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
         echo'<tr><th bgcolor="#cede53">SE CUENTA CON REGLAMENTEO DE ORDEN</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['orden']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['orden'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['orden'];
        $dos++;        
        //---------------------------------------
        if($row3['orden']){
           echo' <div class="create-tooltip" title="'.$row3['orden'].'" ><font '.$color.'>'.$row2['orden'].'</font></div>';
        }else{
           echo$row2['orden']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
	echo'	<th bgcolor="#cede53">SE MANTIENE LIMPIO</th>';
	$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
        if($uno>$row2['limpieza']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['limpieza'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['limpieza'];
        $dos++;        
        //---------------------------------------
        if($row3['limpieza']){
           echo' <div class="create-tooltip" title="'.$row3['limpieza'].'" ><font '.$color.'>'.$row2['limpieza'].'</font></div>';
        }else{
           echo$row2['limpieza']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
		
		
		echo'<tr><th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
             $pun7=0;
            $pun7=$pun7+$row2['limpieza']+$row2['orden']+$row2['respint'];
	echo'<td align="center">'.$pun7.'</td>';
	 }echo'</tr>';
		echo'</tr>
		';
		echo'</table>';
                echo'<br>';
//-------------------------------------COMENTARIOS GENERALES
echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2">Comentarios generales </th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		echo'<th bgcolor="#cede53">Comentarios</th></tr>';
		$res2=mysql_query($sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);
if($row3['tipo_visita']){
		echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	      }else{
		echo'<td align="center">'.$c.'</td>';
	      }
	/*}//echo'</tr>';
	
		$res2=mysql_query($sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_query($sql3);
              $row3=mysql_fetch_array($res3);*/
	echo' <td align="center">';
    if($row3['genvisita']){
        echo$row3['genvisita'];
    }else{
        echo'Sin comentarios';
    }
    echo'</td></tr>';
	 }
         //echo'</tr>';
         
		echo'</table></p>';
//---------------------------------------------------------comienza grafica de promedio por visita		
echo'
 <script type="text/javascript" src="//www.google.com/jsapi"></script>
 <script type="text/javascript">
      google.load("visualization", "1", {packages: ["corechart"]});
    </script>
    <script type="text/javascript">
    function drawVisualization() {
      // Create and populate the data table.
     var data = new google.visualization.DataTable();
        data.addColumn("number", "Visita");
        data.addColumn("number", "Visita");';	

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
        //echo$total_reg;
	echo'data.addRows('.$total_reg.'); ';
while($row=mysql_fetch_array($res)){


		// Lugar
                //$c++;
		//echo 'data.setCell('.$c.', 0,'.$row['cve'].');';
		$d=$c+1;
                echo 'data.setCell('.$c.', 0,'.$d.');';
		//$parque= $row['cve'];
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
$puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
		//echo 'data.setCell('.$c.', 4,'.$row['calif'].');';
			echo 'data.setCell('.$c.', 1,'.$promea.');';
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;
      // Create and draw the visualization.
      
      
      //table en vez de visualization
    echo' visualization = new google.visualization.ColumnChart(document.getElementById("table")).
            draw(data,
                 {title:"Promedio por visita",
                  width:600, height:400,
                  hAxis: {title: "Visita"},
		  vAxis: {title: "Promedio"}}
            );
      ';
	  
  echo'
  table.draw(data, {allowHtml: true, showRowNumber: true});
  
      var options = {};
  options["showRowNumber"] = "true";
  options["allowHtml"] = "true";
  
        
       var view = new google.visualization.DataView(data);
	  view.setColumns([1]);

	  table.draw(view, options);';
	  
  echo'  }
    

    google.setOnLoadCallback(drawVisualization);
    </script>';

    echo'<div id="table"></div>
  
';


//---------------------------------------------------------termina grafica de promedio por visita
//---------------------------------------------------------comienza grafica de promedio por rubro por visita		
echo'<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Visita", "Comit\u00E9", "Instalaciones", "Ingresos", "Eventos", "\u00C1reas verdes", "Afluencia", "Orden"],';

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
		$d=$c+1;
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
$puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
echo'['.$d.', '.$puna.','.$punb.','.$punc.','.$pund.','.$pune.','.$punf.','.$pung.']';
if($d<$total_reg){
	echo',';
}else{
	echo']);';
}
       
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo'var options = {
          title: "Calificaci\u00F3n Parque",
          hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
        };
	options["allowHtml"] = "true";

        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
        chart.draw(data, options);
      }
    </script>';
 echo'<div id="chart_div" style="width: 900px; height: 500px;"></div>';

//---------------------------------------------------------termina grafica de promedio por rubro por visita
//---------------------------------------------------------comienza divs de graficas
echo'<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(document).ready(function(){

$("a").click(function () {
var divname= this.name;
$("#"+divname).show("slow").siblings().hide("slow");
});

});
</script> 

<br><br>
<div class="menu">
<p align="center"><b>Graf&iacute;ca de par&aacute;metros</b></p>
<ul class="mytabs">
<li class="mytabs"><a href="#graficacomite" name="div1" class="mytabs">Comit&eacute;</a></li>
<li class="mytabs"><a href="#graficainstalaciones" name="div2" class="mytabs">Instalaciones</a></li>
<li class="mytabs"><a href="#graficaingresos" name="div3" class="mytabs">Ingresos</a></li>
<li class="mytabs"><a href="#graficaeventos" name="div4" class="mytabs">Eventos</a></li>
<li class="mytabs"><a href="#graficaareasverdes" name="div5" class="mytabs">&Aacute;reas verdes</a></li>
<li class="mytabs"><a href="#graficafluencia" name="div6" class="mytabs">Afluencia</a></li>
<li class="mytabs"><a href="#graficaorden" name="div7" class="mytabs">Orden</a></li>
</ul class="mytabs">
</div>

<div>

<div id="div1" style="display:none"><a name="graficacomite">&nbsp;</a>';
//----------------------------------------------------------------------------comienza
echo'<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Visita", "Comit\u00E9"],';

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
		$d=$c+1;
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
$puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
echo'['.$d.', '.$puna.']';
if($d<$total_reg){
	echo',';
}else{
	echo']);';
}
       
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo'var options = {
          title: "Calificaci\u00F3n Parque",
          hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
        };
	options["allowHtml"] = "true";

        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div1"));
        chart.draw(data, options);
      }
    </script>';
 echo'<div id="chart_div1" style="width: 900px; height: 500px;"></div>';

//----------------------------------------------------------------------------termina


echo'</div>
<div id="div2" style="display:none"><a name="graficainstalaciones">&nbsp;</a>';
//----------------------------------------------------------------------------comienza
echo'<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Visita",  "Instalaciones"],';

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
		$d=$c+1;
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
$puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
echo'['.$d.', '.$punb.']';
if($d<$total_reg){
	echo',';
}else{
	echo']);';
}
       
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo'var options = {
          title: "Calificaci\u00F3n Parque",
          hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
        };
	options["allowHtml"] = "true";

        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div2"));
        chart.draw(data, options);
      }
    </script>';
 echo'<div id="chart_div2" style="width: 900px; height: 500px;"></div>';

//----------------------------------------------------------------------------termina
echo'</div><div id="div3" style="display:none"><a name="graficaingresos">&nbsp;</a>';
//----------------------------------------------------------------------------comienza
echo'<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Visita", "Ingresos"],';

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
		$d=$c+1;
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
 $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
echo'['.$d.', '.$punc.']';
if($d<$total_reg){
	echo',';
}else{
	echo']);';
}
       
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo'var options = {
          title: "Calificaci\u00F3n Parque",
          hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
        };
	options["allowHtml"] = "true";

        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div3"));
        chart.draw(data, options);
      }
    </script>';
 echo'<div id="chart_div3" style="width: 900px; height: 500px;"></div>';

//----------------------------------------------------------------------------termina
echo'</div><div id="div4" style="display:none"><a name="graficaeventos">&nbsp;</a>';
//----------------------------------------------------------------------------comienza
echo'<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Visita" ,"Eventos"],';

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
		$d=$c+1;
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
 $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
echo'['.$d.','.$pund.']';
if($d<$total_reg){
	echo',';
}else{
	echo']);';
}
       
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo'var options = {
          title: "Calificaci\u00F3n Parque",
          hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
        };
	options["allowHtml"] = "true";

        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div4"));
        chart.draw(data, options);
      }
    </script>';
 echo'<div id="chart_div4" style="width: 900px; height: 500px;"></div>';

//----------------------------------------------------------------------------termina
echo'</div><div id="div5" style="display:none"><a name="graficaareasverdes">&nbsp;</a>';
//----------------------------------------------------------------------------comienza
echo'<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Visita", "\u00C1reas verdes"],';

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
		$d=$c+1;
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
 $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
echo'['.$d.', '.$pune.']';
if($d<$total_reg){
	echo',';
}else{
	echo']);';
}
       
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo'var options = {
          title: "Calificaci\u00F3n Parque",
          hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
        };
	options["allowHtml"] = "true";

        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div5"));
        chart.draw(data, options);
      }
    </script>';
 echo'<div id="chart_div5" style="width: 900px; height: 500px;"></div>';

//----------------------------------------------------------------------------termina
echo'</div><div id="div6" style="display:none"><a name="grafiafluencia">&nbsp;</a>';
//----------------------------------------------------------------------------comienza
echo'<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Visita", "Afluencia"],';

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
		$d=$c+1;
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
 $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
echo'['.$d.', '.$punf.']';
if($d<$total_reg){
	echo',';
}else{
	echo']);';
}
       
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo'var options = {
          title: "Calificaci\u00F3n Parque",
          hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
        };
	options["allowHtml"] = "true";

        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div6"));
        chart.draw(data, options);
      }
    </script>';
 echo'<div id="chart_div6" style="width: 900px; height: 500px;"></div>';

//----------------------------------------------------------------------------termina
echo'</div><div id="div7" style="display:none"><a name="graficaorden">&nbsp;</a>';
//----------------------------------------------------------------------------comienza
echo'<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Visita", "Orden"],';

$sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

$c=0;
$res=mysql_query($sql);
$total_reg=mysql_num_rows($res);
while($row=mysql_fetch_array($res)){
		$d=$c+1;
		$parque_visita= $row['cve'];
		
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
 $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
		$punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop']+$rowa1['mancomunado'];
		$pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
		$pune=$pune+$rowa1['averdes']+$rowa1['estaver'];
                //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
		$punf=$punf+$rowa1['gente']+$rowa1['diario'];
		$pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
              $promea=round($proma);
        }
//--------------termina calculo de promedio
echo'['.$d.', '.$pung.']';
if($d<$total_reg){
	echo',';
}else{
	echo']);';
}
       
		$c++;


}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo'var options = {
          title: "Calificaci\u00F3n Parque",
          hAxis: {title: "Visitas", titleTextStyle: {color: "red"}}
        };
	options["allowHtml"] = "true";

        var chart = new google.visualization.ColumnChart(document.getElementById("chart_div7"));
        chart.draw(data, options);
      }
    </script>';
 echo'<div id="chart_div7" style="width: 900px; height: 500px;"></div>';

//----------------------------------------------------------------------------termina
echo'</div>



</div>';
//---------------------------------------------------------termina divs de graficas

		if($prome==0){
		echo'<a href="http://parquesalegres.org/agendar-visita/">Agenda Visita</a>';
		}	
echo'
<br><br><br>
<input style="float:right;" type="button" value="Cerrar" onClick="window.close()">
';
}

function detalleparques_uno()
{
add_submenu_page( 'tools.php', __( "Arturo GC", "arturo" ), __( "Arturo GC", "arturo" ), 'export', 'arturo', 'detalleparques_dos' );
}

add_action('admin_menu', 'detalleparques_uno');
add_shortcode('detalleparques', 'detalleparques_dos');
add_shortcode('detalleparques3', 'detalleparques_tres');

?>