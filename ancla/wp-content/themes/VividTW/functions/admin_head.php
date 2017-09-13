<?php

function admin_register_head() {
	
	global $post;
	$template_url = get_bloginfo('template_url');
	
	//Incluye el CSS del Admin
	echo '<link rel="stylesheet" type="text/css" href="' . $template_url . '/functions/admin.css" />';
	
	//Incluye el jQuery del Admin
	echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>';
	
	//Incluye el JS del Admin
	echo '<script type="text/javascript" src="' . $template_url . '/functions/admin.js"></script>';
	
	//Retrieve which page template is selected
	$current_template = get_post_meta($post->ID,'_wp_page_template',true);
	
	//Revisa si SEO está encendido
	$seo_include = get_option('vividtw_seo_meta');
	if($seo_include == 'true') {
	
		echo '<style type="text/css">';
		echo '#seo-meta { ';
		echo 'display: block; }';
		echo '</style>';
		
	}


}

add_action('admin_head', 'admin_register_head');

?>