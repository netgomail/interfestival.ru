<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? $arProperty = $arResult["DISPLAY_PROPERTIES"]["MAP"]["VALUE"]; ?>
<? $PLACEMARKS = array(); //������� ������ ��������
   $i=0;
	  foreach ($arProperty as $pid=>$arProperty) {
            $MAP = explode (",", $arProperty); // � ��������� �� � ������ �����)
            $PLACEMARKS[$i]["LON"] = $MAP[1]; //��������� ������ ������� �������
            $PLACEMARKS[$i]["LAT"] = $MAP[0]; //
           //
      $i++; 
      }?>
<? $scale = $arResult['PROPERTIES']['ZOOM']['VALUE']?>
   
             
<h2><?=GetMessage("HOW_US_TO_REACH")?></h2>
<div id="map">
<? $APPLICATION->IncludeComponent("bitrix:map.google.view", "google_map_custom", Array(
	"INIT_MAP_TYPE" => "MAP",	// ��������� ��� �����
	"MAP_DATA" => serialize(array("google_lat"=>$MAP[0],"google_lon"=>$MAP[1],"google_scale"=>3,"PLACEMARKS"=>$PLACEMARKS)),	// ������, ��������� �� �����
	"MAP_WIDTH" => "980",	// ������ �����
	"MAP_HEIGHT" => "500",	// ������ �����
	"CONTROLS" => array(	// �������� ����������
		0 => "SMALL_ZOOM_CONTROL",
		1 => "SCALELINE",
	),
	"OPTIONS" => array(	// ���������
		0 => "ENABLE_SCROLL_ZOOM",
		1 => "ENABLE_DBLCLICK_ZOOM",
		2 => "ENABLE_DRAGGING",
		3 => "ENABLE_KEYBOARD",
	),
	"MAP_ID" => "",	// ������������� �����,
	"MAP_SCALE" => $scale
	),
	false
);?> 
</div> 







  
