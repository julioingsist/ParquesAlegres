<?php
/**
 * @package Listado de parques en el administrador
 * @version 1.0
 */
/*
Plugin Name: PA Listado de parques en el administrador
Plugin URI: http://di99.com
Description: Listado de parques en el administrador
Author: Brenda Gudiño
Version: 1.0
Author URI: http://eci.mx/
*/

    add_filter('manage_edit-parque_columns', 'add_new_parque_columns');

function add_new_parque_columns($parque_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    //$new_columns['id'] = __('ID');
    $new_columns['title'] = _x('Nombre', 'column name');
    //$new_columns['author'] = __('Asesor');
    $new_columns['tipo'] = __('Tipo');
    $new_columns['superficie'] = _x('Superficie m&#178;');
    $new_columns['visitas'] = _x('Visitas');
    $new_columns['agregar_visita'] = __('');
    $new_columns['author'] = __('Asesor');

    //$new_columns['categories'] = __('Categories');
    //$new_columns['tags'] = __('Tags');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}
add_action('manage_parque_posts_custom_column', 'manage_parque_columns', 10, 2);
 
function manage_parque_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {
        
        case 'tipo':
           $tipo=array(1 => '&Aacute;rea verde', 2 => '&Aacute;rea com&uacute;n', 3 => '&Aacute;rea de donaci&oacute;n', 4 => '&Aacute;rea de ejercicio', 5 => '&Aacute;rea deportiva', 6 => '&Aacute;rea recreativa', 7 => 'Bald&iacute;o', 8 => 'Campo deportivo (mixto)', 9 => 'Cancha de usos multiples', 10 => 'Cancha deportiva', 11 => 'Deportivo', 12 => 'Fraccionadora', 13 => 'Lineal', 14 => 'Mixto', 15 => 'P&uacute;blico', 16 => 'Parque', 17 => 'Infantil', 18 => 'Unidad de usos multiples', 19 => 'Plancha', 20 => 'Plaza c&iacute;vica', 21 => 'Privado', 22 => 'Reg&iacute;men condominal', 23 => 'Semi-privado', 24 => 'Unidad deportiva', 25 => 'Unidad deportiva (mixta)');

        echo $tipo[get_post_meta($id, "_parque_tipo", true)];
        //echo $id;
            break;
        case 'superficie':
           // $sqla1="select meta_value as superficie from wp_postmeta where post_id=$id and meta_key='_parque_sup'";
        //$resa1=mysql_query($sqla1);
        //$rowa1=mysql_fetch_array($resa1);
        //echo $rowa1['superficie'];
        if (!get_post_meta($id, "_parque_sup", true)){
          echo'0';  
        }else{
          echo get_post_meta($id, "_parque_sup", true);  
        }
 
        echo'&nbsp;m&#178;';
        //echo $id;
            break;
    case 'agregar_visita':
        echo'<a href="edit.php?post_type=parque&page=altaparametros&parque='.$id.'">Agregar Visita</a>';
        //echo $id;
            break;
 
    case 'visitas':
        // Get number of images in gallery
        $sqla="select count(*) as totalvisitas from wp_comites_parques where cve_parque=$id";
        $resa=mysql_query($sqla);
        $rowa=mysql_fetch_array($resa);

        echo '<a href="edit.php?post_type=parque&page=parametros&parque='.$id.'">'.$rowa['totalvisitas'].'</a>';
       // $num_visitas = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = %d;", $id));
        //echo $num_visitas; 
        break;
    default:
        break;
    } // end switch
}

?>