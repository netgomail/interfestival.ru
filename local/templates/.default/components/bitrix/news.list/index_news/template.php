<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news_block">
	<div class="news_h1">НОВОСТИ <a href="/rss/"><img src="/img/rss.png" width="20" height="20" alt="<?=$arItem["NAME"]?>" /></a></div>
<? foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<? if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
				
				<? $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]['ID'], array('width'=>60, 'height'=>60), BX_RESIZE_IMAGE_EXACT, true); ?>
									
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="news_img preview_picture"
						border="0"
						src="<?=$img["src"]?>"
						width="<?=$img["width"]?>"
						height="<?=$img["height"]?>"  
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						style="float:left"
						/></a>
		<? endif?>
		
   
		<? if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<a class="news_title" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
		<? endif;?>
		
		<? if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<p class="news_date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></p>
		<? endif?>

		<? if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<? endif?>
	</div>
<? endforeach;?>
<div class="clear"></div>
<a href="/companiya/novosty/">Архив новостей</a>
</div>
