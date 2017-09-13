<?php 

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
 get_header();
?>
<div class="row">
  <div class="col-lg-8 col-sm-8">

    <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Gold' ), get_search_query() ); ?></h1>
      </header>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="page-header">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a> 
          <br>
         <small class="cat-font">
         <span>Categories :-</span>
           <?php $categories = get_the_category();
               $separator = ' ';
               $output = '';
               if($categories){
                 foreach($categories as $category) {
                   $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'Gold' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                 }
               echo trim($output, $separator);
           }?>   
         </small>
        </h1>
          <div class="post-meta">
            <p>- By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author();?></a> 
               <span class="tags">
              <?php if(has_tag()): ?> under- <?php the_tags( $before = null, $sep = '', $after = '' );?><?php endif;?>
            </span> 
              <span class="pull-right">Dated - <a href="<?php the_permalink(); ?>"><?php the_time('j M Y');?></a></span>
            </p>            
          </div> 
      </div>
      <div class="post-content">
        <p class="justify">
        
       <?php the_content(); ?>
    </p>
    <?php gold_link_pages(); ?> 
      </div>
     
      <?php endwhile; ?>

    <?php 
        else : 
        ?>
          <header class="page-header">
            <h1 class="page-title"><?php printf( __( 'No Search Results for: %s', 'Gold' ), get_search_query() ); ?></h1>
          </header>
        <?php
        endif; 
    ?>
    </div>
    <div class="col-lg-4 col-sm-4 sidebar">
      <?php get_sidebar(); ?>
    </div>  
</div>
<?php get_footer()?>
