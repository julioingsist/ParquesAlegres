<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
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
    $filtro="";
    if($_POST['asesor']){
        $filtro.=" AND u.ID='".$_POST['asesor']."'";
    }
    if($_POST['parque']){
        $filtro.=" AND cve_parque='".$_POST['parque']."'";
    }
    //$sql="select p.ID, p.post_title as parque, u.display_name as nomasesor,organizacion from comite_parque cp INNER JOIN wp_posts p on cp.cve_parque=p.ID INNER JOIN wp_users u on u.ID=p.post_author $filtro order by nomasesor, cve_parque DESC";
    $sql="select p.ID, p.post_title as parque, u.display_name as nomasesor,organizacion from wp_posts p LEFT JOIN comite_parque cp ON cp.cve_parque=p.ID INNER JOIN wp_users u ON u.ID=p.post_author INNER JOIN asesores a ON a.ID=u.ID WHERE p.post_status='publish' AND p.post_type='parque' AND a.stat<1 $filtro order by nomasesor, p.ID DESC";
    $res=mysql_query($sql);
    if(mysql_num_rows($res)>0){
        echo '<table><tr><td>Asesor</td><td>ID</td><td>Parque</td><td>Invitar a los vecinos a las juntas</td><td>De moderar la participación de los asistentes a las juntas de comité</td><td>Elaborar las minutas de las juntas</td><td>Manejar un expediente con los documentos del comité</td><td>Lleva un control de los fondos del comité</td><td>Presenta reportes de ingresos y egresos</td><td>El comité somete a votación las decisiones que toma</td><td>Los miembros del comité se organizan en comisiones para realizar sus acciones</td><td>El comité cuenta con un sello</td><td>El comité utiliza hojas membretadas</td><td>El comité utiliza uniforme</td><td>El comité cuenta con Facebook</td><td>El comité cuenta con correo electrónico</td><td>El comité cuenta con Whatsapp</td>';
        while($row=mysql_fetch_array($res)){
        	$orgv="";
        	if($row['organizacion']!=""){
        		$organizacion=explode(",",$row['organizacion']);
        		foreach($organizacion as $k=>$v){
            		$orgv.='<td>'.$v.'</td>';
            	}
        	}
        	else{
        		$orgv='<td colspan="14">Sin capturar</td>';
        	}
            echo '<tr><td>'.$row['nomasesor'].'</td><td>'.$row['ID'].'</td><td>'.$row['parque'].'</td>'.$orgv.'</tr>';
        }
        echo '</table>';    
    }
    else{
        echo 'No hay resultados bajo el criterio de búsqueda.';
    }
    exit();
}
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de organización en comités</title>
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
		$("#resultados").load("http://parquesalegres.org/tablet/reporganizacion.php", {asesor: asesor, parque: parque, cmd: 1});
    }
    function camb(i,v){
	if(i=="proposito"){
		if(v==1){';
			$arrjs="";
			foreach($tipo as $k=>$v){
			    if($k==1){
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
		else if(v==2){';
			$arrjs="";
			foreach($tipo as $k=>$v){
			    if($k==2){
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
		else if(v==3){';
			$arrjs="";
			foreach($tipo as $k=>$v){
			    if($k==3){
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
		else if(v==4){';
			$arrjs="";
			foreach($tipo as $k=>$v){
			    if($k==4){
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
		else if(v==5){';
			$arrjs="";
			foreach($tipo as $k=>$v){
			    if($k==5){
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
			$.ajax({url: "reporganizacion.php",
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
    echo '<form method="post" action="repexcel.php">
	<input type="hidden" name="cmd" value="organizacion">
    <h3 style="text-align:center">Reporte de organización en comités</h2><br>
    <label><span>Asesor: </span><select name="asesor" id="asesor" onchange="camb(this.id,this.value);"><option value=""> -- Todos -- </option>';
    foreach($asesores as $k=>$v){
        echo '<option value="'.$k.'">'.$v.'</option>';    
    }
    echo '</select></label>
    <label><span>Parque: </span><select name="parque" id="parque"><option value=""> -- Todos -- </option>';
    foreach($parques as $k=>$v){
        echo '<option value="'.$k.'"'; if($_GET['parque']==$k){ echo ' selected'; } echo '>'.$v.'</option>';    
    }
    echo '</select></label><div style="clear:both;"></div><br>
        <center><input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Exportar a Excel"><br><br>
        <div id="resultados" class="CSSTableGenerator"></div></center>
    </form></body>
</html>';
?>