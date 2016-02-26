<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 
<html><head>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&sensor=true"></script>
<script type="text/javascript" src="/js/script.js"></script>

<!--jquery-ui-->
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<!--jcarousel-->
<!--<link href="/js/jcarousel/jcarousel.css" rel="stylesheet" type="text/css" />
<script src="/js/jcarousel/jcarousel.min.js"  type="text/javascript"></script>
<script src="/js/jcarousel/conected.jcarousel.js"  type="text/javascript"></script>-->

<!--bxslider-->
<link href="/js/bxslider/jquery.bxslider.css" rel="stylesheet" type="text/css" />
<script src="/js/bxslider/jquery.bxslider.min.js"  type="text/javascript"></script>

<!--prettyPhoto-->
<link rel="stylesheet" href="/js/prettyPhoto/prettyPhoto.css" type="text/css" media="screen">
<script src="/js/prettyPhoto/jquery.prettyPhoto.js" type="text/javascript"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!--jqueryCookie-->
<script type="text/javascript" src="/js/jqueryCookie/jquery.cookie.js"></script>


<!-- Scripts-->
<script type="text/javascript" src="/js/scripts.js"></script>
<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>

<!--fullcalendar-->
<link rel='stylesheet' href='/js/fullcalendar/fullcalendar.css' />
<script src='/js/fullcalendar/lib/moment.min.js'></script> 
<script src='/js/fullcalendar/fullcalendar.js'></script> 
<script src='/js/fullcalendar/lang/ru.js'></script> 

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

<? $APPLICATION->ShowHead()?>
<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowPanel();?>
</head>

<body> 

<?
global $APPLICATION;
$dir = $APPLICATION->GetCurDir();
$page = $APPLICATION->GetCurPage();
?>
 
<div class="main_wrap">
  <div class="contacts_top_wrap">
    <div class="contacts_top">
      <div class="head_contacts_wr">
        <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/header_contacts_new.php",
        "EDIT_TEMPLATE" => "" 
        )
        );?>
      </div>
      <!--head_contacts-->
      
      <div class="head_phones">
        <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/header_phones.php",
        "EDIT_TEMPLATE" => ""
        )
        );?>
        <span class="clear"></span> </div>
      <!--head_phones-->
      <div class="lang_switch"> <a class="selected" href="">RU</a> <img src="/img/lang_del.png" width="2" height="10" alt="|"> <a href="">ENG</a> </div>
      <!--lang_switch--> 
      <div class="clear"></div>
    </div>
    <!--contacts_top--> 
		 <div class="clear"></div>
  </div>
  <!--contacts_top_wrap-->
  <div class="header_wrap">
    <div class="header">
     <img class="header_print" src="/img/header_print.jpg" width="1280" height="90" alt="Изображение" /> 
      <div class="logo"> 
        <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/header_logo.php",
        "EDIT_TEMPLATE" => ""
        )
        );?>
      </div>
      
      <!--print_contacts-->
       <div class="head_contacts">
        <? /*$APPLICATION->IncludeComponent( 
        "bitrix:main.include",
        ".default",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/header_contacts_new.php",
        "EDIT_TEMPLATE" => ""
        )
        );*/?>
       
      </div>
      <!--head_contacts-->
      <div class="clear"></div>
      <div class="head_phones">
        <? /* $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/header_phones.php",
        "EDIT_TEMPLATE" => ""
        )
        );*/?>
        <span class="clear"></span>
		 </div>
      <!--head_phones-->
      
      <!--print_contacts_END-->
      
        <!--menu_top-->
        <? $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"main_menu_2016", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "main_menu_2016"
	),
	false
);?>
       <!--menu_top END-->      
      
      <div class="hubs">
        <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        ".default",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/social_hubs.php",
        "EDIT_TEMPLATE" => ""
        )
        );?>
      </div>
      <!--hubs--> 
      
    </div>
    <!--header--> 
  </div>
  <!--header_wrap-->
	
 <? if($dir !="/" /*&& $dir !="/ajax/"*/):?>
 <div class="content">
 
 		<div class="left_col">
 
    <? if($dir == "/festivaly/"):?> 
		
			<? $APPLICATION->IncludeComponent(
			"pixelplus:catalog.filter", 
			"festivals", 
			array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => "5",
			"FILTER_NAME" => "festFilter",
			"FIELD_CODE" => array(
			0 => "",
			1 => "",
			),
			"PROPERTY_CODE" => array(
			0 => "MONTH",
			1 => "PLACE",
			2 => "",
			3 => "",
			),
			"LIST_HEIGHT" => "5",
			"TEXT_WIDTH" => "20",
			"NUMBER_WIDTH" => "5",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_GROUPS" => "Y",
			"SAVE_IN_SESSION" => "N",
			"PRICE_CODE" => array(
			),
			"COMPONENT_TEMPLATE" => "festivals"
			),
			false
			);?>

		<? elseif(($dir == "/strany/") ):?>
		
			<? $APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"detail_countries",
			Array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => "6",
			"NEWS_COUNT" => "0",
			"SORT_BY1" => "NAME",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "SORT",
			"SORT_ORDER2" => "",
			"FILTER_NAME" => "",
			"FIELD_CODE" => array(0=>"",1=>"",),
			"PROPERTY_CODE" => array(0=>"",1=>"GALLERY",2=>"FESTS",3=>"",),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
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
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "N",
			"DISPLAY_PREVIEW_TEXT" => "N",
			"AJAX_OPTION_ADDITIONAL" => ""
			)
			);?> 
    
    <? else:?>
    
			<!--left_menu-->	
			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"left_menu",
				Array(
				"ROOT_MENU_TYPE" => "left",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array(),
				"MAX_LEVEL" => "1",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "N",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N"
				)
			);?>
			<!--left_menu END-->
			
   <? endif;?>	  
 
			<? $APPLICATION->IncludeComponent(
				"bitrix:search.form",
				"search",
				Array(
				"USE_SUGGEST" => "N",
				"PAGE" => "#SITE_DIR#search/index.php"
				)
			);?> 
        
			<? $APPLICATION->IncludeComponent("bitrix:subscribe.form", "subscribe", Array(
				"USE_PERSONALIZATION" => "Y",	// Определять подписку текущего пользователя
				"SHOW_HIDDEN" => "Y",	// Показать скрытые рубрики подписки
				"PAGE" => "#SITE_DIR#personal/subscribe/subscr_edit.php",	// Страница редактирования подписки (доступен макрос #SITE_DIR#)
				"CACHE_TYPE" => "A",	// Тип кеширования
				"CACHE_TIME" => "3600",	// Время кеширования (сек.)
				),
				false
			);?>
        
			<? $APPLICATION->IncludeComponent("bitrix:catalog.section", "other_banners", array(
				"IBLOCK_TYPE" => "content",
				"IBLOCK_ID" => "8",
				"SECTION_ID" => "9",
				"SECTION_CODE" => "",
				"SECTION_USER_FIELDS" => array(
				0 => "",
				1 => "",
				),
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_ORDER" => "RAND",
				"ELEMENT_SORT_FIELD2" => "RAND",
				"ELEMENT_SORT_ORDER2" => "RAND",
				"FILTER_NAME" => "arrFilter",
				"INCLUDE_SUBSECTIONS" => "Y",
				"SHOW_ALL_WO_SECTION" => "N",
				"PAGE_ELEMENT_COUNT" => "1",
				"LINE_ELEMENT_COUNT" => "1",
				"PROPERTY_CODE" => array(
				0 => "LINK",
				1 => "",
				),
				"OFFERS_LIMIT" => "0",
				"TEMPLATE_THEME" => "blue",
				"ADD_PICT_PROP" => "-",
				"LABEL_PROP" => "-",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_NOT_AVAILABLE" => "Нет в наличии",
				"SECTION_URL" => "",
				"DETAIL_URL" => "",
				"BASKET_URL" => "/personal/basket.php",
				"ACTION_VARIABLE" => "action",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_GROUPS" => "Y",
				"SET_META_KEYWORDS" => "N",
				"META_KEYWORDS" => "-",
				"SET_META_DESCRIPTION" => "N",
				"META_DESCRIPTION" => "-",
				"BROWSER_TITLE" => "-",
				"ADD_SECTIONS_CHAIN" => "N",
				"DISPLAY_COMPARE" => "N",
				"SET_TITLE" => "N",
				"SET_STATUS_404" => "N",
				"CACHE_FILTER" => "N",
				"PRICE_CODE" => array(
				),
				"USE_PRICE_COUNT" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"PRICE_VAT_INCLUDE" => "Y",
				"PRODUCT_PROPERTIES" => array(
				),
				"USE_PRODUCT_QUANTITY" => "N",
				"PAGER_TEMPLATE" => ".default",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_TITLE" => "Товары",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"AJAX_OPTION_ADDITIONAL" => ""
				),
				false
			);?>
 
 </div>  <!--left_col-->
 
 <div class="right_col">

 <? $APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"nav",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "-"
	)
);?>

<? endif;?> 
 
 
