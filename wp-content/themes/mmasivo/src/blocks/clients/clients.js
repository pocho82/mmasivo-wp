$ = jQuery;
$(document).ready(function () {
  var $clients = $('.clients__container');
  if ($clients.length) {
    var swiper = new Swiper('.clients__container', {
      slidesPerView: 'auto',
      autoplay: {
        delay: 5000,
      },
    });
  }
});
