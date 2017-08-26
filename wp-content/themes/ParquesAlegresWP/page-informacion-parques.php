<?php
/*
Template Name: Información Parques
*/
?>

<?php get_header(); ?>

    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-info"></div>
        <h1 class="title-section">
            <span><?php the_title(); ?></span>
        </h1>
        <div class="container">
            <p class="text--center push--sides">Conoce más sobre los parques de tu ciudad. Localiza tu parque, entérate de los proyectos que hemos realizado, aclara tus dudas y visita los links de interés.</p>
        </div>
        <hr class="rule" />
        <!------<section id="localizar-parque" class="section section--listing">--->


<div class="section--listing__head">
    <h2 class="subtitle-section">Localiza tu Parque</h2>
    <p>
        Encuentra tu parque, da clic en en su nombre y conoce sus fortalezas y áreas de oportunidad.
        <br />
        ¡Trabajando en equipo podrás mejorar tu espacio!
    </p>
    <p class="feature">La meta es que tu parque siempre esté en color verde.</p>
</div>
<!-- Aquí va el widget de Google Charts -->
<div class="chart-search">

    <form name="forma" method="post">
    <ul class="form-fields">
      <li>
        <label>Búsqueda </label>
        <input class="text-input text-input--alt" type="text" name="fil" style="border:1px solid red;">
      </li>
      <li><input class="btn" type="submit" value="Buscar"></li>
    </ul>
     </form>
</div>
<?php
//echo$_POST['fil'];
//$letter="rinconcito";
//--------------------------------tabla de parques con google-----------------------------------
/*function mam_posts_where ($where) {
   global $mam_global_where;
   if ($mam_global_where) $where .= " $mam_global_where";
   return $where;
}
add_filter('posts_where','mam_posts_where');
$mam_global_where = "AND $wpdb->posts.post_title LIKE '%$_POST[fil]%'";

    $args = array( 'post_type' => 'parque','nopaging' => true); 

$loop = new WP_Query( $args );
$c=0;


echo'
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages: ["table"]});
    </script>
    <script type="text/javascript">
    function drawVisualization() {
      // Create and populate the data table.
     var data = new google.visualization.DataTable();
        data.addColumn("number", "");
        data.addColumn("string", "Nombre");
        data.addColumn("string", "Tipo");
        data.addColumn("string", "Superficie");
        data.addColumn("string", "Zona");  
        data.addColumn("number", "Puntos");';
//$filtro='1';

//if ($_POST['fil']!='') $filtro.=" and nom LIKE '%".$_POST['fil']."%' ";
//$sql="SELECT a.* FROM wp_arturo_parque as a,`wp_comites_parques` AS b where $filtro and a.cve = b.cve_parque GROUP BY a.cve order by a.calif desc";

//$c=0;
//$res=mysql_query($sql);

//echo $loop->post_count;
$total_reg=$loop->post_count;
        //echo$total_reg;
    echo'data.addRows('.$total_reg.'); ';

while ( $loop->have_posts() ) : $loop->the_post();
$id = get_the_ID();

        // Lugar
                //$c++;
        echo 'data.setCell('.$c.', 0,'.$id.');';
                //echo 'data.setCell('.$c.', 0,'.$c.');';
        $parque= $id;
        // Nombre
       // $bar = utf8_encode($row['nom']);
       $bar = $post->post_title;
        $bar = ucwords($bar);             // HELLO WORLD!
        $bar = ucwords(strtolower($bar)); // Hello World!
// $bar2=htmlentities($bar, ENT_QUOTES,'UTF-8');
$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
        //---------

        echo 'data.setCell('.$c.', 1,"'.$bar.'");';
        // Tipo
        echo 'data.setCell('.$c.', 2,"'.get_post_meta($post->ID, "_parque_tipo", true).'");';
        // Superficie
        echo 'data.setCell('.$c.', 3,"'.get_post_meta($post->ID, "_parque_sup", true).'"); ';
        
        echo 'data.setCell('.$c.', 4,"'.get_post_meta($post->ID, "_parque_sec", true).'");';
        // Calif.
                //echo 'data.setCell('.$c.', 4,'.$row['calif'].' ); ';
                //-------------- aqui empieza calculo de promedio
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
           		//$sqla11="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC";
                        $sqla11="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
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
		$punc=$punc+$rowa11['ingresop']+$rowa11['ingresadop']+$rowa11['mancomunado'];//+$rowa11['mancomunado']
		$pund=$pund+$rowa11['eventos']+$rowa11['eventosr'];
                if($rowa11['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa11['averdes'];
			//echo'entra';
	     }else{
	
		  if($rowa11['averdes']<50){
			if($rowa11['averdes']==0){
			$averdes=0;		
			}else{
		  $averdes=0;
		  $averdes=$averdes+34;
		  }
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa11['averdes'];
		  }
	     }
        $pune=$pune+$averdes+$rowa11['estaver'];
		//$pune=$pune+$rowa11['averdes']+$rowa11['estaver'];
		$punf=$punf+$rowa11['gente'];
                //+$rowa11['diario']
		$pung=$pung+$rowa11['limpieza']+$rowa11['orden']+$rowa11['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$promeaaa=$proma+$promeaaa;
	       // $promeaa=$promeaaa/$rowa['totalvisitas'];
	      //$promea=round($promeaa);
              $promea=round($proma);
           
		//}
        }
//--------------termina calculo de promedio

			echo 'data.setCell('.$c.', 5,'.$promea.');';
            
        $c++;




?>

    
<?php 
//--------------------------------------------
?>
<?php endwhile;
//--------------------------------------------

//$tot_reg=mysql_num_rows($res);
$total=$total_reg/3;
      // Create and draw the visualization.
     echo' visualization = new google.visualization.Table(document.getElementById("table"));
      visualization.draw(data, null);
      var table = new google.visualization.Table(document.getElementById("table"));

  var formatter = new google.visualization.ColorFormat();
   formatter.addRange(81, 101, "#000000", "#71ff71");
      formatter.addRange(60, 81, "#000000", "#ffc863");
      formatter.addRange(0, 60, "#000000", "#ff9f9f");
      formatter.format(data, 5); // Apply formatter to second column

  table.draw(data, {allowHtml: true, showRowNumber: true});

  var formatter = new google.visualization.TablePatternFormat("<a href=\"/?post_type=parque&p={1}\" target=\"_blank\">{0}</a>");
      formatter.format(data, [1, 0]);
      var options = {};
  options["showRowNumber"] = "true";
  options["allowHtml"] = "true";
  options["page"] = "enable";
  options["pageSize"] = 20;
  options["pagingSymbols"] = {prev: "Prev", next: "Sig"};
  options["pagingButtonsConfiguration"] = "auto";

       var view = new google.visualization.DataView(data);
      // view.setColumns([1]); // Create a view with the first column only.
      // view.setColumns([2]);
      // view.setColumns([3]);
      // view.setColumns([4]);
      view.setColumns([1,2,3,4,5]);

      table.draw(view, options);';
  echo'  }


    google.setOnLoadCallback(drawVisualization);
    </script>


    <div class="chart-container">
        <div class="chart">
            <div id="table"></div>
            <p>Si tu parque o municipio no aparece, te invitamos a darlo de alta, da clic <a href="#" class="link link--natural">aquí</a></p>
        </div>
    </div>


';*/
//--------------------------------termina tabla de parques con google-----------------------------------
 echo'<div class="chart-container">
        <div class="chart">';
           
        
$filtro='1';

$bar=$_POST['fil'];
//con esta funcion convierte acentos en html
$bar2=htmlentities($bar, ENT_QUOTES,'UTF-8');
if ($_POST['fil']!='') $filtro.=" and post_title LIKE '%".$bar2."%' ";
//if($current_user->user_login=="admin"){
	$sql="SELECT * FROM wp_posts where $filtro and post_type='parque' AND post_status='publish' order by post_title desc";
/*}else{
	$sql="SELECT * FROM wp_posts where $filtro and post_type='parque'  and post_author=' . $current_user->ID . ' order by post_title desc";
}*/

//echo$_POST['fil'];
//echo'-';
//echo$bar2;
$c=0;
$res=mysql_query($sql);
echo'<table style="width:50%; margin-left:25%; margin-right:25%;" border="1"><tr><td>No.</td><td>Nombre del parque</td><td>Tipo</td><td>Sector</td><td>Superficie</td><td>Promedio</td></tr>';
while($row=mysql_fetch_array($res)){
$c++;
echo'<tr><td>'.$c.'</td>';

//http://parquesalegres.org/wp-admin/admin.php?page=Alta%20Par%C3%A1metros
echo'<td><a href="/?post_type=parque&p='.$row['ID'].'" target="_blank">'.$row['post_title'].'</a></td>';
$id=$row['ID'];
$sql1="SELECT * FROM  `wp_postmeta`  WHERE post_id =$id AND ( meta_key =  '_parque_sec' OR meta_key =  '_parque_tipo' OR meta_key =  '_parque_sup') ORDER BY  `wp_postmeta`.`meta_id` DESC limit 0,3";
$res1=mysql_query($sql1);
while($row1=mysql_fetch_array($res1)){
    if(!$row1['meta_value']){
        echo'<td>&nbsp;</td>';      
    }else{
        if($row1['meta_value']==""){
      echo'<td>&nbsp;</td>';  
    }else{
        echo'<td>'.$row1['meta_value'].'</td>';
    }
    
    }

//echo'<td>'.$row['sup'].'</td>';
}

//echo'<td>'.$row['tipo'].'</td>';
//echo'<td>'.$row['sup'].'</td>';
$parque=$row['ID'];
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
           		//$sqla11="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC";
                        $sqla11="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
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
		$punc=$punc+$rowa11['ingresop']+$rowa11['ingresadop']+$rowa11['mancomunado'];//+$rowa11['mancomunado']
		$pund=$pund+$rowa11['eventos']+$rowa11['eventosr'];
                if($rowa11['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa11['averdes'];
			//echo'entra';
	     }else{
	
		  if($rowa11['averdes']<50){
			if($rowa11['averdes']==0){
			$averdes=0;		
			}else{
		  $averdes=0;
		  $averdes=$averdes+34;
		  }
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa11['averdes'];
		  }
	     }
        $pune=$pune+$averdes+$rowa11['estaver'];
		//$pune=$pune+$rowa11['averdes']+$rowa11['estaver'];
		$punf=$punf+$rowa11['gente'];
                //+$rowa11['diario']
		$pung=$pung+$rowa11['limpieza']+$rowa11['orden']+$rowa11['respint'];
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;
              //$promeaaa=$proma+$promeaaa;
	       // $promeaa=$promeaaa/$rowa['totalvisitas'];
	      //$promea=round($promeaa);
              $promea=round($proma);
           
		//}
        }
//--------------termina calculo de promedio

			//echo 'data.setCell('.$c.', 5,'.$promea.');';

echo'<td';
if($promea>=81){
   echo' bgcolor="#71ff71"';
}elseif($promea>=60){
    echo' bgcolor="#ffc863"';
}elseif($promea>=0){
    echo' bgcolor="#ff9f9f"';
}
/*
formatter.addRange(81, 101, "#000000", "#71ff71");
      formatter.addRange(60, 81, "#000000", "#ffc863");
      formatter.addRange(0, 60, "#000000", "#ff9f9f");
      */
echo'>'.$promea.'</td></tr>';
}
echo'</table>';

echo'</div>
    </div>';
?>
       <!--- </section>-->
        <section id="contacto" class="section">
            <div class="section-container">
                <h2 class="subtitle-section">¡Contáctanos!</h2>
                <div class="section--box">
                    <form action="#" class="contact-form">
                      <?php echo do_shortcode('[contact-form-7 id="971" title="Formulario de contacto 1"]') ?>
                    </form>
                </div>
            </div>
        </section>
        <hr class="rule" />
        <section id="proyectos-realizados" class="section section--listing">
            <div class="section--listing__head">
                <h2 class="subtitle-section">Proyectos Realizados</h2>
                <p>Más de 30 Parques Rehabilitados con recurso federal.</p>
                <div class="projects-tabs">
                    <div class="grid">
                        <div class="grid__item one-third">
                            <div class="tab">
                                <label class="projects-label" for="gobierno"><span class="icon-proj icon-proj--gov"></span>Gobierno</label>
                            </div>
                        </div><!--

                     --><div class="grid__item one-third">
                            <div class="tab">
                                <label class="projects-label" for="empresas"><span class="icon-proj icon-proj--company"></span>Empresas</label>
                            </div>
                        </div><!--

                     --><div class="grid__item one-third">
                            <div class="tab">
                                <label class="projects-label" for="instituciones"><span class="icon-proj icon-proj--institution"></span>Instituciones</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projects-container">
                <div class="tab-content">
                    <input type="radio" id="gobierno" name="tab-group-8" checked />
                    <div class="video-gallery">
                       <div class="projects-slider govslider">
                           <ul class="slides">
                            <?php get_template_part( 'partials/providers/loop', 'gobierno' ); ?>
                           </ul>
                       </div>
                    </div>
                </div>
                <div class="tab-content">
                    <input type="radio" id="empresas" name="tab-group-8" />
                    <div class="video-gallery">
                       <div class="projects-slider companyslider">
                           <ul class="slides">
                            <?php get_template_part( 'partials/providers/loop', 'empresas' ); ?>
                           </ul>
                       </div>
                    </div>
                </div>
                <div class="tab-content">
                    <input type="radio" id="instituciones" name="tab-group-8" />
                    <div class="video-gallery">
                       <div class="projects-slider instslider">
                           <ul class="slides">
                            <?php get_template_part( 'partials/providers/loop', 'instituciones' ); ?>
                           </ul>
                       </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section--natural">
          <div class="youtube">
            <p>Visita nuestro canal de Youtube</p>
            <div class="video-gallery">
              <div class="videoslider">
                 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                  <?php the_content(); ?>

                 <?php endwhile; else : ?>

                    <?php get_template_part( 'partials/content', 'missing' ); ?>

                 <?php endif; ?>

              </div>
            </div>
          </div>
        </section>
        <section id="preguntas-frecuentes" class="section">
          <div class="faqs">
            <h2 class="subtitle-section">Preguntas Frecuentes</h2>
            <p class="question">
              <strong>1. ¿Parques Alegres cuenta con recursos propios para mejorar los espacios?</strong>
              <span class="feature">Nuestra principal fortaleza recae en la asesoría a comités y personas interesadas en parques. Sin embargo, buscamos constantemente el apoyo de empresas y diversas organizaciones, quienes direccionan sus recursos y servicios a través de nosotros.</span>
            </p>
            <p class="question">
              <strong>2. ¿Por qué es tan importante que los parques cuenten con un comité?</strong>
              <span class="feature">Un parque es importante como motor de desarrollo social, ya que en ellos se desarrollan actividades como recreación, cultura y deporte. Al existir un comité se genera un mecanismo de trabajo que permite socializar las necesidades del espacio, diseñar un plan de acción y crear los proyectos a desarrollar a favor de la comunidad.</span>
            </p>
            <p class="question">
              <strong>3. ¿Qué actividades puede hacer el comité para generar ingresos?</strong>
              <span class="feature">Parques Alegres recomienda realizar actividades que además de generar ingresos, permitan la construcción de tejido social, tales como; Kermesse, rifas, torneos, eventos en días festivos, entre otros. Para mayor información te invitamos a visitar nuestra sección ¿Como mejorar tu parque? Y dar click en "Generar Ingresos".</span>
            </p>
            <p class="question">
              <strong>4. ¿Dónde consigo árboles y/o plantas?</strong>
              <span class="feature">Existen diferentes instituciones donde puedes gestionar la donación de árboles, una de ellas es el H. Ayuntamiento. <a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-formato-donacion-plantas-y-arboles.pdf" class="strong">Descarga formato.</a> Busca en tu ciudad instituciones que te pueden ayudar con proyectos de arborización.</span>
            </p>
            <p class="question">
              <strong>5. ¿Cuáles son los beneficios de tener un parque bonito?</strong>
              <span class="feature">Aumenta la plusvalía de las viviendas entre un 5% y un 20%, disminuye la violencia y aumenta la convivencia entre familia y vecinos. Un parque puede fungir como una extensión de tu hogar donde puedes realizar tus eventos sociales y familiares.</span>
            </p>
            <p class="question">
              <strong>6. ¿Cómo le hago para gestionar una toma de agua?</strong>
              <span class="feature">Se elabora un oficio dirigido al C. Presidente Municipal con copia al área correspondiente del H. Ayuntamiento. <a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-formato-para-gestion-de-toma-de-agua.pdf" class="strong">Descarga de formato</a>.</span>
            </p>
            <p class="question">
              <strong>7. ¿Dónde formalizo mi comité?</strong>
              <span class="feature">En el apartado de “Descarga de formatos” encontraras un formato que podrás descargar y llenar, una vez llenado y firmado por todos los integrantes del comité, se entrega al departamento encargado de parques de tu H. Ayuntamiento. <a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-formato-para-formalizacion-de-comite.pdf" class="strong">Descarga de formato</a>. Investiga en tu ciudad cual es el departamento encargado del tema.</span>
            </p>
          </div>
        </section>
        <hr class="rule" />
        <section id="enlaces" class="section">
          <div class="section section--box">
            <h2 class="subtitle-section">Links de inter&eacute;s</h2>
            <ul>
            <li><a href="/solicitudesdegestion/" target="_blank">Solicitudes de gestión del dpto. Parques y Jardines</a></li>
            <li><a href="/seis-pasos-para-sembrar-un-arbol/" target="_blank">6 pasos para sembrar un &aacute;rbol</a></li>
            <li><a href="/arquitectura-un-parque-que-rompe-con-las-costumbres-impuestas-por-la-vida-contemporanea/" target="_blank">Arquitectura en un parque que rompe con las costumbres impuestas por la vida contempor&aacute;nea</a></li>
            <li><a href="/breves-interesantes/" target="_blank">Breves interesantes</a></li>
            <li><a href="/informacion-de-interes/" target="_blank">Buenas ideas</a></li>
            <li><a href="/catalogo/" target="_blank">Catalogo</a></li>
            <li><a href="/catalogo-de-equipamiento/" target="_blank">Catalogo de equipamiento para parques</a></li>
            <li><a href="/central-park/" target="_blank">Central Park</a></li>
            <li><a href="/homedepot/" target="_blank">Empleados de Home Depot realizan trabajos de limpieza en el parque Lomas de Blvd</a></li>
            <li><a href="/expo-parques/" target="_blank">Fotos primer Expo-Parques</a></li>
            <li><a href="/guia-para-sembrara-arboles-en-los-parques/" target="_blank">Guía para sembrar alrboles en los parques</a></li>
            <li><a href="http://tops10.znoticias.net/los-13-parques-urbanos-mas-impactantes-del-mundo" target="_blank">Los trece parques urbanos mas impactantes del mundo</a></li>
            <li><a href="/infomracion-de-interes-2/sedesol/" target="_blank">Parques Alegres gestiona 30 parques con recursos 100% federal</a></li>
            <li><a href="http://www.forbes.com.mx/sites/parques-urbanos-el-otro-pulmon-economico-de-mexico/" target="_blank">Parques urbanos, el otro pulm&oacute;n econ&oacute;mico de M&eacute;xico</a></li>
            <li><a href="/pin-pon/" target="_blank">Pin pon</a></li>
            <li><a href="http://www.manualidadesinfantiles.org/juegos-kermesse" target="_blank">Prepara tu feria de juegos kermesse</a></li>
            <li><a href="/autoevaluacion/evaluacion.php/" target="_blank">Sistema de autoevaluaci&oacute;n</a></li>
            <li><a href="http://casa.univision.com/jardineria/diseno-de-jardines/slideshow/2011-10-20/transformadores-de-arboles" target="_blank">Transformadores de &aacute;rboles</a></li>
            <li><a href="http://www.urbadep.com/producto/parques-saludables/parques-saludables/" target="_blank">Urbadep equipamiento urbano y deportivo</a></li>
            <li><a href="/video-expo-parques-15marzo2012/" target="_blank">Video Expo-Parques 15 de Marzo de 2012</a></li>
            <li><a href="/oficio-de-donacion-de-arboles/" target="_blank">Ya puedes descargar el Oficio para donaci&oacute;n de &aacute;rboles por parte del Jard&iacute;n B&oacute;tanico </a></li>
            <li><a href="/catalogo-de-arborizacion-2/" target="_blank">Ya puedes ver el catalogo de arborizaci&oacute;n (arboles en donaci&oacute;n)</a></li>
<li><a href="http://noticias.arq.com.mx/Detalles/19024.html?utm_source=boletin&utm_content=aaa&utm_medium=email&utm_campaign=boletin443#.VIO2vWSG9Zk" target="_blank">Arquitectura: Washington DC tendrá su primer parque elevado</a></li>
            </ul>
            
            <h2 class="subtitle-section">Metodologias / solicitudes de gesti&oacute;n</h2>
            <ul>
            <li><a href="/solicitudesdegestion/" target="_blank">Solicitudes de gestión del dpto. Parques y Jardines</a></li></ul>
            <h2 class="subtitle-section">Servicio formación de comites</h2>
            <ul>
<li><a href="http://parquesalegres.org/wp-content/uploads/2012/05/formatocomite2.pdf" target="_blank">Formato para registro de comites de parques (dpto. parques y jardines)</a></li>
<li><a href="http://parquesalegres.org/wp-content/uploads/2011/11/METODOLOGIA-PARA-CONFORMAR-COMITE-DE-VECINOS.pdf" target="_blank">Metodologia para conformar comite de vecinos</a></li>
</ul>
<h2 class="subtitle-section">Servicio toma de agua</h2>
<ul>
<li><a href="http://parquesalegres.org/wp-content/uploads/2012/05/formatotomadeagua1.pdf" target="_blank">Formato solicitud para toma de agua (dpto parques y jardines)</a></li>
<li><a href="http://parquesalegres.org/wp-content/uploads/2011/11/METODOLOGIA-PARA-TOMA-DE-AGUA.pdf" target="_blank">Metodologia para toma de agua</a></li>
</ul>
<h2 class="subtitle-section">Servicio solicitud plantas y arboles</h2>
<ul><li><a href="http://parquesalegres.org/wp-content/uploads/2012/05/formatoplantasyarboles1.pdf" target="_blank">Formato solicitud para plantas y arboles (dpto. parques y jardines)</a></li>
<li><a href="http://parquesalegres.org/wp-content/uploads/2012/05/formatoplantas1.pdf" target="_blank">Formato solicitud para plantas (dpto. parques y jardines)</a></li>
<li><a href="http://parquesalegres.org/wp-content/uploads/2012/05/formatoarboles1.pdf" target="_blank">Formato solicitud arboles (dpto. parques y jardines)</a></li>
<li><a href="http://parquesalegres.org/wp-content/uploads/2011/11/METODOLOGIA-PARA-PLANTAS.pdf" target="_blank">Metodologia para plantas</a></li>
</ul>
<h2 class="subtitle-section">Servicio solicitud para proyecto de equipamiento</h2>
<ul><li><a href="http://parquesalegres.org/wp-content/uploads/2012/05/formatoproyectoampliacion1.pdf" target="_blank">Solicitud formato para proy. de equipamiento (dpto. parques y jardines)</a></li>
</ul>
<h5>Nota: Para poder abrir los formatos debera tener instalado en su computadora Adobe reader, ya instalado podra ver el formato e imprimirlo.</h5>
            </ul>
            <br>
            <h2 class="subtitle-section">Descarga de ejemplos de Formatos</h2>
            <div class="grid">
              <div class="grid__item one-half">
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-reglamento-parques-lona.jpg"><img src="<?php echo get_template_directory_uri(); ?>/library/img/order-regulations.jpg" alt="Reglamentos para Parques" /></a></p>
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-kit-de-ventas-comites.pdf"><img src="<?php echo get_template_directory_uri(); ?>/library/img/kit-ventas-comites.png" alt="Kit de ventas para comités" /></a></p>
              </div><!--

           --><div class="grid__item one-half">
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-manual-donativo-empresa.pdf"><img src="<?php echo get_template_directory_uri(); ?>/library/img/donativo-empresarial.png" alt="Donativo Empresarial" /></a></p>
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-kit-de-ventas-empresas.pdf"><img src="<?php echo get_template_directory_uri(); ?>/library/img/kit-ventas-empresas.png" alt="Kit de ventas para empresas" /></a></p>
              </div><!--

           --><div class="grid__item one-half">
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-manual-donativo-personas.pdf"><img src="<?php echo get_template_directory_uri(); ?>/library/img/donativo-personal.png" alt="Manual de donativos personal" /></a></p>
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-formato-para-proyecto-de-equipamiento.pdf"><img src="<?php echo get_template_directory_uri(); ?>/library/img/formato-equipamiento.png" alt="Formato para proyecto de equipamiento" /></a></p>
              </div><!--

           --><div class="grid__item one-half">
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-formato-donacion-plantas-y-arboles.pdf"><img src="<?php echo get_template_directory_uri(); ?>/library/img/formato-arboles.png" alt="Formato para gestión de donación de árboles" /></a></p>
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-formato-para-gestion-de-toma-de-agua.pdf"><img src="<?php echo get_template_directory_uri(); ?>/library/img/formato-agua.png" alt="Formato para gestión de toma de agua" /></a></p>
              </div><!--

           --><div class="grid__item one-half">
                <p><a href="<?php echo get_template_directory_uri(); ?>/library/docs/pa-formato-para-formalizacion-de-comite.pdf"><img src="<?php echo get_template_directory_uri(); ?>/library/img/formato-comite.png" alt="Formato para formalización de Comité" /></a></p>
              </div>
            </div>
            <span class="icon-box icon-box--download"></span>
          </div>
        </section>

    </div>
    <!-- //MAIN CONTENT// -->


<?php get_footer(); ?>