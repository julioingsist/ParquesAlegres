<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
  <h1 class="title-section">
      <span><?php the_title(); ?></span>
  </h1>
	<div class="project">
	  <?php the_content(); ?>
    <?php if ( get_post_meta($post->ID, '_institution_gallery', true) ) : ?>
    <?php $attachments = get_post_meta($post->ID, "_institution_gallery", true); ?>
    <h2 class="subtitle-project">Galería</h2>
    <div class="project-gallery">
        <div id="project-slider" class="flexslider">
            <ul class="slides">
                <?php if ( $attachments ) { foreach ( $attachments as $attachment ) { ?>

                    <li><img src="<?php echo $attachment; ?>" alt=""></li>

                <?php } } ?>
            </ul>
        </div>
        <div id="project-carousel" class="flexslider">
            <ul class="slides">
                <?php if ( $attachments ) { foreach ( $attachments as $attachment ) { ?>

                    <?php echo $image; ?>

                    <li><img src="<?php echo $attachment; ?>" alt=""></li>

                <?php } } ?>
            </ul>
        </div>
    </div>

    <?php endif; ?>
    <?php get_sharing_icons(); ?>
	</div>
	<?php comments_template(); ?>
</article>