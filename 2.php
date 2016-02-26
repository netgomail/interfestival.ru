<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?$APPLICATION->IncludeComponent("pixelplus:order.add", "callback", array(
	"EVENT_MESSAGE_ID" => array(
	),
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "0",
	"FIELDS_PREFIX" => "CALLBACK",
	"USE_CAPTCHA" => "N",
	"ADDDATA_IN_INFOBLOCK" => "Y",
	"IBLOCK_ID" => "11",
	"ADDDATA_IN_INFOBLOCK_NAME" => "#NAME# - #FULL_TIME#",
	"FIELDS_LIST" => array(
		0 => "NAME",
		1 => "PHONE",
		2 => "",
	),
	"FIELDS_LIST_REQUIRED" => array(
		0 => "NAME",
		1 => "PHONE",
		2 => "",
	)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>