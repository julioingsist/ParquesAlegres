<?php
/*
* Template Name: Portfolio
*/
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header(); 

?>

<?php
  $cat=of_get_option('ycategory');
  if($cat=='Default'):
    echo __("Please Select Your Category From Appearance->Gold Theme Options->Categories.",'Gold');
  else:
?>
 <?php
        
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args=array(
          'post_type' => 'post',
          'category_name'=>$cat,
          'posts_per_page' =>-1,          
          'paged' => $paged
          );
        $query = new WP_Query($args);
        
?>
<div class="row">
  <div class="col-lg-12 col-sm-12">     
    <div class="page-header">
      <h1><?php the_title();?></h1>          
    </div>
    <div class="col-lg-12 col-sm-12">
      <?php 
      if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      
      <?php the_content(); ?> 

      <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="image-gallery row">
      <?php 
        $i=0;
        $j=1;
      if ($query->have_posts()) : ?>
        <div class="col-lg-12">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <?php 
              if($i==0):
                echo '<div class="row">';
              ?>
                <div class="col-lg-3 col-sm-3 col-6 top10">
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
              elseif($j<=4):
              ?>
                <div class="col-lg-3 col-sm-3 col-6 top10">
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
                if($j>4){
                  echo '</div>';
                  $i=0;
                  $j=1;
                } 
              endif;  
              ?>  
        <?php 
          endwhile;
          if($i==1):
            echo "</div>";
          endif;
        ?>      
        </div>
        </div>                  
      <?php 
        else : 
          echo "Please create a post under the category :-<b>".$cat."</b>";         
        endif; 
      wp_reset_query();
      ?>
    </div>     
  </div>    
<?php endif;?>
<?php get_footer();?>
