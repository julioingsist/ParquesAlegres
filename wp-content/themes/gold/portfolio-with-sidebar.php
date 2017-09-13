<?php
/*
* Template Name: Portfolio Page With Sidebar
*/
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header();?>

  <div class="row">    
    <div class="page-header col-lg-8 ">
      <h1><?php the_title();?></h1>          
    </div>
    <div class="image-gallery row">
    <?php
      $cat=of_get_option('ycategory');
      if($cat=='Default'):
        echo ' <div class="col-lg-8">';
        echo __("Please Select Your Category From Appearance->Gold Theme Options->Categories.",'Gold');
        echo "</div>";
      else:
    ?>
    <?php
            rewind_posts();
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args=array(
              'post_type' => 'post',
              'category_name'=>$cat,
              'posts_per_page' => -1,          
              'paged' => $paged
              );
            $query = new WP_Query($args);
    ?>
      <div class="col-lg-8 col-md-8">
       <?php  
       $i=0;
       $j=1;
        if( $query->have_posts()):
            while ($query->have_posts()): $query->the_post();?>
        <?php 
              if($i==0):
                echo '<div class="row">';
              ?>
                <div class="col-lg-4 col-sm-4 col-6 top10">
                  <div class="thumbnail post-thumbnail-nit">
                    <a href="<?php the_permalink();?>"><?php if(has_post_thumbnail()): echo get_the_post_thumbnail(); endif;?></a>
                    <div class="caption">
                      <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                      <p class="justify"><?php echo substr(get_the_excerpt(), 0,150); ?></p>
                      <center><p><a href="<?php the_permalink();?>" class="btn btn-primary">More info..</a></p></center>
                    </div>
                  </div>
                </div>
              <?php
                  $i++;
                  $j++;
              else:
                if($j<=3){  
              ?>
                <div class="col-lg-4 col-sm-4 col-6 top10">
                  <div class="thumbnail post-thumbnail-nit">
                    <a href="<?php the_permalink();?>"><?php if(has_post_thumbnail()): echo get_the_post_thumbnail(); endif;?></a>
                    <div class="caption">
                      <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                      <p class="justify"><?php echo substr(get_the_excerpt(), 0,150); ?></p>
                      <center><p><a href="<?php the_permalink();?>" class="btn btn-primary">More info..</a></p></center>
                    </div>
                  </div>
                </div>  
              <?php 
                $j++;
                if($j>3){
                  echo '</div>';
                  $i=0;
                  $j=1;
                }
              }
              else{
                echo '</div>';
              }  
              endif;  
              ?>  
        <?php 
          endwhile;
          if($j==2 || $j==3){
            echo '</div>';
          }
        ?>      
           
        <?php 
          else:
            echo "Please create a post under the category :-<b>".$cat."</b>";   
          endif;
        wp_reset_query();
      // Restore global post data stomped by the_post().
      ?>
     </div>
   <?php endif; ?>
      <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
       
  </div>   
  </div> 
<?php get_footer(); ?>