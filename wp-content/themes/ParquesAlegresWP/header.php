<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <!--[if IE]>
    	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<!-- HEADER HOME -->
	<header class="main-header <?php if ( is_front_page() ) { echo 'home-header'; } ?>">

		<?php if ( is_front_page() ) { ?>
		<img width="1600" height="600" src="<?php echo get_template_directory_uri(); ?>/library/img/heading.jpg" alt="" class="banner" />
		<?php } ?>
			<div class="container soft--top cf">
	      	<a href="/" class="logo">
	      		<img src="<?php echo get_template_directory_uri(); ?>/library/img/logo<?php if ( is_front_page() ) { echo '-alt'; } ?>.png" alt="Parques Alegres - Dale vida a tu parque" />
	      	</a>
<a href="http://parquesalegres.org/experiencias-exitosas" class="faq <?php if ( is_front_page() ) { echo 'faq--alt'; } ?>"><span>Experiencias Exitosas</span></a>
	        <div class="tools">

	            <div class="educative-platform">
	                <a href="http://moodle.parquesalegres.org" target="_blank">
	                    <span>Plataforma Educativa</span>
	                    <span class="icon"><i class="fa fa-play"></i></span>
	                </a>
	            </div>

	            <div class="search">

<a href="http://parquesalegres.org/wp-login.php" class="faq <?php if ( is_front_page() ) { echo 'faq--alt'; } ?>"><span>Iniciar sesión</span></a>
<a href="http://parquesalegres.org/evaluacion/#localizar-parque" class="faq <?php if ( is_front_page() ) { echo 'faq--alt'; } ?>"><span>LOCALIZA TU PARQUE</span></a>

	                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Información de Parques' ) ) ); ?>#preguntas-frecuentes" class="faq <?php if ( is_front_page() ) { echo 'faq--alt'; } ?>">
	                    <span class="icon"><i class="fa fa-question-circle"></i></span>
	                    <span>Preguntas Frecuentes</span>
	                </a>
	                |
	                <?php get_search_form(); ?>
	            </div>
	        </div>

	        <?php  get_template_part( 'partials/nav', 'main' ); ?>

				<?php if ( is_front_page() ) { ?>

	        <div class="hero">
	            <h1 class="hero__title">¿Cómo Mejorar tu Parque?</h1>
	            <p class="hero__subtitle">Te asesoramos en conseguir y generar ingresos para mejorar tu parque</p>
	            <a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>" class="link hero__link">conoce más</a>
	        </div>

				<?php } ?>

	    </div>

	</header>
	<!-- //HEADER HOME// -->
