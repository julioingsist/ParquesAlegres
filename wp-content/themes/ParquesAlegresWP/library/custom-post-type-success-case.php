<?php
/* joints Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a separate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
function custom_success_case() {
	// creating (registering) the custom type
	register_post_type( 'success_case', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Success Cases', 'ParquesAlegres'), /* This is the Title of the Group */
			'singular_name' => __('Success Case', 'ParquesAlegres'), /* This is the individual type */
			'all_items' => __('All Success Cases', 'ParquesAlegres'), /* the all items menu item */
			'add_new' => __('Add New', 'ParquesAlegres'), /* The add new menu item */
			'add_new_item' => __('Add New Success Case', 'ParquesAlegres'), /* Add New Display Title */
			'edit' => __( 'Edit', 'ParquesAlegres' ), /* Edit Dialog */
			'edit_item' => __('Edit Success Case', 'ParquesAlegres'), /* Edit Display Title */
			'new_item' => __('New Success Case', 'ParquesAlegres'), /* New Display Title */
			'view_item' => __('View Success Case', 'ParquesAlegres'), /* View Display Title */
			'search_items' => __('Search Success Case', 'ParquesAlegres'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'ParquesAlegres'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'ParquesAlegres'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the success cases registry', 'ParquesAlegres' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => __( 'case', 'ParquesAlegres' ), 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => __( 'cases', 'ParquesAlegres' ), /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions')
	 	) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'success_case');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'success_case');

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_success_case');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// // now let's add custom categories (these act like categories)
 //    register_taxonomy( 'custom_cat',
 //    	array('success_case'), /* if you change the name of register_post_type( 'success_case', then you have to change this */
 //    	array('hierarchical' => true,     /* if this is true, it acts like categories */
 //    		'labels' => array(
 //    			'name' => __( 'Case Categories', 'ParquesAlegres' ), /* name of the Case taxonomy */
 //    			'singular_name' => __( 'Case Category', 'ParquesAlegres' ), /* single taxonomy name */
 //    			'search_items' =>  __( 'Search Case Categories', 'ParquesAlegres' ), /* search title for taxomony */
 //    			'all_items' => __( 'All Case Categories', 'ParquesAlegres' ), /* all title for taxonomies */
 //    			'parent_item' => __( 'Parent Case Category', 'ParquesAlegres' ), /* parent title for taxonomy */
 //    			'parent_item_colon' => __( 'Parent Case Category:', 'ParquesAlegres' ), /* parent taxonomy title */
 //    			'edit_item' => __( 'Edit Case Category', 'ParquesAlegres' ), /* edit Case taxonomy title */
 //    			'update_item' => __( 'Update Case Category', 'ParquesAlegres' ), /* update title for taxonomy */
 //    			'add_new_item' => __( 'Add New Case Category', 'ParquesAlegres' ), /* add new title for taxonomy */
 //    			'new_item_name' => __( 'New Case Category Name', 'ParquesAlegres' ) /* name title for taxonomy */
 //    		),
 //    		'show_admin_column' => true,
 //    		'show_ui' => true,
 //    		'query_var' => true,
 //    		'rewrite' => array( 'slug' => 'category' ),
 //    	)
 //    );

	// // now let's add custom tags (these act like categories)
 //    register_taxonomy( 'custom_tag',
 //    	array('success_case'), /* if you change the name of register_post_type( 'success_case', then you have to change this */
 //    	array('hierarchical' => false,    /* if this is false, it acts like tags */
 //    		'labels' => array(
 //    			'name' => __( 'Case Tags', 'ParquesAlegres' ), /* name of the Case taxonomy */
 //    			'singular_name' => __( 'Case Tag', 'ParquesAlegres' ), /* single taxonomy name */
 //    			'search_items' =>  __( 'Search Case Tags', 'ParquesAlegres' ), /* search title for taxomony */
 //    			'all_items' => __( 'All Case Tags', 'ParquesAlegres' ), /* all title for taxonomies */
 //    			'parent_item' => __( 'Parent Case Tag', 'ParquesAlegres' ), /* parent title for taxonomy */
 //    			'parent_item_colon' => __( 'Parent Case Tag:', 'ParquesAlegres' ), /* parent taxonomy title */
 //    			'edit_item' => __( 'Edit Case Tag', 'ParquesAlegres' ), /* edit Case taxonomy title */
 //    			'update_item' => __( 'Update Case Tag', 'ParquesAlegres' ), /* update title for taxonomy */
 //    			'add_new_item' => __( 'Add New Case Tag', 'ParquesAlegres' ), /* add new title for taxonomy */
 //    			'new_item_name' => __( 'New Case Tag Name', 'ParquesAlegres' ) /* name title for taxonomy */
 //    		),
 //    		'show_admin_column' => true,
 //    		'show_ui' => true,
 //    		'query_var' => true,
 //    	)
 //    );

    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */

    /**
     * Include and setup custom metaboxes and fields.
     *
     * @category YourThemeOrPlugin
     * @package  Metaboxes
     * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
     * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
     */

    add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
    /**
     * Define the metabox and field configurations.
     *
     * @param  array $meta_boxes
     * @return array
     */
    function cmb_sample_metaboxes( array $meta_boxes ) {

      // Start with an underscore to hide fields from custom fields list
      $prefix = '_cmb_';

      $meta_boxes['success_case_metabox'] = array(
        'id'         => 'success_case_metabox',
        'title'      => __( 'More Info', 'ParquesAlegres' ),
        'pages'      => array( 'success_case', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
       
        'fields'     => array(
          array(
            'name' => __( 'Event Date', 'ParquesAlegres' ),
            'id'   => $prefix . 'event_date',
            'type' => 'text_date',
          ),
          array(
            'name' => __( 'Event Type', 'ParquesAlegres' ),
            'id'   => $prefix . 'event_type',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'People involved:', 'ParquesAlegres' ),
            'id'   => $prefix . 'participants',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Investment:', 'ParquesAlegres' ),
            'id'   => $prefix . 'investment',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Impact and number of attendees:', 'ParquesAlegres' ),
            'id'   => $prefix . 'impact',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Benefits obtained:', 'ParquesAlegres' ),
            'id'   => $prefix . 'benefits',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Key to Success:', 'ParquesAlegres' ),
            'id'   => $prefix . 'success_key',
            'type' => 'textarea_small',
          ),
          array(
              'name' => __( 'Gallery Files:', 'ParquesAlegres' ),
              'desc' => __ ( 'Upload an image or enter an URL.', 'ParquesAlegres' ),
              'id' => $prefix . 'gallery',
              'type' => 'file_list',
              'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
          ),
        ),
      );


      // Add other metaboxes as needed

      return $meta_boxes;
    }

    add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
    /**
     * Initialize the metabox class.
     */
    function cmb_initialize_cmb_meta_boxes() {

      if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once 'init.php';

    }

?>