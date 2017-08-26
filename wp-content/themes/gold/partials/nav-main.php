<nav class="main-nav <?php if ( is_front_page() ) { echo 'main-nav--alt'; } ?>">
  <ul class="nav multi-list five-cols">

    <?php if ( is_page_template('page-quees.php') ) { ?>

      <li class="flyout">
        <a href="#">¿Qué es Parques Alegres?</a>
        <ul class="nav nav--stacked flyout__content">
          <li><a href="#historia-breve">Historia Breve</a></li>
          <li><a href="#porque-parques-alegres">¿Por qué Parques Alegres?</a></li>
          <li><a href="#mision">Misión</a></li>
          <li><a href="#testimonios-descripciones">Testimonios y Descripciones</a></li>
        </ul>
      </li>

    <?php } else { ?>

      <li class="flyout">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Que es' ) ) ); ?>">¿Qué es Parques Alegres?</a>
        <ul class="nav nav--stacked flyout__content">
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Que es' ) ) ); ?>#historia-breve">Historia Breve</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Que es' ) ) ); ?>#porque-parques-alegres">¿Por qué Parques Alegres?</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Que es' ) ) ); ?>#mision">Misión</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Que es' ) ) ); ?>#testimonios-descripciones">Testimonios y Descripciones</a></li>
        </ul>
      </li>

    <?php } ?>
    <?php if ( is_page_template('page-como-mejorar.php') ) { ?>

      <li class="flyout green">
        <a href="#">¿Cómo mejorar tu parque?</a>
        <ul class="nav nav--stacked flyout__content">
          <li><a href="#crear-comite">Cómo crear un Comité</a></li>
          <li><a href="#generar-ingresos">Generar Ingresos</a></li>
          <li><a href="#apoyo-gobierno-empresas">Apoyo de Gobierno y Empresas</a></li>
          <li><a href="#crear-mantener-areas-verdes">Crear y mantener áreas verdes</a></li>
          <li><a href="#orden">Orden dentro del Parque</a></li>
          <li><a href="#organizacion">Cómo Organizarse</a></li>
          <li><a href="#ayudar">Aporta una idea</a></li>
          <li><a href="#ayudar">Registra tu Parque</a></li>
          <li><a href="#ayudar">Apoya un Parque</a></li>
        </ul>
      </li>

    <?php } else { ?>

      <li class="flyout green">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>">¿Cómo mejorar tu parque?</a>
        <ul class="nav nav--stacked flyout__content">
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#crear-comite">Cómo crear un Comité</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#generar-ingresos">Generar Ingresos</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#apoyo-gobierno-empresas">Apoyo de Gobierno y Empresas</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#crear-mantener-areas-verdes">Crear y mantener áreas verdes</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#orden">Orden dentro del Parque</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#organizacion">Cómo Organizarse</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#ayudar">Aporta una idea</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#ayudar">Registra tu Parque</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo mejorar tu parque?' ) ) ); ?>#ayudar">Apoya un Parque</a></li>
        </ul>
      </li>

    <?php } ?>
    <?php if ( is_page_template('page-como-apoyar.php') ) { ?>

      <li class="flyout orange">
        <a href="#">¿Cómo apoyar a un parque?</a>
        <ul class="nav nav--stacked flyout__content">
          <li><a href="#voluntariado">Voluntariado</a></li>
          <li><a href="#empresarial">Empresas, Dinero o especie</a></li>
          <li><a href="#instituciones">Instituciones</a></li>
          <li><a href="#personal">Personal</a></li>
          <li><a href="#fundaciones">Fundaciones</a></li>
        </ul>
      </li>

    <?php } else { ?>

      <li class="flyout orange">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo apoyar a un parque?' ) ) ); ?>">¿Cómo apoyar a un parque?</a>
        <ul class="nav nav--stacked flyout__content">
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo apoyar a un parque?' ) ) ); ?>#voluntariado">Voluntariado</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo apoyar a un parque?' ) ) ); ?>#empresarial">Empresas, Dinero o especie</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo apoyar a un parque?' ) ) ); ?>#instituciones">Instituciones</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo apoyar a un parque?' ) ) ); ?>#personal">Personal</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo apoyar a un parque?' ) ) ); ?>#fundaciones">Fundaciones</a></li>
        </ul>
      </li>

    <?php } ?>
    <?php if ( is_page_template('page-como-proveer.php') ) { ?>

      <li class="flyout red">
        <a href="#">¿Cómo proveer un parque?</a>
        <ul class="nav nav--stacked flyout__content">
          <li><a href="#registro-proveedor">Registrate como proveedor</a></li>
          <li><a href="#institucion">Por Institución</a></li>
          <li><a href="#producto-servicio">Por tipo de producto o servicio</a></li>
          <li><a href="#listado-servicios-relacionados">Listado de productos o servicios relacionados con los parques</a></li>
        </ul>
      </li>

    <?php } else { ?>

      <li class="flyout red">
        <a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo proveer un parque?' ) ) ); ?>">¿Cómo proveer un parque?</a>
        <ul class="nav nav--stacked flyout__content">
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo proveer un parque?' ) ) ); ?>#registro-proveedor">Registrate como proveedor</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo proveer un parque?' ) ) ); ?>#institucion">Por Institución</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo proveer un parque?' ) ) ); ?>#producto-servicio">Por tipo de producto o servicio</a></li>
          <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( '¿Cómo proveer un parque?' ) ) ); ?>#listado-servicios-relacionados">Listado de productos o servicios relacionados con los parques</a></li>
        </ul>
      </li>

    <?php } ?>
    <?php if ( is_page_template('page-informacion-parques.php') ) { ?>

      <li class="flyout blue">
          <a href="#">Información de parques</a>
          <ul class="nav nav--stacked flyout__content">
              <li><a href="#localizar-parque">Localiza tu Parque</a></li>
              <li><a href="#proyectos-realizados">Proyectos realizados</a></li>
              <li><a href="#preguntas-frecuentes">Preguntas Frecuentes</a></li>
              <li><a href="#enlaces">Links de interés</a></li>
          </ul>
      </li>

    <?php } else { ?>

      <li class="flyout blue">
          <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Información de Parques' ) ) ); ?>">Información de parques</a>
          <ul class="nav nav--stacked flyout__content">
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Información de Parques' ) ) ); ?>#localizar-parque">Localiza tu Parque</a></li>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Información de Parques' ) ) ); ?>#proyectos-realizados">Proyectos realizados</a></li>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Información de Parques' ) ) ); ?>#preguntas-frecuentes">Preguntas Frecuentes</a></li>
              <li><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Información de Parques' ) ) ); ?>#enlaces">Links de interés</a></li>
          </ul>
      </li>

    <?php } ?>

  </ul>
</nav>
