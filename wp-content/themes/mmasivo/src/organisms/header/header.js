$ = jQuery;
$(document).ready(function () {
  if ($('#wpadminbar').length > 0) {
    $('body').addClass('userLogged');
  }

  var $header = $('.o-header');
  var $navigation = $header.find('.o-header__navigation');
  
  var $menuAction = $header.find('.o-header__menu-action');
  $menuAction.on('click', 'button', function (event) {
    $(this).children().toggleClass('is-active');

    if ($navigation.length > 0) {
      $navigation.toggleClass('show-menu');
    }
  });

  var $menuItems = $('.o-header__navigation__menu .menu-item');
  var $submenus = $menuItems.find('.menu-item__submenu');
  if (window.innerWidth >= 768) {
    $submenus.css({
      //'top': (($submenus.parent().offset().top + $submenus.parent().outerHeight()) + 10) + 'px',
      'left': ($submenus.parents('.container').offset().left) + 'px',
      'width': ($submenus.parents('.container').width()) + 'px'
    });
  }
  $submenus.each(function () {
    var $menuItem = $(this).parent();
    if (window.innerWidth < 768) {
      $menuItem.on('click', function () {
        if (!$(this).hasClass('show-submenu')) {
          $(this).addClass('show-submenu').siblings().removeClass('show-submenu');
        } else {
          $(this).removeClass('show-submenu');
        }
      });
    } else {
      $menuItem.hover(
        function() {
          $(this).addClass('show-submenu').siblings().removeClass('show-submenu');
        }, function() {
          var $menuItem = $(this);
          setTimeout(function () {
            if (!$menuItem.is(':hover')) {
              $menuItem.removeClass('show-submenu');
            }
          }, 500);
        }
      );
    }
  });
});
