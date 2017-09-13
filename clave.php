<?php
require_once('wp-config.php');
ini_set("auto_detect_line_endings", true);
echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>';
$sql1="SELECT asesores.ID,display_name from wp_users INNER JOIN asesores ON asesores.ID=wp_users.ID";
$res1=mysql_query($sql1);
while($row1=mysql_fetch_array($res1)){
    $asesor[$row1['display_name']]=$row1['ID'];
}
update_post_meta(16101, '_parque_clave_catastral', '000-044-055-018-001');
update_post_meta(14610, '_parque_clave_catastral', '000-043-019-001-001'); 
update_post_meta(14791, '_parque_clave_catastral', '000-031-700-005-001');
update_post_meta(14792, '_parque_clave_catastral', '000-031-700-005-001');
update_post_meta(14846, '_parque_clave_catastral', '000-031-130-001-001');
update_post_meta(14947, '_parque_clave_catastral', '000-043-131-002-001');
update_post_meta(15166, '_parque_clave_catastral', '000-032-698-001-001');
update_post_meta(15820, '_parque_clave_catastral', '000-030-196-003-001');
update_post_meta(15826, '_parque_clave_catastral', '000-037-113-001-001');
update_post_meta(15827, '_parque_clave_catastral', '000-037-014-001-001');
update_post_meta(15832, '_parque_clave_catastral', '000-032-419-001-001');
update_post_meta(15836, '_parque_clave_catastral', '000-044-288-001-001');
update_post_meta(16187, '_parque_clave_catastral', '000-031-700-005-001');
update_post_meta(16199, '_parque_clave_catastral', '000-044-055-009-001');
update_post_meta(16213, '_parque_clave_catastral', '000-037-278-001-001');
update_post_meta(14807, '_parque_clave_catastral', '000-035-332-001-001');
update_post_meta(14890, '_parque_clave_catastral', '000-022-395-016-001');
/*$file = fopen("no_se.txt", "r") or exit("Error abriendo fichero!");
//Lee línea a línea y escribela hasta el fin de fichero
while ($linea = fgets($file)) {
    $val=split(",", trim($linea));
    if(count($val)>3){
        $sql="SELECT ID from wp_posts WHERE post_title=".$val[1].",".$val[2]." AND post_author='".$asesor[$val[0]]."' AND post_status='publish' AND post_type='parque'";
	$res=mysql_query($sql);
        if(mysql_num_rows($res)>0){
            while($row=mysql_fetch_array($res)){
                echo $row['ID'].'<br>';
                update_post_meta($row['ID'], '_parque_clave_catastral', $val[3] );
            }
        }
        else{
            echo 'No encontro el parque - '.$linea.'<br>';
        }
    }
    else{
        $sql="SELECT ID from wp_posts WHERE post_title='".$val[1]."' AND post_author='".$asesor[$val[0]]."' AND post_status='publish' AND post_type='parque'";
	$res=mysql_query($sql);
        if(mysql_num_rows($res)>0){
            while($row=mysql_fetch_array($res)){
                update_post_meta($row['ID'], '_parque_clave_catastral', $val[2] );
            }
        }
        else{
            echo 'No encontro el parque - '.$linea.'<br>';
        }
    }
}
fclose($file);
*/
echo '</body></html>';
?>