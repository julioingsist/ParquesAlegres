<?php 

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header();?>
<div class="row">   
    <div class="col-lg-8 col-sm-8">
     <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
   
      <div class="page-header">
        <h1>About: <?php echo $curauth->nickname; ?></h1>
          <div class="post-meta">
            <p>
                Website :- <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a><br>
                Profile :- <?php echo $curauth->user_description; ?>
            </p>            
          </div> 
      </div>
      <div class="post-content">
      <p>
        <ul>
       <!-- The Loop -->

           <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
               <li>
                   <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                   <?php the_title(); ?></a>,
                   <?php the_time('d M Y'); ?> in <?php the_category('&');?>
               </li>

           <?php endwhile; else: ?>
               <p><?php _e('No posts by this author.','Gold'); ?></p>

           <?php endif; ?>

       <!-- End Loop -->

           </ul>
        </p>   
    </div>
    </div>  
    <div class="col-lg-4 col-sm-4 sidebar">
        <?php get_sidebar(); ?>
    </div>      
</div>    
<?php get_footer();?>