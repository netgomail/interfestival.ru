<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?$APPLICATION->IncludeComponent("bitrix:subscribe.index", ".default", array(
	"SHOW_COUNT" => "N",
	"SHOW_HIDDEN" => "N",
	"PAGE" => "#SITE_DIR#/personal/subscribe/subscr_edit.php",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"SET_TITLE" => "Y"
	),
	false
);?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>