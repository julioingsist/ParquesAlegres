 
 <?php
 
$css_path = plugins_url('ppw.css', __FILE__);
wp_enqueue_style('popularity-posts-widget', $css_path, false);

 ?>
	<div class="postsm" style="vertical-align:top;height:360px;max-height:360px;">
			
			<?php
			 if ($instance['show_thumbs']) {
			?> 
			<br>
			 <a style="color:black;text-decoration:none;" href="<?php echo $permalink; ?>" title="<?php echo $title_posts; ?>" >
			 <?php
			 $temp = $post;
			 $post = get_post($row['id']);
			 setup_postdata($post);
			 echo '<center><div style="line-height:160px;width:150px;height:160px;">
			 <img style="max-height:160px;" src="'.obtener_primer_imagen($row['id']).'"></div>
			 </center>'; ?>
			 <br>
			 <!--<span class="ppw-post-title"><?php //echo ppw_get_TrimTitle($title_posts, $instance['posts_title_length']); ?><br>-->
			 <div style="height:170px;max-height:170px;overflow:hidden;"><center><h4><?php echo $title_posts; ?></h4></center> <?php
			 $excerpt = get_the_excerpt($row['id']);
			 echo $excerpt; ?></div></a>
			 <p align="center"><a class="button" href="<?php echo $permalink; ?>" title="<?php echo $title_posts; ?>" rel="<?php echo 'nofollow'; ?>">Ver más</a></p></span>
			 <!--<span class="post-stats">
				
			<br>
			
			<span class="ppw-views"><?php echo $hits_to_show; ?></span><?php echo $com_pref; ?>
			<span class="ppw-comments"><?php echo $comments_to_show; ?></span> 
			<span class="ppw-date"><?php echo $date_pref.ppw_get_PostDate($row['id'], $instance['date_checkbox'], $instance['date_format'] ); ?></span>
			</span>	-->
			
			 <?php
			 }
			 ?>
	</div>