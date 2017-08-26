<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
        <div id="post-0" class="post error404 not-found">
          <h1 class="entry-title"><?php _e( 'Not Found', 'leathernote' ); ?></h1>
          <div class="entry-content">
            <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'leathernote' ); ?></p>
            <?php get_search_form(); ?>
          </div><!-- .entry-content -->
        </div><!-- #post-0 -->
<?php endif; ?>

<?php
  /* Start the Loop.
   *
   * It is broken into three main parts: when we're displaying
   * posts that are in the gallery category, when we're displaying
   * posts in the asides category, and finally all other posts.
   *
   */ ?>
<?php
while ( have_posts() ) : the_post(); ?>

<?php /* This is for posts under a special category called "Gallery".
         By assigning a post to the category "gallery", this post will
         simply show one thumbnail picture, plus text describing how
         many photos are under that particular category.
      */

  if ( function_exists('has_post_format') && has_post_format( 'gallery' ) ) : ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'leathernote' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

          <div class="entry-meta">
            <?php leathernote_posted_on(); ?>
          </div><!-- .entry-meta -->

          <div class="entry-content">

<?php
    if ( post_password_required() ) :
      the_content();
    else :
      $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
      if ( $images ) :
        $total_images = count( $images );
        $image = array_shift( $images );
        $image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail', true );
?>
            <div class="gallery-thumb">
              <a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
            </div><!-- .gallery-thumb -->
            <p><em><?php
          printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'leathernote' ),
                      'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'leathernote' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
                      $total_images); ?></em></p><?php
      endif;

      the_excerpt();
    endif; ?>
          </div><!-- .entry-content -->

          <div class="entry-utility">
            <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'leathernote' ), __( '1 Comment', 'leathernote' ), __( '% Comments', 'leathernote' ) ); ?></span>
            <?php edit_post_link( __( 'Edit', 'leathernote' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

<?php /* End of "gallery" category above.
         Now, display posts in the "asides" category
         This is another special category introduced by the TwentyTen category
         which treats posts of this category as simple text whose layout
         just sticks with the next post. Asides posts do not have header titles.
      */
  elseif ( function_exists('has_post_format') && has_post_format( 'aside' ) ) : ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
          <div class="entry-summary">
            <?php $thumbnail_attr = array( 'class'	=> "alignleft" );
                  the_post_thumbnail( 'thumbnail', $thumbnail_attr ); ?>
            <?php the_excerpt(); ?>
          </div><!-- .entry-summary -->
    <?php else : ?>
          <div class="entry-content">
            <?php $thumbnail_attr = array( 'class'	=> "alignleft" );
                  the_post_thumbnail( 'thumbnail', $thumbnail_attr ); ?>
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'leathernote' ) ); ?>
          </div><!-- .entry-content -->
    <?php endif; ?>

          <div class="entry-utility">
            <?php leathernote_posted_on(); ?>
            <span class="meta-sep">|</span>
            <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'leathernote' ), __( '1 Comment', 'leathernote' ), __( '% Comments', 'leathernote' ) ); ?></span>
            <?php edit_post_link( __( 'Edit', 'leathernote' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

<?php /* Display all the other posts (normal posts) */
  else : ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'leathernote' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

          <div class="entry-meta">
            <?php leathernote_posted_on(); ?>
          </div><!-- .entry-meta -->

  <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
          <div class="entry-summary">
            <?php $thumbnail_attr = array( 'class'	=> "attachment alignleft" );
                  the_post_thumbnail( 'thumbnail', $thumbnail_attr ); ?>
            <?php the_excerpt(); ?>
          </div><!-- .entry-summary -->
  <?php else : ?>
          <div class="entry-content">
            <?php $thumbnail_attr = array( 'class'	=> "attachment alignleft" );
                  the_post_thumbnail( 'thumbnail', $thumbnail_attr ); ?>
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'leathernote' ) ); ?>
          </div><!-- .entry-content -->
          <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'leathernote' ), 'after' => '</div>' ) ); ?>
  <?php endif; ?>

          <div class="entry-utility">
            <?php if ( count( get_the_category() ) ) : ?>
              <span class="cat-links">
                <?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'leathernote' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
              </span><br />
            <?php endif; ?>
            <?php
              $tags_list = get_the_tag_list( '', ', ' );
              if ( $tags_list ):
            ?>
              <span class="tag-links">
                <?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'leathernote' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
              </span>
              <span class="meta-sep">|</span>
            <?php endif; ?>
            <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'leathernote' ), __( '1 Comment', 'leathernote' ), __( '% Comments', 'leathernote' ) ); ?></span>
            <?php edit_post_link( __( 'Edit', 'leathernote' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

    <?php comments_template( '', true ); ?>

  <?php //End of long if statement that checks for the category of the post
  endif; // This was the if statement that broke the loop into three parts based on categories.

endwhile; // End the get post loop. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
        <div id="nav-below" class="navigation">
          <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'leathernote' ) ); ?></div>
          <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'leathernote' ) ); ?></div>
        </div><!-- #nav-below -->
<?php endif; ?>
