<?php 
/**
 * Archive

 * @package WordPress
 * @subpackage orchid
 */
 
 get_header(); ?>
 
 
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Row -->
      		<div class="row">
	
        		<div class="span9">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID();?>" <?php post_class(array('clear','padding-large')); ?>> 
                            <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
                            <?php wp_link_pages(); ?>
                            <?php the_content(); ?>
                        </div>
                        <?php endwhile; else: ?>
                        <p><?php _e('Sorry, this page does not exist.','orchid'); ?></p>
                    <?php endif; ?>
                    <div class="clear"><?php echo orchid_PageLinks(); ?></div>
                    
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
