<?
CModule::IncludeModule('iblock');

$arResult['PROPS'] = array();
$dbCountries = CIBlockElement::GetList(
	$arOrder=array('SORT'=>'ASC'), 
	$arFilter=array('IBLOCK_ID' => 6, 'ACTIVE' => 'Y'), 
	$arGroupBy=false, 
	$arNavStartParams=false, 
	$arSelectFields=array('ID', 'NAME')
);
while ($arCountries = $dbCountries -> Fetch()){
	$arResult['COUNTRIES'][$arCountries['ID']] = $arCountries['NAME'];
}

foreach ($arResult['arrProp'] as $id => $arProp) {
	/*
	if ($arProp['MULTIPLE'] == 'Y'){
		$arResult['PROPS'][$id]['NAME'] = $arParams['FILTER_NAME'].'_pf['.$arProp['CODE'].'][]';
	} else {
	}*/
	$arResult['PROPS'][$id]['NAME'] = $arParams['FILTER_NAME'].'_pf['.$arProp['CODE'].']';
	$arResult['PROPS'][$id]['CODE'] = $arProp['CODE'];
	
	if ($id == 29) {
		$arResult['PROPS'][$id]['CLASS'] = 'date';
		$arResult['PROPS'][$id]['VALUES'] = $arProp['VALUE_LIST'];
		$arResult['PROPS'][$id]['TITLE'] = 'Выберите месяц';

	}
	if ($id == 6){
		$arResult['PROPS'][$id]['CLASS'] = 'place';
		$arResult['PROPS'][$id]['VALUES'] = $arResult['COUNTRIES'];
		$arResult['PROPS'][$id]['TITLE'] = 'Выберите страну';
	}
	if ($id == 4) {
		unset($arResult["PROPS"][$id]);
	}
	
}

echo "<!-- ";
print_r ($arResult);
echo "-->";
?>
