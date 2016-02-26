<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Галерея");
?> 
<h1>Галерея</h1>
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"all_gallery", 
	array(
		"VIEW_MODE" => "LINE",
		"SHOW_PARENT_NAME" => "Y",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "7",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "COUNTRY",
			2 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "UF_FLAG",
			1 => "COUNTRY",
			2 => "",
		),
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>