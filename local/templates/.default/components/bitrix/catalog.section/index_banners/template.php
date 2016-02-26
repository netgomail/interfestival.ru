<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

  <? foreach ($arResult['ITEMS'] as $arItem):?>
  <div class="bottom_pictures_item">
    <? if($arItem["PROPERTIES"]["LINK"]["VALUE"]):?>
    <a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" target="_blank"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="235" height="100" alt="<?=$arItem["NAME"]?>" /></a>
    <? else:?>
    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="235" height="100" alt="<?=$arItem["NAME"]?>" />
    <? endif;?>
  </div><!--bottom_pictures_item-->
  <? endforeach;?>
 <div class="clear"></div>
