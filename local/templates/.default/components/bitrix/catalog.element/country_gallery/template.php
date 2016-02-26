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
    <?foreach($arResult["DISPLAY_PROPERTIES"]["PHOTO"]["FILE_VALUE"] as $pid=>$arImage):?>
	
    <? $fileDetail = CFile::ResizeImageGet($arImage["ID"], array('width'=>600, 'height'=>800), BX_RESIZE_IMAGE_EXACT, true); ?>
    <? $filePreview = CFile::ResizeImageGet($arImage["ID"], array('width'=>150, 'height'=>130), BX_RESIZE_IMAGE_EXACT, true); ?>
   <div class="add_photo">
    <a href="<?=$fileDetail['src']?>" rel="prettyPhoto[gal]" class="pic">
    <img src="<?=$filePreview['src']?>" width="<?=$filePreview['width']?>" height="<?=$filePreview['height']?>" alt="<?=$arImage["DESCRIPTION"]?>">
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

  