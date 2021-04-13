$ = jQuery;
$(document).ready(function () {
  var $testimonialsFlowContainer = $('.testimonials__container');
  if ($testimonialsFlowContainer.length) {
    var swiper = new Swiper('.testimonials__container', {
      slidesPerView: 1,
      autoHeight: true,
      autoplay: {
        delay: 5000,
      },
      pagination: {
        el: '.testimonials__container .swiper-pagination',
        type: 'bullets',
        clickable: true,
      },
    });
  }
});
