"use strict";

$(function () {
  $("#hamburger").click(function () {
    $(".header-nav").fadeToggle();
    $(".header-nav").toggleClass("active");
    $(".body").toggleClass("hidden");
    $(".page").toggleClass("hidden");
  });
});