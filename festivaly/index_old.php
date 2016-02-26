<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фестивали");
$M_0 = "01";
settype($M_0, "string");
$GLOBALS['festFilter'] = Array();
?> 
<h1>Фестивали</h1>
<?if ($_REQUEST['set_filter'] == 'Y'):?>
<?
foreach ($_REQUEST['festFilter_pf']['PLACE'] as $id):
	$GLOBALS['festFilter']['PROPERTY_PLACE'][] = $id;
endforeach;
?>
<?
$GLOBALS['festFilter']['PROPERTY_PLACE'] = strlen($_REQUEST['festFilter_pf']['PLACE'])>0?$_REQUEST['festFilter_pf']["PLACE"]:"";
$GLOBALS['festFilter']['>=PROPERTY_MONTH'] = strlen($_REQUEST['festFilter_pf']['MONTH'])>0?$_REQUEST["festFilter_pf"]["MONTH"]:$M_0;
#var_dump($GLOBALS['festFilter']);
?>
<?endif?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "fests", array(
	"IBLOCK_TYPE" => "-",
	"IBLOCK_ID" => "5",
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "PROPERTY_START_DATE",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "festFilter",
	"FIELD_CODE" => array(
		0 => "NAME",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "MONTH",
		1 => "START_DATE",
		2 => "END_DATE",
		3 => "N_START_DATE",
		4 => "N_END_DATE",
		5 => "PLACE",
		6 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "j F Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => $_REQUEST["SECTION_ID"],
	"PARENT_SECTION_CODE" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"PAGER_TEMPLATE" => ".default",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>