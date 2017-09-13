<?php if (  ! dynamic_sidebar('footright') ) : ?>


    <?php 
        $widget = new WP_Widget_Recent_Comments(); 
        $widget->widget(array(
                                                    'widget_title'=> __( 'Meta', 'orchid' ),
                                                    'before_widget' => '<aside>',
                                                    'after_widget' => '</aside>', 
                                                    'before_title' => '<h3 class="widget_title">',
                                                    'after_title' => '</h3>',
                                                    ),null);?>
<?php endif; ?>
