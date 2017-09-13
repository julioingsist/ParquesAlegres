<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php global $page, $paged, $post;

  wp_title( '|', true, 'right' );
  bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'leathernote' ), max( $paged, $page ) );
  ?>
</title><?php
  /* Generate meta keywords and description to make your site more SEO-friendly
   *
   */
  $leathernote_metakeywords = get_bloginfo( 'name' );
  $leathernote_metakeywords .= wp_title( ',', false, 'left' );

  if ( is_attachment() ) {
    $leathernote_metadesc = leathernote_quote_safe_truncate($post->post_excerpt);
  } else if ( is_single() || is_page() ) {
    /* Get an excerpt of the blog post. We assume average number of chars is 5 per word. leathernote_excerpt_length
     * returns the number of words per excerpt
     */
    $leathernote_metadesc = leathernote_quote_safe_truncate($post->post_content);
  } elseif ( is_home() || is_front_page() ) {
    $leathernote_metadesc = leathernote_quote_safe_truncate(get_bloginfo( 'description' ));
  } elseif ( is_search() ) {
    $leathernote_metadesc = leathernote_quote_safe_truncate("Blog post search results for " . get_search_query() . " found on - " . get_bloginfo( 'name' ));
  } else
    $leathernote_metadesc = leathernote_quote_safe_truncate(wp_title( '', false, 'right' ) . " | " . get_bloginfo( 'name' ));
?>
<meta name="keywords" content="<?php echo esc_attr($leathernote_metakeywords); ?>">
<meta name="description" content="<?php echo $leathernote_metadesc; ?>">

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
  /* We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
	 */
  if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">
  <div id="header">
    <div id="masthead">
      <div id="branding" role="banner">
              <?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
                <<?php echo $heading_tag; ?> id="site-title">
          <span>
            <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          </span>
        </<?php echo $heading_tag; ?>>
        <div id="site-description"><?php bloginfo( 'description' ); ?></div>
            </div><!-- #branding -->

      <div id="access" role="navigation">
          <div class="access-top"></div>
        <div class="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/rss-icon.gif" alt="RSS Feed" title="RSS Feed" /></a> </div>
                <?php wp_nav_menu( array( 'container_id' => '', 'container_class' => 'menu', 'menu_id' => '', 'menu_class' => 'menu clearfix', 'theme_location' => 'primary' ) );
                ?>

                <div class="access-bottom"></div>
      </div><!-- #access -->
    </div><!-- #masthead -->
  </div><!-- #header -->


  <div id="main">

