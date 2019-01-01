// JQuery's Document Ready Function
($ => {
  // Resolve Gravity Forms ajax after form render not recognizing JS code
  // @link https://stackoverflow.com/questions/29921438/jquery-callback-after-gravity-form-submit
  $(document).on("gform_post_render", function(event, formId) {
    // Workaround for <label> conditional position
    var inputs = [".ginput_container input", ".ginput_container textarea"];
    for (let i = 0; i < inputs.length; i++) {
      $(inputs[i]).each(function() {
        if ($(this).val() == "") {
          $(this)
            .parent()
            .find("label")
            .removeClass("active");
        } else {
          $(this)
            .parent()
            .find("label")
            .addClass("active");
        }
      });
      $(inputs[i]).focusout(function() {
        if ($(this).val() == "") {
          $(this)
            .parent()
            .find("label")
            .removeClass("active");
        } else {
          $(this)
            .parent()
            .find("label")
            .addClass("active");
        }
      });
    }
  });
  $(document).ready(function() {
    // Init smoothscroll for internal links
    var scroll = new SmoothScroll('a[href*="#"]', {
      speed: 500,
      speedAsDuration: true,
      easing: "easeInOutCubic",
      updateURL: false
    });
    // Hamburger menu toggle
    $(".toggle-button .hamburger").click(function() {
      $(this).toggleClass("is-active");
      // Offcanvas menu
      $("#site-canvas").toggleClass("show-offcanvas");
    });

    // Full-width slider
    $(".fullwidth-slider").each(function() {
      if (!$(this).hasClass("slick-initialized")) {
        $(this).slick({
          autoplay: true,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
          autoplaySpeed: 5000
        });
      }
    });

    // Testimonials slider
    $(".testimonials-slider").each(function() {
      if (!$(this).hasClass("slick-initialized")) {
        $(this).slick({
          autoplay: true,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
          autoplaySpeed: 8000,
          fade: true,
          cssEase: "ease",
					adaptiveHeight: true,
					pauseOnHover: true,
        });
      }
    });
    // Center-mode slider
    $(".center-slider").each(function() {
      if (!$(this).hasClass("slick-initialized")) {
        $(this).slick({
          autoplay: true,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
          autoplaySpeed: 8000,
          centerMode: true,
          variableWidth: true,
          responsive: [
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                centerMode: false,
                variableWidth: false
              }
            }
          ]
        });
      }
    });

    // Timeline slider
    $(".events-nav a").click(function(e) {
      e.preventDefault();
      var slideID = $(this).data("id"),
        goTo = $(this).data("slide"),
        totalNav = $(".events-nav .flex-1").length,
        $timelineBar = $(".events-nav .timeline-bar"),
        $timelineDot = $(".events-nav .timeline-dot");

      for (let i = 0; i < totalNav; i++) {
        if (i < goTo) {
          $(".events-nav .event-" + i + " .dot").addClass("dot--past");
        } else {
          $(".events-nav .event-" + i + " .dot").removeClass("dot--past");
        }
      }
      var timelineWidth = (100 / totalNav / 2) * ((goTo + 1) * 2 - 1);
      $timelineBar.css("width", timelineWidth + "%");
      $timelineDot.css("left", "calc(" + timelineWidth + "% - 6px)");
      $("#" + slideID).slick("goTo", goTo);
    });
    $(".events-slider").each(function() {
      if (!$(this).hasClass("slick-initialized")) {
        $(this).slick({
          autoplay: false,
          speed: 1000,
          infinite: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          arrows: false,
          responsive: [
            {
              breakpoint: 767,
              settings: {
                dots: true
              }
            }
          ]
        });
      }
    });
  });
})(jQuery);
