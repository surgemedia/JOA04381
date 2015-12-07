/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

  /*=============================================
  = Enabling multi-level navigation =
  ===============================================*/
  $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
      event.preventDefault(); 
      event.stopPropagation(); 
      $(this).parent().siblings().removeClass('open');
      $(this).parent().toggleClass('open');
  });

  /*=============================================
  = Reopen login modal if incorrect credentials =
  ===============================================*/
  if($('#theme-my-login1 .error').text()) {
      $('#mylogin').modal('show');
  }

  /*=============================================
  = Smooth scroll =
  ===============================================*/
  $('a[href*=#]:not([href=#],[href=#events-carousel],[href=#products-carousel])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {

        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
  });

  /*=============================================
  =           Gallery Carousel                  =
  ===============================================*/
  jQuery(document).ready(function($) {
        var sliderGallery = $('.galleryCarousel');
         sliderGallery.carousel({ interval: 5000 });
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        var carousel_id = $(this).closest('.slider');
        carousel_id = $(carousel_id).find('.galleryCarousel');
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            // console.log(id_selector, id);
            console.log(carousel_id);
           $(carousel_id).carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        sliderGallery.on('slid.bs.carousel', function (e) {
         var id = $('.item.active').data('slide-number');
        sliderGallery.closest( ".carousel-text" ).html($('#slide-content-'+id).html());
        });
  });
  /*=============================================
  =   Stop video on home page when modal is closed   =
  ===============================================*/

  $('#site-video-modal').on('hide.bs.modal',function(){
    $('#site-video-modal iframe').attr('src',$('#site-video-modal iframe').attr('src'));
  })

})(jQuery); // Fully reference jQuery after this point.

/*=============================================
= complete lesson confirmation  =
===============================================*/
function completeLessonConfirmation() {
    var res = confirm("Are you sure you want to mark this as completed?");
    if(res == true) {
      location.href = window.location+'?finished-lesson=true';
    }
}
/*=============================================
= reset progress confirmation  =
===============================================*/
function resetProgressConfirmation() {
    var res = confirm("Are you sure you want to Reset your Progress? This will reset all your completed lessons & modules");
    if(res == true) {
      location.href = window.location+'/?reset';
    }
}
