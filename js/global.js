"use strict";

(function ($) {
  // MAIN MENU
  $('.open-menu-btn').click(function () {
    $('header nav').toggleClass('open');
    $('.open-menu-btn').toggleClass('open');
  }); // END MAIN MENU
  // CONTACT FORM 7
  // Scroll to invalid field on submit

  $(document).ready(function () {
    $(".wpcf7").on('wpcf7:invalid', function (e) {
      if ($('header').css('height') === '60px') {
        // Mobile view
        $('html, body').animate({
          scrollTop: $(".wpcf7-not-valid").first().offset().top - 120
        }, 250);
      } else {
        $('html, body').animate({
          scrollTop: $(".wpcf7-not-valid").first().offset().top - 200
        }, 250);
      }
    });
  }); // END CONTACT FORM 7
  // HTTP GET VARIABLES

  function $_GET(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " ")); // var variable = $_GET('variable-name')
  } // END HTTP GET VARIABLES

  /*  SMOOTH SCROLL
      Assign link .smooth-scroll
      data-target="#elementToScrollTo"
      (optional) data-scroll-speed="timeInMilliseconds" */


  jQuery('.smooth-scroll').click(function (e) {
    e.preventDefault();
    var el = jQuery(this).data('target'),
        speed;
    if (speed = jQuery(this).data('scroll-speed')) ;
    jQuery('html, body').animate({
      scrollTop: jQuery(el).offset().top
    }, speed);
  }); // END SMOOTH SCROLL

  /*  Mobile menu
      fixed when scroll up */

  var didScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var navbarHeight = jQuery('header').outerHeight();
  jQuery(window).scroll(function (event) {
    didScroll = true;
  });
  setInterval(function () {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    var st = jQuery(this).scrollTop(); // Make sure they scroll more than delta

    if (Math.abs(lastScrollTop - st) <= delta) return; // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.

    if (st > lastScrollTop && st > navbarHeight) {
      // Scroll Down
      jQuery('header').removeClass('nav-down').addClass('nav-up');
    } else {
      // Scroll Up
      if (st + jQuery(window).height() < jQuery(document).height()) {
        jQuery('header').removeClass('nav-up').addClass('nav-down');
      }
    }

    lastScrollTop = st;
  }
})(jQuery);