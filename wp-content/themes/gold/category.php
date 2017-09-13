<?php 
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header();?>

<div class="row"> 
    <div class="col-lg-8 col-sm-8 col-xs-12">
    <?php
    // si no está declarada $paged, será 1 
$paged = (get_query_var('page')) ? get_query_var('page') : 1;


// creamos la consulta
$wp_query = new WP_Query();

// le pasamos la página
$wp_query->query('posts_per_page='.get_option('posts_per_page').'&paged=' . $paged);

    ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="page-header">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>
        <?php 
// Si no tenemos declarada la variable $post más arriba:
global $post;

$imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
$ruta_imagen = $imagen[0];
?>
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
            <table><tr><td>
          <a href="<?php the_permalink();?>"><?php 
            if ( has_post_thumbnail() ):
            //the_post_thumbnail(array(640,640));
              the_post_thumbnail('medium_large');
            endif;
          ?>
          </a> </td><td>
           <?php the_excerpt();
           //the_content();
           ?>
           </td>
            </tr>
                </table>
        </p>
        <table><tr><td align="right">
        <?php gold_link_pages(); ?> 
       <a href="<?php the_permalink();?>">Leer m&aacute;s...</a>
       </td>
            </tr>
                </table>
       <?php
       //comments_popup_link('Leave a reply');
       ?>
      </div>
            
         <?php endwhile;?>
        <div class="clearfix"></div>
       <div class="row"><?php gold_pager($paged); ?></div>
       <?php else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.','Gold'); ?></p>
  <?php endif; ?>
    </div>
  <div class="col-lg-4 col-sm-4 col-xs-12 sidebar">
      <?php get_sidebar(); ?>
  </div>      
</div>    
<?php get_footer();?>