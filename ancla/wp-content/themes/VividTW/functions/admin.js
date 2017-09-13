//Featured posts list on theme options page
$(document).ready(function(){

	$(".featured-post-list tr:even").css("background-color", "#f2f2f2");

});

//Featured posts list on theme options page
$(document).ready(function(){

	$(".contact-form-builder tr:even").css("background-color", "#f2f2f2");

});

//Help boxes
$(document).ready(function(){
	
	
	$("a.vividtw-open").click(function(){

		$($(this).attr('href')).fadeIn('normal');
        return false;
		
	});

	
	$('a.vividtw-close').click(function() {
	
        $($(this).attr('href')).fadeOut();
        return false;
        
    });
	
	
});


$(document).ready(function(){
	
	/*		
	//Show Blog Options meta box if user selects "Blog Page" as their page template.
	$("#page_template").click(function(){
								   
		if ($('#page_template').val() == "template_blog.php" ) {
		
			$("#blog-options-meta").slideDown("normal"); 
		
		} else {
			
			$("#blog-options-meta").slideUp("normal");
		
		}
		
	});
	
	//Show Blog Options meta box if user selects "Blog Page" as their page template.
	$("#page_template").click(function(){
								   
		if ($('#page_template').val() == "template_news.php" ) {
		
			$("#news-options-meta").slideDown("normal"); 
		
		} else {
			
			$("#news-options-meta").slideUp("normal");
		
		}
		
	});
	
	//Show Portfolio Options meta box if user selects "Portfolio Page" as their page template.
	$("#page_template").click(function(){
								   
		if ($('#page_template').val() == "template_portfolio.php" ) {
		
			$("#portfolio-options-meta").slideDown("normal"); 
		
		} else {
			
			$("#portfolio-options-meta").slideUp("normal");
		
		}
		
	});

	*/
	
	//Show Portfolio Image meta box if user is creating a portfolio item
    $(".blog-type-trigger").click(function(){
    
		if ($('input[name=blog-type_value]:checked').val() == "portfolio" ) {
	
	    	$("#portfolio-image-meta").slideDown("normal");
	
	    } else {
	
	        $("#portfolio-image-meta").slideUp("normal");
	
	    }
	
	});
	
	//Show homepage display options if this is a featured item
    $(".featured-trigger").click(function(){
    
		if ($('input[name=featured-item_value]:checked').val() == "true" ) {
	
	    	$("#home-display-meta").slideDown("normal");
	
	    } else {
	
	        $("#home-display-meta").slideUp("normal");
	
	    }
	
	});
	
});
