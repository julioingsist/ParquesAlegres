<?php 
/**
 * Front page

 * @package WordPress
 * @subpackage orchid
 */
 
 get_header(); ?>
 
 
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Row -->
      		<div class="row">
	
        		<div class="span9">
                    <div class="padding-large">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        
						<h1><?php the_title(); ?></h1>
						<hr>
						
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        
                            <?php echo wp_get_attachment_image( null,"full" ); ?>
                            <p><?php the_content(); ?></p>
                            
                        </div>
						
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, this page does not exist.','orchid'); ?></p>
				<?php endif; ?>
          			
        		</div>
                </div>
				<div class="span3 hidden-phone">
					<?php get_sidebar(); ?>
				</div>
      		</div>
			<!-- end: Row -->
      		

			
		</div>
		<?php comments_template(); ?>
		<!--end: Container-->
<?php get_footer(); ?>
