$ = jQuery;
$(document).ready(function () {
  var $tabs = $('.tabs');
  if ($tabs.length) {
    var $navigationItems = $tabs.find('.tabs__navigation__menu-item');
    var $contentElements = $tabs.find('.content-element');
    $navigationItems.on('click', function () {
      if (!$(this).hasClass('is-active')) {
        $(this).addClass('is-active').siblings().removeClass('is-active');
        var index = $(this).index();
        
        var $content = $contentElements.eq(index);
        $content.addClass('is-shown');
        if ($content.find('video').length > 0) {
          var $video = $content.find('video').get(0);
          $video.play();
        }

        var $otherContents = $content.addClass('is-shown').siblings();
        $otherContents.removeClass('is-shown');
        if ($otherContents.find('video').length > 0) {
          var $videos = $content.find('video');
          $videos.each(function () {
            var $video = $(this).get(0);
            $video.pause();
          });
        }
      }
    });
    $navigationItems.first().click();
  }
});
