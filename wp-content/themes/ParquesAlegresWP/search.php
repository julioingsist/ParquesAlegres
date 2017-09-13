  <?php get_header(); ?>
<div class="main" id="content" role="main">
    <div class="top improve"></div>
    <div class="container" id="inner-content" >
      <h1 class="title-section">
          <span><?php _e('Search Results for:', 'ParquesAlegres'); ?> <?php echo esc_attr(get_search_query()); ?></span>
      </h1>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

          <header class="article-header">

            <h3 class="search-title"><a class="link--natural" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
              <?php get_template_part( 'partials/content', 'byline' ); ?>

          </header> <!-- end article header -->

          <section class="entry-content">
              <?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'ParquesAlegres') . '</span>'); ?>

          </section> <!-- end article section -->

          <footer class="article-footer">

          </footer> <!-- end article footer -->

        </article> <!-- end article -->

      <?php endwhile; ?>

          <?php if (function_exists('joints_page_navi')) { ?>
              <?php joints_page_navi(); ?>
          <?php } else { ?>
              <nav class="wp-prev-next">
                  <ul class="clearfix">
                    <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "ParquesAlegres")) ?></li>
                    <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "ParquesAlegres")) ?></li>
                  </ul>
              </nav>
          <?php } ?>

        <?php else : ?>

            <article id="post-not-found" class="hentry clearfix">
              <header class="article-header">
                <h1><?php _e("Disculpa, no se econtraron resultados.", "ParquesAlegres"); ?></h1>
              </header>
              <section class="entry-content">
                <p><?php _e("Intente la busqueda de nuevo.", "ParquesAlegres"); ?></p>
              </section>
            </article>

        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>