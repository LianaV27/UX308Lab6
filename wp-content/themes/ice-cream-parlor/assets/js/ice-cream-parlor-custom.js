/**
  * Theme Js file.
**/
jQuery(function($) {
  "use strict";

  // Search focus handler
  function searchFocusHandler() {
    const searchFirstTab = $('.inner_searchbox input[type="search"]');
    const searchLastTab = $('button.search-close');

    $(".open-search").click(function(e) {
      e.preventDefault();
      e.stopPropagation();
      $('body').addClass("search-focus");
      searchFirstTab.focus();
    });

    $("button.search-close").click(function(e) {
      e.preventDefault();
      e.stopPropagation();
      $('body').removeClass("search-focus");
      $(".open-search").focus();
    });

    // Redirect last tab to first input
    searchLastTab.on('keydown', function(e) {
      if ($('body').hasClass('search-focus') && e.which === 9 && !e.shiftKey) {
        e.preventDefault();
        searchFirstTab.focus();
      }
    });

    // Redirect first shift+tab to last input
    searchFirstTab.on('keydown', function(e) {
      if ($('body').hasClass('search-focus') && e.which === 9 && e.shiftKey) {
        e.preventDefault();
        searchLastTab.focus();
      }
    });

    // Allow escape key to close menu
    $('.inner_searchbox').on('keyup', function(e) {
      if ($('body').hasClass('search-focus') && e.keyCode === 27) {
        $('body').removeClass('search-focus');
        searchLastTab.focus();
      }
    });
  }

  // Call the search focus handler
  searchFocusHandler();

  // Preloader
  $(document).ready(function() {
    setTimeout(function() {
      $(".loader").fadeOut("slow");
    }, 1000);
  });

  // Scroll to top
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });

  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop: 0
    }, 500);
  });

  // Slider
  $(document).ready(function() {
    $('#slider .owl-carousel').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      dots: true,
      rtl: false,
      items: 1,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
    });
  });

  // Slider first word
  document.addEventListener('DOMContentLoaded', function() {
    var titles = document.querySelectorAll('.custom-title a');
    titles.forEach(function(title) {
      var text = title.textContent;
      var firstSpaceIndex = text.indexOf(' ');
      if (firstSpaceIndex !== -1) {
        var firstWord = text.substring(0, firstSpaceIndex);
        var restOfText = text.substring(firstSpaceIndex);
        title.innerHTML = '<span class="first-word">' + firstWord + '</span>' + restOfText;
      } else {
        // If there's only one word
        title.innerHTML = '<span class="first-word">' + text + '</span>';
      }
    });
  });

  // Products section
  $(document).ready(function() {
    $("#product-section .owl-carousel").owlCarousel({
      items: 2,
      loop: true,
      margin: 0,
      nav: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        }
      }
    });
  });
});

// Mobile responsive menu functions
function ice_cream_parlor_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}

function ice_cream_parlor_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}