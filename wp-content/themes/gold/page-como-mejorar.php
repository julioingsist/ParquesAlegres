<?php
/*
Template Name: Como Mejorar
*/
?>
<?php get_header(); ?>

<style>
    .testimonial-list {
  list-style: none;
  margin-left: 0;
}
.testimonial-lists {
  list-style: none;
  margin-left: 0;
}
.testimonial-list p {
  font-size: 13px;
  padding: 0;
  margin-bottom: 5px;
  margin-right: 5px;
}

.testimonial-list > li {
  float: left;
  width: 100%;
  margin-left: 0px;
  margin-top: 30px;
}
.testimonial-lists > li {
  float: left;
    width: auto;
}
.testimonial-lists p {
  font-size: 13px;
  padding: 0;
  margin-bottom: 5px;
  text-align: center;
}
.imgBoxinc1 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/1.png) no-repeat; background-position: center;}
.imgBoxinc1:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/1.png) no-repeat; background-position: center;}
.imgBoxinc2 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/22.png) no-repeat; background-position: center;}
.imgBoxinc2:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/22.png) no-repeat; background-position: center;}
.imgBoxinc3 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/2.png) no-repeat; background-position: center;}
.imgBoxinc3:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/2.png) no-repeat; background-position: center;}
.imgBoxinc4 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/3.png) no-repeat; background-position: center;}
.imgBoxinc4:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/3.png) no-repeat; background-position: center;}
.imgBoxinc5 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/4.png) no-repeat; background-position: center;}
.imgBoxinc5:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/4.png) no-repeat; background-position: center;}
.imgBoxinc6 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/5.png) no-repeat; background-position: center;}
.imgBoxinc6:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/5.png) no-repeat; background-position: center;}
.imgBoxinc7 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/21.png) no-repeat; background-position: center;}
.imgBoxinc7:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/21.png) no-repeat; background-position: center;}
.imgBoxinc8 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/6.png) no-repeat; background-position: center;}
.imgBoxinc8:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/6.png) no-repeat; background-position: center;}
.imgBoxinc9 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/7.png) no-repeat; background-position: center;}
.imgBoxinc9:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/7.png) no-repeat; background-position: center;}
.imgBoxinc10 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/8.png) no-repeat; background-position: center;}
.imgBoxinc10:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/8.png) no-repeat; background-position: center;}
.imgBoxmai11 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/9.png) no-repeat; background-position: center;}
.imgBoxmai11:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/9.png) no-repeat; background-position: center;}
.imgBoxmai12 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/10.png) no-repeat; background-position: center;}
.imgBoxmai12:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/10.png) no-repeat; background-position: center;}
.imgBoxmai13 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/11.png) no-repeat; background-position: center;}
.imgBoxmai13:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/11.png) no-repeat; background-position: center;}
.imgBoxmai14 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/12.png) no-repeat; background-position: center;}
.imgBoxmai14:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/12.png) no-repeat; background-position: center;}
.imgBoxmai15 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/13.png) no-repeat; background-position: center;}
.imgBoxmai15:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/13.png) no-repeat; background-position: center;}
.imgBoxmai16 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/22.png) no-repeat; background-position: center;}
.imgBoxmai16:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/22.png) no-repeat; background-position: center;}
.imgBoxmai17 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/8.png) no-repeat; background-position: center;}
.imgBoxmai17:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/8.png) no-repeat; background-position: center;}
.imgBoxmai18 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/14.png) no-repeat; background-position: center;}
.imgBoxmai18:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/14.png) no-repeat; background-position: center;}
.imgBoxmai19 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/21.png) no-repeat; background-position: center;}
.imgBoxmai19:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/21.png) no-repeat; background-position: center;}
.imgBoxmai20 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/15.png) no-repeat; background-position: center;}
.imgBoxmai20:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/15.png) no-repeat; background-position: center;}
.imgBoxmai21 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/16.png) no-repeat; background-position: center;}
.imgBoxmai21:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/16.png) no-repeat; background-position: center;}
.imgBoxmai22 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/17.png) no-repeat; background-position: center;}
.imgBoxmai22:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/17.png) no-repeat; background-position: center;}
.imgBoxmai23 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/18.png) no-repeat; background-position: center;}
.imgBoxmai23:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/18.png) no-repeat; background-position: center;}
.imgBoxmai24 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/19.png) no-repeat; background-position: center;}
.imgBoxmai24:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/19.png) no-repeat; background-position: center;}
.imgBoxmai25 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/20.png) no-repeat; background-position: center;}
.imgBoxmai25:hover { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/20.png) no-repeat; background-position: center;}
.imgBoxmai26 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/24.png) no-repeat; background-position: center;}
.imgBoxmai27 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/26.png) no-repeat; background-position: center;}
.imgBoxmai28 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/25.png) no-repeat; background-position: center;}
.imgBoxmai29 { width: 125px; height: 125px; background: url(http://parquesalegres.org/wp-content/themes/gold/library/img/icons/ieparques/15.png) no-repeat; background-position: center;}
.grid {
  margin-left: -23px;
  list-style: none;
  margin-bottom: 0;
}
.tabs-content{
    padding: 300px;
    margin-left: -260px;
    margin-bottom: -200px;
}
.tabs-content2{
  padding: 100px;
   margin-left: -160px;
}
.bg {
  position: relative;
  margin-left: -100px;
}
</style>
    <!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-provide"></div>
        <h1 class="title-section">
            <span><?php the_title(); ?></span>
        </h1>
        <div>
            <h2>¿Qué es una experiencia exitosa?</h2>
            <p>Una actividad que es un modelo o ejemplo a seguir con impacto positivo en la comunidad.<br>
            <i>¡Te gustaría formar parte de una experiencia exitosa en tu parque!<br><br>
            En este espacio te decimos algunas de las actividades que puedes realizar en tu parque. Se divide en cinco secciones; cada una incluye algunas experiencias exitosas compartidas por comités que se encuentran activos. Sigue su ejemplo y apoya a un parque.</i></p>
        </div>
        <?php
		echo'<div style="clear:both;">
            <h2>Generar ingresos y tejido social</h2>
            </div>
        <div class="grid">';
//<a  id="showall">Todas las categorias</a>
$catexp=array("torneos","tianguis","kermesse","dias-festivos","vecinos","rifa","kermesse-cultural","cine","carrera","noche-bohemia","arborizacion-fertilizacion",
              "limpieza","riego","fumigacion","poda","futbol","torneos2","campamentos","halloween","posadas","dia-de-reyes","dia-del-padre","dia-de-la-candelaria",
              "dia-madres-nino","dia-de-muertos","guardianes","convivios-recreativos","pintura","luces","murales","reciclaje","agua","ayuntamiento","empresa","orden");
foreach($catexp as $v){
    $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => -1, "tag" => "'.$v.'" );
    $loop = new WP_Query( $args );
    $count[$v]=$loop->found_posts;    
}
echo'
<ul class="testimonial-lists">
<li><a class="button" id="showdiv1"><div class="imgBoxinc10"></div><p>Torneos('.$count['torneos'].')</p></a></li>
<li><a class="button" id="showdiv2"><div class="imgBoxinc9"></div><p>Tianguis('.$count['tianguis'].')</p></a></li>
<li><a class="button" id="showdiv3"><div class="imgBoxinc8"></div><p>Kermesse('.$count['kermesse'].')</p></a></li>
<li><a class="button" id="showdiv4"><div class="imgBoxinc7"></div><p>D&iacute;as Festivos('.$count['dias-festivos'].')</p></a></li>
<li><a class="button" id="showdiv5"><div class="imgBoxinc6"></div><p>Cooperaci&oacute;n vecinal('.$count['vecinos'].')</p></a></li>
<li><a class="button" id="showdiv6"><div class="imgBoxinc5"></div><p>Rifa('.$count['rifa'].')</p></a></li>
<li><a class="button" id="showdiv7"><div class="imgBoxinc4"></div><p>Kermesse cultural('.$count['kermesse-cultural'].')</p></a></li>
<li><a class="button" id="showdiv8"><div class="imgBoxinc3"></div><p>Funci&oacute;n de cine('.$count['cine'].')</p></a></li>
<li><a class="button" id="showdiv9"><div class="imgBoxinc2"></div><p>Carrera pedestre('.$count['carrera'].')</p></a></li>
<li><a class="button" id="showdiv10"><div class="imgBoxinc1"></div><p>Noche bohemia('.$count['noche-bohemia'].')</p></a></li>
</ul>
</div>';
echo'<div class="tabs-content">
<div id="div1" style="display:none;">';
?>
<h2>Torneos</h2>
 <p>Competencias deportivas en las que participan varios equipos y se cobra un inscripción por participar.</p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "torneos" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=torneos">Ver más</a>';
}
echo'</div>';

echo'<div id="div2" style="display:none;">';
?>
<h2>Tianguis</h2>
 <p>Venta de artículos donados por el comité y vecinos.</p>
                        <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "tianguis" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=tianguis">Ver más</a>';
}
echo'</div>';

echo'<div id="div3" style="display:none;">';
?>
<h2>Kermesse</h2>
 <p>Fiestas organizadas en los parques para generar ingresos por medio de la venta de comida y bebidas.</p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "kermesse" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=kermesse">Ver más</a>';
}
echo'</div>';

echo'<div id="div4" style="display:none;">';
?>
<h2>D&iacute;as Festivos</h2>
  <p>Festejos de días especiales en el año, en donde se generan ingresos mediante la venta de alimentos y bebidas.</p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "dias-festivos" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=dias-festivos">Ver más</a>';
}
echo'</div>';

echo'<div id="div5" style="display:none;">';
?>
<h2>Cooperaci&oacute;n Vecinal</h2>
  <p>Convocatoria a vecinos para la donación de una aportación económica, la cantidad recaudada es invertida en las mejoras del parque, para cumplir con los objetivos deseados.</p>
                           <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "vecinos" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=vecinos">Ver más</a>';
}
echo'</div>';

echo'<div id="div6" style="display:none;">';
?>
<h2>Rifa</h2>
  <p>Venta de boletos para el sorteo de algún artículo (ej. tablets, minisplits, dinero, despensas, celulares).</p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "rifa" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=rifa">Ver más</a>';
}
echo'</div>';

echo'<div id="div7" style="display:none;">';
?>
<h2>Kermesse cultural</h2>
                        <p>Fiestas organizadas enlos parques y que además incluyen la participación de eventos culturales como danzas, canto, teatro.</p>
                           <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "kermesse-cultural" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=kermesse-cultural">Ver más</a>';
}
echo'</div>';

echo'<div id="div8" style="display:none;">';
?>
<h2>Funci&oacute;n de cine</h2>
 <p></p>
                           <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "cine" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=cine">Ver más</a>';
}
echo'</div>';

echo'<div id="div9" style="display:none;">';
?>
<h2>Carrera pedestre</h2>
  <p>Competencias en las cuales se cobra una cuota de inscripción para participar.</p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "carrera" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=carrera">Ver más</a>';
}
echo'</div>';

echo'<div id="div10" style="display:none;">';
?>
<h2>Noche bohemia</h2>
 <p>Convivencia en donde el principal atractivo es la presencia de algún grupo musical que amenice la noche, se venden boletos que incluyen cena y/o botanas.</p>
                           <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "noche-bohemia" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=noche-bohemia">Ver más</a>';
}
//echo'</div></div>';
echo'</div>';
?>
    </div>
    <div class="bg" style="clear:both;"></div>
    <!-------------------------------------------------Div de areas verdes-------------------------------------------------------------->
     <div style="clear:both;">
            <h2>Crear y mantener &aacute;reas verdes</h2>
            <p>En esta secci&oacute;n encontrar&aacute;s ideas y ejemplos que los comit&eacute;s y vecinos han implementado para la creaci&oacute;n y el mantenimiento de las &aacute;reas verdes de su parque:</p>
        </div>
        <?php
		
		echo'<div class="grid">';
//<a  id="showall">Todas las categorias</a>
echo'
<ul class="testimonial-lists">
<li><a class="button" id="showdiv11"><div class="imgBoxmai11"></div><p>Arborizaci&oacute;n y Fertilizaci&oacute;n('.$count['arborizacion-fertilizacion'].')</p></a></li>
<li><a class="button" id="showdiv12"><div class="imgBoxmai12"></div><p>Jornadas de limpieza('.$count['limpieza'].')</p></a></li>
<li><a class="button" id="showdiv13"><div class="imgBoxmai13"></div><p>Riego('.$count['riego'].')</p></a></li>
<li><a class="button" id="showdiv14"><div class="imgBoxmai14"></div><p>Fumigaci&oacute;n('.$count['fumigacion'].')</p></a></li>
<li><a class="button" id="showdiv15"><div class="imgBoxmai15"></div><p>Poda('.$count['poda'].')</p></a></li>
</ul>
</div>';
echo'<div class="bg" style="clear:both;"></div><div class="tabs-content2">
<div id="div11" style="display:none;">';
?>
<h2>Arborizaci&oacute;n y Fertilizaci&oacute;n</h2>
 <p></p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "arborizacion-fertilizacion" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=arborizacion-feritilizacion">Ver más</a>';
}
echo'</div>';

echo'<div id="div12" style="display:none;">';
?>
<h2>Jornadas de limpieza</h2>
 <p></p>
                        <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "limpieza" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=limpieza">Ver más</a>';
}
echo'</div>';

echo'<div id="div13" style="display:none;">';
?>
<h2>Riego</h2>
 <p></p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "riego" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=riego">Ver más</a>';
}
echo'</div>';

echo'<div id="div14" style="display:none;">';
?>
<h2>Fumigaci&oacute;n</h2>
  <p></p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "fumigacion" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=fumigacion">Ver más</a>';
}
echo'</div>';

echo'<div id="div15" style="display:none;">';
?>
<h2>Poda</h2>
  <p></p>
                           <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "poda" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=poda">Ver más</a>';
}
echo'</div>';
?>
    </div>
    <!-------------------------------------------------fin de div de areas verdes------------------------------------------------------->
    <div class="bg" style="clear:both;"></div>
    <!-------------------------------------------------Div de organización-------------------------------------------------------------->
     <div style="clear:both;">
            <h2>Organizaci&oacute;n</h2>
            <p></p>
        </div>
        <?php
		
		echo'<div class="grid">';
//<a  id="showall">Todas las categorias</a>
echo'
<ul class="testimonial-lists">
<li><a class="button" id="showdiv16"><div class="imgBoxmai16"></div><p>Cl&iacute;nica de verano de f&uacute;tbol infantil('.$count['futbol'].')</p></a></li>
<li><a class="button" id="showdiv17"><div class="imgBoxmai17"></div><p>Torneos('.$count['torneos2'].')</p></a></li>
<li><a class="button" id="showdiv18"><div class="imgBoxmai18"></div><p>Campamentos('.$count['campamentos'].')</p></a></li>';
$total=$count['halloween']+$count['posadas']+$count['dia-de-reyes']+$count['dia-del-padre']+$count['dia-de-la-candelaria']+$count['dia-madres-nino']+$count['dia-de-muertos'];
echo '<li><a class="button" id="showdiv19"><div class="imgBoxmai19"></div><p>Eventos en d&iacute;as festivos('.$total.')</p></a></li>
<li><a class="button" id="showdiv20"><div class="imgBoxmai20"></div><p>Club guardianes del parque('.$count['guardianes'].')</p></a></li>
<li><a class="button" id="showdiv21"><div class="imgBoxmai21"></div><p>Convivios recreativos('.$count['convivios-recreativos'].')</p></a></li>
<li><a class="button" id="showdiv22"><div class="imgBoxmai22"></div><p>Pintura('.$count['pintura'].')</p></a></li>
<li><a class="button" id="showdiv23"><div class="imgBoxmai23"></div><p>Alumbrado('.$count['luces'].')</p></a></li>
<li><a class="button" id="showdiv24"><div class="imgBoxmai24"></div><p>Murales('.$count['murales'].')</p></a></li>
<li><a class="button" id="showdiv25"><div class="imgBoxmai25"></div><p>Reciclaje('.$count['reciclaje'].')</p></a></li>
<li><a class="button" id="showdiv26"><div class="imgBoxmai26"></div><p>Agua('.$count['agua'].')</p></a></li>
</ul>
</div>';

echo'<div class="bg" style="clear:both;"></div><div class="tabs-content2">
<div id="div16" style="display:none;">';
?>
<h2>Cl&iacute;nica de verano de f&uacute;tbol infantil</h2>
 <p></p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "futbol" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=futbol">Ver más</a>';
}
echo'</div>';

echo'<div id="div17" style="display:none;">';
?>
<h2>Torneos</h2>
 <p></p>
                        <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "torneos2" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=torneos2">Ver más</a>';
}
echo'</div>';

echo'<div id="div18" style="display:none;">';
?>
<h2>Campamentos</h2>
 <p></p>
                            <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "campamentos" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
            
        </li>

    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=campamentos">Ver más</a>';
}
echo'</div>';

echo'<div id="div19" style="display:none;">';
?>
<h2>Eventos en d&iacute;as festivos</h2>
  <p></p>
    <ul class="testimonial-list" >
        <?php
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "halloween" );
        $loop = new WP_Query( $args );
        if(have_posts()){
            echo '<li>
                <p><strong>Halloween</strong></p>
                <ul style="list-style: circle;">';
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
                    </li>
                <?php wp_reset_query(); ?>
                <?php endwhile;
                echo '</ul>
                <br>
                <br><a href="http://parquesalegres.org/list-experiencias/?tag=halloween">Ver más</a>
            </li>';
        }
        ?>
        <?php
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "posadas" );
        $loop = new WP_Query( $args );
        if(have_posts()){
            echo '<li>
                <p><strong>Posadas:</strong></p>
                <ul style="list-style: circle;">';
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
                    </li>
                <?php wp_reset_query(); ?>
                <?php endwhile;
                echo '</ul>
                <br>
                <br><a href="http://parquesalegres.org/list-experiencias/?tag=posadas">Ver más</a>
            </li>';
        }
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "dia-de-reyes" );
        $loop = new WP_Query( $args );
        if(have_posts()){
            echo '<li>
                <p><strong>Día de Reyes</strong></p>
                <ul style="list-style: circle;">';
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
                    </li>
                <?php wp_reset_query(); ?>
                <?php endwhile;
                echo '</ul>
                <br>
                <br><a href="http://parquesalegres.org/list-experiencias/?tag=dia-de-reyes">Ver más</a>
            </li>';
        }
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "dia-del-padre" );
        $loop = new WP_Query( $args );
        if(have_posts()){
            echo '<li>
                <p><strong>Día del Padre</strong></p>
                <ul style="list-style: circle;">';
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
                    </li>
                <?php wp_reset_query(); ?>
                <?php endwhile;
                echo '</ul>
                <br>
                <br><a href="http://parquesalegres.org/list-experiencias/?tag=dia-del-padre">Ver más</a>
            </li>';
        }
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "dia-de-la-candelaria" );
        $loop = new WP_Query( $args );
        if(have_posts()){
            echo '<li>
                <p><strong>Día de la Candelaria</strong></p>
                <ul style="list-style: circle;">';
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
                    </li>
                <?php wp_reset_query(); ?>
                <?php endwhile;
                echo '</ul>
                <br>
                <br><a href="http://parquesalegres.org/list-experiencias/?tag=dia-de-la-candelaria">Ver más</a>
            </li>';
        }
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "dia-madres-nino" );
        $loop = new WP_Query( $args );
        if(have_posts()){
            echo '<li>
                <p><strong>Día de las Madres y Día del Niño</strong></p>
                <ul style="list-style: circle;">';
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
                    </li>
                <?php wp_reset_query(); ?>
                <?php endwhile;
                echo '</ul>
                <br>
                <br><a href="http://parquesalegres.org/list-experiencias/?tag=dia-madres-nino">Ver más</a>
            </li>';
        }
        $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "dia-de-muertos" );
        $loop = new WP_Query( $args );
        if(have_posts()){
            echo '<li>
                <p><strong>Día de los Muertos</strong></p>
                <ul style="list-style: circle;">';
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <li>
                        <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
                    </li>
                <?php wp_reset_query(); ?>
                <?php endwhile;
                echo '</ul>
                <br>
                <br><a href="http://parquesalegres.org/list-experiencias/?tag=dia-de-muertos">Ver más</a>
            </li>';
        }
        ?>
    </ul>
<?php
echo'</div>';

echo'<div id="div20" style="display:none;">';
?>
<h2>Club guardianes del parque</h2>
<p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "guardianes" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=guardianes">Ver más</a>';
}
echo'</div>';
echo'<div id="div21" style="display:none;">';
?>
<h2>Convivios recreativos</h2>
<p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "convivios-recreativos" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=convivios-recreativos">Ver más</a>';
}
echo'</div>';
echo'<div id="div22" style="display:none;">';
?>
<h2>Pintura</h2>
<p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "pintura" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=pintura">Ver más</a>';
}
echo'</div>';
echo'<div id="div23" style="display:none;">';
?>
<h2>Alumbrado</h2>
<p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "luces" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=luces">Ver más</a>';
}
echo'</div>';
echo'<div id="div24" style="display:none;">';
?>
<h2>Murales</h2>
  <p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "murales" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=murales">Ver más</a>';
}
echo'</div>';
echo'<div id="div25" style="display:none;">';
?>
<h2>Reciclaje</h2>
  <p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "reciclaje" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=reciclaje">Ver más</a>';
}
echo'</div>';
echo'<div id="div26" style="display:none;">';
?>
<h2>Agua</h2>
  <p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "agua" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=agua">Ver más</a>';
}
echo'</div>';
?>
    </div>
    <!-------------------------------------------------fin de div de organización------------------------------------------------------->    
    <div class="bg" style="clear:both;"></div>
    <!-------------------------------------------------Div de gestión-------------------------------------------------------------->
     <div style="clear:both;">
            <h2>Gesti&oacute;n</h2>
            <p></p>
        </div>
        <?php
		
		echo'<div class="grid">';
//<a  id="showall">Todas las categorias</a>
echo'
<ul class="testimonial-lists">
<li><a class="button" id="showdiv27"><div class="imgBoxmai27"></div><p>Honorable Ayuntamiento('.$count['ayuntamiento'].')</p></a></li>
<li><a class="button" id="showdiv28"><div class="imgBoxmai28"></div><p>Empresa('.$count['empresa'].')</p></a></li>
</ul>
</div>';

echo'<div class="bg" style="clear:both;"></div><div class="tabs-content2">
<div id="div27" style="display:none;">';
?>
<h2>Honorable Ayuntamiento</h2>
 <p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "ayuntamiento" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=ayuntamiento">Ver más</a>';
}
echo'</div>';

echo'<div id="div28" style="display:none;">';
?>
<h2>Empresa</h2>
 <p></p>
                        <?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "empresa" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=empresa">Ver más</a>';
}
echo'</div>';
?>
    </div>
    <!-------------------------------------------------fin de div de gestión------------------------------------------------------->
    <div class="bg" style="clear:both;"></div>
    <!-------------------------------------------------Div de orden-------------------------------------------------------------->
     <div style="clear:both;">
            <h2>Orden</h2>
            <p></p>
        </div>
        <?php
		
		echo'<div class="grid">';
//<a  id="showall">Todas las categorias</a>
echo'
<ul class="testimonial-lists">
<li><a class="button" id="showdiv29"><div class="imgBoxmai29"></div><p>Orden('.$count['orden'].')</p></a></li>
</ul>
</div>';

echo'<div class="bg" style="clear:both;"></div><div class="tabs-content2">
<div id="div29" style="display:none;">';
?>
<h2>Orden</h2>
 <p></p>
<?php
$args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => 5, "tag" => "orden" );
$loop = new WP_Query( $args );
if(have_posts()){
    echo '<ul class="testimonial-list" style="list-style: circle;">';
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <li>
            <p><a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a></p>
        </li>
    <?php wp_reset_query(); ?>
    <?php endwhile;
    echo '</ul>
    <br>
    <br><a href="http://parquesalegres.org/list-experiencias/?tag=orden">Ver más</a>';
}
echo'</div>';
?>
    </div>
    <!-------------------------------------------------fin de div de orden------------------------------------------------------->
   <div class="bg">
    <img src="http://parquesalegres.anclastudio.com/wp-content/themes/ParquesAlegresWP/library/img/apoyo-gobiernos.jpg" alt="Apoyo de Gobiernos y Empresas">
    </div>
    
    </div>
    <!-- //MAIN CONTENT// -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#showdiv1').click(function(){
            $('div[id^=div]').hide();
            $('#div1').show();
        });
        $('#showdiv2').click(function(){
            $('div[id^=div]').hide();
            $('#div2').show();
        });
        
        $('#showdiv3').click(function(){
            $('div[id^=div]').hide();
            $('#div3').show();
        });
        
        $('#showdiv4').click(function(){
            $('div[id^=div]').hide();
            $('#div4').show();
        });
        $('#showdiv5').click(function(){
            $('div[id^=div]').hide();
            $('#div5').show();
        });
        $('#showdiv6').click(function(){
            $('div[id^=div]').hide();
            $('#div6').show();
        });
        $('#showdiv7').click(function(){
            $('div[id^=div]').hide();
            $('#div7').show();
        });
        $('#showdiv8').click(function(){
            $('div[id^=div]').hide();
            $('#div8').show();
        });
        $('#showdiv9').click(function(){
            $('div[id^=div]').hide();
            $('#div9').show();
        });
        $('#showdiv10').click(function(){
            $('div[id^=div]').hide();
            $('#div10').show();
        });
        $('#showdiv11').click(function(){
            $('div[id^=div]').hide();
            $('#div11').show();
        });
        $('#showdiv12').click(function(){
            $('div[id^=div]').hide();
            $('#div12').show();
        });
        $('#showdiv13').click(function(){
            $('div[id^=div]').hide();
            $('#div13').show();
        });
        $('#showdiv14').click(function(){
            $('div[id^=div]').hide();
            $('#div14').show();
        });
        $('#showdiv15').click(function(){
            $('div[id^=div]').hide();
            $('#div15').show();
        });
        $('#showdiv16').click(function(){
            $('div[id^=div]').hide();
            $('#div16').show();
        });
        $('#showdiv17').click(function(){
            $('div[id^=div]').hide();
            $('#div17').show();
        });
        $('#showdiv18').click(function(){
            $('div[id^=div]').hide();
            $('#div18').show();
        });
        $('#showdiv19').click(function(){
            $('div[id^=div]').hide();
            $('#div19').show();
        });
        $('#showdiv20').click(function(){
            $('div[id^=div]').hide();
            $('#div20').show();
        });
        $('#showdiv21').click(function(){
            $('div[id^=div]').hide();
            $('#div21').show();
        });
        $('#showdiv22').click(function(){
            $('div[id^=div]').hide();
            $('#div22').show();
        });
        $('#showdiv23').click(function(){
            $('div[id^=div]').hide();
            $('#div23').show();
        });
        $('#showdiv24').click(function(){
            $('div[id^=div]').hide();
            $('#div24').show();
        });
        $('#showdiv25').click(function(){
            $('div[id^=div]').hide();
            $('#div25').show();
        });
        $('#showdiv26').click(function(){
            $('div[id^=div]').hide();
            $('#div26').show();
        });
        $('#showdiv27').click(function(){
            $('div[id^=div]').hide();
            $('#div27').show();
        });
        $('#showdiv28').click(function(){
            $('div[id^=div]').hide();
            $('#div28').show();
        });
        $('#showdiv29').click(function(){
            $('div[id^=div]').hide();
            $('#div29').show();
        });
    });
</script>

<?php get_footer(); ?>