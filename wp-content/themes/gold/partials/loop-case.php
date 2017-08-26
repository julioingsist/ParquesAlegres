<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
  <h1 class="title-section">
      <span><?php the_title(); ?></span>
  </h1>
	<div class="project">

    <h4 class="text--center">Experiencia exitosa</h4>

    <?php if ( get_post_meta($post->ID, '_cmb_event_date', true) ) : ?>

    <p><strong><?php _e( 'Event Date', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_cmb_event_date", true); ?></p>

    <?php endif; if ( get_post_meta($post->ID, '_cmb_event_type', true) ) : ?>

    <p><strong><?php _e( 'Event Type', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_cmb_event_type", true); ?></p>

    <?php endif; if ( get_post_meta($post->ID, '_cmb_participants', true) ) : ?>

    <p><strong><?php _e( 'People involved:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_cmb_participants", true); ?></p>

    <?php endif; if ( get_post_meta($post->ID, '_cmb_investment', true) ) : ?>

    <p><strong><?php _e( 'Investment:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_cmb_investment", true); ?></p>

    <?php endif; if($post->post_content != "") : ?>

    <p><strong><?php _e( 'Description of activities:', 'ParquesAlegres' ); ?></strong><br> <?php the_content(); ?></p>

    <?php endif; if ( get_post_meta($post->ID, '_cmb_impact', true) ) : ?>

    <p><strong><?php _e( 'Impact and number of attendees:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_cmb_impact", true); ?></p>

    <?php endif; if ( get_post_meta($post->ID, '_cmb_benefits', true) ) : ?>

    <p><strong><?php _e( 'Benefits obtained:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_cmb_benefits", true); ?></p>

    <?php endif; if ( get_post_meta($post->ID, '_cmb_success_key', true) ) : ?>

    <p><strong><?php _e( 'Key to Success:', 'ParquesAlegres' ); ?></strong> <?php echo get_post_meta($post->ID, "_cmb_success_key", true); ?></p>

    <?php endif; if ( get_post_meta($post->ID, '_cmb_gallery', true) ) : ?>

    <?php $attachments = get_post_meta($post->ID, "_cmb_gallery", true); ?>
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
    
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53b6de9d5456b9e7"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->

<div class="addthis_native_toolbox"></div>

    <?php //get_sharing_icons(); ?>
	</div>
	<?php comments_template(); ?>
</article>