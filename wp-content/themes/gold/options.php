<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {
	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 * If you are making your theme translatable, you should replace 'Gold'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {
	// Test data
	$rss=get_bloginfo('rss2_url');
	$test_array = array(
		'one' => __('One', 'Gold'),
		'two' => __('Two', 'Gold'),
		'three' => __('Three', 'Gold'),
		'four' => __('Four', 'Gold'),
		'five' => __('Five', 'Gold')
	);
	$theme_array = array(
		'Default' => __('Default', 'Gold'),
		'Basic' => __('Basic', 'Gold'),
		'Dark Blue' => __('Dark Blue', 'Gold'),
		'Hibiscus' => __('Hibiscus', 'Gold'),
		);

    $cat_array=null;
   $args = array(
	'type'                     => 'post',
	'hide_empty'               => 0,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false 

); 

    $categories = get_categories( $args );
   	$cat_array['Default']=__('Deafault','Gold');
	foreach ($categories as $value) {
		$cat_array[$value->name]=$value->name;	
	}

	$menu_array=array(
		'Enable Top Menu'=>__('Enable Top Menu Here', 'Gold'),
		'Disable Top Menu'=>__('Disable Top Menu Here', 'Gold'),
		);
	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'Gold'),
		'two' => __('Pancake', 'Gold'),
		'three' => __('Omelette', 'Gold'),
		'four' => __('Crepe', 'Gold'),
		'five' => __('Waffle', 'Gold')
	);
	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}
	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';
	$options = array();
	/*****************Theme Option For Custom Theme*****************/
		$options[] = array(
			'name' => __('Color Themes', 'Gold'),
			'type' => 'heading');
		$options[] = array(
			'name'=>__('Select Default Theme Here','Gold'),
			'desc' => __('Radio select with default.', 'Gold'),
			'id' => 'default_theme',
			'std' => 'Default',
			'type' => 'radio',
			'options' => $theme_array);
	/*****************Theme option for Custom Theme *****************/
	/*****************Theme option for Header *****************/	
		$options[] = array(
			'name' => __('Header & Footer', 'Gold'),
			'type' => 'heading');
		$options[] = array(
			'name'=>__('Header','Gold'),
			'id' => 'hhh',
			'type' => '',
			);
		$options[] = array(
			'name' => __('Site Logo', 'Gold'),
			'desc' => __('This creates a full size uploader that previews the image.', 'Gold'),
			'id' => 'logo',
			'type' => 'upload');
		$options[] = array(
			'name'=>__('Footer','Gold'),
			'id' => 'fff',
			'type' => '',
			);
		$options[] = array(
			'name' => __('Footer Credit Text', 'Gold'),
			'desc' => __('Add Here Your Footer Credit text', 'Gold'),
			'id' => 'right_reserved',
			'type' => 'editor');
	/*****************Theme option for Header *****************/
	/*****************Theme option for Front Page Featured Columns *****************/	
		$options[] = array(
			'name' => __('Front Page', 'Gold'),
			'type' => 'heading');
		$options[] = array(
			'name'=>__('Featured Section','Gold'),
			'id' => 'fcl',
			'type' => '',
			);
		$options[] = array(
			'name' =>__('Add video or Image','Gold'),
			'desc' => __('Add Video URL Here.', 'Gold'),
			'id' => 'video_hidden',
			'type' => 'checkbox');
		$options[] = array(
			'name' => __('Video ID (See image below)', 'Gold'),
			'id' => 'show_video_hidden',
			'std' => 'Add Your Video Url here.',
			'class' => 'hidden',
			'type' => 'text');
		$options[] = array(
			'desc' => __('Select Image Here', 'Gold'),
			'id' => 'image_hidden',
			'type' => 'checkbox');
		$options[] = array(
			'name' => __('Image Input', 'Gold'),
			'id' => 'show_image_hidden',
			'std' => 'Add Your Image Here.',
			'class' => 'hidden',
			'type' => 'upload');
		$options[] = array(
			'name'=>__('Featured Column On The Right','Gold'),
			'id' => 'fcr',
			'type' => '',
			);
		$options[] = array(
			'name' => __('Front Page Featured Heading', 'Gold'),
			'desc' => __('A text input field for feature heading.', 'Gold'),
			'id' => 'featured_heading',
			'type' => 'text');
		$options[] = array(
			'name' => __('Front Page Featured Sub Heading', 'Gold'),
			'desc' => __('A text input field for feature sub heading.', 'Gold'),
			'id' => 'featured_sub_heading',
			'type' => 'text');
		$options[] = array(
			'name' => __('Front Page Featured Text', 'Gold'),
			'desc' => __('A text input field for feature text.', 'Gold'),
			'id' => 'featured_text',
			'type' => 'textarea');
		$options[] = array(
			'name' =>__('Featured Section Button(s)','Gold'),
			'desc'=>__('Please Select Button-One if you want to use a model(Popover) triggered by this button.Gold theme provide the option of using a second button in the featured content,which you can link any where.To do so,select the second option (button-one and button-two).','Gold'),
			'id' => 'butut',
			'type' => '',
			);
		$options[] = array(
			'desc' => __('Button-one.', 'Gold'),
			'id' => 'single_btn',
			'type' =>'checkbox');
		
		$options[]=array(
			'name'=>__('Button Text','Gold'),
			'desc'=>__('A text input field for button text','Gold'),
			'id'=>'btntxt',
			'std'=>'Default Value',
			'class' => 'hidden',
			'type'=>'text'
			);
		$options[]=array(
			'name'=>__('Modal Title','Gold'),
			'desc'=>__('A text input field for modal title'),
			'id'=>'modal-title',
			'std'=>'Default Value',
			'class' => 'hidden',
			'type'=>'text'
			);
		$options[]=array(
			'name'=>__('Modal Content','Gold'),
			'desc'=>__('A editor field for modal content'),
			'id'=>'modal-content',
			'std'=>'Default Value',
			'class' => 'hidden',
			'type'=>'editor'
			);
		$options[] = array(
			'desc' => __("Button-one and Button-two", 'Gold'),
			'id' => 'two_btn',
			'type' => 'checkbox');
		$options[]=array(
			'name'=>__('Button-one Text','Gold'),
			'desc'=>__('A text input field for button text'),
			'id'=>'btntxt1',
			'std'=>'Default Value',
			'class' => 'hidden',
			'type'=>'text'
			);
		$options[]=array(
			'name'=>__('Modal Title','Gold'),
			'desc'=>__('A text input field for modal title'),
			'id'=>'modal-title1',
			'std'=>'Default Value',
			'class' => 'hidden',
			'type'=>'text'
			);
		$options[]=array(
			'name'=>__('Modal Content','Gold'),
			'desc'=>__('A editor field for modal content'),
			'id'=>'modal-content1',
			'std'=>'Default Value',
			'class' => 'hidden',
			'type'=>'editor'
			);
		$options[]=array(
			'name'=>__('Button-two Text','Gold'),
			'desc'=>__('A text input field for  button text'),
			'id'=>'btntxt2',
			'std'=>'Default Value',
			'class' => 'hidden',
			'type'=>'text'
			);
		$options[]=array(
			'name'=>__('Button-two Link','Gold'),
			'desc'=>__('A text input field for button link'),
			'id'=>'btnlink2',
			'std'=>'#',
			'class' => 'hidden',
			'type'=>'text'
			);
		$wp_editor_settings = array(
			'wpautop' => true, // Default
			'textarea_rows' => 5,
			'tinymce' => array( 'plugins' => 'wordpress' )
		);
		$options[]=array(
			'name'=>__('Featured Boxes (The three boxes on the front page.)','Gold'),
			'id' => "boxxxx",
			'type' => ''
			);
		$options[]=array(
			'name'=>__('Box-1','Gold'),
			'desc' => __('Box-1 - Use Your Own HTML in This Box.', 'Gold'),
			'id' => "box-1",
			'type' => 'checkbox'
			);
		$options[]=array(
			'name' => __('Box-1 Title', 'Gold'),
			'id' => "b1_title",
			'std' => 'Default Value',
			'type' => 'text',
			'class'=>'hidden'	
			);
		$options[] = array(
			'name' => __('Add Your Front Box Body Content Here', 'Gold'),
			'id' => 'b1_editor',
			'type' => 'editor',
			'class'=>'hidden',
			'settings' => $wp_editor_settings );
		$options[]=array(
			'desc' => __('Check Here to use default image gallery', 'Gold'),
			'id' => "d-box-1",
			'std'=>true,
			'type' => 'checkbox'
			);
		$options[]=array(
			'name'=>__('Box-2','Gold'),
			'desc' => __('Box-2- Use Your Own HTML in This Box.', 'Gold'),
			'id' => "box-2",
			'type' => 'checkbox',
			);
		$options[]=array(
			'name' => __('Box-2 Title', 'Gold'),
			'id' => "b2_title",
			'std' => 'Default Value',
			'type' => 'text',
			'class'=>'hidden'	
			);
		$options[] = array(
			'name' => __('Add Your Front Box Body Content Here', 'Gold'),
			'id' => 'b2_editor',
			'type' => 'editor',
			'class'=>'hidden',
			'settings' => $wp_editor_settings );
		$options[]=array(
			'desc' => __('Check Here to use default FAQs Box With Collapse Panel', 'Gold'),
			'id' => "d-box-2",
			'std'=>true,
			'type' => 'checkbox'
		);
		$options[] = array(
			'name' => __('Collapsible Panel-1 Title', 'Gold'),
			'desc' => __('The title for collapsible panel-1.', 'Gold'),
			'id' => 'collapse_title1',
			'std' => 'Default Value',
			'class'=>'hidden',
			'type' => 'text');
		$options[] = array(
			'name' => __('Collapsible Panel-1 HTML', 'Gold'),
			'desc' => __('Place your HTML to use in collapsible panel-1.', 'Gold'),
			'id' => 'example_collapse1',
			'std' => 'Default Value',
			'class'=>'hidden',
			'type' => 'textarea');
		$options[] = array(
			'name' => __('Collapsible Panel-2 title ', 'Gold'),
			'desc' => __('The title for collapsible panel-2.', 'Gold'),
			'id' => 'collapse_title2',
			'std' => 'Default Value',
			'class'=>'hidden',
			'type' => 'text');
		$options[] = array(
			'name' => __('Collapsible Panel-2 HTML', 'Gold'),
			'desc' => __('Place your HTML to use in collapsible panel-2.', 'Gold'),
			'id' => 'example_collapse2',
			'std' => 'Default Value',
			'class'=>'hidden',
			'type' => 'textarea');
		$options[] = array(
			'name' => __('Collapsible Panel-3 title', 'Gold'),
			'desc' => __('The title for collapsible panel-3.', 'Gold'),
			'id' => 'collapse_title3',
			'std' => 'Default Value',
			'class'=>'hidden',
			'type' => 'text');
		$options[] = array(
			'name' => __('Collapsible Panel-3 HTML', 'Gold'),
			'desc' => __('Place your HTML to use in collapsible panel-3.', 'Gold'),
			'id' => 'example_collapse3',
			'std' => 'Default Value',
			'class'=>'hidden',
			'type' => 'textarea');
		$options[]=array(
			'name'=>__('Box-3','Gold'),
			'desc' => __('Box-3- Use Your Own HTML in This Box.', 'Gold'),
			'id' => "box-3",
			'type' => 'checkbox',
			);
		$options[]=array(
			'name' => __('Box-3 Title', 'Gold'),
			'id' => "b3_title",
			'std' => 'Default Value',
			'type' => 'text',
			'class'=>'hidden'	
			);
		$options[] = array(
			'name' => __('Add Your Front Box Body Content Here', 'Gold'),
			'id' => 'b3_editor',
			'type' => 'editor',
			'class'=>'hidden',
			'settings' => $wp_editor_settings );
		$options[]=array(
			'desc' => __('Check Here to use default Login Box', 'Gold'),
			'id' => "d-box-3",
			'std'=>true,
			'type' => 'checkbox'
			);
	/*****************Theme option Front page featured columns*****************/	
	/*****************Theme option for Social Icons*****************/
		$options[] = array(
			'name' => __('Social', 'Gold'),
			'type' => 'heading' );
		$options[]=array(
			'name'=>__('Enable or Disable the social icons.','Gold'),
			'desc' => __('Enable Social icons.', 'Gold'),
			'id' => "enable",
			'type' => 'checkbox'
			);
		$options[]=array(
			'name' => __('RSS', 'Gold'),
			'desc' => __('Enter your rss url Include http:// at the front of the url.', 'Gold'),
			'id' => "rss",
			'std' => $rss,
			'type' => 'text',
			'class'=>'hidden'	
			);		
		$options[]=array(
			'name' => __('Flicker', 'Gold'),
			'desc' => __('Enter your flicker url Include http:// at the front of the url.', 'Gold'),
			'id' => "flicker",
			'std' => '',
			'type' => 'text',	
			'class'=>'hidden'
			);
		$options[]=array(
			'name' => __('YouTube', 'Gold'),
			'desc' => __('Enter your youtube url Include http:// at the front of the url.', 'Gold'),
			'id' => "youtube",
			'std' => '',
			'type' => 'text',
			'class'=>'hidden'	
			);
		$options[]=array(
			'name' => __('Twitter', 'Gold'),
			'desc' => __('Enter your twitter url Include http:// at the front of the url.', 'Gold'),
			'id' => "twitter",
			'std' => '',
			'type' => 'text',
			'class'=>'hidden'	
			);
		$options[]=array(
			'name' => __('Facebook', 'Gold'),
			'desc' => __('Enter your facebook url Include http:// at the front of the url.', 'Gold'),
			'id' => "fb",
			'std' => '',
			'type' => 'text',
			'class'=>'hidden'	
			);
	/*****************Theme option for Social Icons*****************/	
	/*****************Theme Option For About Page*****************/
		$options[] = array(
			'name' => __('About Page', 'Gold'),
			'type' => 'heading'
			);

		$options[] = array(
			'name' => __('Create a page and Choose the about template before using these options', 'Gold'),
			'id'   =>'apg',
			'type' => ''
			);

		$options[]=array(
			'name' => __('Page Title', 'Gold'),
			'desc'=>__('This is the text field to add title of about page.'),
			'id'=>'about-title',
			'type'=>'text'
			);

		$options[]=array(
			'name' => __('Page Sub Title', 'Gold'),
			'desc'=>__('This is the text field to add sub title of about page.'),
			'id'=>'about-sub-title',
			'type'=>'text'
			);


		$options[]=array(
			'name' => __('About Page Carousel Image 1 ', 'Gold'),
			'desc'=>__('This is the image upload field to add carousel image.'),
			'id'=>'ci1',
			'type'=>'upload'
			);

		$options[]=array(
			'name' => __('About Page Carousel Image 2 ', 'Gold'),
			'desc'=>__('This is the image upload field to add carousel image.'),
			'id'=>'ci2',
			'type'=>'upload'
			);

		$options[]=array(
			'name' => __('About Page Carousel Image 3', 'Gold'),
			'desc'=>__('This is the image upload field to add carousel image.'),
			'id'=>'ci3',
			'type'=>'upload'
			);

		$options[]=array(
			'name' => __('About Page Carousel Image 4 ', 'Gold'),
			'desc'=>__('This is the image upload field to add carousel image.'),
			'id'=>'ci4',
			'type'=>'upload'
			);

		$options[]=array(
			'name' => __('About Page Carousel Image 5 ', 'Gold'),
			'desc'=>__('This is the image upload field to add carousel image.'),
			'id'=>'ci5',
			'type'=>'upload'
			);

		$options[]=array(
			'name' => __('About Page Tab-1 Image ', 'Gold'),
			'desc'=>__('This is the image upload field to add image at about page what we do tab.'),
			'id'=>'wwdi',
			'type'=>'upload'
			);

		$options[]=array(
			'name' => __('About Page Tab-1 Text', 'Gold'),
			'desc'=>__('This is the text area field to add text at about page What We Do Tab.'),
			'id'=>'wwdt',
			'type'=>'textarea'
			);

		$options[]=array(
			'name' => __('About Page Tab-2 Text', 'Gold'),
			'desc'=>__('This is the text area field to add text at about page who we are tab.'),
			'id'=>'wwrt',
			'type'=>'textarea'
			);

	/*****************Theme Option For About Page*****************/

	/*****************Theme Option For Contact Page*****************/
		$options[] = array(
			'name' => __('Contact Page', 'Gold'),
			'type' => 'heading'
			);

		$options[] = array(
			'name' => __('Create a page and Choose the contact template before using these options', 'Gold'),
			'id'   =>'cpg',
			'type' => ''
			);

		$options[]=array(
			'name' => __('Contact Page Header Image', 'Gold'),
			'desc'=>__('This is the image upload field to add image in header section of contact page.', 'Gold'),
			'id'=>'cimage',
			'type'=>'upload'
			);

		$options[]=array(
			'name' => __('Address', 'Gold'),
			'id'=>'add',
			'type'=>''
			);

		$options[]=array(
			'name' => __('Company Name', 'Gold'),
			'desc'=>__('This is the text field to add company name.'),
			'id'=>'cmp',
			'type'=>'text'
			);

		$options[]=array(
			'name' => __('Street', 'Gold'),
			'desc'=>__('This is the text field to add street.'),
			'id'=>'street',
			'type'=>'text'
			);

		$options[]=array(
			'name' => __('City', 'Gold'),
			'desc'=>__('This is the text field to add city.'),
			'id'=>'city',
			'type'=>'text'
			);

		$options[]=array(
			'name' => __('Contact No.', 'Gold'),
			'desc'=>__('This is the text field to add contact no.'),
			'id'=>'phno',
			'type'=>'text'
			);

		$options[]=array(
			'name' => __('Your Name', 'Gold'),
			'desc'=>__('This is the text field to add name.'),
			'id'=>'name',
			'type'=>'text'
			);

		$options[]=array(
			'name' => __('Email Id', 'Gold'),
			'desc'=>__('This is the text field to add email id.'),
			'id'=>'eid',
			'type'=>'text'
			);

		$options[]=array(
			'name' => __('Working Hours', 'Gold'),
			'id'=>'wh',
			'type'=>''
			);

		$options[]=array(
			'name' => __('Working Hours For Monday to Friday', 'Gold'),
			'desc'=>__('This is the text field to add workinghours.'),
			'id'=>'wh1',
			'type'=>'text'
			);

		$options[]=array(
			'name' => __('Working Hours For Saturday', 'Gold'),
			'desc'=>__('This is the text field to add workinghours.'),
			'id'=>'wh2',
			'type'=>'text'
			);
		
	/*****************Theme Option For Contact Page*****************/
	

	/*****************Theme Option For Your Categories*****************/
		$options[] = array(
			'name' => __('Gallery', 'Gold'),
			'type' => 'heading'
			);

		$options[] = array(
			'name' => __('Select Your Category For Gallery.', 'Gold'),
			'desc'=>__('This category will be used to display the featured images for the gallery section.', 'Gold'),
			'id'   =>'ycategory',
			'type' => 'select',
			'options'=>$cat_array,
		);

	/*****************End Of Theme Option For Your Categories*****************/
	return $options;
}