
    <div id="primary" class="widget-area" role="complementary">
            <ul class="xoxo">

            <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) :
                    $leathernote_showsidebar = 1;
                  else :
                    $leathernote_showsidebar = 0;
                  endif; // end primary widget area ?>


                    <li id="about" class="widget-container">
                      <img src="<?php header_image(); ?>" />

                      <?php
                        if ( (is_single() || is_author()) && get_the_author_meta( 'display_name' ) ) : ?>
                      <div class="sidebar-authorname">
                          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a>
                      </div><?php
                        endif; ?>

                    </li>

                    <li id="search" class="widget-container widget_search">
                        <?php get_search_form(); ?>
                    </li>

            <?php if ( $leathernote_showsidebar ) : ?>
                    <li id="archives" class="widget-container">
                        <h3 class="widget-title"><?php _e( 'Archives', 'leathernote' ); ?></h3>
                        <div class="widget-property">
                        <ul>
                            <?php wp_get_archives( 'type=monthly' ); ?>
                        </ul>
                        </div>
                        <div class="widget-bg-bottom"></div>
                    </li>

                    <li id="meta" class="widget-container">
                        <h3 class="widget-title"><?php _e( 'Recent Posts', 'leathernote' ); ?></h3>
                        <div class="widget-property">
                        <ul>
                            <?php wp_get_archives( 'type=postbypost&limit=12' ); ?>
                        </ul>
                        </div>
                        <div class="widget-bg-bottom"></div>
                    </li>
            <?php endif; // end primary widget area ?>
            </ul> <!-- xoxo -->

            <?php
            // A second sidebar for widgets, just because.
            if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

                <ul class="xoxo">
                  <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
                </ul>

        <?php endif; ?>

		</div><!-- #primary .widget-area -->


