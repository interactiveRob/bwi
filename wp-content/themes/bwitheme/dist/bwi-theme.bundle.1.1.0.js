!function(t){var n={};function e(r){if(n[r])return n[r].exports;var i=n[r]={i:r,l:!1,exports:{}};return t[r].call(i.exports,i,i.exports,e),i.l=!0,i.exports}e.m=t,e.c=n,e.d=function(t,n,r){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:r})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(e.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var i in t)e.d(r,i,function(n){return t[n]}.bind(null,i));return r},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="",e(e.s=0)}([function(t,n,e){"use strict";function r(t){return function(t){if(Array.isArray(t))return i(t)}(t)||function(t){if("undefined"!=typeof Symbol&&null!=t[Symbol.iterator]||null!=t["@@iterator"])return Array.from(t)}(t)||function(t,n){if(!t)return;if("string"==typeof t)return i(t,n);var e=Object.prototype.toString.call(t).slice(8,-1);"Object"===e&&t.constructor&&(e=t.constructor.name);if("Map"===e||"Set"===e)return Array.from(t);if("Arguments"===e||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e))return i(t,n)}(t)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function i(t,n){(null==n||n>t.length)&&(n=t.length);for(var e=0,r=new Array(n);e<n;e++)r[e]=t[e];return r}e.r(n);var a=function(){return t={timestamp:null,data:null,dataPoints:document.querySelectorAll("[data-realtime]")},{fillTimestamp:function(n){n.innerHTML=t.timestamp,requestAnimationFrame((function(){n.classList.add("js-is-ready")}))},reveal:function(t){var n=t.closest("[data-realtime-container]");n&&requestAnimationFrame((function(){n.classList.add("js-is-ready")}))},fillContentFromGroup:function(n,e){var r=e.split("__"),i=t.data[r[0]];if(Object.keys(i).length){var a=i[r[1]];void 0!==a&&null!=a&&(n.innerHTML=a,this.reveal(n))}},fillData:function(){var n=this;r(t.dataPoints).map((function(t){var e=t.dataset.key;"timestamp"==e&&n.fillTimestamp(t),e.includes("__")&&n.fillContentFromGroup(t,e)}))},fetchData:function(){var t=this;fetch("/wp-content/themes/bwitheme/ajaxcall.php?action=get_parking_data",{method:"POST",headers:{"Content-Type":"application/json"}}).then((function(t){return t.json()})).then((function(n){t.onFetchSuccess(n)})).catch((function(t){console.log(t)}))},onFetchSuccess:function(n){t.data=n.parkingAvailability.lots,t.timestamp=n.parkingAvailability.updated,this.fillData()},init:function(){t.dataPoints.length&&this.fetchData()}}.init();var t};document.addEventListener("DOMContentLoaded",(function(){requestAnimationFrame((function(){a()}))})),window.addEventListener("load",(function(){}))}]);