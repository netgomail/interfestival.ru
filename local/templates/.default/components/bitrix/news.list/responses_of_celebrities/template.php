<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news-list">
  <?foreach($arResult["ITEMS"] as $arItem):?>
 
	<? $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
	
  <div class="award_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    <div class="photo"> 
    
    <? if($arItem["PREVIEW_PICTURE"]["SRC"]!=""):?>
    <? $file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>150, 'height'=>130), BX_RESIZE_IMAGE_EXACT, true); ?>
    <img src="<?=$file['src']?>" width="<?=$file['width']?>" height="<?=$file['height']?>" alt="<?=$arItem["NAME"]?>" />
    <? else:?>
    <img src="/img/no_photo.png" width="150" height="130" alt="<?=$arItem["NAME"]?>" />
    <? endif;?>
    
     </div>
    <div class="preview"> 

      <? if($arItem["PROPERTIES"]["R_TITLE"]["VALUE"]):?>
        <span class="title"><?=$arItem["PROPERTIES"]["R_TITLE"]["VALUE"]?></span>
      <? else:?>
     	 <span class="title"><?=$arItem["NAME"]?></span>
      <? endif;?>
     
     
      <div class="preview_text">
        <?=$arItem["PREVIEW_TEXT"]?>
      </div>
      
      <span class="name"><strong><?=$arItem["NAME"]?></strong></span>
      
      <? if($arItem["PROPERTIES"]["LINK"]["VALUE"]):?>
      <a class="site" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" target="_blank"><?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?></a>
      <?endif;?>
    </div>   
  </div>  <!--award_item-->
  <?endforeach;?>
  
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
</div>



