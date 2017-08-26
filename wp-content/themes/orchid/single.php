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
                        <div id="post-<?php the_ID();?>" <?php post_class(); ?>> 
                            <?php wp_link_pages(  ); ?> 
                            <h1><?php the_title(); ?> <?php edit_post_link('edit','<small>','</small>'); ?></h1>
                            <div>
                                <small>
                                <?php the_time( get_option( 'date_format' ) ); ?> by  <?php the_author_posts_link(); ?>
                                <?php the_tags('Tagged with: ','&nbsp;','<br/>'); ?>

                                Posted in:
                                <?php 
                                foreach((get_the_category()) as $category) { 
                                    echo isset($comma) ? $comma : '';
                                    echo '<a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
                                    $comma=',&nbsp;';
                                } 
                                ?>
                                </small>
                            </div>

                            <hr>

                            <?php the_content(); ?>

                            <div class="clear"><?php wp_link_pages(  ); ?> </div>

                            <div class="padding-large">
                                <h3 class="assistive-text"><?php _e( 'Post Navigation', 'orchid' ); ?></h3>
                                <span class="pull-left"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'orchid' ) . '</span> %title' ); ?></span>
                                <span class="pull-right"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'orchid' ) . '</span>' ); ?></span>
                            </div><!-- .nav-single -->                        
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
