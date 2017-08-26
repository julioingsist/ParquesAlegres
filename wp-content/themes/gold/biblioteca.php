<?php
/*
* Template Name: Blog Educacion
*/
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header(); 
echo '<style>
.postsm{
  display:inline-block;
  width:30%;
  vertical-align:top;
  height:360px;
  max-height:360px;
  margin-right:5px;
}
.excerptt p{
  text-align:justify;
}
a.button {
    text-decoration: none;
    color: initial;
    background: #9DC45F;
    border: none;
    padding: 5px 20px 5px 20px;
    color: #FFF;
    box-shadow: 1px 1px 5px #B6B6B6;
    border-radius: 3px;
    text-shadow: 1px 1px 1px #9E3F3F;
    cursor: pointer;
}
a.button:hover {
    background: #80A24A;
}
}
</style>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">  
$(function() { 
});
function cambio(u){
  if(u==1){
    $("#todos").show().css("display", "inline-block");
    $("#revistas").hide();
    $("#videos").hide();
    $("#hemeroteca").hide();
    $("#ponencia").hide();
    $("#libros").hide();
    $("#blog").hide();
    $("#todos1").show().css("display", "inline-block");
    $("#revistas1").hide();
    $("#videos1").hide();
    $("#hemeroteca1").hide();
    $("#ponencia1").hide();
    $("#libros1").hide();
    $("#blog1").hide();
  }
  else if(u==2){
    $("#todos").hide();
    $("#bienvenida").hide();
    $("#categorias").show();
    $("#revistas").show().css("display", "inline-block");
    $("#videos").hide();
    $("#hemeroteca").hide();
    $("#ponencia").hide();
    $("#libros").hide();
    $("#blog").hide();
    $("#todos1").hide();
    $("#revistas1").show().css("display", "inline-block");
    $("#videos1").hide();
    $("#hemeroteca1").hide();
    $("#ponencia1").hide();
    $("#libros1").hide();
    $("#blog1").hide();
  }
  else if(u==3){
    $("#todos").hide();
    $("#revistas").hide();
    $("#videos").show().css("display", "inline-block");
    $("#hemeroteca").hide();
    $("#ponencia").hide();
    $("#libros").hide();
    $("#blog").hide();
    $("#todos1").hide();
    $("#revistas1").hide();
    $("#videos1").show().css("display", "inline-block");
    $("#hemeroteca1").hide();
    $("#ponencia1").hide();
    $("#libros1").hide();
    $("#blog1").hide();
  }
  else if(u==4){
    $("#todos").hide();
    $("#revistas").hide();
    $("#videos").hide();
    $("#hemeroteca").show().css("display", "inline-block");
    $("#ponencia").hide();
    $("#libros").hide();
    $("#blog").hide();
    $("#todos1").hide();
    $("#revistas1").hide();
    $("#videos1").hide();
    $("#hemeroteca1").show().css("display", "inline-block");
    $("#ponencia1").hide();
    $("#libros1").hide();
    $("#blog1").hide();
  }
  else if(u==5){
    $("#todos").hide();
    $("#revistas").hide();
    $("#videos").hide();
    $("#hemeroteca").hide();
    $("#ponencia").show().css("display", "inline-block");
    $("#libros").hide();
    $("#blog").hide();
    $("#todos1").hide();
    $("#revistas1").hide();
    $("#videos1").hide();
    $("#hemeroteca1").hide();
    $("#ponencia1").show().css("display", "inline-block");
    $("#libros1").hide();
    $("#blog1").hide();
  }
  else if(u==6){
    $("#todos").hide();
    $("#revistas").hide();
    $("#videos").hide();
    $("#hemeroteca").hide();
    $("#ponencia").hide();
    $("#libros").hide();
    $("#blog").show().css("display", "inline-block");
    $("#todos1").hide();
    $("#revistas1").hide();
    $("#videos1").hide();
    $("#hemeroteca1").hide();
    $("#ponencia1").hide();
    $("#libros1").hide();
    $("#blog1").show().css("display", "inline-block");
  }
  else{
    $("#todos").hide();
    $("#revistas").hide();
    $("#videos").hide();
    $("#hemeroteca").hide();
    $("#ponencia").hide();
    $("#blog").hide();
    $("#libros").show().css("display", "inline-block");
    $("#todos1").hide();
    $("#revistas1").hide();
    $("#videos1").hide();
    $("#hemeroteca1").hide();
    $("#ponencia1").hide();
    $("#blog1").hide();
    $("#libros1").show().css("display", "inline-block");
  }
}
</script>';

echo '<div class="row">
  <div class="col-lg-12 col-sm-12">
    <div class="page-header">
      <h1><a href="'; the_permalink(); echo '">'; the_title(); echo'</a></h1> 

<!----Parques Alegres te da la más cordial bienvenida a nuestro
      blog, un medio para expresar y compartir información y
      puntos de vista.
      <br><br>
      Este medio te mantendrá al tanto de temas relacionados
      con parques y espacios públicos como son: áreas verdes,
      árboles nativos de la comunidad donde vives, tipos de
      parques, temas de participación ciudadana, sustentabilidad
      de un parque y ámbito educativo.
      <br><br>
      Esperamos que encuentres lo que estás buscando y si no es
      así, te invitamos para que nos dejes tus comentarios y
      sugerencias.
      <br><br>
      Gracias por tu visita. <br>----->
      <!----<h3>Comentarios</h3>
      <div class="comentarios"></div>---->

 
    </div>
    <div class="post-content" style="clear:both">
    <div style="float:left;width:20%;">
      <!--<a href="javascript:void(0);" onclick="cambio(2);"><div style="vertical-align:middle;display:inline;"><img src="http://parquesalegres.org/wp-content/uploads/2015/10/4.1.png"/></div>
      Revistas digitales</a>
      <br><br>-->
      <!--<a href="javascript:void(0);" onclick="cambio(6);"><div style="vertical-align:middle;display:inline;"><img src="http://parquesalegres.org/wp-content/uploads/2015/10/2.1.png"/></div>
      Blog</a>
      <br><br>-->
      <a href="javascript:void(0);" onclick="cambio(3);"><a href="http://parquesalegres.org/uncategorized/videos/"><div style="vertical-align:middle;display:inline;"><img src="http://parquesalegres.org/wp-content/uploads/2016/05/8_6__Video.png"/></div>
      Videos</a>
      <br><br>
      <!---<a href="javascript:void(0);" onclick="cambio(4);">---><a href="http://parquesalegres.org/hemeroteca/"><div style="vertical-align:middle;display:inline;"><img src="http://parquesalegres.org/wp-content/uploads/2015/10/1.1.png"/></div>
      Hemeroteca</a>
      <!---<a href="javascript:void(0);" onclick="cambio(5);">---><a href="http://parquesalegres.org/ponencias/"><div style="vertical-align:middle;display:inline;"><img src="http://parquesalegres.org/wp-content/uploads/2015/05/8.1.png"/></div>
      Ponencia</a>
      <br><br>
    </div>
    <div id="todos" style="display:inline-block;width:58%;vertical-align:top;">
      <h2 style="float:left;">Últimas públicaciones</h2><h2 style="float:right;"><a href="http://parquesalegres.org/cat/biblioteca/">Ver todas</a></h2><div style="clear:both;"></div>';
      $args = array( 'post_status' => 'publish', 'post_type' => 'post', 'category_name'=>"Biblioteca", 'posts_per_page' => 3, "orderby" => "date", "order"=> "DESC" );
      $loop = new WP_Query( $args );
      if(have_posts()){
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="postsm">
              <?php echo '<center><div style="line-height:160px;width:150px;height:160px;">
              <a style="text-decoration:none;" href="'; echo get_permalink(); echo '">
              <img style="max-height:160px;" src="'.obtener_primer_imagen().'">
              </div></center>'; ?> <br>
              <div class="excerptt" style="height:170px;max-height:170px;overflow:hidden;">
              <?php the_title('<center><h4>','</h4></center>'); ?><?php the_excerpt(); ?></div></a>
              <p align="center">&nbsp;<a class="button" href="<?php echo get_permalink(); ?>">Ver más</a></p>
            </div>
            <?php wp_reset_query(); ?>
          <?php endwhile;
          echo '<br>
          <br>';
      }
      echo '<div style="clear:both;"></div>
    </div>
    <div id="revistas" style="display:none;width:58%;vertical-align:top;">
      <h2 style="float:left;">Últimas públicaciones</h2><h2 style="float:right;"><a href="http://parquesalegres.org/cat/biblioteca/revistas/">Ver todas</a></h2><div style="clear:both;"></div>';
      $args = array( 'post_status' => 'publish', 'post_type' => 'post', 'category_name'=>"Revistas", 'posts_per_page' => 3, "orderby" => "date", "order"=> "DESC" );
      $loop = new WP_Query( $args );
      if(have_posts()){
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="postsm">
              <?php echo '<center><div style="line-height:160px;width:150px;height:160px;">
              <a style="text-decoration:none;" href="'; echo get_permalink(); echo '">
              <img style="max-height:160px;" src="'.obtener_primer_imagen().'">
              </div></center>'; ?> <br>
              <div class="excerptt" style="height:170px;max-height:170px;overflow:hidden;">
              <?php the_title('<center><h4>','</h4></center>'); ?> <?php the_excerpt(); ?></div></a>
              <p align="center">&nbsp;<a class="button" href="<?php echo get_permalink(); ?>">Ver más</a></p>
            </div>
            <?php wp_reset_query(); ?>
          <?php endwhile;
          echo '<br>
          <br>';
      }
      echo '<div style="clear:both;"></div>
    </div>
    <div id="videos" style="display:none;width:58%;vertical-align:top;">
      <h2>Últimas públicaciones</h2>';
      $args = array( 'post_status' => 'publish', 'post_type' => 'post', 'category_name'=>"Videos", 'posts_per_page' => 3, "orderby" => "date", "order"=> "DESC" );
      $loop = new WP_Query( $args );
      if(have_posts()){
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="postsm">
              <?php echo '<center><div style="line-height:160px;width:150px;height:160px;">
              <a style="text-decoration:none;" href="'; echo get_permalink(); echo '">
              <img style="max-height:160px;" src="'.obtener_primer_imagen().'">
              </div></center>'; ?> <br>
              <div class="excerptt" style="height:170px;max-height:170px;overflow:hidden;">
              <?php the_title('<center><h4>','</h4></center>'); ?> <?php the_excerpt(); ?></div></a>
              <p align="center">&nbsp;<a class="button" href="<?php echo get_permalink(); ?>">Ver más</a></p>
            </div>
            <?php wp_reset_query(); ?>
          <?php endwhile;
          echo '<br>
          <br>';
      }
      echo '<div style="clear:both;"></div>
    </div>
    <div id="hemeroteca" style="display:none;width:58%;vertical-align:top;">
      <h2>Últimas públicaciones</h2>';
      $args = array( 'post_status' => 'publish', 'post_type' => 'post', 'category_name'=>"Hemeroteca", 'posts_per_page' => 3, "orderby" => "date", "order"=> "DESC" );
      $loop = new WP_Query( $args );
      if(have_posts()){
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="postsm">
              <?php echo '<center><div style="line-height:160px;width:150px;height:160px;">
              <a style="text-decoration:none;" href="'; echo get_permalink(); echo '">
              <img style="max-height:160px;" src="'.obtener_primer_imagen().'">
              </div></center>'; ?> <br>
              <div class="excerptt" style="height:170px;max-height:170px;overflow:hidden;">
              <?php the_title('<center><h4>','</h4></center>'); ?> <?php the_excerpt(); ?></div></a>
              <p align="center">&nbsp;<a class="button" href="<?php echo get_permalink(); ?>">Ver más</a></p>
            </div>
            <?php wp_reset_query(); ?>
          <?php endwhile;
          echo '<br>
          <br>';
      }
      echo '<div style="clear:both;"></div>
    </div>
    <div id="ponencia" style="display:none;width:58%;vertical-align:top;">
      <h2>Últimas públicaciones</h2>';
      $args = array( 'post_status' => 'publish', 'post_type' => 'post', 'category_name'=>"Ponencia", 'posts_per_page' => 3, "orderby" => "date", "order"=> "DESC" );
      $loop = new WP_Query( $args );
      if(have_posts()){
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="postsm">
              <?php echo '<center><div style="line-height:160px;width:150px;height:160px;">
              <a style="text-decoration:none;" href="'; echo get_permalink(); echo '">
              <img style="max-height:160px;" src="'.obtener_primer_imagen().'">
              </div></center>'; ?> <br>
              <div class="excerptt" style="height:170px;max-height:170px;overflow:hidden;">
              <?php the_title('<center><h4>','</h4></center>'); ?> <?php the_excerpt(); ?></div></a>
              <p align="center">&nbsp;<a class="button" href="<?php echo get_permalink(); ?>">Ver más</a></p>
            </div>
            <?php wp_reset_query(); ?>
          <?php endwhile;
          echo '<br>
          <br>';
      }
      echo '<div style="clear:both;"></div>
    </div>
    <div id="libros" style="display:none;width:58%;vertical-align:top;">
      <h2>Últimas públicaciones</h2>';
      $args = array( 'post_status' => 'publish', 'post_type' => 'post', 'category_name'=>"Libros", 'posts_per_page' => 3, "orderby" => "date", "order"=> "DESC" );
      $loop = new WP_Query( $args );
      if(have_posts()){
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="postsm">
              <?php echo '<center><div style="line-height:160px;width:150px;height:160px;">
              <a style="text-decoration:none;" href="'; echo get_permalink(); echo '">
              <img style="max-height:160px;" src="'.obtener_primer_imagen().'">
              </div></center>'; ?> <br>
              <div class="excerptt" style="height:170px;max-height:170px;overflow:hidden;">
              <?php the_title('<center><h4>','</h4></center>'); ?> <?php the_excerpt(); ?></div></a>
              <p align="center">&nbsp;<a class="button" href="<?php echo get_permalink(); ?>">Ver más</a></p>
            </div>
            <?php wp_reset_query(); ?>
          <?php endwhile;
          echo '<br>
          <br>';
      }
      echo '<div style="clear:both;"></div>
    </div>
    <div id="blog" style="display:none;width:58%;vertical-align:top;">
      <h2 style="float:left;">Últimas públicaciones</h2><h2 style="float:right;"><a href="http://parquesalegres.org/cat/biblioteca/blog/">Ver todas</a></h2><div style="clear:both;"></div>';
      $args = array( 'post_status' => 'publish', 'post_type' => 'post', 'category_name'=>"Blog", 'posts_per_page' => 3, "orderby" => "date", "order"=> "DESC" );
      $loop = new WP_Query( $args );
      if(have_posts()){
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="postsm">
              <?php echo '<center><div style="line-height:160px;width:150px;height:160px;">
              <a style="text-decoration:none;" href="'; echo get_permalink(); echo '">
              <img style="max-height:160px;" src="'.obtener_primer_imagen().'">
              </div></center>'; ?> <br>
              <div class="excerptt" style="height:170px;max-height:170px;overflow:hidden;">
              <?php the_title('<center><h4>','</h4></center>'); ?> <?php the_excerpt(); ?></div></a>
              <p align="center">&nbsp;<a class="button" href="<?php echo get_permalink(); ?>">Ver más</a></p>
            </div>
            <?php wp_reset_query(); ?>
          <?php endwhile;
          echo '<br>
          <br>';
      }
      echo '<div style="clear:both;"></div>
    </div>
    <!-- <div id="bienvenida" style="float:right;width:20%;vertical-align:top;">
      <p align="justify">Parques Alegres te da la más cordial bienvenida a nuestro
      blog, un medio para expresar y compartir información y
      puntos de vista.
      <br><br>
      Este medio te mantendrá al tanto de temas relacionados
      con parques y espacios públicos como son: áreas verdes,
      árboles nativos de la comunidad donde vives, tipos de
      parques, temas de participación ciudadana, sustentabilidad
      de un parque y ámbito educativo.
      <br><br>
      Esperamos que encuentres lo que estás buscando y si no es
      así, te invitamos para que nos dejes tus comentarios y
      sugerencias.
      <br><br>
      Gracias por tu visita.</p> <br>
    </div>
          <div id="categorias" style="display:none;float:right;width:20%;vertical-align:top;">
          <h2>Categor&iacute;as</h2>
          <ul>
          <li>Desarrollo sustentable. (5)</li>
          <li>Educación ambiental.</li>
          <li>Infraestructura.</li>
          </ul>
          </div> -->
    <div id="todos1" style="display:inline-block;width:58%;vertical-align:top;">
      <h2>Lo más leído</h2>';
      if (function_exists('ppw_get_popular_posts')) ppw_get_popular_posts("range=all&stats_views=1&stats_comments=0limit=3&category=259");
      echo '<div style="clear:both;"></div>
    </div>
    <div id="revistas1" style="display:none;width:58%;vertical-align:top;">
      <h2>Lo más leído</h2>';
      if (function_exists('ppw_get_popular_posts')) ppw_get_popular_posts("range=all&stats_views=1&stats_comments=0&limit=3&category=260");
      echo '<div style="clear:both;"></div>
    </div>
    <div id="blog1" style="display:none;width:58%;vertical-align:top;">
      <h2>Lo más leído</h2>';
      if (function_exists('ppw_get_popular_posts')) ppw_get_popular_posts("range=all&stats_views=1&stats_comments=0&limit=3&category=272");
      echo '<div style="clear:both;"></div>
    </div>
    <div id="videos1" style="display:none;width:58%;vertical-align:top;">
      <h2>Lo más leído</h2>';
      if (function_exists('ppw_get_popular_posts')) ppw_get_popular_posts("range=all&stats_views=1&stats_comments=0&limit=3&category=262");
      echo '<div style="clear:both;"></div>
    </div>
    <div id="hemeroteca1" style="display:none;width:58%;vertical-align:top;">
      <h2>Lo más leído</h2>';
      if (function_exists('ppw_get_popular_posts')) ppw_get_popular_posts("range=all&stats_views=1&stats_comments=0&limit=3&category=261");
      echo '<div style="clear:both;"></div>
    </div>
    <div id="ponencia1" style="display:none;width:58%;vertical-align:top;">
      <h2>Lo más leído</h2>';
      if (function_exists('ppw_get_popular_posts')) ppw_get_popular_posts("range=all&stats_views=1&stats_comments=0&limit=3&category=263");
      echo '<div style="clear:both;"></div>
    </div>
    <div id="libros1" style="display:none;width:58%;vertical-align:top;">
      <h2>Lo más leído</h2>';
      if (function_exists('ppw_get_popular_posts')) ppw_get_popular_posts("range=all&stats_views=1&stats_comments=0&limit=3&category=264");
      echo '<div style="clear:both;"></div>
    </div>
  </div>';
?>
<?php get_footer();?>
