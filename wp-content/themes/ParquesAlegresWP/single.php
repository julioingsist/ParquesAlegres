<?php get_header(); ?>
<div class="main" id="content" role="main">
    <div class="top improve"></div>
    <div class="container" id="inner-content" >

    	 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    	 	<?php get_template_part( 'partials/loop', 'single' ); ?>

    	 <?php endwhile; else : ?>

    			<?php get_template_part( 'partials/content', 'missing' ); ?>

    	 <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
