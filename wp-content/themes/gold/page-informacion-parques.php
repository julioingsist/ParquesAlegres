<?php
/*
Template Name: Información Parques
*/
?>

<?php get_header(); ?>

    <!-- MAIN CONTENT -->
     <div class="main" role="main">
        <div class="top bg-provide"></div>
        <h1 class="title-section">
            <span><?php the_title(); ?></span>
        </h1>
        <div>
            <p class="text--center push--sides">Conoce m&aacute;s sobre los parques de tu ciudad. La calidad de un parque se estima por la intensidad y la calidad de  las relaciones sociales que facilita.<br><br>

Localiza el parque de tu comunidad,  ent&eacute;rate de los proyectos que se est&aacute;n realizando en el mismo, conoce sus &aacute;reas de oportunidad y  sus fortalezas. La meta es que el parque tenga un puntaje de color verde.<br><br>

En caso de no encontrarlo, te invitamos a registrarlo, solo da <b><a href="http://parquesalegres.org/registra-tu-parque/">clic aqu&iacute;</a></b>.<br><br>

¡Trabajando en equipo podr&aacute;s mejorar tu parque!<br><br>
</p>
        </div>
        <hr class="rule" />
        <!------<section id="localizar-parque" class="section section--listing">--->


<div >
    <h2 class="subtitle-section">Localiza tu Parque</h2>
    <p>
        Da un clic sobre el nombre del parque o bien escribe el nombre del parque en la barra de b&uacute;squeda.
    </p>
    <!--<p class="feature">La meta es que tu parque siempre esté en color verde.</p>-->
</div>
<!-- Aquí va el widget de Google Charts -->
<div class="chart-search">

    <form name="forma" method="post">
    <ul class="form-fields">
      <li>
        <label>B&uacute;squeda </label>
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
//OLD
/*
function mam_posts_where ($where) {
   global $mam_global_where;
   if ($mam_global_where) $where .= " $mam_global_where";
   return $where;
}
add_filter('posts_where','mam_posts_where');
$mam_global_where = "AND $wpdb->posts.post_title LIKE '%$_POST[fil]%'";

    $args = array( 'post_type' => 'parque','post_status' => 'publish','nopaging' => true); 

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
        data.addColumn("string", "Superficie m&#178;");
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
        $mypodparque = pods( 'parque', $parque );
        // Nombre
       // $bar = utf8_encode($row['nom']);
       $bar = $post->post_title;
        $bar = ucwords($bar);             // HELLO WORLD!
        $bar = ucwords(strtolower($bar)); // Hello World!
// $bar2=htmlentities($bar, ENT_QUOTES,'UTF-8');
/*$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);*/
        //---------
/*
        echo 'data.setCell('.$c.', 1,"'.$bar.'");';
        // Tipo
        echo 'data.setCell('.$c.', 2,"' . $mypodparque->display( "_parque_tipo" ) . '");';
       // echo 'data.setCell('.$c.', 2,"'.get_post_meta($post->ID, "_parque_tipo", true).'");';
        // Superficie
        if(get_post_meta($post->ID, "_parque_sup", true) == NULL){
            echo 'data.setCell('.$c.', 3,"0");';
        }else{
         echo 'data.setCell('.$c.', 3,"'.number_format(get_post_meta($post->ID, "_parque_sup", true)).'"); ';   
        }
         //echo 'data.setCell('.$c.', 3,"'.number_format(get_post_meta($post->ID, "_parque_sup", true)).'"); ';
        //echo 'data.setCell('.$c.', 3,"' . $mypodparque->display( "_parque_sup" ) . '");';
        echo 'data.setCell('.$c.', 4,"' . $mypodparque->display( "_parque_sec" ) . '");';
        //echo 'data.setCell('.$c.', 4,"'.get_post_meta($post->ID, "_parque_sec", true).'");';
        // Calif.
                //echo 'data.setCell('.$c.', 4,'.$row['calif'].' ); ';
                //-------------- aqui empieza calculo de promedio
   $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque";
             $resa=mysql_query($sqla);
		 $rowa=mysql_fetch_array($resa);

/*$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);*/
        //---------
/*        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
           		//$sqla11="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC";
                        $sqla11="SELECT opera+formaliza+organiza+reunion+proyecto+disenio+ejecutivo+vespacio+instalaciones+estado+ingresop+ingresadop+mancomunado+eventos+eventosr+averdes+estaver+gente+limpieza+orden+respint as suma FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa11=mysql_query($sqla11);
		$total_visitas=$rowa['totalvisitas'];
		//while($rowa11=mysql_fetch_array($resa11)){
                $rowa11=mysql_fetch_array($resa11);
		/*
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
             $proma=($puna+$punb+$punc+$pund+$pune+$punf+$pung)/7;*/
/*		$proma=$rowa11['suma']/7;
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
*/
//NEW
function mam_posts_where ($where) {
   global $mam_global_where;
   if ($mam_global_where) $where .= " $mam_global_where";
   return $where;
}
add_filter('posts_where','mam_posts_where');
$mam_global_where = "AND $wpdb->posts.post_title LIKE '%$_POST[fil]%'";
$filtrowhere="";
if($_POST['fil']!=""){
    $filtrowhere="AND p.post_title LIKE '%".$_POST['fil']."%'";
}
$tipoparque=array(1=>"Área verde",2=>"Área común",3=>"Área de donación",4=>"Área de ejercicio",5=>"Área deportiva",6=>"Área recreativa",7=>"Baldío",
8=>"Campo deportivo (mixto)",9=>"Cancha de usos multiples",10=>"Cancha deportiva",11=>"Deportivo",12=>"Fraccionadora",13=>"Lineal",14=>"Mixto",15=>"Público",16=>"Parque",
17=>"Infantil",18=>"Unidad de usos multiples",19=>"Plancha",20=>"Plaza cívica",21=>"Privado",22=>"Regímen condominal",23=>"Semi-privado",24=>"Unidad deportiva",25=>"Unidad deportiva (mixta)");
$sector=array(1=>"Noreste (NE)",2=>"Noroeste (NO)",3=>"Sureste (SE)",4=>"Suroeste (SO)");
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
        data.addColumn("string", "");
        data.addColumn("string", "Nombre");
        data.addColumn("string", "Tipo");
        data.addColumn("string", "Superficie m&#178;");
        data.addColumn("string", "Zona");  
        data.addColumn("number", "Puntos");';
$sql33="SELECT p.id, p.post_title, m.meta_value as tipo, m2.meta_value as superficie, m3.meta_value as sector from wp_posts p LEFT JOIN wp_postmeta m ON p.id=m.post_id AND m.meta_key='_parque_tipo' LEFT JOIN wp_postmeta m2 ON p.id=m2.post_id AND m2.meta_key='_parque_sup' LEFT JOIN wp_postmeta m3 ON p.id=m3.post_id AND m3.meta_key='_parque_sec' LEFT JOIN asesores a ON a.ID=p.post_author WHERE a.stat<1 AND p.post_type='parque' AND p.post_status='publish' $filtrowhere group by p.ID";
$res33=mysql_query($sql33);
echo'data.addRows('.mysql_num_rows($res33).'); ';
while($row33=mysql_fetch_array($res33)){
    $id= $row33['id'];
        echo 'data.setCell('.$c.', 0,"'.$id.'");';
        $parque= $id;
        $bar=$row33['post_title'];
        $bar = ucwords($bar);
        $bar = ucwords(strtolower($bar));
        echo 'data.setCell('.$c.', 1,"'.$bar.'");';
        // Tipo
        /*$sql34="SELECT meta_value from wp_postmeta WHERE post_id='".$parque."' AND meta_key='_parque_tipo'";
        $res34=mysql_query($sql34);
        $row34=mysql_fetch_array($res34);
        */
        echo 'data.setCell('.$c.', 2,"' . $tipoparque[$row33['tipo']] . '");';
        // Superficie
        /*$sql35="SELECT meta_value from wp_postmeta WHERE post_id='".$parque."' AND meta_key='_parque_sup'";
        $res35=mysql_query($sql35);
        $row35=mysql_fetch_array($res35);
        */
        if($row33['superficie']==NULL){
            echo 'data.setCell('.$c.', 3,"0");';
        }
        else{
            echo 'data.setCell('.$c.', 3,"'.number_format($row33['superficie']).'"); ';
        }
        /*$sql36="SELECT meta_value from wp_postmeta WHERE post_id='".$parque."' AND meta_key='_parque_sec'";
        $res36=mysql_query($sql36);
        $row36=mysql_fetch_array($res36);
        */
        echo 'data.setCell('.$c.', 4,"' . $sector[$row33['sector']] . '");';
        $sqla="SELECT COUNT( * ) as totalvisitas FROM  `wp_comites_parques` WHERE cve_parque =$parque";
        $resa=mysql_query($sqla);
	$rowa=mysql_fetch_array($resa);
        if($rowa['totalvisitas']<1){
           $promea=0;
        }else{
            $sqla11="SELECT opera+formaliza+organiza+reunion+proyecto+disenio+ejecutivo+vespacio+instalaciones+estado+ingresop+ingresadop+mancomunado+eventos+eventosr+averdes+estaver+gente+limpieza+orden+respint as suma FROM  `wp_comites_parques` WHERE cve_parque=$parque order by fecha_visita DESC, cve DESC limit 1";
            $resa11=mysql_query($sqla11);
	    $total_visitas=$rowa['totalvisitas'];
	    $rowa11=mysql_fetch_array($resa11);
	    $proma=$rowa11['suma']/7;
            $promea=round($proma);
        }
        echo 'data.setCell('.$c.', 5,'.$promea.');';    
        $c++;
}
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
      data.sort([{column: 5, desc:true}]);

  table.draw(data, {allowHtml: true, showRowNumber: true});

  var formatter = new google.visualization.TablePatternFormat("<a href=\"/?post_type=parque&p={1}\" target=\"_blank\">{0}</a>");
      formatter.format(data, [1, 0]);
      var options = {};
  options["showRowNumber"] = "true";
  options["allowHtml"] = "true";
  options["page"] = "enable";
  options["pageSize"] = 20;
  options["pagingSymbols"] = {prev: "Anterior", next: "Siguiente"};

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
        </div>
    </div>
</div>

';
//--------------------------------termina tabla de parques con google-----------------------------------
 

get_footer(); ?>