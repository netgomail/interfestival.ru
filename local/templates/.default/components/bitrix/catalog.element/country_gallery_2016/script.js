$(document).ready(function(){

				
	$(".fancybox_pic").fancybox({ 
		afterLoad: function () {
			 this.title = '<a download href="' + this.href+'">��������� ����</a> ';
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
	
	// � ������� 6 �������� ������� margin-right
	$(".add_photo:nth-child(6n+6)").addClass("mr0");
		
});
