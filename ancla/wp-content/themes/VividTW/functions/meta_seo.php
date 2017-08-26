<?php

$seo_meta = array(

	array(
		"name" => "seo-description",
		"std" => "",
		"title" => "Meta Description",
		"description" => "La Meta Description es un peque&ntilde;o p&aacute;rrafo que describe de que trata una p&aacute;gina o art&iacute;culo en particular. Google y otros buscadores mostrar&aacute;n esta descripci&oacute;n en los resultados de la b&uacute;squeda. Sin este texto, generalmente, los buscadores simplemente mostrar&aacute;n pedazos relevantes de texto de tu sitio.",
		"description2" => "Ingresa una peque&ntilde;a descripci&oacute;n para los buscadores."
		),

	array(
		"name" => "seo-keywords",
		"std" => "",
		"title" => "Meta Keywords",
		"description" => "Las Meta keywords son palabras o frases que puedes usar para describir tu art&iacute;culo o p&aacute;gina. Definitivamente ahora no tienen el mismo impacto en el SEO como en el pasado, sin embargo estas todav&iacute;a pueden ser &uacute;tiles. De acuerdo a <a href=\"http://www.mattcutts.com/blog/\" target=\"_blank\">Matt Cutts</a>, responsable del buscador de Google, Google no utiliza las meta keywords para determinar las posiciones en sus resultados de b&uacute;squeda. Sin embargo, muchos otros buscadores si lo hacen. As&iacute; que, nunca es mala idea incluirlas.",
		"description2" => "Ingresa algunas palabras clave importantes. Separa estas palabras con comas.<Br />Ej: palabra clave 1, palabra clave 2, palabra clave 3"
		),
				
);


function seo_meta() {



	//Este código trae todas nuestras opciones de administración.
	global $options;
	foreach ($options as $value) {
		if (get_settings( $value['id'] ) === FALSE) { 
			$$value['id'] = $value['std']; 
		} else { 
			$$value['id'] = get_settings( $value['id'] ); 
		}
	}


	global $post, $seo_meta;
	
	global $post_ID, $temp_ID;
	
	foreach($seo_meta as $meta_box) {
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
		
		//Si el campo esta vacío
		if($meta_box_value == "") {
		
			$meta_box_value = $meta_box['std'];
			
		}
			
		echo '<div class="post-meta">';
		echo '<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
		echo '<h2 style="margin:5px;">'.$meta_box['title'].' &nbsp;<a href="#help-' . $meta_box['name'] . '" class="vividtw-open">&iquest;Qu&eacute; es esto?</a></h2>';
		
		//cuadro de Ayuda
		echo '<div id="help-' . $meta_box['name'] . '" class="help-box">';
		echo '<p>' . $meta_box['description'] . '</p>';
		echo '<p><a href="#help-' . $meta_box['name'] . '" class="vividtw-close">Cerrar</a></p>';
		echo '</div>';
		
		echo '<p><textarea name="' . $meta_box['name'] . '_value" class="vividtw-textarea" />' . $meta_box_value . '</textarea></p>';
		echo '<p>' . $meta_box['description2'] . '</p>';
		echo '</div>';

	}
}





function create_seo_meta() {
	global $theme_name;
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'seo-meta', 'Optimizaci&oacute;n para Motores de B&uacute;squeda (SEO)', 'seo_meta', 'post', 'normal', 'high' );
	}
	
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'seo-meta', 'Optimizaci&oacute;n para Motores de B&uacute;squeda (SEO)', 'seo_meta', 'page', 'normal', 'high' );
	}
}





function save_seo_meta( $post_id ) {
	global $post, $seo_meta;
	
	foreach($seo_meta as $meta_box) {
	// Verifica
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
		
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ))
				return $post_id;
			} else {
				if ( !current_user_can( 'edit_post', $post_id ))
				return $post_id;
		}
		
		$data = $_POST[$meta_box['name'].'_value'];
		
		if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
			add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
			
		elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
			update_post_meta($post_id, $meta_box['name'].'_value', $data);
			
		elseif($data == "")
			delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
	}
}




add_action('admin_menu', 'create_seo_meta');
add_action('save_post', 'save_seo_meta');


?>