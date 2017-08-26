<?php
ob_start();
/*
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/*********************
INCLUDE NEEDED FILES
*********************/

/*
library/joints.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once(get_template_directory().'/library/joints.php'); // if you remove this, Joints will break
/*
library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
//require_once(get_template_directory().'/library/custom-post-type-accordion.php'); // you can disable this if you like
//require_once(get_template_directory().'/library/custom-post-type.php'); // you can disable this if you like
//require_once(get_template_directory().'/library/custom-post-type-success-case.php');
//require_once(get_template_directory().'/library/custom-post-type-provider.php');
//require_once(get_template_directory().'/library/custom-post-type-institution.php');
//require_once(get_template_directory().'/library/custom-post-type-parque.php');
/*
library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once(get_template_directory().'/library/admin.php'); // this comes turned off by default
/*
library/translation/translation.php
	- adding support for other languages
*/
require_once(get_template_directory().'/library/translation/translation.php'); // this comes turned off by default

require_once(get_template_directory().'/library/metabox/init.php');
//require_once(get_template_directory().'/library/plugins/pa-agregacomentarios/index.php');
//require_once(get_template_directory().'/library/plugins/pa-altaparametros/index.php');
//require_once(get_template_directory().'/library/plugins/pa-arturo/index.php');
//require_once(get_template_directory().'/library/plugins/pa-cienciast/index.php');
//require_once(get_template_directory().'/library/plugins/pa-Comentarios_parametros/index.php');
//require_once(get_template_directory().'/library/plugins/pa-detalle_parques/index.php');
//require_once(get_template_directory().'/library/plugins/pa-detalle_parques2/index.php');
//require_once(get_template_directory().'/library/plugins/pa-edicionparques/index.php');
//require_once(get_template_directory().'/library/plugins/pa-parametros/index.php');
//require_once(get_template_directory().'/library/plugins/pa-planos/index.php');
//require_once(get_template_directory().'/library/plugins/pa-proyectos/index.php');
//require_once(get_template_directory().'/library/plugins/pa-usuariowp/index.php');

/*********************
THUMNAIL SIZE OPTIONS
*********************/

// Thumbnail sizes
add_image_size( 'parquesa-thumb-600', 600, 150, true );
add_image_size( 'parquesa-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'parquesa-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'parquesa-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like.
*/


/*********************
Minificar HTML
*********************/
//Función para Minificar el HTML
class WP_HTML_Compression {
    protected $compress_css = true;
    protected $compress_js = true;
    protected $info_comment = true;
    protected $remove_comments = true;
 
    protected $html;
    public function __construct($html) {
      if (!empty($html)) {
		    $this->parseHTML($html);
	    }
    }
    public function __toString() {
	    return $this->html;
    }
    protected function bottomComment($raw, $compressed) {
	    $raw = strlen($raw);
	    $compressed = strlen($compressed);		
	    $savings = ($raw-$compressed) / $raw * 100;		
	    $savings = round($savings, 2);		
	    return '<!-- HTML Minify | Se ha reducido el tamaño de la web un '.$savings.'% | De '.$raw.' Bytes a '.$compressed.' Bytes -->';
    }
    protected function minifyHTML($html) {
	    $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
	    preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
	    $overriding = false;
	    $raw_tag = false;
	    $html = '';
	    foreach ($matches as $token) {
		    $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
		    $content = $token[0];
		    if (is_null($tag)) {
			    if ( !empty($token['script']) ) {
				    $strip = $this->compress_js;
			    }
			    else if ( !empty($token['style']) ) {
				    $strip = $this->compress_css;
			    }
			    else if ($content == '<!--wp-html-compression no compression-->') {
				    $overriding = !$overriding;
				    continue;
			    }
			    else if ($this->remove_comments) {
				    if (!$overriding && $raw_tag != 'textarea') {
					    $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
				    }
			    }
		    }
		    else {
			    if ($tag == 'pre' || $tag == 'textarea') {
				    $raw_tag = $tag;
			    }
			    else if ($tag == '/pre' || $tag == '/textarea') {
				    $raw_tag = false;
			    }
			    else {
				    if ($raw_tag || $overriding) {
					    $strip = false;
				    }
				    else {
					    $strip = true;
					    $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
					    $content = str_replace(' />', '/>', $content);
				    }
			    }
		    }
		    if ($strip) {
			    $content = $this->removeWhiteSpace($content);
		    }
		    $html .= $content;
	    }
	    return $html;
    }
    public function parseHTML($html) {
	    $this->html = $this->minifyHTML($html);
	    if ($this->info_comment) {
		    $this->html .= "\n" . $this->bottomComment($html, $this->html);
	    }
    }
    protected function removeWhiteSpace($str) {
	    $str = str_replace("\t", ' ', $str);
	    $str = str_replace("\n",  '', $str);
	    $str = str_replace("\r",  '', $str);
	    while (stristr($str, '  ')) {
		    $str = str_replace('  ', ' ', $str);
	    }
	    return $str;
    }
}
function wp_html_compression_finish($html) {
    return new WP_HTML_Compression($html);
}
function wp_html_compression_start() {
    ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');



/*********************
MENUS & NAVIGATION
*********************/
// registering wp3+ menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu' ),   // main nav in header
		'footer-links' => __( 'Footer Links' ) // secondary nav in footer
	)
);

// the main menu
function joints_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'ParquesAlegres' ),  // nav name
    	'menu_class' => '',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'joints_main_nav_fallback'      // fallback function
	));
} /* end joints main nav */

// the footer menu (should you choose to use one)
function joints_footer_links() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'ParquesAlegres' ),   // nav name
    	'menu_class' => 'sub-nav',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_fallback'  // fallback function
	));
} /* end joints footer link */

// this is the fallback for header menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'top-bar top-bar-section',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function joints_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
SIDEBARS
*********************/

// Sidebars & Widgetizes Areas
function joints_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'ParquesAlegres'),
		'description' => __('The first (primary) sidebar.', 'ParquesAlegres'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'ParquesAlegres'),
		'description' => __('The offcanvas sidebar.', 'ParquesAlegres'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'ParquesAlegres'),
		'description' => __('The second (secondary) sidebar.', 'ParquesAlegres'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function joints_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<?php printf(__('<cite class="fn">%s</cite>', 'ParquesAlegres'), get_comment_author_link()) ?> on
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'ParquesAlegres')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'ParquesAlegres'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'ParquesAlegres') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

add_filter( 'wp_title', 'filter_wp_title' );
/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses  get_bloginfo()
 * @uses  is_home()
 * @uses  is_front_page()
 */
function filter_wp_title( $title ) {
  global $page, $paged;

  if ( is_feed() )
    return $title;

  $site_description = get_bloginfo( 'description' );

  $filtered_title = $title . get_bloginfo( 'name' );
  $filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
  $filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ) : '';

  return $filtered_title;
}

//DEREGISTER CONTACT FORM 7 STYLES
add_action( 'wp_print_styles', 'voodoo_deregister_styles', 100 );

function voodoo_deregister_styles() {
  wp_deregister_style( 'contact-form-7' );
}
function get_sharing_icons() {
  echo'    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53b6de9d5456b9e7"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->

<div class="addthis_native_toolbox"></div>';
/*
  // bookmark on Delicious
  echo '<a rel="nofollow" href="http://delicious.com/post?url='. get_the_permalink() .'&amp;title='. urlencode(get_the_title($id)) .'" title="Bookmark this post at Delicious">Bookmark at Delicious</a>';

  // submit to Digg
  echo '<a rel="nofollow" href="http://digg.com/submit?phase=2&amp;url='. get_the_permalink() .'" title="Submit this post to Digg">Digg this!</a>';

  // tweet on Twitter
  echo '<a rel="nofollow" href="http://twitter.com/home?status='. urlencode("Currently reading: ") .''. get_the_permalink() .'" title="Share this article with your Twitter followers">Tweet this!</a>';

  // submit to StumbleUpon
  echo '<a rel="nofollow" href="http://www.stumbleupon.com/submit?url='. get_the_permalink() .'&amp;title='. urlencode(get_the_title($id)) .'" title="Share this post at StumbleUpon">Stumble this!</a>';

  // share on Facebook
  echo '<a rel="nofollow" href="http://www.facebook.com/sharer.php?u='. get_the_permalink().'&amp;t='. urlencode(get_the_title($id)) .'" title="Share this post on Facebook">Share on Facebook</a>';

  // submit to Blinklist
  echo '<a rel="nofollow" href="http://blinklist.com/index.php?Action=Blink/addblink.php&amp;url='. get_the_permalink() .'&amp;Title='. urlencode(get_the_title($id)) .'" title="Share this post on Blinklist" >Blink This!</a>';

  // store on Furl
  echo '<a rel="nofollow" href="http://furl.net/storeIt.jsp?t='. urlencode(get_the_title($id)) .'&amp;u='. get_the_permalink() .'" title="Share this post on Furl">Furl This!</a>';

  // submit to Reddit
  echo '<a rel="nofollow" href="http://reddit.com/submit?url='. get_the_permalink() .'&amp;title='. urlencode(get_the_title($id)) .'" title="Share this post on Reddit">Share on Reddit</a>';
*/
}

?>