$ = jQuery;
$(document).ready(function () {
  var $featuresFlowContainer = $('.features-flow__container');
  if ($featuresFlowContainer.length) {
    var $navigation = $featuresFlowContainer.find('.navigation');
    var $navigationItems = $navigation.find('.navigation__item');
    var $contentElements = $featuresFlowContainer.find('.content__element');

    $navigationItems.on('click', function () {
      if (!$(this).hasClass('is-active')) {
        $(this).addClass('is-active').siblings().removeClass('is-active');

        var index = $(this).index();
        if (!$contentElements.eq(index).hasClass('is-shown')) {
          $contentElements.eq(index).addClass('is-shown').siblings().removeClass('is-shown');
        }
      }
    });
    $navigationItems.first().click();
  }
});
