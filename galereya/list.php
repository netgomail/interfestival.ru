<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("�����������");
?><?$APPLICATION->IncludeComponent("bitrix:catalog.section", "gallery_2016", Array(
	"IBLOCK_TYPE" => "content",	// ��� ���������
		"IBLOCK_ID" => "7",	// ��������
		"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID �������
		"SECTION_CODE" => "",	// ��� �������
		"SECTION_USER_FIELDS" => array(	// �������� �������
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => "sort",	// �� ������ ���� ��������� ��������
		"ELEMENT_SORT_ORDER" => "asc",	// ������� ���������� ���������
		"ELEMENT_SORT_FIELD2" => "id",	// ���� ��� ������ ���������� ���������
		"ELEMENT_SORT_ORDER2" => "desc",	// ������� ������ ���������� ���������
		"FILTER_NAME" => "arrFilter",	// ��� ������� �� ���������� ������� ��� ���������� ���������
		"INCLUDE_SUBSECTIONS" => "Y",	// ���������� �������� ����������� �������
		"SHOW_ALL_WO_SECTION" => "N",	// ���������� ��� ��������, ���� �� ������ ������
		"PAGE_ELEMENT_COUNT" => "100500",	// ���������� ��������� �� ��������
		"LINE_ELEMENT_COUNT" => "3",	// ���������� ��������� ��������� � ����� ������ �������
		"PROPERTY_CODE" => array(	// ��������
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "0",	// ������������ ���������� ����������� ��� ������ (0 - ���)
		"SECTION_URL" => "",	// URL, ������� �� �������� � ���������� �������
		"DETAIL_URL" => "",	// URL, ������� �� �������� � ���������� �������� �������
		"BASKET_URL" => "/personal/basket.php",	// URL, ������� �� �������� � �������� ����������
		"ACTION_VARIABLE" => "action",	// �������� ����������, � ������� ���������� ��������
		"PRODUCT_ID_VARIABLE" => "id",	// �������� ����������, � ������� ���������� ��� ������ ��� �������
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// �������� ����������, � ������� ���������� ���������� ������
		"PRODUCT_PROPS_VARIABLE" => "prop",	// �������� ����������, � ������� ���������� �������������� ������
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// �������� ����������, � ������� ���������� ��� ������
		"AJAX_MODE" => "N",	// �������� ����� AJAX
		"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
		"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
		"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
		"CACHE_TYPE" => "A",	// ��� �����������
		"CACHE_TIME" => "36000000",	// ����� ����������� (���.)
		"CACHE_GROUPS" => "Y",	// ��������� ����� �������
		"SET_META_KEYWORDS" => "N",	// ������������� �������� ����� ��������
		"META_KEYWORDS" => "-",	// ���������� �������� ����� �������� �� ��������
		"SET_META_DESCRIPTION" => "Y",	// ������������� �������� ��������
		"META_DESCRIPTION" => "-",	// ���������� �������� �������� �� ��������
		"BROWSER_TITLE" => "-",	// ���������� ��������� ���� �������� �� ��������
		"ADD_SECTIONS_CHAIN" => "Y",	// �������� ������ � ������� ���������
		"DISPLAY_COMPARE" => "N",
		"SET_TITLE" => "Y",	// ������������� ��������� ��������
		"SET_STATUS_404" => "N",	// ������������� ������ 404
		"CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
		"PRICE_CODE" => "",	// ��� ����
		"USE_PRICE_COUNT" => "N",	// ������������ ����� ��� � �����������
		"SHOW_PRICE_COUNT" => "1",	// �������� ���� ��� ����������
		"PRICE_VAT_INCLUDE" => "Y",	// �������� ��� � ����
		"PRODUCT_PROPERTIES" => "",	// �������������� ������
		"USE_PRODUCT_QUANTITY" => "N",	// ��������� �������� ���������� ������
		"PAGER_TEMPLATE" => "blog",	// ������ ������������ ���������
		"DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
		"DISPLAY_BOTTOM_PAGER" => "Y",	// �������� ��� �������
		"PAGER_TITLE" => "������",	// �������� ���������
		"PAGER_SHOW_ALWAYS" => "Y",	// �������� ������
		"PAGER_DESC_NUMBERING" => "N",	// ������������ �������� ���������
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
		"PAGER_SHOW_ALL" => "N",	// ���������� ������ "���"
		"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
		"SET_BROWSER_TITLE" => "Y",	// ������������� ��������� ���� ��������
		"ADD_PROPERTIES_TO_BASKET" => "Y",	// ��������� � ������� �������� ������� � �����������
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// ��������� ��������� � ������� ������, � ������� ��������� �� ��� ��������������
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>