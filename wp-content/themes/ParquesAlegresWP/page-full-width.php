<?php
/*
Template Name: Ancho Completo (Sin Lateral)
*/
?>

<?php get_header(); ?>

<div class="main" role="main">

	<div id="content" class="container">

		 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		 	<?php get_template_part( 'partials/loop', 'page' ); ?>

		 <?php endwhile; else : ?>

				<?php get_template_part( 'partials/content', 'missing' ); ?>

		 <?php endif; ?>


	</div> <!-- end #content -->

</div> <!-- end #main -->

<?php get_footer(); ?>
