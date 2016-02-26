<?

	$arFilter = array();
	foreach ($arResult['PROPERTIES']['PLACE']['VALUE'] as $key => $elemID){
		$arFilter['ID'][] = $elemID;
	}
	$arFilter['IBLOCK_ID'] = $arResult['ITEMS'][0]['PROPERTIES']['PLACE']['LINK_IBLOCK_ID'];
	$dbRes = CIBlockElement::GetList(
		$arOrder=array('SORT'=>'ASC'), 
		$arFilter, 
		$arGroupBy=false, 
		$arNavStartParams=false, 
		$arSelectFields=array()
	);
	while ($arRes = $dbRes->GetNext()) {
		$arResult['PROPERTIES']['PLACE']['PXVALUE'][] = $arRes;
	}


  $arFilter = array();
	foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $key => $elemID){
		$arFilter['ID'][] = $elemID;
	}
	$arFilter['IBLOCK_ID'] = $arResult['ITEMS'][0]['PROPERTIES']['PLACE']['LINK_IBLOCK_ID'];
	$dbRes = CIBlockElement::GetList(
		$arOrder=array('SORT'=>'ASC'), 
		$arFilter, 
		$arGroupBy=false, 
		$arNavStartParams=false, 
		$arSelectFields=array()
	);
	while ($arRes = $dbRes->GetNext()) {
		$arResult['PROPERTIES']['GALLERY']['PXVALUE_GAL'][] = $arRes;
	}







?>
