<?php get_header(); ?>


			<?php if (have_posts()) : ?>
		
				<?php while (have_posts()) : the_post(); ?>
					<!-- Start: Post -->
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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

						    <?php the_post_thumbnail(); ?>
							<?php the_excerpt(); ?>
							<p class="more"><a href="<?php the_permalink() ?>"><?php _e( 'More', 'naturefox' );?></a></p>

						
						


					<p class="tags"><span class="comments"><?php if ( comments_open() ) :
					 comments_popup_link('0', '1', '%'); endif; ?></span> <span>
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
					<div class="clear"></div>
					<p><?php edit_post_link('Edit', '', ''); ?></p>
						
						
					</div>
					<div class="clear"></div>
					<!-- End: Post -->
				<?php endwhile; ?>
		
				<p class="pagination">
					<?php next_posts_link('&laquo; Previous Posts') ?>
					<?php previous_posts_link('Next posts &raquo;') ?>
				</p>
		
			<?php else : ?>
		
				<h1><?php _e( 'No posts found. Try a different search?', 'naturefox' ); ?></h1>
				<?php get_search_form(); ?>
		
			<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>