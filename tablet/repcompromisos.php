<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$statuscom=array(1=>"Pendiente",2=>"Postergado",3=>"Cumplido",4=>"No cumplido",5=>"No cumplido");
$parametros=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"vespacio",6.2=>"disenio",6.3=>"ejecutivo",7=>"estado",8=>"instalaciones",9=>"ingresop",10=>"ingresadop",
                  11=>"mancomunado",12=>"eventosr",13=>"eventos",14=>"averdes",15=>"estaver",16=>"gente",17=>"respint",18=>"orden",19=>"limpieza");
$nomparametros=array(1=>"El comité opera con",2=>"¿Cómo está formalizado?",3=>"Cuenta con buena organización",4=>"Existen reuniones",5=>"Tienen proyectos en proceso",
                     6=>"Cuenta con Visión de Espacio",6.2=>"Cuenta con Proyecto de Diseño",6.3=>"Cuenta con Proyecto Ejecutivo",7=>"Estado actual de las instalaciones",8=>"Hay instalaciones en la mayoria del espacio",
                     9=>"Tienen fuente de ingresos permanentes",10=>"Es suficiente lo ingresado para operar bien",11=>"Tienen cuenta mancomunada",
                     12=>"Hay eventos con regularidad",13=>"Cuentan con un calendario anual de actividades",14=>"Cuenta con",15=>"Se encuentra en buen estado",
                     16=>"Porcentaje de afluencia sobre lo existente",17=>"Las instalaciones se respetan",18=>"Se cuenta con un reglamento de orden",19=>"Se mantiene limpio");
$compromisos=array(1=>"Reestructuración del comité","Formalizar el comité ante el ayuntamiento","Elaborar por escrito las políticas de trabajo del comité",
                   "Plan de trabajo (por lo menos para un periodo de seis meses)","Calendario de reuniones del comité. (Se sugiere una cada 30 días)",
                   "Programa de reuniones vecinales (se sugiere una cada tres meses)","Verificar el estatus legal del parque","Elaborar la visión del espacio",
                   "Gestionar el diseño arquitectónico","Gestionar el proyecto ejecutivo","Mantenimiento","Rehabilitación","Remodelación","Nueva adquisición",
                   "Programa de pago vecinal para mantenimineto del parque","Organización cooperación vecinal pro rehabilitación del parque",
                   "Organización de cooperación vecinal pro - adquisición infraestructura","Gestión de recibos deducibles de impuestos","Torneos deportivos",
                   "Celebración de días festivos","Rifa","Evento cultural","Función de cine","Carrera pedestre","Noche bohemia","Informe de ingresos y egresos",
                   "Generar recibos de ingresos","Archivar comprobante de gastos","Abrir cuenta mancomunada",
                   "Participación activa en la organización de eventos (tener asignado un rol y una responsabilidad)","Particpación activa en la promoción de los eventos",
                   "Función de cine","Carrera pedestre","Noche bohemia","Convivio recreativo","Calendario anual de eventos",
                   "Expediente de evidencias fotográficas de eventos","Gestionar árboles en Ayuntamiento y Parque Botánico","Gestionar plantas de ornanto en Ayuntamiento",
                   "Siembra de árboles","Colocación de cesped natural y/o sintético","Protección para árboles pequeños","Campaña de limpieza",
                   "Ferlilizar árboles con componentes orgnánicos","Nomeclatura de la vegetación en el parque","Adquisición de herramientas de limpieza","Fumigación",
                   "Instalar sistema de riego","Adquisición de herramientas de jardinería","Poda de árboles y/o cesped","Promotor deportivo","Clases y/o talleres deporivos",
                   "Futbol","Basquetbol","Zumba","Clases y/o talleres culturales","Pintura","Danza","Clubes con diversos objetivos para niños, adolescentes y adultos",
                   "Club de ciclismo",'Campaña de "invita a un vecino"',"Torneos","Deportivo","Cultural","Artístico","Comité de niños","Invitación a Voluntariado",
                   "Curso de verano deportivo o cultural","Ciclo de pláticas y conferencias para Padres, Adolescentes y niños","Campañmentos","Murales",
                   "Gestión de vigilancia para el parque","Delimitación de espacios","Contratar velador","Creación de reglamento del parque",
                   "Instalación de reglamento de parque","Instalación de señalización","Botón de pánico","Instalación de Timer para control de recursos",
                   "Jornada de limpieza","Contratar jardinero",84=>"Campañas",85=>"Fondos económicos",86=>"Tejido social");
$compesp=array(1=>"Bancas","Cerca","Alumbrado","Baños","Fuentes","Botes de basura","Banquetas","Acceso para capacidades especiales","Anclaje para bicicletas",
               "Cajones de estacionamiento","Canasta de reciclaje","Cancha de usos múltiples","Cancha de volibol","Cancha de futbol","Cancha de basquetbol",
               "Cancha de beisbol","Cancha de softbol","Mesa de ping pong","Back Stop","Porterias","Tableros","Aros","Losa","Pintura","Andadores","Gradas","Ejercitadores",
               "Ciclovía","Gimnasio","Techumbre","Área de adoquín","Bordillo de concreto","Piñateros","Comedores","Asadores","Juegos infantiles","Palapa","Alberca",
               "Camastros","Regaderas","Césped","Árboles","Arbustos","Toma de agua","Sistema de riego");
$compespecial=array(1=>"Instalaciones","Baños","Fuentes","Banquetas","Acceso para capacidades especiales","Anclaje para bicicletas","Cajones de estacionamiento",
                    "Deportiva","Cancha de usos múltiples","Cancha de volibol","Cancha de futbol","Cancha de basquetbol","Cancha de beisbol","Cancha de softbol",
                    "Porterias","Losa","Andadores","Gradas","Ciclovía","Gimnasio","Areas de esparcimiento","Techumbre","Área de adoquín","Comedores");
$compesp2=array(1=>"Limpieza","Árboles");
$compesp3=array(1=>"Torneos","Tianguis","Kermes","Dias festivos","Rifa","Evento cultural","Funcion de cine","Carrera pedestre","Noche bohemia");
function compararFechas($primera, $segunda){
	$valoresPrimera = explode ("-", $primera);   
	$valoresSegunda = explode ("-", $segunda); 
	$anyoPrimera = $valoresPrimera[0];  
	$mesPrimera = $valoresPrimera[1];  
	$diaPrimera = $valoresPrimera[2]; 
	$anyoSegunda = $valoresSegunda[0];  
	$mesSegunda = $valoresSegunda[1];  
	$diaSegunda = $valoresSegunda[2];
	$diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);
	$diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);
	if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
		// "La fecha ".$primera." no es válida";
		return 0;
	}elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
		// "La fecha ".$segunda." no es válida";
		return 0;
	}else{
		return  $diasPrimeraJuliano - $diasSegundaJuliano;
	}
}
//$dias2=compararFechas('2015-10-10','2015-10-12');
//echo $dias2;
$sql="select a.ID,u.display_name,a.cod from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1 order by u.display_name ASC";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['ID']]=$row['display_name'];
}
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
	if($_POST['fecha_inicial']!=""){
		$filtro1.=" AND v.fecha_visita>='".$_POST['fecha_inicial']."'";
	}
	if($_POST['fecha_final']!=""){
		$filtro1.=" AND v.fecha_visita<='".$_POST['fecha_final']."'";
	}
	if($_POST['parque']){
		$filtro.="AND id='".$_POST['parque']."'";
	}
	echo '<table id="table1">
	<thead><tr><th>ID Parque</th><th>Nombre Parque</th><th>Asesor</th><th>Parámetro</th><th>Compromiso</th><th>Meta</th><th>Fecha del compromiso</th><th>Promesa de Cumplimiento</th><th>Estatus</th><th>Fecha del estatus</th></tr></thead>';
	$tot=0;
	$cc=0;
	$ccd=0;
	$cnc=0;
	$pc=0;
	echo '<tbody>';
	foreach($asesores as $k=>$v){
		if($_POST['asesor']){
			if($_POST['asesor']==$k){
				$sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".$k."' $filtro order by post_title ASC";
				$res=mysql_query($sql);
				$totcomp=0;
				while($row=mysql_fetch_array($res)){
					$sql1="select c.*,v.fecha_visita,v.opera from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."' $filtro1";
					$res1=mysql_query($sql1);
					$entro=0;
					if(mysql_num_rows($res1)>0){
						$rows=mysql_num_rows($res1)+1;
						while($row1=mysql_fetch_array($res1)){
							if($row1['opera']>7 && $entro==0){
								$pc++;
								$entro=1;
							}
							$dias=compararFechas($row1['fecha_cumplimiento'],$row1['fecha_status']);
							if($dias>=0 && $row1['estatus']==3 && $row1['fecha_status']!="0000-00-00"){
								$cc++;
							}
							else if($dias<0 && $row1['estatus']==3 && $row1['fecha_status']!="0000-00-00"){
								$ccd++;
							}
							if($row1['estatus']==4 || $row1['estatus']==5){
								$cnc++;
							}
							echo '<tr><td>'.$row['id'].'</td><td>'.$row['post_title'].'</td><td>'.$v.'</td>
							<td>'.$nomparametros[array_search($row1['parametro'], $parametros)].'</td>
							<td>';
							if($row1['parametro']=="instalaciones" || $row1['parametro']=="estado" || $row1['parametro']=="eventosr"){
								$comp=explode(",",$row1['compromiso']);
								if($comp[0]==13){
									$namee=$compespecial[$comp[1]];
								}
								elseif($comp[0]==84){
									$namee=$compesp2[$comp[1]];
								}
								elseif($comp[0]==85 || $comp[0]==86){
									$namee=$compesp3[$comp[1]];
								}
								else{
									$namee=$compesp[$comp[1]];
									if($comp[1]==111){
										$namee="Instalaciones";
									}
									if($comp[1]==112){
										$namee="Deportiva";
									}
									if($comp[1]==113){
									    $namee="Áreas de esparcimiento";
									}
									if($comp[1]==114){
									    $namee="Áreas verdes";
									}    
								}
								echo $compromisos[$comp[0]].': '.$namee;
							}
							else{
								echo $compromisos[$row1['compromiso']];
							}
							echo '</td>
							<td>'.$row1['meta'].'</td><td>'.$row1['fecha_visita'].'</td><td>'.$row1['fecha_cumplimiento'].'</td><td>'.$statuscom[$row1['estatus']].'</td><td>'.$row1['fecha_status'].'</td></tr>';
						}
						$totcomp=$totcomp+mysql_num_rows($res1);
					}
					else{
						echo '<tr><td>'.$row['id'].'</td><td>'.$row['post_title'].'</td><td>'.$v.'</td><td colspan="7" align="center">No tiene compromisos</td></tr>';
						$sql1="select opera from wp_comites_parques where cve_parque='".$row['id']."' order by fecha_visita DESC, cve DESC limit 1";
						$res1=mysql_query($sql1);
						if(mysql_num_rows($res1)>0){
							while($row1=mysql_fetch_array($res1)){
								if($row1['opera']>7){
									$pc++;
								}
							}
						}
					}
				}
			}
		}
		else{
			$sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".$k."' $filtro order by post_title ASC";
			$res=mysql_query($sql);
			$totcomp=0;
			while($row=mysql_fetch_array($res)){
				$sql1="select c.*,v.fecha_visita,v.opera from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."' $filtro1";
				$res1=mysql_query($sql1);
				$entro=0;
				if(mysql_num_rows($res1)>0){
					$rows=mysql_num_rows($res1)+1;
					while($row1=mysql_fetch_array($res1)){
						if($row1['opera']>7 && $entro==0){
							$pc++;
							$entro=1;
						}
						$dias=compararFechas($row1['fecha_cumplimiento'],$row1['fecha_status']);
						if($dias>=0 && $row1['estatus']==3 && $row1['fecha_status']!="0000-00-00"){
							$cc++;
						}
						else if($dias<0 && $row1['estatus']==3 && $row1['fecha_status']!="0000-00-00"){
							$ccd++;
						}
						if($row1['estatus']==4 || $row1['estatus']==5){
							$cnc++;
						}
						echo '<tr><td>'.$row['id'].'</td><td>'.$row['post_title'].'</td><td>'.$v.'</td>
						<td>'.$nomparametros[array_search($row1['parametro'], $parametros)].'</td>
						<td>';
						if($row1['parametro']=="instalaciones" || $row1['parametro']=="estado" || $row1['parametro']=="eventosr"){
							$comp=explode(",",$row1['compromiso']);
							if($comp[0]==13){
								$namee=$compespecial[$comp[1]];
							}
							elseif($comp[0]==84){
								$namee=$compesp2[$comp[1]];
							}
							elseif($comp[0]==85 || $comp[0]==86){
								$namee=$compesp3[$comp[1]];
							}
							else{
								$namee=$compesp[$comp[1]];
								if($comp[1]==111){
									$namee="Instalaciones";
								}
								if($comp[1]==112){
									$namee="Deportiva";
								}
								if($comp[1]==113){
								    $namee="Áreas de esparcimiento";
								}
								if($comp[1]==114){
								    $namee="Áreas verdes";
								}    
							}
							echo $compromisos[$comp[0]].': '.$namee;
						}
						else{
							echo $compromisos[$row1['compromiso']];
						}
						echo '</td>
						<td>'.$row1['meta'].'</td><td>'.$row1['fecha_visita'].'</td><td>'.$row1['fecha_cumplimiento'].'</td><td>'.$statuscom[$row1['estatus']].'</td><td>'.$row1['fecha_status'].'</td></tr>';
					}
					$totcomp=$totcomp+mysql_num_rows($res1);
				}
				else{
					echo '<tr><td>'.$row['id'].'</td><td>'.$row['post_title'].'</td><td>'.$v.'</td><td colspan="7" align="center">No tiene compromisos</td></tr>';
					$sql1="select opera from wp_comites_parques where cve_parque='".$row['id']."' order by fecha_visita DESC, cve DESC limit 1";
					$res1=mysql_query($sql1);
					if(mysql_num_rows($res1)>0){
						while($row1=mysql_fetch_array($res1)){
							if($row1['opera']>7){
								$pc++;
							}
						}
					}
				}
			}	
		}
		$tot=$tot+$totcomp;
	}
	echo '<tr><th>Total General:</th><th colspan="9">'.$tot.'</th></tr>';
	echo '</tbody></table><br><br>';
	echo '<b>Porcentaje de compromisos</b><br>';
	echo 'Cumplidos a tiempo: '.round(($cc*100)/$tot).'%<br>
	Cumplidos a destiempo: '.round(($ccd*100)/$tot).'%<br>
	No cumplidos: '.round(($cnc*100)/$tot).'%<br><br>';
	echo '<b>Número de compromisos</b><br>';
	echo 'Cumplidos a tiempo: '.$cc.'<br>
	Cumplidos a destiempo: '.$ccd.'<br>
	No cumplidos: '.$cnc.'<br>';
	echo 'Promedio de compromisos por parque con comité: '.round($tot/$pc);
	exit();
}
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de Compromisos Parques Alegres</title>
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
	if($("#sin_fecha_vis").is(":checked")){
		var fecha_inicial = ""
		var fecha_final = ""
	}
	else{
		var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
		var fecha_final = document.getElementsByName("fecha_final")[0].value;
	}
	var asesor = document.getElementsByName("asesor")[0].value;
	var parque = document.getElementsByName("parque")[0].value;
	$("#resultados").load("http://parquesalegres.org/tablet/repcompromisos.php", {fecha_inicial: fecha_inicial, fecha_final: fecha_final, asesor: asesor, parque: parque, cmd: 1});
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
			$.ajax({url: "repcompromisos.php",
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
echo '<body>
<form method="post" action="repexcel.php">
<input type="hidden" name="cmd" value="repcompromisos">
<h3 style="text-align:center">Reporte de compromisos</h2>
<label><span>Fecha inicial: </span><input type="text" name="fecha_inicial" readonly id="datepicker" value="'.date("Y-m-").'01"></label>
<label><span>Fecha final: </span><input type="text" name="fecha_final" readonly id="datepicker2" value="'.date("Y-m-t").'"></label>
<label><input type="checkbox" name="sin_fecha_vis" id="sin_fecha_vis" value="1"><span> Sin Fecha</span></label>
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
<div style="clear:both;"></div><br>
<center>
<input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp;
<!--<input class="button" type="submit" value="Exportar a Excel">--><br><br>
<div id="resultados" class="CSSTableGenerator"></div></center>
</form>';
echo '</body>
</html>';
?>  