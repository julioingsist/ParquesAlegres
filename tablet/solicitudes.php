<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$solicitud=array(1=>"Cambio de fecha",2=>"Cambio de calificación",3=>"Borrar visita",4=>"Borrar contacto",100=>"Otro");
$parametros=array("opera"=>"El comité opera con","formaliza"=>"¿Cómo está formalizado?","organiza"=>"Cuenta con buena organización","reunion"=>"Existen reuniones","proyecto"=>"Tienen proyectos en proceso","tipo_proyecto"=>"Cuenta con Proyecto","estado"=>"Estado actual de las instalaciones","instalaciones"=>"Hay instalaciones en la mayoria del espacio","ingresop"=>"Tienen fuente de ingresos permanentes","ingresadop"=>"Es suficiente lo ingresado para operar bien","mancomunado"=>"Tienen cuenta mancomunada","eventosr"=>"Hay eventos con regularidad","eventos"=>"Cuentan con un calendario anual de actividades","averdes"=>"Cuenta con","estaver"=>"Se encuentra en buen estado","gente"=>"Porcentaje de afluencia sobre lo existente","respint"=>"Las instalaciones se respetan","orden"=>"Se cuenta con un reglamento de orden","limpieza"=>"Se mantiene limpio");
$status=array(0=>"Pendiente",1=>"Autorizado",2=>"Rechazado");
//AND a.stat<1
$sql1="select a.ID, b.display_name from asesores as a, wp_users as b where a.ID=b.ID order by b.display_name";
$res1=mysql_query($sql1);
while($row1=mysql_fetch_array($res1)){
    $asesores[$row1['ID']]=$row1['display_name'];
}
$sql0="select id, post_title from wp_posts where post_type='parque' and post_status='publish' order by post_title ASC";
$res0=mysql_query($sql0);
while($row0=mysql_fetch_array($res0)){
    $parque[$row0['id']]=$row0['post_title'];
}
if($_POST['cmd']==2){
    $sql2="select * from solicitudes where id='".$_POST['id']."'";
    $res2=mysql_query($sql2);
    if(mysql_num_rows($res2)>0){
	$row2=mysql_fetch_array($res2);
	if($_POST['tipo']==1){
	    if($row2['solicitud']!=3){
                if($row2['solicitud']!=4){
                    if($row2['solicitud']!=100){
                        $sql4="UPDATE wp_comites_parques SET ".$row2['campo']."='".$row2['valorf']."' WHERE cve='".$row2['cve_visita']."'";    
                    }
                    else{
                        $sql4="SELECT cve FROM wp_comites_parques limit 1";
                    }
                }else{
                    $sql4="UPDATE comite_miembro SET estatus='2' WHERE id='".$row2['cve_visita']."'";
                }
	    }
	    else{
		$sql4="DELETE FROM wp_comites_parques WHERE cve='".$row2['cve_visita']."'";
	    }
	    $res4=mysql_query($sql4);
	    if(!$res4){
		echo 'No se pudo realizar la modificación';
	    }
	    else{
		$sql3="UPDATE solicitudes SET status='".$_POST['tipo']."' WHERE id='".$_POST['id']."'";
		$res3=mysql_query($sql3);
		if (!$res3) {
		    echo 'No se pudo modificar el estatus de la solicitud';
		}
		else{
		    echo 'Se ha realizado la modificación con éxito';
		}
	    }
	}
	else{
	    $sql3="UPDATE solicitudes SET status='".$_POST['tipo']."' WHERE id='".$_POST['id']."'";
	    $res3=mysql_query($sql3);
	    if (!$res3) {
		echo 'No se pudo modificar el estatus de la solicitud';
	    }
	    else{
		echo 'Se ha realizado la modificación con éxito';
	    }
	}
    }
    else{
	echo 'La solicitud seleccionada no existe';
    }
    exit();
}
if($_POST['cmd']==1){
    $filtro="";
    if($_POST['asesor']!=""){
	$filtro.="AND asesor='".$_POST['asesor']."' ";
    }
    if($_POST['status']!=""){
	$filtro.="AND status='".$_POST['status']."' ";
    }
    if($_POST['solicitud']!=""){
	$filtro.="AND solicitud='".$_POST['solicitud']."' ";
    }
    if($_POST['fecha_sol']!=""){
	$filtro.="AND fecha>='".$_POST['fecha_sol']."' ";
    }
    if($_POST['fecha_sol2']!=""){
	$filtro.="AND fecha<='".$_POST['fecha_sol2']."' ";
    }
    $sql="select * from solicitudes where 1 $filtro";
    $res=mysql_query($sql);
    if(mysql_num_rows($res)>0){
	echo '<div class="CSSTableGenerator"><table>
	<tr>
	    <td>ID</td>
	    <td>Asesor</td>
            <td>Fecha</td>
	    <td>Parque</td>
	    <td>Solicitud</td>
	    <td>Motivo</td>
	    <td>Estatus</td>';
	    if($_POST['status']==0 || $_POST['status']=="" && $_POST['solicitud']!=100){ echo '<td></td>';}
	echo '</tr>';
	while($row=mysql_fetch_array($res)){
	    echo '<tr><td>'.$row['id'].'</td>';
	    echo '<td>'.$asesores[$row['asesor']].'</td>';
            echo '<td>'.$row['fecha'].'</td>';
	    echo '<td>'.$parque[$row['cve_parque']].'</td>';
	    $sql00="select cve from wp_comites_parques where cve_parque='".$row['cve_parque']."'";
	    $res00=mysql_query($sql00);
	    $c=1;
	    $numvisita="";
	    while($row00=mysql_fetch_array($res00)){
		if($row00['cve']==$row['cve_visita']){
		    $numvisita=$c;
		}
		$c++;
	    }
	    if($row['solicitud']==2){
		echo '<td>'.$solicitud[$row['solicitud']].' para la visita #'.$numvisita.' en el subparámetro "'.$parametros[$row['campo']].'" de: '.$row['valori'].' a: '.$row['valorf'].'</td>';
	    }
	    elseif($row['solicitud']==1){
		echo '<td>'.$solicitud[$row['solicitud']].' para la visita #'.$numvisita.' de: '.$row['valori'].' a: '.$row['valorf'].'</td>';
	    }
            elseif($row['solicitud']==4){
                $sql001="select nombre from comite_miembro where id='".$row['cve_visita']."'";
                $res001=mysql_query($sql001);
                $contacto="";
                while($row001=mysql_fetch_array($res001)){
                    $contacto=$row001['nombre'];
                }
		echo '<td>'.$solicitud[$row['solicitud']].' "'.$contacto.'"</td>';
	    }
	    else{
		echo '<td>'.$solicitud[$row['solicitud']].' #'.$numvisita.'</td>';
	    }
	    echo '<td>'.$row['motivo'].'</td>';
	    echo '<td>'.$status[$row['status']].'</td>';
	    if($_POST['status']==0 || $_POST['status']==""){ echo '<td>'; if($row['status']==0) {echo '<a href="javascript:void(0);" onclick="soli(\''.$row['id'].'\',\'1\');">Autorizar</a>&nbsp;|&nbsp;<a href="javascript:void(0);" onclick="soli(\''.$row['id'].'\',\'2\');">Rechazar</a>'; } echo '</td>'; }
	    echo '</tr>';
	}
	echo '</table></div>';
    }
    else{
	echo 'No hay solicitudes registradas en el sistema bajo el critero de búsqueda seleccionado.';
    }
    exit();
}
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Solicitudes Parques Alegres</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<style>
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
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:80%;
	box-shadow: 10px 10px 5px #888888;
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
}.CSSTableGenerator tr:hover td{
	background: #52A400;
	color:white;
	font-weight:bold;
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
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #5fbf00 5%, #3f7f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5fbf00), color-stop(1, #3f7f00) );
	background:-moz-linear-gradient( center top, #5fbf00 5%, #3f7f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#5fbf00,3f7f00);

	background-color:#5fbf00;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
</head>';
echo '<body>';
echo '<script>
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
    });
    $(document).ready(function(){
	buscar();
    });
    function buscar(){
        $("#resultados").text("Cargando...");
        var asesor = document.getElementsByName("asesor")[0].value;
	var solicitud = document.getElementsByName("solicitud")[0].value;
	var status = document.getElementsByName("status")[0].value;
        var fecha = document.getElementsByName("fecha_sol")[0].value;
        var fecha2 = document.getElementsByName("fecha_sol2")[0].value;
	$("#resultados").load("http://parquesalegres.org/tablet/solicitudes.php", {asesor: asesor, solicitud:  solicitud, status: status, fecha_sol: fecha, fecha_sol2: fecha2, cmd: 1});
    }
    function soli(id,tipo){
	$("#resultados2").load("http://parquesalegres.org/tablet/solicitudes.php", {id: id, tipo: tipo, cmd: 2}, function (responseText) {
	    alert("¡"+responseText+"!");
	    buscar();
	});
    }
</script>';
echo '
<h2><center>Listado de Solicitudes de cambios por asesores</center></h2><br>
<label><span>Fecha Inicial:</span><input type="text" readonly id="datepicker" value="'.date("Y-m-d").'" name="fecha_sol" /></label>
<label><span>Fecha Final:</span><input type="text" readonly id="datepicker2" value="'.date("Y-m-d").'" name="fecha_sol2" /></label>
<div style="clear:both;"></div>
<label><span>Asesor:</span><select name="asesor"><option value=""> -- Todos --</option>';
foreach($asesores as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';
}
echo '</select></label>
<label><span>Solicitud:</span><select name="solicitud"><option value=""> -- Todos --</option>';
foreach($solicitud as $k=>$v){
    echo '<option value="'.$k.'">'.$v.'</option>';
}
echo '</select></label>
<label><span>Estatus:</span><select name="status"><option value=""> -- Todos --</option>';
foreach($status as $k=>$v){
    echo '<option value="'.$k.'"'; if($k==0){ echo ' selected'; } echo '>'.$v.'</option>';
}
echo '</select></label>
<div style="clear:both;"></div><br>
<center><input type="button" class="button" value="Filtrar" onclick="buscar();"><br><br>
<div id="resultados">
Cargando...
</div>
<div id="resultados2" style="display:none;">
</div>
</center>';
if($_GET['x']==1){
    $sql10="select p.ID,p.post_title,u.display_name from wp_posts p INNER JOIN wp_users u ON p.post_author=u.ID WHERE p.post_status='publish' and post_type='parque' order by p.post_author";
    $res10=mysql_query($sql10);
    echo $sql10;
    while($row10=mysql_fetch_array($res10)){
	echo $row10['ID'].'-'.$row10['post_title'].'-'.$row10['display_name'].'<br>';
    }
    echo '<br><br><br>';
    $directorio = opendir("../formatos/"); //ruta actual
    while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
    {
	if(substr($archivo,-3)!="pdf"){
	    $nombresar[]=substr($archivo,0,-4);
	}
    }
    asort($nombresar);
    foreach($nombresar as $v){
	echo $v.'<br>';
    }
}
echo '</body>
</html>';
?>