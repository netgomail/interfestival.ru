<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������� ����");
?>

<div id="calendar"> <?$APPLICATION->IncludeComponent("pixelplus:news.calendar", "calendar_compact_test", Array(
	"IBLOCK_TYPE" => "content",	// ��� ��������������� ����� (������������ ������ ��� ��������)
		"IBLOCK_ID" => "5",	// ��� ��������������� �����
		"MONTH_VAR_NAME" => "month",	// ��� ���������� ��� ������
		"YEAR_VAR_NAME" => "year",	// ��� ���������� ��� ����
		"WEEK_START" => "1",	// ������ ������
		"SHOW_YEAR" => "Y",	// ���������� ������� �� �����
		"SHOW_TIME" => "Y",	// ���������� ����� ��������
		"TITLE_LEN" => "0",	// ����� ��������� (0 - �� ������������)
		"SHOW_CURRENT_DATE" => "Y",	// ���������� ������� ����� � ���
		"SHOW_MONTH_LIST" => "Y",	// ���������� ���������� ������ �������
		"NEWS_COUNT" => "0",	// ���������� �������� � ���� (0 - �� ������������)
		"DETAIL_URL" => "",	// URL, ������� �� �������� � ���������� �������� �������
		"AJAX_MODE" => "N",	// �������� ����� AJAX
		"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
		"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
		"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
		"CACHE_TYPE" => "N",	// ��� �����������
		"CACHE_TIME" => "36000000",	// ����� ����������� (���.)
		"DATE_FIELD" => "PROPERTY_FEST_DATES_START",	// ���� ����
		"TYPE" => "EVENTS",	// ��� ���������
		"SET_TITLE" => "N",	// ������������� ��������� ��������
		"FILTER_NAME" => "",	// ��� ������� �� ���������� ������� ��� ���������� ���������
		"LIST_URL" => "",	// URL ������� �� �������� ������ ���������
		"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
	),
	false
);?> </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>