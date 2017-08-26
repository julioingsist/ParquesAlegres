<?php 
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Full width with no side bar.
 *
 * @package Orchid
 */
 
 get_header(); ?>

		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Row -->
      		<div class="row">
	
        		<div class="span12">
                    <div class="padding-large">
                        
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                
                                <?php wp_link_pages(  ); ?> 
                                <h1><?php the_title(); ?></h1>

                                
                                    <?php the_content(); ?>
                                
                                <div class="clear"><?php wp_link_pages(  ); ?> </div>

                                <?php
                                $children = wp_list_pages('title_li=&child_of='.get_the_id().'&echo=0');
                                if ($children) { ?>
                                <ul class="unstyled">
                                    <?php echo   $children; ?>

                                <?php } ?>	
                             </div>       
                            <?php endwhile; else: ?>
                            <p><?php _e('Sorry, this page does not exist.','orchid'); ?></p>
                        <?php endif; ?>
          			</div>
        		</div>
                
      		</div>
			<!-- end: Row -->
      		

			
		</div>
         <?php comments_template(); ?>
		<!--end: Container-->
<?php get_footer(); ?>
