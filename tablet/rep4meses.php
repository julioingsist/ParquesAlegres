<?php
require_once('../wp-config.php');
require('fpdf17/fpdf.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$param=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",
                  11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");
$tipoasent=array(1=>"Aeropuerto",2=>"Ampliación",3=>"Barrio",4=>"Cantón",5=>"Ciudad",6=>"Ciudad industrial",7=>"Colonia",8=>"Condominio",9=>"Conjunto habitacional",
		 10=>"Corredor industrial",11=>"Coto",12=>"Cuartel",13=>"Ejido",14=>"Exhacienda",15=>"Fracción",16=>"Fraccionamiento",17=>"Granja",18=>"Hacienda",
		 19=>"Ingenio",20=>"Manzana",21=>"Paraje",22=>"Parque Industrial",23=>"Privada",24=>"Prolongación",25=>"Pueblo",26=>"Puerto",27=>"Ranchería",28=>"Rancho",
		 29=>"Región",30=>"Residencial",31=>"Rinconada",32=>"Sección",33=>"Sector",34=>"Supermanzana",35=>"Unidad",36=>"Unidad Habitacional",37=>"Villa",
		 38=>"Zona Federal",39=>"Zona Industrial",40=>"Zona Militar",41=>"Zona Naval");
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['display_name']]=$row['ID'];
}
$sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_array($res2)) {
	$parques[$row2['ID']]=$row2['post_title'];
}
if($_POST['fecha_inicial']){
    $fechainicio=$_POST['fecha_inicial'];
    $fechafin=$_POST['fecha_final'];
}
else{
    //Se checa si no es el ultimo mes del año
    if(date('m')<12){
        $mes=date('m')+1;
        $anio=date('Y');
    }
    else{
        //Si lo es entonces aumentamos un año y definimos al primer mes
        $mes='01';
        $anio=date('Y')+1;
    }
    //checamos cual es el ultimo dia del mes en el que estamos
    $fecha = date('Y-m-d', strtotime(date(''.$anio.'-'.$mes.'-01'). ' - 1 days'));
    $dia = substr($fecha, -2);
    //Si el dia es diferente al dia actual entonces retrocedemos un mes
    if($dia!=date('d')){
        if($mes<=2){
            if($mes<=1){
                $mes=11;
            }
            else{
                $mes=12;
            }
        }
        else{
            $mes=$mes-2;
        }
        if($mes==12){
            $mes1=01;
        }
        else{
            $mes1=$mes+1;
        }
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
}
$mesact=substr($fechainicio, -5,2);
$anioact=substr($fechainicio, 0,4);
if($mesact>1){
    $mesant=$mesact-1;
    if($mesant<10){
        $mesant='0'.$mesant;
    }
    $mesantini=date($anioact.'-'.$mesant.'-01');
    $mesantfin=date($anioact.'-'.$mesant.'-31');   
}
else{
    $anioant=$anioact-1;
    $mesantini=date(''.$anioant.'-12-01');
    $mesantfin=date(''.$anioant.'-12-31'); 
}
$mes2fin=date('Y-m-d', strtotime(date($mesantini). ' - 1 days'));
$mes2ini=substr($mes2fin, 0,4).'-'.substr($mes2fin, -5,2).'-01';
$mes3fin=date('Y-m-d', strtotime(date($mes2ini). ' - 1 days'));
$mes3ini=substr($mes3fin, 0,4).'-'.substr($mes3fin, -5,2).'-01';
if($_POST['cmd']==1){
	echo '<table id="simpleTable">';
	echo '<thead><tr><th data-sort="int">ID</th><th data-sort="string">Parque</th><th data-sort="string">Colonia</th><th data-sort="string">Asentamiento</th><th data-sort="string">Tipo de asentamiento</th><th data-sort="int">Superficie</th><th data-sort="string">Ubicación</th><th data-sort="string">Vialidad principal</th><th data-sort="string">Vialidad 1</th><th data-sort="string">Vialidad 2</th><th data-sort="string">Vialidad posterior</th><th data-sort="string">Con comité</th><th data-sort="string">Personas en el comité</th><th data-sort="string">Visión del espacio</th><th data-sort="int">Calificación 3 meses atras</th><th data-sort="int">Calificación 2 meses atras</th><th data-sort="int">Calificación anterior</th><th data-sort="int">Calificación actual</th></tr></thead>';
	echo '<tbody>';
	foreach($asesores as $k=>$v){
		if($_POST['parque']){
			$filtro="AND p.id='".$_POST['parque']."'";
		}
	    $sql1="select p.id,p.post_title, k8.meta_value as colonia, k9.meta_value as ubicacion, k1.meta_value as asentamiento,k2.meta_value as tasentamiento,k3.meta_value as superficie,k4.meta_value as pvialiadad, k5.meta_value as vialidad1,k6.meta_value as vialidad2, k7.meta_value as posvialiadad from wp_posts p LEFT JOIN wp_postmeta k8 ON p.id = k8.post_id AND k8.meta_key = '_parque_col' LEFT JOIN wp_postmeta k9 ON p.id = k9.post_id AND k9.meta_key = '_parque_ubic' LEFT JOIN wp_postmeta k1 ON p.id = k1.post_id AND k1.meta_key = '_parque_nomasentamiento' LEFT JOIN wp_postmeta k2 ON p.id = k2.post_id AND k2.meta_key = '_parque_tipoasentamiento' LEFT JOIN wp_postmeta k3 ON p.id = k3.post_id AND k3.meta_key = '_parque_sup' LEFT JOIN wp_postmeta k4 ON p.id = k4.post_id AND k4.meta_key = '_parque_vialidad_prin' LEFT JOIN wp_postmeta k5 ON p.id = k5.post_id AND k5.meta_key = '_parque_vialidad1' LEFT JOIN wp_postmeta k6 ON p.id = k6.post_id AND k6.meta_key = '_parque_vialidad2' LEFT JOIN wp_postmeta k7 ON p.id = k7.post_id AND k7.meta_key = '_parque_vialidad_pos' where p.post_status='publish' and p.post_type='parque' and p.post_author='".$v."' $filtro group by p.id";
	    $res1=mysql_query($sql1);
	    while($row1=mysql_fetch_array($res1)){
		$parque[$row1['id']]=$row1['post_title'];
		$sql5="select cve_parque, ";
		foreach($param as $v){
		    $sql5.=$v."+";
		}
		$sql5 = substr($sql5, 0, -1);
		$sql5.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$mes3ini."' and fecha_visita<='".$mes3fin."'";
		$res5=mysql_query($sql5);
		$suma3=0;
		$calif3=0;
		if(mysql_num_rows($res5)>0){
		    while($row5=mysql_fetch_array($res5)){
			$suma3=$suma3+($row5['calif']/7);
		    }
		    $calif3=round($suma3/mysql_num_rows($res5));
		}
		$sql4="select cve_parque, ";
		foreach($param as $v){
		    $sql4.=$v."+";
		}
		$sql4 = substr($sql4, 0, -1);
		$sql4.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$mes2ini."' and fecha_visita<='".$mes2fin."'";
		$res4=mysql_query($sql4);
		$suma2=0;
		$calif2=0;
		if(mysql_num_rows($res4)>0){
		    while($row4=mysql_fetch_array($res4)){
			$suma2=$suma2+($row4['calif']/7);
		    }
		    $calif2=round($suma2/mysql_num_rows($res4));
		}
		$sql3="select cve_parque, ";
		foreach($param as $v){
		    $sql3.=$v."+";
		}
		$sql3 = substr($sql3, 0, -1);
		$sql3.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$mesantini."' and fecha_visita<='".$mesantfin."'";
		$res3=mysql_query($sql3);
		$sumaant=0;
		$califant=0;
		if(mysql_num_rows($res3)>0){
		    while($row3=mysql_fetch_array($res3)){
			$sumaant=$sumaant+($row3['calif']/7);
		    }
		    $califant=round($sumaant/mysql_num_rows($res3));
		}
		$sql2="select cve_parque, ";
		foreach($param as $v){
		    $sql2.=$v."+";
		}
		$sql2 = substr($sql2, 0, -1);
		$sql2.=" as calif, opera, vespacio from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$fechainicio."' and fecha_visita<='".$fechafin."'";
		$res2=mysql_query($sql2);
		$suma=0;
		$calif=0;
		if(mysql_num_rows($res2)>0){
		    while($row2=mysql_fetch_array($res2)){
			if($row2['opera']>=7){
				$comite="Sí";
				if($row2['vespacio']>=40){
					$vespacio="Sí";
				}
				else{
					$vespacio="No";
				}
				if($row2['opera']>=14){
				    if($row2['opera']>=20){
					$opera="Con 3 o más personas";
				    }
				    else{
					$opera="Con 2 personas";
				    }
				}
				else{
				    $opera="Con 1 persona";
				}
			}	
			else{
			    $comite="No";
			    $opera="No tiene";
			}
			$suma=$suma+($row2['calif']/7);
		    }
		    $calif=round($suma/mysql_num_rows($res2));
		}
		else{
			$comite="No";
			$opera="No tiene";
			$vespacio="No";
		}
		echo '<tr><td>'.$row1['id'].'</td><td>'.$row1['post_title'].'</td><td>'.$row1['colonia'].'</td><td>'.$row1['asentamiento'].'</td><td>'.$tipoasent[$row1['tasentamiento']].'</td><td>'.$row1['superficie'].'</td><td>'.$row1['ubicacion'].'</td><td>'.$row1['pvialidad'].'</td><td>'.$row1['vialidad1'].'</td><td>'.$row1['vialidad2'].'</td><td>'.$row1['posvialidad'].'</td><td>'.$comite.'</td><td>'.$opera.'</td><td>'.$vespacio.'</td><td>'.$calif3.'</td><td>'.$calif2.'</td><td>'.$califant.'</td><td>'.$calif.'</td></tr>';
	    }
	}
	echo '</tbody></table>';
	exit();
}
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte 4 meses</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script src="stupidtable.js"></script>
<script>
$(function() {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	buscar();
	$(document).ajaxComplete(function() {
		$("#simpleTable").stupidtable();
		var $table = $("#simpleTable").stupidtable();
		var $th_to_sort = $table.find("thead th").eq(3);
		$th_to_sort.stupidsort("desc");
	});
});
function buscar(){
	$("#resultados").text("Cargando...");
	var parque = document.getElementsByName("parque")[0].value;
	var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
	var fecha_final = document.getElementsByName("fecha_final")[0].value;
	$("#resultados").load("http://parquesalegres.org/tablet/rep4meses.php", {parque: parque, fecha_inicial: fecha_inicial, fecha_final: fecha_final, cmd: 1});
}
</script>
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
</head>';
echo '<body>';
echo '<form method="post" action="repexcel.php">
<label><span>Parque: </span><select name="parque" id="parque"><option value=""> -- Todos -- </option>';
foreach($parques as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';    
}
echo '</select></label>
<label><span>Fecha de inicio:</span><input type="text" readonly id="datepicker" value="'.$fechainicio.'" name="fecha_inicial"/></label>
<label><span>Fecha Final:</span><input type="text" readonly id="datepicker2" value="'.$fechafin.'" name="fecha_final"/></label>
<div style="clear:both;"></div>
<center><input type="button" class="button" onclick="buscar();" value="Filtrar">&nbsp;<input type="submit" class="button" value="Descargar Reporte en Excel"></center><br>';
echo '<input type="hidden" name="cmd" value="1"><br>';
echo '<center><div id="resultados" class="CSSTableGenerator"></div></center></form>';
echo '</body>
</html>';
?>