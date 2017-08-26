<?php get_header(); ?>
<div class="main" id="content" role="main">
    <div class="top improve"></div>
    <div class="container" id="inner-content" >
    	<h1 class="title-section">
    	    <span><?php _e("Epic 404 - Article Not Found", "ParquesAlegres"); ?></span>
    	</h1>

    	 <article id="post-not-found" class="hentry clearfix">

    	 	<section class="entry-content">
    	 		<p><?php _e("The article you were looking for was not found, but maybe try looking again!", "ParquesAlegres"); ?></p>
    	 	</section> <!-- end article section -->

    	 	<section class="search">
    	 	    <p><?php get_search_form(); ?></p>
    	 	</section> <!-- end search section -->

    	 </article>

    </div>
</div>

<?php get_footer(); ?>