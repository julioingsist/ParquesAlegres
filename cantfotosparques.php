<?php
ini_set('display_errors',1);
ini_set('error_reporting',E_ERROR);
require_once('wp-config.php');
date_default_timezone_set("America/Mazatlan");
echo '<!doctype html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fotos de los Parques</title>
</head>
<body>';
$sql="SELECT p.ID, p.post_title,p.guid FROM wp_posts p INNER JOIN asesores a ON a.ID=p.post_author WHERE p.post_status='publish' AND p.post_type='parque' AND a.stat<2";
$res=mysql_query($sql);
if(mysql_num_rows($res)>0){
    echo '<table border=1>
    <tr><th>ID</th><th>Nombre</th><th>Fotos</th></tr>';
    $i=0;
    $imgtot=0;
    while($row=mysql_fetch_array($res)){
        if ( get_post_meta( $row['ID'], '_parque_gallery', true )){
            echo '<tr><td>'.$row['ID'].'</td><td><a href="'.$row['guid'].'" target="_blank">'.$row['post_title'].'</a></td>';
            $images = get_post_meta( $row['ID'], '_parque_gallery' );
            $img=0;
            foreach ( $images as $image ) {
                /*echo '<td>';
                echo pods_image( $image,array(300,300));
                echo '</td>';
                */$img++;
            }
            $imgtot=$imgtot+$img;
            echo '<td>'.$img.'</td></tr>';
            $i++;
        }
    }
    echo '<tr><th colspan="2">Total parques: '.$i.'</th><th>Total imagenes: '.$imgtot.'</th></tr></table>';
}
echo '</body></html>';
?>