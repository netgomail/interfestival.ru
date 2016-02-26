<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news-list">
  <?if($arParams["DISPLAY_TOP_PAGER"]):?>
  <?=$arResult["NAV_STRING"]?>
  <br />
  <?endif;?>
  <?foreach($arResult["ITEMS"] as $arItem):?>
  <?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
  <div class="award_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    <div class="photo"> <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
    
    <? if($arItem["PREVIEW_PICTURE"]["SRC"]!=""):?>
    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="150" height="130" alt="<?=$arItem["NAME"]?>" />
    <? else:?>
    <img src="/img/no_photo.png" width="150" height="130" alt="<?=$arItem["NAME"]?>" />
    <? endif;?>
    
    </a> </div>
    <div class="preview"> 
      <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><span class="title"><?=$arItem["NAME"]?></span></a>
      <div class="preview_text">
        <?=$arItem["PREVIEW_TEXT"]?>
      </div>
      <a class="detail" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a> </div>
  </div>  <!--award_item-->
  <?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>

</div>
