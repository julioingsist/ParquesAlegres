<?php get_header(); ?>
<div class="row">
	<div class="col-lg-9 col-md-8 col-sm-8">
		<?php woocommerce_content(); ?>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-4">
		<?php get_sidebar();?>
	</div>	
</div>
<?php get_footer(); ?>