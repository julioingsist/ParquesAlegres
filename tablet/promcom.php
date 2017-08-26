<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['display_name']]=$row['ID'];
}
$personas=array(0=>0,7=>1,14=>2,20=>3);
if($_POST['cmd']==1){
	$args=$_POST['fecha'];
	echo '<table><thead>';
	echo '<tr><td colspan="2" width="20%">Asesor</td><td width="10%">Inicio 2014</td><td width="10%">Fin 2014</td><td width="10%">Inicio 2015</td><td width="10%">Fin 2015</td><td width="10%">Fecha seleccionada</td></tr></thead>';
	$opera=0;
	$opera2=0;
	$opera3=0;
	$opera4=0;
	$opera5=0;
	echo '<tbody>';
	foreach($asesores as $k=>$v){
	    echo '<tr class="header"><th width="5%"></th><th width="15%" align="left">'.$k.'</th>';
	    $sql1="select id, post_title from wp_posts where post_status='publish' and post_type='parque' and post_author='".$v."'";
	    $res1=mysql_query($sql1);
	    $pera1=0;
	    $pera2=0;
	    $pera3=0;
	    $pera4=0;
	    $pera5=0;
	    $fila="";
	    while($row1=mysql_fetch_array($res1)){
		$per1=0;
		$per2=0;
		$per3=0;
		$per4=0;
		$per5=0;
		$parque[$row1['id']]=$row1['post_title'];
		$sql5="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='2014-01-01' order by fecha_visita DESC, cve DESC limit 1";
		$res5=mysql_query($sql5);
		if(mysql_num_rows($res5)>0){
		    while($row5=mysql_fetch_array($res5)){
			$opera+=$personas[$row5['opera']];
			$pera1+=$personas[$row5['opera']];
			$per1=$personas[$row5['opera']];
		    }
		}
		$sql4="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>'2014-01-01' and fecha_visita<='2014-12-31' order by fecha_visita DESC, cve DESC limit 1";
		$res4=mysql_query($sql4);
		if(mysql_num_rows($res4)>0){
		    while($row4=mysql_fetch_array($res4)){
			$opera2+=$personas[$row4['opera']];
			$pera2+=$personas[$row4['opera']];
			$per2=$personas[$row4['opera']];
		    }
		}
		$sql6="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='2015-01-01' order by fecha_visita DESC, cve DESC limit 1";
		$res6=mysql_query($sql6);
		if(mysql_num_rows($res6)>0){
		    while($row6=mysql_fetch_array($res6)){
			$opera3+=$personas[$row6['opera']];
			$pera3+=$personas[$row6['opera']];
			$per3=$personas[$row6['opera']];
		    }
		}
		$sql7="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>'2015-01-01' and fecha_visita<='2015-12-31' order by fecha_visita DESC, cve DESC limit 1";
		$res7=mysql_query($sql7);
		if(mysql_num_rows($res7)>0){
		    while($row7=mysql_fetch_array($res7)){
			$opera4+=$personas[$row7['opera']];
			$pera4+=$personas[$row7['opera']];
			$per4=$personas[$row7['opera']];
		    }
		}
		$sql8="select cve_parque,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='".$args."' order by fecha_visita DESC, cve DESC limit 1";
		$res8=mysql_query($sql8);
		if(mysql_num_rows($res8)>0){
		    while($row8=mysql_fetch_array($res8)){
			$opera5+=$personas[$row8['opera']];
			$pera5+=$personas[$row8['opera']];
			$per5=$personas[$row8['opera']];
		    }
		}
		$fila.='<tr style="display:none;"><td width="5%">'.$row1['id'].'</td><td width="15%">'.$row1['post_title'].'</td><td width="10%">'.$per1.'</td><td width="10%">'.$per2.'</td><td width="10%">'.$per3.'</td><td width="10%">'.$per4.'</td><td width="10%">'.$per5.'</td></tr>';
	    }
	    echo '<th width="10%">'.$pera1.'</th><th width="10%">'.$pera2.'</th><th width="10%">'.$pera3.'</th><th width="10%">'.$pera4.'</th><th width="10%">'.$pera5.'</th width="10%"></tr>'.$fila;
	}
	$prom2014=round(($opera+$opera2)/2);
	$prom2015=round(($opera3+$opera4)/2);
	echo '<tr><th colspan="2" width="20%">Total:</th><th width="10%">'.$opera.'</th><th width="10%">'.$opera2.'</th><th width="10%">'.$opera3.'</th><th width="10%">'.$opera4.'</th><th width="10%">'.$opera5.'</th></tr>';
	echo '<tr><th colspan="2" width="20%">Promedio:</th><th colspan="2" width="20%">'.$prom2014.'</th><th colspan="2" width="20%">'.$prom2015.'</th><th width="10%">'.$opera5.'</th></tr>';
	echo '</tbody></table>';
	exit();
}
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Promedio anual de comités</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<style>
table{
	width:100%;
}
thead, tbody { display: block; }

tbody {
    height: 400px;
    overflow-y: auto;
    overflow-x: hidden;
}
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
</style>';
echo '<script>
$(function() {
	buscar();
	$("#datepicker").datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	$("body").on("click",".header",function(){
		$(this).nextUntil("tr.header").slideToggle();
        });
});

function buscar(){
	$("#resultados").text("Cargando...");
	var fecha = document.getElementsByName("fecha")[0].value;
	$("#resultados").load("http://parquesalegres.org/tablet/promcom.php", {fecha: fecha, cmd: 1});
}
</script></head>';
echo '<body>
<form method="post" action="repexcel.php">
<input type="hidden" name="cmd" value="promcom">
<h3 style="text-align:center">Reporte de promedios de comites</h2>
<label><span>Fecha: </span><input type="text" name="fecha" readonly id="datepicker" value="'.date("Y-m-").'01"></label>
<input class="button" type="button" onclick="buscar(\'promcom.php\',\'datepicker\');" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Exportar a Excel"><br><br>
Nota: Se puede dar click en el nombre del asesor para ver el detallado por parque<br><br>';
echo '<center><div id="resultados" class="CSSTableGenerator"></div></center>';
echo '</body>
</html>';
?>