<?php
require_once('../wp-config.php');
require('fpdf17/fpdf.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$param=array(1=>"opera",2=>"formaliza",3=>"organiza",4=>"reunion",5=>"proyecto",6=>"disenio",7=>"ejecutivo",8=>"vespacio",9=>"estado",10=>"instalaciones",
                  11=>"ingresop",12=>"ingresadop",13=>"mancomunado",14=>"eventosr",15=>"eventos",16=>"averdes",17=>"estaver",18=>"gente",19=>"respint",20=>"orden",21=>"limpieza");
$visita=array("reforzamiento"=>1,"seguimiento"=>2,"evento"=>3,"prospectacion"=>4,"formacion"=>5);
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['display_name']]=$row['ID'];
}
if($_POST['fecha_inicial']){
    $fechainicio=$_POST['fecha_inicial'];
    $fechafin=$_POST['fecha_final'];
}
else{
    //Se checa si no es el ultimo mes del año
    if(date('m')<12){
        $mes=date('m')+1;
        $anio=date('Y');
    }
    else{
        //Si lo es entonces aumentamos un año y definimos al primer mes
        $mes='01';
        $anio=date('Y')+1;
    }
    //checamos cual es el ultimo dia del mes en el que estamos
    $fecha = date('Y-m-d', strtotime(date(''.$anio.'-'.$mes.'-01'). ' - 1 days'));
    $dia = substr($fecha, -2);
    //Si el dia es diferente al dia actual entonces retrocedemos un mes
    if($dia!=date('d')){
        if($mes<=2){
            if($mes<=1){
                $mes=11;
            }
            else{
                $mes=12;
            }
        }
        else{
            $mes=$mes-2;
        }
        if($mes==12){
            $mes1=01;
        }
        else{
            $mes1=$mes+1;
        }
        if($mes<10){
            $mes='0'.$mes;
        }
        $fechainicio=date('Y-'.$mes.'-01');
        $fechafin=date('Y-m-d', strtotime(date('Y-'.$mes1.'-01'). ' - 1 days'));
    }
    else{
        //sino dejamos el mismo mes
        $fechainicio=date('Y-m-01');
        $fechafin=date('Y-m-d', strtotime(date('Y-'.$mes.'-01'). ' - 1 days'));
    }
}
$mesact=substr($fechainicio, -5,2);
$anioact=substr($fechainicio, 0,4);
if($mesact>1){
    $mesant=$mesact-1;
    if($mesant<10){
        $mesant='0'.$mesant;
    }
    $mesantini=date($anioact.'-'.$mesant.'-01');
    $mesantfin=date($anioact.'-'.$mesant.'-31');   
}
else{
    $anioant=$anioact-1;
    $mesantini=date(''.$anioant.'-12-01');
    $mesantfin=date(''.$anioant.'-12-31'); 
}
if($_POST['cmd']==2){
    echo '<table id="simpleTable">';
    echo '<thead><tr>
        <td colspan="3">Asesor</td><td>Calificación del mes anterior</td><td>Calificación del mes actual</td>
        <td>Diferencia</td><td>Visitas del mes actual</td><td>Visitas del mes anterior</td><td>Visitas de Seguimiento</td>
        <td>Visitas de Prospectación</td><td>Visitas de Reforzamiento con parametros</td><td>Visitas de Reforzamiento</td><td>Visitas de Stand-by</td><td>Visitas de Reforzamiento Acumuladas</td><td>Nuevos comites</td><td>Promedio del Parque</td><td>Visitas Acumuladas del Parque</td>
    </tr></thead><tbody>';
    foreach($asesores as $k=>$v){
        $sumcalifant=0;
        $sumcomites=0;
        $sumcalif=0;
        $sumvis=0;
        $sumvisa=0;
        $sumviss=0;
        $sumvisp=0;
        $sumvisr=0;
        $sumvisst=0;
        $sumvisr1=0;
        $sumvisra=0;
        $sumcaliftot=0;
        $sumvistot=0;
        $parquesa=0;
        $parquesn=0;
        $fila="";
        echo '<tr class="header"><th colspan="3">'.$k.'</th>';
        $sql1="select id,post_title,guid from wp_posts where post_status='publish' and post_type='parque' and post_author='".$v."'";
        $res1=mysql_query($sql1);
        while($row1=mysql_fetch_array($res1)){
            $parque[$row1['id']]=$row1['post_title'];
            $sql4="select cve_parque, ";
            foreach($param as $v){
                $sql4.=$v."+";
            }
            $sql4 = substr($sql4, 0, -1);
            $sql4.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='".$fechafin."'";
            $res4=mysql_query($sql4);
            $sumatot=0;
            $califtot=0;
            if(mysql_num_rows($res4)>0){
                while($row4=mysql_fetch_array($res4)){
                    $sumatot=$sumatot+($row4['calif']/7);
                }
                $califtot=round($sumatot/mysql_num_rows($res4));
            }
            $sql3="select cve_parque, ";
            foreach($param as $v){
                $sql3.=$v."+";
            }
            $sql3 = substr($sql3, 0, -1);
            $sql3.=" as calif,opera from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$mesantini."' and fecha_visita<='".$mesantfin."' order by fecha_visita ASC, cve ASC";
            $res3=mysql_query($sql3);
            $sumaant=0;
            $califant=0;
            $opera=-1;
            $ncomites=0;
            if(mysql_num_rows($res3)>0){
                while($row3=mysql_fetch_array($res3)){
                    $opera=$row3['opera'];
                    $califant=round($row3['calif']/7);
                }
                $parquesa++;
            }
            $sql2="select v.cve_parque, ";
            foreach($param as $v){
                $sql2.='v.'.$v."+";
            }
            $sql2 = substr($sql2, 0, -1);
            $sql2.=" as calif,v.opera,c.tipo_visita from wp_comites_parques v LEFT JOIN wp_visitascom_parques c ON v.cve=c.cve_visita where v.cve_parque='".$row1['id']."' and v.fecha_visita>='".$fechainicio."' and v.fecha_visita<='".$fechafin."' order by v.fecha_visita ASC, v.cve ASC";
            $res2=mysql_query($sql2);
            $suma=0;
            $calif=0;
            $visits=0;
            $visitp=0;
            $visitr=0;
            $nopera=-1;
            if(mysql_num_rows($res2)>0){
                while($row2=mysql_fetch_array($res2)){
                    if($row2['tipo_visita']==2){
                        $visits++;
                    }
                    elseif($row2['tipo_visita']==4){
                        $visitp++;
                    }
                    else{
                        $visitr++;
                    }
                    $nopera=$row2['opera'];
                    $calif=round($row2['calif']/7);
                }
                $parquesn++;
            }
            if($opera==0 && $nopera>=7){
                $ncomites=1;
            }
            $sql8=" SELECT ID from wp_visitas_reforzamiento where cve_parque='".$row1['id']."' and fecha_visita<='".$fechafin."' and fecha_visita>='".$fechainicio."' AND cve_parametros=0";
            $res8=mysql_query($sql8);
            if(mysql_num_rows($res8)>0){
                while($row8=mysql_fetch_array($res8)){
                    
                }
            }
            $sql9=" SELECT ID from wp_visitas_reforzamiento where cve_parque='".$row1['id']."' and fecha_visita<='".$fechafin."' AND cve_parametros=0";
            $res9=mysql_query($sql9);
            if(mysql_num_rows($res9)>0){
                while($row9=mysql_fetch_array($res9)){
                    
                }
            }
            $sql11=" SELECT ID from wp_visitas_standby where cve_parque='".$row1['id']."' and fecha_visita<='".$fechafin."' and fecha_visita>='".$fechainicio."'";
            $res11=mysql_query($sql11);
            if(mysql_num_rows($res11)>0){
                while($row11=mysql_fetch_array($res11)){
                    
                }
            }
            $dif=$calif-$califant;
            $fila.='<tr style="display:none;"><td>'.$meses[substr($fechainicio, -5,2)].'</td><td>'.$row1['id'].'</td>
            <td><a href="'.$row1['guid'].'" target="_blank">'.$row1['post_title'].'</a></td><td>'.$califant.'</td><td>'.$calif.'</td>
            <td>'.$dif.'</td><td>'.mysql_num_rows($res2).'</td><td>'.mysql_num_rows($res3).'</td><td>'.$visits.'</td>
            <td>'.$visitp.'</td><td>'.$visitr.'</td><td>'.mysql_num_rows($res8).'</td><td>'.mysql_num_rows($res11).'</td><td>'.mysql_num_rows($res9).'</td><td>'.$ncomites.'</td><td>'.$califtot.'</td>
            <td>'.mysql_num_rows($res4).'</td></tr>';
            $sumcomites=$sumcomites+$ncomites;
            $sumcalifant=$sumcalifant+$califant;
            $sumcalif=$sumcalif+$calif;
            $sumvis=$sumvis+mysql_num_rows($res2);
            $sumvisa=$sumvisa+mysql_num_rows($res3);
            $sumviss=$sumviss+$visits;
            $sumvisr1=$sumvisr1+$visitr;
            $sumvisp=$sumvisp+$visitp;
            $sumvisr=$sumvisr+mysql_num_rows($res8);
            $sumvisst=$sumvisst+mysql_num_rows($res11);
            $sumvisra=$sumvisra+mysql_num_rows($res9);
            $sumcaliftot=$sumcaliftot+($califtot*mysql_num_rows($res4));
            $sumvistot=$sumvistot+mysql_num_rows($res4);
        }
        if($parquesa!=0 && $parquesn!=0){
            $diftotal=round($sumcalif/$parquesn)-round($sumcalifant/$parquesa);
            $ascalifant=round($sumcalifant/$parquesa);
            $ascalif=round($sumcalif/$parquesn);
        }
        else{
            if($parquesa!=0){
                $diftotal=0-round($sumcalifant/$parquesa);
                $ascalifant=round($sumcalifant/$parquesa);
                $ascalif=0;
            }
            else if($parquesn!=0){
                $diftotal=round($sumcalif/$parquesn);
                $ascalif=round($sumcalif/$parquesn);
                $ascalifant=0;
            }
            else{
                $diftotal=0;
                $ascalifant=0;
                $ascalif=0;
            }
        }
        echo '<th>'.$ascalifant.'</th><th>'.$ascalif.'</th><th>'.$diftotal.'</th>
        <th>'.$sumvis.'</th><th>'.$sumvisa.'</th><th>'.$sumviss.'</th><th>'.$sumvisp.'</th><th>'.$sumvisr1.'</th><th>'.$sumvisr.'</th><th>'.$sumvisst.'</th>
        <th>'.$sumvisra.'</th><th>'.$sumcomites.'</th><th>'; if($sumcaliftot>0){ echo round($sumcaliftot/$sumvistot); }else {echo '0';} echo '</th><th>'.$sumvistot.'</th></tr>';
        echo $fila;
        $totcomites=$totcomites+$sumcomites;
        $totparques=$totparques+mysql_num_rows($res1);
        $totcalifant=$totcalifant+$ascalifant;
        $totcalif=$totcalif+$ascalif;
        $totvis=$totvis+$sumvis;
        $totvisa=$totvisa+$sumvisa;
        $totvisr1=$totvisr1+$sumvisr1;
        $totvisst=$totvisst+$sumvisst;
        $totvisr=$totvisr+$sumvisr;
        $totvisra=$totvisra+$sumvisra;
        $totviss=$totviss+$sumviss;
        $totvisp=$totvisp+$sumvisp;
        $totvistot=$totvistot+$sumvistot;
        $totcaltot=$totcaltot+$sumcaliftot;
    }
    $totdiftotal=round($totcalif/count($asesores))-round($totcalifant/count($asesores));
    echo '<tr><th colspan="17">&nbsp;</th></tr>';
    //echo '<tr><th colspan="3" width="21%">Parque</th><th>Calificación Promedio anterior</th><th>Calificación Promedio actual</th><th>Diferencia</th><th>Visitas del mes actual</th><th>Visitas del mes anterior</th><th>Visitas de Seguimiento</th><th>Visitas de Prospectación</th><th>Visitas de Reforzamiento</th><th>Visitas de Reforzamiento Acumuladas</th><th>Promedio del Parque</th><th>Visitas Acumuladas del Parque</th><tr>';
    echo '<tr><th colspan="3">Total de Parques alegres:</th><th>'.round($totcalifant/count($asesores)).'</th>
    <th>'.round($totcalif/count($asesores)).'</th><th>'.$totdiftotal.'</th><th>'.$totvis.'</th><th>'.$totvisa.'</th>
    <th>'.$totviss.'</th><th>'.$totvisp.'</th><th>'.$totvisr1.'</th><th>'.$totvisr.'</th><th>'.$totvisra.'</th><th>'.$totcomites.'</th>
    <th>'.round($totcaltot/$totvistot).'</th><th>'.$totvistot.'</th></tr>
    </tbody></table>';
    exit();
}
if($_POST['cmd']==1){
    $fecha=split('-',$fechainicio);
    $fecha2=split('-',$fechafin);
    $start=0;
    if($fecha[0]<$fecha2[0]){
        for($a=$fecha[0];$a<=$fecha2[0];$a++){
            for($m=$fecha[1];$m<=$fecha2[1];$m++){
                $totvis=0;
                $totcalif=0;
                foreach($asesores as $k=>$v){
                    $sumcalif=0;
                    $sumvis=0;
                    $sql1="select id,post_title from wp_posts where post_status='publish' and post_type='parque' and post_author='".$v."'";
                    $res1=mysql_query($sql1);
                    while($row1=mysql_fetch_array($res1)){
                        $sql2="select cve_parque, ";
                        foreach($param as $v){
                            $sql2.=$v."+";
                        }
                        $sql2 = substr($sql2, 0, -1);
                        $sql2.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$a."-".$m."-01' and fecha_visita<='".$a."-".$m."-31'";
                        $res2=mysql_query($sql2);
                        $suma=0;
                        $calif=0;
                        if(mysql_num_rows($res2)>0){
                            while($row2=mysql_fetch_array($res2)){
                                $suma=$suma+($row2['calif']/7);
                            }
                            $calif=round($suma/mysql_num_rows($res2));
                        }
                        $sumvis=$sumvis+mysql_num_rows($res2);
                        $sumcalif=$sumcalif+$calif;
                    }
                    $totvis=$totvis+$sumvis;
                    $totcalif=$totcalif+round($sumcalif/mysql_num_rows($res1));
                }
                if($_POST['v']==1){
                    if(strlen($m)<2){
                        $m='0'.$m;
                    }
                    echo $meses[$m].','.$totvis.'|';
                }
                else{
                    if(strlen($m)<2){
                        $m='0'.$m;
                    }
                    echo $meses[$m].','.round($totcalif/count($asesores)).'|';
                }
            }
        }
    }
    else{
        $a=$fecha[0];
        for($m=$fecha[1];$m<=$fecha2[1];$m++){
            $totcalif=0;
            $totvis=0;
            foreach($asesores as $k=>$v){
                $sumcalif=0;
                $sumvis=0;
                $sql1="select id,post_title from wp_posts where post_status='publish' and post_type='parque' and post_author='".$v."'";
                $res1=mysql_query($sql1);
                while($row1=mysql_fetch_array($res1)){
                    $sql2="select cve_parque, ";
                    foreach($param as $v){
                        $sql2.=$v."+";
                    }
                    $sql2 = substr($sql2, 0, -1);
                    $sql2.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$a."-".$m."-01' and fecha_visita<='".$a."-".$m."-31'";
                    $res2=mysql_query($sql2);
                    $suma=0;
                    $calif=0;
                    if(mysql_num_rows($res2)>0){
                        while($row2=mysql_fetch_array($res2)){
                            $suma=$suma+($row2['calif']/7);
                        }
                        $calif=round($suma/mysql_num_rows($res2));
                    }
                    $sumvis=$sumvis+mysql_num_rows($res2);
                    $sumcalif=$sumcalif+$calif;
                }
                $totvis=$totvis+$sumvis;
                $totcalif=$totcalif+round($sumcalif/mysql_num_rows($res1));
            }
            if($_POST['v']==1){
                if(strlen($m)<2){
                    $m='0'.$m;
                }
                echo $meses[$m].','.$totvis.'|';
            }
            else{
                if(strlen($m)<2){
                    $m='0'.$m;
                }
                echo $meses[$m].','.round($totcalif/count($asesores)).'|';
            }
        }
    }
    exit();
}
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Mensual Parques Alegres</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
</style>
<script>
    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        $( "#datepicker2" ).datepicker({ dateFormat: "yy-mm-dd",dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]});
        buscar();
	$("body").on("click",".header",function(){
		$(this).nextUntil("tr.header").slideToggle();
        });
    });
    function buscar(){
	$("#resultados").text("Cargando...");
	var fecha_inicial = document.getElementsByName("fecha_inicial")[0].value;
        var fecha_final = document.getElementsByName("fecha_final")[0].value;
	$("#resultados").load("http://localhost/web-site/tablet/repmensual.php", {fecha_inicial: fecha_inicial, fecha_final: fecha_final, cmd: 2});
    }
    ';/*function change(s){
        if(s==1){
            $("#tabla").show();
            $("#gvisitas").hide();
            $("#gcalif").hide();
        }
        if(s==2){
            $("#tabla").hide();
            $("#gvisitas").show();
            $("#gcalif").hide();
            
        }
        if(s==3){
            $("#tabla").hide();
            $("#gvisitas").hide();
            $("#gcalif").show();
        }
    }
    function visitas(){
        var fechaini=document.getElementsByName("fecha_inicial")[0].value;
        var fechafin=document.getElementsByName("fecha_final")[0].value;
	$.ajax({url: "repmensual.php",
        data: { fecha_inicial: fechaini, fecha_final: fechafin, cmd: 1, v: 1},
        dataType: "text",
        type: "post",
        success: function(responseText){
            var res = responseText.substring(0, responseText.length-1);
            var opti = res.split("|");
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Fecha");
            data.addColumn("number", "Visitas");
            $.each(opti, function(key,value) {
                var valor=value.split(",");
                data.addRow([valor[0],Number(valor[1])]);
            });
            drawChart(data,"v");
        }});
    }
    function calis(){
        var fechaini=document.getElementsByName("fecha_inicial")[0].value;
        var fechafin=document.getElementsByName("fecha_final")[0].value;
	$.ajax({url: "repmensual.php",
        data: { fecha_inicial: fechaini, fecha_final: fechafin, cmd: 1},
        dataType: "text",
        type: "post",
        success: function(responseText){
            var res = responseText.substring(0, responseText.length-1);
            var opti = res.split("|");
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Fecha");
            data.addColumn("number", "Calificacion promedio");
            $.each(opti, function(key,value) {
                var valor=value.split(",");
                data.addRow([valor[0],Number(valor[1])]);
            });
            drawChart(data,"c");
        }});
    }
    function initialize(){
        visitas();
        calis();
    }
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(initialize);
    function drawChart(data,iden) {
        if(iden=="v"){
            var options = {
                "title": "Visitas de Parques",
                "hAxis": {title: "Fecha",  titleTextStyle: {color: "#333"}},
                "vAxis": {minValue: 0},
                "width":1000,
                "height":300
            };
            var chart1 = new google.visualization.AreaChart(document.getElementById("gvisitas"));
            chart1.draw(data, options);
        }
        else{
            var options = {
                title: "Calificación de Parques",
                hAxis: {title: "Fecha",  titleTextStyle: {color: "#333"}},
                vAxis: {minValue: 0},
                "width":1000,
                "height":300
            };
            var chart = new google.visualization.AreaChart(document.getElementById("gcalif"));
            chart.draw(data, options);
        }
    }*/
    echo '
</script>
</head>';
echo '<body>
<form method="post" action="repexcel.php">
<input type="hidden" name="cmd" value="repmensual">
<h3 style="text-align:center">Reporte Mensual de visitas</h2>
<label><span>Fecha de inicio:</span><input type="text" readonly id="datepicker" value="'.$fechainicio.'" name="fecha_inicial"/></label>
<label><span>Fecha Final:</span><input type="text" readonly id="datepicker2" value="'.$fechafin.'" name="fecha_final"/></label>
<center><input class="button" type="button" onclick="buscar();" value="Filtrar">&nbsp;&nbsp;&nbsp;&nbsp; <input class="button" type="submit" value="Exportar a Excel"><br><br>
Nota: Se puede dar click en el nombre del asesor para ver el detallado por parque<br><br>';
echo '<center><div id="resultados" class="CSSTableGenerator"></div></center>';
/*$sql1="select id,post_title from wp_posts where post_status='publish' and post_type='parque'";
$res1=mysql_query($sql1);
while($row1=mysql_fetch_array($res1)){
    $parque[$row1['id']]=$row1['post_title'];
    $sql2="select cve_parque, ";
    foreach($param as $v){
        $sql2.=$v."+";
    }
    $sql2 = substr($sql2, 0, -1);
    $sql2.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$anio."-".$mes."-01' and fecha_visita<='".$fecha."31'";
    $res2=mysql_query($sql2);
    $suma=0;
    $calif=0;
    if(mysql_num_rows($res2)>0){
        while($row2=mysql_fetch_array($res2)){
            $suma=$suma+($row2['calif']/7);
        }
        $calif=$suma/mysql_num_rows($res2);
    }
    $sql4="select * from parques_mensual where cve_parque=".$row1['id']." and mes=".$mes." and anio=".$anio."";
    $res4=mysql_query($sql4);
    if(mysql_num_rows($res4)>0){
        $sql5="UPDATE parques_mensual SET calificacion=".$calif." WHERE cve_parque=".$row1['id']." and mes=".$mes." and anio=".$anio."";
        $res5=mysql_query($sql5);
    }
    else{
        $sql3="INSERT into parques_mensual (cve_parque, calificacion, mes, anio) VALUES (".$row1['id'].",".$calif.",".$mes.",".$anio.")";
        $res3=mysql_query($sql3);
    }
}
echo '<a href="javascript:void(0);" onclick="change(1);">Tabla </a>&nbsp; | &nbsp;<a href="javascript:void(0);" id="linkgvisitas" onclick="change(2);">Gráfica Visitas </a>&nbsp; | &nbsp;<a href="javascript:void(0);" onclick="change(3);">Gráfica Calificación</a>';
echo '<div id="tabla"><form method="post"> Fecha de inicio: <input type="text" readonly id="datepicker" value="'.$fechainicio.'" name="fecha_inicial"/>&nbsp;Fecha Final: <input type="text" readonly id="datepicker2" value="'.$fechafin.'" name="fecha_final"/>&nbsp;<input type="submit" onclick="this.form.action = \'repmensual.php\'" value="Filtrar"><br>';
echo '<table border=1>';
foreach($asesores as $k=>$v){
    $sumcalifant=0;
    $sumcalif=0;
    $sumvis=0;
    $sumvisa=0;
    $sumviss=0;
    $sumvisp=0;
    $sumvisr=0;
    $sumvisr1=0;
    $sumvisra=0;
    $sumcaliftot=0;
    $sumvistot=0;
    $parquesa=0;
    $parquesn=0;
    echo '<tr><th colspan="14">'.$k.'</th></tr>
    <tr>
    <th>Mes</th><th>ID</th><th>Parque</th><th>Calificación Promedio anterior</th><th>Calificación Promedio actual</th><th>Diferencia</th><th>Visitas del mes actual</th><th>Visitas del mes anterior</th><th>Visitas de Seguimiento</th><th>Visitas de Prospectación</th><th>Visitas de Reforzamiento</th><th>Visitas de Reforzamiento Acumuladas</th><th>Promedio del Parque</th><th>Visitas Acumuladas del Parque</th><tr>';
    $sql1="select id,post_title,guid from wp_posts where post_status='publish' and post_type='parque' and post_author='".$v."'";
    $res1=mysql_query($sql1);
    while($row1=mysql_fetch_array($res1)){
        $parque[$row1['id']]=$row1['post_title'];
        $sql4="select cve_parque, ";
        foreach($param as $v){
            $sql4.=$v."+";
        }
        $sql4 = substr($sql4, 0, -1);
        $sql4.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita<='".$fechafin."'";
        $res4=mysql_query($sql4);
        $sumatot=0;
        $califtot=0;
        if(mysql_num_rows($res4)>0){
            while($row4=mysql_fetch_array($res4)){
                $sumatot=$sumatot+($row4['calif']/7);
            }
            $califtot=round($sumatot/mysql_num_rows($res4));
        }
        $sql3="select cve_parque, ";
        foreach($param as $v){
            $sql3.=$v."+";
        }
        $sql3 = substr($sql3, 0, -1);
        $sql3.=" as calif from wp_comites_parques where cve_parque='".$row1['id']."' and fecha_visita>='".$mesantini."' and fecha_visita<='".$mesantfin."'";
        $res3=mysql_query($sql3);
        $sumaant=0;
        $califant=0;
        if(mysql_num_rows($res3)>0){
            while($row3=mysql_fetch_array($res3)){
                $sumaant=$sumaant+($row3['calif']/7);
            }
            $califant=round($sumaant/mysql_num_rows($res3));
            $parquesa++;
        }
        $sql2="select v.cve_parque, ";
        foreach($param as $v){
            $sql2.='v.'.$v."+";
        }
        $sql2 = substr($sql2, 0, -1);
        $sql2.=" as calif,c.tipo_visita from wp_comites_parques v LEFT JOIN wp_visitascom_parques c ON v.cve=c.cve_visita where v.cve_parque='".$row1['id']."' and v.fecha_visita>='".$fechainicio."' and v.fecha_visita<='".$fechafin."'";
        $res2=mysql_query($sql2);
        $suma=0;
        $calif=0;
        $visits=0;
        $visitp=0;
        $visitr=0;
        if(mysql_num_rows($res2)>0){
            while($row2=mysql_fetch_array($res2)){
                if($row2['tipo_visita']==2){
                    $visits++;
                }
                elseif($row2['tipo_visita']==4){
                    $visitp++;
                }
                else{
                    $visitr++;
                }
                $suma=$suma+($row2['calif']/7);
            }
            $calif=round($suma/mysql_num_rows($res2));
            $parquesn++;
        }
        $sql8=" SELECT ID from wp_visitas_reforzamiento where cve_parque='".$row1['id']."' and fecha_visita<='".$fechafin."' and fecha_visita>='".$fechainicio."'";
        $res8=mysql_query($sql8);
        if(mysql_num_rows($res8)>0){
            while($row8=mysql_fetch_array($res8)){
                
            }
        }
        $sql9=" SELECT ID from wp_visitas_reforzamiento where cve_parque='".$row1['id']."' and fecha_visita<='".$fechafin."'";
        $res9=mysql_query($sql9);
        if(mysql_num_rows($res9)>0){
            while($row9=mysql_fetch_array($res9)){
                
            }
        }
        $dif=$calif-$califant;
        echo '<tr><td>'.$meses[substr($fechainicio, -5,2)].'</td><td>'.$row1['id'].'</td><td><a href="'.$row1['guid'].'" target="_blank">'.$row1['post_title'].'</a></td><td>'.$califant.'</td><td>'.$calif.'</td><td>'.$dif.'</td><td>'.mysql_num_rows($res2).'</td><td>'.mysql_num_rows($res3).'</td><td>'.$visits.'</td><td>'.$visitp.'</td><td>'.mysql_num_rows($res8).'</td><td>'.mysql_num_rows($res9).'</td><td>'.$califtot.'</td><td>'.mysql_num_rows($res4).'</td></tr>';
        $sumcalifant=$sumcalifant+$califant;
        $sumcalif=$sumcalif+$calif;
        $sumvis=$sumvis+mysql_num_rows($res2);
        $sumvisa=$sumvisa+mysql_num_rows($res3);
        $sumviss=$sumviss+$visits;
        $sumvisr1=$sumvisr1+$visitr;
        $sumvisp=$sumvisp+$visitp;
        $sumvisr=$sumvisr+mysql_num_rows($res8);
        $sumvisra=$sumvisra+mysql_num_rows($res9);
        $sumcaliftot=$sumcaliftot+($califtot*mysql_num_rows($res4));
        $sumvistot=$sumvistot+mysql_num_rows($res4);
    }
    if($parquesa!=0 && $parquesn!=0){
        $diftotal=round($sumcalif/$parquesn)-round($sumcalifant/$parquesa);
        $ascalifant=round($sumcalifant/$parquesa);
        $ascalif=round($sumcalif/$parquesn);
    }
    else{
        if($parquesa!=0){
            $diftotal=0-round($sumcalifant/$parquesa);
            $ascalifant=round($sumcalifant/$parquesa);
            $ascalif=0;
        }
        else if($parquesn!=0){
            $diftotal=round($sumcalif/$parquesn);
            $ascalif=round($sumcalif/$parquesn);
            $ascalifant=0;
        }
        else{
            $diftotal=0;
            $ascalifant=0;
            $ascalif=0;
        }
    }
    echo '<tr><td colspan="2">Total:</td><td>'.mysql_num_rows($res1).'</td><td>'.$ascalifant.'</td><td>'.$ascalif.'</td><td>'.$diftotal.'</td><td>'.$sumvis.'</td><td>'.$sumvisa.'</td><td>'.$sumviss.'</td><td>'.$sumvisp.'</td><td>'.$sumvisr.'</td><td>'.$sumvisra.'</td><td>'; if($sumcaliftot>0){ echo round($sumcaliftot/$sumvistot); }else {echo '0';} echo '</td><td>'.$sumvistot.'</td></tr>';
    $totparques=$totparques+mysql_num_rows($res1);
    $totcalifant=$totcalifant+$ascalifant;
    $totcalif=$totcalif+$ascalif;
    $totvis=$totvis+$sumvis;
    $totvisa=$totvisa+$sumvisa;
    $totvisr1=$totvisr1+$sumvisr1;
    $totvisr=$totvisr+$sumvisr;
    $totvisra=$totvisra+$sumvisra;
    $totviss=$totviss+$sumviss;
    $totvisp=$totvisp+$sumvisp;
    $totvistot=$totvistot+$sumvistot;
    $totcaltot=$totcaltot+$sumcaliftot;
}
$totdiftotal=round($totcalif/count($asesores))-round($totcalifant/count($asesores));
echo '<tr><th colspan="14">&nbsp;</th></tr>';
echo '<tr><th colspan="3">Parque</th><th>Calificación Promedio anterior</th><th>Calificación Promedio actual</th><th>Diferencia</th><th>Visitas del mes actual</th><th>Visitas del mes anterior</th><th>Visitas de Seguimiento</th><th>Visitas de Prospectación</th><th>Visitas de Reforzamiento</th><th>Visitas de Reforzamiento Acumuladas</th><th>Promedio del Parque</th><th>Visitas Acumuladas del Parque</th><tr>';
echo '<tr><th colspan="2">Total de Parques alegres:</th><th>'.$totparques.'</th><th>'.round($totcalifant/count($asesores)).'</th><th>'.round($totcalif/count($asesores)).'</th><th>'.$totdiftotal.'</th><th>'.$totvis.'</th><th>'.$totvisa.'</th><th>'.$totviss.'</th><th>'.$totvisp.'</th><th>'.$totvisr.'</th><th>'.$totvisra.'</th><th>'.round($totcaltot/$totvistot).'</th><th>'.$totvistot.'</th></tr>';
echo '</table></form></div>
<div id="gvisitas" style="display:none;width:1000;height:300;"></div><div id="gcalif" style="display:none;width:1000;height:300;"></div>';
 */echo '</body>
</html>';
?>