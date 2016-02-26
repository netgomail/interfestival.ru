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


<? $groups = CIBlockElement::GetElementGroups($arResult['ID'], true);
while($ar_group = $groups->Fetch())
$ar_groups[] = $ar_group["ID"];?>
   
<? foreach($ar_groups as $item):?>
	<? if($item==$arResult['IBLOCK_SECTION_ID']):?><? continue;?><? endif;?>
	<? $arResult['FEST_SECTION']=$item;?>
<? endforeach;?>
  
<? /* Визы из страны проведения фестиваля*/?>

<?
 $search_key0 = $arResult['PROPERTIES']['PLACE']['VALUE'][0];
 $search_key1 = $arResult['PROPERTIES']['PLACE']['VALUE'][1];
if($search_key1 =="" &&  $search_key0!=""){

$arSelect = Array($arResult['PROPERTIES']['PLACE']['VALUE'][0], "PROPERTY_VISA");
$arFilter = Array("IBLOCK_ID"=>IntVal($arResult['PROPERTIES']['PLACE']['ID']), "ID"=>IntVal($arResult['PROPERTIES']['PLACE']['VALUE'][0]), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
	 $arFields = $ob->GetFields();
			if($arFields['~PROPERTY_VISA_VALUE']['TEXT']!=""){
				 //$arResult['DISPLAY_PROPERTIES']['VISA']['ID']=14;
				// $arResult['DISPLAY_PROPERTIES']['VISA']['SORT']=498;
				 //$arResult['DISPLAY_PROPERTIES']['VISA']['NAME']="Виза";
				 //$arResult['DISPLAY_PROPERTIES']['VISA']['CODE']="VISA";
				// $arResult['DISPLAY_PROPERTIES']['VISA']['MULTIPLE']="N";
				//arResult['DISPLAY_PROPERTIES']['VISA']['DISPLAY_VALUE']=$arFields['~PROPERTY_VISA_VALUE']['TEXT'];
			 
				 $arResult['VISA']['VISA']['ID']=14;
				 $arResult['VISA']['VISA']['SORT']=498;
				 $arResult['VISA']['VISA']['NAME']="Виза";
				 $arResult['VISA']['VISA']['CODE']="VISA";
				 $arResult['VISA']['VISA']['MULTIPLE']="N";
				 $arResult['VISA']['VISA']['DISPLAY_VALUE']=$arFields['~PROPERTY_VISA_VALUE']['TEXT'];
			
			 }
			 
			$arResult['DISPLAY_PROPERTIES'] = array_merge($arResult['VISA'], $arResult["DISPLAY_PROPERTIES"]);
}

}

?> 





