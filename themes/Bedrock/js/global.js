/** MAIN MENU **/

jQuery('.open-menu-btn').click(function(){
	jQuery('header nav').addClass('open');
	jQuery('.open-menu-btn').toggleClass('open');
	jQuery('.screen-overlay').fadeIn();
});

jQuery('.screen-overlay').click(function(){
	jQuery('header nav').removeClass('open');
	jQuery(this).fadeOut();
});

/** END MAIN MENU **/