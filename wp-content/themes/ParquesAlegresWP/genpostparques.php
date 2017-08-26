<?php
//require_once("cnx_db.php");
require_once("wp-config.php");
$db='parquesa_ParquesAlegresWP';
//mysql_query("SET character_set_client=utf8", $MySQL);
//mysql_query("SET character_set_results=utf8", $MySQL);
//--------------------- primera parte
$_sql=mysql_db_query("$db","SELECT * FROM wp_arturo_parque WHERE cve_usuario=4");
$c=15817;
while($row=mysql_fetch_array($_sql)){
$c++;
 $new_url = sanitize_title($row[nom]);
  //echo $new_url;
  
		$sql1="INSERT INTO `wp_posts`(`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_title`, `post_status`, `comment_status`, `ping_status`, `post_name`, `post_modified`, `post_modified_gmt`,  `post_parent`, `guid`, `menu_order`, `post_type`, `comment_count`) VALUES ($c,$row[cve_usuario],'2014-07-09 07:45:30','2014-07-09 14:45:30','$row[nom]','publish','open','open','$new_url','2014-07-29 07:45:30','2014-07-29 14:45:30',0,'http://parquesalegres.org/?post_type=parque&p=$c',0,'parque',0);";
                //echo $sql1;
               // $_sql1=mysql_db_query("$db","$sql1");
                
//-------------------termina primera parte
//--------------------- segunda parte

		
 $bar1 = $row[cont];
 $bar2=htmlentities($bar1, ENT_QUOTES,'UTF-8');
 
$bar3 = $row[maps];
 $bar4=htmlentities($bar3, ENT_QUOTES,'UTF-8');
 
 $bar5 = $row[col];
 $bar6=htmlentities($bar5, ENT_QUOTES,'UTF-8');
 
 $bar7 = $row[ciudad];
 $bar8=htmlentities($bar7, ENT_QUOTES,'UTF-8');
 
 $bar9 = $row[tipo];
 $bar10=htmlentities($bar9, ENT_QUOTES,'UTF-8');
 
 $bar11 = $row[ubic];
 $bar12=htmlentities($bar11, ENT_QUOTES,'UTF-8');
 
 $bar13='<ul><li><a href="http://parquesalegres.org/?post_type=succes_case&amp;p='.$row[cve_exp].'" target="_blank">Experiencia Exitosa</a></li></ul>';
  $bar14=htmlentities($bar13, ENT_QUOTES,'UTF-8');
 
 //$sql1="UPDATE `wp_postmeta` SET  `meta_value`='$bar12' WHERE `post_id`=$c and `meta_key`='_parque_ubic'";
		$sql12="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES ($c,'_parque_ubic','$bar12');";
		$sql2="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES ($c,'_parque_col','$bar6');";
		$sql3="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES($c,'_parque_sup','$row[sup]');";
		$sql4="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES($c,'_parque_sec','$row[sec]');";
		$sql5="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES($c,'_parque_tipo','$bar10');";
		$sql6="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES($c,'_parque_cont','$bar2');";
		$sql7="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES($c,'_parque_ciudad','$bar8');";
		$sql8="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES($c,'_parque_estado','$row[estado]');";
		$sql9="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES($c,'_parque_expexitosa','$bar14');";
		$sql10="INSERT INTO `wp_postmeta`( `post_id`, `meta_key`, `meta_value`) VALUES($c,'_parque_maps','$bar4');";
		$_sql12=mysql_db_query("$db","$sql12");
		$_sql2=mysql_db_query("$db","$sql2");
		$_sql3=mysql_db_query("$db","$sql3");
		$_sql4=mysql_db_query("$db","$sql4");
		$_sql5=mysql_db_query("$db","$sql5");
		$_sql6=mysql_db_query("$db","$sql6");
		$_sql7=mysql_db_query("$db","$sql7");
		$_sql8=mysql_db_query("$db","$sql8");
		$_sql10=mysql_db_query("$db","$sql10");
		if($row[cve_exp]>0){
                    $_sql9=mysql_db_query("$db","$sql9");
                }
		
/*
		echo $sql12;
                echo '<br>';
		echo $sql2;
                echo '<br>';
		echo $sql3;
                echo '<br>';
		echo $sql4;
                echo '<br>';
		echo $sql5;
                echo '<br>';
		echo $sql6;
                echo '<br>';
		echo $sql7;
                echo '<br>';
		echo $sql8;
                echo '<br>';
                echo $sql10;
                echo '<br>';
                if($row[cve_exp]>0){
		echo $sql9;
                echo '<br>';
                }
                */
		echo '<br><br><br>';
//------------------------------termina segunda parte
//------------------------------tercera parte

		$_sql2=mysql_db_query("$db","SELECT * FROM wp_comites_parques where cve_parque=$row[cve]");

while($row2=mysql_fetch_array($_sql2)){
$sql23="UPDATE `wp_comites_parques` SET `cve_parque`='$c'  WHERE `cve_parque`=$row[cve];";
$_sql2=mysql_db_query("$db","$sql23");
echo $sql23;
echo '<br>';

$_sql3=mysql_db_query("$db","SELECT * FROM wp_visitascom_parques where cve_parque=$row[cve] and cve_visita=$row2[cve]");

while($row3=mysql_fetch_array($_sql3)){
$sql33="UPDATE `wp_visitascom_parques` SET `cve_parque`='$c'  WHERE `cve_visita`=$row2[cve];";
$_sql3=mysql_db_query("$db","$sql33");
echo $sql33;
echo '<br>';
}

}

//termina tercera parte
	}

echo 'siiiiii';









?>