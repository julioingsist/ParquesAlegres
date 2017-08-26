<?php get_header();?>
  <div class="row">
    <?php if ( have_posts() ) : the_post(); ?>     
    <div class="col-lg-8 col-sm-8  col-xs-12 ">
      <div class="page-header">
        <h1><?php the_title();?></h1>
      </div>
      <div class="post-content">
        <a href="<?php the_permalink();?>"><?php 
            if ( has_post_thumbnail() ):
              the_post_thumbnail();
            endif;
          ?>
          </a>
        <?php the_content();?>
        <?php comments_template(); ?>
      </div>     
    </div>
     <?php else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.','Gold'); ?></p>
      <?php endif; ?>  
    <div class="col-lg-4 col-sm-4 col-xs-12 sidebar ">
      <?php get_sidebar(); ?>
    </div>  
  </div>    
<?php get_footer(); ?>