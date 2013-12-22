$(document).ready(function(){  
  
	var $container = $('.container');
		// initialize
	$container.masonry({
		columnWidth: 2,
		itemSelector: '.item',
	});

	$('.userMenu').hover(function(){
		$(this).toggleClass('showMenu');
	 });

	$('.postHidden').hover(function(){
		$(this).toggleClass('postShow');
	 });

})  