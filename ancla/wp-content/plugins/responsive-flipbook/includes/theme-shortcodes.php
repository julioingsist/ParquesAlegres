<?php

/*-----------------------------------------------------------------------------------*/
/*	1. RFBWP Columns
/*-----------------------------------------------------------------------------------*/

function rfbwp_column_shortcode($atts, $content) {
	extract(shortcode_atts(array (
		'class' => ''
		
	), $atts));
	
	$i = $GLOBALS['rfbwp_column_count'];
	$GLOBALS['rfbwp_column'][$i] = do_shortcode ($content);
	$GLOBALS['rfbwp_column_class'][$i] = $class;
	$GLOBALS['rfbwp_column_count']++;	
}

add_shortcode('rfbwp_column', 'rfbwp_column_shortcode');

function rfbwp_columns_shortcode($atts, $content = null ) {
	$GLOBALS['rfbwp_column_count'] = 0;
	do_shortcode ($content);
	extract(shortcode_atts(array(
    'type' => ''
    ), $atts, $content));
   
   $output = '<div class="preview-content left '.$GLOBALS['rfbwp_column_class'][0].'">';
   $output .= $GLOBALS['rfbwp_column'][0];
   $output .= '</div>';
   $output .= '<div class="preview-content right '.$GLOBALS['rfbwp_column_class'][1].'">';
   $output .= $GLOBALS['rfbwp_column'][1];
   $output .= '</div>';

   return $output;
} 

add_shortcode('rfbwp_columns', 'rfbwp_columns_shortcode');


/*--------------------------- END Columns -------------------------------- */


?>