<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$calen=array(0=>"No",1=>"Sí");
$tipo=array(1=>"Generar ingresos y tejido social",2=>"Crear y mantener áreas verdes", 3=>"Organización", 4=>"Gestión", 5=>"Orden");
$subtipo=array(1=>array(1=>"Torneos",2=>"Tianguis",3=>"Kermesse",4=>"Días Festivos",5=>"Cooperación vecinal",6=>"Rifa",7=>"Kermesse cultural",8=>"Función de cine",9=>"Carrera pedestre",10=>"Noche bohemia",11=>"Visita al MIA",12=>"Visita a Jardín Botánico",13=>"Activación Santa Ana",14=>"Activación Trizalet"),2=>array(1=>"Arborización y Fertilización",2=>"Jornadas de limpieza",3=>"Riego",4=>"Fumigación",5=>"Poda"),3=>array(1=>"Clínica de verano de fútbol infantil",2=>"Torneos",3=>"Campamentos",4=>"Eventos en días festivos",5=>"Club guardianes del parque",6=>"Convivios recreativos",7=>"Pintura",8=>"Alumbrado",9=>"Murales",10=>"Reciclaje",11=>"Agua"),4=>array(1=>"Honorable Ayuntamiento",2=>"Empresa"),5=>array(1=>"Orden"));
$estatus=array(1=>"En espera",2=>"Realizado",3=>"Postergado",4=>"Cancelado");
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
        $filtro.=" AND fecha>='".$_POST['fecha_inicial']."'";
    }
    if($_POST['fecha_fin']){
        $filtro.=" AND fecha<='".$_POST['fecha_fin']."'";
    }
    if($_POST['asesor']){
        $filtro.=" AND p.post_author='".$_POST['asesor']."'";
    }
    if($_POST['parque']){
        $filtro.=" AND cve_parque='".$_POST['parque']."'";
    }
    if($_POST['status']){
        $filtro.="AND estatus='".$_POST['status']."'";
    }
    if($_POST['calendario']!=""){
        $filtro.="AND calendario='".$_POST['calendario']."'";
    }
    if($_POST['tipo']){
        $filtro.="AND tipo='".$_POST['tipo']."'";
    }
    if($_POST['subtipo']){
        $filtro.="AND nombre='".$_POST['subtipo']."'";
    }
    $sql="select p.ID,p.post_title as parque, u.display_name as nomasesor,e.* from eventos_parques e INNER JOIN wp_posts p on e.cve_parque=p.ID INNER JOIN wp_users u on u.ID=p.post_author $filtro order by asesor, cve_parque DESC";
    $res=mysql_query($sql);
    if(mysql_num_rows($res)>0){
        echo '<table><tr><td>Asesor</td><td>ID</td><td>Parque</td><td>Calendario</td><td>Tipo de Evento</td><td>Subtipo</td><td>Fecha en que se capturo</td><td>Fecha del evento</td><td>Responsable</td><td>Correo</td><td>Estatus</td><td>Fecha del cambio</td><td>Motivo</td>';
        while($row=mysql_fetch_array($res)){
            echo '<tr><td>'.$row['nomasesor'].'</td><td>'.$row['ID'].'</td><td>'.$row['parque'].'</td><td>'.$calen[$row['calendario']].'</td><td>'.$tipo[$row['tipo']].'</td><td>'.$subtipo[$row['tipo']][$row['nombre']].'</td><td>'.$row['fecha_reg'].'</td><td>'.$row['fecha'].'</td><td>'.$row['responsable'].'</td><td>'.$row['correo'].'</td><td>'.$estatus[$row['estatus']].'</td><td>'; if($row['fecha_cambio']!="0000-00-00"){ echo $row['fecha_cambio']; } echo '</td><td>'.$row['motivo'].'</td></tr>';
        }
        echo '<tr><td><b>Total:</b></td><td colspan="10"><b>'.mysql_num_rows($res).'</b></td></table>';    
    }
    else{
        echo 'No hay eventos registradas bajo el criterio de búsqueda.';
    }
    exit();
}
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de eventos</title>
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
.bloque{
	width:45%;
	vertical-align:top;
	display:inline-block;
	margin-right:2%;
	margin-bottom:5px;
	font-size:15px;
	text-align:justify;
	border:1px solid #B6B6B6;
	border-radius: 10px;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
}
.title{
	-moz-border-radius-topright:10px;
	-webkit-border-top-right-radius:10px;
	border-top-right-radius:10px;
	-moz-border-radius-topleft:10px;
	-webkit-border-top-left-radius:10px;
	border-top-left-radius:10px;
	background: #6eb800;
	padding: 7px 19px 7px;
	color: #fff;
	font-family:Arial;
	font-size:15px;
}
h3{
	font-family:Arial;
	color:#0D9B9B;
}
.mes{
	display:none;
}
.lin{
	width:120px;
	font-family:Arial;
	color:#0D9B9B;
	text-align:center;
	margin-left:35px;
	border:1px solid #B6B6B6;
	border-radius: 10px;
	cursor:pointer;
	display:inline-block;
}
.lin:hover{
	color:white;
	background: #0D9B9B;
}
.clicked{
	color:white;
	background: #0D9B9B;
	width:120px;
	font-family:Arial;
	text-align:center;
	margin-left:35px;
	border:1px solid #B6B6B6;
	border-radius: 10px;
	cursor:pointer;
	display:inline-block;
}
</style>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        buscar();
	$("#mes").click(function(){
		$(this).removeClass("lin").addClass("clicked");
		$("#general").removeClass("clicked").addClass("lin");
		$("#eventosmes").show();
		$(".mes").show();
		$(".general").hide();
	});
	$("#general").click(function(){
		$(this).removeClass("lin").addClass("clicked");
		$("#mes").removeClass("clicked").addClass("lin");
		$("#eventosmes").hide();
		$(".general").show();
		$(".mes").hide();
	});
    });
    function buscar(){
        $("#resultados").text("Cargando...");
        var asesor = document.getElementsByName("asesor")[0].value;
	var parque = document.getElementsByName("parque")[0].value;
	var status = document.getElementsByName("status")[0].value;
	var calendario = document.getElementsByName("calendario")[0].value;
	var tipo = document.getElementsByName("tipo")[0].value;
	var subtipo = document.getElementsByName("subtipo")[0].value;
        var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
        var fecha_fin = document.getElementsByName("fecha_fin")[0].value;
	$("#resultados").load("http://parquesalegres.org/tablet/repeventos.php", {asesor: asesor, parque: parque, status: status, tipo: tipo, calendario: calendario, subtipo: subtipo, fecha_inicial: fecha_inicial, fecha_fin: fecha_fin, cmd: 1});
    }
    function camb(i,v){
	if(i=="tipo"){
		if(v==1){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
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
			var $el = $("#subtipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
		else if(v==2){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
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
			var $el = $("#subtipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
		else if(v==3){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
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
			var $el = $("#subtipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
		else if(v==4){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
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
			var $el = $("#subtipo");
			$el.empty();
			$.each(newOptions, function(value,key) {
			    $el.append($("<option></option>").attr("value", value).text(key));
			});	
		}
		else if(v==5){';
			$arrjs="";
			foreach($subtipo as $k=>$v){
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
			var $el = $("#subtipo");
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
			$.ajax({url: "repeventos.php",
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
	<input type="hidden" name="cmd" value="eventos">
        <h3 style="text-align:center">Reporte de eventos en parques</h2>
        <span class="clicked" id="general">General</span><span class="lin" id="mes">Mensual</span>
	<center>
	<br>';
        $sql="select p.post_title as parque, u.display_name as nomasesor,e.* from eventos_parques e INNER JOIN wp_posts p on e.cve_parque=p.ID INNER JOIN wp_users u on u.ID=e.asesor WHERE fecha>='".date("Y-m-01")."' AND fecha<='".date("Y-m-t")."' AND estatus='2' order by asesor, cve_parque DESC";
        $res=mysql_query($sql);
        $sql2="select p.post_title as parque, u.display_name as nomasesor,e.* from eventos_parques e INNER JOIN wp_posts p on e.cve_parque=p.ID INNER JOIN wp_users u on u.ID=e.asesor WHERE fecha>='".date('Y-m-01', strtotime('now - 1 month'))."' AND fecha<='".date('Y-m-t', strtotime('now - 1 month'))."' AND estatus='2' order by asesor, cve_parque DESC";
        $res2=mysql_query($sql2);
        $diferencia=mysql_num_rows($res)-mysql_num_rows($res2);
	$toteventosm=0;
	$toteventos=0;
        foreach($asesores as $k=>$v){
            $sql5="select id,post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".$k."' order by post_title ASC";
            $res5=mysql_query($sql5);
            while($row5=mysql_fetch_array($res5)){
                $sql3="select * from eventos_parques WHERE asesor='".$k."' AND cve_parque='".$row5['id']."' AND estatus='2' AND fecha>='".date("Y-m-01")."' AND fecha<='".date("Y-m-t")."'";
                $res3=mysql_query($sql3);
		
		$sql6="select * from wp_comites_parques where cve_parque='".$row5['id']."' AND fecha_visita>='".date("Y-m-01")."' AND fecha_visita<='".date("Y-m-t")."'";
		$res6=mysql_query($sql6);
		if(mysql_num_rows($res3)>0){
			if(mysql_num_rows($res6)>0){
				$efectpm[$row5['id']]=round((mysql_num_rows($res3)/mysql_num_rows($res6))*100);
			}
			else{
				$efectpm[$row5['id']]=0;
			}
		}
		else{
			$efectpm[$row5['id']]=0;
		}
                $totalespm[$row5['id']]=mysql_num_rows($res3);
                $totalesam[$k]=$totalesam[$k]+mysql_num_rows($res3);
		$visitasam[$k]=$visitasam[$k]+mysql_num_rows($res6);
		$toteventosm=$toteventosm+mysql_num_rows($res3);
		if(mysql_num_rows($res3)>0){
			while($row3=mysql_fetch_array($res3)){
				if($row3['nombre']!=""){
					$totalestipom[$tipo[$row3['tipo']].' - '.$subtipo[$row3['tipo']][$row3['nombre']]]++;
				}
			}
		}	
		$sql4="select * from eventos_parques WHERE asesor='".$k."' AND cve_parque='".$row5['id']."' AND estatus='2'";
                $res4=mysql_query($sql4);
		$sql7="select * from wp_comites_parques where cve_parque='".$row5['id']."'";
		$res7=mysql_query($sql7);
                $totalesp[$row5['id']]=mysql_num_rows($res4);
                $totalesa[$k]=$totalesa[$k]+mysql_num_rows($res4);
		$visitasa[$k]=$visitasa[$k]+mysql_num_rows($res7);
		$toteventos=$toteventos+mysql_num_rows($res4);
		if(mysql_num_rows($res4)>0){
			while($row4=mysql_fetch_array($res4)){
				if($row4['nombre']!=""){
					$totalestipo[$tipo[$row4['tipo']].' - '.$subtipo[$row4['tipo']][$row4['nombre']]]++;
				}
			}
		}	
            }
        }
        arsort($totalespm);
        arsort($totalesp);
        $i=1;
        echo '<div class="bloque"><div class="title">Los 5 parques con más eventos: <div style="float:right;" class="mes">Total: '.$toteventosm.'</div><div style="float:right;" class="general">Total: '.$toteventos.'</div></div><ol class="mes">'; foreach($totalespm as $key=>$val){ if($i<6){echo '<li>'.$parques[$key].': '.$val.'</li>'; $i++;}} $i=1; echo '</ol>
	<ol class="general">'; foreach($totalesp as $key=>$val){ if($i<6){echo '<li>'.$parques[$key].': '.$val.'</li>'; $i++;}} echo '</ol></div>';
        $i=1;
        asort($totalespm);
	asort($totalesp);
        echo '<div class="bloque"><div class="title">Los 5 parques con menos eventos: <div style="float:right;" class="mes">Total: '.$toteventosm.'</div><div style="float:right;" class="general">Total: '.$toteventos.'</div></div><ol class="mes">'; foreach($totalespm as $key=>$val){ if($i<6){echo '<li>'.$parques[$key].': '.$val.'</li> '; $i++;}}$i=1; echo '</ol>
	<ol class="general">'; foreach($totalesp as $key=>$val){ if($i<6){echo '<li>'.$parques[$key].': '.$val.'</li> '; $i++;}} echo '</ol></div>';
        arsort($totalesam);
	arsort($totalesa);
        $i=1;
        echo '<div class="bloque"><div class="title">Los 5 Asesores con más eventos en sus parques: <div style="float:right;" class="mes">Total: '.$toteventosm.'</div><div style="float:right;" class="general">Total: '.$toteventos.'</div></div><ol class="mes">'; foreach($totalesam as $key=>$val){ if($i<6){echo '<li>'.$asesores[$key].': '.$val.'</li> '; $i++;}}$i=1; echo '</ol>
	<ol class="general">'; foreach($totalesa as $key=>$val){ if($i<6){echo '<li>'.$asesores[$key].': '.$val.'</li> '; $i++;}} echo '</ol></div>';
        asort($totalesam);
	asort($totalesa);
        $i=1;
        echo '<div class="bloque"><div class="title">Los 5 Asesores con menos eventos en sus parques: <div style="float:right;" class="mes">Total: '.$toteventosm.'</div><div style="float:right;" class="general">Total: '.$toteventos.'</div></div><ol class="mes">'; foreach($totalesam as $key=>$val){ if($i<6){echo '<li>'.$asesores[$key].': '.$val.'</li> '; $i++;}}$i=1; echo '</ol>
	<ol class="general">'; foreach($totalesa as $key=>$val){ if($i<6){echo '<li>'.$asesores[$key].': '.$val.'</li> '; $i++;}}$i=1; echo '</ol></div>
	<br><div class="bloque"><div class="title">Los 5 Subtipos de eventos mas recurrentes: <div style="float:right;" class="mes">Total: '.$toteventosm.'</div><div style="float:right;" class="general">Total: '.$toteventos.'</div></div>';
	if($totalestipom){
		arsort($totalestipom);
		echo '<ol class="mes">'; foreach($totalestipom as $key=>$val){ if($i<6){ echo '<li>'.$key.': '.$val.'</li> '; $i++;}}$i=1; echo '</ol>';
	}
	else{
		echo '<div class="mes">No hay subtipos registrados</div>';
	}
	if($totalestipo){
		arsort($totalestipo);
		echo '<ol class="general">'; foreach($totalestipo as $key=>$val){ if($i<6){echo '<li>'.$key.': '.$val.'</li> '; $i++;}} echo '</ol>';
	}
	else{
		echo '<div class="general">No hay subtipos registrados</div>';
	}
	echo '</div><div class="bloque" id="eventosmes" style="display:none;"><div class="title">Eventos<div style="float:right;">Total: '.$toteventosm.'</div></div><p style="padding-left:25px;">En el mes de '.$meses[date("m")].': '.mysql_num_rows($res).'<br>
        En el mes anterior: '.mysql_num_rows($res2).'<br>
        Diferencia: '.$diferencia.'<br></p></div>
	<div class="bloque"><div class="title">Porcentaje de Efectividad: Eventos/visitas<div style="float:right;" class="mes">Total: '.$toteventosm.'</div><div style="float:right;" class="general">Total: '.$toteventos.'</div></div><ol class="mes">';
	foreach($asesores as $k=>$v){
		echo '<li>'.$v.': ';
		if($totalesam[$k]>0 && $visitasam[$k]>0){
			echo round(($totalesam[$k]/$visitasam[$k])*100);
		}
		else{
			echo '0';
		}
		echo '%</li>';
	}
	echo '</ol><ol class="general">';
	foreach($asesores as $k=>$v){
		echo '<li>'.$v.': ';
		if($totalesa[$k]>0 && $visitasa[$k]>0){
			echo round(($totalesa[$k]/$visitasa[$k])*100);
		}
		else{
			echo '0';
		}
		echo '%</li>';
	}
	echo '</ol></div>
	<br></center>
        <h3>Detalle:</h3>
        <label><span>Fecha inicial: </span><input type="text" name="fecha_inicial" readonly id="datepicker" value="'.date("Y-m-").'01"></label>
        <label><span>Fecha final: </span><input type="text" name="fecha_fin" readonly id="datepicker2" value="'.date("Y-m-t").'"></label>
        <div style="clear:both;"></div>
        <label><span>Asesor: </span><select name="asesor" id="asesor" onchange="camb(this.id,this.value);"><option value=""> -- Todos -- </option>';
        foreach($asesores as $k=>$v){
            echo '<option value="'.$k.'">'.$v.'</option>';    
        }
        echo '</select></label>
        <label><span>Parque: </span><select name="parque" id="parque"><option value=""> -- Todos -- </option>';
        foreach($parques as $k=>$v){
            echo '<option value="'.$k.'">'.$v.'</option>';    
        }
        echo '</select></label>
        <label><span>Estatus: </span><select name="status"><option value=""> -- Todos -- </option>';
        foreach($estatus as $k=>$v){
            echo '<option value="'.$k.'">'.$v.'</option>';    
        }
        echo '</select></label><div style="clear:both"></div><br>
	<label><span>Calendario: </span><select name="calendario"><option value=""> -- Todos -- </option>';
        foreach($calen as $k=>$v){
            echo '<option value="'.$k.'">'.$v.'</option>';    
        }
        echo '</select></label>
	<label><span>Tipo: </span><select name="tipo" id="tipo" onchange="camb(this.id,this.value);"><option value=""> -- Todos -- </option>';
        foreach($tipo as $k=>$v){
            echo '<option value="'.$k.'">'.$v.'</option>';    
        }
        echo '</select></label>
	<label><span>Subtipo: </span><select name="subtipo" id="subtipo"><option value=""> -- Todos -- </option>';
        echo '</select></label>
        <div style="clear:both;"></div><br>
        <center><input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Exportar a Excel"><br><br>
        <div id="resultados" class="CSSTableGenerator"></div></center>
    </form></body>
</html>';
?>