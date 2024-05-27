$(window).on('load',function(){
	var body = document.body;
	body.style.overflow = "hidden";
	window.scrollTo(0, 0);
	
	setTimeout(function(){
	$('.page-loader').fadeOut('slow');
	body.style.overflow = "auto";

	},1200);
});
