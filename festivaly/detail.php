<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("����� ��������");
?><? global $USER;
if ($USER->IsAdmin()):?>
<? 
$teml="fests_detail_new";
?>
<? else:?> 
<? 
$teml="fests_detail";
?>
<? endif;?>  


<? $APPLICATION->IncludeComponent("bitrix:news.detail", "fests_detail_2016", Array(
	"IBLOCK_TYPE" => "content",	// ��� ��������������� ����� (������������ ������ ��� ��������)
		"IBLOCK_ID" => "5",	// ��� ��������������� �����
		"ELEMENT_ID" => $_REQUEST["ID"],	// ID �������
		"ELEMENT_CODE" => "",	// ��� �������
		"CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
		"FIELD_CODE" => array(	// ����
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(	// ��������
			0 => "ZOOM",
			1 => "MAP",
			2 => "NAME_EN",
			3 => "DESC",
			4 => "FEED",
			5 => "RULE",
			6 => "PRICE",
			7 => "PDF",
			8 => "GALLERY",
			9 => "PROGS",
			10 => "",
		),
		"IBLOCK_URL" => "",	// URL �������� ��������� ������ ��������� (�� ��������� - �� �������� ���������)
		"AJAX_MODE" => "N",	// �������� ����� AJAX
		"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
		"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
		"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
		"CACHE_TYPE" => "N",	// ��� �����������
		"CACHE_TIME" => "36000000",	// ����� ����������� (���.)
		"CACHE_GROUPS" => "Y",	// ��������� ����� �������
		"META_KEYWORDS" => "-",	// ���������� �������� ����� �������� �� ��������
		"META_DESCRIPTION" => "-",	// ���������� �������� �������� �� ��������
		"BROWSER_TITLE" => "-",	// ���������� ��������� ���� �������� �� ��������
		"SET_TITLE" => "Y",	// ������������� ��������� ��������
		"SET_STATUS_404" => "N",	// ������������� ������ 404
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// �������� �������� � ������� ���������
		"ADD_SECTIONS_CHAIN" => "Y",	// �������� ������ � ������� ���������
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// ������ ������ ����
		"USE_PERMISSIONS" => "N",	// ������������ �������������� ����������� �������
		"PAGER_TEMPLATE" => ".default",	// ������ ������������ ���������
		"DISPLAY_TOP_PAGER" => "N",	// �������� ��� �������
		"DISPLAY_BOTTOM_PAGER" => "Y",	// �������� ��� �������
		"PAGER_TITLE" => "��������",	// �������� ���������
		"PAGER_SHOW_ALL" => "Y",	// ���������� ������ "���"
		"DISPLAY_DATE" => "Y",	// �������� ���� ��������
		"DISPLAY_NAME" => "Y",	// �������� �������� ��������
		"DISPLAY_PICTURE" => "Y",	// �������� ��������� �����������
		"DISPLAY_PREVIEW_TEXT" => "Y",	// �������� ����� ������
		"USE_SHARE" => "N",	// ���������� ������ ���. ��������
		"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
		"SET_BROWSER_TITLE" => "Y",	// ������������� ��������� ���� ��������
		"SET_META_KEYWORDS" => "Y",	// ������������� �������� ����� ��������
		"SET_META_DESCRIPTION" => "Y",	// ������������� �������� ��������
		"ADD_ELEMENT_CHAIN" => "N",	// �������� �������� �������� � ������� ���������
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>