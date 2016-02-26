<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="galleries">


<? foreach ($arResult['ITEMS'] as $key => $arItem):?>
<div class="gallery_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
	<? $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);?>
 
 
 <? $file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>150, 'height'=>130), BX_RESIZE_IMAGE_EXACT, true); ?>  


 <div class="photo"> <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
    
    <? if($arItem["PREVIEW_PICTURE"]["SRC"]!=""):?>
    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="150" height="130" alt="<?=$arItem["NAME"]?>" />
    <? else:?>
    <img src="<?=$file['src']?>" width="<?=$file['width']?>" height="<?=$file['height']?>" alt="<?=$arItem["NAME"]?>" />
    <? endif;?>
    
    </a> </div>
    <div class="preview"> 
      <a class="gallery_item_name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><span class="title"><?=$arItem["NAME"]?></span></a>
      <div class="preview_text">
        <?=$arItem["PREVIEW_TEXT"]?>	
				<div style="clear:both"></div>
      </div>
      <a class="detail" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее</a> </div>
  </div> 
<? endforeach;?> 


<div class="clear"></div>
</div>
<? if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<? echo $arResult["NAV_STRING"]; ?>
<? endif;?>	


