<?php
$args = array( 'post_type' => 'success_case', 'posts_per_page' => -1, "tag" => "reciclaje" );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>