<? 
foreach ($arResult['ITEMS']as $key => $arItem){
	$arFilter = array();
	foreach ($arItem['PROPERTIES']['PLACE']['VALUE'] as $elemID){
		$arFilter['ID'][] = $elemID;
	}
	$arFilter['IBLOCK_ID'] = $arResult['ITEMS'][0]['PROPERTIES']['PLACE']['LINK_IBLOCK_ID'];
	if($arFilter['ID']!=0){
	$dbRes = CIBlockElement::GetList(
		$arOrder=array('SORT'=>'ASC'), 
		$arFilter, 
		$arGroupBy=false, 
		$arNavStartParams=false, 
		$arSelectFields=array('NAME', 'CODE')
	);
	
	
	while ($arRes = $dbRes->GetNext()) {
		$arResult['ITEMS'][$key]['PROPERTIES']['PLACE']['PXVALUE'][] = $arRes;
	}
	}
	}
	

?>
