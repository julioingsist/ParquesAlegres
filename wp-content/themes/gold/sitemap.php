<?php
/*
 *Template Name: Page For Sitemap
*/
?>
<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
 get_header(); ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="well col-lg-12 overflow">
        <div class=" col-lg-10 col-offset-1 sitemap-entries">
          <div class="col-lg-4 col-sm-4">
            <h4>Pages</h4>
            <div class="sitemap-links">   
              <?php 
                  $pages=get_pages();
                  foreach($pages as $page)
                  {
                  ?>
                    <p><strong><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title;?></a></strong></p>
                  <?php
                  }
              ?>
            </div>   
            <hr>      
            <h4>Feeds</h4>
            <p><strong><a href="<?php bloginfo('rss_url'); ?>">Main RSS</a></strong></p>
            <p><strong><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments Feed</a></strong></p>
          </div>
          <div class="col-lg-4 col-sm-4">
            <h4>Posts</h4>
            <div class="sitemap-links">
                <?php 
                    $args=array('post_type'=>'post','posts_per_page'=>-1);
                    $posts=get_posts($args);
                    foreach($posts as $post)
                    {
                ?>           
                        <p><strong><a href="<?php the_permalink();?>"><?php the_title();?></a></strong></p>
                <?php
                    }    
                ?> 
            </div>
          </div>
          <div class="col-lg-4 col-sm-4">
            <h4>Categories</h4>
            <div class="sitemap-links">
              <ul class="sitemap-cat">
                <?php 
                  $args = array(
                    'show_option_all'    => '',
                    'title_li'           => __( '','Gold'),
                    'echo'               => 1,
                    'depth'              => 1,
                  );
                    wp_list_categories($args);
                ?>
              </ul>
            </div>
            <hr>
            <h4>Archives</h4>
            <ul class="sitemap-archives">
              <?php 
                   $arch=wp_get_archives( array('echo'=>0) );
                   print_r($arch);
              ?>
            </ul>           
          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>