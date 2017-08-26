<?php
/*
 *Template Name: Page With Right Sidebar
*/
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
?>
<?php get_header(); ?>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../jBox-0.3.2/Source/jBox.min.js"></script>
<link href="../jBox-0.3.2/Source/jBox.css" rel="stylesheet">
<script type="text/javascript">
  $(document).ready(function() {
	  var options = {
		  getTitle: 'data-jbox-title',
		  trigger:'click',
		  attach: $('#catalogo'),
		  content: $('#preview'),
		  adjustPosition: true,
		  adjustTracker: true,
		  pointer: 'left',
		  width:'700px',
		  height:'450px',
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
  });
</script>
  <div class="row">
    <div class="col-lg-8 col-sm-8">
    <?php if(have_posts())
      { 
        the_post();?>
      <div class="page-header">
        <h1><?php the_title();?></h1>
      </div>
      <div class="post-content">
        <p class="justify">
        	 <?php 
            if ( has_post_thumbnail() ):
              the_post_thumbnail();
            endif;
          ?>
          
          <?php the_content();?>
        </p>
      </div>
      <?php 
      }
      else
      {
       ?> 
       <div class="page-header">
         <h1><?php the_title();?></h1>
       </div> 
    <?php
      }
      ?>     
    </div>  
    <div class="col-lg-4 col-sm-4 sidebar">
      <?php if(is_page(12797)){
	get_sidebar("mejorar");
      }elseif(is_page(20786)){
	get_sidebar('capacitacion');
      }
      else{
	get_sidebar();
      }
      ?>
    </div>  
  </div>    
<?php get_footer(); ?>