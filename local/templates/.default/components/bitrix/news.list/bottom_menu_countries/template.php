<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="country-list" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
<div class="title">Страны</div>
<div class="country-item" >
<? foreach($arResult["ITEMS"] as $key => $arItem):?>

	
	<? if(($key!=0) && ($key%7==0)):?>
    </div><div class="country-item">
    
	<? endif;?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?> /  <?=$arItem["CODE"]?></a><br />
	
<? endforeach;?>
</div>
<div class="clear"></div>
</div><!--country-list-->