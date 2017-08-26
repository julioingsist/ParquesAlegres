<?php 
// Lista de Comentarios
function custom_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<?php  if (get_comment_type() == "comment"){ // Si quieres separar los comentarios de trackbacks ?>
<!--<li class="comment" id="comment-<?php// comment_ID() ?>">-->
<li class="comment <?php
    /* Solo usar la clase autorcomment si el user_id es 1 (admin) */
    if (1 == $comment->user_id)
    $oddcomment = "autorcomment";
    echo $oddcomment;
    ?>" id="comment-<?php comment_ID() ?>">
    <div class="gravatar"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size']); ?></div>
    <?php echo comment_reply_link(array('before' => '<p class="reply">', 'after' => '</p>', 'reply_text' => 'Responder', 'depth' => $depth, 'max_depth' => $args['max_depth'] ));  ?>
	<div class="content">
        <cite><?php comment_author_link() ?></cite> Dice:
        <?php if ($comment->comment_approved == '0') : ?>
        <em>Tu comentario esta esperando moderaci&oacute;n.</em>
        <?php endif; ?>
        <br />
        <span class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> a las <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></span>
        <?php comment_text() ?>
     </div>
<?php    //Lo siguiente es la plantilla de pingbacks. 
        }  else {
               ?>
               <li <?php comment_class(); ?>><?php the_commenter_link() ?></li>
			<?php } 
}
function the_commenter_link() {
    $commenter = get_comment_author_link();
    if ( ereg( ']* class=[^>]+>', $commenter ) ) {$commenter = ereg_replace( '(]* class=[\'"]?)', '\\1url ' , $commenter );
    } else { $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );}
    echo $commenter ;
}
function the_commenter_avatar() {
    $email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( "$email", "32" ) );
    echo $avatar;
}
/* Poner el número de comentarios preciso */
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
return count($comments_by_type['comment']);
} else {
return $count;
}
}
/* Poner el rel_canonical a los comentarios */
function canonical_for_comments() {
	global $cpage, $post;
	if ( $cpage > 1 ) :
		echo "\n";
	  	echo "<link rel='canonical' href='";
	  	echo get_permalink( $post->ID );
	  	echo "' />\n";
	 endif;
}
add_action( 'wp_head', 'canonical_for_comments' );
// Sidebar
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Sidebar Top',
        'before_widget' => '<div class="sbb clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Sidebar Bottom',
        'before_widget' => '<div class="sbb clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
// Panel de Administración y Funciones del Theme
require_once ('functions/admin_head.php');
require_once ('theme-options.php');
require_once ('functions/meta_seo.php');
//Muestra el Feed RSS del blog
function feedburner(){ 
if (get_option('vividtw_feedburner') != '') {
	echo get_option('vividtw_feedburner');
}
else {
	echo get_bloginfo('rss2_url');
}
}
//Muestra el Favicon elegido para el blog
function favicon_url(){ 

if (get_option('vividtw_favicon') != '') {
	echo get_option('vividtw_favicon');
}
else {
	echo get_bloginfo('stylesheet_directory') ."/img/favicon.ico";
}
}
?>