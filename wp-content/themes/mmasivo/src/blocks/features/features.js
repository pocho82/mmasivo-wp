$ = jQuery;
$(document).ready(function () {
  var $featuresFlowContainer = $('.features__container');
  if ($featuresFlowContainer.length) {
    if ($featuresFlowContainer.children().hasClass('swiper-wrapper')) {
      var swiper = new Swiper('.features__container', {
        slidesPerView: 'auto',
        spaceBetween: 60,
        autoplay: {
          delay: 5000,
        },
      });
    }
  }
});
