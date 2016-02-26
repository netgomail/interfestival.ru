<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<div class="fests">
<? foreach($arResult["ITEMS"] as $arItem):
$start = $arItem["DISPLAY_PROPERTIES"]["START_DATE"]["VALUE"];
$end =  $arItem["DISPLAY_PROPERTIES"]["END_DATE"]["VALUE"];?>
  <div class="fest_item">
    <? if($start):?>
    <div class="fest_date">
      <?=FormatDate("j",MakeTimeStamp($start))?>
      -
      <?=FormatDate("j F Y",MakeTimeStamp($end))?>
    </div>
    <? endif;?>
    <? if($arItem['PROPERTIES']['PLACE']['PXVALUE']):?>
    <div class="fest_title">
      <?=$arItem['PROPERTIES']['PLACE']['PXVALUE'][0]["NAME"]?>
      /
      <?=$arItem['PROPERTIES']['PLACE']['PXVALUE'][0]["CODE"]?>
    </div>
    <? endif;?>
    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
    <?=$arItem["NAME"]?>
    /
    <?=$arItem["CODE"]?>
    </a> </div>

  <? endforeach;?>
  </div><!--fests-->
  <div class="clear"></div>
  <a href="/festivaly/">Все фестивали</a> </div>

