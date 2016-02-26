jQuery(document).ready(function(){
jQuery(document).on("click",".add",function(){
 jQuery(".tr-hidden-tel").eq(0).toggleClass("tr-hidden-tel").toggleClass("tr-shown-tel");
 jQuery(".tr-shown-tel").removeClass("current").eq(jQuery(".tr-shown-tel").length-1).addClass("current");
});
jQuery(document).on("click",".min",function(){
 jQuery(".tr-shown-tel").eq(jQuery(".tr-shown-tel").length-1).toggleClass("tr-hidden-tel").toggleClass("tr-shown-tel");
 jQuery(".tr-shown-tel").removeClass("current").eq(jQuery(".tr-shown-tel").length-1).addClass("current");
});
});

jQuery(document).on("click",".add2",function(){
 jQuery(".tr-hidden-tel-2").eq(0).toggleClass("tr-hidden-tel-2").toggleClass("tr-shown-tel-2");
 jQuery(".tr-shown-tel-2").removeClass("current").eq(jQuery(".tr-shown-tel-2").length-1).addClass("current");
});
jQuery(document).on("click",".min2",function(){
 jQuery(".tr-shown-tel-2").eq(jQuery(".tr-shown-tel-2").length-1).toggleClass("tr-hidden-tel-2").toggleClass("tr-shown-tel-2");
 jQuery(".tr-shown-tel-2").removeClass("current").eq(jQuery(".tr-shown-tel-2").length-1).addClass("current");
});



jQuery(document).on("click",".add3",function(){
 jQuery(".tr-hidden-tel-3").eq(0).toggleClass("tr-hidden-tel-3").toggleClass("tr-shown-tel-3");
 jQuery(".tr-shown-tel-3").removeClass("current").eq(jQuery(".tr-shown-tel-3").length-1).addClass("current");
});
jQuery(document).on("click",".min3",function(){
 jQuery(".tr-shown-tel-3").eq(jQuery(".tr-shown-tel-3").length-1).toggleClass("tr-hidden-tel-3").toggleClass("tr-shown-tel-3");
 jQuery(".tr-shown-tel-3").removeClass("current").eq(jQuery(".tr-shown-tel-3").length-1).addClass("current");
});
