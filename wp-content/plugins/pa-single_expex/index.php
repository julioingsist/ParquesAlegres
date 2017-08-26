<?php
/**
 * @package PA template single experiencia exitosa
 * @version 1.0
 */
/*
Plugin Name: PA template single experiencia exitosa
Plugin URI: http://di99.com
Description: PA template single experiencia exitosa
Author: Brenda Gudi–o
Version: 1.0
Author URI: http://eci.mx/
*/
function get_custom_post_type_template9($single_template1) {
     global $post;

     if ($post->post_type == 'experiencia_exitosa') {
          $single_template = dirname( __FILE__ ) . '/single-experiencia_exitosa.php';
     }
     return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template9' );



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