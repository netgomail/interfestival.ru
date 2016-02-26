<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?#debugtree($arResult['ITEMS'], 'item1s')?>
<?
foreach ($arResult['ITEMS']as $key => $arItem){
	$arFilter = array();
	foreach ($arItem['PROPERTIES']['PLACE']['VALUE'] as $elemID){
		$arFilter['ID'][] = $elemID;
	}
	$arFilter['IBLOCK_ID'] = $arResult['ITEMS'][0]['PROPERTIES']['PLACE']['LINK_IBLOCK_ID'];
	$arFilter['ACTIVE'] = "Y";
	if($arFilter['ID']!=0){
	$dbRes = CIBlockElement::GetList(
		$arOrder=array('SORT'=>'ASC'), 
		$arFilter, 
		$arGroupBy=false, 
		$arNavStartParams=false, 
		$arSelectFields=array('NAME', 'PREVIEW_PICTURE')
	);
	
	
		while ($arRes = $dbRes->GetNext()) {
			$arResult['ITEMS'][$key]['PROPERTIES']['PLACE']['PXVALUE'][] = $arRes;
		}
	}
	}
	



foreach ($arResult['ITEMS'] as $key=>$arItem){

	foreach ($arItem['PROPERTIES']['FEST_DATES_START']['VALUE'] as $key=>$arStartDate)
	{
	
		//debugtree($arStartDate, 'item1s');
		$date = MakeTimeStamp($arStartDate);
		$date = $date+rand(1, 2000);	
		$month = preg_match("/[0-9]+\.0?([0-9]{1,3})\./" , $arStartDate, $matches); // выбираем номер месяца без ведущего 0
		$month = $matches[1];
		$arResult['DATES'][$date]['ID'] = $arItem['ID'];
		$arResult['DATES'][$date]['START_DATE'] = $arStartDate;	 
		$arResult['DATES'][$date]['MONTH'] = $month;
	}
	
	foreach ($arItem['PROPERTIES']['FEST_DATES_END']['VALUE'] as $key=>$arEndDate)
	{
		$arResult['END_DATES'][] = $arEndDate;	  
	}
	
	$arResult['ITEMS'][$arItem['ID']] = $arItem;
	unset($arResult['ITEMS'][$key]);	
	
} //foreach ($arResult['ITEMS'] as $key=>$arItem)

$i=0;
foreach ($arResult['DATES'] as $key=>$arItem){
	$arResult['DATES'][$key]['END_DATE'] = $arResult['END_DATES'][$i];
$i++;	
}

ksort($arResult['DATES']); 

if($_REQUEST['festFilter_pf']['MONTH']!=""){	
		
		foreach ($arResult['DATES'] as $key=>$arDates){
			$req =$_REQUEST['festFilter_pf']['MONTH'];
			$res =$arDates['MONTH'];
			
			if($arDates['MONTH']!=$_REQUEST['festFilter_pf']['MONTH']){
				unset($arResult['DATES'][$key]);
				}  
		}
		
} 

?>

