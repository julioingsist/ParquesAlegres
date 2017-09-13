<?php
require_once('../wp-config.php');
require('fpdf17/fpdf.php');
date_default_timezone_set("America/Mazatlan");
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<title>Parques Alegres</title>
</head>';
function iniciosemana(){
    $diaact=date("N");
    $diaact=$diaact-1;
    if(date("N")!=7){
        $diaact=$diaact+7;
    }
    return date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$diaact.' days'));
}
if($_POST['fecha_inicial']){
	$fecha=$_POST['fecha_inicial'];
	$fechafin=$_POST['fecha_final'];
	$filtro="c.post_author='".$_POST['asesor']."' AND b.fecha_visita>='".$_POST['fecha_inicial']."' AND b.fecha_visita<='".$fechafin."'";
	
}
else{
	$fecha=iniciosemana();
	$fechafin=date('Y-m-d', strtotime($fecha. ' + 6 days'));
	$filtro="b.fecha_visita>='".$fecha."' AND b.fecha_visita<='".$fechafin."'";

}
$sql="select a.ID, b.display_name,a.tablet from asesores as a, wp_users as b where a.ID=b.ID AND a.stat<1 order by b.display_name";
$res=mysql_query($sql);
//echo 'Asesor: <select name="ag" onchange="document.forma.submit();">';
while($row=mysql_fetch_array($res)) {
/*	echo '<option value="'.$row["ID"].'"';
	if ($row["ID"]==$ag) echo ' selected';
	echo '>'.$row["display_name"].'</option>';
	*/
	$asesor[$row['ID']]=$row['display_name'];
	$tablet[$row['ID']]=$row['tablet'];
}
echo '<body>
<form method="post">
Fecha inicial: </label><input type="text" readonly id="datepicker" value="'.$fecha.'" name="fecha_inicial"/>&nbsp;&nbsp;&nbsp;
Fecha final: </label><input type="text" readonly id="datepicker2" value="'.$fechafin.'" name="fecha_final"/><br><br>
Seleccione un Asesor: <select name="asesor">
<option value=""> --Todos-- </option>';
foreach($asesor as $key=>$val){
	echo '<option value="'.$key.'"'; if($key==$_POST['asesor']){ echo ' selected';} echo '>'.$val.'</opion>';
}

echo '</select>
<input type="submit" value="Filtrar"><br></form>
<button onclick="cargarmap()">Cargar mapa</button><br><br>';
echo '<table border="1"><tr><th>ID</th><th>Parque</th><th>Latitud</th><th>Longitud</th><th>Asesor</th><th>Tablet</th></tr>';
//echo '</select><br><br>';
$sql="select c.ID,c.post_title,a.latitud,a.longitud,c.post_author from coordenadas_visita as a INNER JOIN wp_comites_parques as b ON b.cve=a.cve_visita INNER JOIN wp_posts as c ON c.id=a.cve_parque where $filtro order by a.id desc limit 0,200";
$res=mysql_query($sql);
while($rows=mysql_fetch_array($res)){
    if ($rows['latitud']>0) $coordenadas[]=array($rows['latitud'],$rows['longitud'],$tablet[$rows['post_author']]);
	echo '<tr><td>'.$rows['ID'].'</td>';
	echo '<td>'.$rows['post_title'].'</td>';
	echo '<td>'.$rows['latitud'].'</td>';
	echo '<td>'.$rows['longitud'].'</td>';
	echo '<td>'.$asesor[$rows['post_author']].'</td>';
	echo '<td>'.$tablet[$rows['post_author']].'</td></tr>';
    //$visita=$rows['cve_visita'];
}

echo '</table>
<!-- Se escribe un mapa con la localizacion de la base de datos-->
<div id="demo"></div>
<div id="mapholder"></div>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script><br>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
	$( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
    });
</script>
<script type="text/javascript">
var x=document.getElementById("demo");
function cargarmap(){
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    function showPosition(position){
	mapholder=document.getElementById(\'mapholder\');
	mapholder.style.height=\'700px\';
	mapholder.style.width=\'950px\';
	latlon=new google.maps.LatLng(24.7876222,-107.3978988);
	var myOptions={
	    center:latlon,zoom:12,
	    mapTypeId:google.maps.MapTypeId.ROADMAP,
	    mapTypeControl:false,
	    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
	};
	var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);';
	if(is_array($coordenadas)){
		$c=0;
		foreach($coordenadas as $k=>$v){
			echo 'lat'.$k.'='.$v[0].';';
			echo 'lon'.$k.'='.$v[1].';';
			echo 'latlon'.$k.'=new google.maps.LatLng(lat'.$k.', lon'.$k.');';
			// $sqlp="select * from wp_comites_parques where cve=$visita";
			//$resp=mysql_query($sqlp);
			//$rowsp=mysql_fetch_array($resp);
			
			$c++;
			echo 'var marker'.$k.'=new google.maps.Marker({position:latlon'.$k.',map:map,icon:"http://parquesalegres.org/tablet/park'.$v[2].'.png",title:"Asesor PA- '.$v[2].'"});';
			if ($c>9) $c=0;
		}	
	}
	echo '
    }
    function showError(error){
	switch(error.code){
	    case error.PERMISSION_DENIED:
		x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
		break;
	    case error.POSITION_UNAVAILABLE:
		x.innerHTML="La información de la localización no esta disponible."
		break;
	    case error.TIMEOUT:
		x.innerHTML="El tiempo de petición ha expirado."
		break;
	    case error.UNKNOWN_ERROR:
		x.innerHTML="Ha ocurrido un error desconocido."
		break;
	}
    }
}
</script>';
echo '</body>
</html>';
?>