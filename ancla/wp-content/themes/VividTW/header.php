<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
    <?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
    <?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Resultados de la B&uacute;squeda<?php } ?>
    <?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archivos de Autor<?php } ?>
    <?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
    <?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
    <?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archivo&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
    <?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archivo&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
    <?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archivo de Etiquetas&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>
<?php
	//SEO meta info
	if( is_home() ) {
		//Muestra la meta description si existe
		if(get_option('vividtw_home_description')) {
			echo "<meta name=\"description\" content=\"" . get_option('vividtw_home_description') . "\" />\n";
		}
		//Muestra la meta keywords si existe
		if(get_option('vividtw_home_keywords')) {
			echo "<meta name=\"keywords\" content=\"" . get_option('vividtw_home_keywords') . "\" />\n";
		}
	} else {
		//Si el SEO en las páginas y artículos es seleccionado...
		if(get_option('vividtw_seo_meta') == 'true') {
			//Muestra la meta description si existe
			$meta_description = get_post_meta($post->ID, 'seo-description_value', true);
			if($meta_description) {
				echo "<meta name=\"description\" content=\"" . $meta_description . "\" />\n";
			}
			//Muestra la meta keywords si existe
			$meta_keywords = get_post_meta($post->ID, 'seo-keywords_value', true);
			if($meta_keywords) {
				echo "<meta name=\"keywords\" content=\"" . $meta_keywords . "\" />\n";
			}
		}
	}
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<!--CSS dependiendo del Estilo escogido-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/<?php if(get_option('vividtw_theme_style')) { echo get_option('vividtw_theme_style'); } else { echo "style1"; } ?>.css" type="text/css" media="screen" />
<link href="<?php favicon_url(); ?>" rel="shortcut icon" type="image/x-icon"/>
<link href="<?php echo favicon_url(); ?>" rel="icon" type="image/x-icon"/>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php feedburner(); ?>" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tabs.js"></script>
<!--[if lt IE 7]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/unitpngfix.js"></script>
<![endif]-->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!-- Beautiful design by Diego Castillo - http://www.trazos-web.com -->
</head>
<body>
<div id="main">
    <div class="container">
		<div id="header">
    		<div id="logo">
   	 			<h2><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h2>
                <span class="description"><em><?php bloginfo('description'); ?></em></span>
    		</div><!--fin logo-->
    		<div id="search">
    			<form id="frm_search" method="get" action="<?php bloginfo('url'); ?>">
				<fieldset>
				<input type="text" onclick="if(this.value == 'Ingresa tu b&uacute;squeda') this.value='';" onblur="if(this.value.length == 0) this.value='Ingresa tu b&uacute;squeda';" name="s" value="Ingresa tu b&uacute;squeda" class=""/>
				<button class="search_button" type="submit" value="Go" name=""></button>
				</fieldset>
				</form>
    		</div><!--fin search-->
            <div class="clear"></div>
    	</div><!--end header -->
        <ul id="navigation">
    		<li <?php if ( is_home() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Inicio</a></li>
			<?php wp_list_pages('sort_column=menu_order&title_li=&depth=1'); ?>
    	</ul><!--fin navigation-->
        <div id="content" class="clearfix">