<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reportes Parques Alegres</title>
</head>';
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre",
             "11"=>"Noviembre","12"=>"Diciembre");
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID where stat<1";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['ID']]=$row['display_name'];
}
echo '<body>';
echo 'Cantidad de comites dados de alta en "Datos de comite" por mes';
echo '<table border=1>
<tr>
<th>Asesor</th><th>Septiembre</th><th>Octubre</th><th>Noviembre</th><th>Diciembre</th><th>Enero</th></tr>';
$s1=0;
$s2=0;
$s3=0;
$s4=0;
$s5=0;
foreach($asesores as $k=>$v){
    $sql2="select c.*,p.post_author from comite_parque c INNER JOIN wp_posts p ON c.cve_parque=p.ID WHERE p.post_author='".$k."' AND fecha_reg>='2015-09-01' AND fecha_reg<='2015-09-31' group by c.cve_parque";
    $res2=mysql_query($sql2);
    mysql_num_rows($res2);
    $sql3="select c.*,p.post_author from comite_parque c INNER JOIN wp_posts p ON c.cve_parque=p.ID WHERE p.post_author='".$k."' AND fecha_reg>='2015-10-01' AND fecha_reg<='2015-10-31' group by c.cve_parque";
    $res3=mysql_query($sql3);
    mysql_num_rows($res3);
    $sql4="select c.*,p.post_author from comite_parque c INNER JOIN wp_posts p ON c.cve_parque=p.ID WHERE p.post_author='".$k."' AND fecha_reg>='2015-11-01' AND fecha_reg<='2015-11-31' group by c.cve_parque";
    $res4=mysql_query($sql4);
    mysql_num_rows($res4);
    $sql5="select c.*,p.post_author from comite_parque c INNER JOIN wp_posts p ON c.cve_parque=p.ID WHERE p.post_author='".$k."' AND fecha_reg>='2015-12-01' AND fecha_reg<='2015-12-31' group by c.cve_parque";
    $res5=mysql_query($sql5);
    mysql_num_rows($res5);
    $sql6="select c.*,p.post_author from comite_parque c INNER JOIN wp_posts p ON c.cve_parque=p.ID WHERE p.post_author='".$k."' AND fecha_reg>='2016-01-01' AND fecha_reg<='2016-01-31' group by c.cve_parque";
    $res6=mysql_query($sql6);
    mysql_num_rows($res6);
    $s1=$s1+mysql_num_rows($res2);
    $s2=$s2+mysql_num_rows($res3);
    $s3=$s3+mysql_num_rows($res4);
    $s4=$s4+mysql_num_rows($res5);
    $s5=$s5+mysql_num_rows($res6);
    echo '<tr>
    <td>'.$v.'</td><td>'.mysql_num_rows($res2).'</td><td>'.mysql_num_rows($res3).'</td><td>'.mysql_num_rows($res4).'</td><td>'.mysql_num_rows($res5).'</td><td>'.mysql_num_rows($res6).'</td>
    </tr>';
}
echo '<tr>
<th>Total:</th><th>'.$s1.'</th><th>'.$s2.'</th><th>'.$s3.'</th><th>'.$s4.'</th><th>'.$s5.'</th>
</tr></table><br><br>';
echo 'Cantidad de parques dados de alta por mes en 2015';
echo '<table border=1><tr>';
foreach($meses as $k=>$v){
	echo '<th>'.$v.'</th>';
}
echo '</tr><tr>';
foreach($meses as $k=>$v){
    $sql7="select ID from wp_posts WHERE post_status='publish' AND post_type='parque' AND post_date>='2015-".$k."-01 00:00:00' AND post_date<='2015-".$k."-31 23:59:59'";
    $res7=mysql_query($sql7);
    echo '<td>'.mysql_num_rows($res7).'</td>';
}
echo '</tr>
</table><br><br>';
echo 'Cantidad de experiencias exitosas dados de alta por mes en 2015';
echo '<table border=1><tr>';
foreach($meses as $k=>$v){
	echo '<th>'.$v.'</th>';
}
echo '</tr><tr>';
foreach($meses as $k=>$v){
    $sql7="select ID from wp_posts WHERE post_status='publish' AND post_type='experiencia_exitosa' AND post_date>='2015-".$k."-01 00:00:00' AND post_date<='2015-".$k."-31 23:59:59'";
    $res7=mysql_query($sql7);
    echo '<td>'.mysql_num_rows($res7).'</td>';
}
echo '</tr>
</table>';
echo '</body>
</html>';
?>  