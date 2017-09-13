<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
$asesores=array();
$sql="select ID,cod from asesores where cod>0 and stat<2";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res)) {
	$asesores[$row['cod']]=$row['ID'];
}
if($_POST['cmd']==4){
    if($_POST['parque']>0){
        update_post_meta($id_post, '_parque_vialidad_prin', $_POST['vialidadprin'] );
        update_post_meta($id_post, '_parque_vialidad1', $_POST['vialidad1'] );
        update_post_meta($id_post, '_parque_vialidad2', $_POST['vialidad2'] );
        update_post_meta($id_post, '_parque_vialidad_pos', $_POST['vialidadpos'] );
        update_post_meta($id_post, '_parque_tipoasentamiento', $_POST['tipoasentamiento'] );
        update_post_meta($id_post, '_parque_nomasentamiento', $_POST['nomasentamiento'] );
        update_post_meta($id_post, '_parque_desc_ubic', $_POST['descubic'] );
        update_post_meta($id_post, '_parque_sec', $_POST['sector'] );
        update_post_meta($id_post, '_parque_zona', $_POST['zona'] );
        update_post_meta($id_post, '_parque_nivel', $_POST['nivel'] );
        update_post_meta($id_post, '_parque_regimen', $_POST['regimen'] );
        update_post_meta($id_post, '_parque_legal', $_POST['legal'] );
        update_post_meta($id_post, '_parque_tipo', $_POST['tipo'] );
        update_post_meta($id_post, '_parque_estado', $_POST['state'] );
        update_post_meta($id_post, '_parque_ciudad', $_POST['ciudad'] );
        update_post_meta($id_post, '_parque_localidad', $_POST['localidad'] );
        update_post_meta($id_post, '_parque_seg', $_POST['apoyado']);
        update_post_meta($id_post, '_parque_obs', $_POST['obsgenerales'] );
	echo 'Si|'.$_POST['parque'];
    }
    else{
        $my_post = array('post_name' => $_POST['nom_parque'],
        'post_title' => $_POST['nom_parque'],
        'post_status' => 'publish',
        'post_author' => $_POST['asesor'],
        'post_type' => 'parque',
        'post_date' => date("Y-m-d").' 00:00:00'
        );
        $id_post = wp_insert_post( $my_post );
        if($id_post>0){
            /*add_post_meta($id_post, '_parque_ubic', $_POST['ubicacion'], true );
            add_post_meta($id_post, '_parque_col', $_POST['colonia'], true );
            add_post_meta($id_post, '_parque_sup', $_POST['superficie'], true );
            add_post_meta($id_post, '_parque_colin', $_POST['colindancias'], true );
            add_post_meta($id_post, '_parque_sec', $_POST['sector'], true );
            add_post_meta($id_post, '_parque_nivel', $_POST['nivel'], true );
            add_post_meta($id_post, '_parque_regimen', $_POST['regimen'], true );
            add_post_meta($id_post, '_parque_legal', $_POST['legal'], true );
            add_post_meta($id_post, '_parque_tipo', $_POST['tipo'], true );
            add_post_meta($id_post, '_parque_estado', $_POST['state'], true );
            add_post_meta($id_post, '_parque_ciudad', $_POST['ciudad'], true );
            */
            add_post_meta($id_post, '_parque_vialidad_prin', $_POST['vialidadprin'], true );
            add_post_meta($id_post, '_parque_vialidad1', $_POST['vialidad1'], true );
            add_post_meta($id_post, '_parque_vialidad2', $_POST['vialidad2'], true );
            add_post_meta($id_post, '_parque_vialidad_pos', $_POST['vialidadpos'], true );
            add_post_meta($id_post, '_parque_tipoasentamiento', $_POST['tipoasentamiento'], true );
            add_post_meta($id_post, '_parque_nomasentamiento', $_POST['nomasentamiento'], true );
            add_post_meta($id_post, '_parque_desc_ubic', $_POST['descubic'], true );
            add_post_meta($id_post, '_parque_sec', $_POST['sector'], true );
            add_post_meta($id_post, '_parque_zona', $_POST['zona'], true );
            add_post_meta($id_post, '_parque_nivel', $_POST['nivel'], true );
            add_post_meta($id_post, '_parque_regimen', $_POST['regimen'], true );
            add_post_meta($id_post, '_parque_legal', $_POST['legal'], true );
            add_post_meta($id_post, '_parque_tipo', $_POST['tipo'], true );
            add_post_meta($id_post, '_parque_estado', $_POST['state'], true );
            add_post_meta($id_post, '_parque_ciudad', $_POST['ciudad'], true );
            add_post_meta($id_post, '_parque_localidad', $_POST['localidad'], true );
            if($_POST['apoyado']==1){
                add_post_meta($id_post, '_parque_seg', $_POST['apoyado'], true );    
            }
            else{
                update_post_meta($id_post, '_parque_seg', 0);
            }
            add_post_meta($id_post, '_parque_obs', $_POST['obsgenerales'], true );
            echo 'Si|'.$id_post;
        }
        else{
            echo 'Error';
        }
    }
    exit();
}
?>