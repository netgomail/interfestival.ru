<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="main_slider_wr">
<ul class="bxslider_main">
<? foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
                           
  <li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<? if($arItem["PROPERTIES"]["LINK"]["VALUE"]):?>
					<a href="<? echo  $arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><img src="<? echo $arItem["PREVIEW_PICTURE"]["SRC"]?>" /></a>
			<? else:?>
					<img src="<? echo $arItem["PREVIEW_PICTURE"]["SRC"]?>" />
			<? endif;?>
	</li>
<? endforeach;?>
</ul>
</div>