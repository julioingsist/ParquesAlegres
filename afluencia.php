<?php
//require_once("cnx_db.php");
require_once("wp-config.php");
$db='parquesa_ParquesAlegresWP';
//mysql_query("SET character_set_client=utf8", $MySQL);
//mysql_query("SET character_set_results=utf8", $MySQL);
//--------------------- primera parte
$_sql=mysql_db_query("$db","SELECT * FROM wp_comites_parques order by cve asc");

while($row=mysql_fetch_array($_sql)){
$suma=$row['diario']+$row['gente'];
  //echo $new_url;
  
		$sql1="Update wp_comites_parques set gente=$suma where cve=$row[cve];";
                echo $sql1;
		echo'<br>';
               $_sql1=mysql_db_query("$db","$sql1");
                
//-------------------termina primera parte
//--------------------- segunda parte



//termina tercera parte
	}

echo 'siiiiii';









?>