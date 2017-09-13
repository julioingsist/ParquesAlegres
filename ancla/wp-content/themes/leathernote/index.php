<?php get_header(); ?>

    <div id="container">
      <div id="content" role="main">

        <?php get_template_part( 'loop', 'index' ); ?>

      </div><!-- #content -->

      <div id="page-bottom">
        <div class="page-bottom-content">&nbsp;</div><!-- .page-bottom-content -->
      </div><!-- #page-bottom -->
    </div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
