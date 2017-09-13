
		</div><!-- #main -->
	<div id="footer" role="contentinfo">

        <?php get_sidebar( 'footer' ); ?>

		<div id="colophon">
			<div id="site-info">
				Powered by	<a href="<?php echo esc_url( __('http://wordpress.org/', 'leathernote') ); ?>"
						title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'leathernote'); ?>" rel="generator">
					<?php printf( __('%s', 'leathernote'), 'WordPress' ); ?>
				</a>  |
				Theme Design by <a href="http://www.webmechs.com/">Web Mechs</a>
			</div><!-- #site-info-->
		</div><!-- #colophon -->
	</div><!-- #footer -->


</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
