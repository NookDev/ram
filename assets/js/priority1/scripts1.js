jQuery(document).ready(function($) {
//.dev
  $(".menu-item-565 , .menu-item-566").on("click", function(e){
  e.preventDefault();
  javascript:void(Tawk_API.toggle());
  });
});

//.com.au
jQuery(document).ready(function($) {
  $(".menu-item-570 , .menu-item-568").on("click", function(e){
  e.preventDefault();
  javascript:void(Tawk_API.toggle());  
  });
	
});


/*
 * Responsively Lazy
 * http://ivopetkov.com/b/lazy-load-responsive-images/
 * Copyright 2015-2017, Ivo Petkov
 * Free to use under the MIT license.
*/
var responsivelyLazy=function(){var r=!1,l=null,p=null,m="undefined"!==typeof IntersectionObserver,t=function(b){if(null===l)return!1;var c=b.getBoundingClientRect();b=c.top;var a=c.left,h=c.width,c=c.height;return b<p&&0<b+c&&a<l&&0<a+h},q=function(b,c){var a=c.getAttribute("data-srcset");if(null!==a)if(a=a.trim(),0<a.length){for(var a=a.split(","),h=[],k=a.length,e=0;e<k;e++){var d=a[e].trim();if(0!==d.length){var g=d.lastIndexOf(" ");if(-1===g)var f=d,d=999998;else f=d.substr(0,g),d=parseInt(d.substr(g+
1,d.length-g-2),10);g=!1;-1!==f.indexOf(".webp",f.length-5)?r&&(g=!0):g=!0;g&&h.push([f,d])}}h.sort(function(a,c){if(a[1]<c[1])return-1;if(a[1]>c[1])return 1;if(a[1]===c[1]){if(-1!==c[0].indexOf(".webp",c[0].length-5))return 1;if(-1!==a[0].indexOf(".webp",a[0].length-5))return-1}return 0});a=h}else a=[];else a=[];h=b.offsetWidth*window.devicePixelRatio;f=null;k=a.length;for(e=0;e<k;e++)if(d=a[e],d[1]>=h){f=d;break}null===f&&(f=[c.getAttribute("src"),999999]);"undefined"===typeof b.responsivelyLazyLastSetOption&&
(b.responsivelyLazyLastSetOption=["",0]);b.responsivelyLazyLastSetOption[1]<f[1]&&(b.responsivelyLazyLastSetOption=f,a=f[0],"undefined"===typeof b.responsivelyLazyEventsAttached&&(b.responsivelyLazyEventsAttached=!0,c.addEventListener("load",function(){var a=b.getAttribute("data-onlazyload");null!==a&&(new Function(a)).bind(b)()},!1),c.addEventListener("error",function(){b.responsivelyLazyLastSetOption=["",0]},!1)),a===c.getAttribute("src")?c.removeAttribute("srcset"):c.setAttribute("srcset",a))},
u=function(){var b=function(c,a){for(var b=c.length,k=0;k<b;k++){var e=c[k],d=a?e:e.parentNode;t(d)&&q(d,e)}};b(document.querySelectorAll(".responsively-lazy > img"),!1);b(document.querySelectorAll("img.responsively-lazy"),!0)};if("srcset"in document.createElement("img")&&"undefined"!==typeof window.devicePixelRatio&&"undefined"!==typeof window.addEventListener&&"undefined"!==typeof document.querySelectorAll){var l=window.innerWidth,p=window.innerHeight,n=new Image;n.src="data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoCAAEADMDOJaQAA3AA/uuuAAA=";
n.onload=n.onerror=function(){r=2===n.width;var b=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(a){window.setTimeout(a,1E3/60)},c=!0,a=function(){c&&(c=!1,u());b.call(null,a)};a();if(m)var h=function(){for(var a=document.querySelectorAll(".responsively-lazy"),c=a.length,b=0;b<c;b++){var d=a[b];"undefined"===typeof d.responsivelyLazyObserverAttached&&(d.responsivelyLazyObserverAttached=!0,k.observe(d))}},k=new IntersectionObserver(function(a){for(var c in a){var b=
a[c];if(0<b.intersectionRatio)if(b=b.target,"img"!==b.tagName.toLowerCase()){var d=b.querySelector("img");null!==d&&q(b,d)}else q(b,b)}}),e=null;var d=function(){m?(window.clearTimeout(e),e=window.setTimeout(function(){c=!0},300)):c=!0},g=function(){for(var a=document.querySelectorAll(".responsively-lazy"),b=a.length,c=0;c<b;c++)for(var e=a[c].parentNode;e&&"html"!==e.tagName.toLowerCase();)"undefined"===typeof e.responsivelyLazyScrollAttached&&(e.responsivelyLazyScrollAttached=!0,e.addEventListener("scroll",
d)),e=e.parentNode},f=function(){window.addEventListener("resize",function(){l=window.innerWidth;p=window.innerHeight;d()});window.addEventListener("scroll",d);window.addEventListener("load",d);m&&h();g();"undefined"!==typeof MutationObserver&&(new MutationObserver(function(){m&&h();g();d()})).observe(document.querySelector("body"),{childList:!0,subtree:!0})};"loading"===document.readyState?document.addEventListener("DOMContentLoaded",f):f()}}return{run:u,isVisible:t}}();