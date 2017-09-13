<?php
$args = $args = array(
    'tax_query' => array(
        array(
            'post_type' => 'success_case'
        )
     ));
    $loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php
//Does tag have posts?
if($tag_query->have_posts()):

    //Display tag title
    echo '<h2> Tag :'.esc_html($term->name).'</h2>';

    //Loop through posts and display
    while($tag_query->have_posts()):$tag_query->the_post();
        //Display post info here
    endwhile;

endif; //End if $tag_query->have_posts
?>
        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>