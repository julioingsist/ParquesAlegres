<?php
/*
Template Name: Alta Parques
*/
?>

<?php get_header(); ?>

    <!-- MAIN CONTENT -->
   <div class="main" role="main">
       <div class="top bg-improve"></div>
       <h1 class="title-section">
           <span>Registro de Parque</span>
       </h1>

       <div class="park-registration">
           <div class="section section--box">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif ; ?>
           </div>
       </div>
   </div>
    <!-- //MAIN CONTENT// -->


<?php get_footer(); ?>
