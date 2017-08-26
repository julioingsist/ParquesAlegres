<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1 order by u.display_name ASC";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['ID']]=$row['display_name'];
}
$sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_array($res2)) {
	$parques[$row2['ID']]=$row2['post_title'];
}
$tipovisita=array(1=>"Reforzamiento",2=>"Seguimiento",3=>"Evento",4=>"Prospectación",5=>"Formacion de comité");
if($_POST['cmd']==3){
	$sql="SELECT u.display_name,p.post_title, b.cve_parque, b.fec ,b.fecha_visita, b.opera,b.formaliza,b.organiza,b.reunion,b.proyecto,
        ROUND((b.opera+b.formaliza+b.organiza+b.reunion+b.proyecto)) as 'TOTAL COMITE',b.instalaciones,b.estado,b.disenio,b.ejecutivo,b.vespacio,
        ROUND((b.instalaciones+b.estado+b.disenio+b.ejecutivo+b.vespacio)) as 'TOTAL INSTALACIONES',b.ingresop,b.ingresadop,b.mancomunado,
        ROUND((b.ingresop+b.ingresadop+b.mancomunado)) as 'TOTAL INGRESOS',b.eventos,b.eventosr,ROUND((b.eventos+b.eventosr)) as 'TOTAL EVENTOS',
        b.averdes,b.estaver,ROUND((b.averdes+b.estaver)) as 'TOTAL AREAS VERDES', b.gente, b.gente as 'TOTAL AFLUENCIA',b.limpieza,b.orden,b.respint,
        ROUND((b.limpieza+b.orden+b.respint)) as 'TOTAL ORDEN',ROUND((b.opera+b.formaliza+b.organiza+b.reunion+b.proyecto+b.disenio+b.ejecutivo+b.vespacio+b.estado+b.instalaciones+b.ingresop+b.ingresadop+b.mancomunado+b.eventosr+b.eventos+b.averdes+b.estaver+b.gente+b.respint+b.orden+b.limpieza)/7) as 'Total Calificación'
	FROM wp_comites_parques AS b INNER JOIN wp_posts p ON p.ID=b.cve_parque INNER JOIN wp_users u ON p.post_author=u.ID, (SELECT MAX(cve) AS maxcve, MAX(fecha_visita) AS maxfecha FROM wp_comites_parques GROUP BY cve_parque) AS v2 WHERE v2.maxcve=b.cve AND p.post_type='parque' AND p.post_status='publish'";
	$res=mysql_query($sql);
        if(mysql_num_rows($res)>0){
		echo '<table id="tabla1">
		<thead><tr>
		<th data-sort="string">Asesor</th>
		<th data-sort="int">ID</th><th data-sort="string">Parque</th>
		<th data-sort="int">Opera</th><th data-sort="int">Formalizado</th>
		<th data-sort="int">Organización</th><th data-sort="int">Reuniones</th><th data-sort="int">Proyectos</th><th data-sort="int">Total comité</th><th data-sort="int">Instalaciones</th><th data-sort="int">En buen estado</th>
		<th data-sort="int">Proyecto de diseño</th><th data-sort="int">Proyecto ejecutivo</th><th data-sort="int">Visión del espacio</th><th data-sort="int">Total instalaciones</th><th data-sort="int">Ingresos permanentes</th><th data-sort="int">Es suficiente?</th>
		<th data-sort="int">Cuenta mancomunada</th><th data-sort="int">Total ingresos</th><th data-sort="int">Calendario anual</th><th data-sort="int">Regularidad de eventos</th><th data-sort="int">Total eventos</th><th data-sort="int">Árboles, cesped y jardín</th>
		<th data-sort="int">En buen estado</th><th data-sort="int">Total areas verdes</th><th data-sort="int">Afluencia</th><th data-sort="int">Total Afluencia</th><th data-sort="int">Limpio</th><th data-sort="int">Reglamento de orden</th><th data-sort="int">Se respetan las instalaciones?</th>
		<th data-sort="int">Total orden</th><th data-sort="int">Total calificación</th><th data-sort="string">Fecha de captura</th><th data-sort="string">Fecha de visita</th></tr></thead>
		<tbody>';
		while($row=mysql_fetch_array($res)){
			echo '<tr><td>'.$row['display_name'].'</td><td>'.$row['cve_parque'].'</td><td>'.$row['post_title'].'</td>
			<td>'.$row['opera'].'</td><td>'.$row['formaliza'].'</td><td>'.$row['organiza'].'</td><td>'.$row['reunion'].'</td><td>'.$row['proyecto'].'</td>
			<td>'.$row['TOTAL COMITE'].'</td><td>'.$row['instalaciones'].'</td><td>'.$row['estado'].'</td><td>'.$row['disenio'].'</td>
			<td>'.$row['ejecutivo'].'</td><td>'.$row['vespacio'].'</td><td>'.$row['TOTAL INSTALACIONES'].'</td><td>'.$row['ingresop'].'</td>
			<td>'.$row['ingresadop'].'</td><td>'.$row['mancomunado'].'</td><td>'.$row['TOTAL INGRESOS'].'</td><td>'.$row['eventos'].'</td>
			<td>'.$row['eventosr'].'</td><td>'.$row['TOTAL EVENTOS'].'</td><td>'.$row['averdes'].'</td><td>'.$row['estaver'].'</td>
			<td>'.$row['TOTAL AREAS VERDES'].'</td><td>'.$row['gente'].'</td><td>'.$row['TOTAL AFLUENCIA'].'</td><td>'.$row['limpieza'].'</td>
			<td>'.$row['orden'].'</td><td>'.$row['respint'].'</td><td>'.$row['TOTAL ORDEN'].'</td><td>'.$row['Total Calificación'].'</td>
			<td>'.$row['fec'].'</td><td>'.$row['fecha_visita'].'</td></tr>';
		}
		echo '</tbody>
		</table>';
	}
	else{
	    echo 'no';
	}
	exit();
}
if($_POST['cmd']==2){
	$sql="select id,post_title from wp_posts WHERE post_author='".$_POST['asesor']."' AND post_status='publish' AND post_type='parque' order by post_title ASC";
	$res=mysql_query($sql);
	if(mysql_num_rows($res)>0){
		echo '<option value=""> -- Todos --</option>';
		while($row=mysql_fetch_array($res)){
		    echo '<option value="'.$row['id'].'">'.$row['post_title'].'</option>';
		}
	}
	else{
	    echo 'no';
	}
	exit();
}
if($_POST['cmd']==1){
	echo '<table id="tabla1">
	<thead><tr>
        <th data-sort="string">Capturado por:</th><th data-sort="string">Asesor asignado:</th><th data-sort="string">ID</th><th data-sort="string">Parque</th><th data-sort="int">Opera</th><th data-sort="int">Formalizado</th>
        <th data-sort="int">Organización</th><th data-sort="int">Reuniones</th><th data-sort="int">Proyectos</th><th data-sort="int">Total comité</th><th data-sort="int">Instalaciones</th><th data-sort="int">En buen estado</th>
        <th data-sort="int">Proyecto de diseño</th><th data-sort="int">Proyecto ejecutivo</th><th data-sort="int">Visión del espacio</th><th data-sort="int">Total instalaciones</th><th data-sort="int">Ingresos permanentes</th><th data-sort="int">Es suficiente?</th>
        <th data-sort="int">Cuenta mancomunada</th><th data-sort="int">Total ingresos</th><th data-sort="int">Calendario anual</th><th data-sort="int">Regularidad de eventos</th><th data-sort="int">Total eventos</th><th data-sort="int">Árboles, cesped y jardín</th>
        <th data-sort="int">En buen estado</th><th data-sort="int">Total areas verdes</th><th data-sort="int">Afluencia</th><th data-sort="int">Total Afluencia</th><th data-sort="int">Limpio</th><th data-sort="int">Reglamento de orden</th><th data-sort="int">Se respetan las instalaciones?</th>
        <th data-sort="int">Total orden</th><th data-sort="int">Total calificación</th><th data-sort="string">Fecha de captura</th><th data-sort="string">Fecha de visita</th><th data-sort="string">Tipo de visita</th></tr></thead>';
	$filtro="";
	if($_POST['fecha_inicial']!=""){
		$filtro.=" AND b.fecha_visita>='".$_POST['fecha_inicial']."'";
	}
	if($_POST['fecha_fin']!=""){
		$filtro.=" AND b.fecha_visita<='".$_POST['fecha_fin']."'";
	}
	if($_POST['asesor']){
		$filtro.=" AND us.id='".$_POST['asesor']."'";
	}
	if($_POST['fecha_ini_cap']!=""){
		$filtro.=" AND b.fec>='".$_POST['fecha_ini_cap']."'";
	}
	if($_POST['fecha_fin_cap']!=""){
		$filtro.=" AND b.fec<='".$_POST['fecha_fin_cap']."'";
	}
	if($_POST['tipo']){
		$filtro.=" AND c.tipo_visita='".$_POST['tipo']."'";
	}
	if($_POST['parque']){
		$filtro.=" AND a.ID='".$_POST['parque']."'";
	}
	if($_POST['capturado']){
		$filtro.=" AND u.id='".$_POST['capturado']."'";
	}
        $sql1="SELECT a.ID, a.post_title,us.display_name as asesor,u.display_name,b.opera,b.formaliza,b.organiza,b.reunion,b.proyecto,
        ROUND((b.opera+b.formaliza+b.organiza+b.reunion+b.proyecto)) as 'TOTAL COMITE',b.instalaciones,b.estado,b.disenio,b.ejecutivo,b.vespacio,
        ROUND((b.instalaciones+b.estado+b.disenio+b.ejecutivo+b.vespacio)) as 'TOTAL INSTALACIONES',b.ingresop,b.ingresadop,b.mancomunado,
        ROUND((b.ingresop+b.ingresadop+b.mancomunado)) as 'TOTAL INGRESOS',b.eventos,b.eventosr,ROUND((b.eventos+b.eventosr)) as 'TOTAL EVENTOS',
        b.averdes,b.estaver,ROUND((b.averdes+b.estaver)) as 'TOTAL AREAS VERDES', b.gente, b.gente as 'TOTAL AFLUENCIA',b.limpieza,b.orden,b.respint,
        ROUND((b.limpieza+b.orden+b.respint)) as 'TOTAL ORDEN',ROUND((b.opera+b.formaliza+b.organiza+b.reunion+b.proyecto+b.disenio+b.ejecutivo+b.vespacio+b.estado+b.instalaciones+b.ingresop+b.ingresadop+b.mancomunado+b.eventosr+b.eventos+b.averdes+b.estaver+b.gente+b.respint+b.orden+b.limpieza)/7) as 'Total Calificación',
        b.fec, b.fecha_visita, CASE c.tipo_visita WHEN 1 THEN 'reforzamiento' WHEN 2 THEN 'seguimiento' WHEN 3 THEN 'evento' WHEN 4 THEN 'prospectacion' WHEN 5 THEN 'formacion' ELSE 'NULL' END as 'tipo_visita'
        FROM wp_posts as a INNER JOIN wp_users us ON us.id=a.post_author, wp_comites_parques as b LEFT JOIN wp_visitascom_parques as c ON b.cve=c.cve_visita LEFT JOIN wp_users u ON u.id=b.asesor_captura WHERE a.ID=b.cve_parque and post_type = 'parque' AND post_status = 'publish' $filtro";
        $res1=mysql_query($sql1);
	echo '<tbody>';
        while($row1=mysql_fetch_array($res1)){
            echo '<tr><td>'.$row1['display_name'].'</td><td>'.$row1['asesor'].'</td><td>'.$row1['ID'].'</td><td>'.$row1['post_title'].'</td><td>'.$row1['opera'].'</td><td>'.$row1['formaliza'].'</td>
            <td>'.$row1['organiza'].'</td><td>'.$row1['reunion'].'</td><td>'.$row1['proyecto'].'</td><td>'.$row1['TOTAL COMITE'].'</td><td>'.$row1['instalaciones'].'</td>
            <td>'.$row1['estado'].'</td><td>'.$row1['disenio'].'</td><td>'.$row1['ejecutivo'].'</td><td>'.$row1['vespacio'].'</td><td>'.$row1['TOTAL INSTALACIONES'].'</td>
            <td>'.$row1['ingresop'].'</td><td>'.$row1['ingresadop'].'</td><td>'.$row1['mancomunado'].'</td><td>'.$row1['TOTAL INGRESOS'].'</td><td>'.$row1['eventos'].'</td>
            <td>'.$row1['eventosr'].'</td><td>'.$row1['TOTAL EVENTOS'].'</td><td>'.$row1['averdes'].'</td><td>'.$row1['estaver'].'</td><td>'.$row1['TOTAL AREAS VERDES'].'</td>
            <td>'.$row1['gente'].'</td><td>'.$row1['TOTAL AFLUENCIA'].'</td><td>'.$row1['limpieza'].'</td><td>'.$row1['orden'].'</td><td>'.$row1['respint'].'</td>
            <td>'.$row1['TOTAL ORDEN'].'</td><td>'.$row1['Total Calificación'].'</td><td>'.$row1['fec'].'</td><td>'.$row1['fecha_visita'].'</td><td>'.$row1['tipo_visita'].'</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
	exit();
}
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de parámetros con calificación</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script src="stupidtable.js"></script>
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
</style>';
echo '<script>
$(function() {
	buscar();
	$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	$( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	$( "#datepicker3" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	$( "#datepicker4" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
});
$(document).ajaxComplete(function() {
	$("#tabla1").stupidtable();
	var $table = $("#tabla1").stupidtable();
	var $th_to_sort = $table.find("thead th").eq(3);
	$th_to_sort.stupidsort("desc");
});

function last(){
	$("#resultados").text("Cargando...");
	document.getElementsByName("ult_visita")[0].value=1;
	$("#resultados").load("http://parquesalegres.org/tablet/parametros.php", {cmd: 3});
}
function buscar(){
	$("#resultados").text("Cargando...");
	document.getElementsByName("ult_visita")[0].value=0;
	var asesor = document.getElementsByName("asesor")[0].value;
	var parque = document.getElementsByName("parque")[0].value;
	var capturado = document.getElementsByName("capturado")[0].value;
	var tipo = document.getElementsByName("tipo")[0].value;
	var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
        var fecha_fin = document.getElementsByName("fecha_fin")[0].value;
	var fecha_ini_cap= document.getElementsByName("fecha_ini_cap")[0].value;
        var fecha_fin_cap = document.getElementsByName("fecha_fin_cap")[0].value;
	if($("#sin_fecha_vis").is(":checked")){
		var fecha_inicial = ""
		var fecha_fin = ""
	}
	else{
		var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
		var fecha_fin = document.getElementsByName("fecha_fin")[0].value;
	}
	if($("#sin_fecha_cap").is(":checked")){
		var fecha_ini_cap = "";
		var fecha_fin_cap = ""
	}
	else{
		var fecha_ini_cap= document.getElementsByName("fecha_ini_cap")[0].value;
		var fecha_fin_cap = document.getElementsByName("fecha_fin_cap")[0].value;
	}
	$("#resultados").load("http://parquesalegres.org/tablet/parametros.php", {asesor: asesor, parque: parque, capturado: capturado, fecha_inicial: fecha_inicial, fecha_fin: fecha_fin, tipo: tipo, fecha_ini_cap: fecha_ini_cap, fecha_fin_cap: fecha_fin_cap, cmd: 1});
}
function camb(i,v){
	if(i=="asesor"){
		$("#parque").html("<option value=\"\">Cargando...</option>");
		if(v==0){';
			$arrjs="";
			foreach($parques as $k=>$v){
				$arrjs.='"'.$k.'": "'.$v.'",';
			}
			$arrjs=substr($arrjs, 0, -1);
			echo '
			var newOptions = {"0": "-- Todos --",
			'.$arrjs.'
			};
			var $el = $("#parque");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});
			
		}
		else{
			$.ajax({url: "parametros.php",
				data: { cmd: 2, asesor: v},
				dataType: "text",
				type: "post",
				success: function(result){
				    if(result!="no"){
					$("#parque").html(result);
				    }
				    else{
					alert("No hay parques asociados a este asesor");
				    }
				}
			});
		}
	}
}
</script></head>';
echo '<body>
<form method="post" action="repexcel.php">
<input type="hidden" name="cmd" value="parametros">
<input type="hidden" name="ult_visita" value=0>
<h3 style="text-align:center">Reporte de parámetros con calificación</h2>
<label><span>Fecha Visita inicial: </span><input type="text" name="fecha_inicial" readonly id="datepicker" value="'.date("Y-m-").'01"></label>
<label><span>Fecha Visita final: </span><input type="text" name="fecha_fin" readonly id="datepicker2" value="'.date("Y-m-t").'"></label>
<label><input type="checkbox" name="sin_fecha_vis" id="sin_fecha_vis" value="1"><span> Sin Fecha Visita</span></label>
<div style="clear:both;"></div>
<label><span>Fecha Captura inicial: </span><input type="text" name="fecha_ini_cap" readonly id="datepicker3" value="'.date("Y-m-").'01"></label>
<label><span>Fecha Captura final: </span><input type="text" name="fecha_fin_cap" readonly id="datepicker4" value="'.date("Y-m-t").'"></label>
<label><input type="checkbox" name="sin_fecha_cap" id="sin_fecha_cap" value="1"><span> Sin Fecha Captura</span></label>
<div style="clear:both;"></div>
<label><span>Tipo de Visita: </span><select name="tipo" id="tipo"><option value=""> -- Todos -- </option>';
foreach($tipovisita as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';    
}
echo '</select></label>
<label><span>Asesor: </span><select name="asesor" id="asesor" onchange="camb(this.id,this.value);"><option value=""> -- Todos -- </option>';
foreach($asesores as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';    
}
echo '</select></label>
<div style="clear:both;"></div>
<label><span>Capturado por: </span><select name="capturado" id="capturado"><option value=""> -- Todos -- </option>';
foreach($asesores as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';    
}
echo '</select></label>
<label><span>Parque: </span><select name="parque" id="parque"><option value=""> -- Todos -- </option>';
foreach($parques as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';    
}
echo '</select></label>
<div style="clear:both;"></div><br>
<center>
<input class="button" type="button" onclick="last();" value="Ultima visita">&nbsp;&nbsp;&nbsp;&nbsp;
<input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;
<input class="button" type="submit" value="Exportar a Excel"><br><br>
<div id="resultados" class="CSSTableGenerator"></div></center>
<span id="msg"></span></form>';
echo '</body>
</html>';
?>