	   jQuery(document).ready(function() {

	   	jQuery('#example_showhidden').click(function() {
	     		jQuery('#section-example_text_hidden').fadeToggle(400);
	   	});
	   	
	   	if (jQuery('#example_showhidden:checked').val() !== undefined) {
	   		jQuery('#section-example_text_hidden').show();
	   	}

	   	jQuery('#video_hidden').click(function() {
	     		jQuery('#section-show_video_hidden').fadeToggle(400);
	     		jQuery('#section-show_image_hidden').hide();
	     		jQuery('#image_hidden').prop('checked',false);
	     		
	    });
	    
	    if (jQuery('#video_hidden:checked').val() !== undefined) {
	    	jQuery('#section-show_video_hidden').show();
	    }
	    jQuery('#image_hidden').click(function() {
	     		jQuery('#section-show_image_hidden').fadeToggle(400);
	     		jQuery('#section-show_video_hidden').hide();
	     		jQuery('#video_hidden').prop('checked',false);	
	     		
	    });
	    if (jQuery('#image_hidden:checked').val() !== undefined) {
	    	jQuery('#section-show_image_hidden').show();
	    }

	    jQuery('#enable').click(function() {
      		jQuery('#section-rss').fadeToggle(400);
   	    	jQuery('#section-flicker').fadeToggle(400);
   	    	jQuery('#section-fb').fadeToggle(400);
   	    	jQuery('#section-twitter').fadeToggle(400);
   	    	jQuery('#section-youtube').fadeToggle(400);
   	    	jQuery('#disable').prop('checked',false);
	      		
	    });
	     
	    if(jQuery('#enable:checked').val() !== undefined) {
     		jQuery('#section-rss').show();
   	    	jQuery('#section-flicker').show();
   	    	jQuery('#section-fb').show();
   	    	jQuery('#section-twitter').show();
   	    	jQuery('#section-youtube').show();
	    }

	    
	   

	    jQuery('#preset').click(function() {
	       		if(jQuery('#preset').prop('checked',true))
	       		{
	       			jQuery('#custom').prop('checked',false)	
	       		}
	    });

	    jQuery('#custom').click(function() {
	       		if(jQuery('#custom').prop('checked',true))
	       		{
	       			jQuery('#preset').prop('checked',false)	
	       		}
	    });


	    jQuery('#single_btn').click(function() {
      		jQuery('#section-btntxt').fadeToggle(400);
	        jQuery('#section-modal-title').fadeToggle(400);
	        jQuery('#section-modal-content').fadeToggle(400);
	        jQuery('#section-btntxt1').hide();
	        jQuery('#section-modal-title1').hide();
	        jQuery('#section-modal-content1').hide();
    		jQuery('#section-btntxt2').hide();
    		jQuery('#section-btnlink2').hide();
    		jQuery('#two_btn').prop('checked',false);
	      		
	    });
	     
	    if(jQuery('#single_btn:checked').val() !== undefined) {
	     	jQuery('#section-btntxt').show();
	     	jQuery('#section-modal-title').show();
	        jQuery('#section-modal-content').show();
	     	jQuery('#section-btntxt1').hide();
    		jQuery('#section-modal-title1').hide();
	        jQuery('#section-modal-content1').hide();
    		jQuery('#section-btntxt2').hide();
    		jQuery('#section-btnlink2').hide();
	    }

   	    jQuery('#two_btn').click(function() {
         	
	        jQuery('#section-btntxt1').fadeToggle(400);
	        jQuery('#section-modal-title1').fadeToggle(400);
	        jQuery('#section-modal-content1').fadeToggle(400);
    		jQuery('#section-btntxt2').fadeToggle(400);
    		jQuery('#section-btnlink2').fadeToggle(400);
    		jQuery('#section-btntxt').hide();
	        jQuery('#section-modal-title').hide();
	        jQuery('#section-modal-content').hide();
    		jQuery('#single_btn').prop('checked',false);
   	      		
   	    });
   	     
   	    if(jQuery('#two_btn:checked').val() !== undefined) {
   	     	jQuery('#section-btntxt1').show();
	        jQuery('#section-modal-title1').show();
	        jQuery('#section-modal-content1').show();
    		jQuery('#section-btntxt2').show();
    		jQuery('#section-btnlink2').show();
    		jQuery('#section-btntxt').hide();
	        jQuery('#section-modal-title').hide();
	        jQuery('#section-modal-content').hide();
   	    }
	           
	    jQuery('#id-active li').click(function(){
	    		jQuery('#id-active li').removeClass('current');
	    		jQuery(this).addClass('current');
	    });	 

	    

	    jQuery('#box-1').click(function() {
      		jQuery('#section-b1_title').fadeToggle(400);
      		jQuery('#section-b1_editor').fadeToggle(400);
      		jQuery('#d-box-1').prop('checked',false);
	      		
	    });
	     
	    if(jQuery('#box-1:checked').val() !== undefined) {
	     	jQuery('#section-b1_title').show();
	     	jQuery('#section-b1_editor').show();
	    }

	    jQuery('#d-box-1').click(function() {
      		jQuery('#section-b1_title').hide();
      		jQuery('#section-b1_editor').hide();
      		jQuery('#box-1').prop('checked',false);
	      		
	    });
	     
	    if(jQuery('#d-box-1:checked').val() !== undefined) {
	     	jQuery('#section-b1_title').hide();
	     	jQuery('#section-b1_editor').hide();
	    }


	    jQuery('#box-2').click(function() {
      		jQuery('#section-b2_title').fadeToggle(400);
      		jQuery('#section-b2_editor').fadeToggle(400);
      		jQuery('#section-collapse_title1').hide();
      		jQuery('#section-example_collapse1').hide();
      		jQuery('#section-collapse_title2').hide();
      		jQuery('#section-example_collapse2').hide();
      		jQuery('#section-collapse_title3').hide();
      		jQuery('#section-example_collapse3').hide();
      		jQuery('#d-box-2').prop('checked',false);
	      		
	    });
	     
	    if(jQuery('#box-2:checked').val() !== undefined) {
	     	jQuery('#section-b2_title').show();
	     	jQuery('#section-b2_editor').show();
	     	jQuery('#section-collapse_title1').hide();
      		jQuery('#section-example_collapse1').hide();
      		jQuery('#section-collapse_title2').hide();
      		jQuery('#section-example_collapse2').hide();
      		jQuery('#section-collapse_title3').hide();
      		jQuery('#section-example_collapse3').hide();
	    }

	    jQuery('#d-box-2').click(function() {
      		jQuery('#section-b2_title').hide();
      		jQuery('#section-b2_editor').hide();
      		jQuery('#section-collapse_title1').fadeToggle(400);
      		jQuery('#section-example_collapse1').fadeToggle(400);
      		jQuery('#section-collapse_title2').fadeToggle(400);
      		jQuery('#section-example_collapse2').fadeToggle(400);
      		jQuery('#section-collapse_title3').fadeToggle(400);
      		jQuery('#section-example_collapse3').fadeToggle(400);
      		jQuery('#box-2').prop('checked',false);
	      		
	    });
	     
	    if(jQuery('#d-box-2:checked').val() !== undefined) {
	     	jQuery('#section-b2_title').hide();
	     	jQuery('#section-b2_editor').hide();
	     	jQuery('#section-collapse_title1').show();
      		jQuery('#section-example_collapse1').show();
      		jQuery('#section-collapse_title2').show();
      		jQuery('#section-example_collapse2').show();
      		jQuery('#section-collapse_title3').show();
      		jQuery('#section-example_collapse3').show();
	    }

	    jQuery('#box-3').click(function() {
      		jQuery('#section-b3_title').fadeToggle(400);
      		jQuery('#section-b3_editor').fadeToggle(400);
      		jQuery('#d-box-3').prop('checked',false);
	      		
	    });
	     
	    if(jQuery('#box-3:checked').val() !== undefined) {
	     	jQuery('#section-b3_title').show();
	     	jQuery('#section-b3_editor').show();
	    }
	    jQuery('#d-box-3').click(function() {
      		jQuery('#section-b3_title').hide();
      		jQuery('#section-b3_editor').hide();
      		jQuery('#box-3').prop('checked',false);
	      		
	    });
	     
	    if(jQuery('#d-box-3:checked').val() !== undefined) {
	     	jQuery('#section-b3_title').hide();
	     	jQuery('#section-b3_editor').hide();
	    }
		   
	  });