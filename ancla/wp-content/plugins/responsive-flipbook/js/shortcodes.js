/*-----------------------------------------------------------------------------------*/
/*	jQuery for MassivePixelCreation Custom Shortcodes
/*	version 1.0
/*-----------------------------------------------------------------------------------*/

jQuery(function($){
    $(document).ready(function(){ 
   		
   		/* Toggle Handler */
   		
         $(".toggle-content").hide();
         $("div.toggle-header").click(function(){
        	$(this).toggleClass("active").next().slideToggle("normal");
        	$(this).find('h3').toggleClass("active").next().slideToggle("normal");        	
        	return false;
   		 });
   		 
   		/* End Toggle Handler */ 
   		
  		/* Tabs Handler */
  		
  		$('div.tabs div.tab_content').hide(); 
		$('div.tabs div.tab_content:first').fadeIn(); // Show the first div
		$('div.tabs ul li:first').addClass('active'); // Set the class of the first link to active
		
		$('div.tabs ul li a').click(function() { 
			$('div.tabs ul li').removeClass('active'); // Remove active class from all links
			$(this).parent().addClass('active'); //Set clicked link class to active
			var currentTab = $(this).attr('href'); // Set variable currentTab to value of href attribute of clicked link
			$('div.tabs div').hide(); // Hide all divs
			$(currentTab).fadeIn(); // Show div with id equal to variable currentTab
			return false;  		
		});
		
  		/* End Tabs Handler */
 
     }); 
}); 

/*------------------------------------ The End ------------------------------------- */