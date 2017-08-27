!function($){var defaults={sectionContainer:"section",easing:"ease",animationTime:1000,pagination:!0,updateURL:!1,keyboard:!0,beforeMove:null,afterMove:null,loop:!0,responsiveFallback:!1,direction:'vertical'};$.fn.swipeEvents=function(){return this.each(function(){var startX,startY,$this=$(this);$this.bind('touchstart',touchstart);function touchstart(event){var touches=event.originalEvent.touches;if(touches&&touches.length){startX=touches[0].pageX;startY=touches[0].pageY;$this.bind('touchmove',touchmove)}}
function touchmove(event){var touches=event.originalEvent.touches;if(touches&&touches.length){var deltaX=startX-touches[0].pageX;var deltaY=startY-touches[0].pageY;if(deltaX>=50){$this.trigger("swipeLeft")}
if(deltaX<=-50){$this.trigger("swipeRight")}
if(deltaY>=50){$this.trigger("swipeUp")}
if(deltaY<=-50){$this.trigger("swipeDown")}
if(Math.abs(deltaX)>=50||Math.abs(deltaY)>=50){$this.unbind('touchmove',touchmove)}}}})};$.fn.onepage_scroll=function(options){var settings=$.extend({},defaults,options),el=$(this),sections=$(settings.sectionContainer)
total=sections.length,status="off",topPos=0,leftPos=0,lastAnimation=0,quietPeriod=500,paginationList="";$.fn.transformPage=function(settings,pos,index){if(typeof settings.beforeMove=='function')settings.beforeMove(index);if($('html').hasClass('ie8')){if(settings.direction=='horizontal'){var toppos=(el.width()/100)*pos;$(this).animate({left:toppos+'px'},settings.animationTime)}else{var toppos=(el.height()/100)*pos;$(this).animate({top:toppos+'px'},settings.animationTime)}}else{$(this).css({"-webkit-transform":(settings.direction=='horizontal')?"translate3d("+pos+"%, 0, 0)":"translate3d(0, "+pos+"%, 0)","-webkit-transition":"all "+settings.animationTime+"ms "+settings.easing,"-moz-transform":(settings.direction=='horizontal')?"translate3d("+pos+"%, 0, 0)":"translate3d(0, "+pos+"%, 0)","-moz-transition":"all "+settings.animationTime+"ms "+settings.easing,"-ms-transform":(settings.direction=='horizontal')?"translate3d("+pos+"%, 0, 0)":"translate3d(0, "+pos+"%, 0)","-ms-transition":"all "+settings.animationTime+"ms "+settings.easing,"transform":(settings.direction=='horizontal')?"translate3d("+pos+"%, 0, 0)":"translate3d(0, "+pos+"%, 0)","transition":"all "+settings.animationTime+"ms "+settings.easing})}
$(this).one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(e){if(typeof settings.afterMove=='function')settings.afterMove(index)})}
$.fn.moveDown=function(){var el=$(this)
index=$(settings.sectionContainer+".active").data("index");current=$(settings.sectionContainer+"[data-index='"+index+"']");next=$(settings.sectionContainer+"[data-index='"+(index+1)+"']");if(next.length<1){if(settings.loop==!0){pos=0;next=$(settings.sectionContainer+"[data-index='1']")}else{return}}else{pos=(index*100)*-1}
if(typeof settings.beforeMove=='function')settings.beforeMove(next.data("index"));current.removeClass("active")
next.addClass("active");if(settings.pagination==!0){$(".onepage-pagination li a"+"[data-index='"+index+"']").removeClass("active");$(".onepage-pagination li a"+"[data-index='"+next.data("index")+"']").addClass("active")}
$("body")[0].className=$("body")[0].className.replace(/\bviewing-page-\d.*?\b/g,'');$("body").addClass("viewing-page-"+next.data("index"))
if(history.replaceState&&settings.updateURL==!0){var href=window.location.href.substr(0,window.location.href.indexOf('#'))+"#"+(index+1);history.pushState({},document.title,href)}
el.transformPage(settings,pos,next.data("index"))}
$.fn.moveUp=function(){var el=$(this)
index=$(settings.sectionContainer+".active").data("index");current=$(settings.sectionContainer+"[data-index='"+index+"']");next=$(settings.sectionContainer+"[data-index='"+(index-1)+"']");if(next.length<1){if(settings.loop==!0){pos=((total-1)*100)*-1;next=$(settings.sectionContainer+"[data-index='"+total+"']")}
else{return}}else{pos=((next.data("index")-1)*100)*-1}
if(typeof settings.beforeMove=='function')settings.beforeMove(next.data("index"));current.removeClass("active")
next.addClass("active")
if(settings.pagination==!0){$(".onepage-pagination li a"+"[data-index='"+index+"']").removeClass("active");$(".onepage-pagination li a"+"[data-index='"+next.data("index")+"']").addClass("active")}
$("body")[0].className=$("body")[0].className.replace(/\bviewing-page-\d.*?\b/g,'');$("body").addClass("viewing-page-"+next.data("index"))
if(history.replaceState&&settings.updateURL==!0){var href=window.location.href.substr(0,window.location.href.indexOf('#'))+"#"+(index-1);history.pushState({},document.title,href)}
el.transformPage(settings,pos,next.data("index"))}
$.fn.moveTo=function(page_index){current=$(settings.sectionContainer+".active")
next=$(settings.sectionContainer+"[data-index='"+(page_index)+"']");if(next.length>0){if(typeof settings.beforeMove=='function')settings.beforeMove(next.data("index"));current.removeClass("active")
next.addClass("active")
$(".onepage-pagination li a"+".active").removeClass("active");$(".onepage-pagination li a"+"[data-index='"+(page_index)+"']").addClass("active");$("body")[0].className=$("body")[0].className.replace(/\bviewing-page-\d.*?\b/g,'');$("body").addClass("viewing-page-"+next.data("index"))
pos=((page_index-1)*100)*-1;if(history.replaceState&&settings.updateURL==!0){var href=window.location.href.substr(0,window.location.href.indexOf('#'))+"#"+(page_index-1);history.pushState({},document.title,href)}
el.transformPage(settings,pos,page_index)}}
function responsive(){var valForTest=!1;var typeOfRF=typeof settings.responsiveFallback
if(typeOfRF=="number"){valForTest=$(window).width()<settings.responsiveFallback}
if(typeOfRF=="boolean"){valForTest=settings.responsiveFallback}
if(typeOfRF=="function"){valFunction=settings.responsiveFallback();valForTest=valFunction;typeOFv=typeof valForTest;if(typeOFv=="number"){valForTest=$(window).width()<valFunction}}
if(valForTest){$("body").addClass("disabled-onepage-scroll");$(document).unbind('mousewheel DOMMouseScroll MozMousePixelScroll');el.swipeEvents().unbind("swipeDown swipeUp")}else{if($("body").hasClass("disabled-onepage-scroll")){$("body").removeClass("disabled-onepage-scroll");$("html, body, .wrapper").animate({scrollTop:0},"fast")}
el.swipeEvents().bind("swipeDown",function(event){if(!$("body").hasClass("disabled-onepage-scroll"))event.preventDefault();el.moveUp()}).bind("swipeUp",function(event){if(!$("body").hasClass("disabled-onepage-scroll"))event.preventDefault();el.moveDown()});$(document).bind('mousewheel DOMMouseScroll MozMousePixelScroll',function(event){event.preventDefault();var delta=event.originalEvent.wheelDelta||-event.originalEvent.detail;init_scroll(event,delta)})}}
function init_scroll(event,delta){deltaOfInterest=delta;var timeNow=new Date().getTime();if(timeNow-lastAnimation<quietPeriod+settings.animationTime){event.preventDefault();return}
if(deltaOfInterest<0){el.moveDown()}else{el.moveUp()}
lastAnimation=timeNow}
el.addClass("onepage-wrapper").css("position","relative");$.each(sections,function(i){$(this).css({position:"absolute",top:topPos+"%"}).addClass("section").attr("data-index",i+1);$(this).css({position:"absolute",left:(settings.direction=='horizontal')?leftPos+"%":0,top:(settings.direction=='vertical'||settings.direction!='horizontal')?topPos+"%":0});if(settings.direction=='horizontal')
leftPos=leftPos+100;else topPos=topPos+100;if(settings.pagination==!0){paginationList+="<li><a data-index='"+(i+1)+"' href='#"+(i+1)+"'></a></li>"}});el.swipeEvents().bind("swipeDown",function(event){if(!$("body").hasClass("disabled-onepage-scroll"))event.preventDefault();el.moveUp()}).bind("swipeUp",function(event){if(!$("body").hasClass("disabled-onepage-scroll"))event.preventDefault();el.moveDown()});if(settings.pagination==!0){if($('ul.onepage-pagination').length<1)$("<ul class='onepage-pagination'></ul>").prependTo("body");if(settings.direction=='horizontal'){posLeft=(el.find(".onepage-pagination").width()/2)*-1;el.find(".onepage-pagination").css("margin-left",posLeft)}else{posTop=(el.find(".onepage-pagination").height()/2)*-1;el.find(".onepage-pagination").css("margin-top",posTop)}
$('ul.onepage-pagination').html(paginationList)}
if(window.location.hash!=""&&window.location.hash!="#1"){init_index=window.location.hash.replace("#","")
if(parseInt(init_index)<=total&&parseInt(init_index)>0){$(settings.sectionContainer+"[data-index='"+init_index+"']").addClass("active")
$("body").addClass("viewing-page-"+init_index)
if(settings.pagination==!0)$(".onepage-pagination li a"+"[data-index='"+init_index+"']").addClass("active");next=$(settings.sectionContainer+"[data-index='"+(init_index)+"']");if(next){next.addClass("active")
if(settings.pagination==!0)$(".onepage-pagination li a"+"[data-index='"+(init_index)+"']").addClass("active");$("body")[0].className=$("body")[0].className.replace(/\bviewing-page-\d.*?\b/g,'');$("body").addClass("viewing-page-"+next.data("index"))
if(history.replaceState&&settings.updateURL==!0){var href=window.location.href.substr(0,window.location.href.indexOf('#'))+"#"+(init_index);history.pushState({},document.title,href)}}
pos=((init_index-1)*100)*-1;el.transformPage(settings,pos,init_index)}else{$(settings.sectionContainer+"[data-index='1']").addClass("active")
$("body").addClass("viewing-page-1")
if(settings.pagination==!0)$(".onepage-pagination li a"+"[data-index='1']").addClass("active")}}else{$(settings.sectionContainer+"[data-index='1']").addClass("active")
$("body").addClass("viewing-page-1")
if(settings.pagination==!0)$(".onepage-pagination li a"+"[data-index='1']").addClass("active")}
if(settings.pagination==!0){$(".onepage-pagination li a").click(function(){var page_index=$(this).data("index");el.moveTo(page_index)})}
$(document).bind('mousewheel DOMMouseScroll MozMousePixelScroll',function(event){event.preventDefault();var delta=event.originalEvent.wheelDelta||-event.originalEvent.detail;if(!$("body").hasClass("disabled-onepage-scroll"))init_scroll(event,delta)});if(settings.responsiveFallback!=!1){$(window).resize(function(){responsive()});responsive()}
if(settings.keyboard==!0){$(document).keydown(function(e){var tag=e.target.tagName.toLowerCase();if(!$("body").hasClass("disabled-onepage-scroll")){switch(e.which){case 38:if(tag!='input'&&tag!='textarea')el.moveUp()
break;case 40:if(tag!='input'&&tag!='textarea')el.moveDown()
break;case 32:if(tag!='input'&&tag!='textarea')el.moveDown()
break;case 33:if(tag!='input'&&tag!='textarea')el.moveUp()
break;case 34:if(tag!='input'&&tag!='textarea')el.moveDown()
break;case 36:el.moveTo(1);break;case 35:el.moveTo(total);break;default:return}}})}
return!1}}(window.jQuery)