<?php if (  ! dynamic_sidebar('footmiddle') ) : ?>

    <?php $widget = new WP_Widget_Meta(); $widget->widget(array(
                                                    'widget_title'=> __( 'Meta', 'orchid' ),
                                                    'before_widget' => '<aside>',
                                                    'after_widget' => '</aside>', 
                                                    'before_title' => '<h3 class="widget_title">',
                                                    'after_title' => '</h3>',
                                                    ),null);?>

<?php endif; ?>
