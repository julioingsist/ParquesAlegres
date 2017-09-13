<?php
require_once('../wp-config.php');
require('fpdf17/fpdf.php');
date_default_timezone_set("America/Mazatlan");
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1 order by u.display_name ASC";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['ID']]=$row['display_name'];
}
$sql2="select p.ID, p.post_title from wp_posts p INNER JOIN asesores a ON a.ID=p.post_author where p.post_status='publish' AND p.post_type='parque' AND a.stat<1 order by p.post_title ASC";
$res2=mysql_query($sql2);
while($row2=mysql_fetch_array($res2)) {
	$parques[$row2['ID']]=$row2['post_title'];
}
$tipovisita=array(1=>"Reforzamiento",2=>"Seguimiento",3=>"Evento",4=>"Prospectación",5=>"Formacion de comité");
$mes_actual=date('m');
$anio=date('Y');
if($mes_actual=='01'){
	$anio=$anio-1;
	$mes_actual='12';
	$mes_anterior='11';
	$anio_anterior=$anio;
}
else{
	$mes_actual=$mes_actual-1;
	if($mes_actual=='01'){
		$anio_anterior=$anio-1;
		$mes_anterior='12';
	}
	else{
		$anio_anterior=$anio;
		$mes_anterior=$mes_actual-1;
	}
}
$maxtotal=0;
$ganador='';
if($mes_actual<10){
	$mes_actual="0".$mes_actual;
}
if($_POST['cmd']==1){
	class PDF extends FPDF
    {
    // Page header
        function Header()
        {
            // Logo
            $this->SetFont('Arial','B',8);
            // Title
            
            // Line break
            $this->Ln(10);
        }
    }
    $sql="SELECT * FROM wp_posts WHERE ID='".$_POST['ganador']."' AND post_type='parque' AND post_status='publish'";
    $res=mysql_query($sql);
    $row=mysql_fetch_array($res);
    $pdf = new PDF();
    $pdf->AddPage('L','Letter');
    $pdf->SetFont('Arial','B',18);
    $pdf->SetXY(100,10);
    $pdf->Cell(50,10,'Parque del mes '.$meses[$mes_actual].' del '.$anio,0,1);
    $pdf->Cell(50,10,$row['post_title'],0,1);
    $pdf->SetFont('Arial','',10);
    $sql12="SELECT k1.meta_value as vialidad_prin, k2.meta_value as vialidad1, k3.meta_value as vialidad2, k4.meta_value as vialidad_pos FROM `wp_posts` p
        LEFT JOIN wp_postmeta k1 ON p.ID=k1.post_id AND k1.meta_key='_parque_vialidad_prin' LEFT JOIN wp_postmeta k2 ON p.ID=k2.post_id AND k2.meta_key='_parque_vialidad1'
        LEFT JOIN wp_postmeta k3 ON p.ID=k3.post_id AND k3.meta_key='_parque_vialidad2' LEFT JOIN wp_postmeta k4 ON p.ID=k4.post_id AND k4.meta_key='_parque_vialidad_pos' WHERE p.post_status='publish' AND p.post_type='parque' AND p.ID='".$_POST['ganador']."'";
        $res12=mysql_query($sql12);
        while($row12=mysql_fetch_array($res12)){
            $principal=$row12['vialidad_prin'];
            $vialidad1=$row12['vialidad1'];
            $vialidad2=$row12['vialidad2'];
            $posterior=$row12['vialidad_pos'];
        }
        if($principal!="" || $vialidad1!="" || $vialidad2!="" || $posterior!=""){
             $pdf->SetY(30);
             $pdf->Cell(30,5,'Dirección:',0,0);
             if($principal!=""){
                $pdf->Cell(60,5,$principal,0,1);
             }
             if($vialidad1!="" && $vialidad2!=""){
                $pdf->Cell(60,5,'Entre '.$vialidad1.' y '.$vialidad2,0,1);
             }
             else{
                if($vialidad1!=""){
                    $pdf->Cell(60,5,'Referencia '.$vialidad1,0,1);
                }
                if($vialidad2!=""){
                    $pdf->Cell(60,5,'Referencia '.$vialidad2,0,1);
                }
             }
             if($posterior!=""){
                $pdf->Cell(60,5,'Calle posterior '.$posterior,0,1);
             }
        }
    $filename = "parquedelmes.pdf";
    $pdf->Output();
	exit();
}
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Parque del mes</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<style>
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
</style>';
echo '</head>';
echo '<body>';
echo '<h3 style="text-align:center">Parque del mes '.$meses[$mes_actual].' del '.$anio.'</h2>
<br>';
echo '<div id="resultados" class="CSSTableGenerator"><table><tr><td>ID</td><td>Parque</td><td>Calificación anterior</td><td>Calificación actual</td><td>Diferencia</td><td>Tangibles</td><td>Experiencias exitosas</td></tr>';
foreach ($parques as $k => $v) {
	$total=-1;
	$exp=0;
	$sql2="SELECT opera+formaliza+organiza+reunion+proyecto+disenio+ejecutivo+vespacio+instalaciones+estado+ingresop+ingresadop+mancomunado+eventos+eventosr+averdes+estaver+gente+limpieza+orden+respint as suma from wp_comites_parques WHERE fecha_visita>='".$anio."-".$mes_actual."-01' AND fecha_visita<='".$anio."-".$mes_actual."-31' AND cve_parque='".$k."' order by fecha_visita DESC, cve DESC limit 1";
	$res2=mysql_query($sql2);
	if(mysql_num_rows($res2)>0){
		$row2=mysql_fetch_array($res2);
		$calif=round($row2['suma']/7);
		$sql1="SELECT opera+formaliza+organiza+reunion+proyecto+disenio+ejecutivo+vespacio+instalaciones+estado+ingresop+ingresadop+mancomunado+eventos+eventosr+averdes+estaver+gente+limpieza+orden+respint as suma from wp_comites_parques WHERE fecha_visita<='".$anio_anterior."-".$mes_anterior."-31' AND cve_parque='".$k."' order by fecha_visita DESC, cve DESC limit 1";
		$res1=mysql_query($sql1);
		$row1=mysql_fetch_array($res1);
		$calif_ant=round($row1['suma']/7);
		$diferencia=$calif-$calif_ant;
		$sql3="SELECT * FROM tangibles WHERE cve_parque='".$k."' AND fecha_tangible>='".$anio."-".$mes_actual."-01' AND fecha_tangible<='".$anio."-".$mes_actual."-31'";
		$res3=mysql_query($sql3);
		if(mysql_num_rows($res3)>0){
			while($row3=mysql_fetch_array($res3)){
				if($row3['experiencia_exitosa']=='si'){
					$exp++;
				}
			}
		}
		else{
			$exp=0;
		}
		$tangibles=mysql_num_rows($res3);
		if($calif<=80){
			if($diferencia>0){
				$texto='<tr><td>'.$k.'</td><td>'.$v.'</td><td>'.$calif_ant.'</td><td>'.$calif.'</td><td>'.$diferencia.'</td><td>'.mysql_num_rows($res3).'</td><td>'.$exp.'</td></tr>';
				$total=$tangibles+$exp;
			}
			else{
				$texto='';
				$total=0;
			}
		}
		else{
			$texto='<tr><td>'.$k.'</td><td>'.$v.'</td><td>'.$calif_ant.'</td><td>'.$calif.'</td><td>'.$diferencia.'</td><td>'.mysql_num_rows($res3).'</td><td>'.$exp.'</td></tr>';
			$total=$tangibles+$exp;
		}
		if($total>=$maxtotal){
			if($total>$maxtotal){
				$ganador=$texto;
			}
			else{
				$ganador.=$texto;
			}
			$maxtotal=$total;
		}
	}
}
echo $ganador;
echo '</table></div><br>';
echo '<form method="POST">Parque ganador: <input type="text" name="ganador" id="ganador"><br><br><input class="button" type="submit" value="Generar presentación"><br>
</center><input type="hidden" name="cmd" value=1></form>';
echo '</body>
</html>';
?>