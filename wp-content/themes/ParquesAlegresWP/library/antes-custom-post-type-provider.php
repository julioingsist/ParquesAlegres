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
function custom_post_provider() {
  // creating (registering) the custom type
  register_post_type( 'provider', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('Providers', 'ParquesAlegres'), /* This is the Title of the Group */
      'singular_name' => __('Provider', 'ParquesAlegres'), /* This is the individual type */
      'all_items' => __('All Providers', 'ParquesAlegres'), /* the all items menu item */
      'add_new' => __('Add New Provider', 'ParquesAlegres'), /* The add new menu item */
      'add_new_item' => __('Add New Provider', 'ParquesAlegres'), /* Add New Display Title */
      'edit' => __( 'Edit', 'ParquesAlegres' ), /* Edit Dialog */
      'edit_item' => __('Edit Provider', 'ParquesAlegres'), /* Edit Display Title */
      'new_item' => __('New Provider', 'ParquesAlegres'), /* New Display Title */
      'view_item' => __('View Providers', 'ParquesAlegres'), /* View Display Title */
      'search_items' => __('Search Provider', 'ParquesAlegres'), /* Search Custom Type Title */
      'not_found' =>  __('Nothing found in the Database.', 'ParquesAlegres'), /* This displays if there are no entries yet */
      'not_found_in_trash' => __('Nothing found in Trash', 'ParquesAlegres'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'description' => __( 'This is the providers registry.', 'ParquesAlegres' ), /* Custom Type Description */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 6, /* this is what order you want it to appear in on the left hand side menu */
      'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
      'rewrite' => array( 'slug' => __( 'provider' , 'ParquesAlegres' ), 'with_front' => false ), /* you can specify its url slug */
      'has_archive' => __( 'providers' , 'ParquesAlegres' ), /* you can rename the slug here */
      'capability_type' => 'post',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'author', 'thumbnail')
    ) /* end of options */
  ); /* end of register post type */

  /* this adds your post categories to your custom post type */
  // register_taxonomy_for_object_type('category', 'provider');
  /* this adds your post tags to your custom post type */
  // register_taxonomy_for_object_type('post_tag', 'provider');

}

  // adding the function to the Wordpress init
  add_action( 'init', 'custom_post_provider');

  /*
  for more information on taxonomies, go here:
  http://codex.wordpress.org/Function_Reference/register_taxonomy
  */

  // now let's add custom categories (these act like categories)
    register_taxonomy( 'custom_cat',
      array('provider'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
      array('hierarchical' => true,     /* if this is true, it acts like categories */
        'labels' => array(
          'name' => __( 'Categorias', 'ParquesAlegres' ), /* name of the Provider taxonomy */
          'singular_name' => __( 'Categoria', 'ParquesAlegres' ), /* single taxonomy name */
          'search_items' =>  __( 'Buscar Categorias', 'ParquesAlegres' ), /* search title for taxomony */
          'all_items' => __( 'Todas las Categorias', 'ParquesAlegres' ), /* all title for taxonomies */
          'parent_item' => __( 'Parent Provider Category', 'ParquesAlegres' ), /* parent title for taxonomy */
          'parent_item_colon' => __( 'Parent Provider Category:', 'ParquesAlegres' ), /* parent taxonomy title */
          'edit_item' => __( 'Editar Categoria', 'ParquesAlegres' ), /* edit Provider taxonomy title */
          'update_item' => __( 'Actualizar Categoría', 'ParquesAlegres' ), /* update title for taxonomy */
          'add_new_item' => __( 'Agregar Nueva Categoría', 'ParquesAlegres' ), /* add new title for taxonomy */
          'new_item_name' => __( 'Nombre de nueva Categoría', 'ParquesAlegres' ) /* name title for taxonomy */
        ),
        'show_admin_column' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'type' ),
      )
    );

  // // now let's add custom tags (these act like categories)
  //   register_taxonomy( 'custom_tag',
  //     array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
  //     array('hierarchical' => false,    /* if this is false, it acts like tags */
  //       'labels' => array(
  //         'name' => __( 'Custom Tags', 'ParquesAlegres' ), /* name of the custom taxonomy */
  //         'singular_name' => __( 'Custom Tag', 'ParquesAlegres' ), /* single taxonomy name */
  //         'search_items' =>  __( 'Search Custom Tags', 'ParquesAlegres' ), /* search title for taxomony */
  //         'all_items' => __( 'All Custom Tags', 'ParquesAlegres' ), /* all title for taxonomies */
  //         'parent_item' => __( 'Parent Custom Tag', 'ParquesAlegres' ), /* parent title for taxonomy */
  //         'parent_item_colon' => __( 'Parent Custom Tag:', 'ParquesAlegres' ), /* parent taxonomy title */
  //         'edit_item' => __( 'Edit Custom Tag', 'ParquesAlegres' ), /* edit custom taxonomy title */
  //         'update_item' => __( 'Update Custom Tag', 'ParquesAlegres' ), /* update title for taxonomy */
  //         'add_new_item' => __( 'Add New Custom Tag', 'ParquesAlegres' ), /* add new title for taxonomy */
  //         'new_item_name' => __( 'New Custom Tag Name', 'ParquesAlegres' ) /* name title for taxonomy */
  //       ),
  //       'show_admin_column' => true,
  //       'show_ui' => true,
  //       'query_var' => true,
  //     )
  //   );

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

    add_filter( 'cmb_meta_boxes', 'cmb_provider_metaboxes' );
    /**
     * Define the metabox and field configurations.
     *
     * @param  array $meta_boxes
     * @return array
     */
    function cmb_provider_metaboxes( array $meta_boxes ) {

      // Start with an underscore to hide fields from custom fields list
      $prefix = '_provider_';

      $meta_boxes['provider_metabox'] = array(
        'id'         => 'provider_metabox',
        'title'      => __( 'More Info', 'ParquesAlegres' ),
        'pages'      => array( 'provider', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        'fields'     => array(
          array(
            'name' => __( 'Business Role:', 'ParquesAlegres' ),
            'id'   => $prefix . 'business_role',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Description:', 'ParquesAlegres' ),
            'id'   => $prefix . 'description',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Address:', 'ParquesAlegres' ),
            'id'   => $prefix . 'address',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Phone:', 'ParquesAlegres' ),
            'id'   => $prefix . 'phone',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'E-mail:', 'ParquesAlegres' ),
            'id'   => $prefix . 'email',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Contact:', 'ParquesAlegres' ),
            'id'   => $prefix . 'contact',
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

    add_action( 'init', 'cmb_initialize_providers_meta_boxes', 9999 );
    /**
     * Initialize the metabox class.
     */
    function cmb_initialize_providers_meta_boxes() {

      if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once 'init.php';

    }

?>