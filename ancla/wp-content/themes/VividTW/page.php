<?php get_header(); ?>
<div id="izq">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="post round_8" id="post-<?php the_ID(); ?>">
<h1><?php the_title(); ?></h1>
<div class="post_inner_wrap clearfix">
<?php the_content('Leer M&aacute;s'); ?>
</div><!--fin post_inner_wrap-->
</div><!--fin post-->
<?php endwhile; else : ?>
<h2 class="center">No se ha encontrado</h2>
<p class="center">Disculpa, pero est&aacute;s buscando algo que no se encuentra aqu&iacute;.</p>
<?php endif; ?>
</div><!-- fin izq-->
<?php get_sidebar(); ?>
<div class="clear"></div>
<?php get_footer(); ?>