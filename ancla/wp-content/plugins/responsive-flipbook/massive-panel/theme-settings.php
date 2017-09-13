<?php

/*-----------------------------------------------------------------------------------*/
/*	Constants
/*-----------------------------------------------------------------------------------*/

define('MP_SHORTNAME', 'mp'); // this is used to prefix the individual field id 
define('MP_PAGE_BASENAME', 'mp-settings'); // settings page slug
define('MP_ROOT', get_bloginfo('wpurl').'/wp-content/plugins/responsive-flipbook');

/*-----------------------------------------------------------------------------------*/
/*	Variables
/*-----------------------------------------------------------------------------------*/

global $shortname;
$shortname = "rfbwp";

/*-----------------------------------------------------------------------------------*/
/*	Specify Hooks
/*-----------------------------------------------------------------------------------*/

add_action('init', 'massivepanel_rolescheck' );

function massivepanel_rolescheck () {
	$role = get_role('editor');
	$role->add_cap('rfbwp_plugin_cap');
	$role = get_role('administrator');
	$role->add_cap('rfbwp_plugin_cap');

	if ( current_user_can('rfbwp_plugin_cap') ) {
		// If the user can edit theme options, let the fun begin!
		add_action('admin_menu', 'mp_add_menu');
		add_action('admin_init', 'mp_register_settings');
		add_action('admin_init', 'mp_mlu_init');
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Scripts (JS & CSS)	
/*-----------------------------------------------------------------------------------*/

function mp_settings_scripts(){
	wp_enqueue_style('mp_theme_settings_css', MP_ROOT.'/massive-panel/css/mp-styles.css');
	wp_enqueue_style('color_picker_css', MP_ROOT.'/massive-panel/css/colorpicker.css');

	wp_enqueue_script('cufon', MP_ROOT.'/massive-panel/js/cufon-yui.js', array('jquery'));
	wp_enqueue_script('trebuchet_ms', MP_ROOT.'/massive-panel/js/Trebuchet_MS.js', array('jquery'));
	wp_enqueue_script('jquery_cookie', MP_ROOT.'/massive-panel/js/jquerycookie.js', array('jquery'));
	wp_enqueue_script('color_picker_js', MP_ROOT.'/massive-panel/js/colorpicker.js', array('jquery'));

	wp_enqueue_script('animate-colors', MP_ROOT.'/massive-panel/js/jquery.animate-colors.js', array('jquery'));	
	wp_enqueue_script('custom-select', MP_ROOT.'/massive-panel/js/customSelect.js', array('jquery'));	
	wp_enqueue_script('jquery-rotate', MP_ROOT.'/massive-panel/js/jquery.rotate.js', array('jquery'));	
	wp_enqueue_script('mp_theme_settings_js', MP_ROOT.'/massive-panel/js/mp-scripts.js', array('jquery'));	
}


/*-----------------------------------------------------------------------------------*/
/*	Admin Menu Page
/*-----------------------------------------------------------------------------------*/

function mp_add_menu(){
	$settings_output = mp_get_settings();

	// add_cap("Editor", "rfbwp_plugin_cap", true);

	// This code displays the link to Admin Menu under "Appearance"
	$mp_settings_page = add_menu_page(__('Massive Panel Options', 'responsive-flipbook'), __('Flip Books', 'responsive-flipbook'), 'rfbwp_plugin_cap', MP_PAGE_BASENAME, 'mp_settings_page_fn');
	
	// js & css
	add_action('load-'.$mp_settings_page, 'mp_settings_scripts');
}

/*-----------------------------------------------------------------------------------*/
/*	Helper function for defininf variables
/*-----------------------------------------------------------------------------------*/

function mp_get_settings() {
	
	global $shortname;
	//delete_option($shortname.'_options');
	$output = array();
	$output[$shortname.'_option_name']		= $shortname.'_options'; // option name as used in the get_option() call
	$output['mp_page_title']				=__('Massive Panel Settings Page - Plugin shared on WPLOCKER.COM', 'rfbwp'); // the settings page title
	
	return $output;
}


function mp_settings_page_fn(){
	
	global $shortname;
	$settings_output = mp_get_settings();
	$content = mp_display_content();

	?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"></div>
		<h2><?php echo $settings_output['mp_page_title']; ?></h2>
			
			<div id="top">
				<div id="top-nav">
					<div class="mpc-logo"></div>
					<?php echo $content[3]; ?>
					<?php echo $content[2]; ?>
				</div><!-- end topnav -->
			</div> <!-- end top -->
			<div id="bg-content">
				<div id="sidebar"><?php echo $content[1]; ?></div>
					<form action="/" id="options-form" name="options-form" method="post">
						<?php 
							settings_fields($settings_output[$shortname.'_option_name']); 
							echo $content[0];
						?>	
						<div class="bottom-nav">
							<div class="mp-line">
								<div class="mp-line-around">
									<input type="hidden" name="action" value="rfbwp_save_settings" />
       								 <input type="hidden" name="security" value="<?php echo wp_create_nonce('rfbwp-theme-data'); ?>" />

									<input name="mp-submit" class="save-button" type="submit" value="<?php esc_attr_e('Save Settings', 'rfbwp'); ?>" />
									
									<a class="edit-button mp-orange-button" href="#'.$bookID.'"><span class="left"><span class="desc">Save Settings</span></span><span class="right"></span><span class="left-hover"><span class="desc">Save Settings</span></span><span class="right-hover"></span></a>
									<!-- <input name="mp-edit" class="edit-button" type="submit" value="<?php /* esc_attr_e('Edit Settings', 'rfbwp'); */ ?>" /> -->
									
									<input name="mp-reset" class="reset-button" type="submit" value="<?php esc_attr_e('Reset Settings', 'rfbwp'); ?>" />
								</div>
						</div>	
					</form>
				</div> <!-- end bg-content -->
		</div><!-- end wrap -->
	
<?php

}

/*-----------------------------------------------------------------------------------*/
/*	Register settings
/*	This function registers wordpress settings
/*-----------------------------------------------------------------------------------*/

function mp_register_settings() {
	global $shortname;
	require_once('theme-options.php');
	require_once('theme-interface.php');
	require_once('mpc-uploader.php');

	$settings_output	= mp_get_settings();
	$mp_option_name		= $settings_output[$shortname.'_option_name'];
	
	// register panel settings
	register_setting($mp_option_name, $mp_option_name, 'mp_validate_options');
}

/*-----------------------------------------------------------------------------------*/
/*	Validate Input
/*-----------------------------------------------------------------------------------*/

function mp_validate_options($input) {	

	
	// variable
	global $reset;
	global $book_id;
	global $settings;
	// for enphaced security, create new array
	global $valid_input;
	$valid_input = array();	
	$type = '';
	$reset = 'false';
	$settings = rfbwp_get_settings();
	
	if(isset($_POST['mp-settings']) && $_POST['mp-settings'] == "Edit Settings" || $_POST['mp-settings'] == "Save Page" || $_POST['mp-settings'] == "Save Changes" || $_POST['mp-settings'] == "Delete Page") {
		$addNewBook = 'false';	
			
		if($_POST['mp-settings'] == "Save Page")
			$addNewPage = 'true';
		elseif($_POST['mp-settings'] == "Save Changes")
			$addNewPage = 'false';
		elseif($_POST['mp-settings'] == "Delete Page")
			$addNewPage = 'delete';
			
	} else {
		$addNewBook = 'true';
		$addNewPage = 'false';
	}
		
	if(isset($_POST['mp-settings']) && $_POST['mp-settings'] == "delete")
		$addNewBook = 'delete';
	
	// get the settings section array
	$options = mp_options();
	
	// if there is a book add another one 
	if(isset($settings['books'])  && count($settings['books']) > 0) 
		$options = mp_duplicate_options($options, $addNewBook, $addNewPage, $_POST['active-book']);
		
	$book_id = -1;
	$page_id = 0;
	$path_prefix = '';
	$input_path_prefix = '';
	
	if(isset($_POST['delete']))
		$dbook_id = $_POST['delete'];
	else
		$dbook_id = '';
		
	if(isset($_POST['delete-page'])) {
		$dpage_id = $_POST['delete-page'];
		$dbook_id = $_POST['active-book'];
	} else {
		$dpage_id = '';
	}

	// run a foreach and switch on option type
	foreach($options as $option) {
	
		if( isset($option['sub']) && $option['sub'] == 'settings' )
			$type = 'books';
		elseif( $option['type'] == 'pages' )
			$type = 'pages';
		elseif( $option['type'] == 'section' )
			$type = '';
	
		// delete if there is only one book
		
		
		if(count($input['books']) < 2 && $dbook_id != '' && $dpage_id == '') {
			continue;
		}

		  
		if($type == 'books' && $option['type'] == 'heading' && isset($option['sub']) && $option['sub'] == 'settings') {
			$book_id ++;
			$page_id = -1;
		} 
		
		if($type == 'pages' && $option['type'] == 'separator')
			$page_id++;
			
		
		// delete book id
		if($dbook_id != '' && $book_id >= $dbook_id && $dpage_id == ''){
			$input_book_id = $book_id + 1;
		} else {
			$input_book_id = $book_id;
		}
	
		// delete page id
		if($dpage_id != '' && $page_id >= $dpage_id && $dbook_id == $book_id) {
			$input_page_id = $page_id + 1;
		} else {
			$input_page_id = $page_id;
		}
		
		if(isset($option['id']) && $option['type'] != 'separator' && $option['type'] != 'heading' && $type != 'pages' && $input_book_id > -1) {
			$input_value = $input['books'][$input_book_id][$option['id']];
		} elseif(isset($option['id']) && $option['type'] != 'separator' && $option['type'] != 'heading' && $option['type'] != 'pages' && $type == 'pages' && $input_book_id > -1) {
			if(isset($input['books'][$input_book_id]['pages'][$input_page_id][$option['id']]))
				$input_value = $input['books'][$input_book_id]['pages'][$input_page_id][$option['id']];			
			else 
				continue;

		}
				
		switch($option['type']) {
			case 'text-big':
			case 'text-medium':
			case 'text-small':
				//switch validation based on the class
					
				switch($option['validation']){
					//for numeric
					case 'numeric':
						if($reset == "true"){
							$valid_input_value = $option['std'];
							set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
							break;
						}
						
						$input_value = trim($input_value); // this trims the whitespace
						$valid_input_value = $input_value;
						set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
					break;
					
					// multi-numeric values separated by comma
					case 'multinumeric':
						if($reset == "true"){
							$valid_input_value = $option['std'];
							set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
							break;
						}
						//accept the input only when the numeric values are comma separated
						$input_value = trim($input_value); // trim whitespace
						if($input_value != '') {
							// /^-?\d+(?:,\s?-?\d+)*$/ matches: -1 | 1 | -12,-23 | 12,23 | -123, -234 | 123, 234  | etc.
							$valid_input_value = $valid_input_value = (preg_match('/^-?\d+(?:,\s?-?\d+)*$/', $input_value) == 1) ? $input_value : __('Expecting comma separated numeric values','rfbwp');
						} else {
							$valid_input_value = $input_value;
						}
						
						// register error
						if($input_value !='' && preg_match('/^-?\d+(?:,\s?-?\d+)*$/', $input_value) != 1) {
							add_settings_error(
								$option['id'], // setting title
								MP_SHORTNAME . '_txt_multinumeric_error', // error ID
								__('Expecting comma separated numeric values!','rfbwp'), // error message
								'error' // type of message
							);
						}
						set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
					break;
					
					//no html
					case 'nohtml':
						if($reset == "true"){
							$valid_input_value = $option['std'];
							set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
							break;
						}
	    				//accept the input only after stripping out all html, extra white space etc!
	    				$input_value = sanitize_text_field($input_value); // need to add slashes still before sending to the database
	    				$valid_input_value = addslashes($input_value);
	    				set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	    			break;
	    			
	    			//for url
	    			case 'url':
	    				if($reset == "true"){
							$valid_input_value = $option['std'];
							set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
							break;
						}
	    				//accept the input only when the url has been sanited for database usage with esc_url_raw()
	    				$input_value 		= trim($input_value); // trim whitespace
	    				$valid_input_value = esc_url_raw($input_value);
	    				set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	    			break;
	    			
	    			//for email
	    			case 'email':
	    				if($reset == "true"){
							$valid_input_value = $option['std'];
							set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
							break;
						}
	    				//accept the input only after the email has been validated
	    				$input_value = trim($input_value); // trim whitespace
	    				if($input_value != ''){
	    					if(is_email($input_value)!== FALSE) {
	    						$valid_input_value = $input_value; 
	    					} else {
	    						$valid_input_value = __('Invalid email! Please re-enter!','rfbwp');	
	    					}
	    				} elseif($input_value == '') {
	    					$valid_input_value = __('This setting field cannot be empty! Please enter a valid email address.','rfbwp');
	    				}
	    				
	    				// register error
	    				if(is_email($input_value)== FALSE || $input_value == '') {
	    					add_settings_error(
	    						$option['id'], // setting title
	    						MP_SHORTNAME . '_txt_email_error', // error ID
	    						__('Please enter a valid email address.','rfbwp'), // error message
	    						'error' // type of message
	    					);
	    				}
	    				set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	    			break;
	    			
	    			// a "cover-all" fall-back when the class argument is not set
	    			default:
	    				if($reset == "true"){
							$valid_input_value = $option['std'];
							set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
							break;
						}
	    				// accept only a few inline html elements
	    				$allowed_html = array(
	    					'a' => array('href' => array (),'title' => array ()),
	    					'b' => array(),
	    					'em' => array (), 
	    					'i' => array (),
	    					'strong' => array()
	    				);
	    				
	    				$input_value 		= trim($input_value); // trim whitespace
	    				$input_value 		= force_balance_tags($input_value); // find incorrectly nested or missing closing tags and fix markup
	    				$input_value 		= wp_kses( $input_value, $allowed_html); // need to add slashes still before sending to the database
	    				$valid_input_value = addslashes($input_value); 
	    				set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	    			break;
	    		}
	    	break;
	    	
	    	case 'textarea-big':
	    	case 'textarea':
	    		//switch validation based on the class!
	    		switch ( $option['validation'] ) {
	    			//for only inline html
	    			case 'inlinehtml':
	    				if($reset == "true"){
							$valid_input_value = $option['std'];
							set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
							break;
						}
	    				// accept only inline html
	    				$input_value 		= trim($input_value); // trim whitespace
	    				$input_value 		= force_balance_tags($input_value); // find incorrectly nested or missing closing tags and fix markup
	    				$input_value 		= addslashes($input_value); //wp_filter_kses expects content to be escaped!
	    				$valid_input_value = wp_filter_kses($input_value); //calls stripslashes then addslashes
	    				set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	    			break;
	    			
	    			//for no html
	    			case 'nohtml':
	    				if($reset == "true"){
							$valid_input_value = $option['std'];
							break;
						}
	    				//accept the input only after stripping out all html, extra white space etc!
	    				$input_value 		= sanitize_text_field($input_value); // need to add slashes still before sending to the database
	    				$valid_input_value = addslashes($input_value);
	    				set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	    			break;
	    			
	    			//for allowlinebreaks
	    			case 'allowlinebreaks':
	    				if($reset == "true"){
							$valid_input_value = $option['std'];
							break;
						}
	    				//accept the input only after stripping out all html, extra white space etc!
	    				$input_value 		= wp_strip_all_tags($input_value); // need to add slashes still before sending to the database
	    				$valid_input_value = addslashes($input_value);
	    				set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	    			break;
	    			
	    			// a "cover-all" fall-back when the class argument is not set
	    			default:
	    				// accept only limited html
	    				if($reset == "true"){
							$valid_input_value = $option['std'];
							break;
						}
	    				
	    				//my allowed html
	    				$allowed_html = array(
	    					'a' 			=> array('href' => array (),'title' => array ()),
	    					'b' 			=> array(),
	    					'blockquote' 	=> array('cite' => array ()),
	    					'br' 			=> array(),
	    					'dd' 			=> array(),
	    					'dl' 			=> array(),
	    					'dt' 			=> array(),
	    					'em' 			=> array (), 
	    					'i' 			=> array (),
	    					'li' 			=> array(),
	    					'ol' 			=> array(),
	    					'p' 			=> array(),
	    					'q' 			=> array('cite' => array ()),
	    					'strong' 		=> array(),
	    					'ul' 			=> array(),
	    					'h1' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
	    					'h2' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
	    					'h3' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
	    					'h4' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
	    					'h5' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ()),
	    					'h6' 			=> array('align' => array (),'class' => array (),'id' => array (), 'style' => array ())
	    				);
	    				
	    				$input_value 		= trim($input_value); // trim whitespace
	    				$valid_input_value = addslashes($input_value);		
	    				set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);					
	    			break;
	    		}
	    	break;
	    	
	    	// settings that doesn't really require validation
	    	case 'upload':
	    	case 'info':
	     	case 'multi-checkbox':
	    	case 'select':
	    	case 'choose-portfolio':
		 	case 'choose-sidebar':
		 	case 'choose-sidebar-small':
		 	case 'choose-image':
		 	case "radio" :
		 		if($reset == "false"){
		 			if(isset($option['id']) && isset($input_value))
	   	 				$valid_input_value = $input_value;
	   	 		} elseif (isset($option['id']) && isset($option['std'])) {
	   	 			$valid_input_value = $option['std'];
	   	 		} else {
	   	 			$valid_input_value = '';
	   	 		}
	   	 		set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	 	 	break;
	 	 	
	 	 	case 'multi-upload':
	 	 		if(isset( $input_value)){
	    			$valid_input_value = $input_value;
	    		} else {
	    			$valid_input_value = '';
	    		}
	    		set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	 	 	break;
	 	 
	 	 	// color picker validation
	 	 	case 'color':
	 	 		if($reset == "false"){
	 		 		if(validate_hex($input_value)) {
						$valid_input_value = $input_value;
					} else {
						$valid_input_value = $option['std'];
						add_settings_error(
	    				$option['id'], // setting title
		    				MP_SHORTNAME . '_color_hex_error', // error ID
	    				__('Please insert HEX value.','rfbwp'), // error message
		    				'error' // type of message
	    				);
					}
				} else {
					$valid_input_value = $option['std'];
				}
	   	 		set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	 	 	break;
	    	
	    	// checkbox validation
	    	case 'checkbox-ios':
	    	case 'checkbox':
	    
	    		// if it's not set, default to null!
	    		if($reset == "true"){
	    			if(isset($option['std'])) {
						$valid_input_value = $option['std'];
					} else {
						$valid_input_value = "";
					}
					set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
					break;
				}
	    		if (!isset($input_value)) {
	    			$input_value = null;
	    		}
	    		// Our checkbox value is either 0 or 1
	    		if($input_value == 1 || $input_value == 'on'){
	    			$valid_input_value = 1;
	    		} else {
	    			$valid_input_value = 0;
	    		}
	    		set_valid_input($type, $valid_input_value, $book_id, $option['id'], $page_id);
	   		break;
		}
	}	
	
	$_POST['delete'] = '';

	return $valid_input; // returns the valid input;
}

function set_valid_input($type, $value, $book_id, $id, $page_id){
	global $valid_input;

	if($type == 'books'){
		$valid_input['books'][$book_id][$id]  = $value;
	} elseif($type == 'pages') {
			$valid_input['books'][$book_id]['pages'][$page_id][$id]  = $value;
	}
}


/* Helper function for HEX validation */
function validate_hex($hex) {
	//echo $hex;
	$hex = trim($hex);
	// Strip recognized prefixes. 
	if (0 === strpos( $hex, '#')) {
		$hex = substr( $hex, 1 );
	} elseif ( 0 === strpos( $hex, '%23')) {
		$hex = substr($hex, 3);
	}
	//echo $hex;
	// Regex match.
	if (0 === preg_match('/^[0-9a-fA-F]{6}$/', $hex)) {
		return false;
	} else {
		return true;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Callback function for displaying admin messages
/*	@return calls mp_show_msg()
/*-----------------------------------------------------------------------------------*/

function mp_admin_msgs(){
	// check for settings page
	if(isset($_GET['page']))
		$mp_settings_pg = strpos($_GET['page'], MP_PAGE_BASENAME);
	else
		$mp_settings_pg = FALSE;	
	
	// collect setting error/notices
	$set_errors = get_settings_errors();
	
	// display admin message only for the admin to see, only on our settings page and only when setting errors/notices ocur
	if(current_user_can('manage_options') && $mp_settings_pg !== FALSE && !empty($set_errors)){
		// have the settings been updates succesfully
		if($set_errors[0]['code'] == 'settings_updated' && isset($_GET['settings-updated'])) {
			mp_show_msg("<p>".$set_errors[0]['message']."</p>", 'updated');
		} else { // have errors been found?
			// loop through the errors
			foreach($set_errors as $set_error) {
				// set the title attribute to match the error "setting title" - need this in js file
				mp_show_msg("<p class='setting-error-message' title='".$set_error['setting']."'>".$set_error['message']."</p>", "error");
				
			}
		}
	}
}

// admin hook for notices
add_action('admin_notices', 'mp_admin_msgs');


/*-----------------------------------------------------------------------------------*/
/*	This is Helper function which displayes admin messages
/*	@param (string) $message The echoed message
/*	@param (string) $msgclass The message class: info, error, succes ect.
/*	@return echoes the message
/*-----------------------------------------------------------------------------------*/

function mp_show_msg($message, $msgclass = 'info') {
	echo "<div id='message' class='$msgclass'>$message</div>";
}



add_action('wp_ajax_save_settings', 'rfbwp_save_settings');

function rfbwp_save_settings() {
	global $shortname;
	$option_name = 'rfbwp_options';
	$options_new = array();
	$array_names = array();
	
	$_POST['active-book'] = $_POST['activeID'];
	$_POST['delete-page'] = $_POST['pageID'];
	$data = $_POST['data'];
	
	$data_size = $_POST['dataSize'] * 2;
	$max_size = ini_get('max_input_vars') == '' ? 1000 : ini_get('max_input_vars');
	
	if($data_size < $max_size) {
		if($_POST['value'] != "")
			$_POST['mp-settings'] = $_POST['value'];
			
	    for($i = 4; $i < count($data); $i++) {
	    	// get the array names
	    	$array_names = array();
			$name = preg_split('/rfbwp_options/', $data[$i]['name']);
			if(isset($name[1]))
		    	$name = preg_split('/[\[\]]+/', $name[1]);
	    	
	    	// remove empty strings
	 		foreach($name as $na) {
	 			if($na != '') {
					array_push($array_names, $na);
				}
	 		}		
			 
			if(count($array_names) > 1 && !isset($options_new[$array_names[0]]))
	 			$options_new[$array_names[0]] = array();
				
	 		
	 		if(count($array_names) > 2 && !isset($options_new[$array_names[0]][$array_names[1]]))
	 			$options_new[$array_names[0]][$array_names[1]] = array();


	 		if(count($array_names) > 3 && !isset($options_new[$array_names[0]][$array_names[1]][$array_names[2]]))
				$options_new[$array_names[0]][$array_names[1]][$array_names[2]] = array();
			elseif(count($array_names) == 3)
	 			$options_new[$array_names[0]][$array_names[1]][$array_names[2]] = $data[$i]['value'];
	 			
	 		
			if(count($array_names) > 4 && !isset($options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]]))
				$options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]] = array();
	 			
			if(count($array_names) == 5)
	 			$options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]][$array_names[4]] = $data[$i]['value'];
	    }
	    
	    $data = $options_new;
	    
	    $max = count($data['books']);
	    for($i = $max - 1; $i >= 0; $i--) {
	    	if($data['books'][$i]['rfbwp_fb_name'] == '' && $data['books'][$i]['pages'] == '') {
	    		unset($data['books'][$i]);
	    	}
	    }

	    update_option($option_name, $data);
    }
    else {
    	echo 'mpc_data_size_exceeded';
    }
}

// delete book
add_action( 'wp_ajax_delete_book', 'rfbwp_delete_book' );

function rfbwp_delete_book() {
	global $shortname;
	$option_name = 'rfbwp_options';
	$options_new = array();
	$array_names = array();
	
	$_POST['mp-settings'] = 'delete';
	$data = $_POST['data'];
	$id = preg_split('/#/', $_POST['id']);
	$id = $id[1];
	$_POST['delete'] = $id;
	
	
	for($i = 4; $i < count($data); $i++) {
    	// get the array names
    	$array_names = array();
		$name = preg_split('/rfbwp_options/', $data[$i]['name']);
		if(isset($name[1]))
	    	$name = preg_split('/[\[\]]+/', $name[1]);
    	
    	// remove empty strings
 		foreach($name as $na) {
 			if($na != '')
				array_push($array_names, $na);				
 		}
 		
 		if(isset($array_names[1]) && $array_names[1] == $id && $array_names[0] == 'books') {
 			// do nothing we want to delete this book
 		} else {
	 		if(count($array_names) > 1 && !isset($options_new[$array_names[0]]))
 			$options_new[$array_names[0]] = array();
			
 		
	 		if(count($array_names) > 2 && !isset($options_new[$array_names[0]][$array_names[1]]))
	 			$options_new[$array_names[0]][$array_names[1]] = array();
	
	
	 		if(count($array_names) > 3 && !isset($options_new[$array_names[0]][$array_names[1]][$array_names[2]]))
				$options_new[$array_names[0]][$array_names[1]][$array_names[2]] = array();
			elseif(count($array_names) == 3)
	 			$options_new[$array_names[0]][$array_names[1]][$array_names[2]] = $data[$i]['value'];
	 			
	 		
			if(count($array_names) > 4 && !isset($options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]]))
				$options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]] = array();
			elseif(count($array_names) == 4)
	 			$options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]] = $data[$i]['value'];
	 			
	 		if(count($array_names) > 5 && !isset($options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]][$array_names[4]]))
				$options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]][$array_names[4]] = array();
			elseif(count($array_names) == 5)
	 			$options_new[$array_names[0]][$array_names[1]][$array_names[2]][$array_names[3]][$array_names[4]] = $data[$i]['value'];
 		}	
    }
    
    $data = $options_new;
	
    update_option($option_name, $data);
 
	die();
}

add_action('wp_ajax_set_active_book', 'rfbwp_set_active_book');

function rfbwp_set_active_book() {
	
	$_POST['active-book'] = $_POST['activeID'];
	
	die();
}


?>