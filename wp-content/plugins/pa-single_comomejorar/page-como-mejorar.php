<?php
/*
Template Name: Como Mejorar
*/
?>
<?php get_header(); ?>
<?php

?>
    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-provide"></div>
        <h1 class="title-section">
            <span>Ideas exitosas11111</span>
        </h1>
        <div>
            <p>Por medio de actividades tanto deportivas como culturales, los recursos económicos ayudarán a mantener el parque en buenas condiciones, así como lograr mejoras adicionales al espacio.</p>
        </div>
        <?php
		
		echo'<div class="buttons">
<a  id="showall">Todas las categorias</a>';
echo'
<a  class="showSingle" target="1">Torneos </a>
<a  class="showSingle" target="2">Tianguis </a>
<a  class="showSingle" target="3">Kermesse </a>
<a  class="showSingle" target="4">D&iacute;s Festivos </a>
<a  class="showSingle" target="5">Cooperaci&oacute;n vecinal </a>
<a  class="showSingle" target="6">Rifa </a>
<a  class="showSingle" target="7">Kermesse cultural </a>
<a  class="showSingle" target="8">Funci&oacute;n de cine</a>
<a  class="showSingle" target="9">Carrera pedestre</a>
<a  class="showSingle" target="10">Noche bohemia</a>
</div>';
echo'<div id="div1" class="targetDiv">';
?>
 <p>Competencias deportivas en las que participan varios equipos y se cobra un inscripción por participar.</p>
                        <ul class="testimonial-list">
                            <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "torneos" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
echo'</div>';

echo'<div id="div2" class="targetDiv">';
?>
 <p>Venta de artículos donados por el comité y vecinos.</p>
                    <ul class="testimonial-list">
                        <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "tianguis" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                    </ul>
			<?php
echo'</div>';

echo'<div id="div3" class="targetDiv">';
?>
 <p>Fiestas organizadas en los parques para generar ingresos por medio de la venta de comida y bebidas.</p>
                        <ul class="testimonial-list">
                            <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "kermesse" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
echo'</div>';

echo'<div id="div4" class="targetDiv">';
?>
  <p>Festejos de días especiales en el año, en donde se generan ingresos mediante la venta de alimentos y bebidas.</p>
                        <ul class="testimonial-list">
                            <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "dias-festivos" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
echo'</div>';

echo'<div id="div5" class="targetDiv">';
?>
  <p>Convocatoria a vecinos para la donación de una aportación económica, la cantidad recaudada es invertida en las mejoras del parque, para cumplir con los objetivos deseados.</p>
                        <ul class="testimonial-list">
                           <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "vecinos" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
echo'</div>';

echo'<div id="div6" class="targetDiv">';
?>
  <p>Venta de boletos para el sorteo de algún artículo (ej. tablets, minisplits, dinero, despensas, celulares).</p>
                        <ul class="testimonial-list">
                            <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "rifa" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
echo'</div>';

echo'<div id="div7" class="targetDiv">';
?>
 <div>
                        <p>Fiestas organizadas enlos parques y que además incluyen la participación de eventos culturales como danzas, canto, teatro.</p>
                        <ul class="testimonial-list">
                           <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "kermesse-cultural" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
echo'</div>';

echo'<div id="div8" class="targetDiv">';
?>
 <p></p>
                        <ul class="testimonial-list">
                           <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "cine" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
echo'</div>';

echo'<div id="div9" class="targetDiv">';
?>
  <p>Competencias en las cuales se cobra una cuota de inscripción para participar.</p>
                        <ul class="testimonial-list">
                            <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "carrera" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
echo'</div>';

echo'<div id="div10" class="targetDiv">';
?>
 <p>Convivencia en donde el principal atractivo es la presencia de algún grupo musical que amenice la noche, se venden boletos que incluyen cena y/o botanas.</p>
                        <ul class="testimonial-list">
                           <?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "noche-bohemia" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
                        </ul>
			<?php
//echo'</div></div>';
echo'</div>';
?>
    </div>
    <!-- //MAIN CONTENT// -->
<script>
    jQuery(function(){
         jQuery('#showall').click(function(){
               jQuery('.targetDiv').show();
        });
        jQuery('.showSingle').click(function(){
              jQuery('.targetDiv').hide();
              jQuery('#div'+$(this).attr('target')).show();
        });
});
    </script>

<?php get_footer(); ?>