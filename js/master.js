$(document).ready(function(){  
  
	$('ul.tabs li').click(function(){  
		var tab_id = $(this).attr('data-tab');  
		  
		$('ul.tabs li').removeClass('current');  
		$('.tab-content').removeClass('current');  
		  
		$(this).addClass('current');  
		$("#"+tab_id).addClass('current');  

	})  
  
	var $container = $('#container');
		// initialize
	$container.masonry({
		columnWidth: 2,
		itemSelector: '.item',
	});

	$('.userMenu').hover(function(){
		$('.userMenu').toggleClass('showMenu');
	 });

	$('.postHidden').hover(function(){
		$(this).toggleClass('postShow');
	 });

})  