jQuery(document).ready(function($){
	
	$('body').on('click', '.ebor-icons i', function(){
		$('.ebor-icons i').removeClass('active');
		$(this).addClass('active');
		$('.ebor-icon-value').attr('value', $(this).attr('data-icon-class'));
	});
	
	$('body').on('click', '#ebor-icon-toggle', function(){
		$('.ebor-icons-wrapper').slideToggle();
		return false;
	});

	$(document).bind('ocdiImportComplete', function(e){
		$('.ocdi__response .notice-success').html("<p><strong>That's it, all done!</strong><br>The demo import has finished. Now you can go ahead and import the <strong>Revolution Slider Demo Sliders</strong> - do begin doing this head to the Revolution Slider admin area within your dashboard.</p>");
	});
});