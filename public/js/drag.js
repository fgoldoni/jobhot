/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/drag.js ***!
  \******************************/
var root = document.querySelector('[drag-root]');
root.querySelectorAll('[drag-item]').forEach(function (el) {
  el.addEventListener('dragstart', function (e) {
    e.target.setAttribute('dragging', true);
  });
  el.addEventListener('drop', function (e) {
    //e.target.classList.remove('bg-yellow-900')
    var draggingEl = root.querySelector('[dragging]');
    e.target.before(draggingEl); // Refresh the livewire component

    var component = Livewire.find(e.target.closest('[wire\\:id]').getAttribute('wire:id'));
    var orderIds = Array.from(root.querySelectorAll('[drag-item]')).map(function (itemEl) {
      return itemEl.getAttribute('drag-item');
    });
    var method = root.getAttribute('drag-root');
    component.call(method, orderIds);
  });
  el.addEventListener('dragenter', function (e) {
    e.target.classList.add('bg-gray-900');
    e.preventDefault();
  });
  el.addEventListener('dragover', function (e) {
    return e.preventDefault();
  });
  el.addEventListener('dragleave', function (e) {//e.target.classList.remove('bg-yellow-900')
  });
  el.addEventListener('dragend', function (e) {
    e.target.removeAttribute('dragging');
  });
});
/******/ })()
;