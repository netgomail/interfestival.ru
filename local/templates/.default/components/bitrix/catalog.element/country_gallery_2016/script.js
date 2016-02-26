$(document).ready(function(){

				
	$(".fancybox_pic").fancybox({ 
		afterLoad: function () {
			 this.title = '<a download href="' + this.href+'">Сохранить фото</a> ';
		},
		helpers: {
			overlay: {
				locked: false
			},
			title: {
					type: 'inside'
			}
		}
	});
	
	// у каждого 6 элемента убираем margin-right
	$(".add_photo:nth-child(6n+6)").addClass("mr0");
		
});
