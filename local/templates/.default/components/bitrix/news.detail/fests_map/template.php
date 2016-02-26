<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? $arProperty = $arResult["DISPLAY_PROPERTIES"]["MAP"]["VALUE"]; ?>
<? $PLACEMARKS = array(); //Создаем массив маркеров
   $i=0;
	  foreach ($arProperty as $pid=>$arProperty) {
            $MAP = explode (",", $arProperty); // и переводим их в формат карты)
            $PLACEMARKS[$i]["LON"] = $MAP[1]; //Заполняем массив маркера данными
            $PLACEMARKS[$i]["LAT"] = $MAP[0]; //
           //
      $i++; 
      }?>
<? $scale = $arResult['PROPERTIES']['ZOOM']['VALUE']?>
   
             
<h2><?=GetMessage("HOW_US_TO_REACH")?></h2>
<div id="map">
<? $APPLICATION->IncludeComponent("bitrix:map.google.view", "google_map_custom", Array(
	"INIT_MAP_TYPE" => "MAP",	// Стартовый тип карты
	"MAP_DATA" => serialize(array("google_lat"=>$MAP[0],"google_lon"=>$MAP[1],"google_scale"=>3,"PLACEMARKS"=>$PLACEMARKS)),	// Данные, выводимые на карте
	"MAP_WIDTH" => "980",	// Ширина карты
	"MAP_HEIGHT" => "500",	// Высота карты
	"CONTROLS" => array(	// Элементы управления
		0 => "SMALL_ZOOM_CONTROL",
		1 => "SCALELINE",
	),
	"OPTIONS" => array(	// Настройки
		0 => "ENABLE_SCROLL_ZOOM",
		1 => "ENABLE_DBLCLICK_ZOOM",
		2 => "ENABLE_DRAGGING",
		3 => "ENABLE_KEYBOARD",
	),
	"MAP_ID" => "",	// Идентификатор карты,
	"MAP_SCALE" => $scale
	),
	false
);?> 
</div> 







  
