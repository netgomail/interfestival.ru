jQuery( document ).ready(function( $ ) {
 jQuery('.fest_name a').on('click', function(){
		 var period = jQuery(this).parent().siblings('.fest_time_place').find('.period p').html();
		 $.cookie('FEST_PERIOD', period);
	  });
});