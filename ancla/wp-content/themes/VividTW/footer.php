</div><!--fin content-->
        <div id="bottomcontent"></div>
    </div><!--fin main container-->
</div><!--fin main-->
    <div class="container">
    <div id="footer">
        <p class="left">&copy; <?php echo gmdate(__('Y')); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. Creado con <a href="http://wordpress.org/">Wordpress</a></p>
    <p class="right">Dise&ntilde;ado por <a href="http://www.trazos-web.com" title='Trazos Web - Blogging y Dise&ntilde;o Web'><img src="<?php bloginfo('template_directory'); ?>/img/footer_logo.png" alt='Trazos Web - Blogging y Dise&ntilde;o Web' width='111px' height='16px' /></a></p>
	</div><!--fin footer-->
    </div><!--fin footer container-->
<!-- Beautiful design by Diego Castillo - http://www.trazos-web.com -->
<?php if(get_option('vividtw_analytics') != '') { echo stripslashes(get_option('vividtw_analytics')); } ?>
<?php wp_footer(); ?>
</body>
</html>
