<?php
/*
Template Name: Que es
*/
?>

<?php get_header(); ?>

    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top what-is"></div>
        <h1 class="title-section">
            <span>¿Qué es Parques Alegres?</span>
        </h1>
        <section id="historia-breve" class="section section--box">
            <h2 class="subtitle-section subtitle-section--box">Historia Breve</h2>
            <p>Parques Alegres inició con el interés de un grupo de ciudadanos interesados en la mejora de los parques. Después de haber sido consejeros de un gran parque por muchos años y haber participado en varios otros, decidieron utilizar su experiencia en apoyar más parques.</p>
            <p>La intención principal es aumentar la paz y la calidad de vida de las ciudades. Un parque activo disminuye drásticamente los delitos que se cometían en la zona, además de elevar el valor de todas las propiedades cercanas y la calidad de vida de los vecinos.</p>
            <p>Así fue como decidieron construir un sitio en Internet con las ideas exitosas de muchos parques, que con sus experiencias motivan y enseñan a los demás.</p>
            <span class="icon-box icon-box--time">&nbsp;</span>
        </section>
        <section id="porque-parques-alegres" class="section section--listing">
            <div class="section--listing__head">
                <div class="split">
                    <h2 class="split__title subtitle-section">¿Por qué Parques Alegres?</h2>
                    <span class="feature">
                        Haz clic en cada icono para conocer más
                        <i class="fa fa-chevron-down"></i>
                    </span>
                </div>
                <p>Por que los espacios públicos son lugares propicios para la sana convivencia familiar y vecinal, logrando así, ser áreas detonantes de desarrollo social, ya que se llevan a cabo actividades relacionadas con la cultura, el deporte, los valores y la recreación, propiciando una disminución de los índices delictivos dentro de la colonia.</p>
                <div class="tabs">
                    <div class="grid">
                        <div class="grid__item one-sixth">
                            <div class="tab">
                                <label for="desarrollo-social">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/img/icons/porque-parques/desarrollo-social.png" alt="Desarrollo Social" />
                                    Desarrollo Social
                                </label>
                            </div>
                        </div><!--

                     --><div class="grid__item one-sixth">
                            <div class="tab">
                                <label for="organizacion">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/img/icons/porque-parques/organizacion.png" alt="Organizacion" />
                                    Organización
                                </label>
                            </div>
                        </div><!--

                     --><div class="grid__item one-sixth">
                            <div class="tab">
                                <label for="convivencia">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/img/icons/porque-parques/convivencia.png" alt="Convivencia" />
                                    Convivencia
                                </label>
                            </div>
                        </div><!--

                     --><div class="grid__item one-sixth">
                            <div class="tab">
                                <label for="seguridad">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/img/icons/porque-parques/seguridad.png" alt="Seguridad" />
                                    Seguridad
                                </label>
                            </div>
                        </div><!--

                     --><div class="grid__item one-sixth">
                            <div class="tab">
                                <label for="compromiso-social">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/img/icons/porque-parques/compromiso-social.png" alt="Compromiso Social" />
                                    Compromiso Social
                                </label>
                            </div>
                        </div><!--

                     --><div class="grid__item one-sixth">
                            <div class="tab">
                                <label for="calidad-vida">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/img/icons/porque-parques/calidad-vida.png" alt="Calidad de vida" />
                                    Calidad de vida
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabs-content">
                    <div class="tab-content">
                        <input id="desarrollo-social" type="radio" name="tab-group-1" checked />
                        <div>
                            <p>Generación de desarrollo social (deporte, cultura y valores).</p>
                        </div>
                    </div>
                    <div class="tab-content">
                        <input id="organizacion" type="radio" name="tab-group-1" />
                        <div>
                            <p>Espacios más organizados.</p>
                        </div>
                    </div>
                    <div class="tab-content">
                        <input id="convivencia" type="radio" name="tab-group-1" />
                        <div>
                            <p>Lugares propicios para la promoción de la sana convivencia familiar y vecinal.</p>
                        </div>
                    </div>
                    <div class="tab-content">
                        <input id="seguridad" type="radio" name="tab-group-1" />
                        <div>
                            <p>Disminución de los índices de violencia dentro de la colonia.</p>
                        </div>
                    </div>
                    <div class="tab-content">
                        <input id="compromiso-social" type="radio" name="tab-group-1" />
                        <div>
                            <p>Sociedad proactiva y comprometida</p>
                        </div>
                    </div>
                    <div class="tab-content">
                        <input id="calidad-vida" type="radio" name="tab-group-1" />
                        <div>
                            <p>Un parque abandonado genera delincuentes y por el contrario un parque activo produce plusvalía en la zona, mayor calidad de vida, salud y muchos otros beneficios.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="bg">
            <img src="<?php echo get_template_directory_uri(); ?>/library/img/porque-parques.jpg" alt="¿Por qué Parques Alegres?" />
        </div>
        <section id="mision" class="section">
            <div class="mission">
                <h2 class="subtitle-section">Misión</h2>
                <p>Ofrecemos asesoría a comités para la mejora continua de sus parques.</p>
            </div>
        </section>
        <section id="testimonios-descripciones" class="section section--natural">
            <div class="testimonials">
                <h2 class="subtitle-section">Testimonios &amp; Descripciones</h2>
                <p><em>Miles de personas se han beneficiado mejorando sus espacios</em></p>
                <div class="video-gallery">
                    <div class="flexslider">
                         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                            <?php the_content(); ?>

                         <?php endwhile; else : ?>

                             <?php _e("Oops, Post Not Found!", "ParquesAlegres"); ?>

                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- //MAIN CONTENT// -->


<?php get_footer(); ?>
