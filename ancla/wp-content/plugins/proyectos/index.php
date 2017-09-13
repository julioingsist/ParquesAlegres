<?php
/**
 * @package Subir proyectos de parques
 * @version 1.0
 */
/*
Plugin Name: proyectos
Plugin URI: http://di99.com
Description: Subir proyectos de parques.
Author: Arturo Gudiño Chong
Version: 1.0
Author URI: http://eci.mx/
*/

function proyectos_dos()
{
	echo 'Calificación de parques<br />';
	echo '<iframe src="http://di99.com/parques/tabla.php" width="580" height="800"></iframe>';
}

function proyectos_tres()
{
echo'<form name="forma" action="http://parquesalegres.org/cargar-proyectos/" method="post">';
	echo 'Encuentra el parque y seleccionalo para subir su plano.<br />
Nombre del parque: <input type="text" name="fil"> <input type="submit" value="Buscar"></form>';
//echo $fil;
	echo'<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">
    	google.load("visualization", "1", {packages: ["table"]});
    	function drawVisualization() {
      	// Create and populate the data table.
      	var data = new google.visualization.DataTable();
      	data.addColumn("number", "Id");
      	data.addColumn("string", "Nombre del parque");
      	data.addColumn("string", "Tipo");
      	data.addColumn("number", "Superficie");
      	data.addColumn("number", "Puntos");

	';

	$filtro='1';
	if ($_POST['fil']!='') $filtro.=" and nom LIKE '%".$_POST['fil']."%' ";
	$sql="SELECT * FROM wp_arturo_parque where $filtro order by calif desc";
	$c=0;	
	$res=mysql_query($sql);
	echo 'data.addRows('.mysql_num_rows($res).');';
	while($row=mysql_fetch_array($res)) {	
		// Lugar
		echo 'data.setCell('.$c.', 0,'.$row['cve'].');';
		// Nombre
		echo 'data.setCell('.$c.', 1,"'.$row['nom'].'");';
		// Tipo
		echo 'data.setCell('.$c.', 2,"'.$row['tipo'].'");';
		// Superficie
		echo 'data.setCell('.$c.', 3,'.$row['sup'].');';
		// Calif.
		echo 'data.setCell('.$c.', 4,'.$row['calif'].');';

		$c++;
	}
$tot_reg=mysql_num_rows($res);
$total=$tot_reg/3;

 echo '
      // Create and draw the visualization.
      var table = new google.visualization.Table(document.getElementById("visualization"));
      
       var formatter = new google.visualization.TableNumberFormat(
      {prefix: "", negativeColor: "red", negativeParens: true});
       formatter.format(data, 3); // Apply formatter to second column	  
      var formatter = new google.visualization.TableColorFormat();';

 echo'
      formatter.addRange(74, 101, "#000000", "#71ff71");
      formatter.addRange(59, 74, "#000000", "#ffc863");
      formatter.addRange(1, 59, "#000000", "#ff9f9f");
      formatter.format(data, 4); // Apply formatter to second column
';


     

echo'
	var formatter = new google.visualization.TablePatternFormat("<a href=\"http://parquesalegres.org/subirproyecto.php?parque={1}\" target=\"_blank\">{0}</a>");
      formatter.format(data, [1, 0]); // Apply formatter and set the formatted value of the first column.

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

	  table.draw(view, options);
    }
    
    	google.setOnLoadCallback(drawVisualization);
  	</script>
	';

	echo'</div><div id="visualization"></div>';
//<input type="hidden" name="parque" id="parque" value="'.$parque.'" /> 
echo'</form>';
}

function proyectos_uno()
{
add_submenu_page( 'tools.php', __( "Arturo GC", "arturo" ), __( "Arturo GC", "arturo" ), 'export', 'arturo', 'proyectos_dos' );
}

add_action('admin_menu', 'proyectos_uno');
add_shortcode('proyectos', 'proyectos_dos');
add_shortcode('proyectos3', 'proyectos_tres');

?>