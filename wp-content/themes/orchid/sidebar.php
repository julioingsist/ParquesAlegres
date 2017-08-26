<div class="theme-sidebar">
    <?php 
    //find the correct sidebar
    $sidebar = is_page() ? 'page' : 'post';
    $sidebar = is_front_page() ? 'front' : $sidebar; 
    ?>
    <?php if (  ! dynamic_sidebar($sidebar) ) : ?>
    
    <?php $widget = new WP_Widget_Archives(); $widget->widget(array(
                                                    'widget_title'=> __( 'Archives', 'orchid' ),
                                                    'before_widget' => '<aside>',
                                                    'after_widget' => '</aside>', 
                                                    'before_title' => '<h3 class="widget_title">',
                                                    'after_title' => '</h3>',
                                                    ),null);?>

    <?php $widget = new WP_Widget_Meta(); $widget->widget(array(
                                                    'widget_title'=> __( 'Meta', 'orchid' ),
                                                    'before_widget' => '<aside>',
                                                    'after_widget' => '</aside>', 
                                                    'before_title' => '<h3 class="widget_title">',
                                                    'after_title' => '</h3>',
                                                    ),null);?>

<?php endif; ?>
</div>