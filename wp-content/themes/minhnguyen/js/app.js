// JQuery's Document Ready Function
($ => {
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

    // Full-width slider
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
          adaptiveHeight: true
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
  });
})(jQuery);
