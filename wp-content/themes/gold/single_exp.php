<?php
/*
Template Name: Listado de Experiencias por tipo
*/
?>
<?php get_header(); ?>
<style>
.testimonial-list {
  list-style: none;
  margin-left: 0;
}
.testimonial-list p {
  font-size: 13px;
  padding: 0;
  margin-bottom: 5px;
  margin-right: 5px;
  text-align: center;
}
.testimonial-list > li {
  float: left;
  width: 33%;
  margin-left: 0px;
  margin-top: 30px;
}
</style>
<!-- MAIN CONTENT -->
    <div class="main" role="main">
        <div class="top bg-provide"></div>
        <h1 class="title-section">
            <span><?php the_title(); ?></span>
        </h1>
<ul class="testimonial-list" style="list-style: circle;">
  <?php
  $args = array( 'post_status' => 'publish', 'post_type' => 'experiencia_exitosa', 'posts_per_page' => -1, "tag" => $_GET['tag'] );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <li>
      <a href="<?php echo get_permalink(); ?>" class="link link--testimonial"><?php the_title(); ?></a>
    </li>
    <?php wp_reset_query(); ?>
  <?php endwhile; ?>
  </ul>
</div>
<?php get_footer(); ?>