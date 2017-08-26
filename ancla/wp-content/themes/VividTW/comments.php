<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Por favor no cargues esta p&aacute;gina directamente. Gracias!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">Este art&iacute;culo est&aacute; protegido con contrase&ntilde;a. Ingresa la contrase&ntilde;a para ver los comentarios.</p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
<div id="comments_wrap">
<?php if ( have_comments() ) : ?>
	<h2><?php comments_number('No hay Comentarios', 'Hay un Comentario', 'Hay % Comentarios' );?> en &#8220;<?php the_title(); ?>&#8221;</h2>
	<ol class="commentlist">
	<?php wp_list_comments('avatar_size=48&callback=custom_comment&type=comment'); ?>
	</ol>    
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
		<div class="fix"></div>
	</div>
	<br />
	<?php if ( $comments_by_type['pings'] ) : ?>
    <h2 id="pings">Trackbacks/Pingbacks</h2>
    <ol class="pinglist">
    <?php wp_list_comments('callback=custom_comment&type=pings'); ?>
    </ol>
    <?php endif; ?>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Los comentarios est&aacute;n cerrados.</p>
	<?php endif; ?>
<?php endif; ?>
</div> <!-- end #comments_wrap -->
<?php if ('open' == $post->comment_status) : ?>
<div id="respond">
<h2><?php comment_form_title( 'Deja un Comentario', 'D&eacute;jale un Comentario a %s' ); ?></h2>
<div class="cancel-comment-reply">
	<p><small><?php cancel_comment_reply_link(); ?></small></p>
</div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Debes <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">ingresar</a> para publicar un comentario.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p>Has ingresado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="Salir de esta cuenta">Salir &raquo;</a></p>
<?php else : ?>
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /><label for="author"><small><strong>Nombre</strong> <?php if ($req) echo "(requerido)"; ?></small></label></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /><label for="email"><small><strong>Mail</strong> (no ser&aacute; publicado) <?php if ($req) echo "(requerido)"; ?></small></label></p>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /><label for="url"><small><strong>Website</strong></small></label></p>
<?php endif; ?>
<!--<p><small><strong>XHTML:</strong> Puedes utilizar las siguientes etiquetas: <?php echo allowed_tags(); ?></small></p>-->
<p><textarea name="comment" id="comment" style="width:97%;" rows="10" tabindex="4"></textarea></p>
<p><input name="submit" type="submit" id="submit" style="width:30%;" tabindex="5" value="Publica tu Comentario" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; // If logged in ?>
<div class="fix"></div>
</div> <!-- end #respond -->
<?php endif; // if you delete this the sky will fall on your head ?>