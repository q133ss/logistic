"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["public_assets_js_app_min_js__v_20220601170047"],{

/***/ "./public/assets/js/app.min.js?_v=20220601170047":
/*!*******************************************************!*\
  !*** ./public/assets/js/app.min.js?_v=20220601170047 ***!
  \*******************************************************/
/***/ (() => {



$(function () {
  $("select.c_select").each(function () {
    var c = $(this),
        e = '<div class="c_select" id="',
        s = (e = (e = e + c.attr("id") + '"><div class="c_select-placeholder">') + c.find("option:eq(0)").text() + '</div><div class="c_select-block display-n"><div class="c_select-wrapper">', c.find("option:eq(0)").css("display", "none"), c.find("option").each(function () {
      e += '<button class="c_select-element" data-val="' + $(this).attr("value") + '" type="button">' + $(this).text() + "</button>";
    }), e += "</div></div></div></div>", $(e).insertAfter(c.hide()), $('.c_select-element[data-val="undefined"]').remove(), c.next());
    s.find(".c_select-placeholder").on("click", function (e) {
      e.preventDefault(), s.find(".c_select-block").toggleClass("display-n"), s.toggleClass("c_select-item-active");
    }).end().find(".c_select-element").on("click", function (e) {
      e.preventDefault(), $(".c_select-element").removeClass("c_select-element-active"), $(this).addClass("c_select-element-active"), s.find(".c_select-placeholder").text($(this).text()), c.val($(this).data("val")).trigger("change"), s.find(".c_select-placeholder").trigger("click");
    });
  });
}), $(function () {
  setTimeout(function () {
    for (var e = 1; e <= $(".ind-main__forms-e").length; e++) {
      $(".ind-main__forms-bar").eq(e - 1).css("width", "".concat($(".ind-main__forms-p").eq(e - 1).attr("data-progress")));
    }
  }, 500), $("#index__phone, #reg__phone").mask("+7 (999) 99-99-999");
}), $(".registration__submit").on("click", function () {
  $(".thx_request").removeClass("display-n"), $("body").css("overflow", "hidden");
}), $(".thx_request__c, .thx_request__close").on("click", function () {
  $(".thx_request").addClass("display-n"), $("body").css("overflow", "visible");
}), $(".thx_request").mouseup(function (e) {
  var c = $(".thx_request__w");
  c.is(e.target) || 0 !== c.has(e.target).length || ($(".thx_request").addClass("display-n"), $("body").css("overflow", "visible"));
}), $(".header__b").on("click", function () {
  $(".registration").removeClass("display-n"), $("body").css("overflow", "hidden");
}), $(".registration__c").on("click", function () {
  $(".registration").addClass("display-n"), $("body").css("overflow", "visible");
}), $(".registration").mouseup(function (e) {
  var c = $(".registration__w");
  c.is(e.target) || 0 !== c.has(e.target).length || ($(".registration").addClass("display-n"), $("body").css("overflow", "visible"));
}), $(".company__list-show").on("click", function () {
  $(".info_car").removeClass("display-n"), $("body").css("overflow", "hidden");
}), $(".info_car__c").on("click", function () {
  $(".info_car").addClass("display-n"), $("body").css("overflow", "visible");
}), $(".info_car").mouseup(function (e) {
  var c = $(".info_car__w");
  c.is(e.target) || 0 !== c.has(e.target).length || ($(".info_car").addClass("display-n"), $("body").css("overflow", "visible"));
}), $(".selectTwo__i-add").on("click", function () {
  $(".addClient").removeClass("display-n"), $("body").css("overflow", "hidden");
}), $(".addClient__c").on("click", function () {
  $(".addClient").addClass("display-n"), $("body").css("overflow", "visible");
}), $(".addClient").mouseup(function (e) {
  var c = $(".addClient__w");
  c.is(e.target) || 0 !== c.has(e.target).length || ($(".addClient").addClass("display-n"), $("body").css("overflow", "visible"));
}), $(".company__list-more").on("click", function () {
  $(".status").removeClass("display-n"), $("body").css("overflow", "hidden");
}), $(".status__c").on("click", function () {
  $(".status").addClass("display-n"), $("body").css("overflow", "visible");
}), $(".status").mouseup(function (e) {
  var c = $(".status__w");
  c.is(e.target) || 0 !== c.has(e.target).length || ($(".status").addClass("display-n"), $("body").css("overflow", "visible"));
}), $("").on("click", function () {
  $(".info").removeClass("display-n"), $("body").css("overflow", "hidden");
}), $(".info__c").on("click", function () {
  $(".info").addClass("display-n"), $("body").css("overflow", "visible");
}), $(".info").mouseup(function (e) {
  var c = $(".info__w");
  c.is(e.target) || 0 !== c.has(e.target).length || ($(".info").addClass("display-n"), $("body").css("overflow", "visible"));
}), $("input, textarea").focus(function () {
  $(".label").removeClass("focus_"), $(this).parent().hasClass("label") && $(this).parent().addClass("focus_");
}), $(document).on("click", function (e) {
  var c = $(".label");
  c.is(e.target) || 0 !== c.has(e.target).length || c.removeClass("focus_");
}), $(".service__info-more").on("click", function () {
  var e = this;
  $(".service__info-more").children("selectOne").addClass("display-n"), setTimeout(function () {
    $(e).children(".selectOne").removeClass("display-n");
  }, 1);
}), $(".selectOne__i").on("click", function () {
  $(".selectOne").addClass("display-n");
}), $(document).mouseup(function (e) {
  $(".selectOne").is(e.target) || $(".selectOne").addClass("display-n");
}), $(".company__list-users").on("click", function () {
  var e = this;
  $(".company__list-users").children("selectTwo").addClass("display-n"), setTimeout(function () {
    $(e).children(".selectTwo").removeClass("display-n");
  }, 1);
}), $(".selectTwo__i").on("click", function () {
  $(".selectTwo").addClass("display-n");
}), $(document).mouseup(function (e) {
  $(".selectTwo").is(e.target) || $(".selectTwo").addClass("display-n");
}), $(".menuCarrier-arrow").on("click", function () {
  $(".menuCarrier").hasClass("menuCarrier-h") ? $(".menuCarrier").removeClass("menuCarrier-h") : $(".menuCarrier").addClass("menuCarrier-h");
}), $(".menuCompany-arrow").on("click", function () {
  $(".menuCompany").hasClass("menuCompany-h") ? $(".menuCompany").removeClass("menuCompany-h") : $(".menuCompany").addClass("menuCompany-h");
}), $(".menuService-arrow").on("click", function () {
  $(".menuService").hasClass("menuService-h") ? $(".menuService").removeClass("menuService-h") : $(".menuService").addClass("menuService-h");
}), $(function () {
  setTimeout(function () {
    for (var e = 1; e <= $(".carrier__car-e").length; e++) {
      $(".carrier__car-bar").eq(e - 1).css("width", "".concat($(".carrier__car-p").eq(e - 1).attr("data-progress")));
    }
  }, 500);
});
var checked_all = !1,
    check_all_button = document.querySelector(".company__checkbox-a__input"),
    target_checkboxes = document.querySelectorAll(".company__checkbox__input"),
    service_checked_all = (target_checkboxes.forEach(function (e) {
  e.addEventListener("change", function () {
    Array.prototype.slice.call(target_checkboxes).filter(function (e) {
      return !e.checked;
    }).length ? (checked_all = !1, check_all_button.checked = !1) : (checked_all = !0, check_all_button.checked = !0);
  });
}), check_all_button && check_all_button.addEventListener("click", function () {
  checked_all = !checked_all, target_checkboxes.forEach(function (e) {
    e.checked = checked_all;
  });
}, !1), !1),
    service_check_all_button = document.querySelector(".service__checkbox-a__input"),
    service_target_checkboxes = document.querySelectorAll(".service__checkbox__input");
service_target_checkboxes.forEach(function (e) {
  e.addEventListener("change", function () {
    Array.prototype.slice.call(service_target_checkboxes).filter(function (e) {
      return !e.checked;
    }).length ? (service_checked_all = !1, service_check_all_button.checked = !1) : (service_checked_all = !0, service_check_all_button.checked = !0);
  });
}), service_check_all_button && service_check_all_button.addEventListener("click", function () {
  service_checked_all = !service_checked_all, service_target_checkboxes.forEach(function (e) {
    e.checked = service_checked_all;
  });
});

/***/ })

}]);