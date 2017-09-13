<?php
/*
* Template Name: Page With Left Sidebar
*/
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header();?>

  <div class="row">
    <div class="col-lg-8 col-sm-8 pull-right">
    <?php if(have_posts())
          { 
            the_post();?>
          <div class="page-header">
            <h1><?php the_title();?></h1>
          </div>
          <div class="post-content">
            <p class="justify">
            	<?php 
            	  if ( has_post_thumbnail() ):
            	    the_post_thumbnail();
            	  endif;
            	?>
              <?php the_content();?>
            </p>
          </div>
          <?php 
          }
          else
          {
           ?> 
           <div class="page-header">
             <h1><?php the_title();?></h1>
           </div>  
        <?php
          }
          ?>
    </div>  
    <div class="col-lg-4 col-sm-4 sidebar pull-left">
      <?php get_sidebar(); ?>
    </div>  
  </div>    
<?php get_footer(); ?>