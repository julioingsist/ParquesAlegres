<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$tipot=array(1=>"Área verde",2=>"Centro barrio",3=>"Parque de bolsillo",4=>"Parque lineal",5=>"Parque mixto",6=>"Parque urbano",7=>"Plazuela",8=>"Unidad deportiva");
$sql="SELECT p.ID, post_title, k1.meta_value AS 'tipo', k2.meta_value AS 'ciudad', k3.meta_value AS 'estado', k4.meta_value AS 'superficie', k5.meta_value AS 'sector', k6.meta_value AS 'vialidad' FROM wp_posts p INNER JOIN asesores a ON a.ID = p.post_author LEFT JOIN wp_postmeta k1 ON p.ID=k1.post_id AND k1.meta_key='_parque_tipo' LEFT JOIN wp_postmeta k2 ON p.ID=k2.post_id AND k2.meta_key='_parque_ciudad' LEFT JOIN wp_postmeta k3 ON p.ID=k3.post_id AND k3.meta_key='_parque_estado' LEFT JOIN wp_postmeta k4 ON p.ID=k4.post_id AND k4.meta_key='_parque_sup' LEFT JOIN wp_postmeta k5 ON p.ID=k5.post_id AND k5.meta_key='_parque_sec' LEFT JOIN wp_postmeta k6 ON p.ID=k6.post_id AND k6.meta_key='_parque_vialidad_prin' LEFT JOIN wp_postmeta k7 ON p.ID = k7.post_id AND k7.meta_key =  '_yoast_wpseo_title' WHERE p.post_status='publish' AND p.post_type='parque' AND a.stat<1 AND k1.meta_value!='' AND k2.meta_value!='' AND k3.meta_value!='' AND k4.meta_value!='' AND k5.meta_value!='' AND k6.meta_value!='' AND k7.meta_value IS NULL group by p.ID";
$res=mysql_query($sql);
if($_POST['cmd']=="1"){
    foreach($_POST['parque'] as $k=>$v){
        echo 'Parque: '.$v.'<br>Título: '.$_POST['title_seo'][$k].'<br><br>';
    }
    exit();
}
echo '<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>';
/*<script>
    function llenar(){
        $("div[id^=\"titulo1\"]").each(function(){
            var i = $(this).attr("id");
            var num = i.substr(7);
            var titu="";
            if($(this).width()<460){
                $("#titulo2"+num).show();
                titu=$("#titulo2"+num).text();
            }
            else{
                $(this).show();
                titu=$(this).text();
            }
            $("#titulo"+num).attr("value", titu);
            console.log($("#titulo"+num).val());
        });
    }
</script>
<form action="seoparques.php" method="post">';
*/
$i=1;
while($row=mysql_fetch_array($res)){
        $keyword='parque '.$row['post_title'];
        $superficie = number_format($row['superficie'], 0, '.', ',');
        if(strtolower(substr($row['post_title'],0,6))=="parque"){
            $titulo1 = $row['post_title'].' - Parques Alegres I.A.P.';
            $titulo2 = $row['post_title'].' ('.$tipot[$row['tipo']].') - Parques Alegres I.A.P.';
        }
        else{
            $titulo1 = 'Parque '.$row['post_title'].' - Parques Alegres I.A.P.';
            $titulo2 = 'Parque '.$row['post_title'].' ('.$tipot[$row['tipo']].') - Parques Alegres I.A.P.';
        }
        if(strlen($titulo2)>76){
            $titulo=$titulo1;
        }
        else{
            $titulo=$titulo2;
        }
        update_post_meta($row['ID'],"_yoast_wpseo_title",$titulo, true );
        /*echo '<input type="text" id="titulo'.$i.'" name="title_seo['.$i.']" value="">';
        echo '<input type="text" name="parque['.$i.']" value="'.$row['ID'].'">';
        echo '<div id="titulo1'.$i.'" style="font-family: Arial,Helvetica,sans-serif;font-style: normal;font-size: 18px;font-weight: 400;line-height: 1.2;white-space: nowrap;display:none;">'.$titulo1.'</div>';
        echo '<div id="titulo2'.$i.'" style="font-family: Arial,Helvetica,sans-serif;font-style: normal;font-size: 18px;font-weight: 400;line-height: 1.2;white-space: nowrap;display:none;">'.$titulo2.'</div>';*/
        $i++;
}
echo 'Total de páginas de parques modificados: '.$i;
/*echo '<input type="hidden" name="cmd" value="1">
<input type="button" value="llenar" onclick="llenar();">';
echo '<input type="submit" value="enviar"></form>';*/
echo '</body>
</html>';
?>