<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<script type="text/javascript">
$(document).ready(function() {
	function popup(event) {
		var title = event.title;
		var url = event.url;
		var start = moment(event.start).format('D MMMM YYYY');
		var html ="<div class='cust-popover cust-more-popover'><div class='cust-header cust-widget-header'><span class='cust-close cust-icon cust-icon-x'></span><span class='cust-title'>"+start+"</span><div class='cust-clear'></div></div><div class='cust-body cust-widget-content'><div class='cust-event-container'><a href='"+url+"' class='cust-day-grid-event cust-h-event cust-event cust-start cust-end' ><div class='cust-content'> <span class='cust-title'>"+title+"</span></div></a></div></div></div>";
		return html;
	}

	var json = <? echo $arResult['JSON_EVENTS']?>;
			
	function renderCalendar() {
			$('#calendar').fullCalendar({
				firstDay: 1,
				contentHeight: 265,
				aspectRatio: 2,
				fixedWeekCount: false,
				header: {
					left: 'prev',
					center: 'title',
					right: 'next'
				},
				lang: 'ru',
				editable: false,
				eventLimit: 1,
				eventLimitText: "",
				eventLimitClick : 'popover',	
				events: json,
				
				eventAfterRender: function( event, element, view ) {
					element.attr('href', 'javascript:void(0);');
					element.click(function(e) {
					var html =  popup(event);
					$('.fc-view-container').prepend(html);
						$('.cust-close, .fc-button').on('click', function(){
							$('.cust-popover').remove();
						});
					}); 
				}
		});
	}
	renderCalendar();
});


</script>

