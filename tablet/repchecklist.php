<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
echo '<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte de tangibles</title>
</head><body>';
$tipo=array(1=>"Instalaciones",2=>"Áreas de esparcimiento",3=>"Área deportiva",4=>"Área verde");
$estado=array(1=>"Bueno",2=>"Regular",3=>"Malo");
$sql0="select id, post_title, post_author from wp_posts where post_type='parque' and post_status='publish' order by post_title ASC";
$res0=mysql_query($sql0);
while($row0=mysql_fetch_array($res0)){
    $parque[$row0["id"]]=$row0["post_title"];
    $author[$row0["id"]]=$row0["post_author"];
}
$sql="select a.ID,u.display_name from asesores as a INNER JOIN wp_users as u ON a.ID=u.ID";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['ID']]=$row['display_name'];
}
$sql="select * from checklist order by cve_parque,clasificacion,data";
$res=mysql_query($sql);
if(mysql_num_rows($res)>0){
    echo '<table border=1><tr><td>Parque</td><td>Asesor</td><td>Clasificación</td><td>Aditamento</td><td>Cantidad</td><td>Estado</td><td>Tipo</td><td>Faltante</td></tr>';
    while($row=mysql_fetch_array($res)){
        echo '<tr>';
        $row['data'] = str_replace(' ', '', $row['data']);
        if($row['clasificacion']==1 && $row['parametro']=="canasta"){
            if($row['data']==1){
                echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td> - </td><td> Si </td><td> - </td><td> - </td>';
            }else{
                echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td> - </td><td> No </td><td> - </td><td> - </td>';
            }
        }
        elseif($row['clasificacion']==1 && $row['parametro']=="cajones"){
            $data=split(',',$row['data']);
            echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td> - </td><td> - </td><td>'.$data[1].'</td>';
        }
        elseif($row['clasificacion']==3 && $row['parametro']=="gimnasio"){
            if($row['data']==1){
                echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td> - </td><td> Si </td><td> - </td><td> - </td>';
            } else{
                echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td> - </td><td> No </td><td> - </td><td> - </td>';
            }
        }
        elseif($row['clasificacion']==3 && $row['parametro']=="promotores"){
            echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$row['data'].'</td><td> - </td><td> - </td><td> - </td>';
        }
        elseif($row['clasificacion']==3 && $row['parametro']=="deportes"){
            echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$row['data'].'</td><td> - </td><td> - </td><td> - </td>';
        }
        elseif($row['clasificacion']==4){
            $data=split(',',$row['data']);
            if(substr($row['parametro'], 0, 6)=="cesped"){
                if($data[1]==1){
                    echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td>'.$estado[$data[3]].'</td><td>Sintético</td><td>'.$data[2].'</td>';
                } else{
                    echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td>'.$estado[$data[3]].'</td><td>Natural</td><td>'.$data[2].'</td>';
                }
            }
            elseif($row['parametro']=="arboles"){
                if($data[1]==1){
                    echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td> - </td><td>Chico</td><td>'.$data[2].'</td>';
                } elseif($data[1]==2){
                        echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td> - </td><td>Mediano</td><td>'.$data[2].'</td>';
                } else{
                    echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td> - </td><td>Grande</td><td>'.$data[2].'</td>';
                }
            }
            elseif($row['parametro']=="arbusto"){
                if($data[1]==1){
                    echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td>'.$estado[$data[3]].'</td><td>Chico</td><td>'.$data[2].'</td>';
                } else{
                    echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td>'.$estado[$data[3]].'</td><td>Grande</td><td>'.$data[2].'</td>';
                }
            }
            else{
                if($data[1]==1){
                        echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td>'.$estado[$data[3]].'</td><td>Por goteo</td><td>'.$data[2].'</td>';
                } else{
                    echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td>'.$estado[$data[3]].'</td><td>Automático</td><td>'.$data[2].'</td>';
                }
            }
        }
        else{
            $data=split(',',$row['data']);
            echo '<td>'.$parque[$row['cve_parque']].'</td><td>'.$asesores[$author[$row['cve_parque']]].'</td><td>'.$tipo[$row['clasificacion']].'</td><td>'.$row['parametro'].'</td><td>'.$data[0].'</td><td>'.$estado[$data[1]].'</td><td> - </td><td>'.$data[2].'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
echo '</body></html>';
?>