<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$res = CIBlockElement::GetList(
 Array(),
 Array("IBLOCK_ID" => 5, ">=PROPERTY_START_DATE" => date("Y-m-d H:m:i"), ">=PROPERTY_N_START_DATE" => date("Y-m-d H:m:i")),
 false,
 false,
 Array("IBLOCK_ID", "ID", "PROPERTY_START_DATE", "PROPERTY_N_START_DATE")
);

echo '<pre>';
print_r($arFilter);
echo '</pre>';   
while($ob=$res->getNext()){
$arResult["DATES"][] = Array(
"START_DATE" =>$ob["PROPERTY_START_DATE_VALUE"],
"N_START_DATE" =>$ob["PROPERTY_N_START_DATE_VALUE"]
);



}?>




