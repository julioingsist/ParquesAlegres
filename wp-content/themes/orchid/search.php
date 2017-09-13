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
                    <div class="padding-large">
                        <?php echo orchid_PageLinks(); ?>
                        <h1><?php printf( __( 'Search Results for: %s', 'orchid' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        
                        <?php if ( have_posts() ) : ?>
                        
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div id="post-<?php the_ID();?>" <?php post_class('clear'); ?>> 
                                <h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
                                <?php wp_link_pages(); ?>
                                <?php if ( has_post_thumbnail() ) { ?>
                                <?php the_post_thumbnail('medium',array('class'=>'img-polaroid' ,'style'=>'float:left;margin-right: 20px;margin-bottom: 20px')); ?>
                                <?php } ?>

                                <?php the_excerpt(); ?>


                            </div>
                            <?php endwhile; else: ?>
                            
                            <p><?php _e('Sorry, we did not find any matching results.','orchid'); ?></p>
                        <?php endif; ?>
                        <div class="clear"><?php echo orchid_PageLinks(); ?></div>
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
