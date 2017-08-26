<?php
require_once('wp-config.php');
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
    while($row=mysql_fetch_array($res)){
        $row['data'] = str_replace(' ', '', $row['data']);
        if($row['clasificacion']==1 && $row['parametro']=="canasta"){
            if($row['data']==1){
                    $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Si","Tipo"=>" - ","Faltante"=>" - ");
            }else{
                    $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"No","Tipo"=>" - ","Faltante"=>" - ");
            }
        }
        elseif($row['clasificacion']==1 && $row['parametro']=="cajones"){
            $data=split(',',$row['data']);
            $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>" - ","Tipo"=>" - ","Faltante"=>$data[1]);
        }
        elseif($row['clasificacion']==3 && $row['parametro']=="gimnasio"){
            if($row['data']==1){
                    $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"Si","Tipo"=>" - ","Faltante"=>" - ");
            } else{
                    $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>" - ","Estado"=>"No","Tipo"=>" - ","Faltante"=>" - ");
            }
                
        }
        elseif($row['clasificacion']==3 && $row['parametro']=="promotores"){
            $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$row['data'],"Estado"=>" - ","Tipo"=>" - ","Faltante"=>" - ");
        }
        elseif($row['clasificacion']==3 && $row['parametro']=="deportes"){
            $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$row['data'],"Estado"=>" - ","Tipo"=>" - ","Faltante"=>" - ");
        }
        elseif($row['clasificacion']==4){
            $data=split(',',$row['data']);
            if(substr($row['parametro'], 0, 6)=="cesped"){
                if($data[1]==1){
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>$estado[$data[3]],"Tipo"=>"Sintético","Faltante"=>$data[2]);
                } else{
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>$estado[$data[3]],"Tipo"=>"Natural","Faltante"=>$data[2]);
                }
            }
            elseif($row['parametro']=="arboles"){
                if($data[1]==1){
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>" - ","Tipo"=>"Chico","Faltante"=>$data[2]);
                } elseif($data[1]==2){
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>" - ","Tipo"=>"Mediano","Faltante"=>$data[2]);
                } else{
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>" - ","Tipo"=>"Grande","Faltante"=>$data[2]);
                }
            }
            elseif($row['parametro']=="arbusto"){
                if($data[1]==1){
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>$estado[$data[3]],"Tipo"=>"Chico","Faltante"=>$data[2]);
                } else{
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>$estado[$data[3]],"Tipo"=>"Grande","Faltante"=>$data[2]);
                }
            }
            else{
                if($data[1]==1){
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>$estado[$data[3]],"Tipo"=>"Por goteo","Faltante"=>$data[2]);
                } else{
                        $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>$estado[$data[3]],"Tipo"=>"Automatico","Faltante"=>$data[2]);
                }
            }
        }
        else{
            $data=split(',',$row['data']);
            $return_array[]=array("Asesor"=>$asesores[$author[$row['cve_parque']]],"Parque"=>$parque[$row['cve_parque']],"Clasificación"=>$tipo[$row['clasificacion']],"Aditamento"=>$row['parametro'],"Cantidad"=>$data[0],"Estado"=>$estado[$data[1]],"Tipo"=>" - ","Faltante"=>$data[2]);
        }
    }
}
echo serialize($return_array);
?>