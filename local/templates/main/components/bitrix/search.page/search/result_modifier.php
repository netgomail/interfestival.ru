<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arSearch = array();

$arSearch["FEST"] = array();
$arSearch["GALLERY"] = array();
$arSearch["OTHER"] = array();

foreach($arResult["SEARCH"] as $arItem){
	if(strstr($arItem ['URL'], 'festivaly')){
			$arItem['SECTION_NAME'] = "Фестивали";
			$arSearch['FEST'][] = 	$arItem;
	}elseif(strstr($arItem ['URL'], 'galereya')){
		$arItem['SECTION_NAME'] = "Галерея";
			$arSearch['GALLERY'][] = 	$arItem;
	}else{
			$arItem['SECTION_NAME'] = "Другие результаты";
			$arSearch['OTHER'][] = 	$arItem;
	}
	
	
	
	$arResult['FORMATED_SEARCH'] = $arSearch;
	
}
?>
