(function($){
 $.fn.extend({
 
 	customStyle : function(options) {
	  if(!$.browser.msie || ($.browser.msie&&$.browser.version>6)){
	  return this.each(function() {
//	  		if(!$(this).next('span').hasClass('customStyleSelectBox'))
//	  			return;
	  		console.log('UPDATE Select Box');
			var currentSelected = $(this).find(':selected');
			
			$(this).after('<span class="customStyleSelectBox"><span class="customStyleSelectBoxInner">'+currentSelected.text()+'</span></span>').css({position:'absolute', opacity:0,fontSize:$(this).next().css('font-size')});
			var selectBoxSpan = $(this).parent().find('span.customStyleSelectBox');
			console.log('select box span', selectBoxSpan);
			var selectBoxWidth = parseInt($(this).width()) - parseInt(selectBoxSpan.css('padding-left')) -parseInt(selectBoxSpan.css('padding-right'));			
			var selectBoxSpanInner = selectBoxSpan.find(':first-child');
			selectBoxSpan.css({display:'inline-block'});
			selectBoxSpanInner.css({width:selectBoxWidth, display:'inline-block'});
			var selectBoxHeight = parseInt(selectBoxSpan.height()) + parseInt(selectBoxSpan.css('padding-top')) + parseInt(selectBoxSpan.css('padding-bottom'));
			$(this).height(selectBoxHeight).live('change', function(){
				//console.log($(this));
				// selectBoxSpanInner.text($(this).val()).parent().addClass('changed');   This was not ideal
				selectBoxSpanInner.text($(this).children(':selected').text()).parent().addClass('changed');
				// Thanks to Juarez Filho & PaddyMurphy
			});
	  });
	  }
	}
 });
})(jQuery);