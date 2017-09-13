<?php

ob_start();

 if ( ! function_exists( 'gold_setup' ) ) :

	

    function gold_setup() {

	 	if ( ! isset( $content_width ) ) $content_width = 900;

	 	load_theme_textdomain( 'gold', get_template_directory() . '/languages' );

	 	add_theme_support( 'automatic-feed-links' );

	 	add_theme_support( 'custom-background', apply_filters( 'gold_background_args', array(

	 		'default-color' => 'ffffff',

	 		'default-image' => '',

	 	) ) );	

	 	add_theme_support( 'post-thumbnails' ); 

 		

	 	/*****************Register Menus****************/

	 		 register_nav_menu( 'top_menu', 'Top Menu' );



	 		 register_nav_menu( 'main_menu', 'Main Menu' );



	 		 register_nav_menu('footer_sidebar_menu','Footer Sidebar Menu');



	 		 register_nav_menu('footer_menu','Footer Menu');



	 	/*****************Register Menus****************/

	}

 endif; 

 add_action( 'after_setup_theme', 'gold_setup' );

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function obtener_primer_imagen($elpost) {
	    $temp = $post;
	    $post = get_post($elpost);
	    setup_postdata($post);
	    $first_img = '';
	    ob_start();
	    ob_end_clean();
	    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	    $first_img = $matches [1] [0];
	    if(empty($first_img)){ //* Imagen a utilizar por defecto
			$first_img = "/images/imagendefault.png";
	    }
	    return $first_img;
}

 /*****************Register Sidebar****************/	 



 	add_action('widgets_init','gold_sidebar');
 	function gold_sidebar(){ 

 		register_sidebar( array(



				'name' => __( 'Main Sidebar','Gold'),



 				'id' => 'sidebar-1',



 				'before_widget'=>'<div class="panel panel-default overflow" id="my-sidebar">',



 				'after_widget'=>'</div>',



 				'before_title' => '<div class="panel-heading"><h3 class="panel-title">',



 				'after_title' => '</h3></div>',





 		) );
		register_sidebar( array(



				'name' => __( 'mejorar','Gold'),



 				'id' => 'sidebar-2',



 				'before_widget'=>'<div class="panel panel-default overflow" id="organizacion">',



 				'after_widget'=>'</div>',



 				'before_title' => '<div class="panel-heading"><h3 class="panel-title">',



 				'after_title' => '</h3></div>',





 		) );
		register_sidebar( array(



				'name' => __( 'capacitacion','Gold'),



 				'id' => 'sidebar-3',



 				'before_widget'=>'<div class="panel panel-default overflow" id="organizacion">',



 				'after_widget'=>'</div>',



 				'before_title' => '<div class="panel-heading"><h3 class="panel-title">',



 				'after_title' => '</h3></div>',





 		) );

 		 

 	 	register_sidebar( array(



  	 		 		'name' => __( 'Footer Sidebar','Gold'),



  	 		 		'id' => 'footer-sidebar',



  	 		 		'before_widget'=>'<div class="col-lg-3 col-sm-6 col-xs-12 footer-widget"> <div class="footer-box">',



  	 		 		'after_widget'=>'</div></div>',



  	 		 		'before_title' => '<h4 class="footer-box-title">',



  	 		 		'after_title' => '</h4><hr>',



  	 	) );
	}



   require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

	if ( is_plugin_active('woocommerce/woocommerce.php') ) {

		function gold_enqueue_woocommerce_style(){
		 wp_register_style( 'woocommerce', get_template_directory_uri() . '/css/gold-woocommerce.css' );
		 if ( class_exists( 'woocommerce' ) ) {
		 wp_register_style( 'woocommerce', get_template_directory_uri() . '/css/gold-woocommerce.css' );
		 $css =  get_stylesheet_directory_uri() . '/css/gold-woocommerce.css';
			wp_enqueue_style( 'woocommerce_frontend_styles', $css );
		 }
		 }
		 add_action( 'wp_enqueue_scripts', 'gold_enqueue_woocommerce_style' );


	} 	 	

	  	 	

 /*****************Register Sidebar****************/	 



function gold_wp_title( $title, $sep ) {

	global $paged, $page;



	if ( is_feed() )

		return $title;



	// Add the site name.

	$title .= get_bloginfo( 'name' );



	// Add the site description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		$title = "$title $sep $site_description";



	// Add a page number if necessary.

	if ( $paged >= 2 || $page >= 2 )

		$title = "$title $sep " . sprintf( __( 'Page %s', 'Gold' ), max( $paged, $page ) );



	return $title;

}

add_filter( 'wp_title', 'gold_wp_title', 10, 2 );



if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 



 	

 function gold_scripts(){



 		wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css');



		wp_enqueue_style('font-awesome',get_template_directory_uri().'/font-awesome/css/font-awesome.min.css');



		wp_enqueue_style('fonts',get_template_directory_uri().'/fonts/fonts.css');



		wp_enqueue_style('bootstrap-glyphicons',get_template_directory_uri().'/css/bootstrap-glyphicons.css');

		



		wp_enqueue_style('style',get_stylesheet_uri());



		wp_enqueue_style('helpers',get_template_directory_uri().'/css/helpers.css');





		wp_enqueue_script('bootstrap.js',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'',true);



		wp_enqueue_script('respond.min',get_template_directory_uri().'/js/respond.min.js',array('jquery'),'',true);



		wp_enqueue_script('gold-custom',get_template_directory_uri().'/js/gold-custom.js',array('jquery'),'',true);



 	}

 	add_action('wp_enqueue_scripts','gold_scripts');

	

	function gold_custom_style(){



        	$theme=of_get_option('default_theme');

            if($theme=='Default')

            {

            	wp_enqueue_style('default',get_template_directory_uri().'/css/default.css');

     

            }

            elseif($theme=='Basic')

            {

     			wp_enqueue_style('basic',get_template_directory_uri().'/css/basic.css');       	

            }

            elseif($theme=='Dark Blue')

            {

            	wp_enqueue_style('default-new',get_template_directory_uri().'/css/default-new.css');

            }
            elseif($theme=='Hibiscus')

            {

            	wp_enqueue_style('hibiscus',get_template_directory_uri().'/css/hibiscus.css');

            }

            else

            {

            	wp_enqueue_style('default',get_template_directory_uri().'/css/default.css');

            }	

            if(of_get_option('default_bg')!=''):

              $bg=of_get_option('default_bg');   

              echo '<style type="text/css">';

              echo 'body{';

              echo 'background: '.$bg['color'].' url("'.$bg['image'].'") '. $bg['repeat']." ".$bg['position']." ".$bg['attachment'];

              echo '}';

              echo '</style>';

            endif;

    }

	

	add_action('wp_enqueue_scripts','gold_custom_style'); 

 /**

 * Adds custom classes to the array of body classes.

 */

function gold_body_classes( $classes ) {

   // Adds a class of group-blog to blogs with more than 1 published author

		if(is_home())

		{

			$classes[] = 'home-page';

		}

		if(is_page('gallery'))

		{

			$classes[] = 'gallery';	

		}

	return $classes;

}

add_filter('body_class','gold_body_classes');



function gold_link_pages(){

	$args = array(

            'before'           => '<p class="paginate-page">' . __( 'Pages:','Gold'),

            'after'            => '</p>',

            'link_before'      => '',

            'link_after'       => '',

            'next_or_number'   => 'number',

            'separator'        => ' ',

            'nextpagelink'     => __( 'Next page','Gold'),

            'previouspagelink' => __( 'Previous page','Gold'),

            'pagelink'         => '%',

            'echo'             => 1

    );

    wp_link_pages( $args ); 

}

add_action('init','gold_link_pages');



class gold_wp_bootstrap_navwalker extends Walker_Nav_Menu {



		function start_lvl( &$output, $depth=0,$args=array()) {



			$indent = str_repeat( "\t", $depth );



			$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";		



		}



		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {



			global $wp_query;



			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';



			if (strcasecmp($item->title, 'divider') == 0) {



				$output .= $indent . '<li class="divider">';



			} else if (strcasecmp($item->title, 'divider-vertical') == 0) {



				$output .= $indent . '<li class="divider-vertical">';



			} else if (strcasecmp($item->title, 'nav-header') == 0) {



				$output .= $indent . '<li class="nav-header">' . esc_attr( $item->attr_title );



			} else {





				$class_names = $value = '';



				$classes = empty( $item->classes ) ? array() : (array) $item->classes;



				$classes[] = ($item->current) ? 'active' : '';



				$classes[] = 'menu-item-' . $item->ID;



				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );







				if ($args->has_children && $depth > 0) {



					$class_names .= '  dropdown-submenu';



				} else if($args->has_children && $depth === 0) {



					$class_names .= ' dropdown';



				}



				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';



				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );



				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';



				$output .= $indent . '<li' . $id . $value . $class_names .'>';



	            if($args->has_children && $depth === 0 && $class_names='dropdown') 



				{

					$attributes = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';



					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';



					$attributes .= ! empty( $item->url )        ? ' href="#"' : '';



					$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';



					$item_output = $args->before;

				}

				else

				{

					$attributes = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';



					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';



					$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';



					$attributes .= ($args->has_children) 	    ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';



					$item_output = $args->before;

	            }



				if(! empty( $item->attr_title )){



					$item_output .= '<a'. $attributes .'><i class="' . esc_attr( $item->attr_title ) . '"></i>&nbsp;';



				} else {



					$item_output .= '<a'. $attributes .'>';



				}



				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;



				$item_output .= ($args->has_children && $depth == 0) ? ' <span class="caret"></span></a>' : '</a>';



				$item_output .= $args->after;



				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );



			}



		}



		function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {



	        if ( !$element ) {



	            return;



	        }



	        $id_field = $this->db_fields['id'];



	        if ( is_object( $args[0] ) ) {



	           $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );



	        }

	        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

	    }

}



add_filter( 'comment_form_defaults', 'gold_comment_textarea_filter', 9 );



function gold_comment_textarea_filter( $fields ){



	$fields['comment_field'] = '<div class="well">'. $fields['comment_field']. '</div>';



	return $fields;

}







	

/*

   *************Option Framework Functions*********************

*/

   if ( !function_exists( 'optionsframework_init' ) ) {

   	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );

   	require_once dirname( __FILE__ ) . '/inc/options-framework.php';

   }

  	

   add_action('optionsframework_custom_scripts', 'gold_optionsframework_custom_scripts');



   function gold_optionsframework_custom_scripts() { 

   	?>

   	<script type="text/javascript">

   		<?php include('js/optionframework.js');?>

   	</script>

   	<?php

   }

/* 

 * **********Function End.********************

*/
function gold_pager($num = 1) {

 

    if( is_singular() )

    return;

 

    global $wp_query;

 

    /** Stop execution if there's only 1 page */

    if( $wp_query->max_num_pages <= 1 )

        return;

 

    $paged = get_query_var( 'page' ) ? absint( get_query_var( 'page' ) ) : $num;


    $max   = intval( $wp_query->max_num_pages );
    
 
    /** Add current page to the array */

    if ( $paged >= 1 )

        $links[] = $paged;

 

    /** Add the pages around the current page to the array */

    if ( $paged >= 3 ) {

        $links[] = $paged - 1;

        $links[] = $paged - 2;

    }

 

    if ( ( $paged + 2 ) <= $max ) {

        $links[] = $paged + 2;

        $links[] = $paged + 1;

    }

 

    echo '<center><div class="navigation"><ul class="pagination">' . "\n";

 

    /** Previous Post Link */

    if ( get_previous_posts_link() )

        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

 

    /** Link to first page, plus ellipses if necessary */

    if ( ! in_array( 1, $links ) ) {

        $class = 1 == $paged ? ' class="active"' : '';

 

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

 

        if ( ! in_array( 2, $links ) )

            echo '<li><a>…</a></li>';

    }

 

    /** Link to current page, plus 2 pages in either direction if necessary */

    sort( $links );

    foreach ( (array) $links as $link ) {

        $class = $paged == $link ? ' class="active"' : '';
      
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );

    }

 

    /** Link to last page, plus ellipses if necessary */

    if ( ! in_array( $max, $links ) ) {

        if ( ! in_array( $max - 1, $links ) )

            echo '<li><a>…</a></li>' . "\n";

 

        $class = $paged == $max ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );

    }

 

    /** Next Post Link */

    if ( get_next_posts_link() )

        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

 

    echo '</ul></div></center>' . "\n";
 
}


function gold_pager1( $nav_id ) {

	global $wp_query, $post;
	// Don't print empty markup on single pages if there's nowhere to navigate.

	if ( is_single() ) {

		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );

		$next = get_adjacent_post( false, '', false );



		if ( ! $next && ! $previous )

			return;

	}



	// Don't print empty markup in archives if there's only one page.

	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search()  ) )

		return;



	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';



	?>

	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?> row">



	<?php if ( is_single() ) : // navigation links for single posts ?>

		<ul class="gold-pager">

					<?php previous_post_link( '<li class="previous">%link</li>', '<i class="icon-circle-arrow-left"></i> %title' ); ?>

					<?php next_post_link( '<li class="next">%link</li>', ' %title <i class="icon-circle-arrow-right"></i>'); ?>

		</ul>



	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<div class="pull-left">

			<ul class="pager">

				<?php if ( get_previous_posts_link() ) : ?>

				  <li class="next"><?php previous_posts_link( __('Newer posts&rarr; ', 'Gold') ); ?></li>

				<?php endif; ?>

				<?php if ( get_next_posts_link() ) : ?>

				  <li class="previous"><?php next_posts_link( __( '&larr;Older posts', 'Gold') ); ?></li>

				<?php endif; ?>

				



			</ul>

		</div>	

	<?php endif; ?>



	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->

	<?php

}

/**

	****Widgets Registration****

*/



/*****Widget For Address*****/	

	class gold_wp_address extends WP_Widget {



		function __construct() {

			$widget_ops = array('classname' => 'widget_address', 'description' => __('Widget for add one of your address.','Gold'));

			$control_ops = array('width' => 300, 'height' => 350);

			parent::__construct('address', __('Gold Address Widget','Gold'), $widget_ops, $control_ops);

		}



		// widget form creation

		function form($instance) {



		// Check values

		     $title=isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

		?>



		<p>

		<span>You can update the address from Gold Options->Contact Page.</span><br><br>

		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>

		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />

		</p>

		<?php

		}



		// update widget

		function update($new_instance, $old_instance) {

		      $instance = $old_instance;

		      // Fields

		      $instance['title'] = strip_tags($new_instance['title']);

		     return $instance;

		}



		// display widget

		function widget($args, $instance) {

		   extract( $args );

		   // these are the widget options

		   $title = apply_filters('widget_title', $instance['title']);

		   echo $before_widget;

		   // Display the widget

		   // Check if title is set

		   if ( $title ) {

		      echo $before_title . $title . $after_title;

		   }

		   else{

		   		echo $before_title . 'Address'. $after_title;

		   }

		?>   

		<?php if((of_get_option('cmp')!='') && (of_get_option('street')!='') && (of_get_option('city')!='') && (of_get_option('phno')!='')):?>

		<div class="wp-address">



		   <address>

         <?php 

          if(of_get_option('cmp')!=''):

            echo ' <strong>'.of_get_option('cmp').'</strong><br>';



          endif;

          ?>

           <?php 

            if(of_get_option('street')!=''):

              echo of_get_option('street').'<br>';



            endif;

          ?>

           <?php 

            if(of_get_option('city')!=''):

              echo of_get_option('city').'<br>';



            endif;

          ?>

          <?php 

            if(of_get_option('phno')!=''):

              echo '<a href="callto:000000000">'.of_get_option('phno').'</a>';



            endif;

          ?>

      </address>      

      <address>

          <?php 

            if(of_get_option('name')!=''):

              echo '<strong>'.of_get_option('name').'</strong><br>';



            endif;

          ?>

          <?php 

            if(of_get_option('eid')!=''):

              echo '<a href="mailto:#">'.of_get_option('eid').'</a>';



            endif;

    ?>

        

      </address> 

      </div>

      <?php 

       else:

       	?>

       <p>You can add your address <a href="<?php echo esc_url(admin_url());?>/themes.php?page=options-framework#options-group-6">Here</a>.</p>

       <?php

      	endif;

      ?>  

		<?php   echo $after_widget;

		}



		

	}



	// register widget

	add_action('widgets_init', create_function('', 'return register_widget("gold_wp_address");'));



/*****End Of Widget For Address*****/





/*****Widget For Footer Recent Post*****/

	class gold_wp_my_plugin extends WP_Widget {



		function __construct() {

			$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most Footer Recent Post on your site",'Gold') );

			parent::__construct('footer-pecent-post', __('Gold View Recent Posts in The Footer','Gold'), $widget_ops);

			$this->alt_option_name = 'widget_recent_entries';



			

		}



		function widget($args, $instance) {

			



			ob_start();

			extract($args);



			$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Footer Recent Post','Gold' );

			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;

			if ( ! $number )

	 			$number = 10;

			$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;



			$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );

			if ($r->have_posts()) :

			?>

			<?php echo $before_widget; ?>

			<?php 

				if ( $title ) 

					echo $before_title . $title . $after_title; 

				else

					echo $before_title . 'Recent Posts' . $after_title;



			?>

			<ul class="nav nav-pills nav-stacked">

			<?php while ( $r->have_posts() ) : $r->the_post(); ?>

				<li>

					<a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><span class="badge pull-right"><?php the_time('j M');?></span><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>

				</li>

			<?php endwhile; ?>

			</ul>

			<?php echo $after_widget; ?>

			<?php

			// Reset the global $the_post as this query will have stomped on it

			wp_reset_postdata();



			endif;



			$cache[$args['widget_id']] = ob_get_flush();

			wp_cache_set('widget_recent_posts', $cache, 'widget');

		}



		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title'] = strip_tags($new_instance['title']);

			$instance['number'] = (int) $new_instance['number'];

			$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;

			$alloptions = wp_cache_get( 'alloptions', 'options' );

			if ( isset($alloptions['widget_recent_entries']) )

				delete_option('widget_recent_entries');



			return $instance;

		}



		



		function form( $instance ) {

			$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

			$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;

			$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;

	?>

			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','Gold' ); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>



			<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ,'Gold'); ?></label>

			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>



			<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />

			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?','Gold' ); ?></label></p>

	<?php

		}

	}



	// register widget

	add_action('widgets_init', create_function('', 'return register_widget("gold_wp_my_plugin");'));



/*****End Of Widget For Footer Recent Post*****/

