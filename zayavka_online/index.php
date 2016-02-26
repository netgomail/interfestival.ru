<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заявка online");
?><h1>Заявка Онлайн</h1>
<p>Просим по возможности заполнить максимальное количество полей для быстрой и грамотной обработки Вашей заявки</p>
 <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "festival_bid", array(
	"WEB_FORM_ID" => "1",
	"IGNORE_CUSTOM_TEMPLATE" => "N",
	"USE_EXTENDED_ERRORS" => "N",
	"SEF_MODE" => "N",
	"SEF_FOLDER" => "/zayavka_online/",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"LIST_URL" => "result_list.php",
	"EDIT_URL" => "result_edit.php",
	"SUCCESS_URL" => "/zayavka_online/",
	"CHAIN_ITEM_TEXT" => "",
	"CHAIN_ITEM_LINK" => "",
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>