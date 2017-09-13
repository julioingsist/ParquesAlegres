<?php
/*
Template Name: Detalle de Parques
*/
?>

<?php get_header(); ?>

  <div class="main" role="main">
    <div class="top improve"></div>
    <div id="content" class="container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header class="article-header">
      <h1 class="title-section"><span><?php the_title(); ?>qqqqqq</span></h1>
    </header> <!-- end article header -->


    <?php $parque=$_GET['parque'];?>
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

    <section id="voluntariado" class="volunteering">
      <div class="section section--box">
        <table border="0"  style="margin-left:-10px;">
          <?php
          $sql="SELECT * , wp_arturo_parque.cve AS cvepar, wp_arturo_parque.estado AS est FROM  `wp_arturo_parque` LEFT JOIN wp_comites_parques ON wp_arturo_parque.cve = wp_comites_parques.cve_parque WHERE wp_arturo_parque.cve=$parque ";

          $res=mysql_query($sql);
          $row=mysql_fetch_array($res);
          $b = html_entity_decode($row["maps"]);
	  //$bar = utf8_encode($row['nom']);
          $bar = $row['nom'];
          $bar = ucwords($bar);             // HELLO WORLD!
          $bar = ucwords(strtolower($bar)); // Hello World!

          echo '
          <tr><th>1Nombre de parque:</th><th align="center"> '.$bar.'</th></tr>
          <tr><th>Ubicaci&oacute;n</th><td>'.$row['ubic'].'</td></tr>
          <tr><th>Colonia</th><td>'.$row['col'].'</td></tr>
          <tr><th>Superficie</th><td>'.$row['sup'].'</td></tr>
          <tr><td style="padding:0;" align="center" colspan=2 >'.$b.'</td></tr>
          <tr><th>Sector</th><td>'.$row['sec'].'</td></tr>
          <tr><th>Tipo</th><td>'.$row['tipo'].'</td></tr>
          <tr><th>Contacto de comit&eacute;</th><td>'.$row['cont'].'</td></tr>
          <tr><th>Ciudad</th><td>'.$row['ciudad'].'</td></tr>
          <tr><th>Estado</th><td>'.$row['est'].'</td></tr>
          ';

          if($row['cve_wp']>0){
          echo'
          <tr><th >Fotos del parque</th><td><a href="/?p='.$row['cve_wp'].'">ver fotos</a></td></tr>'
          ;
          }

          if($row['cve_exp']>0){
          echo'<tr><th>Experiencia exitosa</th><td>';
          echo'<a href="/?post_type=success_case&p='.$row['cve_exp'].'">Ver experiencia exitosa</a>';
          echo'</td></tr>';
          }
          echo'<tr><th>Definici&oacute;n de parametros</th><td><a href="/propuesta" target="_blank">Ver definici&oacute;n de parametros</a></td></tr>';
          $nombre_fichero = 'planos/'.$row['cvepar'].'.jpg';
          if (file_exists($nombre_fichero)) {
          echo'<tr><th  >Plano</th><td><a href="/planos/'.$row['cvepar'].'.jpg" target="_blank">Ver PLANO</a></td></tr>';
          }else{
          }
          $nombre_fichero1 = 'proyectos/'.$row['cvepar'].'.pdf';
          if (file_exists($nombre_fichero1)) {
          echo'<tr><th  >Invertido de SEDESOL</th><td><a href="/proyectos/'.$row['cvepar'].'.pdf" target="_blank">Ver PROYECTO</a></td></tr>';
          }else{
          }

          echo'</table>';
          //tipo_visita=2
         //consulta de visitas de seguimiento---->
         echo'<div class="chart-search">
    <!-- Búsqueda -->
    <form name="forma" action="" method="post">
    <ul class="form-fields">
      <li>
        <label>Selecciona el tipo de visita </label>
        <select name="fil">';
	echo '<option value="">---Todos los tipos de visita---';
	//echo '<option value="1">Visita de reforzamiento</option>';
	echo '<option value="2">Visita de seguimiento</option>';
        //echo '<option value="3">Visita de evento</option>';
        //echo '<option value="4">Visita de prospecto</option>';
	echo '</select>
      </li>
      <li><input class="btn" type="submit" value="Mostrar"></li>
    </ul>
     </form>
</div>';
         
$filtro='1';
//echo$_POST['fil'];
if ($_POST['fil']!='') {
  $filtro.=" and b.tipo_visita='".$_POST['fil']."' ";
//echo$filtro;
$sql2="SELECT a . * , b.tipo_visita FROM  `wp_comites_parques` AS a, wp_visitascom_parques AS b where $filtro and a.cve_parque =$parque and b.cve_parque = a.cve_parque AND a.cve=b.cve_visita ORDER BY  `a`.`cve` ASC";
}else{
$sql2="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
  }
                      //echo$sql2;
          $sql22="SELECT * FROM `wp_comites_parques` WHERE cve_parque=$parque order by cve asc";
                      $res22=mysql_query($sql22);
          while($row22=mysql_fetch_array($res22)){
            $pun22=0;
            $pun222=0;
            $pun322=0;
            $pun422=0;
            $pun522=0;
            $pun622=0;
            $pun722=0;
            $pun22=$pun22+$row22['opera']+$row22['formaliza']+$row22['organiza']+$row22['reunion']+$row22['proyecto'];
            $pun222=$pun222+$row22['instalaciones']+$row22['estado']+$row22['disenio']+$row22['ejecutivo'];
            $pun322=$pun322+$row22['ingresop']+$row22['ingresadop']+$row22['mancomunado'];
            $pun422=$pun422+$row22['eventos']+$row22['eventosr'];
            if(($row22['averdes']>=34) && ($row22['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$row22['averdes'];
		}
            $pun522=$pun522+$averdes+$row22['estaver'];
            $pun622=$pun622+$row22['gente'];
            //+$row22['diario']
            $pun722=$pun722+$row22['limpieza']+$row22['orden']+$row22['respint'];
          }
                  //---------
                   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque";
               $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //--------- sacar el promedio por total de visitas----------------//<----------------aqui me quede
        if($rowa['totalvisitas']<1){
             $promea=0;
        }else{
		
                
//----------------------------------------empieza
                $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $res=mysql_query($sql);

    while($row=mysql_fetch_array($res)){
        $parque_visita= $row['cve'];

       $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque and cve=$parque_visita";
                 $resa=mysql_query($sqla);
         $rowa=mysql_fetch_array($resa);

    $sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve=$parque_visita order by cve";
            $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
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
    $promaa;
    $puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
        $punb=$punb+$rowa1['instalaciones']+$rowa1['estado']+$rowa1['disenio']+$rowa1['ejecutivo'];
        $punc=$punc+$rowa1['ingresop']+$rowa1['ingresadop'];
        $pund=$pund+$rowa1['eventos']+$rowa1['eventosr'];
        if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
        $pune=$pune+$averdes+$rowa1['estaver'];
        $punf=$punf+$rowa1['gente'];
        $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
                 $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
		 $promaa=$promaa+$proma;
		 $promavi=$promaa/$rowa['totalvisitas'];
                  //$prom22=($pun22+$pun222+$pun322+$pun422+$pun522+$pun622+$pun722)/($rowa['totalvisitas']*7);
                  $promea=round($promavi);
            }
    //--------------termina calculo de promedio

         // echo$promea;


    }
//----------------------------------------termina
                
        } ?>
          <script type="text/javascript">
            jQuery(document).ready(function() {
              Tipped.create('.create-tooltip', {
                skin: 'light',
                maxWidth: 200
              });
            });
          </script>

          <?php echo'<b>Historial del Parque</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Promedio del parque1nsjdnsdajkns: <b>'.$promavi.'</b>';
          $sqla11g="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa11g=mysql_query($sqla11g);
		$total_visitas=$rowa['totalvisitas'];
		//while($rowa11=mysql_fetch_array($resa11)){
                $rowa11g=mysql_fetch_array($resa11g);
		
		$punag=0;
$punbg=0;
$puncg=0;
$pundg=0;
$puneg=0;
$punfg=0;
$pungg=0;
$promeaag=0;
$punag=$punag+$rowa11g['opera']+$rowa11g['formaliza']+$rowa11g['organiza']+$rowa11g['reunion']+$rowa11g['proyecto'];
		$punbg=$punbg+$rowa11g['instalaciones']+$rowa11g['estado']+$rowa11g['disenio']+$rowa11g['ejecutivo'];
		$puncg=$puncg+$rowa11g['ingresop']+$rowa11g['ingresadop']+$rowa11g['mancomunado'];
		$pundg=$pundg+$rowa11g['eventos']+$rowa11g['eventosr'];
                if(($rowa11g['averdes']>=34) && ($rowa11g['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa11g['averdes'];
		}
		$puneg=$puneg+$averdes+$rowa11g['estaver'];
		$punfg=$punfg+$rowa11g['gente'];
                //+$rowa11['diario']
		$pungg=$pungg+$rowa11g['limpieza']+$rowa11g['orden']+$rowa11g['respint'];
             $promag=($punag+$punbg+$puncg+$pundg+$puneg+$punfg+$pungg)/7;
              //$promeaaa=$proma+$promeaaa;
	       // $promeaa=$promeaaa/$rowa['totalvisitas'];
	      //$promea=round($promeaa);
              $promeag=round($promag);
echo'<script type="text/javascript" src="//www.google.com/jsapi"></script>
		<script type="text/javascript">
      google.load("visualization", "1", {packages:["gauge"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Label", "Value"],
          ["Promedio", '.$promeag.']
        ]);

        var options = {
          width: 300, height: 150,
          redFrom: 0, redTo: 59,
          yellowFrom:60, yellowTo: 80,
	  greenFrom:81, greenTo: 100,
          minorTicks: 5
        };

        var chartgauge = new google.visualization.Gauge(document.getElementById("chart_div_gauge"));
        chartgauge.draw(data, options);
      }
    </script>
    <div id="chart_div_gauge" style="width: 300px; height: 150px;"></div>';
 ?>

        <span class="icon-box icon-box--info">&nbsp;</span>
      </div>
    </section>
    <div class="tabs">
      <ul class="matrix seven-cols detalle-tabs">
        <li><label for="seccion1">Comité</label></li>
        <li><label for="seccion2">Instalaciones</label></li>
        <li><label for="seccion3">Ingresos</label></li>
        <li><label for="seccion4">Eventos</label></li>
        <li><label for="seccion5">Áreas verdes</label></li>
        <li><label for="seccion6">Afluencia</label></li>
        <li><label for="seccion7">Orden</label></li>
      </ul>
    </div>

    <?php
    $tipos_visita = array("---Selecciona Tipo---","Visita de reforzamiento","Visita de seguimiento","Visita de evento","Visita de prospecto");
//tipo_visita=2
    // EMPIEZA TABLA DE COMITE
    echo'<div class="tabs-content">';
    echo'<div class="tab-content"><input id="seccion1" type="radio" name="tab-group-2" checked />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion1">Comit&eacute;</a></th></tr><tr><td>VISITA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
      $c++;
      $visita=$row2['cve'];
      $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
      $res3=mysql_query($sql3);
      $row3=mysql_fetch_array($res3);
        if($row3['tipo_visita']){
          echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
        }else{
          echo'<td>'.$c.'</td>';
        }
    }
    echo'</tr>';
//tipo=2
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';

    echo' <tr><td>OPERA CON 3 PERSONAS O MAS</td>';
    $res2=mysql_query($sql2);
    $uno=0;
    $dos=0;
    while($row2=mysql_fetch_array($res2)){
      $visita=$row2['cve'];
      $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
      $res3=mysql_query($sql3);
      $row3=mysql_fetch_array($res3);
      echo' <td>';
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
      echo' <tr><td>ESTA FORMALIZADO COMO A.C. / OFICIO AYUNTAMIENTO</td>';
      $res2=mysql_query($sql2);
      while($row2=mysql_fetch_array($res2)){
      $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<tr><td>CUENTA CON BUENA ORGANIZACION (CON ORDEN - FORMALIDAD)</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<tr><td>EXISTEN REUNIONES CON REGULARIDAD</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<tr><td>TIENEN PROYECTOS EN PROCESO</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<tr><td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                 $pun=0;
                $pun=$pun+$row2['opera']+$row2['formaliza']+$row2['organiza']+$row2['reunion']+$row2['proyecto'];
      echo'<td>'.$pun.'</td>';
       }
        echo'</tr></table>';
    echo'</div>';

    // TERMINA TABLA DE COMITE
    // EMPIEZA TABLA INSTALACIONES

    echo'<div class="tab-content"><input id="seccion2" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion2">Instalaciones </a></th></tr> ';
        echo'<td>VISITA</td>';
          $res2=mysql_query($sql2);
       $c=0;
       while($row2=mysql_fetch_array($res2)){
    $c++;
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
            echo'<tr><td>CUENTA CON PROYECTO DE DISE&Ntilde;O</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
             echo'<tr><td>CUENTA CON PROYECTO EJECUTIVO</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
             echo'<tr><td>ESTAN EN BUEN ESTADO LO QUE EXISTE</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<tr><td>HAY INSTALACIONES EN LA MAYORIA DEL ESPACIO,CANCHAS, ANDADOR, BANQUETAS,ETC</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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

        echo'<tr><td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                 $pun2=0;
                $pun2=$pun2+$row2['instalaciones']+$row2['estado']+$row2['disenio']+$row2['ejecutivo'];
      echo' <td>'.$pun2.'</td>';
       }
        echo'</tr>';
        echo'</table>';



    echo'</div>';

    // TERMINA TABLA DE INSTALACIONES
    // EMPIEZA TABLA INGRESOS

    echo'<div class="tab-content"><input id="seccion3" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion3">Ingresos</a> </th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=0;
       while($row2=mysql_fetch_array($res2)){
    $c++;
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo' <tr><td>TIENEN FUENTES DE INGRESOS PERMANENTES</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<td>ES SUFICIENTE LO INGRESADO PARA OPERAR BIEN</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
             echo'<tr><td>TIENEN CUENTA MANCOMUNADA</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                 $pun3=0;
                $pun3=$pun3+$row2['ingresop']+$row2['ingresadop']+$row2['mancomunado'];
      echo'<td>'.$pun3.'</td>';
       }echo'</tr>';
      echo' </table>';


    echo'</div>';

    // TERMINA TABLA DE INGRESOS
    // EMPIEZA TABLA EVENTOS

    echo'<div class="tab-content"><input id="seccion4" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion4">Eventos </a></th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=0;
       while($row2=mysql_fetch_array($res2)){
    $c++;
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo' <tr><td>HAY EVENTOS CON REGULARIDAD</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<td> CUENTAN CON UN CALENDARIO ANUAL DE ACTIVIDADES</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
        echo'<td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                $pun4=0;
                $pun4=$pun4+$row2['eventos']+$row2['eventosr'];
      echo'<td>'.$pun4.'</td>';
       }echo'</tr>';
        echo'</table>';



    echo'</div>';

    // TERMINA TABLA DE EVENTOS
    // EMPIEZA TABLA AREAS VERDES

    echo'<div class="tab-content"><input id="seccion5" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion5">&Aacute;reas verdes</a> </th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=0;
       while($row2=mysql_fetch_array($res2)){
    $c++;
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
        echo'<tr><td>CUENTA CON ARBOLES, CESPED Y JARDIN</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
            //-------------------------------------------------------------------------------para los colores
            if(($row2['averdes']>=34) && ($row2['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$row2['averdes'];
		}
            if($uno>$averdes){
                $color='style="color:#FF0000;"';
            }
            elseif(($dos!=0) && ($uno<$averdes)){
                $color='style="color:#00611C;"';
            }
            $uno=$row2['averdes'];
            $dos++;
            //---------------------------------------
            if($row3['averdes']){
               echo' <div class="create-tooltip" title="'.$row3['averdes'].'" ><font '.$color.'>'.$averdes.'</font></div>';
            }else{
               echo$averdes;
            }
            echo'</td>';
            //-------------------------aqui
       }
             echo'</tr><tr>';
        echo'<td>SE ENCUENTRA EN BUEN ESTADO</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
      //  echo'<th>TIENEN RIEGO CONSTANTE</th>';
      //  $res2=mysql_query($sql2);
      // while($row2=mysql_fetch_array($res2)){
      //echo'<td>'.$row2['riego'].'</td>';
      // }echo'</tr>';
        echo'<tr><td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                $pun5=0;
                //$pun5=$pun5+$row2['averdes']+$row2['estaver']+$row2['riego'];
                if(($row2['averdes']>=34) && ($row2['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$row22['averdes'];
		}
                $pun5=$pun5+$averdes+$row2['estaver'];
      echo'<td>'.$pun5.'</td>';
       }echo'</tr>';
        echo'</table>';



    echo'</div>';

    // TERMINA TABLA DE AREAS VERDES
    // EMPIEZA TABLA AFLUENCIA

    echo'<div class="tab-content"><input id="seccion6" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion6">Afluencia </a></th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=0;
       while($row2=mysql_fetch_array($res2)){
    $c++;
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo' <tr><td>PORCENTAJE DE AFLUENCIA SOBRE LO EXISTENTE</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
      /*echo' <td>PORCENTAJE DE AFLUENCIA CONTRA LO POSIBLE </td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
             echo'</tr><tr>';*/
        echo'<td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                $pun6=0;
                $pun6=$pun6+$row2['gente'];
                //+$row2['diario']
      echo'<td>'.$pun6.'</td>';
       }echo'</tr>';
        echo'</table>';


    echo'</div>';

    // TERMINA TABLA DE AFLUENCIA
    // EMPIEZA TABLA DE ORDEN

    echo'<div class="tab-content"><input id="seccion7" type="radio" name="tab-group-2" />';
    echo'<table class="clasetabla1" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2"><a name="seccion7">Orden </a></th></tr>
        <td>VISITA</td>';
        $res2=mysql_query($sql2);
       $c=0;
       while($row2=mysql_fetch_array($res2)){
    $c++;
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
      }echo'</tr>';
echo'<tr><td>FECHA</td>';
    $res2=mysql_query($sql2);
    $c=0;
    while($row2=mysql_fetch_array($res2)){
		if($row2['fecha_visita']=='0000-00-00'){
			echo'<td>&nbsp;</td>';
			}else{
          	echo'<td>'.$row2['fecha_visita'].'</td>';
		}
    }
    echo'</tr>';
      echo'<tr><td>LAS INSTALACIONES SE RESPETAN</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
             echo'<tr><td>SE CUENTA CON REGLAMENTEO DE ORDEN</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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
      echo' <td>SE MANTIENE LIMPIO</td>';
      $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
       $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
      echo' <td>';
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


        echo'<tr><td>PUNTOS</td>';
        $res2=mysql_query($sql2);
       while($row2=mysql_fetch_array($res2)){
                 $pun7=0;
                $pun7=$pun7+$row2['limpieza']+$row2['orden']+$row2['respint'];
      echo'<td>'.$pun7.'</td>';
       }echo'</tr>';
        echo'</tr>
        ';
        echo'</table>';
    echo'</div>';
    // TERMINA TABLA DE ORDEN
    echo'</div>';
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
//----------------------------------------------empieza aqui---------------------------------------------------------
    $sql="select * from `wp_comites_parques` where  cve_parque=$parque order by cve";

    $c=0;
    $res=mysql_query($sql);
    $total_reg=mysql_num_rows($res);
            //echo$total_reg;
      echo'data.addRows('.$total_reg.'); ';
    while($row=mysql_fetch_array($res)){

    $fecha  = $row['fecha_visita'];
    $pieces = explode("-", $fecha);
        // Lugar
                    //$c++;
        //echo 'data.setCell('.$c.', 0,'.$row['cve'].');';
        $d=$c+1;
         echo 'data.setCell('.$c.', 0,'.$d.');';
         //echo 'data.setCell('.$c.', 0,['.$d.',new Date('.$pieces[0].','.$pieces[1].','.$pieces[2].')]);';

        // Lugar
                    //$c++;
        //echo 'data.setCell('.$c.', 0,'.$row['cve'].');';
        //$d=$c+1;
                    //echo 'data.setCell('.$c.', 0,'.$d.');';
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
        if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
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
    //-----------------------------------------termina aca-------------------------------------------------
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
        </script>';?>

    <div id="table"></div>

    <!-- termina grafica de promedio por visita -->

    <!-- comienza divs de graficas -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
      $(document).ready(function(){
        $("a").click(function () {
          var divname= this.name;
          $("#"+divname).show("slow").siblings().hide("slow");
        });
      });
    </script>
    <div class="tabs">
      <p align="center"><b>Grafíca de parámetros</b>
      <ul class="matrix seven-cols detalle-tabs2">
        <li><label for="grafica1">Comité</label></li>
        <li><label for="grafica2">Instalaciones</label></li>
        <li><label for="grafica3">Ingresos</label></li>
        <li><label for="grafica4">Eventos</label></li>
        <li><label for="grafica5">Áreas verdes</label></li>
        <li><label for="grafica6">Afluencia</label></li>
        <li><label for="grafica7">Orden</label></li>
      </ul>
    </div>

    <div>

    <div class="tabs-content graficas">
    <div class="tab-content"><input id="grafica1" type="radio" name="tab-group-3" checked />
    <div id="div1"><a name="graficacomite">&nbsp;</a>
    <script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "Comit\u00E9 "],
    <?php
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
        if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
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
     echo'<div id="chart_div1" style="width: 400px; height: 200px;"></div></div></div>';

    //----------------------------------------------------------------------------termina


    echo'<div class="tab-content"><input id="grafica2" type="radio" name="tab-group-3" /><div id="div2"><a name="graficainstalaciones">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita",  "Instalaciones "],';

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
        if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
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
     echo'<div id="chart_div2" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica3" type="radio" name="tab-group-3" /><div id="div3"><a name="graficaingresos">&nbsp;</a>';
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
        if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
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
     echo'<div id="chart_div3" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica4" type="radio" name="tab-group-3" /><div id="div4"><a name="graficaeventos">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita" ,"Eventos "],';

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
        if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
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
     echo'<div id="chart_div4" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica5" type="radio" name="tab-group-3" /><div id="div5"><a name="graficaareasverdes">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "\u00C1reas verdes "],';

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
        if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
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
     echo'<div id="chart_div5" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica6" type="radio" name="tab-group-3" /><div id="div6"><a name="grafiafluencia">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "Afluencia "],';

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
        if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
        $pune=$pune+$averdes+$rowa1['estaver'];
                    //$pun522=$pun522+$row22['averdes']+$row22['estaver']+$row22['riego'];
        $punf=$punf+$rowa1['gente'];
        //+$rowa1['diario']
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
     echo'<div id="chart_div6" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div><div class="tab-content"><input id="grafica7" type="radio" name="tab-group-3" /><div id="div7"><a name="graficaorden">&nbsp;</a>';
    //----------------------------------------------------------------------------comienza
    echo'<script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ["Visita", "Orden "],';

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
    if(($rowa1['averdes']>=34) && ($rowa1['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa1['averdes'];
		}
    $pune=$pune+$averdes+$rowa1['estaver'];
    $punf=$punf+$rowa1['gente'];
    //$sqla11="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa11=mysql_query($sqla11);
		$total_visitas=$rowa['totalvisitas'];
		//while($rowa11=mysql_fetch_array($resa11)){
                $rowa11=mysql_fetch_array($resa11);
		
		$puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
$promeaa=0;
$puna=$puna+$rowa11['opera']+$rowa11['formaliza']+$rowa11['organiza']+$rowa11['reunion']+$rowa11['proyecto'];
		$punb=$punb+$rowa11['instalaciones']+$rowa11['estado']+$rowa11['disenio']+$rowa11['ejecutivo'];
		$punc=$punc+$rowa11['ingresop']+$rowa11['ingresadop']+$rowa11['mancomunado'];
		$pund=$pund+$rowa11['eventos']+$rowa11['eventosr'];
                if(($rowa11['averdes']>=34) && ($rowa11['averdes']<=36)){
			$averdes=34;
		}else{
			$averdes=$rowa11['averdes'];
		}
		$pune=$pune+$averdes+$rowa11['estaver'];
		$punf=$punf+$rowa11['gente'];
                //+$rowa11['diario']
		$pung=$pung+$rowa11['limpieza']+$rowa11['orden']+$rowa11['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$promeaaa=$proma+$promeaaa;
	       // $promeaa=$promeaaa/$rowa['totalvisitas'];
	      //$promea=round($promeaa);
              $promea=round($proma);
    $pung=$pung+$rowa1['limpieza']+$rowa1['orden']+$rowa1['respint'];
    $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
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
     echo'<div id="chart_div7" style="width: 400px; height: 200px;"></div>';

    //----------------------------------------------------------------------------termina
    echo'</div></div></div></div>';
    //---------------------------------------------------------termina divs de graficas
    //-------------------------------------COMENTARIOS GENERALES
    echo'<table class="clasetabla2" width="50%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;"><tr><th colspan="2">Comentarios generales </th></tr>
        <th>VISITA</th>';
        echo'<th>Comentarios</th></tr>';
        $res2=mysql_query($sql2);
       $c=0;
       while($row2=mysql_fetch_array($res2)){
    $c++;
    $visita=$row2['cve'];
                  $sql3="SELECT * FROM `wp_visitascom_parques` WHERE cve_parque=$parque and cve_visita=$visita";
                  $res3=mysql_query($sql3);
                  $row3=mysql_fetch_array($res3);
    if($row3['tipo_visita']){
        echo'<td><div class="create-tooltip" title="'.$tipos_visita[$row3['tipo_visita']].'" >'.$c.'</div></td>';
            }else{
        echo'<td>'.$c.'</td>';
            }
      echo' <td>';
        if($row3['genvisita']){
            echo$row3['genvisita'];
        }else{
            echo'Sin comentarios';
        }
        echo'</td></tr>';
       }


        echo'</table>';
        if($prome==0){
        echo'<a href="/agendar-visita/"><h3>Click aqu&iacute; para agendar visita</h3></a>';
        }?>


       <?php endwhile; else : ?>

          <?php get_template_part( 'partials/content', 'missing' ); ?>

       <?php endif; ?>


    </div> <!-- end #content -->

  </div>
  <script type="text/javascript">
    $('.detalle-tabs > li:first').addClass('active');
    $('.detalle-tabs > li').click(function(){
        $('.detalle-tabs > li').removeClass('active');
        $(this).addClass("active");
    });
    $('.detalle-tabs2 > li:first').addClass('active');
    $('.detalle-tabs2 > li').click(function(){
        $('.detalle-tabs2 > li').removeClass('active');
        $(this).addClass("active");
    });
  </script>

<?php get_footer(); ?>