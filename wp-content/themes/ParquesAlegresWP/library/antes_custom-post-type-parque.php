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
//function custom_post_parque() {
	// creating (registering) the custom type
//	register_post_type( 'parque', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
//		array('labels' => array(
//			'name' => __('Parques', 'ParquesAlegres'), /* This is the Title of the Group */
//			'singular_name' => __('Parque', 'ParquesAlegres'), /* This is the individual type */
//			'all_items' => __('All Parques', 'ParquesAlegres'), /* the all items menu item */
//			'add_new' => __('Add New', 'ParquesAlegres'), /* The add new menu item */
//			'add_new_item' => __('Add New Parque', 'ParquesAlegres'), /* Add New Display Title */
//			'edit' => __( 'Edit', 'ParquesAlegres' ), /* Edit Dialog */
//			'edit_item' => __('Edit Parque', 'ParquesAlegres'), /* Edit Display Title */
//			'new_item' => __('New Parque', 'ParquesAlegres'), /* New Display Title */
//			'view_item' => __('View Parque', 'ParquesAlegres'), /* View Display Title */
//			'search_items' => __('Search Parque', 'ParquesAlegres'), /* Search Custom Type Title */
//			'not_found' =>  __('Nothing found in the Database.', 'ParquesAlegres'), /* This displays if there are no entries yet */
//			'not_found_in_trash' => __('Nothing found in Trash', 'ParquesAlegres'), /* This displays if there is nothing in the trash */
//			'parent_item_colon' => ''
//			), /* end of arrays */
//			'description' => __( 'This is the parques registry', 'ParquesAlegres' ), /* Custom Type Description */
//			'public' => true,
//			'publicly_queryable' => true,
//			'exclude_from_search' => false,
//			'show_ui' => true,
//			'query_var' => true,
//			'menu_position' => 5, /* this is what order you want it to appear in on the left hand side menu */
//			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
//			'rewrite'	=> array( 'slug' => __( 'parque', 'ParquesAlegres' ), 'with_front' => false ), /* you can specify its url slug */
//			'has_archive' => __( 'parques', 'ParquesAlegres' ), /* you can rename the slug here */
//			'capability_type' => 'post',
//			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
//			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions')
//	 	) /* end of options */
//	); /* end of register post type */

	/* this adds your post categories to your custom post type */
//	register_taxonomy_for_object_type('category', 'parque');
	/* this adds your post tags to your custom post type */
//	register_taxonomy_for_object_type('post_tag', 'parque');

//}

	// adding the function to the Wordpress init
	//add_action( 'init', 'custom_post_parque');
        
        

/*
Plugin Name: Custom post types
Plugin URI: http://wordpress.org/support/topic/permalinks-go-404-on-custom-post-types?replies=1#post-2301511
Description: This plugin registers CPT's and runs flush_rewrite_rules() on activation, which in some extraordinary cases makes automatic permalinking work. For more information see the help topic http://wordpress.org/support/topic/permalinks-go-404-on-custom-post-types?replies=1#post-2301511
Author: Josse Zwols & Geert Smit
Version: 1.6
Author URI: http://forgia.nl
*/

//add_action( 'init', 'create_my_post_types' );

/*function create_my_post_types() {
	register_post_type( 'auctions',
		array(
			'labels' => array(
				'name' => __( 'Auctions' ),
				'singular_name' => __( 'Auction' )
			),
			'public' => true,
			'has_archive' => true,
		)
	);
	//flush_rewrite_rules( false );
}*/

//register_activation_hook( __FILE__, 'custom_post_parque' );
//register_activation_hook( __FILE__, 'flush_rewrite_rules' );



	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// // now let's add custom categories (these act like categories)
 //    register_taxonomy( 'custom_cat',
 //    	array('parque'), /* if you change the name of register_post_type( 'parque', then you have to change this */
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
 //    	array('parque'), /* if you change the name of register_post_type( 'parque', then you have to change this */
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

    //add_filter( 'cmb_meta_boxes', 'cmb_parques_metaboxes' );
      //add_filter( 'cmb_meta_boxes', 'cmb_institution_metaboxes' );

    /**
     * Define the metabox and field configurations.
     *
     * @param  array $meta_boxes
     * @return array
     */
    //function cmb_parques_metaboxes( array $meta_boxes ) {

      // Start with an underscore to hide fields from custom fields list
      //$prefix = '_parque_';

      //$meta_boxes['parque_metabox'] = array(
        //'id'         => 'parque_metabox',
        //'title'      => __( 'More Info', 'ParquesAlegres' ),
        //'pages'      => array( 'parque', ), // Post type
        //'context'    => 'normal',
        //'priority'   => 'high',
        //'show_names' => true, // Show field names on the left
        // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
        //'fields'     => array(
          /*array(
            'name' => __( 'Nombre', 'ParquesAlegres' ),
            'id'   => $prefix . 'nom',
            'type' => 'textarea_small',
          ),*/
          /*array(
            'name' => __( 'Ubicacion', 'ParquesAlegres' ),
            'id'   => $prefix . 'ubic',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Colonia', 'ParquesAlegres' ),
            'id'   => $prefix . 'col',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Superficie', 'ParquesAlegres' ),
            'id'   => $prefix . 'sup',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Sector', 'ParquesAlegres' ),
            'id'   => $prefix . 'sec',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Tipo', 'ParquesAlegres' ),
            'id'   => $prefix . 'tipo',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Contacto', 'ParquesAlegres' ),
            'id'   => $prefix . 'cont',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Ciudad', 'ParquesAlegres' ),
            'id'   => $prefix . 'ciudad',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Estado', 'ParquesAlegres' ),
            'id'   => $prefix . 'estado',
            'type' => 'textarea_small',
          ),
          array(
            'name' => __( 'Mapa', 'ParquesAlegres' ),
            'id'   => $prefix . 'maps',
            'type' => 'textarea_code',
          ),*/
          /*array(
            'name' => __( 'Experiencias exitosas', 'ParquesAlegres' ),
            'id'   => $prefix . 'expexitosa',
            'type' => 'wysiwyg',
    'options' => array(),
          ),*/
          
         /* array(
              'name' => __( 'Plano Files:', 'ParquesAlegres' ),
              'desc' => __ ( 'Upload an image or enter an URL.', 'ParquesAlegres' ),
              'id' => $prefix . 'plano',
              'type' => 'file_list',
              'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
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
    }*/

    //add_action( 'init', 'cmb_initialize_parques_meta_boxes', 9999 );
    //add_action( 'init', 'cmb_initialize_institution_meta_boxes', 9999 );
    /**
     * Initialize the metabox class.
     */
 /*   function cmb_initialize_parques_meta_boxes() {

      if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once 'init.php';

    }*/
    
    add_filter('manage_edit-parque_columns', 'add_new_parque_columns');

function add_new_parque_columns($parque_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    //$new_columns['id'] = __('ID');
    $new_columns['title'] = _x('Nombre', 'column name');
    //$new_columns['author'] = __('Asesor');
    $new_columns['tipo'] = __('Tipo');
    $new_columns['superficie'] = __('Superficie m&#178;');
    $new_columns['visitas'] = __('Visitas');
    $new_columns['agregar_visita'] = __('');
    $new_columns['author'] = __('Asesor');

    //$new_columns['categories'] = __('Categories');
    //$new_columns['tags'] = __('Tags');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}
add_action('manage_parque_posts_custom_column', 'manage_parque_columns', 10, 2);
 
function manage_parque_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {
        
        case 'tipo':
           $tipo=array(1 => '&Aacute;rea verde', 2 => '&Aacute;rea com&uacute;n', 3 => '&Aacute;rea de donaci&oacute;n', 4 => '&Aacute;rea de ejercicio', 5 => '&Aacute;rea deportiva', 6 => '&Aacute;rea recreativa', 7 => 'Bald&iacute;o', 8 => 'Campo deportivo (mixto)', 9 => 'Cancha de usos multiples', 10 => 'Cancha deportiva', 11 => 'Deportivo', 12 => 'Fraccionadora', 13 => 'Lineal', 14 => 'Mixto', 15 => 'P&uacute;blico', 16 => 'Parque', 17 => 'Infantil', 18 => 'Unidad de usos multiples', 19 => 'Plancha', 20 => 'Plaza c&iacute;vica', 21 => 'Privado', 22 => 'Reg&iacute;men condominal', 23 => 'Semi-privado', 24 => 'Unidad deportiva', 25 => 'Unidad deportiva (mixta)');

        echo $tipo[get_post_meta($id, "_parque_tipo", true)];
        //echo $id;
            break;
        case 'superficie':
           // $sqla1="select meta_value as superficie from wp_postmeta where post_id=$id and meta_key='_parque_sup'";
        //$resa1=mysql_query($sqla1);
        //$rowa1=mysql_fetch_array($resa1);
        //echo $rowa1['superficie'];
        if (!get_post_meta($id, "_parque_sup", true)){
          echo'0';  
        }else{
          echo get_post_meta($id, "_parque_sup", true);  
        }
 
        echo'&nbsp;m&#178;';
        //echo $id;
            break;
    case 'agregar_visita':
        echo'<a href="edit.php?post_type=parque&page=altaparametros&parque='.$id.'">Agregar Visita</a>';
        //echo $id;
            break;
 
    case 'visitas':
        // Get number of images in gallery
        $sqla="select count(*) as totalvisitas from wp_comites_parques where cve_parque=$id";
        $resa=mysql_query($sqla);
        $rowa=mysql_fetch_array($resa);

        echo '<a href="edit.php?post_type=parque&page=parametros&parque='.$id.'">'.$rowa['totalvisitas'].'</a>';
       // $num_visitas = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = %d;", $id));
        //echo $num_visitas; 
        break;
    default:
        break;
    } // end switch
}
/*
add_filter( 'manage_edit-parque_sortable_columns', 'my_sortable_parque_column' );
function my_sortable_parque_column( $columns ) {

    $columns['title'] = 'Nombre';
    $columns['tipo'] = 'Tipo';
    $columns['superficie'] = 'Superficie m&#178;';
    $columns['visitas'] = 'No. de visitas';
    //$columns['agregar_visita'] = __('');
    $columns['author'] = 'Asesor';
    //$columns['date'] = _x('Date', 'column name');
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
 
    return $columns;
}*/
?>