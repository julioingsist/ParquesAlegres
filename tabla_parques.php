<?
require_once("cnx_db.php");
$db='parquesa_wrdp1';
echo'
<script type="text/javascript" src="//www.google.com/jsapi"></script>
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
        data.addColumn("number", "Superficie");
        data.addColumn("number", "Calificacion");';
        
        $filtro='1';
	if ($_POST['fil']!='') $filtro.=" and nom LIKE '%".$_POST['fil']."%' ";
$sql="SELECT a.* FROM wp_arturo_parque as a,`wp_comites_parques` AS b where $filtro and a.cve = b.cve_parque GROUP BY a.cve order by a.calif desc";
//echo$sql;
//data.addRows(3);
	$c=0;
        $res=mysql_db_query("$db",$sql);
        $row=mysql_fetch_array($res);
	//$res=mysql_query($sql);
        $total_reg=mysql_num_rows($res);
        //echo$total_reg;
	echo'data.addRows('.$total_reg.'); ';
        while($row=mysql_fetch_array($res)) {	
		// Lugar
                //$c++;
		echo 'data.setCell('.$c.', 0,'.$row['cve'].');';
                //echo 'data.setCell('.$c.', 0,'.$c.');';
		$parque= $row['cve'];
		// Nombre
		$bar = $row['nom'];
		$bar = ucwords($bar);             // HELLO WORLD!
		$bar = ucwords(strtolower($bar)); // Hello World!
// $bar2=htmlentities($bar, ENT_QUOTES,'UTF-8');
$sqla1="SELECT * FROM  `wp_comites_parques` WHERE cve_parque =$parque ORDER BY cve DESC limit 0,1";
        $resa1=mysql_query($sqla1);
		 $rowa1=mysql_fetch_array($resa1);
        //---------

		echo 'data.setCell('.$c.', 1,"'.$bar.'");';
		// Tipo
		echo 'data.setCell('.$c.', 2,"'.$row['tipo'].'");';
		// Superficie
		echo 'data.setCell('.$c.', 3,'.$row['sup'].' ); ';
		// Calif.
                //echo 'data.setCell('.$c.', 4,'.$row['calif'].' ); ';
                //-------------- aqui empieza calculo de primedio
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
            $puna=0;
$punb=0;
$punc=0;
$pund=0;
$pune=0;
$punf=0;
$pung=0;
$puna=$puna+$rowa1['opera']+$rowa1['formaliza']+$rowa1['organiza']+$rowa1['reunion']+$rowa1['proyecto'];
		$punb=$punb+$rowa1['instalaciones']+$rowa1['estado'];
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
			echo 'data.setCell('.$c.', 4,'.$promea.');';
		$c++;
	
}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;
      // Create and draw the visualization.
     echo' visualization = new google.visualization.Table(document.getElementById("table"));
      visualization.draw(data, null);
      var table = new google.visualization.Table(document.getElementById("table"));
  
  var formatter = new google.visualization.ColorFormat();
   formatter.addRange(81, 101, "#000000", "#71ff71");
      formatter.addRange(60, 81, "#000000", "#ffc863");
      formatter.addRange(0, 60, "#000000", "#ff9f9f");
      formatter.format(data, 4); // Apply formatter to second column
  
  table.draw(data, {allowHtml: true, showRowNumber: true});
  
  var formatter = new google.visualization.TablePatternFormat("<a href=\"http://parquesalegres.org/muestra.php?parque={1}\" target=\"_blank\">{0}</a>");
      formatter.format(data, [1, 0]);
      var options = {};
  options["showRowNumber"] = "true";
  options["allowHtml"] = "true";
  options["page"] = "enable";
  options["pageSize"] = 20;
  // options["pagingSymbols"] = {prev: "Prev", next: "Sig"};
  options["pagingButtonsConfiguration"] = "auto";
        
       var view = new google.visualization.DataView(data);
	  // view.setColumns([1]); // Create a view with the first column only.
	  // view.setColumns([2]);
	  // view.setColumns([3]);
	  // view.setColumns([4]);
	  view.setColumns([1,2,3,4]);

	  table.draw(view, options);';
  echo'  }
    

    google.setOnLoadCallback(drawVisualization);
    </script>

    <div id="table"></div>
  
';

  
  ?>