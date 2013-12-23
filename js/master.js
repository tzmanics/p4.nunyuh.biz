$(document).ready(function(){  
  
  	// for responsive layout
	var $container = $('.container');
		// initialize
	$container.masonry({
		columnWidth: 2,
		itemSelector: '.item',
	});

	// to interactively show user menu and post details
	$('.userMenu').hover(function(){
		$(this).toggleClass('showMenu');
	 });

	$('.postHidden').hover(function(){
		$(this).toggleClass('postShow');
	 });

})  