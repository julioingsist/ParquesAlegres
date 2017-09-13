<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h1 class="content-title"><?php the_title(); ?></h1>
			
<p class="meta"><span class="date"><a href="<?php the_permalink() ?>"><?php the_time( get_option( 'date_format' ) ) ?></a></span> <span class="author"><?php the_author() ?></span> <span class="cats">

<?php
$the_categories = get_the_category();
$count=0;
if ($the_categories) {
	foreach($the_categories as $category) {
		$count++;
		if( $count > 1 ) echo ",&nbsp;";
		echo '<a href="'.get_category_link( $category->cat_ID ).'">'.$category->cat_name.'</a>';
	}
}
?>

						</span></p>			

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                <div class="clear"></div>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>				
									<p class="tags"> <span>
<?php
$posttags = get_the_tags();
$count=0;
if ($posttags) {
	foreach($posttags as $tag) {
		$count++;
		if( $count > 1 ) echo ",&nbsp;";
		echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
	}
}
?>
					</span></p>	
										
				<?php edit_post_link('Edit this entry.', '<p class="more">', '</p>'); ?>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>
