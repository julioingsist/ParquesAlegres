<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");

$calendario = array(0 => "No", 50 => "Sí");
$evidencias = array(0 => "No", 1 => "Fotos");

$sql = "SELECT a.ID,u.display_name FROM asesores AS a INNER JOIN wp_users AS u ON a.ID = u.ID 
		WHERE stat < 1";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
	$asesores[$row['ID']] = $row['display_name'];
}

$sql = "SELECT p.ID, p.post_title FROM wp_posts p INNER JOIN asesores a ON a.ID = p.post_author 
	     WHERE p.post_status = 'publish' AND p.post_type = 'parque' AND a.stat < 1 
	     ORDER BY p.post_title ASC";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res)) {
	$parques[$row['ID']] = $row['post_title'];
}

if ($_GET['fecha_inicial'] != "") {
	$fecha_filtro = $_GET['fecha_inicial'];
} else {
	$fecha_filtro = date("Y-m-").'01';
}

if ($_GET['fecha_fin'] != "") {
	$fecha_filtro2 = $_GET['fecha_fin'];	
} else {
	$fecha_filtro2 = date("Y-m-t");
}

if ($_POST['cmd'] == 2) {
	$sql = "SELECT id, post_title FROM wp_posts WHERE post_author = '".$_POST['asesor']."' AND
			post_status='publish' AND post_type='parque' ORDER BY post_title ASC";
	$res = mysql_query($sql);
	if (mysql_num_rows($res) > 0){
		echo '<option value=""> -- Todos --</option>';
		while ($row = mysql_fetch_array($res)){
			echo '<option value="'.$row['id'].'">'.$row['post_title'].'</option>';
		}
	} else {
	    echo 'no';
	}
	exit();
}

if ($_POST['cmd'] == 1) {
	$filtro = " WHERE 1";

    if ($_POST['fecha_inicial']) {
        $filtro .= " AND fecha_registro >= '".$_POST['fecha_inicial']."'";
    }

    if ($_POST['fecha_fin']) {
        $filtro .= " AND fecha_registro <= '".$_POST['fecha_fin']."'";
    }

    if ($_POST['asesor']) {
        $filtro .= " AND u.ID = '".$_POST['asesor']."'";
    }

    if ($_POST['parque']) {
        $filtro .= " AND cve_parque = '".$_POST['parque']."'";
    }

    if ($_POST['tiene_calendario'] || $_POST['tiene_calendario'] == '0') {
    	$filtro .= " AND IFNULL(p.eventos, 0) = '".$_POST['tiene_calendario']."'";
    }

    if ($_POST['tiene_evidencia'] || $_POST['tiene_evidencia'] == '0') {
    	$filtro .= " AND e.evidencia = '".$_POST['tiene_evidencia']."'";
    }

	$sql = "SELECT IFNULL(p.eventos, 0) AS tiene_calendario, e.*, p.*, u.* 
			FROM evidencia_eventos e
			INNER JOIN wp_posts p ON e.cve_parque = p.ID 
    		INNER JOIN wp_users AS u ON u.ID = p.post_author
    		LEFT JOIN
    			(SELECT * FROM wp_comites_parques
				 GROUP BY cve_parque
				 ORDER BY fecha_visita) AS p  
			ON e.cve_parque = p.cve_parque
    		$filtro
    		ORDER BY fecha_registro";
	
	$res = mysql_query($sql);
	if (mysql_num_rows($res) > 0) {
		echo '<table>
		<tr>
			<td>Fecha Registro</td>
			<td>Asesor</td>
			<td>ID Parque</td>
			<td>Nombre</td>
			<td>Cuenta con calendario</td>
			<td>Fecha de inicio del calendario</td>
			<td>Fecha de fin del calendario</td>
			<td>Cuenta con evidencia</td>
			<td>Evidencia</td>
		</tr>';

		while ($row = mysql_fetch_array($res)) {
			echo '<tr>
				  <td>'.$row['fecha_registro'].
				  		'<input type="hidden" name="fecha_registro[]" value="'.$row['fecha_registro'].
				  		'">
				  </td>
				  <td>'.$asesores[$row['post_author']].
				  		'<input type="hidden" name="asesor[]" value="'.$asesores[$row['post_author']].
				  		'">
				  </td>				
				  <td>'.$row['cve_parque'].
				  		'<input type="hidden" name="cve_parque[]" value="'.$row['cve_parque'].
				  		'">
				  </td>
				  <td>'.$parques[$row['cve_parque']].
				  		'<input type="hidden" name="nom_parque[]" value="'.$parques[$row['cve_parque']]
				  		.'">
				  </td>
				  <td>'.$calendario[$row['eventos']].
				  		'<input type="hidden" name="tiene_calendario[]" value="'.$calendario[$row['tiene_calendario']].'">
				  </td>
				  <td>'.$row['inicio_calendario'].
				  		'<input type="hidden" name="inicio_calendario[]" value="'.$row['inicio_calendario'].'">
				  </td>
				  <td>'.$row['fin_calendario'].
				  		'<input type="hidden" name="fin_calendario[]" value="'.$row['fin_calendario'].
				  		'">
				  </td>
				  <td>'.$evidencias[$row['evidencia']].
				  		'<input type="hidden" name="tiene_evidencia[]" value="'.$evidencias[$row['evidencia']].'">
				  </td>
				  <td>';
			if ($row['archivo'] != "") {  
				$evidencia = explode(",",$row['archivo']);
				foreach ($evidencia as $k => $v) {
					if ($v != "") {
						echo '<a href="calendarios/'.$v.'" target="_blank"><img src="calendarios/'.$v.'" width="150"></a> &nbsp;';
		            }
	            }
        	} else {
        		if ($row['evidencia'] > 0) {
        			echo 'No ha capturado evidencia de calendarios aún';		
        		}
        	}
        	echo '<input type="hidden" name="evidencias[]" value="'.$row['archivo'].'">';
        	echo '</td>';
        	echo '</tr>';
        }
        echo '<tr><td><b>Total:</b></td><td colspan="10"><b>'.mysql_num_rows($res).'</b></td></table>';
		echo '</table>';
	} else {
		echo 'No hay calendarios registrados bajo el criterio de búsqueda.';
	}
	exit();
}	
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de Calendarios - Parques Alegres</title>
</head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<style>
tr.header{
    cursor:pointer;
}
.CSSTableGenerator {
	margin:0px;padding:0px;
	border:1px solid #3f7f00;
	-moz-border-radius-bottomleft:10px;
	-webkit-border-bottom-left-radius:10px;
	border-bottom-left-radius:10px;
	-moz-border-radius-bottomright:10px;
	-webkit-border-bottom-right-radius:10px;
	border-bottom-right-radius:10px;
	-moz-border-radius-topright:10px;
	-webkit-border-top-right-radius:10px;
	border-top-right-radius:10px;
	-moz-border-radius-topleft:10px;
	-webkit-border-top-left-radius:10px;
	border-top-left-radius:10px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:10px;
	-webkit-border-bottom-right-radius:10px;
	border-bottom-right-radius:10px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:10px;
	-webkit-border-top-left-radius:10px;
	border-top-left-radius:10px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:10px;
	-webkit-border-top-right-radius:10px;
	border-top-right-radius:10px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:10px;
	-webkit-border-bottom-left-radius:10px;
	border-bottom-left-radius:10px;
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#d4ffaa; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
	vertical-align:middle;	
	border:1px solid #3f7f00;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:12px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );
	background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);
	background-color:#5fbf00;
	border:0px solid #3f7f00;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:15px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
.reset tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.reset table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.reset table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.reset tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}
.reset tr:nth-child(odd){ background-color: rgba(0, 0, 0, 0); }
.reset tr:nth-child(even)    { background-color: rgba(0, 0, 0, 0); }.reset td{
	vertical-align:middle;
	border:0px;
	border-width:0px 0px 0px 0px;
	text-align:left;
	padding:7px;
	font-size:12px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}
.reset tr:last-child td{
	border-width:0px 0px 0px 0px;
}.reset tr td:last-child{
	border-width:0px 0px 0px 0px;
}.reset tr:first-child td{
		background:-o-linear-gradient(bottom, rgba(0, 0, 0, 0) 5%, rgba(0, 0, 0, 0) 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, rgba(0, 0, 0, 0)), color-stop(1, rgba(0, 0, 0, 0)) );
	background:-moz-linear-gradient( center top, rgba(0, 0, 0, 0) 5%, rgba(0, 0, 0, 0) 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);
	background-color:rgba(0, 0, 0, 0);
	border:0px solid #3f7f00;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:12px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}
.reset tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.reset tr:first-child td:first-child{
	border-width:0px 0px 0px 0px;
}
.reset tr:first-child td:last-child{
	border-width:0px 0px 0px 0px;
}
label {
    display: block;
    margin: 0px 0px 5px;
}
label>span {
    float: left;
    width: 10%;
    text-align: right;
    padding-right: 10px;
    margin-top: 10px;
    color: #969696;
}
select {
    float:left;
    background: #FFF url("down-arrow.png") no-repeat right;
    background: #FFF url("down-arrow.png") no-repeat right);
    appearance:none;
    padding: 3px 3px 3px 5px;
    -webkit-appearance:none; 
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: "";
    width: 18%;
    height: 35px;
	line-height: 25px;
}
input[type="text"]{
    float:left;
    color: #555;
    width: 18%;
    padding: 3px 0px 3px 5px;
    margin-top: 2px;
    margin-right: 6px;
    margin-bottom: 16px;
    border: 1px solid #e5e5e5;
    background: #fbfbfb;
	height: 25px;
	line-height:15px;
    outline: 0;
    -webkit-box-shadow: inset 1px 1px 2px rgba(200,200,200,0.2);
    box-shadow: inset 1px 1px 2px rgba(200,200,200,0.2);
}
.button {
	background: #9DC45F;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #FFF;
	box-shadow: 1px 1px 5px #B6B6B6;
	border-radius: 3px;
	text-shadow: 1px 1px 1px #9E3F3F;
	cursor: pointer;
}
.button:hover {
    background: #80A24A;
}
</style>
<script>
    $(function() {
    	$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
    	buscar();
    });
	function buscar() {
		$("#resultados").text("Cargando...");
		var asesor = document.getElementsByName("asesor")[0].value;
		var parque = document.getElementsByName("parque")[0].value;
        var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
        var fecha_fin = document.getElementsByName("fecha_fin")[0].value;
        var tiene_calendario = document.getElementsByName("tiene_calendario")[0].value;
        var tiene_evidencia = document.getElementsByName("tiene_evidencia")[0].value;
		$("#resultados").load("http://parquesalegres.org/tablet/repcalendarios.php", {asesor: asesor,
		 	parque: parque, fecha_inicial: fecha_inicial, fecha_fin: fecha_fin, 
		 	tiene_calendario: tiene_calendario, tiene_evidencia: tiene_evidencia, cmd: 1});
    }
    function camb(i, v) {
    	if (i == "asesor") {
			$("#parque").html("<option value=\"\">Cargando...</option>"); 

			if (v == 0) {
				<?php 
					$arrjs = '<option value=\"\"> -- Todos -- </option>';
						
					foreach ($parques as $k => $v) {
						$arrjs .= '<option value=\"'.$k.'\">'.$v.'</option>';			
					}
				?>
			$("#parque").html("<?php echo $arrjs; ?>");
			} else {
				$.ajax({url: "repcalendarios.php",
					data: { cmd: 2, asesor: v},
					dataType: "text",
					type: "post",
					success: function(result) {
					    if (result != "no") {
							$("#parque").html(result);
					    } else {
							alert("No hay parques asociados a este asesor");
					    }
					}
				});
			}
		}
    }
</script>
<body>
<center><h2>Reporte de evidencia de calendarios</h2><center>
<form method="post" action="repexcel.php">
	<input type="hidden" name="cmd" value="repcalendarios">
	<label>
		<span>Fecha inicial: </span>
		<input type="text" name="fecha_inicial" readonly id="datepicker" value="<?php echo $fecha_filtro ?>">
	</label>
	<label>
		<span>Fecha final: </span>
		<input type="text" name="fecha_fin" readonly id="datepicker2" value="<?php echo $fecha_filtro2 ?>">
	</label>
	<div style="clear:both;"></div>
	<label>
		<span>Asesor: </span>
		<select name="asesor" id="asesor" onchange="camb(this.id, this.value);"><option value=""> -- Todos -- </option>
		<?php
	    	foreach ($asesores as $k => $v) {
	        	echo '<option value="'.$k.'">'.$v.'</option>';    
	    	}
		?>
		</select>
	</label>
	<label>
		<span>Parque: </span>
		<select name="parque" id="parque"><option value=""> -- Todos -- </option>';
		<?php
		foreach ($parques as $k => $v) {
		    echo '<option value="'.$k.'"'; 
		    if ($_GET['parque'] == $k) { 
		    	echo ' selected'; 
		    } 
		    echo '>'.$v.'</option>';    
		}
		?></select>
	</label>
	<div style="clear:both"></div><br>
	<label>
		<span>Cuenta con calendario: </span>
		<select name="tiene_calendario" id="tiene_calendario">
			<option value=""> -- Todos -- </option>
			<option value="50">Sí</option>
			<option value="0">No</option>
		</select>
	</label>
	<label>
		<span>Cuenta con evidencia: </span>
		<select name="tiene_evidencia" id="tiene_evidencia">
			<option value=""> -- Todos -- </option>
			<option value="1">Fotos</option>
			<option value="0">No</option>
		</select>
	</label>
	<div style="clear:both;"></div><br>
	<center>
		<input class="button" type="button" onclick="buscar();" value="Filtrar">
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" value="Exportar a Excel" class="button"><br><br>
		<div id="resultados" class="CSSTableGenerator"></div>
	</center>
</form>
</body>
</html>