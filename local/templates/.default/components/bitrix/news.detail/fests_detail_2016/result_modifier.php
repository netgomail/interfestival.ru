
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
  


<?
$arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_VISA", "PROPERTY_REMIND", "PROPERTY_EXCURSIONS");
$arFilter = Array("IBLOCK_ID"=>IntVal($arResult['PROPERTIES']['PLACE']['ID']), "ID"=>IntVal($arResult['PROPERTIES']['PLACE']['VALUE'][0]), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
 	$arProps = $ob->GetProperties();
	
		if($arProps['VISA']['VALUE']['TEXT']!=""){
				 $arResult['VISA']['VISA']['ID']=$arProps['VISA']['ID'];
				 $arResult['VISA']['VISA']['SORT']=$arProps['VISA']['SORT'];
				 $arResult['VISA']['VISA']['NAME']=$arProps['VISA']['NAME'];
				 $arResult['VISA']['VISA']['DESCRIPTION']=$arProps['VISA']['DESCRIPTION'];
				 $arResult['VISA']['VISA']['CODE']=$arProps['VISA']['CODE'];
				 $arResult['VISA']['VISA']['MULTIPLE']=$arProps['VISA']['MULTIPLE'];
				 $arResult['VISA']['VISA']['DESCRIPTION']=$arProps['VISA']['DESCRIPTION'];
				 $arResult['VISA']['VISA']['DISPLAY_VALUE']=$arProps['VISA']['~VALUE']['TEXT'];
			
			 }
			 
		 if($arProps['REMIND']['VALUE']['TEXT']!=""){
				$arResult['REMIND']['REMIND']['ID']=$arProps['REMIND']['ID'];
				$arResult['REMIND']['REMIND']['SORT']=$arProps['REMIND']['SORT'];
				$arResult['REMIND']['REMIND']['NAME']=$arProps['REMIND']['NAME'];
				$arResult['REMIND']['REMIND']['DESCRIPTION']=$arProps['REMIND']['DESCRIPTION'];
				$arResult['REMIND']['REMIND']['CODE']=$arProps['REMIND']['CODE'];
				$arResult['REMIND']['REMIND']['MULTIPLE']=$arProps['REMIND']['MULTIPLE'];
				$arResult['REMIND']['REMIND']['DESCRIPTION']=$arProps['REMIND']['DESCRIPTION'];
				$arResult['REMIND']['REMIND']['DISPLAY_VALUE']=$arProps['REMIND']['~VALUE']['TEXT'];
		 }
		 
		 if($arProps['EXCURSIONS']['VALUE']['TEXT']!=""){
				$arResult['EXCURSIONS']['EXCURSIONS']['ID']=$arProps['EXCURSIONS']['ID'];
				$arResult['EXCURSIONS']['EXCURSIONS']['SORT']=$arProps['EXCURSIONS']['SORT'];
				$arResult['EXCURSIONS']['EXCURSIONS']['NAME']=$arProps['EXCURSIONS']['NAME'];
				$arResult['EXCURSIONS']['EXCURSIONS']['DESCRIPTION']=$arProps['EXCURSIONS']['DESCRIPTION'];
				$arResult['EXCURSIONS']['EXCURSIONS']['CODE']=$arProps['EXCURSIONS']['CODE'];
				$arResult['EXCURSIONS']['EXCURSIONS']['MULTIPLE']=$arProps['EXCURSIONS']['MULTIPLE'];
				$arResult['EXCURSIONS']['EXCURSIONS']['DESCRIPTION']=$arProps['EXCURSIONS']['DESCRIPTION'];
				$arResult['EXCURSIONS']['EXCURSIONS']['DISPLAY_VALUE']=$arProps['EXCURSIONS']['~VALUE']['TEXT'];
		
		 }
	
	
		 
	if (is_array($arResult['EXCURSIONS'])){		 
	$arResult['DISPLAY_PROPERTIES'] = array_merge($arResult['EXCURSIONS'], $arResult["DISPLAY_PROPERTIES"]);
	}
	if (is_array($arResult['REMIND'])){		 
	$arResult['DISPLAY_PROPERTIES'] = array_merge($arResult['REMIND'], $arResult["DISPLAY_PROPERTIES"]);
	}	
	$arResult['COUNTRY_PROPS'] = $arProps['VISA'];
	if (is_array($arResult['VISA'])){		 
	$arResult['DISPLAY_PROPERTIES'] = array_merge($arResult['VISA'], $arResult["DISPLAY_PROPERTIES"]);
	}
}


$timeNow = strtotime(date("d.m.Y H:i:s"));
$arResult['TIME_NOW_U'] = $timeNow;

foreach($arResult["PROPERTIES"]["FEST_DATES_START"]["VALUE"] as $key => $arDates)
{
	$arResult["DATES"][$key]["TIME_STAMP"] = MakeTimeStamp($arDates);
	$arResult["DATES"][$key]["FULL_START"] = $arDates;
	$arResult["DATES"][$key]["FULL_END"] = $arResult["PROPERTIES"]["FEST_DATES_END"]["VALUE"][$key];
	$arResult["DATES"][$key]["START"]= FormatDate("j F",MakeTimeStamp($arDates));
	$arResult["DATES"][$key]["END"]= FormatDate("j F Y",MakeTimeStamp($arResult["PROPERTIES"]["FEST_DATES_END"]["VALUE"][$key]));	
}


foreach ($arResult["DATES"] as $key => $row) {
    $full_start[$key]  = $row['TIME_STAMP'];
}

array_multisort($full_start, SORT_ASC, $arResult["DATES"]);

?>


<? /* Программы фестиваля */

$IBLOCK_ID = $arResult['PROPERTIES']['PROGS']['LINK_IBLOCK_ID'];
$SECTION_ID = $arResult['PROPERTIES']['PROGS']['~VALUE'];
$i=0;
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT");
$arFilter = Array("IBLOCK_ID"=>IntVal($IBLOCK_ID), "SECTION_ID"=>IntVal($SECTION_ID), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();
 
 $arResult["DISPLAY_PROPERTIES"]["PROGRAMS"]["DESCRIPTION"][$i] =  $arFields["NAME"];
 $arResult["DISPLAY_PROPERTIES"]["PROGRAMS"]["DISPLAY_VALUE"][$i] =  $arFields["PREVIEW_TEXT"];
$i++;
}
 $arResult["DISPLAY_PROPERTIES"]["PROGRAMS"]["MULTIPLE"] = "Y"; 

?>

