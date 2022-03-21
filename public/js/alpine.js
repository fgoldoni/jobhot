/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/alpine.js ***!
  \********************************/
document.addEventListener('alpine:init', function () {
  Alpine.data('tabs', function (defaultTab) {
    return {
      tab: defaultTab,
      toggleTab: function toggleTab(tab) {
        this.tab = tab;
      },
      isActive: function isActive(tab) {
        return this.tab === tab;
      }
    };
  });
});
/******/ })()
;