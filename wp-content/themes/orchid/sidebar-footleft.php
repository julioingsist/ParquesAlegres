<?php if (  ! dynamic_sidebar('footleft') ) : ?>

    <?php $widget = new WP_Widget_Archives(); $widget->widget(array(
                                                    'widget_title'=> __( 'Archives', 'orchid' ),
                                                    'before_widget' => '<aside>',
                                                    'after_widget' => '</aside>', 
                                                    'before_title' => '<h3 class="widget_title">',
                                                    'after_title' => '</h3>',
                                                    ),null);?>

<?php endif; ?>
