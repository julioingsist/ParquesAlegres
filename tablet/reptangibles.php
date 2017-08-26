<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$prop=array(50=>"Áreas verdes",51=>"Infraestructura y mobiliario",52=>"Ingresos",53=>"Tejido social",54=>"Organización");
$proposito=array(1=>"Gestión con Empresa",2=>"Gestión con H. Ayuntamiento", 3=>"Infraestructura y mobiliario", 4=>"Ingresos", 5=>"Tejido social", 6=>"Organización",50=>"Áreas verdes",51=>"Infraestructura y mobiliario",52=>"Ingresos",53=>"Tejido social",54=>"Organización");
$subtipo=array(1=>array(1=>"Alumbrado",2=>"Arborización",3=>"Diseño de sistema de riego",4=>"Donación de PET",5=>"Murales",6=>"Pintura",7=>"Proyecto arquitectónico",8=>"Proyecto ejecutivo",9=>"Proyecto EVA",10=>"Voluntariado"),2=>array(1=>"Alumbrado",2=>"Arborización",3=>"Denuncia ciudadana formal",4=>"Jornada de limpieza",5=>"Pintura",6=>"Proyecto arquitectónico",7=>"Toma de agua",8=>"Visita a cabildo abierto"),3=>array(1=>"Arborización",2=>"Mesa de ping pong",3=>"Fertilización",4=>"Fumigación",5=>"Instalación de infraestructura",6=>"Limpieza del parque",7=>"Poda",8=>"Reglamento de orden",9=>"Riego"),4=>array(1=>"Activación por empresas y/o instituciones",2=>"Actividad para generar ingresos",3=>"Carrera pedestre",4=>"Cooperación vecinal",5=>"Días festivos",6=>"Función de cine",7=>"Kermesse",8=>"Kermesse cultural",9=>"Noche bohemia",10=>"Programa de reciclaje Ecoce o programa externo",11=>"Rifa",12=>"Tianguis",13=>"Torneos"),5=>array(1=>"Actividades deportivas",2=>"Asistencia a juego de Dorados",3=>"Campamentos",4=>"Carrera pedestre",5=>"Cooperación vecinal",6=>"Cursos y talleres",7=>"Días festivos",8=>"Función de cine",9=>"Kermesse",10=>"Kermesse cultural",11=>"Muestra gastronómica",12=>"Noche bohemia",13=>"Pláticas",14=>"Rifa",15=>"Tianguis",16=>"Torneos",17=>"Visita Jardín Botánico de Culiacán",18=>"Visita MIA"),6=>array(1=>"Asistencia a cursos P.A (será un tangible por parque)",2=>"Calendario de actividades",3=>"Club guardianes del parque",4=>"Comité de ninos",5=>"Contratación del jardinero",6=>"Correo electrónico formal",7=>"Creación de comité",8=>"Creación de logo del parque",9=>"Cuenta de Facebook",10=>"Cuenta de Whatsapp",11=>"Cuenta mancomunada",12=>"Difusión de medios",13=>"Elaborar expedientes de evidencia",14=>"Formalización de comité ante H. Ayuntamiento",15=>"Hojas membretadas",16=>"Plan de mantenimiento del parque",17=>"Recibos de dinero institucional",18=>"Reestructuración de comité",19=>"Rendición de cuentas general",20=>"Sello del parque",21=>"Uniforme",22=>"Visión del espacio"),50=>array(1=>"Proyecto arquitectónico",2=>"Plantas de ornato",3=>"Arborización",4=>"Poda",5=>"Cursos, plática y talleres",6=>"Jornada de limpieza",7=>"Fumigación",8=>"Fertilización",9=>"Proyecto EVA",10=>"Instalación de Jardín",11=>"Huerto",12=>"Voluntariado"),51=>array(1=>"Proyecto arquitectónico",2=>"Jornada de limpieza",3=>"Mantenimiento de infraestructura",4=>"Pintura",5=>"Toma de agua",6=>"Alumbrado",7=>"Reglamento de orden",8=>"Mesa de ping pong",9=>"Instalación de infraestructura",10=>"Murales",11=>"Proyecto ejecutivo",12=>"Proyecto EVA",13=>"Sistema de riego",14=>"Sistema de riego por goteo",15=>"Nivelación del terreno",16=>"Donación de PET",17=>"Voluntariado"),52=>array(1=>"Programa de reciclaje Ecoce o programa externo",2=>"Actividad para generar ingresos",3=>"Cursos, plática y talleres",4=>"Activación por empresas y/o instituciones",5=>"Carrera pedestre",6=>"Cooperación vecinal",7=>"Días festivos",8=>"Función de cine",9=>"Kermesse",10=>"Kermesse cultural",11=>"Noche bohemia",12=>"Rifa",13=>"Tianguis",14=>"Torneos",15=>"Productos elaborados por el comité"),53=>array(1=>"Campamentos",2=>"Cursos, plática y talleres",3=>"Muestra gastronómica",4=>"Visita MIA",5=>"Visita Jardín Botánico de Culiacán",6=>"Asistencia a juego de Dorados",7=>"Carrera pedestre",8=>"Días festivos",9=>"Función de cine",10=>"Kermesse",11=>"Kermesse cultural",12=>"Noche bohemia",13=>"Rifa",14=>"Tianguis",15=>"Torneos"),54=>array(1=>"Club guardianes del parque",2=>"Denuncia ciudadana formal",3=>"Creación de comité",4=>"Visita a cabildo abierto",5=>"Formalización de comité ante H. Ayuntamiento",6=>"Reestructuración de comité",7=>"Cuenta de Facebook",8=>"Calendario de actividades",9=>"Plan de mantenimiento del parque",10=>"Diseño participativo",11=>"Contratación del jardinero",12=>"Cuenta de Whatsapp",13=>"Creación de logo del parque",14=>"Uniforme",15=>"Rendición de cuentas general",16=>"Sello del parque",17=>"Correo electrónico formal",18=>"Recibos de dinero institucional",19=>"Cuenta mancomunada",20=>"Elaborar expedientes de evidencia",21=>"Comité de niños",22=>"Asistencia a cursos P.A (será un tangible por parque)",23=>"Hojas membretadas",24=>"Difusión de medios ",25=>"Elaboración de reglamento",26=>"Entrega de reconocimiento del parque"));
$sql1="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1 order by display_name ASC";
$res1=mysql_query($sql1);
while($row1=mysql_fetch_array($res1)) {
	$asesores[$row1['ID']]=$row1['display_name'];
}
//$asesores[1478]="Usuario de pruebas";
$sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_array($res2)) {
	$parques[$row2['ID']]=$row2['post_title'];
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
    $filtro=" WHERE 1";
    if($_POST['fecha_inicial']){
        $filtro.=" AND fecha_tangible>='".$_POST['fecha_inicial']."'";
    }
    if($_POST['fecha_fin']){
        $filtro.=" AND fecha_tangible<='".$_POST['fecha_fin']."'";
    }
    if($_POST['asesor']){
        $filtro.=" AND u.ID='".$_POST['asesor']."'";
    }
    if($_POST['parque']){
        $filtro.=" AND cve_parque='".$_POST['parque']."'";
    }
    if($_POST['proposito']){
        $filtro.="AND proposito='".$_POST['proposito']."'";
    }
    if($_POST['tipo']){
        $filtro.="AND tipo='".$_POST['tipo']."'";
    }
    $sql="select p.post_title as parque, u.display_name as nomasesor,t.* from tangibles t INNER JOIN wp_posts p on t.cve_parque=p.ID INNER JOIN wp_users u on u.ID=p.post_author $filtro order by nomasesor, cve_parque DESC";
    $res=mysql_query($sql);
    if(mysql_num_rows($res)>0){
        echo '<table><tr><td>Asesor</td><td>Parque</td><td>Fecha</td><td>Propósito</td><td>Tipo</td><td>Notas</td><td>Experiencia exitosa</td><td>Evidencia</td>';
        while($row=mysql_fetch_array($res)){
        	$evidencia=explode(",",$row['evidencias']);
            echo '<tr><td>'.$row['nomasesor'].'</td><td>'.$row['parque'].'</td><td>'.$row['fecha_tangible'].'</td><td>'.$proposito[$row['proposito']].'</td><td>'.$subtipo[$row['proposito']][$row['tipo']].'</td><td>'.$row['notas'].'</td><td>'.$row['experiencia_exitosa'].'</td><td>'; foreach($evidencia as $k=>$v){
            	if($v!=""){
            		echo '<a href="tangibles/'.$v.'" target="_blank"><img src="tangibles/'.$v.'" width="150"></a> &nbsp;';
            	}
            }echo '</td></tr>';
        }
        echo '<tr><td><b>Total:</b></td><td colspan="10"><b>'.mysql_num_rows($res).'</b></td></table>';    
    }
    else{
        echo 'No hay tangibles registrados bajo el criterio de búsqueda.';
    }
    exit();
}
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de tangibles</title>
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
h3{
	font-family:Arial;
	color:#0D9B9B;
}
</style>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        buscar();
    });
    function buscar(){
        $("#resultados").text("Cargando...");
        var asesor = document.getElementsByName("asesor")[0].value;
	var parque = document.getElementsByName("parque")[0].value;
	var proposito = document.getElementsByName("proposito")[0].value;
	var tipo = document.getElementsByName("tipo")[0].value;
        var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
        var fecha_fin = document.getElementsByName("fecha_fin")[0].value;
	$("#resultados").load("http://parquesalegres.org/tablet/reptangibles.php", {asesor: asesor, parque: parque, proposito: proposito, tipo: tipo, fecha_inicial: fecha_inicial, fecha_fin: fecha_fin, cmd: 1});
    }
    function camb(i,v){
	if(i=="proposito"){
		if(v==50){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
			    if($k==50){
					foreach($v as $key=>$value){
					    $arrjs.='"'.$key.'": "'.$value.'",';
					}
			    }
			}
			$arrjs=substr($arrjs, 0, -1);
			echo '
			var newOptions = {"0": "-- Todos --",
			'.$arrjs.'
			};
			var $el = $("#tipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
		else if(v==51){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
			    if($k==51){
					foreach($v as $key=>$value){
					    $arrjs.='"'.$key.'": "'.$value.'",';
					}
			    }
			}
			$arrjs=substr($arrjs, 0, -1);
			echo '
			var newOptions = {"0": "-- Todos --",
			'.$arrjs.'
			};
			var $el = $("#tipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
		else if(v==52){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
			    if($k==52){
					foreach($v as $key=>$value){
					    $arrjs.='"'.$key.'": "'.$value.'",';
					}
			    }
			}
			$arrjs=substr($arrjs, 0, -1);
			echo '
			var newOptions = {"0": "-- Todos --",
			'.$arrjs.'
			};
			var $el = $("#tipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
		else if(v==53){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
			    if($k==53){
					foreach($v as $key=>$value){
					    $arrjs.='"'.$key.'": "'.$value.'",';
					}
			    }
			}
			$arrjs=substr($arrjs, 0, -1);
			echo '
			var newOptions = {"0": "-- Todos --",
			'.$arrjs.'
			};
			var $el = $("#tipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
		else if(v==54){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
			    if($k==54){
					foreach($v as $key=>$value){
					    $arrjs.='"'.$key.'": "'.$value.'",';
					}
			    }
			}
			$arrjs=substr($arrjs, 0, -1);
			echo '
			var newOptions = {"0": "-- Todos --",
			'.$arrjs.'
			};
			var $el = $("#tipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
	}
	if(i=="asesor"){
		$("#parque").html("<option value=\"\">Cargando...</option>");
		if(v==0){';
			$arrjs='<option value=\"\"> -- Todos -- </option>';
			foreach($parques as $k=>$v){
				$arrjs.='<option value=\"'.$k.'\">'.$v.'</option>';
			}
			echo '
			$("#parque").html("'.$arrjs.'");
			
		}
		else{
			$.ajax({url: "reptangibles.php",
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
</script>
</head>
<body>';
if($_GET['fecha_ini']!=""){
	$fecha_filtro=$_GET['fecha_ini'];
}
else{
	$fecha_filtro=date("Y-m-").'01';
}
if($_GET['fecha_fin']!=""){
	$fecha_filtro2=$_GET['fecha_fin'];	
}else{
	$fecha_filtro2=date("Y-m-t");
}
if($_GET['parque']!=""){
	$parque_filtro=$_GET['parque'];
}
    echo '<form method="post" action="repexcel.php">
	<input type="hidden" name="cmd" value="tangibles">
    <h3 style="text-align:center">Reporte de tangibles en parques</h2>
    <label><span>Fecha inicial: </span><input type="text" name="fecha_inicial" readonly id="datepicker" value="'.$fecha_filtro.'"></label>
    <label><span>Fecha final: </span><input type="text" name="fecha_fin" readonly id="datepicker2" value="'.$fecha_filtro2.'"></label>
    <div style="clear:both;"></div>
    <label><span>Asesor: </span><select name="asesor" id="asesor" onchange="camb(this.id,this.value);"><option value=""> -- Todos -- </option>';
    foreach($asesores as $k=>$v){
        echo '<option value="'.$k.'">'.$v.'</option>';    
    }
    echo '</select></label>
    <label><span>Parque: </span><select name="parque" id="parque"><option value=""> -- Todos -- </option>';
    foreach($parques as $k=>$v){
        echo '<option value="'.$k.'"'; if($_GET['parque']==$k){ echo ' selected'; } echo '>'.$v.'</option>';    
    }
    echo '</select></label><div style="clear:both"></div><br>
	<label><span>Propósito: </span><select name="proposito" id="proposito" onchange="camb(this.id,this.value);"><option value=""> -- Todos -- </option>';
        foreach($prop as $k=>$v){
            echo '<option value="'.$k.'">'.$v.'</option>';    
        }
        echo '</select></label>
	<label><span>Tipo: </span><select name="tipo" id="tipo"><option value=""> -- Todos -- </option>';
        echo '</select></label>
        <div style="clear:both;"></div><br>
        <center><input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Exportar a Excel"><br><br>
        <div id="resultados" class="CSSTableGenerator"></div></center>
    </form></body>
</html>';
?>