<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

			<!-- MAIN CONTENT -->
			<div class="main main-home" role="main">
			    <div class="container">
			        <div class="branding">
			            <div class="grid">
			                <div class="grid__item one-third">
			                    <div class="tile tile--blue">
			                        <h2 class="title-tile">¿Qué es <span>Parques Alegres?</span></h2>
			                        <p>Les asesoramos para darle más vida a tu parque, obtener ingresos y manejarlo mejor.</p>
			                    </div>
			                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Que es' ) ) ); ?>" class="link link--tile">Conoce Más &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
			                </div><!--

			             --><div class="grid__item one-third">
			                    <div class="tile tile--black tile--natural">
			                        <div class="video-container">
			                            <img src="<?php echo get_template_directory_uri(); ?>/library/img/video-home.jpg" alt="Video presentación Parques Alegres" />
			                            <span class="play-control js-play">
			                                <i class="fa fa-play-circle"></i>
			                            </span>
			                        </div>
			                    </div>
			                    <a href="#" class="link link--tile js-play">Ver Video &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
			                </div><!--

			             --><div class="grid__item one-third">
			                    <div class="tile tile--orange">
			                        <h2 class="title-tile">Registra <span>Tu Parque</span></h2>
			                        <p>Se parte de nuestra comunidad.</p>
			                        <br />
			                    </div>
			                    <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Registrar parque' ) ) ); ?>" class="link link--tile">Conoce Más &nbsp;&nbsp;<i class="fa fa-chevron-right"></i></a>
			                </div>
			            </div>
			            <img class="push--top soft--top" src="<?php echo get_template_directory_uri(); ?>/library/img/sponsors.png" alt="Nuestros patrocinadores" />
			        </div>
			    </div>
			    <hr class="rule" />

			    <!-- SOCIAL -->
			    <div class="container">
			        <div class="social">
			            <div class="grid">
			                <div class="grid__item one-half">
			                    <h2 class="title-social twitter">
			                        <i class="fa fa-twitter-square fa-lg"></i>
			                        Síguenos en Twitter
			                    </h2>
			                    <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/ParquesAlegres"  data-widget-id="452124731261476864">Tweets por @ParquesAlegres</a>
			                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			                </div><!--

			             --><div class="grid__item one-half">
			                    <h2 class="title-social facebook">
			                        <i class="fa fa-facebook-square fa-lg"></i>
			                        Encuéntranos en Facebook
			                    </h2>
			                    <div class="facebook-background">
			                        <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fparquesalegres&amp;width=400&amp;height=395&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=false&amp;appId=629441770445898" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:400px; height:325px;" allowTransparency="true"></iframe>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			    <!-- //SOCIAL// -->
			</div>
			<!-- //MAIN CONTENT// -->

<?php get_footer(); ?>
