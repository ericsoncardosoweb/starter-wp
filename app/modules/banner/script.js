jQuery(document).ready(function($) {

  if ( $.isFunction($.fn.slick) ) {
    create_slide();

    $(".banner__slide").slick({
      slidesToShow: 1,
      arrows: false,
      dots: true, 
      speed: 700,
      cssEase: 'linear', 
      fade: true,
      autoplay: false,
      autoplaySpeed: 4000,
    });
  }

});