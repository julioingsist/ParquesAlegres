
<?php
if ( !defined('ABSPATH')) exit;
 get_header();?>
  <div class="row">    
    <div class="col-lg-12">
      <div class="jumbotron center">
        <h1>Page Not Found <small><font face="Tahoma" color="red">Error 404</font></small></h1>
        <br />
        <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
        <p><b>Or you could just press this neat little button:</b></p>
        <a href="<?php echo esc_url(home_url());?>" class="btn btn-large btn-primary"><i class="icon-home icon-white"></i> Take Me Home</a>
      </div>
      <br />
      <div class="thumbnail">
        <center><h2>Recent Content :</h2></center>
      </div>
      <br />
      <?php 
          $i=0;
          $args=array('post_type'=>'post','orderby'=>'date');
          $query=new WP_query($args);
          if($query->have_posts()):
            while ($query->have_posts() && $i<4):$query->the_post();          
      ?>
      <div class="thumbnail col-lg-3 col-sm-3 col-6 center">
        <h3><?php the_title();?></h3>
        <div class="align-all-left well-lg"><?php echo esc_attr(substr(get_the_excerpt(), 0,150)); ?></div>
       
        <div class="hero-unit">
          <img src="<?php echo get_template_directory_uri();?>/img/100X100.gif">
          <p></p>
        </div>
     
        <a href="<?php the_permalink();?>" class="btn btn-primary btn-large"><i class="icon-share white-imp"></i> Take Me There...</a>
      </div>
    <?php 
            $i++;
          endwhile;
        endif;
    ?>
    </div>
  </div>    
<?php get_footer(); ?>