$(document).ready(function(){

   $("#tabs").tabs();
   $(".fancybox").fancybox();
	 
		// у каждого 4 элемента убираем margin-right
		$(".gallery .gallery_item:nth-child(4n)").addClass("mr0");

});


 