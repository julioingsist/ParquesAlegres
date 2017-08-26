<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reportes de Compromisos Parques Alegres</title>
</head>';
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
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
$sql="select a.ID,u.display_name,a.cod from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['ID']]=$row['display_name'];
}
echo '<body>';
echo 'Asesor: '.$asesores[$_POST['asesorpa']].'<br>
Compromisos por Parque:';
echo '<table border=1>
<tr>
<th>Parque</th><th>Parámetro</th><th>Compromiso</th><th>Meta</th><th>Fecha del compromiso</th><th>Fecha de Cumplimiento</th></tr>';
$sql="select id, post_title from wp_posts where post_type='parque' and post_status='publish' and post_author='".$_POST['asesorpa']."' and id='".$_POST['parque']."' order by post_title ASC";
$res=mysql_query($sql);
$totcomp=0;
while($row=mysql_fetch_array($res)){
	$sql1="select c.*,v.fecha_visita from compromisos c INNER JOIN wp_comites_parques v ON v.cve=c.cve_visita where c.cve_parque='".$row['id']."'";
	$res1=mysql_query($sql1);
	if(mysql_num_rows($res1)>0){
		$rows=mysql_num_rows($res1)+1;
		echo '<tr><td rowspan='.$rows.'>'.$row['post_title'].'</td>';
		while($row1=mysql_fetch_array($res1)){
			echo '<tr>
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
			<td>'.$row1['meta'].'</td><td>'.$row1['fecha_visita'].'</td><td>'.$row1['fecha_cumplimiento'].'</td></tr>';
		}
		echo '</tr>';
		$totcomp=$totcomp+mysql_num_rows($res1);
	}
	else{
		echo '<tr><td>'.$row['post_title'].'</td><td colspan="4">No tiene compromisos</td></tr>';
	}
}
echo '<tr><th>Total:</th><th colspan="5">'.$totcomp.'</th></tr>
</table><br><br>';
echo '</body>
</html>';
?>  