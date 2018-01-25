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

/** CONTACT FORM 7 **/

// Scroll to invalid field on submit
$(document).ready(function() {
  $(".wpcf7").on('wpcf7:invalid', function(e) {
    $('html, body').animate({scrollTop: $('.wpcf7-not-valid').first().offset().top - 200}, 250);
  });
});

/** END CONTACT FORM 7 **/

})( jQuery );
