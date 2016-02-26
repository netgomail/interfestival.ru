<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arEvents = array();

$arReplace = array("'", "\"", "&quot;");

foreach($arResult["ITEMS"] as $key => $arItem) {
	
	foreach ($arItem['PROPERTIES']['FEST_DATES_START']['VALUE'] as $key2  => $arDate) {
	$date = MakeTimeStamp($arDate);
	$date = $date+rand(1, 2000);	
	$arEvents[$date]['id'] = $arItem['ID'];
	$arEvents[$date]['start'] = date("Y-m-d", strtotime($arDate));
	$arEvents[$date]['title'] = str_replace($arReplace, "'", iconv("Windows-1251", "UTF-8",  $arItem['NAME']));
	$arEvents[$date]['url'] = $arItem['DETAIL_PAGE_URL'];
	}
}

$arJson = array();
$i = 0;
foreach ($arEvents as $key  => $arDate) {
	$arJson[$i]['id'] = $arDate['id'];
	$arJson[$i]['title'] = $arDate['title'];
	$arJson[$i]['start'] = $arDate['start'];
	$arJson[$i]['url'] = $arDate['url'];
$i++;	
}

$arResult['JSON_EVENTS'] = iconv("Windows-1251", "UTF-8", json_encode($arJson));

?>

