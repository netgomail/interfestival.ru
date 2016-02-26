/*callback*/
jQuery(document).on("click", "#callback", function(event) {
	event.preventDefault();
	$.ajax({
		type	: "POST",
		cache	: false,
		url	: "/ajax/callback.php",
		data	: $(this).serializeArray(),
		success	: function(data) {
			$.fancybox(data, {
				'scrolling' 	:	'no',
				'autoScale'	:	false,
				'autoDimensions':	false,
				'fitToView'	:	false,
				'autoSize '	:	false,
				'padding'	:	[30, 42, 30, 42],
				'wrapCSS'	: 'fancybox-style'

			});
		}
	});
});

jQuery(document).on("submit", "#feedback_form", function(event) {
            if(!jQuery('#feedback_form input[name="TRY"]').is(":checked")){
                $.ajax({
                    type	: "POST",
                    cache	: false,
                    url	: "/ajax/callback.php",
                    data	: $(this).serializeArray(),
                    success	: function(data) {
                        $.fancybox(data, {
                            'scrolling' 	:	'no',
                            'autoScale'	:	false,
                            'autoDimensions':	false,
                            'fitToView'	:	false,
                            'autoSize '	:	false,
                            'padding'	:	[30, 42, 30, 42],
                            'wrapCSS'	: 'fancybox-style'

                        });
                    }
                });
            }
            event.preventDefault();
        });
/*callback*/
$(document).on("submit", "#subscription_form", function(event){
	var email = $('#subscription_form input[name="sf_EMAIL"]').val();
    $.ajax ({
    	'type':"POST",
        'url':"?",
        'data':{
        	"AJAX":true,
        	"AJAX_ACTION":"SUBS_ADD",
            "EMAIL-SUBSCRIPTION":email
        },
		success: function(ret){
			var jRet = $.parseJSON(ret);
			if(jRet.confirm == '1'){
				alert("Вы добавлены в подписку");
			} else if(jRet.confirm == '2') {
				alert("Вы уже добавлены в подписку");
			} else {
				alert("Произошла непредвиденная ошибка!")
			}
		}
    });

    event.preventDefault();
});
/*subscribe*/

/*index slider*/ 
/*jQuery( document ).ready(function(  ) {

	$(function() {
			$('.carousel').jcarousel({
							wrap: 'circular'
					})
					.jcarouselAutoscroll({
							interval: 3000,
							target: '+=1',
							autostart: true,
							create:  $(".carousel").hover(function(){
									$(this).jcarouselAutoscroll('stop');
							},
							function(){
								 $(this).jcarouselAutoscroll('start');
							})
					});
	});

});*/