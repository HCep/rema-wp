jQuery(document).ready(function() {

	
	jQuery('.search-icon-mobile').on('click', function(){
		jQuery('#search_form').toggle("slow", function(){
			jQuery('#search_form').css({"height":"50px"});
		});
	})

});




