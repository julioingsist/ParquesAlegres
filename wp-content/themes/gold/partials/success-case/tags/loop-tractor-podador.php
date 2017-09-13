<?php query_posts(array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "tractor-podador" )); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <li>
      <p><?php the_title(); ?>:</p>
      <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
  </li>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>