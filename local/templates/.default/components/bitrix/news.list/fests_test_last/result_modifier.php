<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?#debugtree($arResult['ITEMS'], 'item1s')?>
<?
/*foreach ($arResult['ITEMS']as $key => $arItem){
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
		$date = MakeTimeStamp($arStartDate);
		$arResult['DATES'][$date]['ID'] = $arItem['ID'];
		$arResult['DATES'][$date]['START_DATE'] = $arStartDate;	 
		$arResult['DATES'][$date]['MONTH'] = str_replace('0', '',$month);
	}
	
	foreach ($arItem['PROPERTIES']['FEST_DATES_END']['VALUE'] as $key=>$arEndDate)
	{
		$arResult['END_DATES'][] = $arEndDate;	  
	}
	
	$arResult['ITEMS'][$arItem['ID']] = $arItem;
	unset($arResult['ITEMS'][$key]);	
}

$i=0;
foreach ($arResult['DATES'] as $key=>$arItem){
	$arResult['DATES'][ $key]['END_DATE'] = $arResult['END_DATES'][$i];
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
		
} */



/**/
$today = date("d.m.Y"); 
$today_dt = strtotime($today);
$start = FormatDate("j F",MakeTimeStamp($arFests['START_DATE']));
$end =  FormatDate("j F",MakeTimeStamp($arFests['END_DATE']));


//echo $today;

foreach ($arResult['ITEMS'] as $key => $arItem) {
		$startDates[$key] = $arItem['DISPLAY_PROPERTIES']['FEST_DATES_START']['VALUE'];
		$endDates[$key] = $arItem['DISPLAY_PROPERTIES']['FEST_DATES_END']['VALUE'];
}

foreach ($arResult['ITEMS'] as $key => $arItem) {
	foreach ($startDates[$key] as $key2 => $start){
			$start = FormatDate("j F",MakeTimeStamp($start));
			$end =  FormatDate("j F",MakeTimeStamp($endDates[$key][$key2]));
			
			$intervals[$key] = $start." - ".$end;
			$arResult['ITEMS'][$key]['INTERVALS'][] = $intervals[$key];
	}
}


foreach ($arResult['ITEMS'] as $key => $arItem) {
	foreach ($startDates[$key] as $key2 => $start){
		 $festStartDate = $start;
		 
		 $rand = rand(10, 200);
		 $expire_dt = strtotime($festStartDate);

			if ($expire_dt > $today_dt) {
					$arResult['NEW_ITEMS'][$expire_dt+$rand] = $start;
					break;
			}elseif($expire_dt <= $today_dt){
					$arResult['OLD_ITEMS'][$expire_dt+$rand] = $start;
					break;
			}
		}
}




ksort($arResult['NEW_ITEMS']);

ksort($arResult['OLD_ITEMS']);

/* echo "<pre>";
		print_r($startDates);
		echo "<br><hr><br>";
		  echo "<pre>";
		print_r($endDates);
		
		echo "<hr>";
		
		echo "<br><hr><br>";*/
		echo "<pre>";
		print_r($arResult['NEW_ITEMS']);
		echo "<br><hr><br>";
		print_r($arResult['OLD_ITEMS']);
		
		
		echo (count($arResult['ITEMS']));
		echo "<br>";
		echo (count($arResult['NEW_ITEMS'])+count($arResult['OLD_ITEMS']));
		echo "<br><hr><br>";
	print_r($arResult['ITEMS']);
		
?>

