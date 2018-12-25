// JQuery's Document Ready Function
($ => {
  $(document).ready(function() {
		// Hamburger menu toggle
		$('.toggle-button .hamburger').click(function() {
			$(this).toggleClass('is-active');
			// Offcanvas menu
			$('#site-canvas').toggleClass('show-offcanvas');
		});

		// Slick slider
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
  });
})(jQuery);
