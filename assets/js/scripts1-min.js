jQuery(document).ready(function(e){e(".menu-item-565 , .menu-item-566").on("click",function(e){e.preventDefault();e:void Tawk_API.toggle()})});jQuery(document).ready(function(e){e(".menu-item-570 , .menu-item-568").on("click",function(e){e.preventDefault();e:void Tawk_API.toggle()})});var responsivelyLazy=function(){var e=!1,t=null,n=null,i="undefined"!==typeof IntersectionObserver,r=function(e){if(null===t)return!1;var i=e.getBoundingClientRect();e=i.top;var r=i.left,o=i.width,i=i.height;return e<n&&0<e+i&&r<t&&0<r+o},o=function(t,n){var i=n.getAttribute("data-srcset");if(null!==i)if(i=i.trim(),0<i.length){for(var i=i.split(","),r=[],o=i.length,a=0;a<o;a++){var l=i[a].trim();if(0!==l.length){var d=l.lastIndexOf(" ");if(-1===d)var u=l,l=999998;else u=l.substr(0,d),l=parseInt(l.substr(d+1,l.length-d-2),10);d=!1;-1!==u.indexOf(".webp",u.length-5)?e&&(d=!0):d=!0;d&&r.push([u,l])}}r.sort(function(e,t){if(e[1]<t[1])return-1;if(e[1]>t[1])return 1;if(e[1]===t[1]){if(-1!==t[0].indexOf(".webp",t[0].length-5))return 1;if(-1!==e[0].indexOf(".webp",e[0].length-5))return-1}return 0});i=r}else i=[];else i=[];r=t.offsetWidth*window.devicePixelRatio;u=null;o=i.length;for(a=0;a<o;a++)if(l=i[a],l[1]>=r){u=l;break}null===u&&(u=[n.getAttribute("src"),999999]);"undefined"===typeof t.responsivelyLazyLastSetOption&&(t.responsivelyLazyLastSetOption=["",0]);t.responsivelyLazyLastSetOption[1]<u[1]&&(t.responsivelyLazyLastSetOption=u,i=u[0],"undefined"===typeof t.responsivelyLazyEventsAttached&&(t.responsivelyLazyEventsAttached=!0,n.addEventListener("load",function(){var e=t.getAttribute("data-onlazyload");null!==e&&new Function(e).bind(t)()},!1),n.addEventListener("error",function(){t.responsivelyLazyLastSetOption=["",0]},!1)),i===n.getAttribute("src")?n.removeAttribute("srcset"):n.setAttribute("srcset",i))},a=function(){var e=function(e,t){for(var n=e.length,i=0;i<n;i++){var a=e[i],l=t?a:a.parentNode;r(l)&&o(l,a)}};e(document.querySelectorAll(".responsively-lazy > img"),!1);e(document.querySelectorAll("img.responsively-lazy"),!0)};if("srcset"in document.createElement("img")&&"undefined"!==typeof window.devicePixelRatio&&"undefined"!==typeof window.addEventListener&&"undefined"!==typeof document.querySelectorAll){var t=window.innerWidth,n=window.innerHeight,l=new Image;l.src="data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoCAAEADMDOJaQAA3AA/uuuAAA=";l.onload=l.onerror=function(){e=2===l.width;var r=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)},d=!0,u=function(){d&&(d=!1,a());r.call(null,u)};u();if(i)var s=function(){for(var e=document.querySelectorAll(".responsively-lazy"),t=e.length,n=0;n<t;n++){var i=e[n];"undefined"===typeof i.responsivelyLazyObserverAttached&&(i.responsivelyLazyObserverAttached=!0,c.observe(i))}},c=new IntersectionObserver(function(e){for(var t in e){var n=e[t];if(0<n.intersectionRatio)if(n=n.target,"img"!==n.tagName.toLowerCase()){var i=n.querySelector("img");null!==i&&o(n,i)}else o(n,n)}}),f=null;var v=function(){i?(window.clearTimeout(f),f=window.setTimeout(function(){d=!0},300)):d=!0},y=function(){for(var e=document.querySelectorAll(".responsively-lazy"),t=e.length,n=0;n<t;n++)for(var i=e[n].parentNode;i&&"html"!==i.tagName.toLowerCase();)"undefined"===typeof i.responsivelyLazyScrollAttached&&(i.responsivelyLazyScrollAttached=!0,i.addEventListener("scroll",v)),i=i.parentNode},w=function(){window.addEventListener("resize",function(){t=window.innerWidth;n=window.innerHeight;v()});window.addEventListener("scroll",v);window.addEventListener("load",v);i&&s();y();"undefined"!==typeof MutationObserver&&new MutationObserver(function(){i&&s();y();v()}).observe(document.querySelector("body"),{childList:!0,subtree:!0})};"loading"===document.readyState?document.addEventListener("DOMContentLoaded",w):w()}}return{run:a,isVisible:r}}();