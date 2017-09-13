<?php
$args = array( 'post_type' => 'proveedor', 'posts_per_page' => -1, "custom_cat" => "empresas" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

<li><a href="<?php echo get_permalink(); ?>" <!--class="link link--provider"--> target="_blank"><?php the_title(); ?></a></li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>