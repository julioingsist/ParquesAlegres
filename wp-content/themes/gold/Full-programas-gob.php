<?php
/*
* Template Name: Full Programas Gobierno
*/
if ( !defined('ABSPATH')) exit;
?>
<?php get_header(); ?>
<style>
.animacion_img {
	padding-right:10px;
	padding-left:10px;
}
.animacion_img img{
	margin-top:5px;
	margin-right:25px;
	margin-left:25px;
}
.foto1{
	margin-right:15px !important;
	margin-left:15px !important;
}
.foto2{
	display:none;
}
.foto3{
	display:none;
}
div span{
	display: inline-block;
	width:150px;
}
p>span{
	display:inline;
	width:auto;
}
</style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../jBox-0.3.2/Source/jBox.min.js"></script>
<link href="../jBox-0.3.2/Source/jBox.css" rel="stylesheet">
<script type="text/javascript">
	$(document).ready(function() {
		var optionsc = {
			getTitle: 'data-jbox-title',
			trigger:'click',
			attach: $('.link-formato'),
			content: $('#preview'),
			adjustPosition: true,
			adjustTracker: true,
			pointer: 'left',
			width:'600px',
			height:'350px',
			closeButton:'box',
			closeOnClick:'body',
			autoClose:0,
			ajax: {
				url: 'http://parquesalegres.org/file.php',
				method: 'POST',
				reload: true,
				getData: 'data-ajax',
				setContent: true,
				spinner: true
			}
		};
		var modalformc = new jBox('Modal',optionsc);
		var options = {
			getTitle: 'data-jbox-title',
			trigger:'click',
			attach: $('#formatogestion'),
			content: $('#preview'),
			adjustPosition: true,
			adjustTracker: true,
			pointer: 'left',
			width:'600px',
			height:'350px',
			closeButton:'box',
			closeOnClick:'body',
			autoClose:0,
			ajax: {
				url: 'http://parquesalegres.org/file.php',
				method: 'POST',
				reload: false,
				getData: 'data-ajax',
				setContent: true,
				spinner: true
			}
		};
		var modalform = new jBox('Modal',options);
		var options2 = {
			getTitle: 'data-jbox-title',
			trigger:'click',
			attach: $('#formatogestion2'),
			content: $('#preview'),
			adjustPosition: true,
			adjustTracker: true,
			pointer: 'left',
			width:'600px',
			height:'350px',
			closeButton:'box',
			closeOnClick:'body',
			autoClose:0,
			ajax: {
				url: 'http://parquesalegres.org/file.php',
				method: 'POST',
				reload: false,
				getData: 'data-ajax',
				setContent: true,
				spinner: true
			}
		};
		var modalform2 = new jBox('Modal',options2);
		var options3 = {
			getTitle: 'data-jbox-title',
			trigger:'click',
			attach: $('#formatogestion3'),
			content: $('#preview'),
			adjustPosition: true,
			adjustTracker: true,
			pointer: 'left',
			width:'600px',
			height:'350px',
			closeButton:'box',
			closeOnClick:'body',
			autoClose:0,
			ajax: {
				url: 'http://parquesalegres.org/file.php',
				method: 'POST',
				reload: false,
				getData: 'data-ajax',
				setContent: true,
				spinner: true
			}
		};
		var modalform3 = new jBox('Modal',options3);
	});
</script>
<div class="row">
  <div class="col-lg-12 col-sm-12">
    <?php if(have_posts()): the_post();?>
    <div class="page-header">
      <h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h1>  
    </div>
    <div class="post-content">
      <p class="justify">
      		<center>
            <?php 
        		  if ( has_post_thumbnail() ):
        		    the_post_thumbnail();
        		  endif;
        		?>
      		
      		</center>
		     <?php the_content();?>        
	    </p>
    </div>
    <?php endif;?>
  </div>
<?php get_footer(); ?>