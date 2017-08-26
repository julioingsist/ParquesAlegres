<div id="sidebar">
    <div class="subscribe clearfix">
     <h3>¡Suscr&iacute;bete!</h3>
     <ul>
       <li id="rss"><a href="<?php feedburner(); ?>" rel="nofollow" target="_blank">Suscr&iacute;bete via RSS</a></li>
       <?php if(get_option('vividtw_email_subscription') != '') { ?>
	   <li id="email"><a href="<?php echo htmlentities(get_option('vividtw_email_subscription')); ?>" rel="nofollow" target="_blank">Recibe Actualizaciones por Email</a></li>
       <?php } ?>
       <?php if(get_option('vividtw_twitter_account') != '') { ?>
	   <li id="twitter"><a href="http://twitter.com/<?php echo get_option('vividtw_twitter_account'); ?>" rel="nofollow" target="_blank">S&iacute;guenos en Twitter</a></li>
       <?php } ?>
     </ul>
    </div><!--fin subscribe-->
    <?php if (get_option('vividtw_ads125') == "true") { ?>
    <div class="ads clearfix">
    <?php 
		$number = get_option("vividtw_ads_number");
		if ($number == 0) $number = 1;
		$alt_img = array();
		$img_url = array();
		$dest_url = array();
		$numbers = range(1,$number); 
		$counter = 0;
		if (get_option('vividtw_ads_rotate') == "true") {
		shuffle($numbers);
		}
	?>
     <h3>Patrocinadores</h3>
       <div class="adsbanners">
         <?php
			foreach ($numbers as $number) {	
			$counter++;
			$alt_img[$counter] = get_option('vividtw_ad_alt_'.$number);
			$img_url[$counter] = get_option('vividtw_ad_image_'.$number);
			$dest_url[$counter] = get_option('vividtw_ad_url_'.$number);
		?>
        <a href="<?php echo "$dest_url[$counter]"; ?>" title="<?php echo "$alt_img[$counter]"; ?>"><img src="<?php echo "$img_url[$counter]"; ?>" alt="<?php echo "$alt_img[$counter]"; ?>" width="125" height="125" /></a>
        <?php } ?>
       </div>
    </div><!--fin ads-->
    <?php } ?>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Top') ) : ?>
    <div class="sbb clearfix">
     <h3>Blogroll</h3>
      <ul>
        <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
      </ul>
    </div>
    <?php endif; ?>
    <div class="tabs clearfix">
<div class="box">
<ul id="tabMenu">
  <li class="famous selected" title="Art&iacute;culos Populares"></li>
  <li class="commentst" title="&Uacute;ltimos Comentarios"></li>
  <li class="category" title="Etiquetas"></li>
  <li class="random" title="Art&iacute;culos Aleatorios"></li>
  <li class="posts" title="Art&iacute;culos Recientes"></li>
</ul>
<div class="clear"></div>
<div class="boxBody round_8">
  <div id="famous" class="show">
  <h3>Art&iacute;culos Populares</h3>
    <ul>
	<?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 10");
    foreach ($result as $post) {
    setup_postdata($post);
    $postid = $post->ID;
    $title = $post->post_title;
    $commentcount = $post->comment_count;
    if ($commentcount != 0) { ?>
    <li><a href="<?php echo get_permalink($postid); ?>" title="Enlace Permanente a <?php echo $title ?>">
    <?php echo $title ?></a></li>
    <?php } } ?>
    </ul> 
  </div>  
  <div id="commentst">
  <h3>&Uacute;ltimos Comentarios</h3>
    <ul>
      <?php
		global $wpdb;
		$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
		comment_post_ID, comment_author, comment_date_gmt, comment_approved,
		comment_type,comment_author_url,
		SUBSTRING(comment_content,1,50) AS com_excerpt
		FROM $wpdb->comments
		LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
		$wpdb->posts.ID)
		WHERE comment_approved = '1' AND comment_type = '' AND
		post_password = ''
		ORDER BY comment_date_gmt DESC LIMIT 5";
		$comments = $wpdb->get_results($sql);
		$output = $pre_HTML;
		foreach ($comments as $comment) {
		$output .= "\n
		<li>"."<a href=\"" . get_permalink($comment->ID) .
		"#comment-" . $comment->comment_ID . "\" title=\"En " .
		$comment->post_title . "\">" .strip_tags($comment->com_excerpt)
		."... <span>" . strip_tags($comment->comment_author)
		.".</span></a></li>
		";
		}
		$output .= $post_HTML;
		echo $output; ?>
    </ul>
  </div>
  <div id="category">
  <h3>Etiquetas</h3>
    <?php wp_tag_cloud('smallest=10&largest=18'); ?>
 </div>
  <div id="random">
  <h3>Art&iacute;culos Aleatorios</h3>
    <ul>
      <?php
	  query_posts(array('orderby' => 'rand', 'showposts' => 10));
	  if (have_posts()) :
	  while (have_posts()) : the_post();
	  ?>
	  <li><a href="<?php echo the_permalink(); ?>" title="Enlace Permanente a <?php echo the_title() ?>"><?php echo the_title() ?></a></li>
	  <?php endwhile;
	  endif; ?>
    </ul>
  </div>
  <div id="posts">
  <h3>Art&iacute;culos Recientes</h3>
    <ul>
      <?php
	  query_posts(array('orderby' => 'post_date', 'order' => 'desc', 'showposts' => 10));
	  if (have_posts()) :
	  while (have_posts()) : the_post();
	  ?>
	  <li><a href="<?php echo the_permalink(); ?>" title="Enlace Permanente a <?php echo the_title() ?>"><?php echo the_title() ?></a></li>
	  <?php endwhile;
	  endif; ?>
    </ul>  
  </div>        
</div><!-- fin boxBody-->
</div><!--fin box-->
</div><!--fin tabs-->
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Bottom') ) : ?>
    <div class="sbb clearfix">
     <h3>Archivos</h3>
      <ul>
		<?php wp_get_archives('type=monthly'); ?>
	  </ul>
    </div>
    <?php endif; ?>
</div><!--fin sidebar-->
