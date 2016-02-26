<?
define("STOP_STATISTICS", true);
define("PUBLIC_AJAX_MODE", true);
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>


<?$APPLICATION->IncludeComponent(
	"pixelplus:order.add",
	"callback",
	Array(
		"EVENT_MESSAGE_ID" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0",
		"FIELDS_PREFIX" => "CALLBACK",
		"USE_CAPTCHA" => "N",
		"ADDDATA_IN_INFOBLOCK" => "Y",
		"IBLOCK_ID" => "11",
		"ADDDATA_IN_INFOBLOCK_NAME" => "#NAME# - #FULL_TIME#",
		"FIELDS_LIST" => array(0=>"NAME",1=>"PHONE",2=>"",),
		"FIELDS_LIST_REQUIRED" => array(0=>"NAME",1=>"PHONE",2=>"",)
	)
);?>
<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>