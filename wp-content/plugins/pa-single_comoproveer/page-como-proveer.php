<?php
/*
Template Name: Como Proveer
*/
?>

<?php get_header(); ?>

    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-provide"></div>
        <h1 class="title-section">
            <span>¿Cómo proveer a un Parque?</span>
        </h1>
        <div class="providers">
            <p>Si tu empresa cuenta con productos o servicios que contribuyan a la mejora de los parques, te invitamos a que te registres como proveedor de Parques Alegres.</p>
        </div>
        <section id="registro-proveedor" class="section providers-registration">
            <h2 class="subtitle-section">Regístrate como Proveedor</h2>
            <div class="section--box">
                <?php echo do_shortcode('[contact-form-7 id="1139" title="Registrar Proveedor (productos y/o servicios para parques)"]') ?>
            </div>
        </section>
        <hr class="rule" />
        <section id="institucion" class="section">
            <h2 class="subtitle-section">Proveedores por tipo de Institución</h2>
            <div class="providers-container">
                <div class="tab-menu providers-menu">
                    <ul class="nav nav--stacked">
                        <li><label for="empresas">Empresas</label></li>
                        <li><label for="organizaciones">Organizaciones de la Sociedad Civil</label></li>
                        <!-- No hay info -->
                        <li><label for="camaras">Cámaras de Comercio</label></li>
                        <li>
                            Instituciones Educativas
                            <ul class="nav nav--stacked">
                                <li><label for="primaria">Primaria</label></li><!-- No hay info -->
                                <li><label for="secundaria">Secundaria</label></li><!-- No hay info -->
                                <li><label for="preparatoria">Preparatoria</label></li><!-- No hay info -->
                                <li><label for="universidad">Universidad</label></li>
                            </ul>
                        </li>
                        <li>
                            Gobierno
                            <ul class="nav nav--stacked">
                                <li><label for="federal">Federal</label></li><!-- No hay info -->
                                <li><label for="estatal">Estatal</label></li>
                                <li><label for="municipal">Municipal</label></li>
                            </ul>
                        </li>
                        <li><label for="personas">Personas Físicas</label></li><!-- No hay info -->
                    </ul>
                </div>
                <div class="providers-listing">
                    <div class="provider-list">
                        <input type="radio" id="empresas" name="tab-group-6" checked />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'empresa' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="organizaciones" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'organizaciones-de-la-sociedad-civil' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="camaras-de-comercio" name="tab-group-6" checked />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'camaras-de-comercio' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="primaria" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'primaria' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="secundaria" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'secundaria' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="preparatoria" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'preparatoria' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="universidad" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'universidad' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="federal" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'federal' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="estatal" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'estatal' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="municipal" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'municipal' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="personas" name="tab-group-6" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'personas-fisicas' ); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="provider-content">
                <div class="provider-info">

                </div>
            </div>
        </section>
        <hr class="rule" />
        <section id="producto-servicio" class="section">
            <h2 class="subtitle-section">Proveedores por tipo de Producto o Servicio</h2>
            <div class="providers-container">
                <div class="providers-menu">
                    <ul class="nav nav--stacked">
                        <li>
                            Infraestructura
                            <ul class="nav nav--stacked">
                                <li><label for="estructura">Estructura y Construcción</label></li>
                                <li><label for="deportivas">Áreas Deportivas</label></li><!-- No hay info -->
                            </ul>
                        </li>
                        <li><label for="areas-verdes">Áreas Verdes</label></li>
                        <li>
                            Deportes
                            <ul class="nav nav--stacked">
                                <li><label for="equipo-deportivo">Venta de Equipo</label></li>
                                <li><label for="clases">Clases</label></li>
                                <li><label for="eventos-deportivos">Eventos Deportivos</label></li>
                            </ul>
                        </li>
                        <li><label for="educacion">Educación</label></li>
                        <li><label for="eventos">Eventos</label></li>
                    </ul>
                </div>
                <div class="providers-listing">
                    <div class="provider-list">
                        <input type="radio" id="areas-verdes" name="tab-group-7" checked />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'areas-verdes' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="estructura" name="tab-group-7" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'estructura-y-construccion' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="deportivas" name="tab-group-7" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'areas-deportivas' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="equipo-deportivo" name="tab-group-7" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'venta-de-equipo' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="clases" name="tab-group-7" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'clases' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="eventos-deportivos" name="tab-group-7" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'eventos-deportivos' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="educacion" name="tab-group-7" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'educacion' ); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="provider-list">
                        <input type="radio" id="eventos" name="tab-group-7" />
                        <div>
                            <ul class="multi-list three-cols">
                                <?php get_template_part( 'partials/providers/cat/loop', 'eventos' ); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="provider-content">
                <div class="provider-info">

                </div>
            </div>
        </section>
        <hr class="rule" />
        <section id="listado-servicios-relacionados" class="section">
            <h2 class="subtitle-section">Listado de Productos o Servicios relacionados con los Parques</h2>
            <div class="related-services">
                <div class="grid">
                    <div class="grid__item one-third">
                        <p><strong>Cemento</strong></p>
                        <ul>
                            <li>Villalba</li>
                            <li>Construrama Materiales el Roble</li>
                            <li>Casa Solórzano</li>
                        </ul>
                    </div><!--

                 --><div class="grid__item one-third">
                        <p><strong>Acero</strong></p>
                        <ul>
                            <li>Fricalsin S.A. de C.V.</li>
                            <li>Geavy Herrería, Estructura y Construcción</li>
                            <li>3R Industrial Especialidades en Ing.</li>
                            <li>Fetoza</li>
                            <li>AM Aceros</li>
                            <li>Ferretería y tornillería Las Vegas</li>
                            <li>Herrería Xiconténcatl</li>
                            <li>Ferretería Gómez</li>
                            <li>Solur, S.A de C.V.</li>
                        </ul>
                    </div><!--

                 --><div class="grid__item one-third">
                        <p><strong>Jardinería</strong></p>
                        <ul>
                            <li>Solur, S.A de C.V.</li>
                            <li>Arte Verde</li>
                            <li>Ecopacific</li>
                            <li>agrícola de Servicios S.A de C.V.</li>
                            <li>Flora Urbana: Jardinería vertical &amp; Deco</li>
                            <li>Turbo - Cesped - Decojardín</li>
                            <li>Hidrosmart</li>
                            <li>DIMANT</li>
                        </ul>
                    </div><!--

                 --><div class="grid__item one-third">
                        <p><strong>Iluminación</strong></p>
                        <ul>
                            <li>Lámparas Ecológicas MHT</li>
                        </ul>
                    </div><!--

                 --><div class="grid__item one-third">
                        <p><strong>Juegos Infantiles</strong></p>
                        <ul>
                            <li>Estructuras de recreo Exterplay S.A. de C.V.</li>
                            <li>Herrería Xiconténcatl</li>
                        </ul>
                    </div><!--

                 --><div class="grid__item one-third">
                        <p><strong>Pintura</strong></p>
                        <ul>
                            <li>Villalba</li>
                            <li>Global de Occidente M&amp;C</li>
                        </ul>
                    </div><!--

                 --><div class="grid__item one-third">
                        <p><strong>Deportes</strong></p>
                        <ul>
                            <li>Importamos</li>
                            <li>impulsora Arbitral</li>
                            <li>Deportes Campos</li>
                            <li>Centro Integral de Enseñanza de Bateo</li>
                            <li>Rápido y de Alto Rendimiento</li>
                            <li>Instituto Sinaloense del Deporte y la Cultura Física</li>
                            <li>Project Two and Wellness</li>
                        </ul>
                    </div><!--

                 --><div class="grid__item one-third">
                        <p><strong>Eventos</strong></p>
                        <ul>
                            <li>Dorados de Sinaloa</li>
                            <li>Instituto de Ciencias y Artes Gastronómicas</li>
                            <li>Galo's Helados</li>
                            <li>Serpem</li>
                            <li>Jazte</li>
                            <li>Tu Even</li>
                            <li>Fruthos</li>
                            <li>Bebidas Mundiales S.A. de C.V.</li>
                        </ul>
                    </div><!--

                 --><div class="grid__item one-third">
                        <p><strong>Cursos y Talleres</strong></p>
                        <ul>
                            <li>Centro Integral  de Enseñanza de Bateo Rápido y de Alto Rendimiento</li>
                            <li>Fundación Sociedad Educadora de Sinaloa A.C.</li>
                            <li>Instituto MIA</li>
                            <li>Disciplina con Amor</li>
                            <li>Loditos Artesanos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- //MAIN CONTENT// -->


<?php get_footer(); ?>
