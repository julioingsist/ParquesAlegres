<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lt ie 8]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/ie7.css" type="text/css" /><![endif]-->
<!--[if lt ie 7]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/ie6.css" type="text/css" /><![endif]-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="header">
	<p class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /> <?php bloginfo('name'); ?></a> <?php bloginfo('description'); ?></p>
	
	<div class="header-menu">
		<?php wp_nav_menu( array('fallback_cb' => 'naturefox_page_menu', 'menu' => 'primary', 'depth' => '3', 'theme_location' => 'primary', 'link_before' => '<span><span>', 'link_after' => '</span></span>') ); ?>
	</div>
</div>

<div class="cbox">
	<div class="content">
		<div class="main">				
