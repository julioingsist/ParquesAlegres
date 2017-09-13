<?php get_header(); ?>
<div id="izq">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="post round_8" id="post-<?php the_ID(); ?>">
<h1><a title="Enlace Permanente a <?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<ul class="the_post_meta">
	<li>Publicado por: <strong><?php the_author_posts_link(); ?></strong> el</li>
    <li><?php the_time('j') ?> de <?php the_time('F') ?> de <?php the_time('Y') ?></li>
    <li>en <?php the_category(', '); ?></li>
    <li><?php edit_post_link('Editar', ' | ', ''); ?></li>
	<li><span class="right ncomments"><?php comments_popup_link('0 Comentarios', '1 Comentario', '% Comentarios'); ?></span></li>
</ul><!--fin the_post_meta-->
<div class="post_inner_wrap clearfix">
<?php the_content('Leer M&aacute;s'); ?>
</div><!--fin post_inner_wrap-->
<div class="divisor"></div>
<ul class="social">
    <li class="twitter"><a rel="nofollow" title="Comparte este art&iacute;culo en Twitter" href="http://twitter.com/home?status=<?php the_title(); ?>+&raquo;+<?php the_permalink() ?>">Comparte este art&iacute;culo en Twitter</a></li>
	<li class="facebook"><a rel="nofollow" title="Comparte este art&iacute;culo en Facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>">Comparte este art&iacute;culo en Facebook</a></li>
    <li class="delicious"><a rel="nofollow" title="Marca este art&iacute;culo en Delicious" href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">Marca este art&iacute;culo en Delicious</a></li>
	<li class="googlebookmark"><a rel="nofollow" title="Comparte este art&iacute;culo en Google Bookmarks" href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">Comparte este art&iacute;culo en Google Bookmarks</a></li>
    <li class="stumbleupon"><a rel="nofollow" title="Comparte este art&iacute;culo en StumbleUpon" href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">Comparte este art&iacute;culo en StumbleUpon</a></li>
	<li class="technorati"><a rel="nofollow" title="Comparte este art&iacute;culo en Technorati" href="http://technorati.com/faves?add=<?php the_permalink(); ?>">Comparte este art&iacute;culo en Technorati</a></li>
</ul><!--fin social-->
</div><!--fin post-->
<?php endwhile; ?>
<div class="pagination clearfix">
	<div class="alignright"><?php next_posts_link('Entradas anteriores &rarr;') ?></div>
	<div class="alignleft"><?php previous_posts_link('&larr; Entradas recientes') ?></div>
</div><!--Termina pagination-->
<?php else : ?>
<h2 class="center">No se ha encontrado</h2>
<p class="center">Disculpa, pero est&aacute;s buscando algo que no se encuentra aqu&iacute;.</p>
<?php endif; ?>
</div><!-- fin izq-->
<?php get_sidebar(); ?>
<div class="clear"></div>
<?php get_footer(); ?>