<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<h1>Контакты</h1>
<div class="cont_top_block">
  <div class="contacts">
    <? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => "/inc/contacty/contacts.php",
    "EDIT_TEMPLATE" => ""
    )
    );?>
  </div>
  </p>
  <div class="time_table">
    <? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
    "AREA_FILE_SHOW" => "file",
    "PATH" => "/inc/contacty/time_table.php",
    "EDIT_TEMPLATE" => ""
    )
    );?>
  </div>
  <div class="clear"></div>
</div>
<!--cont_top_block-->

<div class="map_left">
	<? $APPLICATION->IncludeComponent(
    "bitrix:map.yandex.view",
    ".default",
    Array(
    "INIT_MAP_TYPE" => "MAP",
    "MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.74876484786785;s:10:\"yandex_lon\";d:37.58779982275686;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.5913510675;s:3:\"LAT\";d:55.7487224886;s:4:\"TEXT\";s:0:\"\";}}}",
    "MAP_WIDTH" => "415",
    "MAP_HEIGHT" => "375",
    "CONTROLS" => array(),
    "OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",),
    "MAP_ID" => ""
    )
    );?>
    <div class="route_desc">
        <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/contacty/smolenskaya.php",
        "EDIT_TEMPLATE" => ""
        )
        );?>
    </div>
</div>
<div class="map_right">
	<? $APPLICATION->IncludeComponent(
    "bitrix:map.yandex.view",
    ".default",
    Array(
    "INIT_MAP_TYPE" => "MAP",
    "MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.75079713143989;s:10:\"yandex_lon\";d:37.596928764771235;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.5913510675;s:3:\"LAT\";d:55.7487224886;s:4:\"TEXT\";s:0:\"\";}}}",
    "MAP_WIDTH" => "415",
    "MAP_HEIGHT" => "375",
    "CONTROLS" => array(),
    "OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",),
    "MAP_ID" => ""
    )
    );?>
    <div class="route_desc">
        <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/inc/contacty/arbatskaya.php",
        "EDIT_TEMPLATE" => ""
        )
        );?>
    </div>
</div>
<div class="clear"></div>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
