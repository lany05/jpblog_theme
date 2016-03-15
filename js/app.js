jQuery(document).ready(function($) {

	$( ".search-toggle" ).click(function() {
		$( ".search-input, .main-nav, .search-toggle" ).toggleClass('active');
	});

	$('#twitter-slider').owlCarousel({
		loop:true,
		margin:0,
		items:1,
		autoplay:true,
		smartSpeed:1500,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		dot:true
	});
});

