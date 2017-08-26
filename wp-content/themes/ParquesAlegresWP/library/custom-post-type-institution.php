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
function custom_post_institution() {
	// creating (registering) the custom type
	register_post_type( 'institution', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Institutions', 'ParquesAlegres'), /* This is the Title of the Group */
			'singular_name' => __('Institution', 'ParquesAlegres'), /* This is the individual type */
			'all_items' => __('All Institutions', 'ParquesAlegres'), /* the all items menu item */
			'add_new' => __('Add New Institution', 'ParquesAlegres'), /* The add new menu item */
			'add_new_item' => __('Add New Institution', 'ParquesAlegres'), /* Add New Display Title */
			'edit' => __( 'Edit', 'ParquesAlegres' ), /* Edit Dialog */
			'edit_item' => __('Edit Institution', 'ParquesAlegres'), /* Edit Display Title */
			'new_item' => __('New Institution', 'ParquesAlegres'), /* New Display Title */
			'view_item' => __('View Institutions', 'ParquesAlegres'), /* View Display Title */
			'search_items' => __('Search Institution', 'ParquesAlegres'), /* Search Custom Type Title */
			'not_found' =>  __('Nothing found in the Database.', 'ParquesAlegres'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'ParquesAlegres'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the Institution register', 'ParquesAlegres' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => __( 'institution', 'ParquesAlegres' ), 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => __( 'institutions', 'ParquesAlegres' ), /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_institution');

  /**
   * Include and setup custom metaboxes and fields.
   *
   * @category YourThemeOrPlugin
   * @package  Metaboxes
   * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
   * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
   */

  add_filter( 'cmb_meta_boxes', 'cmb_institution_metaboxes' );
  /**
   * Define the metabox and field configurations.
   *
   * @param  array $meta_boxes
   * @return array
   */
  function cmb_institution_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_institution_';

    $meta_boxes['institution_metabox'] = array(
      'id'         => 'institution_metabox',
      'title'      => __( 'More Info', 'ParquesAlegres' ),
      'pages'      => array( 'institution', ), // Post type
      'context'    => 'normal',
      'priority'   => 'high',
      'show_names' => true, // Show field names on the left
      // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
      'fields'     => array(
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

  add_action( 'init', 'cmb_initialize_institution_meta_boxes', 9999 );
  /**
   * Initialize the metabox class.
   */
  function cmb_initialize_institution_meta_boxes() {

    if ( ! class_exists( 'cmb_Meta_Box' ) )
      require_once 'init.php';

  }

?>
