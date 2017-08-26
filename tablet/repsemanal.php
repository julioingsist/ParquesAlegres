<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1 order by u.display_name ASC";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['ID']]=$row['display_name'];
}
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
if($_POST['cmd']==1){
	$begin = new DateTime($_POST['fecha_inicial']);
	$end = new DateTime($_POST['fecha_fin']);
	$interval = DateInterval::createFromDateString('7 days');
	$period = new DatePeriod($begin, $interval, $end);
	echo '<table><thead><tr>';
	foreach ( $period as $dt ){
		$fechap=$dt->format("W");
		if($fechap>52){
			$anio=$dt->format("Y");
			$anio=$anio-1;
			$fechai=date("Y-m-d", strtotime($anio.'W'.$fechap));
		}
		else{
			$fechai=date("Y-m-d", strtotime($dt->format("Y").'W'.$fechap));	
		}
		$diai=substr($fechai,8,2);
		$finsem=date('Y-m-d', strtotime($fechai. ' + 6 days'));
		$mes=substr($finsem,5,2);
		$diaf=substr($finsem,8,2);
		$numsem.='<th>'.$diai.' al '.$diaf.' de '.$meses[$mes].'<br>Semana #'.$fechap.'';
		$sql2="select SUM(visitas) as totvisitas,COUNT(visitas) as parques,(SUM(suma)/7) as promedio from (select COUNT(v.cve) as visitas, (SUM(v.opera)+SUM(v.formaliza)+SUM(v.organiza)+SUM(v.reunion)+SUM(v.proyecto)+SUM(v.disenio)+SUM(v.ejecutivo)+SUM(v.vespacio)+SUM(v.instalaciones)+SUM(v.estado)+SUM(v.ingresop)+SUM(v.ingresadop)+SUM(v.mancomunado)+SUM(v.eventos)+SUM(v.eventosr)+SUM(v.averdes)+SUM(v.estaver)+SUM(v.gente)+SUM(v.limpieza)+SUM(v.orden)+SUM(v.respint)) as suma from wp_comites_parques v INNER JOIN wp_posts parque ON v.cve_parque=parque.id where parque.post_status='publish' AND v.fecha_visita<='".$finsem."' group by v.cve_parque) as a";
		$res2=mysql_query($sql2);
		$row2=mysql_fetch_array($res2);
		$visitas.='<td>'.$row2['totvisitas'];
		$primercon.='<td>'.$row2['parques'];
		if($row2['promedio']>0 && $row2['totvisitas']>0){
			$calprom.='<td>'.round($row2['promedio']/$row2['totvisitas']);
		}
		else{
			$calprom.='<td>';
		}
	}
	echo '<th>Semana=></th>';
	$columns=explode("<th>",$numsem);
	$columns=array_reverse($columns);
	foreach($columns as $k=>$v){
		echo '<th>'.$v.'</th>';
	}
	echo '</tr></thead>
	<tbody><tr><th>Visitas</th>';
	$visitas=explode("<td>",$visitas);
	$visitas=array_reverse($visitas);
	foreach($visitas as $k=>$v){
		echo '<td>'.$v.'</td>';
	}
	echo '</tr></tbody></table>';
	exit();
}
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Semanal de Avance PA</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<style>
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
.CSSTableGenerator table tr:first-child th:first-child {
	-moz-border-radius-topleft:10px;
	-webkit-border-top-left-radius:10px;
	border-top-left-radius:10px;
}
.CSSTableGenerator table tr:first-child th:last-child {
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
.CSSTableGenerator tr:first-child th{
		background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );
	background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);

	background-color:#5fbf00;
        cursor:pointer;
	border:0px solid #3f7f00;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:15px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child th:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child th:last-child{
	border-width:0px 0px 1px 1px;
}
.reset tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.reset table tr:first-child th:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.reset table tr:first-child th:last-child {
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
}.reset tr:first-child th{
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
.reset tr:first-child th:first-child{
	border-width:0px 0px 0px 0px;
}
.reset tr:first-child th:last-child{
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
	buscar();
	$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	$( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
});
function buscar(){
	$("#resultados").text("Cargando...");
	var asesor = document.getElementsByName("asesor")[0].value;
	var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
        var fecha_fin = document.getElementsByName("fecha_fin")[0].value;
	$("#resultados").load("http://parquesalegres.org/tablet/repsemanal.php", {asesor: asesor, fecha_inicial: fecha_inicial, fecha_fin: fecha_fin, cmd: 1});
}
</script></head>';
echo '<body><form method="post" action="repexcel.php">
<input type="hidden" name="cmd" value="repsemanal">
<h3 style="text-align:center">Reporte Semanal de Avance PA</h2>
<label><span>Fecha Inicial: </span><input type="text" name="fecha_inicial" readonly id="datepicker" value="'.date("Y").'-01-01"></label>
<label><span>Fecha final: </span><input type="text" name="fecha_fin" readonly id="datepicker2" value="'.date("Y-m-t").'"></label>
<label><span>Asesor: </span><select name="asesor" id="asesor"><option value=""> -- Todos -- </option>';
foreach($asesores as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';    
}
echo '</select></label>
<div style="clear:both;"></div><br>
<center>
<input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;
<input class="button" type="submit" value="Exportar a Excel"><br><br>
<div id="resultados" class="CSSTableGenerator"></div></center>
</form>
</body></html>';
?>  