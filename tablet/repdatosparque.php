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
        $filtro.=" AND k2.post_author='".$_POST['asesor']."'";
    }
    if($_POST['parque']){
        $filtro.=" AND k2.ID='".$_POST['parque']."'";
    }
    $estado=array(1=> 'Aguascalientes',2=> 'Baja California',3=> 'Baja California Sur',4=> 'Campeche',5=> 'Coahuila de Zaragoza',6=> 'Colima',7=> 'Chiapas',8=> 'Chihuahua',9=> 'Distrito Federal',10=> 'Durango',11=> 'Guanajuato',12=> 'Guerrero',13=> 'Hidalgo',14=> 'Jalisco',15=> 'México',16=> 'Michoacán de Ocampo',17=> 'Morelos',18=> 'Nayarit',19=> 'Nuevo León',20=> 'Oaxaca',21=> 'Puebla',22=> 'Querétaro',23=> 'Quintana Roo', 24=> 'San Luis Potosí',25=> 'Sinaloa',26=> 'Sonora',27=> 'Tabasco',28=> 'Tamaulipas',29=> 'Tlaxcala',30=> 'Veracruz de Ignacio de la Llave',31=> 'Yucatán',32=> 'Zacatecas');
    $zona=array(1 => 'Noreste (NE)', 2 => 'Noroeste (NO)', 3 => 'Sureste (SE)', 4 => 'Suroeste (SO)');
    $tipo=array(1=>"Área verde",2=>"Centro barrio",3=>"De bolsillo",4=>"Lineal",5=>"Mixto",6=>"Parque urbano",7=>"Plazuela",8=>"Unidad deportiva");
    $regimen=array(1=>"Público",2=>"Condominal",3=>"Concesionado");
    $legal=array(1=>"Propiedad Gobierno Federal",2=>"Gobierno del Estado",3=>"Gobierno Municipal",4=>"Propiedad Ejidal",5=>"Propiedad Fraccionadora");
    $nivel=array(1=>"Alto (AB)",2=>"Medio alto (C+)",3=>"Medio ( C )",4=>"medio bajo (D+)",5=>"Bajo (D)",6=>"Pobreza extrema (E)");
    $sql="select k1.display_name as asesor, k2.ID as ID, k2.post_title as parque, k3.meta_value as 'clave_catastral', k4.meta_value as estado, k5.meta_value as ciudad, k7.meta_value as zona, k8.meta_value as 'colonia', k9.meta_value as 'vialidad_principal', k10.meta_value as 'vialidad1', k11.meta_value as 'vialidad2', k12.meta_value as 'vialidad_posterior', k13.meta_value as superficie, k14.meta_value as tipo, k15.meta_value as regimen, k16.meta_value as 'situacion_legal', k6.meta_value as 'nivel_socioeconomico', k17.nombre as contacto, k18.latitud as latitud, k18.longitud as longitud from wp_posts k2 LEFT JOIN wp_users k1 ON k1.ID=k2.post_author LEFT JOIN wp_postmeta k3 ON k2.ID=k3.post_id AND k3.meta_key='_parque_clave_catastral' LEFT JOIN wp_postmeta k4 ON k2.ID=k4.post_id AND k4.meta_key='_parque_estado' LEFT JOIN wp_postmeta k5 ON k2.ID=k5.post_id AND k5.meta_key='_parque_ciudad' LEFT JOIN wp_postmeta k7 ON k2.ID=k7.post_id AND k7.meta_key='_parque_zona' LEFT JOIN wp_postmeta k8 ON k2.ID=k8.post_id AND k8.meta_key='_parque_nomasentamiento' LEFT JOIN wp_postmeta k9 ON k2.ID=k9.post_id AND k9.meta_key='_parque_vialidad_prin' LEFT JOIN wp_postmeta k10 ON k2.ID=k10.post_id AND k10.meta_key='_parque_vialidad1' LEFT JOIN wp_postmeta k11 ON k2.ID=k11.post_id AND k11.meta_key='_parque_vialidad2' LEFT JOIN wp_postmeta k12 ON k2.ID=k12.post_id AND k12.meta_key='_parque_vialidad_pos' LEFT JOIN wp_postmeta k13 ON k2.ID=k13.post_id AND k13.meta_key='_parque_sup' LEFT JOIN wp_postmeta k14 ON k2.ID=k14.post_id AND k14.meta_key='_parque_tipo' LEFT JOIN wp_postmeta k15 ON k2.ID=k15.post_id AND k15.meta_key='_parque_regimen' LEFT JOIN wp_postmeta k16 ON k2.ID=k16.post_id AND k16.meta_key='_parque_legal' LEFT JOIN wp_postmeta k6 ON k2.ID=k6.post_id AND k6.meta_key='_parque_nivel' LEFT JOIN comite_parque k20 ON k2.ID=k20.cve_parque LEFT JOIN comite_miembro k17 ON k20.ID=k17.cve_comite AND k17.contacto='1' LEFT JOIN coordenadas_visita k18 ON k2.ID=k18.cve_parque WHERE k2.post_type='parque' and k2.post_status='publish' ".$filtro." group BY k2.ID";
    $res=mysql_query($sql);
    if(mysql_num_rows($res)>0){
        echo '<table><tr><td>Asesor</td><td>ID</td><td>Parque</td><td>Clave catastral</td><td>Estado</td><td>Ciudad</td><td>Zona</td><td>Colonia</td><td>Vialidad principal</td><td>Vialidad 1</td><td>Vialidad 2</td><td>Vialidad posterior</td><td>Superficie</td><td>Tipo</td><td>Regimen</td><td>Situación legal</td><td>Nivel socioeconomico</td><td>Contacto</td><td>Latitutud</td><td>Longitud</td>';
        while($row=mysql_fetch_array($res)){
        	echo '<tr><td>'.$row['asesor'].'</td><td>'.$row['ID'].'</td><td>'.$row['parque'].'</td><td>'.$row['clave_catastral'].'</td><td>'.$estado[$row['estado']].'</td><td>'.$row['ciudad'].'</td><td>'.$zona[$row['zona']].'</td><td>'.$row['colonia'].'</td><td>'.$row['vialidad_principal'].'</td><td>'.$row['vialidad1'].'</td><td>'.$row['vialidad2'].'</td><td>'.$row['vialidad_posterior'].'</td><td>'.$row['superficie'].'</td><td>'.$tipo[$row['tipo']].'</td><td>'.$regimen[$row['regimen']].'</td><td>'.$legal[$row['situacion_legal']].'</td><td>'.$nivel[$row['nivel_socioeconomico']].'</td><td>'.$row['contacto'].'</td><td>'.$row['latitud'].'</td><td>'.$row['longitud'].'</td></tr>';
        }
        echo '<tr><td><b>Total:</b></td><td colspan="19"><b>'.mysql_num_rows($res).'</b></td></table>';    
    }
    else{
        echo 'No hay registros bajo el criterio de búsqueda.';
    }
    exit();
}
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de Datos de parques</title>
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
        buscar();
    });
    function buscar(){
        $("#resultados").text("Cargando...");
        var asesor = document.getElementsByName("asesor")[0].value;
		var parque = document.getElementsByName("parque")[0].value;
		$("#resultados").load("http://parquesalegres.org/tablet/repdatosparque.php", {asesor: asesor, parque: parque, cmd: 1});
    }
    function camb(i,v){
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
				$.ajax({url: "repdatosparque.php",
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
		<input type="hidden" name="cmd" value="datosparques">
    	<h3 style="text-align:center">Reporte de Datos en parques</h2>
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
		<center><input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" type="submit" value="Exportar a Excel"><br><br>
    	<div id="resultados" class="CSSTableGenerator"></div></center>
    </form></body>
</html>';
?>