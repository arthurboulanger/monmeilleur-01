(function(e){e.slidebars=function(t){function y(){if(!n.disableOver||typeof n.disableOver==="number"&&n.disableOver>=v){d=true;e("html").addClass("sb-init");if(n.hideControlClasses)m.removeClass("sb-hide");b()}else if(typeof n.disableOver==="number"&&n.disableOver<v){d=false;e("html").removeClass("sb-init");if(n.hideControlClasses)m.addClass("sb-hide");f.css("minHeight","");if(c||p)x()}}function b(){f.css("minHeight","");f.css("minHeight",e("html").height()+"px");if(l&&l.hasClass("sb-width-custom"))l.css("width",l.attr("data-sb-width"));if(h&&h.hasClass("sb-width-custom"))h.css("width",h.attr("data-sb-width"));if(l&&(l.hasClass("sb-style-push")||l.hasClass("sb-style-overlay")))l.css("marginLeft","-"+l.css("width"));if(h&&(h.hasClass("sb-style-push")||h.hasClass("sb-style-overlay")))h.css("marginRight","-"+h.css("width"));if(n.scrollLock)e("html").addClass("sb-scroll-lock")}function E(e,t,n){var r;if(e.hasClass("sb-style-push")){r=f.add(e).add(g)}else if(e.hasClass("sb-style-overlay")){r=e}else{r=f.add(g)}if(w==="translate"){r.css("transform","translate("+t+")")}else if(w==="side"){if(t[0]==="-")t=t.substr(1);if(t!=="0px")r.css(n,"0px");setTimeout(function(){r.css(n,t)},1)}else if(w==="jQuery"){if(t[0]==="-")t=t.substr(1);var i={};i[n]=t;r.stop().animate(i,400)}setTimeout(function(){if(t==="0px"){r.removeAttr("style");b()}},400)}function S(t){function n(){if(d&&t==="left"&&l){e("html").addClass("sb-active sb-active-left");l.addClass("sb-active");E(l,l.css("width"),"left");setTimeout(function(){c=true},400)}else if(d&&t==="right"&&h){e("html").addClass("sb-active sb-active-right");h.addClass("sb-active");E(h,"-"+h.css("width"),"right");setTimeout(function(){p=true},400)}}if(t==="left"&&l&&p||t==="right"&&h&&c){x();setTimeout(n,400)}else{n()}}function x(t){if(c||p){if(c){E(l,"0px","left");c=false}if(p){E(h,"0px","right");p=false}setTimeout(function(){e("html").removeClass("sb-active sb-active-left sb-active-right");if(l)l.removeClass("sb-active");if(h)h.removeClass("sb-active");if(typeof t!=="undefined")window.location=t},400)}}function T(e){if(e==="left"&&l){if(!c){S("left")}else{x()}}if(e==="right"&&h){if(!p){S("right")}else{x()}}}function N(e,t){e.stopPropagation();e.preventDefault();if(e.type==="touchend")t.off("click")}var n=e.extend({siteClose:false,scrollLock:true,disableOver:false,hideControlClasses:false},t);var r=document.createElement("div").style,i=false,s=false;if(r.MozTransition===""||r.WebkitTransition===""||r.OTransition===""||r.transition==="")i=true;if(r.MozTransform===""||r.WebkitTransform===""||r.OTransform===""||r.transform==="")s=true;var o=navigator.userAgent,u=false,a=false;if(/Android/.test(o)){u=o.substr(o.indexOf("Android")+8,3)}else if(/(iPhone|iPod|iPad)/.test(o)){a=o.substr(o.indexOf("OS ")+3,3).replace("_",".")}if(u&&u<3||a&&a<5)e("html").addClass("sb-static");var f=e("#sb-site, .sb-site-container");if(e(".sb-left").length){var l=e(".sb-left"),c=false}if(e(".sb-right").length){var h=e(".sb-right"),p=false}var d=false,v=e(window).width(),m=e(".sb-toggle-left, .sb-toggle-right, .sb-open-left, .sb-open-right, .sb-close"),g=e(".sb-slide");y();e(window).resize(function(){var t=e(window).width();if(v!==t){v=t;y();if(c)S("left");if(p)S("right")}});var w;if(i&&s){w="translate";if(u&&u<4.4)w="side"}else{w="jQuery"}this.slidebars={open:S,close:x,toggle:T,init:function(){return d},active:function(e){if(e==="left"&&l)return c;if(e==="right"&&h)return p},destroy:function(e){if(e==="left"&&l){if(c)x();setTimeout(function(){l.remove();l=false},400)}if(e==="right"&&h){if(p)x();setTimeout(function(){h.remove();h=false},400)}}};e(".sb-toggle-left").on("touchend click",function(t){N(t,e(this));T("left")});e(".sb-toggle-right").on("touchend click",function(t){N(t,e(this));T("right")});e(".sb-open-left").on("touchend click",function(t){N(t,e(this));S("left")});e(".sb-open-right").on("touchend click",function(t){N(t,e(this));S("right")});e(".sb-close").on("touchend click",function(t){N(t,e(this));var n;if(e(this).parents(".sb-slidebar")){if(e(this).is("a")){n=e(this).attr("href")}else if(e(this).children("a")){n=e(this).children("a").attr("href")}}x(n)});f.on("touchend click",function(t){if(n.siteClose&&(c||p)){N(t,e(this));x()}})}})(jQuery)