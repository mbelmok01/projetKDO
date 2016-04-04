
$(document).ready(function() {
	$(function() {
		$('#foo').carouFredSel({
			auto: false,
			responsive: true,
			width: '100%',
			prev: '#prev',
			next: '#next',
			scroll: 1,
			items: {
				height: 'auto',
				width: 262,
				visible: {
					min: 1,
					max: 1
				}
			},
			mousewheel: true,
			swipe: {
				onMouse: true,
				onTouch: true
			}
		});
	});
});
$(window).load(function() {									
	$('#flexslider').flexslider({
    	animation: "fade",			
    	slideshow: true,			
    	slideshowSpeed: 7000,
    	animationDuration: 600,				
    	prevText: "",
    	nextText: "",
    	controlNav: false,
        sync: "#slides-pagination"					
	});	 				
}); 
