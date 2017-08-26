<?php
if ( ! isset( $content_width ) )
$content_width = 603;

function naturefox_sidebar() {
	register_sidebar(array(
		'name' => __( 'Sidebar Widget Area', 'naturefox' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', 'naturefox' ),
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',        
	));
}
add_action('widgets_init','naturefox_sidebar');

function naturefox_nav_menus() {
	register_nav_menus(
		array(
		  'primary' => 'Header Menu'
		)
	);
}
add_action('init','naturefox_nav_menus');

//Multi-level pages menu  
function naturefox_page_menu() {  
	
if (is_page()) { $highlight = "page_item"; } else {$highlight = "menu-item current-menu-item"; }
echo '<ul class="menu">';
wp_list_pages('sort_column=menu_order&title_li=&link_before=<span><span>&link_after=</span></span>&depth=3');
echo '</ul>';
} 



add_editor_style();
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');

set_post_thumbnail_size( 110, 110, true ); // Default size

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain('naturefox', get_template_directory() . '/languages');

//password protections page change
function naturefox_the_password_form() {
    global $post;

    $label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
    $output = '<form action="' . get_option('siteurl') . '/wp-pass.php" method="post">'.
    '<p>' . __("My post is password protected. Please ask me for a password:", "naturefox") . '</p>'.
    __("Password", "naturefox") . ' <input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit"'.
    'name="Submit" value="' . esc_attr__("Submit") . '" /></p></form>';

    return $output;
}
add_filter('the_password_form','naturefox_the_password_form');

function naturefox_credits() {
	return '<a href="http://wordpress.org/">http://wordpress.org/</a> and <a href="http://www.hqpremiumthemes.com/">http://www.hqpremiumthemes.com/</a>';
}
?>
