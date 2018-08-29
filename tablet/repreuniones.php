<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio",
			 "07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre",
			 "12"=>"Diciembre");
$param=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",
			 7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",11=>"ingresop",
			 12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",
			 17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");

if ($_POST['cmd'] == 1) {
	echo '<table>
	<tr>
	<th>ID Parque</th><th>Nombre</th><th>Evidencia</th><th>Fecha Registro</th></tr>';
	$sql1 = "select id,post_title from wp_posts where post_status='publish' and post_type='parque'";
	$res1 = mysqli_query($enlace, $sql1);
	while ($row1 = mysqli_fetch_array($res1)){
		echo '<tr>
		<td>'.$row1['id'].'</td><td>'.$row1['post_title'].'</td>';
		$sql2 = "select * from comite_reuniones WHERE cve_parque='".$row1['id']."'";
		$res2 = mysqli_query($enlace, $sql2);
		if (mysqli_num_rows($res2) > 0) {
			$row2 = mysqli_fetch_array($res2);
			echo '<td>';

			if ($row2['archivo']!=""){ 
				$evidencia = explode(",",$row2['archivo']);
				foreach ($evidencia as $k=>$v) {
	            	if ($v != "") {
	            		echo '<a href="reuniones/'.$v.'" target="_blank"><img src="reuniones/'.$v.'" width="150"></a> &nbsp;';
	            	}
            	}
            }
			echo '</td><td>'.$row2['fecha_registro'].'</td>';
		} else {
			echo '<td colspan="2">No ha capturado evidencia de reuniones aun</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
	exit();
}

if ($_GET['fecha_ini'] != "") {
	$fecha_filtro = $_GET['fecha_ini'];
} else {
	$fecha_filtro = date("Y-m-").'01';
}

if ($_GET['fecha_fin'] != "") {
	$fecha_filtro2 = $_GET['fecha_fin'];	
} else {
	$fecha_filtro2 = date("Y-m-t");
}
?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de Reuniones - Parques Alegres</title>
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
		var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
        var fecha_fin = document.getElementsByName("fecha_fin")[0].value;
		$("#resultados").load("http://localhost/web-site/tablet/repreuniones.php", {fecha_inicial: fecha_inicial, fecha_fin: fecha_fin, cmd: 1});
    }
</script>
<?php
$sql = "SELECT a.ID,u.display_name 
		FROM asesores AS a INNER JOIN wp_users AS u ON a.ID = u.ID 
		WHERE stat < 1";
$res = mysqli_query($enlace, $sql);
while ($row = mysqli_fetch_array($res)) {
	$asesores[$row['ID']] = $row['display_name'];
}
?>

<body>
<center><h2>Reporte de reuniones</h2>
<form method="post" action="repexcel.php">
<label>
	<span>Fecha inicial: </span>
	<input type="text" name="fecha_inicial" readonly id="datepicker" value="<?php echo $fecha_filtro ?>">
</label>
<label>
	<span>Fecha final: </span>
	<input type="text" name="fecha_fin" readonly id="datepicker2" value="<?php echo $fecha_filtro2 ?>">
</label>
<div style="clear:both;"></div><br>
<center>
	<input type="hidden" value="repreuniones" name="cmd">
	<input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="Exportar a Excel" class="button">
<br><br>
<div id="resultados" class="CSSTableGenerator"></div>
</center>
</form>
</body>
</html>