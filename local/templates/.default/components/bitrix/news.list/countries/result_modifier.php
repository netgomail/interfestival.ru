<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<? foreach($arResult['ITEMS'] as $key => $arItem){
	
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
	$arFilter = Array(
		"IBLOCK_ID"=>IntVal($arItem["PROPERTIES"]["FESTS"]["LINK_IBLOCK_ID"]), 
		"SECTION_ID" =>IntVal($arItem["PROPERTIES"]["FESTS"]["VALUE"]),
		"ACTIVE_DATE"=>"Y", 
		"ACTIVE"=>"Y"
	);
	$res = CIBlockElement::GetList(Array(), $arFilter, Array(), false, $arSelect);
		if($res == 0){
			
			$arResult['ITEMS'][$key]['LINK_FESTS_COUNT'] = 1; 
			
		}
	}


?>
