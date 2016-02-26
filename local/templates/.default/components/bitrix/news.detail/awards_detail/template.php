<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="awards">
	
     <? $count= count($arResult["DISPLAY_PROPERTIES"]["ADD_PHOTO"]["FILE_VALUE"]);?>
	
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h1><?=$arResult["NAME"]?></h1>
	<?endif;?>
		<?=$arResult["DETAIL_TEXT"]?>
	
	<div style="clear:both"></div>
	<br />
	
    <? $counter=1?>
    <?foreach($arResult["DISPLAY_PROPERTIES"]["ADD_PHOTO"]["FILE_VALUE"] as $pid=>$arImage):?>
	
    <? $fileDetail = CFile::ResizeImageGet($arImage["ID"], array('width'=>600, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
    <? $filePreview = CFile::ResizeImageGet($arImage["ID"], array('width'=>280, 'height'=>280), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
   <div class="add_photo">
    <a href="<?=$fileDetail['src']?>" rel="prettyPhoto[gal]" class="pic">
    <img src="<?=$filePreview['src']?>" width="200" height="280" alt="<?=$arImage["DESCRIPTION"]?>">
    <span class="curtain"></span>
    </a>
    <p align="center"><b><?=$arImage["DESCRIPTION"]?></b></p>
	
   
    </div>
   <? if($counter%4==0 && $counter<$count):?>
   <div style="clear:both"></div>
   <hr class="hr">
   <? endif;?>
    <? $counter++?>
    <?endforeach;?>
    
<div style="clear:both"></div>
</div>

  