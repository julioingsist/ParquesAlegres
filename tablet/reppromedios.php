<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de promedios Parques Alegres</title>
</head>';
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$param=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",
                  11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['ID']]=$row['display_name'];
}
if($_POST['fecha_inicial']){
	$fechainicio=$_POST['fecha_inicial'];
	$fechafin=$_POST['fecha_final'];
}
else{
	$fechainicio="2015-01-01";
	$fechafin="2016-01-01";
}
echo '<body><form method="post">';
echo 'Fecha inicial: <input type="date" value="'.$fechainicio.'" name="fecha_inicial">';
echo 'Fecha final: <input type="date" value="'.$fechafin.'" name="fecha_final">';
echo '<input type="submit" value="Filtrar"><br>';
echo 'Promedios de calificación semanal<br>';
echo '<table border=1>
<tr>
<th>Fecha</th><th>Calificación</th><th>Parques</th></tr>';
$begin = new DateTime($fechainicio);
$end = new DateTime($fechafin);

$interval = DateInterval::createFromDateString('7 days');
$period = new DatePeriod($begin, $interval, $end);

foreach ( $period as $dt ){
	$fecha1=$dt->format( "Y-m-d" );
	$sql="select * from wp_posts where post_date<='".$fecha1."' AND post_type='parque' AND post_status='publish' AND post_author!='1478'";
	$res=mysql_query($sql);
	$sumcalif=0;
	$totcalif=0;
	while($row=mysql_fetch_array($res)){
		$sql1="select cve_parque, ";
                foreach($param as $v){
			$sql1.=$v."+";
                }
                $sql1 = substr($sql1, 0, -1);
                $sql1.=" as calif from wp_comites_parques where cve_parque='".$row['ID']."' and fecha_visita<='".$fecha1."' order by fecha_visita DESC, cve DESC limit 1";
		$res1=mysql_query($sql1);
		$suma=0;
		$calif=0;
		if(mysql_num_rows($res1)>0){
		    while($row1=mysql_fetch_array($res1)){
			$suma=$suma+($row1['calif']/7);
		    }
		    $calif=round($suma/mysql_num_rows($res1));
		}
                $sumcalif=$sumcalif+$calif;
        }
        $totcalif=round($sumcalif/mysql_num_rows($res));
	echo '<tr><td>'.$fecha1.'</td><td>'.$totcalif.'</td><td>'.mysql_num_rows($res).'</td></tr>';
}
echo '</table>';
if($_GET['rep']==1){
	$totaltotal=0;
	$totaltotal2=0;
	$totparques=0;
	$totcalif2=0;
	$totcalif=0;
	foreach($asesores as $k=>$v){
		$sumcalif=0;
		$sumcalif2=0;
		$sql2="select * from wp_posts where post_date<='2015-01-01' AND post_type='parque' AND post_status='publish' AND post_author='".$k."'";
		$res2=mysql_query($sql2);
		if(mysql_num_rows($res2)>0){
			while($row2=mysql_fetch_array($res2)){
				$sql3="select cve_parque, ";
				foreach($param as $v){
					$sql3.=$v."+";
				}
				$sql3 = substr($sql3, 0, -1);
				$sql3.=" as calif from wp_comites_parques where cve_parque='".$row2['ID']."' and fecha_visita<='2015-01-01' order by fecha_visita DESC, cve DESC limit 1";
				$res3=mysql_query($sql3);
				$suma=0;
				$calif=0;
				if(mysql_num_rows($res3)>0){
				    while($row3=mysql_fetch_array($res3)){
					$suma=$suma+($row3['calif']/7);
				    }
				    $calif=round($suma/mysql_num_rows($res3));
				}
				$sumcalif=$sumcalif+$calif;
				$sql4="select cve_parque, ";
				foreach($param as $v){
					$sql4.=$v."+";
				}
				$sql4 = substr($sql4, 0, -1);
				$sql4.=" as calif from wp_comites_parques where cve_parque='".$row2['ID']."' and fecha_visita<='2015-12-31' order by fecha_visita DESC, cve DESC limit 1";
				$res4=mysql_query($sql4);
				$suma2=0;
				$calif2=0;
				if(mysql_num_rows($res4)>0){
				    while($row4=mysql_fetch_array($res4)){
					$suma2=$suma2+($row4['calif']/7);
				    }
				    $calif2=round($suma2/mysql_num_rows($res4));
				}
				$sumcalif2=$sumcalif2+$calif2;
			}
			$totcalif=$totcalif+$sumcalif;
			$totcalif2=$totcalif2+$sumcalif2;
			$totparques=$totparques+mysql_num_rows($res2);
		}
	}
	$totaltotal=round($totcalif/$totparques);
	$totaltotal2=round($totcalif2/$totparques);
	echo '<table border=1><tr><th>Parques</th><th>Inicio 2015</th><th>Fin 2015</th></tr><tr><td>'.$totparques.'</td><td>'.$totaltotal.'</td><td>'.$totaltotal2.'</td></tr></table>';
}
echo '</form></body>
</html>';
?>  