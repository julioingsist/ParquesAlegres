<?php
require_once('../wp-config.php');
require('fpdf17/fpdf.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$param=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",
                  11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");
$sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_array($res2)) {
	$parques[$row2['ID']]=$row2['post_title'];
}
if($_POST['cmd']==1){
    echo '<table id="simpleTable">';
    echo '<thead><tr><th width="25%" data-sort="string">Parque</th><th width="25%" data-sort="int">Calificación Anterior</th><th width="25%" data-sort="int">Calificación Actual</th><th width="25%" data-sort="int" data-sort-default="asc">Diferencia</th></tr></thead>';
    if($_POST['parque']){
	$filtro="AND p.id='".$_POST['parque']."'";
    }
    $sql1="select p.id,post_title from wp_posts as p INNER JOIN asesores as a ON p.post_author=a.ID AND a.stat<1 where post_status='publish' and post_type='parque' $filtro";
    $res1=mysql_query($sql1);
    $fechainicio=$_POST['fecha_inicial'];
    $fechafin=$_POST['fecha_final'];
    $fecha=split("-",$fechainicio);
    $fecha2=split("-",$fechafin);
    $anio=$fecha[0]-1;
    $anio2=$fecha2[0]-1;
    while($row1=mysql_fetch_array($res1)){
	    $sql5="select cve,cve_parque FROM wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='".$anio."-".$fecha[1]."-".$fecha[2]."' order by fecha_visita DESC, cve DESC limit 1";
	    $res5=mysql_query($sql5);
	    if(mysql_num_rows($res5)>0){
		    $row5=mysql_fetch_array($res5);
		    $sql2="select cve_parque, ";
		    foreach($param as $v){
			    $sql2.=$v."+";
		    }
		    $sql2 = substr($sql2, 0, -1);
		    $sql2.=" as calif from wp_comites_parques where cve='".$row5['cve']."'";
		    $res2=mysql_query($sql2);
		    $sumaant=0;
		    $califant=0;
		    if(mysql_num_rows($res2)>0){
			    while($row2=mysql_fetch_array($res2)){
				    $sumaant=$sumaant+($row2['calif']/7);
				    }
			    $califant=round($sumaant/mysql_num_rows($res2));
		    }
	    }
	    else{
		    $califant=0;
	    }
	    $sql4="select cve,cve_parque FROM wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='".$fechafin."' order by fecha_visita DESC, cve DESC limit 1";
	    $res4=mysql_query($sql4);
	    if(mysql_num_rows($res4)>0){
		    $row4=mysql_fetch_array($res4);
	    }
	    $sql3="select cve_parque, ";
	    foreach($param as $v){
		    $sql3.=$v."+";
	    }
	    $sql3 = substr($sql3, 0, -1);
	    $sql3.=" as calif from wp_comites_parques where cve='".$row4['cve']."'";
	    $res3=mysql_query($sql3);
	    $suma=0;
	    $calif=0;
	    if(mysql_num_rows($res3)>0){
		    while($row3=mysql_fetch_array($res3)){
			    $suma=$suma+($row3['calif']/7);
			    }
		    $calif=round($suma/mysql_num_rows($res3));
	    }
	    $dif=$calif-$califant;
	    if($califant>0){
		    echo '<tr><td><a href="'; echo get_permalink($row1['id']); echo '" target="_blank">'.$row1['post_title'].'</a></td><td>'.$califant.'</td><td>'.$calif.'</td><td>'.$dif.'</td></tr>';	
	    }
    }
    echo '</table>';
    exit();
}
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de Comparación</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script src="stupidtable.js"></script>
<script>
    $(function() {
	$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	$( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	buscar();
    });
    $(document).ajaxComplete(function() {
	$("#simpleTable").stupidtable();
	var $table = $("#simpleTable").stupidtable();
	var $th_to_sort = $table.find("thead th").eq(3);
	$th_to_sort.stupidsort("desc");
    });
    function buscar(){
	$("#resultados").text("Cargando...");
	var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
	var fecha_final = document.getElementsByName("fecha_final")[0].value;
	var parque = document.getElementsByName("parque")[0].value;
	$("#resultados").load("http://parquesalegres.org/tablet/repcompara.php", {fecha_inicial: fecha_inicial, fecha_final: fecha_final, parque: parque, cmd: 1});
    }
</script>
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
</head>';
echo '<body>';
if(date('m')<12){
	$mes=date('m')+1;
	$anio=date('Y');
}
else{
	//Si lo es entonces aumentamos un año y definimos al primer mes
	$mes=01;
	$anio=date('Y')+1;
}
//checamos cual es el ultimo dia del mes en el que estamos
$fecha = date('Y-m-d', strtotime(date(''.$anio.'-'.$mes.'-01'). ' - 1 days'));
$dia = substr($fecha, -2);
//Si el dia es diferente al dia actual entonces retrocedemos un mes
if($dia!=date('d')){
	$mes=$mes-2;
	$mes1=$mes+1;
	if($mes<10){
	    $mes='0'.$mes;
	}
	$fechainicio=date('Y-'.$mes.'-01');
	$fechafin=date('Y-m-d', strtotime(date('Y-'.$mes1.'-01'). ' - 1 days'));
}
else{
	//sino dejamos el mismo mes
	$fechainicio=date('Y-m-01');
	$fechafin=date('Y-m-d', strtotime(date('Y-'.$mes.'-01'). ' - 1 days'));
}
echo '<form method="post" action="repexcel.php">
<label><span>Parque: </span><select name="parque" id="parque"><option value=""> -- Todos -- </option>';
foreach($parques as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';    
}
echo '</select></label><label><span>Fecha de inicio:</span><input type="text" readonly id="datepicker" value="'.$fechainicio.'" name="fecha_inicial"/></label>
<label><span>Fecha Final:</span><input type="text" readonly id="datepicker2" value="'.$fechafin.'" name="fecha_final"/></label>
<div style="clear:both;"></div>
<center><input type="button" class="button" onclick="buscar();" value="Filtrar">
<input type="hidden" name="cmd" value="1"><br>
Nota: Se pueden ordenar las columnas dando clic en el titulo.<br>';
echo '<div id="resultados" class="CSSTableGenerator"></div></center>';
echo '</body></html>';
?>