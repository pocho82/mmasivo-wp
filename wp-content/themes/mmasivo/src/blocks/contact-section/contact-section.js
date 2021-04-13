$ = jQuery;
$(document).ready(function () {
  var $contactSection = $('.contact-section');
  if ($contactSection.length) {
    var $contactReasons = $contactSection.find('.contact-section__contact-reasons li span');
    $contactReasons.on('click', function () {
      if ($(this).hasClass('is-active')) {
        return false;
      }
      
      $(this).addClass('is-active');
      $(this).parent().siblings().find('span').removeClass('is-active');

      var $form = $contactSection.find('.wpforms-form')
      var $fieldContactReasons = $form.find('.wpforms-field').last();
      $fieldContactReasons.find('input').val($(this).text());
    });
    $contactReasons.first().click();
  }
});
