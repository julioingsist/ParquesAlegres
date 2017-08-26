<?php
//require_once("cnx_db.php");
require_once('wp-config.php');
header("Content-Type: text/html;charset=utf-8");
//mysql_query("SET character_set_client=utf8", $MySQL);
//mysql_query("SET character_set_results=utf8", $MySQL);
$sector=array(1=>'Noreste (NE)',2=>'Noroeste (NO)',3=>'Sureste (SE)', 4=>'Suroeste (SO)');
$tipo=array(1=>'&Aacute;rea verde', 2=>'&Aacute;rea com&uacute;n', 3=>'&Aacute;rea de donaci&oacute;n', 4=>'&Aacute;rea de ejercicio', 5=>'&Aacute;rea deportiva', 6=>'&Aacute;rea recreativa', 7=>'Bald&iacute;o', 8=>'Campo deportivo (mixto)', 9=>'Cancha de usos multiples', 10=>'Cancha deportiva', 11=>'Deportivo', 12=>'Fraccionadora', 13=>'Lineal', 14=>'Mixto', 15=>'P&uacute;blico', 16=>'Parque', 17=>'Infantil', 18=>'Unidad de usos multiples', 19=>'Plancha', 20=>'Plaza c&iacutevica', 21=>'Privado', 22=>'Reg&iacutemen condominal', 23=>'Semi-privado', 24=>'Unidad deportiva', 25=>'Unidad deportiva (mixta)');
//$letter="rinconcito";

echo'<p><h3>Listado de parques sin mapa</h3></p>
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

';

function mam_posts_where ($where) {
   global $mam_global_where;
   if ($mam_global_where) $where .= " $mam_global_where";
   return $where;
}
add_filter('posts_where','mam_posts_where');
$mam_global_where = "AND $wpdb->posts.post_title LIKE '%$_POST[fil]%'";
   // $args = array( 'post_type' => 'parque','nopaging' => true,'post_status' => 'draft','post_author' => '4');
   $args = array( 'post_type' => 'parque','nopaging' => true); 

//$loop = new WP_Query( 'post_type=parque', 'post_status=publish', 'nopaging=false','posts_per_page = 1000');
$loop = new WP_Query( "post_type=parque&post_status=publish&posts_per_page=-1&meta_key=_parque_maps&meta_value= &meta_compare=NOT EXISTS");
$c=0;


echo'
<script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages: ["table"]});
    </script>
    <script type="text/javascript">
    function draw() {
      drawToolbar();
    }
    function drawVisualization() {
      // Create and populate the data table.
     var data = new google.visualization.DataTable();
        data.addColumn("number", "ID");
        data.addColumn("string", "Nombre");
        data.addColumn("string", "Tipo");
        data.addColumn("string", "Superficie");
        data.addColumn("string", "Zona");
	data.addColumn("number", "Puntos");
        data.addColumn("string", "Contacto");
	data.addColumn("string", "Estado");
	data.addColumn("string", "Ciudad");
	data.addColumn("string", "Ubicacion");
	data.addColumn("string", "Colonia");';
/*$filtro='1';

if ($_POST['fil']!='') $filtro.=" and nom LIKE '%".$_POST['fil']."%' ";
$sql="SELECT a.* FROM wp_arturo_parque as a,`wp_comites_parques` AS b where $filtro and a.cve = b.cve_parque GROUP BY a.cve order by a.calif desc";

$c=0;
$res=mysql_query($sql);
*/
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
 $bar2=htmlentities($bar, ENT_QUOTES,'UTF-8');
$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa1=mysql_query($sqla1);
         $rowa1=mysql_fetch_array($resa1);
        //---------

        echo 'data.setCell('.$c.', 1,"'.$bar2.'");';
        // Tipo
        echo 'data.setCell('.$c.', 2,"'.$tipo[get_post_meta($post->ID, "_parque_tipo", true)].'");';
        // Superficie
	$superficie=(get_post_meta($post->ID, "_parque_sup", true));
	if(empty($superficie)){
	    $superficie='0.00';
	}
        echo 'data.setCell('.$c.', 3,"'.$superficie.'"); ';
        
        echo 'data.setCell('.$c.', 4,"'.$sector[get_post_meta($post->ID, "_parque_sec", true)].'");';

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
		$punc=$punc+$rowa11['ingresop']+$rowa11['ingresadop']+$rowa11['mancomunado'];
		$pund=$pund+$rowa11['eventos']+$rowa11['eventosr'];
		if($rowa11['averdes']==17){
		  $averdes=0;
		  $averdes=$averdes+$rowa11['averdes'];
			//echo'entra';
	     }else{
		  if(($rowa11['averdes']>30) && ($rowa11['averdes']<40)){
		 // if($row22['averdes']<50){
		  $averdes=0;
		  $averdes=$averdes+34;
		  }else{
			 $averdes=0;
		  $averdes=$averdes+$rowa11['averdes'];
		  }
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
           
		//}
        }
//--------------termina calculo de promedio

			echo 'data.setCell('.$c.', 5,'.$promea.');';
			
			echo 'data.setCell('.$c.', 6,"'.get_post_meta($post->ID, "_parque_cont", true).'");';
			
			echo 'data.setCell('.$c.', 7,"Sinaloa");';
			
			echo 'data.setCell('.$c.', 8,"'.get_post_meta($post->ID, "_parque_ciudad", true).'");';
			
			echo 'data.setCell('.$c.', 9,"'.get_post_meta($post->ID, "_parque_ubic", true).'");';
			
			echo 'data.setCell('.$c.', 10,"'.get_post_meta($post->ID, "_parque_col", true).'");';
			
			
            
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
  options["pageSize"] = 300;
  // options["pagingSymbols"] = {prev: "Prev", next: "Sig"};
  options["pagingButtonsConfiguration"] = "auto";

       var view = new google.visualization.DataView(data);
      // view.setColumns([1]); // Create a view with the first column only.
      // view.setColumns([2]);
      // view.setColumns([3]);
      // view.setColumns([4]);
      
      // view.setColumns([6]);
      // view.setColumns([7]);
      // view.setColumns([8]);
      // view.setColumns([9]);
      // view.setColumns([10]);
      view.setColumns([0,1,2,3,4,5,6,7,8,9,10]);

      table.draw(view, options);';
  echo'  }


    google.setOnLoadCallback(drawVisualization);
    
    function drawToolbar() {
  var components = [
      {type: "html", datasource: "http://parquesalegres.org/tablaparques.php"},
      {type: "csv", datasource: "http://parquesalegres.org/tablaparques.php"},
      {type: "htmlcode", datasource: "http://parquesalegres.org/tablaparques.php",
       gadget: "http://parquesalegres.org/tablaparques.php"}
  ];

  var container = document.getElementById("toolbar_div");
  google.visualization.drawToolbar(container, components);
};
    </script>

    <div class="chart-container">
     <div id="toolbar_div"></div>
        <div class="chart">
            <div id="table"></div>
        </div>
    </div>


';
?>



