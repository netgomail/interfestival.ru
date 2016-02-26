<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Календарь тест");
?>

<div id="calendar"> <?$APPLICATION->IncludeComponent("pixelplus:news.calendar", "calendar_compact_test", Array(
	"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_ID" => "5",	// Код информационного блока
		"MONTH_VAR_NAME" => "month",	// Имя переменной для месяца
		"YEAR_VAR_NAME" => "year",	// Имя переменной для года
		"WEEK_START" => "1",	// Начало недели
		"SHOW_YEAR" => "Y",	// Показывать переход по годам
		"SHOW_TIME" => "Y",	// Показывать время новостей
		"TITLE_LEN" => "0",	// Длина заголовка (0 - не ограничивать)
		"SHOW_CURRENT_DATE" => "Y",	// Показывать текущий месяц и год
		"SHOW_MONTH_LIST" => "Y",	// Показывать выпадающий список месяцев
		"NEWS_COUNT" => "0",	// Количество новостей в день (0 - не ограничивать)
		"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"CACHE_TYPE" => "N",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"DATE_FIELD" => "PROPERTY_FEST_DATES_START",	// Поле даты
		"TYPE" => "EVENTS",	// Тип календаря
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"FILTER_NAME" => "",	// Имя массива со значениями фильтра для фильтрации элементов
		"LIST_URL" => "",	// URL ведущий на страницу вывода элементов
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
	),
	false
);?> </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>