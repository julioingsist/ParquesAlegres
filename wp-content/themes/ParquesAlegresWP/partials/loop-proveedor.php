<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
  <h1 class="title-section">
      <span><?php the_title(); ?></span>
  </h1>
	<div class="project">

    <h4 class="text--center">Proveedor1111</h4>

    <?php if ( get_post_meta($post->ID, '_provider_business_role', true) ) : ?>
        <p><strong><?php _e( 'Business Role:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_provider_business_role", true); ?></p>
    <?php endif;?>

    <?php if ( get_post_meta($post->ID, '_provider_description', true) ) : ?>
        <p><strong><?php _e( 'Description:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_provider_description", true); ?></p>
    <?php endif;?>

    <?php if ( get_post_meta($post->ID, '_provider_address', true) ) : ?>
        <p><strong><?php _e( 'Address:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_provider_address", true); ?></p>
    <?php endif;?>

    <?php if ( get_post_meta($post->ID, '_provider_phone', true) ) : ?>
        <p><strong><?php _e( 'Phone:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_provider_phone", true); ?></p>
    <?php endif;?>

    <?php if ( get_post_meta($post->ID, '_provider_email', true) ) : ?>
        <p><strong><?php _e( 'E-mail:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_provider_email", true); ?></p>
    <?php endif;?>

    <?php if ( get_post_meta($post->ID, '_provider_contact', true) ) : ?>
        <p><strong><?php _e( 'Contact:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_provider_contact", true); ?></p>
    <?php endif;?>

    <?php if($post->post_content != "") : ?>
        <p><?php the_content(); ?></p>
    <?php endif;?>


    <?php if ( get_post_meta($post->ID, '_provider_gallery', true) ) : ?>
    <?php $attachments = get_post_meta($post->ID, "_provider_gallery", true); ?>
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
	</div>
	<?php comments_template(); ?>
</article>