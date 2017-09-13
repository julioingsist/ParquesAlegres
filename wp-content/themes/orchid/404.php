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
                    <h1><?php _e('Page Not Found','orchid'); ?></h1>
					<p><?php _e('I\'m very sorry, but this page does not exist.','orchid'); ?></p>

          			
        		</div>
                </div>
				<div class="span3 hidden-phone">
					<?php get_sidebar(); ?>
				</div>
      		</div>
			<!-- end: Row -->
      		

			
		</div>
		<!--end: Container-->
<?php get_footer(); ?>
