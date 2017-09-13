<?php
/* Template Name: Experiencia exitosa loop */
?>
<?php get_header(); ?>
<div class="main" role="main">
    <div class="top improve"></div>
    <div id="content" class="container">

        
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
  <h1 class="title-section">
      <span><?php the_title(); ?></span>
  </h1>
	<div class="project">
<?php
$args = array( 'post_type' => 'experiencia_exitosa', 'posts_per_page' => -1,);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <li>
            <p><?php the_title(); ?>:</p>
            <a href="<?php echo get_permalink(); ?>" class="link link--testimonial">Ver experiencia exitosa</a>
        </li>

<?php wp_reset_query(); ?>
<?php endwhile; ?>
  <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53b6de9d5456b9e7"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->

<div class="addthis_native_toolbox"></div>

    <?php //get_sharing_icons(); ?>
	</div>
        
	<?php comments_template(); ?>
</article>
<?php get_footer(); ?>