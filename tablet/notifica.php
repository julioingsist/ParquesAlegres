<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
if($_POST['cmd']==2){
	$sql4="select * from mensajes where para LIKE '%".$_POST['asesor']."%' and fecha_envio<='".$_POST['fecha']."' AND estatus!=1";
	$res4=mysql_query($sql4);
	if(mysql_num_rows($res4)>0){
		while($row4=mysql_fetch_array($res4)) {
			echo $row4['ID'].'><'.$row4['mensaje'].'|';
		}	
	}
	else{
		echo 'no';
	}
	exit();
}
if($_POST['cmd']==3){
	$sql5="UPDATE mensajes SET estatus='1' WHERE id='".$_POST['cve_msg']."'";
	$res5=mysql_query($sql5);
	if (!$res5) {
		echo 'no';
	}
	else{
		echo 'si';
	}
	exit();
}
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$sql1="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1 order by display_name ASC";
$res1=mysql_query($sql1);
while($row1=mysql_fetch_array($res1)) {
	$asesores[$row1['ID']]=$row1['display_name'];
}
$asesores[1478]="Usuario de pruebas";
$sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_array($res2)) {
	$parques[$row2['ID']]=$row2['post_title'];
}
if($_POST['cmd']==1){
	$pos2=strpos($_POST['destinatarios'],"Todos");
	$mal=0;
	$bien=0;
	if($pos2===false){
		$pos=strpos($_POST['destinatarios'],",");
		if($pos!==false){
			$dest=substr($_POST['destinatarios'],0,-2);
			foreach($asesores as $k=>$v){
				$desti=explode(",",$dest);
				foreach($desti as $key=>$val){
					if(trim($val)==trim($v)){
						$sql3="INSERT INTO mensajes (fecha_reg, para, fecha_envio, mensaje, estatus) VALUES ('".date("Y-m-d")."','".$k."','".$_POST['fecha']."','".$_POST['mensaje']."','0')";
						$res3=mysql_query($sql3);
						if (!$res3) {
							$mal++;
						}
						else{
							$bien++;
						}
					}
				}
			}
		}
		else{
			foreach($asesores as $k=>$v){
				if(trim($val)==trim($_POST['destinatarios'])){
					$sql3="INSERT INTO mensajes (fecha_reg, para, fecha_envio, mensaje, estatus) VALUES ('".date("Y-m-d")."','".$k."','".$_POST['fecha']."','".$_POST['mensaje']."','0')";
					$res3=mysql_query($sql3);
					if (!$res3) {
						$mal++;
					}
					else{
						$bien++;
					}
				}
			}
		}	
	}
	else{
		foreach($asesores as $k=>$v){
			$sql3="INSERT INTO mensajes (fecha_reg, para, fecha_envio, mensaje, estatus) VALUES ('".date("Y-m-d")."','".$k."','".$_POST['fecha']."','".$_POST['mensaje']."','0')";
			$res3=mysql_query($sql3);
			if (!$res3) {
				$mal++;
				
			}
			else{
				$bien++;
			}
		}
	}
	if($mal>0){
		if($mal>1){
			echo 'Hubo varios problemas<br>';
		}else{
			echo 'Hubo un problema<br>';
		}
	}
	if($bien>0){
		if($bien>1){
			echo 'Mensajes programados exitosamente<br>';
		}
		else{
			echo 'Mensaje programado exitosamente<br>';
		}
	}
}
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de notificaciones Tablet</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<style>
label {
    margin: 0px 0px 5px;
}
label>span {
    float: left;
    width: 20%;
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
input[type="text"], textarea{
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
textarea{
	height:75px;
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
		$( "#datepicker" ).datepicker({ minDate:0, dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});';
		$arrjs="";
		foreach($asesores as $k=>$v){
			$arrjs.='"'.$v.'", ';
		}
		$arrjs=substr($arrjs, 0, -1);
		echo '
		var availableTags = [
			"Todos", 
			'.$arrjs.'
		];
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}
 
		$( "#destinatarios" )
		//dont navigate away from the field on tab when selecting an item
		.bind( "keydown", function( event ) {
			if ( event.keyCode === $.ui.keyCode.TAB && $( this ).autocomplete( "instance" ).menu.active ) {
				event.preventDefault();
			}
		})
		.autocomplete({
			minLength: 0,
			source: function( request, response ) {
				// delegate back to autocomplete, but extract the last term
				response( $.ui.autocomplete.filter(availableTags, extractLast( request.term ) ) );
			},
			focus: function() {
				// prevent value inserted on focus
				return false;
			},
			select: function( event, ui ) {
				var terms = split( this.value );
				// remove the current input
				terms.pop();
				// add the selected item
				terms.push( ui.item.value );
				// add placeholder to get the comma-and-space at the end
				terms.push( "" );
				this.value = terms.join( ", " );
				return false;
			}
		});
	});
</script>
</head>
<body>';
    echo '<form method="post">
        <h3 style="text-align:center">Sistema de notificaciones Tablet</h2>
	<label for="destinatarios"><span>Para: </span></label><input type="text" id="destinatarios" name="destinatarios"><div style="clear:both;"></div>
        <label><span>Enviar mensaje el día:</span><input type="text" name="fecha" id="datepicker" value="'.date("Y-m-d").'"></label><div style="clear:both;"></div>
	<label><span>Mensaje:</span><textarea name="mensaje"></textarea></label><div style="clear:both;"></div>
	<input style="margin-left:25%;" type="submit" class="button" value="Enviar">
	<input type="hidden" name="cmd" value="1">
    </form></body>
</html>';
?>