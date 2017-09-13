<?php query_posts(array( 'post_type' => 'provider', 'posts_per_page' => -1, "custom_cat" => "empresas" )); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <li>
      <?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,array(200,150), true); ?>
      <img src="<?php echo $thumb_url[0]; ?>" alt="" />
      <p><strong><?php the_title(); ?></strong></p>
      <a href="<?php echo get_permalink(); ?>" class="link link--natural">ver proyecto</a>
  </li>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>