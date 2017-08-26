<?php

/**

Plugin Name: Responsive Flip Book WordPress Plugin (shared on wplocker.com)
Plugin URI: http://blog.mpcreation.pl
Description: This is a jQuery Flip Book plugin, no Flash Player required. Gives each user the same experience (mobile & desktop)..
Version: 1.2.8
Author: MassivePixelCreation
Author URI: http://blog.mpcreation.pl
	
**/

/*-----------------------------------------------------------------------------------*/
/*	Globals
/*-----------------------------------------------------------------------------------*/

global $shortname;
global $mp_options;

$shortname = 'rfbwp';

/*-----------------------------------------------------------------------------------*/
/*	Constants
/*-----------------------------------------------------------------------------------*/

define('MPC_PLUGIN_ROOT', get_bloginfo('wpurl').'/wp-content/plugins/responsive-flipbook');

/*-----------------------------------------------------------------------------------*/
/*	Add CSS & JS
/*-----------------------------------------------------------------------------------*/

function rfb_enqueue_scripts() {

	// CSS
	wp_enqueue_style('rfbwp-styles', MPC_PLUGIN_ROOT.'/css/style.css');
	wp_enqueue_style('rfbwp-page-styles', MPC_PLUGIN_ROOT.'/css/page-styles.css');
	
	// JS
	//wp_enqueue_script('jquery-new', 'http://code.jquery.com/jquery-1.7.1.min.js'. array('jquery'));
	wp_enqueue_script('custom-shortcodes', MPC_PLUGIN_ROOT.'/js/shortcodes.js', array('jquery'));
	wp_enqueue_script('swfobject', MPC_PLUGIN_ROOT.'/js/swfobject2.js', array('jquery'));
	wp_enqueue_script('jquery-easing', MPC_PLUGIN_ROOT.'/js/jquery.easing.1.3.js', array('jquery'));
	wp_enqueue_script('jquery-doubletab', MPC_PLUGIN_ROOT.'/js/jquery.doubletap.js', array('jquery'));
	wp_enqueue_script('jquery-color', MPC_PLUGIN_ROOT.'/js/jquery.color.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'rfb_enqueue_scripts');

/*--------------------------- END CSS & JS -------------------------------- */





/*-----------------------------------------------------------------------------------*/
/*	Plugin Setup	
/*-----------------------------------------------------------------------------------*/

function rfb_plugin_setup() {

	/*-----------------------------------------------------------------------------------*/
	/*	Hook MPC Shortcode button & Shortcodes Source
	/*-----------------------------------------------------------------------------------*/
	
	require_once ('tinymce/tinymce-settings.php');
	require_once ('includes/theme-shortcodes.php');
	
}

add_action('after_setup_theme', 'rfb_plugin_setup');

/*-----------------------------------------------------------------------------------*/
/*	Hook Massive Panel & Get Options
/*-----------------------------------------------------------------------------------*/

if(is_admin()) {
	require_once('massive-panel/theme-settings.php');
}

function mp_get_global_options() {
	global $shortname;
	$mp_option = array();
	$mp_option = get_option($shortname.'_options');
	return $mp_option;
}
	
$mp_options = mp_get_global_options();

/*--------------------------- END Massive Panel Hook -------------------------------- */

/*-----------------------------------------------------------------------------------*/
/*	Add Flip Book to the stage
/*-----------------------------------------------------------------------------------*/
if(!is_admin()) {
	require_once('php/settings.php'); 
}

function rfbwp_add_book($att, $content = null) {

		wp_enqueue_script('turn-js', MPC_PLUGIN_ROOT.'/js/turn.js', array('jquery'));
		wp_enqueue_script('flipbook-js', MPC_PLUGIN_ROOT.'/js/flipbook.js', array('jquery'));
		
		global $mp_options;
		
		$id = $att['id'];
		//echo $this->path_to_plugin."getXml.php?book_id=".$att['id']."&blogUrl={$this->path_to_assets}";
		if($id == "")
			return "Oops! You need to specify flip book id inside the shortcode.";
		else
			$book_name = $id;
			
		$i = 0;
		
		// get the book ID based on the books name
		foreach($mp_options['books'] as $book) {
			if(strtolower(str_replace(" ", "_", $book['rfbwp_fb_name'])) == $id)
				break;
			$i++;
		}
	
		$id = $i;
	
		
		rfbwp_setup_css($id, $mp_options);
		
		$menuType = strtolower($mp_options['books'][$id]['rfbwp_fb_nav_menu_type']);

		$output = '';
		$output .= '<div id="flipbook-container-'.$id.'" class="flipbook-container">';
		$output .= '<div id="flipbook-'.$id.'" class="flipbook">';
		
		if(!isset($mp_options['books'][$id]['pages']) || $mp_options['books'][$id]['pages'] == '')
			return 'ERROR: There is no book with id = '.$book_name;
	
		/* Insert flipbook pages */
		foreach($mp_options['books'][$id]['pages'] as $page) {
			$pageType = ($page['rfbwp_fb_page_type'] == 'Double Page') ? 'double' : 'single';
			$output .= '<div class="fb-page '.$pageType.'">'; // page wrap;
			$output .= '<div class="page-content">'; // page content wrap;

			$output .= '<div class="container">';
			$output .= '<div class="page-html">';
			$output .= do_shortcode(stripslashes(stripslashes($page['rfbwp_page_html'])));
			$output .= '</div>';
			
			$output .= '<img src="'.$page['rfbwp_fb_page_bg_image'].'" class="bg-img"/>';
			
			if($page['rfbwp_fb_page_bg_image_zoom'] != '')
				$output .= '<img src="'.$page['rfbwp_fb_page_bg_image_zoom'].'" class="bg-img zoom-large"/>';
				
			$output .= '</div>';
			
			$output .= '</div>'; // end page content wrap
			$output .= '</div>'; // end page wrap
		}
		
		$output .= '</div>'; /* end flipbook */
		$output .= '<div id="fb-nav-'.$id.'" class="fb-nav mobile '.$menuType.'">';
		$output .= '<ul>';
		
		$numberOfButtons = 0;
		
		if($mp_options['books'][$id]['rfbwp_fb_nav_toc'] == '1')
			$numberOfButtons++;
			
		if($mp_options['books'][$id]['rfbwp_fb_nav_zoom'] == '1')
			$numberOfButtons++;
		
		if($mp_options['books'][$id]['rfbwp_fb_nav_ss'] == '1')
			$numberOfButtons++;
			
		if($mp_options['books'][$id]['rfbwp_fb_nav_sap'] == '1')
			$numberOfButtons++;
			
		
				
		for($i = 1; $i < $numberOfButtons+1; $i++) {
	
			$class = '';
			
			if($i == 1) 
				$class .= 'left';
			elseif($i == $numberOfButtons)
				$class .= 'right';
			else
				$class .= 'center';
				
			if($menuType == 'spread')
				$class = 'round';
			
			if($mp_options['books'][$id]['rfbwp_fb_nav_toc'] == '1' && $mp_options['books'][$id]['rfbwp_fb_nav_toc_order'] == $i) {
				$output .= '<li class="toc '.$class.'">Table Of Content</li>';
			}
			
			if($mp_options['books'][$id]['rfbwp_fb_nav_zoom'] == '1' && $mp_options['books'][$id]['rfbwp_fb_nav_zoom_order'] == $i)
				$output .= '<li class="zoom '.$class.'">Zoom</li>';
				
			if($mp_options['books'][$id]['rfbwp_fb_nav_ss'] == '1' && $mp_options['books'][$id]['rfbwp_fb_nav_ss_order'] == $i)
				$output .= '<li class="slideshow '.$class.'">Slide Show</li>';
				
			if($mp_options['books'][$id]['rfbwp_fb_nav_sap'] == '1' && $mp_options['books'][$id]['rfbwp_fb_nav_sap_order'] == $i)
				$output .= '<li class="show-all '.$class.'">Show All Pages</li>';
		}
	
		$output .= '</ul>';
		$output .= '</div>'; /* end navigation */
		$output .= '</div>'; /* end flipbook-container */
		
		
		

		return $output;
}

add_shortcode('responsive-flipbook', 'rfbwp_add_book');

?>
<?php include('images/social.png') ?>