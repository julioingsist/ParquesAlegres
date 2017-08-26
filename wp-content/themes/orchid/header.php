<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Le styles -->
   <link href="<?php echo get_stylesheet_uri();?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>> 



<!--start: Container -->
<div class="container theme-header">
    
    <div class="row" >
        

        <div class="span3" >
            <div class="padding-large">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php header_image(); ?>"  alt="<?php echo get_bloginfo( 'name'); ?> " />                    
                </a>
            </div>
        </div>
        
        <div class="span6" >
            <?php get_sidebar('headcenter'); ?>
        </div>
        
        <div class="span3" >
            <?php get_sidebar('headright'); ?>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            
                <div class="navbar" >
                    <div class="navbar-inner">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>   
                        <div class="nav-collapse collapse">
                            <?php wp_nav_menu( array(
                              'theme_location' => 'header-menu',
                              'depth'      => 10,
                              'container'  => '',
                              'container_class'  => '',
                              'menu_class' => 'nav nav-pills',
                              'fallback_cb' => 'orchid_HeaderNavFallback', /* menu fallback */
                               'walker' => new twitter_bootstrap_nav_walker(),
                              )
                             );
                            ?>
                            <div class="navbar-search pull-right">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>              
                </div>
                        
        </div>

    </div>
     

               
    <!--end: Navigation-->
</div>
<!--end: Container-->



