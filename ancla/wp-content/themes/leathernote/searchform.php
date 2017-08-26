
<form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>/" >
	<div>
    	<label for="s">Search:</label><br />
		<input type="text" name="s" id="s" value="<?php the_search_query(); ?>"  />
		<input type="submit" id="searchsubmit" value="" />
	</div>
</form>

