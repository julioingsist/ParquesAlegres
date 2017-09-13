<?php
/**
 * Functions based on TwentyTen theme with several changes explained below
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content, especially video embeds.
 * This should be equal to the width of the main portion of your site,
 * where your posts go.
 */
if ( ! isset( $content_width ) )
	$content_width = 500;

/** Tell WordPress to run leathernote_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'leathernote_setup' );

if ( ! function_exists( 'leathernote_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Like in Twentyten, you can override this setup in a child theme by creating
 * your own leathernote_setup function in your child theme's functions.php
 *
 */
function leathernote_setup() {

    // Allow changeable header image. In this theme, what you can change
    // is the "header image" of the sidebar

    define( 'NO_HEADER_TEXT', true ); // Don't support text inside the header image.
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE',  get_stylesheet_directory_uri() . '/images/headers/coffee-stain.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to leathernote_header_image_width and leathernote_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'leathernote_header_image_width', 210 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'leathernote_header_image_height', 170 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

    // Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See leathernote_admin_header_style(), below. (Since 2.1.0)
	add_custom_image_header( 'leathernote_header_style', 'leathernote_admin_header_style' );

    // Allow css style changes to the text editor of the admin site
	add_editor_style();

    // This theme allows users to set a custom background
	add_custom_background();

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'primary' => __( 'Primary Navigation', 'leathernote' ),
    ) );

    // Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
    register_default_headers( array(
        'coffeestain' => array(
            'url' => '%s/images/headers/coffee-stain.jpg',
            'thumbnail_url' => '%s/images/headers/coffee-stain.jpg',
            /* translators: header image description */
            'description' => __( 'Coffee Stain', 'leathernote' )
        ),

        'paperclips' => array(
            'url' => '%s/images/headers/paper-clips.jpg',
            'thumbnail_url' => '%s/images/headers/paper-clips.jpg',
            /* translators: header image description */
            'description' => __( 'Paper Clips', 'leathernote' )
        ),

        'redngreen' => array(
            'url' => '%s/images/headers/red-green.jpg',
            'thumbnail_url' => '%s/images/headers/red-green.jpg',
            /* translators: header image description */
            'description' => __( 'Red and Green', 'leathernote' )
        ),

        'redrays' => array(
            'url' => '%s/images/headers/red-rays.jpg',
            'thumbnail_url' => '%s/images/headers/red-rays.jpg',
            /* translators: header image description */
            'description' => __( 'Red Rays', 'leathernote' )
        ),

        'brownflowers' => array(
            'url' => '%s/images/headers/brown-flowers.jpg',
            'thumbnail_url' => '%s/images/headers/brown-flowers.jpg',
            /* translators: header image description */
            'description' => __( 'Brown Curls and Flowers', 'leathernote' )
        ),


    ) );

    // This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
  	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-formats', array('aside', 'gallery') );

}
endif;

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in leathernote_setup().
 *

 */
if ( ! function_exists( 'leathernote_header_style' ) ) :
// gets included in the site header
function leathernote_header_style() {
    ?><style type="text/css">
        #header { }
    </style><?php
}
endif;

if ( ! function_exists( 'leathernote_admin_header_style' ) ) :
// gets included in the admin header
function leathernote_admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}
endif;


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *

 */
function leathernote_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'leathernote_page_menu_args' );

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *

 * @return int
 */
function leathernote_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'leathernote_excerpt_length' );

/**
 * By default, we set the character length to be the number of words * 5,
 * and assume that average number of characters per word is 5.
 */

function leathernote_excerpt_char_length() {
  return leathernote_excerpt_length("") * 5;
}

/**
 * This function safely truncates text based on the number of characters
 * and makes sure that quotes have been safely converted via esc_attr()
 * This is important for meta description and keywords which are enclosed
 * inside double quotes.
 *
 * @return string
 */
function leathernote_quote_safe_truncate($text) {
  $text = wp_html_excerpt($text, leathernote_excerpt_char_length());
  return esc_attr($text) . "...";
  //return str_replace(array("'", '"'), array("", ""), $text);
}



/**
 * Returns a "Continue Reading" link for excerpts
 *

 * @return string "Continue Reading" link
 */
function leathernote_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'leathernote' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and leathernote_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *

 * @return string An ellipsis
 */
function leathernote_auto_excerpt_more( $more ) {
	return ' &hellip;' . leathernote_continue_reading_link();
}
add_filter( 'excerpt_more', 'leathernote_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *

 * @return string Excerpt with a pretty "Continue Reading" link
 */
function leathernote_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= leathernote_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'leathernote_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in style.css.
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function leathernote_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'leathernote_remove_gallery_css' );

if ( ! function_exists( 'leathernote_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own leathernote_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *

 */
function leathernote_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'leathernote' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'leathernote' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'leathernote' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'leathernote' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'leathernote' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'leathernote'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;


add_filter( 'widget_title', 'leathernote_widget_title');

// If the widget does not have a title (ex. custom menus), return
// a space for a title just to properly place the pencil and the
// necessary div container to create the notepad
function leathernote_widget_title($title) {
  if ( strlen($title) == 0 )
    return " ";
  else
    return $title;
}


/**
 * Register widgetized areas, including two sidebars and one footer.
 *
 * To override leathernote_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *

 * @uses register_sidebar
 */
function leathernote_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'leathernote' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area, above the sidebar image and search box', 'leathernote' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div><div class="widget-bg-bottom"></div></li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-property">',
	) );


	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'leathernote' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area, below the sidebar image and search box', 'leathernote' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div><div class="widget-bg-bottom"></div></li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="widget-property">',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'leathernote' ),
		'id' => 'footer-widget-area',
		'description' => __( 'The footer area below the main body', 'leathernote' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


}
/** Register sidebars by running leathernote_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'leathernote_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *

 */
function leathernote_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
//add_action( 'widgets_init', 'leathernote_remove_recent_comments_style' );

if ( ! function_exists( 'leathernote_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *

 */
function leathernote_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'leathernote' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'leathernote_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *

 */
function leathernote_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'Posted in %1$s. Tags: %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'leathernote' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'Posted in %1$s. Tags: %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'leathernote' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'leathernote' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
