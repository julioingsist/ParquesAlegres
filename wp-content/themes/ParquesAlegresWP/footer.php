<!-- SEÑOR FOOTER -->
    <footer class="main-footer">
        <!-- NEWS-->
        <div class="latest-news">
            <div class="container">
                <h3 class="title-news title-news--headline">
                    <i class="fa fa-comments fa-lg"></i>
                    &nbsp;
                    Últimas Noticias
                </h3>
                <div class="grid"><!--
			<?php $my_query = new WP_Query(array( 'post_type' => 'success_case', 'showposts'=>3, 'orderby'=>'asc'));
                        while ($my_query->have_posts()) : $my_query->the_post();
                        $do_not_duplicate = $post->ID; ?>
                    --><div class="grid__item one-third">
                            <article class="news" role="article" itemscope itemtype="http://schema.org/BlogPosting">
                                <header>
                                    <h4 class="title-news title-news--article"><?php the_title_attribute(); ?></h4>
                                    <time itemprop="dateCreated" datetime="2013-06-24"><?php echo get_the_date(); ?></time>
                                </header>
                                <p><?php echo get_the_excerpt(); ?></p>
                                <a href="<?php the_permalink() ?>" class="link link--natural">
                                    Ver más &nbsp;&nbsp; <i class="fa fa-chevron-right"></i>
                                </a>
                            </article>
                        </div><!--

                        <?php endwhile; ?>
              --></div>
            </div>
        </div>
        <!-- COPY INFO -->
        <div class="copy-info">
            <div class="container cf">
                <div class="split">
                    <div class="split__title">
                        <p class="copy">
                            <span>&COPY;2014 Parques Alegres</span>
                            <a href="http://anclastudio.com" target="_blank" class="link link--natural">Developer: AnclaStudio</a>
                        </p>
                    </div>
                    <div class="footer-links">
                        <ul class="nav nav--keywords">
                            <li>
                                <a href="http://parquesalegres.org/wp-login.php" class="link link--natural link--highlighted">Iniciar sesión</a>
                            </li>
<li>
                                <a href="http://moodle.parquesalegres.org" target="_blank" class="link link--natural link--highlighted">Plataforma Educativa</a>
                            </li>
                            <li>
                                <a href="http://parquesalegres.org/como-mejorar-tu-parque/" class="link link--natural link--highlighted">¿Cómo Ayudar?</a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Información de Parques' ) ) ); ?>#preguntas-frecuentes" class="link link--natural link--highlighted">Preguntas Frecuentes</a>
                            </li>
                            <li>
                                <a href="mailto:contacto@parquesalegres.org" class="link link--natural">
                                    <i class="fa fa-envelope"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/ParquesAlegres" target="_blank" class="link link--natural">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                                <a href="https://www.facebook.com/parquesalegres" target="_blank" class="link link--natural">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="https://www.youtube.com/user/ParquesAlegres" target="_blank" class="link link--natural">
                                    <i class="fa fa-youtube-square"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //SEÑOR FOOTER// -->
    <div class="fixed-tools">
        <div class="tools-group">
            <ul class="nav nav--stacked">
                <li><a href="http://www.facebook.com/parquesalegres" class="fixed-social" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
                <li><a href="http://twitter.com/ParquesAlegres" class="fixed-social" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
                <li><a href="http://www.youtube.com/channel/UCopPCW3OuDYALBCsDHBiISw" class="fixed-social" target="_blank"><i class="fa fa-lg fa-youtube"></i></a></li>
                <li><a href="mailto:contacto@parquesalegres.org" target="_blank" class="fixed-social"><i class="fa fa-envelope fa-lg"></i></a></li>
            </ul>
        </div>
        <div class="tools-group">
            <a href="http://parquesalegres.org/como-mejorar-tu-parque/"><img src="<?php echo get_template_directory_uri(); ?>/library/img/como-ayudar.jpg" alt="Como Ayudar"></a>
        </div>
    </div>

	<!-- all js scripts are loaded in library/joints.php -->
	<?php wp_footer(); ?>

	</body>

</html> <!-- end page -->