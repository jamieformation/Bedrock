(function($) {

/** MAIN MENU **/

$('.open-menu-btn').click(function(){
	$('header nav').addClass('open');
	$('.open-menu-btn').toggleClass('open');
	$('.screen-overlay').fadeIn();
});

$('.screen-overlay').click(function(){
	$('header nav').removeClass('open');
	$(this).fadeOut();
});

/** END MAIN MENU **/

})( jQuery );
