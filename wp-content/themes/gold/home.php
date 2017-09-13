<?php 
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header();?>
<div class="row"> 
    <div class="col-lg-12 col-sm-12 col-xs-12">
    <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
   
     <div class="page-header">
       <h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
         <div class="post-meta">
           <span class="">
             <i class="icon-calendar"></i> <a href="<?php the_permalink(); ?>"><?php the_time('j M Y');?></a> 
             <span>|</span> 
             <i class="icon-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID') ); ?>"><?php the_author();?></a>
             <span>|</span> 
             <i class="icon-folder-open"></i>
               <?php $categories = get_the_category();
                   $separator = ', ';
                   $output = '';
                   if($categories){
                     foreach($categories as $category) {
                       $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'Gold' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                     }
                   echo trim($output, $separator);
               }?>   
             <?php if(has_tag()): ?>
               <span>|</span> 
               <i class="icon-tags"></i> 
               <?php echo get_the_tag_list( '', ', ', '');?>
             <?php endif;?>  
           </span>
         </div> 
     </div>
     <div class="post-content">
        <p class="justify">
          <a href="<?php the_permalink();?>"><?php 
            if ( has_post_thumbnail() ):
              the_post_thumbnail();
            endif;
          ?>
          </a> 
           <?php the_content();?>        
        </p>
        <?php gold_link_pages(); ?> 
       <?php comments_popup_link('Leave a reply');?>
      </div>      
         <?php endwhile; ?>
         <div class="clearfix"></div>
          <div class="row"><?php gold_pager(); ?></div>
         <?php else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.','Gold'); ?></p>
  <?php endif; ?>
    </div>
</div>    
<?php get_footer();?>