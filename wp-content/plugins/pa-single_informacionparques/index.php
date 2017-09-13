<?php
/**
 * @package PA template informacion-parques
 * @version 1.0
 */
/*
Plugin Name: PA template informacion-parques
Plugin URI: http://di99.com
Description: PA template informacion-parques
Author: Brenda Gudi–o
Version: 1.0
Author URI: http://eci.mx/
*/
function get_custom_post_type_template6($single_template) {
     global $post;

     if ($post->ID == 161) {
          $single_template = dirname( __FILE__ ) . '/page-informacion-parques.php';
          //echo$single_template;
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template6' );



/* Filter the single_template with our custom function*/
/*add_filter('single_template', 'my_custom_template');

function my_custom_template($single) {
    global $wp_query, $post;*/

/* Checks for single template by post type */
/*if ($post->post_type == "parque"){
    if(file_exists(PLUGIN_PATH. '/single-parque.php'))
        return PLUGIN_PATH . '/single-parque.php';
}
    return $single;
}*/
?>