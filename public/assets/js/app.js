"use strict";

$(function () {
  $('select.c_select').each(function () {
    var $this = $(this);
    var html = '<div class="c_select" id="';
    html += $this.attr('id');
    html += '"><div class="c_select-placeholder">';
    html += $this.find('option:eq(0)').text();
    html += '</div><div class="c_select-block display-n"><div class="c_select-wrapper">';
    $this.find('option:eq(0)').css('display', 'none');
    $this.find('option').each(function () {
      html += '<button class="c_select-element" data-val="' + $(this).attr('value') + '" type="button">' + $(this).text() + '</button>';
    });
    html += '</div></div></div></div>';
    $(html).insertAfter($this.hide());
    $('.c_select-element[data-val="undefined"]').remove();
    var $next = $this.next();
    $next.find('.c_select-placeholder').on('click', function (e) {
      e.preventDefault();
      $next.find('.c_select-block').toggleClass('display-n'), $next.toggleClass('c_select-item-active');
    }).end().find('.c_select-element').on('click', function (e) {
      e.preventDefault();
      $('.c_select-element').removeClass('c_select-element-active');
      $(this).addClass('c_select-element-active');
      $next.find('.c_select-placeholder').text($(this).text());
      $this.val($(this).data('val')).trigger('change');
      $next.find('.c_select-placeholder').trigger('click');
    });
  });
});
$(function () {
  setTimeout(function () {
    for (var i = 1; i <= $('.ind-main__forms-e').length; i++) {
      $('.ind-main__forms-bar').eq(i - 1).css('width', "".concat($('.ind-main__forms-p').eq(i - 1).attr('data-progress')));
    }
  }, 500);
  $('#index__phone, #reg__phone').mask('+7 (999) 999-99-99');
  $('#company__three').datepicker();
}); //! Model - Thx Request

$('.registration__submit').on('click', function () {
  $('.thx_request').removeClass('display-n');
  $('body').css('overflow', 'hidden');
});
$('.thx_request__c, .thx_request__close').on('click', function () {
  $('.thx_request').addClass('display-n');
  $('body').css('overflow', 'visible');
});
$('.thx_request').mouseup(function (e) {
  var div = $('.thx_request__w');

  if (!div.is(e.target) && div.has(e.target).length === 0) {
    $('.thx_request').addClass('display-n');
    $('body').css('overflow', 'visible');
  }
}); //! Model - Registration

$('.header__b').on('click', function () {
  $('.registration').removeClass('display-n');
  $('body').css('overflow', 'hidden');
});
$('.registration__c').on('click', function () {
  $('.registration').addClass('display-n');
  $('body').css('overflow', 'visible');
});
$('.registration').mouseup(function (e) {
  var div = $('.registration__w');

  if (!div.is(e.target) && div.has(e.target).length === 0) {
    $('.registration').addClass('display-n');
    $('body').css('overflow', 'visible');
  }
}); //! Model - Info Car

$('.company__list-show').on('click', function () {
  $('.info_car').removeClass('display-n');
  $('body').css('overflow', 'hidden');
});
$('.info_car__c').on('click', function () {
  $('.info_car').addClass('display-n');
  $('body').css('overflow', 'visible');
});
$('.info_car').mouseup(function (e) {
  var div = $('.info_car__w');

  if (!div.is(e.target) && div.has(e.target).length === 0) {
    $('.info_car').addClass('display-n');
    $('body').css('overflow', 'visible');
  }
}); //! Model - Add Client

$('.selectTwo__i-add').on('click', function () {
  $('.addClient').removeClass('display-n');
  $('body').css('overflow', 'hidden');
});
$('.addClient__c').on('click', function () {
  $('.addClient').addClass('display-n');
  $('body').css('overflow', 'visible');
});
$('.addClient').mouseup(function (e) {
  var div = $('.addClient__w');

  if (!div.is(e.target) && div.has(e.target).length === 0) {
    $('.addClient').addClass('display-n');
    $('body').css('overflow', 'visible');
  }
}); //! Model - Status

$('.company__list-more').on('click', function () {
  $('.status').removeClass('display-n');
  $('body').css('overflow', 'hidden');
});
$('.status__c').on('click', function () {
  $('.status').addClass('display-n');
  $('body').css('overflow', 'visible');
});
$('.status').mouseup(function (e) {
  var div = $('.status__w');

  if (!div.is(e.target) && div.has(e.target).length === 0) {
    $('.status').addClass('display-n');
    $('body').css('overflow', 'visible');
  }
}); //! Model - Info

$('').on('click', function () {
  $('.info').removeClass('display-n');
  $('body').css('overflow', 'hidden');
});
$('.info__c').on('click', function () {
  $('.info').addClass('display-n');
  $('body').css('overflow', 'visible');
});
$('.info').mouseup(function (e) {
  var div = $('.info__w');

  if (!div.is(e.target) && div.has(e.target).length === 0) {
    $('.info').addClass('display-n');
    $('body').css('overflow', 'visible');
  }
}); //! Focus - Input

$('input, textarea').focus(function () {
  $('.label').removeClass('focus_');
  $(this).parent().hasClass('label') ? $(this).parent().addClass('focus_') : '';
});
$(document).on('click', function (e) {
  // событие клика по веб-документу
  var div = $('.label'); // тут указываем ID элемента

  if (!div.is(e.target) && // если клик был не по нашему блоку
  div.has(e.target).length === 0) {
    // и не по его дочерним элементам
    div.removeClass('focus_');
  }
}); //! Add - Select One

$('.service__info-more').on('click', function () {
  var _this = this;

  $('.service__info-more').children('selectOne').addClass('display-n');
  setTimeout(function () {
    $(_this).children('.selectOne').removeClass('display-n');
  }, 1);
});
$('.selectOne__i').on('click', function () {
  $('.selectOne').addClass('display-n');
});
$(document).mouseup(function (e) {
  var div = $('.selectOne');

  if (!div.is(e.target)) {
    $('.selectOne').addClass('display-n');
  }
}); //! Add - Select Two

$('.company__list-users').on('click', function () {
  var _this2 = this;

  $('.company__list-users').children('selectTwo').addClass('display-n');
  setTimeout(function () {
    $(_this2).children('.selectTwo').removeClass('display-n');
  }, 1);
});
$('.selectTwo__i').on('click', function () {
  $('.selectTwo').addClass('display-n');
});
$(document).mouseup(function (e) {
  var div = $('.selectTwo');

  if (!div.is(e.target)) {
    $('.selectTwo').addClass('display-n');
  }
});
$('.menuCarrier-arrow').on('click', function () {
  if ($('.menuCarrier').hasClass('menuCarrier-h')) {
    $('.menuCarrier').removeClass('menuCarrier-h');
  } else {
    $('.menuCarrier').addClass('menuCarrier-h');
  }
});
$('.menuCompany-arrow').on('click', function () {
  if ($('.menuCompany').hasClass('menuCompany-h')) {
    $('.menuCompany').removeClass('menuCompany-h');
  } else {
    $('.menuCompany').addClass('menuCompany-h');
  }
});
$('.menuService-arrow').on('click', function () {
  if ($('.menuService').hasClass('menuService-h')) {
    $('.menuService').removeClass('menuService-h');
  } else {
    $('.menuService').addClass('menuService-h');
  }
});
$(function () {
  setTimeout(function () {
    for (var i = 1; i <= $('.carrier__car-e').length; i++) {
      $('.carrier__car-bar').eq(i - 1).css('width', "".concat($('.carrier__car-p').eq(i - 1).attr('data-progress')));
    }
  }, 500);
});
var checked_all = false;
var check_all_button = document.querySelector('.company__checkbox-a__input');
var target_checkboxes = document.querySelectorAll('.company__checkbox__input');
target_checkboxes.forEach(function (checkbox) {
  checkbox.addEventListener('change', function () {
    var unchecked = Array.prototype.slice.call(target_checkboxes).filter(function (checkbox) {
      return !checkbox.checked;
    });

    if (unchecked.length) {
      checked_all = false;
      check_all_button.checked = false;
    } else {
      checked_all = true;
      check_all_button.checked = true;
    }
  });
});

if (check_all_button) {
  check_all_button.addEventListener('click', function () {
    checked_all = !checked_all;
    target_checkboxes.forEach(function (checkbox) {
      checkbox.checked = checked_all;
    });
  }, false);
}

;
var service_checked_all = false;
var service_check_all_button = document.querySelector('.service__checkbox-a__input');
var service_target_checkboxes = document.querySelectorAll('.service__checkbox__input');
service_target_checkboxes.forEach(function (checkbox) {
  checkbox.addEventListener('change', function () {
    var unchecked = Array.prototype.slice.call(service_target_checkboxes).filter(function (checkbox) {
      return !checkbox.checked;
    });

    if (unchecked.length) {
      service_checked_all = false;
      service_check_all_button.checked = false;
    } else {
      service_checked_all = true;
      service_check_all_button.checked = true;
    }
  });
});

if (service_check_all_button) {
  service_check_all_button.addEventListener('click', function () {
    service_checked_all = !service_checked_all;
    service_target_checkboxes.forEach(function (checkbox) {
      checkbox.checked = service_checked_all;
    });
  });
}

;
$(function () {
  $('.reg__tab-i').on('click', function () {
    $('.reg__tab-i').removeClass('reg__tab-a');
    $(this).addClass('reg__tab-a');
    $('.reg__code').addClass('display-n');

    if ($(this).attr('id') == 'reg__tab__one') {
      $('.reg__auth').removeClass('display-n');
      $('.reg__regist').addClass('display-n');
    } else {
      $('.reg__regist').removeClass('display-n');
      $('.reg__auth').addClass('display-n');
    }
  });
  $('input[name="code"]').on('keyup', function (e) {
    var _this3 = this;

    setTimeout(function () {
      var index = $(_this3).index('input[name="code"]');
      $('input[name="code"]').eq(index + 1).focus();

      if (e.keyCode == 8 && index != 0) {
        $('input[name="code"]').eq(index - 1).focus();
      }
    }, 100);
  });
  $('.reg__regist-a').on('click', function () {
    $('.reg__code').removeClass('display-n');
    $('.reg__regist').addClass('display-n');
  });
}); //! Notif

$('.notif__h-c').on('click', function () {
  return $('.notif').addClass('display-n');
});