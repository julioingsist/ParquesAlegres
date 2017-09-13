<?
echo'<html><head><title>Parques Alegres</title>
<script src="http://jquery.com/src/jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
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
#content_2, #content_3, #content_4, #content_5, #content_6, #content_7, #content_8 { display:none; }

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
	</style>';
     echo' <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="commenttooltip/js/excanvas/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="commenttooltip/js/spinners/spinners.min.js"></script> <!-- optional -->
<script type="text/javascript" src="commenttooltip/js/tipped/tipped.js"></script>

<link rel="stylesheet" type="text/css" href="commenttooltip/css/tipped/tipped.css" />
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
echo'</head><body>';
require_once("cnx_db.php");
$db='parquesa_wrdp1';
//$db->query("SET NAMES 'utf8'");
echo'';
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
        $b = html_entity_decode($row["maps"]);
	echo '
		<tr><td align="center" colspan=2 rowspan="17">'.$b.'</td></tr>';
		$bar = $row['nom'];
		$bar = ucwords($bar);             // HELLO WORLD!
		$bar = ucwords(strtolower($bar)); // Hello World!
		echo'<tr><th bgcolor="#cede53" >Nombre de parque</th><td align="center">'.$bar.'</td></tr>
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
		}echo'</td></tr>';
		echo'<tr><th bgcolor="#cede53" >Experiencia exitosa</th><td align="center">';
		if($row['cve_exp']>0){
		echo'<a href="http://parquesalegres.org/?p='.$row['cve_exp'].'">Ver experiencia exitosa</a>';
		}echo'</td></tr>';
		echo'<tr><th bgcolor="#cede53" >Definici&oacute;n de parametros</th><td align="center"><a href="http://www.parquesalegres.org/propuesta" target="_blank">Ver definici&oacute;n de parametros</a></td></tr>
		<tr><th bgcolor="#cede53" >Historial de Par&aacutemetros</th><td align="center"><a href="#" class="show_hide">Ver Historial</a></td></tr>
		<tr><th bgcolor="#cede53" >Historial de Parque</th><td align="center">Ver Historial</td></tr>';
		$nombre_fichero = 'planos/'.$row['cvepar'].'.jpg';
		//echo$nombre_fichero;
		if (file_exists($nombre_fichero)) {
		echo'<tr><th bgcolor="#cede53" >Plano</th><td align="center"><a href="planos/'.$row['cvepar'].'.jpg" target="_blank">Ver PLANO</a></td></tr>';
		}else{
		echo'<tr><th bgcolor="#cede53" >Plano</th><td align="center">Sin plano</td></tr>';
		}
		$nombre_fichero1 = 'proyectos/'.$row['cvepar'].'.pdf';
		//echo$nombre_fichero;
		if (file_exists($nombre_fichero1)) {
		echo'<tr><th bgcolor="#cede53" >Invertido de SEDESOL</th><td align="center"><a href="proyectos/'.$row['cvepar'].'.pdf" target="_blank">Ver PROYECTO</a></td></tr>';
		}else{
		echo'<tr><th bgcolor="#cede53" >Invertido de SEDESOL</th><td align="center">Sin proyecto</td></tr>';
		}
		//echo'
		
		
		
		
		echo'</table>';
                $sql2="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
		$sql22="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
                $res22=mysql_db_query("$db",$sql22);
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
               $resa=mysql_db_query("$db",$sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC";
        $resa1=mysql_db_query("$db",$sqla1);
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
        //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
        //$prome22=round($prom22);
        ?>
        <!---<span class='tooltip-from-element' data-tooltip-id="tooltip-example-1">Tooltip from element 1</span> 
<div id='tooltip-example-1' style='display:none'>This element is moved into the tooltip</div>

<span class='tooltip-from-element' data-tooltip-id="tooltip-example-2">Tooltip from element 2</span> 
<div id='tooltip-example-2' style='display:none'>Another tooltip created with the same code</div>--->

<!---<script type="text/javascript">
  jQuery(document).ready(function($) {
    // loop over all elements creating a tooltip based on their data-tooltip-id attribute
    $('.tooltip-from-element').each(function() {
      var selector = '#' + $(this).data('tooltip-id');
      Tipped.create(this, $(selector)[0],
                    
                     {
  skin: 'light'});
    });
  });
</script>--->
<script type="text/javascript">
  jQuery(document).ready(function() {
    Tipped.create('.create-tooltip',
                  {
  skin: 'light',
  maxWidth: 200});
    });
</script>

<?
		echo'<div class="slidingDiv"><b>Historial del Parque</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Promedio del parque: <b>'.$promea.'</b><br><br>';
		echo'<div id="tabbed_box_1" class="tabbed_box">
    <div class="tabbed_area">';
echo'<ul class="tabs"> 
<li><a href="#" onclick="return false;" title="content_1" class="tab">Comit&eacute; </a></li> 
<li><a href="#" onclick="return false;" title="content_2" class="tab">Instalaciones </a></li> 
<li><a href="#" onclick="return false;" title="content_3" class="tab">Ingresos </a></li> 
<li><a href="#" onclick="return false;" title="content_4" class="tab">Eventos </a></li> 
<li><a href="#" onclick="return false;" title="content_5" class="tab">&Aacute;reas verdes </a></li> 
<li><a href="#" onclick="return false;" title="content_6" class="tab">Afluencia </a></li> 
<li><a href="#" onclick="return false;" title="content_7" class="tab">Orden </a></li> 
<li><a href="#" onclick="return false;" title="content_8" class="tab active">General</a></li> 
</ul>';
echo'<div id="content_1" class="content">';
$tipos_visita = array("---Selecciona Tipo---","Visita de reforzamiento","Visita de seguimiento","Visita de evento");
	echo'
		<table><tr>
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">OPERA CON 3 PERSONAS O MAS</th>';
	$res2=mysql_db_query("$db",$sql2);
        $uno=0;
        $dos=0;
	 while($row2=mysql_fetch_array($res2)){
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
               
	 while($row2=mysql_fetch_array($res2)){
             $pun=0;
            $pun=$pun+$row2['opera']+$row2['formaliza']+$row2['organiza']+$row2['reunion']+$row2['proyecto'];
	echo'<td align="center">'.$pun.'</td>';
	 }
		echo'</tr></table>';
echo'</div>';

echo'<div id="content_2" class="content">';

echo'<table><tr>';
		echo'<th bgcolor="#cede53">VISITA</th>';
			$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
		
         echo'<tr><th bgcolor="#cede53">CUENTA CON PROYECTO DE DISE&Ntilde;O</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun2=0;
            $pun2=$pun2+$row2['instalaciones']+$row2['estado']+$row2['disenio']+$row2['ejecutivo'];
	echo' <td align="center">'.$pun2.'</td>';
	 }
		echo'</tr>';
		echo'</table>';

echo'</div>';

echo'<div id="content_3" class="content">';

echo'<table><tr>
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">TIENEN FUENTES DE INGRESOS PERMANENTES</th>';
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53">ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun3=0;
            $pun3=$pun3+$row2['ingresop']+$row2['ingresadop']+$row2['mancomunado'];
	echo'<td align="center">'.$pun3.'</td>';
	 }echo'</tr>';
	echo'	</table>';

echo'</div>';
echo'<div id="content_4" class="content">';

echo'<table><tr>
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	echo'	<tr><th bgcolor="#cede53">HAY EVENTOS CON REGULARIDAD</th>';
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53"> CUENTAN CON UN CALENDARIO ANUAL DE ACTIVIDADES</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
         echo'</tr>';
	
		echo'<tr><th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun4=0;
            $pun4=$pun4+$row2['eventos']+$row2['eventosr'];
	echo'<td align="center">'.$pun4.'</td>';
	 }echo'</tr>';
		echo'</table>';

echo'</div>';

echo'<div id="content_5" class="content">';

echo'<table><tr>
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
		echo'<tr><th bgcolor="#cede53">CUENTA CON ARBOLES, CESPED Y JARDIN</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
         echo'</tr>';
		echo'<tr><th bgcolor="#cede53">SE ENCUENTRA EN BUEN ESTADO</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
	//	$res2=mysql_db_query("$db",$sql2);
	// while($row2=mysql_fetch_array($res2)){
	//echo'<td align="center">'.$row2['riego'].'</td>';
	// }echo'</tr>';
		echo'<tr><th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun5=0;
            $pun5=$pun5+$row2['averdes']+$row2['estaver'];
            //$pun5=$pun5+$row2['averdes']+$row2['estaver']+$row2['riego'];
	echo'<td align="center">'.$pun5.'</td>';
	 }echo'</tr>';
		echo'</table>';

echo'</div>';

echo'<div id="content_6" class="content">';
echo'<table><tr>
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">PORCENTAJE DE AFLUENCIA SOBRE LO EXISTENTE</th>';
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
         echo'</tr>';
	echo'	<tr><th bgcolor="#cede53">PORCENTAJE DE AFLUENCIA CONTRA LO POSIBLE </th>';
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
        //-------------------------aqui
           $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
         echo'</tr>';
		echo'<th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun6=0;
            $pun6=$pun6+$row2['gente']+$row2['diario'];
	echo'<td align="center">'.$pun6.'</td>';
	 }echo'</tr>';
		echo'</table>';
echo'</div>';

echo'<div id="content_7" class="content">';
echo'<table> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	echo'<tr><th bgcolor="#cede53">LAS INSTALACIONES SE RESPETAN</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
             $pun7=0;
            $pun7=$pun7+$row2['limpieza']+$row2['orden']+$row2['respint'];
	echo'<td align="center">'.$pun7.'</td>';
	 }echo'</tr>';
		echo'</tr>
		';
		echo'</table>';

echo'</div>';

echo'<div id="content_8" class="content">';
//----------------empieza

echo'';

	echo'
		<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2">Comit&eacute;</th></tr> 
<tr>
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">OPERA CON 3 PERSONAS O MAS</th>';
	$res2=mysql_db_query("$db",$sql2);
	$uno=0;
        $dos=0;
         while($row2=mysql_fetch_array($res2)){
	
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
             $pun=0;
            $pun=$pun+$row2['opera']+$row2['formaliza']+$row2['organiza']+$row2['reunion']+$row2['proyecto'];
	echo'<td align="center">'.$pun.'</td>';
	 }
		echo'</tr></table>';

echo'<br>';

echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2">Instalaciones </th></tr> ';
		echo'<th bgcolor="#cede53">VISITA</th>';
			$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
        echo'<tr><th bgcolor="#cede53">CUENTA CON PROYECTO DE DISE„O</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
        if($row3['odisenio']){
           echo' <div class="create-tooltip" title="'.$row3['disenio'].'" ><font '.$color.'>'.$row2['disenio'].'</font></div>';
        }else{
           echo$row2['disenio']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr>';
         echo'<tr><th bgcolor="#cede53">CUENTA CON PROYECTO EJECUTIVO</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
             $pun2=0;
            $pun2=$pun2+$row2['instalaciones']+$row2['estado']+$row2['disenio']+$row2['ejecutivo'];
	echo' <td align="center">'.$pun2.'</td>';
	 }
		echo'</tr>';
		echo'</table>';

echo'';

echo'<br>';

echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2">Ingresos </th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">TIENEN FUENTES DE INGRESOS PERMANENTES</th>';
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
             $pun3=0;
            $pun3=$pun3+$row2['ingresop']+$row2['ingresadop']+$row2['mancomunado'];
	echo'<td align="center">'.$pun3.'</td>';
	 }echo'</tr>';
	echo'	</table>';

echo'';
echo'<br>';

echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2">Eventos </th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	echo'	<tr><th bgcolor="#cede53">HAY EVENTOS CON REGULARIDAD</th>';
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
        if($row3['oeventosr']){
           echo' <div class="create-tooltip" title="'.$row3['eventosr'].'" ><font '.$color.'>'.$row2['eventosr'].'</font></div>';
        }else{
           echo$row2['eventosr']; 
        }
        echo'</td>';
        //-------------------------aqui
	 }
         echo'</tr><tr>';
		echo'<th bgcolor="#cede53"> CUENTAN CON UN CALENDARIO ANUAL DE ACTIVIDADES</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun4=0;
            $pun4=$pun4+$row2['eventos']+$row2['eventosr'];
	echo'<td align="center">'.$pun4.'</td>';
	 }echo'</tr>';
		echo'</table>';

echo'';

echo'<br>';

echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2">&Aacute;reas verdes </th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
		echo'<tr><th bgcolor="#cede53">CUENTA CON ARBOLES, CESPED Y JARDIN</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
	//	$res2=mysql_db_query("$db",$sql2);
	// while($row2=mysql_fetch_array($res2)){
	//echo'<td align="center">'.$row2['riego'].'</td>';
	// }echo'</tr>';
		echo'<tr><th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun5=0;
            //$pun5=$pun5+$row2['averdes']+$row2['estaver']+$row2['riego'];
            $pun5=$pun5+$row2['averdes']+$row2['estaver'];
	echo'<td align="center">'.$pun5.'</td>';
	 }echo'</tr>';
		echo'</table>';

echo'';

echo'<br>';
echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2">Afluencia </th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	
	echo'	<tr><th bgcolor="#cede53">PORCENTAJE DE AFLUENCIA SOBRE LO EXISTENTE</th>';
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
	//	echo'<th bgcolor="#cede53">( + ) ENTRE SEMANA</th>';
	//	$res2=mysql_db_query("$db",$sql2);
	// while($row2=mysql_fetch_array($res2)){
	//echo'<td align="center">'.$row2['semana'].'</td>';
	// }echo'</tr>';
	//	echo'<th bgcolor="#cede53">( + ) FIN DE SEMANA</th>';
	//	$res2=mysql_db_query("$db",$sql2);
	// while($row2=mysql_fetch_array($res2)){
	//echo'<td align="center">'.$row2['finsem'].'</td>';
	// }echo'</tr>';
		echo'<th bgcolor="#cede53">PUNTOS</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
            $pun6=0;
            $pun6=$pun6+$row2['gente']+$row2['diario'];
	echo'<td align="center">'.$pun6.'</td>';
	 }echo'</tr>';
		echo'</table>';
echo'';

echo'<br>';
echo'<table width="50%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;"><tr><th colspan="2">Orden </th></tr> 
		<th bgcolor="#cede53">VISITA</th>';
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	echo'<tr><th bgcolor="#cede53">LAS INSTALACIONES SE RESPETAN</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
	$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
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
		$res2=mysql_db_query("$db",$sql2);
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
		$res2=mysql_db_query("$db",$sql2);
	 $c=0;
	 while($row2=mysql_fetch_array($res2)){
$c++;
$visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
echo'<td align="center"><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
	}echo'</tr>';
	echo'<tr><th bgcolor="#cede53">Comentarios</th>';
		$res2=mysql_db_query("$db",$sql2);
	 while($row2=mysql_fetch_array($res2)){
	 $visita=$row2['cve'];
              $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
              $res3=mysql_db_query("$db",$sql3);
              $row3=mysql_fetch_array($res3);
	echo' <td align="center">';
        //-------------------------------------------------------------------------------para los colores
       /* if($uno>$row2['respint']){
            $color='style="color:#FF0000;"';
        }
        elseif(($dos!=0) && ($uno<$row2['respint'])){
            $color='style="color:#00611C;"';
        }
        $uno=$row2['respint'];
        $dos++;  */      
        //---------------------------------------
    if($row3['genvisita']){
        echo$row3['genvisita'];
    }else{
        echo'Sin comentarios';
    }
        /*if($row3['respint']){
           echo' <div class="create-tooltip" title="'.$row3['respint'].'" ><font '.$color.'>'.$row2['respint'].'</font></div>';
        }else{
           echo$row2['respint']; 
        }
        echo'</td>';*/
        //-------------------------aqui
	 }
         echo'</tr>';
         
		echo'</table>';



//----------------termina
//echo'<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style="border-collapse:collapse;">
//		<tr><th bgcolor="#cede53" align="center">No. visita</th><th colspan="6"  bgcolor="#cede53" align="center">Comit&eacute; </th><th colspan="3"  bgcolor="#cede53" align="center">Instalaciones </th><th colspan="3"  bgcolor="#cede53" align="center">Ingresos </th><th colspan="3"  bgcolor="#cede53" align="center">Eventos </th><th colspan="4"  bgcolor="#cede53" align="center">&Aacute;reas verdes </th><th colspan="5"  bgcolor="#cede53" align="center">Afluencia </th><th colspan="4"  bgcolor="#cede53" align="center">Orden </th><th  bgcolor="#cede53" align="center" rowspan="2">Promedio del parque</th></tr>
//		<tr>
//		<th>&nbsp;</th>
//		<th>OPERA CON 3 PERSONAS O MAS</th>
//		<th>ESTA FORMALIZADO COMO A.C. / IAP/ OFICIO AYUNTAMIENTO</th>
//		<th>CUENTA CON BUENA ORGANIZACIÓN (CON ORDEN - FORMALIDAD)</th>
//		<th>EXISTEN REUNIONES CON REGULARIDAD</th>
//		<th>TIENEN PROYECTOS EN PROCESO</th>
//		<th>PUNTOS</th>
//		<th>HAY INSTALACIONES EN LA MAYORIA DEL ESPACIO,CANCHAS, AREAS VERDES,BANQUETAS,ETC)</th>
//		<th>ESTAN EN BUEN ESTADO LO QUE EXISTE</th>
//		<th>PUNTOS</th>
//		<th>TIENEN FUENTES DE INGRESOS PERMANENTES</th>
//		<th>ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</th>
//		<th>PUNTOS</th>
//		<th> LLEVAN A CABO EVENTOS CON UN CALENDARIO ANUAL</th>
//		<th>HAY EVENTOS CON REGULARIDAD</th>
//		<th>PUNTOS</th>
//		<th>HAY JARDINES, PASTOS, ARBOLES, ETC</th>
//		<th>ESTAN EN BUEN ESTADO</th>
//		<th>TIENEN RIEGO CONSTANTE</th>
//		<th>PUNTOS</th>
//		<th>VA SUFICIENTE GENTE</th>
//		<th>DIARIO </th>
//		<th>( + ) ENTRE SEMANA</th>
//		<th>( + ) FIN DE SEMANA</th>
//		<th>PUNTOS</th>
//		<th>SE MANTIENE LIMPIO</th>
//		<th>OPERA CON ORDEN</th>
//		<th>LAS INSTALACIONES SE RESPETAN</th>
//		<th>PUNTOS</th>
//		</tr>';
//		
//		$sql2="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
//		
//	$res2=mysql_db_query("$db",$sql2);
//	 $c=0;
//	 while($row2=mysql_fetch_array($res2)){
//$c++;
//		$pungen=$row2['opera']+$row2['formaliza']+$row2['organiza']+$row2['reunion']+$row2['proyecto'];
//		$pun2gen=$row2['instalaciones']+$row2['estado'];
//		$pun3gen=$row2['ingresop']+$row2['ingresadop'];
//		$pun4gen=$row2['eventos']+$row2['eventosr'];
//		$pun5gen=$row2['averdes']+$row2['estaver']+$row2['riego'];
//		$pun6gen=$row2['gente']+$row2['diario'];
//		$pun7gen=$row2['limpieza']+$row2['orden']+$row2['respint'];
//		$promgen=($pungen+$pun2gen+$pun3gen+$pun4gen+$pun5gen+$pun6gen+$pun7gen)/7;
//		$promegen=round($promgen);
//	echo'
//		<tr>
//		<td align="center">'.$c.'</td>
//		<td align="center">'.$row2['opera'].'</td>
//		<td align="center">'.$row2['formaliza'].'</td>
//		<td align="center">'.$row2['organiza'].'</td>
//		<td align="center">'.$row2['reunion'].'</td>
//		<td align="center">'.$row2['proyecto'].'</td>
//		<td align="center">'.$pungen.'</td>
//		<td align="center">'.$row2['instalaciones'].'</td>
//		<td align="center">'.$row2['estado'].'</td>
//		<td align="center">'.$pun2gen.'</td>
//		<td align="center">'.$row2['ingresop'].'</td>
//		<td align="center">'.$row2['ingresadop'].'</td>
//		<td align="center">'.$pun3gen.'</td>
//		<td align="center">'.$row2['eventos'].'</td>
//		<td align="center">'.$row2['eventosr'].'</td>
//		<td align="center">'.$pun4gen.'</td>
//		<td align="center">'.$row2['averdes'].'</td>
//		<td align="center">'.$row2['estaver'].'</td>
//		<td align="center">'.$row2['riego'].'</td>
//		<td align="center">'.$pun5gen.'</td>
//		<td align="center">'.$row2['gente'].'</td>
//		<td align="center">'.$row2['diario'].'</td>
//		<td align="center">'.$row2['semana'].'</td>
//		<td align="center">'.$row2['finsem'].'</td>
//		<td align="center">'.$pun6gen.'</td>
//		<td align="center">'.$row2['limpieza'].'</td>
//		<td align="center">'.$row2['orden'].'</td>
//		<td align="center">'.$row2['respint'].'</td>
//		<td align="center">'.$pun7gen.'</td>
//		<td align="center">'.$promegen.'</td>
//		</tr>
//		';
//		}
//		echo'</table>';
echo'</div></div>';
echo'</div></div>';

		if($prome==0){
		echo'<a href="http://parquesalegres.org/agendar-visita/">Agenda Visita</a>';
		}	
echo'
<br><br><br>
<input style="float:right;" type="button" value="Cerrar" onClick="window.close()">
</body>
';

?>