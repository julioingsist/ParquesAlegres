<div class="container theme-footer">

        
        <!--widgets-->
        <div class="row">
            <div class="span4">
                    <?php get_sidebar('footleft'); ?>
            </div>

            <div class="span4">
                <?php get_sidebar('footmiddle'); ?>    
            </div>

            <div class="span4">
                <?php get_sidebar('footright'); ?>  
            </div>
            
        </div>
        
        <div class="site-info">
            <hr>
            <div class="row">
                <div class="span6"><div class="padding-small"><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'orchid' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'orchid' ); ?>"><?php printf( __( 'Proudly powered by %s', 'orchid' ), 'WordPress' ); ?></a></div></div>
                <div class="span6"><div class="padding-small"><p class="pull-right"><?php echo orchid_Credit(); ?></p></div></div>
            </div>
        </div><!-- .site-info -->
</div>
<?php wp_footer(); ?>

</body>
</html>

