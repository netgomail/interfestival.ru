<?

//Текущая дата
$arResult['PARSE']['TS']['CURRENT'] =  MakeTimeStamp(ConvertTimeStamp(false,"SHORT"), FORMAT_DATE);

//Переданная дата
$arResult['PARSE']['TS']['REQUEST'] =  mktime(0, 0, 0, $arResult['currentMonth'], 1, $arResult['currentYear']);

//Предыдущий месяц (относительно переданной даты)
$arResult['PARSE']['TS']['PREV'] = AddToTimeStamp(
	Array("MM"=>-1),
	$arResult['PARSE']['TS']['REQUEST']
);
//Следующий месяц
$arResult['PARSE']['TS']['NEXT'] = AddToTimeStamp(
	Array("MM"=>1),
	$arResult['PARSE']['TS']['REQUEST']
);

foreach ($arResult['PARSE']['TS'] as $key=>$ts) {
	$arResult['PARSE']['SPLIT'][$key] = ParseDateTime(ConvertTimeStamp($ts,"SHORT"), FORMAT_DATE);
}

$maxday = 1;
$currentday = date('j'); 
foreach($arResult["MONTH"] as $key=>&$arWeek) {
	foreach($arWeek as &$arDay) {
		if ($key === 0 && $arDay['day'] > 8) {
			//Предыдущий месяц
			$arDay['TS'] = mktime(0, 0, 0, $arResult['PARSE']['SPLIT']['PREV']['MM'], $arDay['day'], $arResult['PARSE']['SPLIT']['PREV']['YYYY']);
			if ($arDay['TS'] < $arResult['PARSE']['TS']['CURRENT']) {
				$arDay['prev'] = "Y";
			}
		} else {
			if ($arDay['day'] >= $maxday) {
				$maxday = $arDay['day'];
				$arDay['TS'] = mktime(0, 0, 0, $arResult['currentMonth'], $arDay['day'], $arResult['currentYear']);
			} else {
				$arDay['TS'] = mktime(0, 0, 0, $arResult['PARSE']['SPLIT']['NEXT']['MM'], $arDay['day'], $arResult['PARSE']['SPLIT']['NEXT']['YYYY']);
			}
			if ($arDay['TS'] < $arResult['PARSE']['TS']['CURRENT']) {
				$arDay['prev'] = "Y";
			}
		}
	}
}?>