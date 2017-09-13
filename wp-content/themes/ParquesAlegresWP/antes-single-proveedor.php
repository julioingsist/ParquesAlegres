<?php
/*
This is the custom post type post template.
If you edit the post type name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom post type is called
register_post_type( 'bookmarks',
then your single template should be
single-bookmarks.php

*/
if ( !empty($_GET['ajax']) && $_GET['ajax'] == true ) {

      $post = get_post($_POST['id']);

      while (have_posts()) : the_post(); ?>

      <span class="close times" onClick="removeLightbox();return false;"><i class="fa fa-times"></i></span>
      <h3><?php the_title();?></h3>
      <?php if(get_post_meta($post->ID, "_provider_business_role", true)){ ?>
      <p>Giro: <?php echo get_post_meta($post->ID, "_provider_business_role", true); ?></p>
      <p>Descripción: <?php echo get_post_meta($post->ID, "_provider_description", true); ?></p>
      <p>Correo: <?php echo get_post_meta($post->ID, "_provider_email", true); ?></p>
      <p>Teléfono: <?php echo get_post_meta($post->ID, "_provider_phone", true); ?></p>
      <p>Contacto: <?php echo get_post_meta($post->ID, "_provider_contact", true); ?></p>
      <p>Dirección: <?php echo get_post_meta($post->ID, "_provider_address", true); ?></p>
      <a href="<?php echo get_permalink(); ?>" class="link link--natural">ver todos los datos</a>
     <?php }else{ ?>
      
      <p><?php echo get_post_field('post_content', $post->ID); ?></p>
      
     <?php } ?>

      <?php endwhile;?>

<?php } else { ?>

<?php get_header(); ?>
<div class="main" id="content" role="main">
    <div class="top improve"></div>
    <div class="container" id="inner-content" >

	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	    	<?php get_template_part( 'partials/loop', 'provider' ); ?>

	    <?php endwhile; else : ?>

	   		<?php get_template_part( 'partials/content', 'missing' ); ?>

	    <?php endif; ?>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>

<?php } ?>