<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

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
	$arFilter['IBLOCK_ID'] = "7";
	$arFilter['SECTION_ID'] = $arResult['PROPERTIES']['GALLERY']['VALUE'];
	
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

$arFilter = array("IBLOCK_ID"=>5, "SECTION_ID" => $arResult['PROPERTIES']['FESTS']['VALUE'], "ACTIVE" =>"Y");
	//$arFilter['IBLOCK_ID'] = "5";
	//$arFilter['SECTION_ID'] = $arResult['PROPERTIES']['FESTS']['VALUE'];
	/*$arFilter['PROPERTY_START_DATE'] = $arResult['PROPERTIES']['START_DATE']['VALUE'];*/


	$dbRes = CIBlockElement::GetList(
		$arOrder=array('PROPERTY_START_DATE'=>'ASC'), 
		$arFilter, 
		$arGroupBy=false, 
		$arNavStartParams=false, 
		$arSelectFields=array('PROPERTY_START_DATE', 'PROPERTY_END_DATE', 'NAME', 'DETAIL_PAGE_URL', 'PREVIEW_PICTURE')
	);
	
	while ($arRes = $dbRes->GetNext()) {
		$arResult['PROPERTIES']['FESTS']['PXVALUE_FESTS'][] = $arRes;
	}






?>
