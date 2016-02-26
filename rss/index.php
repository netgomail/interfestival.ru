<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent("bitrix:rss.out", "rss", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "4",
	"SECTION_ID" => "",
	"SECTION_CODE" => "",
	"NUM_NEWS" => "20",
	"NUM_DAYS" => "30",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
	"RSS_TTL" => "60",
	"YANDEX" => "N"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>