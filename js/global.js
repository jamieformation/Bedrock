(function($) {

/** MAIN MENU **/

$('.open-menu-btn').click(function(){
  $('header nav').toggleClass('open');
  $('.open-menu-btn').toggleClass('open');
});

/** END MAIN MENU **/

/** CONTACT FORM 7 **/

// Scroll to invalid field on submit
$(document).ready(function() {
  $(".wpcf7").on('wpcf7:invalid', function(e) {
    if ($('header').css('height') === '60px') { // Mobile view
      $('html, body').animate({scrollTop: $(".wpcf7-not-valid").first().offset().top - 120}, 250);
    } else {
      $('html, body').animate({scrollTop: $(".wpcf7-not-valid").first().offset().top - 200}, 250);
    }
  });
});

/** END CONTACT FORM 7 **/



/*  Mobile menu
    fixed when scroll up */

var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = jQuery('header').outerHeight();

jQuery(window).scroll(function(event){
  didScroll = true;
});

setInterval(function() {
  if (didScroll) {
    hasScrolled();
    didScroll = false;
  }
}, 250);

function hasScrolled() {
  var st = jQuery(this).scrollTop();

  // Make sure they scroll more than delta
  if(Math.abs(lastScrollTop - st) <= delta)
    return;

  // If they scrolled down and are past the navbar, add class .nav-up.
  // This is necessary so you never see what is "behind" the navbar.
  if (st > lastScrollTop && st > navbarHeight){
    // Scroll Down
    jQuery('header').removeClass('nav-down').addClass('nav-up');
  } else {
    // Scroll Up
    if(st + jQuery(window).height() < jQuery(document).height()) {
      jQuery('header').removeClass('nav-up').addClass('nav-down');
    }
  }

  lastScrollTop = st;
}

})( jQuery );
