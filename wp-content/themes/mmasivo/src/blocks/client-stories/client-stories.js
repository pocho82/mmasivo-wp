$ = jQuery;
$(document).ready(function () {
  var $clientStoriesContainer = $('.client-stories__container');
  if ($clientStoriesContainer.length) {
    var swiper = new Swiper('.client-stories__container', {
      slidesPerView: 1,
      autoHeight: true,
      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 20
        },
        // when window width is >= 480px
        1024: {
          slidesPerView: 3,
          spaceBetween: 30
        },
      },
      autoplay: {
        delay: 5000,
      },
    });
  }
});