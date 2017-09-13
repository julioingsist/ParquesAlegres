<?php
/**
 * The Footer widget area.
 *
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'footer-widget-area'  )

	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

			<div id="footer-widget-area" role="complementary">

<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>

            	  <?php dynamic_sidebar( 'footer-widget-area' ); ?>


<?php endif; ?>

			</div><!-- #footer-widget-area -->


