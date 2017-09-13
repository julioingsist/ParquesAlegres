<?php 
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<style>
.post-content{
    display:inline-block;
    vertical-align: top;
    width:100%;
}
.leermas{
    float:right;
}
@media screen and (min-width: 480px) {
    .post-content{
        display:inline-block;
        width:48%;
    }
    .leermas{
        float:left;
    }
}
</style>
<?php get_header();?>
<div class="row">
    <?php if (tag_description() ) : ?>
            <div><?php echo tag_description(); ?></div>
            <?php endif; ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <!--<div class="page-header">
     <h1><a href="<?php /*the_permalink(); ?>"><?php the_title();?></a></h1>
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
           <?php endif;*/?>  
         </span>
       </div> 
   </div>-->
    <div class="post-content">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
            <a href="<?php the_permalink();?>"><?php 
                if ( has_post_thumbnail() ):
                    the_post_thumbnail();
                endif;
            ?>
            </a>
            <?php $contenido = get_the_content();
            $findme   = '<div id="escondida" style="display: none;">';
            $findme2   = '<img';
            $findme3   = '</div>';
            $pos = strpos($contenido, $findme);
            if ($pos !== false) {
                $cortado=substr($contenido,$pos);
                $pos2 = strpos($cortado, $findme2);
                if ($pos2 !== false) {
                    $pos3 = strpos($cortado, $findme3);
                    if($pos3 !== false){
                        $oo=$pos3-$pos2;
                        $cortado2=substr($cortado,$pos2,$oo);
                        //$final = str_replace("<img", "<img align=\"left\"", $cortado2);
                        //echo $final;
                        echo '<div style="display:inline-block;width:30%;">'.$cortado2.'</div>';
                        $myExcerpt = get_the_excerpt();
                        $tags = array("<p>", "</p>");
                        $myExcerpt = str_replace($tags, "", $myExcerpt);
                        echo '<div style="margin-left:1%;display:inline-block;width:65%;vertical-align:middle;"><p align="justify">'.$myExcerpt; echo '</p><span class="leermas"><a href="'; echo get_permalink(); echo '">Seguir leyendo</a></span>';
                        echo '<span style="float:right;">'; gold_link_pages(); ?> 
                        <?php comments_popup_link('Deja un comentario');
                        echo '</span></div>';
                    }
                }
            }
            else{
                the_excerpt();
                echo '<a href="'; echo get_permalink(); echo '">Seguir leyendo</a><br>';
                gold_link_pages(); ?> 
                <?php comments_popup_link('Deja un comentario');
            }
            ?>
    </div>
    <?php endwhile;?>
    <div class="clearfix"></div>
    <div class="row"><?php gold_pager('nav-below'); ?></div>
    <?php else: ?>
    <p><?php _e('Lo sentimos, no hay entradas relacionadas al criterio seleccionado.','Gold'); ?></p>
    <?php endif; ?>  
</div>    
<?php get_footer();?>