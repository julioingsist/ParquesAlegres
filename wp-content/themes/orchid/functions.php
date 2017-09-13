<?php
include_once('twitter_bootstrap_nav_walker.php');
include_once('twitter_bootstrap_page_walker.php');

if ( ! isset( $content_width ) ) $content_width = 800;

add_action( 'after_setup_theme', 'orchid_Setup' );

function orchid_Setup() {
    
    //allow custom logo
    add_theme_support( 'custom-header', array(
                            'default-image' => get_template_directory_uri() . '/img/logo.png',
                            'random-default'         => false,
                            'width'                  => 300,
                            'height'                 => 40,
                            'flex-height'            => true,
                            'flex-width'             => true,
                            'header-text'            => false,
                            'uploads'                => true,
                        ) );

    //allow customer backgroud
    add_theme_support( 'custom-background');

    //add support for automatic feed links
    add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

    //allow short codes to be added in the widget area
    add_filter('widget_text', 'do_shortcode');

    //allow post thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 250, 250); 

    //build the title
    add_filter( 'wp_title', 'orchid_WPTitle', 10, 2 );
    
    //build read more link for excerpts
    add_filter('the_excerpt', 'orchid_ExcerptReadMoreLink');

    //add stylesheet for editor, default is editor-style.css
    add_editor_style();

    //add scripts
    add_action('wp_enqueue_scripts', 'orchid_WPBootstrapScriptsWithJquery');   
    
    //register menus
    add_action( 'init', 'orchid_RegisterMenus' );

    //nice tags
    add_filter( 'term_links-post_tag','orchid_TermLinks',10,1);

    // change <code> tag to <pre> so it doesn't go out of div
    add_filter( 'comment_form_defaults','orchid_CommentFormDefaults',10,1 );

    // add the correct class to <ul> and remove div
    // this is required when no menu has been specified and we are
    //  falling back to pages
    add_filter( 'wp_page_menu', 'orchid_PageMenuFilter',10,1);


}

function orchid_WidgetsInit() {

	//sidebars
	register_sidebar( array(
		'name'          => 'Post',
		'id'            => 'post',
		'description'   => 'This side bar will appear on all posts and archives',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Page',
		'id'            => 'page',
		'description'   => 'This side bar will appear on all pages',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Header Center',
		'id'            => 'headcenter',
		'description'   => 'This widget area will appear in the center of your header',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Header Right',
		'id'            => 'headright',
		'description'   => 'This widget area will appear on the right side of your header',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Home',
		'id'            => 'front',
		'description'   => 'This side bar will appear on the home page only',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Left',
		'id'            => 'footleft',
		'description'   => 'This side bar will appear on the footer',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Middle',
		'id'            => 'footmiddle',
		'description'   => 'This side bar will appear on the footer',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Right',
		'id'            => 'footright',
		'description'   => 'This side bar will appear on the footer',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget_title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'orchid_WidgetsInit' );



function orchid_WPTitle( $title, $sep) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'orchid' ), max( $paged, $page ) );

	return $title;    
}

//add read more link for manually entered excerpts
function orchid_ExcerptReadMoreLink($output) {
    global $post;
    return $output . '<div class="clear"><p><a class="btn btn-mini btn-primary pull-right" href="'. get_permalink($post->ID) . '">Read More</a></p></div>';
}

function orchid_WPBootstrapScriptsWithJquery() 
{
    // Register the script like this for a theme:
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(
        'jquery'
    ));
    
    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script('bootstrap');
}

//menus
function orchid_RegisterMenus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu','orchid' ),
      //'footer-menu' => __( 'Footer Menu' ,'megnicholas'),
    )
  );
}


function orchid_Comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :

        // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><?php _e( 'Pingback:', 'orchid' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'orchid' ), '<span class="edit-link">', '</span>' ); ?></p>
        <?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'orchid' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'orchid' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'orchid' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'orchid' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'orchid' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
            
		</article><!-- #comment-## -->
        <hr>
	<?php
		break;
	endswitch; // end comment_type check
}

//fallback menu
function orchid_HeaderNavFallback() { 

   wp_page_menu(array
    (
        'depth'      => 10,
        'container'  => '',
        'container_class'  => '',
        'menu_class' => 'nav nav-pills',
        'walker'=> new twitter_bootstrap_page_walker(),
    )) ;
}


//fallback menu
function orchid_FooterNavFallback() { 

    wp_page_menu(array
    (
        'depth'      => 10,
        'container'  => '',
        'container_class'  => '',
        'menu_class' => 'inline text-center',
        'walker'=> new twitter_bootstrap_page_walker(),
    )) ;
}

//nice tags
function orchid_TermLinks( $term_links ) {
    //add class to each link
    foreach ($term_links as $key => $link) {
        $term_links[$key] = str_replace("<a", "<a class=\"btn btn-mini btn-primary\"", $link);
    }
    
    return $term_links;
}


// change <code> tag to <pre> so it doesn't go out of div
function orchid_CommentFormDefaults($defaults) {
    $defaults['comment_notes_after'] = '<small class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s','orchid' ), ' <pre>' . allowed_tags() . '</pre>' ) . '</small>';
    return $defaults;
}

	
function orchid_PageLinks() { 

    global $wp_query;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 

    $return = '';

    if ( !is_singular() ) {
        $defaults = array(
            'prelabel' => __('Prev','orchid'),
            'nxtlabel' => __('Next','orchid'),
        );

        $max_num_pages = $wp_query->max_num_pages;
        $paged = get_query_var('paged');


        if ( $max_num_pages > 1 ) {

            $return = '<div class="pull-right pagination">';
            $return .= '<ul>';

            $return .= '<li>' . get_previous_posts_link($defaults['prelabel']) .'</li>';
            $x = 1;
            while ($x <= $max_num_pages) {
                if ($x == $paged) {
                    $return .= '<li class="active"><a href="' .get_pagenum_link($x) .'">' .$x . '</a></li>';
                }
                else {
                    $return .= '<li><a href="' .get_pagenum_link($x) .'">' .$x . '</a></li>';
                }
                $x++;
            }
            $return .= '<li>' . get_next_posts_link($defaults['nxtlabel']) .'</li>';

            $return .= '</ul>';
            $return .= '</div>';                
        }

    }
    return $return;    
}

function orchid_Credit() {
    echo 'Theme Created by <a href="'.esc_url( __( 'http://www.megnicholas.co.uk/wordpress-themes/orchid/', 'orchid' )).'">Meg Nicholas</a>';
}


// add the correct class to <ul> and remove div
// this is required when the no menu has been specified and we are
//  falling back to pages
function orchid_PageMenuFilter($menu) {
    $menu = str_replace("<div class=\"nav nav-pills\"><ul>", "<ul class=\"nav nav-pills\">", $menu);
    $menu = str_replace("<div class=\"inline text-center\"><ul>", "<ul class=\"inline text-center\">", $menu);
    
    $menu = str_replace("</div>", "", $menu);
    
    return $menu;
}
